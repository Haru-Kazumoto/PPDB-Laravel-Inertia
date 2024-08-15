<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentRegistration extends Model
{
    use HasFactory;

    protected $fillable = [
        'registration_date',
        'registration_number',
        'period',
        'selected_major',
        'student_id',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function paymentStudents()
    {
        return $this->hasMany(PaymentStudent::class);
    }
}
