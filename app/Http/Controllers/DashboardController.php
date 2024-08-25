<?php

namespace App\Http\Controllers;

use App\Models\PaymentStudent;
use App\Models\RegistrationPath;
use App\Models\Student;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class DashboardController extends Controller
{
    public function dataCount(): Response
    {
        $unconfirmedPaymentCount = PaymentStudent::where('status_payment', 'CONFIRMED')->count();

        $studentAccountNotAccepted = Student::whereHas('user', function($query) {
            $query->where('is_active', false);
        })->count();

        $studentRegistered = Student::whereNotNull('batch_id')->count();

        $studentRegisteredToday = Student::whereHas('studentRegistrations', function($query) {
            $query->whereDate('registration_date', today());
        });

        return Inertia::render('Admin/Dashboard', [
            'unconfirmedPaymentCount' => $unconfirmedPaymentCount,
            'studentAccountNotAccepted' => $studentAccountNotAccepted,
            'studentRegistered' => $studentRegistered,
            'studentRegisteredToday' => $studentRegisteredToday,
        ]);
    }
}
