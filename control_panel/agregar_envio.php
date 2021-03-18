<?php

    session_start();
    error_reporting(0);

    require_once '../vendor/autoload.php';

    if(isset($_SESSION['admin'])){


        if ($_SERVER["REQUEST_METHOD"] == "POST"){

            if(!empty($_POST['no_envio'])&&!empty($_POST['total'])&&!empty($_POST['fecha_hora'])){


                $no_envio = $_POST['no_envio'];
                $total = $_POST['total'];
                $fecha_hora = $_POST['fecha_hora'];

                $no_envio_n = intval($no_envio);
                $total_n = intval($total);

                
                $C_ventas = (new MongoDB\Client('mongodb+srv://javier:javier12345@cluster0.w3wdi.mongodb.net/opss?retryWrites=true&w=majority'))->opss->ventas; 
                $numV = $C_ventas -> count();
                $no = $numV+1;

                $insert = $C_ventas->insertOne([
                    'no' => $no,
                    'no_envio' => $no_envio_n,
                    'total_compra' => $total_n,
                    'fecha_hora' => $fecha_hora,
                ]);

                if ($insert) {
                    echo "<script>alert('Envío entregado')</script>";
                    echo "<script> location.href='envios.php' </script>";
                }
            }else{
                echo "<script>alert('Rellene todos los campos')</script>";
            }
        }


            if(isset($_REQUEST['id_envio'])){

                $id = $_REQUEST['id_envio'];
                $C_envio = (new MongoDB\Client('mongodb+srv://javier:javier12345@cluster0.w3wdi.mongodb.net/opss?retryWrites=true&w=majority'))->opss->envios; 
                $datos = $C_envio->findOne(['_id' => new MongoDB\BSON\ObjectID($id)]);

            }

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img/favicon1.png">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/estilos_responsivo.css">
    <title>Envío entregado</title>
</head>

<body class="body-agregar">
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <section id="agregar">
            <a href="envios.php" class="x-ancla">
                <h1 id="x-agregar">X</h1>
            </a>
            <h1 class="h1-agregar">Envío entregado</h1>
            <div class="div-inputs-agregar">
                <label for="no_pedido" id="label-agregar">No. Envío</label>
                <br>
                <input class="input-agregar-form" type="text" name="no_envio" value="<?php echo $datos['no']?>" disabled>
                <input class="input-agregar-form" type="hidden" name="no_envio" value="<?php echo $datos['no']?>">
            </div>
            <div class="div-inputs-agregar">
                <label for="total" id="label-agregar">Total</label>
                <br>
                <input class="input-agregar-form" type="text" name="total" value="<?php echo $datos['total']?>" disabled>
                <input class="input-agregar-form" type="hidden" name="total" value="<?php echo $datos['total']?>">
            </div>
            <div class="div-inputs-agregar">
                <label for="fecha_hora" id="label-agregar">Fecha y hora</label>
                <br>
                <input class="input-agregar-form" type="text" name="fecha_hora" value="<?php echo $datos['fecha_hora']?>" disabled>
                <input class="input-agregar-form" type="hidden" name="fecha_hora" value="<?php echo $datos['fecha_hora']?>">
            </div>
            <input class="btn-input-agregar" type="submit" value="Envío entregdo">
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