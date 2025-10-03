<?php

namespace App\Models;

class Job
{
    public int $id;
    public string $title;
    public string $salary;

    public function __construct(int $id, string $title, string $salary)
    {
        $this->id = $id;
        $this->title = $title;
        $this->salary = $salary;
    }

    public static function all(): array
    {
        return [
            new Job(1, 'Director of Product', '$50,000'),
            new Job(2, 'Senior Developer', '$40,000'),
            new Job(3, 'Junior Developer', '$30,000'),
        ];
    }

    public static function find(int $id): ?Job
    {
        $job = collect(self::all())->firstWhere('id', $id);

        if (!$job) {
            abort(404);
        }

        return $job;
    }
}
