<?php

session_start();

    require_once '../vendor/autoload.php';
    

    if(isset($_SESSION['admin'])||isset($_SESSION['estandar'])){

        header("Location: control_panel/index.php");
    
    }elseif(isset($_SESSION['usuario'])){

        header("Location: index.php");
    
    }elseif(!isset($_SESSION['usuario'])){


        $C_clientes = (new MongoDB\Client('mongodb+srv://javier:javier12345@cluster0.w3wdi.mongodb.net/opss?retryWrites=true&w=majority'))->opss->clientes; 
        $C_admins = (new MongoDB\Client('mongodb+srv://javier:javier12345@cluster0.w3wdi.mongodb.net/opss?retryWrites=true&w=majority'))->opss->administradores; 

        if(!empty($_POST['correo'])&&!empty($_POST['contrasena'])){

            $correo = $_POST['correo'];
            $contrasena = MD5($_POST['contrasena']);

            $cuenta_cliente = $C_clientes->findOne(['correo' => $correo]);
            $contrasena_cliente = $C_clientes->findOne(['contrasena' => $contrasena]);


            $cuenta_admin = $C_admins->findOne(['correo' => $correo]);
            $contrasena_admin = $C_admins->findOne(['contrasena' => $contrasena]);
                
            if (empty($cuenta_admin) && empty($cuenta_cliente)) {

                echo json_encode('null');

            }elseif (!empty($cuenta_cliente) && !empty($contrasena_cliente)) {

                $cliente = $C_clientes->findOne(['correo' => $correo]);
                $nombre_c = $cliente['nombres']['nombre'];
                $ape1_c = $cliente['nombres']['ape1'];
                $_SESSION['usuario']=$correo;          
                
                echo json_encode('user');

            }elseif(!empty($cuenta_admin) && !empty($contrasena_admin)){
                    
                $administrador = $C_admins->findOne(['correo' => $correo]);
                    
                if ($correo == "estandar@gmail.com" || $correo == "root@gmail.com") {
                    $nombre_a = "";
                    $ape1_a = $administrador['nombre'];
                }else{
                    $nombre_a = $administrador['nombres']['nombre'];
                    $ape1_a = $administrador['nombres']['ape1'];
                }

                if ($administrador['tipo_admin'] == 1) {
                    $_SESSION['admin']=$correo;
                }elseif($administrador['tipo_admin'] == 2){
                    $_SESSION['estandar']=$correo;
                }
                
                echo json_encode('admin');

            }
            
        }else{
            echo json_encode('vacio');
        }
    }

?>