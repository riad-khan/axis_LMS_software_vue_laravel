<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

namespace Database\Factories\User;

use App\Models\User\Course;
use App\Models\User\Schedule;
use App\Models\User\Subject;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Laravel\Jetstream\Features;

class ScheduleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Schedule::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'course_id' => $this->faker->randomElement(Course::pluck('id')->toArray()),
            'subject_id' => $this->faker->randomElement(Subject::pluck('id')->toArray()),
            'title' => $this->faker->word(5),
            'banner' => $this->faker->imageUrl('60', '60'),
            'date' => $this->faker->date,
            'button' => $this->faker->randomElement([0, 1]),
            'button_text' => $this->faker->word(5),
            'button_url' => $this->faker->url,
        ];
    }
}