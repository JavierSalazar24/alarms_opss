<?php

    session_start();
    require_once '../vendor/autoload.php';

    $C_pedidos = (new MongoDB\Client('mongodb+srv://javier:javier12345@cluster0.w3wdi.mongodb.net/opss?retryWrites=true&w=majority'))->opss->pedidos; 
    $C_envios = (new MongoDB\Client('mongodb+srv://javier:javier12345@cluster0.w3wdi.mongodb.net/opss?retryWrites=true&w=majority'))->opss->envios; 
    $C_ventas = (new MongoDB\Client('mongodb+srv://javier:javier12345@cluster0.w3wdi.mongodb.net/opss?retryWrites=true&w=majority'))->opss->ventas; 

    $numP = $C_pedidos -> count();
    $numE = $C_envios -> count();
    $numV = $C_ventas -> count();

    $array = array(
        0  => $numP,
        1  => $numE,
        2  => $numV
    );

    echo json_encode($array[0]);
    echo json_encode(',');
    echo json_encode($array[1]);
    echo json_encode(',');
    echo json_encode($array[2]);
    
?>


