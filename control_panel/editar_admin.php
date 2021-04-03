<?php

    session_start();
    error_reporting(0);

    require_once '../vendor/autoload.php';

    if(isset($_SESSION['admin'])){

        if(!empty($_POST['nombre'])&&!empty($_POST['ape1'])&&!empty($_POST['correo'])&&!empty($_POST['telefono'])&&!empty($_POST['tipo_admin'])){

            $id = $_POST['id_admin'];
            $nombre = $_POST['nombre'];
            $ape1 = $_POST['ape1'];
            $ape2 = $_POST['ape2'];
            $correo = $_POST['correo'];
            $telefono = $_POST['telefono'];
            $tipo_admin = $_POST['tipo_admin'];

            $telefono_n = intval($telefono);
            $tipo_admin_n = intval($tipo_admin);

            $C_administradores = (new MongoDB\Client('mongodb+srv://javier:javier12345@cluster0.w3wdi.mongodb.net/opss?retryWrites=true&w=majority'))->opss->administradores; 


            if (!empty($_POST['ape2'])) {
                $ape2 = $_POST['ape2'];
                $edit_admin = $C_administradores -> updateOne(
                    ['correo' => $correo],
                    ['$set' => ['nombres' => ['nombre' => $nombre, 'ape1' => $ape1, 'ape2' => $ape2], 'correo' => $correo, 'telefono' => $telefono_n, 'tipo_admin' => $tipo_admin_n]]
                );
            }else{
                $edit_admin = $C_administradores -> updateOne(
                    ['correo' => $correo],
                    ['$set' => ['nombres' => ['nombre' => $nombre, 'ape1' => $ape1], 'correo' => $correo, 'telefono' => $telefono_n, 'tipo_admin' => $tipo_admin_n]]
                );
            }

            if ($edit_admin) {
                echo json_encode('correcto');
            }



        }

    }elseif(isset($_SESSION['usuario'])||!isset($_SESSION['usuario'])) {

        header("Location: ../index.php");
        
    }elseif(isset($_SESSION['estandar'])) {

        header("Location: index.php");
        
    }

?>