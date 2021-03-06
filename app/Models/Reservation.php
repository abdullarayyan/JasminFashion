<?php

namespace App\Models;

use Database\Factories\ReservationFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
//    protected $guarded = ['id'];



    protected $table = 'reservations';
    protected $fillable = [
        'customer_name', 'mobile'
    ];
}
