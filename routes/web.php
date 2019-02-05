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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

// Account Controller & Page Routes
Route::resource('accounts', 'AccountController');
Route::get('accounts/export', 'AccountController@export')->name('accounts.export');
Route::get('accounts/importExportView', 'AccountController@importExportView');
Route::post('accounts/import', 'AccountController@import')->name('accounts.import');


// DND Controller & Page Routes
Route::resource('dnds', 'DNDController');
Route::get('dnds/export', 'DNDController@export')->name('dnds.export');
Route::get('dnds/importExportView', 'DNDController@importExportView');
Route::post('dnds/import', 'DNDController@import')->name('dnds.import');


// SportNews Controller & Page Routes
Route::resource('sportnews', 'SportNewsController');


// BusinessNews Controller & Page Routes
Route::resource('businessnews', 'BusinessNewsController');


// Weather Controller & Page Routes
Route::resource('weather', 'WeatherController');


// Reacharge Cards Controller & Page Routes
Route::resource('pins', 'PINSController');


// Reacharge Cards Networks Controller & Page Routes
Route::resource('networks', 'NetworksController');


// Sponsors Controller & Page Routes
Route::resource('sponsors', 'SponsorsController');


// Locations Controller & Page Routes
Route::resource('locations', 'LocationsController');
