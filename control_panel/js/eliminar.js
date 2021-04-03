function ConfirmarEliminacionAdmin(id) {
  Swal.fire({
    title: "¿Estás seguro que deseas eliminar el registro?",
    text: "No podras recuperarlo.",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    confirmButtonText: "Aceptar",
    cancelButtonText: "Cancelar",
    cancelButtonColor: "#d33",
  }).then((result) => {
    if (result.isConfirmed) {
      Swal.fire({
        title: "Eliminado!",
        text: "Registro eliminado",
        icon: "success",
        showConfirmButton: false,
      });
      setTimeout(ReedireccionProductos, 800);
      function ReedireccionProductos() {
        location.href = `eliminar.php?id_admin=${id}`;
      }
    }
  });
}

function ConfirmarEliminacionClient(id) {
  Swal.fire({
    title: "¿Estás seguro que deseas eliminar el registro?",
    text: "No podras recuperarlo.",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    confirmButtonText: "Aceptar",
    cancelButtonText: "Cancelar",
    cancelButtonColor: "#d33",
  }).then((result) => {
    if (result.isConfirmed) {
      Swal.fire({
        title: "Eliminado!",
        text: "Registro eliminado",
        icon: "success",
        showConfirmButton: false,
      });
      setTimeout(ReedireccionProductos, 800);
      function ReedireccionProductos() {
        location.href = `eliminar.php?id_cliente=${id}`;
      }
    }
  });
}

function ConfirmarEliminacionProduct(id) {
  Swal.fire({
    title: "¿Estás seguro que deseas eliminar el registro?",
    text: "No podras recuperarlo.",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    confirmButtonText: "Aceptar",
    cancelButtonText: "Cancelar",
    cancelButtonColor: "#d33",
  }).then((result) => {
    if (result.isConfirmed) {
      Swal.fire({
        title: "Eliminado!",
        text: "Registro eliminado",
        icon: "success",
        showConfirmButton: false,
      });
      setTimeout(ReedireccionProductos, 800);
      function ReedireccionProductos() {
        location.href = `eliminar.php?id_producto=${id}`;
      }
    }
  });
}

function ConfirmarEliminacionPedidos(id) {
  Swal.fire({
    title: "¿Estás seguro que deseas eliminar el registro?",
    text: "No podras recuperarlo.",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    confirmButtonText: "Aceptar",
    cancelButtonText: "Cancelar",
    cancelButtonColor: "#d33",
  }).then((result) => {
    if (result.isConfirmed) {
      Swal.fire({
        title: "Eliminado!",
        text: "Registro eliminado",
        icon: "success",
        showConfirmButton: false,
      });
      setTimeout(ReedireccionProductos, 800);
      function ReedireccionProductos() {
        location.href = `eliminar.php?id_pedido=${id}`;
      }
    }
  });
}

function ConfirmarEliminacionEnvios(id) {
  Swal.fire({
    title: "¿Estás seguro que deseas eliminar el registro?",
    text: "No podras recuperarlo.",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    confirmButtonText: "Aceptar",
    cancelButtonText: "Cancelar",
    cancelButtonColor: "#d33",
  }).then((result) => {
    if (result.isConfirmed) {
      Swal.fire({
        title: "Eliminado!",
        text: "Registro eliminado",
        icon: "success",
        showConfirmButton: false,
      });
      setTimeout(ReedireccionProductos, 800);
      function ReedireccionProductos() {
        location.href = `eliminar.php?id_envio=${id}`;
      }
    }
  });
}

function ConfirmarEliminacionMens(id) {
  Swal.fire({
    title: "¿Estás seguro que deseas eliminar el registro?",
    text: "No podras recuperarlo.",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    confirmButtonText: "Aceptar",
    cancelButtonText: "Cancelar",
    cancelButtonColor: "#d33",
  }).then((result) => {
    if (result.isConfirmed) {
      Swal.fire({
        title: "Eliminado!",
        text: "Registro eliminado",
        icon: "success",
        showConfirmButton: false,
      });
      setTimeout(ReedireccionProductos, 800);
      function ReedireccionProductos() {
        location.href = `eliminar.php?id_mensaje=${id}`;
      }
    }
  });
}

function ConfirmarEliminacionVenta(id) {
  Swal.fire({
    title: "¿Estás seguro que deseas eliminar la venta?",
    text: "No podras recuperarlo.",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    confirmButtonText: "Aceptar",
    cancelButtonText: "Cancelar",
    cancelButtonColor: "#d33",
  }).then((result) => {
    if (result.isConfirmed) {
      Swal.fire({
        title: "Eliminado!",
        text: "Registro eliminado",
        icon: "success",
        showConfirmButton: false,
      });
      setTimeout(ReedireccionProductos, 800);
      function ReedireccionProductos() {
        location.href = `eliminar.php?id_venta=${id}`;
      }
    }
  });
}

function ConfirmarEliminacionNota(id) {
  Swal.fire({
    title: "¿Estás seguro que deseas eliminar la nota?",
    text: "No podras recuperarla.",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    confirmButtonText: "Aceptar",
    cancelButtonText: "Cancelar",
    cancelButtonColor: "#d33",
  }).then((result) => {
    if (result.isConfirmed) {
      Swal.fire({
        title: "Eliminada!",
        text: "Nota eliminada",
        icon: "success",
        showConfirmButton: false,
      });
      setTimeout(ReedireccionProductos, 800);
      function ReedireccionProductos() {
        location.href = `eliminar.php?id_nota=${id}`;
      }
    }
  });
}

function ConfirmarEliminacionNotaI(id) {
  Swal.fire({
    title: "¿Estás seguro que deseas eliminar la nota?",
    text: "No podras recuperarla.",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    confirmButtonText: "Aceptar",
    cancelButtonText: "Cancelar",
    cancelButtonColor: "#d33",
  }).then((result) => {
    if (result.isConfirmed) {
      Swal.fire({
        title: "Eliminada!",
        text: "Nota eliminada",
        icon: "success",
        showConfirmButton: false,
      });
      setTimeout(ReedireccionProductos, 800);
      function ReedireccionProductos() {
        location.href = `eliminar.php?id_notaI=${id}`;
      }
    }
  });
}
