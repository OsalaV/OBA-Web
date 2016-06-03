@extends('Layouts.layout')



@section('content')

<main>      
    
    <script type="text/javascript">      
            var page='Membership';
        </script>

<section class="well temp-section background-white">
<div class="container">

<div class="row">    

<div class="col-md-8">
<div class="row">
<h2 class="font-header-large color-black">GET <small class="color-yellow">YOUR MEMBERSHIP</small></h2> 
</div>
    
<div class="row">
<img class="membership-img" src="{{asset('images/membership-form.jpg')}}">
</div>
    
<div class="row">
<center>
<a href="#"><img class="membership-download" src="{{asset('images/membership-down.png')}}"></a>
</center>    
</div>
    
    
</div>
    
    
</div>
    
    
   
</div>
</section>
    
</main>

@stop