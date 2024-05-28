<form class="m-4 p-8" action="{{ $action }}" method="post">
    @method($method)
    @csrf
    <div class="mb-4 border-b border-sky-200 pb-4">
        <h3 class="text-base font-semibold leading-7 text-gray-900">job, specification.</h3>
        <p class="mt-1 text-sm leading-6 text-gray-600">we, just need a short tweet (x-ed) size definition of the job.</p>
    </div>
    <div class="gap-4 md:flex">
        <div class="w-full sm:col-span-3">
            <x-forms.elements.label for="username">Your email address</x-forms.elements.label>
            <x-forms.elements.input value="{{old('title', $job->title)}}" required type="text" name="username" id="username" />
        </div>
    </div>
</form>
