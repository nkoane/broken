<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use App\Models\Job;
use App\Models\Tag;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class JobController extends Controller
{
    public function index(?Tag $tag = null, ?Employer $employer = null): View
    {
        if ($tag !== null) {
            $jobs = $tag->jobs()->with(['employer', 'tags'])->latest()->simplePaginate(5);
        } elseif ($employer !== null) {
            $jobs = $employer->jobs()->with(['tags'])->latest()->simplePaginate(5);
        } else {
            $jobs = Job::with(['employer', 'tags'])->latest()->simplePaginate(5);
        }

        return view('jobs.index', ['jobs' => $jobs, 'tag' => $tag, 'employer' => $employer]);
    }

    public function create(): View
    {

        // ! authorise?
        return view('jobs.create', [
            'job' => new Job(),
            'employers' => Employer::all()->sortBy('name'),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        // ! authorise?

        $request->validate([
            'title' => ['required'],
            'salary' => ['required', 'integer', 'min:0'],
            'description' => ['required'],
            'employer_id' => ['required', 'exists:employers,id'],
        ]);

        $job = Job::create([
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'salary' => $request->get('salary'),
            'employer_id' => $request->get('employer_id'),
        ]);

        return redirect(
            route('jobs.show', $job->id)
        );
    }

    // * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
    public function show(Job $job): View
    {
        return view('jobs.show', [
            'job' => $job,
        ]);
    }

    public function edit(Job $job): View|RedirectResponse
    {
        /*
        if (Auth::guest()) {
            app('redirect')->setIntendedUrl(route('jobs.edit', $job));
            return redirect(route('auth.login'));
        }
        */

        Gate::authorize('job.edit', $job);

        return view('jobs.edit', [
            'job' => $job,
            'employers' => Employer::all()->sortBy('name'),
        ]);
    }

    public function update(Job $job, Request $request): RedirectResponse
    {

        Gate::authorize('job.edit', $job);
        // ! authorise?
        $request->validate([
            'title' => ['required'],
            'salary' => ['required', 'integer', 'min:0'],
            'description' => ['required'],
            'employer_id' => ['required', 'exists:employers,id'],
        ]);

        $job->update([
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'salary' => $request->get('salary'),
            'employer_id' => $request->get('employer_id'),
        ]);

        return redirect(route('jobs.show', $job->id));
    }

    public function delete(Job $job): View
    {
        Gate::authorize('job.edit', $job);

        // ! authorise?
        return view('jobs.delete', ['job' => $job]);
    }

    public function destroy(Job $job, Request $request): RedirectResponse
    {
        // ! authorise?

        Gate::authorize('job.edit', $job);
        $request->validate([
            'id' => ['required', 'exists:job_listings,id'],
        ]);

        $job->delete();

        return redirect(route('jobs.index'));
    }
}
