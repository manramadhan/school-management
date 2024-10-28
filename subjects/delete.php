<?php
include '../db/functions.php';

if (isset($_GET['id'])) {
    deleteSubject($conn, $_GET['id']);
    header("Location: index.php");
    exit;
}
?>
