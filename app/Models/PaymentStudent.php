<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentStudent extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'bank_name',
        'payment_method',
        'payment_picture',
        'status_payment',
        'confirmed_by',
        'student_id',
        'student_registration_id',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function studentRegistration()
    {
        return $this->belongsTo(StudentRegistration::class);
    }
}
