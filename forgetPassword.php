 
<?php
include("./includes/header.php");
include("./includes/script.php");
?>
 
    <body>
  
        <!--Start Navigation Bar @media 1200px-->
       
        <!--End Navigation Bar @media 1200px-->

        <!--Start Background Image-->
        <div class="bg-image-container">
            <div class="bg-image-forget"></div>
        </div>
        <!--End Background Image-->

        <!--Start ForgetPassword Panel-->
        <div class="login-page">
            <div class="form">
                <div class="login">
                    <div class="login-header">
                        <h3>FORGOT PASSWORD</h3>
                        <p>Enter your email below</p>
                    </div>
                </div>

                <form class="login-form" method="post" action="passwordResetPage.php">
                    <input type="text" name="email" placeholder="Email"/>
                    
                   
                    <input type="submit" name="send" value="Submit">
                    
                </form>
            </div>
        </div>
        <!--End Login Panel-->

        
    </body>
</html>