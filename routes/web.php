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
Route::prefix('/address')->middleware(['auth',])->group(function(){
        Route::get('', 'AddressController@index')->name('address.index');
        Route::get('/create', 'AddressController@create')->name("address.create");
        Route::post('', 'AddressController@store')->name("address.store");
        Route::get('/{address}', 'AddressController@show')->name("address.show");
        Route::get('/{address}/edit', 'AddressController@edit')->name("address.edit");
        Route::put('/{address}', 'AddressController@update')->name("address.update");
        Route::delete('/{address}', 'AddressController@destroy')->name("address.destroy");
});
Route::prefix('/payment')->middleware(['auth',])->group(function(){
        Route::get('', 'StripePaymentController@index')->name('stripe.index');
        Route::get('/create', 'StripePaymentController@stripe')->name('stripe.create');
        Route::post('', 'StripePaymentController@stripePost')->name('stripe.store');
        Route::delete('/{id}', 'StripePaymentController@destroy')->name("stripe.destroy");
});

Route::prefix('/markAsRead')->middleware(['auth',])->group(function(){
        Route::get('', function(){
                auth()->user()->unreadNotifications->markAsRead();
	                return redirect()->back();

        })->name('mark');
    });
// Route::prefix('/deleteNotification')->middleware(['auth',])->group(function(){
//         Route::get('', function(){
//                 auth()->user()->notifications()->delete();
// 	                return redirect()->back();

//         })->name('deleteNotification');
//     });


//Notify Route this put in OrderController To NOtifiyPrice
Route::get('/notify', function () {
        $user = \App\User::find(7);
        $orderno=101;
        $price=2000;
        $details = [
                'body'=>"Cost Of OrderNO. : $orderno  is $price $"
        ];
        $user->notify(new \App\Notifications\PriceNotification($details));
    });
    
  
    // =================================================================================================
//     Route::get('', 'HomeController@index')->name('doctor.index');
// =================================================================================================
// Route::get('/users', 'UserController@index')->name('users.index');
// Route::get('', 'HomeController@index')->name('home');
// Route::prefix('doctor')->group(function() {
        //         Auth::routes(['register' => false]);
        //      });
        //         Route::namespace('Doctor')->name('doctor.')->prefix('doctor')->group(function () {
                //                 Route::get('login', 'DoctorAuthController@getLogin')->name('login');
                //                 Route::post('login', 'DoctorAuthController@postLogin');
                //         });
                //         Route::middleware('auth:doctor')->group(function(){
                        // Route::get('/home', 'HomeController@index')->name('home');
                        //                 //here all your admin routes
                        
                        //               });
                        
// =================================================================================================
Route::GET('',function(){return view('admin.index');})->name('doctor.index')->middleware('auth:doctor');
Route::GET('/home',function(){return view('admin.index');})->name('doctor.index')->middleware('auth');
Route::GET('doctor','doctor\LoginController@showLoginForm')->name('doctor.login');
Route::POST('doctor','doctor\LoginController@login');
Route::POST('doctor-password/email','doctor\ForgotPasswordController@sendResetLinkEmail')->name('doctor.password.email');
Route::GET('doctor-password/reset','doctor\ForgotPasswordController@showLinkRequestForm')->name('doctor.password.request');
Route::POST('doctor-password/reset','doctor\ResetPasswordController@reset');
Route::GET('doctor-password/reset/{token}','doctor\ResetPasswordController@showResetForm')->name('doctor.password.reset');
// =================================================================================================
Route::GET('',function(){return view('admin.index');})->name('pharmacy.index')->middleware('auth:pharmacy');
Route::GET('pharmacy','pharmacy\LoginController@showLoginForm')->name('pharmacy.login');
Route::POST('pharmacy','pharmacy\LoginController@login');
Route::POST('pharmacy-password/email','pharmacy\ForgotPasswordController@sendResetLinkEmail')->name('pharmacy.password.email');
Route::GET('pharmacy-password/reset','pharmacy\ForgotPasswordController@showLinkRequestForm')->name('pharmacy.password.request');
Route::POST('pharmacy-password/reset','pharmacy\ResetPasswordController@reset');
Route::GET('pharmacy-password/reset/{token}','pharmacy\ResetPasswordController@showResetForm')->name('pharmacy.password.reset');
// Route::GET('doctor-password/confirm','doctor\ConfirmPasswordController@showConfirmForm')->name('doctor.password.confirm');
// Route::POST('doctor-password/confirm','doctor\ConfirmPasswordController@confirm ');
// Route::GET('doctor-register','doctor\RegisterController@showRegistrationForm')->name('doctor.register');
// Route::POST('doctor-register','doctor\RegisterController@register'); 
Route::GET('/a',function(){return view('layouts.login');});