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

Route::get('/','HomeController@index')->name('frontend');

Auth::routes();

Route::group(['prefix'=>'admin','middleware'=>'auth','namespace'=>'admin'],function(){
	Route::get('dashboard','DashboardController@index')->name('admin.dashboard');
	Route::resource('slider','SliderController');
	Route::resource('category','CategoryController');
	Route::resource('item','ItemController');
	//reservation request
	Route::get('reservation','ReservationController@index')->name('reservation.index');
	//reservation confirm
	Route::put('reservation/confirm/{id}','ReservationController@confirm')->name('reservation.confirm');
	Route::delete('reservation/destroy/{id}','ReservationController@destroy')->name('reservation.destroy');
	//show Contact Messages
	Route::get('contact','ContactController@index')->name('contact.index');
	Route::get('contact/{id}','ContactController@show')->name('contact.show');
	Route::delete('contact/destroy/{id}','ContactController@destroy')->name('contact.destroy');
});

//for reservation
Route::post('/reservation','ReservationController@reserve')->name('reservation.reserve');
//for Contact
Route::post('/contact','ContactController@SendMessage')->name('contact.send');