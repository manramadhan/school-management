<?php
include('../db/functions.php');
$id = $_GET['id'];

if (deleteClass($conn, $id)) {
    header('Location: index.php');
} else {
    echo "Error deleting class.";
}
?>
