function ConfirmDelete() {
  var respuesta = confirm("¿Estás seguro que deseas eliminar el registro?");

  if (respuesta == true) {
    return true;
  } else {
    return false;
  }
}
