<?php 
date_default_timezone_set('Asia/Manila');
define('Access' , TRUE);
include "./AdditionalPHP/startSession.php";
include "./AdditionalPHP/checkAccess.php";
$uname = $_SESSION['uname'];
include "connection.php";
$sql = "SELECT * FROM user WHERE uname='$uname'";
$result= mysqli_query($conn, $sql);

if(mysqli_num_rows($result) === 1){
    $row = mysqli_fetch_assoc($result);


    $fname = $row['fname'];
$lname = $row['lname'];
$email = $row['email'];
$address = $row['address'];
$phonenumber = $row['phone'];
}
$sql = "SELECT paymentMethod, datepickup, timepickup, createDate FROM `transaction`";
$result = mysqli_query($conn, $sql);   
while($row = mysqli_fetch_assoc($result)) 
{
 $paymentmethod = $row["paymentMethod"];
 $createDate = $row["createDate"];
 $pickupdate = $row["datepickup"];
 $pickuptime = $row["timepickup"];
  // Now, when you use the current date and time, it will be in Manila time.
$createDate = date('Y-m-d H:i:s');
}
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';

?>
<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <title>TMCP | Details</title>
    <link rel="icon" type="image/png" href="Assets\images\1.index\logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--========== PHP CONNECTION TO DATABASE: TMCP ==========-->
    <?php 
        
        include_once 'numOfItemsInCart.php';
    ?>

    <!--========== CSS FILES ==========-->
    <link rel="stylesheet" type="text/css" href="Common.css">
    <link rel="stylesheet" type="text/css" href="Sanjana.css">

    <link href="jquery.nice-number.css" rel="stylesheet">
    <!--========== JQUERY CDN ==========-->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    
    <script src="jquery.nice-number.js"> </script>
    <script type="text/javascript"> 
    $(function(){
        $('input[type="number"]').niceNumber();
    });
    </script>


    <!--========== BOOTSTRAP ==========-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
 
    <script src="https://kit.fontawesome.com/0e16635bd7.js" crossorigin="anonymous"></script>
    <!-- Animate CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <!--========== BOXICONS ==========-->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

    </head>

                        <?php  

$sql = "SELECT * FROM rc_number ORDER BY id DESC LIMIT 1";
$result = mysqli_query($conn, $sql);

if ($row = mysqli_fetch_assoc($result)) {
    $randidx = $row['id'];
} else {
    // Handle the case where no rows are returned
    // Set a default value or show an error message
    $randidx = 0; // You can set a default value
}

                ?>
<body>
    <div class="container">
        <main>
            <!-- TITLE -->
            <div class="py-5 text-center">
                <h1 class="business-name">TMCP</h1>
                <h2>Invoice</h2>
            </div>
            <hr class="my-4 pinkLine">
            <!-- Customer Information -->
            <div class="customer-info">
                <h5 class="mb-3">Name: <?php echo $fname; ?> <?php echo $lname; ?></h5>
                <p class="font-14 mb-2">
                    Date Issued: <strong class="weight-600"> <?php echo "".$createDate.""; ?></strong>
                </p>
                <p class="font-14 mb-2">
                    Invoice No: <strong class="weight-600"><?php echo $randidx; ?></strong>
                </p>
                <p class="font-14 mb-2">
                    Number: <?php echo $phonenumber; ?></p>
                <p class="font-14 mb-2">
                    Email: <?php echo $email; ?></p>
                <p class="font-14 mb-2">
                    Address: <?php echo $address; ?></p>
                    <p class="font-14 mb-2">
										Payment Method: <strong class="weight-600"></b> <?php echo "".$paymentmethod.""; ?></strong>
									</p>
                                    <p class="font-14 mb-2">
                                    Pick up date: <strong class="weight-600"></b> <?php echo "".$pickupdate.""; ?></strong>
									</p>
                                    <p class="font-14 mb-2">
                                    Pick up time: <strong class="weight-600"></b> <?php echo "".$pickuptime.""; ?></strong>
									</p>
            </div>

            <hr class="my-4 pinkLine">
<!-- header of order details -->
<div class="cart_title_bar mx-1 ">
    <div class="cart-title-1">
        <h2 class="section-title hide-wave"> </h2>
    </div>
    <div class="cart-title-2">
        <h4 class="section-all my-0 py-0 hide-wave">Item Details</h4>
    </div>
    <div class="cart-title-3">
        <h4 class="section-all my-0 py-0 hide-wave">Quantity</h4>
    </div>
   
    <div class="cart-title-4">
        <h4 class="section-all my-0 py-0 hide-wave">Total Price (Php)</h4>
    </div> 
    
