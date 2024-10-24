<?php
 
 include(__DIR__ . '/../includes/db.php'); 

if(isset($_POST['submit']))
{

     $id = $_POST['id']; 
     $inquire = $_POST['inquire']; 
     $mymessage = $_POST['mymessage'];   
  
 $sql = "UPDATE chatbot SET queries='".$inquire."' , replies='".$mymessage."'  WHERE id =".$id."";
                    $retval = mysqli_query($con,$sql);
                    if(! $retval )
                    {
                        die('Could not enter data: ' . mysql_error());
                    }
 
 
     ?>

        <script> 
              alert('Successfully Update');
    window.location.href='../chatbot.php';
         </script>

     <?php
 
}
 
?>