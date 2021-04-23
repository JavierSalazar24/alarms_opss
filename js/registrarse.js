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
      }
    });
});
