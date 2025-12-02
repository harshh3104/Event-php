<?php
    include 'head.php';
    include 'connection.php';
    $str = "SELECT * FROM events";
    $res = mysqli_query($conn, $str);
?>
<title>Gallery | Eventura</title>

<style>
    /* HERO BANNER */
    .gallery-hero {
        background: linear-gradient(135deg, rgba(15,23,42,0.80), rgba(30,64,175,0.80)),
                    url(../Admin/images/img/fest4.jpg) no-repeat center center;
        background-size: cover;
        padding: 110px 0 80px 0;
        color: #ffffff;
        position: relative;
    }
    .gallery-hero-content {
        max-width: 900px;
        margin: 0 auto;
        text-align: center;
    }
    .gallery-hero-title {
        font-size: 40px;
        font-weight: 700;
        letter-spacing: 1px;
        margin-bottom: 10px;
    }
    .gallery-hero-subtitle {
        font-size: 15px;
        opacity: 0.9;
        margin-bottom: 15px;
    }
    .gallery-breadcrumb {
        font-size: 13px;
        opacity: 0.9;
    }

    /* MAIN GALLERY SECTION */
    .gallery {
        padding: 60px 0 70px 0;
        background: #f8fafc;
    }

    .heading-agileinfo {
        text-align: center;
        font-size: 32px;
        font-weight: 700;
        color: #e4007f;
        margin-bottom: 8px;
        text-transform: uppercase;
        letter-spacing: 0.8px;
    }
    .heading-agileinfo span { display: none; }

    .heading-underline {
        width: 90px;
        height: 3px;
        background: #2563eb;
        border-radius: 999px;
        margin: 6px auto 25px auto;
    }

    /* GALLERY GRID */
    .gallery-grids {
        display: flex;
        flex-wrap: wrap;
        gap: 24px;
        justify-content: center;
    }

    .gallery-grid {
        flex: 0 0 calc(33.333% - 16px);
        max-width: calc(33.333% - 16px);
    }

    @media (max-width: 992px) {
        .gallery-grid {
            flex: 0 0 calc(50% - 16px);
            max-width: calc(50% - 16px);
        }
    }
    @media (max-width: 576px) {
        .gallery-grid {
            flex: 0 0 100%;
            max-width: 100%;
        }
    }

    .gallery-card {
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 12px 24px rgba(15,23,42,0.15);
        position: relative;
        cursor: pointer;
        background: #000;
    }

    .gallery-card img {
        width: 100%;
        height: 260px;
        object-fit: cover;
        display: block;
        transition: transform 0.45s ease;
    }

    .gallery-card:hover img {
        transform: scale(1.08);
    }

    .gallery-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(to top, rgba(15,23,42,0.85), rgba(15,23,42,0.05));
        opacity: 0;
        transition: opacity 0.35s ease;
        color: #e5e7eb;
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
        padding: 18px 16px;
    }

    .gallery-card:hover .gallery-overlay {
        opacity: 1;
    }

    .gallery-title {
        font-size: 16px;
        font-weight: 600;
        margin-bottom: 2px;
    }

    .gallery-meta {
        font-size: 13px;
        opacity: 0.9;
    }

    .gallery-meta i {
        margin-right: 4px;
    }
</style>
</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">  

    <!-- HERO + NAVBAR -->
    <div class="gallery-hero">
        <?php include 'navbar.php'; ?>
        <div class="gallery-hero-content">
            <h1 class="gallery-hero-title">Gallery</h1>
            <p class="gallery-hero-subtitle">
                Relive the best moments from our cultural, technical and sports events.
            </p>
            <div class="gallery-breadcrumb">
                <i class="fa fa-home"></i> Home / <span style="color:white">Gallery</span>
            </div>
        </div>
    </div>  

    <!-- GALLERY -->
    <div class="gallery">
        <div class="container">
            <h2 class="text-center" style="font-weight:bold; font-size: 40px;color: deeppink;">Gallery</h2><br>
            <div class="heading-underline"></div>

            <div class="gallery-grids">
                <?php while($row = mysqli_fetch_assoc($res)) { ?>
                    <div class="gallery-grid">
                        <a href="../Admin/images/img/<?php echo $row['Profile'];?>"
                           data-lightbox="event-gallery"
                           data-title="<?php echo htmlspecialchars($row['title']); ?>">
                            <div class="gallery-card">
                                <img src="../Admin/images/img/<?php echo $row['Profile'];?>" 
                                     alt="<?php echo htmlspecialchars($row['title']);?>" />
                                <div class="gallery-overlay">
                                    <div class="gallery-title">
                                        <?php echo htmlspecialchars($row['title']); ?>
                                    </div>
                                    <?php if (!empty($row['date'])) { ?>
                                        <div class="gallery-meta">
                                            <i class="fa fa-calendar"></i>
                                            <?php echo date('d M Y', strtotime($row['date'])); ?>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php } ?>
            </div>

            <script src="js/lightbox-plus-jquery.min.js"></script>
        </div>
    </div>

    <?php include 'footer.php'; ?>

    <!-- MODAL (unchanged from your template) -->
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
    <script>
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event){		
                event.preventDefault();
                $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
            });
        });
    </script>
    <script src="js/bootstrap.js"></script>
    <script>
        $(document).ready(function() {
            $().UItoTop({ easingType: 'easeOutQuart' });
        });
    </script>
</body>
</html>
