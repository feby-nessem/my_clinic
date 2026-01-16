<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class appointment extends Model
{
    protected $fillable = [
        'name',
        'phone',
        'appointment_date',
        'appointment_time',
    ];
}
