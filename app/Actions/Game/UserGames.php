<?php

namespace App\Actions\Game;

use App\Models\Game;
use App\Models\User;
use Illuminate\Support\Str;
use Inertia\Inertia;
use Lorisleiva\Actions\Concerns\AsController;

class UserGames
{
    use AsController;

    public function handle($slug)
    {
		$user = User::all()->first(fn ($user) => Str::slug($user->name) === $slug);

		if (!$user) {
			abort(404, 'User not found');
		}

		$games = Game::orderBy('created_at', 'desc')->where('user_id', $user->id)->paginate(10);

		return Inertia::render('Games/GameIndex', [
			'user' => $user,
			'games' => $games,
			'isOwner' => auth()->check() && auth()->id() === $user->id
		]);
    }
}
