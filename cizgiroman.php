<?php
  include "connection.php";
  $kitaplar = "SELECT * FROM `kitaplar` WHERE kategori = 'cizgiroman';";
  $result = $db -> query($kitaplar);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Kitapça</title>
</head>
<body>
    <?php include 'navbar.php'; ?>

    <main>
        <div class="kitaplarDiv">
            <?php
                function getMixColor($imagePath) {
                    if (!file_exists($imagePath)) return "#ccc"; // fallback
                    $image = @imagecreatefromjpeg($imagePath) ?: @imagecreatefrompng($imagePath);
                    if (!$image) return "#ccc";

                    $width = imagesx($image);
                    $height = imagesy($image);

                    $rTotal = $gTotal = $bTotal = $total = 0;

                    for ($x = 0; $x < $width; $x += 10) {
                        for ($y = 0; $y < $height; $y += 10) {
                            $rgb = imagecolorat($image, $x, $y);
                            $rTotal += ($rgb >> 16) & 0xFF;
                            $gTotal += ($rgb >> 8) & 0xFF;
                            $bTotal += $rgb & 0xFF;
                            $total++;
                        }
                    }

                    if ($total == 0) return "#ccc";

                    $r = round($rTotal / $total);
                    $g = round($gTotal / $total);
                    $b = round($bTotal / $total);

                    return sprintf("#%02x%02x%02x", $r, $g, $b);
                }

                while ($satir = $result -> fetch(PDO::FETCH_ASSOC)) {
                    $imagePath = "images/books/" . $satir["fotograf"];
                    $mixColor = getMixColor($imagePath);
                
                    echo "
                        <div class='kitapDiv1'>
                            <div class='kitapDiv2'>
                                <div class='kitapText'>".$satir["kitapadi"]."</div>
                                <img src='".$imagePath."' class='kitapImg'>
                                <div class='yayinText'>".$satir["yayinadi"]."</div>
                                <div class='fiyatSepet'>".$satir["fiyat"]."₺<button>Sepete Ekle</button></div>
                            </div>
                            <div style='background-color: ".$mixColor."; height: 40px; width: 24px;'></div>
                        </div>
                    ";
                }                
            ?>
        </div>
    </main>
</body>
</html>
