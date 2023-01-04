<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Events>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => fake()->title(),
            'slug' => fake()->slug(),
            'excerpt' => fake()->text(100),
            'price' => fake()->randomNumber(6,true),
            'event_date' => fake()->date('y-m-d'),
            'user_id' => mt_rand(1,5),
        ];
    }
}
