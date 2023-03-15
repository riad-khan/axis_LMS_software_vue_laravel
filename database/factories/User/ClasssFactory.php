<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

namespace Database\Factories\User;

use App\Models\User;
use App\Models\User\Classs;
use App\Models\User\Course;
use App\Models\User\Subject;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Laravel\Jetstream\Features;

class ClasssFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Classs::class;

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
            'zoom_link' => $this->faker->Url(),
            'url_link' => $this->faker->Url(),
            'description' => $this->faker->sentence(10),
            'starting_time' => $this->faker->dateTime,
            'ending_time' => $this->faker->dateTime,
        ];
    }
}
