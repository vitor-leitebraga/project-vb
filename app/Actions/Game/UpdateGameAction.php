<?php

namespace App\Actions\Game;

use App\DataTransferObjects\GameData;
use App\Models\Game;
use Lorisleiva\Actions\Concerns\AsAction;

class UpdateGameAction
{
    use AsAction;

    public function handle(Game $game, GameData $gameData)
    {
		$data = array_filter($gameData->toArray(), fn ($value) => !is_null($value));
		return $game->update($data);
    }
}
