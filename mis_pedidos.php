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
        $datosP = $C_pedidos->find(['correo' => $correo]);

        $C_productos = (new MongoDB\Client('mongodb+srv://javier:javier12345@cluster0.w3wdi.mongodb.net/opss?retryWrites=true&w=majority'))->opss->productos; 
        $datosPr = $C_productos->findOne(['codigo' => 111]);

        $count = count($datosP);
        $cant = array();
        $tot = array();

        foreach($datosP as $datosPedidos){
            for ($i=0; $i < $datosPedidos; $i++) {
                $cant[] = $datosPedidos['cantidad'];
                $tot[] = $datosPedidos['total'];
            }

            $nombre_p = $datosPr['nombre'];
            $precio = $datosPr['precio'];
            $fecha_hora = $datosPedidos['fecha_hora'];  

        }

        $limite = count($cant);

        for ($j=0; $j < $limite; $j++) {             
            $cantidad = $cantidad+$cant[$j];
            $total = $total+$tot[$j];
        }


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis pedidos</title>
    <script src="js/scrollreveal.js"></script>
    <link rel="shortcut icon" href="img/favicon1.png">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@100&display=swap" rel="stylesheet">
    <?php include_once "views/estilos_future.php"?>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/estilos_responsivo.css">
</head>
<body class="body-perfil">

    <?php include "partes/_navs.php"; ?>

    <section id="perfil">
        
        <h1 class="h1-perfil">Mis pedidos</h1>
        
        <div class="div-inputs-perfil-gnrl">                
            <div class="div-inputs-perfil">
                <label for="nombre" id="label-perfil">Nombre del producto</label>
                <br>
                <input class="input-perfil-form" type="text" value="<?php if(empty($nombre_p)) echo "Sin pedidos"; else echo $nombre_p;?>" disabled>                
            </div>

            <div class="div-inputs-perfil">
                <label for="precio" id="label-perfil">Precio del producto</label>
                <br>
                <input class="input-perfil-form" type="text" value="<?php if(empty($precio)) echo "Sin pedidos"; else echo $precio;?>" disabled>
            </div>

            <div class="div-inputs-perfil">
                <label for="cantidad" id="label-perfil">Cantidad comprada hasta el momento</label>
                <br>
                <input class="input-perfil-form" type="text" value="<?php if(empty($cantidad)) echo "Sin pedidos"; else echo $cantidad;?>" disabled>
            </div>

            <div class="div-inputs-perfil">
                <label for="precio_total" id="label-perfil">Precio total de la compra hasta el momento</label>
                <br>
                <input class="input-perfil-form" type="text" value="<?php if(empty($total)) echo "Sin pedidos"; else echo $total;?>" disabled>
            </div>

            <div class="div-inputs-perfil">
                <label for="fecha_hora" id="label-perfil">Fecha y hora de la última compra</label>
                <br>
                <input class="input-perfil-form" type="text" value="<?php if(empty($fecha_hora)) echo "Sin pedidos"; else echo $fecha_hora;?>" disabled>
            </div>

        </div>

        <div class="div-perfil-btn">
            <a class="btn-perfil" href="mi_perfil.php">Volver atrás</a>
            <a class="btn-perfil" href="index.php">Volver al inicio</a>
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