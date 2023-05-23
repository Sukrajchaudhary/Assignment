<?php
require("connection.php");

if (isset($_POST['register'])) {
    $firstName = $_POST['firstName'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $terms = $_POST['terms'];

    $query = "INSERT INTO interest (firstname, surname, email, terms) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "ssss", $firstName, $surname, $email, $terms);
    mysqli_stmt_execute($stmt);

    if (mysqli_stmt_affected_rows($stmt) > 0) {
        header("location: index.php");
        exit;
    } else {
        echo "Registration failed";
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>
