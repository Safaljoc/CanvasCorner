  <!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Canvas Corner | Premium Canvas Prints</title>
<meta name="description" content="Premium canvas prints in Nepal. Custom wall art with frames.">
<meta name="keywords" content="canvas print nepal, wall art lalitpur, custom canvas">
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=Montserrat:wght@300;400;500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="styles.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>

<!-- NAVBAR -->
<nav class="cc-nav">
  <div class="cc-logo">Canvas Corner</div>
  <button class="mobile-toggle" id="mobileToggle" aria-label="Toggle menu">
    <span></span>
    <span></span>
    <span></span>
  </button>
  <ul class="cc-menu" id="navMenu">
    <li><a href="#gallery">Gallery</a></li>
    <li><a href="#sizes">Sizes</a></li>
    <li><a href="#frames">Frames</a></li>
    <li><a href="#canvas-frames">Canvas Frames</a></li>
    <li><a href="#testimonials">Reviews</a></li>
    <li><a href="#contact">Contact</a></li>
  </ul>
  <div class="dark-mode-toggle">
    <i class="fas fa-moon" id="darkToggle"></i>
  </div>
</nav>

<!-- HERO -->
<header class="hero" id="heroSection">
  <div class="hero-content reveal">
    <h1>Canvas Corner</h1>
    <p>Bring your walls to life</p>
  </div>
</header>

<!-- GALLERY -->
<section id="gallery" class="section">
<h2>Design Gallery</h2>

<div class="filter-bar">
  <button data-filter="all" class="active">All</button>
  <button data-filter="nature">Nature</button>
  <button data-filter="abstract">Abstract</button>
  <button data-filter="modern">Modern</button>
  <button data-filter="boho">Boho Art</button>
</div>

<div class="slider-wrap">
  <button class="slide-btn" onclick="slideGallery(-1)" aria-label="Previous images">◀</button>
  <div class="gallery-slider" id="galleryContainer">
    <div class="loading">Loading gallery...</div>
  </div>
  <button class="slide-btn" onclick="slideGallery(1)" aria-label="Next images">▶</button>
</div>
</section>

<!-- SIZES -->
<section id="sizes" class="section bg-light">
<h2>Canvas Sizes</h2>

<div class="filter-bar">
  <button data-size="all" class="active">All</button>
  <button data-size="vertical">Vertical</button>
  <button data-size="horizontal">Horizontal</button>
</div>

<div class="slider-wrap">
  <button class="slide-btn" onclick="slideSize(-1)" aria-label="Previous sizes">◀</button>
  <div class="size-slider" id="sizeSlider">
    <!-- Vertical sizes -->
    <div class="size-card vertical">7 × 12 in</div>
    <div class="size-card vertical">12 × 18 in</div>
    <div class="size-card vertical">18 × 24 in</div>
    <div class="size-card vertical">3 × 2 ft</div>
    <!-- Horizontal sizes -->
    <div class="size-card horizontal">7 × 12 in</div>
    <div class="size-card horizontal">12 × 18 in</div>
    <div class="size-card horizontal">18 × 24 in</div>
    <div class="size-card horizontal">3 × 2 ft</div>
    <div class="size-card horizontal">5 × 3 ft</div>
  </div>
  <button class="slide-btn" onclick="slideSize(1)" aria-label="Next sizes">▶</button>
</div>

<p class="custom-note">✨ Custom sizes also available on request</p>
</section>

<!-- FRAMES -->
<section id="frames" class="section">
<h2>Frames</h2>
<div class="columns">
  <div class="card hover-card" onclick="window.location.href='frame-detail.php?frame=glass'" role="button" tabindex="0">
    <img src="images/frames/glass.jpg">
    <h3>Glass Protection</h3>
  </div>
  <div class="card hover-card" onclick="window.location.href='frame-detail.php?frame=wood'" role="button" tabindex="0">
    <img src="images/frames/wood.jpg">
    <h3>Wooden Frames</h3>
  </div>
</div>
</section>

<!-- CANVAS FRAMES -->
<section id="canvas-frames" class="section">
  <h2>Canvas Frames</h2>

  <div class="frame-row reveal">
    <img src="images/frames/material1.jpg" alt="Canvas frame material 1">
    <div class="frame-text">
      <h3>Material 1</h3>
      <p>Description for material 1 goes here. High-quality canvas with vibrant colors.</p>
    </div>
  </div>

  <div class="frame-row reveal reverse">
    <img src="images/frames/material2.jpg" alt="Canvas frame material 2">
    <div class="frame-text">
      <h3>Material 2</h3>
      <p>Description for material 2 goes here. Durable and premium finish.</p>
    </div>
  </div>

  <div class="frame-row reveal">
    <img src="images/frames/material3.jpg" alt="Canvas frame material 3">
    <div class="frame-text">
      <h3>Material 3</h3>
      <p>Description for material 3 goes here. Perfect for modern interiors.</p>
    </div>
  </div>
</section>

<!-- TESTIMONIALS -->
<section id="testimonials" class="section bg-light">
<h2>Customer Reviews</h2>
<div class="testimonial-slider">
  <button class="slide-btn" onclick="slideTestimonial(-1)" aria-label="Previous review">◀</button>
  <div class="testimonial-box">
    <p id="reviewText"></p>
    <span id="reviewName"></span>
  </div>
  <button class="slide-btn" onclick="slideTestimonial(1)" aria-label="Next review">▶</button>
</div>
</section>



<!-- MAP -->
<section class="section">
<h2>Find Us</h2>
<div class="google-review">
<iframe src="https://www.google.com/maps?q=Sankhamul+Lalitpur&output=embed" loading="lazy" title="Canvas Corner Location"></iframe>
</div>
</section>

<!-- CONTACT -->
<section id="contact" class="section bg-dark">
<h2>Contact Canvas Corner</h2>
<p>📍 Sankhamul, Lalitpur</p>
<p>📞 9769358790</p>
</section>

<footer>© 2025 Canvas Corner</footer>

<!-- FLOATING BUTTONS -->
<a href="https://wa.me/9779769358790?text=Hello%20I%20want%20to%20order%20a%20canvas" 
 class="float-btn whatsapp" target="_blank" rel="noopener noreferrer" aria-label="WhatsApp">
<i class="fab fa-whatsapp"></i>
</a>

<a href="https://www.instagram.com/canvascorner.np/" 
 class="float-btn insta" target="_blank" rel="noopener noreferrer" aria-label="Instagram">
<i class="fab fa-instagram"></i>
</a>

<script src="script.js"></script>
</body>
</html>