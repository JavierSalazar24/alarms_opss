function accion() {
  var ancla = document.getElementsByClassName("info");
  var ancla2 = document.getElementsByClassName("plus");
  for (var i = 0; i < ancla.length; i++) {
    ancla[i].classList.toggle("desaparece2");
    ancla2[i].classList.toggle("fa-minus");
  }
}
