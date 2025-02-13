<?php

namespace App\Actions\Game;

use App\Models\Game;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Lorisleiva\Actions\Concerns\AsController;

class UserGames
{
    use AsController;

    public function handle(Request $request)
    {
		$user = $request->attributes->get('resolvedUser');
		$games = Game::latest()->where('user_id', $user->id)->paginate(10);

		return Inertia::render('Games/GameIndex', [
			'user' => $user,
			'games' => $games,
			'isOwner' => auth()->check() && auth()->id() === $user->id
		]);
    }
}
