<?php
include '../db/functions.php';

if (isset($_GET['id'])) {
    $subject = getSubjectById($conn, $_GET['id']);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $subject_name = $_POST['subject_name'];
    updateSubject($conn, $_POST['id'], $subject_name);
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Edit Subject</title>
</head>
<body>
    <div class="container">
        <h1>Edit Subject</h1>
        <form method="POST">
            <input type="hidden" name="id" value="<?php echo $subject['id']; ?>">
            <div class="form-group">
                <label for="subject_name">Subject Name</label>
                <input type="text" name="subject_name" id="subject_name" value="<?php echo $subject['subject_name']; ?>" autocomplete="off" required>
            </div>
            <button type="submit">Update Subject</button>
        </form>
        <a href="index.php" class="back-btn">Kembali</a>
    </div>
</body>
</html>
