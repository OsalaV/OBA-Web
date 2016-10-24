<!DOCTYPE html>
<html>
<head>
    <meta name="description" content="WS Admin Template Theme by Samu">
    <meta name="author" content="Samu Abeynayake(WS)">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$title}}</title>

    <!--Bootstrap -->

    <link rel="stylesheet" type="text/css" href="{{asset('css/common/bootstrap.min.css') }}">
    
      
    <link href="http://netdna.bootstrapcdn.com/font-awesome/3.0.2/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('css/common/editor/external/google-code-prettify/prettify.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/common/editor/index.css') }}">
    
    <link rel="stylesheet" type="text/css" href="{{asset('css/customs/custom.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/customs/customfonts.css') }}">
    
    <!--Fonts and Icons -->
    <link rel="stylesheet" type="text/css" href="{{asset('fonts/font-awesome-4.6.3/css/font-awesome.min.css') }}">
    
    


    <script type="text/javascript" src="{{ asset('js/jquery-1.11.2.js') }}"></script>
   
    <script type="text/javascript" src="{{ asset('js/rd-smoothscroll.min.js') }}"></script>    
</head>
    
<body>

<!--===========================================================================================-->
<!--HEADER-->
<!--===========================================================================================-->
    
<div class="container-fluid  navbar-fixed-top ws-header-panel">
<div class="col-md-2 col-lg-2 ws-brand-container background-yellow">
<center>
<a class="navbar-brand ws-brand" href="">
<span class="ws-header-title">D.S.Senanayake College OBA</span>
</a>
</center>
</div><!-- ws-brand-container -->

<div class="col-md-10 col-lg-10 ws-nav-container background-black">
<div class="pull-left ws-navpanel-left">
    
<div class="ws-slide-left-container">
<a href="" data-toggle="dropdown" class="dropdown-toggle ws-slide-left"><i class="fa fa-bars fa-2x color-white"></i></a>
</div>

    
</div><!-- ws-navpanel-left -->    
<div class="pull-right ws-navpanel-right">
<a data-toggle="dropdown" href="#" class="dropdown-toggle font-main font-15px-600 color-white">{{"Howdy, ".Session::get('user')->role."&nbsp;"}}
<img class="ws-header-uimage" src="{{asset('images/icons/user.png')}}">
</a>
<ul class="dropdown-menu dropdown-menu-right ws-header-dp">
<!--
  <li><a href="#">Activity Log</a></li>
  <li><a href="#">Edit My Profile</a></li>
  <li class="divider"></li>
-->
  <li><a href="{{ URL::to('admin-logout') }}">Log Out</a></li>
</ul>
</div><!-- ws-navpanel-right -->     
</div><!-- ws-nav-container -->
</div><!-- ws-header-panel -->
    
<!--===========================================================================================-->
<!--BODY-->
<!--===========================================================================================-->

    
<div class="container-fluid ws-body-panel">

<div class="ws-body-left">

<div class="ws-body-sidepanel">
 
<ul class="ws-body-sidepanel-ul">

@if(Session::get('DASHBOARD') == "on")
<li>
<a href="{{ URL::to('dashboard-view') }}">
<span class="ws-body-list-title font-main font-15px-600 color-white pull-left hidden-xs">Dashboard</span>
<span class="ws-body-list-icon font-main font-15px-600 color-white pull-right text-center hidden-sm" title="Dashboard"><i class="fa fa-tachometer fa-lg"></i></span>	
</a>
</li>
@endif
    
@if(Session::get('POSTS') == "on")    
<li>
<a href="{{ URL::to('posts-view') }}">
<span class="ws-body-list-title font-main font-15px-600 color-white pull-left hidden-xs">Posts</span>
<span class="ws-body-list-icon font-main font-15px-600 color-white pull-right text-center hidden-sm" title="News"><i class="fa fa-rss fa-lg"></i></span>	
</a>
</li>
@endif
    
