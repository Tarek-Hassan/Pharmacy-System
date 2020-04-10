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


Auth::routes();
// Auth::routes(['register' => false]);
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
    
    // Route::get('/users', 'UserController@index')->name('users.index');
    // Route::get('/profile',function(){
            //                 return view("users.profile");
            // });
            Route::get('', 'HomeController@index')->name('home');
// =================================================================================================
Route::get('/login/doctor', 'Auth\LoginController@showDoctorLoginForm');
Route::get('/login/pharmacy', 'Auth\LoginController@showPharmacyLoginForm');
Route::get('/register/doctor', 'Auth\RegisterController@showDoctorRegisterForm');
Route::get('/register/pharmacy', 'Auth\RegisterController@showPharmacyRegisterForm');

Route::post('/login/doctor', 'Auth\LoginController@doctorLogin');
Route::post('/login/pharmacy', 'Auth\LoginController@pharmacyLogin');
Route::post('/register/doctor', 'Auth\RegisterController@createDoctor');
Route::post('/register/pharmacy', 'Auth\RegisterController@createPharmacy');
// Route::prefix('doctor')->group(function(){
//         Route::get('','doctor\LoginController@showLoginForm')->name('doctor.login');
//         Route::post('','doctor\LoginController@showLoginForm');
// });
//         // Route::GET('doctor/home','DoctorController@index');
// // Route::GET('doctor','doctor\LoginController@showLoginForm')->name('doctor.login');
// // Route::POST('doctor','doctor\LoginController@showLoginForm');
// Route::POST('doctor-password/email','doctor\ForgotPasswordController@sendResetLinkEmail')->name('doctor.password.email');
// Route::GET('doctor-password/reset','doctor\ForgotPasswordController@showLinkRequestForm')->name('doctor.password.request');
// Route::POST('doctor-password/reset','doctor\ResetPasswordController@reset');
// Route::GET('doctor-password/reset/{token}','doctor\ResetPasswordController@showResetForm')->name('doctor.password.reset');
// Route::GET('doctor-password/confirm','doctor\ConfirmPasswordController@showConfirmForm')->name('doctor.password.confirm');
// Route::POST('doctor-password/confirm','doctor\ConfirmPasswordController@confirm ');
// // Route::GET('doctor-register','doctor\RegisterController@showRegistrationForm')->name('doctor.register');
// // Route::POST('doctor-register','doctor\RegisterController@register'); 
// // =================================================================================================
// // Route::GET('pharmacy/home','PharmacyController@index');
// Route::GET('pharmacy','pharmacy\LoginController@showLoginForm');
// Route::POST('pharmacy','pharmacy\LoginController@showLoginForm')->name('pharmacy.login');
// Route::POST('pharmacy-password/email','pharmacy\ForgotPasswordController@sendResetLinkEmail')->name('pharmacy.password.email');
// Route::GET('pharmacy-password/reset','pharmacy\ForgotPasswordController@showLinkRequestForm')->name('pharmacy.password.request');
// Route::POST('pharmacy-password/reset','pharmacy\ResetPasswordController@reset');
// Route::GET('pharmacy-password/reset/{token}','pharmacy\ResetPasswordController@showResetForm')->name('pharmacy.password.reset');
// Route::GET('pharmacy-password/confirm','pharmacy\ConfirmPasswordController@showConfirmForm')->name('pharmacy.password.confirm');
// Route::POST('pharmacy-password/confirm','pharmacy\ConfirmPasswordController@confirm ');
// Route::GET('pharmacy-register','pharmacy\RegisterController@showRegistrationForm')->name('pharmacy.register');
// Route::POST('pharmacy-register','pharmacy\RegisterController@register'); 
//********************************GET********************************
//LoginController
// Route::get('/login/doctor', 'Auth\LoginController@showDoctorLoginForm')->name('doctor_login');
// Route::get('/login/pharmacy', 'Auth\LoginController@showPharmacyLoginForm')->name('pharmacy_login');
 
// //RegisterController
// Route::get('/register/doctor', 'Auth\RegisterController@showDoctorRegisterForm')->name('doctor_register');
// Route::get('/register/pharmacy', 'Auth\RegisterController@showPharmacyRegisterForm')->name('pharmacy_register');
 
// //pharmacyController
// Route::get('/pharmacy', 'PharmacyController@pharmacyDashboard')->name('pharmacy_dashboard');
 
// //doctorController
// Route::get('/doctor', 'DoctorController@doctorDashboard')->name('doctor_dashboard');
 
// //HomeController
// Route::get('/home', 'HomeController@index')->name('home');
 
// //********************************POST********************************
// //LoginController
// Route::post('/login/doctor', 'Auth\LoginController@doctorLogin')->name('doctor_login');
// Route::post('/login/pharmacy', 'Auth\LoginController@pharmacyLogin')->name('pharmacy_login');
 
// //RegisterController
// Route::post('/register/doctor', 'Auth\RegisterController@createDoctor')->name('doctor_register');
// Route::post('/register/pharmacy', 'Auth\RegisterController@createPharmacy')->name('pharmacy_register');
