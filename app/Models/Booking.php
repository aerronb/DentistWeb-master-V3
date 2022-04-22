<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class Booking extends Model
{
    use HasFactory;

    protected $table = 'bookings';
    protected $dates = ['date_of_appointment'];
    protected $fillable = [
        'user_id',
        'dentist',
        'type_of_appointment',
        'date_of_appointment',
        'type_of_appointment',
    ];
}
