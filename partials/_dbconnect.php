<?php 
    // Connect ro database
$server = "fdb30.awardspace.net";
$user = "3810958_crud";
$password = "crud@vedansh1";
$database = "3810958_crud";
    $conn = mysqli_connect($server,$user,$password,$database);

    if (!$conn) {
        echo "Unable to Connect to the database please reload page or try after some<br>";
        echo mysqli_connect_error();
        exit;
    }
?>