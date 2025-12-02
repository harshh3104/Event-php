<?php
    include 'head.php';
?>

<html>
<head>
    <title>Contact | Eventura</title>
    <style>
        /* HERO SECTION */
        .contact-hero {
            background: linear-gradient(135deg, rgba(15,23,42,0.75), rgba(56,189,248,0.65)),
                        url(../Admin/images/img/fest4.jpg) no-repeat center center;
            background-size: cover;
            padding: 110px 0 90px 0;
            color: #fff;
            text-align: center;
        }
        .contact-hero h1 {
            font-size: 40px;
            font-weight: 700;
            letter-spacing: 1px;
            margin-bottom: 8px;
        }
        .contact-hero p {
            font-size: 14px;
            opacity: .9;
        }

        /* SECTION STYLING */
        .contact-section {
            padding: 60px 0 70px 0;
            background: #f8fafc;
        }
        .heading-underline {
            width: 90px;
            height: 3px;
            background: #2563eb;
            border-radius: 999px;
            margin: 6px auto 30px auto;
        }

        /* CARD + LAYOUT */
        .contact-card {
            border-radius: 20px;
            box-shadow: 0 16px 35px rgba(15,23,42,0.18);
            border: none;
            overflow: hidden;
        }
        .contact-card .card-body {
            padding: 32px;
        }

        /* FLEX WRAPPER TO FORCE EQUAL HEIGHT */
        .contact-card-inner {
            display: flex;
            flex-wrap: wrap;
            width: 100%;
        }
        .contact-pane-left {
            flex: 0 0 35%;
            max-width: 35%;
        }
        .contact-pane-right {
            flex: 0 0 65%;
            max-width: 65%;
        }

        /* LEFT INFO COLUMN */
        .contact-info-box {
            background: linear-gradient(135deg,#4f46e5,#ec4899);
            color: #fff;
            height: 100%;
            padding: 26px 22px;
            min-height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
        }
        .contact-info-box h3 {
            font-weight: 700;
            font-size: 22px;
            margin-bottom: 10px;
        }
        .contact-info-box p {
            font-size: 14px;
            opacity: .95;
        }
        .contact-info-item {
            margin-top: 16px;
            display: flex;
            align-items: center;
            font-size: 14px;
        }
        .contact-info-item i {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: rgba(15,23,42,0.25);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 10px;
        }

        /* FORM ELEMENTS */
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
        .btn-contact {
            border-radius: 999px;
            font-weight: 600;
            padding: 11px 0;
            font-size: 16px;
            background: linear-gradient(135deg,#4f46e5,#22c55e);
            border: none;
        }
        .btn-contact:hover {
            opacity: .95;
        }

        /* LIVE VALIDATION ERROR TEXT */
        .error-text {
            font-size: 12px;
            color: #dc2626;
            margin-top: 3px;
            display: block;
        }

        @media (max-width: 767px) {
            .contact-card .card-body {
                padding: 22px;
            }
            .contact-card-inner {
                flex-direction: column;
            }
            .contact-pane-left,
            .contact-pane-right {
                flex: 0 0 100%;
                max-width: 100%;
            }
            .contact-info-box {
                border-radius: 20px 20px 0 0;
            }
        }
    </style>
</head>
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">  

    <!-- HERO + NAVBAR -->
    <div class="contact-hero">
        <?php include 'navbar.php'; ?>
        <h1>Contact Eventura</h1>
        <p>A smart and seamless way to reach our event team.</p>
    </div>

    <!-- contact -->	
	<div class="w3ls_address_mail_footer_grids">
	<div class="container contact-section">

        <?php 
            if ($_SERVER["REQUEST_METHOD"] == "POST") 
            {
                $name    = htmlspecialchars($_POST['name']);
                $email   = htmlspecialchars($_POST['email']);
                $subject = htmlspecialchars($_POST['subject']);
                $message = htmlspecialchars($_POST['message']);

                $to = "eventura@example.com";
                $headers  = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type: text/html; charset=UTF-8" . "\r\n";
                $headers .= "From: Eventura Contact Form <no-reply@eventura.com>" . "\r\n";
                $headers .= "Reply-To: $email" . "\r\n";

                $body = "
                    <h2>New Contact Request from Eventura</h2>
                    <p><strong>Name:</strong> $name</p>
                    <p><strong>Email:</strong> $email</p>
                    <p><strong>Subject:</strong> $subject</p>
                    <p><strong>Message:</strong><br>$message</p>
                ";

                if (mail($to, $subject, $body, $headers)) 
                {
                    echo "<div class='alert alert-success text-center' style='font-size: 15px;'><strong>Message Sent!</strong> Thank you, <b>$name</b>. We will get back to you soon.</div>";
                } 
                else 
                {
                    echo "<div class='alert alert-danger text-center'>Oops! Something went wrong. Please try again later.</div>";
                }
            }
        ?>

        <h2 class="text-center" style="font-weight:bold; font-size: 40px;color: deeppink;">Contact</h2><br>
        <div class="heading-underline"></div>
        <br>
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card contact-card">
                    <div class="contact-card-inner">

                        <div class="contact-pane-left">
                            <div class="contact-info-box">
                                <h3>We'd love to hear from you</h3>
                                <p>Whether it’s feedback, event queries or collaborations, just drop us a message.</p>

                                <div class="contact-info-item">
                                    <i class="fa fa-envelope text-white"></i>
                                    <span>support@eventura.com</span>
                                </div>
                                <div class="contact-info-item">
                                    <i class="fa fa-phone text-white"></i>
                                    <span>+91 98765 43210</span>
                                </div>
                                <div class="contact-info-item">
                                    <i class="fa fa-map-marker text-white"></i>
                                    <span>Surat, Gujarat, India</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="contact-pane-right">
                            <div class="card-body">
                                <h2 class="mb-2 fw-bold">Get in Touch</h2>
                                <p class="text-muted mb-4" style="font-size:13px;">
                                    Fill out the form below and our team will respond at the earliest.
                                </p>
								<br>

                                <form action="contact.php" method="POST" id="contactForm">
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label for="name" class="form-label">Your Name</label>
                                            <input type="text" class="form-control" id="name" name="name" placeholder="John Doe">
                                            <span class="error-text" id="nameError"></span>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="email" class="form-label">Email Address</label>
                                            <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com">
                                            <span class="error-text" id="emailError"></span>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="mt-3">
                                        <label for="subject" class="form-label">Subject</label>
                                        <input type="text" class="form-control" id="subject" name="subject" placeholder="Event booking / General query">
                                        <span class="error-text" id="subjectError"></span>
                                    </div>
                                    <br>
                                    <div class="mt-3">
                                        <label for="message" class="form-label">Message</label>
                                        <textarea class="form-control" id="message" name="message" rows="5" placeholder="Write your message here..."></textarea>
                                        <span class="error-text" id="messageError"></span>
                                    </div>
                                    <br>
                                    <div class="d-grid mt-4">
                                        <button type="submit" class="btn btn-primary btn-contact">Send Message</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div><!-- /.contact-card-inner -->
                </div><!-- /.card -->
            </div>
        </div>
	</div>
	</div>
	<!-- //contact -->	

<?php include 'footer.php'; ?>

<!-- bootstrap-modal-pop-up -->
	<div class="modal video-modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					Events
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>						
				</div>
				<div class="modal-body">
					<img src="images/g8.jpg" alt=" " class="img-responsive" />
					<p></p>
				</div>
			</div>
		</div>
	</div>
<!-- //bootstrap-modal-pop-up --> 

<a href="#" id="toTop" style="display: block;"> 
    <span id="toTopHover" style="opacity: 1;"> </span>
</a>

<script data-cfasync="false" src="../../../../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
<script src="js/jquery-2.2.3.min.js"></script> 
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script>
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
		$().UItoTop({ easingType: 'easeOutQuart' });

        // ===== LIVE VALIDATION =====
        function validateName() {
            let name = $("#name").val().trim();
            if (name === "") {
                $("#nameError").text("Please enter your name.");
                return false;
            } else if (name.length < 3) {
                $("#nameError").text("Name must be at least 3 characters.");
                return false;
            } else {
                $("#nameError").text("");
                return true;
            }
        }

        function validateEmail() {
            let email = $("#email").val().trim();
            let pattern = /\S+@\S+\.\S+/;
            if (email === "") {
                $("#emailError").text("Please enter your email.");
                return false;
            } else if (!pattern.test(email)) {
                $("#emailError").text("Please enter a valid email address.");
                return false;
            } else {
                $("#emailError").text("");
                return true;
            }
        }

        function validateSubject() {
            let subject = $("#subject").val().trim();
            if (subject === "") {
                $("#subjectError").text("Please enter a subject.");
                return false;
            } else if (subject.length < 3) {
                $("#subjectError").text("Subject must be at least 3 characters.");
                return false;
            } else {
                $("#subjectError").text("");
                return true;
            }
        }

        function validateMessage() {
            let message = $("#message").val().trim();
            if (message === "") {
                $("#messageError").text("Please enter your message.");
                return false;
            } else if (message.length < 10) {
                $("#messageError").text("Message must be at least 10 characters.");
                return false;
            } else {
                $("#messageError").text("");
                return true;
            }
        }

        $("#name").on("keyup blur", validateName);
        $("#email").on("keyup blur", validateEmail);
        $("#subject").on("keyup blur", validateSubject);
        $("#message").on("keyup blur", validateMessage);

        $("#contactForm").on("submit", function(e){
            let isValid = true;

            if (!validateName()) isValid = false;
            if (!validateEmail()) isValid = false;
            if (!validateSubject()) isValid = false;
            if (!validateMessage()) isValid = false;

            if (!isValid) {
                e.preventDefault(); // stop form submit
            }
        });
	});
</script>
<script src="js/bootstrap.js"></script>

</body>
</html>