<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Note>
 */
class NoteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->word(5),
            'body' => fake()->text(),
            'recipient' => fake()->email(),
            'send_date' => fake()->date('m/d/Y h:i:s', '+20 days'),
            'is_published' => true,
            'likes_count' => fake()->numberBetween(0, 30)
        ];
    }
}
