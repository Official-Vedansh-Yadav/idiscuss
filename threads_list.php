<?php 
    $noresult = true;
    include "partials/_dbconnect.php";
    
    // server should keep session data for AT LEAST 1 hour
    ini_set('session.gc_maxlifetime', 31536000);

    // each client should remember their session id for EXACTLY 1 hour
    session_set_cookie_params(31536000);

    session_start(); // ready to go!
    
    include "partials/_login_and_signup_script.php";  
    // PHP SCRIPT TO INSERT THREAD IN OUR DATABASE
    $catid = $_GET['catid'];
    $sql = "SELECT * FROM `categories` WHERE category_id='$catid'";
    $result = mysqli_query($conn,$sql);
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['thread']) && $_POST['thread'] != "" && $_POST['thread_title'] != ""){
            $user = $_SESSION['username'];
            $userid_sql = "SELECT * FROM `users988` WHERE `UserName`='$user'";
            $useridresult = mysqli_query($conn,$userid_sql);
            $userid_row = mysqli_fetch_assoc($useridresult);
            $userid = $userid_row['s.r.'];
            $thread_title = $_POST['thread_title'];
            $thread = $_POST['thread'];
            $thread = str_replace("<","&lt;",$thread);
            $thread = str_replace(">","&gt;",$thread);
            $thread_title = str_replace("<","&lt;",$thread_title);
            $thread_title = str_replace(">","&gt;",$thread_title);
            $insert_thread_sql = "INSERT INTO `threads` (`thread_user_id`,`thread_title`,`thread_description`, `thread_cat_id`, `time`) VALUES ('$userid','$thread_title','$thread', '$catid', current_timestamp())";
            $insert_result=mysqli_query($conn,$insert_thread_sql);
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php $row= mysqli_fetch_assoc($result); $title=$row['category_name']; echo "$title - Threads"; ?></title>
    <link rel="shortcut icon" href="http://idiscuss.getenjoyment.net/img_logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/dataTables.min.css">
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
        .jumbotron{
            border-radius: 15px !important;
            background: #d9dde0 !important;
        }
        a{
            cursor: pointer;
        }
        .content{
            min-height: 83vh;
        }
    </style>
</head>
<body>
    <?php require "partials/_header.php"; ?>
    <?php include "partials/_signup_and_login_alerts.php"; ?>
    <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['thread'])){
            
            if ($_POST['thread'] == ""){
                echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                <strong>ERROR!</strong> - Thread is blank Please fill it to submit
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>";
            }else {
                if ($insert_result) {
                    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                    <strong>Success!</strong> - YOUR THREAD IS ADDED! PLEASE WAIT UNTILL SOMEONE RESPOND
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>";
                }else {
                    echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                    <strong>ERROR!</strong> - SOME THING WENT WRONG
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>";
                }
            }

            }}
    ?>

        <div class="content container">
            <?php
            // $row = mysqli_fetch_assoc($result);
                echo "<div class='jumbotron my-3 p-3'>
                            <h1 class='display-4'>Welcome to - " . $row['category_name'] . " Forum</h1>
                            <p class='lead'>" . $row['category_description'] . "</p>
                            <hr class='my-4'>
                            <p>This is a perr to perr Forum to share Knowledege with each other.</p>
                            <a class='btn btn-success btn-lg' href='#' role='button'>Learn more</a>
                    </div>";
            ?>
            <h2 class='my-3'><u>Browse Questions</u></h2>
            <!-- Post Threads if you logged in -->
            <br>
            <?php
                if(isset($_SESSION['loggedin'])){
                   echo "<p>You can POST thread :- </p>
                   <form class='mb-3' action = '". $_SERVER['REQUEST_URI'] ."' method='POST'>
                   <div class='mb-3'>
                            <label for='exampleInputEmail1' class='form-label'>Thread Title</label>
                            <input type='text' class='form-control' id='thread_title' name='thread_title' aria-describedby='emailHelp'>
                        </div>
                        <div class='mb-3'>
                            <label for='thread_desc' class='form-label'>Thread Description</label>
                            <textarea class='form-control' id='thread_desc' name='thread' rows='3'></textarea> 
                        </div>
                        <button type='submit' class='btn btn-outline-success'>Submit</button>
                   </form><br>
                   ";
                }else {
                    echo "<h4 style='display: inline-block;'>Please login to Post thread :-  </h4><a class='btn btn-primary btn-sm mx-2' data-bs-toggle='modal' data-bs-target='#loginmodal'>Log in</a> <h3 class='d-inline-block mx-2'> or </h3> <a class='btn btn-primary btn-sm mx-2' data-bs-toggle='modal' data-bs-target='#signupmodal'>Signup</a>";
                }

            ?>
            <hr><br>
            <!-- PHP logic to show threads dynamically -->
            <?php 
            $sr = 1;
            // While loop to get data from threads loop
            $threads_sql = "SELECT * FROM `threads` WHERE `thread_cat_id`='$catid'";
            $threads_result = mysqli_query($conn,$threads_sql);    
            while ($threads_row = mysqli_fetch_assoc($threads_result)){
                $noresult = false;
                $threads_desc = $threads_row['thread_description'];
                // getting username
                $userid = $threads_row['thread_user_id'];
                $usersql = "SELECT * FROM `users988` WHERE `s.r.`='$userid'";
                $user_result = mysqli_query($conn,$usersql);
                $row2 = mysqli_fetch_assoc($user_result);
                $username = $row2['UserName'];
                $thread_title=$threads_row['thread_title'];
                // printing all threads from table
                echo "<div class='media d-flex px-3 my-1'>
                        <img src='img/unknown-user.png' class='mr-3' alt='unknown-user' style='height: 65px; padding-right: 10px;'>
                        <div class='media-body'>
                            <h5>". substr($thread_title,0,25) ."<span class='badge bg-secondary mx-2'>$username</span></h5>
                            <p><a class='text-dark' href='/threads.php?thread_id=". $threads_row['thread_id'] ."'>". substr($threads_desc, 0, 150) ."... <span class='text-info'>read more</span></a></p>
                        </div>
                </div>";
                }
                // Alert when there is no Question
                if($noresult == true){
                    echo "<div class='alert alert-success fade show' role='alert'>
                    <strong>No Threads Found!</strong> - Be the first person to ask a Question or a Thread
                    </div><br><hr>";
                }
                echo "<br>";
            ?>

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

<!-- <div class='media d-flex px-3 my-1'>
        <img src='img/unknown-user.png' class='mr-3' alt='unknown-user' style='height: 65px; padding-right: 10px;'>
        <div class='media-body'>
            <h5 class='mt-0'>". $username ."</h5>
            <p><a class='text-dark' href='/threads.php?thread_id=". $threads_row['thread_id'] ."'>". substr($threads_desc, 0, 150) ."... <span class='text-info'>read more</span></a></p>
        </div>
</div> -->