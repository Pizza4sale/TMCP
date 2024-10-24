<?php 
include(__DIR__ . '/../includes/db.php'); 
$del = $_GET['ID'];
$sql=mysqli_query($con,"select * from products where productID='$del'");  
mysqli_query($con,"delete from products where productID='$del'");


?>

  <script>
        alert('Successfully Deleted');
     window.location.href='../products.php';
    </script>