<?php

    session_start();
    error_reporting(0);

    require_once '../vendor/autoload.php';

    if(isset($_SESSION['admin'])){

            if(!empty($_POST['nombre'])&&!empty($_POST['ape1'])&&!empty($_POST['correo'])&&!empty($_POST['telefono'])&&!empty($_POST['contrasena'])&&!empty($_POST['tipo_admin'])){


                $nombre = $_POST['nombre'];
                $ape1 = $_POST['ape1'];
                $correo = $_POST['correo'];
                $telefono = $_POST['telefono'];
                $contrasena = MD5($_POST['contrasena']);
                $tipo_admin = $_POST['tipo_admin'];

                $telefono_n = intval($telefono);
                $tipo_admin_n = intval($tipo_admin);

                $C_administradores = (new MongoDB\Client('mongodb+srv://javier:javier12345@cluster0.w3wdi.mongodb.net/opss?retryWrites=true&w=majority'))->opss->administradores; 

                if (!empty($_POST['ape2'])) {
                    $ape2 = $_POST['ape2'];
                    $insert = $C_administradores->insertOne([
                        'nombres' => [
                        'nombre' => $nombre,
                        'ape1' => $ape1,
                        'ape2' => $ape2,
                        ],
                        'telefono' => $telefono_n,
                        'correo' => $correo,
                        'contrasena' => $contrasena,
                        'tipo_admin' => $tipo_admin_n
                    ]);
                }else{
                    $insert = $C_administradores->insertOne([
                        'nombres' => [
                        'nombre' => $nombre,
                        'ape1' => $ape1,
                        ],
                        'telefono' => $telefono_n,
                        'correo' => $correo,
                        'contrasena' => $contrasena,
                        'tipo_admin' => $tipo_admin_n
                    ]);
                }

                if ($insert) {
                    echo json_encode('correcto');
                }
            }

    }elseif(isset($_SESSION['usuario'])||!isset($_SESSION['usuario'])) {

        header("Location: ../index.php");
        
    }elseif(isset($_SESSION['estandar'])) {

        header("Location: index.php");
        
    }

?>