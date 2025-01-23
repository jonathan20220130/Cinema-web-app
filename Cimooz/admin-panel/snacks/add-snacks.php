<?php require_once "../../config/config.php"; ?>
<?php require_once "../../libs/App.php"; ?>
<?php require_once "../layouts/header.php"; ?>



<?php

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {





    $food_name = $_POST['food_name'];

    $food_img = $_FILES["food_img"]["name"];
    $availability = isset($_POST['food_availability']) ? 0 : 1;
    $food_kind = $_POST['food_kind'];
    $food_price = $_POST['food_price'];
    $food_description = $_POST['food_description'];


    // Prepare SQL statement
    $query = "INSERT INTO food (food_name, food_kind, food_description, food_availability,
    food_img, food_price) VALUES (:food_name, :food_kind, :food_description, 
    :food_availability, :food_img, :food_price)";



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

        $app = new App;

        $path = "show-snacks.php";

        $app->insert($query, $arr, $path);

        exit();
    } catch (PDOException $e) {
        // Handle database error
        echo "Error: " . $e->getMessage();
    }
}
?>









<div class="container">
    <h2 class="mt-4 mb-4">Add Food Item</h2>
    <form action="add-snacks.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="food_name">Food Name:</label>
            <input type="text" class="form-control" id="food_name" name="food_name" required>
        </div>

        <div class="form-outline mb-4 mt-4">
            <select name="food_kind" class="form-select form-control" id="food_kind" aria-label="Food kind Selection" required>
                <option value="" selected disabled>Food Kind</option>
                <!-- PHP loop to populate cinemas -->
                    <option value="d">Food</option>
                    <option value="f">Drink</option>
            </select>
        </div>

        <div class="form-group">
            <label for="food_description">Food Description:</label>
            <textarea class="form-control" id="food_description" name="food_description" required></textarea>
        </div>
        <div class="form-group">
            <label for="food_availability">Food Availability:</label>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="food_availability" name="food_availability" value="available">
                <label class="form-check-label" for="food_availability">Available</label>
            </div>
        </div>
        <div class="form-group">
            <label for="food_img">Food Image:</label>
            <input type="file" class="form-control-file" id="food_img" name="food_img" accept="image/*" required>
        </div>
        <div class="form-group">
            <label for="food_price">Food Price:</label>
            <input type="number" class="form-control" id="food_price" name="food_price" min="0" step="0.01" required>
        </div>
        <button name="submit" type="submit" class="btn btn-primary">Add Food</button>
    </form>
</div>

<!-- Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>




<?php require_once "../layouts/footer.php"; ?>