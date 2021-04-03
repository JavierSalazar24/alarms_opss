<?php    
    session_start();

    if(isset($_SESSION['admin'])||isset($_SESSION['estandar'])){

        // SweetAlert CDN
        echo "<script src='//cdn.jsdelivr.net/npm/sweetalert2@10'></script>";
        echo "<script src='../js/sweetalert.js'></script>";

        require_once '../vendor/autoload.php';

        if(isset($_REQUEST['id_notaEstatus'])){

            $id_notaEstatus = $_REQUEST['id_notaEstatus'];

            $C_notas = (new MongoDB\Client('mongodb+srv://javier:javier12345@cluster0.w3wdi.mongodb.net/opss?retryWrites=true&w=majority'))->opss->notas; 

            $datos = $C_notas -> findOne(['_id' => new MongoDB\BSON\ObjectID($id_notaEstatus)]);

            $estatus = $datos['estatus'];

            if ($estatus == "pendiente") {
                $estatus = "realizada";
            } else {
                $estatus = "pendiente";            
            }
            

            $edit_nota = $C_notas -> updateOne(
                ['_id' => new MongoDB\BSON\ObjectID($id_notaEstatus)],
                ['$set' => ['estatus' => $estatus]]
            );

            if ($edit_nota) {
                
                header('Location: notas.php');

            }
        
        }elseif (isset($_REQUEST['id_notaEstatusI'])) {

            $id_notaEstatusI = $_REQUEST['id_notaEstatusI'];

            $C_notas = (new MongoDB\Client('mongodb+srv://javier:javier12345@cluster0.w3wdi.mongodb.net/opss?retryWrites=true&w=majority'))->opss->notas; 

            $datos = $C_notas -> findOne(['_id' => new MongoDB\BSON\ObjectID($id_notaEstatusI)]);

            $estatus = $datos['estatus'];

            if ($estatus == "pendiente") {
                $estatus = "realizada";
            } else {
                $estatus = "pendiente";            
            }
            

            $edit_nota = $C_notas -> updateOne(
                ['_id' => new MongoDB\BSON\ObjectID($id_notaEstatusI)],
                ['$set' => ['estatus' => $estatus]]
            );

            if ($edit_nota) {
                
                header('Location: index.php');

            }

            
        }elseif (isset($_POST['id_notaI'])) {

            if (!empty($_POST['nota'])&&!empty($_POST['id_notaI'])) {

                $id = $_POST['id_notaI'];
                $nota = $_POST['nota'];
    
                $C_notas = (new MongoDB\Client('mongodb+srv://javier:javier12345@cluster0.w3wdi.mongodb.net/opss?retryWrites=true&w=majority'))->opss->notas;             
    
                $edit_nota = $C_notas -> updateOne(
                    ['_id' => new MongoDB\BSON\ObjectID($id)],
                    ['$set' => ['nota' => $nota]]
                );
    
                if ($edit_nota) {
                
                    echo header('Location: index.php');
                }
    
            }

            
        }elseif (isset($_POST['id_nota'])) {

            if (!empty($_POST['nota'])&&!empty($_POST['id_nota'])) {

                $id = $_POST['id_nota'];
                $nota = $_POST['nota'];
    
                $C_notas = (new MongoDB\Client('mongodb+srv://javier:javier12345@cluster0.w3wdi.mongodb.net/opss?retryWrites=true&w=majority'))->opss->notas;             
    
                $edit_nota = $C_notas -> updateOne(
                    ['_id' => new MongoDB\BSON\ObjectID($id)],
                    ['$set' => ['nota' => $nota]]
                );
    
                if ($edit_nota) {
                    echo header('Location: notas.php');
                }
    
            }
            
        }

    }elseif(isset($_SESSION['usuario'])||!isset($_SESSION['usuario'])) {

        header("Location: ../index.php");
        
    }

?>