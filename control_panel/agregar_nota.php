<?php

    session_start();
    error_reporting(0);

    require_once '../vendor/autoload.php';
    
    date_default_timezone_set('America/Mexico_City');
    
    setlocale(LC_ALL, '');
    
    $dia=date('d');
    $mes=strftime('%B');
    $anio=date('Y');
    
    $fecha=$dia.'/'.$mes.'/'.$anio;

    if(isset($_SESSION['admin']) || isset($_SESSION['estandar'])){

        if (!empty($_POST['nota'])&&!empty($_POST['estatus'])) {

            $nota = $_POST['nota'];
            $estatus = $_POST['estatus'];

            $C_notas = (new MongoDB\Client('mongodb+srv://javier:javier12345@cluster0.w3wdi.mongodb.net/opss?retryWrites=true&w=majority'))->opss->notas; 

            $insert = $C_notas->insertOne([
                'nota' => $nota,
                'estatus' => $estatus,
                'fecha' => $fecha
            ]);

            if ($insert) {
                echo json_encode('correcto');
            }

        }
        
    }elseif(isset($_SESSION['usuario'])||!isset($_SESSION['usuario'])) {

        header("Location: ../index.php");
        
    }

?>