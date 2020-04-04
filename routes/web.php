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
        Route::get('', 'UserController@index')->name('users.index');
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
// Route::get('/users', 'UserController@index')->name('users.index');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('', 'HomeController@index')->name('home');
