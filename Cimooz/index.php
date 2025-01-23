<?php require __DIR__ . "/config/config.php"; ?>
<?php require __DIR__ . "/libs/App.php"; ?>
<?php require __DIR__ . "/includes/header.php"; ?>

<?php

$app = new App;

$query = "SELECT movie_id, name, movie_ticket_price, image, ratings, genre
FROM movies
WHERE ratings > 4.5
LIMIT 4";
$top_movies = $app->selectAll($query);


$query = "SELECT movie_id, name, movie_ticket_price, image, ratings, genre
FROM movies
WHERE status = 1
LIMIT 4";
$now_showing_movies = $app->selectAll($query);


$query = "SELECT movie_id, name, movie_ticket_price, image, ratings, genre
FROM movies
WHERE status = 0
LIMIT 4";
$comming_soon_movies = $app->selectAll($query);


?>

<div class="container-xxl py-5 bg-dark Cinema123-header mb-5 bg-brightness">
    <div class="container my-5 py-5">
        <div class="row align-items-center g-5">
            <div class="col-lg-6 text-center text-lg-start text-bright">
                <h1 class="display-3 text-white animated slideInLeft">Experience<br>The Magic of Cinema</h1>
                <p class="text-white animated slideInLeft mb-4 pb-2">Explore a world of entertainment with
                    Cimooz. From blockbuster movies to indie gems, we've got it all.</p>
            </div>
        </div>
    </div>
</div>

<!-- Navbar & Hero End -->


<h2 color="orenge">Our Best Rated <span style="font-size:120%;color:orange;">&hearts;</span> </h2>
<!-- Service Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item rounded pt-3">
                    <div class="p-4">
                        <img src="img/Secret Garden.png" alt="Movie 1 Poster" class="img-fluid mb-4">
                        <h5>The Secret Garden</h5>
                        <p>A magical adventure about a girl who discovers a hidden, enchanted garden.</p>
                        <p><strong>Genre:</strong> Fantasy</p>
                        <p><strong>Director:</strong> Marc Munden</p>
                        <p><strong>Starring:</strong> Dixie Egerickx, Colin Firth, Julie Walters</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="service-item rounded pt-3">
                    <div class="p-4">
                        <img src="img/Soul.jpeg" alt="Movie 2 Poster" class="img-fluid mb-4">
                        <h5>Soul</h5>
                        <p>A jazz musician's soul gets separated from his body and he must find his way back
                            with the help of an infant soul.</p>
                        <p><strong>Genre:</strong> Animation, Adventure, Comedy</p>
                        <p><strong>Director:</strong> Pete Docter, Kemp Powers</p>
                        <p><strong>Starring:</strong> Jamie Foxx, Tina Fey, Graham Norton</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="service-item rounded pt-3">
                    <div class="p-4">
                        <img src="img/Tenet.jpg" alt="Movie 3 Poster" class="img-fluid mb-4">
                        <h5>Tenet</h5>
                        <p>An action epic revolving around international espionage, time travel, and
                            evolution.</p>
                        <p><strong>Genre:</strong> Action, Sci-Fi, Thriller</p>
                        <p><strong>Director:</strong> Christopher Nolan</p>
                        <p><strong>Starring:</strong> John David Washington, Robert Pattinson, Elizabeth
                            Debicki</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                <div class="service-item rounded pt-3">
                    <div class="p-4">
                        <img src="img/The IrishManjpg.jpg" alt="Movie 4 Poster" class="img-fluid mb-4">
                        <h5>The Irishman</h5>
                        <p>A mob hitman recalls his possible involvement with the slaying of Jimmy Hoffa.
                        </p>
                        <p><strong>Genre:</strong> Biography, Crime, Drama</p>
                        <p><strong>Director:</strong> Martin Scorsese</p>
                        <p><strong>Starring:</strong> Robert De Niro, Al Pacino, Joe Pesci</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Service End -->


