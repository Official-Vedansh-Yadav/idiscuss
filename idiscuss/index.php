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
    <title>iDiscuss - FORUM WEBSITE</title>
    <link rel="shortcut icon" href="img_logo.png" type="image/x-icon">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        .carousel-item{
            width: 100vw;
            height: 60vh;
        }
        .carousel-item img{
            width: 100%;
            height: 100%;
        }
        .block-1,
        .block-2{
            align-items: center;
            justify-content: center;
        }
        .home-link{
            color: white !important;
        }
        .card img{
            height: 200px;
        }
        .row{
            justify-content: center;
        }
    </style>
</head>
<body>
    <?php require "partials/_header.php"; ?> 
    <?php include "partials/_signup_and_login_alerts.php"; ?>
    
    <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-bs-ride="carousel">
    <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
    <div class="carousel-item active">
    <img src="img/slider/slider-img-1.jpg" class="d-block w-100" alt="slider_Image_1">
    </div>
    <div class="carousel-item">
    <img src="img/slider/slider-img-2.jpg" class="d-block w-100" alt="slider_Image_2">
    </div>
    <div class="carousel-item">
    <img src="img/slider/slider-img-3.jpg" class="d-block w-100" alt="slider_Image_3">
    </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
    </button>
    </div>

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
                                    <a class='btn btn-primary' href='/idiscuss/threads_list.php?catid=" . $category_id ."'>View Threads</a>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/jquery.js"></script>
</body>
</html>