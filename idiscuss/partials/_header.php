<?php
    echo 
    "

    <nav class='navbar navbar-expand-lg navbar-dark bg-dark'>
    <div class='container-fluid'>
    <a class='navbar-brand' href='/idiscuss'>PHP Forum</a>
    <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>
    <span class='navbar-toggler-icon'></span>
    </button>
    <div class='collapse navbar-collapse' id='navbarSupportedContent'>
    <ul class='navbar-nav me-auto mb-2 mb-lg-0'>
    <li class='nav-item'>
    <a class='nav-link active text-secondary home-link' aria-current='page' href='/idiscuss'>Home</a>
    </li>
    <li class='nav-item'>
    <a class='nav-link active text-secondary about-link' aria-current='page' href='/idiscuss/about.php'>About</a>
    </li>
    <li class='nav-item dropdown'>
        <a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
            Dropdown
        </a>
        <ul class='dropdown-menu' aria-labelledby='navbarDropdown'>
            <li><a class='dropdown-item' href='#'>Action</a></li>
            <li><a class='dropdown-item' href='#'>Another action</a></li>
            <li><hr class='dropdown-divider'></li>
            <li><a class='dropdown-item' href='#'>Something else here</a></li>
        </ul>
    </li>    
    <li class='nav-item'>
    <a class='nav-link active text-secondary contact-link' aria-current='page' href='/idiscuss/contact.php'>Contact</a>
    </li>
    </ul>
    <form class='d-flex' action='/idiscuss/search.php' method='GET'>
    <input class='form-control me-2' type='search' placeholder='Search' name='search' aria-label='Search'>
    <button class='btn btn-success' type='submit'>Search</button>
    </form>";
    if(isset($_SESSION['loggedin'])){
        echo "<img src='img/unknown-user.png' class='mx-2' alt='unknown-user' style='height: 40px;'>";
        echo "<p CLASS='mr-2 my-1 text-light text-uppercase'><span class='text-danger'>Welcome</span> - <u>@" . $_SESSION['username'] . "</u></p>";
        echo "<a href='/logout.php' class='btn btn-danger mx-2'>Logout</a>";
    }else{
        echo "<button class='btn btn-danger mx-2' data-bs-toggle='modal' data-bs-target='#loginmodal'>Login</button>
        <button class='btn btn-danger mr-2' data-bs-toggle='modal' data-bs-target='#signupmodal'>Signup</button> ";
    }
    echo "
    </div>
    </div>
    </nav> ";
    include "partials/_loginModal.php";
    include "partials/_signupModal.php";
?>