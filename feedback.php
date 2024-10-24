<?php
    // Check if the form is submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Retrieve the form data
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];

        // Perform any necessary validation or sanitization on the input data

        // Example: Store the feedback in a database
        // Assuming you have a database connection already established
        $sql = "INSERT INTO feedback (name, email, message) VALUES ('$name', '$email', '$message')";
        // Execute the SQL query

        // Example: Send an email notification
        $to = 'your-email@example.com';
        $subject = 'New Feedback Received';
        $emailBody = "Name: $name\nEmail: $email\nMessage: $message";
        // Use the mail() function or a library like PHPMailer to send the email

        // Redirect the user back to the contact page or a thank you page
        header('Location: contact.php?success=1');
        exit;
    }
?>
