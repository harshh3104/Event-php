<?php 
	session_start();
?>
<div class="header-w3layouts"> 
	<!-- Navigation -->
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container">
			<div class="navbar-header page-scroll">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
					<span class="sr-only">Events</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<h1><a class="navbar-brand" href="index.php">Eventura</a></h1>
			</div> 
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse navbar-ex1-collapse">
				<ul class="nav navbar-nav navbar-right">
					<!-- Hidden li included to remove active class from about link when scrolled up past about section -->
					<li class="hidden"><a class="page-scroll" href="#page-top"></a>	</li>
					<li><a class="hvr-sweep-to-right" href="index.php">Home</a></li>
					<li><a class="hvr-sweep-to-right" href="about.php">About</a></li>
					<li><a class="hvr-sweep-to-right" href="events.php">Events</a></li>
					<li><a class="hvr-sweep-to-right" href="gallery.php">Gallery</a></li>
					<li><a class="hvr-sweep-to-right" href="contact.php">Contact</a></li>
					<?php if(isset($_SESSION['mail'])){ ?>
					<li><a class="hvr-sweep-to-right" href="my_bookingss.php">My Bookings</a></li>
					<li><a class="hvr-sweep-to-right" href="logout.php">Logout</a></li>
					<?php } else { ?>
					<li><a class="hvr-sweep-to-right" href="login.php">Login</a></li>
					<li><a class="hvr-sweep-to-right" href="evereg.php">Register</a></li>
					<?php } ?>

				</ul>
			</div>
			<!-- /.navbar-collapse -->
		</div>
		<!-- /.container -->
	</nav>  
</div>	
