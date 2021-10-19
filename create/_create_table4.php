<?php 
$server = "fdb30.awardspace.net";
$user = "3810958_crud";
$password = "crud@vedansh1";
$database = "3810958_crud";
    $conn = mysqli_connect($server,$user,$password,$database);

    if(!$conn) {
        die("UNABLE TO CONNECT TO THE DATABASE DUE TO ERROR --> " . mysqli_connect_error());
    }
    $sql = "CREATE TABLE `comments` ( `comment_id` INT(11) NOT NULL AUTO_INCREMENT ,  `comment_thread_id` INT NOT NULL ,  `comment_description` TEXT NOT NULL ,  `comment_user_id` INT NOT NULL ,  `time` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,    PRIMARY KEY  (`comment_id`))";
    $result = mysqli_query($conn,$sql);
    if ($result) {
        echo "Table comments Created succesfully";
        header("location: ");
    }else{
        echo "ERROR <--!--> !_TO CREATE TABLE_! <--!--> --=> `comments` --> THE REASON MAY BE THAT YOU ALREADY HAVE A TABLE `comments` in DATABASE `idiscuss`";
    }    
?>