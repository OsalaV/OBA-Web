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
    Route::get('register', 'Auth\AuthController@getRegister');
    Route::post('user-registration', 'Auth\AuthController@storeuser');
    Route::post('user-auth', 'Auth\AuthController@authenticate');
    Route::get('user-logout', 'Auth\AuthController@logout');   
     
    Route::get('admin-login','Adminauth\AuthController@showLogin');
    Route::post('admin-auth', 'Adminauth\AuthController@authenticate');
    Route::get('admin-logout', 'Adminauth\AuthController@logout');
     
     
    Route::get('/', ['uses' => 'IndexController@index']);     
    Route::get('events', ['uses' => 'IndexController@events']); 
    Route::get('events-public/{title}', ['uses' => 'IndexController@showpublicevent']);
    Route::get('events/{title}', ['uses' => 'IndexController@showevent']);     
    //Route::get('psycho-parade', ['uses' => 'IndexController@psychoparade']);
    
    Route::get('projects', ['uses' => 'IndexController@projects']);
    Route::get('projects/{title}', ['uses' => 'IndexController@showproject']);
     
    Route::get('committee-members', ['uses' => 'IndexController@members']);
    Route::get('batch-representatives', ['uses' => 'IndexController@batchreps']);
    Route::get('past-presidents', ['uses' => 'IndexController@pastpresidents']);
     
    Route::get('membership', ['uses' => 'IndexController@membership']);
    Route::get('download-resource/{id}', ['uses' => 'IndexController@downloadresource']);
    Route::get('download-events-resource/{id}', ['uses' => 'IndexController@downloadeventresource']);
    Route::get('download-projects-resource/{id}', ['uses' => 'IndexController@downloadprojectresource']);
    
    Route::get('contact', ['uses' => 'IndexController@contact']);
     
    Route::get('posts/{title}', ['uses' => 'IndexController@showpost']);
     
    Route::get('auth-tickets/{id}', ['uses' => 'IndexController@authtickets']);

    
 });

 Route::group(['middleware' => ['web','user']], function () {
     
    Route::get('user-home', ['uses' => 'UserController@index']); 
    Route::get('user-profile', ['uses' => 'UserController@userprofile']);
    Route::get('user-cart', ['uses' => 'CartController@index']);
    Route::get('user-delete-cart/{id}', ['uses' => 'CartController@deletefromcart']); 
     
    Route::post('user-save/{id}', ['uses' => 'UserController@updateuser']);
     
    Route::post('user-addto-cart', ['uses' => 'CartController@addtocart']);
    Route::post('user-update-cart', ['uses' => 'CartController@updatecart']);
    
     
 });

 
 Route::group(['middleware' => ['web','admin']], function () {
     
    Route::get('dashboard-view', ['uses' => 'DashboardController@index']); 
     
    //routs-posts
    Route::get('posts-view', ['uses' => 'PostController@index']);
    Route::get('posts-add', ['uses' => 'PostController@create']); 
    Route::get('posts-edit/{id}', ['uses' => 'PostController@edit']);
    Route::get('posts-delete-details/{id}', ['uses' => 'PostController@destroy']);
    Route::get('posts-delete-image/{id}', ['uses' => 'PostController@destroyimge']);
    Route::get('posts-published', ['uses' => 'PostController@getpublished']);
    Route::get('posts-unpublished', ['uses' => 'PostController@getunpublished']);
    Route::get('posts-search', ['uses' => 'PostController@search']);
     
    Route::post('posts-add-details', ['uses' => 'PostController@store']); 
    Route::post('posts-edit-details/{id}', ['uses' => 'PostController@update']); 
    Route::post('posts-edit-status/{id}', ['uses' => 'PostController@updatestatus']);
    Route::post('posts-set-status/{id}', ['uses' => 'PostController@setstatus']);
    Route::post('posts-edit-image/{id}', ['uses' => 'PostController@updateimage']); 
    
     
     
    //routs-events
    Route::get('events-view', ['uses' => 'EventController@index']);
    Route::get('events-add', ['uses' => 'EventController@create']);
    Route::get('events-edit/{id}', ['uses' => 'EventController@edit']);
    Route::get('events-delete-details/{id}', ['uses' => 'EventController@destroy']); 
    Route::get('events-delete-image/{id}', ['uses' => 'EventController@destroyimge']);
    Route::get('events-delete-resource/{id}', ['uses' => 'EventController@destroyresource']);
    Route::get('events-delete-albumimage/{id}', ['uses' => 'EventController@destroyalbumimge']);
    Route::get('events-published', ['uses' => 'EventController@getpublished']); 
    Route::get('events-unpublished', ['uses' => 'EventController@getunpublished']);
    Route::get('events-download-resource/{id}', ['uses' => 'EventController@downloadresource']);
    Route::get('events-search', ['uses' => 'EventController@search']);
     
    Route::post('events-add-details', ['uses' => 'EventController@store']);   
    Route::post('events-edit-details/{id}', ['uses' => 'EventController@update']);
    Route::post('events-edit-status/{id}', ['uses' => 'EventController@updatestatus']); 
    Route::post('events-set-status/{id}', ['uses' => 'EventController@setstatus']); 
    Route::post('events-set-ticketstate/{id}', ['uses' => 'EventController@setticketstate']);
    Route::post('events-set-sponserstate/{id}', ['uses' => 'EventController@setsponsertstate']);
    Route::post('events-edit-image/{id}', ['uses' => 'EventController@updateimage']); 
    Route::post('events-edit-albumimages', ['uses' => 'EventController@updatealbumimages']); 
    Route::post('events-edit-resource/{id}', ['uses' => 'EventController@updateresource']);
     
    //routs-sponsers
    Route::post('events-edit-sponser/{id}', ['uses' => 'SponserController@updateSponser']);
    
     
     
    //routs-projects
    Route::get('projects-view', ['uses' => 'ProjectController@index']);
    Route::get('projects-add', ['uses' => 'ProjectController@create']);
    Route::get('projects-edit/{id}', ['uses' => 'ProjectController@edit']);
    Route::get('projects-delete-details/{id}', ['uses' => 'ProjectController@destroy']); 
    Route::get('projects-delete-image/{id}', ['uses' => 'ProjectController@destroyimge']);
    Route::get('projects-delete-resource/{id}', ['uses' => 'ProjectController@destroyresource']);
    Route::get('projects-delete-albumimage/{id}', ['uses' => 'ProjectController@destroyalbumimge']);
    Route::get('projects-published', ['uses' => 'ProjectController@getpublished']); 
    Route::get('projects-unpublished', ['uses' => 'ProjectController@getunpublished']);
    Route::get('projects-download-resource/{id}', ['uses' => 'ProjectController@downloadresource']);
    Route::get('projects-search', ['uses' => 'ProjectController@search']); 
     
    
    Route::post('projects-add-details', ['uses' => 'ProjectController@store']); 
    Route::post('projects-edit-details/{id}', ['uses' => 'ProjectController@update']); 
    Route::post('projects-edit-status/{id}', ['uses' => 'ProjectController@updatestatus']);
    Route::post('projects-set-status/{id}', ['uses' => 'ProjectController@setstatus']);
    Route::post('projects-edit-image/{id}', ['uses' => 'ProjectController@updateimage']); 
    Route::post('projects-edit-albumimages', ['uses' => 'ProjectController@updatealbumimages']);
    Route::post('projects-edit-resource/{id}', ['uses' => 'ProjectController@updateresource']); 
    
     
     
    //routs-members
    Route::get('members-view', ['uses' => 'MemberController@index']);
    Route::get('members-add', ['uses' => 'MemberController@create']);    
    Route::get('members-edit/{id}', ['uses' => 'MemberController@edit']);
    Route::get('members-delete-details/{id}', ['uses' => 'MemberController@destroy']); 
    Route::get('members-delete-image/{id}', ['uses' => 'MemberController@destroyimge']);
    Route::get('members-published', ['uses' => 'MemberController@getpublished']);
    Route::get('members-unpublished', ['uses' => 'MemberController@getunpublished']); 
    Route::get('members-search', ['uses' => 'MemberController@search']);
     
     
    Route::post('members-add-details', ['uses' => 'MemberController@store']);
    Route::post('members-edit-details/{id}', ['uses' => 'MemberController@update']);
    Route::post('members-edit-status/{id}', ['uses' => 'MemberController@updatestatus']);
    Route::post('members-set-status/{id}', ['uses' => 'MemberController@setstatus']);
    Route::post('members-edit-image/{id}', ['uses' => 'MemberController@updateimage']);
    
     
     
     
    //routes guest users
    Route::get('guests-view', ['uses' => 'GuestController@index']); 
    Route::get('guests-edit/{id}', ['uses' => 'GuestController@edit']);
    Route::get('guests-search', ['uses' => 'GuestController@search']);
     
     
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
    Route::get('activities-delete', ['uses' => 'ActivityController@destroy']);
    
    Route::post('activities-search', ['uses' => 'ActivityController@search']);
     
     
    //routes settings 
    Route::get('settings-view', ['uses' => 'SettingController@index']);
     
    //routes general settings 
    Route::get('generalsettings', ['uses' => 'GeneralController@index']);     
     
    //routes slider 
    Route::get('imageslider', ['uses' => 'SliderController@index']);
    Route::get('imageslider-delete-details/{id}', ['uses' => 'SliderController@destroy']);     
     
    Route::post('imageslider-add-details', ['uses' => 'SliderController@store']);
    Route::post('imageslider-edit-status/{id}', ['uses' => 'SliderController@updatestatus']);
     
     
    //routs-branches
    Route::get('branches-view', ['uses' => 'BranchController@index']);
    Route::get('branches-add', ['uses' => 'BranchController@create']);     
    Route::get('branches-edit/{id}', ['uses' => 'BranchController@edit']);
    Route::get('branches-delete-details/{id}', ['uses' => 'BranchController@destroy']);
    Route::get('branches-published', ['uses' => 'BranchController@getpublished']);
    Route::get('branches-unpublished', ['uses' => 'BranchController@getunpublished']);

    Route::post('branches-add-details', ['uses' => 'BranchController@store']); 
    Route::post('branches-edit-details/{id}', ['uses' => 'BranchController@update']); 
    Route::post('branches-edit-status/{id}', ['uses' => 'BranchController@updatestatus']);
    Route::post('branches-set-status/{id}', ['uses' => 'BranchController@setstatus']);
     
     
     
    //routes resources
    Route::get('resources-view', ['uses' => 'ResourceController@index']);
    Route::get('resources-add', ['uses' => 'ResourceController@create']);     
    Route::get('resources-edit/{id}', ['uses' => 'ResourceController@edit']);     
    Route::get('resources-delete-image/{id}', ['uses' => 'ResourceController@destroyimge']); 
    Route::get('resources-delete-resource/{id}', ['uses' => 'ResourceController@destroyresource']); 
    Route::get('resources-delete-details/{id}', ['uses' => 'ResourceController@destroy']);     
    Route::get('resources-published', ['uses' => 'ResourceController@getpublished']);
    Route::get('resources-unpublished', ['uses' => 'ResourceController@getunpublished']);      
    Route::get('resources-download-resource/{id}', ['uses' => 'ResourceController@downloadresource']); 
    Route::get('resources-search', ['uses' => 'ResourceController@search']);
     
    
    Route::post('resources-add-details', ['uses' => 'ResourceController@store']); 
    Route::post('resources-edit-details/{id}', ['uses' => 'ResourceController@update']); 
    Route::post('resources-edit-status/{id}', ['uses' => 'ResourceController@updatestatus']); 
    Route::post('resources-set-status/{id}', ['uses' => 'ResourceController@setstatus']); 
    Route::post('resources-edit-image/{id}', ['uses' => 'ResourceController@updateimage']); 
    Route::post('resources-edit-resource/{id}', ['uses' => 'ResourceController@updateresource']); 
    
     
     
    //routes designations
    Route::get('designations-view', ['uses' => 'DesignationController@index']); 
    
    Route::post('designations-add-details', ['uses' => 'DesignationController@store']); 
    Route::post('designation-edit-details/{id}', ['uses' => 'DesignationController@update']); 
    Route::post('designation-edit-status/{id}', ['uses' => 'DesignationController@updatestatus']); 
    

    //routes administrators
    Route::get('admins-view', ['uses' => 'AdminController@index']); 
    Route::get('admins-add', ['uses' => 'AdminController@create']);   
    Route::get('admins-edit/{id}', ['uses' => 'AdminController@edit']);
    Route::get('admins-delete-details/{id}', ['uses' => 'AdminController@destroy']);
 
    Route::post('admins-add-details', ['uses' => 'AdminController@store']); 
    Route::post('admins-edit-details/{id}', ['uses' => 'AdminController@update']); 
    Route::post('admins-edit-permissions/{id}', ['uses' => 'AdminController@updatepermissions']); 
    Route::post('admins-edit-password/{id}', ['uses' => 'AdminController@updatepassword']);
     
     
    //routes permissions
    Route::get('permissions-view', ['uses' => 'PermissionController@index']); 
     
     
    //routes tickets
    Route::get('tickets', ['uses' => 'TicketController@index']); 
    Route::get('tickets-show/{id}', ['uses' => 'TicketController@show']); 
    Route::get('tickets-add/{id}', ['uses' => 'TicketController@create']); 
    Route::get('tickets-edit/{id}', ['uses' => 'TicketController@edit']); 
    Route::get('tickets-search', ['uses' => 'TicketController@search']);
    
    Route::post('tickets-add-details', ['uses' => 'TicketController@store']);
    Route::post('tickets-edit-details/{id}', ['uses' => 'TicketController@update']);
    Route::post('tickets-edit-tickets/{id}', ['uses' => 'TicketController@updatetickets']);
    Route::post('tickets-edit-status/{id}', ['uses' => 'TicketController@updatestatus']);
    
    
    
 });


  





