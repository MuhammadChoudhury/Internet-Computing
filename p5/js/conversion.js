/*THIS FILE IS NOT USED. WAS USED IN PROJECT 3*/


/*This is the function that sends the final values in miles and kilometers and send it to the last textbox, "results", on the screen. Send it through the parse functions to round values to nearest hundreths*/
var report = function (miles, kilometers) {
    document.getElementById("result").innerHTML =
        parse_mi(miles) + " mi = " + 
        parse_km(kilometers) + " km";
};

/*This function is activated when a value is inputed and the button for converting kilometers to miles is pressed. It gets the value from the first input box, "conversion", and stores it in a variable. It runs conditional statements to make sure input value is valid(if not then it sends out prompts) and then applies miles and kilometers to report, using the km_to_mi for miles since that converts kilometers to miles*/
document.getElementById("km_to_mi").onclick = function () {     
    var k = document.getElementById("conversion").value; 
    if(k < 0 )
        {       
            document.getElementById("result").innerHTML = "Whoops! Length cannot be negative!";
        } 
    else if(isNaN(k))
        {
           document.getElementById("result").innerHTML = 
            "Whoops! You didn't type in a number!";
        } 
    else
    {
          report(km_to_mi(k), k);
    }                                                                                                           
};

/*This function is activated when a value is inputed and the button for converting miles to kilometers is pressed. It gets the value from the first input box, "conversion", and stores it in a variable. It runs conditional statements to make sure input value is valid(if not then it sends out prompts) and then applies miles and kilometers to report, using the mi_to_km for kilometers since that converts miles to kilometers*/
document.getElementById("mi_to_km").onclick = function () {
    var m = document.getElementById("conversion").value;
    if(m < 0)
        {       
            document.getElementById("result").innerHTML = "Whoops! Length cannot be negative!";
        }  
    else if(isNaN(m))
        {
           document.getElementById("result").innerHTML =     "Whoops! You didn't type in a number!";
        } 
    else
    {
         report(m, mi_to_km(m));
    }                                                     
          
};

/*This function takes in miles and converts it to kilometers and then returns the value*/
function mi_to_km(miles_length)  {
     return (miles_length * 1.609);
}

/*This function takes in kilometers and converts it to miles and then returns the value*/
function km_to_mi(kilometers_length)  {
     return (kilometers_length / 1.609);
}

/*This function takes in miles and then rounds it to two decimal places using a built-in function and then returns the value*/
function parse_mi(miles_len) {
     return parseFloat(miles_len).toFixed(2);
}

/*This function takes in kilometers and then rounds it to two decimal places using a built-in function and then returns the value*/
function parse_km(kilometers_len){
     return parseFloat(kilometers_len).toFixed(2);

}