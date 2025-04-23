<?php
  include "connection.php";
  $menu = "SELECT * FROM menu";
  $result = $db -> query($menu);
?>

<!DOCTYPE html>
<html lang="en">
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
    
    <div style="display: flex; flex-direction: column; justify-content: center; align-items: center;">
        <form action="" method="post" class="saveDiv">
            <div class="form-div">
                <div class="menu-input-div">Menu Adı : <input type="text" name="urunadi" class="menu-input"></div>
                <div class="menu-input-div">Fiyat : <input type="number" name="fiyat" class="menu-input"></div>
                <div class="menu-input-div">Fotoğraf : <input type="file" name="fotograf" class="menu-input"></div>
            </div>

            <input type="submit" value="Kaydet" name="kaydet" style="width: 12rem;">
            <input type="submit" value="Sıfırla" name="sifirla" style="width: 12rem;">
        </form>

        <div style="display: flex; flex-direction: column; justify-content: center; align-items: center;">
            <h1>Ciyak Tavuk</h1>
            <table border="1">
                <tr>
                    <th style='width: 4rem;'>ID</th>
                    <th style='width: 16rem;'>Menu Adı</th>
                    <th style='width: 4rem;'>Fiyat</th>
                    <th style='width: 16rem;'>Fotograf</th>
                    <th>Sil</th>
                    <th>Duzenle</th>
                </tr>   
                <?php
                    $satirKontrol = false;

                    while ($satir = $result -> fetch(PDO::FETCH_ASSOC)) {
                        $satirKontrol = true;
                        echo "
                            <tr>
                            <td>".$satir["id"]."</td>
                            <td>".$satir["urunadi"]."</td>
                            <td>".$satir["fiyat"]."</td>
                            <td>".$satir["fotograf"]."</td>
                            <td>
                                <form method='post'>
                                    <input type='hidden' name='sil' value='".$satir["id"]."'>
                                    <input type='text' value='Sil' style='height: 50px; width: 50px;'>
                                </form>
                            </td>
                            <td>
                                <form method='post'>
                                    <input type='hidden' name='duzenle' value='".$satir["id"]."'>
                                    <input type='text' value='Duzenle' style='height: 50px; width: 70px;'>
                                </form>
                            </td>
                            </tr>
                        ";
                    }

                    if(!$satirKontrol) echo "<tr><td colspan='6' style='text-align: center;'>Tabloda veri bulunamadı.</td></tr>";
                ?>
            </table>
        </div>
    </div>
</body>
</html>

<?php
    if(isset($_POST["kaydet"])){
        $urunadi = trim($_POST["urunadi"]);
        $fiyat = trim($_POST["fiyat"]);
        $fotograf = trim($_POST["fotograf"]);

        $save = $db -> prepare("INSERT INTO menu (`id`, `urunadi`, `fiyat`, `fotograf`) VALUES (NULL, :urunadi, :fiyat, :fotograf)");
        $save -> bindParam(":urunadi", $urunadi, PDO::PARAM_STR);
        $save -> bindParam(":fiyat",    $fiyat,    PDO::PARAM_STR);
        $save -> bindParam(":fotograf", $fotograf,  PDO::PARAM_STR);
        $saved = $save -> execute();

        if($saved) echo "<script>window.location.href = window.location.href</script>";
    }

    if(isset($_POST["sifirla"])){
        $reset = $db -> prepare("TRUNCATE TABLE menu;");
        $reseted = $reset -> execute();
        if($reset) echo "<script>window.location.href = window.location.href</script>";
    }

    if(isset($_POST["sil"])){
        $sil_id = $_POST["sil"];
        $delete = $db -> prepare("DELETE FROM menu WHERE id = :id");
        $delete -> bindParam(":id", $sil_id, PDO::PARAM_INT);
        
        $deleted = $delete -> execute();
        if($deleted) echo "<script>window.location.href = window.location.href</script>";
    }
?>