</div>
<!-- Loop through session shopping cart -->
<?php
//if shopping cart not empty
if(!empty($_SESSION['shopping_cart'])){
    //create total variable 
    $total = 0;
    $_SESSION['total_quantity'] = 0;
    //loop through each item in shopping cart
    foreach($_SESSION['shopping_cart'] as $key => $product){ 
    }
}
?>
 <?php 
            
            $Q_fetch_featured = "SELECT * FROM products INNER JOIN product_type ON products.productID = product_type.productID WHERE product_type.typeID = 2"; //selects featured products
            $Q_fetch_new = "SELECT * FROM products INNER JOIN product_type ON products.productID = product_type.productID WHERE product_type.typeID = 1"; //selects new products
            $Q_fetch_product_details = "SELECT * FROM products INNER JOIN product_type ON products.productID = product_type.productID WHERE product_type.typeID = 2"; //selects product with id =1
            $Q_fetch__all_products = "SELECT * FROM products";
            

        ?>

<!-- Receipt item card -->
<div class="receipt-card">

    <!-- product image -->
    <?php
    
    $result_product = mysqli_query($conn, $Q_fetch__all_products);
    $check = mysqli_num_rows($result_product);

    if($check>0){ //checks if $result empty in database
          //loops through all items in products table in database
        while($product_row = mysqli_fetch_assoc($result_product)){

              //compare if id in database in current loop is equal to  
              //id in current session shopping cart foreach loop
            if($product_row['productID'] == $product['id']){
                ?>
                <!-- prints image from database of corresponding id -->
                <div class="cart_img">
                    <img width="40%" src="<?php  echo $product_row['p_img']; ?>" class="img-fluid">
                </div>

                <?php
            }//end if
        }//end while
    }//end if check
    ?>

    <!-- <div class="cart_img">
        <img src="Assets\images\products\Cake_2.jpg" class="img-fluid">
    </div> -->

    <!-- product details -->
    <div class="">
        <!-- product name -->
        <div class="product-name">
            <div class="product-name-det">
                <h6><?php echo $product['name'];?></h6>
                <h6>Php <?php echo number_format($product['price'], 2);?> / unit</h6>
            </div>
        </div>
    </div>

        <!-- quantity -->
        <div class="quantity-value">
             <h6><?php echo $product['quantity'];?></h6>
        </div>


    <!-- product total price -->
    <div class="tot-price-per-item ">
        <h6>Php <?php echo number_format($product['quantity'] * $product['price'], 2); ?></h6>
    </div>

     
</div>

<?php

    // Initialize total
$total = 0;

//CALCULATING TOTAL PRICE
$total = $total + ($product['quantity'] * $product['price']);

//CREATE SESSION FOR TOTAL PRICE
$_SESSION['total_price'] = $total;


//end foreach

?> 
  <!-- subtotal -->
<div class="receipt-card">
    <div class="col">
        <h4 class="subtitle title-checkout"> </h4>
    </div>
    <div class="col">
        <h4 class="subtitle"> </h4>
    </div>
    <div class="col">
        <h4 class="subtitle title-checkout">TOTAL PAYMENT: </h4>
    </div>
    <div class="col">
        <h4 class="subtitle">Php <?php echo number_format($total, 2); ?></h4>
    </div>
</div>
                  

                    
  <!-- checkout -->
                    <!-- show checkout if shopping cart array not empty -->
                    <?php
                    //check if shopping cart not empty
                    if(isset($_SESSION['shopping_cart'])){
                        //check if shopping cart contains more than 0 products
                        if(count($_SESSION['shopping_cart'])>0){
                    
                    ?> 
                    <?php
                     }//end count if
                     if(count($_SESSION['shopping_cart']) == 0) {
                        echo('<h1 class="subtitle">Your cart is empty!</h1>');
                     }
                    }//end isset if
                    if(!isset($_SESSION['shopping_cart'])) {
                        echo('<h1 class="subtitle">Your cart is empty!</h1>');
                     }
                    
                    ?>
                </div>
 
            </div>


                        <center>
                          <br> 
                        <a href="products.php">
                            <button type="button" onClick="window.print()" class="btn btn-primary">&nbsp;&nbsp;&nbsp;Print Copy&nbsp;&nbsp;  </button>
                        </a>

                         <a href="products.php">
                            <button type="button"   class="btn btn-primary">&nbsp;&nbsp;Back to products&nbsp;  </button>
                        </a>
                 


                  


                </center>

                       
              

            <!-- Receipt -->
            <div class="col-md container receipt-area mx-auto">
                <!-- Summary -->
                
            </div>
            <?php

