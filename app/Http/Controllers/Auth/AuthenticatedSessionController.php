<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use RealRashid\SweetAlert\Facades\Alert;

class AuthenticatedSessionController extends Controller
{
    public function create() 
    {
        return Inertia::render('Auth/Signin');
    }

    public function login(LoginRequest $loginRequest)
    {
        $loginRequest->authenticate();

        $loginRequest->session()->regenerate();

        $user = $loginRequest->user();

        Alert::success("Success login");
        
        if($user->is_admin) {
            return redirect()->intended(route('dashboard.admin', absolute: false));
        } else {
            return redirect()->intended(route('dashboard.user', absolute: false));
        }

    }

    public function destroy(Request $request) 
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Inertia::location(route('auth.login'));
    }
}
