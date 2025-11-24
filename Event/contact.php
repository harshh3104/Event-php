<?php
	include 'head.php';
?>

<title>Contact | Eventura</title>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">  
	<!-- banner -->
	<div class="w3ls-banner-1" style="background: url(../Admin/images/img/fest4.jpg) no-repeat center center; background-size: cover;"> 
		<!-- banner-text --> 
	
	<!-- //banner --> 
			<!-- header -->
				<?php
			 		include 'navbar.php';
			 	?>
			<!-- //header -->
	</div>	
<!-- contact -->	
	<div class="w3ls_address_mail_footer_grids">
	<div class="container">
	<h2 class="heading-agileinfo">Contact<span></span></h2>
	<?php 
	if ($_SERVER["REQUEST_METHOD"] == "POST") 
	{
		$name    = htmlspecialchars($_POST['name']);
		$email   = htmlspecialchars($_POST['email']);
		$subject = htmlspecialchars($_POST['subject']);
		$message = htmlspecialchars($_POST['message']);

		$to = "eventura@example.com"; // Replace with your Eventura email
		//$headers = "From: $email\r\nReply-To: $email";
		$headers  = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type: text/html; charset=UTF-8" . "\r\n";
		$headers .= "From: Eventura Contact Form <no-reply@eventura.com>" . "\r\n";
		$headers .= "Reply-To: $email" . "\r\n";

		// Email body
		$body = "
			<h2>New Contact Request from Eventura</h2>
			<p><strong>Name:</strong> $name</p>
			<p><strong>Email:</strong> $email</p>
			<p><strong>Subject:</strong> $subject</p>
			<p><strong>Message:</strong><br>$message</p>
		";

		if (mail($to, $subject, $body, $headers)) 
		{
			// ENHANCED SUCCESS MESSAGE
			echo "<div class='alert alert-success text-center'>
					<h4 class='alert-heading'>Message Sent!</h4>
					Thank you, <strong>$name</strong>! Your message has been sent successfully. We will get back to you soon.
					</div>";
		} 
		else 
		{
			echo "<div class='alert alert-danger text-center'>Oops! Something went wrong. Please try again later.</div>";
		}
	}
	?>
	<br>
	<section id="contact" class="py-5" style="background: #f8f9fa;">
	<div class="container">
		<div class="row justify-content-center">
		<div class="col-lg-8">
			<div class="card shadow-lg border-0 rounded-4">
			<div class="card-body p-5">
				<h2 class="text-center mb-4 fw-bold text-primary"><u>Get in Touch</u></h2><br>
				<p class="text-center text-muted mb-5">
				Have a query about our events? Fill out the form and our team will get back to you shortly.
				</p><br>

				<form action="contact.php" method="POST">
				<div class="row g-3">
					<div class="col-md-6">
					<label for="name" class="form-label fw-semibold">Your Name</label>
					<input type="text" class="form-control form-control-lg" id="name" name="name" placeholder="John Doe" required>
					</div>
					<div class="col-md-6">
					<label for="email" class="form-label fw-semibold">Email Address</label>
					<input type="email" class="form-control form-control-lg" id="email" name="email" placeholder="you@example.com" required>
					</div>
				</div>
				
				<br>
				
				<div class="mt-3">
					<label for="subject" class="form-label fw-semibold">Subject</label>
					<input type="text" class="form-control form-control-lg" id="subject" name="subject" placeholder="Event Booking / General Query" required>
				</div>
				
				<br>

				<div class="mt-3">
					<label for="message" class="form-label fw-semibold">Message</label>
					<textarea class="form-control form-control-lg" id="message" name="message" rows="5" placeholder="Write your message here..." required></textarea>
				</div>

				<br>
				
				<div class="d-grid mt-4">
					<button type="submit" class="btn btn-primary btn-lg rounded-pill shadow-sm">
					Send Message
					</button>
				</div>
				</form>
			</div>
			</div>

			<!-- Optional Contact Info -->
			<div class="text-center mt-4">
			<p class="mb-1"><i class="bi bi-envelope text-primary"></i> support@eventura.com</p>
			<p class="mb-0"><i class="bi bi-telephone text-primary"></i> +91 98765 43210</p>
			</div>
		</div>
		</div>
	</div>
	</section>	
	<div class="clearfix"> </div>
	</div>
</div>
<!-- //contact -->	
<?php
	include 'footer.php';
?>
<!-- bootstrap-modal-pop-up -->
	<div class="modal video-modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					Events
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
				</div>
				<div class="modal-body">
					<img src="images/g8.jpg" alt=" " class="img-responsive" />
					<p></p>
				</div>
			</div>
		</div>
	</div>
<!-- //bootstrap-modal-pop-up --> 
<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>

<script data-cfasync="false" src="../../../../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="js/jquery-2.2.3.min.js"></script> 
	
<!-- skills -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- start-smoth-scrolling -->
	<script src="js/bootstrap.js"></script>
<!-- //for bootstrap working -->
<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>
<!-- //here ends scrolling icon -->
<script>(function(){function c(){var b=a.contentDocument||a.contentWindow.document;if(b){var d=b.createElement('script');d.innerHTML="window.__CF$cv$params={r:'96a69afebe7de010',t:'MTc1NDQwMDE2OC4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='../../../../../../cdn-cgi/challenge-platform/h/b/scripts/jsd/8359bcf47b68/maind41d.js';document.getElementsByTagName('head')[0].appendChild(a);";b.getElementsByTagName('head')[0].appendChild(d)}}if(document.body){var a=document.createElement('iframe');a.height=1;a.width=1;a.style.position='absolute';a.style.top=0;a.style.left=0;a.style.border='none';a.style.visibility='hidden';document.body.appendChild(a);if('loading'!==document.readyState)c();else if(window.addEventListener)document.addEventListener('DOMContentLoaded',c);else{var e=document.onreadystatechange||function(){};document.onreadystatechange=function(b){e(b);'loading'!==document.readyState&&(document.onreadystatechange=e,c())}}}})();</script></body>

</html>