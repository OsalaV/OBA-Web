$(document).ready(function() {

  $('.memmode').on('click', function(){
    
    var image       = $(this).attr("data-im");
    var name        = $(this).attr("data-name");
    var designation = $(this).attr("data-designation");
    var email       = $(this).attr("data-email");
    var contact     = $(this).attr("data-contact");
      
    var fb     = $(this).attr("data-fb");
    var tw     = $(this).attr("data-tw");
    var li     = $(this).attr("data-li");
    var gp     = $(this).attr("data-gp");

    $('#mem-img').attr('src',image);
    $('#mem-name').html(name);
    $('#mem-designation').html(designation);
      
    if(email === ""){      
    $('#mem-email').addClass('ws-mem-hidden');
    }
    else{
    $('#mem-email').removeClass('ws-mem-hidden');
    $('#mem-email').html('<i class="fa fa-envelope-o hidden-xs" aria-hidden="true"></i>'+" "+email);
    }
      
    if(contact === ""){      
    $('#mem-contact').addClass('ws-mem-hidden');
    }
    else{
    $('#mem-contact').removeClass('ws-mem-hidden');
    $('#mem-contact').html('<i class="fa fa-phone hidden-xs" aria-hidden="true"></i>'+'&nbsp;&nbsp;'+contact);
    }
      
      
    if(fb === ""){
        $('#mem-fb').addClass('ws-mem-hidden');
    }
    else{
        $('#mem-fb').removeClass('ws-mem-hidden');
        $('#mem-fb').attr('href',fb);    
    }
      
    if(tw === ""){
        $('#mem-tw').addClass('ws-mem-hidden');
    }
    else{
        $('#mem-tw').removeClass('ws-mem-hidden');
        $('#mem-tw').attr('href',tw);    
    }
      
    if(li === ""){
        $('#mem-li').addClass('ws-mem-hidden');
    }
    else{
        $('#mem-li').removeClass('ws-mem-hidden');
        $('#mem-li').attr('href',li);    
    }
      
    if(gp === ""){
        $('#mem-gp').addClass('ws-mem-hidden');
    }
    else{
        $('#mem-gp').removeClass('ws-mem-hidden');
        $('#mem-gp').attr('href',gp);    
    }
      

    var inst = $('[data-remodal-id=modal]').remodal();

    /**
     * Opens the modal window
     */
    inst.open();


    $(document).on('closed', '.remodal', function (e) {
    
    $('#mem-img').attr('src',"");
    $('#mem-name').html("");
    $('#mem-designation').html("");
    $('#mem-email').html("");
    $('#mem-contact').html("");
        
    $('#mem-fb').attr('href',"");  
    $('#mem-tw').attr('href',"");  
    $('#mem-li').attr('href',"");
    $('#mem-gp').attr('href',""); 

    });



  });

});

