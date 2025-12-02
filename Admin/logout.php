<?php
    session_name('admin_session');
    session_start();
    
    session_unset();    
    session_destroy();

    session_start();
    $_SESSION['logout_message'] = true;

    header("Location: index.php");
    exit();
?>