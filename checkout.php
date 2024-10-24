<?php
define('Access', TRUE);

// SESSION START
include "./AdditionalPHP/startSession.php";
include "./AdditionalPHP/startSession.php";
include "./AdditionalPHP/checkAccess.php";

$uname = $_SESSION['uname'];

include "connection.php";

$sql = "SELECT * FROM user WHERE uname='$uname'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);

    $fname = $row['fname'];
    $lname = $row['lname'];
    $email = $row['email'];
    $address = $row['address'];
    $phonenumber = $row['phone'];
}

// DATABASE CONNECTION TMCP
include_once 'connection.php';

$validated = true;

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>TMCP | Checkout</title>
<link rel="icon" type="image/png" href="Assets\images\1.index\logo.png">
    <!-- BOOTSTRAP CORE CSS -->
    <link href="checkout/bootstrap.min.css" rel="stylesheet">

    <!-- CSS -->
    <link href="checkout/form-validation.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <main>
            <!-- TITLE -->
            <div class="py-5 text-center">
                <h1 class="business-name">TMCP</h1>
                <h2>Information form</h2>
            </div>

            <!-- MY CART -->
            <div class="row g-3">
                <div class="col-md-5 col-lg-4 order-md-last">
                    <!-- YOUR CART / CART VALUE -->
                    <h4 class="d-flex justify-content-between align-items-center my-cart mb-3">
                        <span class="text-muted">Your cart</span>
                        <span class="badge cart-number bg-pink rounded-pill">
                            <?php if (isset($_SESSION['item_quantity'])) {
                                echo $_SESSION['item_quantity'];
                            } else {
                                echo "0";
                            } ?>
                        </span>
                    </h4>

                    <!-- CART ITEMS LIST + TOTAL -->
                    <ul class="list-group mb-3">
                        <?php
                        foreach ($_SESSION['shopping_cart'] as $key => $product) {
                            $Q_fetch__all_products = "SELECT * FROM products";
                            $result_product = mysqli_query($conn, $Q_fetch__all_products);

                            while ($product_row = mysqli_fetch_assoc($result_product)) {
                                if ($product_row['productID'] == $product['id']) {
                                    ?>
                                    <!-- PRODUCT 1 -->
                                    <li class="list-group-item d-flex justify-content-between lh-sm linen-rows">
                                        <div>
                                            <h6 class="my-0"><?php echo $product_row['p_name']; ?></h6>
                                            <small class="text-muted">x <?php echo $product['quantity']; ?> unit(s)</small>
                                        </div>
                                        <span class="text-muted price-tag">Php <?php echo number_format(($product['quantity']  * $product_row['p_price']), 2); ?></span>
                                    </li>
                                <?php
                                }
                            }
                        } // end foreach
                        ?>

                        <!-- TOTAL -->
                        <li class="list-group-item d-flex justify-content-between total-row">
                            <span>Total (Php)</span>
                            <strong class="price-tag">Php <?php echo number_format($_SESSION['total_price'], 2); ?></strong>
                        </li>
                    </ul>
                </div>

                <!-- BILLING ADDRESS -->
                <div class="col-md-7 col-lg-8">
                    <h4 class="mb-3 border-bottom-pink">Information</h4>
                    <form action="<?php echo $validated ? 'ThankYouCheckout.php' : htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="needs-validation" method="POST">
                        <div class="row g-3">
                            <?php
                            $randidx = ""; // Initialize $randidx
                            $sql = "SELECT * FROM rc_number ORDER BY id ASC";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $randidx = $row["id"];
                            }
                            ?>
                            <!-- RECEIPT NUMBER -->
                            <div class="col-12">
                                <label for="randx" class="form-label">Receipt #</label>
                                <input type="text" class="form-control" name="randx" id="randx" value="0000<?php echo $randidx; ?>" readonly="">
                            </div>

                            <!-- FIRST NAME -->
                            <div class="col-sm-6">
                                <label for="firstName" class="form-label">First name</label>
                                <input type="text" class="form-control" name="fname" id="firstName" placeholder="" value="<?php echo $fname; ?>" required readonly="">
                            </div>

                            <!-- LAST NAME -->
                            <div class="col-sm-6">
                                <label for="lastName" class="form-label">Last name</label>
                                <input type="text" class="form-control" name="lname" value="<?php echo $lname; ?>" required readonly="">
                            </div>

                            <!-- EMAIL -->
                            <div class="col-12">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" id="email" value="<?php echo $email; ?>" readonly="">
                            </div>

                            <!-- ADDRESS -->
                            <div class="col-12">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" class="form-control" id="address" name="address_checkout" placeholder="1234 Main St" value="<?php echo $address; ?>" required readonly="">
                            </div>

                            <!-- PHONE NUMBER -->
                            <div class="col-12">
                                <label for="phoneNumber" class="form-label">Phone Number</label>
                                <input type="text" class="form-control" id="phoneNumber" name="phoneNumber" value="<?php echo $phonenumber; ?>" required readonly="">
                            </div>

                    

                          

                            <hr class="my-4 pinkLine">

                            <!-- PAYMENT METHOD -->
                            <h4 class="mb-3">Payment Method</h4>

   <div class="col-md-6">
    <label for="paymentMethod" class="form-label">Payment Method</label>
    <select class="form-select" id="paymentMethod" name="paymentMethod" required onchange="togglePaymentProofField()">
        <option value="">Choose Payment Method</option>
        <option value="PICKUP">Pick Up</option>
        <option value="GCASH">GCash (Not available)</option>
        
    </select>
