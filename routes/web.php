<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\RecoveryController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'root')->name('root');
Route::view('/dash', 'dash')->name('dash');

Route::resource('jobs', JobController::class);

Route::controller(JobController::class)->group(function () {
    Route::get('/jobs/tag/{tag}', 'index')->name('jobs.tag');
    Route::get('/jobs/employer/{employer}', 'index')->name('jobs.employer');
    Route::get('/jobs/{job}/delete', 'delete')->name('jobs.delete');
});

/* sign up */
Route::get('/sign-up', [RegisterController::class, 'create'])->name('register.create');
Route::post('/sign-up', [RegisterController::class, 'store'])->name('register.store');

/* sign in */
Route::middleware('throttle:login')->group(function () {
    Route::get('/sign-in', [SessionController::class, 'create'])->name('auth.login');
    Route::post('/sign-in', [SessionController::class, 'store'])->name('auth.verify');
});

Route::post('/sign-out', [SessionController::class, 'destroy'])->name('auth.logout');

/* password recovery*/
Route::get('/recover', [RecoveryController::class, 'create'])->name('auth.recover');
Route::post('/recover', [RecoveryController::class, 'store'])->name('auth.reset');
