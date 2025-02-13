<?php

namespace App\Actions\Game;

use App\Models\Game;
use Inertia\Inertia;
use Lorisleiva\Actions\Concerns\AsController;

class ShowGame
{
    use AsController;

    public function handle(Game $game)
    {
		return Inertia::render('Games/GameDetail', [
			'game' => $game->load('user')
		]);
    }
}
