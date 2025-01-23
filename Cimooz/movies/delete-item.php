<?php require __DIR__ . "/../config/config.php"; ?>
<?php require __DIR__ . "/../libs/App.php"; ?>
<?php require __DIR__ . "/../includes/header.php"; ?>


<?php

// if(!isset($_SERVER['HTTP_REFERER'])){
//     // redirect them to your desired location
//     echo "<script>window.location.href='".APP_URL."'</script>";
//     exit;
// }
?>



<?php


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $app = new App;

    $query1 = "DELETE FROM cart WHERE item_id = '$id'";
    $path = "cart.php" ;
    //$app->delete($query2 , $path);
    $app->delete($query1 , $path);
} else {
    echo "<script>window.location.href='".ADMIN_URL."'</script>";
}
