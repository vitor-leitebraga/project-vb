<?php

namespace App\Actions\Game;

use App\Models\Game;
use App\Traits\HandlesGameAuthorization;
use Inertia\Inertia;
use Lorisleiva\Actions\Concerns\AsController;

class EditGame
{
    use AsController, HandlesGameAuthorization;

    public function handle(Game $game)
    {
		return Inertia::render('Games/GameEdit', [
			'game' => $game
		]);
    }
}
