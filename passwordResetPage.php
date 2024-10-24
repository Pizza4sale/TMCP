<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor\phpmailer\phpmailer\src\Exception.php';
require 'vendor\phpmailer\phpmailer\src\PHPMailer.php';
require 'vendor\phpmailer\phpmailer\src\SMTP.php';

session_start();

if(isset($_POST['send'])){

    $email = $_POST['email'];
  

include("connection.php");

        $unc = rand();  
        $hash = password_hash($unc, PASSWORD_DEFAULT); 

   $sql = "UPDATE user SET pass='$hash' WHERE email = '".$email."' "  ; 
                    $retval = mysqli_query($conn,$sql);
                    if(! $retval )
                    {
                        die('Could not enter data: ' . mysql_error());
                    }

$subject = "Password Reset Request for Your TMCP Account!";
$message = "<p>Good day,</p>

<p>This is a computer-generated message from the TMCP system. You have requested a password reset for your TMCP account.</p>

<p>Your new temporary password is: <strong>" . $unc . "</strong></p>

<p>Please use this temporary password to log in to your account. After logging in, we recommend changing your password to something more secure.</p>

<p>If you did not initiate this password reset request, please ignore this email.</p>

<p>Thank you for using TMCP!</p>

<p>Best regards,<br>The TMCP Team</p>";


    //Load composer's autoloader

    $mail = new PHPMailer(true);                            
    try {
        //Server settings
        $mail->isSMTP();                                     
        $mail->Host = 'smtp.gmail.com';                      
        $mail->SMTPAuth = true;                             
        $mail->Username = 'tresmariascakeandpastries@gmail.com';     
        $mail->Password = 'oxwl ihhe cuwn tewk';             
        $mail->SMTPOptions = array(
            'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
            )
        );                         
        $mail->SMTPSecure = 'ssl';                           
        $mail->Port = 465;                                   

        //Send Email
        $mail->setFrom('jerzycinense1@gmail.com');
        
        //Recipients
        $mail->addAddress($email);              
        $mail->addReplyTo('jerzycinense1@gmail.com');
        
        //Content
        $mail->isHTML(true);                                  
        $mail->Subject = $subject;
        $mail->Body    = $message;

        $mail->send();
        
       $_SESSION['result'] = 'Message has been sent';
       $_SESSION['status'] = 'ok';
    } catch (Exception $e) {
       $_SESSION['result'] = 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo;
       $_SESSION['status'] = 'error';
    }
    
 
}
?>


<!DOCTYPE html>
<html lang="en-MU">
    <head>
        <meta charset="utf-8">
        <title>TMCP | CHECK YOU EMAIL</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--CSS File-->
        <link rel="stylesheet" type="text/css" href="Common.css">
        <link rel="stylesheet" type="text/css" href="Account.css">
        <!-- Font Awesome -->
        <script src="https://kit.fontawesome.com/0e16635bd7.js" crossorigin="anonymous"></script>
        <!--BOXICONS-->
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <!-- Animate CSS -->
        <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    </head>

    <body>
        <?php $page = 'thankyouregistration';?>

       


        <div class="mail-sent-group">
            <div class="mail-sent-container">
                <div class="mail-sent-image-container">
                    <div class="mail-forget-image"></div>
                </div>

                <div class="mail-sent-text">
                    <h1>Check your email!</h1>
                    <span class="message">Hooray! We sent you an email with your password. </span>
                    <br><br>
                    <span class="tip">Tip: If you have not received the email, please check your Spam or Trash folder.</span>
                    <a href="login.php"> Go Back to Login Page </a>
                </div>
            </div>
        </div>
    </body>
</html>