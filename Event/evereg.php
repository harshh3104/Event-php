<?php 
    session_start();
    include 'connection.php';	
    if(isset($_POST['register']))
    {
        $utype="User";
        $str = "INSERT INTO users VALUES(NULL,'".$_POST['fn']."','".$_POST['email']."','".$_POST['pwd']."','".$_POST['con']."','".$utype."')";
        $res = mysqli_query($conn,$str);
        if($res)
        {
            $_SESSION['log'] = true;
            header('location:login.php');
            exit();
        }
    }		
?>
<html>
<head>
    <title>Registration | Eventura</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="js/jquery.min.js"></script>

<script>
$(document).ready(function(){
    $("#registerForm").submit(function()
    {
        var a = $('#fname').val().trim();
        var c = $('#em').val().trim();
        var d = $('#pass').val();
        var e = $('#cpass').val();
        var isValid = true;

        if(a == "")
        {
            $('.nameerror').text('Enter your full name.');
            $('#fname').focus();
            isValid = false;
        }
        else 
        {
            $('.nameerror').text('');
        }
        
        if(c == "")
        {
            $('.emailerror').text('Enter your email.');
            $('#em').focus();
            isValid = false;
        } 
        else if(!/\S+@\S+\.\S+/.test(c))
        {
            $('.emailerror').text('Incorrect email format.');
            $('#em').focus();
            isValid = false;
        }
        else
        {
            $('.emailerror').text('');
        }

        if(d.length < 8)
        {
            $('.passerror').text('Password must be at least 8 characters.');
            $('#pass').focus();
            isValid = false;
        }
        else
        {
            $('.passerror').text('');
        }

        if(e !== d || e === "")
        {
            $('.cpasserror').text('Password does not match.');
            $('#cpass').focus();
            isValid = false;
        }
        else
        {
            $('.cpasserror').text('');
        }

        return isValid;
    });

    $('#togglePass').on('click', function(){
        var input = $('#pass');
        var type = input.attr('type') === 'password' ? 'text' : 'password';
        input.attr('type', type);
        $(this).toggleClass('fa-eye fa-eye-slash');
    });

    $('#toggleCPass').on('click', function(){
        var input = $('#cpass');
        var type = input.attr('type') === 'password' ? 'text' : 'password';
        input.attr('type', type);
        $(this).toggleClass('fa-eye fa-eye-slash');
    });
});
</script>

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
        max-width: 520px;
        padding: 15px;
    }

    .auth-box {
        background: #fff;
        padding: 28px 30px 26px 30px;
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
        width: 100px;
        height: 100px;
        background: rgba(236,72,153,0.2);
        border-radius: 50%;
    }

    .auth-title {
        font-size: 26px;
        font-weight: 700;
    }
    .auth-subtitle {
        font-size: 13px;
        color: #6b7280;
    }

    .toggle-link {
        color: #4f46e5;
        cursor: pointer;
        font-weight: 500;
    }
    .toggle-link:hover {
        text-decoration: underline;
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

    select.form-control {
        border-radius: 10px;
    }

    .form-control:focus {
        border-color: #4f46e5;
        box-shadow: 0 0 0 2px rgba(79,70,229,0.25);
    }

    .error-text {
        font-size: 12px;
        color: #dc2626;
    }

    .btn-register {
        border-radius: 999px;
        font-weight: 600;
        padding: 10px 0;
        font-size: 16px;
        background: linear-gradient(135deg,#4f46e5,#22c55e);
        border: none;
    }

    .btn-register:hover {
        opacity: .95;
    }

    .small-divider {
        height: 1px;
        width: 100%;
        background: #e5e7eb;
        margin: 18px 0 12px 0;
    }
</style>
</head>
<body>
    <div class="auth-wrapper">
        <div class="auth-box">
            <form id="registerForm" method="POST">                
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div>
                        <div class="auth-title">Create Account</div>
                        <div class="auth-subtitle">Register to start booking and managing events.</div>
                    </div>
                    <div>
                        <a href="index.php" class="btn btn-outline-secondary btn-sm" style="border-radius: 999px; padding: 6px 15px; font-weight: 600;">
                        	<i class="fa fa-home me-1"></i> Home
                        </a>
                    </div>
                </div>
                
                <div class="mt-3">
                    <label class="form-label">Name</label>
                    <div class="input-group">
                        <span class="input-group-addon input-group-text">
                            <i class="fa fa-user"></i>
                        </span>
                        <input type="text" id="fname" name="fn" class="form-control" placeholder="Enter your name">
                    </div>
                    <span class="nameerror error-text"></span>
                </div>
                                        
                <div class="mt-3">
                    <label class="form-label">Email</label>
                    <div class="input-group">
                        <span class="input-group-addon input-group-text">
                            <i class="fa fa-envelope"></i>
                        </span>
                        <input type="text" id="em" name="email" class="form-control" placeholder="Enter your email">
                    </div>
                    <span class="emailerror error-text"></span>
                </div>
                
                <div class="mt-3">
                    <label class="form-label">Password</label>
                    <div class="input-group">
                        <span class="input-group-addon input-group-text">
                            <i class="fa fa-lock"></i>
                        </span>
                        <input type="password" id="pass" name="pwd" class="form-control" placeholder="Enter your password">
                        <span class="input-group-addon input-group-text" style="cursor:pointer;">
                            <i class="fa fa-eye" id="togglePass"></i>
                        </span>
                    </div>
                    <span class="passerror error-text"></span>
                </div>

                <div class="mt-3">
                    <label class="form-label">Confirm Password</label>
                    <div class="input-group">
                        <span class="input-group-addon input-group-text">
                            <i class="fa fa-check"></i>
                        </span>
                        <input type="password" id="cpass" name="con" class="form-control" placeholder="Re-enter your password">
                        <span class="input-group-addon input-group-text" style="cursor:pointer;">
                            <i class="fa fa-eye" id="toggleCPass"></i>
                        </span>
                    </div>
                    <span class="cpasserror error-text"></span>
                </div>

                <button type="submit" name="register" class="btn btn-primary w-100 mt-4 btn-register">Register</button>
            
                <div class="small-divider"></div>

                <p class="mt-2 text-center mb-0">
                    Already have an account? 
                    <a href="login.php"><span class="toggle-link" id="showLogin">Login here</span></a>
                </p>
            </form>
        </div>
    </div>
</body>
</html>