<?php
session_start(); // Start the session
require("connection.php");

if (isset($_POST['signin'])) {
    $adminName = $_POST['AdminName'];
    $adminPassword = $_POST['Adminpassword'];

    // Prepare the SQL statement using prepared statements
    $query = "SELECT * FROM `user` WHERE `username`=? AND `password`=?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "ss", $adminName, $adminPassword);
    mysqli_stmt_execute($stmt);

    // Get the result
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) == 1) {
        $_SESSION['AdminLoginID'] = $adminName;
        header("location:home.php");
        exit;
    } else {
        $errorMessage = "Incorrect password";
        echo "<script>alert('$errorMessage');</script>";
        // echo "<p class='error-message'>$errorMessage</p>";
    }
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <link rel="stylesheet" href="style.css">
    <style>
    .error-message {
        color: red;
        font-weight: bold;
    }

    .logout-message {
        color: green;
        font-weight: bold;
    }
    </style>
</head>

<body>
    <header>
        <h2>Full-stack</h2>
        <nav>
            <a href="">HOME</a>
            <a href="">BLOG</a>
            <a href="">CONTACT</a>
            <a href="">ABOUT</a>
        </nav>
        <div class="sign-in-up">
            <button type="button" onclick="popup('login-popup')"> LOGIN</button>
            <button type="button" onclick="popup('register-popup')"> REGISTER</button>
        </div>
    </header>
    <div class="popup-container" id="login-popup">
        <div class="popup">
            <form method="POST" name="loginForm" onsubmit="return validateForm()">
                <h2>
                    <span>LOGIN</span>
                    <button type="reset" onclick="popup('login-popup')">X</button>
                </h2>
                <input type="text" placeholder="Email Address" name="AdminName">
                <input type="password" placeholder="Password" name="Adminpassword">
                <button type="submit" name='signin' class="login-btn"> Login</button>
            </form>
        </div>
    </div>
    <div class="popup-container" id="register-popup">
        <div class="register popup">
        <form method="POST" action="register.php">
                <h2>
                    <span>Enter Gegister Details</span>
                    <button type="reset" onclick="popup('register-popup')">X</button>
                </h2>
                <input type="text" placeholder="First Name" name="firstName">
                <input type="text" placeholder="Surname" name="surname">
                <input type="email" placeholder="Email" name="email">
                <input type="text" placeholder="terms" name="terms">
                <button type="submit" name='register' class="register-btn">Register</button>
            </form>
        </div>
    </div>

    <script>
    function popup(popup_name) {
        get_popup = document.getElementById(popup_name);
        if (get_popup.style.display === "flex") {
            get_popup.style.display = "none"
        } else {
            get_popup.style.display = "flex"
        }
    }

    function validateForm() {
        var adminName = document.forms["loginForm"]["AdminName"].value;
        var adminPassword = document.forms["loginForm"]["Adminpassword"].value;

        if (adminName == "") {
            alert("Username must be filled out");
            return false;
        }

        if (adminPassword == "") {
            alert("Password must be filled out");
            return false;
        }
    }
    </script>
</body>

</html>