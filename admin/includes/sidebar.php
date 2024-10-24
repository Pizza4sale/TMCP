<?php

include("includes/db.php");
if (!isset($_SESSION['uname'])) {
	echo "<script>window.open('login.php','_self')</script>";
}
$stmt = mysqli_prepare($con, "SELECT * FROM user WHERE uname=?");
mysqli_stmt_bind_param($stmt, "s", $_SESSION['uname']);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) === 1) {
	$row = mysqli_fetch_assoc($result);
	$uname = $row['uname'];
	$password = $row['pass'];
	$fname = $row['fname'];
	$lname = $row['lname'];
	$email = $row['email'];
	$address = $row['address'];
	$phone = $row['phone'];
	$description = $row['description'];
	$photoFilename = $row['profile_photo'];

	$fullname = $row["fname"] . " " . $row["lname"];

	$titleName = strtoupper($fname);
}

?>
<div class="left-side-bar">
	<div class="brand-logo">
		<a href="index.php">
			<span>TMCP</span>
		</a>
		<div class="close-sidebar" data-toggle="left-sidebar-close">
			<i class="ion-close-round"></i>
		</div>
	</div>
	<div class="menu-block customscroll">
		<div class="sidebar-menu">
			<ul id="accordion-menu">
				<li>
					<a href="index.php" class="dropdown-toggle no-arrow">
						<span class="micon bi bi-house-heart-fill"></span><span class="mtext">Home</span>
					</a>
				</li>
				<li>
					<a href="report.php" class="dropdown-toggle no-arrow">
						<span class="micon bi bi-house-heart-fill"></span><span class="mtext">Generate sales report</span>
					</a>
				</li>
				<li>
					<a href="calendar.php" class="dropdown-toggle no-arrow">
						<span class="micon bi bi-image"></span><span class="mtext">Calendar</span>
					</a>
				</li>

				<li class="dropdown">
					<a href="javascript:;" class="dropdown-toggle">
						<span class="micon bi bi-shop"></span><span class="mtext">Products</span>
					</a>
					<ul class="submenu">
						<li><a href="add_product.php">Add Products</a></li>
						<li><a href="products.php">Manage Products</a></li>

					</ul>
				</li>

				<li class="dropdown">
					<a href="javascript:;" class="dropdown-toggle">
						<span class="micon bi bi-sort-alpha-up"></span><span class="mtext">Categories</span>
					</a>
					<ul class="submenu">
						<li><a href="add_categories.php">Add Categories</a></li>
						<li><a href="categories.php">Manage Categories</a></li>

					</ul>
				</li>

				<li class="dropdown">
					<a href="javascript:;" class="dropdown-toggle">
						<span class="micon bi bi-cart-check-fill"></span><span class="mtext">Orders</span>
					</a>
					<ul class="submenu">
						<li><a href="orderlist.php">Order List</a></li>
						<li><a href="approvedorder.php">Approved Orders</a></li>

					</ul>
				</li>



				<li>
					<a href="user.php" class="dropdown-toggle no-arrow">
						<span class="micon bi bi-person-lines-fill"></span><span class="mtext">User Table</span>
					</a>
				</li>

				<li>
					<a href="feedback.php" class="dropdown-toggle no-arrow">
						<span class="micon bi bi-person-heart"></span><span class="mtext">User Feedback</span>
					</a>
				</li>

			

				<li>
					<a href="gallery.php" class="dropdown-toggle no-arrow">
						<span class="micon bi bi-image"></span><span class="mtext">Gallery</span>
					</a>
				</li>

			

				<li>
					<a href="../index.php" target="_blank" class="dropdown-toggle no-arrow">
						<span class="micon bi bi-box-arrow-in-up-right"></span><span class="mtext">Visit Site</span>
					</a>
				</li>
		</div>
	</div>
</div>