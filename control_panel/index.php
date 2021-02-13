<?php

    session_start();
    require_once '../vendor/autoload.php';

    date_default_timezone_set('America/Mexico_City');
    
    setlocale(LC_ALL, '');
    
    $dia=date('d');
    $mes=strftime('%B');
    $anio=date('Y');
    
    $fecha=$dia . ' de ' . $mes . ' del ' . $anio;

    if(isset($_SESSION['admin'])){

        $correo = $_SESSION['admin'];

        $C_administradores = (new MongoDB\Client('mongodb+srv://javier:javier12345@cluster0.w3wdi.mongodb.net/opss?retryWrites=true&w=majority'))->opss->administradores; 
        $datos = $C_administradores->findOne(['correo' => $correo]);

        $nombre = $datos['nombre'];
        $ape1 = $datos['ape1'];



        $C_clientes = (new MongoDB\Client('mongodb+srv://javier:javier12345@cluster0.w3wdi.mongodb.net/opss?retryWrites=true&w=majority'))->opss->clientes; 
        $C_ventas = (new MongoDB\Client('mongodb+srv://javier:javier12345@cluster0.w3wdi.mongodb.net/opss?retryWrites=true&w=majority'))->opss->ventas; 

        $numA = $C_administradores -> count();
        $numC = $C_clientes -> count();
        $numV = $C_ventas -> count();

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de control</title>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/estilos_responsivo.css">
    <link rel="shortcut icon" href="../img/favicon.jpg">
</head>

<body>
    <nav class="menu">
        <ul class="ul-menu">
            <li class="li-menu li-titulo">
                Panel de control: OPSS
            </li>
            <li class="li-menu li-fecha">
            <?php echo $fecha?>
            </li>
            <li class="li-menu">
                Bienvenid@: <?php echo $nombre.' '.$ape1?>
            </li>
            <li class="li-menu li-icon-salir">
                <a class="salir" href="../cerrar_sesion.php"><i class="fas fa-power-off"></i></a>
            </li>
            <hr class="linea">
            <li class="li-icon-menu">
                <label class="label-icon" for="icon-nav-menu"><i class="fas fa-bars icon-menu"></i></label>
            </li>
        </ul>
    </nav>
    <section id="control-panel">
        <input type="checkbox" name="" id="icon-nav-menu">
        <div class="opc-panel">
            <h3 class="nombre-panel"><?php echo $nombre.' '.$ape1?></h3>
            <div class="div-img-panel">
                <img class="img-panel" src="../img/logo.jpg" alt="">
            </div>

            <hr class="hr-linea">

            <a class="ancla-opc" href="administradores.php">
                <div class="div-ancla">
                    <h4>Administradores</h5>
                </div>
            </a>

            <hr class="hr-linea">

            <a class="ancla-opc" href="clientes.php">
                <div class="div-ancla">
                    <h4>Clientes</h5>
                </div>
            </a>

            <hr class="hr-linea">

            <a class="ancla-opc" href="estadisticas.php">
                <div class="div-ancla">
                    <h4>Estadísticas</h5>
                </div>
            </a>

            <hr class="hr-linea">

            <a class="ancla-opc" href="mensajes.php">
                <div class="div-ancla">
                    <h4>Mensajes</h5>
                </div>
            </a>

            <hr class="hr-linea">

            <a class="ancla-opc" href="productos.php">
                <div class="div-ancla">
                    <h4>Productos</h5>
                </div>
            </a>

            <hr class="hr-linea">

            <a class="ancla-opc" href="pedidos.php">
                <div class="div-ancla">
                    <h4>Pedidos</h5>
                </div>
            </a>

            <hr class="hr-linea">

            <a class="ancla-opc" href="envios.php">
                <div class="div-ancla">
                    <h4>Envíos</h5>
                </div>
            </a>

            <hr class="hr-linea">

            <a class="ancla-opc" href="ventas.php">
                <div class="div-ancla">
                    <h4>Ventas</h5>
                </div>
            </a>

            <hr class="hr-linea">

            <a class="ancla-opc" href="../cerrar_sesion.php">
                <div class="div-ancla">
                    <h4>Cerrar Sesión</h5>
                </div>
            </a>

            <hr class="hr-linea">

            

        </div>

        <div class="contenido-panel">
            <div class="div-estadisticas-numeros-estadisticas2">
                <div class="div-estadisticas">
                    <h4 class="h4-estadisticas">E S T A D Í S T I C A S</h4>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Optio accusamus debitis officia necessitatibus cupiditate maxime voluptatibus! Voluptas laborum ratione labore eligendi unde eaque soluta dolore optio ipsam, voluptatem facilis sint.</p>
                </div>
                <div class="div-numeros">
                    <a class="ancla-admins" href="administradores.php">
                        <div class="div-admins">
                            <h3>Número de admins</h3>
                            <h4><?php echo $numA?></h5>
                        </div>
                    </a>
                    <a class="ancla-clientes" href="clientes.php">
                        <div class="div-clientes">
                            <h3>Número de clientes</h3>
                            <h4><?php echo $numC?></h5>
                        </div>
                    </a>
                    <a class="ancla-ventas" href="ventas.php">
                        <div class="div-ventas">
                            <h3>Número de ventas</h3>
                            <h4><?php echo $numV?></h5>
                        </div>
                    </a>
                </div>
                <div class="div-estadisticas2">
                </div>
            </div>
            <div class="div-calendario-barras">
                <div class="div-calendario">
                    <h4 class="h4-calendario">C A L E N D A R I O</h4>
                    <iframe src="https://calendar.google.com/calendar/embed?height=250&amp;wkst=1&amp;bgcolor=%23ffffff&amp;ctz=America%2FMexico_City&amp;src=amF2aWVyYWxlamFuZHJvc2FsYXphcnRvcnJlc0BnbWFpbC5jb20&amp;src=dXRkLmVkdS5teF9jbGFzc3Jvb20wNDcwMDcyYkBncm91cC5jYWxlbmRhci5nb29nbGUuY29t&amp;src=ZXMubWV4aWNhbiNob2xpZGF5QGdyb3VwLnYuY2FsZW5kYXIuZ29vZ2xlLmNvbQ&amp;src=Y2xhc3Nyb29tMTE1ODA4NDY5ODc2NTI4NzYzNDM1QGdyb3VwLmNhbGVuZGFyLmdvb2dsZS5jb20&amp;color=%23039BE5&amp;color=%230047a8&amp;color=%230B8043&amp;color=%23202124&amp;showTitle=0&amp;showPrint=0&amp;showCalendars=0&amp;showTz=0" style="border-width:0" width="300" height="217" frameborder="0" scrolling="no"></iframe>
                </div>
                <div class="div-barras">
                </div>
            </div>
        </div>
    </section>

    <script src="../js/control_panel.js"></script>
    <!-- fontawesome -->
    <script src="https://kit.fontawesome.com/56b0f801ce.js" crossorigin="anonymous"></script>
</body>

</html>

<?php

    }elseif(isset($_SESSION['estandar'])){

        $correo = $_SESSION['estandar'];

        $C_administradores = (new MongoDB\Client('mongodb+srv://javier:javier12345@cluster0.w3wdi.mongodb.net/opss?retryWrites=true&w=majority'))->opss->administradores; 
        $datos = $C_administradores->findOne(['correo' => $correo]);

        $nombre = $datos['nombre'];
        $ape1 = $datos['ape1'];



        $C_clientes = (new MongoDB\Client('mongodb+srv://javier:javier12345@cluster0.w3wdi.mongodb.net/opss?retryWrites=true&w=majority'))->opss->clientes; 
        $C_ventas = (new MongoDB\Client('mongodb+srv://javier:javier12345@cluster0.w3wdi.mongodb.net/opss?retryWrites=true&w=majority'))->opss->ventas; 

        $numA = $C_administradores -> count();
        $numC = $C_clientes -> count();
        $numV = $C_ventas -> count();

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de control</title>
    <link rel="shortcut icon" href="../img/favicon.jpg">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/estilos_responsivo.css">
</head>

<body>
    <nav class="menu">
        <ul class="ul-menu">
            <li class="li-menu">
                Panel de control: OPSS
            </li>
            <li class="li-menu">
                <?php echo $fecha?>
            </li>
            <li class="li-menu">
                Bienvenid@: <?php echo $nombre.' '.$ape1?>
            </li>
            <li class="li-menu">
                <a class="salir" href="../cerrar_sesion.php"><i class="fas fa-power-off"></i></a>
            </li>
           <!--  <li class="li-menu">
                <label for="icon-nav-menu"><i class="fas fa-bars"></i></label>
            </li> -->
        </ul>
    </nav>
    <section id="control-panel">
        <input type="checkbox" name="" id="icon-nav-menu">
        <div class="opc-panel">
            <h3 class="nombre-panel"><?php echo $nombre.' '.$ape1?></h3>
            <div class="div-img-panel">
                <img class="img-panel" src="../img/logo.jpg" alt="">
            </div>

            <hr class="hr-linea">

            <a class="ancla-opc" href="administradores.php">
                <div class="div-ancla">
                    <h4>Administradores</h5>
                </div>
            </a>

            <hr class="hr-linea">

            <a class="ancla-opc" href="clientes.php">
                <div class="div-ancla">
                    <h4>Clientes</h5>
                </div>
            </a>

            <hr class="hr-linea">

            <a class="ancla-opc" href="estadisticas.php">
                <div class="div-ancla">
                    <h4>Estadísticas</h5>
                </div>
            </a>

            <hr class="hr-linea">

            <a class="ancla-opc" href="mensajes.php">
                <div class="div-ancla">
                    <h4>Mensajes</h5>
                </div>
            </a>

            <hr class="hr-linea">

            <a class="ancla-opc" href="productos.php">
                <div class="div-ancla">
                    <h4>Productos</h5>
                </div>
            </a>

            <hr class="hr-linea">

            <a class="ancla-opc" href="pedidos.php">
                <div class="div-ancla">
                    <h4>Pedidos</h5>
                </div>
            </a>

            <hr class="hr-linea">

            <a class="ancla-opc" href="envios.php">
                <div class="div-ancla">
                    <h4>Envíos</h5>
                </div>
            </a>

            <hr class="hr-linea">

            <a class="ancla-opc" href="ventas.php">
                <div class="div-ancla">
                    <h4>Ventas</h5>
                </div>
            </a>

            <hr class="hr-linea">

            <a class="ancla-opc" href="../cerrar_sesion.php">
                <div class="div-ancla">
                    <h4>Cerrar Sesión</h5>
                </div>
            </a>

            <hr class="hr-linea">

            

        </div>

        <div class="contenido-panel">
            <div class="div-estadisticas-numeros-estadisticas2">
                <div class="div-estadisticas">
                    <h4 class="h4-estadisticas">E S T A D Í S T I C A S</h4>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Optio accusamus debitis officia necessitatibus cupiditate maxime voluptatibus! Voluptas laborum ratione labore eligendi unde eaque soluta dolore optio ipsam, voluptatem facilis sint.</p>
                </div>
                <div class="div-numeros">
                    <a class="ancla-admins" href="administradores.php">
                        <div class="div-admins">
                            <h3>Número de admins</h3>
                            <h4><?php echo $numA?></h5>
                        </div>
                    </a>
                    <a class="ancla-clientes" href="clientes.php">
                        <div class="div-clientes">
                            <h3>Número de clientes</h3>
                            <h4><?php echo $numC?></h5>
                        </div>
                    </a>
                    <a class="ancla-ventas" href="ventas.php">
                        <div class="div-ventas">
                            <h3>Número de ventas</h3>
                            <h4><?php echo $numV?></h5>
                        </div>
                    </a>
                </div>
                <div class="div-estadisticas2">
                </div>
            </div>
            <div class="div-calendario-barras">
                <div class="div-calendario">
                    <h4 class="h4-calendario">C A L E N D A R I O</h4>
                    <iframe src="https://calendar.google.com/calendar/embed?height=250&amp;wkst=1&amp;bgcolor=%23ffffff&amp;ctz=America%2FMexico_City&amp;src=amF2aWVyYWxlamFuZHJvc2FsYXphcnRvcnJlc0BnbWFpbC5jb20&amp;src=dXRkLmVkdS5teF9jbGFzc3Jvb20wNDcwMDcyYkBncm91cC5jYWxlbmRhci5nb29nbGUuY29t&amp;src=ZXMubWV4aWNhbiNob2xpZGF5QGdyb3VwLnYuY2FsZW5kYXIuZ29vZ2xlLmNvbQ&amp;src=Y2xhc3Nyb29tMTE1ODA4NDY5ODc2NTI4NzYzNDM1QGdyb3VwLmNhbGVuZGFyLmdvb2dsZS5jb20&amp;color=%23039BE5&amp;color=%230047a8&amp;color=%230B8043&amp;color=%23202124&amp;showTitle=0&amp;showPrint=0&amp;showCalendars=0&amp;showTz=0" style="border-width:0" width="300" height="217" frameborder="0" scrolling="no"></iframe>
                </div>
                <div class="div-barras">
                </div>
            </div>
        </div>
    </section>

    <script src="../js/control_panel.js"></script>
    <!-- fontawesome -->
    <script src="https://kit.fontawesome.com/56b0f801ce.js" crossorigin="anonymous"></script>
</body>

</html>

<?php

    }elseif(isset($_SESSION['usuario'])||!isset($_SESSION['usuario'])) {
        header('Location: ../index.php');
    }

?>
