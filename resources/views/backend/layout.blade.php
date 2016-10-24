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

@yield('content')
    

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
     

    
    
</body>
</html>