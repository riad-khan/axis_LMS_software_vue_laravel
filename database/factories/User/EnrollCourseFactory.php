<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

namespace Database\Factories\User;

use App\Models\User;
use App\Models\User\Course;
use App\Models\User\Subject;
use App\Models\User\EnrollCourse;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Laravel\Jetstream\Features;

class EnrollCourseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = EnrollCourse::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->randomElement(User::pluck('id')->toArray()),
            'course_id' => $this->faker->randomElement(Course::pluck('id')->toArray()),
            'subject_id' => $this->faker->randomElement(Subject::pluck('id')->toArray()),
        ];
    }
}
