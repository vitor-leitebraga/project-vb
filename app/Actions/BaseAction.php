<?php

namespace App\Actions;

use Inertia\Inertia;

class BaseAction
{
    protected function createSuccessMessage(string $message): void
	{
		session()->flash('toast', [
			'type' => 'success',
			'message' => $message
		]);
	}
}