</div>

<!-- HTML content for GCash payment -->
<div id="gcashPaymentContent" style="display: none;">
    <h3>GCash Payment</h3>
    <img src="Assets/images/Payment/GCASH PAYMENT.jpg" alt="" width="250px">
    <p>Number: 09350680370</p>
<p>&#10004;Scan to pay or use the number</p>
<p>&#10004;Save your Receipt in gcash</p>

    <hr class="my-4 pinkLine">
</div>

<!-- JavaScript to toggle GCash payment content -->
<script type="text/javascript">
function togglePaymentProofField() {
    var paymentMethodSelect = document.getElementById("paymentMethod");
    var gcashPaymentContent = document.getElementById("gcashPaymentContent");

    if (paymentMethodSelect.value === "GCASH") {
        gcashPaymentContent.style.display = "block"; // Show GCash payment content
    } else {
        gcashPaymentContent.style.display = "none"; // Hide GCash payment content
    }
}

// Call the function initially to ensure the correct state on page load
togglePaymentProofField();
</script>




                            <!-- PICKUP DATE AND TIME -->
<div id="pickdate" class="col-12">
    <label for="pickupDateTime" class="form-label">Pickup Date and Time</label>
    <div class="row">
        <div class="col-6">
            <input type="date" class="form-control" name="datepickup" required>
        </div>
        <div class="col-6">
            <input type="time" class="form-control" name="timepickup" required>
        </div>
    </div>
</div>

<!-- ERROR MESSAGE FOR INVALID PICKUP DATE/TIME -->
<div class="col-12 text-danger d-none" id="pickup-error">
    Please select a future date and time for pickup.
</div>


                            <hr class="my-4 pinkLine">

                            <!-- COTINUE TO CHECKOUT BUTTON -->
                          
                            <button class="w-100 btn btn-primary btn-lg button" type="submit">Continue to checkout</button>
                            <a href="index.php" class="w-100 btn btn-primary btn-lg button">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </main>

        <footer class="my-5 pt-5 text-muted text-center text-small">
            <p class="mb-1">&copy; 2023 TMCP</p>
            <ul class="list-inline">
                <li class="list-inline-item"><a href="privacypolicy.php">Privacy</a></li>
                <li class="list-inline-item"><a href="termofuse.php">Terms</a></li>
                <li class="list-inline-item"><a href="contact.php">Support</a></li>
            </ul>
        </footer>
    </div>

    <script src="checkout/bootstrap.bundle.min.js"></script>
    <script src="checkout/form-validation.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script type="text/javascript">
(function() {
    'use strict'

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll('.needs-validation');

    // Loop over them and prevent submission
    Array.prototype.slice.call(forms).forEach(function(form) {
        form.addEventListener('submit', function(event) {
            if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            }

            form.classList.add('was-validated');

            // Custom validation for pickup date and time
            if (form.paymentMethod.value === 'PICKUP') {
                var datePickup = form.datepickup.value;
                var timePickup = form.timepickup.value;
                var currentDate = new Date();
                var selectedDate = new Date(datePickup + ' ' + timePickup);

                var dayOfWeek = selectedDate.getDay(); // 0: Sunday, 1: Monday, ..., 6: Saturday
                var hours = selectedDate.getHours();

                // Check if the selected date is on a weekday (Monday to Friday)
                if (dayOfWeek === 0 || dayOfWeek === 6) {
                    alert('Pickup is only available from Monday to Friday.');
                    event.preventDefault();
                    event.stopPropagation();
                    return;
                }

                // Check if the selected time is within the allowed range (8:00 AM to 5:00 PM)
                if (hours < 8 || hours >= 17) {
                    alert('Pickup time should be between 8:00 AM and 5:00 PM.');
                    event.preventDefault();
                    event.stopPropagation();
                    return;
                }

                // Check if the selected date and time are in the future
                if (selectedDate <= currentDate) {
                    alert('Please select a future date and time for pickup.');
                    event.preventDefault();
                    event.stopPropagation();
                }
            }
        }, false);
    });
})();
</script>
