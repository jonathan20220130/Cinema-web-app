<?php require __DIR__ . "/../config/config.php"; ?>
<?php require __DIR__ . "/../libs/App.php"; ?>
<?php require __DIR__ . "/../includes/header.php"; ?>

<?php

$app = new App();
$app->validateSession();

if (isset($_POST['submit'])) {

    $requiredFields = ['firstName', 'lastName', 'username', 'email', 'password', 'age'];
    foreach ($requiredFields as $field) {
        if (empty($_POST[$field])) {
            echo "<script>alert('Please fill in all required fields')</script>";
            exit;
        }
    }

    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $username = $_POST['username'];
    // if (Users::isUsernameTaken($username)) {
    //     echo "<script>alert('Username is already taken')</script>";
    //     exit;
    // }
    $email = $_POST['email'];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Please provide a valid email address')</script>";
        exit;
    }
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $age = $_POST['age'];

    $query = "INSERT INTO users (firstName, lastName, username, email, password, age) 
    VALUES (:firstName, :lastName, :username, :email, :password, :age)";


    $array = [
        ":firstName" => $firstName,
        ":lastName" => $lastName,
        ":username" => $username,
        ":email" => $email,
        ":password" => $password,
        ":age" => $age,
    ];

    $path = "login.php";

    $app->register($query, $array, $path);

    //$user->creatAccount($firstName, $lastName, $username, $email, $password, $age);
}
?>

<style>
    .alt {
        text-align: center;
        margin: text-center;
    }
</style>



<div class="container-xxl py-5 bg-dark Cinema123-header mb-5 bg-brightness">
    <div class="container text-center my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">🎉Welcome to our world!🎉</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center text-uppercase">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Register</a></li>
            </ol>
        </nav>
    </div>
</div>
</div>
<!-- Navbar & Hero End -->


<!-- Service Start -->
<div class="container">
    <div class="row justify-content-center align-items-center vh-100 form-background">
        <div class="col-md-8 bg-dark">
            <div class="p-4 wow fadeInUp" data-wow-delay="0.2s">
                <h5 class="section-title ff-secondary text-start text-primary fw-normal">Register</h5>
                <h1 class="text-white mb-3">Registration</h1>
                <form class="col-md-12" method="post">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" name="firstName" class="form-control" id="first-name" placeholder="First Name" required>
                                <label for="first-name">First Name</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" name="lastName" class="form-control" id="last-name" placeholder="Last Name">
                                <label for="last-name">Last Name</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" name="username" class="form-control" id="username" placeholder="Username">
                                <label for="username">Username</label>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="date" name="dateOfBirth" class="form-control" id="date-of-birth" placeholder="Date of Birth" required>
                                <label for="date-of-birth">Date of Birth</label>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="number" name="age" class="form-control" id="age" placeholder="Age" min="16" readonly>
                                <label for="age">Age</label>
                            </div>
                        </div>

                        <script>
                            document.addEventListener("DOMContentLoaded", function() {
                                document.getElementById('date-of-birth').addEventListener('change', function() {
                                    var dob = new Date(this.value);
                                    var today = new Date();
                                    var age = today.getFullYear() - dob.getFullYear();
                                    var m = today.getMonth() - dob.getMonth();
                                    if (m < 0 || (m === 0 && today.getDate() < dob.getDate())) {
                                        age--;
                                    }
                                    if (age < 16) {
                                        alert('You must be at least 16 years old to use this form.');
                                        this.value = ''; // Clear the input field
                                    }
                                    document.getElementById('age').value = age; // Set the calculated age
                                });
                            });
                        </script>


                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="email" name="email" class="form-control" id="email" placeholder="Your Email" required>
                                <label for="email">Your Email</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="password" name="password" class="form-control" id="password" placeholder="Your Password" required>
                                <label for="password">Password</label>
                            </div>
                        </div>

                        <div class="col-md-12 mt-3">
                            <button name="submit" class="btn btn-primary w-100 py-3" type="submit">Register</button>
                        </div>
                    </div>
                </form>

                <div class="mt-3 alt">
                    <h2>Already Have an account !!</h2>
                    <h6><a href="login.php" style="text-decoration: underline;">login</a></h6>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Service End -->


<?php require "../includes/footer.php" ?>