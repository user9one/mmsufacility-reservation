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
}
