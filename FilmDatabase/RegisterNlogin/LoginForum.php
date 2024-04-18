<?php
session_start();
@include 'dbconnection.php';

if(isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = md5($_POST['password']); 

    $query = "SELECT * FROM admin WHERE `email` = '$email' AND `password` = '$password'";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) == 1) {
        
        $_SESSION['loggedin'] = true;
        header("Location:../addFilm/uploadMovie.php");
        exit;
    } else {
        
        echo "Invalid email or password.";
    }
}
?>
