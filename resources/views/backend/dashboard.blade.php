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
 
<div class="panel panel-default ws-dash-panel">
<div class="panel-heading ws-dash-panelheader">
<span class="font-main font-15px-600 color-darkblue"><i class="fa fa-check"></i> &nbsp;Recent Activities &nbsp;&nbsp;</span>
</div>
    
<div class="panel-body ws-dash-panelbody">

<table class="table ws-dash-table">

<tr>   
<td class="text-center"><img class="ws-dash-table-img" src="{{asset('images/icons/ok-square.png')}}"></td>
<td class="text-left">
<a href="#" class="ws-dash-message">
<span class="font-main font-15px-600 color-darkblue">Update Slider</span><br>
<span class="font-main font-12px-400 color-ashblue">
13 hours ago by Samuda Abeynayke    
</span>    
</a>
</td>
</tr>  
    
<tr>   
<td class="text-center"><img class="ws-dash-table-img" src="{{asset('images/icons/ok-square.png')}}"></td>
<td class="text-left">
<a href="#" class="ws-dash-message">
<span class="font-main font-15px-600 color-darkblue">Add Event - Psycho Parade</span><br>
<span class="font-main font-12px-400 color-ashblue">
13 hours ago by Samuda Abeynayke    
</span>    
</a>
</td>
</tr>
    
<tr>   
<td class="text-center"><img class="ws-dash-table-img" src="{{asset('images/icons/ok-square.png')}}"></td>
<td class="text-left">
<a href="#" class="ws-dash-message">
<span class="font-main font-15px-600 color-darkblue">Add Project - DS Project</span><br>
<span class="font-main font-12px-400 color-ashblue">
13 hours ago by Samuda Abeynayke    
</span>    
</a>
</td>
</tr>
    
<tr>   
<td class="text-center"><img class="ws-dash-table-img" src="{{asset('images/icons/ok-square.png')}}"></td>
<td class="text-left">
<a href="#" class="ws-dash-message">
<span class="font-main font-15px-600 color-darkblue">Edit Event - Theewra 2017</span><br>
<span class="font-main font-12px-400 color-ashblue">
13 hours ago by Samuda Abeynayke   
</span>    
</a>
</td>
</tr>
    
<tr>   
<td class="text-center"><img class="ws-dash-table-img" src="{{asset('images/icons/ok-square.png')}}"></td>
<td class="text-left">
<a href="#" class="ws-dash-message">
<span class="font-main font-15px-600 color-darkblue">Edit Slider</span><br>
<span class="font-main font-12px-400 color-ashblue">
13 hours ago by Samuda Abeynayke 
</span>    
</a>
</td>
</tr>

</table>

    

</div>
</div> 
    
    
</div><!--col-md-4-->
  
    
    
    
    
<div class="col-md-8 col-lg-8">
    
<div class="panel panel-default ws-dash-panel">
<div class="panel-heading ws-dash-panelheader">
<span class="font-main font-15px-600 color-darkblue"><i class="fa fa-rss"></i> &nbsp;Quick Post &nbsp;&nbsp;</span>
</div>
    
<div class="panel-body ws-dash-formpanelbody">

<form role="form" action="{{ URL::to('posts-add-details') }}" method="post" class="ws-form" enctype="multipart/form-data">
    
<div class="row">
<div class="col-md-12">
    <div class="form-group">
        <input type="text" class="form-control" name="title" placeholder="Title" required>
    </div>
</div>
</div>
    
<div class="row">
    <div class="col-md-12">
    <div class="form-group">
        <textarea class="form-control textarea" name="description" placeholder="Write something here"></textarea>
    </div>
</div>
</div>
    
<div class="row">
<div class="col-md-6">
    <div class="form-group">        
        <input type="file" class="form-control" name="image[]" multiple="">
    </div>
</div>
<div class="col-md-6">
<div class="form-group">

<span class="font-main font-15px-600 color-darkblue">Publish this post &nbsp;
<input type="checkbox" name="status"/>
</span> 
     
</div> 
</div>
</div>
    
<div class="row">
<div class="col-md-6">
    <div class="form-group">
        <label class="font-main font-15px-600">Add Photo/Video</label>
    </div>
</div>
</div>
    
    
    
{{ csrf_field() }}
    
<div class="row">
<div class="col-md-12">
<button type="submit" class="ws-form-action-btn pull-right">Post</button>
</div>
</div>
</form>

</div>
</div> 

<div class="row ws-dash-container">
<div class="col-md-6 col-lg-6">
<div class="panel panel-default ws-dash-panel">
<div class="panel-heading ws-dash-panelheader">
<span class="font-main font-15px-600 color-darkblue"><i class="fa fa-wrench"></i> &nbsp;Quick Settings &nbsp;&nbsp;</span>
</div>
    
<div class="panel-body ws-dash-panelbody">

<table class="table ws-dash-table">

<tr>   
<td class="text-center"><img class="ws-dash-table-img" src="{{asset('images/icons/settings.png')}}"></td>
<td class="text-left">
<a href="{{ URL::to('generalsettings') }}" class="ws-dash-message">
<span class="font-main font-15px-600 color-darkblue">General Settings</span><br>
<span class="font-main font-12px-400 color-ashblue">
Change general settings   
</span>    
</a>
</td>
</tr>  
    
<tr>   
<td class="text-center"><img class="ws-dash-table-img" src="{{asset('images/icons/settings.png')}}"></td>
<td class="text-left">
<a href="{{ URL::to('imageslider') }}" class="ws-dash-message">
<span class="font-main font-15px-600 color-darkblue">Image Slider</span><br>
<span class="font-main font-12px-400 color-ashblue">
Change image slider settings     
</span>    
</a>
</td>
</tr>
    


</table>

    

</div>
</div>    
    
    
</div>
</div>
    
</div><!--col-md-8-->
    
</div><!--ws-dash-container-->




@stop