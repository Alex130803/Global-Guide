<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kayak Tour - Global Guide</title>
  <link rel="stylesheet" href="../styles/sea-tour.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>

<div class="tour-container">
  <!-- Left side: Image Slider -->
  <div class="tour-slider">
    <img src="../media/gliser.jpeg" alt="Raptor 1" class="slide active">
    <img src="../media/gosti6.jpeg" alt="Raptor 2" class="slide">
    <img src="../media/gosti7.jpeg" alt="Raptor 3" class="slide">
    <img src="../media/gosti3.jpeg" alt="Raptor 4" class="slide">
    <img src="../media/gosti2.jpeg" alt="Raptor 5" class="slide">
    <img src="../media/gosti1.jpeg" alt="Raptor 6" class="slide">
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
    <h1>Alesta Raptor</h1>
    <p class="subtitle">Experience the Adriatic sea with Raptor</p>

    <ul class="specs">
      <li><strong>Max Guests:</strong> 12</li>
      <li><strong>Duration:</strong> 4 or 8 hours</li>
      <li><strong>Includes:</strong> 2 crew members, fuel, towels, snorkeling equipment, drinks (water, cola, ice tea, white wine and beers) and free private transfer to the boat and back.</li>
      <br>
      <li><strong>Price:</strong> From 800€</li>
    </ul>

    <p class="description">
    Set sail on the powerful Alesta Raptor and explore the breathtaking Dubrovnik coastline in style. With spacious seating, smooth cruising, and stops at hidden bays for swimming and sunbathing, your perfect day at sea starts here.
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
