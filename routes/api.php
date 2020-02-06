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


// API AUTH ROUTES
Auth::routes(); // Should be disabled (commented out) later on to disenable further auth account creation

// API APPS ROUTES
Route::middleware('auth:api')->group( function () {
	// Candle Resources
	Route::resource('locations', 'API\LocationsApiController');
	Route::resource('sponsors', 'API\SponsorApiController');
	Route::resource('networks', 'API\NetworksApiController');

	// Candle Apps
	Route::resource('sports', 'API\SportsApiController');
	Route::resource('weather', 'API\WeatherApiController');
	Route::resource('freebies', 'API\FreebiesApiController');
	Route::resource('business', 'API\BusinessNewsApiController');
	Route::resource('canalytics', 'API\CandleAnalyticsApiController');
	Route::resource('canalytics_indoor', 'API\CandleAnalyticsIndoorApiController');
});

// Sample GET API
// Route::get('route_name', 'Api\ControllerApi@index');
