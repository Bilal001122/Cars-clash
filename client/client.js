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

const forms = document.querySelectorAll("form");
const compareButton = document.querySelector('[name="demarer-comparaison"]');
//compareButton.disabled = true;

// function checkForms() {
//   let filledForms = 0;
//   forms.forEach((form) => {
//     const inputs = form.querySelectorAll('input[type="text"]');
//     let filledInputs = 0;
//     inputs.forEach((input) => {
//       if (input.value !== "") {
//         filledInputs++;
//       }
//     });
//     if (filledInputs > 2) {
//       filledForms++;
//     }
//   });

//   if (filledForms >= 2) {
//     compareButton.disabled = false;
//   } else {
//     compareButton.disabled = true;
//   }
// }

// forms.forEach((form) => {
//   const inputs = form.querySelectorAll('input[type="text"]');
//   inputs.forEach((input) => {
//     input.addEventListener("input", checkForms);
//   });
// });

// const compareForm = document.getElementById("compareForm");

// compareButton.addEventListener("click", function (event) {
//   event.preventDefault();
//   compareForm.submit();
//   setTimeout(() => {
//     console.log("test");
//   }, 5000);
// });
