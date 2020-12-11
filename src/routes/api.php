<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/temperatures', 'ApiController@getTemperatures');
Route::get('/temperaturesFromThisWeek/{room}', 'ApiController@getTemperaturesFromThisWeek');
Route::get('/temperaturesFromThisMonth/{room}', 'ApiController@getTemperaturesFromThisMonth');
Route::get('/temperaturesFromThisYear/{room}', 'ApiController@getTemperaturesFromThisYear');
Route::get('/temperatures/latest/{room}', 'ApiController@getLatestTemperature');

Route::get('/humidities', 'ApiController@getHumidities');
Route::get('/humiditiesFromThisWeek/{room}', 'ApiController@getHumiditiesFromThisWeek');
Route::get('/humiditiesFromThisMonth/{room}', 'ApiController@getHumiditiesFromThisMonth');
Route::get('/humiditiesFromThisYear/{room}', 'ApiController@getHumiditiesFromThisYear');
Route::get('/humidities/latest/{room}', 'ApiController@getLatestHumidity');

Route::get('/presencesHours/{room}', 'ApiController@getPresencesHours');
Route::get('/presencesDays/{room}', 'ApiController@getPresencesDays');
Route::get('/presencesMonths/{room}', 'ApiController@getPresencesMonths');

Route::get('/statesHours/{room}', 'ApiController@getStatesHours');
Route::get('/statesDays/{room}', 'ApiController@getStatesDays');
Route::get('/statesMonths/{room}', 'ApiController@getStatesMonths');
Route::get('/states/latest/{room}', 'ApiController@getLatestState');

Route::get('/lux', 'ApiController@getLux');
Route::get('/luxFromThisWeek/{room}', 'ApiController@getLuxFromThisWeek');
Route::get('/luxFromThisMonth/{room}', 'ApiController@getLuxFromThisMonth');
Route::get('/luxFromThisYear/{room}', 'ApiController@getLuxFromThisYear');
Route::get('/lux/latest/{room}', 'ApiController@getLatestLux');

Route::get('/rooms', 'ApiController@getRooms');
Route::get('/events/{room}', 'ApiController@getEvents');
Route::get('/eventHours/{room}', 'ApiController@getEventHours'); 
Route::get('/ghostMeetings/{room}', 'ApiController@getGhostMeetings'); 