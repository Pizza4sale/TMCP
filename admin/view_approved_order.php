<?php

include("includes/db.php");
$sql = "select *,concat(fname,' ',lname) as fullname  from user 
where userID = ".$_POST['userid']." ";
$result = mysqli_query($con, $sql);  
while($row = mysqli_fetch_assoc($result)) 
{
   $fullname = $row["fullname"];
   $address = $row["address"];
    $phone = $row["phone"];
     $email = $row["email"];

 }
 $sql = "select *  from  transaction 
 where orderID = ".$_POST['orderid']." ";
$result = mysqli_query($con, $sql);  
while($row = mysqli_fetch_assoc($result)) 
{
 $paymentmethod = $row["paymentMethod"];
 $status = $row["status"]; 
 $createDate = $row["createDate"];
 $randx = $row["randidx"];
 $pickupdate = $row["datepickup"];
 $pickuptime = $row["timepickup"];
 
}



?>

<?php include("includes/head.php") ?>
<?php include("includes/navbar.php") ?>
<?php include("includes/sidebar.php") ?>
<div class="main-container">
			<div class="pd-ltr-20 xs-pd-20-10">
				<div class="min-height-200px">
					<div class="page-header">
						<div class="row">
							<div class="col-md-6 col-sm-12">
								
							</div>
                        </div>
<div class="invoice-wrap">
						<div class="invoice-box">
							<div class="invoice-header">
								<div class="logo text-center">
                                <i class="icon-copy dw dw-invoice"></i> TMCP
								</div>
							</div>
							<h4 class="text-center mb-30 weight-600">INVOICE</h4>
							<div class="row pb-30">
								<div class="col-md-6">
									<h5 class="mb-15"><?php echo "".$fullname.""; ?></h5>
									<p class="font-14 mb-5">
										Date Issued: <strong class="weight-600"><?php echo date("m-d-Y"); ?></strong>
									</p>
                                    <p class="font-14 mb-5">
										Payment Method: <strong class="weight-600"></b> <?php echo "".$paymentmethod.""; ?></strong>
									</p>
                                    <p class="font-14 mb-5">
                                    Pick up date: <strong class="weight-600"></b> <?php echo "".$pickupdate.""; ?></strong>
									</p>
                                    <p class="font-14 mb-5">
                                    Pick up time: <strong class="weight-600"></b> <?php echo "".$pickuptime.""; ?></strong>
									</p>
								</div>
								<div class="col-md-6">
									<div class="text-right">
                                    <p class="font-14 mb-5">
										Order date: <strong class="weight-600"></b> <?php echo "".$createDate.""; ?></strong>
									</p>
                                    <p class="font-14 mb-5">
										Invoice No: <strong class="weight-600"><?php echo "".$randx.""; ?></strong>
									</p>
										<p class="font-14 mb-5"><?php echo "".$phone.""; ?></p>
										<p class="font-14 mb-5"><?php echo "".$email.""; ?></p>
                                        <p class="font-14 mb-5"><?php echo "".$address.""; ?></p>
									</div>
								</div>
							</div>
							<div class="pb-20">
    <table id="invoiceTable" class="table">
        <thead>
            <tr>
                <th>Qty</th>
                <th>Image</th>
                <th>Details</th>
                <th>Total Price</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $totalPrice = 0;
        $totalQuantity = 0;
        $Quantity = 0; // If used elsewhere
            $sql = "SELECT p_img as p_img, orderitem.quantity as quantity, products.p_desc as p_desc,
                orderitem.statusx as trn, orderitem.cake_message as cms, products.p_price as price
                FROM products
                INNER JOIN orderitem ON orderitem.productID = products.productID
                WHERE orderitem.randidx = " . $_POST['randidx'] . " AND orderitem.orderID = " . $_POST['orderid'];
            $result = mysqli_query($con, $sql);

            while ($row = mysqli_fetch_assoc($result)) {
                $payprice = sprintf('%0.2f', $row["price"]);
                $trn = $row["trn"];
                $totalPrice += ($row["quantity"] * $row["price"]);
                $totalQuantity += $row["quantity"];
                $Quantity = $row["quantity"];
                $img = $row["p_img"];
                $cms = $row["cms"];
                $p_desc = $row["p_desc"];

                // Output information for each product
                echo '<tr>';
                echo '<td>' . $row["quantity"] . '</td>';
                echo '<td><img src="../' . $row["p_img"] . '" width="100px" height="100px"></td>';
                echo '<td>' . $row["p_desc"] . '<br><b>' . $row["cms"] . '</b></td>';
                echo '<td class="weight-600">' . $payprice . '</td>';
                echo '</tr>';
            }
        ?>
                <td colspan="3"><b>QTY: <?php echo $totalQuantity; ?></b></td>
                <td><b>TOTAL PAYMENT: <?php echo sprintf('%0.2f', $totalPrice); ?></b></td>
            </tr>
        </tbody>
    </table>
</div>
<?php  

$sql = "SELECT * from orderitem where randidx = ".$_POST['randidx']." ";
                             $result = mysqli_query($con, $sql);  
                             while($row = mysqli_fetch_assoc($result)) 
                             {
                                $trn = $row["statusx"];
                             }
                               ?>

     <?php 


     if($trn=='PAID'){
       ?>

        <h4>
              This Order Item is Already Released and PAID!
           
           </h4>
       <?php 

     } else {?>

       <!-- this row will not appear when printing -->
       <div class="row no-print">
         <div class="col-12">
                
             <input onclick="window.print()" class="btn btn-success float-right" type="submit" name="submit" value="Print Copy">  
               <form action="save_data/update_order_id.php" method="POST"> 

                 <input type="hidden" name="orderid" value="<?php  echo $_POST['orderid'];?>">
                  <input type="hidden" name="randidx" value="<?php  echo $_POST['randidx'];?>">
                  <input type="hidden" name="userID" value="<?php  echo $_POST['userid'];?>"> 
                   <input type="hidden" name="paymentmethod" value="<?php echo ''.$paymentmethod.'' ?>">
                <input   class="btn btn-info float-right" type="submit" name="submit" value=" Ready to pick up"> 
               </form>


               <form action="save_data/update_order_release.php" method="POST">
                  <input type="hidden" name="paymentmethod" value="<?php echo ''.$paymentmethod.'' ?>">
                 <input type="hidden" name="orderid" value="<?php  echo $_POST['orderid'];?>">
                  <input type="hidden" name="randidx" value="<?php  echo $_POST['randidx'];?>">
                  <input type="hidden" name="userID" value="<?php  echo $_POST['userid'];?>">
                <input   class="btn btn-warning float-right" type="submit" name="submit" value="Release"> 
               </form>
         </div>


       </div>
       <?php 
         }

       ?>

                    

<?php
                include("includes/script.php");
                ?>