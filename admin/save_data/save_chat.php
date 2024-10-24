<?php
include(__DIR__ . '/../includes/db.php');

if (isset($_POST['submit'])) {
    $inquire = $_POST['inquire'];
    $mymessage = $_POST['mymessage'];

    // Escape special characters to prevent SQL injection
    $inquire = mysqli_real_escape_string($con, $inquire);
    $mymessage = mysqli_real_escape_string($con, $mymessage);

    $query = "INSERT INTO chatbot (queries, replies) VALUES ('$inquire', '$mymessage')";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        ?>
        <script>
            alert('Successfully Saved');
            window.location.href = '../chatbot.php';
        </script>
        <?php
    } else {
        ?>
        <script>
            alert('Not Successfully Saved');
            window.location.href = '../chatbot.php';
        </script>
        <?php
    }
}
?>
