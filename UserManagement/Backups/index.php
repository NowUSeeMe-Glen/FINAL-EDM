<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user'])) {
    // Redirect to login page
    header("Location: public/view/login.php");
    exit();
}

// Your existing index page content goes here
?>

        <!--  -->

