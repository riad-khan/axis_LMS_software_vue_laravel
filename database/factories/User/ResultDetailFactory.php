<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

namespace Database\Factories\User;

use App\Models\User;
use App\Models\User\Exam;
use App\Models\User\Question;
use App\Models\User\ResultDetail;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Laravel\Jetstream\Features;

class ResultDetailFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ResultDetail::class;

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
            'question_id' => $this->faker->randomElement(Question::pluck('id')->toArray()),
            'user_ans' => $this->faker->randomElement(['1', '2', '3', '4']),
        ];
    }
}
