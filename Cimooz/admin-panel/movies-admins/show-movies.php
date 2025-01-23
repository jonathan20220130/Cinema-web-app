<?php require_once "../../config/config.php"; ?>
<?php require_once "../../libs/App.php"; ?>
<?php require_once "../layouts/header.php"; ?>


<?php

$app = new App;

$app->validateAdminSessionInside();

$query = "SELECT * FROM movies";
$all_movies = $app->selectAll($query);


?>

<style>
  table {
    width: 100%;
    border-collapse: collapse;
  }

  th,
  td {
    padding: 15px;
    text-align: left;
    border-bottom: 1px solid #ddd;
  }

  th {
    background-color: #f2f2f2;
    font-weight: bold;
  }

  tr:hover {
    background-color: #f5f5f5;
  }

  video {
    width: 100px;
    height: 150px;
  }
</style>

<div class="row">
  <div class="col">
    <h5 class="card-title mb-4 d-inline">Movies</h5>
    <a href="add-movies.php" class="btn btn-primary mb-4 text-center float-right">Add Movie</a>

    <table class="table">
      <thead>
        <tr class="">
          <th scope="col">#</th>
          <th scope="col">Title</th>
          <th scope="col">Image</th>
          <th scope="col">Trailers</th>
          <th scope="col">Showtimes</th>
          <th scope="col">Status</th>
          <th scope="col">Genre</th>
          <th scope="col">Seats Available</th>
          <th scope="col">Created At</th>
          <th scope="col">Release Date</th>
          <th scope="col">Update</th>
          <th scope="col">Delete</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($all_movies as $movie) : ?>
          <tr>
            <td><?php echo $movie->movie_id; ?></td>
            <td><?php echo $movie->name; ?></td>
            <td>
              <img src="../img/<?php echo $movie->image; ?>" alt="Movie Image" style="width: 150px; height: 150px">
            </td>
            <td>
              <video controls style="width: 150px; height: 150px">
                <source src="../trailers/<?php echo $movie->trailers; ?>" type="video/mp4">
                Your browser does not support the video tag.
              </video>
            </td>

            <!-- showtimes -->
            <?php
            $showtimes = $app->selectAll("SELECT showtime FROM showtimes JOIN movies ON showtimes.movie_id = movies.movie_id WHERE movies.movie_id = {$movie->movie_id}");
            ?>
            <td>
              <?php foreach ($showtimes as $showtime) : ?>
                <?php echo $showtime->showtime; ?>
                <br><br>
              <?php endforeach; ?>
            </td>
            <td>
              <?php if ($movie->status) {
                echo "Available";
              } else {
                echo "Not Available";
              }
              ?>
            </td>
            <td><?php echo $movie->genre; ?></td>
            <td><?php echo $movie->available_seats; ?></td>
            <td><?php echo $movie->created_at; ?></td>
            <td><?php echo $movie->release_date; ?></td>
            <td><a href="update-movie.php?id=<?php echo $movie->movie_id; ?>" class="btn btn-success text-center">Update</a></td>
            <td><a href="delete-movie.php?id=<?php echo $movie->movie_id; ?>" class="btn btn-danger  text-center ">Delete</a></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>


<?php require_once "../layouts/footer.php"; ?>