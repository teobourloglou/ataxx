<?php

namespace Database\Factories;

use App\Models\Player;
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
        $player1 = Player::factory()->create();
        $player2 = Player::factory()->create();

        return [
            'user_id'       => User::factory(),
            'player1_id'    => $player1->id,
            'player2_id'    => $player2->id,
            'winner_id'     => $this->faker->randomElement([$player1->id, $player2->id]),
            'board'         => json_encode([]),
            'finished'      => false
        ];
    }
}
