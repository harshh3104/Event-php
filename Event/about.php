<?php    
    include 'head.php';
?>
<title>About | Eventura</title>

<style>
    /* ---------- HERO BANNER ---------- */
    .about-hero {
        background: linear-gradient(135deg, rgba(15,23,42,0.75), rgba(30,64,175,0.75)),
                    url(../Admin/images/img/fest4.jpg) no-repeat center center;
        background-size: cover;
        padding: 120px 0 90px 0;
        color: #ffffff;
        position: relative;
    }
    .about-hero-content {
        max-width: 900px;
        margin: 0 auto;
        text-align: center;
    }
    .about-hero-title {
        font-size: 40px;
        font-weight: 700;
        letter-spacing: 1px;
        margin-bottom: 10px;
    }
    .about-hero-subtitle {
        font-size: 16px;
        opacity: 0.9;
        margin-bottom: 15px;
    }
    .about-breadcrumb {
        font-size: 13px;
        opacity: 0.9;
    }
    .about-breadcrumb i {
        margin-right: 4px;
    }

    /* ---------- ABOUT SECTION ---------- */
    .about {
        padding: 60px 0 40px 0;
        background: #f8fafc;
    }

    /* Remove Template Black Underline */
    .heading-agileinfo:after,
    .heading-agileinfo span:after,
    .heading-agileinfo span:before {
        display: none !important;
    }

    .heading-agileinfo {
        text-align: center;
        font-size: 32px;
        font-weight: 700;
        color: #e4007f;
        margin-bottom: 8px;
        letter-spacing: 1px;
    }

    /* Blue Line Only */
    .blue-underline {
        width: 90px;
        height: 3px;
        background-color: #2563eb;
        margin: 0 auto 25px auto;
        border-radius: 999px;
    }

    .about-intro {
        text-align: center;
        max-width: 850px;
        margin: 0 auto 35px auto;
        color: #64748b;
        font-size: 15px;
        line-height: 1.7;
    }

    .about-grid-wrapper {
        display: flex;
        flex-wrap: wrap;
        gap: 25px;
        align-items: stretch;
    }

    .about-main-card {
        flex: 2;
        background: #ffffff;
        border-radius: 16px;
        padding: 25px 28px;
        box-shadow: 0 10px 25px rgba(15,23,42,0.08);
    }
    .about-main-card h3 {
        font-size: 22px;
        font-weight: 700;
        color: #111827;
        margin-bottom: 15px;
    }
    .about-main-card p {
        font-size: 15px;
        line-height: 1.7;
        color: #4b5563;
        margin-bottom: 15px;
    }
    .about-main-card ul {
        padding-left: 18px;
        margin-bottom: 0;
    }
    .about-main-card ul li {
        margin-bottom: 6px;
        color: #4b5563;
    }

    .about-side-cards {
        flex: 1.2;
        display: flex;
        flex-direction: column;
        gap: 18px;
    }
    .about-side-card {
        background: #0f172a;
        color: #e5e7eb;
        border-radius: 14px;
        padding: 18px 20px;
        box-shadow: 0 12px 24px rgba(15,23,42,0.4);
        position: relative;
        overflow: hidden;
    }
    .about-side-card::after {
        content: "";
        position: absolute;
        right: -30px;
        bottom: -30px;
        width: 110px;
        height: 110px;
        background: rgba(59,130,246,0.35);
        border-radius: 50%;
    }
    .about-side-card h4 {
        font-size: 16px;
        font-weight: 700;
        margin-bottom: 5px;
    }
    .about-side-card p {
        font-size: 14px;
        opacity: 0.9;
        margin-bottom: 0;
    }
    .about-side-card span.icon {
        font-size: 26px;
        margin-right: 8px;
    }

    /* ---------- OUR OFFERS SECTION ---------- */
    .event-offers-section {
        background: #ffffff;
        padding: 50px 0 60px 0;
    }

    .event-offers-container {
        max-width: 1180px;
        margin: auto;
        text-align: center;
        padding: 0 1.7rem;
    }

    .event-offers-container h1 {
        font-size: 30px;
        font-weight: 700;
        color: #1e293b;
    }

    .underline {
        width: 100px;
        height: 3px;
        background: #2563eb;
        margin: 8px auto 20px auto;
        border-radius: 20px;
    }

    .event-offers-container .cards-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 1.6rem;
    }

    .event-offers-container .card {
        background: #fff;
        padding: 20px;
        border-radius: 14px;
        box-shadow: 0 10px 22px rgba(0,0,0,0.08);
        text-align: left;
        border-top: 4px solid transparent;
        transition: .3s;
    }

    .event-offers-container .card:hover {
        transform: translateY(-5px);
        border-top-color: #2563eb;
        box-shadow: 0 18px 28px rgba(0,0,0,0.15);
    }

    .card-icon {
        font-size: 30px;
        margin-bottom: 8px;
    }

    .card-title {
        font-size: 18px;
        font-weight: 600;
        margin-bottom: 6px;
    }

    .card-description {
        font-size: 14px;
        color: #475569;
        line-height: 1.6;
    }

