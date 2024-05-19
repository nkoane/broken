@props([
    "employers" => false,
    "action" => false,
    "job" => null,
    "cancel" => route("jobs.index"),
    "method" => "post",
])

<form class="m-4 p-8" action="{{ $action }}" method="post">
    @method($method)
    @csrf
    <div class="mb-4 border-b border-sky-200 pb-4">
        <h3 class="text-base font-semibold leading-7 text-gray-900">job, specification.</h3>
        <p class="mt-1 text-sm leading-6 text-gray-600">we, just need a short tweet (x-ed) size definition of the job.</p>

        {{--
            @if ($errors->any())
            <fieldset class="my-4 rounded-md border border-red-600 px-4 py-2 pt-2">
            <legend class="px-2 text-red-600">errors</legend>
            <ul class="">
            @foreach ($errors->all() as $key => $error)
            <li>{{ $key }}: {{ $error }}</li>
            @endforeach
            </ul>
            @endif
            </fieldset>
        --}}
    </div>

    <div class="gap-4 md:flex">
        <div class="w-full sm:col-span-3">
            <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">Job Title</label>
            <div class="mt-2">
                <input
                    type="text"
                    name="title"
                    id="title"
                    autocomplete="given-name"
                    placeholder="Software Engineer"
                    value="{{ old("title", $job->title) }}"
                    required
                    class="@if($errors->has('title')) border-red-600 @else border-0 @endif block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                @error("title")
                    <span class="py-2 text-sm italic text-red-600">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="w-full">
            <label for="employer" class="block text-sm font-medium leading-6 text-gray-900">Employer</label>
            <div class="mt-2">
                <select
                    id="employer"
                    name="employer_id"
                    autocomplete="employer-name"
                    required
                    class="@if($errors->has('employer_id')) border-red-600 @else border-0 @endif block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    @foreach ($employers as $employer)
                        <option
                            value="{{ $employer->id }}"
                            {{ old("employer_id", $job->employer_id) == $employer->id ? "selected" : "" }}>
                            {{ $employer->name }}
                        </option>
                    @endforeach
                </select>

                @error("employer_id")
                    <span class="py-2 text-sm italic text-red-600">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="w-full">
            <label for="salary" class="block text-sm font-medium leading-6 text-gray-900">Salary</label>
            <div class="mt-2">
                <div
                    @if ($errors->has("employer_id"))
                        aria-invalid="true"
                        class="ring-red-600 flex rounded-md shadow-sm ring-1 ring-inset focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600"
                    @else
                        class="ring-gray-300 flex rounded-md shadow-sm ring-1 ring-inset focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600"
                    @endif
                    aria-invalid="false">
                    <span class="flex select-none items-center pl-3 text-gray-500 sm:text-sm">ZAR</span>
                    <input
                        type="number"
                        name="salary"
                        id="salary"
                        autocomplete="salary"
                        required
                        value="{{ old("salary", $job->salary) }}"
                        class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                        placeholder="10 000 000" />
                </div>
                @error("salary")
                    <span class="py-2 text-sm italic text-red-600">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>
    <div class="col-span-full">
        <label for="description" class="block text-sm font-medium leading-6 text-gray-900">Description</label>
        <div class="mt-2">
            <textarea
                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                id="description"
                name="description"
                rows="7"
                placeholder="The description of the job">
{{ old("description", $job->description) }}</textarea
            >
            @error("description")
                <span class="py-2 text-sm italic text-red-600">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="mr-2 mt-6 flex items-center justify-end gap-x-6">
        <button type="button" class="text-sm font-semibold leading-6 text-gray-900">
            <a href="{{ $cancel }}">Cancel</a>
        </button>
        <button
            type="submit"
            class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
            @if ($job)
                Edit
            @else
                Create
            @endif
        </button>
    </div>
</form>
