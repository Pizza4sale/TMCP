
<?php 
    include ("includes/head.php");
?>
<body class="login-page">
    <div class="login-header box-shadow">
        <div class="container-fluid d-flex justify-content-between align-items-center">
        </div>
    </div>
    <div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
        <div class="container">
        </div>
        <div class="col-md-6 col-lg-5">
            <div class="login-box bg-white box-shadow border-radius-10">
                <div class="login-title">
                    <h2 class="text-center text-primary">Login To TMCP</h2>
                </div>
                <form method="post" action="login.php">
                    <div class="select-role">
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        </div>
                    </div>
                    <div class="input-group custom">
                        <input type="text" name="uname" class="form-control form-control-lg" placeholder="Username" />
                        <div class="input-group-append custom">
                            <span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
                        </div>
                    </div>
                    <div class="input-group custom">
                    <input type="password" name="pass" class="form-control form-control-lg" placeholder="**********" autocomplete="current-password">
                        <div class="input-group-append custom">
                            <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
                        </div>
                    </div>
                    <div class="row pb-30">
                        <div class="col-6">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customCheck1" />
                                <label class="custom-control-label" for="customCheck1">Remember</label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="forgot-password">
                                <a href="forgotpass.php">Forgot Password</a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="input-group mb-0">
                                <input class="btn btn-primary btn-lg btn-block" type="submit" name="Sign_in" value="Sign In" />
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php 
    include ("includes/script.php");
?>
<?php
include("includes/db.php");


if (isset($_POST['Sign_in'])) {
    $uname = $_POST['uname'];
    $pass = $_POST['pass'];

    // Prepared statement to prevent SQL injection
    $stmt = $con->prepare("SELECT * FROM user WHERE uname = ? AND isAdmin = 1");
    $stmt->bind_param("s", $uname);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();

        // Verify password
        if (password_verify($pass, $row['pass'])) {
            // Regenerate session ID for security
            session_regenerate_id();

            $_SESSION['uname'] = $uname;

            // Redirect to the admin panel
            echo "<script>window.open('index.php', '_self')</script>";
        } else {
            echo "<script>alert('Incorrect Password. Please try again.')</script>";
        }
    } else {
        echo "<script>alert('Username not found or you do not have admin access.')</script>";
    }

    $stmt->close();
}

// Check if the user is an admin, otherwise log them out
if (isset($_SESSION['uname'])) {
    $logged_in_user = $_SESSION['uname'];
    $stmt = $con->prepare("SELECT * FROM user WHERE uname = ? AND isAdmin = 1");
    $stmt->bind_param("s", $logged_in_user);
    $stmt->execute();
    $admin_check = $stmt->get_result();

    if ($admin_check->num_rows != 1) {
        // Not an admin, log out and destroy session
        session_destroy();
        echo "<script>window.open('login.php', '_self')</script>";
    }

    $stmt->close();
}
?>
