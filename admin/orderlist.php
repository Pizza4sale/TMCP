

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
									<h4>Order list</h4>
								</div>
								<nav aria-label="breadcrumb" role="navigation">
									<ol class="breadcrumb">
										<li class="breadcrumb-item">
											<a href="index.php">Home</a>
										</li>
										<li class="breadcrumb-item active" aria-current="page">
                                        Order list
										</li>
									</ol>
								</nav>
							</div>
                        </div>

					</div>
                    
                    <div class="card-box mb-30">
						<div class="pd-20">
							<h4 class="text-blue h4">Order list</h4>
						</div>
						<div class="pb-20">
							<table class="data-table table stripe hover nowrap">
                        <thead>
                        <tr>
                                            <th>User ID</th> 
                                            <th>Fullname</th>
                                            <th>Payment Method</th>

                                           <th>Receipt Number</th>
                                            <th>Status</th>
                                            <th>Date Order</th> 
                                            <th class="table-plus datatable-nosort">Action</th>
                  
                </tr>
              </thead>
              <tbody>
              <?php
$sql = "SELECT *, CONCAT(fname,' ',lname) AS fullname
        FROM user  
        INNER JOIN transaction
        ON user.userID = transaction.userID
        WHERE statusx = 0";

// Execute the query
$result = mysqli_query($con, $sql);

// Check if the query executed successfully
if (!$result) {
    die("Error executing query: " . mysqli_error($con));
}

// Fetch and display the results
while ($row = mysqli_fetch_assoc($result)) {
?>
    <tr>
        <td><?php echo htmlspecialchars($row["userID"]); ?></td>
        <td><?php echo htmlspecialchars($row["fullname"]); ?></td>
        <td><?php echo htmlspecialchars($row["paymentMethod"]); ?></td>
        <td><?php echo htmlspecialchars($row["randidx"]); ?></td>
        <td><?php echo htmlspecialchars($row["status"]); ?></td>
        <td><?php echo htmlspecialchars($row["createDate"]); ?></td>
        <td class="table-plus">
            <div class="table-actions">
                <form action="view_order.php" method="POST">
                    <input type="hidden" name="userid" value="<?php echo htmlspecialchars($row["userID"]); ?>">
                    <input type="hidden" name="randidx" value="<?php echo htmlspecialchars($row["randidx"]); ?>">
                    <input type="hidden" name="orderid" value="<?php echo htmlspecialchars($row["orderID"]); ?>">
                    <input class="btn btn-info btn-sm" type="submit" name="submit" value="View Order">
                </form>
                <form action="delete/delete_order.php" method="POST" onsubmit="return confirm('Are you sure you want to delete this order?');">
                    <input type="hidden" name="orderid" value="<?php echo htmlspecialchars($row["orderID"]); ?>">
                    <button type="submit" class="btn btn-danger btn-sm" name="delete">Delete</button>
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
