<?php
include('../db/functions.php');
$id = $_GET['id'];
$teacher = getTeacherById($conn, $id);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $phone = $_POST['phone'];
    
    if (updateTeacher($conn, $id, $name, $subject, $phone)) {
        header('Location: index.php');
    } else {
        echo "Error updating teacher.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Teacher</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container">
        <h1>Edit Teacher</h1>
        <form action="" method="POST">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" value="<?= $teacher['name'] ?>" autocomplete="off" autofocus required>
            </div>
            <div class="form-group">
                <label for="subject">Subject</label>
                <input type="text" name="subject" value="<?= $teacher['subject'] ?>" autocomplete="off" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" name="phone" value="<?= $teacher['phone'] ?> "autocomplete="off" required>
            </div>
            <div class="form-group">
                <button type="submit">Update Teacher</button>
            </div>
        </form>
        <a href="index.php" class="back-btn">Kembali</a>
    </div>
</body>
</html>
