<?php

    session_start();
    error_reporting(0);

    require_once '../vendor/autoload.php';

    if(isset($_SESSION['admin'])){

            if(!empty($_POST['nombre'])&&!empty($_POST['precio'])&&!empty($_POST['cantidad'])){
                
                $imagen=$_FILES['imagen']['name'];
                $ruta=$_FILES['imagen']['tmp_name'];
                $destino="../img_productos/".$imagen;
                copy($ruta,$destino);

                $nombre = $_POST['nombre'];
                $precio = $_POST['precio'];
                $cantidad = $_POST['cantidad'];

                $precio_n = intval($precio);
                $cantidad_n = intval($cantidad);

                $C_productos = (new MongoDB\Client('mongodb+srv://javier:javier12345@cluster0.w3wdi.mongodb.net/opss?retryWrites=true&w=majority'))->opss->productos; 

                $insert = $C_productos->insertOne([
                    'nombre' => $nombre,
                    'precio' => $precio_n,
                    'cantidad' => $cantidad_n,
                    'imagen' => $destino,
                ]);

                if ($insert) {
                    echo json_encode('correcto');
                }                
            }

    }elseif (isset($_SESSION['usuario'])||!isset($_SESSION['usuario'])) {

        header("Location: ../index.php");

    }elseif(isset($_SESSION['estandar'])){
        header("Location: index.php");
        
    }
?>