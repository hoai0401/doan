<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Corrected the typo in "Facades"
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse; // Added the import for RedirectResponse

class LoginController extends Controller
{
    public function showForm()
    {
        return view('login');
    }

    /**
     * Handle an authentication attempt.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request): RedirectResponse // Corrected the typo in "Response"
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::user();
            if($user->is_admin == 1)
            {
                return redirect()->route('dashboard');
            }

            return redirect('home');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->withInput($request->only('email')); // Corrected the typo in "withInput"
    }

    /**
     * Log the user out of the application.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request): RedirectResponse // Corrected the typo in "Response"
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
