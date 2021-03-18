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

        $i=0;

        // $alarmas = $datos['alarmas']['alarma 1'];

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi perfil</title>
    <script src="js/scrollreveal.js"></script>
    <link rel="shortcut icon" href="img/favicon1.png">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@100&display=swap" rel="stylesheet">
    <?php include_once "views/estilos_future.php"?>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/estilos_responsivo.css">
</head>
<body class="body-perfil">
    
    <?php include "partes/_navs.php" ?>

    <section id="perfil">
        
        <h1 class="h1-perfil">Mis alarmas</h1>
        
        <div class="div-inputs-perfil-gnrl">            
            <?php
                foreach ($datos as $dato) {
                    $i++;
            ?>
                <div class="div-inputs-perfil">
                <div class="div-inputs-registrar2">
                    <label for="nombre" id="label-perfil">estatus de la alarma <?php echo $i?></label>
                </div>
                <input class="input-perfil-form" type="text" value="<?php echo $dato['alarmas']["alarma $i"]?>" disabled>
            </div>

            <?php
                }
            ?>
        </div>

        <div class="div-perfil-btn">
            <a class="btn-perfil2 btn-perfil22" href="index.php">Volver al inicio</a>
        </div>

    </section>

    <script src="https://kit.fontawesome.com/56b0f801ce.js" crossorigin="anonymous"></script>
    <script src="js/index.js"></script>
    <?php include_once "views/script_future.php"?>

</body>
</html>

<?php

    }

?>