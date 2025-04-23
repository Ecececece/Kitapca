<?php
// MySQL Bağlantı Parametreleri
$host = 'localhost';
$user = 'root';
$password = '';  // Varsayılan XAMPP şifresi boş
$dbname = 'ciyaklezzet';  // Kendi veritabanınızın adını yazın
$port = 3307;

// Bağlantı oluşturma
$conn = new mysqli($host, $user, $password, $dbname, $port);

// Bağlantıyı kontrol etme
if ($conn->connect_error) {
    die("Bağlantı başarısız: " . $conn->connect_error);
}

// Fotoğraf Seçimi (downloaded_images klasöründeki tüm fotoğraflar)
$foto_klasor = 'downloaded_images/tavuk/';
$foto_dosyalari = scandir($foto_klasor);  // Klasördeki dosyaları al

// Sayaç
$counter = 0;

// Her bir fotoğraf için döngü
foreach ($foto_dosyalari as $foto_isim) {
    // Fotoğraf ismini kitap adı olarak düzenleme
    $urunadi_raw = pathinfo($foto_isim, PATHINFO_FILENAME);  // Fotoğraf ismini al (uzantı hariç)
    $urunadi = str_replace('-', ' ', $urunadi_raw);  // "-" yerine boşluk
    $urunadi = str_replace('_', ' ', $urunadi_raw);  // "_" yerine boşluk
    $urunadi = strtolower($urunadi);  // Bütün harfleri küçük yapma
    $urunadi = ucwords($urunadi);  // İlk harfleri büyük yapma

    // Eğer kitap adında sayı varsa, " Cilt" ekle
    if (preg_match('/\d+/', $urunadi_raw)) {
        $urunadi .= ". Cilt";  // Eğer sayı varsa, "Cilt" ekle
    }
    // Fiyat Seçimi (120 ile 300 arasında ve sonu 0 olacak)
    $fiyat = rand(15, 30) * 10;  // 120-300 arasında bir değer üretir

    // SQL sorgusu ile veriyi ekleme
    $sql = "INSERT INTO menu (urunadi, fiyat, fotograf) 
            VALUES ('$urunadi', '$fiyat', '$foto_isim')";

    if ($conn->query($sql) === TRUE) {
        echo "Yeni kitap başarıyla eklendi: $urunadi<br>";
    } else {
        echo "Hata: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
