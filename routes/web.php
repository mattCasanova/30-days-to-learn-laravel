<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;

Route::get('/', function () {
    return view('home');
});

// index
Route::get('/jobs', function () {
    // Pagination examples:

    // Fine but inefficient for large datasets
    //$jobs = Job::with('employer', 'tags')->paginate(8);

    // Most efficient for large datasets
    //$jobs = Job::with('employer', 'tags')->cursorPaginate(8);

    // Best for simple pagination without total count and good url generation
    $jobs = Job::with('employer', 'tags')->latest()->simplePaginate(8);
    return view('jobs.index', [
        'jobs' => $jobs
    ]);
});

// create
Route::get('/jobs/create', function () {
    return view('jobs.create');
});

// uses wildcard {id} to capture the job id from the URL
// e.g. /jobs/5 would capture 5 as the id
// This could be conflicted with other routes like /jobs/create
// so the order of route definitions matters
// More specific routes should be defined before more general ones
Route::get('/jobs/{job}', function (Job $job) {
    $job->load(['employer', 'tags']);
    return view('jobs.show', compact('job'));
});

// store
Route::post('/jobs', function () {
    $attributes = request()->validate([
        'title' => 'required|min:3|max:255',
        'salary' => 'required|min:3|max:255',
    ]);

    // For now, hardcode employer_id to 1
    $attributes = array_merge($attributes, ['employer_id' => 1]);
    $job = Job::create($attributes);

    return redirect('/jobs');
});

// edit
Route::get('/jobs/{job}/edit', function (Job $job) {
    $job->load(['employer', 'tags']);
    return view('jobs.edit', compact('job'));
});

// update
Route::patch('/jobs/{job}', function (Job $job) {
    // validate
    $attributes = request()->validate([
        'title' => 'required|min:3|max:255',
        'salary' => 'required|min:3|max:255',
    ]);
    // authorize - skipped for now

    // update
    $job->update($attributes);
    return view('jobs.show', compact('job'));
});

// delete
Route::delete('/jobs/{job}', function (Job $job) {
    $job->delete();
    return redirect('/jobs');
});




Route::get('/contact', function () {
    return view('contact');
});
