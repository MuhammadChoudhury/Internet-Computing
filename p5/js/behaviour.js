$(document).ready(function() { 
    
    
            $("#cm_to_in, #in_to_cm").hover(function() { 
                $(this).addClass("invert"); 
            }, function() { 
                $(this).removeClass("invert"); 
            }); 
            //buttons become black and white when mouse hover
    
    $(".ni, .do, .king").hover(function() { 
                $(this).addClass("green"); 
            }, function() { 
                $(this).removeClass("green"); 
            }); 
           //text becomes green when mouse hovers
    
        });



