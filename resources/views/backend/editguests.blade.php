@extends('backend.layout')

@section('content')


<div class="col-md-8 ws-form-container">
    
<a href="{{ URL::to('guests-view') }}" class="ws-tablepage-action-btn"><i class="fa fa-angle-left" aria-hidden="true"></i> Guests</a>

<form role="form" class="ws-form">
    
<h2 class="font-main font-uppercase font-25px-600 color-darkblue">{{$user->firstname.' '.$user->lastname}}</h2>
    
{{ csrf_field() }}   
    
<label class="font-main font-15px-600">Name<span class="color-red"> *</span></label> 
<div class="row">
<div class="col-md-6">
    <div class="form-group">
        <input type="text" class="form-control" name="firstname" placeholder="First name" required value="{{$user->firstname}}" readonly>
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <input type="text" class="form-control" name="lastname" placeholder="Last name" required value="{{$user->lastname}}" readonly>
    </div>
</div>
</div>
 
<label class="font-main font-15px-600">Email<span class="color-red"> *</span></label> 
<div class="row">
<div class="col-md-12">
    <div class="form-group">
        <input type="email" class="form-control" name="email" placeholder="" required value="{{$user->email}}" readonly>
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
    $user->month,
    array('class' => 'form-control','required' => 'required', 'readonly' => 'readonly')
    ) 
}}
</div> 
</div>
<div class="col-md-3">
    <div class="form-group">
        <input type="text" class="form-control" name="day" required placeholder="Day" value="{{$user->day}}" readonly>
    </div>
</div>
<div class="col-md-3">
    <div class="form-group">
        <input type="text" class="form-control" name="year" required placeholder="Year" value="{{$user->year}}" readonly>
    </div>
</div>
</div> 
    
<label class="font-main font-15px-600">NIC/Passport<span class="color-red"> *</span></label> 
<div class="row">
<div class="col-md-12">
    <div class="form-group">
        <input type="text" class="form-control" name="nic" required value="{{$user->nic}}" readonly>
    </div>
</div>
</div>
    
<label class="font-main font-15px-600">Address</label>     
<div class="row">
    <div class="col-md-12">
    <div class="form-group">
        <textarea class="form-control" name="address" maxlength="8000" cols="20" wrap="hard" readonly>{{$user->address}}</textarea>
    </div>
</div>
</div>   
    
<label class="font-main font-15px-600">Contact Number<span class="color-red"> *</span></label> 
<div class="row">
<div class="col-md-12">
    <div class="form-group">
        <input type="text" class="form-control" name="contact" required value="{{$user->contact}}" readonly>
    </div>
</div>
</div>       


</form>
    
</div>

@stop