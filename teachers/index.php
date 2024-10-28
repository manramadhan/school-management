<?php
include('../db/functions.php'); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Teachers</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container">
        <h1>Manage Teachers</h1>
        <a href="add.php" class="btn">Add New Teacher</a>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Subject</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $teachers = getAllTeachers($conn);

            $no = 1;
            
            if ($teachers->num_rows > 0) {
                while($row = $teachers->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $no . "</td>"; 
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['subject'] . "</td>";
                    echo "<td>" . $row['phone'] . "</td>";
                    echo "<td><a href='edit.php?id=" . $row['id'] . "'>Edit</a> | ";
                    echo "<a href='delete.php?id=" . $row['id'] . "' onclick='return confirm(\"Are you sure?\")'>Delete</a></td>";
                    echo "</tr>";
                    $no++; 
                }
            } else {
                echo "<tr><td colspan='6'>Tidak ada guru ditemukan.</td></tr>";
            }
            ?>
            </tbody>
        </table>
        <a href="../index.php" class="btn">Back to Home</a>
    </div>
</body>
</html>
