<?php
    session_start();
    include "connection.php";

    date_default_timezone_set('Asia/Kolkata');
    $current_date = date("Y-m-d");

    $status_type = "";
    $status_msg  = "";

    // Handle booking BEFORE any HTML
    if (isset($_POST['event_id']) && isset($_SESSION['mail'])) {

        // Logged-in user's email (stored in session during login)
        $email   = mysqli_real_escape_string($conn, $_SESSION['mail']);
        $event_id = (int)$_POST['event_id'];

        // 1) Get user id using EMAIL (correct)
        $user_q = mysqli_query($conn, "SELECT id FROM users WHERE email='$email'");
        if (!$user_q || mysqli_num_rows($user_q) == 0) {
            $status_type = "danger";
            $status_msg  = "User not found for this session.";
        } else {
            $user = mysqli_fetch_assoc($user_q);
            $user_id = (int)$user['id'];

            // 2) Get event date and make sure it exists
            $event_q = mysqli_query($conn, "SELECT date FROM events WHERE id='$event_id'");
            if (!$event_q || mysqli_num_rows($event_q) == 0) {
                $status_type = "danger";
                $status_msg  = "Event not found.";
            } else {
                $event_data = mysqli_fetch_assoc($event_q);

                // 3) Check if event is already past
                if ($event_data['date'] < $current_date) {
                    $status_type = "danger";
                    $status_msg  = "❌ This event has already passed and cannot be booked.";
                } else {
                    // 4) Prevent duplicate booking
                    $check = mysqli_query($conn, "SELECT * FROM registrations WHERE user_id='$user_id' AND event_id='$event_id'");
                    if ($check && mysqli_num_rows($check) > 0) {
                        $_SESSION['exist'] = true;
                        header("Location: my_bookingss.php");
                        exit();
                    }

                    // 5) Insert new booking
                    $date = date("Y-m-d H:i:s");
                    $insert = mysqli_query($conn, "INSERT INTO registrations (user_id, event_id, registered_at)VALUES ('$user_id', '$event_id', '$date')");

                    if ($insert) {
                        $_SESSION['added'] = true;
                        header("Location: my_bookingss.php");
                        exit();
                    } else {
                        $status_type = "danger";
                        $status_msg  = "❌ Error in booking: " . mysqli_error($conn);
                    }
                }
            }
        }
    } else {
        $status_type = "info";
        $status_msg  = "Invalid request.";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Status | Eventura</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .container { margin-top: 80px; }
    </style>
</head>
<body>
<div class="container">
    <div class="d-flex justify-content-center">
        <?php if ($status_msg !== ""): ?>
            <div class="alert alert-<?php echo $status_type; ?> text-center" role="alert">
                <?php echo $status_msg; ?>
            </div>
        <?php endif; ?>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>