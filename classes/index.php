<?php
include('../db/functions.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Classes</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container">
        <h1>Manage Classes</h1>
        <a href="add.php" class="btn">Add New Class</a>
        <table>
            <tr>
                <th>ID</th>
                <th>Class Name</th>
                <th>Action</th>
            </tr>
            <?php
            $classes = getAllClasses($conn); 
            $no = 1;
            if ($classes->num_rows > 0) {
                while ($row = $classes->fetch_assoc()) {
                    echo "<tr>
                        <td>{$no}</td> 
                        <td>{$row['class_name']}</td>
                        <td>
                            <a href='edit.php?id={$row['id']}'>Edit</a> |
                            <a href='delete.php?id={$row['id']}' onclick='return confirm(\"Are you sure?\")'>Delete</a>
                        </td>
                    </tr>";
                    $no++; 
                }
            } else {
                echo "<tr><td colspan='4'>No classes found.</td></tr>";
            }
            ?>
        </table>
        <a href="../index.php" class="btn">Back to Home</a>
    </div>
</body>
</html>
