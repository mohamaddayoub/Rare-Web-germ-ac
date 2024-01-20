<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Section>
 */
class SectionFactory extends Factory
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
         'name' =>  $this->faker->randomElement(['medical1', 'medical2 ', 'medical3', 'medical4', 'medical5','medical6']),
        'description' =>  $this->faker->text(),
        ];
    }
}
