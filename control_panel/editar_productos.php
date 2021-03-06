<?php

    session_start();

    require_once '../vendor/autoload.php';

    if(isset($_SESSION['admin'])){

        $id_req = $_REQUEST['id_productos'];

        $C_productos = (new MongoDB\Client('mongodb+srv://javier:javier12345@cluster0.w3wdi.mongodb.net/opss?retryWrites=true&w=majority'))->opss->productos; 
        $datos = $C_productos->findOne(['_id' => new MongoDB\BSON\ObjectID($id_req)]);

            $id = $datos["_id"];
            $nombre = $datos["nombre"];
            $cantidad = $datos["cantidad"];
            $precio = $datos["precio"];

        if ($_SERVER["REQUEST_METHOD"] == "POST"){

            if(!empty($_POST['id_productos_edit'])&&!empty($_POST['nombre_edit'])&&!empty($_POST['cantidad_edit'])&&!empty($_POST['precio_edit'])){

                $id_edit = $_POST['id_productos_edit'];
                $nombre_edit = $_POST['nombre_edit'];
                $precio_edit = $_POST['precio_edit'];
                $cantidad_edit = $_POST['cantidad_edit'];

                $precio_edit_n = intval($precio_edit);
                $cantidad_edit_n = intval($cantidad_edit);



                $edit_productos = $C_productos -> updateOne(
                    ['_id' => new MongoDB\BSON\ObjectID($id_edit)],
                    ['$set' => ['nombre' => $nombre_edit, 'precio' => $precio_edit_n, 'cantidad' => $cantidad_edit_n]]
                );

                if ($edit_productos) {
                    echo "<script>alert('Producto actualizado con exito')</script>";
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
    <title>Editar Productos</title>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/estilos_responsivo.css">
    <link rel="shortcut icon" href="../img/favicon1.png">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@100&display=swap" rel="stylesheet">
</head>

<body class="body-agregar">
    <section id="agregar">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div id="div-ancla">
                <a href="productos.php" class="x-ancla">
                    <h1 id="x-agregar">X</h1>
                </a>
            </div>
            <h1 class="h1-agregar">Editar Productos</h1>

            <div class="div-inputs-agregar">
                <label for="nombre" id="label-agregar">Nombre</label>
                <br>
                <input class="input-agregar-form" type="hidden" name="id_productos_edit" value="<?php echo $id;?>">
                <input class="input-agregar-form" type="text" name="nombre_edit" required id="nombre" value="<?php echo $nombre;?>">
            </div>

            <div class="div-inputs-agregar">
                <label for="precio" id="label-agregar">Precio</label>
                <br>
                <input class="input-agregar-form" type="number" name="precio_edit" required id="precio" value="<?php echo $precio;?>">
            </div>

            <div class="div-inputs-agregar">
                <label for="cantidad" id="label-agregar">Cantidad</label>
                <br>
                <input class="input-agregar-form" type="number" name="cantidad_edit" required id="cantidad" value="<?php echo $cantidad;?>">
            </div>

            <input class="btn-input-agregar" type="submit" value="Editar producto">
        </form>
    </section>
</body>

</html>

<?php

    }elseif(isset($_SESSION['usuario'])||!isset($_SESSION['usuario'])) {

        header("Location: ../index.php");
        
    }elseif(isset($_SESSION['estandar'])) {

        header("Location: index.php");
        
    }

?>