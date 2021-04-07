<?php

    session_start();
    error_reporting(0);
    require_once __DIR__ . '/vendor/autoload.php';

    if(isset($_SESSION['admin'])||isset($_SESSION['estandar'])){

        header("Location: control_panel/index.php");
      
    }elseif (!isset($_SESSION['usuario'])) {

        header("Location: index.php");
        
    }elseif (isset($_SESSION['usuario'])) {

        $correo = $_SESSION['usuario'];

        $C_clientes = (new MongoDB\Client('mongodb+srv://javier:javier12345@cluster0.w3wdi.mongodb.net/opss?retryWrites=true&w=majority'))->opss->clientes; 
        $datos = $C_clientes->findOne(["correo" => $correo]);
        
        if ($datos['alarmas']) {
            $cont = $datos['alarmas']->count();
        }else {
            $cont = 0;
        }

        $nombre = $datos['nombres']['nombre'];
        $ape1 = $datos['nombres']['ape1'];

        $i=0;
        $j=0;

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Transiciones -->
    <script src="js/scrollreveal.js"></script>
    <!-- Estilos -->
    <link rel="shortcut icon" href="img/favicon1.png">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@100&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <?php include_once "views/estilos_future.php"?>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/estilos_responsivo.css">
    <title>Mis alarmas | OPSS</title>    
</head>

<body class="body-perfil">
    
    <?php include "partes/_navs.php"?>

    <div id="perfil" class="container">
        <div class="row justify-content-center pt-5 mt-5 m-1 mb-3 pb-4">
            <div class="col-12">                
                <div class="formulario_normal row mt-2 justify-content-evenly">
                    <div class="col-12 text-center pt-4 pb-5 mb-5">
                        <h1 class="titulo-login">MIS ALARMAS</h1>
                    </div>
                    <div class="col-md-4">
                    <?php 
                        if (json_encode($cont) >= 1) {
                    ?>
                    <?php                
                        foreach ($datos as $dato){
                            $i++;
                            if (isset($datos['alarmas']["alarma $i"])){
                    ?>
                            <div class="form-group form-inline mb-5">                            
                                <label class="label-pedidos label-registrarse" for="nombre">Estatus de la alarma <?php echo $i?></label>   
                                <input class="form-control form-control-registrarse" type="text" value="<?php echo $datos['alarmas']["alarma $i"];?>" readonly>
                            </div>                         
                    <?php
                                }
                            }            
                        }else {   
                    ?>                                         
                            <div class="form-group form-inline mb-5">                            
                                <label class="label-pedidos label-registrarse" for="nombre">Estatus de las alarmas</label>   
                                <input class="form-control form-control-registrarse" type="text" value="Sin alarmas" readonly>
                            </div> 
                    <?php
                        }
                    ?>                        
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-6 d-grid gap-2 mt-5 mb-5 text-center">
                            <a href="index.php" class="btn btn-dark btn-lg">Volver al inicio</a>
                        </div>   
                    </div>                                                   
                </div>
                
                <div class="formulario_responsive row mt-2 justify-content-center">
                    <div class="col-12 form-group text-center pt-2 pb-5">
                        <h1 class="titulo-login">MIS ALARMAS</h1>
                    </div>
                    <div class="col-12">
                    <?php 
                        if (json_encode($cont) >= 1) {
                    ?>
                    <?php                
                        foreach ($datos as $dato){
                            $j++;
                            if (isset($datos['alarmas']["alarma $j"])){
                    ?>
                            <div class="form-group mb-5">                            
                                <label class="label-pedidos label-registrarse" for="nombre">Estatus de la alarma <?php echo $j?></label>   
                                <input class="form-control form-control-registrarse" type="text" value="<?php echo $datos['alarmas']["alarma $i"];?>" readonly>
                            </div>                         
                    <?php
                                }
                            }            
                        }else {   
                    ?>                                         
                            <div class="form-group mb-5">                            
                                <label class="label-pedidos label-registrarse" for="nombre">Estatus de las alarmas</label>   
                                <input class="form-control form-control-registrarse" type="text" value="Sin alarmas" readonly>
                            </div> 
                    <?php
                        }
                    ?>  
                    </div>                 
                    <div class="row justify-content-center">
                        <div class="col-12 d-grid gap-2 mt-5 mb-5 text-center">
                            <a href="index.php" class="btn btn-dark btn-lg">Volver al inicio</a>
                        </div>           
                    </div>                     
                </div> 
            </div>
        </div>
    </div>

    <!-- Transiciones -->
    <script src="js/index.js"></script>
    <!-- Estilos Script-->
    <script src="https://kit.fontawesome.com/56b0f801ce.js" crossorigin="anonymous"></script>
    <?php include_once "views/script_bootstrap.php"?>
    <?php include_once "views/script_future.php"?>

</body>

</html>

<?php

    }

?>