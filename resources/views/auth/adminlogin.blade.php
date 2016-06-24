<!DOCTYPE html>
<html>
<head>
    <meta name="description" content="WS Admin Template Theme by Samu">
    <meta name="author" content="Samu Abeynayake(WS)">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DS OBA | Login</title>
    
    <link rel="icon" href="{{asset('images/icons/favicon.ico')}}" type="image/x-icon">

    <!--Bootstrap -->

    <link rel="stylesheet" type="text/css" href="{{asset('css/common/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/customs/login.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/customs/customfonts.css') }}">
      
           
    <!--Fonts and Icons -->
    <link rel="stylesheet" type="text/css" href="{{asset('fonts/font-awesome-4.4.0/css/font-awesome.min.css') }}">


    <script type="text/javascript" src="{{ asset('js/jquery-1.11.2.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/rd-smoothscroll.min.js') }}"></script>    
</head>
    
<body>

<!--===========================================================================================-->
<!--BODY-->
<!--===========================================================================================-->

<div class="container">
<div class="card card-container">
<img id="profile-img" class="profile-img-card" src="{{asset('images/icons/logo-black.png')}}" />
<p id="profile-name" class="profile-name-card">D.S. SENANAYAKE COLLEGE OBA</p>
    
<form action="{{ URL::to('admin-auth') }}" method="post" class="form-signin" enctype="multipart/form-data">

<input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
<input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
{{ csrf_field() }}
<button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Sign in</button>
</form>
            
</div>
</div>
    
 
   
<!-- js files -->
<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery-1.11.2.js') }}"></script>
    
    
</body>
</html>