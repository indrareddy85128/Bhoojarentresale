<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    protected $fillable = [
        'loan',
        'loan_options',
        'options',
        'name',
        'phone',
        'email',
        'car_number',
        'salary_per_month',
        'loan_amount',
        'message',
        'rc_copy',
        'authorise'
    ];

    protected $casts = [
        'loan_options' => 'array',
        'options' => 'array'
    ];
}
