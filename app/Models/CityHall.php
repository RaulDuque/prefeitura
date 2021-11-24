<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CityHall extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'state',
        'city_hall_cod',
        'phone',
        'population',
        'city_id'
    ];
}
