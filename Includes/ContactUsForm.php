<?php include "./AdditionalPHP/checkAccess.php"; ?>
<head>
    <script defer src="validateContactInput.js"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>




<?php
include("connection.php");
include("./AdditionalPHP/checkAccess.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $recaptcha_secret = "6Lf_tWYpAAAAAFXw2FZkx55OPm6_v5AdqQB-gxRL";
    $recaptcha_response = $_POST['g-recaptcha-response'];

    $recaptcha_url = "https://www.google.com/recaptcha/api/siteverify";
    $recaptcha_data = [
        'secret' => $recaptcha_secret,
        'response' => $recaptcha_response,
    ];

    $recaptcha_options = [
        'http' => [
            'method' => 'POST',
            'content' => http_build_query($recaptcha_data),
        ],
    ];

    $recaptcha_options['http']['header'] = 'Content-type: application/x-www-form-urlencoded';
$recaptcha_context = stream_context_create($recaptcha_options);
$recaptcha_result = file_get_contents($recaptcha_url, false, $recaptcha_context);

    $recaptcha_data = json_decode($recaptcha_result, true);

    if ($recaptcha_data['success']) {
        // Proceed with your form processing
        $customerName = $_POST['customerName'];
        $customerEmail = $_POST['customerEmail'];
        $customerPhone = $_POST['customerPhone'];
        $orderNumber = $_POST['orderNumber'];
        $customerMessage = $_POST['customerMessage'];

        $query = "INSERT INTO  contact_us_message (name,email,phone,ordernumber,client_message,status,date) VALUES ('$customerName','$customerEmail','$customerPhone','$orderNumber','$customerMessage','PENDING',NOW())";
        $query_run = mysqli_query($conn, $query);

        if ($query_run) {
            ?>
            <script>
                alert("Successfully Send Message!");
                window.location.href = 'contact.php';
            </script>
            <?php
        } else {
            echo "Error in query execution.";
        }
    } else {
        echo "reCAPTCHA verification failed. Please try again.";
    }
}
?>


  


<div class="section-container">

<div id="contact-submission" class="contact-section">
    <div class="contact-us">
        <div class="subtitle">
            <h2>CONTACT US</h2>
            <p>Our Company is the best, meet the creative team that never sleeps. Say something to us we will answer to you.</p>
            <span class="send-input-message"></span>
            <span id="sendError" class="input-error"></span>
        </div>

        <form action="contact.php" method="POST" onsubmit="return validateForm()">

            <label for="customerName"> <span style="color:white;font-size:15px; " >NAME</span> <em>&#x2a;</em></label>
            <span id="nameError"class="input-error"></span>
            <input id="customerName" name="customerName" required type="text" />

            <label for="customerEmail"><span style="color:white;font-size:15px; " >EMAIL</span> <em>&#x2a;</em></label>
            <span id="emailError" class="input-error"></span>
            <input id="customerEmail" name="customerEmail" required type="email" />

            <label for="customerPhone"><span style="color:white;font-size:15px; " >PHONE</span></label>
            <span id="phoneError" class="input-error"></span>
            <input id="customerPhone" name="customerPhone" type="tel"/>
            
            <label for="orderNumber"><span style="color:white;font-size:15px; " >ORDER NUMBER</span></label>
            <input id="orderNumber" name="orderNumber" type="text" />
            
            <label for="customerNote"><span style="color:white;font-size:15px; " >YOUR MESSAGE</span> <em>&#x2a;</em></label>
            <span class="input-error"></span>
            <textarea id="customerNote" name="customerMessage" required rows="4"></textarea>
            <br>

<div class="g-recaptcha" data-sitekey="6Lf_tWYpAAAAAFXw2FZkx55OPm6_v5AdqQB-gxRL" data-action="CONTACT_FORM"></div>

    <div class="push-button">
        <span><button id="submit" name="submit">SUBMIT</button></span>
    </div>
</form>
    </div>
</div>
</div>

<script defer src="validateContactInput.js"></script>
<script>
    function validateForm() {
        // Your existing validation logic

        // Check if reCAPTCHA is validated
        var recaptchaResponse = grecaptcha.getResponse();
        if (recaptchaResponse.length === 0) {
            alert("Please complete the reCAPTCHA");
            return false;
        }

        return true; // Submit the form if all validations pass
    }
</script>
