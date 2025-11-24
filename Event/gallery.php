<?php
	include 'head.php';
	include 'connection.php';
	$str="select * from events";
	$res=mysqli_query($conn,$str);
?>
<title>Gallery | Eventura</title>
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
	<!-- gallery -->
	<div class="gallery">
		<div class="container">
			<h2 class="heading-agileinfo">Gallery<span></span></h2>
			<div class="gallery-grids">
				<?php while($row=mysqli_fetch_assoc($res)) { ?>
					<div class="col-md-4 gallery-grid">
						<div class="grid">
							<figure class="effect-apollo">								
									<img src="../Admin/images/img/<?php echo $row['Profile'];?>" alt="#" height="300px" width="400px"/>
									<figcaption>
										<p></p>
									</figcaption>	
								</a>
							</figure>
						</div>
					</div>
				<?php }?>
				<div class="clearfix"> </div>
				<script src="js/lightbox-plus-jquery.min.js"> </script>
			</div>
		</div>
	</div>
	<!-- //gallery -->
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