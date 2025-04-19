import mysql.connector
import random
import os

try:
    # MySQL veritabanı bağlantısı
    db = mysql.connector.connect(
        host="localhost",
        user="root",  # MySQL kullanıcı adınızı buraya yazın
        password="",       # MySQL şifrenizi buraya yazın
        database="kitaplar",  # Veritabanı adınızı buraya yazın
        port=3307
    )

    cursor = db.cursor()

    # Yayıncılar listesi
    yayincilar = [
        "Gerekli Şeyler",
        "Komik Şeyler",
        "Akılçelen Yayın",
        "Athica Yayınları",
        "Kayıp Kıta"
    ]

    # Fotoğraf klasörü
    fotograf_klasoru = "downloaded_images"

    # Kitap ekleme fonksiyonu
    def kitap_ekle(kitapadi):
        # Kitap adını düzenle
        kitapadi_duzenli = kitapadi.replace("-", " ").title()
        if any(char.isdigit() for char in kitapadi):
            kitapadi_duzenli += ". Cilt"

        # Yayıncıyı rastgele seç
        yayinadi = random.choice(yayincilar)

        # Kategori
        kategori = "çizgiroman"

        # Fiyat (120-300 arasında, sonu 0 olan)
        fiyat = random.randint(12, 30) * 10

        # Fotoğraf adı
        fotograf = f"{kitapadi_duzenli.replace(' ', '_').lower()}.jpg"
        fotograf_yolu = os.path.join(fotograf_klasoru, fotograf)

        # SQL sorgusu
        sql = "INSERT INTO kitaplar (kitapadi, yayinadi, kategori, fiyat, fotograf) VALUES (%s, %s, %s, %s, %s)"
        values = (kitapadi_duzenli, yayinadi, kategori, fiyat, fotograf_yolu)

        cursor.execute(sql, values)
        db.commit()
        print(f"{kitapadi_duzenli} eklendi. Fotoğraf yolu: {fotograf_yolu}")

    # Örnek kitap adları
    kitap_adlari = ["Kitap-1", "Kitap-2", "Kitap-3", "Kitap-4", "Kitap-5"]

    # Kitapları ekle
    for kitap in kitap_adlari:
        kitap_ekle(kitap)

except mysql.connector.Error as err:
    print(f"Hata: {err}")
except Exception as e:
    print(f"Beklenmeyen bir hata oluştu: {e}")
finally:
    # Bağlantıyı kapat
    if cursor:
        cursor.close()
    if db:
        db.close()