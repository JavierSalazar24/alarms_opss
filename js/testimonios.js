let indice = 1;
muestraSlides(indece);

function avanzaSlide(n) {
  muestraSlides((indice += n));
}

function posicionSlide(n) {
  muestraSlides((indice = n));
}

setInterval(function tiempo() {
  muestraSlides((indice += 1));
}, 4000);

function muestraSlides(n) {
  let slides = document.getElementsByClassName("testimonio-slider");
  let barras = document.getElementsByClassName("barra");

  if (n > slides.length) {
    indice = 1;
  } else if (n < 1) {
    indice = slides.length;
  }

  for (let i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }

  for (let i = 0; i < barras.length; i++) {
    barras[i].className = barras[i].className.replace(" active", "");
  }

  slides[indice - 1].style.display = "block";
  barras[indice - 1].className += " active";
}
