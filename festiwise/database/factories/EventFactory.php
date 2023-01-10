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
            'title' => fake()->sentence(mt_rand(2, 4)),
            'slug' => fake()->slug(),
            'excerpt' => fake()->sentence(mt_rand(10, 20)),
            'price' => mt_rand(10,15)*10000,
            'event_date' => fake()->date('y-m-d'),
            'user_id' => mt_rand(1,5),
            'category_id' => mt_rand(1,3),
            'stock' => mt_rand(1,90),
            'location' => 'berezan, Ukraine'
        ];
    }
}
