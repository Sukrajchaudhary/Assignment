<?php
include('connection.php');
require('auth.php'); 
if (isset($_POST['submit'])) {
    $id = $_GET['editid'];
    $firstname = $_POST['firstname'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $power_output = $_POST['power_output'];
    $distance = $_POST['distance'];

    // Update the participant's details in the database
    $query = "UPDATE participant SET firstname = '$firstname', surname = '$surname', email = '$email', power_output = '$power_output', distance = '$distance' WHERE id = $id";
    mysqli_query($conn, $query);

    // Redirect back to the page that displays all participants
    header("Location: home.php");
    exit();
}