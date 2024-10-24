

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
									<h4>User table</h4>
								</div>
								<nav aria-label="breadcrumb" role="navigation">
									<ol class="breadcrumb">
										<li class="breadcrumb-item">
											<a href="index.php">Home</a>
										</li>
										<li class="breadcrumb-item active" aria-current="page">
                                        User table
										</li>
									</ol>
								</nav>
							</div>
                        </div>

					</div>
                    
                    <div class="card-box mb-30">
						<div class="pd-20">
							<h4 class="text-blue h4">User table</h4>
						</div>
						<div class="pb-20">
							<table class="data-table table stripe hover nowrap">
                        <thead>
                        <tr>
                        <th>User ID</th>
                                        <th>Fullname</th>
                                        <th>Email</th>
                                        <th>Address</th>
                                        <th>Phone</th>
                                        <th>Status</th>
                                            <th class="table-plus datatable-nosort">Action</th>
                  
                </tr>
              </thead>
              <tbody>
    <?php
    $sql = "SELECT *, CONCAT(fname, ' ', lname) AS fullname FROM user";
    $result = mysqli_query($con, $sql);

    if (!$result) {
        die("Error executing query: " . mysqli_error($con));
    }

    while ($row = mysqli_fetch_assoc($result)) {
        $isvrf = $row["verified"];
    ?>
        <tr>
            <td><?php echo htmlspecialchars($row["userID"]); ?></td>
            <td><?php echo htmlspecialchars($row["fullname"]); ?></td>
            <td><?php echo htmlspecialchars($row["email"]); ?></td>
            <td><?php echo htmlspecialchars($row["address"]); ?></td>
            <td><?php echo htmlspecialchars($row["phone"]); ?></td>
            <td><?php echo ($isvrf == '1') ? 'Verified' : 'For Verification'; ?></td>
            <td class="table-plus">
                <div class="table-actions">
                    <a href='save_data/approved_user.php?ID=<?php echo htmlspecialchars($row["userID"]); ?>' onclick="return confirm('Are you sure you want to approve this user?');" data-color="#265ed7">
                        <i class="icon-copy dw dw-check"></i>
                    </a>
                    <a href='delete/delete_user.php?ID=<?php echo htmlspecialchars($row["userID"]); ?>' onclick="return confirm('Are you sure you want to delete this data?');" data-color="#e95959">
                        <i class="icon-copy dw dw-delete-3"></i>
                    </a>
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
