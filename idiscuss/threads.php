<?php 
    $noresult = true;
    include "partials/_dbconnect.php";
    session_start();
    include "partials/_login_and_signup_script.php";
    $threadid = $_GET['thread_id'];
    $sql = "SELECT * FROM `threads` WHERE `thread_id`='$threadid'";
    $result = mysqli_query($conn,$sql);
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $comment = $_POST['comment'];
            $comment = str_replace("<","&lt;",$comment);
            $comment = str_replace(">","&gt;",$comment);
            $user = $_SESSION['username'];
            $userid_sql = "SELECT * FROM `users988` WHERE `UserName`='$user'";
            $useridresult = mysqli_query($conn,$userid_sql);
            $userid_row = mysqli_fetch_assoc($useridresult);
            $userid = $userid_row['s.r.'];
            $insert_comment_sql="INSERT INTO `comments` (`comment_thread_id`, `comment_description`, `comment_user_id`, `time`) VALUES ('$threadid', '$comment', '$userid', current_timestamp())";
            $insert_comment_result=mysqli_query($conn,$insert_comment_sql);
            echo "<script>console.log('Your Comment" . '"'." $comment " . '"' ." is posted successfully');</script>";
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thread Discussion</title>
    <link rel="shortcut icon" href="img_logo.png" type="image/x-icon">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
    .jumbotron {
        border-radius: 15px !important;
        background: #d9dde0 !important;
    }

    a {
        cursor: pointer;
    }

    .content {
        min-height: 83vh;
    }
    </style>
</head>

<body>
    <?php require "partials/_header.php"; ?>
    <?php include "partials/_signup_and_login_alerts.php"; ?>

    <div class="content container">
        <?php
                // $row = mysqli_fetch_assoc($result);
                $row=mysqli_fetch_assoc($result);
                $userid = $row['thread_user_id'];
                $usersql = "SELECT * FROM `users988` WHERE `s.r.`='$userid'";
                $user_result = mysqli_query($conn,$usersql);
                $row2 = mysqli_fetch_assoc($user_result);
                $username = $row2['UserName'];
                echo "<div class='jumbotron my-3 p-3'>
                            <h4 class='display-4 text-capitalize'>Thread Title :- ". $row['thread_title'] ."</h4>
                            <p class='lead'><b>Thread Description :- </b>" . $row['thread_description'] . "</p>
                            <hr class='my-4'>
                            <p>Posted by <b>". $username ."</b><span class='badge bg-secondary mx-2'>on ". $row['time'] ."</span></p>
                            <a class='btn btn-success btn-lg' href='#' role='button'>Learn more</a>
                    </div>";
            ?>
        <h2 class='my-3'><u>Discussion</u></h2>
        <?php
                if(isset($_SESSION['loggedin'])){
                   echo "<p>You can POST thread :- </p>
                   <form class='mb-3 d-flex' action = '". $_SERVER['REQUEST_URI'] ."' method='POST'>
                   <textarea style='height: 38px;' type='text' class='form-control' name='comment' id='comment' placeholder='Type your thread here'></textarea>
                   <button type='submit' class='btn btn-outline-success mx-2'>POST</button>
                   </form><br>
                   ";
                }else {
                    echo "<h4 style='display: inline-block;'>Please login to Post thread :-  </h4><a class='btn btn-primary btn-sm mx-2' data-bs-toggle='modal' data-bs-target='#loginmodal'>Log in</a> <h3 class='d-inline-block mx-2'> or </h3> <a class='btn btn-primary btn-sm mx-2' data-bs-toggle='modal' data-bs-target='#signupmodal'>Signup</a>";
                }
            ?>

        <!-- PHP Logic to show comments -->
        <?php 
            // While loop to get data from Comments Table
            $comment_sql="SELECT * FROM `comments` WHERE `comment_thread_id`='$threadid'";
            $comment_result=mysqli_query($conn,$comment_sql);
            while ($comments_row = mysqli_fetch_assoc($comment_result)){
                $noresult = false;
                $comment_desc = $comments_row['comment_description'];
                // getting username
                $userid = $comments_row['comment_user_id'];
                $usersql = "SELECT * FROM `users988` WHERE `s.r.`='$userid'";
                $user_result = mysqli_query($conn,$usersql);
                $row2 = mysqli_fetch_assoc($user_result);
                $username = $row2['UserName'];
                // printing all threads from table
                echo "<div class='media d-flex px-3 my-1'>
                            <img src='img/unknown-user.png' class='mr-3' alt='unknown-user' style='height: 65px; padding-right: 10px;'>
                            <div class='media-body'>
                                <h5 class='mt-0'>". $username ."</h5>
                                <p>$comment_desc</p>
                            </div>
                    </div>";
                }
                // Alert when there is no comment
                if($noresult == true){
                    echo "<div class='alert alert-success fade show' role='alert'>
                    <strong>No Threads Found!</strong> - Be the first person to Start Discussion
                    </div><br><hr>";
                }
                echo "<br>";
            ?>
    </div>

    <?php require 'partials/_footer.php' ?>

    <!-- Javascript Files -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.js"></script>
</body>

</html>