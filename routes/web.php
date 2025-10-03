<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;

Route::get('/', function () {
    return view('home');
});

Route::get('/jobs', function () {
    // Pagination examples:

    // Fine but inefficient for large datasets
    //$jobs = Job::with('employer', 'tags')->paginate(8);

    // Most efficient for large datasets
    //$jobs = Job::with('employer', 'tags')->cursorPaginate(8);

    // Best for simple pagination without total count and good url generation
    $jobs = Job::with('employer', 'tags')->simplePaginate(8);
    return view('jobs', [
        'jobs' => $jobs
    ]);
});

Route::get('/jobs/{id}', function ($id) {
    return view('job', ['job' => Job::find($id)]);
});


Route::get('/contact', function () {
    return view('contact');
});
