<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/jobs', function () {
    return view('jobs', [
        'jobs' => [
            [
                'id' => 1,
                'title' => 'Director of Product',
                'salary' => '$50,000',
            ],
            [
                'id' => 2,
                'title' => 'Senior Developer',
                'salary' => '$40,000',
            ],
            [
                'id' => 3,
                'title' => 'Junior Developer',
                'salary' => '$30,000',
            ],
        ],
    ]);
});

Route::get('/jobs/{id}', function ($id) {
    $jobs = [
        [
            'id' => 1,
            'title' => 'Director of Product',
            'salary' => '$50,000',
        ],
        [
                'id' => 2,
                'title' => 'Senior Developer',
                'salary' => '$40,000',
            ],
            [
                'id' => 3,
                'title' => 'Junior Developer',
                'salary' => '$30,000',
            ]
    ];

    $job = collect($jobs)->firstWhere('id', $id);
    return view('job', ['job' => $job]);
});


Route::get('/contact', function () {
    return view('contact');
});
