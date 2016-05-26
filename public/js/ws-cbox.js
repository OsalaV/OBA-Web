/**
 * 
 * 
 * Copyright 2016, Samu Abeynayake(WS)
 *
 */


$(document).ready(function() {

 $("input#status").click(function (e) {
     
     var id = $(this).data('id');
     
     var checkform = "#checkform"+id;
     
     $(checkform).submit();      
     
 });
    
});