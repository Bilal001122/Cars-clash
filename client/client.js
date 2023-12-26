"use strict";

if (document.querySelector(".diaporama") != null) {
  let slides = document.querySelectorAll(".diaporama");
  let currentSlide = 0;
  const slideInterval = 5000;

  function nextSlide() {
    slides[currentSlide].style.display = "none";
    currentSlide = (currentSlide + 1) % slides.length;
    slides[currentSlide].style.display = "block";
  }

  function startSlideshow() {
    slides[currentSlide].style.display = "block";
    setInterval(nextSlide, slideInterval);
  }
  slides.forEach((slide) =>
    slide.addEventListener("click", function (event) {
      window.open(
        slides[currentSlide].firstElementChild.dataset.pointer,
        "_blank"
      );
      console.log(slides[currentSlide].firstChild);
    })
  );
  window.onload = startSlideshow();
}
