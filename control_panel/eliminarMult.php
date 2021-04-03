<?php

    session_start();

    if(isset($_SESSION['admin'])){

        require_once '../vendor/autoload.php';

        if (isset($_POST['eliminar-multAdmin'])) {

            $C_admin = (new MongoDB\Client('mongodb+srv://javier:javier12345@cluster0.w3wdi.mongodb.net/opss?retryWrites=true&w=majority'))->opss->administradores; 
            
            foreach($_POST['eliminar-multAdmin'] as $id_borrar){
    
                $delete = $C_admin->deleteMany(['_id' => new MongoDB\BSON\ObjectID($id_borrar)]);
                                                            
            }
            
            if($delete){
    
                echo json_encode('correcto');
    
            }else {
    
                echo json_encode('error');
    
            }

        }else if (isset($_POST['eliminar-multClient'])) {

            $C_clientes = (new MongoDB\Client('mongodb+srv://javier:javier12345@cluster0.w3wdi.mongodb.net/opss?retryWrites=true&w=majority'))->opss->clientes; 
            
            foreach($_POST['eliminar-multClient'] as $id_borrar){
    
                $delete = $C_clientes->deleteMany(['_id' => new MongoDB\BSON\ObjectID($id_borrar)]);
                                                            
            }
            
            if($delete){
    
                echo json_encode('correcto');
    
            }else {
    
                echo json_encode('error');
    
            }

        }else if (isset($_POST['eliminar-multProduct'])) {

            $C_productos = (new MongoDB\Client('mongodb+srv://javier:javier12345@cluster0.w3wdi.mongodb.net/opss?retryWrites=true&w=majority'))->opss->productos; 
            
            foreach($_POST['eliminar-multProduct'] as $id_borrar){
    
                $delete = $C_productos->deleteMany(['_id' => new MongoDB\BSON\ObjectID($id_borrar)]);
                                                            
            }
            
            if($delete){
    
                echo json_encode('correcto');
    
            }else {
    
                echo json_encode('error');
    
            }

        }else if (isset($_POST['eliminar-multPedidos'])) {

            $C_pedidos = (new MongoDB\Client('mongodb+srv://javier:javier12345@cluster0.w3wdi.mongodb.net/opss?retryWrites=true&w=majority'))->opss->pedidos; 
            
            foreach($_POST['eliminar-multPedidos'] as $id_borrar){
    
                $delete = $C_pedidos->deleteMany(['_id' => new MongoDB\BSON\ObjectID($id_borrar)]);
                                                            
            }
            
            if($delete){
    
                echo json_encode('correcto');
    
            }else {
    
                echo json_encode('error');
    
            }

        }else if (isset($_POST['eliminar-multEnvios'])) {

            $C_envios = (new MongoDB\Client('mongodb+srv://javier:javier12345@cluster0.w3wdi.mongodb.net/opss?retryWrites=true&w=majority'))->opss->envios; 
            
            foreach($_POST['eliminar-multEnvios'] as $id_borrar){
    
                $delete = $C_envios->deleteMany(['_id' => new MongoDB\BSON\ObjectID($id_borrar)]);
                                                            
            }
            
            if($delete){
    
                echo json_encode('correcto');
    
            }else {
    
                echo json_encode('error');
    
            }

        }else if (isset($_POST['eliminar-multVentas'])) {

            $C_ventas = (new MongoDB\Client('mongodb+srv://javier:javier12345@cluster0.w3wdi.mongodb.net/opss?retryWrites=true&w=majority'))->opss->ventas; 
            
            foreach($_POST['eliminar-multVentas'] as $id_borrar){
    
                $delete = $C_ventas->deleteMany(['_id' => new MongoDB\BSON\ObjectID($id_borrar)]);
                                                            
            }
            
            if($delete){
    
                echo json_encode('correcto');
    
            }else {
    
                echo json_encode('error');
    
            }

        }else if (isset($_POST['eliminar-multMens'])) {

            $C_mensajes = (new MongoDB\Client('mongodb+srv://javier:javier12345@cluster0.w3wdi.mongodb.net/opss?retryWrites=true&w=majority'))->opss->mensajes; 
            
            foreach($_POST['eliminar-multMens'] as $id_borrar){
    
                $delete = $C_mensajes->deleteMany(['_id' => new MongoDB\BSON\ObjectID($id_borrar)]);
                                                            
            }
            
            if($delete){
    
                echo json_encode('correcto');
    
            }else {
    
                echo json_encode('error');
    
            }
        }else{

            echo json_encode('vacio');
            
        }

    }

?>