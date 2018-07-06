<?php

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

Route::get('/', function () {
    return view('welcome');
});
// get decrlation form 
Route::get('/declarationfom', function () {
    return view('displayrecord.declarationform');
})->name('declarationfom')->middleware('auth');

// get reviw form 
Route::get('/review', function () {
    return view('displayrecord.review');
})->name('review')->middleware('auth');
// get witness form
Route::get('/witness', function () {
    return view('displayrecord.review');
})->name('witness')->middleware('auth');


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

// Route for property table 
Route::get('propertyform','propertyController@propertyform')->name('propertyform')->middleware('auth');
Route::post('insertproperty','propertyController@store')->name('insertproperty')->middleware('auth');
Route::get('show','propertyController@index')->name('show')->middleware('auth');
Route::get('show/{id}','propertyController@show')->name('show')->middleware('auth');
Route::get('delete/{id}','propertyController@destroy')->name('delete')->middleware('auth');
Route::get('edit/{id}','propertyController@edit')->name('edit')->middleware('auth');
Route::post('update/{id}','propertyController@update')->name('update')->middleware('auth');
// Route for applicant form with last entered property ID
// Route::get('applicantform','propertyController@applicantform')->name('applicantform')->middleware('auth');
// Route for the applicant form 
Route::post('insertapplicantinfo','applicantController@store')->name('insertapplicantinfo')->middleware('auth');
// Route for payment table
Route::post('insertpayment','paymentcontroller@store')->name('insertpayment')->middleware('auth');
// Route for installment
Route::post('installments','installmentsController@store')->name('installments')->middleware('auth');
// show info about properties 
Route::get('properties','propertiesformController@index')->name('properties')->middleware('auth');
// show info single property 
Route::get('singlerecord/{id}','propertiesformController@show')->name('singlerecord')->middleware('auth');




