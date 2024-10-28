<?php
include('/db/functions.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = registerUser($conn, $username, $email, $password);

    if ($result === true) {
        header("Location: login.php");
        exit;
    } else {
        echo $result;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="../school_management/css/style.css">
</head>
<body>
    <div class="auth-container">
        <h2>Register</h2>
        <form action="register.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" autocomplete="off" autofocus required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" autocomplete="off" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Register</button>
        </form>
        <div class="auth-link">
            <a href="login.php">Already have an account? Login here</a>
        </div>
    </div>
</body>
</html>
