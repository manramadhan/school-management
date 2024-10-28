<?php
include('../db/functions.php'); 

$students = getAllStudentsWithClasses($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Students</title>
    <link rel="stylesheet" href="../css/style.css">    
</head>
<body>
    <div class="container">
        <h1>Manage Students</h1>
        <a href="add.php" class="btn">Add New Student</a>
        <table>
            <tr>
                <th>ID</th> <!-- Ubah header untuk nomor urut -->
                <th>Name</th>
                <th>Age</th>
                <th>Class</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Action</th>
            </tr>
            <?php
            $students = getAllStudents($conn); // Call function to get all students
            if ($students->num_rows > 0) {
                $no = 1; // Inisialisasi nomor urut
                while ($row = $students->fetch_assoc()) {
                    echo "<tr>
                        <td>{$no}</td> 
                        <td>{$row['name']}</td>
                        <td>{$row['age']}</td>
                        <td>{$row['class_name']}</td>
                        <td>{$row['address']}</td>
                        <td>{$row['phone']}</td>
                        <td>
                            <a href='edit.php?id={$row['id']}'>Edit</a> |
                            <a href='delete.php?id={$row['id']}' onclick='return confirm(\"Are you sure?\")'>Delete</a>
                        </td>
                    </tr>";
                    $no++; 
                }
            } else {
                echo "<tr><td colspan='8'>No students found.</td></tr>"; 
            }
            ?>
        </table>
        <p><a href="../index.php" class="btn">Back to Homepage</a></p>
    </div>
</body>
</html>
