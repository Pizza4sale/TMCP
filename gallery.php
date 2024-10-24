<?php 
    define('Access', TRUE);
    include "./AdditionalPHP/startSession.php";
    $uploadDir = 'admin/uploads/';
?>

<!DOCTYPE html>
<html lang="en-MU">
    <head>
        <meta charset="utf-8">
        <title>TMCP | Gallery</title>
        <link rel="icon" type="image/png" href="Assets\images\1.index\logo.png">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- CSS File -->
        <link rel="stylesheet" type="text/css" href="Common.css">
        <link rel="stylesheet" type="text/css" href="Atish.css">
        <!-- Font Awesome -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js" crossorigin="anonymous"></script>
        <!-- BOXICONS -->
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <!-- Animate CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
        <link
			href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
			rel="stylesheet"
		/>
		<!-- CSS -->
		<link rel="stylesheet" type="text/css" href="admin/vendors/styles/core.css" />
		<link
			rel="stylesheet"
			type="text/css"
			href="admin/vendors/styles/icon-font.min.css"
		/> 
		<link
			rel="stylesheet"
			type="text/css"
			href="admin/src/plugins/fancybox/dist/jquery.fancybox.css"
		/>
        <style>
        /* Container styles */
        .container {
            max-width: 1200px; /* Adjust the maximum width as needed */
            margin: 0 auto;
            padding: 0 20px; /* Add padding as needed */
        }

        /* Gallery styles */
        .gallery-wrap {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            margin-top: 20px;
        }
        .gallery-wrap .row {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .gallery-wrap .row li {
            width: calc(33.33% - 20px);
            margin-bottom: 20px;
            padding: 0 10px;
            box-sizing: border-box;
        }
        .gallery-wrap .da-card {
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            overflow: hidden;
        }
        .gallery-wrap .da-card-photo img {
            width: 100%;
            height: auto;
            display: block;
        }
        .gallery-wrap .da-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            opacity: 0;
            transition: opacity 0.3s ease;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .gallery-wrap .da-card:hover .da-overlay {
            opacity: 1;
        }
        .gallery-wrap .da-social ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .gallery-wrap .da-social ul li {
            display: inline-block;
            margin-right: 10px;
        }
        .gallery-wrap .da-social ul li:last-child {
            margin-right: 0;
        }
        .gallery-wrap .da-social ul li a {
            color: #fff;
            text-decoration: none;
            font-size: 16px;
        }
    </style>
       
    </head>
    <body>
        <?php $page = 'gallery';?>

        <!-- Start Navigation Bar -->
        <?php include './Includes/MobileNavBar.php';?>
        <!-- End Navigation Bar -->

        <!-- Start Navigation Bar @media 1200px -->
        <?php include './Includes/PcNavBar.php';?>
        <!-- End Navigation Bar @media 1200px -->

        <div class="container">
        <!-- Gallery Section -->
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
        </div>

        <!-- End Gallery Section -->
  <!-- Back to Top -->
 

        <!--Start Footer-->
        <?php include './Includes/Footer.php';?>
        <!--End Footer-->

        
        <!-- Start Bottom Nav -->
        <?php include './Includes/MobileBottomNav.php';?>
        <!-- End Bottom Nav -->

        <script>
            function openModal(imageSrc) {
                var modal = document.getElementById('myModal');
                var modalImg = document.getElementById('modalImage');
                modal.style.display = 'block';
                modalImg.src = imageSrc;

                var span = document.getElementsByClassName('close')[0];
                span.onclick = function () {
                    modal.style.display = 'none';
                };
            }
        </script>
        
        </script>
        <!-- js -->
		<script src="admin/vendors/scripts/core.js"></script>
		<script src="admin/vendors/scripts/script.min.js"></script>
		<script src="admin/vendors/scripts/process.js"></script>
		<script src="admin/vendors/scripts/layout-settings.js"></script>
		<!-- fancybox Popup Js -->
		<script src="admin/src/plugins/fancybox/dist/jquery.fancybox.js"></script>
    </body>
</html>
