<?php require_once "../../config/config.php"; ?>
<?php require_once "../../libs/App.php"; ?>
<?php require_once "../layouts/header.php"; ?>

<?php

$app = new App;

$app->validateAdminSessionInside();

$query1 = "SELECT * from cinema";
$cinemas = $app->selectAll($query1);

// Get the movie ID from the URL parameter
$movieId = $_GET['id'] ?? null;

$query1 = "SELECT * from showtimes WHERE movie_id = $movieId";
$showtimes = $app->selectAll($query1);


// Retrieve movie data based on its ID
$movieQuery = "SELECT * FROM movies WHERE movie_id = $movieId";
$movieData = $app->selectOne($movieQuery);

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize form data
    $name = $_POST['name'];
    $movie_ticket_price = $_POST['movie_ticket_price'];
    $description = $_POST['description'];
    $genre = $_POST['genre'];
    $duration = $_POST['duration'];
    $status = $_POST['status'];
    $tech = $_POST['tech'];
    $available_seats = $_POST['available_seats'];
    $cast = $_POST['cast'];
    $synopsis = $_POST['synopsis'];
    $ratings = $_POST['ratings'];
    $more_info = $_POST['more_info'];
    $release_date = $_POST['release_date'];
    $language = $_POST['language'];
    $subtitle = $_POST['subtitle'];
    $showtimes = $_POST['showtimes'];
    $cinema = $_POST['cinema'];

    // Prepare SQL statement for updating movie details
    $updateMovieQuery = "UPDATE movies SET name = :name, movie_ticket_price = :movie_ticket_price, description = :description, genre = :genre, duration = :duration, status = :status, tech = :tech, available_seats = :available_seats, cast = :cast, synopsis = :synopsis, ratings = :ratings, more_info = :more_info, release_date = :release_date, language = :language, subtitle = :subtitle WHERE movie_id = :movie_id";

    // Bind parameters and execute the query for updating movie details
    $updateMovieArr = [
        ":name" => $name,
        ":movie_ticket_price" => $movie_ticket_price,
        ":description" => $description,
        ":genre" => $genre,
        ":duration" => $duration,
        ":status" => $status,
        ":tech" => $tech,
        ":available_seats" => $available_seats,
        ":cast" => $cast,
        ":synopsis" => $synopsis,
        ":ratings" => $ratings,
        ":more_info" => $more_info,
        ":release_date" => $release_date,
        ":language" => $language,
        ":subtitle" => $subtitle,
        ":movie_id" => $movieId
    ];

    // Update movie details in the database
    $path = "show-movies.php";
    $app->update($updateMovieQuery, $updateMovieArr, $path);

    // Delete existing showtimes for the movie
    $deleteShowtimesQuery = "DELETE FROM showtimes WHERE movie_id = :movie_id";
    $app->delete($deleteShowtimesQuery, [':movie_id' => $movieId]);

    // Insert updated showtimes into the database
    $insertShowtimeQuery = "INSERT INTO showtimes (movie_id, showtime) VALUES (:movie_id, :showtime)";
    foreach ($showtimes as $showtime) {
        $showtimeArr = [":movie_id" => $movieId, ":showtime" => $showtime];
        $app->insert($insertShowtimeQuery, $showtimeArr, $path);
    }
}

