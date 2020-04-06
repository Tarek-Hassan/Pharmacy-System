<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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


// Route::get('/data', function () {
//     return view('data.index');
// });

// Route::prefix('/modelName')->middleware(['auth',])->group(function(){
        // ALLRoutesForThisModel
// });
Auth::routes(['register' => false]);
Route::prefix('/users')->middleware(['auth',])->group(function(){
        Route::get('', 'UserController@index')->name('users.index');//->middleware('verified');
        Route::get('/create', 'UserController@create')->name("users.create");
        Route::post('', 'UserController@store')->name("users.store");
        Route::get('/{user}', 'UserController@show')->name("users.show");
        Route::get('/{user}/edit', 'UserController@edit')->name("users.edit");
        Route::put('/{user}', 'UserController@update')->name("users.update");
        Route::delete('/{user}', 'UserController@destroy')->name("users.destroy");
});

Route::prefix('/areas')->middleware(['auth',])->group(function(){
        Route::get('', 'AreaController@index')->name('areas.index');
        Route::get('/create', 'AreaController@create')->name("areas.create");
        Route::post('', 'AreaController@store')->name("areas.store");
        Route::get('/{area}', 'AreaController@show')->name("areas.show");
        Route::get('/{area}/edit', 'AreaController@edit')->name("areas.edit");
        Route::put('/{area}', 'AreaController@update')->name("areas.update");
        Route::delete('/{area}', 'AreaController@destroy')->name("areas.destroy");
});
Route::prefix('/payment')->middleware(['auth',])->group(function(){
        Route::get('', 'StripePaymentController@index')->name('stripe.index');
Route::get('/create', 'StripePaymentController@stripe')->name('stripe.create');
Route::post('', 'StripePaymentController@stripePost')->name('stripe.store');
Route::delete('/{id}', 'StripePaymentController@destroy')->name("stripe.destroy");
});
// Route::get('/users', 'UserController@index')->name('users.index');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('', 'HomeController@index')->name('home');


//email verfication trial registration form 
// Auth::routes(['verify'=> true]);
