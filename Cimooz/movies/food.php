<?php require __DIR__ . "/../config/config.php"; ?>
<?php require __DIR__ . "/../libs/App.php"; ?>
<?php require __DIR__ . "/../includes/header.php"; ?>

<?php
// Check if movie ID is set in the URL
if (isset($_GET['id'])) {
    $food_id = $_GET['id'];
    // Prepare and execute the query to fetch movie details based on ID
    $query = "SELECT * FROM food WHERE food_id = '$food_id'";
    $app = new App;
    $one = $app->selectOne($query);


    if (isset($_SESSION['user_id'])) {
        $q = "SELECT * FROM cart WHERE item_id = '$food_id' AND user_id = '$_SESSION[user_id])'";
        $count = $app->validateCartItems($q);
    }

    if (isset($_POST['submit'])) {

        $item_id = $_POST['item_id'];
        $item_price = $_POST['item_price'];
        $item_name = $_POST['item_name'];
        $item_image = $_POST['item_image'];
        $item_kind = $_POST['item_kind'];
        $user_id = $_SESSION['user_id'];
        $num_of_items = $_POST['num_of_items'];

        $query = "INSERT INTO cart (item_id, item_price, item_name, item_image, user_id, item_kind, num_of_items)
        VALUES (:item_id, :item_price, :item_name, :item_image, :user_id, :item_kind, :num_of_items)";


        $array = [
            ":item_id" => $item_id,
            ":item_price" => $item_price,
            ":item_name" => $item_name,
            ":item_image" => $item_image,
            ":user_id" => $user_id,
            ":item_kind" => $item_kind,
            ":num_of_items" => $num_of_items,
        ];

        $path = "cart.php";

        $app->insert($query, $array, $path);
        //$user->creatAccount($firstName, $lastName, $username, $email, $password, $age);
    }
} else {
    $food_query = "SELECT * FROM food WHERE food_kind = 'f'";
    $drinks_query = "SELECT * FROM food WHERE food_kind = 'd'";
    $app = new App;
    $all_drinks = $app->selectAll($drinks_query);
    $all_food = $app->selectAll($food_query);
}
?>



<?php if (isset($all_food, $all_drinks)) : ?>

    <div class="container-xxl py-5 bg-dark Cinema123-header mb-5 bg-brightness">
        <div class="container text-center my-5 pt-5 pb-4">
            <!-- Display the movie name -->
            <h1 class="display-3 text-white mb-3 animated slideInDown">Yummy 😋</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center text-uppercase">
                    <li class="breadcrumb-item"><a href="<?php echo APP_URL; ?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo APP_URL; ?>/cart.php">Cart</a></li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h5 class="section-title ff-secondary text-center text-primary fw-normal">Food Menu</h5>
                <h1 class="mb-5"> Food & Drinks</h1>
            </div>
            <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.1s">
                <ul class="nav nav-pills d-inline-flex justify-content-center border-bottom mb-5">
                    <li class="nav-item">
                        <a class="d-flex align-items-center text-start mx-3 ms-0 pb-3 active" data-bs-toggle="pill" href="#tab-1">
                            <i class="fa fa-film fa-2x text-primary"></i>
                            <div class="ps-3">
                                <small class="text-body">Delicious</small>
                                <h6 class="mt-n1 mb-0">Food</h6>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="d-flex align-items-center text-start mx-3 pb-3" data-bs-toggle="pill" href="#tab-2">
                            <i class="fa fa-star fa-2x text-primary"></i>
                            <div class="ps-3">
                                <small class="text-body">Frish</small>
                                <h6 class="mt-n1 mb-0">Drinks</h6>
                            </div>
                        </a>
                    </li>

                </ul>


                <div class="tab-content">
                    <div id="tab-1" class="tab-pane fade show p-0 active">
                        <div class="row g-4">
                            <?php foreach ($all_food as $food_item) : ?>
                                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.2s">
                                    <div class="service-item rounded pt-3">
                                        <div class="p-4">
                                            <img src="../img/<?php echo $food_item->food_img ?>" alt="<?php echo $food_item->food_name ?>" class="img-fluid mb-4 rounded" style="height: 200px;">
                                            <h5><?php echo $food_item->food_name ?></h5>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <p class="mb-0">
                                                    <?php echo '$' . $food_item->food_price ?>
                                                </p>
                                            </div>
                                            <div class="mt-2"> <!-- Container for buttons -->
                                                <a href="<?php echo APP_URL ?>/movies/food.php?id=<?php echo $food_item->food_id; ?>" class="btn btn-dark mb-2 d-block">More Info</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>

                            <!-- Add more movies here -->
                        </div>
                    </div>


                    <div id="tab-2" class="tab-pane fade show p-0">
                        <div class="row g-4">
                            <?php foreach ($all_drinks as $drink_item) : ?>
                                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.2s">
                                    <div class="service-item rounded pt-3">
                                        <div class="p-4">
                                            <img src="../img/<?php echo $drink_item->food_img ?>" alt="<?php echo $drink_item->food_name ?>" class="img-fluid mb-4 rounded" style="height: 200px;">
                                            <h5><?php echo $drink_item->food_name ?></h5>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <p class="mb-0">
                                                    <?php echo '$' . $drink_item->food_price ?>
                                                </p>
                                            </div>
                                            <div class="mt-2"> <!-- Container for buttons -->
                                                <a href="<?php echo APP_URL ?>/movies/food.php?id=<?php echo $drink_item->food_id; ?>" class="btn btn-dark mb-2 d-block">More Info</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
