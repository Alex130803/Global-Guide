<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Bistro49 - Global Guide</title>
  <link rel="stylesheet" href="../styles/sea-tour.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>

<div class="tour-container">
  <!-- Left side: Image Slider -->
  <div class="tour-slider">
    <img src="../media/bistro3.jpg" alt="Bistro 1" class="slide active">
    <img src="../media/bistro2.jpg" alt="Bistro 2" class="slide">
    <img src="../media/bistro.jpg" alt="Bistro 3" class="slide">
    <img src="../media/bistro4.jpg" alt="Bistro 3" class="slide">
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
    <h1>Bistro 49</h1>
    <p class="subtitle">Experience the flavors locals love most.</p>

    <ul class="specs">
    
        <li><strong>Serving:</strong> Meat, Burger, Pasta, Pizza, Wok, Deserts</li>
        <li><strong>Avarage price per person:</strong> 15/25€</li>
        <li><strong>Location:</strong> Obala Ivana Pavla II 49, 20000, Dubrovnik</li>
        <li><strong>Working hours:</strong> 8:00 - 23:00 (Sunday-closed)</li>
    </ul>

    <p class="description">
    Bistro 49 is known for its delicious food, generous portions, and friendly staff, making it a popular choice among both locals and tourists.
    </p>
    
    <div class="button-gap">
      <a href="../index.php#booking" class="cta-btn">Book Now</a>
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
