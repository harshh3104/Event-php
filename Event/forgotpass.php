<?php
	session_start();
    include 'connection.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';
    
    if(isset($_POST['Forpass']))
    {
        $email = $_POST['maill'];

        $str    = "SELECT * FROM users WHERE email='".$_POST['maill']."'";
        $result = mysqli_query($conn,$str);
        $row    = mysqli_fetch_array($result);
        $count  = mysqli_num_rows($result);
        
        if($count > 0)
        {
            $otp = rand(100000, 999999);
            $_SESSION['otp']     = $otp;
            $_SESSION['otp_exp'] = time() + (1 * 60);
            $_SESSION['email']   = $email;
            
            $mail = new PHPMailer(true);

            try {
                $mail->isSMTP();
                $mail->Host       = 'smtp.gmail.com';
                $mail->SMTPAuth   = true;
                $mail->Username   = 'crickfolio31@gmail.com';
                $mail->Password   = 'zkxs tqnm rgwb vysz';
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port       = 587;

                $mail->setFrom('yourgmail@gmail.com', 'OTP For Password Reset');
                $mail->addAddress($email);

                $mail->isHTML(true);
                $mail->Subject = 'OTP For Reset Your Password';
                $mail->Body    = 'Your OTP for password reset is: <b>' . $otp . '</b>. It expires in 1 minutes.';
                $mail->AltBody = 'Your OTP for password reset is: ' . $otp;

                $mail->send();
                $otpSent = true;

            } catch (Exception $e) {
                $invalid = "<div class='alert alert-danger text-center mt-3'>Message could not be sent. Mailer Error: {$mail->ErrorInfo}</div>";
            }
        }
        else
        {
            $invalid = "<div class='alert alert-danger text-center mt-3'>Invalid email!</div>";
        }
    }
?>
<html>
<head>
    <title>Forgot Password | Eventura</title>
    <link rel="stylesheet" href="bootstrap.min.css">
	<script src="js/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
            max-width: 460px;
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
        .form-label {
            font-weight: 500;
            font-size: 14px;
        }
        .input-group-text {
            background: #f3f4f6;
            border: 1px solid #e5e7eb;
        }
        .form-control {
            border: 1px solid #e5e7eb;
            border-radius: 0 10px 10px 0;
            box-shadow: none;
        }
        .form-control:focus {
            border-color: #4f46e5;
            box-shadow: 0 0 0 2px rgba(79,70,229,0.25);
        }
        .emailerror {
            font-size: 12px;
            color: #dc2626;
        }
        .btn-forgot {
            border-radius: 999px;
            font-weight: 600;
            padding: 10px 0;
            font-size: 16px;
            background: linear-gradient(135deg,#4f46e5,#22c55e);
            border: none;
        }
        .btn-forgot:hover {
            opacity: .95;
        }
        .back-link {
            font-size: 13px;
        }
    </style>

    <script>
        $(document).ready(function(){
            $("#PassForm").submit(function()
            {
                var f = $('#email').val().trim();
                
                if(f=="")
                {
                    $('.emailerror').text('Enter your email.');
                    $('#email').focus();
                    return false;
                } 
                else if(!/\S+@\S+\.\S+/.test(f))
                {
                    $('.emailerror').text('Incorrect email format.');
                    $('#email').focus();
                    return false;
                }
                else
                {
                    $('.emailerror').text('');
                }
            });	
        });
    </script>
</head>
<body>
    <div class="auth-wrapper">
        <div class="auth-box">
            <form id="PassForm" method="POST">
                <div class="mb-3 text-center">
                    <div class="auth-title">Forgot Password</div>
                    <div class="auth-subtitle mt-1">
                        Enter your registered email and we’ll send you an OTP to reset your password.
                    </div>
                </div>

                <div class="mt-3">
                    <label class="form-label">Email Address</label>
                    <div class="input-group">
                        <span class="input-group-addon input-group-text">
                            <i class="fa fa-envelope"></i>
                        </span>
                        <input type="text" id="email" name="maill" class="form-control" placeholder="you@example.com">
                    </div>
                    <span class="emailerror"></span>
                </div>

                <?php 
                    if(isset($invalid)) {
                        echo $invalid;
                    }
                ?>

                <button type="submit" name="Forpass" class="btn btn-success w-100 mt-4 btn-forgot">
                    Generate OTP
                </button>

                <p class="text-center mt-3 mb-0 back-link">
                    Remember your password? <a href="login.php">Back to Login</a>
                </p>
            </form>
        </div>
    </div>

    <?php if(isset($otpSent) && $otpSent == true): ?>
    <script>
    Swal.fire({
        title: "OTP Sent!",
        text: "An OTP has been sent to your email address.",
        icon: "success",
        confirmButtonText: "OK",
        confirmButtonColor: '#0d6efd'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = "verification.php";
        }
    });
    </script>
    <?php endif; ?>

</body>
</html>