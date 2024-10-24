<?php include("includes/head.php") ?>
<?php include("includes/navbar.php") ?>
<?php include("includes/sidebar.php") ?>

<div class="mobile-menu-overlay"></div>
<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="title">
                            <h4>Profile</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="index.php">Home</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Profile
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            
            <!-- Default Basic Forms Start -->
            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <div class="pull-left">
                        <h4 class="text-blue h4">Profile</h4>
                    </div>
                </div>
                        
                <div class="profile-photo">
                    <a href="modal" data-toggle="modal" data-target="#modal" class="edit-avatar">
                        <i class="fa fa-pencil"></i>
                    </a>
                    <div class="profile-photo">
                        <img src="profile/<?php echo htmlspecialchars($photoFilename); ?>" alt="Profile Photo" class="avatar-photo" />
                    </div>

                    <!-- Modal for Profile Image Update -->
                    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <form action="save_data/update_profile.php" method="post" enctype="multipart/form-data">
                                    <div class="modal-body pd-5">
                                        <div class="img-container">
                                            <img id="image" src="profile/<?php echo htmlspecialchars($photoFilename); ?>" alt="Current Profile Picture" />
                                        </div>
                                        <!-- Add file input for updating profile photo -->
                                        <div class="form-group mt-3">
                                            <label for="profilePhoto">Upload New Profile Photo</label>
                                            <input type="hidden" name="username" value="<?php echo htmlspecialchars($uname); ?>">
                                            <input type="file" class="form-control-file" id="profilePhoto" name="profile_photo">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="submit" class="btn btn-primary" value="Update Information" name="update_profile">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Profile Details -->
                <h5 class="text-center h5 mb-0"><?php echo htmlspecialchars($fullname); ?></h5>
                <p class="text-center text-muted font-14"><?php echo htmlspecialchars($description); ?></p>
                <div class="profile-info">
                    <h5 class="mb-20 h5 text-blue">Contact Information</h5>
                    <ul>
                        <li><span>Email Address:</span> <?php echo htmlspecialchars($email); ?></li>
                        <li><span>Phone Number:</span> <?php echo htmlspecialchars($phone); ?></li>
                        <li><span>Address:</span> <?php echo htmlspecialchars($address); ?></li>
                    </ul>
                </div>
                               
                <!-- Update Profile Form -->
                <form action="save_data/update_account.php" method="post">
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Username</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" value="<?php echo htmlspecialchars($uname); ?>" name="username">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Password</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="password" placeholder="Enter new password" name="password">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">First Name</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" value="<?php echo htmlspecialchars($fname); ?>" name="first_name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Last Name</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" value="<?php echo htmlspecialchars($lname); ?>" name="last_name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Address</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" value="<?php echo htmlspecialchars($address); ?>" name="address">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Contact Number</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="tel" value="<?php echo htmlspecialchars($phone); ?>" name="contact_number">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Description</label>
                        <div class="col-sm-12 col-md-10">
                            <textarea class="form-control" name="description"><?php echo htmlspecialchars($description); ?></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12 col-md-10 offset-md-2">
                            <input type="submit" class="btn btn-primary" value="Update Information" name="update_profile">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include("includes/script.php"); ?>
</body>
</html>
