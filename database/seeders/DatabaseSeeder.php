<?php

namespace Database\Seeders;

use App\Models\Employer;
use App\Models\Job;
use App\Models\Tag;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Tag::factory()->count(10)->create();
        Employer::factory()->count(20)->create();

        Job::all()->each(function (Job $job) {
            $tags = Tag::inRandomOrder()->take(rand(1, 3))->pluck('id');
            $job->tags()->attach($tags);
        });
    }
}
