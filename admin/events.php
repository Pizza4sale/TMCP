<?php
include("includes/db.php");

// Function to execute SQL query and return results
function fetchEvents($con) {
    $query = "SELECT id, name, datetime_field AS start, description, color, icon FROM events";
    
    // Use a prepared statement for added security (even though no user input is present)
    $stmt = $con->prepare($query);
    
    // Execute the query
    if (!$stmt->execute()) {
        return ['error' => $stmt->error];
    }

    // Get the result
    $result = $stmt->get_result();
    
    // Fetch events into an array
    $events = [];
    while ($row = $result->fetch_assoc()) {
        $events[] = $row;
    }

    return $events;
}

// Fetch events from the database
$events = fetchEvents($con);

// Handle query errors
if (isset($events['error'])) {
    http_response_code(500);  // Internal Server Error
    echo json_encode(['error' => $events['error']]);
    exit();
}

// Send the JSON response
header('Content-Type: application/json');
echo json_encode($events);

// Close the database connection
$con->close();
?>
