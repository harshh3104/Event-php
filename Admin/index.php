<?php
   session_start();
   include 'connection.php';
?>

<!DOCTYPE html>
<html>
   <head>
      <title>Login | Admin</title>
      <?php 
         include 'links.php';
      ?>
      <script src="js/jquery.min.js"></script>
   </head>
   <style>
      .toggle-password 
      {
         position: absolute;
         right: 15px;
         top: 50%;
         transform: translateY(-50%);
         cursor: pointer;
         color: #999;
      }
      .fa-eye-slash 
      {
         font-size: large;
         display: ruby-text;
         color: #555;
      }
      .fa-eye
      {
         font-size: large;
         display: ruby-text;
      }
   </style>
<script>
$(document).ready(function(){
	$("#loginForm").submit(function()
	{
		var f=$('#em').val();
		var h=$('#pass').val();
		
		if(f=="")
		{
			$('.emailerror').text('Enter Your Email!');
			$('.emailerror').css('color','red');	
			$('#em').focus();
			return false;
		} 
		else if(!/\S+@\S+\.\S+/.test(f))
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
		if(h=="")
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
	});
   
   // New JavaScript to remove errors on click
   $('#em').on('keyup', function() {
      $('.emailerror').text('');
      $('.alert').remove();
   });
    
   $('#pass').on('keyup', function() {
      $('.passerror').text('');
      $('.alert').remove();
   });
    
    // Also remove general invalid login error when fields are focused
   $('#em, #pass').on('keyup', function() {
      $('.invalid-login-message').remove();
      $('.alert').remove();
   });	

   $('.toggle-password').click(function() {
      var passwordField = $('#pass');
      var passwordFieldType = passwordField.attr('type');

      if (passwordFieldType === 'password') {
         passwordField.attr('type', 'text');
         $(this).find('i').removeClass('fa-eye').addClass('fa-eye-slash');
      } else {
         passwordField.attr('type', 'password');
         $(this).find('i').removeClass('fa-eye-slash').addClass('fa-eye');
      }
   });
});
</script>
   <body class="inner_page login">
      <?php
        if(isset($_POST['login']))
        {
            $str="select * from users where email='".$_POST['maill']."' AND password='".$_POST['pswd']."'";
            // echo $str;
            $result=mysqli_query($conn,$str);
            $row=mysqli_fetch_array($result);
            $count=mysqli_num_rows($result);
            //echo $count;die;
            
            if($count>0)
            {
               if($row['utype'] == 'Admin')
                {
                   $_SESSION['mail'] = $row['email'];
                   $_SESSION['mail'] = $row['name'];
                   $_SESSION['utype'] = $row['utype'];
                   $_SESSION['success_message'] = "You have logged in successfully!";
                   header('location:dashboard.php');
                }
                else
                {
                   $invalid = "<center><p class='invalid-login-message' style='color:red; font-weight:bold;'>Users cannot log in to the admin panel!</p></center>";
                }
            }
            else
            {
               $invalid="<center><p class='invalid-login-message' style='color:red; font-weight:bold;'>Invalid email or password!</p><center>";
            }
         }
      ?>
      <div class="full_container">
         <div class="container">
            <div class="center verticle_center full_height">
               <div class="login_section">
                  <div class="logo_login">
                     <div class="center">
                        <img width="230px" height="200px" src="images/logo/logo6.png" alt="#" />
                     </div>
                  </div>
                  <div class="login_form">
                     <?php
                        if(isset($_SESSION['logout_message'])) 
                        {
                           echo '<div class="alert alert-danger text-center" role="alert">' . $_SESSION['logout_message'] . '</div>';
                           unset($_SESSION['logout_message']); // Clear the message after displaying
                        }
                     ?>
                     <form method="POST" id="loginForm">
                        <fieldset>
                           <div class="field">
                              <label class="label_field" style="font-weight: bold; color:black;">Email</label>
                              <input type="text" name="maill" id="em" placeholder="Enter Your E-mail"/>
                           </div>
		                     
                           <center><span style="font-weight: bold" class="emailerror"></span></center>
                           <br>

                           <div class="field">                           
                              <div style="position: relative;">
                              <label class="label_field" style="font-weight: bold; color:black;">Password</label>
                                 <input type="password" name="pswd" id="pass" placeholder="Enter Your Password" />
                                 <span class="toggle-password">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                 </span>
                              </div>
                           </div>
		                     
                           <center><span style="font-weight: bold" class="passerror"></span></center>
                           <br>
                           <?php 
                                 if(isset($invalid))
                                 {
                                    echo $invalid;
                                 }
                           ?>
                           <!-- <div class="field margin_0">                               -->
                        		<center><button type="submit" name="login" class="main_bt">Login</button></center>
                           <!-- </div> -->
                        </fieldset>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- jQuery -->
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <!-- wow animation -->
      <script src="js/animate.js"></script>
      <!-- select country -->
      <script src="js/bootstrap-select.js"></script>
      <!-- nice scrollbar -->
      <script src="js/perfect-scrollbar.min.js"></script>
      <script>
         var ps = new PerfectScrollbar('#sidebar');
      </script>
      <!-- custom js -->
      <script src="js/custom.js"></script>
   </body>
</html>