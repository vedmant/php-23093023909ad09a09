<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::auth();

Route::get('/', 'HomeController@index');
Route::post('/book', 'HomeController@postBook');
Route::get('/booked', 'HomeController@booked');

/**
 * Admin area
 */
Route::group(['prefix' => 'admin', 'middleware' => 'admin', 'namespace' => 'Admin'], function () {

    Route::get('/', function () {
        return view('+admin.dashboard.index');
    });

    Route::resource('customer', 'CustomerController');
    Route::resource('booking', 'BookingController');
    Route::resource('cleaner', 'CleanerController');
    Route::resource('city', 'CityController');

});
Auth::routes();

Route::get('/home', 'HomeController@index');
