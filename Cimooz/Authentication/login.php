<?php require __DIR__ . "/../config/config.php"; ?>
<?php require __DIR__ . "/../libs/App.php"; ?>
<?php require __DIR__ . "/../includes/header.php"; ?>

<?php
$app = new App();
$app->validateSession();
if (isset($_POST['submit'])) {

    $requiredFields = ['email', 'password'];
    foreach ($requiredFields as $field) {
        if (empty($_POST[$field])) {
            echo "<script>alert('Please fill in all required fields')</script>";
            exit;
        }
    }
    $email = $_POST['email'];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Please provide a valid email address')</script>";
        exit;
    }
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE email='$email'";


    $data = [
        "email" => $email,
        "password" => $password,
    ];

    $path = "http://localhost/Cimooz";

    $app->login($query, $data, $path);

    //$user->creatAccount($firstName, $lastName, $username, $email, $password, $age);
}
?>


<div class="container-xxl py-5 bg-dark Cinema123-header mb-5 bg-brightness">
    <div class="container text-center my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Login</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center text-uppercase">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Login</a></li>
            </ol>
        </nav>
    </div>
</div>
</div>
<!-- Navbar & Hero End -->


<!-- Service Start -->
<div class="container">

    <div class="row justify-content-center"> <!-- Center the login form -->
        <div class="col-md-6 bg-dark"> <!-- Adjusted width and background color -->
            <div class="p-5 wow fadeInUp" data-wow-delay="0.2s">
                <h5 class="section-title ff-secondary text-start text-primary fw-normal">Login</h5>
                <h1 class="text-white mb-4">Login</h1>
                <form class="col-md-12" method="POST" action="login.php">
                    <div class="row g-3">

                        <div class="col-md-12"> <!-- Adjusted width -->
                            <div class="form-floating">
                                <input type="email" name="email" class="form-control" id="email" placeholder="Your Email">
                                <label for="email">Your Email</label>
                            </div>
                        </div>
                        <div class="col-md-12"> <!-- Adjusted width -->
                            <div class="form-floating">
                                <input type="password" name="password" class="form-control" id="email" placeholder="Your Email">
                                <label for="password">Password</label>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <button name="submit" class="btn btn-primary w-100 py-3" type="submit">Login</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Service End -->

<?php require "../includes/footer.php"; ?>