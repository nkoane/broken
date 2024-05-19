@props([
    'employers' => false,
    'action' => 'anchor',
])
<form class="m-4 rounded" action="{{ $action }}" method="post">
    <div class="gap-4 md:flex">
        <div class="w-full sm:col-span-3">
            <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">Job Title</label>
            <div class="mt-2">
                <input
                    type="text"
                    name="first-name"
                    id="first-name"
                    autocomplete="given-name"
                    placeholder="Software Engineer"
                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
            </div>
        </div>
        <div class="w-full">
            <label for="employer" class="block text-sm font-medium leading-6 text-gray-900">Employer</label>
            <div class="mt-2">
                <select
                    id="employer"
                    name="employer_id"
                    autocomplete="employer-name"
                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    @foreach ($employers as $employer)
                        <option value="{{ $employer->id }}">{{ $employer->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="w-full">
            <label for="salary" class="block text-sm font-medium leading-6 text-gray-900">Salary</label>
            <div class="mt-2">
                <div
                    class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600">
                    <span class="flex select-none items-center pl-3 text-gray-500 sm:text-sm">ZAR</span>
                    <input
                        type="number"
                        name="salary"
                        id="salary"
                        autocomplete="salary"
                        class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                        placeholder="10 000 000" />
                </div>
            </div>
        </div>
    </div>
    <div class="col-span-full">
        <label for="description" class="block text-sm font-medium leading-6 text-gray-900">Description</label>
        <div class="mt-2">
            <textarea
                id="description"
                name="description"
                rows="7"
                placeholder="The description of the job"
                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
        </div>
    </div>

    <div class="mr-2 mt-6 flex items-center justify-end gap-x-6">
        <button type="button" class="text-sm font-semibold leading-6 text-gray-900">
            <a href="{{ route('jobs.index') }}">Cancel</a>
        </button>
        <button
            type="submit"
            class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
            Create
        </button>
    </div>
</form>
