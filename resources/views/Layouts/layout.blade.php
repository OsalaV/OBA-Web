<html lang="en">

<html>
 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="format-detection" content="telephone=no"/>
    <link rel="icon" href="../Resources/images/favicon.ico" type="image/x-icon">
    <head>

        <!--Bootstrap -->

    <link rel="stylesheet" type="text/css" href="{{asset('css/common/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/common/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/common/animatetime.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/common/jquery.bxslider.css') }}">
      
    <!--Links -->

    <link rel="stylesheet" type="text/css" href="{{asset('css/customs/fonts.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/customs/template.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/customs/listo.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/customs/form.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/customs/flipclock.css') }}">
        
    <!--Fonts and Icons -->
    <link rel="stylesheet" type="text/css" href="{{asset('fonts/font-awesome-4.4.0/css/font-awesome.min.css') }}">


    <script type="text/javascript" src="{{ asset('js/jquery-1.11.2.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/flipclock.js') }}"></script>
<!--     <script type="text/javascript" src="{{ asset('js/rd-smoothscroll.min.js') }}"></script>-->



    <title>{{$title}}</title>
    
    </head>
    <body>
        <div class="temp-body">
        <header>  
            
            <div class="container-fluid header-wrapper">
                
                <div class="col-md-12 col-sm-12 header-container">
                            
                    <div class="col-md-4 col-sm-4 header-logo-container">
                        <div class="navbar-header header-brand-container background-yellow text-center" >
                            <div class="navbar-brand header-brand" style="height:initial;">
                                <a href=""><img class="header-logo" src="../images/logo.png" style="height:auto;"></a>
                            </div>
                        </div>
                    </div>
                                
                    <div class="col-md-8 col-sm-8 header-flag-container">
                        <div class="header-flag-yellow"></div>
                            <div class="header-flag-black text-center">
                                <h5 class ="header-flag-text">D.S.Senanayake College Old Boys Association</h5>
                            </div>
                        <div class="header-flag-yellow"></div>
                    </div>

                </div>

            </div>

            <div class="header-nav-container text-left">
                <div class="header-menu">
                <ul class="header-nav">
                    <li class="active"><a href="/"><span>Home</span></a></li>
                    <li><a href="{{ URL::to('events') }}"><span>Events</span></a></li>
                    <li><a href="{{ URL::to('parade') }}"><span>Psycho Parade</span></a></li>
                    <li><a href="{{ URL::to('projects') }}"><span>Projects</span></a></li>
                    <li><a href="{{ URL::to('members') }}"><span>Committee</span></a>
                      <ul class="top-ul">
                         <li><a href="{{ URL::to('members') }}"><span>Members</span></a></li>
                         <li><a href="{{ URL::to('presidents') }}"><span>Past Presidents</span></a></li>
                      </ul>            
                    </li>
                    <li><a href="{{ URL::to('membership') }}"><span>Membership</span></a></li>
                    <li><a href="{{ URL::to('contact') }}"><span>Contact Us</span></a></li>           
                </ul>
                </div>
            </div> 
    </header>

  
            @yield('content')
       
     <footer class="footer-container">
        <section class="footer-section">
            <div class="container"> 
                <div class="col-md-6 col-sm-12 col-xs-12 footer-text-container">
                    <p class="font-footer color-white footer-text">
                    Developed by 2011 batch &#169; <span class="footer-year">2016</span>
                    <a class="footer-privacy" href="">Privacy Policy</a>
                    </p> 
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12 footer-icon-container">
                    <div id="div-social" class="social animated">
                      <a class="fa fa-facebook" title="" target="_blank" href="#"></a>
                      <a class="fa fa-twitter" title="" target="_blank" href="#"></a>
                      <a class="fa fa-google-plus" title="" target="_blank" href="#"></a>
                      <a class="fa fa-instagram" title="" target="_blank" href="#"></a>
                    </div> 
                </div> 
            </div> 
        </section>    
    </footer>
   </div>
        
  
    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/header.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.waypoints.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.animations.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.bxslider.min.js') }}"></script>
        
</body>
</html>



