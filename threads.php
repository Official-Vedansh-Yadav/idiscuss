<?php 
    $noresult = true;
    include "partials/_dbconnect.php";
    // server should keep session data for AT LEAST 1 hour
    ini_set('session.gc_maxlifetime', 31536000);

    // each client should remember their session id for EXACTLY 1 hour
    session_set_cookie_params(31536000);

    session_start(); // ready to go!
    
    include "partials/_login_and_signup_script.php";
    
    // getting the thread from database
    $threadid = $_GET['thread_id'];
    $sql = "SELECT * FROM `threads` WHERE `thread_id`='$threadid'";
    $thread_result = mysqli_query($conn,$sql);
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thread Discussion</title>
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
</head>

<body>
    <?php require "partials/_header.php"; ?>
    <?php include "partials/_signup_and_login_alerts.php"; ?>

    <div class="content container">
        <?php
                // $row = mysqli_fetch_assoc($result);
                $row=mysqli_fetch_assoc($thread_result);
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
                            <a target='_blank' class='btn btn-danger btn-lg' href='https://youtube.com/c/vedanshtechtutorials' role='button'>Subscribe</a>
                    </div>";
            ?>
        <h2 class='my-3'><u>Discussion</u></h2>
        <?php
                if(isset($_SESSION['loggedin'])){
                   echo "<p>You can POST thread :- </p>
                   <div class='mb-3 d-flex'>
                   <textarea style='height: 38px;' type='text' class='form-control' name='comment' id='comment' placeholder='Type your thread here'></textarea>
                   <button type='submit' id='post' class='btn btn-outline-success mx-2'>POST</button>
                   </div><br>
                   ";
                }else {
                    echo "<h4 style='display: inline-block;'>Please login to Post thread :-  </h4><a class='btn btn-primary btn-sm mx-2' data-bs-toggle='modal' data-bs-target='#loginmodal'>Log in</a> <h3 class='d-inline-block mx-2'> or </h3> <a class='btn btn-primary btn-sm mx-2' data-bs-toggle='modal' data-bs-target='#signupmodal'>Signup</a>";
                }
            ?>

        <div class="comments"></div>
       
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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="js/jquery.js"></script>
    <script>
        // showing all comments in every 1 second
        setInterval(showMessages,1000);
        function showMessages(){
          $.post("html_content.php", {"thread_id" : "<?php echo $_GET['thread_id']?>"} ,function(data, status){
                 document.getElementsByClassName("comments")[0].innerHTML = data;
          });
        }

        // code to post a comment
        $("#post").click(
        function(){
        var comment = $("#comment").val();
        $.post("actions.php",{"thread_id" : "<?php echo $_GET['thread_id'] ?>", "username" : "<?php echo $_SESSION['username'] ?>", "comment" : comment});
        $("#comment").val("");
        })
	</script>
</body>

</html>