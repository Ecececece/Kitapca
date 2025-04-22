<?php
  include "connection.php";
  $kitaplar = "SELECT * FROM kitaplar";
  $result = $db->query($kitaplar);

  $bannerlar = [
      "images/banner1.jpg",
      "images/banner2.jpg",
      "images/banner3.jpg",
      "images/banner4.jpg",
      "images/banner5.jpg",
      "images/banner6.jpg"
  ];
?>

<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
  <title>Kitapça</title>
</head>
<body>
<?php include 'oto/navbar.php'; ?>

<main>
  <div class="slider-container">
    <div class="slider-wrapper" id="slider">
      <?php foreach($bannerlar as $banner): 
        echo "
          <div class='slide'>
            <img src='$banner' alt='Banner'>
          </div>
        ";
        
        endforeach; 
      ?>
    </div>
    <div class="slider-buttons">
      <button onclick="prevSlide()">‹</button>
      <button onclick="nextSlide()">›</button>
    </div>
  </div>

  <script>
    let currentIndex = 0;
    const totalSlides = <?= count($bannerlar) ?>;
    const slider = document.getElementById('slider');

    function updateSlide() {
      slider.style.transform = 'translateX(' + (-100 * currentIndex) + '%)';
    }

    function nextSlide() {
      currentIndex = (currentIndex + 1) % totalSlides;
      updateSlide();
    }

    function prevSlide() {
      currentIndex = (currentIndex - 1 + totalSlides) % totalSlides;
      updateSlide();
    }

    setInterval(nextSlide, 7500);
  </script>
</main>
</body>
</html>
