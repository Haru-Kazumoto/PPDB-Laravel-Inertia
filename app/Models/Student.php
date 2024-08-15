<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'fullname',
        'surname',
        'phone',
        'birthdate',
        'birth_city',
        'school_origin',
        'student_picture',
        'address',
        'nisn',
        'gender',
        'path_id',
        'batch_id',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function studentRegistrations()
    {
        return $this->hasMany(StudentRegistration::class);
    }

    public function paymentStudents()
    {
        return $this->hasMany(PaymentStudent::class);
    }
}
