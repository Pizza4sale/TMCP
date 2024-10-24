<?php
include("./includes/header.php");
include("./includes/script.php");
?>
    <body>
        <?php $page = 'contact';?>

        <!--Start Navigation Bar-->
        <?php include './Includes/MobileNavBar.php';?>
        <!--End Navigation Bar-->


        <!--Start Navigation Bar @media 1200px-->
        <?php include './Includes/PcNavBar.php';?>
        <!--End Navigation Bar @media 1200px-->

  <!--Start Navigation Bar @media 1200px-->
  <?php include './Includes/GoogleMap.php';?>
        <!--End Navigation Bar @media 1200px-->
        


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