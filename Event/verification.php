<?php
    session_start();
    include 'connection.php';

    // PHPMailer uses (same as in forgot password)
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';

    $valid = "";
    $msg   = "";

    // VERIFY OTP
    if(isset($_POST['verotp']))
    {
        $otp1 = $_POST["otp"] ?? "";

        // Check if OTP expired
        if(isset($_SESSION['otp_exp']) && time() > $_SESSION['otp_exp']) {
            $valid = "<div class='alert alert-danger text-center mt-3'>OTP expired! Please resend OTP.</div>";
        }
        else if($otp1 === (string)($_SESSION['otp'] ?? ''))
        {
            // Correct OTP -> go to newpass
            header("Location: newpass.php");
            exit;
        }
        else
        {                
            $valid = "<div class='alert alert-danger text-center mt-3'>Invalid OTP!</div>";
        }
    }

    // RESEND OTP
    if(isset($_POST['resend']))
    {
        if(isset($_SESSION['email'])) {

            $email = $_SESSION['email'];

            // Generate new OTP and expiry
            $otp = rand(100000, 999999);
            $_SESSION['otp'] = $otp;
            $_SESSION['otp_exp'] = time() + (1 * 60); // 1 minute

            // Send email via PHPMailer
            $mail = new PHPMailer(true);

            try {
                $mail->isSMTP();
                $mail->Host       = 'smtp.gmail.com';
                $mail->SMTPAuth   = true;
                $mail->Username   = 'crickfolio31@gmail.com'; // your SMTP email
                $mail->Password   = 'zkxs tqnm rgwb vysz';    // your app password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port       = 587;

                $mail->setFrom('yourgmail@gmail.com', 'OTP For Password Reset');
                $mail->addAddress($email);

                $mail->isHTML(true);
                $mail->Subject = 'OTP For Reset Your Password (Resent)';
                $mail->Body    = 'Your new OTP for password reset is: <b>' . $otp . '</b>. It expires in 1 minute.';
                $mail->AltBody = 'Your new OTP for password reset is: ' . $otp;

                $mail->send();

                $msg = "<div class='alert alert-info text-center mt-2'>New OTP has been sent to your email!</div>";
            } catch (Exception $e) {
                $msg = "<div class='alert alert-danger text-center mt-2'>Resend failed. Error: {$mail->ErrorInfo}</div>";
            }
        } else {
            $msg = "<div class='alert alert-danger text-center mt-2'>Session expired. Please try Forgot Password again.</div>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Verify OTP | Eventura</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <script src="jquery.min.js"></script>
    <style>
        body{
            margin: 0;
            min-height: 100vh;
            background: linear-gradient(135deg,#4f46e5,#ec4899);
            font-family: "Poppins", sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .auth-wrapper {
            width: 100%;
            max-width: 480px;
            padding: 15px;
        }
        .auth-box {
            background: #fff;
            padding: 30px 28px 26px 28px;
            border-radius: 18px;
            box-shadow: 0 14px 30px rgba(15,23,42,0.25);
            position: relative;
            overflow: hidden;
        }
        .auth-box::before {
            content: "";
            position: absolute;
            top: -35px;
            right: -35px;
            width: 90px;
            height: 90px;
            background: rgba(236,72,153,0.22);
            border-radius: 50%;
        }
        .auth-title {
            font-size: 24px;
            font-weight: 700;
        }
        .auth-subtitle {
            font-size: 13px;
            color: #6b7280;
        }
        .otp-box {
            width: 45px;
            height: 45px;
            font-size: 22px;
            text-align: center;
            border: 2px solid #e5e7eb;
            border-radius: 10px;
            outline: none;
        }
        .otp-box:focus {
            border-color: #4f46e5;
            box-shadow: 0px 0px 5px rgba(79,70,229,0.5);
        }
        .btn-verify {
            border-radius: 999px;
            font-weight: 600;
            padding: 10px 0;
            font-size: 16px;
        }
    </style>
</head>
<body>
<div class="auth-wrapper">
    <div class="auth-box">
        <?php
            if(!empty($msg))  echo $msg;
            if(!empty($valid)) echo $valid;
        ?>
        <form id="VerifyForm" method="POST">
            <div class="text-center mb-3">
                <div class="auth-title">Verify OTP</div>
                <div class="auth-subtitle mt-1">
                    Enter the 6-digit OTP sent to your registered email address.
                </div>
            </div>

            <div class="mt-3">
                <label class="form-label fw-semibold">Enter OTP</label>
                <div class="d-flex justify-content-between">
                    <input type="text" maxlength="1" class="otp-box" id="otp1">
                    <input type="text" maxlength="1" class="otp-box" id="otp2">
                    <input type="text" maxlength="1" class="otp-box" id="otp3">
                    <input type="text" maxlength="1" class="otp-box" id="otp4">
                    <input type="text" maxlength="1" class="otp-box" id="otp5">
                    <input type="text" maxlength="1" class="otp-box" id="otp6">
                </div>
                <input type="hidden" name="otp" id="otp">
            </div>

            <button type="submit" name="verotp" class="btn btn-success w-100 mt-4 btn-verify">
                Verify OTP
            </button>

            <button type="submit" name="resend" class="btn btn-outline-warning w-100 mt-2 btn-verify">
                Resend OTP
            </button>

            <p class="text-center mt-3 mb-0" style="font-size:13px;">
                Enter the OTP within <strong>1 minute</strong>. After that, please resend OTP.
            </p>
            
            <p class="text-center mt-3 small-text mb-0">
                Entered wrong email? <a href="forgotpass.php">Go back</a>
            </p>
        </form>
    </div>
</div>

<script>
    // auto-hide alerts
    setTimeout(function() {
        let alertBox = document.querySelector(".alert");
        if (alertBox) {
            alertBox.style.display = "none";
        }
    }, 5000);

    // OTP input behavior
    const boxes = document.querySelectorAll(".otp-box");
    const finalOtp = document.getElementById("otp");

    boxes.forEach((box, index) => {
        box.addEventListener("input", () => {
            if (box.value.length === 1 && index < 5) {
                boxes[index + 1].focus();
            }
            collectOtp();
        });

        box.addEventListener("keydown", (e) => {
            if (e.key === "Backspace" && box.value === "" && index > 0) {
                boxes[index - 1].focus();
            }
        });
    });

    function collectOtp() {
        let otp = "";
        boxes.forEach((box) => otp += box.value);
        finalOtp.value = otp; // store full otp in hidden input
    }
</script>
</body>
</html>