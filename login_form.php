<?php
require 'config.php';
if (isset($_POST["submit"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE email = '$email'");
    $row = mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result) > 0) {
        if ($password == $row["password"]) {
            $_SESSION["login"] = true;
            $_SESSION["id"] = $row["id"];
            header("Location: homepage.php");
        } else {
            echo
                "<script> alert('Wrong Password')</script>";
        }
    } else {
        echo
            "<script> alert('User Not Registered. Register First.') </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" type="image/png" href="images/weblogo.jpg">
    <link rel="stylesheet" href="css/login_form.css"/>   
</head>
<body>
    <div class="container">
        <h1>Login</h1>
        <form action="" method="post" autocomplete="off">
            <div class="email">
                <label for="email">Email:</label>
                <input type="text" id="email" name="email" placeholder="Enter your email" required>
            </div>

            <div class="password">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
            </div>

            <div class="button-container">
                <button type="submit" name="submit">Login</button>
            </div>

            <div class="register">
                <p>Don't have an account? <a href="registration_form.php">Register</a></p>
            </div>
        </form>
    </div>
</body>
</html>
