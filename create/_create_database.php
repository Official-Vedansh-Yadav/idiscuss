<?php 
    $server = "localhost";
    $user = "root";
    $password = "";

    $conn = mysqli_connect($server,$user,$password);

    if (!$conn) {
        die("UNABLE TO CONNECT TO THE DATABASE DUE TO ERROR --> " . mysqli_connect_error());
    }
    $sql = "CREATE DATABASE idiscuss";
    $result = mysqli_query($conn,$sql);
    if ($result) {
        echo "Databases Created successfully";
        header("location: /create/_create_table1.php");
    }else{
        echo "ERROR <--!--> !_to Create Database_! <--!--> --=> `idiscuss` ---> THE REASON MAY BE THAT YOU ALREADY HAVE A DATABASE --> `idiscuss`";
    }    
?>