<?php
    session_start();
    include "connection.php";

    if(!isset($_SESSION['mail'])) {
        header("Location: login.php");
        exit();
    }

    if(isset($_POST['event_id'])) {
        $event_id = $_POST['event_id'];
        $username = $_SESSION['uname'];
        
        // Get logged-in user id
        $user_q = mysqli_query($conn, "select id FROM users WHERE name='$username'");
        $user = mysqli_fetch_assoc($user_q);
        $user_id = $user['id'];

        // Delete the booking
        $delete_query = "DELETE FROM registrations WHERE user_id='$user_id' AND event_id='$event_id'";
        $delete_result = mysqli_query($conn, $delete_query);

        if($delete_result) {
            // Redirect to my_bookings.php with a success message
            header("Location: my_bookingss.php?status=cancelled");
            exit();
        } else {
            // Redirect to my_bookings.php with an error message
            header("Location: my_bookingss.php?status=error");
            exit();
        }
    } else {
        // Redirect if no event_id is provided
        header("Location: my_bookingss.php");
        exit();
    }
?>