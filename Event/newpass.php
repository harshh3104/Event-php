<?php 
    session_start();
    include 'connection.php';

    $logMsg = "";

    if(isset($_POST['newpass']))
    {
        $pass  = $_POST["pass"];
        $cpass = $_POST["cpass"];

        $str = "UPDATE users 
                SET password='$pass', cpassword='$cpass' 
                WHERE email='".$_SESSION['email']."'";

        if (mysqli_query($conn,$str)) {
            $logMsg = "<div class='alert alert-success text-center mt-3'>
                            Password updated successfully! 
                            <a href='login.php' class='alert-link'>Login now</a>.
                       </div>";
        } else {
            $logMsg = "<div class='alert alert-danger text-center mt-3'>
                            Error updating password. Please try again.
                       </div>";
        }
    }
?>
<html>
<head>
    <title>New Password | Eventura</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="js/jquery.min.js"></script>

<script>
$(document).ready(function(){
	$("#NewForm").submit(function()
	{
		var f = $('#pass').val();
		var h = $('#cpass').val();
        var ok = true;
		
        if(f=="")
		{
			$('.passerror').text('Password is required.');
			$('#pass').focus();
			ok = false;
		}
        else if(f.length != 8)
        {
            $('.passerror').text('Password must be exactly 8 characters.');
			$('#pass').focus();
			ok = false;
        }
		else
		{
			$('.passerror').text('');
		}

		if(h=="")
		{
			$('.cpasserror').text('Enter confirm password.');
			$('#cpass').focus();
			ok = false;
		}
        else if(f!=h)
        {
            $('.cpasserror').text('Passwords do not match.');
			$('#cpass').focus();
			ok = false;
        }
        else
		{
			$('.cpasserror').text('');
		}
        return ok;
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
        max-width: 460px;
        padding: 15px;
    }
    .auth-box {
        background: #fff;
        padding: 30px 26px 24px 26px;
        border-radius: 18px;
        box-shadow: 0 16px 32px rgba(15,23,42,0.35);
        position: relative;
        overflow: hidden;
    }
    .auth-box::before {
        content: "";
        position: absolute;
        top: -30px;
        right: -30px;
        width: 90px;
        height: 90px;
        background: rgba(236,72,153,0.2);
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
    .form-control {
        border-radius: 10px;
        border: 1px solid #e5e7eb;
        box-shadow: none;
    }
    .form-control:focus {
        border-color: #4f46e5;
        box-shadow: 0 0 0 2px rgba(79,70,229,0.25);
    }
    .error-text {
        font-size: 12px;
        color: #dc2626;
    }
    .btn-submit {
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
        <form id="NewForm" method="POST">
            <div class="text-center mb-3">
                <div class="auth-title">Set New Password</div>
                <div class="auth-subtitle mt-1">
                    Choose a new password for your Eventura account.
                </div>
            </div>

            <div class="mt-3">
                <label class="form-label">New Password</label>
                <div class="input-group">
                    <input type="password" id="pass" name="pass" class="form-control" placeholder="Enter new password">
                    <span class="input-group-addon input-group-text" style="cursor:pointer;">
                        <i class="fa fa-eye" id="togglePass"></i>
                    </span>
                </div>
                <span class="passerror error-text"></span>
            </div>	 
        
            <div class="mt-3">
                <label class="form-label">Confirm Password</label>
                <div class="input-group">
                    <input type="password" name="cpass" id="cpass" class="form-control" placeholder="Re-enter new password">
                    <span class="input-group-addon input-group-text" style="cursor:pointer;">
                        <i class="fa fa-eye" id="toggleCPass"></i>
                    </span>
                </div>
                <span class="cpasserror error-text"></span>
            </div>

            <button type="submit" name="newpass" class="btn btn-success w-100 mt-4 btn-submit">
                Submit
            </button>

            <?php 
                if(!empty($logMsg)) {
                    echo $logMsg;
                }
            ?>
        </form>
    </div>
</div>
</body>
</html>
