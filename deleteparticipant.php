<?php
include('connection.php');
require('auth.php'); 
if (isset($_GET['deleteid'])) {
    $deleteId = $_GET['deleteid'];

    // Perform the delete operation
    $query = "DELETE FROM participant WHERE id = $deleteId";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Redirect to the same page after successful deletion
        echo"<script> alert(' Deleted Successfully')</script>";
        header("Location: home.php");
        
        exit();
    } else {
        echo "Error deleting the participant.";
    }
}

mysqli_close($conn);
?>
