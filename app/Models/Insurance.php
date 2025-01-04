<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Insurance extends Model
{
    protected $fillable = [
        'insurance',
        'name',
        'phone',
        'email',
        'car_number',
        'message',
        'previous_policy',
        'authorise',
    ];
}
