<?php

    session_start();
    error_reporting(0);
    
    require_once '../vendor/autoload.php';
    $administradores = (new MongoDB\Client('mongodb+srv://javier:javier12345@cluster0.w3wdi.mongodb.net/opss?retryWrites=true&w=majority'))->opss->administradores; 
    $datos = $administradores->find();

    $i=0;
    
    if(isset($_SESSION['admin'])){
     

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administradores</title>
    <link rel="shortcut icon" href="../img/favicon1.png">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/estilos_responsivo.css">
    <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="../datatable/Responsive-2.2.5/css/responsive.dataTables.min.css">


</head>

<body>
    
    <?php include "../partes/_navc.php" ?>

    <h1 class="titulo-opc-panel">Administradores</h1>

    <table id="clientes" class="display table table-striped table-bordered" cellspacing="0" width="90%">
        <thead>
            <th>No.</th>
            <th>Nombre</th>
            <th>Primer Apellido</th>
            <th>Segundo Apellido</th>
            <th>Teléfono</th>
            <th>Correo</th>
            <th>Tipo de admin</th>
            <th>Acciones</th>
        </thead>
    
    <?php
        foreach ($datos as $dato) {
    ?>
        <tbody>
            <tr>
                <td><?php echo $i=$i+1 ?></td>
                <td><?php echo $dato['nombres']["nombre"]; ?></td>
                <td><?php if ($dato['nombres']["ape1"]) {
                    echo $dato['nombres']["ape1"];
                }else{
                    echo "-";
                } ?></td>
                <td><?php if ($dato['nombres']["ape2"]) {
                    echo $dato['nombres']["ape2"];
                }else{
                    echo "-";
                } ?></td>
                <td><?php if ($dato["telefono"]) {
                    echo $dato["telefono"];
                }else{
                    echo "-";
                } ?></td>
                <td><?php echo $dato["correo"]; ?></td>
                <td><?php echo $dato["tipo_admin"]; ?></td>
                <td>
                    <a class="btn-editar" href="editar_admin.php?id_admin=<?php echo $dato['_id']?>"><i class="fas fa-pencil-alt"></i></a>
                    <a class="btn-eliminar" href="eliminar.php?id_admin=<?php echo $dato['_id']?>" onclick="return ConfirmDelete()"><i class="fas fa-trash"></i></a>
                </td>
            </tr>
        </tbody>

    <?php
        }//foreach
    ?>
    </table>

    <div class="div-btn-agregar">
        <a class="btn-agregar-admin" href="agregar_admins.php">Agregar un nuevo administrador</a>
    </div>

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
    <title>Administradores</title>
    <link rel="shortcut icon" href="../img/favicon1.png">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/estilos_responsivo.css">
    <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="../datatable/Responsive-2.2.5/css/responsive.dataTables.min.css">


</head>

<body>
    
    <?php include "../partes/_navc.php" ?>

    <h1 class="titulo-opc-panel">Administradores</h1>

    <table id="clientes" class="display table table-striped table-bordered" cellspacing="0" width="90%">
        <thead>
            <th>No.</th>
            <th>Nombre</th>
            <th>Primer Apellido</th>
            <th>Segundo Apellido</th>
            <th>Teléfono</th>
            <th>Correo</th>
        </thead>
    
    <?php
        foreach ($datos as $dato) {
    ?>
        <tbody>
            <tr>
            <td><?php echo $i=$i+1 ?></td>
                <td><?php echo $dato['nombres']["nombre"]; ?></td>
                <td><?php if ($dato['nombres']["ape1"]) {
                    echo $dato['nombres']["ape1"];
                }else{
                    echo "-";
                } ?></td>
                <td><?php if ($dato['nombres']["ape2"]) {
                    echo $dato['nombres']["ape2"];
                }else{
                    echo "-";
                } ?></td>
                <td><?php if ($dato["telefono"]) {
                    echo $dato["telefono"];
                }else{
                    echo "-";
                } ?></td>
                <td><?php echo $dato["correo"]; ?></td>
                <td><?php echo $dato["tipo_admin"]; ?></td>
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