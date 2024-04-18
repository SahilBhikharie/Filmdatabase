<?php

@include 'dbconnection.php';

if (isset($_POST['submit'])){

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password= md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);
    $phonenumber = mysqli_real_escape_string($conn, $_POST['phonenumber']);

    $select = "SELECT * FROM user WHERE email = '$email'";

    $result = mysqli_query($conn, $select);

    if (mysqli_num_rows($result) > 0){
        $error[] = "User already exists!";
    } else {
        if($password != $cpassword){
            $error[] = "Password not matched";
        } else {
            $insert = "INSERT INTO user(name, email, password, phonenumber) VALUES('$name','$email','$password','$phonenumber')";
            mysqli_query($conn, $insert);
            header('location:/Userinterface/UserLogin.html');
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <link rel="stylesheet" href="Register.css">
</head>
<body>
    
<div class="form-container">

<form action="" method="post" >
    <h3>User Registration</h3>
    <?php
    
    if (isset($error)){
        foreach ($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
        }
    }
    ?>
    <input type="text" name="name" required placeholder="Enter your name" >
    <input type="email" name="email" required placeholder="Enter your e-mail" >
    <input type="password" name="password" required placeholder="Enter your Password" >
    <input type="password" name="cpassword" required placeholder="Confirm password" >
    <input type="text" name="phonenumber" required placeholder="Enter your phone number" >
    <input type="submit" name="submit" value="Register now" class="form-btn" >
    <p>Already have an account? <a href="UserLogin.html">Login here</a></p>
</form>

</div>

</body>
</html>