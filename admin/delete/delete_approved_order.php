<?php
// delete/delete_approved_order.php

include(__DIR__ . '/../includes/db.php');

// Ensure $con is defined and not null
if ($con) {
    // Rest of your code here
} else {
    die("Connection to the database failed");
}
    if (isset($_POST['orderid'])) {
        $orderid = mysqli_real_escape_string($con, $_POST['orderid']);

        $deleteQuery = "DELETE FROM orderitem WHERE orderID = '$orderid'";
        $result = mysqli_query($con, $deleteQuery);

        if ($result) {
            // Successfully deleted
            echo '<script>alert("Successfully Deleted"); window.location.href="../approvedorder.php";</script>';
        } else {
            // Error during deletion
            echo '<script>alert("Error deleting order. Please try again later."); window.location.href="../approvedorder.php";</script>';
        }
    
        exit();
    }
    ?>
