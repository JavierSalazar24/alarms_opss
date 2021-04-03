<?php

    session_start();

    if(isset($_SESSION['admin'])){

        require_once '../vendor/autoload.php';

        if(isset($_REQUEST['id_admin'])){

            $id_admin = $_REQUEST['id_admin'];

            $C_admin = (new MongoDB\Client('mongodb+srv://javier:javier12345@cluster0.w3wdi.mongodb.net/opss?retryWrites=true&w=majority'))->opss->administradores; 

            $delete = $C_admin->deleteMany(['_id' => new MongoDB\BSON\ObjectID($id_admin)]);

            if ($delete) {
                
                header('Location: administradores.php');

            }
        
        }elseif (isset($_REQUEST['id_cliente'])) {

            $id_cliente = $_REQUEST['id_cliente'];

            $C_cliente = (new MongoDB\Client('mongodb+srv://javier:javier12345@cluster0.w3wdi.mongodb.net/opss?retryWrites=true&w=majority'))->opss->clientes; 

            $delete = $C_cliente->deleteMany(['_id' => new MongoDB\BSON\ObjectID($id_cliente)]);

            if ($delete) {
                
                header('Location: clientes.php');

            }

        }elseif (isset($_REQUEST['id_producto'])) {

            $id_producto = $_REQUEST['id_producto'];

            $C_producto = (new MongoDB\Client('mongodb+srv://javier:javier12345@cluster0.w3wdi.mongodb.net/opss?retryWrites=true&w=majority'))->opss->productos; 

            $delete = $C_producto->deleteMany(['_id' => new MongoDB\BSON\ObjectID($id_producto)]);

            if ($delete) {
                
                header('Location: productos.php');

            }

            
        }elseif (isset($_REQUEST['id_mensaje'])) {

            $id_mensaje = $_REQUEST['id_mensaje'];

            $C_mensaje = (new MongoDB\Client('mongodb+srv://javier:javier12345@cluster0.w3wdi.mongodb.net/opss?retryWrites=true&w=majority'))->opss->mensajes; 

            $delete = $C_mensaje->deleteMany(['_id' => new MongoDB\BSON\ObjectID($id_mensaje)]);

            if ($delete) {
                
                header('Location: mensajes.php');

            }
            
        }elseif (isset($_REQUEST['id_pedido'])) {

            $id_pedido = $_REQUEST['id_pedido'];

            $C_pedido = (new MongoDB\Client('mongodb+srv://javier:javier12345@cluster0.w3wdi.mongodb.net/opss?retryWrites=true&w=majority'))->opss->pedidos; 

            $delete = $C_pedido->deleteMany(['_id' => new MongoDB\BSON\ObjectID($id_pedido)]);

            if ($delete) {
                header('Location: pedidos.php');
            }
            
        }elseif (isset($_REQUEST['id_envio'])) {

            $id_envio = $_REQUEST['id_envio'];

            $C_envio = (new MongoDB\Client('mongodb+srv://javier:javier12345@cluster0.w3wdi.mongodb.net/opss?retryWrites=true&w=majority'))->opss->envios; 

            $delete = $C_envio->deleteMany(['_id' => new MongoDB\BSON\ObjectID($id_envio)]);

            if ($delete) {
                
                header('Location: envios.php');

            }
            
        }elseif (isset($_REQUEST['id_venta'])) {

            $id_venta = $_REQUEST['id_venta'];

            $C_venta = (new MongoDB\Client('mongodb+srv://javier:javier12345@cluster0.w3wdi.mongodb.net/opss?retryWrites=true&w=majority'))->opss->ventas; 

            $delete = $C_venta->deleteMany(['_id' => new MongoDB\BSON\ObjectID($id_venta)]);

            if ($delete) {
                
                header('Location: ventas.php');

            }
            
        }elseif (isset($_REQUEST['id_nota'])) {

            $id_nota = $_REQUEST['id_nota'];

            $C_nota = (new MongoDB\Client('mongodb+srv://javier:javier12345@cluster0.w3wdi.mongodb.net/opss?retryWrites=true&w=majority'))->opss->notas; 

            $delete = $C_nota->deleteMany(['_id' => new MongoDB\BSON\ObjectID($id_nota)]);

            if ($delete) {
                
                header('Location: notas.php');

            }
            
        }elseif (isset($_REQUEST['id_notaI'])) {

            $id_nota = $_REQUEST['id_notaI'];

            $C_nota = (new MongoDB\Client('mongodb+srv://javier:javier12345@cluster0.w3wdi.mongodb.net/opss?retryWrites=true&w=majority'))->opss->notas; 

            $delete = $C_nota->deleteMany(['_id' => new MongoDB\BSON\ObjectID($id_nota)]);

            if ($delete) {
                
                header('Location: index.php');

            }
            
        }

    }elseif(isset($_SESSION['usuario'])||!isset($_SESSION['usuario'])) {

        header("Location: ../index.php");
        
    }elseif(isset($_SESSION['estandar'])) {

        header("Location: index.php");
        
    }

?>