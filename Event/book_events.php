<?php
session_start();
include "connection.php";
// The following lines are incorrect and will always get the first user from the database.
// REMOVE these lines from your code. The session mail is already set during login.
// $str="select * from users";
// $res=mysqli_query($conn,$str);
// $row=mysqli_fetch_array($res);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Status | Eventura</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="d-flex justify-content-center">
        <?php
        if(isset($_POST['event_id']) && isset($_SESSION['mail'])) {
            // Correct way to get the logged-in user's email from the session
            $username = $_SESSION['mail'];
            $event_id = $_POST['event_id'];
            
            // Get logged-in user id using a safe method
            $s = "select id from users where name='$username'";
            $user_q = mysqli_query($conn, $s);
            $user = mysqli_fetch_assoc($user_q);
            $user_id = $user['id'];

            // --- New check for past events ---
            $event_q = mysqli_query($conn, "SELECT date FROM events WHERE id='$event_id'");
            $event_data = mysqli_fetch_assoc($event_q);
            
            date_default_timezone_set('Asia/Kolkata');
            $current_date = date("Y-m-d");

            if ($event_data['date'] < $current_date) {
                echo '<div class="alert alert-danger text-center" role="alert">';
                echo '❌ This event has already passed and cannot be booked.';
                echo '</div>';
                exit();
            }
            // --- End of new check ---
            
            // Prevent duplicate booking
            $check = mysqli_query($conn, "SELECT * FROM registrations WHERE user_id='$user_id' AND event_id='$event_id'");
            if(mysqli_num_rows($check) > 0) {
                echo '<div class="alert alert-warning text-center" role="alert">';
                echo '⚠ You already registered for this event. <a href="my_bookingss.php" class="alert-link">View My Bookings</a>';
                echo '</div>';
                exit();
            }

            date_default_timezone_set('Asia/Kolkata');
            
            // Insert new booking
            $date = date("Y-m-d H:i:s");
            $insert = mysqli_query($conn, "INSERT INTO registrations (user_id, event_id, registered_at) VALUES ('$user_id', '$event_id', '$date')");

            if($insert) {
                echo '<div class="alert alert-success text-center" role="alert">';
                echo '✅ Booking Successful! <a href="my_bookingss.php" class="alert-link">View My Bookings</a>';
                echo '</div>';
            } else {
                echo '<div class="alert alert-danger text-center" role="alert">';
                echo '❌ Error in booking.';
                echo '</div>';
            }
        } else {
            echo '<div class="alert alert-info text-center" role="alert">';
            echo 'Invalid request.';
            echo '</div>';
        }
        ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>