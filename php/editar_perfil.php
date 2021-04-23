<?php

    session_start();

    require_once '../vendor/autoload.php';
    
    if(!empty($_POST['id'])&&!empty($_POST['nombre'])&&!empty($_POST['ape1'])&&!empty($_POST['calle'])&&!empty($_POST['numero'])&&!empty($_POST['col_fracc'])&&!empty($_POST['cp'])&&!empty($_POST['ciudad'])&&!empty($_POST['telefono'])){

        $id_edit = $_POST['id'];
        $nombre_edit = $_POST['nombre'];
        $ape1_edit = $_POST['ape1'];
        $calle_edit = $_POST['calle'];
        $numero_edit = $_POST['numero'];
        $col_fracc_edit = $_POST['col_fracc'];
        $cp_edit = $_POST['cp'];
        $ciudad_edit = $_POST['ciudad'];
        $telefono_edit = $_POST['telefono'];
        $C_clientes = (new MongoDB\Client('mongodb+srv://javier:javier12345@cluster0.w3wdi.mongodb.net/opss?retryWrites=true&w=majority'))->opss->clientes;

        $numero_n = intval($numero_edit);
        $cp_n = intval($cp_edit);
        $telefono_n = intval($telefono_edit);

        if (strlen($nombre_edit) >= 3) {
            if (strlen($ape1_edit) >= 3){
                if (strlen($telefono_n) == 10){
                    if (strlen($calle_edit) >= 3){
                        if (strlen($col_fracc_edit) >= 3){
                            if (strlen($cp_n) == 5){
                                if (empty($_POST['ape2'])) {           

                                    $edit_cliente = $C_clientes -> updateOne(
                                        ['_id' => new MongoDB\BSON\ObjectID($id_edit)],
                                        ['$set' => ['nombres' => ['nombre' => $nombre_edit, 'ape1' => $ape1_edit], 'direccion' => ['calle' => $calle_edit, 'numero' => $numero_n, 'col_fracc' => $col_fracc_edit, 'cp' => $cp_n, 'ciudad' => $ciudad_edit], 'telefono' => $telefono_n]]
                                    );
                        
                                } else {
                        
                                    $edit_cliente = $C_clientes -> updateOne(
                                        ['_id' => new MongoDB\BSON\ObjectID($id_edit)],
                                        ['$set' => ['nombres' => ['nombre' => $nombre_edit, 'ape1' => $ape1_edit, 'ape2' => $_POST['ape2']], 'direccion' => ['calle' => $calle_edit, 'numero' => $numero_n, 'col_fracc' => $col_fracc_edit, 'cp' => $cp_n, 'ciudad' => $ciudad_edit], 'telefono' => $telefono_n]]
                                    );
                                } 

                                if ($edit_cliente) {
                                    echo json_encode('correcto');
                                }else{
                                    echo json_encode('error');
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