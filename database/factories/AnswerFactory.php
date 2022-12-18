<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Answer>
 */
class AnswerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'question_id'=> 1,
            'opt_1'=> $this->faker->word,
            'opt_2'=> $this->faker->word,
            'opt_3'=> $this->faker->word,
            'opt_4'=> $this->faker->word,
            'correct_ans' => collect(['opt_1','opt_2','opt_3','opt_4'])->random()
        ];
    }
}
