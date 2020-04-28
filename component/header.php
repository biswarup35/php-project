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
            <!-- <a href="home.php" class="brand-logo">TeacherFinder</a> -->
            <img class="brand-logo" src="image/Teacher.png" alt="TeacherFinder" height="56" width="140">
            <a href="#" class="sidenav-trigger" data-target="mobile-links">
                <i class="material-icons">menu</i>
            </a>
            <ul class="right  hide-on-med-and-down">
                <li><a class="btn blue darken-4" href="home.php">Home</a></li>
                <li><a class="btn blue darken-4" href="index.php">Find teacher</a></li>
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
    <ul class="sidenav collection" id="mobile-links">
            <li class="collection-item blue darken-4"><h6 class="white-text center"><b>Menu</b></h6></li>
            <li class="collection-item"><a href="home.php">Home</a></li>
            <li class="collection-item"><a href="index.php">Find Teacher</a></li>
            <li class="collection-item"><a href="about.php">About us</a></li>
            <li class="collection-item"><a href="contact.php">Contact us</a></li>
            <?php
                if (isset($_SESSION['userName'])) {
                    echo '<li class="collection-item"><a href="user/logout.php">log out</a></li>';
                } else {
                    echo '<li class="collection-item"><a href="/project/login.php">log in</a></li>';
                }
                ?>
    </ul>