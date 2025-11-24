<?php
	include 'head.php';
	include 'connection.php';
	date_default_timezone_set('Asia/Kolkata');
	$current_date = date("Y-m-d");

	// Query for upcoming events
	$upcoming_query = "SELECT * FROM events WHERE date >= '$current_date' ORDER BY date ASC";
	$upcoming_res = mysqli_query($conn, $upcoming_query);

	// Query for past events
	$past_query = "SELECT * FROM events WHERE date < '$current_date' ORDER BY date DESC LIMIT 3";
	$past_res = mysqli_query($conn, $past_query);

?>
<title>Events | Eventura</title>
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">  
	<div class="w3ls-banner-1" style="background: url(../Admin/images/img/fest4.jpg) no-repeat center center; background-size: cover;"> 
		<?php
				include 'navbar.php';
			?>
		</div>	
	<div class="events-agileits-w3layouts">
		<div class="container">
			<h2 class="heading-agileinfo">Upcoming Events<span></span></h2>
			<div class="popular-grids">
				<?php 
					if(mysqli_num_rows($upcoming_res) > 0) {
						while($row = mysqli_fetch_assoc($upcoming_res)) { 
				?>
				<div class="col-md-4 popular-grid">					
					<img src="../Admin/images/img/<?php echo $row['Profile'];?>" height="400px" width="400px"/>
					<div class="popular-text">
						<h5><a href="#" data-toggle="modal" data-target="#myModal"><?php echo $row['title'];?></a></h5>
						<div class="detail-bottom">
							<ul>
								<li><i class="fa fa-calendar" aria-hidden="true"> <?php echo $row['date'];?></i></li>
								<li><i class="fa fa-map-marker" aria-hidden="true"> <?php echo $row['venue'];?></i></li>
								<p><?php echo $row['description']?></p>
								
								<?php 
								if(isset($_SESSION['mail'])) {
									echo "<form method='post' action='book_events.php'>
										<input type='hidden' name='event_id' value='".$row['id']."'>
										<button type='submit' class='btn btn-primary'>Book Event</button>
										</form>";
								} else {
									echo "<a href='login.php' class='btn btn-primary'>Login to Book</a>";
								}
								?>
							</ul>
						</div>
					</div>					
				</div>
				<?php 
						}
					} else {
						echo '<div class="col-12"><p class="text-center">No upcoming events at the moment.</p></div>';
					}
				?>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>

	<hr><div class="events-agileits-w3layouts">
		<div class="container">
			<h2 class="heading-agileinfo">Past Events<span></span></h2>
			<div class="popular-grids">
				<?php 
					if(mysqli_num_rows($past_res) > 0) {
						while($row = mysqli_fetch_assoc($past_res)) { 
				?>
				<div class="col-md-4 popular-grid">					
					<img src="../Admin/images/img/<?php echo $row['Profile'];?>" height="400px" width="400px"/>
					<div class="popular-text">
						<h5><a href="#" data-toggle="modal" data-target="#myModal"><?php echo $row['title'];?></a></h5>
						<div class="detail-bottom">
							<ul>
								<li><i class="fa fa-calendar" aria-hidden="true"> <?php echo $row['date'];?></i></li>
								<li><i class="fa fa-map-marker" aria-hidden="true"> <?php echo $row['venue'];?></i></li>
								<p><?php echo $row['description']?></p>
								<button class="btn btn-danger" disabled>Event Expired</button>
							</ul>
						</div>
					</div>					
				</div>
				<?php 
						}
					} else {
						echo '<div class="col-12"><p class="text-center">No past events to display.</p></div>';
					}
				?>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	
	<?php
		include 'footer.php';
	?>
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
<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>

<script data-cfasync="false" src="../../../../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="js/jquery-2.2.3.min.js"></script> 
	
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
<script src="js/bootstrap.js"></script>
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
<script>(function(){function c(){var b=a.contentDocument||a.contentWindow.document;