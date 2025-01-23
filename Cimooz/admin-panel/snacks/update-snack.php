<?php require_once "../../config/config.php"; ?>
<?php require_once "../../libs/App.php"; ?>
<?php require_once "../layouts/header.php"; ?>



<?php


$app = new App;
$app->validateAdminSessionInside();

// Handle form submission
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query1 = "SELECT * FROM food WHERE food_id = '$id'";
    $food = $app->selectOne($query1);


    if ($_SERVER["REQUEST_METHOD"] == "POST") {





        $food_name = $_POST['food_name'];

        $food_img = $_FILES["food_img"]["name"];
        $availability = isset($_POST['food_availability']) ? 0 : 1;
        $food_kind = $_POST['food_kind'];
        $food_price = $_POST['food_price'];
        $food_description = $_POST['food_description'];


        // Prepare SQL statement
        $query = "UPDATE food 
          SET food_name = :food_name, 
              food_kind = :food_kind, 
              food_description = :food_description, 
              food_availability = :food_availability, 
              food_img = :food_img, 
              food_price = :food_price 
          WHERE food_id = :id";

        $arr = [

            ":food_name" => $food_name,
            ":food_kind" => $food_kind,
            ":food_availability" => $availability,
            ":food_img" => $food_img,
            ":food_description" => $food_description,
            ":food_price" => $food_price,
        ];



        try {
            // Move uploaded image to destination directory
            $target_dir = "../img/";
            $target_file = $target_dir . basename($_FILES["food_img"]["name"]);
            move_uploaded_file($_FILES["food_img"]["tmp_name"], $target_file);


            // Insert data into the database
            $path = "show-snacks.php";

            $app->update($query, $arr, $path);

            exit();
        } catch (PDOException $e) {
            // Handle database error
            echo "Error: " . $e->getMessage();
        }
    }
}

?>



<div class="container">
    <h2 class="mt-4 mb-4">Update Snack</h2>
    <form action="add-snacks.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="food_name">Food Name:</label>
            <input value="<?php echo isset($food->food_name) ? $food->food_name : ''; ?>" type="text" class="form-control" id="food_name" name="food_name" required>
        </div>

        <div class="form-outline mb-4 mt-4">
            <select name="food_kind" class="form-select form-control" id="food_kind" aria-label="Food kind Selection" required>
                <option value="" selected disabled>Food Kind</option>
                <!-- PHP loop to populate cinemas -->
                <option value="d" <?php echo isset($food->food_kind) && $food->food_kind == 'd' ? 'selected' : ''; ?>>Food</option>
                <option value="f" <?php echo isset($food->food_kind) && $food->food_kind == 'f' ? 'selected' : ''; ?>>Drink</option>
            </select>
        </div>

        <div class="form-group">
            <label for="food_description">Food Description:</label>
            <textarea class="form-control" id="food_description" name="food_description" required><?php echo isset($food->food_description) ? $food->food_description : ''; ?></textarea>
        </div>
        <div class="form-group">
            <label for="food_availability">Food Availability:</label>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="food_availability" name="food_availability" value="available" <?php echo isset($food->food_availability) && $food->food_availability == 'available' ? 'checked' : ''; ?>>
                <label class="form-check-label" for="food_availability">Available</label>
            </div>
        </div>
        <div class="form-group">
            <label for="food_img">Food Image:</label>
            <input type="file" class="form-control-file" id="food_img" name="food_img" <?php echo isset($food->food_img) ? 'value="' . $food->food_img . '"' : ''; ?> required>
        </div>
        <div class="form-group">
            <label for="food_price">Food Price:</label>
            <input type="number" class="form-control" id="food_price" name="food_price" min="0" step="0.01" value="<?php echo isset($food->food_price) ? $food->food_price : ''; ?>" required>
        </div>
        <button name="submit" type="submit" class="btn btn-success">Update</button>
    </form>
</div>

<!-- Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>




<?php require_once "../layouts/footer.php"; ?>