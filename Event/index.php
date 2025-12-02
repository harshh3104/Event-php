<?php
    include 'head.php';
    include 'connection.php';

    $str = "SELECT * FROM events LIMIT 6";
    $res = mysqli_query($conn,$str);

    date_default_timezone_set('Asia/Kolkata');
    $current_date = date("Y-m-d");
    $upcoming_q = "SELECT * FROM events WHERE date >= '$current_date' ORDER BY date ASC LIMIT 3";
    $upcoming_res = mysqli_query($conn, $upcoming_q);
?>
<html>
<head>
    <title>Home | Eventura</title>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<link rel="stylesheet" href="css/home.css">
</head>
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">  

    <!-- banner / SLIDER -->
    <div id="home" class="w3ls-banner">
        <div class="slider">
            <div class="callbacks_container">
                <ul class="rslides callbacks callbacks1" id="slider4">
                    <li>
                        <div class="w3layouts-banner-top" style="background:url('../Admin/images/img/clgfest.jpeg') no-repeat center center;background-size:cover;">
                            <div class="container">
                                <div class="agileits-banner-info">
                                    <h3><span style="color:white;">Welcome To Eventura</span></h3>
                                    <p>Plan, manage, and enjoy your college events effortlessly—from cultural fests to technical hackathons.</p>

                                    <div class="hero-actions">
                                        <a href="events.php" class="hero-btn-primary">Browse Events</a>
                                        <a href="evereg.php" class="hero-btn-outline">Register Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="w3layouts-banner-top w3layouts-banner-top1" style="background:url('../Admin/images/img/fest2.jpg') no-repeat center center;background-size:cover;">
                            <div class="container">
                                <div class="agileits-banner-info">
                                    <h3><span style="color:white;">Create Memorable Moments</span></h3>
                                    <p>Bring students, faculty, and organizers together on one smart platform.</p>
                                </div>  
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="w3layouts-banner-top w3layouts-banner-top2" style="background:url('../Admin/images/img/fest3.jpg') no-repeat center center;background-size:cover;">
                            <div class="container">
                                <div class="agileits-banner-info">
                                    <h3><span style="color:white;">Manage Every Event Seamlessly</span></h3>
                                    <p>Registrations, schedules, results, and more—handled in just a few clicks.</p>
                                </div>                              
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>  
    <!-- //banner --> 

    <!-- header -->
    <?php include 'navbar.php'; ?>
    <!-- //header -->

    <!-- ABOUT EVENTURA / FEATURE CARDS -->
    <div class="ser_agile">
        <div class="container">
            <h2 class="text-center" style="font-weight:bold; font-size: 40px;color: deeppink;">About Eventura</h2><br>
            <div class="section-underline"></div>
            <p class="text-muted mb-5" style="font-weight:bold; font-size:18px;">
                Eventura is your one-stop platform for managing college events effortlessly. 
                Whether it’s cultural programs, technical competitions, or thrilling sports tournaments, 
                we bring everything under one roof with easy registrations and smooth coordination.
            </p>

            <div class="ser_w3l">  
                <div class="outer-wrapper">
                    <div class="inner-wrapper">
                        <div class="icon-wrapper">
                            <i class="fa fa-microphone fa-3x"></i>
                        </div>
                        <div class="content-wrapper">
                            <h4>Cultural Events</h4>
                            <p>Celebrate talent and creativity through music, dance, drama, art shows, and more vibrant campus fests.</p>
                        </div>
                    </div>
                </div>

                <div class="outer-wrapper">
                    <div class="inner-wrapper">
                        <div class="icon-wrapper">
                            <i class="fa fa-laptop fa-3x"></i>
                        </div>
                        <div class="content-wrapper">
                            <h4>Technical Events</h4>
                            <p>Coding contests, hackathons, project expos, and workshops—designed to boost innovation and skills.</p>
                        </div>
                    </div>
                </div>

                <div class="outer-wrapper">
                    <div class="inner-wrapper">
                        <div class="icon-wrapper">
                            <i class="fa fa-futbol-o fa-3x"></i>
                        </div>
                        <div class="content-wrapper">
                            <h4>Sports Activities</h4>
                            <p>From box cricket to inter-college tournaments, build teamwork, discipline, and sportsmanship.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="stats-agileits">
        <div class="container">
            <h3 class="heading-agileinfo white-w3ls">
                We Have Something To Be Proud Of
                <span class="black-w3ls"></span>
            </h3><br>
            <p class="stats-subtitle">
                Thousands of students, hundreds of events, and a growing community of passionate organizers and volunteers.
            </p>

            <div class="row stats-row">
                <div class="col-md-4 col-sm-4 mb-3">
                    <div class="stat-card">
                        <div class="stat-icon-circle">
                            <i class="fa fa-users" aria-hidden="true"></i>
                        </div>
                        <div class="stat-number numscroller" data-slno='1' data-min='0' data-max='2500' data-delay='3' data-increment="2">1000</div>
                        <p class="stat-label">Participants</p>
                        <p class="stat-text">Students engaged across cultural, technical and sports events.</p>
                    </div>
                </div>

                <div class="col-md-4 col-sm-4 mb-3">
                    <div class="stat-card">
                        <div class="stat-icon-circle">
                            <i class="fa fa-lightbulb-o" aria-hidden="true"></i>
                        </div>
                        <div class="stat-number numscroller" data-slno='2' data-min='0' data-max='500'data-delay='3' data-increment="2">350</div>
                        <p class="stat-label">Events Hosted</p>
                        <p class="stat-text">From freshers’ parties to hackathons and sports leagues every year.</p>
                    </div>
                </div>

                <div class="col-md-4 col-sm-4 mb-3">
                    <div class="stat-card">
                        <div class="stat-icon-circle">
                            <i class="fa fa-cog" aria-hidden="true"></i>
                        </div>
                        <div class="stat-number numscroller" data-slno='3' data-min='0' data-max='300' data-delay='3' data-increment="2">50</div>
                        <p class="stat-label">Departments</p>
                        <p class="stat-text">Departments and clubs collaborating through one unified platform.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- FEATURED / UPCOMING EVENTS SECTION -->
    <section class="home-events">
        <div class="container">
            <h2 class="text-center" style="font-weight:bold; font-size: 40px;color: deeppink;">Upcoming Events</h2>
            <br>
            <div class="section-underline"></div>
			<br><br>
            <div class="row">
                <?php
                    if(mysqli_num_rows($upcoming_res) > 0){
                        while($ev = mysqli_fetch_assoc($upcoming_res)) {
                ?>
                <div class="col-md-4 mb-4">
                    <div class="event-card">
                        <div class="event-tag">Upcoming</div>
                        <h4 class="event-title"><?php echo htmlspecialchars($ev['title']); ?></h4>
                        <div class="event-meta">
                            <div><i class="fa fa-calendar"></i>
                                <?php echo date('d M Y', strtotime($ev['date'])); ?>
                            </div>
                            <div><i class="fa fa-map-marker"></i>
                                <?php echo htmlspecialchars($ev['venue']); ?>
                            </div>
                        </div>
                        <p class="event-desc">
                            <?php echo htmlspecialchars($ev['description']); ?>
                        </p>
                        <a href="events.php" class="event-link">
                            View details &nbsp; &rarr;
                        </a>
                    </div>
                </div>
                <?php
                        }
                    } else {
                        echo '<div class="col-12 text-center text-muted">No upcoming events at the moment.</div>';
                    }
                ?>
            </div>
        </div>
    </section>
	
    <!-- GALLERY SECTION -->
    <section id="gallery" class="py-5">
        <div class="container text-center">
            <h2 class="text-center" style="font-weight:bold; font-size: 40px;color: deeppink;">Gallery</h2><br>
            <div class="section-underline"></div>
            <div class="row gallery">
                <?php while($row=mysqli_fetch_assoc($res)) { ?>
                    <div class="col-sm-4 gallery-item">
                        <img src="../Admin/images/img/<?php echo $row['Profile'];?>" alt="Event">
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>

    <!-- CONTACT CTA SECTION -->
    <section class="py-4">
        <div class="container">
            <div class="home-contact-cta">
                <h2>Ready to Host Your Next Big Event?</h2>
                <p>Reach out to us for event support, collaborations, or queries. Our team is happy to help you plan and manage unforgettable college events.</p>
                <a href="contact.php" class="btn btn-secondary">Contact Us</a>
            </div>
        </div>
    </section>

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

    <!-- Slider JS -->
    <script src="js/responsiveslides.min.js"></script>
    <script>
        $(function () {
          $("#slider4").responsiveSlides({
            auto: true,
            pager:true,
            nav:false,
            speed: 500,
            namespace: "callbacks"
          });
        });
        $(function () {
          $("#slider3").responsiveSlides({
            auto: true,
            pager:false,
            nav:true,
            speed: 500,
            namespace: "callbacks"
          });
        });
    </script>

    <!-- OnScroll-Number-Increase-JavaScript -->
    <script type="text/javascript" src="js/numscroller-1.0.js"></script>

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
                    portrait: { changePoint:480, visibleItems: 1 }, 
                    landscape:{ changePoint:640, visibleItems: 1 },
                    tablet:   { changePoint:991, visibleItems: 1 }
                }
            });
        });
    </script>
    <script type="text/javascript" src="js/jquery.flexisel.js"></script>

    <script type="text/javascript" src="js/move-top.js"></script>
    <script type="text/javascript" src="js/easing.js"></script>
    <script>
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
            $().UItoTop({ easingType: 'easeOutQuart' });
        });
    </script>
    <script>
        (function(){
            function c(){
                var b=a.contentDocument||a.contentWindow.document;
                if(b){
                    var d=b.createElement('script');
                    d.innerHTML="window.__CF$cv$params={r:'96a69ae97af1e010',t:'MTc1NDQwMDE2NS4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='../../../../../../cdn-cgi/challenge-platform/h/b/scripts/jsd/8359bcf47b68/maind41d.js';document.getElementsByTagName('head')[0].appendChild(a);";
                    b.getElementsByTagName('head')[0].appendChild(d)
                }
            }
            if(document.body){
                var a=document.createElement('iframe');
                a.height=1;a.width=1;a.style.position='absolute';a.style.top=0;a.style.left=0;a.style.border='none';a.style.visibility='hidden';
                document.body.appendChild(a);
                if('loading'!==document.readyState)c();
                else if(window.addEventListener)document.addEventListener('DOMContentLoaded',c);
                else{
                    var e=document.onreadystatechange||function(){};
                    document.onreadystatechange=function(b){e(b);'loading'!==document.readyState&&(document.onreadystatechange=e,c())}
                }
            }
        })();
    </script>
</body>
</html>