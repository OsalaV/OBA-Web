// sidebar animation ---------

$(document).ready(function() {
  sidebarStatus = true;
  $('.ws-slide-left').click(function() {
      
    $(".ws-body-left").toggle("slow");
      
    if (sidebarStatus == false) {
        $('.ws-body-right').animate({
            width: "83.33333333%",
            opacity: "1"
        }, 750);
        
        sidebarStatus = true;
    }
    else{
        
        $('.ws-body-right').animate({
            width: "100%",
            opacity: "1"
        }, 750);
        
        sidebarStatus = false;
        
    }

  });
});

