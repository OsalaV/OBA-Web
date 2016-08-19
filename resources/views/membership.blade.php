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

<div class="row">
<img class="membership-img" src="{{asset($membership->imagepath)}}">
</div>
  
@if($membership->status == 'on')
<div class="row">
<center>
<?php $encrypted = Crypt::encrypt($membership->id); ?>
<a href="{{ URL::to('download-resource/'.$encrypted) }}"><img class="membership-download" src="{{asset('images/icons/membership-down.png')}}"></a>
</center>    
</div>
@else
<div class="row">
<p class="ws-tag-label">Membership application and renewal form is currently unavailable.</p>    
</div>
@endif   
    
</div>

    
</div>
    
<div class="col-md-4">
    <div style="margin-top:70px;background-color:#1DE9B6">
        <ul style="padding-top:30px;padding-bottom:30px">
            <h3>Required :</h3>
            <li>
              <h5>Copy of the National Identity Card (NIC).</h5>
            </li>
            <li>
              <h5>Copy of the Character Certificate/Leaving Certificate.</h5>
            </li>
            <li>
              <h5>Two passport size photographs (colour).</h5>
            </li>
            <li>
              <h5>Life membership fee 2,250.00 LKR.</h5>
            </li>
        </ul>
    </div>
</div>    
    
</div>
    
    
   
</div>
</section>
    
</main>

@stop