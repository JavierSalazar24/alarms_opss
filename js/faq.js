function accion1() {
  var ancla = document.getElementsByClassName("flech1");
  var ancla2 = document.getElementsByClassName("asistencia-flecha1");
  for (var i = 0; i < ancla.length; i++) {
    ancla[i].classList.toggle("desaparece");
    ancla2[i].classList.toggle("fa-chevron-up");
  }
}

function accion2() {
  var ancla = document.getElementsByClassName("flech2");
  var ancla2 = document.getElementsByClassName("asistencia-flecha2");
  for (var i = 0; i < ancla.length; i++) {
    ancla[i].classList.toggle("desaparece");
    ancla2[i].classList.toggle("fa-chevron-up");
  }
}

function accion3() {
  var ancla = document.getElementsByClassName("flech3");
  var ancla2 = document.getElementsByClassName("asistencia-flecha3");
  for (var i = 0; i < ancla.length; i++) {
    ancla[i].classList.toggle("desaparece");
    ancla2[i].classList.toggle("fa-chevron-up");
  }
}

function accion4() {
  var ancla = document.getElementsByClassName("flech4");
  var ancla2 = document.getElementsByClassName("asistencia-flecha4");
  for (var i = 0; i < ancla.length; i++) {
    ancla[i].classList.toggle("desaparece");
    ancla2[i].classList.toggle("fa-chevron-up");
  }
}

function accion5() {
  var ancla = document.getElementsByClassName("info");
  var ancla2 = document.getElementsByClassName("plus");
  for (var i = 0; i < ancla.length; i++) {
    ancla[i].classList.toggle("desaparece");
    ancla2[i].classList.toggle("fa-minus");
  }
}
