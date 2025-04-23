<?php
  include "baglanti.php";
  $menu = "SELECT * FROM menu";
  $result = $db->query($menu);
?>

<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Ciyak Tavuk</title>
</head>
<body>

    <div class="navbar">
        <a href="index.php"><img src="./images/logo.png" class="logo" alt="logo"></a>
        <div style="display:flex;">
            <a href="urunler.php" class="navbar-button" style="margin-right:30px;">Urunler</a>
            <a href="subeler.php" class="navbar-button">Subeler</a>
        </div>
    </div>

</body>
</html>