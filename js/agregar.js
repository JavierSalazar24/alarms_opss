function ConfirmAdd() {
  var respuesta = confirm(
    "¿Estás seguro que deseas agregar el producto a tu carrito?"
  );

  if (respuesta == true) {
    return true;
  } else {
    return false;
  }
}
