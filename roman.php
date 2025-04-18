<?php
  include "connection.php";
  $kitaplar = "SELECT * FROM `kitaplar` WHERE kategori = 'roman';";
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
<main>
        <div class="kitaplarDiv">
            <?php
                while ($satir = $result -> fetch(PDO::FETCH_ASSOC)) {
                    echo "
                        <div class='kitapDiv'>
                            <div>".$satir["kitapadi"]."</div>
                            <img src='images/books/".$satir["fotograf"]."' class='kitapImg'>
                            <div>".$satir["yayinadi"]."</div>
                            <button>Sepete Ekle</button>
                        </div>
                    ";
                }
            ?>
        </div>
    </main>

    <?php include 'navbar.php'; ?>
    <script src="script.js"></script>
</body>
</html>