<?php

    session_start();

    require_once '../vendor/autoload.php';

    if(isset($_SESSION['admin'])){

        if(!empty($_POST['id_producto'])&&!empty($_POST['nombre'])&&!empty($_POST['cantidad'])&&!empty($_POST['precio'])){

            $id = $_POST['id_producto'];
            $nombre = $_POST['nombre'];
            $precio = $_POST['precio'];
            $cantidad = $_POST['cantidad'];

            $precio_n = intval($precio);
            $cantidad_n = intval($cantidad);

            $C_productos = (new MongoDB\Client('mongodb+srv://javier:javier12345@cluster0.w3wdi.mongodb.net/opss?retryWrites=true&w=majority'))->opss->productos; 

            if (!empty($_FILES['imagen']['name'])) {

                $imagen=$_FILES['imagen']['name'];
                $ruta=$_FILES['imagen']['tmp_name'];
                $destino="../img_productos/".$imagen;
                copy($ruta,$destino);

                $edit_productos = $C_productos -> updateOne(
                    ['_id' => new MongoDB\BSON\ObjectID($id)],
                    ['$set' => ['nombre' => $nombre, 'precio' => $precio_n, 'cantidad' => $cantidad_n, 'imagen' => $destino]]
                );
            }

            $edit_productos = $C_productos -> updateOne(
                ['_id' => new MongoDB\BSON\ObjectID($id)],
                ['$set' => ['nombre' => $nombre, 'precio' => $precio_n, 'cantidad' => $cantidad_n]]
            );
            
            if ($edit_productos) {
                echo json_encode('correcto');
            }
            
        }

    }elseif(isset($_SESSION['usuario'])||!isset($_SESSION['usuario'])) {

        header("Location: ../index.php");
        
    }elseif(isset($_SESSION['estandar'])) {

        header("Location: index.php");
        
    }

?>