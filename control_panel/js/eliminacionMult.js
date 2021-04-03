function EliminacionMultAdmins() {
  formulario_admin.addEventListener("submit", function (e) {
    e.preventDefault();
    var formulario = document.getElementById("formulario_admin");
    var datos = new FormData(formulario);
    Swal.fire({
      title: "¿Estás seguro que deseas eliminar los registros?",
      text: "No podras recuperarlos.",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      confirmButtonText: "Aceptar",
      cancelButtonText: "Cancelar",
      cancelButtonColor: "#d33",
    }).then((result) => {
      if (result.isConfirmed) {
        fetch("eliminarMult.php", {
          method: "POST",
          body: datos,
        })
          .then((res) => res.json())
          .then((data) => {
            console.log(data);
            if (data == "error") {
              Swal.fire("Error!", "Registros no eliminados", "error");
            } else if (data == "vacio") {
              Swal.fire("Error!", "No seleccionó ningun registro", "warning");
            } else {
              Swal.fire(
                "Eliminados!",
                "Registros eliminados exitosamente",
                "success"
              ).then((result) => {
                if (result.isConfirmed) {
                  location.href = "administradores.php";
                }
              });
            }
          });
      }
    });
  });
}

function EliminacionMultClient() {
  formulario_client.addEventListener("submit", function (e) {
    e.preventDefault();
    var formulario = document.getElementById("formulario_client");
    var datos = new FormData(formulario);
    Swal.fire({
      title: "¿Estás seguro que deseas eliminar los registros?",
      text: "No podras recuperarlos.",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      confirmButtonText: "Aceptar",
      cancelButtonText: "Cancelar",
      cancelButtonColor: "#d33",
    }).then((result) => {
      if (result.isConfirmed) {
        fetch("eliminarMult.php", {
          method: "POST",
          body: datos,
        })
          .then((res) => res.json())
          .then((data) => {
            console.log(data);
            if (data == "error") {
              Swal.fire("Error!", "Registros no eliminados", "error");
            } else if (data == "correcto") {
              Swal.fire(
                "Eliminados!",
                "Registros eliminados exitosamente",
                "success"
              ).then((result) => {
                if (result.isConfirmed) {
                  location.href = "clientes.php";
                }
              });
            } else {
              Swal.fire("Error!", "No seleccionó ningun registro", "warning");
            }
          });
      }
    });
  });
}

function EliminacionMultProduct() {
  formulario_product.addEventListener("submit", function (e) {
    e.preventDefault();
    var formulario = document.getElementById("formulario_product");
    var datos = new FormData(formulario);
    Swal.fire({
      title: "¿Estás seguro que deseas eliminar los registros?",
      text: "No podras recuperarlos.",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      confirmButtonText: "Aceptar",
      cancelButtonText: "Cancelar",
      cancelButtonColor: "#d33",
    }).then((result) => {
      if (result.isConfirmed) {
        fetch("eliminarMult.php", {
          method: "POST",
          body: datos,
        })
          .then((res) => res.json())
          .then((data) => {
            console.log(data);
            if (data == "error") {
              Swal.fire("Error!", "Registros no eliminados", "error");
            } else if (data == "correcto") {
              Swal.fire(
                "Eliminados!",
                "Registros eliminados exitosamente",
                "success"
              ).then((result) => {
                if (result.isConfirmed) {
                  location.href = "productos.php";
                }
              });
            } else {
              Swal.fire("Error!", "No seleccionó ningun registro", "warning");
            }
          });
      }
    });
  });
}

