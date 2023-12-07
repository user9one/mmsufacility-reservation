<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\FacilitiesController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ReservationServicesController;
use App\Http\Controllers\ServicesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// -----------------------------CLIENT--------------------------//
Route::get('/services', [ServicesController::class, 'fetchServices']); //fetch services_name sa table kuya
Route::get('/list-facilities', [FacilitiesController::class, 'loadFacilities']); //fetch facilities para idjy facilities a page haha


Route::get('/list-facilities/{id}', [FacilitiesController::class, 'getFacilityDetails']); //fetching facility details (for the reservation idjy facility_name)
Route::get('/facility-pricing/{id}', [FacilitiesController::class, 'getFacilityPricing']);//fetching facility price whatever 
Route::get('/facility-details/{id}', [FacilitiesController::class, 'getFacilityDetails']);

//SUBMIT THE RESERVATION
Route::post('/save-client', [ClientController::class, 'saveClient']);
Route::post('/save-reservation', [ReservationController::class, 'saveReservation']);
Route::post('/save-services-availed', [ReservationServicesController::class, 'saveReservationService']);






// -----------------------------ADMIN--------------------------//

Route::view('/admin', 'admin');


Route::middleware(['auth', 'admin'])->group(function () {
    // Routes for the admin dashboard
});

Route::post('/login', [AuthController::class, 'login']);
Route::post('/check-user', [AuthController::class, 'checkUser']);
Route::post('/logout', [AuthController::class, 'logout']);










Route::get('/{any}', function () {
    return view('app');
})->where('any', '.*');

