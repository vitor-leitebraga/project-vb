<?php

namespace App\DataTransferObjects;

use App\Actions\StoreImageAction;
use Spatie\LaravelData\Data;

class GameData extends Data
{
	public function __construct(
		public string $name,
		public int $user_id,
		public string $description,
		public ?string $image_url = null
	) {}

	public static function fromRequest($request, $file = null): self
	{
		$imageUrl = $file ? StoreImageAction::run($file, 'games', true) : null;
		return new self(
			name: $request['name'],
			user_id: auth()->id(),
			description: $request['description'],
			image_url: $imageUrl
		);
	}
}
