<?php require __DIR__ . "/../config/config.php"; ?>
<?php require __DIR__ . "/../libs/App.php"; ?>
<?php require __DIR__ . "/../includes/header.php"; ?>

<?php


// Check if movie ID is set in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // Prepare and execute the query to fetch movie details based on ID
    $query = "SELECT * FROM movies WHERE movie_id = '$id'";
    $app = new App;
    $one = $app->selectOne($query);




    if (isset($_SESSION['user_id'])) {
        $q = "SELECT * FROM cart WHERE item_id = '$id' AND user_id = '$_SESSION[user_id])'";
        $count = $app->validateCartItems($q);
    }

    if (isset($_POST['submit'])) {

        $item_id = $_POST['item_id'];
        $item_price = $_POST['item_price'];
        $item_name = $_POST['item_name'];
        $item_image = $_POST['item_image'];
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
            ":item_kind" => 'm',
            ":num_of_items" => $num_of_items,
        ];

        $path = "cart.php";

        $app->insert($query, $array, $path);
        //$user->creatAccount($firstName, $lastName, $username, $email, $password, $age);
    }
} else {
    $app = new App;

    $query1 = "SELECT movie_id, name, movie_ticket_price, image, ratings, genre
    FROM movies
    WHERE ratings > 4.5";
    $top_movies = $app->selectAll($query1);


    $query2 = "SELECT movie_id, name, movie_ticket_price, image, ratings, genre
    FROM movies
    WHERE status = 1";
    $now_showing_movies = $app->selectAll($query2);


    $query3 = "SELECT * FROM movies
    WHERE status = 0";
    $comming_soon_movies = $app->selectAll($query3);
}
?>

