<?php
$id = $_GET['id'];
  include "connection.php";
  $kitaplar = "SELECT * FROM kitaplar WHERE id=".$id."";
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
    <?php include 'oto/navbar.php'; ?>
        
    <main>
    <div style="display: flex; flex-direction: column; justify-content: center; align-items: center;">
        <?php echo "<h1>".$id.". Veriyi Düzenle</h1>"?>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form">
                <?php
                    $satir = $result -> fetch(PDO::FETCH_ASSOC);
                    $selected = $satir["kategori"];
                    echo "
                    <div class='kitaplarOptions'>Kitap Adı : <input type='text' name='kitapadi' value='".$satir["kitapadi"]."'></div>
                    <div class='kitaplarOptions'>Yayıncı : <input type='text' name='yayinadi' value='".$satir["yayinadi"]."'></div>
                    <div class='kitaplarOptions'>Kategori : 
                        <select id='kategori' name='kategori'>
                            <option value='roman' ".($selected == 'roman' ? 'selected' : '').">Roman</option>
                            <option value='oyku' ".($selected == 'oyku' ? 'selected' : '').">Öyku</option>
                            <option value='siir' ".($selected == 'siir' ? 'selected' : '').">Siir</option>
                            <option value='cizgiroman' ".($selected == 'cizgiroman' ? 'selected' : '').">Çizgi Roman</option>
                            <option value='cocuk' ".($selected == 'cocuk' ? 'selected' : '').">Çocuk Kitapları</option>
                        </select>
                    </div>
                    <div class='kitaplarOptions'>Fiyat : <input type='number' name='fiyat' value='".$satir["fiyat"]."'></div>
                    <div class='kitaplarOptions'>Fotoğraf : <input type='file' name='fotograf'></div>
                    ";
                ?>
            </div>

            <input type="submit" value="Kaydet" name="kaydet" style="width: 24rem;">
        </form>
    </div>
    </main>
</body>
</html>

<?php
    if(isset($_POST["kaydet"])){
        $kitapadi = trim($_POST["kitapadi"]);
        $yayinadi = trim($_POST["yayinadi"]);
        $kategori = trim($_POST["kategori"]);
        $fiyat    = trim($_POST["fiyat"]);
        $id       = $_GET['id'];
    
        $fotograf_var = isset($_FILES["fotograf"]) && $_FILES["fotograf"]["error"] == 0;
    
        if ($fotograf_var) {
            $hedef = basename($_FILES["fotograf"]["name"]);
            move_uploaded_file($_FILES["fotograf"]["tmp_name"], $hedef);
        }
    
        $sql = "UPDATE kitaplar SET kitapadi = :kitapadi, yayinadi = :yayinadi, kategori = :kategori, fiyat = :fiyat";
        if ($fotograf_var) $sql .= ", fotograf = :fotograf";

        $sql .= " WHERE id = :id";
    
        $save = $db->prepare($sql);
        $save -> bindParam(":id",       $id,       PDO::PARAM_INT);
        $save -> bindParam(":kitapadi", $kitapadi, PDO::PARAM_STR);
        $save -> bindParam(":yayinadi", $yayinadi, PDO::PARAM_STR);
        $save -> bindParam(":kategori", $kategori, PDO::PARAM_STR);
        $save -> bindParam(":fiyat",    $fiyat,    PDO::PARAM_STR);
        if ($fotograf_var) $save->bindParam(":fotograf", $hedef);

    
        $saved = $save->execute();
    
        if($saved) echo "<script>window.location.href = 'admin.php'</script>";
    }
    
?>