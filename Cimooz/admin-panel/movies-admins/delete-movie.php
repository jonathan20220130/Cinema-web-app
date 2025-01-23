<?php require __DIR__ . "/../../config/config.php"; ?>
<?php require __DIR__ . "/../../libs/App.php"; ?>
<?php require __DIR__ . "/../layouts/header.php"; ?>


<?php

if(!isset($_SERVER['HTTP_REFERER'])){
    // redirect them to your desired location
    echo "<script>window.location.href='".ADMIN_URL."'</script>";
    exit;
}
?>



<?php


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $app = new App;

    $query = "DELETE FROM movies WHERE movie_id = '$id'";
    $path = "show-movies.php" ;
    $app->delete($query , $path);
} else {
    echo "<script>window.location.href='".ADMIN_URL."'</script>";
}
