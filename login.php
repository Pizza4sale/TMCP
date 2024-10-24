<?php
include("./includes/header.php");
include("./includes/script.php");
?>

    <body>
        <?php $page = 'login';?>

        <!--Start Navigation Bar-->
        <?php include './Includes/MobileNavBar.php';?>
        <!--End Navigation Bar-->


        <!--Start Navigation Bar @media 1200px-->
        <?php include './Includes/PcNavBar.php';?>
        <!--End Navigation Bar @media 1200px-->


        <!--Start Background Image-->
        <div class="bg-image-container">
            <div class="bg-image"></div>
        </div>
        <!--End Background Image-->

        
        <!--Start Login Panel-->
        <div class="login-page">
            <div class="form">
                <div class="login">
                    <div class="login-header">
                        <h3>LOGIN</h3>
                        <p>Please enter your credentials to login</p>
                    </div>
                </div>

                <form class="login-form" method="post" actions="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <input type="text" name="uname" placeholder="Username" value="<?php echo $uname;?>"/>
                    <input type="password" name="password" placeholder="Password"/>
                    <span class="Password-Error"><?php if($errCriteria != ""){echo "$errCriteria <br><br>";}?></span>
                    
                    <button>login</button>
                    <p class="message">Not registered? <a href="registration.php">Create an account</a></p>
                    <br><span class="forget-text"><a href="forgetPassword.php">Forgot Password?</a></span>
                    <!-- <p class="or-message"><b>OR</b></p> -->
                </form>

                <!-- <div class="social-login">
                    <span class="login-text">Login with: </span>
                    <span><a><i class="fab fa-facebook-f"></i></a></span>
                    <span><a><i class="fab fa-twitter"></i></a></span>
                    <span><a><i class="fab fa-google-plus-g"></i></a></span>
                </div> -->
            </div>
        </div>
        <!--End Login Panel-->

    </body>
</html>