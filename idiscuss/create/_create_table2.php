<?php 
$server = "fdb30.awardspace.net";
$user = "3810958_crud";
$password = "crud@vedansh1";
$database = "3810958_crud";
    $conn = mysqli_connect($server,$user,$password,$database);

    if(!$conn) {
        die("UNABLE TO CONNECT TO THE DATABASE DUE TO ERROR --> " . mysqli_connect_error());
    }
    $sql = "CREATE TABLE `idiscuss`.`users988` ( `s.r.` INT NOT NULL AUTO_INCREMENT ,  `UserName` VARCHAR(150) NOT NULL ,  `E-Mail` VARCHAR(150) NOT NULL ,  `password` VARCHAR(322) NOT NULL ,  `Signup_Date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ,    PRIMARY KEY  (`s.r.`))";
    $result = mysqli_query($conn,$sql);
    if ($result) {
        echo "Table users988 Created succesfully";
        header("location: /create/_create_table3.php");
    }else{
        echo "ERROR <--!--> !_TO CREATE TABLE_! <--!--> --=> `users988` --> THE REASON MAY BE THAT YOU ALREADY HAVE A TABLE `users988` in DATABASE `idiscuss`";
    }    
?>