<?php
include('/db/functions.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usernameOrEmail = $_POST['username_or_email'];
    $password = $_POST['password'];

    $result = loginUser($conn, $usernameOrEmail, $password);

    if ($result === true) {
        header("Location: index.php");
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
    <title>Login</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <div class="auth-container">
        <h2>Login</h2>
        <form action="login.php" method="POST">
            <label for="username_or_email">Username or Email:</label>
            <input type="text" id="username_or_email" name="username_or_email" autofocus autocomplete="off" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Login</button>
        </form>
        <div class="auth-link">
            <a href="register.php">Don't have an account? Register here</a>
        </div>
    </div>
</body>
</html>
