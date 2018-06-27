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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Route for property table 
Route::post('insert','propertyController@store');
Route::get('show','propertyController@index');
Route::get('show/{id}','propertyController@show');
Route::get('delete/{id}','propertyController@destroy');
Route::get('edit/{id}','propertyController@edit');
Route::post('update/{id}','propertyController@update');
// Route for 


