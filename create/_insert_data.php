<?php 

$server = "fdb30.awardspace.net";
$user = "3810958_crud";
$password = "crud@vedansh1";
$database = "3810958_crud";

$conn = mysqli_connect($server,$user,$password,$database);

if (!$conn) {
    die("Connection is not successfull Due to ERROR --=> " .mysqli_connect_error());
}

    // Insert PYTHON category to table categories
    $PYTHON_rows_sql="SELECT * FROM `categories` WHERE `category_name` = 'PYTHON'";
    $PYTHON_rows_result = mysqli_query($conn,$PYTHON_rows_sql);
    if (mysqli_num_rows($PYTHON_rows_result) < 1) {
        $insert_PYTHON_category_sql = "INSERT INTO `categories` (`category_name`, `category_description`,`Date`) VALUES ('PYTHON', 'Python is an interpreted high-level general-purpose programming language.Python is easier than other programming languages and do more work in less code It can do backend Webdevelopment,Android Development,Game-Development,Hacking and more.It is current time best Programming language on Earth.',current_timestamp())";
        mysqli_query($conn,$insert_PYTHON_category_sql);
    }

    // Insert JAVASCRIPT category to table categories
    $JAVASCRIPT_rows_sql="SELECT * FROM `categories` WHERE `category_name` = 'JAVASCRIPT'";
    $JAVASCRIPT_rows_result = mysqli_query($conn,$JAVASCRIPT_rows_sql);
    if (mysqli_num_rows($JAVASCRIPT_rows_result) < 1) {
        $insert_JAVASCRIPT_category_sql = "INSERT INTO `categories` (`category_name`, `category_description`,`Date`) VALUES ('JAVASCRIPT', 'JavaScript is like a brain of Website It specifies what will happen if anyone click any button or many more and It is also a All-rounder language which you can use in both Front-End and Back-End Development.',current_timestamp())";
        mysqli_query($conn,$insert_JAVASCRIPT_category_sql);
    }

    // Insert HTML category to table categories
    $HTML_rows_sql="SELECT * FROM `categories` WHERE `category_name` = 'HTML'";
    $HTML_rows_result = mysqli_query($conn,$HTML_rows_sql);
    if (mysqli_num_rows($HTML_rows_result) < 1) {
        $insert_HTML_category_sql = "INSERT INTO `categories` (`category_name`, `category_description`,`Date`) VALUES ('HTML', 'HTML is like the skeleton of a website the structure of a website is written by HTML and after that it is styled and given brain.HTML is the language that is necessary for all websites.',current_timestamp())";
        mysqli_query($conn,$insert_HTML_category_sql);
    }


    // Insert HTML category to table categories
    $CSS_rows_sql="SELECT * FROM `categories` WHERE `category_name` = 'HTML'";
    $CSS_rows_result = mysqli_query($conn,$CSS_rows_sql);
    if (mysqli_num_rows($HTML_rows_result) < 1) {
        $insert_CSS_category_sql = "INSERT INTO `categories` (`category_name`, `category_description`,`Date`) VALUES ('CSS', 'CSS stand for cascading style sheet.CSS is used to design a website.It Gives a stylish look to the Website and can Make a Website responsive.It is from one of the languages those are required for a web-developer',current_timestamp())";
        mysqli_query($conn,$insert_CSS_category_sql);
    }

    header("location: /create/_create_table2.php");

?>