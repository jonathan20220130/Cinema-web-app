<?php require_once "../../config/config.php"; ?>
<?php require_once "../../libs/App.php"; ?>
<?php require_once "../layouts/header.php"; ?>

<?php

$app = new App();
$app->validateAdminSessionInside();

if (isset($_POST['submit'])) {

    $requiredFields = ['admin_name', 'email', 'password'];
    foreach ($requiredFields as $field) {
        if (empty($_POST[$field])) {
            echo "<script>alert('Please fill in all required fields')</script>";
            exit;
        }
    }

    $admin_name = $_POST['admin_name'];
    
    $email = $_POST['email'];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Please provide a valid email address')</script>";
        exit;
    }
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $query = "INSERT INTO admins (admin_name, email, password) 
    VALUES (:admin_name, :email, :password)";


    $array = [
        ":admin_name" => $admin_name,
        ":email" => $email,
        ":password" => $password,
    ];

    $path = "admins.php";

    $app->register($query, $array, $path);

    //$user->creatAccount($firstName, $lastName, $username, $email, $password, $age);
}
?>

<div class="row">
  <div class="col">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title mb-5 d-inline">Create Admins</h5>
        <form method="POST" action="create-admins.php" enctype="multipart/form-data">
          <!-- Email input -->
          <div class="form-outline mb-4">
            <input type="text" name="admin_name" id="form2Example1" class="form-control" placeholder="Admin Name" />
          </div>

          <div class="form-outline mb-4 mt-4">
            <input type="email" name="email" id="form2Example1" class="form-control" placeholder="Email" />

          </div>

          <div class="form-outline mb-4">
            <input type="password" name="password" id="form2Example1" class="form-control" placeholder="Password" />
          </div>







          <!-- Submit button -->
          <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">create</button>


        </form>

      </div>
    </div>
  </div>
</div>
<?php require_once "../layouts/footer.php"; ?>