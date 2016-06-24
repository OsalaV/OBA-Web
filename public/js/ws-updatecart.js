/**
 * 
 * 
 * Copyright 2016, Samu Abeynayake(WS)
 *
 */

$(document).ready(function(){
  $("label#cartuplabel").click(function (e) {
     
     var id = $(this).data('id');
      
     var numform = "#numform"+id;

     $(numform).submit();      
     
 });
  
  
});