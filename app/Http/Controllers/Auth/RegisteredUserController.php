<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;
use Inertia\Response;

class RegisteredUserController extends Controller
{
    public function createStudent(): Response
    {
        return Inertia::render('Auth/Register');
    }

    public function createAdmin(): Response
    {
        return Inertia::render('Auth/RegisterAdmin');
    }

    public function storeStudent(Request $request): RedirectResponse
    {
        $request->validate([
            'fullname' => 'required|string',
            'email' => 'required|string|email|unique:users,email',
            'phone' => 'required|string',
            'school_origin' => 'required|string',
            'gender' => 'required|string',
        ]);

        DB::beginTransaction();

        try {
            $user = User::create([
                'email' => $request->input('email'),
                'is_active' => false,
                'is_admin' => false,
            ]);

            $student = new Student([
                'fullname' => $request->input('fullname'),
                'phone' => $request->input('phone'),
                'school_origin' => $request->input('school_origin'),
                'gender' => $request->input('gender')
            ]);

            $user->student()->save($student);

            DB::commit();

            return redirect()->intended(route('login', absolute: false));
        } catch(\Exception $error) {
            DB::rollback();

            return redirect()->back()->withErrors([
                'error' => $error->getMessage()
            ])->withInput();
        }
    }


    public function storeAdmin(Request $request): RedirectResponse
    {
        $request->validate([
            'fullname' => 'required|string|max:255',
            'username' => 'required|string|unique:users,username',
            'password' => 'required|string',
            'email' => 'required|string|unique:users,email'
        ]);

        DB::beginTransaction();

        try {
            User::create([
                'fullname' => $request->input('fullname'),
                'username' => $request->input('username'),
                'password' => Hash::make($request->input('password')),
                'email' => $request->input('email'),
                'is_active' => true,
                'is_admin' => true,
            ]);

            DB::commit();

            return redirect()->intended(route('login', absolute: false));
        } catch(\Exception $error) {
            DB::rollback();

            return redirect()->back()->withErrors([
                'error' => $error->getMessage()
            ])->withInput();
        }
    }

    public function activateStudentAccount(User $user)
    {}
}
