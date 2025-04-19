import os
import re

# Klasör yolu
folder_path = "downloaded_images/oyku"

for filename in os.listdir(folder_path):
    file_path = os.path.join(folder_path, filename)

    # Sadece dosyaları işle
    if not os.path.isfile(file_path):
        continue

    # Dosya adı ve uzantı
    name, ext = os.path.splitext(filename)

    # 1. Sayıları sil
    cleaned_name = re.sub(r'\d+', '', name)

    # 2. "-gorseli" ve "-gorsel" varsa onları sil
    cleaned_name = re.sub(r'-gorseli', '', cleaned_name, flags=re.IGNORECASE)
    cleaned_name = re.sub(r'-gorsel', '', cleaned_name, flags=re.IGNORECASE)

    # 3. Sondaki --abc, __xyz gibi kısımları sil
    cleaned_name = re.sub(r'[-_]{2,}[^-_]*$', '', cleaned_name)

    # 4. Sondaki tek - veya _ karakterlerini de temizle
    cleaned_name = re.sub(r'[-_]+$', '', cleaned_name)

    # 5. "_1", "_2", vb. gibi son ekleri sil
    cleaned_name = re.sub(r'_1$', '', cleaned_name)

    # 6. Eğer isim "-[sayılar]-[harf]" gibi bitiyorsa, bunu sil
    cleaned_name = re.sub(r'-\d+-\d+-[A-Za-z]$', '', cleaned_name)

    # 7. Eğer "-[sayilar]-51-[harf]" gibi bir bitiş varsa, bunu temizle
    cleaned_name = re.sub(r'-\d{6}-\d{2}-[A-Za-z]$', '', cleaned_name)

    # 8. Boş kalırsa, sadece ismi düzenle ve eski ismi kullan
    if not cleaned_name.strip():
        print(f"Silindi (boş isim): {filename}")
        os.remove(file_path)
        continue

    # Yeni ad oluştur ve yeniden adlandır
    new_filename = cleaned_name + ext
    if new_filename != filename:
        new_path = os.path.join(folder_path, new_filename)
        os.rename(file_path, new_path)
        print(f"Yeniden adlandırıldı: {filename} → {new_filename}")
