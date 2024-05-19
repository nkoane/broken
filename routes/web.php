<?php

use App\Models\{Job, Tag, Employer};
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('root',);
})->name('root');

Route::get('/bio', function () {
    return view('bio');
})->name('bio');

Route::get('/jobs', function () {

    $jobs = Job::with(['employer', 'tags'])->simplePaginate(5);

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

Route::get('/jobs/tag/{tag}', function ($tag) {
    $tag = Tag::where('name', $tag)->first();
    if ($tag === null) {
        abort(404, 'We do not have that tag.');
    }

    $jobs = $tag->jobs()->with(['employer', 'tags'])->simplePaginate(5);
    return view('jobs.index', [
        'jobs' => $jobs,
        'tag' => $tag
    ]);
})->name('jobs.tag');

Route::get('/jobs/employer/{id}', function ($id) {
    $employer = Employer::find($id);

    if ($employer === null) {
        abort(404, 'We do not have that employer.');
    }

    $jobs = $employer->jobs()->with(['tags'])->simplePaginate(5);

    return view('jobs.index', [
        'jobs' => $jobs,
        'employer' => $employer
    ]);
})->name('jobs.employer');
