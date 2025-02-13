<?php

namespace App\Actions\Game;

use App\Actions\BaseAction;
use App\DataTransferObjects\GameData;
use App\Http\Requests\StoreGameRequest;
use Lorisleiva\Actions\Concerns\AsController;

class StoreGame extends BaseAction
{
    use AsController;

    public function handle(StoreGameRequest $request)
    {
		$validated = $request->validated();
		$gameData = GameData::fromRequest($validated, $request->file('image'));

		CreateGameAction::run($gameData);

		$this->createSuccessMessage(trans('messages.game_created'));
		return to_route("games.index");
    }
}
