function MostrarAlertaImg(titulo, desc, ruta) {
  Swal.fire({
    title: titulo,
    text: desc,
    imageUrl: ruta,
    imageWidth: 400,
    imageHeight: 250,
    imageAlt: "Custom image",
    confirmButtonText: "Volver",
    showClass: {
      popup: "animate__animated animate__fadeInDown",
    },
    hideClass: {
      popup: "animate__animated animate__fadeOutUp",
    },
  });
}

function AlertaErrorDatos() {
  Swal.fire({
    position: "center",
    icon: "error",
    title: "Error al guardar los datos.",
    showConfirmButton: false,
    timer: 3000,
  });
}

function AlertaExitoEditarPerfil() {
  Swal.fire({
    position: "center",
    icon: "success",
    title: "Tu información se guardo con exito.",
    showConfirmButton: false,
    timer: 3000,
  });
}

function AlertaMensajeEnviado() {
  Swal.fire({
    position: "center",
    icon: "success",
    title: "Mensaje enviado.",
    showConfirmButton: false,
    timer: 3000,
  });
}

function AlertaCerrarSesion() {
  Swal.fire({
    position: "center",
    icon: "success",
    title: "Gracias por su visita.",
    showConfirmButton: false,
    timer: 1500,
  });
}

function AlertaIniciarSesion() {
  Swal.fire({
    position: "center",
    icon: "success",
    title: "Bienvenido a Alarmas - OPSS",
    showConfirmButton: false,
    timer: 2000,
  });
}

function AlertaProductoAgotado() {
  Swal.fire({
    position: "center",
    icon: "error",
    title: "Producto agotado.",
    showConfirmButton: false,
    timer: 3000,
  });
}

function AlertaIniciarSesionPanel() {
  Swal.fire({
    position: "center",
    icon: "success",
    title: "Bienvenido al Panel de Control",
    showConfirmButton: false,
    timer: 2000,
  });
}

function AlertaIniciarSesionError() {
  Swal.fire({
    position: "center",
    icon: "error",
    title: "Contraseña o correo incorrecto.",
    showConfirmButton: false,
    timer: 3000,
  });
}

function ComprarProductos() {
  Swal.fire({
    position: "center",
    icon: "info",
    title: "¡ Aviso !",
    text: "Necesita Iniciar Sesión para poder comprar algún producto.",
    showConfirmButton: false,
    timer: 3000,
  });
}
