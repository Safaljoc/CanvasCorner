/* ================== GALLERY LOAD FROM PHP ================== */
const gallerySlider = document.getElementById("gallerySlider");

if (gallerySlider) {
  fetch("gallery.php")
    .then(r => r.json())
    .then(data => {
      gallerySlider.innerHTML = "";
      data.forEach(img => {
        const d = document.createElement("div");
        d.className = "slide";
        d.dataset.cat = img.cat;
        d.innerHTML = `<img src="${img.src}" loading="lazy" onclick="openLightbox(this.src)">`;
        gallerySlider.appendChild(d);
      });
    })
    .catch(err => {
      console.error("Gallery load error:", err);
      gallerySlider.innerHTML = "<p style='padding:20px'>Gallery failed to load</p>";
    });
}

/* ================== DARK MODE ================== */
const toggle = document.getElementById("darkToggle");
if (toggle) {
  toggle.onclick = () => {
    document.body.classList.toggle("dark-mode");
    if (document.body.classList.contains("dark-mode")) {
      localStorage.setItem("theme", "dark-mode");
    } else {
      localStorage.removeItem("theme");
    }
  };

  if (localStorage.getItem("theme") === "dark-mode") {
    document.body.classList.add("dark-mode");
  }
}

/* ================== SLIDER FUNCTION ================== */
function autoPlaySlider(el, step = 260, delay = 3500) {
  if (!el) return;
  let paused = false;

  el.addEventListener("mouseenter", () => paused = true);
  el.addEventListener("mouseleave", () => paused = false);
  el.addEventListener("touchstart", () => paused = true);
  el.addEventListener("touchend", () => paused = false);

  setInterval(() => {
    if (paused) return;
    if (el.scrollLeft + el.clientWidth >= el.scrollWidth - 5) {
      el.scrollTo({ left: 0, behavior: "smooth" });
    } else {
      el.scrollBy({ left: step, behavior: "smooth" });
    }
  }, delay);
}

/* ---------- INIT SLIDERS ---------- */
if (gallerySlider) autoPlaySlider(gallerySlider);
const sizeSlider = document.getElementById("sizeSlider");
if (sizeSlider) autoPlaySlider(sizeSlider);

/* Remove canvasSlider auto-play if you are now using static frame rows */
/* const canvasSlider = document.getElementById("canvasFramesSlider");
if (canvasSlider) autoPlaySlider(canvasSlider); */

/* ---------- MANUAL SLIDE BUTTONS ---------- */
function getSlideStep(el) {
  const first = el.querySelector("img, .slide, .size-card");
  return first ? first.offsetWidth + 15 : 260;
}
function slideGallery(dir) {
  if (!gallerySlider) return;
  gallerySlider.scrollBy({ left: dir * getSlideStep(gallerySlider), behavior: "smooth" });
} 
function slideSize(dir) {
  if (!sizeSlider) return;
  sizeSlider.scrollBy({ left: dir * 260, behavior: "smooth" });
}

/* ================== FILTER FUNCTION ================== */
document.querySelectorAll(".filter-bar button").forEach(b => {
  b.onclick = () => {
    let f = b.dataset.filter || b.dataset.size;
    const targetSlider = b.closest(".section").querySelector(".gallery-slider, .size-slider");
    if (!targetSlider) return;

    targetSlider.querySelectorAll(".slide, .size-card").forEach(s => {
      s.style.display = (f === "all" || s.dataset.cat === f || s.classList.contains(f)) ? "block" : "none";
    });

    // Update active button style
    b.parentElement.querySelectorAll("button").forEach(btn => btn.classList.remove("active"));
    b.classList.add("active");
  };
});

/* ================== IMAGE FADE-IN ================== */
document.querySelectorAll("img").forEach(img => {
  img.style.opacity = "0";
  if (img.complete) img.style.opacity = "1";
  img.onload = () => img.style.opacity = "1";
});

/* ================== TESTIMONIAL SLIDER ================== */
document.addEventListener("DOMContentLoaded", () => {
  const reviewText = document.getElementById("reviewText");
  const reviewName = document.getElementById("reviewName");
  if (!reviewText || !reviewName) return;

  let testimonials = [];
  let currentReview = 0;

  function showReview(index) {
    reviewText.style.opacity = 0;
    reviewName.style.opacity = 0;

    setTimeout(() => {
      reviewText.innerText = testimonials[index].text;
      reviewName.innerText = `— ${testimonials[index].name}`;
      reviewText.style.opacity = 1;
      reviewName.style.opacity = 1;
    }, 300);
  }

  function slideTestimonial(dir) {
    currentReview += dir;
    if (currentReview < 0) currentReview = testimonials.length - 1;
    if (currentReview >= testimonials.length) currentReview = 0;
    showReview(currentReview);
  }

  window.slideTestimonial = slideTestimonial;

  fetch("get-testimonials.php")
    .then(res => res.json())
    .then(data => {
      testimonials = data;
      showReview(currentReview);
      setInterval(() => slideTestimonial(1), 4000);
    })
    .catch(err => console.error("Testimonial load error:", err));
});

/* ================== LIGHTBOX ================== */
function openLightbox(src) {
  const l = document.getElementById("lightbox");
  if (!l) return;
  l.style.display = "flex";
  document.getElementById("lightbox-img").src = src;
  document.getElementById("frameText").innerText = "";
}
function openFrame(txt) {
  const l = document.getElementById("lightbox");
  if (!l) return;
  l.style.display = "flex";
  document.getElementById("lightbox-img").src = "";
  document.getElementById("frameText").innerText = txt;
}
function closeLightbox() {
  const l = document.getElementById("lightbox");
  if (l) l.style.display = "none";
}

/* ================== MATERIAL SWITCHER ================== */
const matBtns = document.querySelectorAll(".materials-list button");
const matImg = document.getElementById("materialImg");
const matText = document.getElementById("materialText");
const matData = {
  canvas: { img: "images/materials/canvas.jpg", text: "High-density cotton canvas with vibrant long-lasting colors." },
  wood: { img: "images/materials/wood.jpg", text: "Solid wood frame for durability and premium feel." },
  glass: { img: "images/materials/glass.jpg", text: "UV protected glass to preserve artwork colors." }
};
matBtns.forEach(b => {
  b.onclick = () => {
    matBtns.forEach(x => x.classList.remove("active"));
    b.classList.add("active");
    const key = b.dataset.mat;
    if (matData[key]) {
      matImg.src = matData[key].img;
      matText.innerText = matData[key].text;
    }
  };
});

/* ================== DRAG-TO-SCROLL SLIDER ================== */
const slider = document.querySelector(".frame-gallery");
let isDown = false, startX, scrollLeft;

if (slider) {
  slider.addEventListener("mousedown", e => {
    isDown = true;
    startX = e.pageX - slider.offsetLeft;
    scrollLeft = slider.scrollLeft;
  });
  slider.addEventListener("mouseleave", () => isDown = false);
  slider.addEventListener("mouseup", () => isDown = false);
  slider.addEventListener("mousemove", e => {
    if (!isDown) return;
    e.preventDefault();
    const x = e.pageX - slider.offsetLeft;
    const walk = (x - startX) * 2;
    slider.scrollLeft = scrollLeft - walk;
  });
}

/* ================== CANVAS FRAME FADE-IN ================== */
const frameRows = document.querySelectorAll(".frame-row");
const frameObserver = new IntersectionObserver(entries => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      entry.target.classList.add("active");
      frameObserver.unobserve(entry.target);
    }
  });
}, { threshold: 0.2 });
frameRows.forEach(row => frameObserver.observe(row));
