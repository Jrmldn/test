<?php
require 'config.php';
if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirmpassword"];
    $duplicate = mysqli_query($conn, "SELECT * FROM tb_user WHERE name = '$name' OR email = '$email'");
    if (mysqli_num_rows($duplicate) > 0) {
        echo
            "<script> alert('Name or Email Has Already Taken'); </script>";
    } else {
        if ($password == $confirmpassword) {
            $query = "INSERT INTO tb_user VALUES('','$name', '$email', '$password')";
            mysqli_query($conn, $query);
            echo
                "<script> alert('Registration Successful!'); </script>";
            header("Location: login_form.php");
            exit(); 
        } else {
            echo
                "<script> alert('Password Does Not Match'); </script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="icon" type="image/png" href="images/weblogo.jpg">
    <link rel="stylesheet" href="css/registration_form.css"/>
</head>
<body>
    <div class="container">
        <h1>Registration</h1>
        <form class="" action="" method="post" autocomplete="off">
            <div class="name">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required value="">
            </div>

            <div class="email">
                <label for="name">Email:</label>
                <input type="email" id="email" name="email" required value="">
            </div>

            <div class="password">
                <label for="name">Password:</label>
                <input type="password" id="password" name="password" required value="">
            </div>

            <div class="confirmpassword">
                <label for="name">Confirm Password:</label>
                <input type="password" id="confirmpassword" name="confirmpassword" required value="">
            </div>

            <div class="button-container">
                <button type="submit" name="submit">Register</button>
            </div>

            <div class="login">
                <p>Already have an account? <a href="login_form.php">Login</a></p>
            </div>
        </form>
    </div>
</body>
</html>