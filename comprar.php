<?php

    session_start();

    require_once 'vendor/autoload.php';
    
    $C_productos = (new MongoDB\Client('mongodb+srv://javier:javier12345@cluster0.w3wdi.mongodb.net/opss?retryWrites=true&w=majority'))->opss->productos;
    $datosP = $C_productos->findOne(["codigo" => 111]);

    $cantidadP = $datosP['cantidad'];

        if(isset($_SESSION['admin'])||isset($_SESSION['estandar'])){

            header("Location: control_panel/index.php");
        
        }elseif(isset($_SESSION['usuario'])){

            $correo = $_SESSION['usuario'];

            $C_clientes = (new MongoDB\Client('mongodb+srv://javier:javier12345@cluster0.w3wdi.mongodb.net/opss?retryWrites=true&w=majority'))->opss->clientes; 
            $datos = $C_clientes->findOne(['correo' => $correo]);

            $nombre = $datos['nombres']['nombre'];
            $ape1 = $datos['nombres']['ape1'];

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
                    $cantidad_n = intval($cantidad);
            
                    $total = $precio * $cantidad;
            
                    $C_pedidos = (new MongoDB\Client('mongodb+srv://javier:javier12345@cluster0.w3wdi.mongodb.net/opss?retryWrites=true&w=majority'))->opss->pedidos; 
                    $numP = $C_pedidos -> count();
                    $no = $numP+1;  
            
                    $insert = $C_pedidos->insertOne([
                        'no' => $no,
                        'codigo_mercancia' => $datosP['codigo'],
                        'info_cliente' => ['nombres' => $datos['nombres']['nombre'],
                        'apellidos' => $datos['nombres']['ape1'].' '.$datos['nombres']['ape2'],
                        'telefono' => $datos['telefono'],
                        'calle' => $datos['direccion']['calle'],
                        'numero' => $datos['direccion']['numero'],
                        'col_fracc' => $datos['direccion']['col_fracc'],
                        'cp' => $datos['direccion']['cp'],
                        'ciudad' => $datos['direccion']['ciudad'],
                        ],
                        'correo' => $correo,
                        'cantidad' => $cantidad_n,
                        'total' => $total,
                        'fecha_hora' => $fecha.'/'.$hora_exacta,
                    ]);
            
                    if ($insert) {

                        $cantidadNueva = $cantidadP - $cantidad;

                        $edit_producto = $C_productos -> updateOne(
                            ['codigo' => 111],
                            ['$set' => ['cantidad' => $cantidadNueva, ]]
                        );
                        

                        for ($i=1; $i <= 10000; $i++) { 
                            error_reporting(0);
                            
                            $info_alarma = $C_clientes->findOne(['correo' => $correo], ["alarmas" => ["alarma $i" => 'apagada']]);

                            if ($info_alarma["alarmas"]["alarma $i"] == null) {
                                $agregarAlarma = $C_clientes -> updateOne(
                                    ['correo' => $correo],
                                    ['$set' => ["alarmas.alarma $i" => 'apagada']]
                                );
                                $i = 10000;
                                if ($agregarAlarma) {
                                    echo "<script>alert('Producto pedido')</script>";
                                    echo "<script> location.href='comprar.php' </script>";
                                }                                
                            }

                            
                        }

                        

                    }

                }else {
                    echo "<script>alert('Por el momento no contamos con el producto, una disculpa :(')</script>";
                    // echo "<script> location.href='comprar.php' </script>";
                }
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
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                        <h4 class="titulo-comprar"><?php echo $datosP['nombre']?></h4>
                        <h6 class="version-comprar">V1</h6>
                        <h5 class="precio-comprar">$<?php echo $datosP['precio']?>.00</h5>
                        <p class="cantidad-comprar">Cantidad</p>
                        <input class="input-comprar" type="number" name="cant" value="1" min="1">
                        <br>
                        <label id="label-agregarnota">IMPORTANTE: Después de completar el pago, Da click en pedir producto para guardar tu información automaticamente.</label>
                        <br>
                        <br>
                        <input class="btn-comprar" type="submit" value="Pedir producto" onclick="return ConfirmAdd()">
                    </form>
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
    
    <!-- Fontawesome -->
    <script src=" https://kit.fontawesome.com/56b0f801ce.js" crossorigin="anonymous"></script>
    <!-- Preguntas -->
    <script src="js/faq.js"></script>
    <script src="js/index.js"></script>
    <!-- funcionamiento para agregar de registros (propios) -->
    <script type="text/javascript" src="js/agregar.js"></script>
    <?php include_once "views/script_future.php"?>

