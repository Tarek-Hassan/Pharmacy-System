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
Route::get('users/{user}', 'API\UserController@show')->middleware('auth:sanctum');
Route::post('/users', 'API\UserController@store');
Route::put('/users/{user}','API\UserController@update')->middleware('auth:sanctum');
Route::delete('users/{user}', 'API\UserController@destroy');

//login endpoint
Route::post('login', 'API\LoginController@login');


//verify email routes
Route::get("email/verify/{id}", "API\VerificationController@verify")->name("verificationapi.verify");
Route::get("email/resend", "API\VerificationController@resend")->name("verificationapi.resend");


//address routes
Route::get('/address', 'API\AddressController@index');
Route::get('address/{address}', 'API\AddressController@show');//->middleware('auth:sanctum');
Route::post('/address', 'API\AddressController@store');
Route::put('/address/{address}','API\AddressController@update');//->middleware('auth:sanctum');
Route::delete('address/{address}', 'API\AddressController@destroy');


//prescription
Route::post('/prescription','API\PrescriptionController@store');