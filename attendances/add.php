<?php
include('../db/functions.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $student_id = $_POST['student_id'];
    $class_id = $_POST['class_id'];
    $date = $_POST['date'];
    $status = $_POST['status'];
    
    if (addAttendance($conn, $student_id, $class_id, $date, $status)) {
        header('Location: index.php');
    } else {
        echo "Error adding attendance.";
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
    <title>Add Attendance</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container">
        <h1>Add Attendance</h1>
        <form action="" method="POST">
            <div class="form-group">
                <label for="student_id">Student</label>
                <select name="student_id" required>
                    <?php while ($row = $students->fetch_assoc()) { ?>
                        <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="class_id">Class</label>
                <select name="class_id" required>
                    <?php while ($row = $classes->fetch_assoc()) { ?>
                        <option value="<?= $row['id'] ?>"><?= $row['class_name'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="date">Date</label>
                <input type="date" name="date" required>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" required>
                    <option value="Present">Present</option>
                    <option value="Absent">Absent</option>
                </select>
            </div>
            <div class="form-group">
                <button type="submit">Add Attendance</button>
            </div>
        </form>
        <a href="index.php" class="back-btn">Kembali</a>    
    </div>
</body>
</html>
