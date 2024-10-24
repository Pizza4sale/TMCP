<?php 
    define('Access', TRUE);
    include "./AdditionalPHP/startSession.php";
?>

<!DOCTYPE html>
<html lang="en-MU">
    <head>
        <meta charset="utf-8">
        <title>TMCP | HOME</title>
        <link rel="icon" type="image/png" href="Assets\images\1.index\logo.png">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--CSS File-->
        <link rel="stylesheet" type="text/css" href="Common.css">
        <link rel="stylesheet" type="text/css" href="Atish.css">
        <!-- Font Awesome -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js" crossorigin="anonymous"></script>
        <!--BOXICONS-->
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <!-- Animate CSS -->
        <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
        <script src="Javascript/swapWaveImg.js"></script>
        <!-- COUNTDOWN FUNCTION JAVASCRIPT BY SANJANA -->
        <script src = "Javascript/countdown_sales.js"></script>
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    </head>

    <body>
        <?php $page = 'index'?>

        <!--Start Navigation Bar-->
        <?php include './Includes/MobileNavBar.php';?>
        <!--End Navigation Bar-->


        <!--Start Navigation Bar @media 1200px-->
        <?php include './Includes/PcNavBar.php';?>
        <!--End Navigation Bar @media 1200px-->


        <!--Start Wave Image-->
        <div class="wave-image-group-media1200">
            <div class="wave-image-flip-media1200">
                <img src="Assets/images/1.index/NavBar_WaveWhiteThinFlip.png">
            </div>
        </div>
        <!--End Wave Image-->


        <!--Start Slideshow-->
        <div class="slideshow-container">

            <!-- Full-width images with number and caption text -->
            <div class="mySlides fade">
            <img src="Assets/images/1.index/hero-1.jpg" style="width:100%">
            <div class="text">EVERY BATCH FROM SCRATCH</div>
            </div>
        
            
        </div>

        <script src="Javascript/SlideshowAuto.js"></script>
        <!--End Slideshow -->

        
        

        <!--Start What You Can Do-->
        <div class="what-you-can-do">
            <div class="subtitle">
                <h2>Why Choose Us</h2>
            </div>

            <div class="row">

                <div class="column">
                    <i class="fas fa-cookie"  style="color: black;"></i>
                    <span class="what-you-can-do-subtitle buy-our-cake">Quality</span>
                    <span class="what-you-can-do-text">We source the finest ingredients, ensuring that every bite is a symphony of flavors.</span>
                </div>

                <div class="column">
                    <i class="fas fa-mitten"  style="color: black;"></i>
                    <span class="what-you-can-do-subtitle customize-cake">Customization</span>
                    <span class="what-you-can-do-text">We love to bring your dreams to life with our custom cakes, making your special moments even more memorable.</span>
                </div>
                
                <div class="column">
                    <i class="fas fa-boxes"  style="color: black;"></i>
                    <span class="what-you-can-do-subtitle create-box">Dedication</span>
                    <span class="what-you-can-do-text">We pour our hearts and souls into our creations, striving for excellence in every bite.</span>
                </div>

            </div>
         </div>

        </div>
        <!--End What You Can Do-->
       
        
        <!--Start Special Offer-->
        <section class="offer-section">
            <div class="offer-bg">
                <div class="offer-data">
                    <div class="subtitle">
                        <h2>SPECIAL OFFER</h2>
                    </div>
                    <p class="offer-description">Summer Sales ends in: </p>
                    <p class="offer-description" id="countdown" style="font-family: Old Standard TT; font-size: 2rem;">Sales countdown</p>

                    <div class="subscribe-button-container">
                        <a href="products.php"><button class="subscribe-button" name="subscribe">SHOP NOW</button></a>
                    </div>
                </div>
            </div>
        </section>
        <!--End Special Offer-->


        <!--Start Wave Image-->
        <!-- <div class="wave-image-group">
            <div class="wave-image">
                <img src="Assets/images/1.index/NavBar_WaveWhite.png">
            </div>
        </div> -->
        <!--End Wave Image-->


        <!--Start How to Order-->
        <div class="how-to-order">
            <div class="subtitle">
                <h2 class="order-subtitle">HOW TO ORDER</h2>
            </div>
            <div class="row" style="color: #FF7380FF;">
                <div class="column">
                  <i class="fas fa-birthday-cake"></i>
                  <p><b>Choose your cake</b></p>
                </div>
                <div class="column">
                  <i class="fas fa-cart-plus"></i>
                  <p><b>Add to cart</b></p>
                </div>
                <div class="column">
                  <i class="fas fa-money-check-alt"></i>
                  <p><b>Checkout</b></p>
                </div>
                 <div class="column">
                 <i class="fas fa-box-open"></i>
                 <p><b>We prepare</b></p>
                </div>
                  <div class="column">
                  <i class="fas fa-shipping-fast"></i>
                  <p><b>Pickup</b></p>
                </div>
            </div>
         </div>
        <!--End How to Order-->


       

       
        <!-- Start Google Map-->
        <?php include './Includes/GoogleMap.php';?>
        <!-- End Google Map-->


        <section class="contact spad">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="contact__text text-center">
                    <h3>Contact With Us</h3>
                    <p>Our company is the best, meet the creative team that never sleeps. Say something to us, and we will answer you.</p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="contact__form">
                    <form action="contact.php" method="POST" onsubmit="return validateForm()">
                        <div class="form-group">
                            <input id="customerName" name="customerName" required type="text" class="form-control" placeholder="Your Name" />
                        </div>
                        <div class="form-group">
                            <input id="customerEmail" name="customerEmail" required type="email" class="form-control" placeholder="Your Email" />
                        </div>
                        <div class="form-group">
                            <textarea id="customerNote" name="customerMessage" required rows="4" class="form-control" placeholder="Your Message"></textarea>
                        </div>
                        <div class="g-recaptcha" data-sitekey="6Lf_tWYpAAAAAFXw2FZkx55OPm6_v5AdqQB-gxRL" data-action="CONTACT_FORM"></div>

                        <button type="submit" class="site-btn btn btn-primary btn-block">Send Us</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>



        <!--Start Footer-->
        <?php include './Includes/Footer.php';?>
        <!--End Footer-->

        
        <!-- Start Bottom Nav -->
        <?php include './Includes/MobileBottomNav.php';?>
        <!-- End Bottom Nav -->
       
      

    </body>
</html>



 


