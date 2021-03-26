function iniciarSesion() {
  var form_login = document.getElementById("form_login");

  form_login.addEventListener("submit", function (e) {
    e.preventDefault();
    var datos = new FormData(form_login);
    fetch("php/iniciar_sesion.php", {
      method: "POST",
      body: datos,
    })
      .then((res) => res.json())
      .then((data) => {
        if (data == "user") {
          Swal.fire({
            position: "center",
            icon: "success",
            title: "Bienvenido a OPSS",
            showConfirmButton: false,
            timer: 1500,
          });
          setTimeout(cargaAlertaIniciarSesion, 500);
          function cargaAlertaIniciarSesion() {
            location.href = "index.php";
          }
        } else if (data == "admin") {
          Swal.fire(
            "Bienvenido!",
            "Bienvenido a OPSS administrador",
            "success"
          );
          setTimeout(cargaAlertaIniciarSesion, 500);
          function cargaAlertaIniciarSesion() {
            location.href = "control_panel/index.php";
          }
        } else if (data == "null") {
          Swal.fire("Error!", "Usuario o Contraseña incorrecta", "error");
        }
      });
  });
}

function enviarMensaje() {
  var input_mensaje = document.getElementById("input_mensaje");

  input_mensaje.addEventListener("submit", function (e) {
    e.preventDefault();
    var datos = new FormData(input_mensaje);
    fetch("php/enviar_mensajes.php", {
      method: "POST",
      body: datos,
    })
      .then((res) => res.json())
      .then((data) => {
        if (data == "correcto") {
          Swal.fire({
            position: "center",
            icon: "success",
            title: "Mensaje enviado",
            showConfirmButton: false,
            timer: 1500,
          });
        } else {
          Swal.fire({
            position: "center",
            icon: "error",
            title: "Problemas al enviar el mensaje",
            showConfirmButton: false,
            timer: 1500,
          });
        }
      });
    input_mensaje.reset();
  });
}

function enviarDireccion() {
  var enviar_direccion = document.getElementById("enviar_direccion");

  enviar_direccion.addEventListener("submit", function (e) {
    e.preventDefault();
    var datos = new FormData(enviar_direccion);
    Swal.fire({
      title: "¿Estás seguro que deseas realizar la compra?",
      text: "No podras deshacerlo",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      confirmButtonText: "Aceptar",
      cancelButtonText: "Cancelar",
      cancelButtonColor: "#d33",
    }).then((result) => {
      if (result.isConfirmed) {
        fetch("php/enviar_direccion.php", {
          method: "POST",
          body: datos,
        })
          .then((res) => res.json())
          .then((data) => {
            if (data == "correcto") {
              location.href = `pagar.php?id_producto=${datos.get(
                "id_producto"
              )}`;
            } else {
              Swal.fire({
                position: "center",
                icon: "error",
                title: "Error en el servidor",
                showConfirmButton: false,
                timer: 3000,
              });
            }
          });
      }
    });
  });
}
