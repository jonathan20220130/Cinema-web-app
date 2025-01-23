<?php require_once "../../config/config.php"; ?>
<?php require_once "../../libs/App.php"; ?>
<?php require_once "../layouts/header.php"; ?>

<?php

$app = new App;

$app->validateAdminSessionInside();

$query1 = "SELECT * from cinema";
$cinemas = $app->selectAll($query1);




// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {


  $emptyFields = [];

  // Define an array to store the names of required fields
  $requiredFields = [
    'name', 'movie_ticket_price', 'description', 'genre', 'duration',
    'status', 'tech', 'available_seats', 'cast', 'synopsis', 'ratings', 'more_info', 'release_date',
    'language', 'subtitle', 'showtimes'
  ];

  // Check each required field
  foreach ($requiredFields as $field) {
    // Check if the field is empty or not set in the $_POST array
    if (!isset($_POST[$field]) || empty($_POST[$field])) {
      // If empty, add the field name to the $emptyFields array
      $emptyFields[] = $field;
    }
  }

  // If there are any empty fields, display an alert
  if (!empty($emptyFields)) {
    print_r($emptyFields);
    echo "<script>alert('Please fill in all required fields: " . implode(', ', $emptyFields) . "');</script>";
  } else {
    // Retrieve movie details from the form
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

    // Handle file upload for movie trailers
    $trailer_file = $_FILES["trailers"]["name"];
    $trailer_temp = $_FILES["trailers"]["tmp_name"];
    $trailer_path = "../trailers/" . $trailer_file;

    // Move the uploaded trailer file to the destination folder
    move_uploaded_file($trailer_temp, $trailer_path);

    // Handle file upload for movie images
    $image_file = $_FILES["image"]["name"];
    $image_temp = $_FILES["image"]["tmp_name"];
    $image_path = "../img/" . $image_file;

    // Move the uploaded image file to the destination folder
    move_uploaded_file($image_temp, $image_path);

    // Prepare SQL statement for inserting movie details
    $movieQuery = "INSERT INTO movies (name, image, movie_ticket_price, description, genre,
    duration, status, tech, available_seats, trailers, cast, synopsis, ratings, more_info,
    release_date, language, subtitle) VALUES (:name, :image, :movie_ticket_price, :description,
    :genre, :duration, :status, :tech, :available_seats, :trailers, :cast, :synopsis, :ratings,
    :more_info, :release_date, :language, :subtitle)";

    // Bind parameters and execute the query for inserting movie details
    $movieArr = [
      ":name" => $name,
      ":image" => $image_file,
      ":movie_ticket_price" => $movie_ticket_price,
      ":description" => $description,
      ":genre" => $genre,
      ":duration" => $duration,
      ":status" => $status,
      ":tech" => $tech,
      ":available_seats" => $available_seats,
      ":trailers" => $trailer_file,
      ":cast" => $cast,
      ":synopsis" => $synopsis,
      ":ratings" => $ratings,
      ":more_info" => $more_info,
      ":release_date" => $release_date,
      ":language" => $language,
      ":subtitle" => $subtitle
    ];

    $path = "show-movies.php";

    // Insert movie details into the database
    $app->insert($movieQuery, $movieArr, $path);

    // Get the last inserted movie ID
    $query = "SELECT * FROM movies WHERE name = '$name'";
    $movie = $app->selectOne($query);
    $lastInsertedId = $movie->movie_id;

    // Prepare SQL statement for inserting showtimes
    $showtimeQuery = "INSERT INTO showtimes (movie_id, showtime) VALUES (:movie_id, :showtime)";

    // Insert each showtime into the database
    foreach ($showtimes as $showtime) {
      $showtimeArr = [":movie_id" => $lastInsertedId, ":showtime" => $showtime];
      $app->insert($showtimeQuery, $showtimeArr, $path);
    }
  }
}

?>



