<?php
 
 include(__DIR__ . '/../includes/db.php'); 
 

     $ID = $_GET['ID']; 
 

 $sql = "UPDATE contact_us_message SET status='CLOSED' 
    WHERE id =$ID "  ; 
                    $retval = mysqli_query($con,$sql);
                    if(! $retval )
                    {
                        die('Could not enter data: ' . mysql_error());
                    }
                    $ID = $_GET['ID']; 
 

                   
                    
                    
 
     ?>

 
        <script>
         alert('Successfully Closed Feedback');  
        window.location.href='../feedback.php'; 
    </script>
 