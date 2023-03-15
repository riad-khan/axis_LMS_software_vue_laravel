<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

namespace Database\Factories\User;

use App\Models\User\ClassResource;
use App\Models\User\Classs;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Laravel\Jetstream\Features;

class ClassResourceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ClassResource::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'class_id' => $this->faker->randomElement(Classs::pluck('id')->toArray()),
            'title' => $this->faker->sentence(1),
            'video_url' => $this->faker->url(),
            'download_url' => $this->faker->url(),
        ];
    }
}
