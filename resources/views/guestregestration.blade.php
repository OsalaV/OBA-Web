@extends('Layouts.layout')



@section('content')

<main>      
    
<script type="text/javascript">      
        var page='Events';
</script>

<section class="well temp-section background-white">
<div class="container">

<div class="row">    

<div class="col-md-4 ws-form-wrapper">

    
<div class="row">
<!--<center>-->
<span class="font-header-25px color-black">Sign in</span><br>
<span class="post-tags">Sign in to continue to payments</span>
<!--</center>-->
<form role="form" id="contact-form" class="contact-form animated">
<div class="row">
<div class="col-md-12">
    <div class="form-group">
        <input type="email" class="form-control" name="email" autocomplete="off" placeholder="Email" required>
    </div>
</div>
<div class="col-md-12">
    <div class="form-group">
        <input type="password" class="form-control" name="password" placeholder="Password" required>
    </div>
</div>
</div>

    
<div class="row">
<div class="col-md-12">
<button type="submit" class="btn main-btn pull-right">Sign in</button>
</div>
</div>
</form> 
</div>

    
    
</div>

<div class="col-md-2 ws-form-wrapper"></div>

<div class="col-md-6 ws-form-wrapper">

    
<div class="row">
<!--<center>-->
<span class="font-header-25px color-black">Sign up</span><br>
<!--<span class="post-tags">Sign in to continue to payments</span>-->
<!--</center>-->
<form role="form" id="contact-form" class="contact-form animated">
<label class="font-main font-15px-600">Name<span class="color-red"> *</span></label> 
<div class="row">
<div class="col-md-6">
    <div class="form-group">
        <input type="text" class="form-control" name="firstname" autocomplete="off" placeholder="First name" required>
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <input type="text" class="form-control" name="lastname" placeholder="Last name" required>
    </div>
</div>
</div>
 
<label class="font-main font-15px-600">Email<span class="color-red"> *</span></label> 
<div class="row">
<div class="col-md-12">
    <div class="form-group">
        <input type="email" class="form-control" name="email" autocomplete="off" placeholder="" required>
    </div>
</div>
</div>
 
<label class="font-main font-15px-600">Password<span class="color-red"> *</span></label> 
<div class="row">
<div class="col-md-12">
    <div class="form-group">
        <input type="password" class="form-control" name="password" required>
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
    null,
    array('class' => 'form-control','required' => 'required')
    ) 
}}
</div> 
</div>
<div class="col-md-3">
    <div class="form-group">
        <input type="text" class="form-control" name="day" required placeholder="Day">
    </div>
</div>
<div class="col-md-3">
    <div class="form-group">
        <input type="text" class="form-control" name="year" required placeholder="Year">
    </div>
</div>
</div>   
    
<label class="font-main font-15px-600">NIC/Passport<span class="color-red"> *</span></label> 
<div class="row">
<div class="col-md-12">
    <div class="form-group">
        <input type="text" class="form-control" name="nic" required>
    </div>
</div>
</div>     
    
<label class="font-main font-15px-600">Address</label>     
<div class="row">
    <div class="col-md-12">
    <div class="form-group">
        <textarea class="form-control" name="address" maxlength="8000" cols="20" wrap="hard"></textarea>
    </div>
</div>
</div>   
    
<label class="font-main font-15px-600">Contact Number<span class="color-red"> *</span></label> 
<div class="row">
<div class="col-md-12">
    <div class="form-group">
        <input type="text" class="form-control" name="contact" required>
    </div>
</div>
</div>       
    
    
<div class="row">
<div class="col-md-12">
<button type="submit" class="btn main-btn pull-right">Sign up</button>
</div>
</div>
</form> 
</div>

    
    
</div>
    
    
</div>
    
    
   
</div>
</section>
    
</main>

@stop