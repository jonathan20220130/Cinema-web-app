<?php require __DIR__ . "/../config/config.php"; ?>
<?php require __DIR__ . "/../libs/App.php"; ?>
<?php require __DIR__ . "/../includes/header.php"; ?>


<div class="container-xxl py-5 bg-dark Cinema123-header mb-5 bg-brightness">
        <div class="container text-center my-5 pt-5 pb-4">
            <!-- Display the movie name -->
            <h1 class="display-3 text-white mb-3 animated slideInDown">Seats Selection</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center text-uppercase">
                    <li class="breadcrumb-item"><a href="<?php echo APP_URL; ?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo APP_URL; ?>/movies.php">Movies</a></li>
                </ol>
            </nav>
        </div>
    </div>
    


    <style>
        .seat {
            display: inline-block;
            width: 30px;
            height: 30px;
            background-color: #ccc;
            margin: 5px;
            text-align: center;
            line-height: 30px;
        }
        .selected {
            background-color: #ff0000;
            color: #fff;
        }
    </style>
</head>
<body>
    <h1>Seat Selection</h1>
    <h2>Movie Title</h2>
    <p>Duration: 2 hours</p>
    <p>Showtime: 12:00 PM</p>

    <form action="book-seat.php" method="POST">
        <input type="hidden" name="movie_id" value="1">
        <h3>Select Your Seats:</h3>
        <?php
        // Assuming $available_seats is an array of available seat numbers
        foreach ($available_seats as $seat) {
            echo "<label class='seat'><input type='checkbox' name='seats[]' value='$seat'> $seat</label>";
        }
        ?>
        <br><br>
        <button type="submit">Book Seats</button>
    </form>
</body>
</html>
