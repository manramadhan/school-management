<?php
include '../db/functions.php';
$subjects = getAllSubjects($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Subjects</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container">
        <h1>Manage Subjects</h1>
        <a href="add.php" class="btn">Add New Subject</a>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Subject Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $no = 1; 
                while ($row = $subjects->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $no; ?></td> 
                        <td><?php echo $row['subject_name']; ?></td>
                        <td>
                            <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn">Edit</a>
                            <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn" onclick="return confirmDelete();">Delete</a>
                        </td>
                    </tr>
                <?php 
                $no++; 
                } ?>
            </tbody>
        </table>
        <a href="../index.php" class="btn">Back to Home</a>
    </div>
</body>
</html>
