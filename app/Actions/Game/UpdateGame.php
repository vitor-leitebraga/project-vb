<?php

namespace App\Actions\Game;

use App\Http\Requests\UpdateGameRequest;
use App\Models\Game;
use App\Traits\HandlesGameAuthorization;
use Lorisleiva\Actions\Concerns\AsController;

class UpdateGame
{
    use AsController, HandlesGameAuthorization;

    public function handle(UpdateGameRequest $request, Game $game)
    {
		$validated = $request->validated();

		if ($request->hasFile('image')) {
			$path = $request->file('image')->store('games', 'public');
			$validated['image_url'] = url("storage/" . $path);
		}

		$game->update($validated);

		session()->flash('toast', [
			'type' => 'success',
			'message' => 'Game updated successfully!'
		]);

		return to_route("games.index");
    }
}
