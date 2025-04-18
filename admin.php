<?php
  include "connection.php";
  $kitaplar = "SELECT * FROM kitaplar";
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
    <div style="display: flex; flex-direction: column; justify-content: center; align-items: center;">
        <form action="" method="post">
            <div class="form">
                <div class="kitaplarOptions">Kitap Adı : <input type="text" name="kitapadi"></div>
                <div class="kitaplarOptions">Yayıncı : <input type="text" name="yayinadi"></div>
                <div class="kitaplarOptions">Kategori : 
                    <select id="kategori" name="kategori">
                        <option value="roman">Roman</option>
                        <option value="hikaye">Hikaye</option>
                        <option value="siir">Siir</option>
                        <option value="cizgiroman">Çizgi Roman</option>
                        <option value="cocuk">Çocuk Kitapları</option>
                    </select>
                </div>
                <div class="kitaplarOptions">Fiyat : <input type="number" name="fiyat"></div>
                <div class="kitaplarOptions">Fotoğraf : <input type="file" name="fotograf"></div>
            </div>

            <input type="submit" value="Kaydet" name="kaydet" style="width: 24rem;">
        </form>

        <div style="display: flex; flex-direction: column; justify-content: center; align-items: center;">
            <h1>Kitapca</h1>
            <table border="1" style="margin:0px 16rem; background-color: white;">
                <tr>
                    <th>ID</th> <th>Kitap Adı</th> <th>Yayın Adı</th> <th>Kategori</th> <th>Fiyat</th> <th>Fotograf</th>
                </tr>   
                <?php
                    while ($satir = $result -> fetch(PDO::FETCH_ASSOC)) {
                        echo "
                            <tr>
                            <td>".$satir["id"]."</td>
                            <td>".$satir["kitapadi"]."</td>
                            <td>".$satir["yayinadi"]."</td>
                            <td>".$satir["kategori"]."</td>
                            <td>".$satir["fiyat"]."</td>
                            <td>".$satir["fotograf"]."</td>
                            <td><form method='post'>
                                <input type='hidden' name='sil' value='".$satir["id"]."'>
                                <input type='submit' value='Sil'></form>
                            </td>
                            </tr>
                        ";
                    }
                ?>
            </table>
        </div>
    </div>
    </main>
</body>
</html>

<?php
    if(isset($_POST["kaydet"])){
        $kitapadi = trim($_POST["kitapadi"]);
        $yayinadi = trim($_POST["yayinadi"]);
        $kategori = trim($_POST["kategori"]);
        $fiyat = trim($_POST["fiyat"]);
        $fotograf = trim($_POST["fotograf"]);

        $save = $db -> prepare("INSERT INTO kitaplar (`id`, `kitapadi`, `yayinadi`, `kategori`, `fiyat`, `fotograf`) VALUES (NULL, :kitapadi, :yayinadi, :kategori, :fiyat, :fotograf)");
        $save -> bindParam(":kitapadi", $kitapadi, PDO::PARAM_STR);
        $save -> bindParam(":yayinadi", $yayinadi, PDO::PARAM_STR);
        $save -> bindParam(":kategori", $kategori, PDO::PARAM_STR);
        $save -> bindParam(":fiyat",    $fiyat,    PDO::PARAM_STR);
        $save -> bindParam(":fotograf", $fotograf,  PDO::PARAM_STR);
        $saved = $save -> execute();

        if($saved) echo "<script>window.location.href = window.location.href</script>";
    }

    if(isset($_POST["sil"])){
        $sil_id = $_POST["sil"];
        $delete = $db -> prepare("DELETE FROM kitaplar WHERE id = :id");
        $delete -> bindParam(":id", $sil_id, PDO::PARAM_INT);
        
        $deleted = $delete -> execute();
        if($deleted) echo "<script>window.location.href = window.location.href</script>";
    }
    
?>