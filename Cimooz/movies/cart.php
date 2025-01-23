<?php require __DIR__ . "/../config/config.php"; ?>
<?php require __DIR__ . "/../libs/App.php"; ?>
<?php require __DIR__ . "/../includes/header.php"; ?>




<?php

// if (!isset($_SERVER['HTTP_REFERER'])) {
//     // redirect them to your desired location
//     echo "<script>window.location.href='" . APP_URL . "'</script>";
//     exit;
// }
?>




<?php

$app = new App();

if (!isset($_SESSION['user_id'])) {
    exit("User not logged in");
}

$query = "SELECT * FROM cart WHERE user_id = '$_SESSION[user_id]'";
$all_items = $app->selectAll($query);

$cart_price = $app->selectOne("SELECT SUM(item_price * num_of_items) AS total_sum FROM cart WHERE user_id = '$_SESSION[user_id]'");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['submit'])) {
        $_SESSION['total_price'] = $cart_price->total_sum;
        $_SESSION['cart_not_empty'] = true;
        echo "<script>window.location.href='checkout.php'</script>";
    }

    if (isset($_POST['update_cart'])) {
        if (isset($_POST['quantity']) && is_array($_POST['quantity'])) {
            foreach ($_POST['quantity'] as $item_id => $quantity) {
                if (!is_numeric($quantity) || $quantity < 0) {
                    continue;
                }
                $query = "UPDATE cart SET num_of_items = :quantity WHERE user_id = :user_id AND item_id = :item_id";
                $array = [
                    ":quantity" => $quantity,
                    ":user_id" => $_SESSION['user_id'],
                    ":item_id" => $item_id,
                ];
                $path = "cart.php";
                $app->update($query, $array, $path);
            }
        }
    } else {
        echo "<script>window.location.href='" . APP_URL . "/404.php'</script>";
    }
}
?>



<div class="container-xxl py-5 bg-dark Cinema123-header mb-5 bg-brightness">
    <div class="container text-center my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Cart</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center text-uppercase">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Cart</a></li>
            </ol>
        </nav>
    </div>
</div>
</div>
<!-- Navbar & Hero End -->
<div class="container">
    <div class="col-md-12">
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Image</th>
                        <th scope="col">Name</th>
                        <th scope="col">Unit Price</th>
                        <th scope="col">Number of Units</th>
                        <th scope="col">Kind</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <?php if (!empty($all_items)) : ?>
                    <tbody>
                        <?php foreach ($all_items as $one_item) : ?>
                            <tr>
                                <th><img src="../img/<?php echo $one_item->item_image; ?>" style="width: 50px; height: 50px;"></th>
                                <td><?php echo $one_item->item_name; ?></td>
                                <td>$<?php echo $one_item->item_price; ?></td>
                                <td>
                                    <input type="number" name="quantity[<?php echo $one_item->item_id; ?>]" value="<?php echo $one_item->num_of_items; ?>">
                                </td>
                                <?php if ($one_item->item_kind == 'm') : ?>
                                    <td>Movie</td>
                                <?php endif ?>
                                <?php if ($one_item->item_kind == 'f') : ?>
                                    <td>Food</td>
                                <?php endif ?>
                                <?php if ($one_item->item_kind == 'd') : ?>
                                    <td>Frish Drink</td>
                                <?php endif ?>
                                <td><a href="<?php echo APP_URL; ?>/movies/delete-item.php?id=<?php echo $one_item->item_id; ?>" class="btn btn-danger text-white">delete</a></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
            </table>
            <div class="position-relative mx-auto" style="max-width: 400px; padding-left: 679px;">
                <p style="margin-left: -7px;" class="w-19 py-3 ps-4 pe-5" type="text"> Total: $<?php echo $cart_price->total_sum; ?></p>
                <button type="submit" name="update_cart" class="btn btn-primary py-2 top-0 end-0 mt-2 me-2" style="width: 150px;">Update Cart</button>
                <button name="submit" type="submit" class="btn btn-success py-2 top-0 end-0 mt-2 me-2" style="width: 150px;">Checkout</button>
            </div>
        <?php else : ?>
            </table>
            <h2>No items in cart</h2>
            <div class="position-relative mx-auto" style="max-width: 400px; padding-left: 679px;">
                <p style="margin-left: -7px;" class="w-19 py-3 ps-4 pe-5" type="text"> Total: $0</p>
                <button type="submit" name="update_cart" class="btn btn-primary py-2 top-0 end-0 mt-2 me-2" style="width: 150px;">Update Cart</button>
            </div>
        <?php endif ?>
        </form>
    </div>
</div>

<?php require __DIR__ . "/../includes/footer.php"; ?>