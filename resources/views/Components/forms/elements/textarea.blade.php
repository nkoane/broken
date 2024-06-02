<div class="mt-2">
    <textarea {{ $attributes->class(['block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6']) }}>{{ $slot }}</textarea>
    @error($for)
    <span class="py-2 text-sm italic text-red-600">{{ $message }}</span>
    @enderror
</div>
