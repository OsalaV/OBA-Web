@extends('Layouts.layout')



@section('content')

<main>        

<section class="well temp-section background-white">
<div class="container">

<div class="row">    
<h2 class="font-header-large color-black">GET <small class="color-yellow">YOUR MEMBERSHIP</small></h2>

<form role="form" id="contact-form" class="contact-form">
<div class="row">
<div class="col-md-6">
    <div class="form-group">
        <input type="text" class="form-control" name="Name" autocomplete="off" id="Name" placeholder="Name" required>
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <input type="email" class="form-control" name="email" autocomplete="off" id="email" placeholder="E-mail" required>
    </div>
</div>
</div>
<div class="row">
    <div class="col-md-12">
    <div class="form-group">
        <textarea class="form-control textarea" rows="3" name="Message" id="Message" placeholder="Message" required></textarea>
    </div>
</div>
</div>
    
<div class="row">
<div class="col-md-12">
<button type="submit" class="btn main-btn pull-right">Send a message</button>
</div>
</div>
</form>    
    
</div>
    
    
   
</div>
</section>
    
</main>

@stop