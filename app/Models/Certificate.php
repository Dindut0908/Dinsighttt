<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'issuer',
        'issued_date',
        'image',
        'credential_url',
    ];

    protected $casts = [
        'issued_date' => 'date',  // otomatis jadi Carbon (bisa format)
    ];
}