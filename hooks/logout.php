<?php
session_start();
$_SESSION = [];
session_unset();
session_destroy();

header("location: index.php");
exit; // Optional, tetapi direkomendasikan untuk memastikan tidak ada kode PHP lain yang dieksekusi setelah redirect.
?>
