<?php

    error_reporting(0);

    require_once __DIR__ . '/vendor/autoload.php';

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

    $C_productos = (new MongoDB\Client('mongodb+srv://javier:javier12345@cluster0.w3wdi.mongodb.net/opss?retryWrites=true&w=majority'))->opss->productos; 
    $datosP = $C_productos->findOne(["codigo" => "111"]);
    $cantidadP = $datosP['cantidad'];

    if ($cantidadP > 0 || $cantidadP > '0') {


        if(!empty($_POST['cantidad'])){

            $cantidad = $_POST['cantidad'];

        }

        if ($_SERVER["REQUEST_METHOD"] == "POST"){

            if(!empty($_POST['nombre'])&&!empty($_POST['ape1'])&&!empty($_POST['telefono'])&&!empty($_POST['calle'])&&!empty($_POST['numero'])&&!empty($_POST['col_fracc'])&&!empty($_POST['cp'])&&!empty($_POST['cantidad_n'])){

                $nombre = $_POST['nombre'];
                $ape1 = $_POST['ape1'];
                $ape2 = $_POST['ape2'];
                $telefono = $_POST['telefono'];
                $calle = $_POST['calle'];
                $numero = $_POST['numero'];
                $col_fracc = $_POST['col_fracc'];
                $cp = $_POST['cp'];
                $cantidad_n = $_POST['cantidad_n'];
        
                $precio = $datosP['precio'];
        
                $total = $precio * $cantidad_n;
        
                $C_pedidos = (new MongoDB\Client('mongodb+srv://javier:javier12345@cluster0.w3wdi.mongodb.net/opss?retryWrites=true&w=majority'))->opss->pedidos; 
                $numP = $C_pedidos -> count();
                $no = $numP+1;           

                $insert = $C_pedidos -> insertOne([
                    'no' => $no,
                    'codigo_mercancia' => $datosP['codigo'],
                    'nombres' => $nombre,
                    'apellidos' => $ape1.' '.$ape2,
                    'telefono' => $telefono,
                    'calle' => $calle,
                    'numero' => $numero,
                    'col_fracc' => $col_fracc,
                    'cp' => $cp,
                    'cantidad' => $cantidad_n,
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



?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comprar producto</title>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/estilos_responsivo.css">
    <script src="js/scrollreveal.js"></script>
    <link rel="shortcut icon" href="img/favicon.jpg">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@100&display=swap" rel="stylesheet">
</head>

<body class="body-agregar2">
    <section id="agregar2">
            <a href="agregar.php" class="x-ancla">
                <h1 id="x-login">X</h1>
            </a>
            <h1 class="h1-login">Agrega tu dirección</h1>
        
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
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
                    <label for="cantidad" id="label-agregar2">Cantidad de producto</label>
                    <br>
                    <input class="input-agregar2-form" type="number" title="Solo números" pattern="[0-9]+" min="1" name="cantidad_n" required id="cantidad" value="<?php if(isset($cantidad)) echo $cantidad?>">
                </div>

            </div>

                <input class="btn-input-registrar" type="submit" value="Pedir producto">
                <a class="btn-editar-perfil2" href="comprar.php"><input class="btn-input-perfil2" type="text" value="Volver atras" disabled></a>

        </form>
    </section>

    <script src="js/index.js"></script>
</body>

</html>

<?php

    }else {
        
        echo "<script>alert('Por el momento no contamos con el producto, una disculpa :(')</script>";
        echo "<script> location.href='comprar.php' </script>";

    }

?>