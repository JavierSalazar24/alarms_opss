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
    <title>Mi perfil</title>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/estilos_responsivo.css">
    <script src="js/scrollreveal.js"></script>
    <link rel="shortcut icon" href="img/favicon1.png">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@100&display=swap" rel="stylesheet">
</head>
<body class="body-perfil">
    
    <?php include "partes/_navs.php" ?>

    <section id="perfil">
        
        <h1 class="h1-perfil">Mi perfil</h1>
        
        <div class="div-inputs-perfil-gnrl">
            <div class="div-inputs-perfil">
                <div class="div-inputs-registrar2">
                    <label for="nombre" id="label-perfil">Nombre(s)</label>
                </div>
                <input class="input-perfil-form" pattern="[a-zA-Zá-úÁ-Ú ]+" type="text" name="nombre" required id="nombre" value="<?php echo $nombre?>" disabled>
            </div>
                
            <div class="div-inputs-perfil">
                <input type="hidden" name="id" value="<?php echo $id?>">                
                <div class="div-inputs-registrar2">
                    <label for="ape1" id="label-perfil">Primer apellido</label>
                </div>
                <input class="input-perfil-form" pattern="[a-zA-Zá-úÁ-Ú ]+" type="text" name="ape1" required id="ape1" value="<?php echo $ape1?>" disabled>                
            </div>

            <div class="div-inputs-perfil">
                <div class="div-inputs-registrar2">                 
                    <label for="ape2" id="label-perfil">Segundo apellido</label>
                </div>
                <input class="input-perfil-form" pattern="[a-zA-Zá-úÁ-Ú ]+" type="text" name="ape2" id="ape2" value="<?php echo $ape2?>" disabled>
            </div>

            <div class="div-inputs-perfil">
                <div class="div-inputs-registrar2">
                    <label for="telefono" id="label-perfil">Teléfono</label>
                </div>
                <input class="input-perfil-form" title="Solo números" pattern="[0-9]+" type="tel" name="telefono" required id="telefono" minlength="10" maxlength="10" value="<?php echo $telefono?>" disabled>
            </div>

            <div class="div-inputs-perfil">
                <div class="div-inputs-registrar2">                
                    <label for="calle" id="label-perfil">Calle</label>
                </div>
                <input class="input-perfil-form" type="text" name="calle" required id="calle" value="<?php echo $calle?>" disabled>
            </div>

            <div class="div-inputs-perfil">
                <div class="div-inputs-registrar2">
                    <label for="numero" id="label-perfil">Número exterior</label>
                </div>
                <input class="input-perfil-form" type="text" name="numero" required id="numero" value="<?php echo $numero?>" disabled>
            </div>

            <div class="div-inputs-perfil">
                <div class="div-inputs-registrar2">
                    <label for="col-fracc" id="label-perfil">Col. o Fracc.</label>
                </div>
                <input class="input-perfil-form" type="text" name="col_fracc" required id="col-fracc" value="<?php echo $col_fracc?>" disabled>
            </div>

            <div class="div-inputs-perfil">
                <div class="div-inputs-registrar2">
                    <label for="cp" id="label-perfil">Código Postal</label>
                </div>
                <input class="input-perfil-form" type="tel" title="Solo números" maxlength="5" pattern="[0-9]+" name="cp" required id="cp" value="<?php echo $cp?>" disabled>
            </div>

            <div class="div-inputs-perfil">
                <div class="div-inputs-registrar2">
                    <label for="cp" id="label-perfil">Ciudad</label>
                </div>
                <input class="input-perfil-form" type="text" name="ciudd" required id="ciudad" value="<?php echo $ciudad?>" disabled>
            </div>

            <div class="div-inputs-perfil">
                <div class="div-inputs-registrar3">
                    <label for="email" id="label-perfil">Email</label>
                </div>
                <input class="input-perfil-form" type="text" name="correo" required id="email" value="<?php echo $correo?>" disabled>
            </div>

        </div>

        <div class="div-perfil-btn">
            <a class="btn-perfil" href="editar_mi_perfil.php">Editar perfil</a>
            <a class="btn-perfil2" href="mis_pedidos.php">Mis pedidos</a>
            <a class="btn-perfil2 btn-perfil22" href="index.php">Volver al inicio</a>
        </div>

    </section>

    <script src="https://kit.fontawesome.com/56b0f801ce.js" crossorigin="anonymous"></script>
    <script src="js/index.js"></script>
</body>
</html>

<?php

    }

?>