<?php

    session_start();
    error_reporting(0);

    require_once 'vendor/autoload.php';
    $C_clientes = (new MongoDB\Client('mongodb+srv://javier:javier12345@cluster0.w3wdi.mongodb.net/opss?retryWrites=true&w=majority'))->opss->clientes; 

    $idAlarma = intval($_POST['id_alarma']);
    $numAlarma = $idAlarma +1;

    if(!empty($_POST['correo'])&&!empty($numAlarma)){

        $correo = $_POST['correo'];

        $cuenta_cliente = $C_clientes->findOne(['correo' => $correo ]);
        $status = $cuenta_cliente['alarmas']["alarma $numAlarma"];

        if ($status) {

            echo json_encode($status);
            
        } else {
            echo 'Error';
        }

    }else{

        echo json_encode('Datos vacíos');

    }

?>