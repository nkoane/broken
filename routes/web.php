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
})->name('jobs.index');


Route::get('/jobs/create', function () {
    return view('jobs.create');
})->name('jobs.create');

Route::get('/jobs/{id}', function ($id) {
    $job = Job::find($id);
    return view('jobs.show', ['job' => $job]);
})->name('jobs.show');

Route::get('/jobs/tag/{tag}', function ($tag) {
    $tag = Tag::where('name', $tag)->first();
    if ($tag === null) {
        dump('tag, not found', $tag);
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
        dump('tag, not found', $employer);
        abort(404, 'We do not have that employer.');
    }

    $jobs = $employer->jobs()->with(['tags'])->simplePaginate(5);

    return view('jobs.index', [
        'jobs' => $jobs,
        'employer' => $employer
    ]);
})->name('jobs.employer');
