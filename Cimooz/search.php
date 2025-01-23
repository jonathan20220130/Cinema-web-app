<?php require __DIR__ . "/config/config.php"; ?>
<?php require __DIR__ . "/libs/App.php"; ?>
<?php require __DIR__ . "/includes/header.php"; ?>


<?php
if (isset($_POST['submit'])) {

    if (empty($_POST['keyword'])) {
        echo "<script>alert('The Search is empty')</script>";
        echo "<script>window.location.href='" . APP_URL . "'</script>";
    } else {

        $app = new App();

        if (isset($_POST['keyword'])) {
            $keyword = $_POST['keyword'];
        
            // Search for movies
            $query1 = "SELECT * FROM movies 
                       WHERE name LIKE '%$keyword%' OR genre LIKE '%$keyword%'";
        
            $movies_search = $app->selectAll($query1);
        
            // Search for food items
            $query2 = "SELECT * FROM food 
                       WHERE food_name LIKE '%$keyword%' OR food_kind LIKE '%$keyword%'";
        
            $all_food_search = $app->selectAll($query2);
        }
    }
}
    

?>

<div class="container-xxl py-5 bg-dark Cinema123-header mb-5 bg-brightness">
    <div class="container text-center my-5 pt-5 pb-4">
        <!-- Display the movie name -->
        <h1 class="display-3 text-white mb-3 animated slideInDown"><?php echo $keyword; ?></h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center text-uppercase">
                <li class="breadcrumb-item"><a href="<?php echo APP_URL; ?>">Home</a></li>
                <li class="breadcrumb-item"><a href="<?php echo APP_URL; ?>/movies/movies.php">All Movies</a></li>
            </ol>
        </nav>
    </div>
</div>


<?php if (!empty($all_food_search)) : ?>
    <div class="container">
        <div class="row g-4">
            <?php foreach ($all_food_search as $food_item) : ?>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="service-item rounded pt-3">
                        <div class="p-4">
                            <img src="<?php echo APP_URL; ?>/img/<?php echo $food_item->food_img ?>" alt="<?php echo $food_item->food_name ?>" class="img-fluid mb-4 rounded" style="height: 200px;">
                            <h5><?php echo $food_item->food_name ?></h5>

                            <div class="d-flex justify-content-between align-items-center">
                                <p class="mb-0">
                                    <?php echo '$' . $food_item->food_price ?>
                                </p>
                            </div>
                            <div class="mt-2"> <!-- Container for buttons -->
                                <a href="<?php echo APP_URL ?>/book-ticket.php" class="btn btn-dark mb-2 d-block">Book Ticket</a>
                                <a href="<?php echo APP_URL ?>/movies/food.php?id=<?php echo $food_item->food_id; ?>" class="btn btn-dark mb-2 d-block">More Info</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>


<?php elseif (!empty($movies_search)) : ?>
    <div class="container">
        <div class="row g-4">
            <?php foreach ($movies_search as $movie) : ?>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="service-item rounded pt-3">
                        <div class="p-4">
                            <img src="..img/<?php echo $movie->image ?>" alt="<?php echo $movie->name ?>" class="img-fluid mb-4 rounded" style="height: 330px;">
                            <h5><?php echo $movie->name ?></h5>
                            <p><?php echo $movie->genre ?></p>
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="mb-0"><?php echo '$' . $movie->movie_ticket_price ?></p>
                                <p class="mb-0" id="ratings">
                                    <?php
                                    // Assuming $rating is the average rating fetched from the database
                                    $rating = $movie->ratings; // Example rating
                                    $max_stars = 5; // Maximum number of stars

                                    // Calculate full stars
                                    $full_stars = floor($rating);

                                    // Calculate remaining fractional part for the partial star
                                    $partial_star = $rating - $full_stars;

                                    // Loop to display full stars
                                    for ($i = 1; $i <= $full_stars; $i++) {
                                        echo '<i class="fas fa-star"></i>'; // Filled star icon
                                    }

                                    // Check if there is a partial star to display
                                    if ($partial_star > 0) {
                                        echo '<i class="fas fa-star-half-alt"></i>'; // Half-filled star icon
                                        $max_stars--; // Reduce the count of maximum stars to account for the partial star
                                    }

                                    // Loop to display remaining empty stars
                                    for ($i = $full_stars + 1; $i < $max_stars; $i++) {
                                        echo '<i class="far fa-star"></i>'; // Empty star icon
                                    }
                                    echo $movie->ratings; // Display the actual rating value
                                    ?>
                                </p>

                            </div>
                            <div class="mt-2"> <!-- Container for buttons -->
                                <a href="<?php echo APP_URL ?>/book-ticket.php" class="btn btn-dark mb-2 d-block">Book Ticket</a>
                                <a href="<?php echo APP_URL ?>/movies/movies.php?id=<?php echo $movie->movie_id; ?>" class="btn btn-dark mb-2 d-block">More Info</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>

        </div>
    </div>


<?php else : ?>

    <h1> Not Found: <?php echo $keyword ?></h1>
<?php endif; ?>


<?php require __DIR__ . "/includes/footer.php"; ?>