<x-layout heading="jobs">
    <div class="mb-4 flex items-center justify-between">
        <h2 class="text-4xl font-bold">Jobs</h2>
        <div class="">
            {{ $jobs->links() }}
        </div>
    </div>

    @if ($jobs->hasPages())
        <ol class="flex flex-wrap gap-2">
            @foreach ($jobs as $job)
                <li class="w-1/4 max-w-[33%] flex-grow bg-gray-50 p-4 py-2 even:bg-orange-100 hover:bg-slate-100">
                    <dl class="flex h-full w-full flex-col">
                        <dt class="mb-1 text-xl font-bold">
                            <a class="text-blue-600 hover:underline" href="{{ route('jobs.job.show', $job->id) }}">
                                {{ $job['title'] }}
                            </a>
                        </dt>
                        <dd class="text-md my-1 border-b border-t border-gray-400 pb-1 font-bold">
                            <a class="hover:underline" href="/jobs&employer={{ $job->employer->id }}">{{ $job->employer->name }}</a>
                        </dd>
                        <dd class="g-yellow-100 flex-grow pb-1">
                            {{ $job->description }}
                        </dd>
                        <dd class="flex justify-between border-t border-gray-400 pt-2">
                            <span>ZAR</span>
                            <strong>{{ number_format($job->salary, 0, '.', ' ') }}</strong>
                        </dd>
                    </dl>
                </li>
            @endforeach
        </ol>
    @else
        <div class="font-bold italic">Dololo.</div>
    @endif
</x-layout>
