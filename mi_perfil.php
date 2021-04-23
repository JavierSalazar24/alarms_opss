<?php

    session_start();

    require_once __DIR__ . '/vendor/autoload.php';

    if(isset($_SESSION['admin'])||isset($_SESSION['estandar'])){

        header("Location: control_panel/index.php");
      
    }elseif (!isset($_SESSION['usuario'])) {

        header("Location: index.php");
        
    }elseif (isset($_SESSION['usuario'])) {

        $correo = $_SESSION['usuario'];

        $C_clientes = (new MongoDB\Client('mongodb+srv://javier:javier12345@cluster0.w3wdi.mongodb.net/opss?retryWrites=true&w=majority'))->opss->clientes; 
        $datos = $C_clientes->findOne(['correo' => $correo]);

        $id = $datos['_id'];
        $nombre = $datos['nombres']['nombre'];
        $ape1 = $datos['nombres']['ape1'];
        $ape2 = $datos['nombres']['ape2'];
        $calle = $datos['direccion']['calle'];
        $numero = $datos['direccion']['numero'];
        $col_fracc = $datos['direccion']['col_fracc'];
        $cp = $datos['direccion']['cp'];
        $ciudad = $datos['direccion']['ciudad'];
        $telefono = $datos['telefono'];
        $correo = $datos['correo'];
        

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
    <title>Mi perfil | OPSS</title>
</head>

<body class="body-perfil">
    
    <?php include "partes/_navs.php" ?>

    <div id="perfil" class="container">
        <div class="row justify-content-center pt-5 mt-5 m-1 mb-3 pb-4">
            <div class="col-12">                
                <div class="formulario_normal row mt-2 justify-content-evenly">
                    <div class="col-12 text-center pt-4 pb-5 mb-5">
                        <h1 class="titulo-pedidos">MI PERFIL</h1>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group mb-5">
                            <label class="label-pedidos" for="nombre">Nombre(s)</label>
                            <input class="form-control form-control-negro" type="text" value="<?php echo $nombre?>" readonly>
                        </div>
                        <div class="form-group mb-5">
                            <label class="label-pedidos" for="ape2">Segundo apellido</label>
                            <input class="form-control form-control-negro" type="text" value="<?php echo $ape2?>" readonly>
                        </div>
                        <div class="form-group mb-5">
                            <label class="label-pedidos" for="calle">Calle</label>
                            <input class="form-control form-control-negro" type="text" value="<?php echo $calle?>" readonly>
                        </div> 
                        <div class="form-group mb-5">
                            <label class="label-pedidos" for="col-fracc">Col. o Fracc.</label>
                            <input class="form-control form-control-negro" type="text" value="<?php echo $col_fracc?>" readonly>
                        </div> 
                        <div class="form-group mb-5">
                            <label class="label-pedidos" for="ciudad">Ciudad</label>
                            <input class="form-control form-control-negro" type="text" value="<?php echo $ciudad?>" readonly>
                        </div> 
                    </div>
                    <div class="col-md-3">
                        <div class="form-group mb-5">
                            <label class="label-pedidos" for="ape1">Primer apellido</label>
                            <input class="form-control form-control-negro" type="text" value="<?php echo $ape1?>" readonly>
                        </div>
                        <div class="form-group mb-5">
                            <label class="label-pedidos" for="telefono">Teléfono</label>
                            <input class="form-control form-control-negro" type="tel" value="<?php echo $telefono?>" readonly>
                        </div>    
                        <div class="form-group mb-5">
                            <label class="label-pedidos" for="numero">Número exterior</label>
                            <input class="form-control form-control-negro" type="text" value="<?php echo $numero?>" readonly>
                        </div>    
                        <div class="form-group mb-5">
                            <label class="label-pedidos" for="cp">Código Postal</label>
                            <input class="form-control form-control-negro" type="tel" value="<?php echo $cp?>">
                        </div>    
                        <div class="form-group mb-5">
                            <label class="label-pedidos" for="email">Email</label>
                            <input class="form-control form-control-negro" type="email" value="<?php echo $correo?>" readonly>
                        </div>                    
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-3 d-grid gap-2 mt-5 mb-5 text-center">
                            <a href="editar_mi_perfil.php" class="btn btn-dark btn-lg">Editar perfil</a>
                        </div>
                        <div class="col-md-3 d-grid gap-2 mt-5 mb-5 text-center">
                            <a href="mis_pedidos.php" class="btn btn-dark btn-lg">Mis pedidos</a>
                        </div>       
                    </div>                   
                </div>
                <div class="formulario_responsive row mt-2 justify-content-center mx-auto">
                    <div class="col-12 form-group text-center pt-0 pb-5">
                        <h1 class="titulo-pedidos">MI PERFIL</h1>
                    </div>
                    <div class="col-12">
                        <div class="form-group mb-5">
                            <label class="label-pedidos" for="nombre">Nombre(s)</label>
                            <input class="form-control form-control-negro" type="text" value="<?php echo $nombre?>" readonly>
                        </div>
                        <div class="form-group mb-5">
                            <label class="label-pedidos" for="ape1">Primer apellido</label>
                            <input class="form-control form-control-negro" type="text" value="<?php echo $ape1?>" readonly>
                        </div>
                        <div class="form-group mb-5">
                            <label class="label-pedidos" for="ape2">Segundo apellido</label>
                            <input class="form-control form-control-negro" type="text" value="<?php echo $ape2?>" readonly>
                        </div>
                        <div class="form-group mb-5">
                            <label class="label-pedidos" for="telefono">Teléfono</label>
                            <input class="form-control form-control-negro" type="tel" value="<?php echo $telefono?>" readonly>
                        </div>
                        <div class="form-group mb-5">
                            <label class="label-pedidos" for="calle">Calle</label>
                            <input class="form-control form-control-negro" type="text" value="<?php echo $calle?>" readonly>
                        </div>
                        <div class="form-group mb-5">
                            <label class="label-pedidos" for="numero">Número exterior</label>
                            <input class="form-control form-control-negro" type="text" value="<?php echo $numero?>" readonly>
                        </div>
                        <div class="form-group mb-5">
                            <label class="label-pedidos" for="col-fracc">Col. o Fracc.</label>
                            <input class="form-control form-control-negro" type="text" value="<?php echo $col_fracc?>" readonly>
                        </div>
                        <div class="form-group mb-5">
                            <label class="label-pedidos" for="cp">Código Postal</label>
                            <input class="form-control form-control-negro" type="tel" value="<?php echo $cp?>" readonly>
                        </div>
                        <div class="form-group mb-5">
                            <label class="label-pedidos" for="ciudad">Ciudad</label>
                            <input class="form-control form-control-negro" type="text"  value="<?php echo $ciudad?>" readonly>
                        </div>
                        <div class="form-group mb-5">
                            <label class="label-pedidos" for="email">Email</label>
                            <input class="form-control form-control-negro" type="email" value="<?php echo $correo?>" readonly>
                        </div> 
                    </div>
                    <div class="row justify-content-center mx-auto">
                        <div class="col-12 form-group mt-5 mb-3 d-grid grid-2 text-center">
                            <a href="editar_mi_perfil.php" class="btn btn-dark btn-lg mb-3">Editar perfil</a>
                            <a href="mis_pedidos.php" class="btn btn-dark btn-lg mb-3">Mis pedidos</a>
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