import os

# 'downloaded_images' klasörünün yolunu belirleyelim (deneme.py ile aynı dizinde)
folder_path = os.path.join(os.path.dirname(__file__), 'downloaded_images')

# Klasördeki tüm dosyaları al
files = os.listdir(folder_path)

# Sayıyla başlayan dosyaları sil
for file in files:
    # Dosya adı rakamla başlıyorsa
    if file[0].isdigit():
        file_path = os.path.join(folder_path, file)
        # Dosyanın var olup olmadığını kontrol et ve sil
        if os.path.isfile(file_path):
            os.remove(file_path)
            print(f"{file} silindi.")
