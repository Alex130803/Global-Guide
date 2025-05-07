<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Restaurant Dubrovnik - Global Guide</title>
  <link rel="stylesheet" href="../styles/restaurant-finder.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>

<div class="tour-container">
  <!-- Left side: Image Slider -->
  <div class="tour-slider">
    <img src="../media/dubrovnikmain.jpg" alt="Dubrovnik 1" class="slide active">
    <img src="../media/dubrovnik2.jpg" alt="Dubrovnik 2" class="slide">
    <img src="../media/Dubrovnik3.jpg" alt="Dubrovnik 3" class="slide">
    <img src="../media/Dubrovnik4.jpg" alt="Dubrovnik 3" class="slide">
    <img src="../media/Dubrovnik5.jpg" alt="Dubrovnik 3" class="slide">
    <img src="../media/Dubrovnik6.jpg" alt="Dubrovnik 3" class="slide">
    <div class="slider-nav">
      <button onclick="changeSlide(-1)">&#10094;</button>
      <button onclick="changeSlide(1)">&#10095;</button>
    </div>
  </div>

  <!-- Right side: Tour Info -->
  <div class="tour-info">
    <!-- Back Button -->
    <div class="back-button">
      <a href="../restaurant.html">&larr; Back to Restaurants</a>
    </div>
    <h1>Restaurant Dubrovnik</h1>
    <p class="subtitle">Experience a fine dining in the heart of the Old city</p>

    <ul class="specs">
      <li><strong>Serving:</strong> Curated by Chef Dalibor Vidović, modern interpretations of Mediterranean classics using fresh, local ingredients.​</li>
      <li><strong>Average price per person:</strong> A la carte(50/75€) , Tasting menus(165/230€)</li>
      <li><strong>Location:</strong> Marojice Kaboge 5, Dubrovnik</li>
      <li><strong>Working hours:</strong> 17:00 - 23:00</li>
    </ul>

    <p class="description">
    Features a charming rooftop terrace with a retractable roof, providing an al fresco dining experience under the stars.
    Praised for its exceptional service and attention to detail, with the chef often personally engaging with guests.
    Recognized in the MICHELIN Guide for its quality cuisine and inviting atmosphere.
    </p>

    <div class="button-gap">
      <a href="../index.php#book" class="cta-btn">Book Now</a>
      <a href="../index.php#booking" class="cta-btn">Menu</a>
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
