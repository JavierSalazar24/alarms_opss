<?php

    session_start();
    require_once 'vendor/autoload.php';

    if (empty($_REQUEST['id_producto'])) {
        header("Location: productos.php");
    }else {
        $id_pedido = $_REQUEST['id_producto'];
        $C_pedidos = (new MongoDB\Client('mongodb+srv://javier:javier12345@cluster0.w3wdi.mongodb.net/opss?retryWrites=true&w=majority'))->opss->pedidos;
        $datosPedidos = $C_pedidos->findOne(['id_mercancia' => $id_pedido],['sort' => ['fecha_hora' => -1]]);
        
        $C_productos = (new MongoDB\Client('mongodb+srv://javier:javier12345@cluster0.w3wdi.mongodb.net/opss?retryWrites=true&w=majority'))->opss->productos;
        $datosProductos = $C_productos->findOne(['_id' => new MongoDB\BSON\ObjectID($id_pedido)]);
                
    }

    date_default_timezone_set('America/Mexico_City');
    
    setlocale(LC_ALL, '');
    
    $dia=date('d');
    $mes=strftime('%B');
    $anio=date('Y');
    
    $fecha=$dia . ' de ' . $mes . ' del ' . $anio;

    $hora=date('h');
    $minuto=date('i');
    $segundo=date('s');

    $hora_exacta=$hora.':'.$minuto.':'.$segundo;

    if(isset($_SESSION['admin'])||isset($_SESSION['estandar'])){
    
        header("Location: control_panel/index.php");
    
    }elseif(isset($_SESSION['usuario'])){

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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Transiciones -->
    <script src="js/scrollreveal.js"></script>
    <!-- Estilos -->
    <link rel="shortcut icon" href="img/favicon1.png">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/future/css/main.css" />
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/estilos_responsivo.css">
    <title>Pagar | OPSS</title>
</head>

<body class="body-direccion">

    <?php include "partes/_navs.php" ?>

    <section id="comprar">
        <div class="comprar-div">
            <div class="div-img-comprar">
                <img class="img-comprar" src="img_produtos/<?php echo $datosProductos['imagen']?>" alt="<?php echo $datosProductos['descripcion']?>">
                <p class="desc-comprar mt-3"><?php echo $datosProductos['descripcion']?></p>
            </div>
            <div class="div-info-comprar">
                <div class="info-comprar">
                    <h4 class="titulo-comprar mb-4"><?php echo $datosProductos['nombre']?></h4>
                    <h6 class="version-comprar pt-2 mb-4">V1</h6>
                    <h5 class="precio-comprar pt-1">$<?php echo $datosProductos['precio']?>.00 MXN.</h5>
                    <p class="cantidad-comprar pt-2">Cantidad</p>
                    <input class="input-comprar" type="number" value="<?php echo $datosPedidos['cantidad']?>" readonly>
                    <p class="p-info-comprar">
                        Información del pago
                    <i class="plus fas fa-plus" onclick="accion()"></i>
                    <p class="info desc-info-comprar desaparece2">
                        El pago debe ser hecho por medio de paypal, con el fin de cuidar su información y poder realizar devoluciones si es necesario.
                    </p>
                    <hr class="bg-dark">
                    </p>
                    <div id="smart-button-container">
                        <div style="text-align: center;">
                            <div id="paypal-button-container"></div>
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
    </section>

    <!-- Fontsaesome -->
    <script src=" https://kit.fontawesome.com/56b0f801ce.js" crossorigin="anonymous"></script>
    <!-- Botón mostrar más -->
    <script>
        function accion() {
            var ancla = document.getElementsByClassName("info");
            var ancla2 = document.getElementsByClassName("plus");
            for (var i = 0; i < ancla.length; i++) {
                ancla[i].classList.toggle("desaparece2");
                ancla2[i].classList.toggle("fa-minus");
            }
        }
    </script>
    <!-- Transiciones -->
    <script src="js/index.js"></script>
    <!-- CDN Sweetalert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="js/sweetalert.js"></script>
    <!-- Estilos Script -->
    <?php include_once "views/script_bootstrap.php"?>
    <?php include_once "views/script_future.php"?>
    <!-- Botones y funcionamiento paypal -->
    <script src="https://www.paypal.com/sdk/js?client-id=AS60qhUgLC9kzTbhIfk80BWustQ8DL-QOb9KyehDfFVdRLtL88Ezm0ZPhra2_wY_XXGjlV8ZJVnXX6-G&currency=MXN" data-sdk-integration-source="button-factory"></script>
    <script src="js/paypal.js"></script>
</body>

</html>

<?php

    }elseif(!isset($_SESSION['usuario'])){
        header("Location: index.php");
    }

?>