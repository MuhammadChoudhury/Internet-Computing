<!DOCTYPE html>
    
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Convert Length Now!</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">
    
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
 
    

  <!-- Custom styles for this template -->
  <link href="css/landing-page.min.css" rel="stylesheet">
    
  <!-- My CSS -->
  <link href = "./p5.css" rel="stylesheet" type="text/css">
    <link href = "./test.css" rel="stylesheet" type="text/css">

</head>

    
    
<body>

  <!-- Navigation -->
  <nav class="navbar navbar-light bg-light static-top invert">
    <div class="container invert">
      <a class="navbar-brand invert" href="#">Length Converter</a>
    </div>
  </nav>

  <!-- Masthead -->
  <header class="masthead overtlay text-white text-center">
    <div class="overtlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-xl-9 mx-auto">
          <h1 class="mb-5">Hate doing Calculations? Convert Inches to Centimeters and vice versa right now!</h1>
        </div>
        <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
            
          <!-- This is a form. Through this, the user can type in the value and then click the button and then get the result. This works by using the post method which is used to send data to the server-->
          <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>"> 
            <div class="form-row">
             <form>
              <div class="col-12 col-md-9 mb-2 mb-md-0 theback">
                <input type="text" name="fname" class="form-control form-control-lg" id= "conversion" placeholder="Type Here!">
              </div>
              <div class="col-12 col-md-3">                 
               <p>
                <input type="submit" class="btn btn-block btn-lg btn-primary form-control form-control-lg hov reg" id="cm_to_in" name="cm_to_in" value="cm to in" />  
                <input type="submit" class="btn btn-block btn-lg btn-primary form-control form-control-lg hov reg" id="in_to_cm" name="in_to_cm" value="in to cm" />
               </p>           
                 <p class="form-control form-control-lg theback"   id="result">       
    
                <!-- In the results box, the answer will be shown. The calculations are done but there is also error checking just in case the user types in a negative number or not a numbe at all -->
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                 // collect value of input field
                 $name = htmlspecialchars($_REQUEST['fname']); 
                 if(array_key_exists('cm_to_in',$_POST))
                 {
                if($name < 0)
                { echo  " Whoops! length can't be negative!";}
                 else if(is_numeric($name))
                { echo $name . " cm = " . round(($name / 2.54), 2) . " in";}
                 else
                { echo " Whoops! You can only type in numbers!";}
                 }
                 else if(array_key_exists('in_to_cm', $_POST))
                {         
               if($name < 0)
               { echo  " Whoops, length can't be negative!";}
                 else if(is_numeric($name))
                { echo $name . " in = " . round(($name * 2.54), 2) . " cm";}
                 else
               { echo " Whoops! You can only type in numbers!";}
                }
     
               }    
                 ?>                     
                     
               </p>        
        <!-- not used. was used in p3 <script src="conversion.js"></script>  -->  
                  
                  <!-- JavaScript is used to make the site more interactive -->
                  <script src="behaviour.js"></script>

                </div>
              </form>        
            </div>
          </form>
            
        </div>
      </div>
    </div>
  </header>

  
    
    
 

  <!-- Icons Grid -->
  <section class="features-icons bg-light text-center invert">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
            <div class="features-icons-icon d-flex">
              <i class="fas fa-pencil-ruler m-auto text-primary green"></i>
            </div>
            <h3 class="green">Inches</h3>
            <p class="lead mb-0 ni">The United States of America measures length using Inches for short distances</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
            <div class="features-icons-icon d-flex">
              <i class="fas fa-ruler m-auto text-primary green"></i>
            </div>              
            <h3 class="green">Centimeters</h3>
            <p class="lead mb-0 do">The rest of the world (not kidding) measures length using centimeters for long distances</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="features-icons-item mx-auto mb-0 mb-lg-3">
            <div class="features-icons-icon d-flex">
              <i class="fas fa-ruler-combined m-auto text-primary green"></i>
            </div>                    
            <h3 class="green">Conversion</h3>
            <p class="lead mb-0 king">Converting between the two is very useful especially when travelling into and out of the US</p>
          </div>
        </div>
      </div>
    </div>
  </section>  
  
  <!-- Footer -->
  <footer class="footer bg-light invert">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 h-100 text-center text-lg-left my-auto">
          <ul class="list-inline mb-2">
            <li class="list-inline-item">
              <a href="https://www.unitconverters.net" target="_blank" class="green">Click Here For Other Types of Unit Conversions</a>
            </li>
          </ul>
          <p class="text-muted small mb-4 mb-lg-0 invert">Website Created by Muhammad Choudhury</p>
          <p class="text-muted small mb-4 mb-lg-0 invert">Theme - Landing Page from StartBootstrap</p>    
        </div>
        <div class="col-lg-6 h-100 text-center text-lg-right my-auto">
          <ul class="list-inline mb-0">  
            <li class="list-inline-item mr-3">
              <a href="https://en.wikipedia.org/wiki/Length" target="_blank">
                <i class="fab fa-wikipedia-w fa-2x fa-fw green"></i>
              </a>
            </li>
            <li class="list-inline-item mr-3">
              <a href="https://stackexchange.com/users/15992847/muhammad-choudhury" target="_blank">
                <i class="fab fa-stack-exchange fa-2x fa-fw green"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="https://www.linkedin.com/in/muhammad-choudhury" target="_blank">
                <i class="fab fa-linkedin fa-2x fa-fw green"></i>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="behaviour.js"></script>


</body>

</html>