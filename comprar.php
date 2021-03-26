<?php

        session_start();

        require_once 'vendor/autoload.php';
        $C_productos = (new MongoDB\Client('mongodb+srv://javier:javier12345@cluster0.w3wdi.mongodb.net/opss?retryWrites=true&w=majority'))->opss->productos;
    
        if(isset($_SESSION['admin'])||isset($_SESSION['estandar'])){

            header("Location: control_panel/index.php");
        
        }elseif(isset($_SESSION['usuario'])){

            if(!empty($_REQUEST['id_producto'])){                

                $id_producto_req = $_REQUEST['id_producto'];
                $datosP = $C_productos->findOne(['_id' => new MongoDB\BSON\ObjectID($id_producto_req)]);
        
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
    <?php include_once "views/estilos_future.php"?>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/estilos_responsivo.css">

</head>
    
<body class="body-comprar">
        
        <?php include "partes/_nav.php" ?>
        <form action="direccion.php" method="POST">    
            <section id="comprar">
                <div class="div-img-comprar">
                    <img class="img-comprar" src="img/img-comprar.jpg" alt="Alarma OPSS en venta">
                    <p class="desc-comprar">Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima adipisci officiis
                        explicabo? Non possimus, itaque accusantium maiores </p>
                </div>
                <div class="div-info-comprar">
                    <div class="info-comprar">
                        <input type="hidden" name="id_producto" value="<?php echo $datosP['_id']?>">

                        <h4 class="titulo-comprar"><?php echo $datosP['nombre']?></h4>
                        <h6 class="version-comprar">V1</h6>
                        <h5 class="precio-comprar">$<?php echo $datosP['precio']?>.00</h5>
                        <p class="cantidad-comprar">Cantidad</p>
                        <input class="input-comprar" type="number" name="cantidad_producto" pattern="[1-9]+" value="1" min="1">
                        <br>
                        <input class="btn-comprar" type="submit" value="Pedir producto">
                        <p class="p-info-comprar">
                            Información del producto
                            <i class="plus fas fa-plus" onclick="accion5()"></i>
                            <p class="info desc-info-comprar desaparece">Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                Animi
                                expedita
                                deleniti ab, laudantium hic modi architecto, beatae quos fugit dolor corrupti perferendis sed atque
                                nulla facilis ducimus doloribus repudiandae a.</p>
                            <hr class="hr-comprar">
                        </p>
                    </div>
                </div>
            </section>
        </form>

        <!-- <div id="smart-button-container">
            <div style="text-align: center;">
                <div id="paypal-button-container"></div>
            </div>
        </div>
        <script src="https://www.paypal.com/sdk/js?client-id=AS60qhUgLC9kzTbhIfk80BWustQ8DL-QOb9KyehDfFVdRLtL88Ezm0ZPhra2_wY_XXGjlV8ZJVnXX6-G&currency=MXN" data-sdk-integration-source="button-factory"></script>
        <script src="js/paypal.js"></script> -->

        <script src=" https://kit.fontawesome.com/56b0f801ce.js" crossorigin="anonymous"></script>
        <script src="js/faq.js"></script>
        <script src="js/index.js"></script>
        <script type="text/javascript" src="js/agregar.js"></script>
        <?php include_once "views/script_future.php"?>

</body>
    
</html>

<?php

    }elseif(!isset($_SESSION['usuario'])){

        if(!empty($_REQUEST['id_producto'])){

            $id_producto_req = $_REQUEST['id_producto'];
            $datosP = $C_productos->findOne(['_id' => new MongoDB\BSON\ObjectID($id_producto_req)]);        
    
        }else{
            header("Location: productos.php");
        }


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
    <?php include_once "views/estilos_future.php"?>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/estilos_responsivo.css">

</head>
    
<body class="body-comprar">
        
        <?php include "partes/_nav.php" ?>
        <form action="direccion.php" method="POST">    
            <section id="comprar">
                <div class="div-img-comprar">
                    <img class="img-comprar" src="img/img-comprar.jpg" alt="Alarma OPSS en venta">
                    <p class="desc-comprar">Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima adipisci officiis
                        explicabo? Non possimus, itaque accusantium maiores </p>
                </div>
                <div class="div-info-comprar">
                    <div class="info-comprar">
                        <input type="hidden" name="id_producto" value="<?php echo $datosP['_id']?>">

                        <h4 class="titulo-comprar"><?php echo $datosP['nombre']?></h4>
                        <h6 class="version-comprar">V1</h6>
                        <h5 class="precio-comprar">$<?php echo $datosP['precio']?>.00</h5>
                        <p class="cantidad-comprar">Cantidad</p>
                        <input class="input-comprar" type="number" name="cantidad_producto" pattern="[1-9]+" value="1" min="1">
                        <br>
                        <input class="btn-comprar" type="submit" value="Pedir producto">
                        <p class="p-info-comprar">
                            Información del producto
                            <i class="plus fas fa-plus" onclick="accion5()"></i>
                            <p class="info desc-info-comprar desaparece">Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                Animi
                                expedita
                                deleniti ab, laudantium hic modi architecto, beatae quos fugit dolor corrupti perferendis sed atque
                                nulla facilis ducimus doloribus repudiandae a.</p>
                            <hr class="hr-comprar">
                        </p>
                    </div>
                </div>
            </section>
        </form>

        <!-- <div id="smart-button-container">
            <div style="text-align: center;">
                <div id="paypal-button-container"></div>
            </div>
        </div>
        <script src="https://www.paypal.com/sdk/js?client-id=AS60qhUgLC9kzTbhIfk80BWustQ8DL-QOb9KyehDfFVdRLtL88Ezm0ZPhra2_wY_XXGjlV8ZJVnXX6-G&currency=MXN" data-sdk-integration-source="button-factory"></script>
        <script src="js/paypal.js"></script> -->

        <script src=" https://kit.fontawesome.com/56b0f801ce.js" crossorigin="anonymous"></script>
        <script src="js/faq.js"></script>
        <script src="js/index.js"></script>
        <script type="text/javascript" src="js/agregar.js"></script>
        <?php include_once "views/script_future.php"?>

</body>
    
</html>

<?php

    }
?>

