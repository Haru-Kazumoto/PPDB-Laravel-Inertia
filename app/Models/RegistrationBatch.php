<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistrationBatch extends Model
{
    use HasFactory;

    protected $fillable = [
        'batch_name',
        'batch_type',
        'open_date',
        'closed_date',
        'path_id',
    ];

    public function registrationPath()
    {
        return $this->belongsTo(RegistrationPath::class);
    }

    public function paymentInfo()
    {
        return $this->hasOne(PaymentInfo::class);
    }
}
