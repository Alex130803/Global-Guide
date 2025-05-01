<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Kayak Tour - Global Guide</title>
  <link rel="stylesheet" href="../styles/sea-tour.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>

<div class="tour-container">
  <!-- Left side: Image Slider -->
  <div class="tour-slider">
    <img src="../media/boat_bg.jpeg" alt="janmor 1" class="slide active">
    <img src="../media/boat.jpeg" alt="janmor 2" class="slide">
    <img src="../media/janmor2.jpg" alt="janmor 3" class="slide">
    <img src="../media/janmor3.jpg" alt="janmor 3" class="slide">
    <img src="../media/janmor4.jpg" alt="janmor 3" class="slide">
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
    <h1>Janmor 580</h1>
    <p class="subtitle">Experience the Adriatic sea with Janmor 580</p>

    <ul class="specs">
      <li><strong>Max Guests:</strong> 5</li>
      <li><strong>Duration:</strong> 4/6/8 hours</li>
      <li><strong>Includes:</strong> Captain, drinks, snorkeling equipment, fuel, Pick up/Drop off</li>
      <br>
      <li><strong>Price:</strong> From 350€</li>
    </ul>

    <p class="description">
    Discover the charm of the Adriatic aboard the Janmor 580 – a compact and comfortable boat, ideal for families and small groups. Cruise the crystal-clear waters around Dubrovnik, stop at hidden coves, and enjoy a relaxing day at sea at your own pace.
    </p>

    <a href="../index.php#booking" class="cta-btn">Book Now</a>

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
