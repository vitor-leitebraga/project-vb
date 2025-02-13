<?php

namespace App\Actions\Game;

use Inertia\Inertia;
use Lorisleiva\Actions\Concerns\AsController;

class CreateGame
{
    use AsController;

    public function handle()
    {
		return Inertia::render('Games/GameCreate');
    }

	public function getMiddleware(): array
	{
		return ['auth'];
	}
}
