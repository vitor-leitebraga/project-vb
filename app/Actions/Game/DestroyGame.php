<?php

namespace App\Actions\Game;

use App\Actions\BaseAction;
use App\Models\Game;
use App\Traits\HandlesGameAuthorization;
use Lorisleiva\Actions\Concerns\AsController;

class DestroyGame extends BaseAction
{
    use AsController, HandlesGameAuthorization;

    public function handle(Game $game)
    {
		$game->delete();
		$this->createSuccessMessage(trans('messages.game_deleted'));
		return to_route("games.index");
    }
}
