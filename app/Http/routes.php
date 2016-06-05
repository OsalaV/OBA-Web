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






 Route::group(['middleware' =>['web']], function () {
 
    Route::get('login', 'Auth\AuthController@getLogin');
    Route::get('auth/login', 'Auth\AuthController@getLogin');
    Route::post('auth/login', 'Auth\AuthController@authenticate');
    Route::get('auth/logout', 'Auth\AuthController@logout');
     
     
    Route::get('/', ['uses' => 'IndexController@index']);
     
    Route::get('events', ['uses' => 'IndexController@events']);
    Route::get('events-show/{id}', ['uses' => 'IndexController@showpublicevent']);
    Route::get('schoolevents-show/{id}', ['uses' => 'IndexController@showschoolevent']);
     
    Route::get('parade', ['uses' => 'IndexController@parade']);
    
    Route::get('projects', ['uses' => 'IndexController@projects']);
    Route::get('projects-show/{id}', ['uses' => 'IndexController@showproject']);
     
    Route::get('committee-members', ['uses' => 'IndexController@members']);
    Route::get('batch-reps', ['uses' => 'IndexController@batchreps']);
    Route::get('past-presidents', ['uses' => 'IndexController@pastpresidents']);
     
    Route::get('membership', ['uses' => 'IndexController@membership']);
    
    Route::get('contact', ['uses' => 'IndexController@contact']);
     
    Route::get('posts-show/{id}', ['uses' => 'IndexController@showpost']);
     
    Route::get('user-login', ['uses' => 'IndexController@userlogin']);
    
 });

 
 Route::group(['middleware' => ['web','auth']], function () {
     
    Route::get('dashboard-view', ['uses' => 'DashboardController@index']); 
     
    //routes administrators
    Route::get('users-view', ['uses' => 'UserController@index']); 
    Route::get('users-add', ['uses' => 'UserController@create']);  
    Route::post('users-add-details', ['uses' => 'UserController@store']); 
    Route::get('users-edit/{id}', ['uses' => 'UserController@edit']);  
    Route::post('users-edit-details/{id}', ['uses' => 'UserController@update']); 
    Route::post('users-edit-status/{id}', ['uses' => 'UserController@updatestatus']);  
    Route::post('users-set-status/{id}', ['uses' => 'UserController@setstatus']);  
    Route::post('users-edit-password/{id}', ['uses' => 'UserController@updatepassword']);
    Route::post('users-edit-permissions/{id}', ['uses' => 'UserController@updatepermissions']);  
    Route::get('users-delete-details/{id}', ['uses' => 'UserController@destroy']);

    //routes guests
    Route::get('guests-view', ['uses' => 'GuestController@index']); 
     
    
    //routes tickets
    Route::get('tickets-view', ['uses' => 'TicketController@index']); 
    Route::get('tickets-edit-view', ['uses' => 'TicketController@view']); 


    //routes permissions
    Route::get('permissions-view', ['uses' => 'PermissionController@index']); 
     
    //routes designations
    Route::get('designations-view', ['uses' => 'DesignationController@index']); 
    Route::post('designations-add-details', ['uses' => 'DesignationController@store']); 
    Route::post('designation-edit-details/{id}', ['uses' => 'DesignationController@update']); 
    Route::post('designation-edit-status/{id}', ['uses' => 'DesignationController@updatestatus']);  
     
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
     
    //routes general settings 
    Route::get('generalsettings', ['uses' => 'GeneralController@index']);
     
    //routes slider 
    Route::get('imageslider', ['uses' => 'SliderController@index']);
    Route::post('imageslider-add-details', ['uses' => 'SliderController@store']);
    Route::post('imageslider-edit-status/{id}', ['uses' => 'SliderController@updatestatus']);
    Route::get('imageslider-delete-details/{id}', ['uses' => 'SliderController@destroy']);
     
    //routs-branches
    Route::get('branches-view', ['uses' => 'BranchController@index']);
    Route::get('branches-add', ['uses' => 'BranchController@create']); 
    Route::post('branches-add-details', ['uses' => 'BranchController@store']); 
    Route::get('branches-edit/{id}', ['uses' => 'BranchController@edit']);

    Route::post('branches-edit-details/{id}', ['uses' => 'BranchController@update']); 
    Route::post('branches-edit-status/{id}', ['uses' => 'BranchController@updatestatus']);
    Route::post('branches-set-status/{id}', ['uses' => 'BranchController@setstatus']);

    Route::get('branches-delete-details/{id}', ['uses' => 'BranchController@destroy']);

    Route::get('branches-published', ['uses' => 'BranchController@getpublished']);
    Route::get('branches-unpublished', ['uses' => 'BranchController@getunpublished']);
     
     
    //routs-posts
    Route::get('posts-view', ['uses' => 'PostController@index']);
    Route::get('posts-add', ['uses' => 'PostController@create']); 
    Route::post('posts-add-details', ['uses' => 'PostController@store']); 
    Route::get('posts-edit/{id}', ['uses' => 'PostController@edit']);

    Route::post('posts-edit-details/{id}', ['uses' => 'PostController@update']); 
    Route::post('posts-edit-status/{id}', ['uses' => 'PostController@updatestatus']);
    Route::post('posts-set-status/{id}', ['uses' => 'PostController@setstatus']);
    Route::post('posts-edit-image/{id}', ['uses' => 'PostController@updateimage']); 

    Route::get('posts-delete-details/{id}', ['uses' => 'PostController@destroy']);
    Route::get('posts-delete-image/{id}', ['uses' => 'PostController@destroyimge']);

    Route::get('posts-published', ['uses' => 'PostController@getpublished']);
    Route::get('posts-unpublished', ['uses' => 'PostController@getunpublished']);
     
    Route::post('posts-search', ['uses' => 'PostController@search']);
     
    
    //routs-projects
    Route::get('projects-view', ['uses' => 'ProjectController@index']);
    Route::get('projects-add', ['uses' => 'ProjectController@create']); 
    Route::post('projects-add-details', ['uses' => 'ProjectController@store']); 
    Route::get('projects-edit/{id}', ['uses' => 'ProjectController@edit']);

    Route::post('projects-edit-details/{id}', ['uses' => 'ProjectController@update']); 
    Route::post('projects-edit-status/{id}', ['uses' => 'ProjectController@updatestatus']);
    Route::post('projects-set-status/{id}', ['uses' => 'ProjectController@setstatus']);
    Route::post('projects-edit-image/{id}', ['uses' => 'ProjectController@updateimage']); 
    Route::post('projects-edit-resource/{id}', ['uses' => 'ProjectController@updateresource']); 

    Route::get('projects-delete-details/{id}', ['uses' => 'ProjectController@destroy']); 
    Route::get('projects-delete-image/{id}', ['uses' => 'ProjectController@destroyimge']);
    Route::get('projects-delete-resource/{id}', ['uses' => 'ProjectController@destroyresource']);

    Route::get('projects-published', ['uses' => 'ProjectController@getpublished']); 
    Route::get('projects-unpublished', ['uses' => 'ProjectController@getunpublished']);
    Route::get('projects-download-resource/{id}', ['uses' => 'ProjectController@downloadresource']);
     
    Route::post('projects-search', ['uses' => 'ProjectController@search']);
     
    
    //routs-committee
    Route::get('members-view', ['uses' => 'MemberController@index']);
    Route::get('members-add', ['uses' => 'MemberController@create']);
    Route::post('members-add-details', ['uses' => 'MemberController@store']);
    Route::get('members-edit/{id}', ['uses' => 'MemberController@edit']);

    Route::post('members-edit-details/{id}', ['uses' => 'MemberController@update']);
    Route::post('members-edit-status/{id}', ['uses' => 'MemberController@updatestatus']);
    Route::post('members-set-status/{id}', ['uses' => 'MemberController@setstatus']);
    Route::post('members-edit-image/{id}', ['uses' => 'MemberController@updateimage']);

    Route::get('members-delete-details/{id}', ['uses' => 'MemberController@destroy']); 
    Route::get('members-delete-image/{id}', ['uses' => 'MemberController@destroyimge']);

    Route::get('members-published', ['uses' => 'MemberController@getpublished']);
    Route::get('members-unpublished', ['uses' => 'MemberController@getunpublished']); 
     
    Route::post('members-search', ['uses' => 'MemberController@search']);
    
     
    //routes activities
    Route::get('activities-view', ['uses' => 'ActivityController@index']);
    Route::get('activities-recent', ['uses' => 'ActivityController@recentactivities']);
    Route::get('activities-posts', ['uses' => 'ActivityController@postactivities']);
    Route::get('activities-events', ['uses' => 'ActivityController@eventactivities']);
    Route::get('activities-projects', ['uses' => 'ActivityController@projectactivities']);
    Route::get('activities-members', ['uses' => 'ActivityController@memberactivities']);
    Route::get('activities-sliders', ['uses' => 'ActivityController@slideractivities']);
    Route::get('activities-branches', ['uses' => 'ActivityController@branchactivities']);
    Route::get('activities-resources', ['uses' => 'ActivityController@resourceactivities']);
     
    Route::get('activities-view/{type}/{id}', ['uses' => 'ActivityController@view']);
     
    Route::post('activities-search', ['uses' => 'ActivityController@search']);
    Route::get('activities-delete', ['uses' => 'ActivityController@destroy']);
     
     
    //routes resources
    Route::get('resources-view', ['uses' => 'ResourceController@index']);
    Route::get('resources-add', ['uses' => 'ResourceController@create']); 
    Route::post('resources-add-details', ['uses' => 'ResourceController@store']); 
    Route::get('resources-edit/{id}', ['uses' => 'ResourceController@edit']); 
    Route::post('resources-edit-details/{id}', ['uses' => 'ResourceController@update']); 
    Route::post('resources-edit-status/{id}', ['uses' => 'ResourceController@updatestatus']); 
    Route::post('resources-set-status/{id}', ['uses' => 'ResourceController@setstatus']); 
    Route::post('resources-edit-image/{id}', ['uses' => 'ResourceController@updateimage']); 
    Route::post('resources-edit-resource/{id}', ['uses' => 'ResourceController@updateresource']); 
    Route::get('resources-delete-image/{id}', ['uses' => 'ResourceController@destroyimge']); 
    Route::get('resources-delete-resource/{id}', ['uses' => 'ResourceController@destroyresource']); 
    Route::get('resources-delete-details/{id}', ['uses' => 'ResourceController@destroy']);
     
    Route::get('resources-published', ['uses' => 'ResourceController@getpublished']);
    Route::get('resources-unpublished', ['uses' => 'ResourceController@getunpublished']); 
     
    Route::get('resources-download-resource/{id}', ['uses' => 'ResourceController@downloadresource']); 
    Route::post('resources-search', ['uses' => 'ResourceController@search']);
     
 });


  



