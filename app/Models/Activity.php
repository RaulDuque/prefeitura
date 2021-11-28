<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Activity extends Model
{
    use HasFactory;
    protected $fillable = [
        'time',
        'description',
        'pendencies',
        'status',
        'receptivity_id',
        'activity_type_id',
        'contact_id',

    ];
    protected $casts = [
        'time' => 'datetime'
    ];
    public function contact(): BelongsTo
    {
        return $this->belongsTo(Contact::class);
    }
}
