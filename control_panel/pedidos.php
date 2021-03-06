<?php

    session_start();
    error_reporting(0);

    require_once '../vendor/autoload.php';
    $C_pedidos = (new MongoDB\Client('mongodb+srv://javier:javier12345@cluster0.w3wdi.mongodb.net/opss?retryWrites=true&w=majority'))->opss->pedidos; 
    $datos = $C_pedidos->find();

    if(isset($_SESSION['admin'])){

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedidos</title>
    <link rel="shortcut icon" href="../img/favicon1.png">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/estilos_responsivo.css">
    <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="../datatable/Responsive-2.2.5/css/responsive.dataTables.min.css">


</head>

<body>
    
    <?php include "../partes/_navc.php" ?>

    <h1 class="titulo-opc-panel">Pedidos</h1>

    <table id="clientes" class="display table table-striped table-bordered" cellspacing="0" width="90%">
        <thead>
            <th>No.</th>
            <th>Código mercancia</th>
            <th>Nombre(s)</th>
            <th>Apellido(s)</th>
            <th>Teléfono</th>
            <th>Calle</th>
            <th>Número</th>
            <th>Col. o Fracc.</th>
            <th>CP.</th>
            <th>Cantidad</th>
            <th>Total</th>
            <th>Fecha y Hora</th>
            <th>Acciones</th>
        </thead>

    <?php
        foreach ($datos as $dato) {
    ?>
        <tbody>
            <tr>
                <td><?php echo $dato["no"]; ?></td>
                <td><?php echo $dato["codigo_mercancia"]; ?></td>
                <td><?php echo $dato['info_cliente']["nombres"]; ?></td>
                <td><?php echo $dato['info_cliente']["apellidos"]; ?></td>
                <td><?php echo $dato['info_cliente']["telefono"]; ?></td>
                <td><?php echo $dato['info_cliente']["calle"]; ?></td>
                <td><?php echo $dato['info_cliente']["numero"]; ?></td>
                <td><?php echo $dato['info_cliente']["col_fracc"]; ?></td>
                <td><?php echo $dato['info_cliente']["cp"]; ?></td>
                <td><?php echo $dato["cantidad"]; ?></td>
                <td><?php echo $dato["total"]; ?></td>
                <td><?php echo $dato["fecha_hora"]; ?></td>
                <td>
                    <a class="btn-aceptar" href="agregar_pedido.php?id_pedido=<?php echo $dato['_id']?>"><i class="fas fa-check"></i></a>
                    <a class="btn-eliminar" href="eliminar.php?id_pedido=<?php echo $dato['_id']?>" onclick="return ConfirmDelete()"><i class="fas fa-trash"></i></a>
                </td>
            </tr>
        </tbody>
    <?php
        }//foreach
    ?>
    </table>

    <!-- datatables -->
    <script type="text/javascript" src="../datatable/datatables.min.js"></script>
    <script type="text/javascript" src="../datatable/Responsive-2.2.5/js/dataTables.responsive.min.js"></script>

    <!-- botones de datatables -->
    <script type="text/javascript" src="../datatable/Buttons-1.6.2/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="../datatable/JSZIP-2.5.0/jszip.min.js"></script>
    <script type="text/javascript" src="../datatable/pdfmake-0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="../datatable/pdfmake-0.1.36/vsf_fonts.js"></script>
    <script type="text/javascript" src="../datatable/Buttons-1.6.2/js/buttons.html5.min.js"></script>

    <!-- Fontaswome -->
    <script src="https://kit.fontawesome.com/56b0f801ce.js" crossorigin="anonymous"></script>

    <!-- funcionamiento de datatables propias -->
    <script type="text/javascript" src="../js/main.js"></script>
    <!-- funcionamiento de eliminación de registros (propios) -->
    <script type="text/javascript" src="../js/eliminar.js"></script>
</body>

</html>

<?php

    }elseif(isset($_SESSION['estandar'])){

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedidos</title>
    <link rel="shortcut icon" href="../img/favicon1.png">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/estilos_responsivo.css">
    <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="../datatable/Responsive-2.2.5/css/responsive.dataTables.min.css">


</head>

<body>
    
    <?php include "../partes/_navc.php" ?>

    <h1 class="titulo-opc-panel">Pedidos</h1>

    <table id="clientes" class="display table table-striped table-bordered" cellspacing="0" width="90%">
        <thead>
            <th>No.</th>
            <th>Código mercancia</th>
            <th>Nombre(s)</th>
            <th>Apellido(s)</th>
            <th>Teléfono</th>
            <th>Calle</th>
            <th>Número</th>
            <th>Col. o Fracc.</th>
            <th>CP.</th>
            <th>Cantidad</th>
            <th>Total</th>
            <th>Fecha y Hora</th>
        </thead>

    <?php
        foreach ($datos as $dato) {
    ?>
        <tbody>
            <tr>
            <td><?php echo $dato["no"]; ?></td>
                <td><?php echo $dato["codigo_mercancia"]; ?></td>
                <td><?php echo $dato['info_cliente']["nombres"]; ?></td>
                <td><?php echo $dato['info_cliente']["apellidos"]; ?></td>
                <td><?php echo $dato['info_cliente']["telefono"]; ?></td>
                <td><?php echo $dato['info_cliente']["calle"]; ?></td>
                <td><?php echo $dato['info_cliente']["numero"]; ?></td>
                <td><?php echo $dato['info_cliente']["col_fracc"]; ?></td>
                <td><?php echo $dato['info_cliente']["cp"]; ?></td>
                <td><?php echo $dato["cantidad"]; ?></td>
                <td><?php echo $dato["total"]; ?></td>
                <td><?php echo $dato["fecha_hora"]; ?></td>
            </tr>
        </tbody>
    <?php
        }//foreach
    ?>
    </table>

    <!-- datatables -->
    <script type="text/javascript" src="../datatable/datatables.min.js"></script>
    <script type="text/javascript" src="../datatable/Responsive-2.2.5/js/dataTables.responsive.min.js"></script>

    <!-- botones de datatables -->
    <script type="text/javascript" src="../datatable/Buttons-1.6.2/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="../datatable/JSZIP-2.5.0/jszip.min.js"></script>
    <script type="text/javascript" src="../datatable/pdfmake-0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="../datatable/pdfmake-0.1.36/vsf_fonts.js"></script>
    <script type="text/javascript" src="../datatable/Buttons-1.6.2/js/buttons.html5.min.js"></script>

    <!-- Fontaswome -->
    <script src="https://kit.fontawesome.com/56b0f801ce.js" crossorigin="anonymous"></script>

    <!-- funcionamiento de datatables propias -->
    <script type="text/javascript" src="../js/main.js"></script>
</body>

</html>

<?php

    }elseif (isset($_SESSION['usuario'])||!isset($_SESSION['usuario'])) {

        header("Location: ../index.php");
        
    }

?>