<?php
session_start(); // Start the session

// Check if the user is not logged in
if (!isset($_SESSION['AdminLoginID'])) {
    header("location:index.php"); // Redirect to the login page
    exit;
}
?>
