<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Facility;
use App\Models\FacilityPrice;
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
                $facilities     = Facility::with(['prices' => function ($query) use ($currentMonth) {
                    $query->where(function ($q) use ($currentMonth) {
                        $q->where('monthFrom', '<=', $currentMonth)  // Check if the price is valid for the current month
                            ->where(function ($q) use ($currentMonth) {
                                $q->where('monthTo', '>=', $currentMonth) // Check if the price is valid until the end of the current month or indefinitely
                                    ->orWhereNull('monthTo');
                            });
                    });
                }])
                ->get();

            // Transform tags string to array for each facility
                foreach ($facilities as &$facility) {
                    $facility['tagsArray'] = explode(', ', $facility['tags']); // Assuming 'tags' is the field in the Facility model
                }

                return response()->json($facilities);
        }

        //For the Reservation
        public function getFacilityDetails($id)
                {
                    $facility = Facility::find($id);

                    if (!$facility) {
                        return response()->json(['error' => 'Facility not found'], 404);
                    }

                    // Convert the tags string to an array using explode()
                        $tagsArray = explode(', ', $facility->tags); // Assuming tags are separated by a comma and space

                        // Add the tags array to the facility data
                        $facility['tagsArray'] = $tagsArray;
                
                    return response()->json($facility);
                }

//--------------------------------------------------------------------------//

                public function getFacilityPricing($id)
                    {
                        $facility = Facility::with('prices')->find($id);

                        if (!$facility) {
                            return response()->json(['error' => 'Facility not found'], 404);
                        }

                        return response()->json($facility->prices); // Return the pricing details for the facility
                    }


//------------------------------------------------------------------------//
public function saveFacility(Request $request)
    {
        $facility = new Facility();
        $facility->admin_id = Auth::id(); 
        $facility->facility_name = $request->name;
        $facility->shortdes = $request->shortdes;
        $facility->description = $request->description;
        $facility->location = $request->location;
        $facility->capacity = $request->capacity;
        $facility->tags = $request->tags; 
        $facility->save();

        return response()->json(['id' => $facility->id]);

    }

    public function savePrices(Request $request)
    {
        $pricesData = $request->all();

        // dd($pricesData);

        foreach ($pricesData as $price) {
            $facilityPrice = new FacilityPrice(); 
            $facilityPrice->facility_id = $price['facility_id']; // Make sure this matches your data structure
            $facilityPrice->amount = $price['amount'];
            $facilityPrice->monthFrom = $price['monthFrom'];
            $facilityPrice->monthTo = $price['monthTo'];
            $price->timePeriod = $priceData['timePeriod'];
            $facilityPrice->hours = $price['hours'];
            $facilityPrice->save();
        }
        // Return a response indicating success or any other required information
        return response()->json(['message' => 'Prices data successfully saved']);
    
    }

    public function getAllFacilities(Request $request)
    {
        $facilities = Facility::all();

        return $facilities;
    }

    public function deleteFacility($id){
        $res= Facility::find($id)->delete();

        return 1;
       //  $list = $this->table();
       //  return $list;
   }

   public function saveEditedFacilityPrices(Request $request, $id){

    $facility = FacilityPrice::where('facility_id', $id)->delete();

    $pricesData = $request->all();

    // dd($pricesData);

    foreach ($pricesData as $price) {
        $facilityPrice = new FacilityPrice(); 
        $facilityPrice->facility_id = $price['facility_id']; // Make sure this matches your data structure
        $facilityPrice->amount = $price['amount'];
        $facilityPrice->monthFrom = $price['monthFrom'];
        $facilityPrice->monthTo = $price['monthTo'];
        $price->timePeriod = $priceData['timePeriod'];
        $facilityPrice->hours = $price['hours'];
        $facilityPrice->save();
    }
    return response()->json(['message' => 'Facility updated successfully']);
   }


   /// Update facility
   public function updateFacility(Request $request, $id)
   {
       // Validate and update facility data
       $facility = Facility::findOrFail($id);
       $facility->update($request->all());
       $facility->admin_id = Auth::id(); // Set the admin_id here
        $facility->save();


       return response()->json(['message' => 'Facility updated successfully']);
   }



   //List facilities only if sino ti naka logged in
   public function loadAdminFacilities(Request $request)
        {
            $adminId = Auth::id(); // Retrieve the ID of the currently logged-in admin
            
            // Fetch facilities based on admin_id
            $facilities = Facility::where('admin_id', $adminId)->get();

            return response()->json($facilities);

        }

        
    
}
