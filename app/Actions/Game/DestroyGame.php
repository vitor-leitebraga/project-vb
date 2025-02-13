<?php

namespace App\Actions\Game;

use App\Models\Game;
use App\Traits\HandlesGameAuthorization;
use Lorisleiva\Actions\Concerns\AsController;

class DestroyGame
{
    use AsController, HandlesGameAuthorization;

    public function handle(Game $game)
    {
		$game->delete();

		session()->flash('toast', [
			'type' => 'success',
			'message' => 'Game deleted successfully!'
		]);

		return to_route("games.index");
    }
}
