<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['namespace'=>'Admin'],function(){
    Route::get('login','LoginController@login')->name('login');
    Route::post('postLogin','LoginController@postLogin')->name('postLogin');
});

Route::group(['namespace'=>'Admin','middleware'=>['auth'],'prefix'=>'admin'],function(){
    Route::resource('dashboard','DashboardController');
    Route::get('logout','LoginController@Logout')->name('logout');
    Route::resource('property','PropertyController');
    Route::get('property/add/house','PropertyController@addHouse')->name('addHouse');
    Route::get('property/add/land','PropertyController@addLand')->name('addLand');
    Route::get('property/add/apartment','PropertyController@addApartment')->name('addApartment');
    Route::post('property/save-house','PropertyController@saveHouse')->name('saveHouse');
    Route::post('property/save-land','PropertyController@saveLand')->name('saveLand');
    Route::post('property/save-apartment','PropertyController@saveApartment')->name('saveApartment');
    Route::post('gallery-image','PropertyController@gallery')->name('galleryImage');
    Route::post('remove-image','PropertyController@removeImage')->name('removeImage');
    Route::post('get-property-type','PropertyController@getPropertyTypes')->name('getPropertyTypes');
    Route::resource('property-type','PropertyTypeController');
    Route::resource('project','ProjectController');
    Route::resource('facility','FacilityController');
    Route::resource('ad-objective','AdvertisementObjectiveController');
    Route::resource('ad-type','AdvertisementTypeController');
    Route::resource('transaction-type','TransactionTypeController');
    Route::resource('urgency-type','UrgencyTypeController');
    Route::resource('environment','EnvironmentController');
    Route::resource('completion','CompletionController');
    Route::resource('elevation','ElevationController');
    Route::resource('nearby-facility','NearByFacilityController');
    Route::resource('class-type','ClassTypeController');
    Route::resource('property-title','PropertyTitleController');
    Route::resource('property-status','PropertyStatusController');
    Route::resource('commission-type','CommissionTypeController');
    Route::resource('owner-type','OwnerTypeController');
    Route::resource('exterior-look','ExteriorLookController');
    Route::resource('interior-look','InteriorLookController');
    //admin route
});
