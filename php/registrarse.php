<?php

    session_start();
    require_once '../vendor/autoload.php';
    
    // error_reporting(0);

    if(!empty($_POST['nombre'])&&!empty($_POST['ape1'])&&!empty($_POST['correo'])&&!empty($_POST['calle'])&&!empty($_POST['numero'])&&!empty($_POST['col_fracc'])&&!empty($_POST['cp'])&&!empty($_POST['ciudad'])&&!empty($_POST['telefono'])&&!empty($_POST['password'])&&!empty($_POST['conf_password'])){        

        $nombre = $_POST['nombre'];
        $ape1 = $_POST['ape1'];        
        $calle = $_POST['calle'];
        $numero = $_POST['numero'];
        $col_fracc = $_POST['col_fracc'];
        $cp = $_POST['cp'];
        $ciudad = $_POST['ciudad'];
        $telefono = $_POST['telefono'];
        $correo = $_POST['correo'];
        $contrasena = MD5($_POST['password']);
        $concontrasena = MD5($_POST['conf_password']);

        $numero_n = intval($numero);
        $cp_n = intval($cp);
        $telefono_n = intval($telefono);

        $email_valido = strrpos($correo, "@");
        $email_valido2 = strrpos($correo, ".com");

        if (strlen($nombre) >= 3) {
            if (strlen($ape1) >= 3){
                if (strlen($telefono_n) == 10){
                    if (strlen($calle) >= 3){
                        if (strlen($col_fracc) >= 3){
                            if (strlen($cp_n) == 5){
                                if ($email_valido && $email_valido2){
                                    if (strlen($_POST['password']) >= 8){
                                        if (strlen($_POST['conf_password']) >= 8){
                                            if ($contrasena === $concontrasena) {
    
                                                $C_clientes = (new MongoDB\Client('mongodb+srv://javier:javier12345@cluster0.w3wdi.mongodb.net/opss?retryWrites=true&w=majority'))->opss->clientes; 
                                                $C_admins = (new MongoDB\Client('mongodb+srv://javier:javier12345@cluster0.w3wdi.mongodb.net/opss?retryWrites=true&w=majority'))->opss->administradores; 
                                    
                                                $correo_busq_a = $C_admins->findOne(['correo' => $correo]);
                                                $correo_busq_c = $C_clientes->findOne(['correo' => $correo]);
                                                        
                                                if(empty($correo_busq_a) || empty($correo_busq_c)){
                                            
                                                    if (!empty($_POST['ape2'])) {
                                                        $insert = $C_clientes->insertOne([
                                                            'nombres' => [
                                                            'nombre' => $nombre,
                                                            'ape1' => $ape1,
                                                            'ape2' => $_POST['ape2']
                                                            ],
                                                            'direccion' => [
                                                            'calle' => $calle,
                                                            'numero' => $numero_n,
                                                            'col_fracc' => $col_fracc,
                                                            'cp' => $cp_n,
                                                            'ciudad' => $ciudad
                                                            ],
                                                            'telefono' => $telefono_n,
                                                            'correo' => $correo,
                                                            'contrasena' => $contrasena,
                                                        ]);                    
                                                    }else{
                                                        $insert = $C_clientes->insertOne([
                                                            'nombres' => [
                                                            'nombre' => $nombre,
                                                            'ape1' => $ape1,
                                                            ],
                                                            'direccion' => [
                                                            'calle' => $calle,
                                                            'numero' => $numero_n,
                                                            'col_fracc' => $col_fracc,
                                                            'cp' => $cp_n,
                                                            'ciudad' => $ciudad
                                                            ],
                                                            'telefono' => $telefono_n,
                                                            'correo' => $correo,
                                                            'contrasena' => $contrasena,
                                                        ]);
                                                    }
                                    
                                                    if ($insert) {
                                                        $_SESSION['usuario']=$correo;
                                                        echo json_encode('correcto');
                                                    }else{
                                                        echo json_encode('error');
                                                    }
                                                    
                                                }else{                                                    
                                                    echo json_encode('existente');                                                                                        
                                                }
                                    
                                            }else{
                                                echo json_encode('dif');
                                            }                                        
                                        }else{
                                            echo json_encode("pass");
                                        }
                                    }else{
                                        echo json_encode("pass");
                                    }
                                }else{
                                    echo json_encode("email");
                                }
                            }else{
                                echo json_encode("cp");
                            }                                                        
                        }else{
                            echo json_encode("col");
                        }
                    }else{
                        echo json_encode("calle");
                    }
                }else{
                    echo json_encode("tel");
                }
            }else{
                echo json_encode("ape1");
            }
        }else{
            echo json_encode ("nom");
        }        
    
    }else{
    
        echo json_encode('vacio');
    
    }
        

?>