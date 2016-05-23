/**
 * ExtendedMessagebox
 * 
 * Copyright 2016, Samu Abeynayake(WS)
 *
 */


$(document).ready(function() {
  $('.ws-open-msg').click(function() {
      
      var url = $(this).data('url');        
      var message = $(this).data('message'); 
      
      if($('#meesageModel').length){$("#meesageModel").remove();}
      
      var ws_modal           = $("<div />").attr("id", "meesageModel").addClass("modal fade");
      var ws_modal_dialog    = $("<div />").addClass("modal-dialog");
      var ws_modal_content   = $("<div />").addClass("modal-content");
      
      var ws_modal_header    = $("<div />").addClass("modal-header ws-msgmodal-header");
      var ws_modal_closebtn  = $("<div />").attr("type", "button").attr("data-dismiss", "modal").attr("aria-label", "Close").addClass("close");
      
      var ws_modal_span      = $("<span />").attr("aria-hidden", "true").html("&times;");
      
      var ws_modal_center_1   = $("<center />");
      
      var ws_modal_center_2   = $("<center />");
      
      var ws_modal_text      = $("<h4 />").addClass("font-main font-15px-600").html(message);
      
      var ws_modal_div       = $("<div />").addClass("ws-msgmodal-body");
      
      var ws_modal_yesbtn    = $("<a />").attr("href", url).addClass("ws-tablepage-action-btn").html("Yes");
      
      var ws_modal_nobtn     = $("<a />").attr("href", "").attr("data-dismiss", "modal").addClass("ws-tablepage-action-btn").html("No");
      
     
      ws_modal_closebtn.append(ws_modal_span);
      ws_modal_header.append(ws_modal_closebtn);      
   
      ws_modal_center_1.append(ws_modal_text);
      
  
      ws_modal_center_2.append(ws_modal_yesbtn);
      ws_modal_center_2.append(ws_modal_nobtn);
      ws_modal_div.append(ws_modal_center_2);

      
      
      ws_modal_content.append(ws_modal_header);
      ws_modal_content.append(ws_modal_center_1);  
      ws_modal_content.append(ws_modal_div);
      ws_modal_dialog.append(ws_modal_content);
      ws_modal.append(ws_modal_dialog);
  
      $('body').append(ws_modal);
      

      
      
  });
});