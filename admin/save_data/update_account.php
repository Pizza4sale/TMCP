<?php
session_start();
include(__DIR__ . '/../includes/db.php'); 
$uname = $_SESSION['uname'];

if (isset($_POST['update_profile'])) {
    $sql = "SELECT * FROM user WHERE uname='$uname'";
    $result = mysqli_query($con, $sql);

    if ($result && mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        $ID = $row['userID']; // Assuming userID is the primary key
        $uname = $row['uname'];
        $fname = $row['fname'];
        $lname = $row['lname'];
        $address = $row['address'];
        $phone = $row['phone'];
        $description = $row['description'];

        // Assuming you have form fields like $_POST['username'], $_POST['first_name'], etc.
        $USERNAME = mysqli_real_escape_string($con, $_POST['username']);
        $FNAME = mysqli_real_escape_string($con, $_POST['first_name']);
        $LNAME = mysqli_real_escape_string($con, $_POST['last_name']);
        $ADDRESS = mysqli_real_escape_string($con, $_POST['address']);
        $CONTACT_NUMBER = mysqli_real_escape_string($con, $_POST['contact_number']);
        $DESCRIPTION = mysqli_real_escape_string($con, $_POST['description']);

        // Validate and sanitize other form fields as needed

        // Check if a new password is provided
        if (!empty($_POST['password'])) {
            $PASSWORD = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $updateQuery = "UPDATE user SET uname='$USERNAME', fname='$FNAME', lname='$LNAME', address='$ADDRESS', phone='$CONTACT_NUMBER', description='$DESCRIPTION', pass='$PASSWORD' WHERE userID =$ID";
        } else {
            // If no new password provided, exclude it from the update
            $updateQuery = "UPDATE user SET uname='$USERNAME', fname='$FNAME', lname='$LNAME', address='$ADDRESS', phone='$CONTACT_NUMBER', description='$DESCRIPTION' WHERE userID =$ID";
        }

        $updateResult = mysqli_query($con, $updateQuery);

        if ($updateResult) {
            ?>
            <script>
                alert('Successfully Updated');
                window.location.href='../account.php';
            </script>
            <?php
        } else {
            echo "Error updating record: " . mysqli_error($con);
        }
    } else {
        echo "Error fetching user data.";
    }
} else {
    echo "Invalid request.";
}
?>
