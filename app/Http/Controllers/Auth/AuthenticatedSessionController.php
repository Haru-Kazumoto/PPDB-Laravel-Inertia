<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;

class AuthenticatedSessionController extends Controller
{
    public function create(): Response
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->is_admin) {
                return redirect()->route('dashboard.admin');
            } else {
                return redirect()->route('dashboard.user');
            }
        }

        // Ini akan memastikan tidak terjadi loop jika pengguna sudah login dan sedang mencoba mengakses login page.
        return Inertia::render('Auth/Signin');
    }

    public function login(LoginRequest $loginRequest): RedirectResponse
    {
        $loginRequest->authenticate();

        $loginRequest->session()->regenerate();

        $user = $loginRequest->user();

        if($user->is_admin) {
            return redirect()->intended(route('dashboard.admin', absolute: false));
        } else {
            return redirect()->intended(route('dashboard.user', absolute: false));
        }

    }

    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
