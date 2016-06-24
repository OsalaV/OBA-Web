@extends('Layouts.layout')



@section('content')

<!--*************************CONTENT*****************************-->  
<main>    
    


<section class="well temp-section background-white">
<div class="container">
<div class="row">    

    
<div class="col-md-8">
    
<div class="row post-header-row">
<span class="font-header-25px color-black">
{{'Welcome '.Session::get('user')->firstname}}
<a href="{{ URL::to('user-home') }}" class="user-action-btn user-action-btn-blue">Events</a>
<a href="{{ URL::to('user-profile') }}" class="user-action-btn user-action-btn-blue active-blue">My Profile</a> 
<a href="{{ URL::to('user-cart') }}" class="user-action-btn user-action-btn-blue">My Cart</a> 
<a href="{{ URL::to('user-logout') }}" class="user-action-btn user-action-btn-blue">Logout</a> 
</span>
</div>   
 
 
<div class="row">
    
<form action="{{ URL::to('user-save/'.Session::get('user')->id) }}" method="post" class="contact-form animated" enctype="multipart/form-data">
{{ csrf_field() }}   
    
<label class="font-main font-15px-600">Name<span class="color-red"> *</span></label> 
<div class="row">
<div class="col-md-6">
    <div class="form-group">
        <input type="text" class="form-control" name="firstname" placeholder="First name" required value="{{Session::get('user')->firstname}}">
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <input type="text" class="form-control" name="lastname" placeholder="Last name" required value="{{Session::get('user')->lastname}}">
    </div>
</div>
</div>
 
<label class="font-main font-15px-600">Email<span class="color-red"> *</span></label> 
<div class="row">
<div class="col-md-12">
    <div class="form-group">
        <input type="email" class="form-control" name="email" placeholder="" required value="{{Session::get('user')->email}}">
    </div>
</div>
</div>
    
<label class="font-main font-15px-600">Birthday<span class="color-red"> *</span></label> 
<div class="row">
<div class="col-md-3">
<div class="form-group">    
{{ Form::select(
    'month',
    array('Jan' => 'January','Feb' => 'February', 'Mar' => 'March', 'Apr' => 'April', 'May' => 'May', 'June' => 'June', 'July' => 'July', 'Aug' => 'August', 'Sept' => 'September', 'Oct' => 'October', 'Nov' => 'November', 'Dec' => 'December'),
    Session::get('user')->month,
    array('class' => 'form-control','required' => 'required')
    ) 
}}
</div> 
</div>
<div class="col-md-3">
    <div class="form-group">
        <input type="text" class="form-control" name="day" required placeholder="Day" value="{{Session::get('user')->day}}">
    </div>
</div>
<div class="col-md-3">
    <div class="form-group">
        <input type="text" class="form-control" name="year" required placeholder="Year" value="{{Session::get('user')->year}}">
    </div>
</div>
</div> 
    
<label class="font-main font-15px-600">NIC/Passport<span class="color-red"> *</span></label> 
<div class="row">
<div class="col-md-12">
    <div class="form-group">
        <input type="text" class="form-control" name="nic" required value="{{Session::get('user')->nic}}">
    </div>
</div>
</div>
    
<label class="font-main font-15px-600">Address</label>     
<div class="row">
    <div class="col-md-12">
    <div class="form-group">
        <textarea class="form-control" name="address" maxlength="8000" cols="20" wrap="hard">{{Session::get('user')->address}}</textarea>
    </div>
</div>
</div>   
    
<label class="font-main font-15px-600">Contact Number<span class="color-red"> *</span></label> 
<div class="row">
<div class="col-md-12">
    <div class="form-group">
        <input type="text" class="form-control" name="contact" required value="{{Session::get('user')->contact}}">
    </div>
</div>
</div>       

    
<div class="row">
<div class="col-md-12">
<button type="submit" class="btn main-btn pull-right">Save</button>
</div>
</div>
</form> 
    
    
</div>


    
 


    
    
    
    
    
    
</div>   
    

    
</div>
</div>
</section>
    
</main>
<!--*************************CONTENT*****************************--> 


@stop