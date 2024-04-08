<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class LoginController extends Controller
{
    public function login(): View
    {
        return view('login');
    }

    public function logout(): RedirectResponse
    {
        Auth::logout();

        return redirect('/');
    }

    /**
     * Handle an authentication attempt.
     */
    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = ['email' => $request->get('email'), 'password' => $request->get('password')];

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('posts');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
}
