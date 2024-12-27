<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Player>
 */
class PlayerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id'       => User::factory(),
            'name'          => $this->faker->name(),
            'total_games'   => $this->faker->numberBetween(0, 100),
            'wins'          => $this->faker->numberBetween(0, 50),
            'losses'        => $this->faker->numberBetween(0, 50),
            'highscore'     => $this->faker->numberBetween(0, 10000),
        ];
    }
}
