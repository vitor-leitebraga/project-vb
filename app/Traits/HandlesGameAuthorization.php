<?php

namespace App\Traits;

use Illuminate\Support\Facades\Gate;
use Lorisleiva\Actions\ActionRequest;

trait HandlesGameAuthorization
{
	public function authorize(ActionRequest $request): bool
	{
		$game = $request->route('game');
		return Gate::allows('update', $game);
	}
}
