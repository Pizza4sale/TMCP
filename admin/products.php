

<?php include("includes/head.php") ?>
<?php include("includes/navbar.php") ?>
<?php include("includes/sidebar.php") ?>

<!-- Export Datatable start -->
<div class="main-container">
			<div class="pd-ltr-20 xs-pd-20-10">
				<div class="min-height-200px">
					<div class="page-header">
						<div class="row">
							<div class="col-md-6 col-sm-12">
								<div class="title">
									<h4>Product Management</h4>
								</div>
								<nav aria-label="breadcrumb" role="navigation">
									<ol class="breadcrumb">
										<li class="breadcrumb-item">
											<a href="index.php">Home</a>
										</li>
										<li class="breadcrumb-item active" aria-current="page">
											Products
										</li>
									</ol>
								</nav>
							</div>
                        </div>

					</div>
                    
                    <div class="card-box mb-30">
						<div class="pd-20">
							<h4 class="text-blue h4">Product List</h4>
						</div>
						<div class="pb-20">
							<table class="data-table table stripe ">
                        <thead>
    <tr>
        <th>ID</th>
        <th>Product Name</th>
        <th>Description</th>
        <th>Stock</th>
        <th>Sell Price</th>
        <th>Action</th>
    </tr>
</thead>

<tbody>
    <?php
    $sql = "SELECT * FROM products";
    $result = mysqli_query($con, $sql);

    if (!$result) {
        die("Error executing query: " . mysqli_error($con));
    }

    while ($row = mysqli_fetch_assoc($result)) {
    ?>
        <tr>
            <td class="table-plus"><?php echo htmlspecialchars($row['productID']); ?></td>
            <td class="table-plus"><?php echo htmlspecialchars($row['p_name']); ?></td>
            <td class="table-plus"><?php echo htmlspecialchars($row['p_desc']); ?></td>
            <td class="table-plus"><?php echo htmlspecialchars($row['p_orig']); ?></td>
            <td class="table-plus"><?php echo htmlspecialchars($row['p_price']); ?></td>
            <td class="table-plus">
                <div class="dropdown">
                    <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                        <i class="dw dw-more"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                        <a class="dropdown-item">
                            <form action="edit_product.php" method="POST">
                                <input type="hidden" name="p_id" value="<?php echo htmlspecialchars($row["productID"]); ?>">
                                <input class="btn btn-info btn-sm" data-toggle="modal" type="submit" name="submit" value="Edit">
                            </form> 
                        </a>
                        <a class="dropdown-item" href='delete/delete_products.php?ID=<?php echo htmlspecialchars($row["productID"]); ?>' onclick="return confirm('Are you sure you want to delete this product?');">
                            <i class="dw dw-delete-3"></i> Delete
                        </a>
                    </div>
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
