<?php
    session_start();
    include "connection.php";

    if(!isset($_SESSION['mail'])) 
    {
        header("Location: login.php");
        exit();
    }

    $username = $_SESSION['uname'];
    $user_q = mysqli_query($conn, "SELECT id FROM users WHERE name='$username'");
    $user   = mysqli_fetch_assoc($user_q);
    $user_id = $user['id'];

    // Fetch user bookings with event details
    $query = "SELECT e.id, e.title, e.venue, e.date, r.registered_at
            FROM registrations r
            JOIN events e ON r.event_id = e.id
            WHERE r.user_id='$user_id'";
    $result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Bookings | Eventura</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons (optional but used in UI) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="css/booking.css">
</head>
<body>

<div class="page-wrapper">
    <div class="page-card">

        <!-- Header -->
        <div class="page-header">
            <div>
                <div class="page-title">My Bookings</div>
                <div class="page-subtitle">View and manage tickets for events you’ve registered for.</div>
            </div>

            <div class="d-flex align-items-center gap-2 flex-wrap">                
                <a href="index.php" class="btn btn-light rounded-pill px-3 py-2 shadow-sm">
                    <i class="bi bi-house-door"></i> Home
                </a>
                
                <a href="events.php" class="btn btn-light rounded-pill px-3 py-2 shadow-sm">
                    <i class="bi bi-calendar-event"></i> Events
                </a>

                <span class="pill-badge">
                    <i class="bi bi-calendar-check"></i>
                    Eventura Bookings
                </span>
            </div>
        </div>


        <div class="row g-3 mt-2">
            <?php
                if(mysqli_num_rows($result) > 0) {
                    date_default_timezone_set('Asia/Kolkata');
                    $current_date = date("Y-m-d");

                    while($row = mysqli_fetch_assoc($result)) {
                        $is_expired   = ($row['date'] < $current_date);
                        $card_classes = 'booking-card card h-100';
                        if($is_expired) {
                            $card_classes .= ' expired-event';
                        }

                        $eventDate    = date("d M Y", strtotime($row['date']));
                        $registeredAt = date("d M Y, h:i A", strtotime($row['registered_at']));
                    ?>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="<?php echo $card_classes; ?>">
                            <div class="card-body">
                                <div class="booking-header">
                                    <div>
                                        <h4 class="booking-title mb-0">
                                            <?php echo htmlspecialchars($row['title']); ?>
                                        </h4>
                                    </div>
                                    <span class="status-badge <?php echo $is_expired ? 'status-past' : 'status-upcoming'; ?>">
                                        <?php echo $is_expired ? 'Past Event' : 'Upcoming'; ?>
                                    </span>
                                </div>

                                <div class="meta-line mt-2">
                                    <i class="bi bi-geo-alt"></i>
                                    <span><?php echo htmlspecialchars($row['venue']); ?></span>
                                </div>

                                <div class="meta-line">
                                    <i class="bi bi-calendar-event"></i>
                                    <span><?php echo $eventDate; ?></span>
                                </div>

                                <div class="registered-text mt-1">
                                    <i class="bi bi-clock-history me-1"></i>
                                    Registered on <?php echo $registeredAt; ?>
                                </div>

                                <?php if ($is_expired): ?>
                                    <div class="expired-label">
                                        <i class="bi bi-exclamation-triangle-fill"></i>
                                        <span>This event has already passed.</span>
                                    </div>
                                <?php else: ?>
                                    <!-- SweetAlert cancel form -->
                                    <form class="cancelForm mt-3 d-flex justify-content-between align-items-center" method="POST" action="cancel_booking.php">
                                        <input type="hidden" name="event_id" value="<?php echo $row['id']; ?>">
                                        <button type="button" class="btn btn-outline-danger btn-sm cancelBtn cancel-btn">
                                            <i class="bi bi-x-circle me-1"></i>Cancel Booking
                                        </button>
                                    </form>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            } else { ?>
                <div class="col-12">
                    <div class="empty-state">
                        <div class="empty-icon">
                            <i class="bi bi-calendar2-x"></i>
                        </div>
                        <div class="empty-title">No bookings yet</div>
                        <div class="empty-text">
                            You haven’t registered for any events. Explore upcoming events and book your first one!
                        </div>
                        <a href="events.php" class="btn btn-primary empty-btn">
                            <i class="bi bi-compass me-1"></i> Browse Events
                        </a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- SweetAlert: confirm cancel + show status message -->
<script>
    // Confirm cancel with SweetAlert
    document.querySelectorAll(".cancelBtn").forEach(button => {
        button.addEventListener("click", function () {
            const form = this.closest("form");

            Swal.fire({
                title: "Cancel booking?",
                text: "Your booking for this event will be cancelled.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, cancel it",
                cancelButtonText: "No, keep it",
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6"
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });

    // Show SweetAlert on status (from cancel_booking.php redirect)
    <?php if(isset($_GET['status']) && $_GET['status'] === "cancelled"): ?>
    Swal.fire({
        icon: "success",
        title: "Booking cancelled",
        text: "Your event booking has been successfully cancelled.",
        confirmButtonColor: "#4c6fff"
    });
    <?php elseif(isset($_GET['status']) && $_GET['status'] === "error"): ?>
    Swal.fire({
        icon: "error",
        title: "Error",
        text: "An error occurred while cancelling your booking. Please try again.",
        confirmButtonColor: "#d33"
    });
    <?php endif; ?>
</script>

<?php if (isset($_SESSION['added'])): ?>
<script>
    Swal.fire({
        icon: 'success',
        title: 'Booking Successful',
        text: 'Your event booking has been added successfully.',
        confirmButtonColor: '#4c6fff'
    });
</script>
<?php unset($_SESSION['added']); endif; ?>

<?php if (isset($_SESSION['exist'])): ?>
<script>
    Swal.fire({
        icon: 'warning',
        title: 'Already Booked',
        text: 'You have already booked this event. Check your bookings list.',
        confirmButtonColor: '#ff9f43'
    });
</script>
<?php unset($_SESSION['exist']); endif; ?>

</body>
</html>