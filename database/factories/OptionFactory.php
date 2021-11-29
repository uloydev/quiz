<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class OptionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'text' => $this->faker->sentence($nbWords=7),
            'question_id' => 1,
            'is_answer' => $this->faker->boolean(25),
        ];
    }
}
