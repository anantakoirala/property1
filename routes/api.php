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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['namespace'=>'Api','middleware'=>['cors']],function(){
    Route::post('register','ApiController@register');
    Route::get('home','ApiController@home');
    Route::get('rent','ApiController@propertyOnRent');
    Route::get('sale','ApiController@propertyOnSale');
    Route::get('invest','ApiController@invest');
    // Route::get('property-detail/{id}','ApiController@propertyDetail');
});
