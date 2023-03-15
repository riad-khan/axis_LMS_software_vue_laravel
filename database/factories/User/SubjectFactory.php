<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

namespace Database\Factories\User;

use App\Models\User\Course;
use App\Models\User\Subject;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Laravel\Jetstream\Features;

class SubjectFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Subject::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'course_id' => $this->faker->randomElement(Course::pluck('id')->toArray()),
            'title' => $this->faker->regexify('[A-Za-z0-9]{20}'),
            'banner' => $this->faker->imageUrl('60', '60'),
            'description' => $this->faker->regexify('[A-Za-z0-9]{20}'),
        ];
    }
}
