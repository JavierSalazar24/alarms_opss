<?php

require_once 'vendor/autoload.php';
require_once 'vendor/mongodb/mongodb/src/functions.php';

    $db = (new MongoDB\Manager('mongodb+srv://javier:javier12345@cluster0.w3wdi.mongodb.net/opss?retryWrites=true&w=majority'))->opss->productos;

    // $C_productos=$db->opss->productos;

    // echo strlen($C_productos);
    // echo $C_productos;
    /* if (strlen($C_productos)>0) {
        echo 'Jaló';
    }else{
        echo "no jaló";
    } */
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba</title>
</head>
<body>
</body>
</html>
