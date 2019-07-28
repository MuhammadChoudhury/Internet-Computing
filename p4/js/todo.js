

$(document).ready(function() {
    //Document is ready

    //local storage is better than session storage which only lasts until tab is closed
    if (localStorage.toDo) {
    var toDo = JSON.parse(localStorage.toDo);
} else {
    var toDo = [];
}

for (var x = 0; x < toDo.length; x++) {
    var oneItem = toDo[x];
    $("#todo").append(oneItem);//appends list items onto unordered list
}

function update() {
    var after = [];
    $("li").each(function () {
        after.push('<li contenteditable="false">' + $(this).html()) + '</li>';
    });
    toDo = after;
    localStorage.toDo = JSON.stringify(toDo);//converted to string and now sent to the server
}
    
    
    $(document).keypress(function(enterkey){
        
        if(enterkey.which === 13){
            var content = $('#add').val();//Variable stores what is typed in textbox by using .val which is used to return the value
            if(content.length != 0){ //length of what is typed in can't be 0 characters
        
            $('#todo').append('<li contenteditable="false">' + content + '</li>');//appends whatever the user typed in as a new item in the list
            $('#add').val(""); //Erase whats in from input box after user types in input
            } 
               
           
        if($("li").attr('contenteditable') === 'true')
            $("li").attr('contenteditable','false');//stops people from editing new item unless in edit mode
            
                update();//persistence

        } 
      

    });
    
    
    
    $(document).on('click','li', function(){
        if ($("li").attr('contenteditable') === 'false')
            $(this).toggleClass('checked'); 
            //list item is checked when clicked once and is unchecked when clicked again

      });
    
    
    $(document).on('dblclick','li', function(){
        if ($("li").attr('contenteditable') === 'false')
            $(this).remove();
            //list item removed when item is double-clicked

      });
    
   
    $('#complete').click(function(){
       $('li').toggleClass('checked');
        //all list items are checked when clicked once and is unchecked when clicked again

    });
    
    
    $('#complete').dblclick(function(){
         $('li').remove();

    }); //removes all items if check/uncheck double clicked
    
  
    $('#edit').click(function(){
         if ($("li").attr('contenteditable') === 'false')
          {
             $("li").attr('contenteditable','true');
             $('main').addClass('darkred');
          }
        //goes into edit mode when edit button clicked once and turns darkred

    });
    
    
    $('#edit').dblclick(function(){
         if ($("li").attr('contenteditable') === 'true')
           { 
             $("li").attr('contenteditable','false');
             $('main').removeClass('darkred');
           }
        //goes out of edit mode when edit button is double-clicked and goes back to being red

    });
    

});