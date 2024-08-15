<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\User;
use Illuminate\Foundation\Exceptions\Renderer\Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class RegisteredUserController extends Controller
{
    public function create(): Response
    {
        return Inertia::render('Auth/Register');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'fullname' => 'required|string',
            'username' => 'required|string',
            'email' => 'required|string|email|unique:users,email',
            'phone' => 'required|string',
            'school_origin' => 'required|string',
            'age' => 'required|integer',
            'student_picture' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        DB::beginTransaction();

        try {
            $user = User::create([
                'email' => $request->input('email'),
                'is_active' => false,
                'is_admin' => false,
            ]);

            $studentPicture = $request->file('student_picture');
            $imageName = Str::uuid() . '.' . $studentPicture->getClientOriginalExtension();

            //storing file
            Storage::putFileAs(
                'student_photos', $studentPicture, $imageName
            );

            Student::create([
                'user_id' => $user->id,
                'fullname' => $user->fullname,
                'phone' => $request->input('phone'),
                'school_origin' => $request->input('school_origin'),
                'age' => $request->input('age'),
                'student_picture' => $imageName,
            ]);

            DB::commit();

            Alert::info(
                'Informasi registrasi',
                'Data berhasil disimpan, namun anda harus menunggu admin mengaktifkan akun anda dan dikirim melalui email tertera'
            );

            return redirect()->intended(route('login', absolute: false));
        } catch(\Exception $error) {
            DB::rollback();

            return redirect()->back()->withErros([
                'error' => 'An error occured while creating data'
            ])->withInput();
        }
    }
}
