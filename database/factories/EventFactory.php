<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'city_name' => $this->faker->city,
            'price' => $this->faker->numberBetween(10, 100),
            'places_available' => $this->faker->numberBetween(1, 50),
            'date' => $this->faker->dateTimeBetween('now', '+1 year')->format('Y-m-d'),
            'category_id' => function () {
                return \App\Models\Category::factory()->create()->id;
            },
            'user_id' => function () {
                return \App\Models\User::factory()->create()->id;
            },
            'validated' => true,
            'acceptation_method' => $this->faker->randomElement(['auto', 'manual']),
            'deleted' => false,
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
