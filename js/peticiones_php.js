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
        } else if (data == "vacio") {
          Swal.fire("Error!", "Datos vacíos", "error");
        }
      });
  });
}

function registrarse() {
  var form_registrarse = document.getElementById("form_registrarse");
  form_registrarse.addEventListener("submit", function (e) {
    e.preventDefault();
    var datos = new FormData(form_registrarse);

    fetch("php/registrarse.php", {
      method: "POST",
      body: datos,
    })
      .then((res) => res.json())
      .then((data) => {
        if (data == "correcto") {
          Swal.fire({
            position: "center",
            icon: "success",
            title: "Bienvenido a OPSS",
            showConfirmButton: false,
            timer: 1500,
          });
          setTimeout(cargaAlertaRegistrarse, 500);
          function cargaAlertaRegistrarse() {
            location.href = "index.php";
          }
        } else if (data == "error") {
          Swal.fire("Error!", "Ocurrio un error en el servidor", "error");
        } else if (data == "existente") {
          Swal.fire("Error!", "El correo ya existe", "error");
        } else if (data == "vacio") {
          Swal.fire("Error!", "Datos vacíos", "error");
        }
      });
  });
}

function registrarse2() {
  var form_registrarse2 = document.getElementById("form_registrarse2");
  form_registrarse2.addEventListener("submit", function (e) {
    e.preventDefault();
    var datos = new FormData(form_registrarse2);

    fetch("php/registrarse.php", {
      method: "POST",
      body: datos,
    })
      .then((res) => res.json())
      .then((data) => {
        if (data == "correcto") {
          Swal.fire({
            position: "center",
            icon: "success",
            title: "Bienvenido a OPSS",
            showConfirmButton: false,
            timer: 1500,
          });
          setTimeout(cargaAlertaRegistrarse, 500);
          function cargaAlertaRegistrarse() {
            location.href = "index.php";
          }
        } else if (data == "error") {
          Swal.fire("Error!", "Ocurrio un error en el servidor", "error");
        } else if (data == "existente") {
          Swal.fire("Error!", "El correo ya existe", "error");
        } else if (data == "vacio") {
          Swal.fire("Error!", "Datos vacíos", "error");
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
        } else if (data == "error") {
          Swal.fire({
            position: "center",
            icon: "error",
            title: "Problemas al enviar el mensaje",
            showConfirmButton: false,
            timer: 1500,
          });
        } else if (data == "vacio") {
          Swal.fire("Error!", "Datos vacíos", "error");
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
            } else if (data == "error") {
              Swal.fire({
                position: "center",
                icon: "error",
                title: "Error en el servidor",
                showConfirmButton: false,
                timer: 3000,
              });
            } else if (data == "vacio") {
              Swal.fire("Error!", "Datos vacíos", "error");
            }
          });
      }
    });
  });
}

function enviarDireccion2() {
  var enviar_direccion2 = document.getElementById("enviar_direccion2");

  enviar_direccion2.addEventListener("submit", function (e) {
    e.preventDefault();
    var datos = new FormData(enviar_direccion2);
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
            } else if (data == "error") {
              Swal.fire({
                position: "center",
                icon: "error",
                title: "Error en el servidor",
                showConfirmButton: false,
                timer: 3000,
              });
            } else if (data == "vacio") {
              Swal.fire("Error!", "Datos vacíos", "error");
            }
          });
      }
    });
  });
}
