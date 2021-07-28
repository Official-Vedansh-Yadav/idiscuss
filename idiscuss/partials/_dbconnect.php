<?php 
    // Connect ro database
$server = "localhost";
$user = "root";
$password = "";
$database = "idiscuss";
    $conn = mysqli_connect($server,$user,$password,$database);

    if (!$conn) {
        header("location: /create/_create_database.php");
    }
?>