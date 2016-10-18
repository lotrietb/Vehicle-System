<?php

use Illuminate\Http\Request;

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




Route::group(['middleware' => 'auth:api'], function () {

	Route::get('/vehicles', 'ApiController@vehicles');
    Route::get('/vehicles/{id}', 'ApiController@vehicle');
    Route::post('/addvehicle', 'ApiController@save');
    Route::post('/updatevehicle/{id}', 'ApiController@update');
    Route::get('/removevehicle/{id}', 'ApiController@remove');
});