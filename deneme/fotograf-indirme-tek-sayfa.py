import os
import requests
from selenium import webdriver
from selenium.webdriver.chrome.service import Service
from selenium.webdriver.common.by import By
from webdriver_manager.chrome import ChromeDriverManager
from urllib.parse import urljoin
import re

# Hedef URL
url = 'https://www.kitapsepeti.com/siir'

# Resimler için bir klasör oluştur
folder_name = 'downloaded_images/siir'
if not os.path.exists(folder_name):
    os.makedirs(folder_name)

# Geçersiz karakterleri temizlemek için bir fonksiyon
def clean_filename(filename):
    # URL parametrelerini (örn. ?revision=...) temizle
    filename = filename.split('?')[0]
    
    # -kapak_min ve benzeri kısımları kaldır
    filename = re.sub(r'-kapak_min', '', filename)
    
    # Geçersiz karakterleri (_|*<>:"/\\?) temizle
    return re.sub(r'[<>:"/\\|?*]', '_', filename)

# WebDriver'ı başlat
options = webdriver.ChromeOptions()
options.headless = True  # Tarayıcıyı görünmeden çalıştırma
driver = webdriver.Chrome(service=Service(ChromeDriverManager().install()), options=options)

# Sayfayı aç
driver.get(url)

# Sayfa tamamen yüklenene kadar bekleyin
driver.implicitly_wait(10)

# Sayfadaki tüm img etiketlerini bulun
img_tags = driver.find_elements(By.TAG_NAME, 'img')

# Resimleri indir
for img in img_tags:
    img_url = img.get_attribute('src')
    if img_url:
        # Eğer bir .gif veya .svg dosyasıysa, atla
        if img_url.lower().endswith(('.gif', '.svg')):
            print(f"GIF veya SVG dosyası bulundu, atlanıyor: {img_url}")
            continue

        # Resim URL'sinin tam yolunu oluştur
        img_url = urljoin(url, img_url)

        # Dosya adını temizle ve belirle
        img_name = os.path.join(folder_name, clean_filename(img_url.split("/")[-1]))

        # Görseli indir
        try:
            img_response = requests.get(img_url)
            if img_response.status_code == 200:
                with open(img_name, 'wb') as f:
                    f.write(img_response.content)
                print(f"İndirildi: {img_name}")
            else:
                print(f"İndirilemedi: {img_url}")
        except requests.exceptions.RequestException as e:
            print(f"Hata: {e}")

# Tarayıcıyı kapat
driver.quit()
