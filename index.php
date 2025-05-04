<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Global Guide</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="styles/style.css">
</head>

<body>

<nav class="navbar">
    <img class="logo" src="media/logo.png" alt="Global Guide Logo">

    <!-- Hamburger ikonica -->
    <div class="hamburger" id="navToggle">
        <i class="fas fa-bars"></i>
    </div>

    <!-- Navigacija -->
    <ul class="nav-el" id="navMenu">
        <li><a href="index.php">Home</a></li>
        <li><a href="explore.html">Explore</a></li>
        <li><a href="restaurant.html">Restaurant</a></li>
        <li><a href="contact.html">Contact</a></li>
    </ul>
</nav>



    <!-- WhatsApp Floating Button -->
<a href="https://wa.me/385914312672" class="whatsapp-float" target="_blank">
    <i class="fab fa-whatsapp"></i>
    <span>Contact us!</span>
</a>


    <!-- Landing Page with Slideshow -->
<section class="landing-page" id="landing-page">
    <div class="landing-page-content">
        <h1 class="landing-page-title">Welcome to Global Guide</h1>
        <p class="landing-page-subtitle">Yacht, Car, and Kayak rentals in Dubrovnik</p>
        <a href="explore.html" class="cta-btn">Explore Now</a>
    </div>
</section>

<!-- BOOKING SECTION -->
<section id="book" class="booking-section">
    <div class="booking-wrapper">

        <!-- Left Side - Form -->
        <form class="booking-form" id="booking-form">
            <h2>Book Your Adventure</h2>

            <div class="form-grid">
                <div class="form-group">
                    <label for="vehicle">Choose vehicle:</label>
                    <select id="vehicle" name="vehicle" required>
                        <option value="">-- Select --</option>
                        <option value="yacht">Yacht</option>
                        <option value="speedboat">Speedboat</option>
                        <option value="kayak">Kayak</option>
                        <option value="jetski">Jet Ski</option>
                        <option value="car">Car</option>
                        <option value="quad">Quad</option>
                    </select>
                </div>

                <div class="form-group hidden" id="duration-group">
                    <label for="duration">Duration:</label>
                    <select id="duration" name="duration">
                        <option value="4h">4 hours</option>
                        <option value="6h">6 hours</option>
                        <option value="8h">8 hours</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="date">Date:</label>
                    <input type="date" id="date" name="date" required>
                </div>

                <div class="form-group">
                    <label for="time">Time:</label>
                    <input type="time" id="time" name="time" required>
                </div>

                <div class="form-group">
                    <label for="name">Full Name:</label>
                    <input type="text" id="name" name="name" placeholder="Your name" required>
                </div>

                <div class="form-group">
                    <label for="contact">Contact (phone or email):</label>
                    <input type="text" id="contact" name="contact" placeholder="Phone or Email" required>
                </div>
            </div>

            <label for="message">Special Requests (optional):</label>
            <textarea id="message" name="message" rows="4" placeholder="Any additional info or requests..."></textarea>

            <button type="submit" class="cta-btn">Send Request</button>
        </form>

        <!-- Right Side - Contact Info -->
        <div class="booking-info">
            <h2>Contact Us</h2>
            <p><strong>Global Guide</strong></p>
            <p><i class="fa-solid fa-location-dot"></i> Dubrovnik, Croatia</p>
            <p><i class="fa-solid fa-phone"></i> +385 91 123 4567</p>
            <p><i class="fa-solid fa-envelope"></i> info@globalguide.hr</p>
            <p><i class="fa-solid fa-clock"></i> Working Hours: 08:00 – 20:00</p>
            <img class="logo_contact" src="media/logo.png" alt="logo Global Guide">
        </div>
    </div>
</section>

<?php
$tours = file_exists('tours.json') ? json_decode(file_get_contents('tours.json'), true) : [];
?>

<link rel="stylesheet" href="tours-section.css">

<section id="tours">
    <h2>Our Special Offers</h2>
    <div class="tour-list">
        <?php foreach ($tours as $t): ?>
            <div class="tour-card">
                <?php if (!empty($t['image'])): ?>
                    <img src="<?= htmlspecialchars($t['image']) ?>" alt="<?= htmlspecialchars($t['title']) ?>">
                <?php endif; ?>
                <h3><?= htmlspecialchars($t['title']) ?></h3>
                <p class="truncate"><?= htmlspecialchars($t['description']) ?></p>
                <span><?= ucfirst($t['category']) ?> tour — $<?= $t['price'] ?>
                    <?php if (!empty($t['discount'])): ?>
                        <span class="discount">(-<?= $t['discount'] ?>%)</span>
                    <?php endif; ?>
                </span>
                <a href="#" class="learn-more">Learn More</a>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<section id="fleet-section">
  <h2>Our Fleet</h2>
  <div class="fleet-wrapper">

    <!-- Land Fleet -->
    <div class="fleet-block">
      <h3>Land Fleet</h3>
      <ul>
  <li class="from-left">
    <img src="media/audi.jpg" alt="Audi Q3">
    <div>
      <span><i class="fa-solid fa-car"></i> Audi Q3 – 4 seats</span>
      <a href="land-tours.html" class="learn-more">Learn More</a>
    </div>
  </li>
  <li class="from-right">
    <img src="media/mercedesVclass.jpg" alt="V-Class">
    <div>
      <span><i class="fa-solid fa-car-side"></i> Mercedes V-Class – 7 seats</span>
      <a href="land-tours.html" class="learn-more">Learn More</a>
    </div>
  </li>
  <li class="from-left">
    <img src="media/quad.jpg" alt="Quad">
    <div>
      <span><i class="fa-solid fa-motorcycle"></i> Quad 4x4 – 2 seats</span>
      <a href="land-tours.html" class="learn-more">Learn More</a>
    </div>
  </li>
