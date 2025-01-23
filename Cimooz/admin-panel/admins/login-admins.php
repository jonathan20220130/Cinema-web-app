<?php require_once "../../config/config.php"; ?>
<?php require_once "../../libs/App.php"; ?>
<?php  require_once "../layouts/header.php"; ?>


<?php
$app = new App();
$app->validateAdminSession();
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

    $query = "SELECT * FROM admins WHERE email='$email'";


    $data = [
        "email" => $email,
        "password" => $password,
    ];

    $path = ADMIN_URL;

    $app->login_admin($query, $data, $path);

    //$user->creatAccount($firstName, $lastName, $username, $email, $password, $age);
}
?>


<div class="row">
  <div class="col">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title mt-5">Login</h5>
        <form method="POST" class="p-auto" action="login-admins.php">
          <!-- Email input -->
          <div class="form-outline mb-4">
            <input type="email" name="email" id="form2Example1" class="form-control" placeholder="Email" />

          </div>


          <!-- Password input -->
          <div class="form-outline mb-4">
            <input type="password" name="password" id="form2Example2" placeholder="Password" class="form-control" />

          </div>



          <!-- Submit button -->
          <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Login</button>


        </form>

      </div>
    </div>
  </div>
  <?php require_once "../layouts/footer.php"; ?>