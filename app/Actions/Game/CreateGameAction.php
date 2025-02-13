<?php

namespace App\Actions\Game;

use App\DataTransferObjects\GameData;
use App\Models\Game;
use Lorisleiva\Actions\Concerns\AsAction;

class CreateGameAction
{
    use AsAction;

    public function handle(GameData $gameData)
    {
		return Game::create($gameData->toArray());
    }
}
