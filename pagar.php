<?php

    session_start();
    require_once 'vendor/autoload.php';

    if (empty($_REQUEST['id_producto'])) {
        echo "<script>
                setTimeout(cargaAlertaErrorDatos, 500);
                function cargaAlertaErrorDatos(){
                    AlertaErrorDatos();
                } 
                setTimeout(ReedireccionProductos, 3500);
                function ReedireccionProductos(){
                    location.href = 'productos.php';
                }          
            </script>";
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
    <title>Pagar</title>
    <script src="js/scrollreveal.js"></script>
    <link rel="shortcut icon" href="img/favicon1.png">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@100&display=swap" rel="stylesheet">
    <?php include_once "views/estilos_future.php"?>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/estilos_responsivo.css">
</head>

<body class="body-comprar">

    <?php include "partes/_navs.php" ?>

    <section id="comprar">
        <div class="comprar-div">
            <div class="div-img-comprar">
                <img class="img-comprar" src="img/img-comprar.jpg" alt="Alarma OPSS en venta">
                <p class="desc-comprar">Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima adipisci officiis
                    explicabo? Non possimus, itaque accusantium maiores </p>
            </div>
            <div class="div-info-comprar">
                <div class="info-comprar">
                    <h4 class="titulo-comprar"><?php echo $datosProductos['nombre']?></h4>
                    <h6 class="version-comprar">V1</h6>
                    <h5 class="precio-comprar">$<?php echo $datosProductos['precio']?>.00 MXN.</h5>
                    <p class="cantidad-comprar">Cantidad</p>
                    <input class="input-comprar" type="number" value="<?php echo $datosPedidos['cantidad']?>" disabled>
                    <p class="p-info-comprar">
                        Información del pago
                    <i class="plus fas fa-plus" onclick="accion5()"></i>
                    <p class="info desc-info-comprar desaparece">
                        El pago debe ser hecho por medio de paypal, con el fin de cuidar su información y poder realizar devoluciones si es necesario.
                    </p>
                    <hr class="hr-comprar">
                    </p>
                    <div id="smart-button-container">
                        <div style="text-align: center;">
                            <div id="paypal-button-container"></div>
                        </div>
                    </div>
                    <script src="https://www.paypal.com/sdk/js?client-id=AS60qhUgLC9kzTbhIfk80BWustQ8DL-QOb9KyehDfFVdRLtL88Ezm0ZPhra2_wY_XXGjlV8ZJVnXX6-G&currency=MXN" data-sdk-integration-source="button-factory"></script>
                    <script src="js/paypal.js"></script>
                </div>
            </div>
        </div>
    </section>

    <script src=" https://kit.fontawesome.com/56b0f801ce.js" crossorigin="anonymous"></script>
    <script src="js/faq.js"></script>
    <script src="js/index.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="js/sweetalert.js"></script>
</body>

</html>

<?php

    }elseif(!isset($_SESSION['usuario'])){

            if(!empty($_POST['id_producto'])&&!empty($_POST['nombre'])&&!empty($_POST['ape1'])&&!empty($_POST['telefono'])&&!empty($_POST['calle'])&&!empty($_POST['numero'])&&!empty($_POST['col_fracc'])&&!empty($_POST['cp'])&&!empty($_POST['ciudad'])&&!empty($_POST['cantidad_n'])){

                $id_producto = $_POST['id_producto'];

                $C_productos = (new MongoDB\Client('mongodb+srv://javier:javier12345@cluster0.w3wdi.mongodb.net/opss?retryWrites=true&w=majority'))->opss->productos;
                $datosP = $C_productos->findOne(['_id' => new MongoDB\BSON\ObjectID($id_producto)]);
                $cantidadP = $datosP['cantidad'];

                $nombre = $_POST['nombre'];
                $ape1 = $_POST['ape1'];
                $ape2 = $_POST['ape2'];
                $telefono = $_POST['telefono'];
                $calle = $_POST['calle'];
                $numero = $_POST['numero'];
                $col_fracc = $_POST['col_fracc'];
                $cp = $_POST['cp'];
                $ciudad = $_POST['ciudad'];
                $cantidad_n = $_POST['cantidad_n'];

                $telefono_n = intval($telefono);
                $numero_n = intval($numero);
                $cp_n = intval($cp);
                $cantidad_n_n = intval($cantidad_n);
        
                $precio = $datosP['precio'];        
                $total = $precio * $cantidad_n;
        
                $C_pedidos = (new MongoDB\Client('mongodb+srv://javier:javier12345@cluster0.w3wdi.mongodb.net/opss?retryWrites=true&w=majority'))->opss->pedidos; 
                $numP = $C_pedidos -> count();
                $no = $numP+1;           

                $insert = $C_pedidos -> insertOne([
                    'no' => $no,
                    'codigo_mercancia' => $datosP['codigo'],
                    'info_cliente' => [
                        'nombres' => $nombre,
                        'apellidos' => $ape1.' '.$ape2,
                        'telefono' => $telefono_n,
                        'calle' => $calle,
                        'numero' => $numero_n,
                        'col_fracc' => $col_fracc,
                        'cp' => $cp_n,
                        'ciudad' => $ciudad,
                    ],
                    'cantidad' => $cantidad_n_n,
                    'total' => $total,
                    'fecha_hora' => $fecha.'/'.$hora_exacta,
                ]);

                if ($insert) {

                    $cantidadNueva = $cantidadP - $cantidad_n_n;

                    $edit_producto = $C_productos -> updateOne(
                        ['_id' => new MongoDB\BSON\ObjectID($id_producto)],
                        ['$set' => ['cantidad' => $cantidadNueva, ]]
                    );
                }

            }else{

                echo "<script>alert('Datos vacíos')</script>";
                echo "<script> location.href='productos.php' </script>";
                
            }

        

?>

<!DOCTYPE html>
<html lang="es">
    
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagar</title>
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

    <section id="comprar">
        <div class="comprar-div">
            <div class="div-img-comprar">
                <img class="img-comprar" src="img/img-comprar.jpg" alt="Alarma OPSS en venta">
                <p class="desc-comprar">Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima adipisci officiis
                    explicabo? Non possimus, itaque accusantium maiores </p>
            </div>
            <div class="div-info-comprar">
                <div class="info-comprar">
                    <h4 class="titulo-comprar"><?php echo $datosP['nombre']?></h4>
                    <h6 class="version-comprar">V1</h6>
                    <h5 class="precio-comprar">$<?php echo $datosP['precio']?>.00 MXN.</h5>
                    <p class="cantidad-comprar">Cantidad</p>
                    <input class="input-comprar" type="number" value="1" disabled>
                    <input class="input-comprar" type="hidden" value="1">
                    <p class="p-info-comprar">
                        Información del pago
                    <i class="plus fas fa-plus" onclick="accion5()"></i>
                    <p class="info desc-info-comprar desaparece">
                        El pago debe ser hecho por medio de paypal, con el fin de cuidar su información y poder realizar devoluciones si es necesario.
                    </p>
                    <hr class="hr-comprar">
                    </p>
                    <div id="smart-button-container">
                        <div style="text-align: center;">
                            <div id="paypal-button-container"></div>
                        </div>
                    </div>
                    <script src="https://www.paypal.com/sdk/js?client-id=AS60qhUgLC9kzTbhIfk80BWustQ8DL-QOb9KyehDfFVdRLtL88Ezm0ZPhra2_wY_XXGjlV8ZJVnXX6-G&currency=MXN" data-sdk-integration-source="button-factory"></script>
                    <script src="js/paypal.js"></script>
                </div>
            </div>
        </div>
    </section>

    <script src=" https://kit.fontawesome.com/56b0f801ce.js" crossorigin="anonymous"></script>
    <script src="js/faq.js"></script>
    <script src="js/index.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="js/sweetalert.js"></script>
</body>

</html>

<?php

    }

?>