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

            $cuenta_cliente = $C_clientes->findOne([
                '$and' => [
                    ['correo' => $correo], ['contrasena' => $contrasena]
                ]
            ]);

            $cuenta_admin = $C_admins->findOne([
                '$and' => [
                    ['correo' => $correo], ['contrasena' => $contrasena]
                ]
            ]);

            if (empty($cuenta_admin) && empty($cuenta_cliente)) {

                echo json_encode('null');

            }elseif (!empty($cuenta_cliente)) {
                         
                $_SESSION['usuario'] = $correo;          
                
                echo json_encode('user');

            }elseif(!empty($cuenta_admin)){                                    

                if ($cuenta_admin['tipo_admin'] == 1) {
                    $_SESSION['admin'] = $correo;
                    echo json_encode('admin');
                }else if($cuenta_admin['tipo_admin'] == 2){
                    $_SESSION['estandar'] = $correo;
                    echo json_encode('admin');
                }
                
            }
            
        }else{
            echo json_encode('vacio');
        }
    }

?>