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
 Route::get('posts-add', ['uses' => 'PostController@create']); 
 Route::post('posts-add-details', ['uses' => 'PostController@store']); 
 Route::get('posts-edit/{id}', ['uses' => 'PostController@edit']);

 Route::post('posts-edit-details/{id}', ['uses' => 'PostController@update']); 
 Route::post('posts-edit-status/{id}', ['uses' => 'PostController@updatestatus']);
 Route::post('posts-edit-image/{id}', ['uses' => 'PostController@updateimage']); 

 Route::get('posts-delete-details/{id}', ['uses' => 'PostController@destroy']);
 Route::get('posts-delete-image/{id}', ['uses' => 'PostController@destroyimge']);

 Route::get('posts-published', ['uses' => 'PostController@getpublished']);
 Route::get('posts-unpublished', ['uses' => 'PostController@getunpublished']);
 //routs-posts end


 //routs-events
 Route::get('events-view', ['uses' => 'EventController@index']);
 Route::get('events-add', ['uses' => 'EventController@create']);
 Route::post('events-add-details', ['uses' => 'EventController@store']);   
 Route::get('events-edit/{id}', ['uses' => 'EventController@edit']); 
 
 Route::post('events-edit-details/{id}', ['uses' => 'EventController@update']);
 Route::post('events-edit-status/{id}', ['uses' => 'EventController@updatestatus']); 
 Route::post('events-edit-image/{id}', ['uses' => 'EventController@updateimage']); 
 Route::post('events-edit-resource/{id}', ['uses' => 'EventController@updateresource']); 

 Route::get('events-delete-details/{id}', ['uses' => 'EventController@destroy']); 
 Route::get('events-delete-image/{id}', ['uses' => 'EventController@destroyimge']);
 Route::get('events-delete-resource/{id}', ['uses' => 'EventController@destroyresource']);

 Route::get('events-published', ['uses' => 'EventController@getpublished']); 
 Route::get('events-unpublished', ['uses' => 'EventController@getunpublished']);
 Route::post('events-search', ['uses' => 'EventController@search']);
 //routs-events end
 

 //routs-projects
 Route::get('projects-view', ['uses' => 'ProjectController@index']);
 Route::get('projects-add', ['uses' => 'ProjectController@create']); 
 Route::post('projects-add-details', ['uses' => 'ProjectController@store']); 
 Route::get('projects-edit/{id}', ['uses' => 'ProjectController@edit']);

 Route::post('projects-edit-details/{id}', ['uses' => 'ProjectController@update']); 
 Route::post('projects-edit-status/{id}', ['uses' => 'ProjectController@updatestatus']);
 Route::post('projects-edit-image/{id}', ['uses' => 'ProjectController@updateimage']); 
 Route::post('projects-edit-resource/{id}', ['uses' => 'ProjectController@updateresource']); 

 Route::get('projects-delete-details/{id}', ['uses' => 'ProjectController@destroy']); 
 Route::get('projects-delete-image/{id}', ['uses' => 'ProjectController@destroyimge']);
 Route::get('projects-delete-resource/{id}', ['uses' => 'ProjectController@destroyresource']);

 Route::get('projects-published', ['uses' => 'ProjectController@getpublished']); 
 Route::get('projects-unpublished', ['uses' => 'ProjectController@getunpublished']);
 //routs-projects end


 //routs-members
 Route::get('members-view', ['uses' => 'MemberController@index']);
 Route::get('members-add', ['uses' => 'MemberController@create']);
 Route::post('members-add-details', ['uses' => 'MemberController@store']);
 Route::get('members-edit/{id}', ['uses' => 'MemberController@edit']);

 Route::post('members-edit-details/{id}', ['uses' => 'MemberController@update']);
 Route::post('members-edit-status/{id}', ['uses' => 'MemberController@updatestatus']);
 Route::post('members-edit-image/{id}', ['uses' => 'MemberController@updateimage']);

 Route::get('members-delete-details/{id}', ['uses' => 'MemberController@destroy']); 
 Route::get('members-delete-image/{id}', ['uses' => 'MemberController@destroyimge']);

 Route::get('members-published', ['uses' => 'MemberController@getpublished']);
 Route::get('members-unpublished', ['uses' => 'MemberController@getunpublished']);
 //routs-members end


 //routs-members
 Route::get('users-view', ['uses' => 'UserController@index']);



 Route::get('/', ['uses' => 'IndexController@index']);

 Route::get('events', ['uses' => 'IndexController@events']);

 Route::get('members', ['uses' => 'IndexController@members']);

 Route::get('membership', ['uses' => 'IndexController@membership']);

 Route::get('parade', ['uses' => 'IndexController@parade']);

 Route::get('projects', ['uses' => 'IndexController@projects']);

 Route::get('presidents', ['uses' => 'IndexController@presidents']);

 Route::get('contact', ['uses' => 'IndexController@contact']);

 //routes settings 
 Route::get('settings-view', ['uses' => 'SettingController@index']);

 
 //routes slider 
 Route::get('slidersettings', ['uses' => 'SliderController@index']);
 Route::post('slidersettings-save', ['uses' => 'SliderController@store']);

