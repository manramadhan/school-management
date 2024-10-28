<?php
include('../db/functions.php');
$id = $_GET['id'];

if (deleteTeacher($conn, $id)) {
    header('Location: index.php');
} else {
    echo "Error deleting teacher.";
}
?>
