<?php

include('db_connect.php');

// Get search term
$searchName = $_GET['term'];

// Gets the data that is matched from the babyvotes table
$query = $db->query("SELECT * FROM babynames WHERE name LIKE '%".$searchName."%' ORDER BY votes desc");

// Generate the babyvotes data
$BabyName = array();
if($query->num_rows > 0){
    while($row = $query->fetch_assoc()){
        $data['id'] = $row['id'];
        $data['value'] = $row['name'];
        array_push($BabyName, $data);
    }
}

// Return results as array
echo json_encode($BabyName);

?>