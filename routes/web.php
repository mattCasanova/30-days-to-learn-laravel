<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use App\Models\Job;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home');
Route::view('/contact', 'contact');

Route::controller(JobController::class)->group(function () {
    Route::get('/jobs', 'index');
    Route::get('/jobs/create', 'create');

    // uses wildcard {id} or {job} to capture the job id from the URL
    // e.g. /jobs/5 would capture 5 as the id
    // This could be conflicted with other routes like /jobs/create
    // so the order of route definitions matters
    // More specific routes should be defined before more general ones
    Route::get('/jobs/{job}', 'show');
    Route::post('/jobs', 'store');
    Route::get('/jobs/{job}/edit', 'edit');
    Route::patch('/jobs/{job}', 'update');
    Route::delete('/jobs/{job}', 'destroy');
});

/* Alternatively, you can use resource routing which automatically creates these routes
Route::resource('jobs', JobController::class)->only([
    'index', 'show', 'create', 'store', 'edit', 'update', 'destroy'
]);
*/

Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);
