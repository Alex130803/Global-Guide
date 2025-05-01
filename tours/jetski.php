<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Jet Ski - Global Guide</title>
  <link rel="stylesheet" href="../styles/sea-tour.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>

<div class="tour-container">
  <!-- Left side: Image Slider -->
  <div class="tour-slider">
    <img src="../media/jetski2.jpeg" alt="Kayak 1" class="slide active">
    <img src="../media/jetski3.jpeg" alt="Kayak 2" class="slide">
    <img src="../media/jetski4.jpeg" alt="Kayak 3" class="slide">
    <img src="../media/jetski5.jpeg" alt="Kayak 3" class="slide">
    <div class="slider-nav">
      <button onclick="changeSlide(-1)">&#10094;</button>
      <button onclick="changeSlide(1)">&#10095;</button>
    </div>
  </div>

  <!-- Right side: Tour Info -->
  <div class="tour-info">
    <!-- Back Button -->
    <div class="back-button">
      <a href="../sea-tours.html">&larr; Back to Sea Tours</a>
    </div>
    <h1>Jet ski WaweRunner</h1>
    <p class="subtitle">Experience the Adriatic sea on the Jet ski</p>

    <ul class="specs">
      <li><strong>Max Guests per Jet ski:</strong> 2</li>
      <li><strong>Duration:</strong> 20/30/60/120 min</li>
      <li><strong>Includes:</strong> Life jacket,fuel</li>
      <br>
      <li><strong>Price:</strong> From 80€</li>
    </ul>

    <p class="description">
    Experience the thrill of the Adriatic with a jet ski adventure along Dubrovnik’s stunning coastline. Discover hidden beaches, feel the rush of the open sea, and make memories that will last a lifetime.
    </p>

    <a href="../index.html#booking" class="cta-btn">Book Now</a>
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
