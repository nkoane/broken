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

    $jobs = Job::with('employer')->simplePaginate(5);

    return view('jobs.index', [
        'jobs' => $jobs
    ]);
})->name('jobs');

Route::get('/jobs/{id}', function ($id) {

    $job = Job::find($id);

    if ($job === null) {
        abort(404, 'WTF, You is looking for ain\'t here.');
    }

    return view('jobs.view', ['job' => $job]);
})->name('jobs.job.show');
