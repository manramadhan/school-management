<?php
include('../db/functions.php');
$id = $_GET['id'];

if (deleteAttendance($conn, $id)) {
    header('Location: index.php');
} else {
    echo "Error deleting attendance.";
}
?>