?>

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-5 d-inline">Update Movie</h5>
                <form method="post" action="" enctype="multipart/form-data">
                    <!-- Movie name input -->
                    <div class="form-outline mb-4 mt-4">
                        <input type="text" name="name" id="form2Example1" class="form-control" placeholder="Movie Name" value="<?php echo $movieData->name; ?>" required />
                    </div>

                    <!-- Movie image input -->
                    <div class="form-outline mb-4 mt-4">
                        <label for="form2Example1" class="form-label">Movie Image</label>
                        <input type="file" name="image" id="form2Example1" class="form-control" required />
                    </div>

                    <!-- Movie trailer input -->
                    <div class="form-outline mb-4 mt-4">
                        <label for="form2Example7" class="form-label">Movie Trailer</label>
                        <input type="file" name="trailers" id="form2Example7" class="form-control" required />
                    </div>

                    <!-- Movie ticket price input -->
                    <div class="form-outline mb-4 mt-4">
                        <label for="form2Example7" class="form-label">Movie Ticket Price</label>
                        <div class="input-group">
                            <span class="input-group-text">$</span>
                            <input type="number" name="movie_ticket_price" id="form2Example7" class="form-control" aria-label="Amount (to the nearest dollar)" value="<?php echo $movieData->movie_ticket_price; ?>" required>
                            <span class="input-group-text">.00</span>
                        </div>
                    </div>

                    <!-- Description textarea -->
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" name="description" id="description" rows="3" placeholder="Description" required><?php echo $movieData->description; ?></textarea>
                    </div>

                    <!-- Cast textarea -->
                    <div class="form-group">
                        <label for="cast">Cast</label>
                        <textarea class="form-control" name="cast" id="cast" rows="3" placeholder="Movie Cast" required><?php echo $movieData->cast; ?></textarea>
                    </div>

                    <!-- Synopsis textarea -->
                    <div class="form-group">
                        <label for="synopsis">Synopsis</label>
                        <textarea class="form-control" name="synopsis" id="synopsis" rows="3" placeholder="Movie Synopsis" required><?php echo $movieData->synopsis; ?></textarea>
                    </div>

                    <!-- Technology select -->
                    <div class="form-outline mb-4 mt-4">
                        <select name="tech" class="form-select form-control" id="tech" aria-label="Technology Selection" required>
                            <option value="" selected disabled>Choose Technology</option>
                            <option value="1" <?php if ($movieData->tech == 1) echo 'selected'; ?>>3D</option>
                            <option value="0" <?php if ($movieData->tech == 0) echo 'selected'; ?>>Ordinary</option>
                        </select>
                    </div>

                    <!-- Status select -->
                    <div class="form-outline mb-4 mt-4">
                        <select name="status" class="form-select form-control" id="status" aria-label="Movie Status" required>
                            <option value="" selected disabled>Choose Movie Status</option>
                            <option value="1" <?php if ($movieData->status == 1) echo 'selected'; ?>>Now Showing</option>
                            <option value="0" <?php if ($movieData->status == 0) echo 'selected'; ?>>Coming Soon</option>
                        </select>
                    </div>

                    <!-- Genre select -->
                    <div class="form-outline mb-4 mt-4">
                        <select name="genre" class="form-select form-control" id="genre" aria-label="Genre Selection" required>
                            <option value="" selected disabled>Select Genre</option>
                            <option value="Drama" <?php if ($movieData->genre == 'Drama') echo 'selected'; ?>>Drama</option>
                            <option value="Romantic" <?php if ($movieData->genre == 'Romantic') echo 'selected'; ?>>Romantic</option>
                            <option value="Horror" <?php if ($movieData->genre == 'Horror') echo 'selected'; ?>>Horror</option>
                            <option value="Action" <?php if ($movieData->genre == 'Action') echo 'selected'; ?>>Action</option>
                            <option value="Comedy" <?php if ($movieData->genre == 'Comedy') echo 'selected'; ?>>Comedy</option>
                        </select>
                    </div>

                    <!-- Duration input -->
                    <div class="form-outline mb-4 mt-4">
                        <input type="text" name="duration" id="form2Example1" class="form-control" placeholder="Duration" value="<?php echo $movieData->duration; ?>" required />
                    </div>

                    <!-- Release date input -->
                    <div class="form-outline mb-4 mt-4">
                        <label for="release_date">Release Date</label>
                        <input type="date" name="release_date" id="release_date" class="form-control" value="<?php echo $movieData->release_date; ?>" required />
                    </div>

                    <!-- Available seats input -->
                    <div class="form-outline mb-4 mt-4">
                        <input type="number" name="available_seats" id="form2Example1" class="form-control" placeholder="Available Seats" value="<?php echo $movieData->available_seats; ?>" required />
                    </div>

                    <div class="form-outline mb-4 mt-4">
                        <select name="cinema" class="form-select form-control" id="cinema" aria-label="Cinema Selection" required>
                            <option value="" selected disabled>Select Cinema</option>
                            <!-- PHP loop to populate cinemas -->
                            <?php foreach ($cinemas as $cinema) : ?>
                                <option value="<?php echo $cinema->cinema_id; ?>"><?php echo $cinema->cinema_name; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>



                    <!-- Subtitle input -->
                    <div class="form-outline mb-4 mt-4">
                        <input type="text" name="subtitle" id="form2Example1" class="form-control" placeholder="Subtitle" value="<?php echo $movieData->subtitle; ?>" required />
                    </div>

                    <!-- Language input -->
                    <div class="form-outline mb-4 mt-4">
                        <input type="text" name="language" id="form2Example1" class="form-control" placeholder="Language" value="<?php echo $movieData->language; ?>" required />
                    </div>

                    <!-- More information textarea -->
                    <div class="form-group">
                        <label for="more_info">More Information</label>
                        <textarea class="form-control" name="more_info" id="more_info" rows="3" placeholder="Movie More Information" required><?php echo $movieData->more_info; ?></textarea>
                    </div>

                    <!-- Showtime input -->
                    <div class="form-group" id="showtime-container">
                        <label for="showtime">Showtime(s)</label>
                        <?php foreach ($showtimes as $showtime) : ?>
                            <div class="input-group mb-3">
                                <input type="datetime-local" name="showtimes[]" class="form-control" value="<?php echo $showtime->showtime; ?>" required>
                                <button type="button" class="btn btn-outline-secondary remove-showtime">Remove</button>
                            </div>
                        <?php endforeach; ?>
                        <button type="button" class="btn btn-outline-secondary add-showtime">Add Showtime</button>
                    </div>

                    <script>
                        document.addEventListener("DOMContentLoaded", function() {
                            const showtimeContainer = document.getElementById('showtime-container');

                            // Add showtime button click event
                            showtimeContainer.querySelector('.add-showtime').addEventListener('click', function() {
                                const showtimeField = document.createElement('div');
                                showtimeField.classList.add('input-group', 'mb-3');
                                showtimeField.innerHTML = `
        <input type="datetime-local" name="showtimes[]" class="form-control" required>
        <button type="button" class="btn btn-outline-secondary remove-showtime">Remove</button>
      `;
                                showtimeContainer.appendChild(showtimeField);
                            });

                            // Remove showtime button click event
                            showtimeContainer.addEventListener('click', function(event) {
                                if (event.target.classList.contains('remove-showtime')) {
                                    event.target.parentNode.remove();
                                }
                            });
                        });
                    </script>

                    <!-- Star rating input -->
                    <div class="form-outline mb-4 mt-4">
                        <input type="number" name="ratings" id="form2Example1" class="form-control" placeholder="Ratings" value="<?php echo $movieData->ratings; ?>" required />
                    </div>

                    <!-- Submit button -->
                    <button type="submit" name="submit" class="btn btn-primary mb-4 text-center">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require_once "../layouts/footer.php"; ?>