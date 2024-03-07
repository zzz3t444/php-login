<?php
session_start(); // Mulai session

// Periksa apakah session username telah diatur
if (!isset($_SESSION['username'])) {
    // Jika tidak ada session, redirect ke halaman login atau halaman lain yang sesuai
    header("location: index.php");
    exit; // Penting untuk menghentikan eksekusi kode setelah melakukan redirect
}

// Mengambil nama pengguna dari session
$username = $_SESSION['username'];

// Menghapus akun dari database
$host = "localhost"; // Ganti dengan host database Anda
$dbusername = "root"; // Ganti dengan username database Anda
$dbpassword = ""; // Ganti dengan password database Anda
$dbname = "login_up"; // Ganti dengan nama database yang ingin Anda gunakan

// Membuat koneksi ke database
$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Query untuk menghapus akun pengguna
$sql = "DELETE FROM users WHERE username='$username'";

if ($conn->query($sql) === true) {
    // Jika penghapusan berhasil, hancurkan session dan redirect ke halaman login
    session_unset(); // Menghapus semua variabel session
    session_destroy(); // Menghancurkan session
    header("location: admin.php");
    exit; // Penting untuk menghentikan eksekusi kode setelah melakukan redirect
} else {
    echo "Error deleting account: " . $conn->error;
}

$conn->close();
?>
