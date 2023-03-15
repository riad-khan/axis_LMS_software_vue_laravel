<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

namespace Database\Factories\User;

use App\Models\User\Question;
use App\Models\User\QuestionAns;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Laravel\Jetstream\Features;

class QuestionAnsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = QuestionAns::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'question_id' => $this->faker->randomElement(Question::pluck('id')->toArray()),
            'correct_ans' => $this->faker->randomElement(['1', '2', '3', '4']),
            'explanation' => $this->faker->sentence(5),
        ];
    }
}
