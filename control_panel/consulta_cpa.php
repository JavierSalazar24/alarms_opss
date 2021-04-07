<?php

    session_start();
    require_once '../vendor/autoload.php';

    $C_admin = (new MongoDB\Client('mongodb+srv://javier:javier12345@cluster0.w3wdi.mongodb.net/opss?retryWrites=true&w=majority'))->opss->administradores; 
    $C_clientes = (new MongoDB\Client('mongodb+srv://javier:javier12345@cluster0.w3wdi.mongodb.net/opss?retryWrites=true&w=majority'))->opss->clientes; 
    $C_productos = (new MongoDB\Client('mongodb+srv://javier:javier12345@cluster0.w3wdi.mongodb.net/opss?retryWrites=true&w=majority'))->opss->productos; 
    
    $numA = $C_admin -> count();
    $numC = $C_clientes -> count();
    $numP = $C_productos -> count();
    
    echo json_encode($numC);
    echo json_encode($numP);
    echo json_encode($numA);

?>