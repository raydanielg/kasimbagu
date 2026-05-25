<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'email',
        'phone',
        'booking_type',
        'destination',
        'departure_date',
        'return_date',
        'passengers',
        'status',
        'message',
    ];

    protected $casts = [
        'departure_date' => 'date',
        'return_date' => 'date',
        'passengers' => 'integer',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
