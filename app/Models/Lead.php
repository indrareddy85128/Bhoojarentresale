<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'email',
        'phone',
        'lead_source',
        'lead_status',
        'form_data',
        'message',
    ];

    protected $casts = [
        'form_data' => 'json',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
