<?php

    /* Crear una sesion */
    session_start();

    /* no mostrar errores */
    error_reporting(0);
    
    /* Traer la fecha local (México) */
    date_default_timezone_set('America/Mexico_City');
    setlocale(LC_ALL, '');
    $dia=date('d');
    $mes=strftime('%B');
    $anio=date('Y');
    $fecha=$dia . ' de ' . $mes . ' del ' . $anio;

    /* Traer para poner la conexion */
    require_once '../vendor/autoload.php';

    /* Traer la colección administradores */
    $administradores = (new MongoDB\Client('mongodb+srv://javier:javier12345@cluster0.w3wdi.mongodb.net/opss?retryWrites=true&w=majority'))->opss->administradores; 
    /* Busqueda de administradores */
    $datos = $administradores->find();

    $i=0;

    if(isset($_SESSION['admin'])){/* Si existe la sesión usuario entra */
     
        $correo = $_SESSION['admin']; /* Agregar el correo a la variable "correo" */

        /* Traer la coleccion administradores*/
        $C_administradores = (new MongoDB\Client('mongodb+srv://javier:javier12345@cluster0.w3wdi.mongodb.net/opss?retryWrites=true&w=majority'))->opss->administradores; 
        $admin = $C_administradores->findOne(['correo' => $correo]); /* Buscar la información del administrador donde coincida el correo */

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
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="css/estilos_panel.css" rel="stylesheet">
    <link href="css/estilos_responsivo.css" rel="stylesheet">
    <title>Administradores | Panel de control</title>
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
                    <h1 class="h3 mb-2 text-gray-800">Administradores</h1>

                    <!-- Tabla Administradores -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tabla de administradores</h6>
                        </div>
                        <div class="card-body" class="justify-content-center">
                            <div class="table-responsive">
                                <form id="formulario_admin">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">                            
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
                                    
                                        <tbody>
                                            <?php
                                                foreach ($datos as $dato) {
                                            ?>
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
                                                <td class="text-white">
                                                    <a id="btn_editarAdmin" class="btn btn-success a_panel" data-toggle="modal" data-target="#AdminModalE"><i class="fas fa-pencil-alt"></i></a>
                                                    <a class="btn btn-danger a_panel" onclick="ConfirmarEliminacionAdmin('<?php echo $dato['_id']?>')"><i class="fas fa-trash"></i></a>
                                                    <div class="form-check form-check-inline">
                                                        <input type="checkbox" name="eliminar-multAdmin[]" value="<?php echo $dato['_id']?>">
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php
                                                }//foreach
                                            ?>
                                        </tbody>                                    
                                    </table>
                                    <div class="row mt-5">
                                        <div class="col-12 col-md-6 mb-2 text-center">
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AdminModal">Agregar un nuevo administrador</button>
                                        </div>
                                        <div class="col-12 col-md-6 mb-5 text-center">
                                            <input class="btn btn-danger" type="submit" name="borrar" onclick="EliminacionMultAdmins()" value="Eliminar registros seleccionados">
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
    <!-- Agregar o Admins -->
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
    <title>Administradores | Panel de control</title>
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
                    <h1 class="h3 mb-2 text-gray-800">Administradores</h1>

                    <!-- Tabla Administradores -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tabla de administradores</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">                            
                                    <thead>
                                        <th>No.</th>
                                        <th>Nombre</th>
                                        <th>Primer Apellido</th>
                                        <th>Segundo Apellido</th>
                                        <th>Teléfono</th>
                                        <th>Correo</th>
                                        <th>Tipo de admin</th>
                                    </thead>
                                
                                    <tbody>
                                        <?php
                                            foreach ($datos as $dato) {
                                        ?>
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

    <!-- Modal Agregar admin-->
    <form id="agregar_admin" class="needs-validation" novalidate>
        <div class="modal fade" id="AdminModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title" id="exampleModalLabel">Agregar admin</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="nombre_agregar" class="form-label">Nombre</label>
                            <input class="form-control" pattern="[a-zA-Zá-úÁ-Ú ]+" type="text" name="nombre" required id="nombre_agregar" value="<?php if(isset($nombre_admin)) echo $nombre_admin?>">
                            <div class="valid-feedback">Correcto.</div>
						    <div class="invalid-feedback">Por favor ingresa un nombre.</div>
                        </div>
                        <div class="mb-3">
                            <label for="ape1_agregar" class="form-label">Primer apellido</label>
                            <input class="form-control" pattern="[a-zA-Zá-úÁ-Ú ]+" type="text" name="ape1" required id="ape1_agregar" value="<?php if(isset($ape1_admin)) echo $ape1_admin?>">
                            <div class="valid-feedback">Correcto.</div>
						    <div class="invalid-feedback">Por favor ingresa un apellido.</div>
                        </div>
                        <div class="mb-3">
                            <label for="ape2_agregar" class="form-label">Segundo apellido</label>
                            <input class="form-control" pattern="[a-zA-Zá-úÁ-Ú ]+" type="text" name="ape2" id="ape2_agregar" value="<?php if(isset($ape2_admin)) echo $ape2_admin?>">
                            <small class="form-text text-muted">No es obligatorio.</small>
                            <div class="valid-feedback">Correcto.</div>
						    <div class="invalid-feedback">Por favor ingresa otro apellido.</div>
                        </div>
                        <div class="mb-3">
                            <label for="telefono_agregar" class="form-label">Teléfono</label>
                            <input class="form-control" minlength="10" maxlength="10" title="Solo números" pattern="[0-9]+" type="tel" name="telefono" required id="telefono_agregar" value="<?php if(isset($telefono)) echo $telefono?>">
                            <small class="form-text text-muted">Máximo 10 dígitos.</small>
                            <div class="valid-feedback">Correcto.</div>
						    <div class="invalid-feedback">Por favor ingresa un teléfono.</div>
                        </div>
                        <div class="mb-3">
                            <label for="email_agregar" class="form-label">Email</label>
                            <input class="form-control" type="email" name="correo" required id="email_agregar" value="<?php if(isset($correo_admin)) echo $correo_admin?>">
                            <div class="valid-feedback">Correcto.</div>
						    <div class="invalid-feedback">Por favor ingresa un email.</div>
                        </div>
                        <div class="mb-3">
                            <label for="password_agregar" class="form-label">Contraseña</label>
                            <input class="form-control" type="password" name="contrasena" required id="password_agregar" minlength="8">
                            <small class="form-text text-muted">Minimo 8 carácteres.</small>
                            <div class="valid-feedback">Correcto.</div>
						    <div class="invalid-feedback">Por favor ingresa una contraseña.</div>
                        </div>
                        <div class="mb-3">
                            <label for="tipo_admin_agregar" class="form-label">Tipo de admin</label>
                            <select name="tipo_admin" required id="tipo_admin_agregar" class="custom-select mb-3">
                                <option value="1" selected>root</option>
                                <option value="2">estandar</option>
                            </select>
                            <div class="valid-feedback">Correcto.</div>
						    <div class="invalid-feedback">Por favor ingresa un tipo de usuario.</div>
                        </div>                                                                
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" onclick="agregarAdmin()">Agregar administrador</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- Modal Editar admin-->
    <form id="editar_admin" class="needs-validation" novalidate>
        <div class="modal fade" id="AdminModalE" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header bg-success text-white">
                        <h5 class="modal-title" id="exampleModalLabel">Editar admin</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="nombre_editar" class="form-label">Nombre</label>
                            <input class="form-control" pattern="[a-zA-Zá-úÁ-Ú ]+" type="text" name="nombre" required id="nombre_editar" value="<?php if(isset($nombre_admin)) echo $nombre_admin?>">
                            <div class="valid-feedback">Correcto.</div>
						    <div class="invalid-feedback">Por favor ingresa un nombre.</div>
                        </div>
                        <div class="mb-3">
                            <label for="ape1_editar" class="form-label">Primer apellido</label>
                            <input class="form-control" pattern="[a-zA-Zá-úÁ-Ú ]+" type="text" name="ape1" required id="ape1_editar" value="<?php if(isset($ape1_admin)) echo $ape1_admin?>">
                            <div class="valid-feedback">Correcto.</div>
						    <div class="invalid-feedback">Por favor ingresa un apellido.</div>
                        </div>
                        <div class="mb-3">
                            <label for="ape2_editar" class="form-label">Segundo apellido</label>
                            <input class="form-control" pattern="[a-zA-Zá-úÁ-Ú ]+" type="text" name="ape2" id="ape2_editar" value="<?php if(isset($ape2_admin)) echo $ape2_admin?>">
                            <small class="form-text text-muted">No es obligatorio.</small>
                            <div class="valid-feedback">Correcto.</div>
						    <div class="invalid-feedback">Por favor ingresa otro apellido.</div>
                        </div>
                        <div class="mb-3">
                            <label for="telefono_editar" class="form-label">Teléfono</label>
                            <input class="form-control" minlength="10" maxlength="10" title="Solo números" pattern="[0-9]+" type="tel" name="telefono" required id="telefono_editar" value="<?php if(isset($telefono)) echo $telefono?>">
                            <small class="form-text text-muted">Máximo 10 carácteres.</small>
                            <div class="valid-feedback">Correcto.</div>
						    <div class="invalid-feedback">Por favor ingresa un teléfono.</div>
                        </div>
                        <div class="mb-3">
                            <label for="email_editar" class="form-label">Email</label>
                            <input class="form-control" type="email" name="correo" required id="email_editar" value="<?php if(isset($correo_admin)) echo $correo_admin?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="tipo_admin_editar" class="form-label">Tipo de admin</label>
                            <select name="tipo_admin" required id="tipo_admin_editar" class="custom-select">
                                <option value="1" selected>root</option>
                                <option value="2">estandar</option>
                            </select>
                            <div class="valid-feedback">Correcto.</div>
						    <div class="invalid-feedback">Por favor ingresa un tipo de usuario.</div>
                        </div>                                                                
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success" onclick="editarAdmin()">Editar administrador</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- Validación de los formularios -->
	<script src="../js/validacion_formulario.js"></script>