</style>

</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

    <!-- HERO BANNER -->
    <div class="about-hero">
        <?php include 'navbar.php'; ?>
        <div class="about-hero-content">
            <h1 class="about-hero-title">About Eventura</h1>
            <p class="about-hero-subtitle">
                A smart and seamless way to manage all your college events—from ideation to celebration.
            </p>
            <div class="about-breadcrumb">
                <i class="fa fa-home"></i> Home / <span style="color:white">About Us</span>
            </div>
        </div>
    </div>

    <!-- ABOUT SECTION -->
    <div class="about">
        <div class="container">
            <h2 class="text-center" style="font-weight:bold; font-size: 40px;color: deeppink;">About Us</h2>
            <div class="underline"></div>

            <p class="about-intro">
                Eventura is a dedicated college event management platform that simplifies planning,
                boosts student engagement, and brings every cultural, technical, and academic activity
                into one unified digital space.
            </p>

            <div class="about-grid-wrapper">

                <!-- Left Main Card -->
                <div class="about-main-card">
                    <h3>Our Vision</h3>
                    <p>
                        To empower colleges with a digital solution that makes event planning effortless,
                        encourages student participation, and enhances overall campus life.
                    </p>

                    <h3>Our Mission</h3>
                    <p>
                        To provide a reliable, user-friendly, and secure platform where students and faculty
                        can seamlessly collaborate to organize cultural, technical, and academic events.
                    </p>

                    <h3>Key Features</h3>
                    <ul>
                        <li>Online event registration and ticketing</li>
                        <li>Automated schedules and notifications</li>
                        <li>Participant and volunteer management</li>
                        <li>Results and certificate distribution</li>
                        <li>Centralized dashboard for organizers</li>
                    </ul>
                </div>

                <!-- Side Cards -->
                <div class="about-side-cards">

                    <div class="about-side-card">
                        <div class="d-flex align-items-center">
                            <span class="icon">🎓</span>
                            <h4>Built for Campuses</h4>
                        </div>
                        <p>Designed for fests, seminars, sports days, hackathons and more—all in one place.</p>
                    </div>

                    <div class="about-side-card">
                        <div class="d-flex align-items-center">
                            <span class="icon">🔐</span>
                            <h4>Secure & Reliable</h4>
                        </div>
                        <p>Safe logins, role-based access, and secure data handling.</p>
                    </div>

                    <div class="about-side-card">
                        <div class="d-flex align-items-center">
                            <span class="icon">🤝</span>
                            <h4>Made for Everyone</h4>
                        </div>
                        <p>Connects organizers, volunteers and participants seamlessly.</p>
                    </div>

                </div>

            </div>
        </div>
    </div>

    <!-- OUR OFFERS SECTION -->
    <section class="event-offers-section">
        <div class="event-offers-container">
            <header class="header">
                <h1>Our Offers</h1>
                <div class="underline"></div>
                <p>
                    Our College Event Management System is designed to provide a complete solution for
                    organizing, managing, and participating in college events. From planning to execution,
                    we ensure smooth coordination, real-time updates, and a user-friendly experience for
                    students, faculty, and administrators.
                </p>
            </header>
            <br><br>
            <section class="cards-grid">

                <div class="card">
                    <span class="card-icon">📝</span>
                    <h2 class="card-title">Seamless Registrations</h2>
                    <p class="card-description">Online registrations for all college events with instant confirmations.</p>
                </div>

                <div class="card">
                    <span class="card-icon">⏰</span>
                    <h2 class="card-title">Smart Scheduling</h2>
                    <p class="card-description">Plan events, avoid clashes, and send timely reminders.</p>
                </div>

                <div class="card">
                    <span class="card-icon">📢</span>
                    <h2 class="card-title">Real-Time Updates</h2>
                    <p class="card-description">Instant notifications for deadlines, changes and announcements.</p>
                </div>

                <div class="card">
                    <span class="card-icon">🛠️</span>
                    <h2 class="card-title">Organizer Tools</h2>
                    <p class="card-description">Manage volunteers and monitor event progress easily.</p>
                </div>

                <div class="card">
                    <span class="card-icon">🏆</span>
                    <h2 class="card-title">Results & Certificates</h2>
                    <p class="card-description">Publish results online and provide instant certificate downloads.</p>
                </div>

                <div class="card">
                    <span class="card-icon">📊</span>
                    <h2 class="card-title">Analytics & Reports</h2>
                    <p class="card-description">Understand participation trends and improve future events.</p>
                </div>

            </section>
        </div>
    </section>

    <?php include 'footer.php'; ?>
</body>
</html>