function EliminacionMultPedidos() {
  formulario_pedidos.addEventListener("submit", function (e) {
    e.preventDefault();
    var formulario = document.getElementById("formulario_pedidos");
    var datos = new FormData(formulario);
    Swal.fire({
      title: "¿Estás seguro que deseas eliminar los registros?",
      text: "No podras recuperarlos.",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      confirmButtonText: "Aceptar",
      cancelButtonText: "Cancelar",
      cancelButtonColor: "#d33",
    }).then((result) => {
      if (result.isConfirmed) {
        fetch("eliminarMult.php", {
          method: "POST",
          body: datos,
        })
          .then((res) => res.json())
          .then((data) => {
            console.log(data);
            if (data == "error") {
              Swal.fire("Error!", "Registros no eliminados", "error");
            } else if (data == "correcto") {
              Swal.fire(
                "Eliminados!",
                "Registros eliminados exitosamente",
                "success"
              ).then((result) => {
                if (result.isConfirmed) {
                  location.href = "pedidos.php";
                }
              });
            } else {
              Swal.fire("Error!", "No seleccionó ningun registro", "warning");
            }
          });
      }
    });
  });
}

function EliminacionMultEnvios() {
  formulario_envios.addEventListener("submit", function (e) {
    e.preventDefault();
    var formulario = document.getElementById("formulario_envios");
    var datos = new FormData(formulario);
    Swal.fire({
      title: "¿Estás seguro que deseas eliminar los registros?",
      text: "No podras recuperarlos.",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      confirmButtonText: "Aceptar",
      cancelButtonText: "Cancelar",
      cancelButtonColor: "#d33",
    }).then((result) => {
      if (result.isConfirmed) {
        fetch("eliminarMult.php", {
          method: "POST",
          body: datos,
        })
          .then((res) => res.json())
          .then((data) => {
            console.log(data);
            if (data == "error") {
              Swal.fire("Error!", "Registros no eliminados", "error");
            } else if (data == "correcto") {
              Swal.fire(
                "Eliminados!",
                "Registros eliminados exitosamente",
                "success"
              ).then((result) => {
                if (result.isConfirmed) {
                  location.href = "envios.php";
                }
              });
            } else {
              Swal.fire("Error!", "No seleccionó ningun registro", "warning");
            }
          });
      }
    });
  });
}

function EliminacionMultVentas() {
  formulario_ventas.addEventListener("submit", function (e) {
    e.preventDefault();
    var formulario = document.getElementById("formulario_ventas");
    var datos = new FormData(formulario);
    Swal.fire({
      title: "¿Estás seguro que deseas eliminar los registros?",
      text: "No podras recuperarlos.",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      confirmButtonText: "Aceptar",
      cancelButtonText: "Cancelar",
      cancelButtonColor: "#d33",
    }).then((result) => {
      if (result.isConfirmed) {
        fetch("eliminarMult.php", {
          method: "POST",
          body: datos,
        })
          .then((res) => res.json())
          .then((data) => {
            console.log(data);
            if (data == "error") {
              Swal.fire("Error!", "Registros no eliminados", "error");
            } else if (data == "correcto") {
              Swal.fire(
                "Eliminados!",
                "Registros eliminados exitosamente",
                "success"
              ).then((result) => {
                if (result.isConfirmed) {
                  location.href = "ventas.php";
                }
              });
            } else {
              Swal.fire("Error!", "No seleccionó ningun registro", "warning");
            }
          });
      }
    });
  });
}

function EliminacionMultMens() {
  formulario_mens.addEventListener("submit", function (e) {
    e.preventDefault();
    var formulario = document.getElementById("formulario_mens");
    var datos = new FormData(formulario);
    Swal.fire({
      title: "¿Estás seguro que deseas eliminar los registros?",
      text: "No podras recuperarlos.",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      confirmButtonText: "Aceptar",
      cancelButtonText: "Cancelar",
      cancelButtonColor: "#d33",
    }).then((result) => {
      if (result.isConfirmed) {
        fetch("eliminarMult.php", {
          method: "POST",
          body: datos,
        })
          .then((res) => res.json())
          .then((data) => {
            console.log(data);
            if (data == "error") {
              Swal.fire("Error!", "Registros no eliminados", "error");
            } else if (data == "correcto") {
              Swal.fire(
                "Eliminados!",
                "Registros eliminados exitosamente",
                "success"
              ).then((result) => {
                if (result.isConfirmed) {
                  location.href = "mensajes.php";
                }
              });
            } else {
              Swal.fire("Error!", "No seleccionó ningun registro", "warning");
            }
          });
      }
    });
  });
}
