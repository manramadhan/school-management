<?php
include('../db/functions.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $class_name = $_POST['class_name'];
    
    if (addClass($conn, $class_name)) {
        header('Location: index.php');
    } else {
        echo "Error adding class.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Class</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container">
        <h1>Add Class</h1>
        <form action="" method="POST">
            <div class="form-group">
                <label for="class_name">Class Name</label>
                <input type="text" name="class_name" autocomplete="off" autofocus required>
            </div>
            <div class="form-group">
                <button type="submit">Add Class</button>
            </div>
        </form>
        <a href="index.php" class="back-btn">Kembali</a>
    </div>
</body>
</html>
