<?php
include(__DIR__ . '/../includes/db.php');

// Check if categoryID is set in the URL
if (isset($_GET['categoryID'])) {
    $del = $_GET['categoryID'];

    // Use prepared statement to prevent SQL injection
    $stmt = mysqli_prepare($con, "SELECT * FROM categories WHERE categoryID = ?");
    mysqli_stmt_bind_param($stmt, 'i', $del);
    mysqli_stmt_execute($stmt);

    // Check for errors and fetch the result
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        // Category found, proceed with deletion

        // Use prepared statement for deletion
        $deleteStmt = mysqli_prepare($con, "DELETE FROM categories WHERE categoryID = ?");
        mysqli_stmt_bind_param($deleteStmt, 'i', $del);

        // Check if deletion is successful
        if (mysqli_stmt_execute($deleteStmt)) {
            // Successfully deleted
            echo '<script>alert("Category \'' . $row['categoryName'] . '\' has been successfully deleted."); window.location.href="../categories.php";</script>';
        } else {
            // Error during deletion
            echo '<script>alert("Error deleting category. ' . mysqli_error($con) . '"); window.location.href="../categories.php";</script>';
        }

        mysqli_stmt_close($deleteStmt);
    } else {
        // Category not found
        echo '<script>alert("Category not found."); window.location.href="../categories.php";</script>';
    }

    mysqli_stmt_close($stmt);
} else {
    // categoryID not set in the URL
    echo '<script>alert("Invalid request."); window.location.href="../categories.php";</script>';
}

mysqli_close($con);
?>
