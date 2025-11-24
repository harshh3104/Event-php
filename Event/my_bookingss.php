<?php
session_start();
include "connection.php";

if(!isset($_SESSION['mail'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['mail'];
$user_q = mysqli_query($conn, "select id FROM users WHERE name='$username'");
$user = mysqli_fetch_assoc($user_q);
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            padding-top: 30px;
        }
        .card{
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .card-title {
            color: #0d6efd;
        }
        .expired-event {
            opacity: 0.7;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <h1 class="text-center mb-4">My Bookings</h1>
    <br>        
    <?php
    // Display status messages for booking cancellation
    if(isset($_GET['status'])) {
        if($_GET['status'] == 'cancelled') {
            echo '<div class="alert alert-success text-center" role="alert">✅ Booking has been successfully cancelled.</div>';
        } else if ($_GET['status'] == 'error') {
            echo '<div class="alert alert-danger text-center" role="alert">❌ An error occurred while canceling the booking.</div>';
        }
    }
    ?>
    <br>
    <div class="row">
        <?php
        if(mysqli_num_rows($result) > 0) {
            // Set the timezone and current date for event expiration check
            date_default_timezone_set('Asia/Kolkata');
            $current_date = date("Y-m-d");
            
            while($row = mysqli_fetch_assoc($result)) {
                $is_expired = ($row['date'] < $current_date);
                $card_class = $is_expired ? 'expired-event' : '';
                
                echo '<div class="col-12 col-md-6 col-lg-4">';
                echo '<div class="card ' . $card_class . '">';
                echo '<div class="card-body">';
                echo '<h4 class="card-title">'.$row['title'].'</h4>';
                echo '<p class="card-text"><strong>Venue:</strong> '.$row['venue'].'</p>';
                echo '<p class="card-text"><strong>Date:</strong> '.$row['date'].'</p>';
                echo '<p class="card-text"><small class="text-muted">Registered At: '.$row['registered_at'].'</small></p>';

                if ($is_expired) {
                    echo '<p class="text-danger mt-3">This event has already passed.</p>';
                } else {
                    echo '<form action="cancel_booking.php" method="POST" onsubmit="return confirm(\'Are you sure you want to cancel this booking?\');">';
                    echo '<input type="hidden" name="event_id" value="'.$row['id'].'">';
                    echo '<button type="submit" class="btn btn-danger mt-3">Cancel Booking</button>';
                    echo '</form>';
                }
                
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo '<div class="col-12">';
            echo '<div class="alert alert-info text-center" role="alert">';
            echo 'You have not booked any events yet.';
            echo '</div>';
            echo '</div>';
        }
        ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>