<?php

    session_start();
    error_reporting(0);

    date_default_timezone_set('America/Mexico_City');
    setlocale(LC_ALL, '');
    $dia=date('d');
    $mes=strftime('%B');
    $anio=date('Y');
    $fecha=$dia . ' de ' . $mes . ' del ' . $anio;

    require_once '../vendor/autoload.php';
    $C_envios = (new MongoDB\Client('mongodb+srv://javier:javier12345@cluster0.w3wdi.mongodb.net/opss?retryWrites=true&w=majority'))->opss->envios; 
    $datos = $C_envios->find();

    if(isset($_SESSION['admin'])){

        $correo = $_SESSION['admin'];

        $C_administradores = (new MongoDB\Client('mongodb+srv://javier:javier12345@cluster0.w3wdi.mongodb.net/opss?retryWrites=true&w=majority'))->opss->administradores; 
        $admin = $C_administradores->findOne(['correo' => $correo]);

        if ($correo == "root@gmail.com") {
            $nombre = "usuario";
            $ape1 = $admin['nombres']['nombre'];
        }else{
            $nombre = $admin['nombres']['nombre'];
            $ape1 = $admin['nombres']['ape1'];
        }

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="../img/favicon1.png">
    <!-- Estilos -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="css/estilos_panel.css" rel="stylesheet">
    <link href="css/estilos_responsivo.css" rel="stylesheet">
    <title>Envíos | Panel de control</title>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Barra lateral -->
        <?php include_once "views/navBar_lateral.php"?>
        <!-- Fin Barra lateral -->

        <!-- Contenido completo -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Barra sueperior -->
            <?php include_once "views/navBar_superior.php"?>
            <!-- Fin de Barra sueperior -->
            
            <!-- Contenido central -->
            <div id="content">
                <div class="container-fluid">

                    <!-- Titulo -->
                    <h1 class="h3 mb-2 text-gray-800">Envíos</h1>

                    <!-- Tabla Administradores -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tabla de envíos</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <form id="formulario_envios">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">                            
                                        <thead>
                                            <th>No.</th>
                                            <th>No. Pedido</th>
                                            <th>Nombre(s)</th>
                                            <th>Apellido(s)</th>
                                            <th>Calle</th>
                                            <th>Número</th>
                                            <th>Col. o Fracc.</th>
                                            <th>C. P.</th>
                                            <th>Total compra</th>
                                            <th>Fecha y Hora</th>
                                            <th>Acciones</th>
                                        </thead>

                                        <tbody>
                                            <?php
                                                foreach ($datos as $dato) {
                                            ?>
                                            <tr>
                                                <td><?php echo $dato["no"]; ?></td>
                                                <td><?php echo $dato["no_pedido"]; ?></td>
                                                <td><?php echo $dato['info_cliente']["nombres"]; ?></td>
                                                <td><?php echo $dato['info_cliente']["apellidos"]; ?></td>
                                                <td><?php echo $dato['info_cliente']["calle"]; ?></td>
                                                <td><?php echo $dato['info_cliente']["numero"]; ?></td>
                                                <td><?php echo $dato['info_cliente']["col_fracc"]; ?></td>
                                                <td><?php echo $dato['info_cliente']["cp"]; ?></td>
                                                <td><?php echo $dato["total"]; ?></td>
                                                <td><?php echo $dato["fecha_hora"]; ?></td>
                                                <td>
                                                    <a class="btn btn-success a_panel" onclick="enviarEnvio('<?php echo $dato['_id']?>')"><i class="fas fa-check"></i></a>
                                                    <a class="btn btn-danger a_panel" onclick="ConfirmarEliminacionEnvios('<?php echo $dato['_id']?>')"><i class="fas fa-trash"></i></a>
                                                    <div class="form-check form-check-inline">
                                                        <input type="checkbox" name="eliminar-multEnvios[]" value="<?php echo $dato['_id']?>">
                                                    </div>
                                                </td>
                                            </tr>

                                            <?php
                                                }//foreach
                                            ?>
                                        </tbody>                                    
                                    </table>
                                    <div class="row mt-5">                                        
                                        <div class="col-12 mb-5 text-center">
                                            <input class="btn btn-danger" type="submit" name="borrar" onclick="EliminacionMultEnvios()" value="Eliminar registros seleccionados">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Fin Contenido central -->

            <!-- Footer -->
                <?php include_once "views/footer.php" ?>
            <!-- Fin de Footer -->
        </div>

    </div>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- SweetAlert CDN -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- funcionamiento de datatables -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/searchbuilder/1.0.1/js/dataTables.searchBuilder.min.js"></script>
    <script src="https://cdn.datatables.net/searchpanes/1.2.1/js/dataTables.searchPanes.min.js"></script>
    <script type="text/javascript" src="js/datatable.js"></script>
    <!-- botones de datatables -->
    <script type="text/javascript" src="../datatable/Buttons-1.6.2/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="../datatable/JSZIP-2.5.0/jszip.min.js"></script>
    <script type="text/javascript" src="../datatable/pdfmake-0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="../datatable/pdfmake-0.1.36/vsf_fonts.js"></script>
    <script type="text/javascript" src="../datatable/Buttons-1.6.2/js/buttons.html5.min.js"></script>
    <!-- funcionamiento de eliminación de registros (propios) -->
    <script type="text/javascript" src="js/eliminacionMult.js"></script>
    <script type="text/javascript" src="js/eliminar.js"></script>
    <!-- Agregar-->
    <script type="text/javascript" src="js/agregar_editar.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <!-- LINK ACTIVE -->
    <script src="js/active.js"></script>

</body>

</html>

<?php

    }elseif(isset($_SESSION['estandar'])){

        $correo = $_SESSION['estandar'];

        $C_administradores = (new MongoDB\Client('mongodb+srv://javier:javier12345@cluster0.w3wdi.mongodb.net/opss?retryWrites=true&w=majority'))->opss->administradores; 
        $admin = $C_administradores->findOne(['correo' => $correo]);

        if ($correo == "estandar@gmail.com") {
            $nombre = "usuario";
            $ape1 = $admin['nombres']['nombre'];
        }else{
            $nombre = $admin['nombres']['nombre'];
            $ape1 = $admin['nombres']['ape1'];
        }


?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="../img/favicon1.png">
    <!-- Estilos -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilos_panel.css">
    <link href="css/estilos_responsivo.css" rel="stylesheet">
    <title>Envíos | Panel de control</title>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Barra lateral -->
        <?php include_once "views/navBar_lateral.php"?>
        <!-- Fin Barra lateral -->

        <!-- Contenido completo -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Barra sueperior -->
            <?php include_once "views/navBar_superior.php"?>
            <!-- Fin de Barra sueperior -->
            
            <!-- Contenido central -->
            <div id="content">
                <div class="container-fluid">

                    <!-- Titulo -->
                    <h1 class="h3 mb-2 text-gray-800">Envíos</h1>

                    <!-- Tabla Administradores -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tabla de envíos</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">                            
                                    <thead>
                                        <th>No.</th>
                                        <th>No. Pedido</th>
                                        <th>Nombre(s)</th>
                                        <th>Apellido(s)</th>
                                        <th>Calle</th>
                                        <th>Número</th>
                                        <th>Col. o Fracc.</th>
                                        <th>C. P.</th>
                                        <th>Total compra</th>
                                        <th>Fecha y Hora</th>
                                    </thead>

                                    <tbody>
                                        <?php
                                            foreach ($datos as $dato) {
                                        ?>
                                        <tr>
                                            <td><?php echo $dato["no"]; ?></td>
                                            <td><?php echo $dato["no_pedido"]; ?></td>
                                            <td><?php echo $dato['info_cliente']["nombres"]; ?></td>
                                            <td><?php echo $dato['info_cliente']["apellidos"]; ?></td>
                                            <td><?php echo $dato['info_cliente']["calle"]; ?></td>
                                            <td><?php echo $dato['info_cliente']["numero"]; ?></td>
                                            <td><?php echo $dato['info_cliente']["col_fracc"]; ?></td>
                                            <td><?php echo $dato['info_cliente']["cp"]; ?></td>
                                            <td><?php echo $dato["total"]; ?></td>
                                            <td><?php echo $dato["fecha_hora"]; ?></td>
                                        </tr>
                                        <?php
                                            }//foreach
                                        ?>
                                    </tbody>                                    
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Fin Contenido central -->

            <!-- Footer -->
                <?php include_once "views/footer.php" ?>
            <!-- Fin de Footer -->
        </div>

    </div>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- funcionamiento de datatables -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/searchbuilder/1.0.1/js/dataTables.searchBuilder.min.js"></script>
    <script src="https://cdn.datatables.net/searchpanes/1.2.1/js/dataTables.searchPanes.min.js"></script>
    <script type="text/javascript" src="js/datatable.js"></script>
    <!-- botones de datatables -->
    <script type="text/javascript" src="../datatable/Buttons-1.6.2/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="../datatable/JSZIP-2.5.0/jszip.min.js"></script>
    <script type="text/javascript" src="../datatable/pdfmake-0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="../datatable/pdfmake-0.1.36/vsf_fonts.js"></script>
    <script type="text/javascript" src="../datatable/Buttons-1.6.2/js/buttons.html5.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <!-- LINK ACTIVE -->
    <script src="js/active.js"></script>

</body>

</html>

<?php

    }elseif (isset($_SESSION['usuario'])||!isset($_SESSION['usuario'])) {

        header("Location: ../index.php");
        
    }

?>