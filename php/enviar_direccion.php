<?php

    require_once '../vendor/autoload.php';
    date_default_timezone_set('America/Mexico_City');
    
    setlocale(LC_ALL, '');
    
    $dia=date('d');
    $mes=strftime('%B');
    $anio=date('Y');
    
    $fecha=$dia . ' de ' . $mes . ' del ' . $anio;

    $hora=date('h');
    $minuto=date('i');
    $segundo=date('s');

    $hora_exacta=$hora.':'.$minuto.':'.$segundo;

    if(!empty($_POST['id_producto'])&&!empty($_POST['nombre'])&&!empty($_POST['ape1'])&&!empty($_POST['telefono'])&&!empty($_POST['calle'])&&!empty($_POST['numero'])&&!empty($_POST['col_fracc'])&&!empty($_POST['cp'])&&!empty($_POST['ciudad'])&&!empty($_POST['cantidad_n'])){

        $id_producto = $_POST['id_producto'];
        $C_productos = (new MongoDB\Client('mongodb+srv://javier:javier12345@cluster0.w3wdi.mongodb.net/opss?retryWrites=true&w=majority'))->opss->productos;
        $datosP = $C_productos->findOne(['_id' => new MongoDB\BSON\ObjectID($id_producto)]);

        $nombre = $_POST['nombre'];
        $ape1 = $_POST['ape1'];
        $telefono = $_POST['telefono'];
        $calle = $_POST['calle'];
        $numero = $_POST['numero'];
        $col_fracc = $_POST['col_fracc'];
        $cp = $_POST['cp'];
        $ciudad = $_POST['ciudad'];
        $cantidad_n = $_POST['cantidad_n'];

        $telefono_n = intval($telefono);
        $numero_n = intval($numero);
        $cp_n = intval($cp);
        $cantidad_n_n = intval($cantidad_n);

        $precio = $datosP['precio'];        
        $total = $precio * $cantidad_n;

        $C_pedidos = (new MongoDB\Client('mongodb+srv://javier:javier12345@cluster0.w3wdi.mongodb.net/opss?retryWrites=true&w=majority'))->opss->pedidos; 
        $numP = $C_pedidos -> count();
        $no = $numP+1;

        if (empty($_POST['ape2'])) {
            
            $insert = $C_pedidos -> insertOne([
                'no' => $no,
                'id_mercancia' => $id_producto,
                'info_cliente' => [
                'nombres' => $nombre,
                'apellidos' => $ape1,
                'telefono' => $telefono_n,
                'calle' => $calle,
                'numero' => $numero_n,
                'col_fracc' => $col_fracc,
                'cp' => $cp_n,
                'ciudad' => $ciudad,
                ],
                'cantidad' => $cantidad_n_n,
                'total' => $total,
                'fecha_hora' => $fecha.'/'.$hora_exacta,
            ]);

        }else{
            $insert = $C_pedidos -> insertOne([
                'no' => $no,
                'id_mercancia' => $id_producto,
                'info_cliente' => [
                'nombres' => $nombre,
                'apellidos' => $ape1.' '.$_POST['ape2'],
                'telefono' => $telefono_n,
                'calle' => $calle,
                'numero' => $numero_n,
                'col_fracc' => $col_fracc,
                'cp' => $cp_n,
                'ciudad' => $ciudad,
                ],
                'cantidad' => $cantidad_n_n,
                'total' => $total,
                'fecha_hora' => $fecha.'/'.$hora_exacta,
            ]);
        }


        if ($insert) {

            $cantidadNueva = $datosP['cantidad'] - $cantidad_n_n;

            $edit_producto = $C_productos -> updateOne(
                ['_id' => new MongoDB\BSON\ObjectID($id_producto)],
                ['$set' => ['cantidad' => $cantidadNueva, ]]
            );
            
            $correo = $_POST['correo'];

            $C_clientes = (new MongoDB\Client('mongodb+srv://javier:javier12345@cluster0.w3wdi.mongodb.net/opss?retryWrites=true&w=majority'))->opss->clientes;

            $busqueda_cliente = $C_clientes -> findOne(['correo' => $correo]);

            $i=0;

            

            do {
                $i=$i+1;
                if (empty($busqueda_cliente['alarmas']["alarma $i"])) { 
                    $edit_alarmas = $C_clientes -> updateOne(
                        ['correo' => $correo],
                        ['$set' => ["alarmas.alarma $i" => 'apagada'] ]
                    );

                    break;
                }
            } while (!empty($busqueda_cliente['alarmas']["alarma $i"]));
            echo json_encode('correcto');
        
        }else{
            echo json_encode('error');
        }

    }else{
        echo json_encode('vacio');
    }

?>