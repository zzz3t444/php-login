<?php
session_start(); // Memulai session

// Periksa apakah session username telah diatur
if (!isset($_SESSION['username'])) {
    // Jika tidak ada session, redirect ke halaman login atau halaman lain yang sesuai
    header("location: index.php");
    exit; // Penting untuk menghentikan eksekusi kode setelah melakukan redirect
}

// Jika session username telah diatur, ambil nama pengguna dari session
$username = $_SESSION['username'];
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="../style/admin.css">
    <title>Welcome</title>
</head>

<body class="bg-gradient-to-r all-container from-blue-500 to-purple-500 text-white">
    <div class="container mx-auto p-8 text-center">
        <h1 class="text-5xl font-bold mt-10 mb-8">
            Selamat Datang,
            <?php echo $username; ?>!
        </h1>

        <div class="flex justify-center space-x-4">
            <a class="button" href="logout.php">Log Out</a>
            <a class="button" href="output.php">Show Data</a>
            <a class="button" href="delete.php">Delete Account</a>
        </div>
    </div>
</body>

</html>