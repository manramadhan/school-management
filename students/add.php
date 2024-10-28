<?php
include('../db/functions.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $class_id = $_POST['class_id'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    
    if (addStudent($conn, $name, $age, $class_id, $address, $phone)) {
        header('Location: index.php');
        exit();
    } else {
        echo "Error adding student.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
    <link rel="stylesheet" href="../css/style.css"> <!-- Update the path if necessary -->
</head>
<body>
    <div class="container">
        <h1>Add Student</h1>
        <form action="" method="POST">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" autocomplete="off" autofocus required>
            </div>
            <div class="form-group">
                <label for="age">Age</label>
                <input type="number" name="age" required>
            </div>
            <div class="form-group">
                <label for="class_id">Class</label>
                <select name="class_id" required>
                    <?php
                    $classes = $conn->query("SELECT * FROM classes");
                    while ($class = $classes->fetch_assoc()) {
                        echo "<option value='{$class['id']}'>{$class['class_name']}</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" name="address" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" name="phone" autocomplete="off" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn">Add Student</button>
                <a href="index.php" class="btn back-btn">Kembali</a>
            </div>
        </form>
    </div>
</body>
</html>
