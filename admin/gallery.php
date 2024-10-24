<?php
$uploadDir = 'uploads/';

// Delete image if delete button is clicked
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete"])) {
    $deleteFile = $_POST["delete"];
    $deletePath = $uploadDir . $deleteFile;

    if (file_exists($deletePath) && unlink($deletePath)) {
        // Remove the image from the database if you are using one
        // Include database deletion logic here if needed

        echo "<script>alert('File \"$deleteFile\" has been deleted.', 'success');</script>";
    } else {
        echo "<script>alert('Failed to delete file \"$deleteFile\".', 'error');</script>";
    }
}

// Upload multiple images
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["file"])) {
    $uploadedFile = $_FILES["file"];

    $uploadFile = $uploadDir . basename($uploadedFile["name"]);

    // Check if the file is an image
    $imageFileType = strtolower(pathinfo($uploadFile, PATHINFO_EXTENSION));
    $allowedExtensions = array("jpg", "jpeg", "png", "gif");

    if (in_array($imageFileType, $allowedExtensions) &&
        move_uploaded_file($uploadedFile["tmp_name"], $uploadFile)) {
        // Handle successful upload
        echo "<script>alert('File \"$uploadFile\" has been uploaded.', 'success');</script>";
    } else {
        // Handle upload failure
        echo "<script>alert('Invalid file format or upload failed.', 'error');</script>";
    }
}
?>


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
									<h4>Gallery</h4>
								</div>
								<nav aria-label="breadcrumb" role="navigation">
									<ol class="breadcrumb">
										<li class="breadcrumb-item">
											<a href="index.html">Home</a>
										</li>
										<li class="breadcrumb-item active" aria-current="page">
											Gallery
										</li>
									</ol>
								</nav>
							</div>
						</div>
				
                </div>

                <div class="pd-20 card-box mb-30">
						<div class="clearfix mb-20">
							<div class="pull-left">
								<h4 class="text-blue h4">Dropzone</h4>
							</div>
						</div>
						<form class="dropzone" action="gallery.php" id="my-awesome-dropzone">
    <div class="fallback">
        <input type="file" name="files[]" id="files" />
        <button type="submit" name="submit">Upload</button>
    </div>
</form>

					</div>
				</div>
<div class="gallery-wrap">
    <ul class="row">
        <?php
        $images = glob($uploadDir . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);
        foreach ($images as $image) {
            $fileName = basename($image);
        ?>
            <li class="col-lg-4 col-md-6 col-sm-12">
                <div class="da-card box-shadow">
                    <div class="da-card-photo">
                        <img src="<?php echo htmlspecialchars($uploadDir . $fileName); ?>" alt="" />
                        <div class="da-overlay">
                            <div class="da-social">
                                <h5 class="mb-10 color-white pd-20">
                                    <!-- Additional content if needed -->
                                </h5>
                                <ul class="clearfix">
                                    <li>
                                        <a
                                            href="<?php echo htmlspecialchars($uploadDir . $fileName); ?>"
                                            data-fancybox="images"
                                        >
                                            <i class="fa fa-picture-o"></i> View
                                        </a>
                                    </li>
                                    <li>
                                        <!-- Style the delete button to look like a link -->
                                        <a href="#" class="delete-btn"
                                            onclick="document.getElementById('delete-form-<?php echo $fileName; ?>').submit();">
                                            <i class="fa fa-trash"></i> Delete
                                        </a>
                                        <form id="delete-form-<?php echo $fileName; ?>" class="delete-form"
                                              method="post" action="gallery.php">
                                            <input type="hidden" name="delete" value="<?php echo $fileName; ?>">
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        <?php
        }
        ?>
    </ul>
</div>

<style>
    /* Style for the delete button to look like a link */
    .delete-btn {
        color: #007bff; /* Link color */
        text-decoration: underline;
        cursor: pointer;
    }

    .delete-btn:hover {
        color: #0056b3; /* Link color on hover */
    }
</style>




				
	</body>
</html>
<?php
                include("includes/script.php");
                ?>