<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tavern Pupo - Global Guide</title>
  <link rel="stylesheet" href="../styles/restaurant-finder.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>

<div class="tour-container">
  <!-- Left side: Image Slider -->
  <div class="tour-slider">
    <img src="../media/pupo.jpg" alt="Pupo 1" class="slide active">
    <img src="../media/pupo2.jpg" alt="Pupo 2" class="slide">
    <img src="../media/pupo3.jpg" alt="Pupo 3" class="slide">
    <img src="../media/pupo4.jpg" alt="Pupo 4" class="slide">
    <img src="../media/pupo5.jpg" alt="Pupo 5" class="slide">
    <img src="../media/pupo6.jpg" alt="Pupo 6" class="slide">
    <div class="slider-nav">
      <button onclick="changeSlide(-1)">&#10094;</button>
      <button onclick="changeSlide(1)">&#10095;</button>
    </div>
  </div>

  <!-- Right side: Tour Info -->
  <div class="tour-info">
    <!-- Back Button -->
    <div class="back-button">
      <a href="../casual-dining.html">&larr; Back to the restaurants</a>
    </div>
    <h1>Tavern Pupo</h1>
    <p class="subtitle">Experience the authentic taste where tradition, flavor, and local charm come together in every dish.</p>

    <ul class="specs">
      <li><strong>Serving:</strong> Seafood, Meat, Deserts</li>
      <li><strong>Average price per person:</strong> 25/50€</li>
      <li><strong>Location:</strong> Ul. Miha Pracata 8, Dubrovnik</li>
      <li><strong>Working hours:</strong> 8:00 – 23:00</li>
    </ul>

    <p class="description">
    Konoba Pupo is a family-run tavern located in the heart of Dubrovnik's Old Town, known for its traditional Dalmatian recipes and fresh, local ingredients. Since the 1990s, the family behind Pupo has blended old fishing recipes with quality produce sourced from the Dubrovnik region.
    </p>

    <div class="button-gap">
      <a href="../index.php#book" class="cta-btn">Book Now</a>
      <a href="#" class="menu-info" id="openGalleryBtn">Menu</a>

<div id="galleryPopup" class="modal">
  <div class="modal-content">
    <span class="close-gallery">&times;</span>
    <div class="slider">
      <img class="slide" src="img1.jpg" alt="Slika 1">
      <img class="slide" src="img2.jpg" alt="Slika 2">
      <img class="slide" src="img3.jpg" alt="Slika 3">
    </div>
    <div class="slider-buttons">
      <button id="prevSlide">❮</button>
      <button id="nextSlide">❯</button>
    </div>
  </div>
</div>

    </div>

    <!-- Reviews Section -->
    <?php
    $reviews = file_exists('../reviews.json') ? json_decode(file_get_contents('../reviews.json'), true) : [];
    if (!empty($reviews)):
    ?>
    <section class="reviews-section">
      <h2>Guest Reviews</h2>
      <div class="reviews-wrapper">
        <?php foreach ($reviews as $r): ?>
          <div class="review-card">
            <img src="../<?= htmlspecialchars($r['image']) ?>" alt="Guest Review" class="review-img">
          </div>
        <?php endforeach; ?>
      </div>
    </section>
    <?php endif; ?>

  </div>
</div>

<script>
  let current = 0;
  const slides = document.querySelectorAll('.slide');

  function showSlide(index) {
    slides[current].classList.remove('active');
    current = (index + slides.length) % slides.length;
    slides[current].classList.add('active');
  }

  function changeSlide(dir) {
    showSlide(current + dir);
  }




</script>

</body>
</html>
