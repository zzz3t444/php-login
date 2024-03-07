<?php
session_start(); // Mulai session

if (isset($_POST["register"])) {
    // Lakukan proses registrasi di sini

    // Setelah registrasi berhasil, misalnya Anda ingin mengatur session
    $_SESSION['registration_successful'] = true;

    // Redirect ke halaman lain atau tampilkan pesan sukses
    header("location: log-regis.php");
    exit; // Penting untuk menghentikan eksekusi kode setelah melakukan redirect
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="../style/logregister.css" />
    <title>Document</title>
  </head>

  <body>
    <div class="p-10 border max-w-[400px] rounded-3xl mx-auto mt-44">
      <h2 class="text-3xl mt-5 font-bold tracking-tight text-center uppercase"><span class="text-[#4b90e1]">Re</span>gister</h2>
      <div class="h-1 w-16 mx-auto mt-2 rounded-full bg-[#4b90e1]"></div>
      <form class="mt-24" action="register.php" method="POST">
        <ul>
          <input class="p-4 username rounded-lg text-sm border w-full" type="text" id="username" name="username" placeholder="username" required />
        </ul>
        <ul>
          <input class="p-4 password rounded-lg text-sm border mt-6 w-full" type="password" id="password" name="password" placeholder="password" required />
        </ul>
        <ul>
          <input class="p-4 email rounded-lg text-sm border mt-6 w-full" type="email" id="email" name="email" placeholder="email" required />
        </ul>
        <!-- button submit -->
        <div class="mt-14 flex items-center gap-3">
          <input type="checkbox" name="checkbox" />
          <p class="text-[11px] text-gray-400">Are you convinced by this <span class="text-gray-600 font-semibold">register?</span></p>
        </div>
        <ul class="flex justify-center border-none mb-10 regrister border hover:scale-95 duration-300 rounded-lg bg-[#4b90e1] p-4 mt-5">
          <input class="text-sm text-gray-100" type="submit" name="register" value="Register" />
        </ul>
        <p class="text-[11px] text-center text-gray-400">
          Company
          <span class="text-sky-500 font-semibold">
            <a href="https://github.com/z3t444" target="_blank">Zeeta</a>
          </span>
          and
          <span class="text-sky-500 font-semibold">
            <a href="https://github.com/chamz-ae" target="_blank">Hisyam</a>
          </span>
        </p>
      </form>
    </div>
  </body>
</html>
