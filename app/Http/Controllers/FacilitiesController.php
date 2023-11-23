<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use App\Models\Price;
use Carbon\Carbon;

use Illuminate\Http\Request;


class FacilitiesController extends Controller
{


            //from the internet, Carbon, idk what is carbon ;<
            public function loadFacilities (Request $request)
            {
            // Get the current month (assuming it's 1-12)
                $currentMonth = date('n');

                // Load facilities with prices for the current month
                $facilities = Facility::with(['prices' => function ($query) use ($currentMonth) {
                    $query->where(function ($q) use ($currentMonth) {
                        $q->where('monthFrom', '<=', $currentMonth)  // Check if the price is valid for the current month
                            ->where(function ($q) use ($currentMonth) {
                                $q->where('monthTo', '>=', $currentMonth) // Check if the price is valid until the end of the current month or indefinitely
                                    ->orWhereNull('monthTo');
                            });
                    });
                }])
                ->get();

            return $facilities;
        }



        //For the Reservation
        public function getFacilityDetails($id)
                {
                    $facility = Facility::find($id);

                    if (!$facility) {
                        return response()->json(['error' => 'Facility not found'], 404);
                    }
                
                    return response()->json($facility);
                }
}
