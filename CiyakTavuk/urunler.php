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

    <div class="urunler">
        <?php
        while ($satir = $result -> fetch(PDO::FETCH_ASSOC)) {
        $imagePath = "images/menuFoto/" . $satir["fotograf"];
        
        echo "
            <div class='menu-urun'>
                <div class='menu-tasarim'>
                    <img src='".$imagePath."' class='menu-img'>
                    <div class='urun-isim'>".$satir["urunadi"]."</div>
                    <div class='urun-fiyat'>".$satir["fiyat"]."₺<button>Sepete Ekle</button></div>
                </div>
            </div>
        ";
        }
        ?>
    </div>

</body>
</html>