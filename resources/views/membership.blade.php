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
  <p class="font-para-15 color-darkblue animated">
  {{$membership->description}}
  </p>
  
  <div class="num-list">   
   <ol>
      <span class="font-para-15 color-darkblue font-normal">Required Documents</span>
      <hr>
      <li><p class="animated">Copy of the National Identity Card (NIC)</p></li>
      <li><p class="animated">Copy of the Character Certificate/Leaving Certificate</p></li>
      <li><p class="animated">Two passport size photographs (colour)</p></li>
   </ol>
  </div>
  
  
</div>
</div>
  
</div>
    
    
<div class="col-md-4 ws-memside-bx-container">
         

@if($membership->status == 'on')
<div class="row">

<center>
<a href="{{ URL::to('download-resource/'.$membership->type) }}" class="btn ws-btn-p">
<span><i class="fa fa-arrow-down" aria-hidden="true"></i></span> Membership Form
</a>    
</center> 
    
</div>
@else
<div class="">
<p class="font-para-15 color-darkblue">Membership application and renewal form is currently unavailable.</p></div>
@endif 


<div class="ws-pb-wrap">
<div  class="ribbon-content">
    <div class="col-md-8">
    <h4 class="font-para-15 color-darkblue">Life Membership </h4>
    </div>
    <div class="ribbon yellow"><span>LKR 2,750.00</span></div>
</div>
</div>

@if($annualreport->status != NULL)
<div class="row ws-ar-wrap">
<center>
<a href="{{ URL::to('download-resource/'.$annualreport->type) }}" class="btn ws-btn-p">
<span><i class="fa fa-arrow-down" aria-hidden="true"></i></span> Annual Report
</a>    
</center> 
</div>
@endif

<!--
<div class="row ws-ar-wrap">
<center>
<a href="{{ URL::to('download-resource/') }}" class="btn ws-btn-p">
<span><i class="fa fa-file-pdf-o" aria-hidden="true"></i></span> Annual Report
</a>    
</center> 
</div>
-->


</div>
    
    
    

    
</div>
    
    
   
</div>
</section>
    
</main>

@stop