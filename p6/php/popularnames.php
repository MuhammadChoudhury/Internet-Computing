<?php
require_once 'db_connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Most Popular Babynames</title>

<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">

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
    
    
</head>
<body>
<div class="container">
<div class="page-header">
<?php
     
  echo "<p>";
	//echo "<a href='tabletest.php'>Test Table</a> | ";
echo "<a href='popularnames.php' target='_blank'>Most Popular Names</a> | ";
	echo "<a href='index.php' target='_blank'>Baby Name Vote</a> ";
	echo "</p>";
    
?>
<h1>Most Popular BabyNames </h1>
</div>

    
<div class="container box">

   <div class="top">
 
    
<?php

// Create table with two columns: 
$createStmt = 'CREATE TABLE IF NOT EXISTS babynames (' . PHP_EOL
. ' `id` int(11) NOT NULL AUTO_INCREMENT,' . PHP_EOL
. ' `name` varchar(50) DEFAULT NULL,' . PHP_EOL
. ' `gender` varchar(10) DEFAULT NULL,'.PHP_EOL
. ' `votes` int default 0,' . PHP_EOL
. ' PRIMARY KEY (`id`)' . PHP_EOL
. ') ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;';
?>
    
<!--<pre><?php //echo $createStmt; ?></pre>-->
<?php
if($db->query($createStmt)) {
//echo ' <div class="alert alert-success">Table creation successful.</div>' . PHP_EOL;
} else {
//echo ' <div class="alert alert-danger">Table creation failed: (' . $db->errno . ') ' . $db->error . '</div>' . PHP_EOL;
exit(); // Prevents the rest of the file from running
}
?>


<?php 
$file = fopen("yob2016.txt","r");//reads names from the file with the popular baby names
$selectStatement = "SELECT * from babynames";//selects the babynames
if ($result = $db->query($selectStatement)) {

/* determine number of rows result set */

$row_count = $result->num_rows;

// close result set 

$result->close();

}

if ($row_count==0) { 

while(!feof($file))

{

$line=fgets($file);

$var = explode(",", $line);

$name=(string)$var[0];
$gender = (string)$var[1];
$votes = (int)$var[2];

echo "<br>";

$sql = "INSERT INTO babynames(name, gender, votes) VALUES ('$name','$gender',$votes)";

if ($db->query($sql) === TRUE) {

} else {

echo "Error: " . $sql . "<br>" . $db->error;//in case it fails

}
}
fclose($file);//closes file

}

$db->close();

$sqln = "select * from babynames order by gender asc, votes desc, gender limit 500";//this selects the names from the database by female first and from highest to lowest votes
?>

<?php
include('db_connect.php');


$result = $db->query($sqln);

if ($result->num_rows > 0) {

// output data of each row
$i = 1;
echo "<table width='400px'>";
echo "<tr><th>Name</th><th>Gender</th><th>Votes</th> </tr>";
while($row = $result->fetch_assoc()) {

	$name=$row['name'];
	$votes=$row['votes'];
	$gender=$row['gender'];
	
	echo '
	
	<td><label for="name"> '.$name.'</label>
	</td><td><label for="voteno.">'.$gender.'</label>
	</td><td><label for="voteno.">'.$votes.'</label>
	</td>
	
	</tr>';
	

	

}
echo "</table>"; //echoes the table

}



?>
    


</div>
</div>


</div>
</body>
</html>