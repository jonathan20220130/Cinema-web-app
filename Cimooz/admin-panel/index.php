<?php require_once "../config/config.php"; ?>
<?php require_once "../libs/App.php"; ?>
<?php require_once "layouts/header.php"; ?>
<?php
$app = new App;
$app->validateAdminSessionInside();

$query = "SELECT COUNT(*) AS movies_count FROM movies";
$count_movies = $app->selectOne($query);

$query = "SELECT COUNT(*) AS food_count FROM food WHERE food_kind = 'f'";
$count_food = $app->selectOne($query);

$query = "SELECT COUNT(*) AS drinks_count FROM food WHERE food_kind = 'd'";
$count_drinks = $app->selectOne($query);

$query = "SELECT COUNT(*) AS admins_count FROM admins";
$count_admins = $app->selectOne($query);

$query = "SELECT SUM(item_price) AS food_price FROM cart WHERE item_kind = 'f' AND item_status = 1";
$price_food = $app->selectOne($query);

$query = "SELECT SUM(item_price) AS drinks_price FROM cart WHERE item_kind = 'd' AND item_status = 1";
$price_drinks = $app->selectOne($query);

$query = "SELECT SUM(item_price) AS movies_price FROM cart WHERE item_kind = 'm' AND item_status = 1";
$price_movies = $app->selectOne($query);

$query = "SELECT SUM(item_price) AS movies_price FROM cart WHERE item_kind = 'm' AND item_status = 1";
$price_movies = $app->selectOne($query);
?>
<div>
  <h1 style="text-align: center; text-shadow: 10px;">General Report</h1>
  <br>
</div>
<div class="row">
  <div class="col-md-3">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Movies</h5>
        <!-- <h6 class="card-subtitle mb-2 text-muted">Bootstrap 4.0.0 Snippet by pradeep330</h6> -->
        <p class="card-text">number of movies: <?php echo $count_movies->movies_count; ?></p>

      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Food</h5>

        <p class="card-text">number of Food: <?php echo $count_food->food_count; ?></p>

      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Drinks</h5>

        <p class="card-text">number of Drinks: <?php echo $count_drinks->drinks_count; ?></p>

      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Admins</h5>

        <p class="card-text">number of admins: <?php echo $count_admins->admins_count; ?></p>

      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Movies Sales</h5>

        <p class="card-text">Movies Sales Value: $<?php echo $price_movies->movies_price; ?></p>

      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Food Sales</h5>

        <p class="card-text">Food Sales Value: $<?php echo $price_food->food_price; ?></p>

      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Drinks Sales</h5>

        <p class="card-text">Drinks Sales Value: $<?php echo $price_drinks->drinks_price; ?></p>

      </div>
    </div>
  </div>
</div>

<?php require_once "layouts/footer.php"; ?>