<div class="row">
  <div class="col">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title mb-5 d-inline">Add Movie</h5>
        <form method="post" action="" enctype="multipart/form-data">
          <!-- Movie name input -->
          <div class="form-outline mb-4 mt-4">
            <input type="text" name="name" id="form2Example1" class="form-control" placeholder="Movie Name" required />
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
              <input type="number" name="movie_ticket_price" id="form2Example7" class="form-control" aria-label="Amount (to the nearest dollar)" required>
              <span class="input-group-text">.00</span>
            </div>
          </div>

          <!-- Description textarea -->
          <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" name="description" id="description" rows="3" placeholder="Description" required></textarea>
          </div>

          <!-- Cast textarea -->
          <div class="form-group">
            <label for="cast">Cast</label>
            <textarea class="form-control" name="cast" id="cast" rows="3" placeholder="Movie Cast" required></textarea>
          </div>

          <!-- Synopsis textarea -->
          <div class="form-group">
            <label for="synopsis">Synopsis</label>
            <textarea class="form-control" name="synopsis" id="synopsis" rows="3" placeholder="Movie Synopsis" required></textarea>
          </div>

          <!-- Technology select -->
          <div class="form-outline mb-4 mt-4">
            <select name="tech" class="form-select form-control" id="tech" aria-label="Technology Selection" required>
              <option value="" selected disabled>Choose Technology</option>
              <option value="1">3D</option>
              <option value="0">Ordinary</option>
            </select>
          </div>

          <!-- Status select -->
          <div class="form-outline mb-4 mt-4">
            <select name="status" class="form-select form-control" id="status" aria-label="Movie Status" required>
              <option value="" selected disabled>Choose Movie Status</option>
              <option value="1">Now Showing</option>
              <option value="0">Coming Soon</option>
            </select>
          </div>

          <!-- Genre select -->
          <div class="form-outline mb-4 mt-4">
            <select name="genre" class="form-select form-control" id="genre" aria-label="Genre Selection" required>
              <option value="" selected disabled>Select Genre</option>
              <option value="Drama">Drama</option>
              <option value="Romantic">Romantic</option>
              <option value="Horror">Horror</option>
              <option value="Action">Action</option>
              <option value="Comedy">Comedy</option>
            </select>
          </div>

          <!-- Duration input -->
          <div class="form-outline mb-4 mt-4">
            <input type="text" name="duration" id="form2Example1" class="form-control" placeholder="Duration" required />
          </div>

          <!-- Release date input -->
          <div class="form-outline mb-4 mt-4">
            <label for="release_date">Release Date</label>
            <input type="date" name="release_date" id="release_date" class="form-control" required />
          </div>

          <!-- Available seats input -->
          <div class="form-outline mb-4 mt-4">
            <input type="number" name="available_seats" id="form2Example1" class="form-control" placeholder="Available Seats" required />
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
            <input type="text" name="subtitle" id="form2Example1" class="form-control" placeholder="Subtitle" required />
          </div>

          <!-- Language input -->
          <div class="form-outline mb-4 mt-4">
            <input type="text" name="language" id="form2Example1" class="form-control" placeholder="Language" required />
          </div>

          <!-- More information textarea -->
          <div class="form-group">
            <label for="more_info">More Information</label>
            <textarea class="form-control" name="more_info" id="more_info" rows="3" placeholder="Movie More Information" required></textarea>
          </div>


          <!-- Showtime input -->
          <div class="form-group" id="showtime-container">
            <label for="showtime">Showtime(s)</label>
            <div class="input-group mb-3">
              <input type="datetime-local" name="showtimes[]" class="form-control" required>
              <button type="button" class="btn btn-outline-secondary add-showtime">Add Showtime</button>
            </div>
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
            <input type="number" name="ratings" id="form2Example1" class="form-control" placeholder="Ratings" required />
          </div>

          <!-- Submit button -->
          <button type="submit" name="submit" class="btn btn-primary mb-4 text-center">Create</button>
        </form>
      </div>
    </div>
  </div>
</div>


<?php require_once "../layouts/footer.php"; ?>