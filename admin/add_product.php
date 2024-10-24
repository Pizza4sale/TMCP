<?php

include('includes/head.php');
include('includes/navbar.php');
include('includes/sidebar.php');


?>

<!-- Main content -->
<div class="main-container">
			<div class="pd-ltr-20 xs-pd-20-10">
				<div class="min-height-200px">
					<div class="page-header">
						<div class="row">
							<div class="col-md-6 col-sm-12">
								<div class="title">
									<h4>Add product</h4>
								</div>
								<nav aria-label="breadcrumb" role="navigation">
									<ol class="breadcrumb">
										<li class="breadcrumb-item">
											<a href="index.php">Home</a>
										</li>
										<li class="breadcrumb-item active" aria-current="page">
                                       Add Product
										</li>
									</ol>
								</nav>
							</div>
                        </div>

					</div>


 
            <div class="card-box mb-30">
						<div class="pd-20">
							<h4 class="text-blue h4">Add Product</h4>
						</div>
						<div class="pb-20">
                       

               <!-- /.card-header -->
               <div class="card-body">
                <form action="save_data/save_product.php" method="POST">
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Product Name</label>
                        <input type="text" name="p_name" class="form-control" placeholder="Product Name ...">
                      </div>
                    </div>


                      <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Product Decription</label>
                        <input type="text" name="p_desc" class="form-control" placeholder="Product Description ...">
                      </div>
                    </div>
                   
                  </div>





                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Stock</label>
                        <input type="text" name="orig_price" class="form-control" placeholder="Stock count...">
                      </div>
                    </div>


                      <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Selling Price</label>
                        <input type="text" name="s_price" class="form-control" placeholder="Selling Price...">
                      </div>
                    </div>
                   
                  </div>






                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                         <div class="form-group">
                        <label>Image</label>
                        <input id="inp_file" type="file"  name="image" class="form-control" placeholder="Enter ...">
                      </div>
                    </div>

 

                      <div class="col-sm-6">
                      <!-- text input -->
                       <label>Category Name</label>
             <select class="form-control select2" name="CATNAME">
                              <option>Category Name</option>
                           <?php   
                                    include("includes/db.php"); 
                                    $sqlx = "select * from categories  ";
                                    $resultx = mysqli_query($con, $sqlx);  
                                    while($rowx = mysqli_fetch_array($resultx)) 
                                    {

                                          ?>
 
           <option  value="<?php echo $rowx["categoryID"]; ?>">
            <?php echo "".$rowx["p_cat_name"].""; ?></option> 
            <?php   }  ?>
                        </select>
                    </div>
 

                  </div>

                    <input id="inp_img" name="img" type="hidden" value="">
                        
                       

                        <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                       <div class="col-md-8">
                         <img class="img-fluid" src="card-img.jpg" id="profile-img-tag" width="300px" height="500px" alt="Card image cap"> 
                      </div>
                    </div>


                      <div class="col-sm-6">
                      <!-- text input -->
                      <label>Status</label>
             <select class="form-control select2" name="typeid">
                              <option>Status</option>
                           <?php   
                                    include("includes/db.php"); 
                                    $sqlx = "select * from types  ";
                                    $resultx = mysqli_query($con, $sqlx);  
                                    while($rowx = mysqli_fetch_array($resultx)) 
                                    {

                                          ?>
 
           <option  value="<?php echo $rowx["typeID"]; ?>">
            <?php echo "".$rowx["p_type_name"].""; ?></option> 
            <?php   }  ?>
                        </select>
                    </div>
                   
                  </div>


                <div class="card-footer">
                  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </div>

 
                  </div>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
 
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->




<?php
// Include your script and footer files
include("includes/script.php");
// ...
?>
