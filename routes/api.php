<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


//user routes and authentication
Route::get('/users', 'API\UserController@index');
Route::post('/users', 'API\UserController@store');
Route::get('users/{user}', 'API\UserController@show');
Route::delete('users/{user}', 'API\UserController@destroy');
Route::prefix('/users')->middleware(['auth:sanctum',])->group(function(){
    // Route::get('/{user}', 'API\UserController@show');
    Route::post('/{user}','API\UserController@update');//not working in postman with put method but post works
});

//login endpoint
Route::post('login', 'API\LoginController@login');


//verify email routes
Route::get("email/verify/{id}", "API\VerificationController@verify")->name("verificationapi.verify");
Route::get("email/resend", "API\VerificationController@resend")->name("verificationapi.resend");


//address routes
Route::get('/address', 'API\AddressController@index');
Route::prefix('/address')->middleware(['auth:sanctum',])->group(function(){
    
    Route::get('/{address}', 'API\AddressController@show');
    Route::post('', 'API\AddressController@store');
    Route::put('{address}','API\AddressController@update');
    Route::delete('{address}', 'API\AddressController@destroy');
});

//prescription/order
Route::get('/orders', 'API\PrescriptionController@index');

Route::post('/orders','API\PrescriptionController@store');
Route::post('/orders/{id}','API\PrescriptionController@update');


//order details
Route::get('/order-details', 'API\OrderDetailsController@index');


//requesting non existing page
Route::fallback(function(){
    return response()->json([
        'message' => 'Page Not Found.'], 404);
});