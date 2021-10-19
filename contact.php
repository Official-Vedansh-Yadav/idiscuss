<?php 
    include "partials/_dbconnect.php";
    // server should keep session data for AT LEAST 1 hour
    ini_set('session.gc_maxlifetime', 31536000);

    // each client should remember their session id for EXACTLY 1 hour
    session_set_cookie_params(31536000);

    session_start(); // ready to go!
    
    include "partials/_login_and_signup_script.php";
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if (isset($_POST['name'])){
            $filled = false;
            $name = $_POST['name'];
            $sender_mail = $_POST['sender_email'];
            $subject = $_POST['subject'];
            $description = $_POST['message'];
            $to = "vedanshyadav350@gmail.com";
            $from = "from: vedanshyadav228@gmail.com";
            $message = "Name :- $name
                $description
                FROM: $sender_mail
            ";
            if ($name != "" && $sender_mail != "" && $subject != "" && $message != ""){
                $filled = true;
                $send = mail($to,$subject,$message,$from);
                if ($send) {
                    $mail_send = true;
                }else{
                    $mail_send = false;
                }
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - iDiscuss</title>
    <link rel="shortcut icon" href="img_logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/jquery.smartmenus.bootstrap-4.css"/>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/font-awesome.css">
     <!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/4.6/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/4.6/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/4.6/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/4.6/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/4.6/assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
<link rel="icon" href="/docs/4.6/assets/img/favicons/favicon.ico">
<meta name="msapplication-config" content="/docs/4.6/assets/img/favicons/browserconfig.xml">
<meta name="theme-color" content="#563d7c">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
      
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
      
      html {
  font-size: 14px;
}
@media (min-width: 768px) {
  html {
    font-size: 16px;
  }
}

.container {
  max-width: 960px;
}

.pricing-header {
  max-width: 700px;
}

.card-deck .card {
  min-width: 220px;
}
    </style>

    <style>
        .contact-link{
            color: white !important;
        }
        .content{
            min-height: 85vh !important;
        }
    </style>
</head>
<body>
    <?php require "partials/_header.php"; ?>
    <?php include "partials/_signup_and_login_alerts.php"; ?>
    <?php 
    
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if (isset($_POST['name'])){
            if ($name != "" && $sender_mail != "" && $subject != "" && $message != ""){
                if ($mail_send == true){
                    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                    <strong>ERROR! - </strong> MAIL IS SENDED SUCCESSFULLY
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>";
                }else{
                    echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                    <strong>ERROR! - </strong> FAILED TO SEND MAIL
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>";
                }
            }
            if (!$filled){
                echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <strong>ERROR! - </strong> PLEASE FILL ALL ENTRIES
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>";
            }
        }
    }
    ?>

<div class="content container">
<!--start wrapper-->
<section class="wrapper" style='margin-top: 100px;'>
<section class="contact_3">
<div class="container">
    <div class="row sub_content">
        <div class="col-sm-12 text-center">
            <div class="dividerHeading">
                <h4><span>Get in Touch</span></h4>
            </div>
            <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad blanditiis excepturi ipsum non, sequi soluta. Cupiditate incidunt sunt velit? Accusantium aperiam fugit iure minus optio perferendis praesentium sed sequi voluptatibus. Aenean vulputate eleifend tellus.</p>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="alert alert-success hidden alert-dismissable" id="contactSuccess">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>Success!</strong> Your message has been sent to us.
            </div>

            <div class="alert alert-error hidden" id="contactError">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>Error!</strong> There was an error sending your message.
            </div>

            <form id="contactForm" action="/contact.php" novalidate="novalidate" method='POST'>
                <div class="row form-group">
                    <div class="col-md-4">
                        <label>Your name (required)</label>
                        <br>
                        <input type="text" id="name" name="name" class="form-control" maxlength="100" data-msg-required="Please enter your name." value="" placeholder="Name" >
                    </div>
                    <div class="col-md-4">
                        <label>Your Email (required)</label>
                        <br>
                        <input type="email" id="email" name="sender_email" class="form-control" maxlength="100" data-msg-email="Please enter a valid email address." data-msg-required="Please enter your email address." value="" placeholder="E-Mail" >
                    </div>
                    <div class="col-md-4">
                        <label>Subject</label>
                        <br>
                        <input type="text" id="subject" name="subject" class="form-control" maxlength="100" data-msg-required="Please enter the subject." value="" placeholder="Subject">
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-md-12">
                        <label>Your Message :-</label>
                        <br>
                        <textarea id="message" class="form-control" name="message" rows="10" cols="50" data-msg-required="Please enter your message." maxlength="5000" placeholder="Enter your Message"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12" style='margin-top: 10px;'>
                        <input type="submit" style='border-radius: 8px !important;' data-loading-text="Loading..." class="btn btn-default btn-lg" value="Send Message">
                    </div>
                </div>
            </form>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="sidebar">
                <div class="widget_info">
                    <div class="dividerHeading">
                        <h4><span>Contact Info</span></h4>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad blanditiis excepturi blanditiis ipsum non, sequi soluta. Cupiditate incidunt sunt velit? Accusantium aperiam fugit iure minus optio perferendis praesentium sed sequi voluptatibus. Aenean vulputate eleifend tellus.</p>
                    <ul class="row widget_info_contact clearfix">
                        <li class="col-md-4"><i class="fa"><img src="social-icons/map.png" alt=""></i><strong>Address</strong> <p> : #2021 Lorem ipsum dolor sit amet Delhi 125001</p></li>
                        <li class="col-md-4"><i class="fa"><img src="social-icons/mail.png" alt=""></i> <strong>Email</strong><p> : <a href="#" style='font-size: 10px !important;'> Vedanshyadav350@example.com</a></p> <p>: <a href="#"  style='font-size: 10px !important;'> Vedanshyadav228@example.com</a></p></li>
                        <li class="col-md-4"><i class="fa"><img src="social-icons/phone.png" alt=""></i><strong>Our Phone</strong> <p> : (+91) - 7014718318</p><p>: (+91) - 7014005160</p></li>
                    </ul>
                </div>

                <div class="widget_social">
                        <!--<div class="dividerHeading">
                            <h4><span>Get Social</span></h4>
                        </div>-->
            <ul class="widget_social" style='display: flex; align-items: center; justify-content: center;'>
                <li><a class="fb" href="#." data-placement="bottom" data-toggle="tooltip" title="Facbook"><i class="fa"><img src="social-icons/facebook.png" alt="Facebook-icon"></i></a></li>
                <li><a class="twtr" href="#." data-placement="bottom" data-toggle="tooltip" title="Twitter"><i class="fa"><img src="social-icons/twitter.png" alt="Twitter-icon"></i></a></li>
                <li><a class="instagram" href="#." data-placement="bottom" data-toggle="tooltip" title="Instagram"><i class="fa"><img src="social-icons/instagram.png" alt="Instagram-icon"></i></a></li>
                <li><a class="youtube" href="#." data-placement="bottom" data-toggle="tooltip" title="Youtube"><i class="fa"><img src="social-icons/youtube.png" alt="Youtube-icon"></i></a></li>
            </ul>
        </div>
    </div>
</div>

    </div>
</div>
</section>
</section>
<!--end wrapper-->

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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
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