<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Employer;
use App\Models\Job;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employer>
 */
class EmployerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->company(),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Employer $employer) {
            // Create between 1 and 5 jobs for each employer
            Job::factory()->count(rand(1, 5))->create([
                'employer_id' => $employer->id,
            ]);
        });
    }
}
