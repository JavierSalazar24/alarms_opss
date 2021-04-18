<?php

    session_start();
    require_once __DIR__ . '/vendor/autoload.php';

    error_reporting(0);

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

        $CountAM = $C_pedidos->count([
            '$and' => [
                ['correo_cliente' => $correo], ['nombre_producto' => 'Alarma de movimiento']
            ]
        ]);
        $CountAU = $C_pedidos->count([
            '$and' => [
                ['correo_cliente' => $correo], ['nombre_producto' => 'Alarma ultrasónica']
            ]
        ]);
        $CountCA = $C_pedidos->count([
            '$and' => [
                ['correo_cliente' => $correo], ['nombre_producto' => 'Control de acceso']
            ]
        ]);

        if (empty($CountAM)) {
            $CountAM = 0;
        }
        if (empty($CountAU)) {
            $CountAU = 0;            
        }
        if (empty($CountCA)) {
            $CountCA = 0; 
        }

        $cantidadCompra = $CountAM + $CountAU + $CountCA;
        $totalCompra = 0;

        if (empty($cantidadCompra)) {
            $cantidadCompra = 'Sin pedidos';
        }else{
            for ($i=0; $i < $cantidadCompra; $i++) { 
                $totalCompra += 2000;
            }
        }
        
        
        
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/favicon1.png">
    <!-- Transiciones -->
    <script src="js/scrollreveal.js"></script>
    <!-- Estilos -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@100&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/future/css/main.css" />
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/estilos_responsivo.css">
    <title>Mis pedidos | OPSS</title>
</head>

<body class="body-perfil">

    <?php include "partes/_navs.php"; ?>

    <div id="perfil" class="container">
        <div class="row justify-content-center pt-5 mt-5 m-1 mb-3 pb-4">
            <div class="col-12">                
                <div class="formulario_normal row mt-2 justify-content-evenly align-items-center">
                    <div class="col-12 text-center pt-4 pb-5 mb-5">
                        <h1 class="titulo-pedidos">MIS PEDIDOS</h1>
                    </div>
                    <div class="col-md-4">
                        <div class="card text-white card-trasnparente mb-3" style="max-width: 21rem;">
                            <div class="card-header">Nombre de los productos comprados.</div>
                            <div class="card-body">
                                <ul class="text-white">
                                    <?php
                                        if ($CountAM > 1) {
                                    ?>
                                            <li><?php echo $CountAM ?> Alarmas de movimiento</li>
                                    <?php
                                        }else{
                                    ?>        
                                            <li><?php echo $CountAM ?> Alarma de movimiento</li>
                                    <?php
                                        }
                                    ?>

                                    <?php
                                        if ($CountAU > 1) {
                                    ?>
                                            <li><?php echo $CountAU ?> Alarmas ultrasónicas</li>
                                    <?php
                                        }else{
                                    ?>        
                                            <li><?php echo $CountAU ?> Alarma ultrasónica</li>
                                    <?php
                                        }
                                    ?>

                                    <?php
                                        if ($CountCA > 1) {
                                    ?>
                                            <li><?php echo $CountCA ?> Controles de acceso</li>
                                    <?php
                                        }else{
                                    ?>        
                                            <li><?php echo $CountCA ?> Control de acceso</li>
                                    <?php
                                        }
                                    ?>
                                    
                                </ul>
                            </div>
                        </div>
                        <div class="card text-white card-trasnparente mb-3" style="max-width: 21rem;">
                            <div class="card-header">Cantidad de productos comprados hasta el momento.</div>
                            <div class="card-body">
                                <ul class="text-white">
                                    <li><?php if(empty($cantidadCompra)) echo "Sin pedidos"; else echo $cantidadCompra;?></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card text-white card-trasnparente mb-3" style="max-width: 21rem;">
                            <div class="card-header">Precio total de la compra hasta el momento.</div>
                            <div class="card-body">
                                <ul class="text-white">
                                    <li>$<?php echo $totalCompra;?>.00 MXN</li>
                                </ul>
                            </div>
                        </div>
                        <div class="card text-white card-trasnparente mb-3" style="max-width: 21rem;">
                            <div class="card-header">Fecha y hora de la última compra.</div>
                            <div class="card-body">
                                <ul class="text-white">
                                    <li><?php if(empty($ultimaFecha)) echo "Sin pedidos"; else echo $ultimaFecha;?></li>
                                </ul>
                            </div>
                        </div>                                           
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-md-6 d-grid gap-2 mt-5 mb-5 text-center">
                            <a href="mi_perfil.php" class="btn btn-dark btn-lg">Volver atrás</a>
                        </div>   
                    </div>                   
                </div>

                <div class="formulario_responsive row mt-0 justify-content-center">
                    <div class="col-12 form-group text-center pt-0 pb-5">
                        <h1 class="titulo-pedidos">MIS PEDIDOS</h1>
                    </div>
                    <div class="col-11 mx-auto">
                        <div class="card text-white card-trasnparente mb-3">
                            <div class="card-header">Nombre de los productos comprados.</div>
                            <div class="card-body">
                                <ul class="text-white">
                                    <?php
                                        if ($CountAM > 1) {
                                    ?>
                                            <li><?php echo $CountAM ?> Alarmas de movimiento</li>
                                    <?php
                                        }else{
                                    ?>        
                                            <li><?php echo $CountAM ?> Alarma de movimiento</li>
                                    <?php
                                        }
                                    ?>

                                    <?php
                                        if ($CountAU > 1) {
                                    ?>
                                            <li><?php echo $CountAU ?> Alarmas ultrasónicas</li>
                                    <?php
                                        }else{
                                    ?>        
                                            <li><?php echo $CountAU ?> Alarma ultrasónica</li>
                                    <?php
                                        }
                                    ?>

                                    <?php
                                        if ($CountCA > 1) {
                                    ?>
                                            <li><?php echo $CountCA ?> Controles de acceso</li>
                                    <?php
                                        }else{
                                    ?>        
                                            <li><?php echo $CountCA ?> Control de acceso</li>
                                    <?php
                                        }
                                    ?>
                                    
                                </ul>
                            </div>
                        </div>
                        <div class="card text-white card-trasnparente mb-3">
                            <div class="card-header">Cantidad de productos comprados hasta el momento.</div>
                            <div class="card-body">
                                <ul class="text-white">
                                    <li><?php if(empty($cantidadCompra)) echo "Sin pedidos"; else echo $cantidadCompra;?></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card text-white card-trasnparente mb-3">
                            <div class="card-header">Precio total de la compra hasta el momento.</div>
                            <div class="card-body">
                                <ul class="text-white">
                                    <li>$<?php echo $totalCompra;?>.00 MXN</li>
                                </ul>
                            </div>
                        </div>
                        <div class="card text-white card-trasnparente mb-3">
                            <div class="card-header">Fecha y hora de la última compra.</div>
                            <div class="card-body">
                                <ul class="text-white">
                                    <li><?php if(empty($ultimaFecha)) echo "Sin pedidos"; else echo $ultimaFecha;?> hrs.</li>
                                </ul>
                            </div>
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
        
    <!-- Fontawesome -->
    <script src="https://kit.fontawesome.com/56b0f801ce.js" crossorigin="anonymous"></script>
    <!-- Transiciones -->
    <script src="js/index.js"></script>
    <!-- Estilos script -->
    <?php include_once "views/script_bootstrap.php"?>
    <?php include_once "views/script_future.php"?>
</body>

</html>

<?php

    }

?>