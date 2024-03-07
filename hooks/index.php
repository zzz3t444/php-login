<?php
session_start(); // Memulai session

if (isset($_POST["submit"])) {
  // koneksi ke database
  $conn = mysqli_connect("localhost", "root", "", "login_up");

  // cek tombol submitnya bree
  if ($conn) {
    // ambil data dari form
    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);

    // query ke database
    $stmt = mysqli_prepare($conn, "SELECT * FROM users WHERE username = ?");
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    // cek username dan password
    if (mysqli_num_rows($result) > 0) {
      // ambil password dari database
      $row = mysqli_fetch_assoc($result);
      $passwordDB = $row["password"];

      // cek password
      if (password_verify($password, $passwordDB)) {
        // nek bener, lanjut halaman
        $_SESSION['username'] = $username; // Set session untuk pengguna yang login
        header("location: admin.php");
        exit;
      } else {
        // nek salah, tampilkan salah
        $error = "Username atau password salah";
      }
    } else {
      // nek salah, tampilkan salah
      $error = "Username atau password salah";
    }
  } else {
    echo "Koneksi ke database gagal";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="../style/index.css">
  <title>Login Page</title>
</head>

<body>
  <main class="main-container border mt-48 p-10 rounded-3xl mx-auto max-w-[400px]">
    <div class="ClassName">
      <h1 class="mt-5 text-3xl uppercase text-center tracking-tight font-bold"><span class="text-[#4b90e1]">Log</span>in
        admin</h1>
      <div class="ClassName line rounded-full mx-auto mt-2 h-1 w-16 bg-[#4b90e1]"></div>
    </div>
    <?php if (isset($error)): ?>
      <p style="color: red; font-style: italic">
        username / password lu salah pea!
      </p>
    <?php endif; ?>
    <ul class="mt-28">
      <form action="" method="POST">
        <li class="ClassLabel grid">
          <input class="p-4 border username mt-3 text-sm rounded-lg" type="text" name="username" placeholder="username"
            id="username" />
        </li>
        <li class="ClassLabel mt-6 grid">
          <input class="p-4 border password mt-3 text-sm rounded-lg" type="password" name="password"
            placeholder="password" id="password" />
        </li>
        <li>
          <p class="text-[11px] text-end text-gray-400 hover:text-gray-600 hover:scale-95 duration-300 mt-10">forgot
            password?</p>
        </li>
        <li class="bg-[#4b90e1] mt-3 login w-full p-4 text-center hover:scale-95 duration-200 rounded-lg mx-auto">
          <button class="font-medium text-gray-100 text-sm" type="submit" name="submit">
            Login
          </button>
        </li>
      </form>
      <div class="attention mt-12 flex items-center gap-2 justify-center">
        <p class="text-[11px] text-gray-400">don't have a Account?</p>
        <form class="-mt-1" action="log-regis.php" method="POST">
          <button class="font-semibold text-black hover:scale-105 duration-300 text-[12px]" type="submit"
            name="register">
            Register
          </button>
        </form>
      </div>
    </ul>
  </main>
</body>

</html>