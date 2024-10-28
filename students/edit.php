<?php
include('../db/functions.php');
$id = $_GET['id'];
$student = getStudentById($conn, $id);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $class_id = $_POST['class_id'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    
    if (updateStudent($conn, $id, $name, $age, $class_id, $address, $phone)) {
        header('Location: index.php');
    } else {
        echo "Error updating student.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container">
        <h1>Edit Student</h1>
        <form action="" method="POST">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" value="<?= $student['name'] ?>" required>
            </div>
            <div class="form-group">
                <label for="age">Age</label>
                <input type="number" name="age" value="<?= $student['age'] ?>" required>
            </div>
            <div class="form-group">
                <label for="class_id">Class</label>
                <select name="class_id" required>
                    <?php
                    $classes = $conn->query("SELECT * FROM classes");
                    while ($class = $classes->fetch_assoc()) {
                        $selected = $class['id'] == $student['class_id'] ? "selected" : "";
                        echo "<option value='{$class['id']}' {$selected}>{$class['class_name']}</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" name="address" value="<?= $student['address'] ?>" autocomplete="off" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" name="phone" value="<?= $student['phone'] ?>" required>
            </div>
            <div class="form-group">
                <button type="submit">Update Student</button>
            </div>
        </form>
        <a href="index.php" class="back-btn">Kembali</a>
    </div>
</body>
</html>
