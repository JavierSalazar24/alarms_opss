<?php

        session_start();
        error_reporting(0);
        require_once 'vendor/autoload.php';
        $C_productos = (new MongoDB\Client('mongodb+srv://javier:javier12345@cluster0.w3wdi.mongodb.net/opss?retryWrites=true&w=majority'))->opss->productos;
    
        if(isset($_SESSION['admin'])||isset($_SESSION['estandar'])){

            header("Location: control_panel/index.php");
        
        }elseif(isset($_SESSION['usuario'])){

            if(!empty($_REQUEST['id_producto'])){                

                $id_producto_req = $_REQUEST['id_producto'];
                $datosP = $C_productos->findOne(['_id' => new MongoDB\BSON\ObjectID($id_producto_req)]);
                
                if (empty($datosP)) {
                    header("Location: productos.php");
                }
        
            }else{

                header("Location: productos.php");

            }

            $correo = $_SESSION['usuario'];

            $C_clientes = (new MongoDB\Client('mongodb+srv://javier:javier12345@cluster0.w3wdi.mongodb.net/opss?retryWrites=true&w=majority'))->opss->clientes; 
            $datos = $C_clientes->findOne(['correo' => $correo]);

            $nombre = $datos['nombres']['nombre'];
            $ape1 = $datos['nombres']['ape1'];            

    
?>
    
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comprar</title>
    <script src="js/scrollreveal.js"></script>
    <link rel="shortcut icon" href="img/favicon1.png">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/estilos_responsivo.css">
    <?php include_once "views/estilos_future.php"?>

</head>
    
<body class="body-direccion">
        
        <?php include "partes/_navs.php" ?>
        <form action="direccion.php" method="POST">    
            <section id="comprar">
                <div class="div-img-comprar">
                    <img class="img-comprar" src="img/img-comprar.jpg" alt="Alarma OPSS en venta">
                    <p class="desc-comprar mt-3"><?php echo $datosP['descripcion']?></p>
                </div>
                <div class="div-info-comprar">
                    <div class="info-comprar">
                        <input type="hidden" name="id_producto" value="<?php echo $datosP['_id']?>">
                        <h4 class="titulo-comprar mb-4"><?php echo $datosP['nombre']?></h4>
                        <h6 class="version-comprar pt-2 mb-4">V1</h6>
                        <h5 class="precio-comprar pt-1">$<?php echo $datosP['precio']?>.00</h5>
                        <p class="cantidad-comprar pt-2">Cantidad</p>
                        <input class="input-comprar" type="number" name="cantidad_producto" pattern="[1-9]+" value="1" min="1">
                        <br>
                        <input class="btn btn-dark btn-lg btn-block" type="submit" value="Pedir producto">
                        <p class="p-info-comprar">Información del pago
                            <i class="plus fas fa-plus" onclick="accion()"></i>
                            <p class="info desc-info-comprar desaparece2">El pago debe ser hecho por medio de paypal, con el fin de cuidar su información y poder realizar devoluciones si es necesario.</p>
                            <hr class="bg-white">
                        </p>
                    </div>
                </div>
            </section>
        </form>
        <script src=" https://kit.fontawesome.com/56b0f801ce.js" crossorigin="anonymous"></script>
        <script src="js/faq.js"></script>
        <script src="js/index.js"></script>
        <script type="text/javascript" src="js/agregar_editar.js"></script>
        <?php include_once "views/script_bootstrap.php"?>
        <?php include_once "views/script_future.php"?>

</body>
    
</html>

<?php

    }elseif(!isset($_SESSION['usuario'])){

        header("Location: registrarse.php");
    }

?>
