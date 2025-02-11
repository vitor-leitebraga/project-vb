<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Game>
 */
class GameFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
		$gamePictures = [
			'https://gaming-cdn.com/images/news/articles/7230/cover/1000x563/tibia-the-classic-mmorpg-from-1997-gets-a-new-update-cover668ba4233d6a5.jpg',
			'https://aywren.com/2024/pic/osrsbanner.jpg'
		];

        return [
			'user_id' => User::query()->inRandomOrder()->value('id'),
			'name' => fake()->name(),
			'description' => fake()->realText(),
			'image_url' => fake()->randomElement($gamePictures),
        ];
    }
}
