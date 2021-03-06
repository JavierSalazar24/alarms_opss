<?php

    error_reporting(0);
    session_start();

    require_once 'vendor/autoload.php';
    $C_clientes = (new MongoDB\Client('mongodb+srv://javier:javier12345@cluster0.w3wdi.mongodb.net/opss?retryWrites=true&w=majority'))->opss->clientes;


    if(!empty($_POST['correo'])){
        
        $correo = $_POST['correo'];

        $cuenta_cliente = $C_clientes->find(['correo' => $correo]);
        
        foreach ($cuenta_cliente as $datos) {

            echo json_encode($datos);
            
        }

    }else{

        echo json_encode('Datos vacíos');
        
    }


?>