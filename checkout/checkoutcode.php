<?php
// START SESSION
include "./AdditionalPHP/startSession.php";

// CONNECTION TO DATABASE: TMCP
include_once 'connection.php';

// Check if the user is logged in and has items in their shopping cart
if (isset($_SESSION['userID']) && isset($_SESSION['shopping_cart']) && !empty($_SESSION['shopping_cart'])) {
    // Create an order ID for the user
    $randx = $_POST['randx'];
    $userID = $_SESSION['userID'];
    $totalPrice = $_SESSION['total_price'];
    $address = $_POST['address_checkout'];

    $conn->autocommit(FALSE);

    try {
        // Add data to userorder
        $insertUserOrder = $conn->prepare('INSERT INTO userorder (userID, total, address, status, rc_num, createDate) VALUES (?, ?, ?, "successful", ?, NOW())');
        $insertUserOrder->bind_param('idsi', $userID, $totalPrice, $address, $randx);
        $insertUserOrder->execute();

        // Add the random code to rc_number
        $insertRcNumber = $conn->prepare('INSERT INTO rc_number (rc_number, user_id, date_created) VALUES (?, ?, NOW())');
        $insertRcNumber->bind_param('si', $randx, $userID);
        $insertRcNumber->execute();

        // Select order ID
        $selectOrderID = $conn->prepare('SELECT orderID FROM userorder WHERE userID = ?');
        $selectOrderID->bind_param('i', $userID);
        $selectOrderID->execute();
        $selectOrderID->bind_result($orderID);
        $selectOrderID->fetch();
        $selectOrderID->close();

        // Loop through each cart item
        foreach ($_SESSION['shopping_cart'] as $product) {
            $productID = $product['productID'];
            $paymentMethod = $_POST['paymentMethod'];
            $price = $product['price'];
            $quantity = $product['quantity'];
            $datepickup = $_POST['datepickup'];
            $timepickup = $_POST['timepickup'];
            $message_c = $product['message_c'];

            // Insert order item
            $insertOrderItem = $conn->prepare('INSERT INTO orderitem (productID, orderID, paymentMethod, price, quantity, userID, statusx, randidx, datepickup, timepickup, cake_message) VALUES (?, ?, ?, ?, ?, ?, "UNPAID", ?, ?, ?, ?)');
            $insertOrderItem->bind_param('iisdiiisss', $productID, $orderID, $paymentMethod, $price, $quantity, $userID, $randx, $datepickup, $timepickup, $message_c);
            $insertOrderItem->execute();
        }

        // Insert into transaction
        $insertTransaction = $conn->prepare('INSERT INTO transaction (userID, orderID, paymentMethod, status, randidx, datepickup, timepickup, cake_message) VALUES (?, ?, ?, "successful", ?, ?, ?, ?)');
        $insertTransaction->bind_param('iisssss', $userID, $orderID, $paymentMethod, $randx, $datepickup, $timepickup, $message_c);
        $insertTransaction->execute();

        // Commit the transaction
        $conn->commit();

        // Unset shopping cart session
        unset($_SESSION['shopping_cart']);

        // Delete cart items
        $deleteCartItems = $conn->prepare('DELETE FROM cartitem WHERE cartID = ?');
        $deleteCartItems->bind_param('i', $_SESSION['cartID']);
        $deleteCartItems->execute();

        $conn->close();
    } catch (Exception $e) {
        $conn->rollback();
        $conn->close();
        // Handle the error appropriately (e.g., log it or display an error message)
        // Redirect the user to an error page
    }
} else {
    // Handle the case when the user is not logged in or the shopping cart is empty
    // Redirect the user to an appropriate page
}
?>

<!-- Container for UPLOAD PROOF OF PAYMENT -->
<div id="proofOfPaymentContainer" class="input-group mb-3" style="display: none;">
    <label class="input-group-text" for="inputGroupFile01">UPLOAD PROOF OF PAYMENT</label>
    <input type="file" name="pic" class="form-control" id="inputGroupFile01">
</div>