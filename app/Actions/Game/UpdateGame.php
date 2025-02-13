<?php

namespace App\Actions\Game;

use App\Actions\BaseAction;
use App\DataTransferObjects\GameData;
use App\Http\Requests\UpdateGameRequest;
use App\Models\Game;
use App\Traits\HandlesGameAuthorization;
use Lorisleiva\Actions\Concerns\AsController;

class UpdateGame extends BaseAction
{
    use AsController, HandlesGameAuthorization;

    public function handle(UpdateGameRequest $request, Game $game)
    {
		$validated = $request->validated();
		$gameData = GameData::fromRequest($validated, $request->hasFile('image') ? $request->file('image') : null);

		UpdateGameAction::run($game, $gameData);

		$this->createSuccessMessage(trans('messages.game_updated'));
		return to_route("games.index");
    }
}
