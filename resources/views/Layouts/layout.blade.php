<html lang="en">
    <head>

        <!--Bootstrap -->
    <link href="../Resources/css/common/bootstrap.min.css" rel="stylesheet">
    <link href="../Resources/css/common/animate.css" rel="stylesheet">
    <link href="../Resources/css/common/animatetime.css" rel="stylesheet"> 
    <link href="../Resources/css/common/jquery.bxslider.css" rel="stylesheet"> 
      
    
      
    <!--Links -->
    <link rel="stylesheet" href="../Resources/css/customs/fonts.css">
    <link rel="stylesheet" href="../Resources/css/customs/template.css">
    <link rel="stylesheet" href="../Resources/css/customs/listo.css">
      
    <!--Fonts and Icons -->
    <link rel="stylesheet" href="../Resources/fonts/font-awesome-4.4.0/css/font-awesome.min.css">


    <!--JS-->
    <script src="../Resources/js/jquery-1.11.2.js"></script>
<!--    <script src="../Resources/js/rd-smoothscroll.min.js"></script>-->

    
    <script src="../Resources/js/bootstrap.min.js"></script>
    <script src="../Resources/js/header.js"></script>
    <script src="../Resources/js/jquery.waypoints.min.js"></script>  
    <script src="../Resources/js/jquery.animations.js"></script> 
    <script src="../Resources/js/jquery.bxslider.min.js"></script> 
    

    <title> @yield('Title')</title>
    
    </head>
    <body>
        <div class="temp-body">
        <header>  
            <div class="container header-wrapper">

                <div class="col-md-12 col-sm-12 header-container">
                            
                    <div class="col-md-4 col-sm-4 header-logo-container">

                    <div class="navbar-header header-brand-container background-yellow text-center">
                        <div class="navbar-brand header-brand">
                        <a href=""><img class="header-logo" src="../Resources/images/logo.png" style="height:25%;"></a>
                        </div>
                    </div>

                    </div>
                                
                    <div class="col-md-8 col-sm-8 header-flag-container">
                        <div class="header-flag-yellow"></div>
                        <div class="header-flag-black text-center">
                        <h5 class ="header-flag-text">D.S.Senanayake College OBA</h5>
                        </div>
                        <div class="header-flag-yellow"></div>
                    </div>

                </div>

            </div>

            <div class="header-nav-container text-left">
                <div class="header-menu">
                <ul class="header-nav">
                    <li class="active"><a href="index.html"><span>Home</span></a></li>
                    <li><a href="events.html"><span>Events</span></a></li>
                    <li><a href="parade.html"><span>Psycho Parade</span></a></li>
                    <li><a href="projects.html"><span>Projects</span></a></li>
                    <li><a href="members.html"><span>Committee</span></a>
                      <ul class="top-ul">
                         <li><a href="members.html"><span>Members</span></a></li>
                         <li><a href="presidents.html"><span>Past Presidents</span></a></li>
                      </ul>            
                    </li>
                    <li><a href="membership.html"><span>Membership</span></a></li>
                    <li><a href="contactus.html"><span>Contact Us</span></a></li>           
                </ul>
                </div>
            </div> 
    </header>

<!--        <div class="container">-->
            @yield('content')
<!--        </div>-->

     <footer class="footer-container">
        <section class="footer-section">
            <div class="container"> 
                <div class="col-md-6 col-sm-12 col-xs-12 footer-text-container">
                    <p class="font-footer color-white footer-text">
                    D.S.SENANAYAKE COLLEGE &#169; <span class="footer-year">2016</span>
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
        
   <!--Bootstrap -->
    <link href="../Resources/css/common/bootstrap.min.css" rel="stylesheet">
    <link href="../Resources/css/common/animate.css" rel="stylesheet">
    <link href="../Resources/css/common/animatetime.css" rel="stylesheet"> 
    <link href="../Resources/css/common/jquery.bxslider.css" rel="stylesheet"> 
      
    
      
    <!--Links -->
    <link rel="stylesheet" href="../Resources/css/customs/fonts.css">
    <link rel="stylesheet" href="../Resources/css/customs/template.css">
    <link rel="stylesheet" href="../Resources/css/customs/listo.css">
      
    <!--Fonts and Icons -->
    <link rel="stylesheet" href="../Resources/fonts/font-awesome-4.4.0/css/font-awesome.min.css">


    <!--JS-->
    <script src="../Resources/js/jquery-1.11.2.js"></script>
<!--    <script src="../Resources/js/rd-smoothscroll.min.js"></script>-->

    
    <script src="../Resources/js/bootstrap.min.js"></script>
    <script src="../Resources/js/header.js"></script>
    <script src="../Resources/js/jquery.waypoints.min.js"></script>  
    <script src="../Resources/js/jquery.animations.js"></script> 
    <script src="../Resources/js/jquery.bxslider.min.js"></script>  
        
</body>
</html>



