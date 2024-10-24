<?php
include("./includes/header.php");
include("./includes/script.php");
?>


<body>
    <?php
    // Set current page
    $page = 'about';

    // Include mobile navigation bar
    include './Includes/MobileNavBar.php';

    // Include PC navigation bar
    include './Includes/PcNavBar.php';
    ?>

    <!-- Page Header -->
    <div class="about-us-header">
        <div class="banner-group">
            <div class="banner"></div>
        </div>
        <div class="about-us-subtitle">
            <span>ABOUT US</span>
        </div>
    </div>
    <!-- End Page Header -->

    <!-- Baker Info -->
    <div class="baker-info-group">
        <div class="baker-info-container">
            <div class="baker-info-text">
                <div class="baker-info-title">
                    <span>About Tres Marias Cakes and Pastries</span>
                </div>

                <div class="baker-description">
                <p>The "TMCP"  is a small bakery business located in Balisi Street, Aparri Cagayan, Philippines. Operating for two years. We specialize in cakes and pastries, offering a variety of other baked goods such as breads, cookies, and pies. Our products are made with the freshest ingredients and lots of love.</p>

                </div>
            </div>

            <div class="baker-photo-group">
                <img src="Assets\images\4.aboutus\bakery img.jpg" alt="Bakery Image">
            </div>
        </div>
        
    </div>
    <!-- End Baker Info -->
    <hr class="my-4 pinkLine">
 
    <!-- Footer -->
    <?php include './Includes/Footer.php';?>

    <!-- Chatbot -->


    <!-- Mobile Bottom Navigation -->
    <?php include './Includes/MobileBottomNav.php';?>
</body>
</html>
