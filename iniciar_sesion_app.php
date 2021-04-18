<?php

    session_start();

    require_once 'vendor/autoload.php';
    

    $C_clientes = (new MongoDB\Client('mongodb+srv://javier:javier12345@cluster0.w3wdi.mongodb.net/opss?retryWrites=true&w=majority'))->opss->clientes; 

    if(!empty($_POST['correo'])&&!empty($_POST['contrasena'])){

        $correo = $_POST['correo'];
        $contrasena = MD5($_POST['contrasena']);

        $cuenta_cliente = $C_clientes->findOne(['correo' => $correo]);
        $contrasena_cliente = $C_clientes->findOne(['contrasena' => $contrasena]);
            
        if ($cuenta_cliente && $contrasena_cliente) {
            echo json_encode(true);
        }else{
            echo json_encode('error');
        }
        
    }else{
        echo json_encode('error');
    }


?>