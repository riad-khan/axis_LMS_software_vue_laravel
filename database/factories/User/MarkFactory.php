<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

namespace Database\Factories\User;

use App\Models\User\Mark;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Laravel\Jetstream\Features;

class MarkFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Mark::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 10),
            'exam_id' => $this->faker->numberBetween(1, 100),
            'total_question' => $this->faker->numberBetween(5, 20),
            'total_correct' => $this->faker->numberBetween(5, 20),
            'total_wrong' => $this->faker->numberBetween(5, 20),
            'not_answer' => $this->faker->numberBetween(5, 20),
            'total_gain_marks' => $this->faker->numberBetween(5, 20),
        ];
    }
}
