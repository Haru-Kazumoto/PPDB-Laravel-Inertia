<?php

namespace App\Http\Controllers\Email;

use App\Http\Controllers\Controller;
use App\Mail\ActivateAccount;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ActivateAccountController extends Controller
{
    public function sendEmail(User $user): void
    {
        $toEmail = $user->email;
        $messageData = [
            'writeMessage' => "Selamat akun anda telah di setujui, silahkan registrasi di aplikasi kami",
            'accountUsername' => $user->username,
            'accountPassword' => $user->password
        ];
        $subject = "Registrasi Akun";

        Mail::to($toEmail)->send(new ActivateAccount($messageData, $subject));
    }
}
