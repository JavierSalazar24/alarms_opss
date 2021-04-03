<?php


    session_start();
    error_reporting(0);

    require_once '../vendor/autoload.php';

    if(isset($_SESSION['admin'])){

        if(isset($_REQUEST['id_pedido'])){

            $id = $_REQUEST['id_pedido'];
            $C_pedidos = (new MongoDB\Client('mongodb+srv://javier:javier12345@cluster0.w3wdi.mongodb.net/opss?retryWrites=true&w=majority'))->opss->pedidos; 
            $datos = $C_pedidos->findOne(['_id' => new MongoDB\BSON\ObjectID($id)]);

            $no_pedido = $datos['no'];
            $nombres = $datos['info_cliente']['nombres'];
            $apellidos = $datos['info_cliente']['apellidos'];
            $telefono = $datos['info_cliente']['telefono'];
            $calle = $datos['info_cliente']['calle'];
            $numero = $datos['info_cliente']['numero'];
            $col_fracc = $datos['info_cliente']['col_fracc'];
            $cp = $datos['info_cliente']['cp'];
            $total = $datos['total'];
            $fecha_hora = $datos['fecha_hora'];

            $no_pedido_n = intval($no_pedido);
            $telefono_n = intval($telefono);
            $numero_n = intval($numero);
            $cp_n = intval($cp);
            $total_n = intval($total);

                
            $C_envios = (new MongoDB\Client('mongodb+srv://javier:javier12345@cluster0.w3wdi.mongodb.net/opss?retryWrites=true&w=majority'))->opss->envios; 
            $numE = $C_envios -> count();
            $no = $numE+1;

            $insert = $C_envios->insertOne([
                'no' => $no,
                'no_pedido' => $no_pedido_n,
                'info_cliente' => [
                    'nombres' => $nombres,
                    'apellidos' => $apellidos,
                    'telefono' => $telefono_n,
                    'calle' => $calle,
                    'numero' => $numero_n,
                    'col_fracc' => $col_fracc,
                    'cp' => $cp_n,
                ],
                'total' => $total_n,
                'fecha_hora' => $fecha_hora,
            ]);
            
            if ($insert) {
                header('Location: pedidos.php');
            }
        
        }    
    
    }elseif(isset($_SESSION['usuario'])||!isset($_SESSION['usuario'])) {

        header("Location: ../index.php");
    
    }elseif(isset($_SESSION['estandar'])) {
    
        header("Location: index.php");
        
    }
    
?>