<?php
    include 'head.php';
    include 'connection.php';
    date_default_timezone_set('Asia/Kolkata');
    $current_date = date("Y-m-d");
    
    $upcoming_query = "SELECT * FROM events WHERE date >= '$current_date' ORDER BY date ASC";
    $upcoming_res = mysqli_query($conn, $upcoming_query);

    $past_query = "SELECT * FROM events WHERE date < '$current_date' ORDER BY date DESC LIMIT 3";
    $past_res = mysqli_query($conn, $past_query);
?>
<html>
<head>
    <title>Events | Eventura</title>
    <link rel="stylesheet" href="css/events.css">    
</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">      
    <div class="events-hero">
        <?php include 'navbar.php'; ?>
        <div class="events-hero-content">
            <h1 class="events-hero-title">Events</h1>
            <p class="events-hero-subtitle">
                Discover all the cultural, technical and sports events happening on your campus.
            </p>
            <div class="events-breadcrumb">
                <i class="fa fa-home"></i> Home / <span style="color: white;">Events</span>
            </div>
        </div>
    </div>  

    <!-- UPCOMING EVENTS -->
    <div class="events-agileits-w3layouts">
        <div class="container">
            <h2 class="text-center" style="font-weight:bold; font-size: 40px;color: deeppink;">Upcoming Events</h2><br>
            <div class="heading-underline"></div>

            <!-- AJAX SEARCH BAR -->
            <div class="event-search-wrapper">
                <form id="eventSearchForm">
                    <div class="input-group">
                        <input type="text" id="eventSearch" class="form-control event-search-input" placeholder="Search events by name, venue, or description...">
                        <span class="input-group-btn">
                            <button class="btn btn-primary event-search-btn" style="font-size: x-small;" type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                </form>
            </div>
            
            <div class="popular-grids row" id="upcomingContainer">
                <?php 
                    if(mysqli_num_rows($upcoming_res) > 0) {
                        while($row = mysqli_fetch_assoc($upcoming_res)) { 
                ?>
                <div class="col-md-4 popular-grid">
                    <div class="event-card">
                        <div class="event-image-wrap">
                            <img src="../Admin/images/img/<?php echo $row['Profile'];?>" alt="<?php echo htmlspecialchars($row['title']);?>">
                            <span class="event-badge upcoming">Upcoming</span>
                        </div>
                        <div class="event-card-body">
                            <h5 class="event-card-title">
                                <?php echo htmlspecialchars($row['title']);?>
                            </h5>
                            <div class="event-meta">
                                <span><i class="fa fa-calendar" aria-hidden="true"></i>
                                    <?php echo date('d M Y', strtotime($row['date'])); ?>
                                </span>
                                <span><i class="fa fa-map-marker" aria-hidden="true"></i>
                                    <?php echo htmlspecialchars($row['venue']); ?>
                                </span>
                            </div>
                            <p class="event-desc">
                                <?php echo htmlspecialchars($row['description']); ?>
                            </p>
                            <div class="event-actions">
                                <?php 
                                    if(isset($_SESSION['mail'])) {                                        
                                        echo "
                                            <form method='post' action='book_events.php'>
                                                <input type='hidden' name='event_id' value='".$row['id']."'>
                                                <button type='submit' class='btn btn-primary btn-event-primary'>
                                                    <i class='fa fa-ticket'></i> Book Event
                                                </button>
                                            </form>
                                        ";
                                    } else {                                        
                                        echo "
                                            <a href='login.php' class='btn btn-primary btn-event-primary'>
                                                <i class='fa fa-ticket'></i> Book Event
                                            </a>
                                        ";
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php 
                        }
                    } else {
                        echo '<div class="col-12"><p class="text-center text-muted">No upcoming events at the moment.</p></div>';
                    }
                ?>
            </div>
        </div>
    </div>

    <hr class="section-divider">

    <!-- PAST EVENTS -->
    <div class="events-agileits-w3layouts" style="background:#ffffff;">
        <div class="container">
            <h2 class="text-center" style="font-weight:bold; font-size: 40px;color: deeppink;">Past Events</h2><br>
            <div class="heading-underline"></div>

            <div class="popular-grids row" id="pastContainer">
                <?php 
                    if(mysqli_num_rows($past_res) > 0) {
                        while($row = mysqli_fetch_assoc($past_res)) { 
                ?>
                <div class="col-md-4 popular-grid">
                    <div class="event-card">
                        <div class="event-image-wrap">
                            <img src="../Admin/images/img/<?php echo $row['Profile'];?>" alt="<?php echo htmlspecialchars($row['title']);?>">
                            <span class="event-badge past">Completed</span>
                        </div>
                        <div class="event-card-body">
                            <h5 class="event-card-title">
                                <?php echo htmlspecialchars($row['title']);?>
                            </h5>
                            <div class="event-meta">
                                <span><i class="fa fa-calendar" aria-hidden="true"></i>
                                    <?php echo date('d M Y', strtotime($row['date'])); ?>
                                </span>
                                <span><i class="fa fa-map-marker" aria-hidden="true"></i>
                                    <?php echo htmlspecialchars($row['venue']); ?>
                                </span>
                            </div>
                            <p class="event-desc">
                                <?php echo htmlspecialchars($row['description']); ?>
                            </p>
                            <div class="event-actions">
                                <button class="btn btn-danger btn-event-primary btn-expired" disabled>
                                    <i class="fa fa-clock-o"></i> Event Expired
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php 
                        }
                    } else {
                        echo '<div class="col-12"><p class="text-center text-muted">No past events to display.</p></div>';
                    }
                ?>
            </div>
        </div>
    </div>
    
    <?php include 'footer.php'; ?>

    <!-- MODAL -->
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

    <a href="#" id="toTop" style="display: block;">
        <span id="toTopHover" style="opacity: 1;"> </span>
    </a>

    <script data-cfasync="false" src="../../../../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="js/jquery-2.2.3.min.js"></script> 
    <script type="text/javascript" src="js/move-top.js"></script>
    <script type="text/javascript" src="js/easing.js"></script>
    <script src="js/bootstrap.js"></script>

    <!-- AJAX SEARCH SCRIPT -->
    <script>
        $(document).ready(function () {
            
            $(".scroll").click(function(event){		
                event.preventDefault();
                $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
            });

            function loadEvents(query) {
                // Upcoming
                $.ajax({
                    url: "search_events.php",
                    type: "POST",
                    data: { query: query, section: "upcoming" },
                    success: function (data) {
                        $("#upcomingContainer").html(data);
                    }
                });

                $.ajax({
                    url: "search_events.php",
                    type: "POST",
                    data: { query: query, section: "past" },
                    success: function (data) {
                        $("#pastContainer").html(data);
                    }
                });
            }

            // Initial load (empty query = all events)
            loadEvents("");

            // On keyup
            $("#eventSearch").on("keyup", function () {
                var q = $(this).val();
                loadEvents(q);
            });

            // Prevent form submit refresh
            $("#eventSearchForm").on("submit", function (e) {
                e.preventDefault();
                var q = $("#eventSearch").val();
                loadEvents(q);
            });
        });
    </script>
</body>
</html>