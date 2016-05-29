//$(document).ready(function() {
// 
//$('ul .header-nav li').click(function() {
//    $(this).addClass('active').siblings().removeClass('active');
//});
//    
//});


//$(document).ready(function(){
//
//$('ul .header-nav li').click(function(){
//  
//if(!$this.hasClass('active')){
//   $this.addClass('active');
//
//}else{
// $this.removeClass('active');
//}
//
//});
//
//
//
//});




//navbar mobile
( function( $ ) {
$( document ).ready(function() {
    //alert(page);
     
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
  
    // Fixa navbar ao ultrapassa-lo
    
    
    
    var navbar = $(".header-nav-container"),
        distance = navbar.offset().top,
        $window = $(window);

    $window.scroll(function() {
        if ($window.scrollTop() >= distance) {
            navbar.removeClass('navbar-fixed-top').addClass('navbar-fixed-top');
          	$("body").css("padding-top", "60px");
        } else {
            navbar.removeClass('navbar-fixed-top');
            $("body").css("padding-top", "0px");
        }
    });
    
    $('ul .header-nav li').click(function() {
    $(this).addClass('active').siblings().removeClass('active');
});
    
});





    
    
    
    
    
















