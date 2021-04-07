<?php

    session_start();
    require_once __DIR__ . '/vendor/autoload.php';

    // error_reporting(0);

    if(isset($_SESSION['usuario'])){

        $correo = $_SESSION['usuario'];

        $C_clientes = (new MongoDB\Client('mongodb+srv://javier:javier12345@cluster0.w3wdi.mongodb.net/opss?retryWrites=true&w=majority'))->opss->clientes; 
        $datosC = $C_clientes->findOne(['correo' => $correo]);

        $nombre = $datosC['nombres']['nombre'];
        $ape1 = $datosC['nombres']['ape1'];

        $C_pedidos = (new MongoDB\Client('mongodb+srv://javier:javier12345@cluster0.w3wdi.mongodb.net/opss?retryWrites=true&w=majority'))->opss->pedidos; 
        $datosP = $C_pedidos->find(['correo_cliente' => $correo]);
        $ultimaFechaObject = $C_pedidos->findOne(['correo_cliente' => $correo],['sort' => ['fecha_hora' => -1]]);
        $ultimaFecha = $ultimaFechaObject['fecha_hora'];

        $nombreProductosArray = array();

        $total = array();
        $totalCompra = 0;

        $cantidad = array();
        $cantidadCompra = 0;

        $i = 0;
        foreach($datosP as $datosPedidos){

            $nombreProductosArray[$i] = $datosPedidos['nombre_producto'];

            $total[$i] = $datosPedidos['total'];
            $totalCompra = intval($total[$i]) + $totalCompra;

            $cantidad[$i] = $datosPedidos['cantidad'];
            $cantidadCompra = intval($cantidad[$i]) + $cantidadCompra;

            $i = $i+1;
        }
        
        $nombreProductos = implode(", ", $nombreProductosArray);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="js/scrollreveal.js"></script>
    <link rel="shortcut icon" href="img/favicon1.png">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@100&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <?php include_once "views/estilos_future.php"?>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/estilos_responsivo.css">
    <title>Mis pedidos | OPSS</title>
</head>

<body class="body-perfil">

    <?php include "partes/_navs.php"; ?>

    <div id="perfil" class="container">
        <div class="row justify-content-center pt-5 mt-5 m-1 mb-3 pb-4">
            <div class="col-12">                
                <div class="formulario_normal row mt-2 justify-content-evenly">
                    <div class="col-12 text-center pt-4 pb-5 mb-5">
                        <h1 class="titulo-login">MIS PEDIDOS</h1>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group mb-5">                            
                            <label class="label-pedidos label-registrarse" for="nombre">Nombre de los productos</label>   
                            <textarea class="form-control form-control-registrarse" readonly><?php if(empty($nombreProductos)) echo "Sin pedidos"; else echo $nombreProductos ?>.</textarea>
                        </div>
                        <div class="form-group mb-5">
                            <label class="label-pedidos label-registrarse" for="calle">Cantidad comprada hasta el momento</label>
                            <input class="form-control form-control-registrarse" type="text" value="<?php if(empty($cantidadCompra)) echo "Sin pedidos"; else echo $cantidadCompra;?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group mb-5">
                            <label class="label-pedidos label-registrarse" for="ape1">Precio total de la compra hasta el momento</label>                            
                            <input class="form-control form-control-registrarse" type="text" value="<?php if(empty($totalCompra)) echo "Sin pedidos"; else echo $totalCompra;?>" readonly>
                        </div>
                        <div class="form-group mb-5">
                            <label class="label-pedidos label-registrarse" for="telefono">Fecha y hora de la última compra</label>
                            <input class="form-control form-control-registrarse" type="tel" value="<?php if(empty($ultimaFecha)) echo "Sin pedidos"; else echo $ultimaFecha;?>" readonly>
                        </div>                    
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-6 d-grid gap-2 mt-5 mb-5 text-center">
                            <a href="mi_perfil.php" class="btn btn-dark btn-lg">Volver atrás</a>
                        </div>   
                    </div>                   
                </div>
                <div class="formulario_responsive row mt-2 justify-content-center">
                    <div class="col-12 form-group text-center pt-4 pb-5">
                        <h1 class="titulo-login">MIS PEDIDOS</h1>
                    </div>
                    <div class="col-12">
                        <div class="form-group mb-5">                            
                            <label class="label-pedidos label-registrarse" for="nombre">Nombre de los productos</label>   
                            <textarea class="form-control form-control-registrarse" readonly><?php if(empty($nombreProductos)) echo "Sin pedidos"; else echo $nombreProductos ?>.</textarea>
                        </div>
                        <div class="form-group mb-5">
                            <label class="label-pedidos label-registrarse" for="calle">Cantidad comprada hasta el momento</label>
                            <input class="form-control form-control-registrarse" type="text" value="<?php if(empty($cantidadCompra)) echo "Sin pedidos"; else echo $cantidadCompra;?>" readonly>
                        </div>
                        <div class="form-group mb-5">
                            <label class="label-pedidos label-registrarse" for="ape1">Precio total de la compra hasta el momento</label>                            
                            <input class="form-control form-control-registrarse" type="text" value="<?php if(empty($totalCompra)) echo "Sin pedidos"; else echo $totalCompra;?>" readonly>
                        </div>
                        <div class="form-group mb-5">
                            <label class="label-pedidos label-registrarse" for="telefono">Fecha y hora de la última compra</label>
                            <input class="form-control form-control-registrarse" type="tel" value="<?php if(empty($ultimaFecha)) echo "Sin pedidos"; else echo $ultimaFecha;?>" readonly>
                        </div>
                    <div class="row justify-content-center">
                        <div class="col-12 d-grid gap-2 mt-5 mb-5 text-center">
                            <a href="mi_perfil.php" class="btn btn-dark btn-lg">Volver atrás</a>
                        </div>           
                    </div>                     
                </div> 
            </div>
        </div>
    </div>
        
    <script src="https://kit.fontawesome.com/56b0f801ce.js" crossorigin="anonymous"></script>
    <script src="js/index.js"></script>
    <?php include_once "views/script_bootstrap.php"?>
    <?php include_once "views/script_future.php"?>
</body>

</html>

<?php

    }

?>