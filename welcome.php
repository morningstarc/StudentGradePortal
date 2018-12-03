<?
session_start();
include "utility_functions.php";

$sessionid =$_GET["sessionid"];
verify_session($sessionid);
?>
<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CMSC 4003 - Term Project</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vend<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>CMSC 4003 - Term Project</title>

        <!-- Bootstrap core CSS -->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom fonts for this template -->
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

        <!-- Plugin CSS -->
        <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css">

        <!-- Custom styles for this template -->
        <link href="css/freelancer.min.css" rel="stylesheet">

    </head>

<body id="page-top">

<!-- Navigation -->
<nav class="navbar navbar-expand-lg bg-secondary fixed-top text-uppercase" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">Term Project</a>
        <button class="navbar-toggler navbar-toggler-right text-uppercase bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item mx-0 mx-lg-1">
                    <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="index.html">Log In</a>
                </li>
                <li class="nav-item mx-0 mx-lg-1">
                    <?echo ("<a class=\"nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger\" href=\"user_list.php?sessionid=$sessionid\">Manage Users</a>"); ?>
                </li>
                <li class="nav-item mx-0 mx-lg-1">
                   <?echo ("<a class=\"nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger\" href=\"logout_action.php?sessionid=$sessionid\">Log Out</a>"); ?>
                </li>

            </ul>
        </div>
    </div>
</nav>

<!-- Header -->
<header class="masthead bg-primary text-white text-center">
    <div class="container">
        <h1 class="text-uppercase mb-0">Welcome</h1>
        <hr class="star-light">
    </div>
</header>

<!-- welcome Section -->
<section class="portfolio" id="login">
    <div class="container">

        <div class="row">
            <div class="p-lg-0">
                <p></p>


            </div>
        </div>
        <div class="row">
            <div class="col-sm">
<!-- Content -->

            </div>
            <div class="col-sm">

            </div>
            <div class="col-sm">

            </div>
        </div>
    </div>
</section>





<!-- Footer -->
<footer class="footer text-center">
    <div class="container">
        <div class="row">
            <div class="col-md-4 mb-5 mb-lg-0">
                <h5 class="text-uppercase mb-4">CMSC 4003</h5>
                <p class="lead mb-0">Term Project</p>
            </div>
            <div class="col-md-4 mb-5 mb-lg-0">
                <h5 class="text-uppercase mb-4">Team</h5>
                <p>Cornell</br>
                    Dresser</br>
                    Nee-Dels</br>
                    Steele</p>
            </div>
            <div class="col-md-4">
                <h5 class="text-uppercase mb-4">Changelog</h5>
                <p>Part 1: October 9, 2018</p>
                <p>Part 2: December 6, 2018</p>

            </div>
        </div>
    </div>
</footer>



<!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
<div class="scroll-to-top d-lg-none position-fixed ">
    <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top">
        <i class="fa fa-chevron-up"></i>
    </a>
</div>



<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Plugin JavaScript -->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

<!-- Contact Form JavaScript -->
<script src="js/jqBootstrapValidation.js"></script>
<script src="js/contact_me.js"></script>

<!-- Custom scripts for this template -->
<script src="js/freelancer.min.js"></script>

</body>

</html>

