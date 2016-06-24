/**
 * 
 * 
 * Copyright 2016, Samu Abeynayake(WS)
 *
 */

$(document).ready(function(){
 $("a#post").click(function (e) {
     
     var id = $(this).data('id');
      
     var postform = "#postform"+id;

     $(postform).submit();      
     
 });
    
 $("a#publicevent").click(function (e) {
     
     var id = $(this).data('id');
      
     var publiceventform = "#publiceventform"+id;

     $(publiceventform).submit();      
     
 });
  
  
});