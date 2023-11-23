<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'facility_id',
        'event_name',
        'purpose',
        'eventDateFrom',
        'eventDateTo',
        'startTime',
        'endTime',
        'participants',
        'total'
    ];

    // Define relationships
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function reservationServices()
    {
        return $this->hasMany(ReservationServices::class);
    }

}
