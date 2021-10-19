<?php 
$server = "fdb30.awardspace.net";
$user = "3810958_crud";
$password = "crud@vedansh1";
$database = "3810958_crud";
    $conn = mysqli_connect($server,$user,$password,$database);

    if(!$conn) {
        die("UNABLE TO CONNECT TO THE DATABASE DUE TO ERROR --> " . mysqli_connect_error());
    }
    $sql = "CREATE TABLE `categories` ( `category_id` INT(11) NOT NULL AUTO_INCREMENT ,  `category_name` VARCHAR(255) NOT NULL ,  `category_description` VARCHAR(450) NOT NULL ,  `date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ,    PRIMARY KEY  (`category_id`))";
    $result = mysqli_query($conn,$sql);
    if ($result) {
        echo "Table categories Created succesfully" ;
        header("location: /create/_insert_data.php");
    }else{
        echo "ERROR <--!--> !_TO CREATE TABLE_! <--!--> --=> `categories` --> THE REASON MAY BE THAT YOU ALREADY HAVE A TABLE `categories` in DATABASE `idiscuss`". mysqli_connect_error();
    }    
?>