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

Route::group(['middleware' => ['web']], function () {

   

});
 Route::get('/', function () {
        return view('welcome');
   });


// backend routes

 Route::get('dashboard-view', ['uses' => 'DashboardController@index']);
 
 //routs-posts
 Route::get('posts-view', ['uses' => 'PostController@index']);
 Route::get('posts-add', ['uses' => 'EventController@create']); 


 //routs-events
 Route::get('events-view', ['uses' => 'EventController@index']);
 Route::get('events-add', ['uses' => 'EventController@create']);
 Route::post('events-add-save', ['uses' => 'EventController@store']);   
 Route::get('events-edit/{id}', ['uses' => 'EventController@edit']); 
 Route::post('events-edit-save/{id}', ['uses' => 'EventController@update']); 
 Route::get('events-delete/{id}', ['uses' => 'EventController@destroy']); 
 Route::post('events-edit-status/{id}', ['uses' => 'EventController@updatestatus']); 
 Route::get('events-published', ['uses' => 'EventController@getpublished']); 
 Route::get('events-unpublished', ['uses' => 'EventController@getunpublished']);

 





 Route::get('/', ['uses' => 'IndexController@index']);

 Route::get('events', ['uses' => 'IndexController@events']);

 Route::get('members', ['uses' => 'IndexController@members']);

 Route::get('membership', ['uses' => 'IndexController@membership']);

 Route::get('parade', ['uses' => 'IndexController@parade']);

 Route::get('projects', ['uses' => 'IndexController@projects']);

 Route::get('presidents', ['uses' => 'IndexController@presidents']);

 Route::get('contact', ['uses' => 'IndexController@contact']);

