@props([
    'action' => false,
    'cancel' => route('root'),
    'method' => 'post',
])
<form class="m-4 p-8" action="{{ $action }}" method="post">
    @method($method)
    @csrf
    <div class="mb-4 border-b border-sky-200 pb-4">
        <h3 class="text-base font-semibold leading-7 text-gray-900">Registration, sign on up.</h3>
        <p class="mt-1 text-sm leading-6 text-gray-600">we, just need your life.</p>
    </div>
    <div class="flex justify-between gap-4">
        <div class="flex-grow">
            <div class="mb-4">
                <x-forms.elements.label for="first_name">First Name</x-forms.elements.label>
                <x-forms.elements.input
                    value="{{old('first_name' )}}"
                    required
                    type="text"
                    name="first_name"
                    id="first_name"
                    autocomplete="name"
                />
            </div>
            <div class="mb-4">
                <x-forms.elements.label for="last_name">Last Name</x-forms.elements.label>
                <x-forms.elements.input
                    value="{{old('last_name' )}}"
                    required
                    type="text"
                    name="last_name"
                    id="last_name"
                    autocomplete="family-name"
                />
            </div>
            <div class="mb-4">
                <x-forms.elements.label for="email">Your email address</x-forms.elements.label>
                <x-forms.elements.input value="{{old('email' )}}" required type="email" name="email" id="email" autocomplete="email" />
            </div>
        </div>
        <div class="flex-grow">
            <div class="mb-4">
                <x-forms.elements.label for="password">Your password</x-forms.elements.label>
                <x-forms.elements.input required type="password" name="password" id="password" autocomplete="new-password" />
            </div>
            <div class="mb-4">
                <x-forms.elements.label for="password_confirmation">Confirm password</x-forms.elements.label>
                <x-forms.elements.input
                    required
                    type="password"
                    name="password_confirmation"
                    id="password_confirmation"
                    autocomplete="new-password"
                />
            </div>
            <div class="mt-12 flex items-center justify-end gap-2">
                <button type="button" class="text-sm font-semibold leading-6 text-gray-900">
                    <a href="{{ $cancel }}">Cancel</a>
                </button>
                <x-forms.elements.button type="submit">register</x-forms.elements.button>
            </div>
        </div>
    </div>
</form>
