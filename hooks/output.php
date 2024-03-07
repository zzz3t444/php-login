<?php
// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "login_up");
// ambil data dari tabel mahasiswa/query data mahasiswa
$result = mysqli_query($conn, "SELECT * FROM users");
// var_dump($result);

// $mhs = mysqli_fetch_assoc($result);
// var_dump($mhs["Nama"]);

?>  

<!-- The rest of your HTML code remains unchanged -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/output.css">
    <title>Document</title>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ACCOUNT</title>
    <link rel="stylesheet" href="./css/css.css">
</head>

<body>

    <h1 class="judul">ACCOUNT</h1>

    <table class="tabel" border="1" cellpadding="10" cellspacing="0">

        <tr>
            <th>NO.</th>
            <th>Username</th>
            <th>Email</th>
        </tr>
    <?php while ($row = mysqli_fetch_assoc($result)) : ?>
        <tr>
            <td><?= $row["id"]  ?></td>
            <td><?= $row["username"]  ?></td>
            <td><?= $row["email"]  ?></td>
        </tr>
    <?php endwhile; ?>
    </table>

        <div>
        <a class="p-5 bg-blue-400 mtrounded-lg" href="admin.php">Back</a>
        </div>

</body>

</html>