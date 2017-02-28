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


Route::get('/','ApartmanController@getAll');
Route::get('/details/{id}', 'ApartmanController@getById');


Route::group(['middleware' => 'auth:api'], function () {
    Route::get('apartmans', 'ApartmanController@getAll');
    Route::post('reserve', 'OrderController@reserve');
    Route::get('reservation/{id}', 'OrderController@getOrdersByUserId');

});

