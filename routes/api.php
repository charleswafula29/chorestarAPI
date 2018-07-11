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
Route::post('/Register','ParentsController@RegisterParent');
Route::get('/Login/{Email}/{Pass}','ParentsController@Login');
Route::get('/FetchProfile/{Email}','ChildrenController@FetchProfile');
Route::get('/DeleteProfile/{Email}/{ChildName}','ChildrenController@DeleteProfile');
Route::post('/RegisterChild','ChildrenController@Register');
Route::post('/NewChore','ChoresController@NewChore');
Route::get('/FetchChores/{Email}','ChoresController@FetchChores');
Route::get('/FetchAlerts/{Email}','ChoresController@FetchAlerts');
Route::get('/ChoreDone/{Email}/{ChildName}/{ChoreName}','ChoresController@ChoreDone');
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
