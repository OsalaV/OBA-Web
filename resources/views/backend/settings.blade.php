@extends('backend.layout')

@section('content')

<h2 class="font-main font-uppercase font-25px-600 color-darkblue">Settings</h2>

<div class="row ws-settings-container">

@if(Session::get('GENERAL SETTINGS') == "on")
<div class="col-md-3 col-lg-3 ws-settings-box-container">
<center>
<a href="{{ URL::to('generalsettings') }}">
<div class="ws-settings-box">
<i class="fa fa-sliders fa-5x ws-settings-i" aria-hidden="true"></i>  
</div>    
</a>
<span class="font-main font-15px-600 color-darkblue ws-settings-titile">General Settings</span>
</center>
</div>
@endif
 
@if(Session::get('IMAGE SLIDER') == "on")
<div class="col-md-3 col-lg-3 ws-settings-box-container">
<center>
<a href="{{ URL::to('imageslider') }}">
<div class="ws-settings-box">
<i class="fa fa-picture-o fa-5x ws-settings-i" aria-hidden="true"></i>  
</div>
</a>
<span class="font-main font-15px-600 color-darkblue ws-settings-titile">Image Slider</span>
</center>
</div>
@endif   
    
@if(Session::get('BRANCHES') == "on")
<div class="col-md-3 col-lg-3 ws-settings-box-container">
<center>
<a href="{{ URL::to('branches-view') }}">
<div class="ws-settings-box">
<i class="fa fa-university fa-5x ws-settings-i" aria-hidden="true"></i>  
</div>
</a>
<span class="font-main font-15px-600 color-darkblue ws-settings-titile">Branches</span>
</center>
</div>
@endif  
    
@if(Session::get('RESOURCES') == "on")
<div class="col-md-3 col-lg-3 ws-settings-box-container">
<center>
<a href="{{ URL::to('resources-view') }}">
<div class="ws-settings-box">
<i class="fa fa-folder-open fa-5x ws-settings-i" aria-hidden="true"></i>  
</div>
</a>
<span class="font-main font-15px-600 color-darkblue ws-settings-titile">Resources</span>
</center>
</div>
@endif 
    

@if(Session::get('DESIGNATIONS') == "on")
<div class="col-md-3 col-lg-3 ws-settings-box-container">
<center>
<a href="{{ URL::to('designations-view') }}">
<div class="ws-settings-box">
<i class="fa fa-star fa-5x ws-settings-i" aria-hidden="true"></i>  
</div>
</a>
<span class="font-main font-15px-600 color-darkblue ws-settings-titile">Designations</span>
</center>
</div>
@endif 
    
 
@if(Session::get('USERS') == "on")
<div class="col-md-3 col-lg-3 ws-settings-box-container">
<center>
<a href="{{ URL::to('users-view') }}">
<div class="ws-settings-box">
<i class="fa fa-user fa-5x ws-settings-i" aria-hidden="true"></i>  
</div>
</a>
<span class="font-main font-15px-600 color-darkblue ws-settings-titile">Users</span>
</center>
</div>
@endif
    
@if(Session::get('USER PERMISSIONS') == "on")    
<div class="col-md-3 col-lg-3 ws-settings-box-container">
<center>
<a href="{{ URL::to('permissions-view') }}">
<div class="ws-settings-box">
<i class="fa fa-lock fa-5x ws-settings-i" aria-hidden="true"></i>  
</div>
</a>
<span class="font-main font-15px-600 color-darkblue ws-settings-titile">User Permissions</span>
</center>
</div>
@endif

    
</div>


@stop