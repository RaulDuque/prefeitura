<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }
}
