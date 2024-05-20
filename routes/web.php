<?php

use App\Models\{Job, Tag, Employer};
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('root',);
})->name('root');

Route::get('/bio', function () {
    return view('bio');
})->name('bio');

/* ----- jobs: index --- */

Route::get('/jobs', function () {
    $jobs = Job::with(['employer', 'tags'])->latest()->simplePaginate(5);
    return view('jobs.index', [
        'jobs' => $jobs
    ]);
})->name('jobs.index');

/* ----- job: create  --- */

Route::get('/jobs/create', function () {
    $job = new Job();
    return view('jobs.create',  [
        'employers' => Employer::all()->sortBy('name'),
        'job' => $job
    ]);
})->name('jobs.create');

/* ----- job: store --- */

Route::post('/jobs', function () {

    request()->validate([
        'title' => ['required'],
        'salary' => ['required', 'integer', 'min:0'],
        'description' => ['required'],
        'employer_id' => ['required', 'exists:employers,id'],
    ]);

    $job = Job::create([
        'title' => request('title'),
        'description' => request('description'),
        'salary' => request('salary'),
        'employer_id' => request('employer_id'),
    ]);
    return redirect(
        route('jobs.show', $job->id)
    );
})->name('jobs.store');

/* ----- job: show --- */

Route::get('/jobs/{job}', function (Job $job) {

    // ?  $job = Job::findOrFail($job->id) <-- i need to remember this

    return view('jobs.show', ['job' => $job]);
})->name('jobs.show');

/* ----- job: edit --- */

Route::get('/jobs/{job}/edit', function (Job $job) {
    return view('jobs.edit', [
        'job' => $job,
        'employers' => Employer::all()->sortBy('name')
    ]);
})->name('jobs.edit');

/* ----- job: update --- */

Route::patch('/jobs/{job}', function (Job $job) {
    request()->validate([
        'title' => ['required'],
        'salary' => ['required', 'integer', 'min:0'],
        'description' => ['required'],
        'employer_id' => ['required', 'exists:employers,id'],
    ]);

    $job->update([
        'title' => request('title'),
        'description' => request('description'),
        'salary' => request('salary'),
        'employer_id' => request('employer_id')
    ]);
    return redirect(route('jobs.show', $job->id));
})->name('jobs.update');


/* ----- job: delete --- */

Route::get('/jobs/{job}/delete', function (Job $job) {
    return view('jobs.delete', ['job' => $job]);
})->name('jobs.delete');

/* ----- job: destroy --- */

Route::delete('/jobs/{job}', function (Job $job) {
    request()->validate([
        'id' => ['required', 'exists:job_listings,id'],
    ]);

    $job->delete();
    return redirect(route('jobs.index'));
})->name('jobs.destroy');

/* ----- job: tag --- */

Route::get('/jobs/tag/{tag:name}', function (Tag $tag) {
    $jobs = $tag->jobs()->with(['employer', 'tags'])->simplePaginate(5);
    return view('jobs.index', [
        'jobs' => $jobs,
        'tag' => $tag
    ]);
})->name('jobs.tag');

/* ----- job: employer --- */

Route::get('/jobs/employer/{employer}', function (Employer $employer) {

    $jobs = $employer->jobs()->with(['tags'])->simplePaginate(5);

    return view('jobs.index', [
        'jobs' => $jobs,
        'employer' => $employer
    ]);
})->name('jobs.employer');
