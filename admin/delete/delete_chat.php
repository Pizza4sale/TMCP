
<?php 
include(__DIR__ . '/../includes/db.php'); 
$del = $_GET['id'];
$sql=mysqli_query($con,"select * from  chatbot where id='$del'"); 
mysqli_query($con,"delete from  chatbot where id='$del'");

?>

  <script>
        alert('Successfully Deleted');
     window.location.href='../chatbot.php';
    </script>