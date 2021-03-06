<?php

    // session_start();
    // error_reporting(0);

    require_once 'vendor/autoload.php';

    $C_clientes = (new MongoDB\Client('mongodb+srv://javier:javier12345@cluster0.w3wdi.mongodb.net/opss?retryWrites=true&w=majority'))->opss->clientes; 

    $idAlarma = intval($_POST['id_alarma']);
    $numAlarma = $idAlarma + 1;
    if(!empty($_POST['correo'])&&!empty($_POST['status'])&&!empty($numAlarma)){

        $correo = $_POST['correo'];
        $status = $_POST['status'];


        $edit_status = $C_clientes -> updateOne(
            ['correo' => $correo ],
            ['$set' => ["alarmas.alarma $numAlarma" => $status]]
        );
    
        if ($edit_status) {

            echo json_encode('Actualización realizada con exito');

        }else{

            echo json_encode('Hubo un error al actualizar');

        }

    }else{

        echo json_encode('No se pueden guardar datos vacios');

    }
    
?>