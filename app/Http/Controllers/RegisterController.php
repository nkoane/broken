<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
    public function create(): View
    {
        return view('auth.register');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => [
                'required',
                /*
                Password::min(5)->numbers()
                ->mixedCase()
                ->letters()->uncompromised(),
                */
                'string',
                'min:5',
                'confirmed'],
        ]);

        $user = User::create($validated);

        /*
         * * i this a good idea? i suppose if we are going to do an email verification later
        */
        Auth::login($user);

        return redirect(route('dash'));
    }
}
