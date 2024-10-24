<?php
 
 include(__DIR__ . '/../includes/db.php');

if(isset($_POST['submit']))
{

     $orderid = $_POST['orderid'];
     $userID = $_POST['userID'];
     $randidx = $_POST['randidx']; 
     $paymentmethod = $_POST["paymentmethod"];

     if($paymentmethod=="COD")
     {
            $sql = "UPDATE orderitem SET status='2',statusx='TO_RECEIVED' 
    WHERE orderID =$orderid and userID  =$userID and randidx = $randidx" ; 
                    $retval = mysqli_query($con,$sql);
                    if(! $retval )
                    {
                        die('Could not enter data: ' . mysql_error());
                    }



     }
     else
     {
         $sql = "UPDATE orderitem SET status='2',statusx='TO_PICKUP' 
    WHERE orderID =$orderid and userID  =$userID and randidx = $randidx" ; 
                    $retval = mysqli_query($con,$sql);
                    if(! $retval )
                    {
                        die('Could not enter data: ' . mysql_error());
                    }
     }




        $query = "INSERT INTO table_cart_info (user_id,status,rc_number,date_create) VALUES ('$userID','TO RELEASE','$randidx',NOW())";
        $query_run = mysqli_query($con, $query);
 
 

 $sql = "UPDATE transaction SET statusx='2' 
    WHERE orderID =$orderid and randidx = $randidx"  ; 
                    $retval = mysqli_query($con,$sql);
                    if(! $retval )
                    {
                        die('Could not enter data: ' . mysql_error());
                    }
 
 
     ?>

        <script>
         alert('Successfully Released Order');  
        window.location.href='../approvedorder.php'; 
    </script>

     <?php
 
}
 
?>