<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
    protected $fillable = [
        'rent_options',
        'select_flat_size',
        'furnished',
        'name',
        'phone',
        'email',
        'message',
        'resume',
        'authorise',
    ];

    protected $casts = [
        'select_flat_size' => 'array',
        'furnished' => 'array'
    ];
}
