<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
        'section_id' =>  $this->faker->numberBetween(1, 20),
        'name' =>  $this->faker->randomElement(['course1', 'course2 ', 'course3', 'course4', 'course5','course6']),
        'description' =>  $this->faker->text(),
        'currency' =>  $this->faker->randomElement(['aed', '$', 'aed']),
        'price' =>  $this->faker->randomElement(['1000', '2000', '3000', '4000', '5000','6000']),
        'date' =>  $this->faker->date(),
        'time' =>  $this->faker->time(),
        'rate' => $this->faker->randomElement(['1', '2 ', '3', '4', '5','6']),
        ];
    }
}
