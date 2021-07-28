<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        #fullheight{
            min-height: 83vh;
        }
    </style>
    <title>Welcome to iDiscuss - Coding Forums</title>
</head>
<body>

    <?php
            session_start();
            include 'partials/_dbconnect.php';
            include "partials/_login_and_signup_script.php"; 
            $search=$_GET['search'];
    ?>

    <?php include 'partials/_header.php';?>
    <?php include "partials/_signup_and_login_alerts.php"; ?>
    
    <!-- Search Results -->
  <div class="container my-3" id="fullheight">
        <h1 class="py-3">Search results for <em>"<?php echo $search; ?>"</em></h1>
                <?php
                        // getting search results
                        $search_sql = "SELECT * FROM `threads` WHERE MATCH (`thread_title`,`thread_description`) against ('$search')";
                        $search_result = mysqli_query($conn,$search_sql);    
                        $noresult=true;
                        while ($search_row = mysqli_fetch_assoc($search_result)){
                            $noresult = false;
                            $title=$search_row['thread_title'];
                            $description = $search_row['thread_description'];
                            // Creating a url to be open for a search resul
                            $threadid = $search_row['thread_id'];
                            $url="/idiscuss/threads.php?thread_id=$threadid";
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
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>