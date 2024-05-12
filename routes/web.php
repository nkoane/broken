<?php

use App\Models\Job;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('root',);
})->name('root');

Route::get('/bio', function () {
    return view('bio');
})->name('bio');

Route::get('/jobs', function () {
    return view('jobs.index', [
        'jobs' => Job::all()
    ]);
})->name('jobs');

Route::get('/jobs/{id}', function ($id) {

    $job = Job::find($id);
    if ($job === null) {
        abort(404);
    }

    return view('jobs.view', ['job' => $job]);
})->name('jobs.job');
