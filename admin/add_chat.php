


<?php include("includes/head.php") ?>
<?php include("includes/navbar.php") ?>
<?php include("includes/sidebar.php") ?>

<!-- Main content -->
<div class="main-container">
			<div class="pd-ltr-20 xs-pd-20-10">
				<div class="min-height-200px">
					<div class="page-header">
						<div class="row">
							<div class="col-md-6 col-sm-12">
								<div class="title">
									<h4>Response</h4>
								</div>
								<nav aria-label="breadcrumb" role="navigation">
									<ol class="breadcrumb">
										<li class="breadcrumb-item">
											<a href="index.php">Home</a>
										</li>
										<li class="breadcrumb-item active" aria-current="page">
                                       Add Response
										</li>
									</ol>
								</nav>
							</div>
                        </div>

					</div>

          <div class="card-box mb-30">
						<div class="pd-20">
							<h4 class="text-blue h4">Add Response</h4>
						</div>
						<div class="pb-20">

              <!-- /.card-header -->
              <div class="card-body">
                <form action="save_data/save_chat.php" method="POST">
                  <div class="row">
                    <div class="col-sm-12">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Queries</label>
                        <input type="text" name="inquire" class="form-control" required>
                      </div>


                       <div class="form-group">
                        <label>Message</label>
                        <input type="text" name="mymessage" class="form-control" required>
                      </div>
                    </div>
 
                   
                  </div>
 

                <div class="card-footer">
                  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </div>


                    </div>
                  </div>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <?php
                include("includes/script.php");
                ?>