@if(Session::get('EVENTS') == "on")
<li>
<a href="{{ URL::to('events-view') }}">
<span class="ws-body-list-title font-main font-15px-600 color-white pull-left hidden-xs">Events</span>
<span class="ws-body-list-icon font-main font-15px-600 color-white pull-right text-center hidden-sm" title="Events"><i class="fa fa-calendar fa-lg "></i></span>	
</a>
</li>
@endif
    
@if(Session::get('PROJECTS') == "on")
<li>
<a href="{{ URL::to('projects-view') }}">
<span class="ws-body-list-title font-main font-15px-600 color-white pull-left hidden-xs">Projects</span>
<span class="ws-body-list-icon font-main font-15px-600 color-white pull-right text-center hidden-sm" title="Projects"><i class="fa fa-folder-open-o fa-lg"></i></span>	
</a>
</li>
@endif

@if(Session::get('MEMBERS') == "on")
<li>
<a href="{{ URL::to('members-view') }}">
<span class="ws-body-list-title font-main font-15px-600 color-white pull-left hidden-xs">Members</span>
<span class="ws-body-list-icon font-main font-15px-600 color-white pull-right text-center hidden-sm" title="Members"><i class="fa fa-users fa-lg"></i></span>	
</a>
</li>
@endif
    
@if(Session::get('TRANSACTIONS') == "on") 
<li>
<a href="{{ URL::to('transactions-view') }}">
<span class="ws-body-list-title font-main font-15px-600 color-white pull-left hidden-xs">Transactions</span>
<span class="ws-body-list-icon font-main font-15px-600 color-white pull-right text-center hidden-sm" title="Tickets"><i class="fa fa-exchange fa-lg"></i></span>	
</a>
</li>
@endif    
    
@if(Session::get('GUESTS') == "on")  
<li>
<a href="{{ URL::to('guests-view') }}">
<span class="ws-body-list-title font-main font-15px-600 color-white pull-left hidden-xs">Guest Users</span>
<span class="ws-body-list-icon font-main font-15px-600 color-white pull-right text-center hidden-sm" title="Guest Users"><i class="fa fa-user fa-lg"></i></span>	
</a>
</li>
@endif
    

@if(Session::get('MESSAGES') == "on")
<li>
<a href="#">
<span class="ws-body-list-title font-main font-15px-600 color-white pull-left hidden-xs">Messages</span>
<span class="ws-body-list-icon font-main font-15px-600 color-white pull-right text-center hidden-sm" title="Messages">
<i class="fa fa-envelope-o fa-lg"></i>
</span>	
</a>
</li>
@endif
  
@if(Session::get('ACTIVITIES') == "on")
<li>
<a href="{{ URL::to('activities-view') }}">
<span class="ws-body-list-title font-main font-15px-600 color-white pull-left hidden-xs">Activities</span>
<span class="ws-body-list-icon font-main font-15px-600 color-white pull-right text-center hidden-sm" title="News"><i class="fa fa-tasks fa-lg"></i></span>	
</a>
</li>
@endif    
    
@if(Session::get('SETTINGS') == "on")    
<li>
<a href="{{ URL::to('settings-view') }}">
<span class="ws-body-list-title font-main font-15px-600 color-white pull-left hidden-xs">Settings</span>
<span class="ws-body-list-icon font-main font-15px-600 color-white pull-right text-center hidden-sm" title="Settings"><i class="fa fa-cogs fa-lg"></i></span>	
</a>
</li>
@endif
    
    
<li></li>
<li></li>
<li></li>
<li></li>
<li></li>
<li></li>
</ul>
    
    
    
    
    
</div><!--ws-body-sidepanel-->
</div><!--ws-body-left-->
    
    
<div class="ws-body-right">
<div class="ws-body-mainpanel">    


    
<div class="alert alert-info fade in">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Info!</strong> Image resolution should be 960 X 370 px.
</div>

<div class="col-md-8 ws-form-container">

<a href="{{ URL::to('events-view') }}" class="ws-tablepage-action-btn"><i class="fa fa-angle-left" aria-hidden="true"></i> Events</a> 
    