<!-- About Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6">
                <div class="row g-3">
                    <div class="col-6 text-start">
                        <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.1s" src="img\Cinema210.jpg" alt="About Image 1">
                    </div>
                    <div class="col-6 text-start">
                        <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.3s" src="img/Cinema.jpg" alt="About Image 2" style="margin-top: 25%;">
                    </div>
                    <div class="col-6 text-end">
                        <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.5s" src="img/about3.jpeg" alt="About Image 3">
                    </div>
                    <div class="col-6 text-end">
                        <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.7s" src="img/about4.jpeg" alt="About Image 4">
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <h5 class="section-title ff-secondary text-start text-primary fw-normal">About Cimooz</h5>
                <h1 class="mb-4">Welcome to <i class="fa fa-film me-3"></i>Cimooz</h1>
                <p class="mb-4" lang="ar" dir="rtl">تفضل بزيارة <strong>Cimooz<i class="fa fa-film me-3"></i></strong> واستمتع بتجربة مشاهدة الأفلام الرائعة. إن كان
                    لديك أي استفسارات، فلا تتردد في الاتصال بنا. نحن هنا لخدمتك في أي وقت!</p>

                <p class="mb-4" lang="ar" dir="rtl">استمتع بتجربة فريدة من نوعها في عالم السينما مع سيموز. نقدم لك
                    مجموعة متنوعة من الأفلام الرائعة التي تناسب جميع الأذواق. احجز تذكرتك الآن واستمتع بأفضل الأفلام
                    والتجارب!</p>

                <div class="row g-4 mb-4">
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center border-start border-5 border-primary px-3">
                            <h1 class="flex-shrink-0 display-5 text-primary mb-0" data-toggle="counter-up">50</h1>
                            <div class="ps-4">
                                <p class="mb-0">Years of</p>
                                <h6 class="text-uppercase mb-0">Experience</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center border-start border-5 border-primary px-3">
                            <h1 class="flex-shrink-0 display-5 text-primary mb-0" data-toggle="counter-up">500</h1>
                            <div class="ps-4">
                                <p class="mb-0">Movies in</p>
                                <h6 class="text-uppercase mb-0">Collection</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="btn btn-primary py-3 px-5 mt-2" href="<?php echo APP_URL; ?>/about.php">Explore Now</a>
            </div>
        </div>
    </div>
</div>
<!-- About End -->



<!-- Menu Start -->
<!-- Menu Start -->
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
                                        <img src="img/<?php echo $now_showing_movie->image ?>" alt="<?php echo $now_showing_movie->name ?>" class="img-fluid mb-4 rounded" style="height: 330px;">
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
                                            <a href="<?php echo APP_URL ?>/book-ticket.php" class="btn btn-dark mb-2 d-block">Book Ticket</a>
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
                                        <img src="img/<?php echo $top_movie->image ?>" alt="<?php echo $top_movie->name ?>" class="img-fluid mb-4 rounded" style="height: 330px;">
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
                                            <a href="<?php echo APP_URL ?>/book-ticket.php" class="btn btn-dark mb-2 d-block">Book Ticket</a>
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
                                        <img src="img/<?php echo $comming_soon_movie->image ?>" alt="<?php echo $comming_soon_movie->name ?>" class="img-fluid mb-4 rounded" style="height: 330px;">
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
                                            <a href="<?php echo APP_URL ?>/book-ticket.php" class="btn btn-dark mb-2 d-block">Book Ticket</a>
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

<!-- Menu End -->


<!-- Reservation Start -->
<div class="container-xxl py-5 px-0 wow fadeInUp" data-wow-delay="0.1s">
    <div class="row g-0">
        <div class="col-md-6">
            <div class="video">
                <button type="button" class="btn-play" data-bs-toggle="modal" data-src="img/promo.mp4" data-bs-target="#videoModal">
                    <span></span>
                </button>
            </div>
        </div>
        <div class="col-md-6 bg-dark d-flex align-items-center">
            <div class="p-5 wow fadeInUp" data-wow-delay="0.2s">
                <h5 class="section-title ff-secondary text-start text-primary fw-normal">Reservation</h5>
                <h1 class="text-white mb-4">Book & Enjoy With Cimooz</h1>
                <form>
                    <div class="row g-3">

                        <div class="col-12">
                            <button class="btn btn-primary w-100 py-3" type="submit">Movies</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content rounded-0">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-film me-3"></i>Cimooz</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- 16:9 aspect ratio -->
                <div class="ratio ratio-16x9">
                    <video class="embed-responsive-item" src="img/promo.mp4" id="video" controls></video>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Reservation Start -->

<script>
    var videoModal = document.getElementById('videoModal');
    videoModal.addEventListener('hidden.bs.modal', function() {
        var video = videoModal.querySelector('video');
        video.pause();
    });
</script>



