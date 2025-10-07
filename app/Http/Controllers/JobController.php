<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\JobPosted;

class JobController extends Controller
{
    public function index()
    {
        // Pagination examples:

        // Fine but inefficient for large datasets
        //$jobs = Job::with('employer', 'tags')->paginate(8);

        // Most efficient for large datasets
        //$jobs = Job::with('employer', 'tags')->cursorPaginate(8);

        // Best for simple pagination without total count and good url generation
        $jobs = Job::with('employer', 'tags')->latest()->simplePaginate(8);
        return view('jobs.index', ['jobs' => $jobs]);
    }

    public function create()
    {
        return view('jobs.create');
    }

    public function show(Job $job)
    {
        $job->load(['employer', 'tags']);
        return view('jobs.show', compact('job'));

    }

    public function store()
    {
        $attributes = request()->validate([
            'title' => 'required|min:3|max:255',
            'salary' => 'required|min:3|max:255',
        ]);

        // For now, hardcode employer_id to 1
        $attributes = array_merge($attributes, ['employer_id' => 1]);
        $job = Job::create($attributes);

        Mail::to($job->employer->user)->queue(new JobPosted($job));

        return redirect('/jobs');
    }

    public function edit(Job $job)
    {
        $job->load(['employer', 'tags']);
        return view('jobs.edit', compact('job'));
    }

    public function update(Request $request, Job $job)
    {
        // authorize - skipped for now

        // validate
        $attributes = request()->validate([
            'title' => 'required|min:3|max:255',
            'salary' => 'required|min:3|max:255',
        ]);

        // update
        $job->update($attributes);
        return view('jobs.show', compact('job'));
    }

    public function destroy(Job $job)
    {
        $job->delete();
        return redirect('/jobs');

    }
}
