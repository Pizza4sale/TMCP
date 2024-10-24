<?php include ("includes/head.php")?>
<?php include ("includes/navbar.php")?>
<?php include ("includes/sidebar.php")?>
<?php include ("includes/dashboard.php")?>
	<body>
	
		<div class="mobile-menu-overlay"></div>

		<div class="main-container">
			<div class="xs-pd-20-10 pd-ltr-20">
				<div class="title pb-20">
					<h2 class="h3 mb-0">Admin dashboard</h2>
				</div>

				<div class="row pb-10">

				<?php
				// Define renderWidget function
				function renderWidget($value, $label, $iconClass) {
					echo '
					<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
						<div class="card-box height-100-p widget-style3">
							<div class="d-flex flex-wrap">
								<div class="widget-data">
									<div class="weight-700 font-24 text-dark">' . htmlspecialchars($value) . '</div>
									<div class="font-14 text-secondary weight-500">' . htmlspecialchars($label) . '</div>
								</div>
								<div class="widget-icon">
									<div class="icon" data-color="#FF7380FF">
										<i class="' . htmlspecialchars($iconClass) . '"></i>
									</div>
								</div>
							</div>
						</div>
					</div>';
				}

				// Usage of renderWidget function to display stats
				renderWidget($cc, "Total Users", "icon-copy fi-torsos-all");
				renderWidget($tcc, "Total Orders", "icon-copy fi-shopping-cart");
				renderWidget($ptcc, "Total Sales", "icon-copy fi-dollar");
				renderWidget($ss, "Approved Orders", "icon-copy fi-check");
				renderWidget($dailyNewUsers, "New Users", "icon-copy fi-plus");
				renderWidget($dailyOrders, "Daily Orders", "icon-copy fi-calendar");
				renderWidget($dailySales, "Daily Sales", "fa fa-money");
				renderWidget($feedbackCount, "Feedbacks", "icon-copy fi-comment");
				?>

				<!-- Best Selling Products Section -->
				<div class="card-box mb-30">
					<h2 class="h4 pd-20">Best Selling Products</h2>
					<table class="data-table table nowrap">
						<thead>
							<tr>
								<th class="table-plus datatable-nosort">Product</th>
								<th>Name</th>
								<th>Price</th>
								<th>Qty</th>
								<th class="datatable-nosort">Action</th>
							</tr>
						</thead>
						<tbody>
						<?php
						// SQL query to fetch best selling products
						$sql = "SELECT p.p_img, p.p_name, p.p_price, SUM(oi.quantity) AS totalQuantitySold
								FROM products p
								INNER JOIN orderitem oi ON p.productID = oi.productID
								WHERE oi.statusx = 'paid'
								GROUP BY p.productID
								ORDER BY totalQuantitySold DESC
								LIMIT 5";

						$result = mysqli_query($con, $sql);

						// Check for SQL execution errors
						if (!$result) {
							echo "Error: " . mysqli_error($con);
						} else {
							while ($row = mysqli_fetch_assoc($result)) {
								echo '<tr>
										<td><img src="../' . htmlspecialchars($row["p_img"]) . '" class="product-img" alt="' . htmlspecialchars($row['p_name']) . '"></td>
										<td>' . htmlspecialchars($row['p_name']) . '</td>
										<td>' . htmlspecialchars($row['p_price']) . '</td>
										<td>' . htmlspecialchars($row['totalQuantitySold']) . '</td>
										<td>
											<a href="products.php" class="dw dw-eye">View</a>
										</td>
									</tr>';
							}
						}
						?>
						</tbody>
					</table>
				</div>
				<style>
    .product-img {
        max-width: 100px;
        max-height: 100px;
        object-fit: contain;
        display: block;
        margin: 0 auto; /* Center the image */
    }

    .table td, .table th {
        vertical-align: middle; /* Vertically center content */
    }

    .table {
        table-layout: fixed; /* Make table layout fixed for consistent column widths */
        width: 100%;
    }

    .table th, .table td {
        word-wrap: break-word; /* Prevent overflow of long text */
        text-align: center; /* Center all text and content in the cells */
    }
</style>


				<?php 
					include ("includes/script.php");
				?>
			</div>
		</div>
	</body>
</html>
