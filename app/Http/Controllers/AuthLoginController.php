<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthLoginController extends Controller
{
    public function login(Request $request)
    {
    // Validate the login request
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to log in the user
        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();
        
            if ($user->active === 0) {
                // Account is not active (pending verification)
                Auth::logout();
                return redirect()->route('login')
                    ->withErrors(['status' => 'Your account is pending verification. The admin will verify your account.']);
            } elseif ($user->status === 0) {
                // Account is locked
                Auth::logout();
                return redirect()->route('login')
                    ->withErrors(['status' => 'Your account has been locked.']);
            }
        
            // Redirect to the intended page after successful login
            return redirect()->intended(route('dashboard'));
        } else {
            // Authentication failed
            return redirect()->route('login')
                ->withErrors(['email' => 'Invalid credentials.']);
        }
    }
}
