<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Doctor>
 */
class DoctorFactory extends Factory
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
        // 'course_id' =>  $this->faker->numberBetween(1, 50),
        'name' =>  $this->faker->randomElement(['doctor1', 'doctor2 ', 'doctor3', 'doctor4', 'doctor5','doctor6']),
        // 'password' => 'eyJpdiI6Ikh6bGNPbDZ2UndJSVVqbzd2c2tobEE9PSIsInZhbHVlIjoiclZqdllWM0dPWDFBcThucUZVWGplZz09IiwibWFjIjoiMDQ5ODA4NzY2ZmU5YjNlMmFjYTg3NjBlYTIyMzJmMmE2NmRjMzljNzY3NjgxZjA4N2I0YzIxZmY3ZWViOWFlMyIsInRhZyI6IiJ9',
        'email' => fake()->unique()->safeEmail(),
        'description' =>  $this->faker->text(),
        'image' =>  $this->faker->text(),
        'specialization' =>  $this->faker->randomElement(['special1', 'special2 ', 'special3', 'special4', 'special5','special6']),
        'rate' => $this->faker->randomElement(['1', '2 ', '3', '4', '5','6']),
        ];
    }
}
