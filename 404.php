<?php

    session_start();

    require_once 'vendor/autoload.php';
    
    if(isset($_SESSION['admin'])||isset($_SESSION['estandar'])){

        header("Location: control_panel/index.php");

    }elseif(isset($_SESSION['usuario'])){

        $correo = $_SESSION['usuario'];

        $C_clientes = (new MongoDB\Client('mongodb+srv://javier:javier12345@cluster0.w3wdi.mongodb.net/opss?retryWrites=true&w=majority'))->opss->clientes; 
        $datos = $C_clientes->findOne(["correo" => $correo]);

        $nombre = $datos['nombres']['nombre'];
        $ape1 = $datos['nombres']['ape1'];
    
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/favicon1.png">
    <link rel="stylesheet" href="assets/future/css/main.css" />
    <link rel="stylesheet" href="css/estilos_404.css">
    <title>404 | OPSS</title>
</head>

<body>

    <?php include "partes/_navs.php" ?>

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="text mt-5 pt-5">
                    <h1 class="mb-5 pb-5">404</h1>
                    <h2 class="mb-5">Uh, Ohh</h2>
                    <h3>Lo siento, no podemos encontrar lo que estás buscando porque está tan oscuro aquí</h3>
                </div>
                <div class="torch"></div>
            </div>
        </div>
    </div>

    <!-- Fontsawesome -->
    <script src=" https://kit.fontawesome.com/56b0f801ce.js" crossorigin="anonymous"></script>
    <!-- Estilos script -->
    <?php include_once "views/script_future.php"?>
    <?php include_once "views/script_bootstrap.php"?>
    <!-- Funcionamiento del efecto antorcha -->
    <script>
        $(document).mousemove(function (e) {
            $('.torch').css({
                'top': e.pageY,
                'left': e.pageX
            });
        })
    </script>
    <!-- LINK ACTIVADO -->
    <script>
        const currentLocation = location.href;
        const menuItem = document.querySelectorAll("a");
        const menuLength = menuItem.length;
        for (let i = 0; i < menuLength; i++) {
            if (menuItem[i].href === currentLocation) menuItem[i].className = "active";
        }
    </script>
</body>

</html>

<?php

    }elseif(!isset($_SESSION['usuario'])){

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/favicon1.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/future/css/main.css" />
    <link rel="stylesheet" href="css/estilos_404.css">
    <title>404 | OPSS</title>
</head>

<body>

    <?php include "partes/_nav.php" ?>

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="text mt-5 pt-5">
                    <h1 class="mb-5 pb-5">404</h1>
                    <h2 class="mb-5">Uh, Ohh</h2>
                    <h3>Lo siento, no podemos encontrar lo que estás buscando porque está tan oscuro aquí</h3>
                </div>
                <div class="torch"></div>
            </div>
        </div>
    </div>

    <!-- Fontsawesome -->
    <script src=" https://kit.fontawesome.com/56b0f801ce.js" crossorigin="anonymous"></script>
    <!-- Estilos script -->
    <?php include_once "views/script_future.php"?>
    <?php include_once "views/script_bootstrap.php"?>
    <!-- Funcionamiento del efecto antorcha -->
    <script>
        $(document).mousemove(function (e) {
            $('.torch').css({
                'top': e.pageY,
                'left': e.pageX
            });
        })
    </script>
    <!-- LINK ACTIVADO -->
    <script>
        const currentLocation = location.href;
        const menuItem = document.querySelectorAll("a");
        const menuLength = menuItem.length;
        for (let i = 0; i < menuLength; i++) {
            if (menuItem[i].href === currentLocation) menuItem[i].className = "active";
        }
    </script>
</body>

</html>

<?php

    }

?>