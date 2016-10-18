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

Route::get('/', 'HomeController@index');

Auth::routes();


Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index');
    Route::get('/password/reset', function() {
    	return redirect('/home');
    });



    Route::get('/vehicle/add', function(){
    	return view('vehicle.add');
    });
    Route::post('/vehicle/save', 'VehicleController@save');
    Route::get('/vehicle/view/{id}', 'VehicleController@view');
    Route::get('/vehicle/edit/{id}', 'VehicleController@edit');
    Route::post('/vehicle/update/{id}', 'VehicleController@update');
    Route::get('/vehicle/remove/{id}', 'VehicleController@remove');
});