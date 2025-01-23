<?php require_once "../../config/config.php"; ?>
<?php require_once "../../libs/App.php"; ?>
<?php require_once "../layouts/header.php"; ?>


<?php

$app = new App;

$app->validateAdminSessionInside();

$query = "SELECT * FROM food";
$all_foods = $app->selectAll($query);


?>


<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-4 d-inline">Food Items</h5>
                <a href="add-snacks.php" class="btn btn-primary mb-4 text-center float-right">Add Snack</a>

                <table class="table" style="width: 5000px;">
                    <thead>
                        <tr class="">
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Kind</th>
                            <th scope="col">Description</th>
                            <th scope="col">Availability</th>
                            <th scope="col">Image</th>
                            <th scope="col">Price</th>
                            <th scope="col">Delete</th>
                            <th scope="col">Update</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($all_foods as $food) : ?>
                            <tr>
                                <th scope="row"><?php echo $food->food_id; ?></th>
                                <td><?php echo $food->food_name; ?></td>
                                <td><?php echo $food->food_kind == 'f' ? 'Food' : 'Drink'; ?></td>
                                <td><?php echo $food->food_description; ?></td>
                                <td><?php echo $food->food_availability == 'available' ? 'Available' : 'Not Available'; ?></td>
                                <td>
                                    <img style="width: 150px; height: 150;" src="../../img/<?php echo $food->food_img; ?>" alt="Food Image">
                                </td>
                                <td>$<?php echo $food->food_price; ?></td>
                                <td><a href="delete-food.php?id=<?php echo $food->food_id; ?>" class="btn btn-danger text-center">Delete</a></td>
                                <td><a href="update-snack.php?id=<?php echo $food->food_id; ?>" class="btn btn-success text-center">Update</a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<?php require_once "../layouts/footer.php"; ?>
