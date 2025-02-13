<?php

namespace App\Actions\Game;

use App\Http\Requests\StoreGameRequest;
use App\Models\Game;
use Lorisleiva\Actions\Concerns\AsController;

class StoreGame
{
    use AsController;

    public function handle(StoreGameRequest $request)
    {
		$validated = $request->validated();
		$path = $request->file('image')->store('games', 'public');

		Game::create([
			'name' => $validated['name'],
			'user_id' => auth()->id(),
			'description' => $validated['description'],
			'image_url' => url("storage/" . $path)
		]);

		session()->flash('toast', [
			'type' => 'success',
			'message' => 'Game created successfully!'
		]);

		return to_route("games.index");
    }
}
