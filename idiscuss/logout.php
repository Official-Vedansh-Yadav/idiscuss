<?php
    session_start();
    session_unset();
    session_destroy();
    $requets_uri = $_SERVER['REQUEST_URI'];
    header("location: $requets_uri");
?>