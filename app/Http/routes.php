<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/




// backend routes

 Route::group(['middleware' =>['web']], function () {
 
    Route::get('login', 'Auth\AuthController@getLogin');
    Route::get('auth/login', 'Auth\AuthController@getLogin');
    Route::post('auth/login', 'Auth\AuthController@authenticate');
    Route::get('auth/logout', 'Auth\AuthController@logout');
    
 });

 
 Route::group(['middleware' => ['web','auth']], function () {
     
    Route::get('dashboard-view', ['uses' => 'DashboardController@index']);
     
     
    //routes administrators
    Route::get('users-view', ['uses' => 'UserController@index']); 
    Route::get('users-add', ['uses' => 'UserController@create']);  
    Route::post('users-add-details', ['uses' => 'UserController@store']); 
    Route::get('users-edit/{id}', ['uses' => 'UserController@edit']);  
    Route::post('users-edit-details/{id}', ['uses' => 'UserController@update']);  
    Route::post('users-edit-password/{id}', ['uses' => 'UserController@updatepassword']);
    Route::post('users-edit-permissions/{id}', ['uses' => 'UserController@updatepermissions']);  
    Route::get('users-delete-details/{id}', ['uses' => 'UserController@destroy']);



    //routes permissions
    Route::get('permissions-view', ['uses' => 'PermissionController@index']); 
    Route::post('permissions-add-details', ['uses' => 'PermissionController@store']); 
    Route::get('permissions-delete/{id}', ['uses' => 'PermissionController@destroy']); 
     
     
    //routs-events
    Route::get('events-view', ['uses' => 'EventController@index']);
    Route::get('events-add', ['uses' => 'EventController@create']);
    Route::post('events-add-details', ['uses' => 'EventController@store']);   

    Route::get('events-edit/{id}', ['uses' => 'EventController@edit']);
    Route::post('events-edit-details/{id}', ['uses' => 'EventController@update']);
    Route::post('events-edit-status/{id}', ['uses' => 'EventController@updatestatus']); 
    Route::post('events-set-status/{id}', ['uses' => 'EventController@setstatus']); 
    Route::post('events-edit-image/{id}', ['uses' => 'EventController@updateimage']); 
    Route::post('events-edit-resource/{id}', ['uses' => 'EventController@updateresource']); 

    Route::get('events-delete-details/{id}', ['uses' => 'EventController@destroy']); 
    Route::get('events-delete-image/{id}', ['uses' => 'EventController@destroyimge']);
    Route::get('events-delete-resource/{id}', ['uses' => 'EventController@destroyresource']);

    Route::get('events-published', ['uses' => 'EventController@getpublished']); 
    Route::get('events-unpublished', ['uses' => 'EventController@getunpublished']);
    Route::post('events-search', ['uses' => 'EventController@search']);
    Route::get('events-download-resource/{id}', ['uses' => 'EventController@downloadresource']);

     
    //routes settings 
    Route::get('settings-view', ['uses' => 'SettingController@index']);
     
    //routes slider 
    Route::get('imageslider', ['uses' => 'SliderController@index']);
    Route::post('imageslider-add-details', ['uses' => 'SliderController@store']);
    Route::post('imageslider-edit-status/{id}', ['uses' => 'SliderController@updatestatus']);
    Route::get('imageslider-delete-details/{id}', ['uses' => 'SliderController@destroy']);
     
     
     
 });


  



