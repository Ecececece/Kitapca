<?php
    include "connection.php";

    $siralama = $_GET['siralama'] ?? 'az';

    if ($siralama == 'za') $kitaplar = "SELECT * FROM kitaplar WHERE kategori = 'oyku' ORDER BY kitapadi DESC";
    else if ($siralama == 'azFiyat') $kitaplar = "SELECT * FROM kitaplar WHERE kategori = 'oyku' ORDER BY fiyat ASC";
    else if ($siralama == 'cokFiyat') $kitaplar = "SELECT * FROM kitaplar WHERE kategori = 'oyku' ORDER BY fiyat DESC";
    else $kitaplar = "SELECT * FROM kitaplar WHERE kategori = 'oyku' ORDER BY kitapadi ASC";

    $result = $db -> query($kitaplar);
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kitapça</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'oto/navbar.php'; ?>

    <?php include 'oto/main.php'; ?>
</body>
</html>
