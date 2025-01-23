<?php require __DIR__ . "/config/config.php"; ?>
<?php require __DIR__ . "/libs/App.php"; ?>
<?php require __DIR__ . "/includes/header.php"; ?>


<div class="container-xxl py-5 bg-dark Cinema123-header mb-5 bg-brightness">
    <div class="container text-center my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Checkout</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center text-uppercase">
                <li class="breadcrumb-item"><a href="<?php echo APP_URL ; ?>">Home</a></li>
            </ol>
        </nav>
    </div>
</div>

<div class="d-flex align-items-center justify-content-center vh-100">
    <div class="text-center">
        <h1 class="display-1 fw-bold">404</h1>
        <p class="fs-3"> <span class="text-danger">Opps!</span> Page not found.</p>
        <p class="lead">
            The page you’re looking for doesn’t exist.
        </p>
        <a href="<?php echo APP_URL ; ?>" class="btn btn-primary">Go Home</a>
    </div>
</div>

<?php require __DIR__ . "/includes/footer.php"; ?>