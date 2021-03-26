<?php

    session_start();
    // error_reporting(0);
    require_once __DIR__ . '/vendor/autoload.php';

    if(isset($_SESSION['admin'])||isset($_SESSION['estandar'])){

        header("Location: control_panel/index.php");
      
    }elseif (!isset($_SESSION['usuario'])) {

        header("Location: index.php");
        
    }elseif (isset($_SESSION['usuario'])) {

        $correo = $_SESSION['usuario'];

        $C_clientes = (new MongoDB\Client('mongodb+srv://javier:javier12345@cluster0.w3wdi.mongodb.net/opss?retryWrites=true&w=majority'))->opss->clientes; 
        $datos = $C_clientes->findOne(["correo" => $correo]);

        $nombre = $datos['nombres']['nombre'];
        $ape1 = $datos['nombres']['ape1'];

        $i=0;

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OPSS | Mis alarmas</title>
    <script src="js/scrollreveal.js"></script>
    <link rel="shortcut icon" href="img/favicon1.png">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@100&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="css/estilos_responsivo.css">
    <link rel="stylesheet" href="css/estilos.css">
    <?php include_once "views/estilos_future.php"?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
</head>

<body class="body-perfil">
    
    <?php include "partes/_navs.php"?>

    <section id="perfil">
        
        <h1 class="h1-alarma">Mis alarmas</h1>
        
        <div class="div-inputs-perfil-gnrl">            
            <?php
                foreach ($datos as $dato):
                    $i++;

                    if (isset($datos['alarmas']["alarma $i"])){
                        
                    

            ?>
                <div class="div-inputs-perfil">
                    <div class="div-inputs-alarma">
                        <label for="nombre" id="label-perfil">Estatus de la alarma <?php echo $i?></label>
                    </div>
                    <input class="input-perfil-form" type="text" value="<?php echo $datos['alarmas']["alarma $i"];?>" disabled>
                </div>

            <?php
                }
                endforeach;            
            ?>
        </div>

        <div class="div-perfil-btn">
            <a class="btn btn-dark btn-lg" href="index.php">Volver al inicio</a>
        </div>

    </section>

    <script src="https://kit.fontawesome.com/56b0f801ce.js" crossorigin="anonymous"></script>
    <script src="js/index.js"></script>
    <?php include_once "views/script_bootstrap.php"?>
    <?php include_once "views/script_future.php"?>

</body>

</html>

<?php

    }

?>