<?php

    session_start();
    error_reporting(0);

    require_once '../vendor/autoload.php';

    if(isset($_SESSION['admin'])){

        if(isset($_REQUEST['id_envio'])){

            $id = $_REQUEST['id_envio'];
            $C_envio = (new MongoDB\Client('mongodb+srv://javier:javier12345@cluster0.w3wdi.mongodb.net/opss?retryWrites=true&w=majority'))->opss->envios; 
            $datos = $C_envio->findOne(['_id' => new MongoDB\BSON\ObjectID($id)]);

            $no_envio = $datos['no_pedido'];
            $total = $datos['total'];
            $fecha_hora = $datos['fecha_hora'];

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
                header('Location: ventas.php');
            }

        }

    }elseif(isset($_SESSION['usuario'])||!isset($_SESSION['usuario'])) {

        header("Location: ../index.php");
        
    }elseif(isset($_SESSION['estandar'])) {

        header("Location: index.php");
        
    }

?>