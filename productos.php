<?php

    session_start();

    require_once 'vendor/autoload.php';
    
    $C_productos = (new MongoDB\Client('mongodb+srv://javier:javier12345@cluster0.w3wdi.mongodb.net/opss?retryWrites=true&w=majority'))->opss->productos;
    $producto = $C_productos->find();

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
    <script src="js/scrollreveal.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <?php include_once "views/estilos_future.php"?>
    <link rel="stylesheet" href="css/estilos.css">
    <title>Productos | OPSS</title>
</head>

<body class="body-productos">

    <?php include "partes/_navs.php" ?>

    <section id="productos" class="container">
        <h1 class="h1-catalogo">Productos</h1>
        <div class="tarjeta-wrap row mt-3">

            <?php
                foreach($producto as $datos):
            ?>
            <div class="col-lg-4 col-md-6 pb-5 tarjeta">
                <div class="card bg-dark text-white adelante">
                    <img class="card-img-top img-fluid" src="img_produtos/<?php echo $datos['imagen']?>" alt="<?php echo $datos['descripcion']?>">
                    <button onclick="MostrarAlertaImg('<?php echo $datos['nombre']?>', '<?php echo $datos['descripcion']?>', 'img_produtos/<?php echo $datos['imagen']?>')" class="icono"><i class="fas fa-search-plus"></i></button>
                    <div class="card-body">
                        <h3 class="card-title"><?php echo $datos['nombre']?></h3>                        
                        <p class="card-text">Modelo: 1</p>
                        <p class="card-text">$<?php echo $datos['precio']?>.00 MXN.</p>
                        <a href="comprar.php?id_producto=<?php echo $datos['_id']?>" class="btn btn-success btn-block">Comprar</a>
                    </div>
                </div>
                <script>
                    
                    

                </script>
            </div>
            <?php
                endforeach;
            ?>
            
        </div>            
    </section>

    <!-- Estilos script -->
    <?php include_once "views/script_future.php"?>
    <?php include_once "views/script_bootstrap.php"?>
    <!-- Transiciones -->
    <script src="js/index.js"></script>
    <!-- Sweetalert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="js/sweetalert.js"></script>
    <!-- LINK ACTIVADO -->
    <script src="js/active.js"></script>

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
    <script src="js/scrollreveal.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <?php include_once "views/estilos_future.php"?>
    <link rel="stylesheet" href="css/estilos.css">
    <title>Productos | OPSS</title>
</head>

<body class="body-productos">

    <?php include "partes/_nav.php" ?>

    <section id="productos" class="container">
        <h1 class="h1-catalogo">Productos</h1>
        <div class="tarjeta-wrap row mt-3">

            <?php
                foreach($producto as $datos):
            ?>
            <div class="col-lg-4 col-md-6 pb-5 tarjeta">
                <div class="card bg-dark text-white adelante">
                    <img class="card-img-top img-fluid" src="img_produtos/<?php echo $datos['imagen']?>" alt="<?php echo $datos['descripcion']?>">
                    <button class="icono" onclick="MostrarAlertaImg('<?php echo $datos['nombre']?>', '<?php echo $datos['descripcion']?>', 'img_produtos/<?php echo $datos['imagen']?>')"><i class="fas fa-search-plus"></i></button>
                    <div class="card-body">
                        <h3 class="card-title"><?php echo $datos['nombre']?></h3>                        
                        <p class="card-text">Modelo: 1</p>
                        <p class="card-text">$<?php echo $datos['precio']?>.00 MXN.</p>
                        <a href="comprar.php?id_producto=<?php echo $datos['_id']?>" class="btn btn-success btn-block">Comprar</a>
                    </div>
                </div>
                <script>
                    
                    
                    

                </script>
            </div>
            <?php
                endforeach;
            ?>
            
        </div>            
    </section>

    <!-- Estilos script -->
    <?php include_once "views/script_future.php"?>
    <?php include_once "views/script_bootstrap.php"?>
    <!-- Transiciones -->
    <script src="js/index.js"></script>
    <!-- Sweetalert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="js/sweetalert.js"></script>
    <!-- LINK ACTIVADO -->
    <script src="js/active.js"></script>

</body>

</html>

<?php

    }

?>