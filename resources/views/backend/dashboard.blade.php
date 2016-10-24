@extends('backend.layout')

@section('content')

<div class="row ws-dash-header">
<div class="col-md-3 col-lg-3">
<h2 class="font-main font-uppercase font-25px-600 color-darkblue">Dashboard</h2>    
</div>
<div class="col-md-3 col-lg-3 ws-dash-count-box-container"></div>
    
    
<div class="col-md-3 col-lg-3 ws-dash-count-box-container text-right hidden-xs hidden-sm">

<div class="ws-dash-count-box">
  <span class="font-main font-15px-600 color-darkblue"><i class="fa fa-user"></i> Users</span>
  <div class="ws-dash-count">10000</div>
  <span class="font-main font-14px-600 color-black"><i class="font-main font-14px-600 color-yellow">2% </i> From last Week</span>
</div>
   
    
</div>
    
<div class="col-md-3 col-lg-3 ws-dash-count-box-container text-right hidden-xs hidden-sm">

<div class="ws-dash-count-box">
  <span class="font-main font-15px-600 color-darkblue"><i class="fa fa-eye"></i> Visitors</span>
  <div class="ws-dash-count">2500</div>
  <span class="font-main font-14px-600 color-black"><i class="font-main font-14px-600 color-yellow">4% </i> From last Week</span>
</div>
</div>
</div> 



<div class="row ws-dash-container">
 
<div class="col-md-8 col-lg-8">
 
<div class="panel panel-default ws-dash-panel">
<div class="panel-heading ws-dash-panelheader">
<a href="{{ URL::to('activities-recent') }}">
<span class="font-main font-15px-600 color-darkblue"><i class="fa fa-check"></i> &nbsp;Recent Activities &nbsp;&nbsp;</span>
</a>
</div>
    
<div class="panel-body ws-dash-panelbody">

<table class="table ws-dash-table">

    
@foreach($recentactivities as $recent)
<tr>   
<td class="text-center"><img class="ws-dash-table-img" src="{{asset('images/icons/ok-square.png')}}"></td>
<td class="text-left">
<a href="{{ URL::to('activities-view/'.$recent->type.'/'.$recent->referenced_id) }}" class="ws-dash-message">
<span class="font-main font-15px-600 color-darkblue">{{$recent->activity}}</span><br>
<span class="font-main font-12px-400 color-ashblue">
{{$recent->updated_at.' by '.$recent->firstname.' '.$recent->lastname}}
</span>    
</a>
</td>
</tr> 
@endforeach
    

</table>

    

</div>
</div> 
    
 
    
</div><!--col-md-4-->
  
    
    
    
    
<div class="col-md-4 col-lg-4">
    
<div class="panel panel-default ws-dash-panel">
<div class="panel-heading ws-dash-panelheader">
<span class="font-main font-15px-600 color-darkblue"><i class="fa fa-envelope-o"></i> &nbsp;Messages &nbsp;&nbsp;<span class="badge">5</span></span>
</div>
    
<div class="panel-body ws-dash-panelbody">

<table class="table ws-dash-table">

<tr>   
<td class="text-center"><img class="ws-dash-table-img" src="{{asset('images/icons/user.png')}}"></td>
<td class="text-left">
<a href="#" class="ws-dash-message">
<span class="font-main font-15px-600 color-darkblue">Samuda Abeynayke</span><br>
<span class="font-main font-12px-400 color-ashblue">
Lorem Ipsum is simply dummy text    
</span>    
</a>
</td>
</tr>  
    
<tr>   
<td class="text-center"><img class="ws-dash-table-img" src="{{asset('images/icons/user.png')}}"></td>
<td class="text-left">
<a href="#" class="ws-dash-message">
<span class="font-main font-15px-600 color-darkblue">Samuda Abeynayke</span><br>
<span class="font-main font-12px-400 color-ashblue">
Lorem Ipsum is simply dummy text   
</span>    
</a>
</td>
</tr>
    
<tr>   
<td class="text-center"><img class="ws-dash-table-img" src="{{asset('images/icons/user.png')}}"></td>
<td class="text-left">
<a href="#" class="ws-dash-message">
<span class="font-main font-15px-600 color-darkblue">Samuda Abeynayke</span><br>
<span class="font-main font-12px-400 color-ashblue">
Lorem Ipsum is simply dummy text   
</span>    
</a>
</td>
</tr>
    
<tr>   
<td class="text-center"><img class="ws-dash-table-img" src="{{asset('images/icons/user.png')}}"></td>
<td class="text-left">
<a href="#" class="ws-dash-message">
<span class="font-main font-15px-600 color-darkblue">Samuda Abeynayke</span><br>
<span class="font-main font-12px-400 color-ashblue">
Lorem Ipsum is simply dummy text   
</span>    
</a>
</td>
</tr>
    
<tr>   
<td class="text-center"><img class="ws-dash-table-img" src="{{asset('images/icons/user.png')}}"></td>
<td class="text-left">
<a href="#" class="ws-dash-message">
<span class="font-main font-15px-600 color-darkblue">Samuda Abeynayke</span><br>
<span class="font-main font-12px-400 color-ashblue">
Lorem Ipsum is simply dummy text    
</span>    
</a>
</td>
</tr>

</table>

    

</div>
</div>
 




</div><!--col-md-8-->
    
</div><!--ws-dash-container-->




@stop