<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'bank_name',
        'account_number',
        'account_name',
        'price',
        'batch_id',
    ];

    public function registrationBatch()
    {
        return $this->belongsTo(RegistrationBatch::class);
    }
}
