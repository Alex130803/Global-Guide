<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Yacht Tour - Global Guide</title>
  <link rel="stylesheet" href="../styles/sea-tour.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>

<div class="tour-container">
  <!-- Left side: Image Slider -->
  <div class="tour-slider">
    <img src="../media/yacht.jpeg" alt="Yacht 1" class="slide active">
    <img src="../media/yacht2.jpeg" alt="Yacht 2" class="slide">
    <img src="../media/yacht3.jpeg" alt="Yacht 3" class="slide">
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
    <h1>Luxury Yacht Tour</h1>
    <p class="subtitle">Experience the Adriatic on a private luxury yacht.</p>

    <ul class="specs">
      <li><strong>Max Guests:</strong> 12</li>
      <li><strong>Duration:</strong> 4/6/8 hours</li>
      <li><strong>Includes:</strong> Captain, drinks, snacks, fuel</li>
      <br>
      <li><strong>Price:</strong> From 950€</li>
    </ul>

    <p class="description">
      Enjoy an unforgettable day cruising the beautiful coast of Dubrovnik, with stops for swimming and relaxing at hidden coves.
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
