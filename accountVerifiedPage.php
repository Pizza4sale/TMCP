<?php
    header("refresh:3;url=checkAccount.php");
?>
<?php
include("./includes/header.php");
include("./includes/script.php");
?>
<!DOCTYPE html>


    <body>
        <?php $page = 'thankYouRegistration';?>

        <!--Start Navigation Bar-->
        <?php include './Includes/MobileNavBar.php';;?>
        <!--End Navigation Bar-->


        <!--Start Navigation Bar @media 1200px-->
        <?php include './Includes/PcNavBar.php';?>
        <!--End Navigation Bar @media 1200px-->


        <div class="mail-sent-group">
            <div class="mail-sent-container">
                <div class="mail-sent-image-container">
                    <div class="mail-sent-image mail-verified-image"></div>
                </div>

                <div class="mail-sent-text">
                    <h1>Your email address has been verified.</h1>
                    <span class="message">You will now be redirected to the login page.</span>
                    <br><br>
                    <span class="tip">Redirecting........</span>
                </div>
            </div>
        </div>
    </body>
</html>