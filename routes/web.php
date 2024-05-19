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
    $jobs = Job::with(['employer', 'tags'])->latest()->simplePaginate(5);
    return view('jobs.index', [
        'jobs' => $jobs
    ]);
})->name('jobs.index');

/* ----- job: create + store --- */

Route::get('/jobs/create', function () {
    $job = new Job();
    return view('jobs.create',  [
        'employers' => Employer::all()->sortBy('name'),
        'job' => $job
    ]);
})->name('jobs.create');


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

Route::get('/jobs/{id}', function ($id) {
    $job = Job::find($id);
    return view('jobs.show', ['job' => $job]);
})->name('jobs.show');

/* ----- job: edit -> update : delete -> destroy  --- */

Route::get('/jobs/{id}/edit', function ($id) {
    $job = Job::find($id);
    return view('jobs.edit', [
        'job' => $job,
        'employers' => Employer::all()->sortBy('name')
    ]);
})->name('jobs.edit');

Route::put('/jobs/{id}', function ($id) {
    request()->validate([
        'title' => ['required'],
        'salary' => ['required', 'integer', 'min:0'],
        'description' => ['required'],
        'employer_id' => ['required', 'exists:employers,id'],
    ]);

    $job = Job::find($id);
    $job->update([
        'title' => request('title'),
        'description' => request('description'),
        'salary' => request('salary'),
        'employer_id' => request('employer_id')
    ]);
    return redirect(route('jobs.show', $id));
})->name('jobs.update');


Route::get('/jobs/{id}/delete', function ($id) {
    $job = Job::find($id);
    return view('jobs.delete', ['job' => $job]);
})->name('jobs.delete');

Route::delete('/jobs/{id}', function ($id) {
    request()->validate([
        'id' => ['required', 'exists:job_listings,id'],
    ]);

    $job = Job::find($id);


    $job->delete();
    return redirect(route('jobs.index'));
})->name('jobs.destroy');

/* ---- just sperating these things so they are easier to find late ------ */

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
