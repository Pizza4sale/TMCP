<?php
include("./includes/header.php");
include("./includes/script.php");
?>

    <body>
        <?php $page = 'accountinvalidpage';?>

        <!--Start Navigation Bar-->
        <?php include './Includes/MobileNavBar.php';;?>
        <!--End Navigation Bar-->


        <!--Start Navigation Bar @media 1200px-->
        <?php include './Includes/PcNavBar.php';?>
        <!--End Navigation Bar @media 1200px-->


        <div class="mail-sent-group">
            <div class="mail-sent-container">
                <div class="mail-sent-image-container">
                    <div class="mail-sent-image mail-invalid-image"></div>
                </div>

                <div class="mail-sent-text">
                    <h1>Email verification failed.</h1>
                    <span class="message">Either the link expired or you did not copy the URL properly.</span>
                    <br><br>
                    <div class="resend-button-container">
                        <span><a href="login.php"><button class="resend-button" name="resendLink">Log in to resend confirmation link</button></a></span>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>