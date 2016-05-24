@extends('backend.layout')

@section('content')

<h2 class="font-main font-uppercase font-25px-600 color-darkblue">Settings</h2>

<div class="row ws-settings-container">

<div class="col-md-3 col-lg-3 ws-settings-box-container">
<center>
<a href="#">
<div class="ws-settings-box">
<i class="fa fa-sliders fa-5x ws-settings-i" aria-hidden="true"></i>  
</div>    
</a>
<span class="font-main font-15px-600 color-darkblue ws-settings-titile">General Settings</span>
</center>
</div>
    
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
    
<div class="col-md-3 col-lg-3 ws-settings-box-container">
<center>
<a href="{{ URL::to('admins-view') }}">
<div class="ws-settings-box">
<i class="fa fa-user fa-5x ws-settings-i" aria-hidden="true"></i>  
</div>
</a>
<span class="font-main font-15px-600 color-darkblue ws-settings-titile">Administrators</span>
</center>
</div>
    
<div class="col-md-3 col-lg-3 ws-settings-box-container">
<center>
<a href="{{ URL::to('permissions-view') }}">
<div class="ws-settings-box">
<i class="fa fa-lock fa-5x ws-settings-i" aria-hidden="true"></i>  
</div>
</a>
<span class="font-main font-15px-600 color-darkblue ws-settings-titile">Admin Permissions</span>
</center>
</div>
    
</div>


@stop