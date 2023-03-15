<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

namespace Database\Factories\User;

use App\Models\User;
use App\Models\User\Option;
use App\Models\User\Question;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Laravel\Jetstream\Features;

class OptionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Option::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'question_id' => $this->faker->randomElement(Question::pluck('id')->toArray()),
            'option_letter' => $this->faker->randomElement(['A', 'B', 'C', 'D']),
            'explanation' => $this->faker->sentence(5),
            'option_text' => $this->faker->sentence(2),
            'order' => $this->faker->randomElement([1, 2, 3, 4]),
            'is_active' => $this->faker->numberBetween(0, 1),
            'created_by' => $this->faker->randomElement(User::pluck('id')->toArray()),
            'updated_by' => $this->faker->randomElement(User::pluck('id')->toArray()),
        ];
    }
}