<!-- Menu Start -->
<?php if (isset($comming_soon_movies, $now_showing_movies, $top_movies)) : ?>
    <div class="container-xxl py-5 bg-dark Cinema123-header mb-5 bg-brightness">
        <div class="container text-center my-5 pt-5 pb-4">
            <!-- Display the movie name -->
            <h1 class="display-3 text-white mb-3 animated slideInDown">Our Movies</h1>
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
                <h5 class="section-title ff-secondary text-center text-primary fw-normal">Movie Menu</h5>
                <h1 class="mb-5">Most Popular Movies</h1>
            </div>
            <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.1s">
                <ul class="nav nav-pills d-inline-flex justify-content-center border-bottom mb-5">
                    <li class="nav-item">
                        <a class="d-flex align-items-center text-start mx-3 ms-0 pb-3 active" data-bs-toggle="pill" href="#tab-1">
                            <i class="fa fa-film fa-2x text-primary"></i>
                            <div class="ps-3">
                                <small class="text-body">Now Playing</small>
                                <h6 class="mt-n1 mb-0">Current Hits</h6>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="d-flex align-items-center text-start mx-3 pb-3" data-bs-toggle="pill" href="#tab-2">
                            <i class="fa fa-star fa-2x text-primary"></i>
                            <div class="ps-3">
                                <small class="text-body">Top Rated</small>
                                <h6 class="mt-n1 mb-0">Blockbusters</h6>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="d-flex align-items-center text-start mx-3 me-0 pb-3" data-bs-toggle="pill" href="#tab-3">
                            <i class="fa fa-calendar-alt fa-2x text-primary"></i>
                            <div class="ps-3">
                                <small class="text-body">Coming Soon</small>
                                <h6 class="mt-n1 mb-0">Future Releases</h6>
                            </div>
                        </a>
                    </li>
                </ul>


                <div class="tab-content">
                    <div id="tab-1" class="tab-pane fade show p-0 active">
                        <div class="row g-4">
                            <?php foreach ($now_showing_movies as $now_showing_movie) : ?>
                                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.2s">
                                    <div class="service-item rounded pt-3">
                                        <div class="p-4">
                                            <img src="../img/<?php echo $now_showing_movie->image ?>" alt="<?php echo $now_showing_movie->name ?>" class="img-fluid mb-4 rounded" style="height: 330px;">
                                            <h5><?php echo $now_showing_movie->name ?></h5>
                                            <p><?php echo $now_showing_movie->genre ?></p>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <p class="mb-0"><?php echo '$' . $now_showing_movie->movie_ticket_price ?></p>
                                                <p class="mb-0" id="ratings">
                                                    <?php
                                                    // Assuming $rating is the average rating fetched from the database
                                                    $rating = $now_showing_movie->ratings; // Example rating
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
                                                    echo $now_showing_movie->ratings; // Display the actual rating value
                                                    ?>
                                                </p>

                                            </div>
                                            <div class="mt-2"> <!-- Container for buttons -->
                                                <a href="<?php echo APP_URL ?>/movies/movies.php?id=<?php echo $now_showing_movie->movie_id; ?>" class="btn btn-dark mb-2 d-block">More Info</a>
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
                            <?php foreach ($top_movies as $top_movie) : ?>
                                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.2s">
                                    <div class="service-item rounded pt-3">
                                        <div class="p-4">
                                            <img src="..img/<?php echo $top_movie->image ?>" alt="<?php echo $top_movie->name ?>" class="img-fluid mb-4 rounded" style="height: 330px;">
                                            <h5><?php echo $top_movie->name ?></h5>
                                            <p><?php echo $top_movie->genre ?></p>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <p class="mb-0"><?php echo '$' . $top_movie->movie_ticket_price ?></p>
                                                <p class="mb-0" id="ratings">
                                                    <?php
                                                    // Assuming $rating is the average rating fetched from the database
                                                    $rating = $top_movie->ratings; // Example rating
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
                                                    echo $top_movie->ratings; // Display the actual rating value
                                                    ?>
                                                </p>

                                            </div>
                                            <div class="mt-2"> <!-- Container for buttons -->
                                                <a href="<?php echo APP_URL ?>/seats.php" class="btn btn-dark mb-2 d-block">Book Ticket</a>
                                                <a href="<?php echo APP_URL ?>/movies/movies.php?id=<?php echo $top_movie->movie_id; ?>" class="btn btn-dark mb-2 d-block">More Info</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>

                        </div>
                    </div>


                    <div id="tab-3" class="tab-pane fade show p-0">
                        <div class="row g-4">
                            <!-- Similar structure as tab-1 -->
                            <?php foreach ($comming_soon_movies as $comming_soon_movie) : ?>
                                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.2s">
                                    <div class="service-item rounded pt-3">
                                        <div class="p-4">
                                            <img src="../img/<?php echo $comming_soon_movie->image ?>" alt="<?php echo $comming_soon_movie->name ?>" class="img-fluid mb-4 rounded" style="height: 330px;">
                                            <h5><?php echo $comming_soon_movie->name ?></h5>
                                            <p><?php echo $comming_soon_movie->genre ?></p>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <p class="mb-0"><?php echo '$' . $comming_soon_movie->movie_ticket_price ?></p>
                                                <p class="mb-0" id="ratings">
                                                    <?php
                                                    // Assuming $rating is the average rating fetched from the database
                                                    $rating = $comming_soon_movie->ratings; // Example rating
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
                                                    echo $comming_soon_movie->ratings; // Display the actual rating value
                                                    ?>
                                                </p>

                                            </div>
                                            <div class="mt-2"> <!-- Container for buttons -->
                                                <a href="<?php echo APP_URL ?>/movies/movies.php?id=<?php echo $comming_soon_movie->movie_id; ?>" class="btn btn-dark mb-2 d-block">More Info</a>
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
    <script>
        var videoModal = document.getElementById('videoModal');
        videoModal.addEventListener('hidden.bs.modal', function() {
            var video = videoModal.querySelector('video');
            video.pause();
        });
    </script>

    <div class="container-xxl py-5 bg-dark Cinema123-header mb-5 bg-brightness">
        <div class="container text-center my-5 pt-5 pb-4">
            <!-- Display the movie name -->
            <h1 class="display-3 text-white mb-3 animated slideInDown"><?php echo isset($one) ? $one->name : 'Movie Not Found'; ?></h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center text-uppercase">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Cart</a></li>
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
                    <!-- Movie Image -->
                    <div class="image-container">
                        <img class="img-fluid rounded w-100" src="../img/<?php echo $one->image; ?>" alt="<?php echo $one->name; ?>">
                    </div>
                </div>

                <!-- Video Trailer Column -->
                <div class="col-md-6">
                    <!-- Movie Trailer -->
                    <div class="video-container mb-7">
                        <div class="video-trailer" style="background-image: linear-gradient(rgba(15, 23, 43, 0.1), rgba(15, 23, 43, 0.1)), url('../img/<?php echo $one->image; ?>');">
                            <button type="button" class="btn-play" data-bs-toggle="modal" data-src="../trailers/<?php echo $one->trailers; ?>" data-bs-target="#videoModal">
                                <span></span>
                            </button>
                        </div>
                    </div>

                    <!-- Modal for video trailer -->
                    <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
                        <div class="modal-dialog">
                            <div class="modal-content rounded-0">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-film me-3"></i><?php echo $one->name ?></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- 16:9 aspect ratio -->
                                    <div class="ratio ratio-16x9">
                                        <video class="embed-responsive-item" src="<?php echo '../trailers/' .  $one->trailers; ?>" id="video" controls></video>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Movie Information Column -->
                <div class="col-md-12">
                    <!-- Movie Information -->
                    <?php if (isset($one)) : ?>
                        <h1 class="mb-4"><?php echo $one->name; ?></h1>

                        <?php if ($one->tech == 1) : ?>
                            <h2 class="mb-4">Watch With 3D Vision</h2>
                        <?php endif; ?>

                        <?php if ($one->status == 1) : ?>
                            <h2 class="mb-4">Showing On Fire 🔥🔥</h2>
                            <!-- Add booking information here -->

                        <?php else : ?>
                            <h3 class="mb-4">Coming Soon ⌚️</h3>
                        <?php endif; ?>
                        <h6 class="mb-4">Genre: <?php echo $one->genre; ?></h6>
                        <h6 class="mb-4">Duration: <?php echo $one->duration; ?> minutes</h6>
                        <h6 class="mb-4">Still: <?php echo $one->available_seats; ?> Available Seats</h6>

                        <p class="mb-4">Description: <?php echo $one->description; ?></p>
                        <p class="mb-4">Team Cast: <?php echo nl2br($one->cast); ?></p>
                        <p class="mb-4">Movie Synopsis<?php echo nl2br($one->synopsis); ?></p>

                        <div class="booking-info">
                            <?php
                            // Check if movie ID is set in the URL
                            if (isset($_GET['id'])) {
                                $id = $_GET['id'];

                                // Prepare and execute the query to fetch movie details along with cinema and showtimes information based on ID
                                $query = "SELECT movies.*, cinema.*, showtimes.*
                            FROM movies
                            LEFT JOIN showtimes ON movies.movie_id = showtimes.movie_id
                            LEFT JOIN cinema ON showtimes.cinema_id = cinema.cinema_id
                            WHERE movies.movie_id = '$id'";

                                $results = $app->selectAll($query);
                            }

                            // Check if there are showtimes available
                            if (!empty($results)) {
                                foreach ($results as $result) :
                            ?>
                                    <div class="showtime-info">
                                        <h4>Cinema: <?php echo $result->cinema_name; ?></h4>
                                        <h4>Show Date: <?php echo $result->showtime; ?></h4>
                                        <hr style="height:2px;border-width:0;color:gray;background-color:black">
                                        <!-- Add more booking details if needed -->
                                    </div>
                            <?php endforeach;
                            } else {
                                echo "<p>No showtimes available</p>";
                            }
                            ?>
                        </div>

                        <div class="row g-4 mb-4">
                            <div class="col-sm-6">
                                <div class="d-flex align-items-center border-start border-5 border-primary px-3">
                                    <h3>Ticket Price: $<?php echo $one->movie_ticket_price; ?></h3>
                                </div>
                            </div>
                        </div>




                        <!-- Add to Cart button -->
                        <form method="post" action="movies.php?id=<?php echo $id; ?>">
                            <input name="item_id" type="hidden" value="<?php echo $one->movie_id; ?>">
                            <input name="item_name" type="hidden" value="<?php echo $one->name; ?>">
                            <input name="item_image" type="hidden" value="<?php echo $one->image; ?>">
                            <input name="item_price" type="hidden" value="<?php echo $one->movie_ticket_price; ?>">

                            <h5 for="num_of_items">How many  ?!</h5>
                            <input name="num_of_items" type="number">

                            <?php if ($count > 0) : ?>
                                <button name="submit" type="submit" class="btn btn-primary py-3 px-5 mt-2" disabled> Already Added to Cart</button>
                            <?php else : ?>
                                <button name="submit" type="submit" class="btn btn-primary py-3 px-5 mt-2">Add to Cart</button>
                            <?php endif; ?>

                        </form>

                    <?php else : ?>
                        <p>Movie details not found.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php require __DIR__ . "/../includes/footer.php"; ?>