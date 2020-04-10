<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/data', function () {
//     return view('data.index');
// });

// Route::prefix('/modelName')->middleware(['auth',])->group(function(){
        // ALLRoutesForThisModel
// });
Auth::routes();
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
Route::prefix('/medicines')->middleware(['auth',])->group(function(){
        Route::get('', 'MedicineController@index')->name('medicines.index');
        Route::get('/create', 'MedicineController@create')->name("medicines.create");
        Route::post('', 'MedicineController@store')->name("medicines.store");
        Route::get('/{medicine}', 'MedicineController@show')->name("medicines.show");
        Route::get('/{medicine}/edit', 'MedicineController@edit')->name("medicines.edit");
        Route::put('/{medicine}', 'MedicineController@update')->name("medicines.update");
        Route::delete('/{medicine}', 'MedicineController@destroy')->name("medicines.destroy");
});
Route::prefix('/orders')->middleware(['auth',])->group(function(){
        Route::get('', 'OrderController@index')->name('orders.index');
        Route::get('/create', 'OrderController@create')->name("orders.create");
        Route::post('', 'OrderController@store')->name("orders.store");
        Route::get('/{order}', 'OrderController@show')->name("orders.show");
        Route::get('/{order}/edit', 'OrderController@edit')->name("orders.edit");
        Route::put('/{order}', 'OrderController@update')->name("orders.update");
        Route::delete('/{order}', 'OrderController@destroy')->name("orders.destroy");
});
Route::prefix('/medicineorders')->middleware(['auth',])->group(function(){
        Route::get('', 'MedicineOrderController@index')->name('medicineorders.index');
        Route::get('/create', 'MedicineOrderController@create')->name("medicineorders.create");
        Route::post('', 'MedicineOrderController@store')->name("medicineorders.store");
        Route::get('/{medicineorder}', 'MedicineOrderController@show')->name("medicineorders.show");
        Route::get('/{medicineorder}/edit', 'MedicineOrderController@edit')->name("medicineorders.edit");
        Route::put('/{medicineorder}', 'MedicineOrderController@update')->name("medicineorders.update");
        Route::delete('/{medicineorder}', 'MedicineOrderController@destroy')->name("medicineorders.destroy");
});
Route::prefix('/doctors')->middleware(['auth',])->group(function(){
        Route::get('', 'DoctorController@index')->name('doctors.index');
        Route::get('/create', 'DoctorController@create')->name("doctors.create");
        Route::post('', 'DoctorController@store')->name("doctors.store");
        Route::get('/{doctor}', 'DoctorController@show')->name("doctors.show");
        Route::get('/{doctor}/edit', 'DoctorController@edit')->name("doctors.edit");
        Route::put('/{doctor}', 'DoctorController@update')->name("doctors.update");
        Route::delete('/{doctor}', 'DoctorController@destroy')->name("doctors.destroy");
});       
Route::prefix('/pharmacies')->middleware(['auth',])->group(function(){
        Route::get('', 'PharmacyController@index')->name('pharmacies.index');
        Route::get('/create', 'PharmacyController@create')->name("pharmacies.create");
        Route::post('', 'PharmacyController@store')->name("pharmacies.store");
        Route::get('/{pharmacy}', 'PharmacyController@show')->name("pharmacies.show");
        Route::get('/{pharmacy}/edit', 'PharmacyController@edit')->name("pharmacies.edit");
        Route::put('/{pharmacy}', 'PharmacyController@update')->name("pharmacies.update");
        Route::delete('/{pharmacy}', 'PharmacyController@destroy')->name("pharmacies.destroy");
});
// Route::get('/users', 'UserController@index')->name('users.index');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('', 'HomeController@index')->name('home');