<?php endif; ?>



<?php if (isset($one)) : ?>
    <div class="container-xxl py-5 bg-dark Cinema123-header mb-5 bg-brightness">
        <div class="container text-center my-5 pt-5 pb-4">
            <!-- Display the movie name -->
            <h1 class="display-3 text-white mb-3 animated slideInDown"><?php echo isset($one) ? $one->food_name : 'Food Not Found'; ?></h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center text-uppercase">
                    <li class="breadcrumb-item"><a href="<?php echo APP_URL; ?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo APP_URL; ?>/cart.php">Cart</a></li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <!-- Image Column -->
                <div class="col-md-6 mb-4 mb-md-0">
                    <!-- Food Image -->
                    <div class="image-container">
                        <img class="img-fluid rounded w-100" src="../img/<?php echo $one->food_img; ?>" alt="<?php echo $one->food_name; ?>">
                    </div>
                </div>

                <!-- Food Information Column -->
                <div class="col-md-6">
                    <div class="col-md-12">
                        <?php if (isset($one)) : ?>
                            <h1 class="mb-4"><?php echo $one->food_name; ?></h1>

                            <p class="mb-4">Description: <?php echo $one->food_description; ?></p>

                            <?php if ($one->food_availability == 1) : ?>
                                <div class="row g-4 mb-4">
                                    <div class="col-sm-6">
                                        <div class="d-flex align-items-center border-start border-5 border-primary px-3">
                                            <h3>Price: $<?php echo $one->food_price; ?></h3>
                                        </div>
                                    </div>
                                </div>


                                <!-- Add to Cart button -->
                                <form method="post" action="food.php?id=<?php echo $food_id; ?>">
                                    <input name="item_id" type="hidden" value="<?php echo $one->food_id; ?>">
                                    <input name="item_name" type="hidden" value="<?php echo $one->food_name; ?>">
                                    <input name="item_image" type="hidden" value="<?php echo $one->food_img; ?>">
                                    <input name="item_price" type="hidden" value="<?php echo $one->food_price; ?>">
                                    <input name="item_kind" type="hidden" value="<?php echo $one->food_kind; ?>">

                                    <label for="num_of_items">How Many?!</label>
                                    <input name="num_of_items" type="number">

                                    <?php if ($count > 0) : ?>
                                        <button name="submit" type="submit" class="btn btn-primary py-3 px-5 mt-2" disabled> Already Added to Cart</button>
                                    <?php else : ?>
                                        <button name="submit" type="submit" class="btn btn-primary py-3 px-5 mt-2">Add to Cart</button>
                                    <?php endif; ?>

                                </form> <?php endif; ?>

                        <?php else : ?>
                            <p>Food details not found.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php endif; ?>
<?php require __DIR__ . "/../includes/footer.php"; ?>