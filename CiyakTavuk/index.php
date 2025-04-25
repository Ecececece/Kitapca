<?php
include "baglanti.php";
$menu = "SELECT * FROM menu";
$sql = $db->query($menu);
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
        </div>
    </div>
    
    <div style="display: flex; flex-direction: column; justify-content: center; align-items: center;">
        <form method="post" enctype="multipart/form-data" class="save-div">
            <div class="form-div">
                <div class="save-input-div">Menu Adı : <input type="text" name="urunadi" class="save-input"></div>
                <div class="save-input-div">Fiyat : <input type="number" name="fiyat" class="save-input"></div>
                <div class="save-input-div">Fotoğraf : <input type="file" name="fotograf" class="save-input"></div>
            </div>
            <div style="display:flex; gap:20px">
                <input type="submit" value="Kaydet" name="kaydet" style="height: 40px;width: 200px;">
                <input type="submit" value="Sıfırla" name="sifirla" style="height: 40px;width: 200px;">
            </div>
        </form>

        <?php
        // Düzenleme formunu açmak için post geldiyse bilgileri çek
        $duzenle_id = null;
        $urunadi_edit = '';
        $fiyat_edit = '';

        if (isset($_POST["duzenle"])) {
            $duzenle_id = $_POST["duzenle"];
            $duzenle_sorgu = $db->prepare("SELECT * FROM menu WHERE id = :id");
            $duzenle_sorgu->bindParam(":id", $duzenle_id, PDO::PARAM_INT);
            $duzenle_sorgu->execute();
            $duzenle_veri = $duzenle_sorgu->fetch(PDO::FETCH_ASSOC);

            if ($duzenle_veri) {
                $urunadi_edit = htmlspecialchars($duzenle_veri['urunadi']);
                $fiyat_edit = $duzenle_veri['fiyat'];
            }
        }
        ?>

        <form method="post" enctype="multipart/form-data" id="duzenle-div" class="save-div" style="width:420px; display: <?= $duzenle_id ? 'flex' : 'none' ?>;">
            <h1>Duzenle</h1>
            <input type="hidden" name="duzenle_id" value="<?= $duzenle_id ?>">
            <div class="form-div">
                <div class="save-input-div">Menu Adı : <input type="text" name="urunadi-edit" class="save-input" value="<?= $urunadi_edit ?>"></div>
                <div class="save-input-div">Fiyat : <input type="number" name="fiyat-edit" class="save-input" value="<?= $fiyat_edit ?>"></div>
                <div class="save-input-div">Fotoğraf : <input type="file" name="fotograf-edit" class="save-input"></div>
            </div>
            <div style="display:flex; gap:20px">
                <input type="submit" value="Düzeni Kaydet" name="duzen-kaydet" style="height: 40px;width: 420px;">
            </div>
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
                $urun_kontrol = false;
                while ($satir = $sql->fetch(PDO::FETCH_ASSOC)) {
                    $urun_kontrol = true;
                    echo "
                        <tr>
                        <td>{$satir['id']}</td>
                        <td>{$satir['urunadi']}</td>
                        <td>{$satir['fiyat']}</td>
                        <td><img src='./images/menuFoto/".$satir['fotograf']."' width='100'></td>
                        <td>
                            <form method='post'>
                                <input type='hidden' name='sil' value='{$satir['id']}'>
                                <input type='submit' value='Sil' style='height: 50px; width: 50px;'>
                            </form>
                        </td>
                        <td>
                            <form method='post'>
                                <input type='hidden' name='duzenle' value='{$satir['id']}'>
                                <input type='submit' value='Duzenle' style='height: 50px; width: 70px;'>
                            </form>
                        </td>
                        </tr>
                    ";
                }
                if (!$urun_kontrol) echo "<tr><td colspan='6' style='text-align: center;'>Tabloda veri bulunamadı.</td></tr>";
                ?>
            </table>
        </div>
    </div>
</body>
</html>

<?php
// Yeni ürün ekleme
if (isset($_POST["kaydet"])) {
    $urunadi = trim($_POST["urunadi"]);
    $fiyat = trim($_POST["fiyat"]);
    $fotograf_yolu = "uploads/" . basename($_FILES["fotograf"]["name"]);
    move_uploaded_file($_FILES["fotograf"]["tmp_name"], $fotograf_yolu);

    $save = $db->prepare("INSERT INTO menu (urunadi, fiyat, fotograf) VALUES (:urunadi, :fiyat, :fotograf)");
    $save->bindParam(":urunadi", $urunadi);
    $save->bindParam(":fiyat", $fiyat);
    $save->bindParam(":fotograf", $fotograf_yolu);
    $save->execute();
    echo "<script>window.location.href = window.location.href</script>";
}

// Menü tablosunu sıfırla
if (isset($_POST["sifirla"])) {
    $reset = $db->prepare("TRUNCATE TABLE menu");
    $reset->execute();
    echo "<script>window.location.href = window.location.href</script>";
}

// Ürün silme
if (isset($_POST["sil"])) {
    $sil_id = $_POST["sil"];
    $delete = $db->prepare("DELETE FROM menu WHERE id = :id");
    $delete->bindParam(":id", $sil_id, PDO::PARAM_INT);
    $delete->execute();
    echo "<script>window.location.href = window.location.href</script>";
}

// Ürün düzenleme kaydetme
if (isset($_POST["duzen-kaydet"])) {
    $duzenle_id = $_POST["duzenle_id"];
    $urunadi = trim($_POST["urunadi-edit"]);
    $fiyat = trim($_POST["fiyat-edit"]);

    $fotograf_sql = "";
    if ($_FILES["fotograf-edit"]["error"] === 0) {
        $fotograf_yolu = "uploads/" . basename($_FILES["fotograf-edit"]["name"]);
        move_uploaded_file($_FILES["fotograf-edit"]["tmp_name"], $fotograf_yolu);
        $fotograf_sql = ", fotograf = :fotograf";
    }

    $update = $db->prepare("UPDATE menu SET urunadi = :urunadi, fiyat = :fiyat $fotograf_sql WHERE id = :id");
    $update->bindParam(":urunadi", $urunadi);
    $update->bindParam(":fiyat", $fiyat);
    if ($fotograf_sql) $update->bindParam(":fotograf", $fotograf_yolu);
    $update->bindParam(":id", $duzenle_id, PDO::PARAM_INT);
    $update->execute();
    echo "<script>window.location.href = window.location.href</script>";
}
?>
