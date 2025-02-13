<?php

namespace App\Actions\Game;

use Inertia\Inertia;
use Lorisleiva\Actions\Concerns\AsController;

class CreateGameRoute
{
    use AsController;

    public function handle()
    {
		return Inertia::render('Games/GameCreate');
    }
}
