<?php
 
 include(__DIR__ . '/../includes/db.php'); 

 
     
     $ID = $_GET['ID'];
     
 


       $sql = "UPDATE user SET verified = 1  WHERE userID =".$ID."";
                    $retval = mysqli_query($con,$sql);
                    if(! $retval )
                    {

                     } 
                     ?>

                      <script>
         alert('Successfully Saved');
    window.location.href='../user.php'; 
        
    </script>

                     <?php
     
     
 

          
        ?>
         <script>
          alert('Successfully Update');
          window.location.href='../user.php';     
         </script>
 