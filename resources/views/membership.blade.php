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
<div class="col-md-12 col-sm-12">
  <!-- id="para-2"-->
  <p class="font-para-15 color-darkblue animated">
    D.S. Senanayake College, situated in Colombo 07 (Cinnamon Gardens) is one of the premiere educational institutes in Sri Lanka. With the short span of history it has been able to gain many achievements of excellence both in the academic and non academic fields , locally and internationally to be proud as a truly multi-ethnic, multi-religious College which has proudly created unblemished and prestigious record of excellence in academia , sport and community leadership culminating being an institute of highly innovative and patriotic individuals to the motherland. School has current enrollment of over 6000 students with an academic staff over 275. It is among the most sought after schools in Colombo. The school is listed among theNational Schools, which come under the administration of the Ministry of Education, thus has direct funding from the ministry.
  </p>
</div>
</div>
    

<!--
<div class="row">
<img class="membership-img" src="{{asset($membership->imagepath)}}">
</div>
-->
  
@if($membership->status == 'on')
<div class="row">

<?php $encrypted = Crypt::encrypt($membership->id); ?>
<!--<a href="{{ URL::to('download-resource/'.$encrypted) }}"><img class="membership-download" src="{{asset('images/icons/membership-down.png')}}"></a>-->

<center>
<a href="{{ URL::to('download-resource/'.$encrypted) }}" class="btn ws-btn-p btn-danger hidden-xs">
<span><i class="fa fa-file-pdf-o" aria-hidden="true"></i></span> Download Registration Form Here
</a>
    
<a href="{{ URL::to('download-resource/'.$encrypted) }}" class="btn ws-btn-p btn-danger hidden-sm hidden-md hidden-lg">
<span><i class="fa fa-file-pdf-o" aria-hidden="true"></i></span> Download</a>
    
</center> 
    
</div>
@else
<div class="row">
<p class="ws-tag-label">Membership application and renewal form is currently unavailable.</p>    
</div>
@endif   
    

    
    

    
</div>
    
    
<div class="col-md-4 ws-side-bx-container">
         
<div class="num-list">
   <span class="font-para-15 color-darkblue">Required :</span>
   <!--id="list-2"-->
   <ol>
      <hr>
      <li><p class="animated">Copy of the National Identity Card (NIC)</p></li>
      <li><p class="animated">Copy of the Character Certificate/Leaving Certificate</p></li>
      <li><p class="animated">Two passport size photographs (colour)</p></li>
      <li><p class="animated">Life membership fee 2,250.00 LKR</p></li> 
   </ol>
</div>

</div>
    
    
    

    
</div>
    
    
   
</div>
</section>
    
</main>

@stop