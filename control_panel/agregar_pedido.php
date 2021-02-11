<?php


    session_start();

    require_once '../vendor/autoload.php';

    if(isset($_SESSION['admin'])){


        if ($_SERVER["REQUEST_METHOD"] == "POST"){

            if(!empty($_POST['no_pedido'])&&!empty($_POST['nombres'])&&!empty($_POST['apellidos'])&&!empty($_POST['telefono'])&&!empty($_POST['calle'])&&!empty($_POST['numero'])&&!empty($_POST['col_fracc'])&&!empty($_POST['cp'])&&!empty($_POST['total'])&&!empty($_POST['fecha_hora'])){


                $no_pedido = $_POST['no_pedido'];
                $nombres = $_POST['nombres'];
                $apellidos = $_POST['apellidos'];
                $telefono = $_POST['telefono'];
                $calle = $_POST['calle'];
                $numero = $_POST['numero'];
                $col_fracc = $_POST['col_fracc'];
                $cp = $_POST['cp'];
                $total = $_POST['total'];
                $fecha_hora = $_POST['fecha_hora'];
                
                $C_envios = (new MongoDB\Client('mongodb+srv://javier:javier12345@cluster0.w3wdi.mongodb.net/opss?retryWrites=true&w=majority'))->opss->envios; 
                $numE = $C_envios -> count();
                $no = $numE+1;

                $insert = $C_envios->insertOne([
                    'no' => $no,
                    'no_pedido' => $no_pedido,
                    'nombres' => $nombres,
                    'apellidos' => $apellidos,
                    'telefono' => $telefono,
                    'calle' => $calle,
                    'numero' => $numero,
                    'col_fracc' => $col_fracc,
                    'cp' => $cp,
                    'total' => $total,
                    'fecha_hora' => $fecha_hora,
                ]);

                if ($insert) {
                    echo "<script>alert('Pedido enviado')</script>";
                    echo "<script> location.href='pedidos.php' </script>";
                }
            }else{
                echo "<script>alert('Rellene todos los campos')</script>";
            }
        }


        if(isset($_REQUEST['id_pedido'])){

            $id = $_REQUEST['id_pedido'];
            $C_pedidos = (new MongoDB\Client('mongodb+srv://javier:javier12345@cluster0.w3wdi.mongodb.net/opss?retryWrites=true&w=majority'))->opss->pedidos; 
            $datos = $C_pedidos->findOne(['_id' => new MongoDB\BSON\ObjectID($id)]);

        

        }

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enviar pedido</title>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/estilos_responsivo.css">
    <link rel="shortcut icon" href="../img/favicon.jpg">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@100&display=swap" rel="stylesheet">
</head>

<body class="body-agregar2">
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <section id="agregar2">
            <a href="productos.php" class="x-ancla">
                <h1 id="x-agregar">X</h1>
            </a>
            <h1 class="h1-agregar h1-agregar2">Agregar pedido</h1>

            <div class="div-inputs-agregar2-gnrl">
                <div class="div-inputs-agregar2">
                    <label for="no_pedido" id="label-agregar2">No. Pedido</label>
                    <br>
                    <input class="input-agregar2-form" type="text" name="no_pedido" value="<?php echo $datos['no']?>" disabled>
                    <input class="input-agregar2-form" type="hidden" name="no_pedido" value="<?php echo $datos['no']?>">
                </div>
                <div class="div-inputs-agregar2">
                    <label for="correo" id="label-agregar2">Nombre cliente</label>
                    <br>
                    <input class="input-agregar2-form" type="text" name="nombres" value="<?php echo $datos['nombres']?>" disabled>
                    <input class="input-agregar2-form" type="hidden" name="nombres" value="<?php echo $datos['nombres']?>">
                </div>
                <div class="div-inputs-agregar2">
                    <label for="correo" id="label-agregar2">Apellidos cliente</label>
                    <br>
                    <input class="input-agregar2-form" type="text" name="apellidos" value="<?php echo $datos['apellidos']?>" disabled>
                    <input class="input-agregar2-form" type="hidden" name="apellidos" value="<?php echo $datos['apellidos']?>">
                </div>
                <div class="div-inputs-agregar2">
                    <label for="telefono" id="label-agregar2">Teléfono cliente</label>
                    <br>
                    <input class="input-agregar2-form" type="text" name="telefono" value="<?php echo $datos['telefono']?>" disabled>
                    <input class="input-agregar2-form" type="hidden" name="telefono" value="<?php echo $datos['telefono']?>">
                </div>
                <div class="div-inputs-agregar2">
                    <label for="calle" id="label-agregar2">Calle cliente</label>
                    <br>
                    <input class="input-agregar2-form" type="text" name="calle" value="<?php echo $datos['calle']?>" disabled>
                    <input class="input-agregar2-form" type="hidden" name="calle" value="<?php echo $datos['calle']?>">
                </div>
                <div class="div-inputs-agregar2">
                    <label for="numero" id="label-agregar2">Número cliente</label>
                    <br>
                    <input class="input-agregar2-form" type="text" name="numero" value="<?php echo $datos['numero']?>" disabled>
                    <input class="input-agregar2-form" type="hidden" name="numero" value="<?php echo $datos['numero']?>">
                </div>
                <div class="div-inputs-agregar2">
                    <label for="col_fracc" id="label-agregar2">Col. o Fracc. cliente</label>
                    <br>
                    <input class="input-agregar2-form" type="text" name="col_fracc" value="<?php echo $datos['col_fracc']?>" disabled>
                    <input class="input-agregar2-form" type="hidden" name="col_fracc" value="<?php echo $datos['col_fracc']?>">
                </div>
                <div class="div-inputs-agregar2">
                    <label for="cp" id="label-agregar2">Código postal</label>
                    <br>
                    <input class="input-agregar2-form" type="text" name="cp" value="<?php echo $datos['cp']?>" disabled>
                    <input class="input-agregar2-form" type="hidden" name="cp" value="<?php echo $datos['cp']?>">
                </div>
                <div class="div-inputs-agregar2">
                    <label for="total" id="label-agregar2">Total</label>
                    <br>
                    <input class="input-agregar2-form" type="text" name="total" value="<?php echo $datos['total']?>" disabled>
                    <input class="input-agregar2-form" type="hidden" name="total" value="<?php echo $datos['total']?>">
                </div>
                <div class="div-inputs-agregar2">
                    <label for="fecha_hora" id="label-agregar2">Fecha y hora</label>
                    <br>
                    <input class="input-agregar2-form" type="text" name="fecha_hora" value="<?php echo $datos['fecha_hora']?>" disabled>
                    <input class="input-agregar2-form" type="hidden" name="fecha_hora" value="<?php echo $datos['fecha_hora']?>">
                </div>
            </div>
            <input class="btn-input-agregar2" type="submit" value="Enviar pedido">
        </section>
    </form>
</body>

</html>

<?php

    }elseif(isset($_SESSION['usuario'])||!isset($_SESSION['usuario'])) {

        header("Location: ../index.php");
        
    }elseif(isset($_SESSION['estandar'])) {

        header("Location: index.php");
        
    }

?>