<?php
include '../db/functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $subject_name = $_POST['subject_name'];
    addSubject($conn, $subject_name);
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Subject</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container">
        <h1>Add New Subject</h1>
        <form method="POST">
            <div class="form-group">
                <label for="subject_name">Subject Name</label>
                <input type="text" name="subject_name" id="subject_name" autocomplete="off" autofocus required>
            </div>
            <button type="submit">Add Subject</button>
        </form>
        <a href="index.php" class="back-btn">Kembali</a>
    </div>
</body>
</html>
