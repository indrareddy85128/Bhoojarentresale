<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Availableflatfrom extends Model
{
    protected $fillable = [

        'name',
        'phone',
        'email',
        'subject',
        'authorise'
    ];
}
