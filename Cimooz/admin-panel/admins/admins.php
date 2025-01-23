<?php require_once "../../config/config.php"; ?>
<?php require_once "../../libs/App.php"; ?>
<?php require_once "../layouts/header.php"; ?>

<?php

$app = new App;

$app->validateAdminSessionInside();

$query = "SELECT * FROM admins";
$all_admins = $app->selectAll($query);
?>

<div class="row">
  <div class="col">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title mb-4 d-inline">Admins</h5>
        <a href="<?php echo ADMIN_URL ; ?>/admins/create-admins.php" class="btn btn-primary mb-4 text-center float-right">Create Admins</a>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Admin name</th>
              <th scope="col">email</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($all_admins as $admin) : ?>
              <tr>
                <th scope="row"><?php echo $admin->id; ?></th>
                <td><?php echo $admin->admin_name; ?></td>
                <td><?php echo $admin->email; ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>


<?php require_once "../layouts/footer.php"; ?>