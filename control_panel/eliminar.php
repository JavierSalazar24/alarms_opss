<?php

    session_start();

    if(isset($_SESSION['admin'])){


        require_once '../vendor/autoload.php';

        if(isset($_REQUEST['id_admin'])){

            $id_admin = $_REQUEST['id_admin'];

            $C_admin = (new MongoDB\Client('mongodb+srv://javier:javier12345@cluster0.w3wdi.mongodb.net/opss?retryWrites=true&w=majority'))->opss->administradores; 

            $delete = $C_admin->deleteMany(['_id' => new MongoDB\BSON\ObjectID($id_admin)]);

            if ($delete) {
                
                echo "<script>alert('Admin eliminado con exito')</script>";
                echo "<script> location.href='administradores.php' </script>";

            }
        
        }elseif (isset($_REQUEST['id_cliente'])) {

            $id_cliente = $_REQUEST['id_cliente'];

            $C_cliente = (new MongoDB\Client('mongodb+srv://javier:javier12345@cluster0.w3wdi.mongodb.net/opss?retryWrites=true&w=majority'))->opss->clientes; 

            $delete = $C_cliente->deleteMany(['_id' => new MongoDB\BSON\ObjectID($id_cliente)]);

            if ($delete) {
                
                echo "<script>alert('Cliente eliminado con exito')</script>";
                echo "<script> location.href='clientes.php' </script>";

            }

        }elseif (isset($_REQUEST['id_producto'])) {

            $id_producto = $_REQUEST['id_producto'];

            $C_producto = (new MongoDB\Client('mongodb+srv://javier:javier12345@cluster0.w3wdi.mongodb.net/opss?retryWrites=true&w=majority'))->opss->productos; 

            $delete = $C_producto->deleteMany(['_id' => new MongoDB\BSON\ObjectID($id_producto)]);

            if ($delete) {
                
                echo "<script>alert('Producto eliminado con exito')</script>";
                echo "<script> location.href='productos.php' </script>";

            }

            
        }elseif (isset($_REQUEST['id_mensaje'])) {

            $id_mensaje = $_REQUEST['id_mensaje'];

            $C_mensaje = (new MongoDB\Client('mongodb+srv://javier:javier12345@cluster0.w3wdi.mongodb.net/opss?retryWrites=true&w=majority'))->opss->mensajes; 

            $delete = $C_mensaje->deleteMany(['_id' => new MongoDB\BSON\ObjectID($id_mensaje)]);

            if ($delete) {
                
                echo "<script>alert('Mensaje eliminado con exito')</script>";
                echo "<script> location.href='mensajes.php' </script>";

            }
            
        }elseif (isset($_REQUEST['id_pedido'])) {

            $id_pedido = $_REQUEST['id_pedido'];

            $C_pedido = (new MongoDB\Client('mongodb+srv://javier:javier12345@cluster0.w3wdi.mongodb.net/opss?retryWrites=true&w=majority'))->opss->pedidos; 

            $delete = $C_pedido->deleteMany(['_id' => new MongoDB\BSON\ObjectID($id_pedido)]);

            if ($delete) {
                echo "<script>alert('Pedido eliminado con exito')</script>";
                echo "<script> location.href='pedidos.php' </script>";
            }
            
        }elseif (isset($_REQUEST['id_envio'])) {

            $id_envio = $_REQUEST['id_envio'];

            $C_envio = (new MongoDB\Client('mongodb+srv://javier:javier12345@cluster0.w3wdi.mongodb.net/opss?retryWrites=true&w=majority'))->opss->envios; 

            $delete = $C_envio->deleteMany(['_id' => new MongoDB\BSON\ObjectID($id_envio)]);

            if ($delete) {
                
                echo "<script>alert('Envío eliminado con exito')</script>";
                echo "<script> location.href='envios.php' </script>";

            }
            
        }elseif (isset($_REQUEST['id_venta'])) {

            $id_venta = $_REQUEST['id_venta'];

            $C_venta = (new MongoDB\Client('mongodb+srv://javier:javier12345@cluster0.w3wdi.mongodb.net/opss?retryWrites=true&w=majority'))->opss->ventas; 

            $delete = $C_venta->deleteMany(['_id' => new MongoDB\BSON\ObjectID($id_venta)]);

            if ($delete) {
                
                echo "<script>alert('Venta eliminada con exito')</script>";
                echo "<script> location.href='ventas.php' </script>";

            }
            
        }

    }elseif(isset($_SESSION['usuario'])||!isset($_SESSION['usuario'])) {

        header("Location: ../index.php");
        
    }elseif(isset($_SESSION['estandar'])) {

        header("Location: index.php");
        
    }

?>