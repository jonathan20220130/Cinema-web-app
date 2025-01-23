<?php require __DIR__ . "/../config/config.php"; ?>
<?php require __DIR__ . "/../libs/App.php"; ?>
<?php require __DIR__ . "/../includes/header.php"; ?>



<?php

if(!isset($_SERVER['HTTP_REFERER'])){
    // redirect them to your desired location
    echo "<script>window.location.href='".APP_URL."'</script>";
    exit;
}
?>



<?php

$query = "DELETE FROM cart WHERE user_id = '$_SESSION[user_id]'";
$path = "cart.php";
$app = new App;
$app->delete($query, $path);
