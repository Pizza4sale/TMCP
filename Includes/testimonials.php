<?php
include("./includes/db.php");

$sql = 'SELECT * FROM testimonials_table';
$result = $conn->query($sql);

$testimonials = [];
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $testimonials[] = $row;
    }
} else {
    echo "Error fetching testimonials: " . $conn->error;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Tres Marias Cake and Pastries</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet" />
</head>
<body>


<!-- Testimonial Start -->
<div class="owl-carousel testimonial-carousel">
    <?php foreach ($testimonials as $testimonial) : ?>
        <div class="testimonial-item bg-dark text-white border-inner p-4">
            <div class="d-flex align-items-center mb-3">
                <!-- Make sure your database has an 'image' column -->
                <img class="img-fluid flex-shrink-0" src="assets/images/img/<?php echo $testimonial['image']; ?>" style="width: 60px; height: 60px" />
                <div class="ps-3">
                    <h4 class="text-primary text-uppercase mb-1"><?php echo $testimonial['name']; ?></h4>
                    <span><?php echo $testimonial['role']; ?></span>
                </div>
            </div>
            <p class="mb-0">
                <?php echo $testimonial['message']; ?>
            </p>

            <!-- Rating Section -->
            <div class="rating-section mt-3">
                <?php
                $rating = $testimonial['rating'];
                echo "Ratings: $rating"; // Add this line to print the rating
                for ($i = 1; $i <= 5; $i++) {
                    if ($i <= $rating) {
                        echo '<i class="bi bi-star-fill text-warning"></i>';
                    } else {
                        echo '<i class="bi bi-star text-warning"></i>';
                    }
                }
                ?>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<!-- Testimonial End -->

<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/waypoints/waypoints.min.js"></script>
<script src="lib/counterup/counterup.min.js"></script>
<script src="lib/owlcarousel/owl.carousel.min.js"></script>

<!-- Template Javascript -->
<script src="js/main.js"></script>
</body>
</html>
