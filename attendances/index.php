<?php
include('../db/functions.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Attendance</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container">
        <h1>Manage Attendance</h1>
        <a href="add.php" class="btn">Add Attendance</a>
        <table>
            <tr>
                <th>ID</th>
                <th>Student</th>
                <th>Class</th>
                <th>Date</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            <?php
            $attendances = getAllAttendances($conn); 
            $no = 1;
            if ($attendances->num_rows > 0) {
                while ($row = $attendances->fetch_assoc()) {
                    $date = date("d-m-Y", strtotime($row['date']));
                    echo "<tr>
                        <td>{$no}</td>
                        <td>{$row['student_name']}</td>
                        <td>{$row['class_name']}</td>
                        <td>{$date}</td>
                        <td>{$row['status']}</td>
                        <td>
                            <a href='edit.php?id={$row['id']}'>Edit</a> |
                            <a href='delete.php?id={$row['id']}' onclick='return confirm(\"Are you sure?\")'>Delete</a>
                        </td>
                    </tr>";
                    $no++;
                }
            } else {
                echo "<tr><td colspan='6'>No attendances found.</td></tr>"; 
            }
            ?>
        </table>
        <a href="../index.php" class="btn">Back to Home</a>
    </div>
</body>
</html>
