<x-layout heading="jobs">
    <div class="mb-4 flex items-center justify-between">
        <div class="flex items-center gap-2">
            <h2 class="text-4xl font-bold">
                <a class="hover:underline" href="{{ route('jobs.index') }}">jobs</a>
            </h2>
            @if (! isset($tag) && ! isset($employer))
                <!-- auth () -->
                /
                <h3 class="text-3xl"><a href="{{ route('jobs.create') }}" class="text-blue-600 hover:underline">Create</a></h3>
            @endif

            @isset($tag)
                /
                <h3 class="text-3xl">{{ $tag->name }}</h3>
            @endif

            @isset($employer)
                /
                <h3 class="text-3xl">{{ $employer->name }}</h3>
            @endif
        </div>
        <div class="">
            {{ $jobs->links() }}
        </div>
    </div>

    @if ($jobs->count() > 0)
        <ol class="grid gap-2 md:grid-cols-3">
            @foreach ($jobs as $job)
                {{--
                    <li class="w-1/3 rounded-md border-b-2 bg-gray-50 p-4 py-2 even:bg-orange-100 hover:bg-slate-100">
                --}}

                <li class="rounded-md border-b-2 bg-gray-50 p-4 py-2 even:bg-orange-100 hover:bg-slate-100">
                    <dl class="flex h-full w-full flex-col">
                        <dt class="mb-1 text-xl font-bold">
                            <a class="text-blue-600 hover:underline" href="{{ route('jobs.show', $job->id) }}">
                                {{ $job['title'] }}
                            </a>
                        </dt>
                        <dd class="text-md my-1 border-b border-t border-gray-400 pb-1 font-bold">
                            @isset($employer)
                                <a class="text-blue-500 hover:underline" href="{{ route('jobs.employer', $employer->id) }}">
                                    {{ $employer->name }}
                                </a>
                            @else
                                <a class="text-blue-500 hover:underline" href="{{ route('jobs.employer', $job->employer->id) }}">
                                    {{ $job->employer->name }}
                                </a>
                            @endisset
                        </dd>
                        <dd class="g-yellow-100 flex-grow pb-1">
                            {{ $job->description }}
                        </dd>
                        @if ($job->tags)
                            <dd class="italic">
                                @foreach ($job->tags as $tag)
                                    <a href="{{ route('jobs.tag', $tag->name) }}" class="mx-1 text-blue-400 hover:underline">
                                        {{ $tag->name }}
                                    </a>
                                    @if (! $loop->last)
                                        ,
                                    @endif
                                @endforeach
                            </dd>
                        @endif

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
