<?php
/**
 * Frame Detail Page
 * Displays detailed information about frame types
 */

$allowedFrames = ['wood', 'glass'];
$frame = isset($_GET['frame']) ? $_GET['frame'] : 'wood';

$frame = preg_replace('/[^a-z]/', '', strtolower($frame));
if (!in_array($frame, $allowedFrames)) {
    $frame = 'wood';
}

$frameInfo = [
    'wood' => [
        'title' => 'Wooden Frames',
        'description' => 'Our handcrafted wooden frames are made from premium quality wood, available in multiple finishes including natural oak, walnut, and mahogany. Each frame is carefully constructed to provide lasting durability and timeless elegance.',
        'features' => [
            'Premium quality hardwood construction',
            'Available in natural, dark, and painted finishes',
            'Hand-assembled with precision joints',
            'Protective backing and hanging hardware included',
            'Eco-friendly and sustainable materials'
        ]
    ],
    'glass' => [
        'title' => 'Glass Protection',
        'description' => 'Protect your canvas prints with our premium glass framing. Features UV-resistant glass that prevents fading, anti-glare coating for perfect viewing from any angle, and museum-quality presentation.',
        'features' => [
            'UV protection prevents color fading',
            'Anti-glare coating for optimal viewing',
            'Crystal-clear clarity that enhances artwork',
            'Dust and moisture resistant',
            'Easy to clean and maintain'
        ]
    ]
];

$imagesDir = __DIR__ . '/images/frames/' . $frame;
$images = [];
$allowedExtensions = ['jpg', 'jpeg', 'png'];

if (is_dir($imagesDir)) {
    $files = scandir($imagesDir);
    foreach ($files as $file) {
        if ($file === '.' || $file === '..') continue;
        $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
        if (in_array($ext, $allowedExtensions)) {
            $images[] = 'images/frames/' . htmlspecialchars($frame, ENT_QUOTES, 'UTF-8') . '/' . htmlspecialchars($file, ENT_QUOTES, 'UTF-8');
        }
    }
}

$info = $frameInfo[$frame];
$pageTitle = htmlspecialchars($info['title'], ENT_QUOTES, 'UTF-8');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo $pageTitle; ?> | Canvas Corner</title>
<meta name="description" content="<?php echo htmlspecialchars(substr($info['description'], 0, 155), ENT_QUOTES, 'UTF-8'); ?>">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="styles.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>
.frame-detail-container {max-width:1200px;margin:0 auto;padding:4rem 2rem;}
.back-link{display:inline-flex;align-items:center;gap:.5rem;color:var(--accent);font-weight:500;margin-bottom:2rem;transition:gap var(--transition-fast);}
.back-link:hover{gap:.75rem;}
.frame-detail-header{text-align:center;margin-bottom:3rem;}
.frame-detail-title{font-family:var(--font-display);font-size:3rem;color:var(--primary);margin-bottom:1rem;}
.frame-detail-description{font-size:1.125rem;color:var(--text-light);line-height:1.8;max-width:800px;margin:0 auto;}
.frame-gallery{display:grid;grid-template-columns:repeat(auto-fit,minmax(300px,1fr));gap:2rem;margin-bottom:4rem;}
.frame-gallery img{width:100%;height:350px;object-fit:cover;border-radius:var(--radius-lg);box-shadow:0 4px 20px var(--shadow);transition:transform var(--transition-normal);cursor:pointer;}
.frame-gallery img:hover{transform:scale(1.05);}
.frame-features-section{background:var(--bg-light);padding:3rem;border-radius:var(--radius-lg);margin-bottom:3rem;}
.features-title{font-size:2rem;font-weight:600;color:var(--primary);margin-bottom:2rem;text-align:center;}
.features-list{list-style:none;max-width:700px;margin:0 auto;}
.features-list li{padding:1rem;margin-bottom:1rem;background:var(--bg-white);border-radius:var(--radius-md);display:flex;align-items:flex-start;gap:1rem;box-shadow:0 2px 10px var(--shadow);}
.features-list i{color:var(--accent);font-size:1.25rem;margin-top:.25rem;}
.cta-section{text-align:center;padding:3rem;background:linear-gradient(135deg,var(--primary),var(--primary-light));border-radius:var(--radius-lg);color:white;}
.cta-section h3{font-size:2rem;margin-bottom:1rem;}
.cta-section p{margin-bottom:2rem;opacity:.9;}
@media(max-width:768px){
.frame-detail-title{font-size:2rem;}
.frame-gallery{grid-template-columns:1fr;}
.frame-features-section{padding:2rem 1.5rem;}
}
</style>
</head>

<body>

