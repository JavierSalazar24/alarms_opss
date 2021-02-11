<?php

    session_start();

    require_once '../vendor/autoload.php';
    $C_mensajes = (new MongoDB\Client('mongodb+srv://javier:javier12345@cluster0.w3wdi.mongodb.net/opss?retryWrites=true&w=majority'))->opss->mensajes; 
    $datos = $C_mensajes->find();

    $i=0;

    if(isset($_SESSION['admin'])){

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mensajes</title>
    <link rel="shortcut icon" href="../img/favicon.jpg">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/estilos_responsivo.css">
    <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="../datatable/Responsive-2.2.5/css/responsive.dataTables.min.css">


</head>

<body>
    
    <?php include "../partes/_navc.php" ?>

    <h1 class="titulo-opc-panel">Mensajes</h1>

    <table id="clientes" class="display table table-striped table-bordered" cellspacing="0" width="90%">
        <thead>
            <th>No.</th>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Mensaje</th>
            <th>Acciones</th>
        </thead>
    
    <?php
        foreach ($datos as $dato) {
    ?>
        <tbody>
            <tr>
                <td><?php echo $i=$i+1 ?></td>
                <td><?php echo $dato["nombre"]; ?></td>
                <td><?php echo $dato["email"]; ?></td>
                <td><?php echo $dato["mensaje"]; ?></td>
                <td>
                    <a class="btn-eliminar" href="eliminar.php?id_mensaje=<?php echo $dato['_id']?>" onclick="return ConfirmDelete()"><i class="fas fa-trash"></i></a>
                </td>
            </tr>
        </tbody>

    <?php
        }//foreach
    ?>
    </table>

    <!-- JavaScript -->
    <script type="text/javascript" src="../js/eliminar.php"></script>

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

    }elseif(isset($_SESSION['estandar'])){

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mensajes</title>
    <link rel="shortcut icon" href="../img/favicon.jpg">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/estilos_responsivo.css">
    <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="../datatable/Responsive-2.2.5/css/responsive.dataTables.min.css">


</head>

<body>
    
    <?php include "../partes/_navc.php" ?>

    <h1 class="titulo-opc-panel">Mensajes</h1>

    <table id="clientes" class="display table table-striped table-bordered" cellspacing="0" width="90%">
        <thead>
            <th>No.</th>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Mensaje</th>
        </thead>
    
    <?php
        foreach ($datos as $dato) {
    ?>
        <tbody>
            <tr>
                <td><?php echo $i=$i+1 ?></td>
                <td><?php echo $dato["nombre"]; ?></td>
                <td><?php echo $dato["email"]; ?></td>
                <td><?php echo $dato["mensaje"]; ?></td>
            </tr>
        </tbody>

    <?php
        }//foreach
    ?>
    </table>

    <!-- JavaScript -->
    <script type="text/javascript" src="../js/eliminar.php"></script>

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