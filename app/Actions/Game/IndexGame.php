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
		$games = Game::orderBy('created_at', 'desc')->paginate(10);
		return Inertia::render('Games/GameIndex', compact('games'));
    }
}
