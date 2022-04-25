<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FormFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'title' => $this->faker->text(10),
            'description' => $this->faker->text(10),
            'active' => $this->faker->boolean,
            'hash' => $this->faker->unique()->password(),

        ];
    }
}
