<?php
include("includes/db.php");

// Helper function to execute SQL queries securely
function executeQuery($con, $sql, $params = [], $types = "") {
    $stmt = $con->prepare($sql);

    // Bind parameters if any
    if (!empty($params) && !empty($types)) {
        $stmt->bind_param($types, ...$params);
    }

    // Execute the statement and handle errors
    if (!$stmt->execute()) {
        return ['error' => $stmt->error];
    }

    // Get the result set
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
}

// Function to fetch new user registrations today
function getNewUserRegistrationsToday($con) {
    $today = date('Y-m-d');
    $sql = "SELECT fname, email FROM user WHERE DATE(createDate) = ?";
    
    // Execute query using prepared statement
    $newUsers = executeQuery($con, $sql, [$today], "s");

    return $newUsers;
}

// Function to fetch new orders created today
function getNewOrdersToday($con) {
    $today = date('Y-m-d');
    $sql = "SELECT randidx, productID, price, quantity FROM orderitem WHERE status = 0 AND DATE(createDate) = ?";
    
    // Execute query using prepared statement
    $newOrders = executeQuery($con, $sql, [$today], "s");

    return $newOrders;
}

// Fetch both types of notifications
$newUsers = getNewUserRegistrationsToday($con);
$newOrders = getNewOrdersToday($con);

// Handle potential query errors
if (isset($newUsers['error'])) {
    echo json_encode(['error' => $newUsers['error']]);
    exit();
}

if (isset($newOrders['error'])) {
    echo json_encode(['error' => $newOrders['error']]);
    exit();
}

// Prepare the response data
$response = [
    'newUserCount' => count($newUsers),
    'newUsers' => $newUsers,
    'newOrderCount' => count($newOrders),
    'newOrders' => $newOrders,
];

// Return the JSON response
echo json_encode($response);

// Close the database connection
$con->close();
?>
