<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $fillable = [
        'big_image',
        'small_image',
        'video_link',
        'heading',
        'content',
    ];
}
