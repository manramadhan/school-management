<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Arahkan ke halaman login jika belum login
    exit();
}

// Ambil data pengguna dari session dengan pemeriksaan
$user_id = $_SESSION['user_id'];
$username = isset($_SESSION['username']) ? $_SESSION['username'] : 'Pengguna'; // Nilai default jika username tidak ada
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Sistem Manajemen Sekolah</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>  
    <div class="container">
        <h1>Selamat Datang, <?php echo htmlspecialchars($username); ?>!</h1>
        <nav>
            <ul>
                <li><a class="btn" href="/students/index.php">Manajemen Siswa</a></li>
                <li><a class="btn" href="/teachers/index.php">Manajemen Guru</a></li>
                <li><a class="btn" href="/classes/index.php">Manajemen Kelas</a></li>
                <li><a class="btn" href="/subjects/index.php">Manajemen Mata Pelajaran</a></li>
                <li><a class="btn" href="/attendances/index.php">Manajemen Kehadiran</a></li>
            </ul>
        </nav>
        <a href="logout.php" class="back-btn" onclick="return confirm('Are you sure you want to logout?')" class="btn">Logout</a>
    </div>
</body>
</html>
