<?php
include('../db/functions.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $phone = $_POST['phone'];
    
    // Sanitasi input untuk mencegah XSS
    $name = htmlspecialchars($name);
    $subject = htmlspecialchars($subject);
    $phone = htmlspecialchars($phone);
    
    if (addTeacher($conn, $name, $subject, $phone)) {
        header('Location: index.php');
        exit(); // Pastikan tidak ada output setelah header
    } else {
        echo "Error adding teacher.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Teacher</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container">
        <h1>Add Teacher</h1>
        <form action="" method="POST">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" autocomplete="off" autofocus required>
            </div>
            <div class="form-group">
                <label for="subject">Subject</label>
                <input type="text" name="subject" autocomplete="off" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" name="phone" autocomplete="off" required>
            </div>
            <div class="form-group">
                <button type="submit">Add Teacher</button>
            </div>
        </form>
        <a href="index.php" class="back-btn">Kembali</a>
    </div>
</body>
</html>
