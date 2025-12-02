<?php
    include 'connection.php';
    session_start();

    date_default_timezone_set('Asia/Kolkata');
    $current_date = date("Y-m-d");

    $section = isset($_POST['section']) ? $_POST['section'] : 'upcoming';
    $query   = isset($_POST['query'])   ? trim($_POST['query'])   : '';

    $search_sql = '';
    if ($query !== '') {
        $q = mysqli_real_escape_string($conn, $query);
        $search_sql = " AND (title LIKE '%$q%' 
                        OR venue LIKE '%$q%' 
                        OR description LIKE '%$q%')";
    }

    if ($section === 'past') {
        $sql = "SELECT * FROM events 
                WHERE date < '$current_date' $search_sql 
                ORDER BY date DESC LIMIT 3";
    } else {
        // default upcoming
        $sql = "SELECT * FROM events 
                WHERE date >= '$current_date' $search_sql 
                ORDER BY date ASC";
    }

    $res = mysqli_query($conn, $sql);

    if (!$res || mysqli_num_rows($res) == 0) {
        if ($section === 'past') {
            echo '<div class="col-12"><p class="text-center text-muted">No past events found.</p></div>';
        } else {
            echo '<div class="col-12"><p class="text-center text-muted">No upcoming events found.</p></div>';
        }
        exit;
    }

    while ($row = mysqli_fetch_assoc($res)) {
        if ($section === 'past') {
            ?>
            <div class="col-md-4 popular-grid">
                <div class="event-card">
                    <div class="event-image-wrap">
                        <img src="../Admin/images/img/<?php echo $row['Profile']; ?>" 
                            alt="<?php echo htmlspecialchars($row['title']); ?>">
                        <span class="event-badge past">Completed</span>
                    </div>
                    <div class="event-card-body">
                        <h5 class="event-card-title"><?php echo htmlspecialchars($row['title']); ?></h5>
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
        } else {
            ?>
            <div class="col-md-4 popular-grid">
                <div class="event-card">
                    <div class="event-image-wrap">
                        <img src="../Admin/images/img/<?php echo $row['Profile']; ?>" 
                            alt="<?php echo htmlspecialchars($row['title']); ?>">
                        <span class="event-badge upcoming">Upcoming</span>
                    </div>
                    <div class="event-card-body">
                        <h5 class="event-card-title"><?php echo htmlspecialchars($row['title']); ?></h5>
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
                            if(isset($_SESSION['mail'])) { ?>
                                <form method="post" action="book_events.php">
                                    <input type="hidden" name="event_id" value="<?php echo $row['id']; ?>">
                                    <button type="submit" class="btn btn-primary btn-event-primary">
                                        <i class="fa fa-ticket"></i> Book Event
                                    </button>
                                </form>
                            <?php } else { ?>
                                <a href="login.php" class="btn btn-primary btn-event-primary">
                                    <i class="fa fa-ticket"></i> Book Event
                                </a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
}