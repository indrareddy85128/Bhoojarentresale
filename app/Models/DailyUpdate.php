<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DailyUpdate extends Model
{
    protected $fillable = [
        'lead_id',
        'update_type',
        'comment',
        'next_call_date',
    ];

    public function lead()
    {
        return $this->belongsTo(Lead::class);
    }
}
