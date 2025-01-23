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





<div class="container-xxl py-5 bg-dark Cinema123-header mb-5 bg-brightness">
    <div class="container text-center my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Checkout</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center text-uppercase">
                <li class="breadcrumb-item"><a href="<?php echo APP_URL ; ?>">Home</a></li>
                <li class="breadcrumb-item"><a href="pay.php">Pay</a></li>
            </ol>
        </nav>
    </div>
</div>


<div class="container" style="display: flex; justify-content: center; align-items: center; height: 100px; width: 300px;">
    <!-- Replace "test" with your own sandbox Business account app client ID -->
    <script src="https://www.paypal.com/sdk/js?client-id=AUy8leb8gwb_L8MfHOJZLxeeBYbX6sF9VXycCnwrSSbEeURXYdE3eUrc3v5fllmh6crdtw_8fzuK6LPQ&currency=USD"></script>
    <!-- Set up a container element for the button -->
    <div id="paypal-button-container" style="width: 500px;"></div>
    <script>
        paypal.Buttons({
            // Sets up the transaction when a payment button is clicked
            createOrder: (data, actions) => {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: '<?php  echo$_SESSION['total_price'] ?>' // Can also reference a variable or function
                        }
                    }]
                });
            },
            // Finalize the transaction after payer approval
            onApprove: (data, actions) => {
                return actions.order.capture().then(function(orderData) {
                    <?php ?>
                    window.location.href = 'delete-cart.php';
                });
            }
        }).render('#paypal-button-container');
    </script>

</div>

<?php require __DIR__ . "/../includes/footer.php"; ?>