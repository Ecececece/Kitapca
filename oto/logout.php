<?php
// Oturum başlat
session_start();

// Oturumu sonlandır
session_unset();
session_destroy();

// Giriş sayfasına yönlendir
header("Location: ../login.php");
exit();
?>
