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
Route::get('/login', function () {
    return view('welcome');
});
Route::get('/register', function () {
    return view('welcome');
});
// all the printed form routes 
// get decrlation form 
Route::get('/declarationfom', function () {
    return view('displayrecord.declarationform');
})->name('declarationfom')->middleware('auth');

Route::get('/formall', function () {
    return view('registrationfrom.registrationform');
})->name('formall')->middleware('auth');


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
// Route::get('show','propertyController@index')->name('show')->middleware('auth');
// Route::get('show/{id}','propertyController@show')->name('show')->middleware('auth');
// Route::get('delete/{id}','propertyController@destroy')->name('delete')->middleware('auth');
// Route::get('edit/{id}','propertyController@edit')->name('edit')->middleware('auth');
// Route::post('update/{id}','propertyController@update')->name('update')->middleware('auth');
// Route for applicant form with last entered property ID
// Route::get('applicantform','propertyController@applicantform')->name('applicantform')->middleware('auth');
// Route for the applicant form 
Route::post('insertapplicantinfo','applicantController@store')->name('insertapplicantinfo')->middleware('auth');
Route::post('updateapplicant/{id}','applicantController@update')->name('updateapplicant')->middleware('auth');
// Route for payment table
Route::post('insertpayment','paymentcontroller@store')->name('insertpayment')->middleware('auth');
// Route for installment
Route::post('installments','installmentsController@store')->name('installments')->middleware('auth');
// show info about properties 
Route::get('properties','propertiesformController@index')->name('properties')->middleware('auth');
// show info single property 
Route::get('singlerecord/{id}','propertiesformController@show')->name('singlerecord')->middleware('auth');


// complete form display and edit 


Route::get('display/{id}','editingControll@show')->name('display')->middleware('auth');
Route::get('editingform/{id}','editingControll@edit')->name('editingform')->middleware('auth');
Route::post('allformdata','editingControll@store')->name('allformdata')->middleware('auth');
Route::post('updating/{id}','editingControll@update')->name('updating')->middleware('auth');
Route::get('deleteform/{id}','editingControll@destroy')->name('deleteform')->middleware('auth');

// get the forms for print 
Route::get('form1/{id}','formController@show')->name('form1')->middleware('auth');
Route::get('form2/{id}','formController@showform2')->name('form2')->middleware('auth');
Route::get('form3/{id}','formController@showform3')->name('form3')->middleware('auth');
Route::get('Receptform/{id}','formController@showReceptform')->name('Receptform')->middleware('auth');
Route::get('contractform/{id}','formController@showcontractform')->name('contractform')->middleware('auth');