// Send invoice details via email
$mail = new PHPMailer(true);

try {
    // Server settings for Gmail
    $mail->isSMTP();
                        $mail->Host = 'smtp.gmail.com';
                        $mail->SMTPAuth = true;
                        $mail->Username = 'tresmariascakeandpastries@gmail.com';
                        $mail->Password = 'oxwl ihhe cuwn tewk';
                        $mail->SMTPSecure = 'tls';
                        $mail->Port = 587;
    // Recipients
    $mail->setFrom('jerzycinense2@gmail.com', 'TMCP');
    $mail->addAddress($email, $fname . ' ' . $lname); // $email is the customer's email address

    // Content
    $mail->isHTML(true);
    $mail->Subject = 'Invoice from TMCP';

// Construct the email body using the invoice details
$emailBody = '<h1>Your Invoice Details</h1>';
$emailBody .= '<p>Invoice Number: ' . $randidx . '</p>';
$emailBody .= '<p>Date Issued: ' . $createDate . '</p>';
$emailBody .= '<p>Name: ' . $fname . ' ' . $lname . '</p>';
$emailBody .= '<p>Phone Number: ' . $phonenumber . '</p>';
$emailBody .= '<p>Email: ' . $email . '</p>';
$emailBody .= '<p>Address: ' . $address . '</p>';
$emailBody .= '<p>Payment Method: ' . $paymentmethod . '</p>';
$emailBody .= '<p>Pick up date: ' . $pickupdate . '</p>';
$emailBody .= '<p>Pick up time: ' . $pickuptime . '</p>';

// Add details for each product in the shopping cart
foreach ($_SESSION['shopping_cart'] as $key => $product) {
    $emailBody .= '<p>Product: ' . $product['name'] . ', Quantity: ' . $product['quantity'] . ', Price: Php ' . number_format($product['price'], 2) . '</p>';
}

// Add total payment
$emailBody .= '<p>Total Payment: Php ' . number_format($total, 2) . '</p>';

// Set the email body
$mail->Body = $emailBody;

    $mail->send();

   
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>

            <?php  
                //end if at start
                //Displays msg if cart is emty
                if(isset($_SESSION['shopping_cart'])) {
                    if(count($_SESSION['shopping_cart']) == 0) {
                        
                        echo('<h1 class="text-center my-3">Your cart is empty!</h1>');
                        echo('<div class="text-center py-3"><img src="Assets\images\cart\sad.png" class="img-fluid" style="max-width:17%;"></div>');
                        echo('<div class="text-center py-3"><a href="products.php" class="button button__round">SHOP NOW</a></div>');
                     }//end if session shopping cart == 0
                 }//end if isset
                 else { //if shopping cart is not set
                    echo('<h1 class="text-center my-3">Your cart is empty!</h1>');
                    echo('<div class="text-center py-3"><img src="Assets\images\cart\sad.png" class="img-fluid" style="max-width:17%;"></div>');
                    echo('<div class="text-center py-3"><a href="products.php" class="button button__round">SHOP NOW</a></div>');
                 }
                
            ?>
        </div>

           
        
        <footer class="my-5 pt-5 text-muted text-center text-small">
            <p class="mb-1">&copy; 2024 TMCP</p>
            <ul class="list-inline">
                <li class="list-inline-item"><a href="privacypolicy.php">Privacy</a></li>
                <li class="list-inline-item"><a href="termofuse.php">Terms</a></li>
                
            </ul>
        </footer>
       
    </body>
</html>

              

<?php
// Start session
include "./AdditionalPHP/startSession.php";
date_default_timezone_set('Asia/Manila');
 // Now, when you use the current date and time, it will be in Manila time.
 $createDate = date('Y-m-d H:i:s');
// Include database connection
include_once 'connection.php';

// Check if the user has completed a payment
if (isset($_SESSION['userID']) && isset($_SESSION['total_price']) && isset($_POST['address_checkout']) && isset($_POST['randx'])) {
    // Create a new order for the user
    $insertOrderQuery = "INSERT INTO userorder (userID, total, address, status, rc_num, createDate) 
                        VALUES (?, ?, ?, 'successful', ?, NOW())";

    $insertOrderStmt = mysqli_prepare($conn, $insertOrderQuery);
    mysqli_stmt_bind_param($insertOrderStmt, "idsi", $_SESSION['userID'], $_SESSION['total_price'], $_POST['address_checkout'], $_POST['randx']);
    
    if (mysqli_stmt_execute($insertOrderStmt)) {
        // Insert rc number
        $insertRcNumQuery = "INSERT INTO rc_number (rc_number, user_id, date_created) 
                            VALUES (?, ?, NOW())";
        
        $insertRcNumStmt = mysqli_prepare($conn, $insertRcNumQuery);
        mysqli_stmt_bind_param($insertRcNumStmt, "si", $_POST['randx'], $_SESSION['userID']);
        mysqli_stmt_execute($insertRcNumStmt);

        // Get the order ID
        $orderID = mysqli_insert_id($conn);

        // Insert order items
        $selectCartItemsQuery = "SELECT * FROM cartitem WHERE cartID = ?";
        $selectCartItemsStmt = mysqli_prepare($conn, $selectCartItemsQuery);
        mysqli_stmt_bind_param($selectCartItemsStmt, "i", $_SESSION['cartID']);
        mysqli_stmt_execute($selectCartItemsStmt);
        $cartItemsResult = mysqli_stmt_get_result($selectCartItemsStmt);

        $insertOrderItemQuery = "INSERT INTO orderitem (productID, orderID, paymentMethod, price, quantity, userID, statusx, randidx, datepickup, timepickup, cake_message) 
                            VALUES (?, ?, ?, ?, ?, ?, 'UNPAID', ?, ?, ?, ?)";
        $insertOrderItemStmt = mysqli_prepare($conn, $insertOrderItemQuery);

        while ($row = mysqli_fetch_assoc($cartItemsResult)) {
            mysqli_stmt_bind_param($insertOrderItemStmt, "iidsiissss", $row['productID'], $orderID, $_POST['paymentMethod'], $row['price'], $row['quantity'], $_SESSION['userID'], $_POST['randx'], $_POST['datepickup'], $_POST['timepickup'], $row['message_c']);
            mysqli_stmt_execute($insertOrderItemStmt);
        }

        // Insert transaction record
        $insertTransactionQuery = "INSERT INTO transaction (userID, orderID, paymentMethod, status, randidx, datepickup, timepickup, cake_message) 
                            VALUES (?, ?, ?, 'successful', ?, ?, ?, ?)";
        $insertTransactionStmt = mysqli_prepare($conn, $insertTransactionQuery);
        mysqli_stmt_bind_param($insertTransactionStmt, "ississs", $_SESSION['userID'], $orderID, $_POST['paymentMethod'], $_POST['randx'], $_POST['datepickup'], $_POST['timepickup'], $row['cake_message']);
        mysqli_stmt_execute($insertTransactionStmt);

        // Unset shopping cart session
        $_SESSION['shopping_cart'] = array();

        // Delete cart items after checkout
        $deleteCartItemsQuery = "DELETE FROM cartitem WHERE cartID = ?";
        $deleteCartItemsStmt = mysqli_prepare($conn, $deleteCartItemsQuery);
        mysqli_stmt_bind_param($deleteCartItemsStmt, "i", $_SESSION['cartID']);
        mysqli_stmt_execute($deleteCartItemsStmt);

        if (isset($_POST['datepickup']) && isset($_POST['timepickup'])) {
            $pickupDate = $_POST['datepickup'];
            $pickupTime = $_POST['timepickup'];
        
            // Combine date and time to create the event datetime
            $eventDatetime = $pickupDate . ' ' . $pickupTime;
$orderDetails = $fname . '' . $lname;
            // Check if $eventDatetime is a valid datetime
            if ($formattedDatetime = date("Y-m-d H:i:s", strtotime($eventDatetime))) {

                // Insert the event into the calendar database
                $eventName = "New order for " . $orderDetails; // Set an appropriate event name
                $eventDescription = "Pickup for " . $orderDetails . " - Receipt #" . $randidx; // Use order details for description
                $eventColor = "fc-bg-default"; // Set an appropriate color
                $eventIcon = "circle"; // Set an appropriate icon

                // Insert data into the calendar database
                $insertEventQuery = "INSERT INTO events (name, datetime_field, description, color, icon) VALUES (?, ?, ?, ?, ?)";
                $insertEventStmt = mysqli_prepare($conn, $insertEventQuery);
                mysqli_stmt_bind_param($insertEventStmt, "sssss", $eventName, $formattedDatetime, $eventDescription, $eventColor, $eventIcon);

                if (mysqli_stmt_execute($insertEventStmt)) {
                    // Event added successfully
                    // Provide feedback to the user or perform further processing
                   
                } else {
                    // Handle the error or display an error message
                    
                }
    
            } else {
                // Handle the case where $eventDatetime is not a valid datetime
                
            }
        }
    }
}

// Handle any further processing or redirection after checkout
?>
