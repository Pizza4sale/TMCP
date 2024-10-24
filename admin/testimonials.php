<?php
include('includes/head.php');
include('includes/navbar.php');
include('includes/sidebar.php');

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve values from the form
    $testimonialId = $_POST['testimonial_id'];
    $name = $_POST['name'];
    $role = $_POST['role'];
    $message = $_POST['message'];
    $rating = $_POST['rating']; // Add this line to retrieve the rating

    // Update testimonial in the database using prepared statement
    $sqlUpdate = "UPDATE testimonials_table 
                  SET name = '$name', role = '$role', message = '$message' , rating = '$rating'  
                  WHERE id = $testimonialId";

    if ($con->query($sqlUpdate) === TRUE) {
        echo "Testimonial updated successfully";
    } else {
        echo "Error updating testimonial: " . $con->error;
    }
}

// Fetch existing testimonials from the database
$sqlSelect = 'SELECT * FROM testimonials_table';
$result = $con->query($sqlSelect);

$testimonials = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $testimonials[] = $row;
    }
}
?>

<!-- Main content -->
<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Testimonials</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="index.php">Home</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Testimonials
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

            <div class="card-box mb-30">
						<div class="pd-20">
							<h4 class="text-blue h4">Testimonials</h4>
						</div>
						<div class="pb-20">
                        <div class="card-body">
                    <?php foreach ($testimonials as $testimonial) : ?>
                        <div class="card testimonial-card">
                            <div class="card-body">
                                <form class="testimonial-form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                    <input type="hidden" name="testimonial_id" value="<?php echo $testimonial['id']; ?>" />

                                    <div class="form-group">
                                        <label for="name">Name:</label>
                                        <input type="text" class="form-control" name="name" value="<?php echo $testimonial['name']; ?>" required />
                                    </div>

                                    <div class="form-group">
                                        <label for="role">Role:</label>
                                        <input type="text" class="form-control" name="role" value="<?php echo $testimonial['role']; ?>" required />
                                    </div>

                                    <div class="form-group">
                                        <label for="message">Message:</label>
                                        <textarea class="form-control" name="message" rows="4" required><?php echo $testimonial['message']; ?></textarea>
                                    </div>

                                    <!-- Add the following section for editing rating -->
                                    <div class="form-group">
                                        <label for="rating">Rating:</label>
                                        <select class="form-control" name="rating">
                                            <?php for ($i = 1; $i <= 5; $i++) : ?>
                                                <option value="<?php echo $i; ?>" <?php if ($testimonial['rating'] == $i) echo 'selected'; ?>><?php echo $i; ?></option>
                                            <?php endfor; ?>
                                        </select>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Update Testimonial</button>
                                </form>
                            </div>
                        </div>
                        <hr />
                    <?php endforeach; ?>

                    <?php if (isset($feedbackMessage)) : ?>
                        <div class="alert alert-info mt-4" role="alert">
                            <?php echo $feedbackMessage; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
// Include your script and footer files
include("includes/script.php");
// ...
?>
</body>
</html>
