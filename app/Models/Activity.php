<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'time',
        'reciprocity',
        'description',
        'pendencies',
        'status',
        'activity_cod',
        'contact_id'
    ];

}
