<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

namespace Database\Factories\User;

use App\Models\User;
use App\Models\User\Exam;
use App\Models\User\Result;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Laravel\Jetstream\Features;

class ResultFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Result::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->randomElement(User::pluck('id')->toArray()),
            'exam_id' => $this->faker->randomElement(Exam::pluck('id')->toArray()),
            'total_question' => $this->faker->numberBetween(5, 20),
            'total_correct' => 10,
            'total_wrong' => 5,
            'not_answer' => 5,
            'total_gain_marks' => (10*1)-(5*0.5),
        ];
    }
}
