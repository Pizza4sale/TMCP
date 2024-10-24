
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
									<h4>Categories</h4>
								</div>
								<nav aria-label="breadcrumb" role="navigation">
									<ol class="breadcrumb">
										<li class="breadcrumb-item">
											<a href="index.php">Home</a>
										</li>
										<li class="breadcrumb-item active" aria-current="page">
                                        Categories
										</li>
									</ol>
								</nav>
							</div>
                        </div>

					</div>
                    
                    <div class="card-box mb-30">
						<div class="pd-20">
							<h4 class="text-blue h4">Categories</h4>
						</div>
						<div class="pb-20">
							<table class="data-table table stripe hover nowrap">
                        <thead>
                        <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Description</th>
                  <th class="table-plus datatable-nosort">Action</th>
                  
                </tr>
              </thead>
              <tbody>
    <?php
    $sql = "SELECT * FROM categories";
    $result = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
    ?>
        <tr>
                    <td><?php echo $row["categoryID"]; ?></td>
                    <td><?php echo $row["p_cat_name"]; ?></td>
                    <td><?php echo $row["p_cat_desc"]; ?></td>
            <td class="table-plus">
			<div class="table-actions">
										
										<a href="delete/delete_cat.php?categoryID=<?php echo $row["categoryID"]; ?>" data-color="#e95959" onclick="return confirm('Are you sure you want to delete this category?');"
											><i class="icon-copy dw dw-delete-3"></i
										></a>
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
