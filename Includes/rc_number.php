<?php include "./AdditionalPHP/checkAccess.php"; ?>
<?php include "./AdditionalPHP/updateProfile.php"; ?>
<div class="map">
     

    <!DOCTYPE html>
<html lang="en">
<head>
 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

	<?php 
	  include "connection.php";
		  $uname = $_SESSION['uname'];
 $sql = "SELECT * FROM user WHERE uname='$uname'";
    $result= mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) === 1){
        $row = mysqli_fetch_assoc($result);
    }

    $uname1 = $row['userID'];

	?>

<div class="container">
  <h2>My Orders | <?php echo $_GET['rc_number']; ?></h2>      
  <h4 align="right"><a href="view_client_orders.php?rcnum=<?php echo $_GET['rc_number']; ?>"> View Orders </a></h4>             
  <table class="table">
    <thead>
      <tr>
        <th>Status</th>
        <th>Date and Time</th> 
      </tr>
    </thead>
    <tbody>

<?php include("db.php"); ?>
                                          <?php  
 

                                     $sql = "SELECT * FROM table_cart_info  
									 where rc_number = ".$_GET['rc_number']."  ";
                                    $result = mysqli_query($conn, $sql);  
                                    while($row = mysqli_fetch_assoc($result)) 
                                    {
                                       
                                ?>


      <tr>
        <td><?php echo $row["status"]; ?></td>
        <td><?php echo $row["date_create"]; ?></td>
       
      </tr> 

  <?php } ?>
    </tbody>
  </table>
</div>

</body>
</html>

</div>