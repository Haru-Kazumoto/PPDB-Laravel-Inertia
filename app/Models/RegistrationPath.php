<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistrationPath extends Model
{
    use HasFactory;

    protected $fillable = [
        'path_name',
        'path_type',
    ];

    public function registrationBatches()
    {
        return $this->hasMany(RegistrationBatch::class);
    }
}
