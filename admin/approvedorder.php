

<?php include("includes/head.php") ?>
<?php include("includes/navbar.php") ?>
<?php include("includes/sidebar.php") ?>
<!--  Datatable start -->
<div class="main-container">
			<div class="pd-ltr-20 xs-pd-20-10">
				<div class="min-height-200px">
					<div class="page-header">
						<div class="row">
							<div class="col-md-6 col-sm-12">
								<div class="title">
									<h4>Approved list</h4>
								</div>
								<nav aria-label="breadcrumb" role="navigation">
									<ol class="breadcrumb">
										<li class="breadcrumb-item">
											<a href="index.php">Home</a>
										</li>
										<li class="breadcrumb-item active" aria-current="page">
                                        Approved list
										</li>
									</ol>
								</nav>
							</div>
                        </div>

					</div>
                    
                    <div class="card-box mb-30">
						<div class="pd-20">
							<h4 class="text-blue h4">Approved list</h4>
						</div>
						<div class="pb-20">
							<table class="table hover  data-table-export nowrap">
                        <thead>
                        <tr>
                                            <th>User ID</th>
                                                <th>Fullname</th>
                                                <th>Payment Method</th>
                                                <th>Receipt Number</th>
                                                <th>Status</th>
                                                <th>Date Order</th>
                                                <th>Total price</th>
                                            <th class="table-plus datatable-nosort">Action</th>
                  
                </tr>
              </thead>
              <tbody>
    <?php
     $sql = "SELECT *,
     CONCAT(u.fname, ' ', u.lname) AS fullname,
     t.randidx AS receiptNumber,
     t.paymentMethod AS transactionPaymentMethod,
     oi.price AS itemPrice,
     oi.quantity AS itemQuantity,
     (oi.price * oi.quantity) AS totalItemPrice
FROM user u
INNER JOIN transaction t ON u.userID = t.userID AND t.status='Approved'
INNER JOIN orderitem oi ON t.orderID = oi.orderID";
    $result = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        
    ?>
        <tr>
                                         <td><?php echo "".$row["userID"].""; ?></td>
                                         <td><?php echo "" . $row["fullname"] . ""; ?></td>
                                                    <td><?php echo "" . $row["transactionPaymentMethod"] . ""; ?></td>
                                                    <td><?php echo $row["receiptNumber"]; ?></td>

                                                    <td><?php echo "" . $row["statusx"] . ""; ?></td>
                                                    <td><?php echo "" . $row["createDate"] . ""; ?></td>
                                                    <td><?php echo $row["totalItemPrice"]; ?></td>
                                                    <td class="table-plus">
    <div class="table-actions">
        <form action="view_approved_order.php" method="POST">
            <input type="hidden" name="userid" value="<?php echo ''.$row["userID"].''; ?>">
            <input type="hidden" name="randidx" value="<?php echo ''.$row["randidx"].''; ?>">
            <input type="hidden" name="orderid" value="<?php echo ''.$row["orderID"].''; ?>">
            <input class="btn btn-info btn-sm" data-toggle="modal" type="submit" name="submit" value="View Order &nbsp;&nbsp;">
        </form>

        <form action="delete/delete_approved_order.php" method="POST">
            <input type="hidden" name="orderid" value="<?php echo $row["orderID"]; ?>">
            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this order?')">Delete</button>
        </form>
    </div>
</td>

        </tr>
    <?php
    }
    ?>
</tbody>

                        </table>
                    </div>
                </div>
                <!-- Export Datatable End -->

                <?php
                include("includes/script.php");
                ?>
          
            </div>
        </div>
    </div>
</div>