<form role="form" action="{{ URL::to('events-add-details') }}" method="post" class="ws-form" enctype="multipart/form-data">
    

  
    
<h2 class="font-main font-uppercase font-25px-600 color-darkblue">Add New Event
<button type="submit" class="ws-form-action-btn savbtn">Save Event</button>
</h2>
    
<div class="row">
<div class="col-md-12">
    <div class="form-group">
        <input type="text" class="form-control" name="title" placeholder="Event Title" required>
    </div>
</div>
</div>
    
<label class="font-main font-15px-600">Event Date</label> 
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
   

<div class="row">
<div class="col-md-6">
    <div class="form-group">
        <input type="text" class="form-control" name="time" placeholder="Event Time" required>
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <input type="text" class="form-control" name="location" placeholder="Location" required>
    </div>
</div>
</div>

    
<div class="row">
<div class="col-md-6">
    <div class="form-group">
        <label class="font-main font-15px-600">Cover Image</label>
        <input type="file" class="form-control" name="image[]" placeholder="Cover Image"   multiple="" required>

        
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label class="font-main font-15px-600">Resource Files</label>
        <input type="file" class="form-control" name="resource[]" placeholder="Resources" multiple="" >
    </div>
</div>
</div>
    
<!--
<div class="row">
    <div class="col-md-12">
    <div class="form-group">
        <textarea class="form-control textarea" name="description" placeholder="Event Description" maxlength="8000" cols="20" wrap="hard" required></textarea>
    </div>
</div>
</div>
-->


<!--text editor update-->
<div class="row">
<div class="form-group">
<div class="col-md-12 col-sm-12 col-xs-12">

<div class="x_panel">
          
<div class="x_content">
<div id="alerts"></div>
<div class="btn-toolbar editor" data-role="editor-toolbar" data-target="#editor">
<div class="btn-group">
<a class="btn dropdown-toggle" data-toggle="dropdown" title="Font"><i class="fa icon-font"></i><b class="caret"></b></a>
<ul class="dropdown-menu">
</ul>
</div>
                 
<div class="btn-group">
<a class="btn dropdown-toggle" data-toggle="dropdown" title="Font Size"><i class="icon-text-height"></i>&nbsp;<b class="caret"></b></a>
<ul class="dropdown-menu">
  <li>
    <a data-edit="fontSize 5">
      <p style="font-size:17px">Huge</p>
    </a>
  </li>
  <li>
    <a data-edit="fontSize 3">
      <p style="font-size:14px">Normal</p>
    </a>
  </li>
  <li>
    <a data-edit="fontSize 1">
      <p style="font-size:11px">Small</p>
    </a>
  </li>
</ul>
</div>
                  
  <div class="btn-group">
    <a class="btn" data-edit="bold" title="Bold (Ctrl/Cmd+B)"><i class="icon-bold"></i></a>
    <a class="btn" data-edit="italic" title="Italic (Ctrl/Cmd+I)"><i class="icon-italic"></i></a>
    <a class="btn" data-edit="strikethrough" title="Strikethrough"><i class="icon-strikethrough"></i></a>
    <a class="btn" data-edit="underline" title="Underline (Ctrl/Cmd+U)"><i class="icon-underline"></i></a>
  </div>
  <div class="btn-group">
    <a class="btn" data-edit="insertunorderedlist" title="Bullet list"><i class="icon-list-ul"></i></a>
    <a class="btn" data-edit="insertorderedlist" title="Number list"><i class="icon-list-ol"></i></a>
    <a class="btn" data-edit="outdent" title="Reduce indent (Shift+Tab)"><i class="icon-indent-left"></i></a>
    <a class="btn" data-edit="indent" title="Indent (Tab)"><i class="icon-indent-right"></i></a>
  </div>
  <div class="btn-group">
    <a class="btn" data-edit="justifyleft" title="Align Left (Ctrl/Cmd+L)"><i class="icon-align-left"></i></a>
    <a class="btn" data-edit="justifycenter" title="Center (Ctrl/Cmd+E)"><i class="icon-align-center"></i></a>
    <a class="btn" data-edit="justifyright" title="Align Right (Ctrl/Cmd+R)"><i class="icon-align-right"></i></a>
    <a class="btn" data-edit="justifyfull" title="Justify (Ctrl/Cmd+J)"><i class="icon-align-justify"></i></a>
  </div>
  <div class="btn-group">
    <a class="btn dropdown-toggle" data-toggle="dropdown" title="Hyperlink"><i class="icon-link"></i></a>
    <div class="dropdown-menu input-append">
      <input class="span2" placeholder="URL" type="text" data-edit="createLink" />
      <button class="btn" type="button">Add</button>
    </div>
  </div>

  <div class="btn-group">
    <a class="btn" data-edit="undo" title="Undo (Ctrl/Cmd+Z)"><i class="icon-undo"></i></a>
  </div>
  <div class="btn-group">
    <a class="btn" data-edit="redo" title="Redo (Ctrl/Cmd+Y)"><i class="icon-repeat"></i></a>
  </div>
