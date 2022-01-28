<?php
    session_start();
    // include functions and connnect to database
    include "functions.php";
    $sql = connect_to_database();
    // page is set to home.php by default
    $page = isset($_GET["page"]) && file_exists($_GET["page"].".php") ? $_GET["page"] : "home";
    // Include and show the requested page
    include $page.".php";
?>
