<?php

namespace App\Actions\Game;

use App\Models\Game;
use Inertia\Inertia;
use Lorisleiva\Actions\Concerns\AsController;

class IndexGame
{
    use AsController;

    public function handle()
    {
		$games = Game::latest()->paginate(10);
		return Inertia::render('Games/GameIndex', compact('games'));
    }
}
