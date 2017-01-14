function f(elemenet){
  var modal = document.getElementById("myModal");
  var modalImg = document.getElementById("img01");

  modal.style.display = "block";
  modalImg.src = elemenet.src;
}

function c(event) {
  var modal = document.getElementById("myModal");
  modal.style.display = "none";
}
/*----------------------------------------------------*/
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("slides");
  var disp = document.getElementById("img01");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  //slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  disp.src = slides[slideIndex-1].src;
}