</body>
    
</html>

    <?php

     }elseif(!isset($_SESSION['usuario'])){

        if ($cantidadP > 0 || $cantidadP > '0') {


            if(!empty($_POST['cantidad'])){
    
                $cantidad = $_POST['cantidad'];
    
            }
    
            if ($_SERVER["REQUEST_METHOD"] == "POST"){
    
                if(!empty($_POST['nombre'])&&!empty($_POST['ape1'])&&!empty($_POST['telefono'])&&!empty($_POST['calle'])&&!empty($_POST['numero'])&&!empty($_POST['col_fracc'])&&!empty($_POST['cp'])&&!empty($_POST['ciudad'])&&!empty($_POST['cantidad_n'])){
    
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
                        'info_cliente' => ['nombres' => $nombre,
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
    
                        $cantidadNueva = $cantidadP - $cantidad;
    
                        $edit_producto = $C_productos -> updateOne(
                            ['codigo' => '111'],
                            ['$set' => ['cantidad' => $cantidadNueva, ]]
                        );                    
    
                        echo "<script>alert('Producto pedido con exito')</script>";
                        echo "<script> location.href='comprar.php' </script>";
                    }
    
                }
    
            }
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
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">    
            <section id="comprar">
                <div class="div-img-comprar">
                    <img class="img-comprar" src="img/img-comprar.jpg" alt="Alarma OPSS en venta">
                    <p class="desc-comprar">Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima adipisci officiis
                        explicabo? Non possimus, itaque accusantium maiores </p>
                </div>
                <div class="div-info-comprar">
                    <div class="info-comprar">
                            <h4 class="titulo-comprar"><?php echo $datosP['nombre']?></h4>
                            <h6 class="version-comprar">V1</h6>
                            <h5 class="precio-comprar">$<?php echo $datosP['precio']?>.00</h5>
                            <p class="cantidad-comprar">Cantidad</p>
                            <input class="input-comprar" type="number" name="cantidad" value="1" min="1">
                            <br>
                            <!-- <input class="btn-comprar" type="submit" value="Pedir producto"> -->
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

            <section id="agregar2">
                <h1 class="h1-login">Agrega tu dirección</h1>
            
                <div class="div-inputs-agregar2-gnrl">
                    <div class="div-inputs-agregar2">
                        <label for="nombre" id="label-agregar2">Nombre(s)</label>
                        <br>
                        <input class="input-agregar2-form" pattern="[a-zA-Zá-úÁ-Ú ]+" type="text" name="nombre" required id="nombre" value="<?php if(isset($nombre)) echo $nombre?>">
                    </div>
                    
                    <div class="div-inputs-agregar2">
                        <label for="ape1" id="label-agregar2">Primer apellido</label>
                        <br>
                        <input class="input-agregar2-form" pattern="[a-zA-Zá-úÁ-Ú ]+" type="text" name="ape1" required id="ape1" value="<?php if(isset($ape1)) echo $ape1?>">                    
                    </div>

                    <div class="div-inputs-agregar2">
                        <label for="ape2" id="label-agregar2">Segundo apellido</label>
                        <br>
                        <input class="input-agregar2-form" pattern="[a-zA-Zá-úÁ-Ú ]+" type="text" name="ape2" id="ape2" value="<?php if(isset($ape2)) echo $ape2?>">
                    </div>

                    <div class="div-inputs-agregar2">
                        <label for="telefono" id="label-agregar2">Teléfono</label>
                        <br>
                        <input class="input-agregar2-form" title="Solo números" pattern="[0-9]+" type="tel" name="telefono" required id="telefono" minlength="10" maxlength="10" value="<?php if(isset($telefono)) echo $telefono?>">
                    </div>

                    <div class="div-inputs-agregar2">
                        <label for="calle" id="label-agregar2">Calle</label>
                        <br>
                        <input class="input-agregar2-form" type="text" name="calle" required id="calle" value="<?php if(isset($calle)) echo $calle?>">
                    </div>

                    <div class="div-inputs-agregar2">
                        <label for="numero" id="label-agregar2">Número exterior</label>
                        <br>
                        <input class="input-agregar2-form" type="text" name="numero" required id="numero" value="<?php if(isset($numero)) echo $numero?>">
                    </div>

                    <div class="div-inputs-agregar2">
                        <label for="col-fracc" id="label-agregar2">Col. o Fracc.</label>
                        <br>
                        <input class="input-agregar2-form" type="text" name="col_fracc" required id="col-fracc" value="<?php if(isset($col_fracc)) echo $col_fracc?>">
                    </div>

                    <div class="div-inputs-agregar2">
                        <label for="cp" id="label-agregar2">Código Postal</label>
                        <br>
                        <input class="input-agregar2-form" type="tel" title="Solo números" maxlength="5" pattern="[0-9]+" name="cp" required id="cp" value="<?php if(isset($cp)) echo $cp?>">
                    </div>

                    <div class="div-inputs-agregar2">
                        <label for="ciudad" id="label-agregar2">Ciudad</label>
                        <br>
                        <input list="ciudades" class="input-agregar2-form" type="text" name="ciudad" required id="ciudad" value="<?php if(isset($ciudad)) echo $ciudad?>">
                        <datalist id="ciudades">
                            <option value="Aguascalientes">
                            <option value="Baja California">
                            <option value="Baja California Sur">
                            <option value="Campeche">
                            <option value="CDMX">
                            <option value="Coahuila">
                            <option value="Colima">
                            <option value="Chiapas">
                            <option value="Chihuahua">
                            <option value="Durango">
                            <option value="Estado de México">
                            <option value="Guanajuato">
                            <option value="Guerrero">
                            <option value="Hidalgo">
                            <option value="Jalisco">
                            <option value="Michoacán">
                            <option value="Morelos">
                            <option value="Nayarit">
                            <option value="Nuevo León">
                            <option value="Oaxaca">
                            <option value="Puebla">
                            <option value="Querétaro">
                            <option value="Quintana Roo">
                            <option value="Sinaloa">
                            <option value="Sonora">
                            <option value="Tabasco">
                            <option value="Tamaulipas">
                            <option value="Tlaxcala">
                            <option value="Veracruz">
                            <option value="Yucatán">
                            <option value="Zacatecas">
                        </datalist>
                    </div>

                    <div class="div-inputs-agregar2">
                        <label for="cantidad" id="label-agregar2">Cantidad de producto</label>
                        <br>
                        <input class="input-agregar2-form" type="number" title="Solo números" pattern="[0-9]+" min="1" name="cantidad_n" required id="cantidad" value="<?php if(isset($cantidad)) echo $cantidad?>">
                    </div>

                    <label id="label-agregarnota">IMPORTANTE: Después de completar el pago, guarda tu información para poderte mandar el pedido.</label>

                </div>

                    <input class="btn-input-comprar-producto" type="submit" value="Pedir producto" onclick="return ConfirmAdd()">
                    <a class="btn-editar-perfil2" href="comprar.php">Volver atrás</a>

            </section>
        </form>

        <div id="smart-button-container">
            <div style="text-align: center;">
                <div id="paypal-button-container"></div>
            </div>
        </div>
        <script src="https://www.paypal.com/sdk/js?client-id=AS60qhUgLC9kzTbhIfk80BWustQ8DL-QOb9KyehDfFVdRLtL88Ezm0ZPhra2_wY_XXGjlV8ZJVnXX6-G&currency=MXN" data-sdk-integration-source="button-factory"></script>
        <script src="js/paypal.js"></script>

        <script src=" https://kit.fontawesome.com/56b0f801ce.js" crossorigin="anonymous"></script>
        <script src="js/faq.js"></script>
        <script src="js/index.js"></script>
        <?php include_once "views/script_future.php"?>

</body>
    
</html>

<?php

    }
?>

