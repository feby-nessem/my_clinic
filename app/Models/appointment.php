<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Model;

class appointment extends Model
{

    protected $fillable = [
        'name',
        'phone',
        'appointment_datetime',
          ];
    protected function casts(): array
    {
        return  [
            'appointment_datetime' => 'datetime',
        ];
    }

}
