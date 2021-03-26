<?php

    require_once '../vendor/autoload.php';

    if(!empty($_POST['nombre'])&&!empty($_POST['email'])&&!empty($_POST['mensaje'])){
        
        $nombre_mensaje = $_POST['nombre'];
        $email_mensaje = $_POST['email'];
        $mensaje = $_POST['mensaje'];

        $C_mensajes = (new MongoDB\Client('mongodb+srv://javier:javier12345@cluster0.w3wdi.mongodb.net/opss?retryWrites=true&w=majority'))->opss->mensajes; 


        $insert = $C_mensajes->insertOne([
            'nombre' => $nombre_mensaje,
            'email' => $email_mensaje,
            'mensaje' => $mensaje,
        ]);

        if ($insert) {
            echo json_encode('correcto');
        }else {
            echo json_encode('error');
        }

    }


?>