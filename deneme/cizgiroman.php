<?php
// MySQL Bağlantı Parametreleri
$host = 'localhost';
$user = 'root';
$password = '';  // Varsayılan XAMPP şifresi boş
$dbname = 'kitapca';  // Kendi veritabanınızın adını yazın
$port = 3307;

// Bağlantı oluşturma
$conn = new mysqli($host, $user, $password, $dbname, $port);

// Bağlantıyı kontrol etme
if ($conn->connect_error) {
    die("Bağlantı başarısız: " . $conn->connect_error);
}

// Yayın Adı Seçimi
$yayın_adi = ["Gerekli Şeyler", "Komik Şeyler", "Akılçelen Yayın", "Athica Yayınları", "Kayıp Kıta"];

// Fotoğraf Seçimi (downloaded_images klasöründeki tüm fotoğraflar)
$foto_klasor = 'downloaded_images/cizgiroman/';
$foto_dosyalari = scandir($foto_klasor);  // Klasördeki dosyaları al
$foto_dosyalari = array_diff($foto_dosyalari, array('.', '..'));  // . ve .. dosyalarını kaldır

// Sayaç
$counter = 0;

// Her bir fotoğraf için döngü
foreach ($foto_dosyalari as $foto_isim) {
    // Fotoğraf ismini kitap adı olarak düzenleme
    $kitapadi_raw = pathinfo($foto_isim, PATHINFO_FILENAME);  // Fotoğraf ismini al (uzantı hariç)
    $kitapadi = str_replace('-', ' ', $kitapadi_raw);  // "-" yerine boşluk
    $kitapadi = ucwords($kitapadi);  // İlk harfleri büyük yapma

    // Eğer kitap adında sayı varsa, " Cilt" ekle
    if (preg_match('/\d+/', $kitapadi_raw)) {
        $kitapadi .= ". Cilt";  // Eğer sayı varsa, "Cilt" ekle
    }

    // Yayın Adı Seçimi
    $yayın = $yayın_adi[array_rand($yayın_adi)];

    // Fiyat Seçimi (120 ile 300 arasında ve sonu 0 olacak)
    $fiyat = rand(12, 30) * 10;  // 120-300 arasında bir değer üretir

    // Kategori
    $kategori = "cizgiroman";

    // SQL sorgusu ile veriyi ekleme
    $sql = "INSERT INTO kitaplar (kitapadi, yayinadi, kategori, fiyat, fotograf) 
            VALUES ('$kitapadi', '$yayın', '$kategori', $fiyat, '$foto_isim')";

    if ($conn->query($sql) === TRUE) {
        echo "Yeni kitap başarıyla eklendi: $kitapadi<br>";
    } else {
        echo "Hata: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
