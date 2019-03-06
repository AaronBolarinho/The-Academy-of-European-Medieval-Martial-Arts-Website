// ----------------- This is the JS for the image galleries ----------------------------------------------------

// --- This is so the first slide is shown on load.
window.onload = function showFirstSlide(n) {
  showSlides(1);
  console.log("this was laoded")
};
// --- This is so the first slide is shown on load.

var slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  console.log("This has been clicked")
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
}

// ----- This function is the show/hide function for the equipment image galleries
function myFunction() {
        var x = document.getElementById("myDIV");
        console.log("this was clicked")
        if (x.style.display === "none") {
          x.style.display = "block";
        } else {
          x.style.display = "none";
        }
      }
// ----- This function is the show/hide function for the equipment image galleries


// ----------------- This is the JS for the image galleries ----------------------------------------------------


