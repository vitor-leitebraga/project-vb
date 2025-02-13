<?php

use App\Models\Game;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use function Pest\Laravel\{actingAs, get, post, delete};

uses(RefreshDatabase::class);

beforeEach(function () {
	$this->user = User::factory()->create();
});

test('guest cannot access create game page', function () {
	get(route('games.create'))->assertRedirect(route('login'));
});

test('authenticated user can access create game page', function () {
	actingAs($this->user)
		->get(route('games.create'))
		->assertOk();
});

test('user can create a game', function () {
	actingAs($this->user);

	Storage::fake('public');
	$file = UploadedFile::fake()->image('game.jpg');

	post(route('games.store'), [
		'name' => 'New Game',
		'description' => 'A fun new game',
		'image' => $file,
	])->assertRedirect(route('games.index'));

	Storage::disk('public')->assertExists('games/' . $file->hashName());

	expect(Game::where('name', 'New Game')->exists())->toBeTrue();
});

test('user cannot edit a game they do not own', function () {
	$owner = User::factory()->create();

	$game = Game::factory()->create(['user_id' => $owner->id]);

	$unauthorizedUser = User::factory()->create();

	actingAs($unauthorizedUser)
		->get(route('games.edit', $game))
		->assertForbidden();
});

test('user can edit their own game', function () {
	$game = Game::factory()->create(['user_id' => $this->user->id]);

	actingAs($this->user)
		->get(route('games.edit', $game))
		->assertOk();
});

test('user can update their own game', function () {
	$user = User::factory()->create();

	actingAs($user);

	$game = Game::factory()->create(['user_id' => $user->id]);

	$response = post(route('games.update', $game), [
		'name' => 'Updated Game',
		'description' => 'Updated description',
	]);

	$response->assertRedirect(route('games.index'));

	$game->refresh();

	expect($game->name)->toBe('Updated Game');
});

test('user cannot delete someone else\'s game', function () {
	$owner = User::factory()->create();

	$game = Game::factory()->create(['user_id' => $owner->id]);

	$unauthorizedUser = User::factory()->create();

	actingAs($unauthorizedUser)
		->delete(route('games.destroy', $game))
		->assertForbidden();
});

test('user can delete their own game', function () {
	$game = Game::factory()->create(['user_id' => $this->user->id]);

	actingAs($this->user)
		->delete(route('games.destroy', $game))
		->assertRedirect(route('games.index'));

	expect(Game::where('id', $game->id)->exists())->toBeFalse();
});
