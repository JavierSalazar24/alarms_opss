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
          Swal.fire({
            position: "center",
            icon: "success",
            title: "Bienvenido a su panel de administrador",
            showConfirmButton: false,
            timer: 1500,
          });
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
        } else if (data == "dif") {
          Swal.fire("Error!", "Las contraseñas no coinciden", "error");
        } else if (data == "nom") {
          Swal.fire(
            "Error!",
            "El nombre debe contener al menos 3 carácteres",
            "warning"
          );
        } else if (data == "ape1") {
          Swal.fire(
            "Error!",
            "El apellido debe contener al menos 3 carácteres",
            "warning"
          );
        } else if (data == "tel") {
          Swal.fire(
            "Error!",
            "El teléfono debe contener al menos 10 números",
            "warning"
          );
        } else if (data == "calle") {
          Swal.fire(
            "Error!",
            "La calle debe contener al menos 3 carácteres",
            "warning"
          );
        } else if (data == "col") {
          Swal.fire(
            "Error!",
            "La colonia o fraccionamiento debe contener al menos 5 carácteres",
            "warning"
          );
        } else if (data == "cp") {
          Swal.fire(
            "Error!",
            "El código postal debe contener 5 números",
            "warning"
          );
        } else if (data == "email") {
          Swal.fire(
            "Error!",
            "El correo debe tener formato de email (@example.com)",
            "warning"
          );
        } else if (data == "pass") {
          Swal.fire(
            "Error!",
            "La contraseña debe contener al menos 8 carácteres",
            "warning"
          );
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
        } else if (data == "dif") {
          Swal.fire("Error!", "Las contraseñas no coinciden", "error");
        } else if (data == "nom") {
          Swal.fire(
            "Error!",
            "El nombre debe contener al menos 3 carácteres",
            "warning"
          );
        } else if (data == "ape1") {
          Swal.fire(
            "Error!",
            "El apellido debe contener al menos 3 carácteres",
            "warning"
          );
        } else if (data == "tel") {
          Swal.fire(
            "Error!",
            "El teléfono debe contener al menos 10 números",
            "warning"
          );
        } else if (data == "calle") {
          Swal.fire(
            "Error!",
            "La calle debe contener al menos 3 carácteres",
            "warning"
          );
        } else if (data == "col") {
          Swal.fire(
            "Error!",
            "La colonia o fraccionamiento debe contener al menos 5 carácteres",
            "warning"
          );
        } else if (data == "cp") {
          Swal.fire(
            "Error!",
            "El código postal debe contener 5 números",
            "warning"
          );
        } else if (data == "email") {
          Swal.fire(
            "Error!",
            "El correo debe tener formato de email (@example.com)",
            "warning"
          );
        } else if (data == "pass") {
          Swal.fire(
            "Error!",
            "La contraseña debe contener al menos 8 carácteres",
            "warning"
          );
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
  document.getElementById("nombre").innerHTML = " ";
  document.getElementById("email").innerHTML = " ";
  document.getElementById("mensaje").innerHTML = " ";
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
            } else if (data == "nom") {
              Swal.fire(
                "Error!",
                "El nombre debe contener al menos 3 carácteres",
                "warning"
              );
            } else if (data == "ape1") {
              Swal.fire(
                "Error!",
                "El apellido debe contener al menos 3 carácteres",
                "warning"
              );
            } else if (data == "tel") {
              Swal.fire(
                "Error!",
                "El teléfono debe contener al menos 10 números",
                "warning"
              );
            } else if (data == "calle") {
              Swal.fire(
                "Error!",
                "La calle debe contener al menos 3 carácteres",
                "warning"
              );
            } else if (data == "col") {
              Swal.fire(
                "Error!",
                "La colonia o fraccionamiento debe contener al menos 5 carácteres",
                "warning"
              );
            } else if (data == "cp") {
              Swal.fire(
                "Error!",
                "El código postal debe contener 5 números",
                "warning"
              );
            } else if (data == "cant") {
              Swal.fire(
                "Error!",
                "La cantidad debe de ser mayor o igual a 1",
                "warning"
              );
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
            } else if (data == "nom") {
              Swal.fire(
                "Error!",
                "El nombre debe contener al menos 3 carácteres",
                "warning"
              );
            } else if (data == "ape1") {
              Swal.fire(
                "Error!",
                "El apellido debe contener al menos 3 carácteres",
                "warning"
              );
            } else if (data == "tel") {
              Swal.fire(
                "Error!",
                "El teléfono debe contener al menos 10 números",
                "warning"
              );
            } else if (data == "calle") {
              Swal.fire(
                "Error!",
                "La calle debe contener al menos 3 carácteres",
                "warning"
              );
            } else if (data == "col") {
              Swal.fire(
                "Error!",
                "La colonia o fraccionamiento debe contener al menos 5 carácteres",
                "warning"
              );
            } else if (data == "cp") {
              Swal.fire(
                "Error!",
                "El código postal debe contener 5 números",
                "warning"
              );
            } else if (data == "cant") {
              Swal.fire(
                "Error!",
                "La cantidad debe de ser mayor o igual a 1",
                "warning"
              );
            }
          });
      }
    });
  });
}

