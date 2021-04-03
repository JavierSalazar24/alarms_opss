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
    $C_productos = (new MongoDB\Client('mongodb+srv://javier:javier12345@cluster0.w3wdi.mongodb.net/opss?retryWrites=true&w=majority'))->opss->productos; 
    $datos = $C_productos->find();

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
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="css/estilos_panel.css" rel="stylesheet">
    <link href="css/estilos_responsivo.css" rel="stylesheet">
    <title>Productos | Panel de control</title>
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
                    <h1 class="h3 mb-2 text-gray-800">Productos</h1>

                    <!-- Tabla Administradores -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tabla de productos</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <form id="formulario_product">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">                            
                                        <thead>
                                            <th>Codigo</th>
                                            <th>Nombre</th>
                                            <th>Precio</th>
                                            <th>Cantidad</th>
                                            <th>Imagen</th>
                                            <th>Acciones</th>
                                        </thead>
                                    
                                        <tbody>
                                            <?php
                                                foreach ($datos as $dato) {
                                            ?>
                                            <tr>
                                                <td><?php echo $dato["_id"]; ?></td>
                                                <td><?php echo $dato["nombre"]; ?></td>
                                                <td><?php echo $dato["precio"]; ?></td>
                                                <td><?php echo $dato["cantidad"]; ?></td>
                                                <td><img height="60rem" src="<?php echo $dato['imagen']?>"></td>
                                                <td class="text-white">
                                                <a id="btn_editarProductos" class="btn btn-success a_panel" data-toggle="modal" data-target="#ProductosModalE"><i class="fas fa-pencil-alt"></i></a>
                                                    <a class="btn btn-danger a_panel" onclick="ConfirmarEliminacionProduct('<?php echo $dato['_id']?>')"><i class="fas fa-trash"></i></a>
                                                    <div class="form-check form-check-inline">
                                                        <input type="checkbox" name="eliminar-multProduct[]" value="<?php echo $dato['_id']?>">
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
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ProductosModal">Agregar un nuevo producto</button>
                                        </div>
                                        <div class="col-12 col-md-6 mb-5 text-center">
                                            <input class="btn btn-danger" type="submit" name="borrar" onclick="EliminacionMultProduct()" value="Eliminar registros seleccionados">
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

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
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
    <!-- SweetAlert CDN -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <!-- funcionamiento de eliminación de registros (propios) -->
    <script type="text/javascript" src="js/eliminacionMult.js"></script>
    <script type="text/javascript" src="js/eliminar.js"></script>
    <!-- Agregar Productos -->
    <script type="text/javascript" src="js/agregar_editar.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

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
    <title>Productos | Panel de control</title>
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
                    <h1 class="h3 mb-2 text-gray-800">Productos</h1>

                    <!-- Tabla Administradores -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tabla de productos</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">                            
                                    <thead>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Precio</th>
                                        <th>Cantidad</th>
                                        <th>Imagen</th>
                                    </thead>
                                
                                    <tbody>
                                        <?php
                                            foreach ($datos as $dato) {
                                        ?>

                                        <tr>
                                            <td><?php echo $dato["_id"]; ?></td>
                                            <td><?php echo $dato["nombre"]; ?></td>
                                            <td><?php echo $dato["precio"]; ?></td>
                                            <td><?php echo $dato["cantidad"]; ?></td>
                                            <td><img height="60rem" src="<?php echo $dato['img']?>"></td>
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
    <script src="https://cdn.datatables.net/scroller/2.0.3/js/dataTables.scroller.min.js"></script>
    <script type="text/javascript" src="js/datatable.js"></script>
    <!-- botones de datatables -->
    <script type="text/javascript" src="../datatable/Buttons-1.6.2/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="../datatable/JSZIP-2.5.0/jszip.min.js"></script>
    <script type="text/javascript" src="../datatable/pdfmake-0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="../datatable/pdfmake-0.1.36/vsf_fonts.js"></script>
    <script type="text/javascript" src="../datatable/Buttons-1.6.2/js/buttons.html5.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>

<?php

    }elseif (isset($_SESSION['usuario'])||!isset($_SESSION['usuario'])) {

        header("Location: ../index.php");
        
    }

?>

    <!-- Modal Agregar producto-->
    <form id="agregar_producto" class="needs-validation" novalidate enctype="multipart/form-data">
        <div class="modal fade" id="ProductosModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title" id="exampleModalLabel">Agregar producto</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">                        
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre del producto</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required value="<?php if(isset($nombre_producto)) echo $nombre_producto?>">
                            <div class="valid-feedback">Correcto.</div>
						    <div class="invalid-feedback">Por favor ingresa un nombre.</div>
                        </div>
                        <div class="mb-3">
                            <label for="precio" class="form-label">Precio del producto</label>
                            <input type="number" class="form-control" id="precio" title="Solo números" pattern="[0-9 ]+" name="precio" required id="precio" value="<?php if(isset($precio)) echo $precio?>">
                            <div class="valid-feedback">Correcto.</div>
						    <div class="invalid-feedback">Por favor ingresa un precio.</div>
                        </div>
                        <div class="mb-3">
                            <label for="cantidad" class="form-label">Cantidad de producto</label>
                            <input class="form-control" title="Solo números" pattern="[0-9]+" type="tel" name="cantidad" required id="cantidad" value="<?php if(isset($cantidad)) echo $cantidad?>">
                            <div class="valid-feedback">Correcto.</div>
						    <div class="invalid-feedback">Por favor ingresa una cantidad.</div>
                        </div>
                        <div class="mb-3">
                            <label for="archivo" class="form-label">Elige la imagen del producto</label>
                            <input type="file" id="archivo" name="imagen" required>
                            <div class="valid-feedback">Correcto.</div>
						    <div class="invalid-feedback">Por favor ingresa una imagen.</div>
                        </div>                                            
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" onclick="agregarProducto()">Agregar producto</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- Modal editar producto-->
    <form id="editar_producto" class="needs-validation" novalidate enctype="multipart/form-data">
        <div class="modal fade" id="ProductosModalE" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header bg-success text-white">
                        <h5 class="modal-title" id="exampleModalLabel">Agregar producto</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="id_editar" class="form-label">Código del produto</label>
                            <input class="form-control" title="Solo números" pattern="[0-9 ]+" type="text" name="id_producto" required id="id_editar" value="<?php if(isset($codigo)) echo $codigo?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="nombre_editar" class="form-label">Nombre del producto</label>
                            <input type="text" class="form-control" id="nombre_editar" name="nombre" required value="<?php if(isset($nombre_producto)) echo $nombre_producto?>">
                            <div class="valid-feedback">Correcto.</div>
						    <div class="invalid-feedback">Por favor ingresa un nombre.</div>
                        </div>
                        <div class="mb-3">
                            <label for="precio_editar" class="form-label">Precio del producto</label>
                            <input type="number" class="form-control" id="precio_editar" title="Solo números" pattern="[0-9 ]+" name="precio" required value="<?php if(isset($precio)) echo $precio?>">
                            <div class="valid-feedback">Correcto.</div>
						    <div class="invalid-feedback">Por favor ingresa un precio.</div>
                        </div>
                        <div class="mb-3">
                            <label for="cantidad_editar" class="form-label">Cantidad de producto</label>
                            <input class="form-control" title="Solo números" pattern="[0-9]+" type="tel" name="cantidad" required id="cantidad_editar" value="<?php if(isset($cantidad)) echo $cantidad?>">
                            <div class="valid-feedback">Correcto.</div>
						    <div class="invalid-feedback">Por favor ingresa una cantidad.</div>
                        </div>
                        <div class="mb-3">
                        <label for="archivo_editar" class="form-label">Elige la imagen del producto</label>
                        <input type="file" id="archivo_editar" name="imagen">
                        </div>                                            
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success" onclick="editarProducto()">Editar producto</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- Validación de los formularios -->
	<script src="../js/validacion_formulario.js"></script>