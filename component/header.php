<?php session_start();
header("Cache-Control: no-cache, must-revalidate");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Compiled and minified CSS -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
     <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
     <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
     <link rel="stylesheet" href="custom-css.css" rel="stylesheet">
    <title>PHP Project</title>
</head>
<body class="grey lighten-4">
    <nav class="nav-warper light-blue lighten-2 z-depth-0">
        <div class="container">
            <a href="home.php" class="brand-logo">TeacherFinder</a>
            <a href="#" class="sidenav-trigger" data-target="mobile-links">
                <i class="material-icons">menu</i>
            </a>
            <ul class="right  hide-on-med-and-down">
                <li><a class="btn blue darken-4" href="home.php">Home</a></li>
                <li><a class="btn blue darken-4" href="about.php">About Us</a></li>
                <li><a class="btn blue darken-4" href="contact.php">Contact Us</a></li>
                <?php
                if (isset($_SESSION['userName'])) {
                    echo '<li><a class="btn blue darken-4" href="user/logout.php">log out</a></li>';
                } else {
                    echo '<li><a class="btn blue darken-4" href="/project/login.php">log in</a></li>';
                }
                ?>
            </ul>
        </div>
    </nav>
    <ul class="sidenav" id="mobile-links">
            <li><a href="home.php">Home</a></li>
            <li><a href="about.php">About Us</a></li>
            <li><a href="contact.php">Contact Us</a></li>
            <?php
                if (isset($_SESSION['userName'])) {
                    echo '<li><a href="user/logout.php">log out</a></li>';
                } else {
                    echo '<li><a href="/project/login.php">log in</a></li>';
                }
                ?>
    </ul>