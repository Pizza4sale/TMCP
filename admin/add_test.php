<?php
include('includes/head.php');
include('includes/navbar.php');
include('includes/sidebar.php');

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve values from the form
    $name = $_POST['name'];
    $role = $_POST['role'];
    $message = $_POST['message'];
    $rating = $_POST['rating'];

    // Insert new testimonial into the database using prepared statement
    $sqlInsert = "INSERT INTO testimonials_table (name, role, message, rating) VALUES (?, ?, ?, ?)";
    
    $stmt = $con->prepare($sqlInsert);
    $stmt->bind_param("sssi", $name, $role, $message, $rating);

    if ($stmt->execute()) {
        $feedbackMessage = "Testimonial added successfully";
    } else {
        $feedbackMessage = "Error adding testimonial: " . $con->error;
    }

    $stmt->close();
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
                            <h4>Add Testimonial</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="index.php">Home</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Add Testimonial
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

            <div class="card-box mb-30">
						<div class="pd-20">
							<h4 class="text-blue h4">Add Testimonials</h4>
						</div>
						<div class="pb-20">
                        <div class="card-body">
                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" name="name" required />
                        </div>

                        <div class="form-group">
                            <label for="role">Role:</label>
                            <input type="text" class="form-control" name="role" required />
                        </div>

                        <div class="form-group">
                            <label for="message">Message:</label>
                            <textarea class="form-control" name="message" rows="4" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="rating">Rating:</label>
                            <select class="form-control" name="rating">
                                <?php for ($i = 1; $i <= 5; $i++) : ?>
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Add Testimonial</button>
                    </form>

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
