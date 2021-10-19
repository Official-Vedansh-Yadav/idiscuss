<?php
    // connecting to the database
    include 'partials/_dbconnect.php';
    
    // server should keep session data for AT LEAST 1 hour
    ini_set('session.gc_maxlifetime', 31536000);

    // each client should remember their session id for EXACTLY 1 hour
    session_set_cookie_params(31536000);

    session_start(); // ready to go!
    
    include "partials/_login_and_signup_script.php"; 
    $search=$_GET['search'];
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
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
        #fullheight{
            min-height: 83vh;
        }
    </style>
    <title>Welcome to iDiscuss - Coding Forums</title>
</head>
<body>

    <?php include 'partials/_header.php';?>
    <?php include "partials/_signup_and_login_alerts.php"; ?>
    
    <!-- Search Results -->
  <div class="container my-3" id="fullheight">
        <h1 class="py-3">Search results for <em>"<?php echo $search; ?>"</em></h1>
                
                <?php
                        // getting search results
                        
                        $search_sql = "SELECT * FROM `threads` WHERE thread_title LIKE  '%$search%' OR thread_description LIKE '%$search%'";
                        $search_result = mysqli_query($conn,$search_sql);    
                        $noresult=true;                      
                        while ($search_row = mysqli_fetch_assoc($search_result)){
                            $noresult = false;
                            $title=$search_row['thread_title'];
                            $description = $search_row['thread_description'];
                            // Creating a url to be open for a search resul
                            $threadid = $search_row['thread_id'];
                            $url="/threads.php?thread_id=$threadid";
                            // Displaying Search Results
                            echo "<div class='result'>
                                <h3><a href='$url' class='text-dark'>$title</a></h3>
                                <p>$description</p>
                            </div>";
                        }

                    // message when no search result find
                    if ($noresult) {
                        echo '<div class="col-md-12 fluid">
                        <div class="h-60 p-5 bg-light border rounded-3 fluid w-100">
                          <h1 class="display-5 fw-bold">No results containing all your search terms were found.</h1>
                          <p class="col-md-8 fs-4">Your search - '. $search .' - did not match any documents.</p>
                          <p class="col-md-8 fs-4">Suggestions :- </p>
                          <ul>
                          <li>Make sure that all words are spelled correctly.</li>
                          <li>Try different keywords.</li>
                          <li>Try more general keywords.</li>
                          </ul>
                        </div>
                      </div>';
                    }
            ?> 
              
  </div>

    <?php include 'partials/_footer.php'; ?>
    <!-- Optional JavaScript -->
    <script src="js/jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>