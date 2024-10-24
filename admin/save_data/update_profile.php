<?php
session_start();
include("../includes/db.php");

$uname = isset($_POST['username']) ? mysqli_real_escape_string($con, $_POST['username']) : '';

if (isset($_POST['update_profile'])) {
    // Existing code for updating other profile information...

    if ($_FILES['profile_photo']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = "../profile/";
        $uploadFile = $uploadDir . basename($_FILES['profile_photo']['name']);

        // Validate file type, size, etc. before moving it
        // Implement proper file type and size checks here...

        if (move_uploaded_file($_FILES['profile_photo']['tmp_name'], $uploadFile)) {
            $photoFilename = basename($_FILES['profile_photo']['name']);

            // Use prepared statement to prevent SQL injection
            $updatePhotoSQL = "UPDATE user SET profile_photo=? WHERE uname=?";
            $stmt = mysqli_prepare($con, $updatePhotoSQL);
            mysqli_stmt_bind_param($stmt, "ss", $photoFilename, $uname);

            
                // Uncomment the line below if you want to redirect after the update
                //
                
                header("Location: ../account.php");
                // exit();
               // Debugging: Echo the SQL query
            echo "SQL Query: $updatePhotoSQL<br>";

            if (mysqli_stmt_execute($stmt)) {
                echo 'Profile photo updated successfully.<br>';
            } else {
                echo 'Error updating profile photo in the database: ' . mysqli_error($con) . '<br>';
            }

            mysqli_stmt_close($stmt);
        } else {
            echo 'Error uploading file.<br>';
        }
    } else {
        echo 'No file uploaded or upload error.<br>';
    }
}
?>
