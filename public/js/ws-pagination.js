$(document).ready(function() {
 
$('.ws-pagination-ul li').click(function() {
    $(this).addClass('active').siblings().removeClass('active');
});
    
});