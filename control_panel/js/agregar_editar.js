function agregarProducto() {
  var agregar_producto = document.getElementById("agregar_producto");
  agregar_producto.addEventListener("submit", function (e) {
    e.preventDefault();
    var datos = new FormData(agregar_producto);
    fetch("agregar_producto.php", {
      method: "POST",
      body: datos,
    })
      .then((res) => res.json())
      .then((data) => {
        if (data == "correcto") {
          Swal.fire({
            position: "center",
            icon: "success",
            title: "Producto agregado.",
            showConfirmButton: false,
            timer: 1500,
          });
          setTimeout(cargaAlertaIniciarSesion, 500);
          function cargaAlertaIniciarSesion() {
            location.href = "productos.php";
          }
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
  });
}

function agregarAdmin() {
  var agregar_admin = document.getElementById("agregar_admin");
  agregar_admin.addEventListener("submit", function (e) {
    e.preventDefault();
    var datos = new FormData(agregar_admin);
    fetch("agregar_admins.php", {
      method: "POST",
      body: datos,
    })
      .then((res) => res.json())
      .then((data) => {
        if (data == "correcto") {
          Swal.fire({
            position: "center",
            icon: "success",
            title: "Admin agregado.",
            showConfirmButton: false,
            timer: 1500,
          });
          setTimeout(cargaAlertaIniciarSesion, 500);
          function cargaAlertaIniciarSesion() {
            location.href = "administradores.php";
          }
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
  });
}

function enviarPedido(id) {
  Swal.fire({
    title: "¿Estás seguro que deseas pasar el pedido a enviados?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    confirmButtonText: "Aceptar",
    cancelButtonText: "Cancelar",
    cancelButtonColor: "#d33",
  }).then((result) => {
    if (result.isConfirmed) {
      location.href = `agregar_pedido.php?id_pedido=${id}`;
      Swal.fire({
        position: "center",
        icon: "success",
        title: "Pedido enviado",
        showConfirmButton: false,
        timer: 3000,
      });
    }
  });
}

function enviarEnvio(id) {
  Swal.fire({
    title: "¿Estás seguro que deseas pasar el envío a ventas?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    confirmButtonText: "Aceptar",
    cancelButtonText: "Cancelar",
    cancelButtonColor: "#d33",
  }).then((result) => {
    if (result.isConfirmed) {
      location.href = `agregar_envio.php?id_envio=${id}`;
      Swal.fire({
        position: "center",
        icon: "success",
        title: "Venta realizada",
        showConfirmButton: false,
        timer: 3000,
      });
    }
  });
}

function agregarNota() {
  var agregar_nota = document.getElementById("agregar_nota");
  agregar_nota.addEventListener("submit", function (e) {
    e.preventDefault();
    var datos = new FormData(agregar_nota);
    fetch("agregar_nota.php", {
      method: "POST",
      body: datos,
    })
      .then((res) => res.json())
      .then((data) => {
        if (data == "correcto") {
          Swal.fire({
            position: "center",
            icon: "success",
            title: "Nota agregada.",
            showConfirmButton: false,
            timer: 1500,
          });
          setTimeout(cargaAlertaIniciarSesion, 500);
          function cargaAlertaIniciarSesion() {
            location.href = "notas.php";
          }
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
  });
}

function editarEstatusNota(id) {
  Swal.fire({
    text: "¿Estás seguro que deseas editar el estatus de la nota?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    confirmButtonText: "Aceptar",
    cancelButtonText: "Cancelar",
    cancelButtonColor: "#d33",
  }).then((result) => {
    if (result.isConfirmed) {
      Swal.fire({
        title: "Editada!",
        text: "estatus editado",
        icon: "success",
        showConfirmButton: false,
      });
      setTimeout(ReedireccionProductos, 800);
      function ReedireccionProductos() {
        location.href = `editar_notas.php?id_notaEstatus=${id}`;
      }
    }
  });
}

function editarNota() {
  Swal.fire({
    position: "center",
    icon: "success",
    title: "Nota editada.",
    showConfirmButton: false,
    timer: 3000,
  });
}

function agregarNotaI() {
  var agregar_notaI = document.getElementById("agregar_notaI");
  agregar_notaI.addEventListener("submit", function (e) {
    e.preventDefault();
    var datos = new FormData(agregar_notaI);
    fetch("agregar_nota.php", {
      method: "POST",
      body: datos,
    })
      .then((res) => res.json())
      .then((data) => {
        if (data == "correcto") {
          Swal.fire({
            position: "center",
            icon: "success",
            title: "Nota agregada.",
            showConfirmButton: false,
            timer: 1500,
          });
          setTimeout(cargaAlertaIniciarSesion, 500);
          function cargaAlertaIniciarSesion() {
            location.href = "index.php";
          }
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
  });
}

function editarEstatusNotaI(id) {
  Swal.fire({
    text: "¿Estás seguro que deseas editar el estatus de la nota?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    confirmButtonText: "Aceptar",
    cancelButtonText: "Cancelar",
    cancelButtonColor: "#d33",
  }).then((result) => {
    if (result.isConfirmed) {
      Swal.fire({
        title: "Editada!",
        text: "estatus editado",
        icon: "success",
        showConfirmButton: false,
      });
      setTimeout(ReedireccionProductos, 800);
      function ReedireccionProductos() {
        location.href = `editar_notas.php?id_notaEstatusI=${id}`;
      }
    }
  });
}

$(document).on("click", "#btn_editarAdmin", function () {
  let fila;
  fila = $(this).closest("tr");
  nombre = fila.find("td:eq(1)").text();
  ape1 = fila.find("td:eq(2)").text();
  ape2 = fila.find("td:eq(3)").text();
  telefono = fila.find("td:eq(4)").text();
  email = fila.find("td:eq(5)").text();
  tipo_admin = fila.find("td:eq(6)").text();

  $("#nombre_editar").val(nombre);
  $("#ape1_editar").val(ape1);
  $("#ape2_editar").val(ape2);
  $("#telefono_editar").val(telefono);
  $("#email_editar").val(email);
  $("#tipo_admin_editar").val(tipo_admin);
});

function editarAdmin() {
  var editar_admin = document.getElementById("editar_admin");
  editar_admin.addEventListener("submit", function (e) {
    e.preventDefault();
    var datos = new FormData(editar_admin);
    fetch("editar_admin.php", {
      method: "POST",
      body: datos,
    })
      .then((res) => res.json())
      .then((data) => {
        if (data == "correcto") {
          Swal.fire({
            position: "center",
            icon: "success",
            title: "Admin editado.",
            showConfirmButton: false,
            timer: 1500,
          });
          setTimeout(cargaAlertaIniciarSesion, 500);
          function cargaAlertaIniciarSesion() {
            location.href = "administradores.php";
          }
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
  });
}

$(document).on("click", "#btn_editarProductos", function () {
  let fila;
  fila = $(this).closest("tr");
  id = fila.find("td:eq(0)").text();
  nombre = fila.find("td:eq(1)").text();
  precio = fila.find("td:eq(2)").text();
  cantidad = fila.find("td:eq(3)").text();
  img = fila.find("td:eq(4)").text();

  $("#id_editar").val(id);
  $("#nombre_editar").val(nombre);
  $("#precio_editar").val(precio);
  $("#cantidad_editar").val(cantidad);
  $("#archivo_editar").val(img);
});

function editarProducto() {
  var editar_producto = document.getElementById("editar_producto");
  editar_producto.addEventListener("submit", function (e) {
    e.preventDefault();
    var datos = new FormData(editar_producto);
    fetch("editar_productos.php", {
      method: "POST",
      body: datos,
    })
      .then((res) => res.json())
      .then((data) => {
        if (data == "correcto") {
          Swal.fire({
            position: "center",
            icon: "success",
            title: "Producto editado.",
            showConfirmButton: false,
            timer: 1500,
          });
          setTimeout(cargaAlertaIniciarSesion, 500);
          function cargaAlertaIniciarSesion() {
            location.href = "productos.php";
          }
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
  });
}
