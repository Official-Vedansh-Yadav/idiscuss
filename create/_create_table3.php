<?php 
$server = "fdb30.awardspace.net";
$user = "3810958_crud";
$password = "crud@vedansh1";
$database = "3810958_crud";
    $conn = mysqli_connect($server,$user,$password,$database);

    if(!$conn) {
        die("UNABLE TO CONNECT TO THE DATABASE DUE TO ERROR --> " . mysqli_connect_error());
    }
    $sql = "CREATE TABLE `3810958_crud`.`threads` ( `thread_id` INT(11) NOT NULL AUTO_INCREMENT ,  `thread_user_id` INT NOT NULL ,  `thread_title` TEXT NOT NULL, `thread_description` TEXT NOT NULL ,  `thread_cat_id` INT NOT NULL ,  `time` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,    PRIMARY KEY  (`thread_id`))";
    $result = mysqli_query($conn,$sql);
    if ($result) {
        echo "Table threads Created succesfully";
        header("location: /create/_create_table4.php");
    }else{
        echo "ERROR <--!--> !_TO CREATE TABLE_! <--!--> --=> `threads` --> THE REASON MAY BE THAT YOU ALREADY HAVE A TABLE `threads` in DATABASE `idiscuss`";
    }    
?>