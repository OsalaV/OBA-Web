
//navbar mobile
( function( $ ) {
$( document ).ready(function() {
     
$('#'+page).addClass('active').siblings().removeClass('active');

$('.header-menu').prepend('<div id="menu-button">Menu</div>');
	$('.header-menu #menu-button').on('click', function(){
		var menu = $(this).next('ul');
		if (menu.hasClass('open')) {
			menu.removeClass('open');
		}
		else {
			menu.addClass('open');
		}
	});
}); 
} )( jQuery );

//navbar fixed top
jQuery(document).ready(function($) {
    
    var navbar   = $(".header-nav-container");
    var distance = navbar.offset().top;
    var $window  = $(window);

    $window.scroll(function() {
        if ($window.scrollTop() >= distance) {
            navbar.removeClass('navbar-fixed-top').addClass('navbar-fixed-top');
          	$("body").css("padding-top", "50px");
        } else {
            navbar.removeClass('navbar-fixed-top');
            $("body").css("padding-top", "0px");
        }
    });

});




    
    
    
    
    
