</div>

<div id="editor">

</div>
<textarea name="description" id="descr" style="display:none;"></textarea>
<br />

<div class="ln_solid"></div>
</div>
</div>


</div>
</div>
</div>
<!--text editor update-->
 
     
           
<div class="row">
<div class="col-md-12">
  
<div class="form-group">
<label class="font-main font-15px-600">Add images to this event   
</label>
<input type="file" class="form-control" name="eventimages[]" multiple="">
</div> 

</div>
</div>   
    
    
<div class="row">
<div class="col-md-6">
    <div class="form-group">
        <input type="url" class="form-control" name="facebook" placeholder="Facebook Link" >
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <input type="url" class="form-control" name="twitter" placeholder="Twitter Link" >
    </div>
</div>
</div>
    
<div class="row">
<div class="col-md-6">
    <div class="form-group">
        <input type="url" class="form-control" name="instagram" placeholder="Instagram Link" >
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <input type="url" class="form-control" name="google" placeholder="Google+ Link" >
    </div>
</div>
</div>

<div class="row">
<div class="col-md-12">
<div class="form-group">
<label class="font-main font-15px-600">Add a video to this event   </label>
    <input type="url" class="form-control" name="video" placeholder="Embeded Youtube Link" >
</div>
</div>
</div>

    
    
{{ csrf_field() }}
    
<div class="row">
<div class="col-md-12">
<button type="submit" class="ws-form-action-btn pull-right savbtn">Save Event</button>
</div>
</div>


    
</form>
    
</div>
    
    

</div><!--ws-body-mainpanel-->
</div><!--ws-body-right-->  
    
    
 
</div><!--ws-body-panel-->
    
    

    
    
    
    

    
    
    
 
    
    
    
    
    
    
 
   
<!-- js files -->
<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
<!--<script type="text/javascript" src="{{ asset('js/jquery-1.11.2.js') }}"></script>-->
<script type="text/javascript" src="{{ asset('js/ws-sidebar.js') }}"></script>   
<script type="text/javascript" src="{{ asset('js/ws-pagination.js') }}"></script>     
<script type="text/javascript" src="{{ asset('js/ws-modal.js') }}"></script> 
<script type="text/javascript" src="{{ asset('js/ws-cbox.js') }}"></script>    
<script type="text/javascript" src="{{ asset('js/ws-formsubmit.js') }}"></script>   
<script type="text/javascript" src="{{ asset('js/editor/bootstrap-wysiwyg.js') }}"></script>       
<script type="text/javascript" src="{{ asset('js/editor/external/jquery.hotkeys.js') }}"></script>       
<script type="text/javascript" src="{{ asset('js/editor/external/google-code-prettify/prettify.js') }}"></script>       
<script type="text/javascript" src="{{ asset('js/init_editor.js') }}"></script>       

    
    
</body>
</html>