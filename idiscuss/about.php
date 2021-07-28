<?php 
    include "partials/_dbconnect.php";
    session_start();
    include "partials/_login_and_signup_script.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About - iDiscuss</title>
    <link rel="shortcut icon" href="img_logo.png" type="image/x-icon">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        .about-link{
            color: white !important;
        }
        .container h2{
            font-family: Roboto,Ubuntu,sans-serif;
        }
        .logo{
            height: 255px !important;
            margin: auto;
        }
        .container{
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }
        body p{
            font-family: Ubuntu,sans-serif;
        }
        .content{
            min-height: 85vh !important;
        }
    </style>
</head>
<body>
    <?php require "partials/_header.php"; ?>
    <?php include "partials/_signup_and_login_alerts.php"; ?>

        <div class="content container">
                <img src="img_logo.png" alt="iDiscuss Logo" class="logo text-center my-4">
                <h2 class="text-center">About iDiscuss - Forum Website</h2>
                <p class="text-justify my-5">iDiscuss is a Forum Website for coding You can get help from here It is started creating on 6/29/2021 and Created by <b>Vedansh Yadav</b> in his Computer.This is first Forum Website Created by Vedansh Yadav.You can take help from this Website.This Website is fully free but you can contribute in development if you want.iDiscuss is full secure as we store anyones password in our database,We store hashes of your passwords and anyone cannot hack your website using that hash because hashes are different in all websites and he Cannot predict password using password hash So,don't scare while registering to our website.Our Motive is to help others.But you should share your password with others.This Website is created using PHP and MySQL and designed by Bootstrap Framework.</p>
                <hr style="width: 95vw;">
                <img src="img/vedansh.jpg" alt="Vedansh Yadav Image" class="vedansh_yadav" style='height: 350px; width: 500px;'>
                <h2 class="text-center my-4">About - Vedansh Yadav</h2>
                <p class="text-justify"><b>Vedansh Yadav</b> is 14 years old Kid and a Young Programmer and Web-Developer He is still learning but he learned some languages like <b>HTML,CSS,JAVASCRIPT,PHP AND MYSQL</b>. He loves to play Cricket and playing cricket for Priyanshu Cricket Academy in Alwar at Under-16 just reached under-16.He is born on <b>8 November 2006</b>.He is studing in 9th standard.He learned Coding from CodeWithHarry and YahooBaBa Youtube Channel and also Craeted a Own Youtube channel <a href="#">Vedansh Tech tutorials</a>.You should visit if also want to learn Web-Development and Programming and You can also visit his <a href="#">Instagram page</a> and can join <a href="#">Whatsapp Group</a> , Where You can ask about your doubts.His Favorite Language is <b>PHP</b>.You can contact him from Contact page of our website.He want to help others and teach others to How to Code that's Why He craeted his own Youtube Channel.</p>
        </div>
    <?php require 'partials/_footer.php' ?>

    <!-- Javascript Files -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
<!-- Card -->
<!-- 
            <div class="my-2 mx-2 card" style="width: 18rem;">
            <img src="img/edit.jpg" alt="" class="card-img-top">
            <div class="card-body"> 
                <h5 class="card-title py-2 text-dark">Card Title</h5>
                <p class="card-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Magni, ipsa. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error, facere.</p>
                <button class="btn btn-primary">View Threads</button>
            </div>
        </div>

 -->