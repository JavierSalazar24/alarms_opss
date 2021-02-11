<?php

    session_start();

    require_once '../vendor/autoload.php';

    if(isset($_SESSION['admin'])){


    if ($_SERVER["REQUEST_METHOD"] == "POST"){

        if(!empty($_POST['codigo'])&&!empty($_POST['nombre'])&&!empty($_POST['precio'])&&!empty($_POST['cantidad'])){


            $codigo = $_POST['codigo'];
            $nombre = $_POST['nombre'];
            $precio = $_POST['precio'];
            $cantidad = $_POST['cantidad'];

            $C_productos = (new MongoDB\Client('mongodb+srv://javier:javier12345@cluster0.w3wdi.mongodb.net/opss?retryWrites=true&w=majority'))->opss->productos; 

            $insert = $C_productos->insertOne([
                'codigo' => $codigo,
                'nombre' => $nombre,
                'precio' => $precio,
                'cantidad' => $cantidad,
            ]);

            if ($insert) {
                echo "<script>alert('Admin agregado')</script>";
                echo "<script> location.href='productos.php' </script>";
            }
        }else{
            echo "<script>alert('Rellene todos los campos')</script>";
        }
    }

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar productos</title>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/estilos_responsivo.css">
    <link rel="shortcut icon" href="../img/favicon.jpg">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@100&display=swap" rel="stylesheet">
</head>

<body class="body-agregar">
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <section id="agregar">
            <a href="productos.php" class="x-ancla">
                <h1 id="x-agregar">X</h1>
            </a>
            <h1 class="h1-agregar">Agregar producto</h1>
            <div class="div-inputs-agregar">
                <label for="codigo" id="label-agregar">Código</label>
                <br>
                <input class="input-agregar-form" pattern="[a-zA-Zá-úÁ-Ú ]+" type="text" name="codigo" required id="codigo" value="<?php if(isset($codigo)) echo $codigo?>">
            </div>
            <div class="div-inputs-agregar">
                <label for="nombre" id="label-agregar">Nombre</label>
                <br>
                <input class="input-agregar-form" pattern="[a-zA-Zá-úÁ-Ú ]+" type="text" name="nombre" required id="nombre" value="<?php if(isset($nombre)) echo $nombre?>">
            </div>
            <div class="div-inputs-agregar">
                <label for="precio" id="label-agregar">Precio</label>
                <br>
                <input class="input-agregar-form" pattern="[a-zA-Zá-úÁ-Ú ]+" type="text" name="precio" required id="precio" value="<?php if(isset($precio)) echo $precio?>">
            </div>
            <div class="div-inputs-agregar">
                <label for="cantidad" id="label-agregar">Cantidad</label>
                <br>
                <input class="input-agregar-form" title="Solo números" pattern="[0-9]+" type="tel" name="cantidad" required id="cantidad" value="<?php if(isset($cantidad)) echo $cantidad?>">
            </div>
            <input class="btn-input-agregar" type="submit" value="Agregar producto">
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