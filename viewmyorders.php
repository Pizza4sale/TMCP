<?php
define('Access', TRUE);
include "./AdditionalPHP/startSession.php";
?>

<style>
    
    .table {
        width: 100%;
        border-collapse: collapse;
    }
    .table th,
    .table td {
        padding: 8px;
        border: 1px solid #ccc;
    }
    .product-image {
        width: 100px;
        height: 100px;
      
    }
</style>


<!DOCTYPE html>
<html lang="en-MU">
<head>
    <meta charset="utf-8">
    <title>TMCP | Order History</title>
    <link rel="icon" type="image/png" href="Assets\images\1.index\logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--CSS File-->
    <link rel="stylesheet" type="text/css" href="Common.css">
    <link rel="stylesheet" type="text/css" href="Atish.css">
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/0e16635bd7.js" crossorigin="anonymous"></script>
    <!--BOXICONS-->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <!-- Animate CSS -->
    <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
</head>

<body>
    

    <!-- Start Navigation Bars (Mobile and Desktop) -->
    <?php include './Includes/MobileNavBar.php';?>
    <?php include './Includes/PcNavBar.php';?>
    <!-- End Navigation Bars -->

    <?php 
    include "connection.php";
    include "./AdditionalPHP/startSession.php";

    // Check if the "uname" key exists in the session
    if (isset($_SESSION['uname'])) {
        $uname = $_SESSION['uname'];
        $sql = "SELECT * FROM user WHERE uname=?";
        $stmt = mysqli_prepare($conn, $sql);

        // Check if the prepared statement was successfully created
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "s", $uname);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            // Check if there's a matching row
            if (mysqli_num_rows($result) === 1) {
                $row = mysqli_fetch_assoc($result);
                $uname1 = $row['userID'];

                // Proceed with fetching order history using prepared statement
                $sql = "SELECT p_img, orderitem.quantity, products.p_desc, orderitem.statusx as trn, products.p_price, orderitem.createDate, orderitem.statusx
                        FROM products  
                        INNER JOIN orderitem
                        ON orderitem.productID = products.productID
                        WHERE orderitem.userID = ?";
                
                $stmt = mysqli_prepare($conn, $sql);

                // Check if the prepared statement was successfully created
                if ($stmt) {
                    mysqli_stmt_bind_param($stmt, "i", $uname1);
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);

                    // Check if the query was successful
                    if ($result) {
                        ?>
                        <div class="container" style="text-align: center; font-size: 30px;">
                            <h2>Order History</h2>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Qty</th>
                                        <th>Image</th>
                                        <th>Details</th> 
                                        <th>Order Date</th>
                                        <th>Status</th>
                                        <th>Total Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $totalQuantity = 0; // Initialize total quantity variable
                                    $totalPrice = 0; // Initialize total price variable
                                    while($row = mysqli_fetch_assoc($result)) { 
                                        $quantity = $row["quantity"];
                                        $unitPrice = $row["p_price"];
                                        $payprice = sprintf('%0.2f', $unitPrice * $quantity);
                                        $totalQuantity += $quantity; // Increment total quantity
                                        $totalPrice += $unitPrice * $quantity; // Calculate the total price
                                        $trn = $row["trn"];
                                        ?>
                                        <tr>
                                            <td><?php echo $quantity; ?></td>
                                            <td><?php echo "<img src='".$row['p_img']."' width='100px' height='100px'>"; ?></td>
                                            <td><?php echo $row["p_desc"]; ?></td>
                                            <td><?php echo $row["createDate"]; ?></td>
                                            <td><?php echo $row["statusx"]; ?></td>
                                            <td><?php echo $payprice; ?></td>
                                        </tr>
                                        <?php
                                    }
                                    $totalPrice = sprintf('%0.2f', $totalPrice); // Format the total price
                                    ?>
                                    <tr>
                                        <td colspan="3"><?php echo "<b>QTY: ".$totalQuantity."</b>"; ?></td>
                                        <td colspan="2"><b>TOTAL PAYMENT</b></td>
                                        <td><b><?php echo $totalPrice; ?></b></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <?php
                    } else {
                        echo "Error fetching order history: " . mysqli_error($conn);
                    }
                } else {
                    echo "Error in the second prepared statement: " . mysqli_error($conn);
                }
            } else {
                echo "User not found in the database.";
            }
        } else {
            echo "Error in the first prepared statement: " . mysqli_error($conn);
        }
    } else {
        echo "User is not logged in.";
    }
    ?>

    <!--Rest of the HTML as before-->

    <!--Start Footer-->
    <?php include './Includes/Footer.php';?>
    <!--End Footer-->

   
    <!-- Start Bottom Nav -->
    <?php include './Includes/MobileBottomNav.php';?>
    <!-- End Bottom Nav -->
</body>
</html>
