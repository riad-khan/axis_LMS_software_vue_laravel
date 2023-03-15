<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

namespace Database\Factories\User;

use App\Models\User;
use App\Models\User\Exam;
use App\Models\User\Question;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Laravel\Jetstream\Features;

class QuestionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Question::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'exam_id' => $this->faker->randomElement(Exam::pluck('id')->toArray()),
            'question_text' => $this->faker->sentence(5),
            'question_type' => $this->faker->randomElement(['single', 'multiple']),
            'correct_ans' => $this->faker->randomElement(['1', '2', '3', '4']),
            'explanation' => $this->faker->sentence(5),
            'order' => $this->faker->randomElement([1, 2, 3, 4]),
            'created_by' => $this->faker->randomElement(User::pluck('id')->toArray()),
            'updated_by' => $this->faker->randomElement(User::pluck('id')->toArray()),
        ];
    }
}
