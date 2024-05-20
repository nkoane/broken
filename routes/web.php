<?php

use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'root')->name('root');
Route::view('/bio', 'bio')->name('bio');


Route::resource('jobs', JobController::class);

Route::controller(JobController::class)->group(function () {
    Route::get('/jobs/tag/{tag}', 'index')->name('jobs.tag');
    Route::get('/jobs/employer/{employer}', 'index')->name('jobs.employer');
    Route::get('/jobs/{job}/delete', 'delete')->name('jobs.delete');
});
