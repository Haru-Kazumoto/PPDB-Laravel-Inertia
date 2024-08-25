<?php

namespace App\Models;

use App\Enum\PathType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistrationPath extends Model
{
    use HasFactory;

    protected $fillable = [
        'path_name',
        'path_type',
    ];

    public function casts(): array
    {
        return [
            'path_type' => PathType::class,
        ];
    }

    public function registrationBatches()
    {
        return $this->hasMany(RegistrationBatch::class, 'path_id');
    }
}
