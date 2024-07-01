<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Airplane>
 */
class AirplaneFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = \App\Models\Airplane::class;
     public function definition(): array
    {
        
        return [
            'name' => $this->faker->name,
            'code' => $this->faker->uuid,
            'count_fly' => $this->faker->randomNumber,
            'created_at' => now(),];
    }
}
