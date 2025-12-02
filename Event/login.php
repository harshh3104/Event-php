<?php     
	session_start();
    include 'connection.php';    
    if(isset($_POST['login']))
    {
        $email = mysqli_real_escape_string($conn, $_POST['maill']);
        $pass  = mysqli_real_escape_string($conn, $_POST['pswd']);

        $str="SELECT * FROM users WHERE email='$email' AND password='$pass'";            
        $result=mysqli_query($conn,$str);
        $row=mysqli_fetch_array($result);
        $count=mysqli_num_rows($result);            
        
        if($count>0)
        {                
            $_SESSION['mail'] = $row['email'];
            $_SESSION['uname'] = $row['name'];
            $_SESSION['pass']  = $pass;

            header('location:index.php');                
            exit();
        }
        else
        {
            $invalid="<div class='alert alert-danger text-center py-2 mb-2'>Invalid email or password!</div>";
        }
    }
?>
<html>
<head>
    <title>Login | Eventura</title>
    <link rel="stylesheet" href="bootstrap.min.css">
	<script src="js/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
$(document).ready(function(){
	$("#loginForm").submit(function()
	{
		var f = $('#email').val().trim();
		var h = $('#passs').val();
		
		if(f == "")
		{
			$('.emailerror').text('Please enter your email.');
			$('#email').focus();
			return false;
		} 
		else if(!/\S+@\S+\.\S+/.test(f))
		{
			$('.emailerror').text('Please enter a valid email address.');
			$('#email').focus();
			return false;
		}
		else
		{
			$('.emailerror').text('');
		}
		
		if(h == "")
		{
			$('.passerror').text('Please enter your password.');
			$('#passs').focus();
			return false;
		}
		else if(h.length < 8)
		{
			$('.passerror').text('Password must be at least 8 characters.');
			$('#passs').focus();
			return false;
		}
		else
		{
			$('.passerror').text('');
		}
	});	

    // Toggle password visibility
    $('#togglePassword').on('click', function(){
        var passInput = $('#passs');
        var type = passInput.attr('type') === 'password' ? 'text' : 'password';
        passInput.attr('type', type);
        $(this).toggleClass('fa-eye fa-eye-slash');
    });
});
</script>

<style>
    body{
        margin: 0;
        padding: 0;
        min-height: 100vh;
        background: linear-gradient(135deg,#4f46e5,#ec4899);
        font-family: "Poppins", sans-serif;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .auth-wrapper {
        width: 100%;
        max-width: 450px;
        padding: 15px;
    }

    .auth-box {
        background: #ffffff;
        padding: 30px 30px 28px 30px;
        border-radius: 18px;
        box-shadow: 0px 14px 30px rgba(15,23,42,0.25);
        position: relative;
        overflow: hidden;
    }

    .auth-box::before {
        content: "";
        position: absolute;
        top: -40px;
        right: -40px;
        width: 100px;
        height: 100px;
        background: rgba(236,72,153,0.15);
        border-radius: 50%;
    }

    .auth-title {
        font-weight: 700;
        font-size: 26px;
        margin-bottom: 5px;
    }

    .auth-subtitle {
        font-size: 13px;
        color: #6b7280;
        margin-bottom: 20px;
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
        border-radius: 0 10px 10px 0;
        border: 1px solid #e5e7eb;
        box-shadow: none;
    }

    .form-control:focus {
        border-color: #4f46e5;
        box-shadow: 0 0 0 2px rgba(79,70,229,0.25);
    }

    .emailerror,
    .passerror {
        font-size: 12px;
        color: #dc2626;
    }

    .btn-login {
        border-radius: 999px;
        font-weight: 600;
        padding: 10px 0;
        font-size: 16px;
        background: linear-gradient(135deg,#4f46e5,#22c55e);
        border: none;
    }

    .btn-login:hover {
        opacity: .95;
    }

    .back-icon {
        color: #4b5563;
    }

    .back-icon:hover {
        color: #111827;
    }

    .forgot-link,
    .toggle-link {
        font-size: 13px;
    }

    .toggle-link {
        color: #4f46e5;
        font-weight: 500;
    }

    .toggle-link:hover {
        text-decoration: underline;
    }

    .small-divider {
        height: 1px;
        width: 100%;
        background: #e5e7eb;
        margin: 15px 0;
    }
</style>
</head>

<body>    
    <div class="auth-wrapper">
        <div class="auth-box">
            <form id="loginForm" method="POST">
                <div class="d-flex justify-content-between align-items-center mb-3">    
                    <div>
                        <div class="auth-title">Welcome Back</div>
                        <div class="auth-subtitle">Login to continue with Eventura</div>
                    </div>
                    
                    <div>
                        <a href="index.php" class="btn btn-outline-secondary btn-sm" 
                        style="border-radius: 999px; padding: 6px 15px; font-weight: 600;">
                        <i class="fa fa-home me-1"></i> Home
                        </a>
                    </div>
                </div>

                <?php 
                    if(isset($invalid)) {
                        echo $invalid;
                    }
                ?>

                <div class="mt-3">
                    <label class="form-label">Email</label>
                    <div class="input-group">
                        <span class="input-group-addon input-group-text">
                            <i class="fa fa-envelope"></i>
                        </span>
                        <input type="text" id="email" name="maill" class="form-control" placeholder="you@example.com">
                    </div>
                    <span class="emailerror"></span>
                </div>

                <div class="mt-3">
                    <label class="form-label">Password</label>
                    <div class="input-group">
                        <span class="input-group-addon input-group-text">
                            <i class="fa fa-lock"></i>
                        </span>
                        <input type="password" name="pswd" id="passs" class="form-control" placeholder="********">
                        <span class="input-group-addon input-group-text" style="cursor:pointer;">
                            <i class="fa fa-eye" id="togglePassword"></i>
                        </span>
                    </div>
                    <span class="passerror"></span>
                </div>

                <div class="d-flex justify-content-between align-items-center mt-2">
                    <a href="forgotpass.php" class="forgot-link">Forgot Password?</a>
                </div>

                <button type="submit" name="login" class="btn btn-success w-100 mt-4 btn-login">
                    Login
                </button>

                <div class="small-divider"></div>

                <p class="mt-2 text-center mb-0">
                    Don’t have an account? 
                    <a href="evereg.php"><span class="toggle-link">Register here</span></a>
                </p>		
            </form>
        </div>
    </div>
    <?php if (isset($_SESSION['log'])) {?>
	<script>
		Swal.fire({
			icon: 'success',
			title: 'Register Successful',
			text: 'Your account has been registered successfully.',
			confirmButtonColor: '#4c6fff'
		});
	</script>
	<?php } ?>
</body>
</html>