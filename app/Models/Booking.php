<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Booking extends Model
{
    use HasFactory;


    protected $table = 'bookings';
    protected $dates = ['date_of_appointment'];
    protected $fillable = [
        'user_id',
        'dentist_id',
        'type_of_appointment',
        'date_of_appointment',
        'type_of_appointment',
        'created_at',
        'updated_at',
    ];

}
