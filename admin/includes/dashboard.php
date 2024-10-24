<?php


// Function to safely execute a prepared statement
function executePreparedStatement($conn, $sql, $params) {
    if ($conn === null) {
        die("Database connection is not available.");
    }

    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt === false) {
        die("Failed to prepare statement: " . mysqli_error($conn));
    }

    if (!empty($params)) {
        mysqli_stmt_bind_param($stmt, ...$params);
    }

    if (mysqli_stmt_execute($stmt)) {
        $result = mysqli_stmt_get_result($stmt);
        mysqli_stmt_close($stmt);
        return $result;
    } else {
        die("Query execution failed: " . mysqli_error($conn));
    }
}

// Function to count files in a directory
function countFilesInDirectory($directory) {
    $fileCount = 0;
    $files = scandir($directory);
    
    foreach ($files as $file) {
        if (is_file($directory . DIRECTORY_SEPARATOR . $file)) {
            $fileCount++;
        }
    }

    return $fileCount;
}

// Set the path to your images folder
$imagesFolder = "uploads/";

// Get total image count from the folder
$imageCount = countFilesInDirectory($imagesFolder);
// Function to fetch a single row result from the query
function fetchSingleRow($result) {
    return mysqli_fetch_assoc($result);
}

try {
    // Get total user count
    $sql = "SELECT COUNT(*) AS cc FROM user";
    $result = executePreparedStatement($con, $sql, []);

    $row = fetchSingleRow($result);
    $cc = $row["cc"];

    // Get total order count
    $sql = "SELECT COUNT(*) AS cc FROM orderitem";
    $result = executePreparedStatement($con, $sql, []);

    $row = fetchSingleRow($result);
    $tcc = $row["cc"];

    // Get total sales for paid orders
$sql = "SELECT SUM(price * quantity) AS pcc FROM orderitem WHERE statusx = 'paid'";
$result = executePreparedStatement($con, $sql, []);

$row = fetchSingleRow($result);
$ptcc = $row["pcc"];


    // Get total product count
    $sql = "SELECT COUNT(*) AS product_count FROM products";
    $result = executePreparedStatement($con, $sql, []);

    $row = fetchSingleRow($result);
    $productCount = $row["product_count"];

  // Get approved order count
$sql = "SELECT COUNT(*) AS ss FROM transaction WHERE status = 'approved'";
$result = executePreparedStatement($con, $sql, []);

$row = fetchSingleRow($result);
$ss = $row["ss"];


    // Get daily sales for paid orders
$sql = "SELECT SUM(price * quantity) AS daily_sales FROM orderitem WHERE DATE(createDate) = CURDATE() AND statusx = 'paid'";
$result = executePreparedStatement($con, $sql, []);

$row = fetchSingleRow($result);
$dailySales = $row["daily_sales"];


    // Get daily total order count
    $sql = "SELECT COUNT(*) AS daily_orders FROM orderitem WHERE DATE(createDate) = CURDATE()";
    $result = executePreparedStatement($con, $sql, []);

    $row = fetchSingleRow($result);
    $dailyOrders = $row["daily_orders"];

    // Get daily new user count
    $sql = "SELECT COUNT(*) AS cc FROM user WHERE DATE(createDate) = CURDATE()";
    $result = executePreparedStatement($con, $sql, []);

    $row = fetchSingleRow($result);
    $dailyNewUsers = $row["cc"];

   // Get User feedback
$sql = "SELECT COUNT(*) AS feedback_count FROM contact_us_message";
$result = executePreparedStatement($con, $sql, []);

$row = fetchSingleRow($result);
$feedbackCount = $row["feedback_count"];

} catch (Exception $e) {
    // Handle any exceptions or errors here
    die("Error: " . $e->getMessage());
}



// Format the sales amounts to currency format
$ptccFormatted = isset($ptcc) ? number_format($ptcc, 2) : '0.00';
$dailySalesFormatted = isset($dailySales) ? number_format($dailySales, 2) : '0.00';
?>
