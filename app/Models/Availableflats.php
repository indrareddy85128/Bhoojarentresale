<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Availableflats extends Model
{
    protected $fillable = [
        'image',
        'name',
        'type',
        'bedroom',
        'bathroom',
        'sft',
        'content'
    ];
}
