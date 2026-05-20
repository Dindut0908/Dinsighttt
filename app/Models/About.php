<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $fillable = [
    'fullname',
    'email',
    'phone',
    'education',
    'address',
    'description',
    'photo'
];
}
