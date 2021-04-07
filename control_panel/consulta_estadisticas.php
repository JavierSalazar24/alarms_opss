<?php

    session_start();
    require_once '../vendor/autoload.php';

    $C_pedidos = (new MongoDB\Client('mongodb+srv://javier:javier12345@cluster0.w3wdi.mongodb.net/opss?retryWrites=true&w=majority'))->opss->pedidos; 
    $C_envios = (new MongoDB\Client('mongodb+srv://javier:javier12345@cluster0.w3wdi.mongodb.net/opss?retryWrites=true&w=majority'))->opss->envios; 
    $C_ventas = (new MongoDB\Client('mongodb+srv://javier:javier12345@cluster0.w3wdi.mongodb.net/opss?retryWrites=true&w=majority'))->opss->ventas; 

    $numP = $C_pedidos -> count();
    $numE = $C_envios -> count();
    $numV = $C_ventas -> count();

    echo json_encode($numP);
    echo json_encode($numE);
    echo json_encode($numV);
    
?>


