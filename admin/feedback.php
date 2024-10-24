<?php include("includes/head.php") ?>
<?php include("includes/navbar.php") ?>
<?php include("includes/sidebar.php") ?>

<!-- Datatable start -->
<div class="main-container">
	<div class="pd-ltr-20 xs-pd-20-10">
		<div class="min-height-200px">
			<div class="page-header">
				<div class="row">
					<div class="col-md-6 col-sm-12">
						<div class="title">
							<h4>User Feedbacks</h4>
						</div>
						<nav aria-label="breadcrumb" role="navigation">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="index.php">Home</a></li>
								<li class="breadcrumb-item active" aria-current="page">User Feedbacks</li>
							</ol>
						</nav>
					</div>
				</div>
			</div>

			<div class="card-box mb-30">
				<div class="pd-20">
					<h4 class="text-blue h4">User Feedbacks</h4>
				</div>
				<div class="pb-20">
					<table class="data-table table stripe hover nowrap">
						<thead>
							<tr>
								<th>Name</th>
								<th>Email</th>
								<th>Phone</th>
								<th>Order Number</th>
								<th>Message</th>
								<th>Status</th>
								<th>Date</th>
								<th class="table-plus datatable-nosort">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
							// Prepare query
							$query = "SELECT * FROM contact_us_message";
							$result = mysqli_query($con, $query);

							// Check for errors
							if (!$result) {
								echo "<tr><td colspan='8'>Error fetching data: " . mysqli_error($con) . "</td></tr>";
							} else {
								while ($row = mysqli_fetch_assoc($result)) {
									// Escaping user inputs for XSS prevention
									$name = htmlspecialchars($row["name"]);
									$email = htmlspecialchars($row["email"]);
									$phone = htmlspecialchars($row["phone"]);
									$orderNumber = htmlspecialchars($row["ordernumber"]);
									$message = htmlspecialchars($row["client_message"]);
									$status = htmlspecialchars($row["status"]);
									$date = date("F j, Y, g:i a", strtotime($row["date"]));  // Format date nicely
									
									// Convert status to human-readable format
									$statusLabel = ($status == '0') ? 'Pending' : (($status == '1') ? 'Solved' : 'Closed');
							?>
								<tr>
									<td><?php echo $name; ?></td>
									<td><?php echo $email; ?></td>
									<td><?php echo $phone; ?></td>
									<td><?php echo $orderNumber; ?></td>
									<td><?php echo $message; ?></td>
									<td><?php echo $statusLabel; ?></td>
									<td><?php echo $date; ?></td>
									<td class="table-plus">
										<div class="table-actions">
											<a href='save_data/solved.php?ID=<?php echo $row["id"]; ?>' onclick="return confirm('Are you sure you want to mark this as solved?');" data-color="#265ed7">
												<i class="icon-copy dw dw-check"></i>
											</a>
											<a href='save_data/closed.php?ID=<?php echo $row["id"]; ?>' onclick="return confirm('Are you sure you want to close this feedback?');" data-color="#e95959">
												<i class="icon-copy dw dw-delete-3"></i>
											</a>
										</div>
									</td>
								</tr>
							<?php
								} // End of while loop
							}
							?>
						</tbody>
					</table>
				</div>
			</div>

			<?php include("includes/script.php"); ?>
		</div>
	</div>
</div>

<?php
mysqli_close($con);  // Close the database connection
?>
