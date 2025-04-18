<main>
        <div style="display: flex; justify-content: center; align-items: center; font-size: 16pt; margin: 20px;">
            <form method="get">
                <select name="siralama" onchange="this.form.submit()" class="siralama">
                    <option value="az" <?= $siralama == 'az' ? 'selected' : '' ?>>A'dan Z'ye (Kitap Adı)</option>
                    <option value="za" <?= $siralama == 'za' ? 'selected' : '' ?>>Z'den A'ya (Kitap Adı)</option>
                    <option value="azFiyat" <?= $siralama == 'azFiyat' ? 'selected' : '' ?>>Fiyat (Artan)</option>
                    <option value="cokFiyat" <?= $siralama == 'cokFiyat' ? 'selected' : '' ?>>Fiyat (Azalan)</option>
                </select>
            </form>
            <div style="margin-left: 10px;">Göre Sırala</div>
        </div>

        <div class="kitaplarDiv">
            <?php
                function getMixColor($imagePath) {
                    if (!file_exists($imagePath)) return "#ccc";
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