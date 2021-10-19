<?php 
    include "partials/_dbconnect.php";
    // server should keep session data for AT LEAST 1 hour
    ini_set('session.gc_maxlifetime', 31536000);

    // each client should remember their session id for EXACTLY 1 hour
    session_set_cookie_params(31536000);

    session_start(); // ready to go!

    include "partials/_login_and_signup_script.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iDiscuss - FORUM WEBSITE</title>
    <link rel="shortcut icon" href="img_logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
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

/*.container {
  max-width: 960px;
}*/

.pricing-header {
  max-width: 700px;
}

.card-deck .card {
  min-width: 220px;
}
    </style>
    <meta name="theme-color" content="#7952b3">
    <style>
        
        .block-1,
        .block-2{
            align-items: center;
            justify-content: center;
        }
        .home-link{
            color: white !important;
        }
        .row{
            justify-content: center;
        }
        .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
      .logo{
            height: 255px !important;
        }
    </style>
</head>
<body>
    <?php require "partials/_header.php"; ?> 
    <?php include "partials/_signup_and_login_alerts.php"; ?>
    
    <section class="py-3 text-center container">
        <div class="row">
           <div class="col-lg-6 col-md-8 mx-auto">
              <img src="img_logo.png" alt="iDiscuss Logo" class="logo text-center my-4">
              <h1 class="fw-light">iDiscuss</h1>
              <p class="lead text-muted">Join iDiscuss to learn, clear threads, share knowledge, and build your career.</p>
              <p>
                <a target="_blank" href="https://www.youtube.com/c/VedanshTechtutorials" class="btn btn-danger my-2">Subscribe</a>
                <a target="_blank" href="https://chat.whatsapp.com/HdtAyb3Zj5eGtwd0bBzbke" class="btn btn-primary my-2">Join Whatsapp Group</a>
              </p>
           </div>
        </div>
    </section>

    <div class="container my-3 d-flex-column">
        <h1 class="text-center my-3">welcome to iDiscuss - Browse Categories</h1>
        <div class="row text-justify container">
            <?php 
                $sql = "SELECT * FROM `categories`";
                $result = mysqli_query($conn,$sql);
                // Fethcing data of rows by while loop
                while($row = mysqli_fetch_assoc($result)){
                    $category_id = $row['category_id'];
                    $category_name = $row['category_name'];
                    $category_description = $row['category_description'];
                  echo "<div class='my-2 mx-2 card' style='width: 18rem;'>
                                    <img src='img/card/card-" . $row['category_id'] . ".jpg' class='pt-2' alt='' class='card-img-top'>
                                <div class='card-body'> 
                                    <h4 class='card-title py-2 text-dark'><a href='/threads_list.php?catid=" . $category_id ."'>" . $category_name . "</a></h4>
                                    <p class='card-text'> " . substr($category_description , 0 , 100) . "...</p>
                                    <a class='btn btn-primary' href='/threads_list.php?catid=" . $category_id ."'>View Threads</a>
                                </div>
                        </div>";
                }
                ?>
        </div>
    </div>
    <?php require 'partials/_footer.php'; ?>

    <!-- Javascript Files -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</html>