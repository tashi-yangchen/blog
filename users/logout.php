<?php
session_start();

// Check if a session exists, then destroy it
if (isset($_SESSION['user_id'])) {
    session_unset();   // remove all session variables
    session_destroy(); // destroy the session
}

// Redirect to login page
header("Location: ../login_form.php");
exit;
?>