</ul>

    </div>

    <!-- Sea Fleet -->
    <div class="fleet-block">
      <h3>Sea Fleet</h3>
      <ul>
  <li class="from-left">
    <img src="media/yacht.jpeg" alt="Yacht">
    <div>
      <span><i class="fa-solid fa-ship"></i> Luxury Yacht – 12 guests</span>
      <a href="tours/yacht.php" class="learn-more">Learn More</a>
    </div>
  </li>
  <li class="from-right">
    <img src="media/boat2.jpeg" alt="Speedboat">
    <div>
      <span><i class="fa-solid fa-water"></i> Speedboat – 5/12 guests</span>
      <a href="speedboat.html" class="learn-more">Learn More</a>
    </div>
  </li>
  <li class="from-left">
    <img src="media/kayak2.jpeg" alt="Kayak">
    <div>
      <span><i class="fa-solid fa-person-swimming"></i> Kayaks – 1–2 guests</span>
      <a href="tours/kayak.php" class="learn-more">Learn More</a>
    </div>
  </li>
  <li class="from-right">
    <img src="media/jetski12.jpeg" alt="Jet Ski">
    <div>
      <span><i class="fa-solid fa-water"></i> Jet Ski – 2 guests</span>
      <a href="/tours/jetski.php" class="learn-more">Learn More</a>
    </div>
  </li>
</ul>

    </div>

  </div>
</section>

<section id="guest-moments">
    <h2>Guest Moments</h2>
    <div class="moments-wrapper">
        <div class="moments-track">
            <div class="moment">
                <img src="media/gosti5.jpeg" alt="Guest 1">
            </div>
            <div class="moment">
                <video src="media/videos/gosti_video4.mp4" muted autoplay loop playsinline></video>
            </div>
            <div class="moment">
                <img src="media/gosti4.jpeg" alt="Guest 6">
            </div>
            <div class="moment">
                <video src="media/videos/gosti_video3.mp4" muted autoplay loop playsinline></video>
            </div>
            <div class="moment">
                <img src="media/gosti3.jpeg" alt="Guest 1">
            </div>
            <div class="moment">
                <video src="media/videos/gosti_video2.mp4" muted autoplay loop playsinline></video>
            </div>
            <div class="moment">
                <img src="media/gosti2.jpeg" alt="Guest 3">
            </div>
            <div class="moment">
                <video src="media/videos/gosti_video1.mp4" muted autoplay loop playsinline></video>
            </div>
            <div class="moment">
                <img src="media/gosti1.jpeg" alt="Guest 5">
            </div>
        </div>
        <a href="#book" class="learn-more">Book Now</a>
    </div>
</section>

<footer class="footer">
    <div class="footer-content">
        <div class="footer-section logo-section">
            <img src="media/logo.png" alt="Global Guide Logo">
            <p>Your trusted partner for unforgettable adventures in Dubrovnik.</p>
        </div>

        <div class="footer-section nav-section">
            <h4>Navigate</h4>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="explore.html">Explore</a></li>
                <li><a href="restaurant.html">Restaurant</a></li>
                <li><a href="contact.html">Contact</a></li>
            </ul>
        </div>

        <div class="footer-section social-section">
            <h4>Follow Us</h4>
            <div class="social-icons">
                <a href="https://www.instagram.com/globalguidee/#"><i class="fab fa-instagram"></i></a>
                <a href="https://www.tiktok.com/@globalguidee"><i class="fab fa-tiktok"></i></a>
                
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        &copy; 2025 Global Guide. All rights reserved. | Powered by <a href="https://avision360.com" target="_blank">Avision360</a>
    </div>
</footer>

<!-- Modal -->
<div id="tourModal" class="modal">
  <div class="modal-content">
    <span class="close">&times;</span>
    <div class="modal-body">
      <div class="modal-left">
        <img id="modalImage" src="" alt="Tour Image">
        <p id="modalDescription"></p>
      </div>
      <div class="modal-right">
        <h2 id="modalTitle"></h2>
        <form>
          <input type="text" placeholder="Your Name" required>
          <input type="email" placeholder="Your Email" required>
          <input type="date" required>
          <input type="time" required>
          <button type="submit">Book Tour</button>
        </form>
      </div>
    </div>
  </div>
</div>



<script src="scripts/script.js"></script>
</body>

</html>
