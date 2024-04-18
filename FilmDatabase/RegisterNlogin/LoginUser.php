<?php
session_start();
@include 'dbconnection.php';

if(isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = md5($_POST['password']); // Assuming passwords are stored as MD5 hashes

    $query = "SELECT * FROM user WHERE `email` = '$email' AND `password` = '$password'";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) == 1) {
        // User found, redirect to dashboard or another page
        $_SESSION['loggedin'] = true;
        header("Location:../Userinterface/UI.html");
        exit;
    } else {
        // User not found or incorrect password
        echo "Invalid email or password.";
    }
}
?>
