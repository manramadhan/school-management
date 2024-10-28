<?php
include('../db/functions.php');
$id = $_GET['id'];
$attendance = getAttendanceById($conn, $id);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $student_id = $_POST['student_id'];
    $class_id = $_POST['class_id'];
    $date = $_POST['date'];
    $status = $_POST['status'];
    
    if (updateAttendance($conn, $id, $student_id, $class_id, $date, $status)) {
        header('Location: index.php');
    } else {
        echo "Error updating attendance.";
    }
}

$students = getAllStudents($conn);
$classes = getAllClasses($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Attendance</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container">
        <h1>Edit Attendance</h1>
        <form action="" method="POST">
            <div class="form-group">
                <label for="student_id">Student</label>
                <select name="student_id" required>
                    <?php while ($row = $students->fetch_assoc()) { ?>
                        <option value="<?= $row['id'] ?>" <?= $attendance['student_id'] == $row['id'] ? 'selected' : '' ?>><?= $row['name'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="class_id">Class</label>
                <select name="class_id" required>
                    <?php while ($row = $classes->fetch_assoc()) { ?>
                        <option value="<?= $row['id'] ?>" <?= $attendance['class_id'] == $row['id'] ? 'selected' : '' ?>><?= $row['class_name'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="date">Date</label>
                <input type="date" name="date" value="<?= $attendance['date'] ?>" required>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" required>
                    <option value="Present" <?= $attendance['status'] == 'Present' ? 'selected' : '' ?>>Present</option>
                    <option value="Absent" <?= $attendance['status'] == 'Absent' ? 'selected' : '' ?>>Absent</option>
                </select>
            </div>
            <div class="form-group">
                <button type="submit">Update Attendance</button>
            </div>
        </form>
        <a href="index.php" class="back-btn">Kembali</a>
    </div>
</body>
</html>