<!-- Team Start -->
<div class="container-xxl pt-5 pb-3">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h2 class="section-title ff-secondary text-center text-primary fw-normal">🎉Surprize🎉</h2>
            <h1 class="mb-5">Meet the Actors!!</h1>
        </div>
        <div class="row g-4">
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="team-item text-center rounded overflow-hidden">
                    <div class="rounded-circle overflow-hidden m-4">
                        <img class="img-fluid" src="img/john.jpg" alt="John Wick" style="height: 230px;">
                    </div>
                    <h5 class="mb-0">John Wick</h5>
                    <small>Super Star</small>
                    <div class="d-flex justify-content-center mt-3">
                        <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="team-item text-center rounded overflow-hidden">
                    <div class="rounded-circle overflow-hidden m-4">
                        <img class="img-fluid" src="img/rock_actor.jpeg" alt="The Rock" style="height: 230px;">
                    </div>
                    <h5 class="mb-0">The Rock</h5>
                    <small>Super Star</small>
                    <div class="d-flex justify-content-center mt-3">
                        <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="team-item text-center rounded overflow-hidden">
                    <div class="rounded-circle overflow-hidden m-4">
                        <img class="img-fluid" src="img/Jason-Momoa.jpg" alt="Jason Momoa" style="height: 230px; width: 230px">
                    </div>
                    <h5 class="mb-0">Jason Momoa</h5>
                    <small>Super Star</small>
                    <div class="d-flex justify-content-center mt-3">
                        <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                <div class="team-item text-center rounded overflow-hidden">
                    <div class="rounded-circle overflow-hidden m-4">
                        <img class="img-fluid" src="img/Dr Henry Walton.jpeg" alt="Dr. Henry Walton" style="height: 230px; width: 230px">
                    </div>
                    <h5 class="mb-0">Dr. Henry Walton</h5>
                    <small>Super Star</small>
                    <div class="d-flex justify-content-center mt-3">
                        <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Team End -->



<!-- Testimonial Start -->
<div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container">
        <div class="text-center">
            <h5 class="section-title ff-secondary text-center text-primary fw-normal">Testimonial</h5>
            <h1 class="mb-5">Our Clients Say!!!</h1>
        </div>
        <div class="owl-carousel testimonial-carousel">
            <div class="testimonial-item bg-transparent border rounded p-4">
                <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                <p>"Absolutely loved my experience at Cimooz cinema! The atmosphere was fantastic,
                    the seats were comfy, and the movie selection was great. Will definitely be coming back again!"
                </p>
                <div class="d-flex align-items-center">
                    <img class="img-fluid flex-shrink-0 rounded-circle" src="img/testimonial-1.jpg" style="width: 50px; height: 50px;">
                    <div class="ps-3">
                        <h5 class="mb-1">Sarah M.</h5>
                        <small>VIP Client</small>
                    </div>
                </div>
            </div>
            <div class="testimonial-item bg-transparent border rounded p-4">
                <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                <p>"Cimooz cinema exceeded my expectations. The staff was friendly and helpful,
                    the popcorn was delicious, and the sound quality in the theater was amazing
                    . Highly recommend!"
                </p>
                <div class="d-flex align-items-center">
                    <img class="img-fluid flex-shrink-0 rounded-circle" src="img/testimonial-2.jpg" style="width: 50px; height: 50px;">
                    <div class="ps-3">
                        <h5 class="mb-1">John D.</h5>
                        <small>New Client</small>
                    </div>
                </div>
            </div>
            <div class="testimonial-item bg-transparent border rounded p-4">
                <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                <p>"Had an awesome time at Cimooz cinema with my friends. The ticket prices were reasonable,
                    and the movie selection catered to all tastes.
                    Can't wait to visit again!"
                </p>
                <div class="d-flex align-items-center">
                    <img class="img-fluid flex-shrink-0 rounded-circle" src="img/testimonial-3.jpg" style="width: 50px; height: 50px;">
                    <div class="ps-3">
                        <h5 class="mb-1">Emily L.</h5>
                        <small>Special Client </small>
                    </div>
                </div>
            </div>
            <div class="testimonial-item bg-transparent border rounded p-4">
                <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                <p>"I've been to many cinemas, but Cimooz stands out for its excellent customer service and attention to detail.
                    The staff went above and beyond to ensure we had a great time. Will be recommending it to everyone!"
                </p>
                <div class="d-flex align-items-center">
                    <img class="img-fluid flex-shrink-0 rounded-circle" src="img/PersPhoto.jpg" style="width: 50px; height: 50px;">
                    <div class="ps-3">
                        <h5 class="mb-1">Jonathan G.</h5>
                        <small>Profession</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Testimonial End -->


<?php require "includes/footer.php"; ?>