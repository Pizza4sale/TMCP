<?php
 
 include(__DIR__ . '/../includes/db.php');
if(isset($_POST['submit']))
{

     
     $orderid = $_POST['orderid'];
     $userid = $_POST['userid'];
     $randidx = $_POST['randidx']; 

 

       $sql = "UPDATE orderitem SET status = '1',statusx = 'RELEASING'   WHERE userID ='".$userid."' and randidx ='".$randidx."'   ";
                    $retval = mysqli_query($con,$sql);
                    if(! $retval )
                    {

                    } 


         $sql = "UPDATE userorder SET orderstatus = 'TO PREPARE'   WHERE userID ='".$userid."' and rc_num ='".$randidx."'   ";
                    $retval = mysqli_query($con,$sql);
                    if(! $retval )
                    {

                    } 


               
        $query = "INSERT INTO table_cart_info (user_id,status,rc_number,date_create) VALUES ('$userid','TO PREPARE','$randidx',NOW())";
        $query_run = mysqli_query($con, $query);

 
                    $sql1 = "UPDATE transaction SET statusx = '1',status='Approved'   WHERE userID ='".$userid."' and randidx ='".$randidx."'";
                    $retval1 = mysqli_query($con,$sql1);
                    if(!$retval1)
                    {

                    }



                    ?>

          

<?php
       
}
?>


                      <script>
         alert('Successfully Saved');  
        window.location.href='../orderlist.php'; 
    </script>