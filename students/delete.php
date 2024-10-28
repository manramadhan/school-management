<?php
include('../db/functions.php');
$id = $_GET['id'];

if (deleteStudent($conn, $id)) {
    header('Location: index.php');
} else {
    echo "Error deleting student.";
}
?>
