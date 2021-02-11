<?php

    session_start();

    require_once 'vendor/autoload.php';

    $db = new MongoDB\Client('mongodb+srv://javier:javier12345@cluster0.w3wdi.mongodb.net/opss?retryWrites=true&w=majority');

    $C_productos = $db->opss->productos;
    
    // $C_productos = (new MongoDB\Client('mongodb+srv://javier:javier12345@cluster0.w3wdi.mongodb.net/opss?retryWrites=true&w=majority'))->opss->productos;

    $datosP = $C_productos->findOne(["codigo" => "111"]);

    $cantidadP = $datosP['cantidad'];        

        if(isset($_SESSION['admin'])||isset($_SESSION['estandar'])){

            header("Location: control_panel/index.php");
        
        }elseif(isset($_SESSION['usuario'])){

            $correo = $_SESSION['usuario'];

            $C_clientes = (new MongoDB\Client('mongodb+srv://javier:javier12345@cluster0.w3wdi.mongodb.net/opss?retryWrites=true&w=majority'))->opss->clientes; 
            $datos = $C_clientes->findOne(['correo' => $correo]);

            $nombre = $datos['nombre'];
            $ape1 = $datos['ape1'];

            if ($_SERVER["REQUEST_METHOD"] == "POST"){

                if ($cantidadP > 0 || $cantidadP > '0') {

        
                    date_default_timezone_set('America/Mexico_City');
            
                    setlocale(LC_ALL, '');
            
                    $dia=date('d');
                    $mes=date('m');
                    $anio=date('Y');
            
                    $fecha=$dia.'-'.$mes.'-'.$anio;
            
                    $hora=date('h');
                    $minuto=date('i');
                    $segundo=date('s');
            
                    $hora_exacta=$hora.':'.$minuto.':'.$segundo;
            
                    $cantidad = $_POST['cant'];
            
                    $precio = $datosP['precio'];
            
                    $total = $precio * $cantidad;
            
                    $C_pedidos = (new MongoDB\Client('mongodb+srv://javier:javier12345@cluster0.w3wdi.mongodb.net/opss?retryWrites=true&w=majority'))->opss->pedidos; 
                    $numP = $C_pedidos -> count();
                    $no = $numP+1;  
            
                    $insert = $C_pedidos->insertOne([
                        'no' => $no,
                        'coidigo_mercancia' => $datosP['codigo'],
                        'nombres' => $datos['nombre'],
                        'apellidos' => $datos['ape1'].' '.$datos['ape2'],
                        'telefono' => $datos['telefono'],
                        'calle' => $datos['calle'],
                        'col_fracc' => $datos['col_fracc'],
                        'cp' => $datos['cp'],
                        'numero' => $datos['numero'],
                        'cantidad' => $cantidad,
                        'total' => $total,
                        'fecha_hora' => $fecha.'/'.$hora_exacta,
                    ]);
            
                    if ($insert) {


                        $cantidadNueva = $cantidadP - $cantidad;

                        $edit_producto = $C_productos -> updateOne(
                            ['codigo' => '111'],
                            ['$set' => ['cantidad' => $cantidadNueva, ]]
                        );
                        echo "<script>alert('Producto pedido')</script>";
                        echo "<script> location.href='comprar.php' </script>";
                    }
                }else {
                    echo "<script>alert('Por el momento no contamos con el producto, una disculpa :(')</script>";
                    echo "<script> location.href='comprar.php' </script>";
                }
            }

    
    ?>
    
    <!DOCTYPE html>
    <html lang="es">
    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Comprar</title>
        <link rel="stylesheet" href="css/estilos.css">
        <link rel="stylesheet" href="css/estilos_responsivo.css">
        <script src="js/scrollreveal.js"></script>
        <link rel="shortcut icon" href="img/favicon.jpg">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@100&display=swap" rel="stylesheet">
    </head>
    
    <body class="body-comprar">
        
        <?php include "partes/_navs.php" ?>
    
        <section id="comprar">
            <div class="comprar-div">
                <div class="div-img-comprar">
                    <img class="img-comprar" src="img/img-comprar.jpg" alt="">
                    <p class="desc-comprar">Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima adipisci officiis
                        explicabo? Non possimus, itaque accusantium maiores </p>
                </div>
                <div class="div-info-comprar">
                    <div class="info-comprar">
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                            <h4 class="titulo-comprar"><?php echo $datosP['nombre']?></h4>
                            <h6 class="version-comprar">V1</h6>
                            <h5 class="precio-comprar"><?php echo $datosP['precio']?></h5>
                            <p class="cantidad-comprar">Cantidad</p>
                            <input class="input-comprar" type="number" name="cant" value="1" min="1">
                            <br>
                            <input class="btn-comprar" type="submit" value="Pedir producto">
                        </form>
                        <p class="p-info-comprar">
                            Información del producto
                            <i class="plus fas fa-plus" onclick="accion5()"></i>
                        <p class="info desc-info-comprar desaparece">Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                            Animi
                            expedita
                            deleniti ab, laudantium hic modi architecto, beatae quos fugit dolor corrupti perferendis sed atque
                            nulla facilis ducimus doloribus repudiandae a.</p>
                        <hr>
                        </p>
                    </div>
                </div>
            </div>
        </section>
    
    <script src=" https://kit.fontawesome.com/56b0f801ce.js" crossorigin="anonymous"></script>
    <script src="js/faq.js"></script>
    <script src="js/index.js"></script>

</body>
    
</html>

    <?php

     }elseif(!isset($_SESSION['usuario'])){

    ?>

<!DOCTYPE html>
    <html lang="es">
    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Comprar</title>
        <link rel="stylesheet" href="css/estilos.css">
        <link rel="stylesheet" href="css/estilos_responsivo.css">
        <script src="js/scrollreveal.js"></script>
        <link rel="shortcut icon" href="img/favicon.jpg">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@100&display=swap" rel="stylesheet">
    </head>
    
    <body class="body-comprar">
        
        <?php include "partes/_nav.php" ?>
    
        <section id="comprar">
            <div class="div-img-comprar">
                <img class="img-comprar" src="img/img-comprar.jpg" alt="">
                <p class="desc-comprar">Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima adipisci officiis
                    explicabo? Non possimus, itaque accusantium maiores </p>
            </div>
            <div class="div-info-comprar">
                <div class="info-comprar">
                    <form action="comprar_producto.php" method="POST">
                        <h4 class="titulo-comprar"><?php echo $datosP['nombre']?></h4>
                        <h6 class="version-comprar">V1</h6>
                        <h5 class="precio-comprar"><?php echo $datosP['precio']?></h5>
                        <p class="cantidad-comprar">Cantidad</p>
                        <input class="input-comprar" type="number" name="cantidad" value="1" min="1">
                        <br>
                        <input class="btn-comprar" type="submit" value="Pedir producto">
                    </form>
                    <p class="p-info-comprar">
                        Información del producto
                        <i class="plus fas fa-plus" onclick="accion5()"></i>
                        <p class="info desc-info-comprar desaparece">Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                            Animi
                            expedita
                            deleniti ab, laudantium hic modi architecto, beatae quos fugit dolor corrupti perferendis sed atque
                            nulla facilis ducimus doloribus repudiandae a.</p>
                    <hr>
                    </p>
                </div>
            </div>
        </section>
    
        <script src=" https://kit.fontawesome.com/56b0f801ce.js" crossorigin="anonymous">
        </script>
        <script src="js/faq.js"></script>
        <script src="js/index.js"></script>
    </body>
    
    </html>

<?php

    }
?>

