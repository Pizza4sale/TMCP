<?php 
      define('Access', TRUE);
?>

<?php 
include("./includes/db.php");
    if(!isset($_SESSION))
    {
        session_start();
    }
    $sessionTimeout = 1800; // 30 minutes in seconds

// Check if the session variable for the last activity timestamp is set
if (isset($_SESSION['last_activity'])) {
    // Check if the user has been inactive for too long
    if (time() - $_SESSION['last_activity'] > $sessionTimeout) {
        // Expire the session and redirect to login or perform other actions
        session_unset();
        session_destroy();
        header("Location: login.php"); // Replace with your login page
        exit();
    }
}

// Update the last activity timestamp in the session
$_SESSION['last_activity'] = time();

// Your code goes here...

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en-MU">
    <head>
        <meta charset="utf-8">
        <title>TMCP </title>
        <link rel="icon" type="image/png" href="Assets\images\1.index\logo.png">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--CSS File-->
        <link rel="stylesheet" type="text/css" href="Common.css">
        <link rel="stylesheet" type="text/css" href="Account.css">
        <link rel="stylesheet" type="text/css" href="Atish.css">
        <link rel="stylesheet" type="text/css" href="Sanjana.css">
        <!-- Font Awesome -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js" crossorigin="anonymous"></script>
        <!--BOXICONS-->
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <!-- Animate CSS -->
        <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
        <script src="Javascript/swapWaveImg.js"></script>
<script src = "Javascript/countdown_sales.js"></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>

    </head>