<?php
$host = "localhost"; // ganti dengan host database Anda
$dbusername = "root"; // ganti dengan username database Anda
$dbpassword = ""; // ganti dengan password database Anda
$dbname = "login_up"; // ganti dengan nama database yang ingin Anda gunakan

$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
