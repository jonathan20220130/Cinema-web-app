<?php

$app = new App();
$app->startingSession();

define("APP_URL", "http://localhost/Cimooz");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Cimooz</title>
    <link rel="icon" type="image/x-icon" href="<?php echo APP_URL ;?>/img/about3.jpeg">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?php echo APP_URL; ?>/lib/animate/animate.min.css" rel="stylesheet">
    <link href="<?php echo APP_URL; ?>/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="<?php echo APP_URL; ?>/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?php echo APP_URL; ?>/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="<?php echo APP_URL; ?>/css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar & Hero Start -->
        <div class="container-xxl position-relative p-0">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0">
                <a href="<?php echo APP_URL ; ?>" class="navbar-brand p-0">
                    <h1 class="text-primary m-0"><i class="fa fa-film me-3"></i>Cimooz</h1>
                    <!-- <img src="img/logo.png" alt="Logo"> -->
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <form class="d-flex me-auto" method="post" action="<?php echo APP_URL ?>/search.php">
                        <input name="keyword" class="form-control me-2" type="search" placeholder="Search" aria-label="Search" style="max-width: 300px;">
                        <button name="submit" type="submit" class="btn btn-outline-primary">Search</button>
                    </form>
                    <div class="navbar-nav ms-auto py-0 pe-4">
                        <a href="<?php echo APP_URL; ?>" class="nav-item nav-link active">Home</a>
                        <a href="<?php echo APP_URL ?>/movies/movies.php" class="nav-item nav-link">Movies</a>
                        <a href="<?php echo APP_URL; ?>/movies/food.php" class="nav-item nav-link">Food & Drinks</a>

                        <?php if (isset($_SESSION['username'])) : ?>
                            <a href="<?php echo APP_URL ?>/movies/cart.php" class="nav-item nav-link"><i style="font-size:18px" class="fa">&#xf07a;</i>Cart</a>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <?php echo $_SESSION['firstName']; ?>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Your Account</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="<?php echo APP_URL; ?>/Authentication/logout.php">Logout</a></li>
                                </ul>
                            </li>
                        <?php else : ?>
                            <a href="<?php echo APP_URL; ?>/Authentication/login.php" class="nav-item nav-link">Login</a>
                            <a href="<?php echo APP_URL; ?>/Authentication/register.php" class="nav-item nav-link">Register</a>
                        <?php endif; ?>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</body>