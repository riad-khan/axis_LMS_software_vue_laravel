<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

namespace Database\Factories\User;

use App\Models\User;
use App\Models\User\Exam;
use App\Models\User\Course;
use App\Models\User\Subject;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExamFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Exam::class;

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
            'title' => $this->faker->word(10),
            'banner' => $this->faker->imageUrl('60', '60'),
            'duration' => $this->faker->numberBetween(10, 100),
            'total_question' => $this->faker->numberBetween(10, 100),
            'marks_per_question' => 1,
            'negative_marks' => 0.5,
            'date' => $this->faker->date,
            'starting_time' => $this->faker->dateTime,
            'ending_time' => $this->faker->dateTime,
            'order' => $this->faker->numberBetween(1, 4),
            'created_by' =>$this->faker->randomElement(User::pluck('id')->toArray()),
            'updated_by' =>$this->faker->randomElement(User::pluck('id')->toArray()),
        ];
    }
}
