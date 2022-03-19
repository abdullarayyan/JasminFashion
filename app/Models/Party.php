<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Party extends Model
{
    use HasFactory;
    protected $guarded = ['id'];


    protected $table = 'parties';
    protected $casts = [
        'size' => 'array'
    ];
}
