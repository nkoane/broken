<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\RecoveryController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Models\Job;
use Illuminate\Support\Facades\Route;

Route::view('/', 'root')->name('root');
Route::view('/dash', 'dash')->name('dash');

/*
 * it is easier to expand it so we can set the rules;
 Route::resource('jobs', JobController::class)->middleware('auth'); * it is easier to expand it so we can set the rules;
*/

Route::controller(JobController::class)->group(function () {

    // Read
    Route::get('/jobs', 'index')->name('jobs.index');
    Route::get('/jobs/tag/{tag}', 'index')->name('jobs.tag');
    Route::get('/jobs/employer/{employer}', 'index')->name('jobs.employer');

    // Create
    Route::get('/jobs/create', 'create')->name('jobs.create')
        ->middleware('auth')->can('create', Job::class);

    Route::post('/jobs', 'store')->name('jobs.store')
        ->middleware('auth')
        ->can('create', Job::class);

    Route::get('/jobs/{job}', 'show')->name('jobs.show');

    // Update
    Route::get('/jobs/{job}/edit', 'edit')->name('jobs.edit')
        ->middleware('auth')
        ->can('update', 'job');

    Route::patch('/jobs/{job}', 'update')->name('jobs.update')
        ->middleware('auth')
        ->can('update', 'job');

    // Delete
    Route::get('/jobs/{job}/delete', 'delete')->name('jobs.delete')
        ->middleware('auth')
        ->can('delete', 'job');
    Route::delete('/jobs/{job}', 'destroy')->name('jobs.destroy')
        ->middleware('auth')
        ->can('delete', 'job');
});

/* sign up */
Route::get('/sign-up', [RegisterController::class, 'create'])->name('register.create');
Route::post('/sign-up', [RegisterController::class, 'store'])->name('register.store');

/* sign in */
Route::middleware('throttle:login')->group(function () {
    Route::get('/sign-in', [SessionController::class, 'create'])->name('login');
    Route::post('/sign-in', [SessionController::class, 'store'])->name('login.store');
});

Route::post('/sign-out', [SessionController::class, 'destroy'])->name('logout');

/* password recovery*/
Route::get('/recover', [RecoveryController::class, 'create'])->name('recover');
Route::post('/recover', [RecoveryController::class, 'store'])->name('recover.store');
