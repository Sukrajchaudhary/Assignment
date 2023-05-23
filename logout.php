<?php
session_start(); // Start the session

// Destroy the session
session_destroy();

// Set the logout message
$_SESSION['logout_message'] = "You have been successfully logged out.";

// Redirect to the login page
header("location:index.php");
exit;
?>
