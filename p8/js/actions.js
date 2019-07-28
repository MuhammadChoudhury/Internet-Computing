$(document).ready(function(){
 
    $("section").hover(function(){
      $(this).addClass("invert");
      }, function(){
      $(this).removeClass("invert");
     });
    
    $("span").hover(function(){
      $(this).addClass("hov");
      }, function(){
      $(this).removeClass("hov");
     });
    

});