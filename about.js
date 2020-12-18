var Index = 1;
showSlides(Index);

// Next/previous controls
function plusSlides(n) {
  showSlides(Index += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(Index = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("Slides");
  if (n > slides.length) {Index = 1}
  if (n < 1) {Index = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  slides[Index-1].style.display = "block";

}