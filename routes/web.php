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

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/service-payment', 'ServiceController@customer_payment')->name('service.payment');
Route::post('/service-payment', 'ServiceController@customer_payment_store')->name('service.payment.store');
Route::get('/service-payment-all', 'ServiceController@customer_payment_index')->name('service.payment.index');
Route::get('/', 'HomeController@index')->name('welcome');

Auth::routes([
    'register' => true, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
  ]);

Route::resource('customer', 'CustomerController');
Route::resource('card', 'CardController');
Route::resource('item', 'ItemController');
Route::resource('service', 'ServiceController');