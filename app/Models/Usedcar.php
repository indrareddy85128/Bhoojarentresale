<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usedcar extends Model
{
    protected $fillable = [
        'car_make_model',
        'manufacturing_year',
        'kilometers',
        'car_number',
        'name',
        'phone',
        'email',
        'message',
        'rc_copy',
        'authorise',
    ];
}