<nav class="cc-nav" id="navbar">
  <div class="nav-container">
    <div class="cc-logo">
      <a href="index.php" style="color: inherit;">
        <span class="logo-text">Canvas Corner</span>
      </a>
    </div>

    <button class="mobile-toggle" id="mobileToggle">
      <span></span><span></span><span></span>
    </button>

    <ul class="cc-menu" id="navMenu">
      <li><a href="index.php#gallery" class="nav-link">Gallery</a></li>
      <li><a href="index.php#sizes" class="nav-link">Sizes</a></li>
      <li><a href="index.php#frames" class="nav-link">Frames</a></li>
      <li><a href="index.php#reviews" class="nav-link">Reviews</a></li>
      <li><a href="index.php#contact" class="nav-link">Contact</a></li>
      <li class="dark-mode-item">
        <button class="dark-mode-toggle" id="darkToggle"><i class="fas fa-moon"></i></button>
      </li>
    </ul>
  </div>
</nav>

<main class="frame-detail-container">

<a href="index.php#frames" class="back-link">
<i class="fas fa-arrow-left"></i> Back to Frames
</a>

<header class="frame-detail-header">
<h1 class="frame-detail-title"><?php echo $pageTitle; ?></h1>
<p class="frame-detail-description"><?php echo htmlspecialchars($info['description'], ENT_QUOTES, 'UTF-8'); ?></p>
</header>

<section class="frame-gallery">
<?php if (!empty($images)): foreach ($images as $i => $img): ?>
<img src="<?php echo $img; ?>"
alt="<?php echo $pageTitle; ?> example <?php echo $i+1; ?>"
loading="<?php echo $i < 3 ? 'eager' : 'lazy'; ?>">
<?php endforeach; else: ?>
<img src="https://via.placeholder.com/600x400" loading="eager">
<img src="https://via.placeholder.com/600x400" loading="lazy">
<img src="https://via.placeholder.com/600x400" loading="lazy">
<?php endif; ?>
</section>

<section class="frame-specs">
  <div class="frame-spec">
    <h4>Canvas Thickness</h4>
    <p>1.5 inch premium gallery wrap</p>
  </div>
  <div class="frame-spec">
    <h4>Edge Style</h4>
    <p>Mirror wrap / Black edges</p>
  </div>
  <div class="frame-spec">
    <h4>Print Type</h4>
    <p>Fade-resistant pigment ink</p>
  </div>
</section>


<section class="frame-features-section">
<h2 class="features-title">Key Features</h2>
<ul class="features-list">
<?php foreach ($info['features'] as $f): ?>
<li><i class="fas fa-check-circle"></i><span><?php echo htmlspecialchars($f, ENT_QUOTES, 'UTF-8'); ?></span></li>
<?php endforeach; ?>
</ul>
</section>

<section class="materials-section">

  <div class="materials-list">
    <button class="active" data-mat="canvas">Premium Canvas</button>
    <button data-mat="wood">Solid Wood Frame</button>
    <button data-mat="glass">UV Glass</button>
  </div>

  <div class="material-preview">
    <img id="materialImg" src="images/materials/canvas.jpg" alt="">
    <p id="materialText">
      High-density cotton canvas with vibrant long-lasting colors.
    </p>
  </div>

</section>


<section class="cta-section">
<h3>Ready to Order?</h3>
<p>Get in touch with us to discuss your framing needs</p>
<div class="hero-cta">
<a href="https://wa.me/9779769358790?text=Hello,%20I'm%20interested%20in%20<?php echo urlencode($pageTitle); ?>" class="btn btn-primary btn-lg" target="_blank">
<i class="fab fa-whatsapp"></i> Order via WhatsApp
</a>
<a href="index.php#contact" class="btn btn-outline-light btn-lg">
<i class="fas fa-envelope"></i> Contact Us
</a>
</div>
</section>

</main>

<footer class="footer">
<div class="container">
<p>&copy; 2025 Canvas Corner. All rights reserved.</p>
<p class="footer-tagline">Crafted with care in Nepal</p>
</div>
</footer>

<a href="https://wa.me/9779769358790" class="float-btn whatsapp" target="_blank">
<i class="fab fa-whatsapp"></i>
</a>

<script>
const darkToggle=document.getElementById("darkToggle");
const mobileToggle=document.getElementById("mobileToggle");
const navMenu=document.getElementById("navMenu");

const savedTheme=localStorage.getItem("theme");
if(savedTheme==="dark"){document.body.classList.add("dark");}

darkToggle?.addEventListener("click",()=>{
document.body.classList.toggle("dark");
localStorage.setItem("theme",document.body.classList.contains("dark")?"dark":"light");
});

mobileToggle?.addEventListener("click",()=>{
mobileToggle.classList.toggle("active");
navMenu.classList.toggle("active");
});
</script>

<script>
document.querySelectorAll(".frame-gallery img").forEach(img=>{
img.addEventListener("click",()=>{
const l=document.createElement("div");
l.style.cssText="position:fixed;inset:0;background:rgba(0,0,0,.85);display:flex;align-items:center;justify-content:center;z-index:9999;";
const i=document.createElement("img");
i.src=img.src;
i.style.maxWidth="90%";
i.style.maxHeight="90%";
i.style.borderRadius="12px";
l.appendChild(i);
l.onclick=()=>l.remove();
document.body.appendChild(l);
});
});
</script>

</body>
</html>
