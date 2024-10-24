<?php 
    include "connection.php";

    if(isset($_GET['vkey'])){
        // Process Verification
        $vkey = $_GET['vkey'];

        $sql = "SELECT verified,vkey FROM user WHERE verified = 0 AND vkey = '$vkey' LIMIT 1";

        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) === 1){
            // Validate Email
            $update = "UPDATE user SET verified = 1 WHERE vkey = '$vkey' LIMIT 1";

            if(mysqli_query($conn, $update)) {
                // Account verified successfully
                define('Access', TRUE);
                include "accountVerifiedPage.php";
                exit(); // Exit to prevent further processing
            } else {
                echo "Error updating user's verified status: " . mysqli_error($conn);
                exit(); // Exit on error
            }
        } else {
            $sql = "SELECT verified,vkey FROM user WHERE verified = 1 AND vkey = '$vkey' LIMIT 1";
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result) === 1){
                // Account already verified
                define('Access', TRUE);
                include "accountVerifiedPage.php";
                exit(); // Exit to prevent further processing
            } else {
                // Invalid verification link
                define('Access', TRUE);
                setcookie("verifiedEmailCookie", "emailInvalid", time()+(3600*24*2));
                include "accountInvalidPage.php";
                exit(); // Exit to prevent further processing
            }
        }

    } else {
        die("Something went wrong!");
    }
?>
