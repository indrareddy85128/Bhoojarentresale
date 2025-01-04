<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resale extends Model
{
    protected $fillable = [
        'resale_options',
        'select_flat_size',
        'furnished',
        'name',
        'phone',
        'email',
        'message',
        'authorise',
    ];

    protected $casts = [
        'select_flat_size' => 'array',
        'furnished' => 'array'
    ];
}
