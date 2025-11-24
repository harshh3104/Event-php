<?php
	include 'head.php';
?>
<title>About | Eventura</title>
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
<!-- about -->
<!-- about -->
	<div class="about">
		<div class="container">
		<h2 class="heading-agileinfo">About Us<span></span></h2>
			<div class="about-grids-1">
				<div class="col-md-12 agileits-about-right">
					<h5>Our Vision

To empower colleges with a digital solution that makes event planning effortless, encourages student participation, and enhances overall campus life.

Our Mission

To provide a reliable, user-friendly, and secure platform where students and faculty can seamlessly collaborate to organize cultural, technical, and academic events.

Key Features

Online event registration and ticketing

Automated schedules and notifications

Participant and volunteer management

Results and certificate distribution

Centralized dashboard for organizers</h5>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!-- //about -->
	<!-- offers -->
	<!-- Our Offers Section -->
 <style>
        .event-offers-container {
            font-family: Arial, sans-serif;
            color: #1e293b;
            max-width: 1400px;
            width: 100%;
            margin: 0 auto;
            padding: 2.5rem;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .event-offers-container .header {
            text-align: center;
            margin-bottom: 2.5rem;
        }

        .event-offers-container .header h1 {
            font-size: 4rem;
            font-weight: 700;
           /* color: #C71585; */
            margin-bottom: 1.25rem;
        }

        .event-offers-container .header p {
            font-size: 2rem;
            color: #475569;
            line-height: 1.6;
            max-width: 900px;
            margin: 0 auto;
        }

        .event-offers-container .cards-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 2rem;
            margin-bottom: 2rem;
        }

        .event-offers-container .card {
            background-color: #ffffff;
            border-radius: 1rem;
            padding: 2.5rem;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .event-offers-container .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 20px -3px rgba(0, 0, 0, 0.15), 0 6px 8px -2px rgba(0, 0, 0, 0.1);
        }

        .event-offers-container .card-icon {
            font-size: 3.5rem;
            margin-bottom: 1.25rem;
        }

        .event-offers-container .card-title {
            font-size: 2.25rem;
            font-weight: 600;
            color: #1e293b;
            margin-bottom: 0.75rem;
        }

        .event-offers-container .card-description {
            font-size: 1.5rem;
            color: #64748b;
            line-height: 1.5;
        }

        .event-offers-container .footer {
            text-align: center;
            margin-top: 2.5rem;
            font-size: 1.75rem;
            color: #475569;
            line-height: 1.6;
            max-width: 900px;
        }
        
        @media (max-width: 768px) {
            .event-offers-container .cards-grid {
                grid-template-columns: 1fr;
            }
        }
        .underline
        {
          width: 100px;
          height: 2px;
          background-color: black;
          margin:10px auto;
        }
    </style>
</head>
<body>
    <div class="event-offers-container">
        <header class="header">
            <h1>Our Offers</h1>
            <div class="underline"></div><br>
            <p>Our College Event Management System is designed to provide a complete solution for organizing, managing, and participating in college events. From planning to execution, we ensure smooth coordination, real-time updates, and a user-friendly experience for students, faculty, and administrators.</p>
        </header>

        <section class="cards-grid">
            <div class="card">
                <span class="card-icon">📝</span>
                <h2 class="card-title">Seamless Event Registrations</h2>
                <p class="card-description">Register for cultural, technical, and academic events online within seconds. Say goodbye to long queues and paperwork with instant confirmations.</p>
            </div>
            
            <div class="card">
                <span class="card-icon">⏰</span>
                <h2 class="card-title">Smart Scheduling & Planning</h2>
                <p class="card-description">Organizers can create event schedules, allocate venues, and avoid clashes. Automatic reminders ensure no detail is missed.</p>
            </div>
            
            <div class="card">
                <span class="card-icon">📢</span>
                <h2 class="card-title">Real-Time Announcements</h2>
                <p class="card-description">Stay updated with instant notifications about new events, deadlines, and last-minute changes directly from organizers.</p>
            </div>
            
            <div class="card">
                <span class="card-icon">🛠️</span>
                <h2 class="card-title">Volunteer & Organizer Tools</h2>
                <p class="card-description">Assign roles, manage volunteers, and monitor event progress with easy-to-use coordination tools.</p>
            </div>
            
            <div class="card">
                <span class="card-icon">🏆</span>
                <h2 class="card-title">Results & Certificates and a lot more to be added here.</h2>
                <p class="card-description">Access event results online and download digital certificates instantly, ensuring transparency and convenience.</p>
            </div>
            
            <div class="card">
                <span class="card-icon">📊</span>
                <h2 class="card-title">Analytics & Reports</h2>
                <p class="card-description">Generate reports on participation, attendance, and outcomes. Gain insights to improve future events and boost engagement.</p>
            </div>
        </section>
  </div>
</section>
<!-- offers -->
<!-- about -->
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
</body>
</html>