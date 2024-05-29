@props([
    'action' => false,
    'cancel' => route('root'),
    'method' => 'post',
])
<form class="m-4 p-8" action="{{ $action }}" method="post">
    @method($method)
    @csrf
    <div class="mb-4 border-b border-sky-200 pb-4">
        <h3 class="text-base font-semibold leading-7 text-gray-900">Come on in, player.</h3>
        <p class="mt-1 text-sm leading-6 text-gray-600">We just need a bit o' proof you is who you is, yeah?</p>
    </div>
    <div class="flex justify-between gap-4">
        <div class="flex-grow">
            <div class="mb-4">
                <x-forms.elements.label for="email">Your email address</x-forms.elements.label>
                <x-forms.elements.input value="{{old('email' )}}" required type="email" name="email" id="email" autocomplete="email" />
            </div>
            <div class="mb-4">
                <x-forms.elements.label for="password">Your password</x-forms.elements.label>
                <x-forms.elements.input required type="password" name="password" id="password" autocomplete="new-password" />
            </div>
            <div class="mt-12 flex items-center justify-between gap-2">
                <div class="text-xs">
                    <p>
                        No account,
                        <x-nav.link href="{{ route('register.create') }}">sign up.</x-nav.link>
                    </p>
                    <p>
                        Forgot your password,
                        <x-nav.link href="{{ route('auth.recover') }}">reset it.</x-nav.link>
                    </p>
                </div>
                <div class="flex gap-4 text-xs">
                    <button type="button" class="text-sm leading-6 text-blue-400">
                        <a href="{{ $cancel }}">cancel</a>
                    </button>
                    <x-forms.elements.button type="submit">login</x-forms.elements.button>
                </div>
            </div>
        </div>
    </div>
</form>
