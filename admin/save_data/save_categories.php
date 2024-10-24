<?php
 
 include(__DIR__ . '/../includes/db.php');

if(isset($_POST['submit']))
{

     
     $categoryname = $_POST['categoryname'];
     $description = $_POST['description']; 
    
               
        $query = "INSERT INTO categories(p_cat_name,p_cat_desc) VALUES ('$categoryname','$description')";
        $query_run = mysqli_query($con, $query);
     
    if($query_run)
    {
        ?>
         <script>
         alert('Successfully Saved');
    window.location.href='../categories.php'; 
        
    </script>


        <?php
    }
    else
    {

        ?>
 <script>
         alert('Not Successfully Send');

         window.location.href='../category.php id=<?php echo $id ?>&user=<?php echo $user ?>';
    </script>


        <?php
         
    }
}
?>