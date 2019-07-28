<?php
require_once 'db_connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta author="Muhammad Choudhury" content="">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Vote for your favorite Babyname</title>
    

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template -->
  <link href="css/landing-page.min.css" rel="stylesheet">    

<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<link href = "style.css" rel="stylesheet" type="text/css">
<link href = "./style.css" rel="stylesheet" type="text/css">

  
    
    
<script src="actions.js"></script>
<script src="./actions.js"></script>
    

 
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script>

// Ajax is used to call search.php  file which will bring the data from table with the most popular baby names

$(function() {
    $("#baby_name").autocomplete({
        source: "search.php"//gives suggestions from the babynames table
    });
});
</script>


    </head>
<body>
    
    
    
    
<div class="container box">

   <div class="top">
 
<?php
echo "<p>";
	//echo "<a href='tabletest.php'>Test Table</a> | ";
	echo "<a href='popularnames.php' target='_blank'>Most Popular Names</a> | ";
	echo "<a href='index.php' target='_blank'>Baby Name Vote</a> ";
//links for both tables
       
	echo "</p>";
    
	include('db_connect.php');
?>

<?php
// Create table with two columns: id and value
$createStmt = 'CREATE TABLE IF NOT EXISTS babyvotes (' . PHP_EOL
. ' `id` int(11) NOT NULL AUTO_INCREMENT,' . PHP_EOL
. ' `name` varchar(50) DEFAULT NULL,' . PHP_EOL
. ' `gender` varchar(10) DEFAULT NULL,'.PHP_EOL
. ' `votes` int default 0,' . PHP_EOL
. ' PRIMARY KEY (`id`)' . PHP_EOL
. ') ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;';
?>
    


<!-- Creation of Form for Baby Name and Gender data collection -->  <br>
	<p><strong>A Website for Upvoting your Favorite Baby Names</strong></p><br>
	<form name='' method='POST' action='#'>
	<div class="auto-widget">
    <!--This is the form -->
		<p>    <!--radio buttons -->
            Gender :
            <input required type='radio' name='gender' value='M'>Boy              
		
		    <input required type='radio' name='gender' value='F'>Girl
        </p><br>
		
		<p>Baby Name: <input class ="textbox" required type="text" id="baby_name" name='babyname' placeholder="Type here!"/>	
            <input class ="button" type='submit' name='submit' value='Vote' />    <!--Input box -->
        </p><br>

</div>		
	
	</form>
    </div>
	<br>
<?php
//  function will perform the code when button clicked

	if(isset($_POST['submit']))
	{
		
		//these variables to capture gender and babyname
		$gender = $_POST['gender'];
		$babyname = $_POST['babyname'];
		
		
	

include('db_connect.php');

// check for the baby name in table and get the vote value
$votes = theVotes($babyname, $gender);


if($votes != 0) //if babyname is present in the table
{
	if($babyname != ''){
		$insertStmt = "UPDATE babyvotes set votes = $votes  where name='$babyname' and gender='$gender'";	
	}
}else{ //if name not in the table
	if($babyname != ''){
		$votes = 1;
		$insertStmt = "INSERT INTO babyvotes (name, gender, votes) VALUES ('$babyname','$gender',$votes)";
	}
}
?>
<!--<pre><?php  //echo $insertStmt; ?></pre>-->
<?php
if($db->query($insertStmt)) {
//echo ' <div class="alert alert-success">Values inserted/Updated successfully.</div>' . PHP_EOL;
} else {
//echo ' <div class="alert alert-danger">Value insertion failed: (' . $db->errno . ') ' . $db->error . '</div>' . PHP_EOL;
$db->close();
exit();
}

} // isset ends here.


//check for babyname and return with adding 1 vote if name exists on the table
function theVotes($babyname, $gender){
	include('db_connect.php');
	 $strSQL="select votes from babyvotes where name='$babyname' and gender='$gender'";
	$val=0;
	$result = $db->query($strSQL);
	if($result->num_rows > 0) {
		$row = $result->fetch_assoc();
		$val = $row['votes'];
		$val = $val + 1;
	}else{
		$val = 0;
	}
	$db->close();
	
	return $val;
}
?>


<?php
// this block of code will load the data from babyvotes in descending order of votes. 
// 
include('db_connect.php');
// Get the rows from the table
$selectStmt = 'SELECT * FROM babyvotes order by gender asc, votes desc, gender limit 400';//gender is descending meaning females will be first since f comes before m. results are also formatted from highest to lowest.
?>

<!--<pre><?php //echo $selectStmt; ?></pre>-->
<?php
$result = $db->query($selectStmt);
if($result->num_rows > 0) {
echo ' <div class="color">' . PHP_EOL;
echo "<table border='1'>";
echo "<tr><th>Name</th><th>Gender</th><th>Votes</th></tr>";
while($row = $result->fetch_assoc()) {

echo "<tr>	<td>".$row["name"]."</td>	<td>".$row["gender"]."</td>	<td>".$row["votes"]."</td></tr>".  PHP_EOL;
}
echo "</table>";//echoes the table along with the contents like gender name and number of votes
echo ' </div>' . PHP_EOL;
} else {
echo ' <div class="alert alert-success">No Results</div>' . PHP_EOL;
}
?>
    
    

</div>
    

  <!-- Icons Grid -->
  <section class="features-icons bg-light text-center">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
            <div class="features-icons-icon d-flex">
              <i class="fas fa-venus-mars m-auto text-primary yell"></i>
            </div>
            <h3>Click</h3>
            <p class="lead mb-0">Click on whichever gender the babyname belongs to</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
            <div class="features-icons-icon d-flex">
              <i class="fas fa-keyboard m-auto text-primary yell"></i>
            </div>
            <h3>Type</h3>
            <p class="lead mb-0">Type in your favorite babyname in the textbox</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="features-icons-item mx-auto mb-0 mb-lg-3">
            <div class="features-icons-icon d-flex">
              <i class="fas fa-mouse-pointer m-auto text-primary yell"></i>
            </div>
            <h3>Hit Enter</h3>
            <p class="lead mb-0">Hit enter and watch your favorite babyname grow in popularity!</p>
          </div>
        </div>
      </div>
    </div>
  </section>


  <!-- Footer -->
  <footer class="footer bg-light">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 h-100 text-center text-lg-left my-auto">
          <ul class="list-inline mb-2">
            <li class="list-inline-item">
              <a href="https://www.ssa.gov/oact/babynames/" target="_blank">Click here for even more babynames </a>
            </li>
          </ul>
          <p class="text-muted yell small mb-4 mb-lg-0"> Theme - Landing Page by StartBootstrap</p>
        </div>
        <div class="col-lg-6 h-100 text-center text-lg-right my-auto">
          <ul class="list-inline mb-0">
           <li class="list-inline-item mr-3">
              <a href="https://en.wikipedia.org/wiki/List_of_most_popular_given_names_by_state_in_the_United_States" target="_blank">
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
 

    
</body>
</html>