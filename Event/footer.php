<!-- footer-top -->	
<?php 
	include 'connection.php';
	$str="select * from events limit 4";
	$res=mysqli_query($conn,$str);
?>
<style>
	.color
	{
		color:white;
	}
</style>
<div class="footer-top">
	<div class="container">
		<div class="col-md-3 foot-left">
			<h3>About Us</h3>		
			<p>Our College Event Management System is built to simplify the way college events are planned, organized, and executed. From cultural fests and technical workshops to seminars and competitions, the platform ensures smooth coordination between students, faculty, and organizers.</p>
		</div>
		<div class="col-md-3 foot-left">
			<h3>Latest Events</h3>
			<ul>
				<?php while($row=mysqli_fetch_assoc($res)) { ?>
				<li><img src="../Admin/images/img/<?php echo $row['Profile'];?>" alt="#" height="100px" width="100px" class=""></li>
				<?php } ?>
			</ul>
			<div class="clearfix"></div>
		</div>
		<div class="col-md-3 foot-left">
			<h3>Useful Links</h3>
			<a href="index.php" style="color:white;">Home</a><br><br>
			<a href="about.php" style="color:white;">About Us</a><br><br>			
			<a href="events.php" style="color:white;">Events</a><br><br>	
			<a href="gallery.php" style="color:white;">Gallery</a><br><br>		
			<a href="my_bookingss.php" style="color:white;">My Bookings</a><br><br>		
			<a href="contact.php" style="color:white;">Contact Us</a><br><br>
		</div>
		<div class="col-md-3 foot-left">
		<h3>Contact Us</h3>		
		<div class="contact-btm">
			<span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>
			<p>New Citylight,Surat</p>
		</div><br>
		<div class="contact-btm">
			<span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>
			<p>(0261) 2269094,2262951</p>
		</div><br>
		<div class="contact-btm">
			<span class="fa fa-envelope-o" aria-hidden="true"></span>
			<p><a href="#">info@eventura.com</a></p>
		</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<!-- /footer-top -->
<div class="copy-right">
	<div class="container">
		<div class="col-md-6 col-sm-6 col-xs-6 copy-right-grids">
			<div class="copy-left">
			<p>&copy; 2025 Eventura. All rights reserved</p>
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-xs-6 top-middle">
			<ul>
				<li><a href="#"><i class="fa fa-facebook"></i></a></li>
				<li><a href="https://www.instagram.com/harsh_bharucha/"><i class="fa fa-instagram"></i></a></li>
				<li><a href="https://www.google.com/"><i class="fa fa-google-plus"></i></a></li>
			</ul>
		</div>
		<div class="clearfix"></div>
	</div>
</div>