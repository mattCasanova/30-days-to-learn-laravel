<?php

namespace Database\Factories;

use App\Models\Employer;
use Illuminate\Database\Eloquent\Factories\Factory;
use Nette\Utils\Random;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $salaries = ['$50,000', '$60,000', '$70,000', '$80,000', '$90,000', '$100,000'];
        return [
            'title' => $this->faker->jobTitle(),
            'employer_id' => Employer::factory(),
            'salary' => $this->faker->randomElement($salaries),
        ];
    }
}
