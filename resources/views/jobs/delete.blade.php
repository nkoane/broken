<x-layout heading="jobs">
    <div class="mb-4 flex items-center justify-between">
        <div class="flex items-center gap-2">
            <h2 class="text-4xl font-bold">
                <a class="hover:underline" href="{{ route('jobs.index') }}">jobs</a>
            </h2>
            <!-- auth () -->
            /
            <h3 class="text-3xl"><a href="{{ route('jobs.create') }}" class="text-blue-600 hover:underline">{{ $job->title }}</a></h3>
        </div>
    </div>
    <form action="{{ route('jobs.destroy', ['id' => $job->id]) }}" method="post">
        @csrf
        @method('DELETE')
        @if ($errors->any())
            <fieldset class="my-4 rounded-md border border-red-600 px-4 py-2 pt-2">
                <legend class="px-2 text-red-600">errors</legend>
                <ul class="">
                    @foreach ($errors->all() as $key => $error)
                        <li>{{ $key }}: {{ $error }}</li>
                    @endforeach
                </ul>
            </fieldset>
        @endif

        <input type="hidden" name="id" value="{{ $job->id }}" />
        <dl class="w-full">
            <dt class="mb-2 text-lg font-bold">#{{ $job->id }}</dt>
            <dd>{{ $job->description }}</dd>
            <dd>
                <strong>ZAR</strong>
                {{ number_format($job->salary, 0, '.', ' ') }}
            </dd>
            <dd class="flex items-center justify-end gap-4">
                <x-nav.cancel :cancel="route('jobs.show', $job->id)">Cancel</x-nav.cancel>
                <button
                    class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                    type="submit">
                    Delete
                </button>
            </dd>
        </dl>
    </form>
</x-layout>
