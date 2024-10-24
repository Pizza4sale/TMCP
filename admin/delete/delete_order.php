<?php
include(__DIR__ . '/../includes/db.php');

// Ensure $con is defined and not null
if ($con) {
    // Rest of your code here
} else {
    die("Connection to the database failed");
}

if (isset($_POST['delete']) && isset($_POST['orderid'])) {
    $orderid = mysqli_real_escape_string($con, $_POST['orderid']);

    $deleteQuery = "DELETE FROM transaction WHERE orderID = '$orderid'";
    $result = mysqli_query($con, $deleteQuery);

    if ($result) {
        // Successfully deleted
        echo '<script>alert("Successfully Deleted"); window.location.href="../orderlist.php";</script>';
    } else {
        // Error during deletion
        echo '<script>alert("Error deleting order. Please try again later."); window.location.href="../orderlist.php";</script>';
    }

    exit();
}
?>