function editarPerfil() {
  var form_editar_perfil = document.getElementById("form_editar_perfil");
  form_editar_perfil.addEventListener("submit", function (e) {
    e.preventDefault();
    var datos = new FormData(form_editar_perfil);

    fetch("php/editar_perfil.php", {
      method: "POST",
      body: datos,
    })
      .then((res) => res.json())
      .then((data) => {
        if (data == "correcto") {
          Swal.fire({
            position: "center",
            icon: "success",
            title: "Pefil editado con exito",
            showConfirmButton: false,
            timer: 1500,
          });
          setTimeout(cargaAlertaEditarPerfil, 500);
          function cargaAlertaEditarPerfil() {
            location.href = "mi_perfil.php";
          }
        } else if (data == "error") {
          Swal.fire("Error!", "Ocurrio un error en el servidor", "error");
        } else if (data == "vacio") {
          Swal.fire("Error!", "Datos vacíos", "error");
        } else if (data == "nom") {
          Swal.fire(
            "Error!",
            "El nombre debe contener al menos 3 carácteres",
            "warning"
          );
        } else if (data == "ape1") {
          Swal.fire(
            "Error!",
            "El apellido debe contener al menos 3 carácteres",
            "warning"
          );
        } else if (data == "tel") {
          Swal.fire(
            "Error!",
            "El teléfono debe contener al menos 10 números",
            "warning"
          );
        } else if (data == "calle") {
          Swal.fire(
            "Error!",
            "La calle debe contener al menos 3 carácteres",
            "warning"
          );
        } else if (data == "col") {
          Swal.fire(
            "Error!",
            "La colonia o fraccionamiento debe contener al menos 5 carácteres",
            "warning"
          );
        } else if (data == "cp") {
          Swal.fire(
            "Error!",
            "El código postal debe contener 5 números",
            "warning"
          );
        }
      });
  });
}

function editarPerfil2() {
  var form_editar_perfil2 = document.getElementById("form_editar_perfil2");
  form_editar_perfil2.addEventListener("submit", function (e) {
    e.preventDefault();
    var datos = new FormData(form_editar_perfil2);

    fetch("php/editar_perfil.php", {
      method: "POST",
      body: datos,
    })
      .then((res) => res.json())
      .then((data) => {
        if (data == "correcto") {
          Swal.fire({
            position: "center",
            icon: "success",
            title: "Perfil editado con exito",
            showConfirmButton: false,
            timer: 1500,
          });
          setTimeout(cargaAlertaEditarPerfil, 500);
          function cargaAlertaEditarPerfil() {
            location.href = "mi_perfil.php";
          }
        } else if (data == "error") {
          Swal.fire("Error!", "Ocurrio un error en el servidor", "error");
        } else if (data == "vacio") {
          Swal.fire("Error!", "Datos vacíos", "error");
        } else if (data == "nom") {
          Swal.fire(
            "Error!",
            "El nombre debe contener al menos 3 carácteres",
            "warning"
          );
        } else if (data == "ape1") {
          Swal.fire(
            "Error!",
            "El apellido debe contener al menos 3 carácteres",
            "warning"
          );
        } else if (data == "tel") {
          Swal.fire(
            "Error!",
            "El teléfono debe contener al menos 10 números",
            "warning"
          );
        } else if (data == "calle") {
          Swal.fire(
            "Error!",
            "La calle debe contener al menos 3 carácteres",
            "warning"
          );
        } else if (data == "col") {
          Swal.fire(
            "Error!",
            "La colonia o fraccionamiento debe contener al menos 5 carácteres",
            "warning"
          );
        } else if (data == "cp") {
          Swal.fire(
            "Error!",
            "El código postal debe contener 5 números",
            "warning"
          );
        }
      });
  });
}
