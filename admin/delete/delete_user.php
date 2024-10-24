
<?php 
include(__DIR__ . '/../includes/db.php'); 
$del = $_GET['ID'];
$sql=mysqli_query($con,"select * from user where userID='$del'");  
mysqli_query($con,"delete from user where userID='$del'");


?>

  <script>
        alert('Successfully Deleted');
     window.location.href='../user.php';
    </script>

