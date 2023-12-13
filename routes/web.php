<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\FacilitiesController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ReservationServicesController;
use App\Http\Controllers\ServicesController;

use App\Http\Controllers\ImageController;

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


// Route::middleware(['auth', 'admin'])->group(function () {
//     // Routes for the admin dashboard
// });

Route::post('/login', [AuthController::class, 'login']);
Route::post('/check-user', [AuthController::class, 'checkUser']);
Route::post('/logout', [AuthController::class, 'logout']);


Route::post('/save-facility', [FacilitiesController::class, 'saveFacility']);
Route::post('/facility-prices', [FacilitiesController::class, 'savePrices']);

Route::middleware(['auth', 'admin'])->get('/get-admin-id', [AuthController::class, 'getAdminId']); //assign the id of the admin sa facility na inadd


Route::post('/allFacilities', [FacilitiesController::class, 'getAllFacilities']);
Route::post('/delete-facility/{id}',[FacilitiesController::class, 'deleteFacility']);
Route::put('/update-facility/{id}', [FacilitiesController::class, 'updateFacility']);

Route::post('/upload-image', [ImageController::class, 'store']);
Route::post('/imageList', [ImageController::class, 'imageList']);
Route::post('/delete-image/{id}', [ImageController::class, 'deleteImage']);

Route::get('/reservations', [ReservationController::class, 'index']);
Route::get('/services', [ServicesController::class, 'index']);
Route::post('/services', [ServicesController::class, 'store']);
Route::delete('/services/{service}', [ServicesController::class, 'destroy']);


Route::post('/list-facilities/{id}', [FacilitiesController::class, 'getFacilityDetails']);
Route::post('/facility-prices/{id}', [FacilitiesController::class, 'getFacilityPricing']);
Route::post('/save-edited-facility/{id}', [FacilitiesController::class, 'updateFacility']);
Route::post('/save-edited-facility-prices/{id}', [FacilitiesController::class, 'saveEditedFacilityPrices']);


Route::middleware(['auth'])->get('/load-admin-acilities', [FacilitiesController::class, 'loadAdminFacilities']);









Route::get('/{any}', function () {
    return view('app');
})->where('any', '.*');

