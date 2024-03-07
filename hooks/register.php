<?php
session_start();

// Mengambil data dari form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    // Melakukan validasi data (contoh: minimal panjang username dan password)
    if (strlen($username) < 2 || strlen($password) < 4) {
        echo "Username harus minimal 2 karakter dan password minimal 4 karakter.";
        exit;
    }

    // Melakukan koneksi ke database
    $host = "localhost"; // ganti dengan host database Anda
    $dbusername = "root"; // ganti dengan username database Anda
    $dbpassword = ""; // ganti dengan password database Anda
    $dbname = "login_up"; // ganti dengan nama database yang ingin Anda gunakan

    $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    // Membuat tabel user jika belum ada
    $sql = "CREATE TABLE IF NOT EXISTS users (
        id INT(11) AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(50) NOT NULL,
        password VARCHAR(255) NOT NULL,
        email VARCHAR(50) NOT NULL
    )";

    if ($conn->query($sql) === false) {
        echo "Error creating table: " . $conn->error;
        exit;
    }

    // Menyimpan data ke database
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO users (username, password, email) VALUES ('$username', '$hashedPassword', '$email')";

    if ($conn->query($sql) === true) {
        // Registrasi berhasil, atur session
        $_SESSION['registration_successful'] = true;
        echo "Registrasi success! click Home button";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!-- fot web -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="../style/register.css" />
    <title>Document</title>
</head>

<body>
    <div class="ClassName flex justify-center hover:scale-95 duration-300 mt-20">
        <a class=" back-to-home p-4 bg-gray-500 bg-blue-400 font-semibold text-black rounded-lg" href="index.php"> HOME
        </a>
    </div>
</body>

</html>