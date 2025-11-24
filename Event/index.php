<?php
	include 'head.php';
	include 'connection.php';
	$str="select * from events limit 3";
	$res=mysqli_query($conn,$str);
?>
<title>Home | Eventura</title>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<style>
    body { font-family: 'Segoe UI', sans-serif; }
    .hero {
      background: url('images/banner.jpg') center/cover no-repeat;
      height: 100vh;
      display: flex; align-items: center; justify-content: center;
      color: white; text-align: center;
    }
    .hero-overlay {
      background: rgba(0,0,0,0.6);
      position: absolute; top: 0; left: 0; right: 0; bottom: 0;
    }
    .hero-content {
      position: relative; z-index: 2;
    }
    .gallery img { border-radius: 12px; transition: .3s; }
    .gallery img:hover { transform: scale(1.05); }
    footer a { color: #fff; margin: 0 8px; }
</style>

<!-- <link rel="stylesheet" href="bootstrap.min.css"> -->
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">  
	<!-- banner -->
	<div id="home" class="w3ls-banner">
		<!-- banner-text -->
		<div class="slider">
			<div class="callbacks_container">
				<ul class="rslides callbacks callbacks1" id="slider4">
					<li>
					<div class="w3layouts-banner-top" style="background:url('../Admin/images/img/fest4.jpg') no-repeat center center;background-size:cover;">
					<div class="container">
						<div class="agileits-banner-info">
							<h3><span style="color:white;">Welcome To Eventura</span></h3>
							<p></p>
						</div>	
					</div>
					</div>
					</li>
					<li>
					<div class="w3layouts-banner-top w3layouts-banner-top1" style="background:url('../Admin/images/img/fest2.jpg') no-repeat center center;background-size:cover;">
						<div class="container">
							<div class="agileits-banner-info">
								<h3><span style="color:white;">Welcome To Eventura</span></h3>
								<p></p>								
							</div>	
						</div>
					</div>
					</li>
					<li>
					<div class="w3layouts-banner-top w3layouts-banner-top2" style="background:url('../Admin/images/img/fest3.jpg') no-repeat center center;background-size:cover;">
						<div class="container">
							<div class="agileits-banner-info">
							<h3><span style="color:white;">Welcome To Eventura</span></h3>
							<p></p>							
							</div>								
						</div>
					</div>
					</li>
				</ul>
			</div>
			<div class="clearfix"> </div>
			<!--banner Slider starts Here-->
		</div>
	</div>	
	<!-- //banner --> 
	<!-- header -->
	<?php
		include 'navbar.php';
	?>
		<!-- //header -->
		<!-- ser_agile -->
		<div class="ser_agile">
			<div class="container">
			<h2 class="heading-agileinfo">About Eventura<span></span></h2>
			<p class="text-muted mb-5" style="font-weight:bold; font-size:20px;">Eventura is your one-stop platform for managing college events effortlessly. Whether it’s cultural programs, technical competitions, or thrilling sports tournaments, we bring everything under one roof with easy registrations and smooth coordination.</p>
			<div class="ser_w3l">  
			  <div class="outer-wrapper">
				<div class="inner-wrapper">
				  <div class="icon-wrapper">
					<i class="fa fa-microphone fa-3x text-primary mb-3"></i>
				  </div>
				  <div class="content-wrapper">
					<h4>Cultural Events</h4>
					<p>A celebration of talent and creativity! From music, dance, drama, to art exhibitions, our cultural events.</p>
				  </div>
				</div>
			  </div>
			  <div class="outer-wrapper">
				<div class="inner-wrapper">
				  <div class="icon-wrapper">
					<i class="fa fa-laptop fa-3x text-primary mb-3"></i>
				  </div>
				  <div class="content-wrapper">
					<h4>Technical Events</h4>
					<p>Where innovation meets learning! Coding challenges, hackathons, robotics contests, and project exhibitions.</p>
				  </div>
				</div>
			  </div>
			  <div class="outer-wrapper" style="width:300px;">
				<div class="inner-wrapper">
				  <div class="icon-wrapper">
					<i class="fa fa-futbol-o fa-3x text-primary mb-3"></i>
				  </div>
				  <div class="content-wrapper">
					<h4>Sports</h4>
					<p>Sports build teamwork, discipline, and leadership.</p>
				  </div>
				</div>
			  </div>
			  <div class="clearfix"></div>
			  </div>
			</div>
		</div>
	<!-- //ser_agile -->

<!-- About Section -->
<div class="stats-agileits">
	<div class="container">
		<h3 class="heading-agileinfo white-w3ls">We Have Something To Be Proud Of<span class="black-w3ls"></span></h3>
	</div>
	<div class="stats-info agileits w3layouts">
	<div class="container">
		<div class="col-md-4 col-sm-4agileits w3layouts stats-grid stats-grid-1">
			<i class="fa fa-users" aria-hidden="true"></i>
			<div class="numscroller agileits-w3layouts" data-slno='1' data-min='0' data-max='2500' data-delay='3' data-increment="2">1000</div>
			<div class="stat-info-w3ls">
				<h4 class="agileits w3layouts">Participants</h4>
			</div>
		</div>
		<div class="col-md-4 col-sm-4 agileits w3layouts stats-grid stats-grid-2">
			<i class="fa fa-lightbulb-o" aria-hidden="true"></i>
			<div class="numscroller agileits-w3layouts" data-slno='1' data-min='0' data-max='500' data-delay='3' data-increment="2">350</div>
			<div class="stat-info-w3ls">
				<h4 class="agileits w3layouts">Events</h4>
			</div>
		</div>
		<div class="col-md-4 col-sm-4 stats-grid agileits w3layouts stats-grid-3">
		<i class="fa fa-cog" aria-hidden="true"></i>
			<div class="numscroller agileits-w3layouts" data-slno='1' data-min='0' data-max='300' data-delay='3' data-increment="2">50</div>
			<div class="stat-info-w3ls">
				<h4 class="agileits w3layouts">Departments</h4>
			</div>
		</div>
		<div class="clearfix"></div>
		</div>
	</div>
</div>
<br><br><br>
<!-- Gallery Section -->
<section id="gallery" class="py-5">
  <div class="container text-center">
	<h2 class="heading-agileinfo">Gallery<span></span></h2>
    <div class="row g-3 gallery">
	<?php while($row=mysqli_fetch_assoc($res)) { ?>
      <div class="col-sm-4"><img src="../Admin/images/img/<?php echo $row['Profile'];?>" class="" height="400px" width="400px" alt="Event"></div>
	<?php } ?>
      <!-- <div class="col-sm-4"><img src="images/g2.jpg" class="img-fluid shadow" alt="Event"></div>
      <div class="col-sm-4"><img src="images/g3.jpg" class="img-fluid shadow" alt="Event"></div> -->
    </div>
  </div>
</section>

<!-- Contact Section -->
<h2 class="heading-agileinfo">Contact Us<span></span></h2>
<section id="contact" class="py-5 text-white text-center" style="background-color:lightgrey;">
	<div class="container">
		<br><h2 class="fw-bold"><u>Get in Touch</u></h2><br>
		<p>Have questions? Reach out to us!</p><br>
		<a href="contact.php" class="btn btn-light btn-md">Contact Us</a>
	</div>
<br></section><br><br><br>
<!-- //showcase_w3layouts -->	
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

						<script src="js/responsiveslides.min.js"></script>
			<script>
						// You can also use "$(window).load(function() {"
						$(function () {
						  // Slideshow 4
						  $("#slider4").responsiveSlides({
							auto: true,
							pager:true,
							nav:false,
							speed: 500,
							namespace: "callbacks",
							before: function () {
							  $('.events').append("<li>before event fired.</li>");
							},
							after: function () {
							  $('.events').append("<li>after event fired.</li>");
							}
						  });
					
						});
			</script>
			<script>
								// You can also use "$(window).load(function() {"
								$(function () {
								  // Slideshow 4
								  $("#slider3").responsiveSlides({
									auto: true,
									pager:false,
									nav:true,
									speed: 500,
									namespace: "callbacks",
									before: function () {
									  $('.events').append("<li>before event fired.</li>");
									},
									after: function () {
									  $('.events').append("<li>after event fired.</li>");
									}
								  });
							
								});
							 </script>

<!-- start-smoth-scrolling -->
<!-- OnScroll-Number-Increase-JavaScript -->
	<script type="text/javascript" src="js/numscroller-1.0.js"></script>
<!-- //OnScroll-Number-Increase-JavaScript -->
<!--flexiselDemo1 -->
 <script type="text/javascript">
							$(window).load(function() {
								$("#flexiselDemo1").flexisel({
									visibleItems: 2,
									animationSpeed: 1000,
									autoPlay: true,
									autoPlaySpeed: 3000,    		
									pauseOnHover: true,
									enableResponsiveBreakpoints: true,
									responsiveBreakpoints: { 
										portrait: { 
											changePoint:480,
											visibleItems: 1
										}, 
										landscape: { 
											changePoint:640,
											visibleItems: 1
										},
										tablet: { 
											changePoint:991,
											visibleItems: 1
										}
									}
								});
								
							});
			</script>
			<script type="text/javascript" src="js/jquery.flexisel.js"></script>
<!--//flexiselDemo1 -->

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
<script>(function(){function c(){var b=a.contentDocument||a.contentWindow.document;if(b){var d=b.createElement('script');d.innerHTML="window.__CF$cv$params={r:'96a69ae97af1e010',t:'MTc1NDQwMDE2NS4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='../../../../../../cdn-cgi/challenge-platform/h/b/scripts/jsd/8359bcf47b68/maind41d.js';document.getElementsByTagName('head')[0].appendChild(a);";b.getElementsByTagName('head')[0].appendChild(d)}}if(document.body){var a=document.createElement('iframe');a.height=1;a.width=1;a.style.position='absolute';a.style.top=0;a.style.left=0;a.style.border='none';a.style.visibility='hidden';document.body.appendChild(a);if('loading'!==document.readyState)c();else if(window.addEventListener)document.addEventListener('DOMContentLoaded',c);else{var e=document.onreadystatechange||function(){};document.onreadystatechange=function(b){e(b);'loading'!==document.readyState&&(document.onreadystatechange=e,c())}}}})();</script>
</body>
</html>