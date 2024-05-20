<?php

use App\Http\Controllers\JobController;
use App\Models\{Job, Tag, Employer};
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('root',);
})->name('root');

Route::get('/bio', function () {
    return view('bio');
})->name('bio');

/* ----- jobs: index --- */
Route::get('/jobs', [JobController::class, 'index'])->name('jobs.index');
Route::get('/jobs/tag/{tag}', [JobController::class, 'index'])->name('jobs.tag');
Route::get('/jobs/employer/{employer}', [JobController::class, 'index'])->name('jobs.employer');

/* ----- jobs: create --- */
Route::get('/jobs/create', [JobController::class, 'create'])->name('jobs.create');
Route::post('/jobs', [JobController::class, 'store'])->name('jobs.store');

/* ----- jobs: job --- */
Route::get('/jobs/{job}', [JobController::class, 'show'])->name('jobs.show');

Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])->name('jobs.edit');
Route::patch('/jobs/{job}', [JobController::class, 'update'])->name('jobs.update');

Route::get('/jobs/{job}/delete', [JobController::class, 'delete'])->name('jobs.delete');
Route::delete('/jobs/{job}', [JobController::class, 'destroy'])->name('jobs.destroy');
