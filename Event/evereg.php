<?php 
	include 'connection.php';
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
		var a=$('#fname').val();
		var b=$('#utype').val();
		var c=$('#em').val();
		var d=$('#pass').val();
		var e=$('#cpass').val();
	
	if(a=="")
	{
		$('.nameerror').text('Enter Your First Name!');
		$('.nameerror').css('color','red');
		$('#fname').focus();
		return false;
	}
	else 
	{
		$('.nameerror').text('');
	}
	if(b == null)
	{
		
		$('.usererror').text('Please select your User Type');
		$('.usererror').css('color','red');
		return false;
	}
	else
	{
		$('.usererror').text('');
	}
    if(c=="")
	{
		$('.emailerror').text('Enter Your Email!');
		$('.emailerror').css('color','red');
		$('#em').focus();
		return false;
    } 
	else if(!/\S+@\S+\.\S+/.test(c))
	{
		$('.emailerror').text('Incorrect Email format!');
		$('.emailerror').css('color','red');
		$('#em').focus();
		return false;
    }
	else
	{
		$('.emailerror').text('');
	}
    if(d.length < 8)
	{
		$('.passerror').text('Password must be at least 8 characters!');
		$('.passerror').css('color','red');
		$('#pass').focus();
		return false;
    }
	else
	{
		$('.passerror').text('');
	}
    if(e !== d)
	{
		$('.cpasserror').text('Password not matched!');
		$('.cpasserror').css('color','red');
		$('#cpass').focus();
		return false;
    }
	else
	{
		$('.cpasserror').text('');
	}
	});
	
});
</script>

<style>
	body{
		background: pink;
		font-family: cursive;
		font-weight; bold;
		display: flex;
		justify-content: center;
		align-items: center;
		/* height: 100vh; */
	}
	.auth-box {
		background: #fff;
		padding: 25px;
		border-radius: 10px;
		box-shadow: 0px 4px 15px rgba(0,0,0,0.1);
		width: 500px;
		/* height: 700px; */
	}
	.toggle-link {
		color: #007bff;
		cursor: pointer;
	}
	.toggle-link:hover {
		text-decoration: underline;
	}
</style>
</head>
<body>
	<?php
		if(isset($_POST['register']))
		{
			//$usertype = isset($_POST['usertype']) ? $_POST['usertype'] : '';
			$str="insert into users values(NULL,'".$_POST['fn']."','".$_POST['email']."','".$_POST['pwd']."','".$_POST['con']."','".$_POST['usertype']."')";
			$res=mysqli_query($conn,$str);
			if(isset($res))
			{
				header('location:login.php');
			}
		}	
	?>
<div class="auth-box">
    <form id="registerForm" method="POST">
        <a href="index.php"><i class="fa fa-arrow-left" style="font-size:36px; color:black;"></i></a>
        <h3 class="mt-4 text-center">Register</h3>	
        <div class="mt-4">
            <label class="form-label">Full Name</label>
            <input type="text" id="fname" name="fn" class="form-control" placeholder="Enter your full name">
        </div>
		
		<span class="nameerror"></span>
		
		<div class="mt-4">
            <label class="form-label">User Type</label>
              <select name="usertype" id="utype" class="form-control">
                <option disabled selected>--- Select User Type ---</option>
                <option value="User">User</option>
                <option value="Admin">Admin</option>
            </select>
        </div>
		
		<span class="usererror"></span>
		
        <div class="mt-4">
            <label class="form-label">Email</label>
            <input type="text" id="em" name="email" class="form-control" placeholder="Enter your Email">
        </div>
		
		<span class="emailerror"></span>
		
		<div class="mt-4">
            <label class="form-label">Password</label>
            <input type="password" id="pass" name="pwd" class="form-control" placeholder="Enter your Password">
        </div>
		
		<span class="passerror"></span>
		
		<div class="mt-4">
            <label class="form-label">Confirm Password</label>
            <input type="password"  id="cpass"  name="con" class="form-control" placeholder="Enter your Confirm Password">
        </div>
		
		<span class="cpasserror"></span>
		
		<br>
		
        <button type="submit" name="register" class="btn btn-primary w-100">Register</button>
		
        <p class="mt-4 text-center">
            Already have an account? <a href="login.php"><span class="toggle-link" id="showLogin">Login here</span></a>
        </p>
		
    </form>
	
</div>
</body>
</html>
