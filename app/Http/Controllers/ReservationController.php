<?php

namespace App\Http\Controllers;
use App\Models\Reservation;
use App\Models\ReservationServices;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class ReservationController extends Controller
{
    // Create a reservation
    public function saveReservation(Request $request)
    {

        // Create a new reservation
        $client_id = Session::get('client_id');

        $reservation = new Reservation();
        $reservation->client_id = $client_id;
        $reservation->facility_id = $request->facilityId;
        $reservation->purpose = $request->purpose;
        $reservation->event_name = $request->event_name;
        $reservation->participants = $request->participants;
        $reservation->eventDateFrom = $request->eventDateFrom;
        $reservation->eventDateTo = $request->eventDateTo;
        $reservation->startTime = $request->startTime;
        $reservation->endTime = $request->endTime;
        $reservation->total = $request->totalPrice;
        // Capture other request data

        // Save the reservation
        $reservation->save();

        Session::put('reservation_id', $reservation['id']);

        return response()->json(['message' => 'Reservation created successfully', 'reservation' => $reservation], 201);
    }


    public function checkConflict(Request $request)
    {
        $eventDateFrom = $request->input('eventDateFrom');
        $eventDateTo = $request->input('eventDateTo');
        $startTime = $request->input('startTime');
        $endTime = $request->input('endTime');
    
        $conflictingReservations = Reservation::where('eventDateFrom', '=', $eventDateFrom)
            ->where('eventDateTo', '=', $eventDateTo)
            ->where(function ($query) use ($startTime, $endTime) {
                $query->where(function ($q) use ($startTime, $endTime) {
                    $q->where('startTime', '>=', $startTime)
                        ->where('startTime', '<', $endTime);
                })->orWhere(function ($q) use ($startTime, $endTime) {
                    $q->where('endTime', '>', $startTime)
                        ->where('endTime', '<=', $endTime);
                });
            })
            ->where('status', '=', 1) // Assuming 1 is an approved reservation status
            ->get();
    
        $hasConflict = count($conflictingReservations) > 0;
    
        return response()->json(['hasConflict' => $hasConflict]);
    }

}
