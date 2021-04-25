<?php

    session_start();
    require_once __DIR__ . '/vendor/autoload.php';

    if(isset($_SESSION['admin'])||isset($_SESSION['estandar'])){

        header("Location: control_panel/index.php");
    
    }elseif(isset($_SESSION['usuario'])){

        $correo = $_SESSION['usuario'];

        $C_clientes = (new MongoDB\Client('mongodb+srv://javier:javier12345@cluster0.w3wdi.mongodb.net/opss?retryWrites=true&w=majority'))->opss->clientes; 
        $datos = $C_clientes->findOne(['correo' => $correo]);
        
        $nombre = $datos['nombres']['nombre'];
        $ape1 = $datos['nombres']['ape1'];


?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Transiciones -->
    <script src="js/scrollreveal.js"></script>
    <!-- Estilos -->
    <link rel="shortcut icon" href="img/favicon1.png">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@100&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilos_noticia.css">
    <link rel="stylesheet" href="css/estilos_responsivo.css">
    <link rel="stylesheet" href="assets/future/css/main.css" />
    <title>Noticias | OPSS</title>
</head>

<body class="body_noticias">
    
    <!-- Menu normal -->
    <header id="headerf">
        <h1 class="h1f"><a class="ancla-navf" href="index.php">Alarmas - OPSS</a></h1>
        <nav class="links">
            <ul class="ulf">        
                <li class="lif"><a class="ancla-navf" href="index.php">INICIO</a></li>
                <li class="lif"><a class="ancla-navf" href="productos.php">PRODUCTOS</a></li>
                <li class="lif"><a class="ancla-navf" href="noticias.php">NOTICIAS</a></li>
                <li class="lif"><a class="ancla-navf" href="asistencia.php">ASISTENCIA</a></li>
                <li class="lif nombre-li">
                    <div class="btn-group group-button-z">
                        <button class="button-nav-nombre nombre-btn dropdown-button ancla-navf dropdown-toggle" id="dp-categorias" data-toggle="dropdown">
                            <?php echo $nombre.' '.$ape1?>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dp-categorias">
                            <a href="mi_perfil.php" class="text-center ancla-navf ancla-dropdown dropdown-item">Mi perfil</a>
                            <a href="mis_pedidos.php" class="text-center ancla-navf ancla-dropdown dropdown-item">Mis pedidos</a>         
                            <a href="alarmas.php" class="text-center ancla-navf ancla-dropdown dropdown-item">Mis alarmas</a>         
                            <a href="cerrar_sesion.php" class="text-center ancla-navf ancla-dropdown dropdown-item">Cerrar sesión</a>         
                        </div>
                    </div>
                </li>
            </ul>
        </nav>
        <nav class="mainf">
            <ul class="ulf ul-switch_menu">
                <li class="li-switch">
                    <button class="switch align-items-center" id="switch">
				    	<span><i class="fas fa-sun"></i></span>
				    	<span><i class="fas fa-moon"></i></span>
				    </button>
                </li> 
                <li class="lif menu">
                    <a class="desaparece ancla-navf fa-bars" href="#menu">MENÚ</a>
                </li>
            </ul>
        </nav>
    </header>

    <!-- Menu responsive -->
    <section class="sectionf" id="menu">

        <!-- logo -->
        <section class="py-5 text-center bg-dark sectionf">
            <img src="img/Logo6.png" width="140px"  alt="">
        </section>

        <!-- Links -->
        <section class="sectionf text-center">
            <ul class="ulf links">
                <li class="lif">
                    <a class="ancla-navf" href="index.php">
                        <h3 class="h3f">INICIO</h3>
                    </a>
                </li>
                <li class="lif">
                    <a class="ancla-navf" href="noticias.php">
                        <h3 class="h3f">NOTICIAS</h3>
                    </a>
                </li>
                <li class="lif">
                    <a class="ancla-navf" href="asistencia.php">
                        <h3 class="h3f">ASISTENCIA</h3>
                    </a>
                </li>
                <li class="lif">
                    <a class="ancla-navf" href="productos.php">
                        <h3 class="h3f">PRODUCTOS</h3>
                    </a>
                </li>
                <li class="lif">
                    <a class="ancla-navf" href="mi_perfil.php">
                        <h3 class="h3f">MI PERFIL</h3>
                    </a>
                </li>
                <li class="lif">
                    <a class="ancla-navf" href="mis_pedidos.php">
                        <h3 class="h3f">MIS PEDIDOS</h3>
                    </a>
                </li>
                <li class="lif">
                    <a class="ancla-navf" href="alarmas.php">
                        <h3 class="h3f">MIS ALARMAS</h3>
                    </a>
                </li>
            </ul>
        </section>

        <!-- Actions -->
        <section>
            <ul class="ulf actions vertical">
                <li class="lif decoration-non"><a href="mi_perfil.php" class="ancla-navf button big fit"><?php echo $nombre.' '.$ape1?></a></li>
                <li class="lif decoration-non"><a href="cerrar_sesion.php" class="ancla-navf button big fit">CERRAR SESIÓN</a></li>
            </ul>
        </section>

    </section>

    <section id="noticias" class="mt-5 pt-2">
        <div class="jumpbotron fondo_jump pt-5 pb-5">
            <div class="container">
                <div class="row justify-content-around">
                    <div class="imagen_responsiva-noticias col-12 mb-2">
                        <img class="img-noticias" src="https://www.corporateit.cl/wp-content/uploads/2020/04/iot.jpg" alt="">
                    </div>
                    <div class="contenido_princiapl-responsivo col-12 mb-2">
                        <h1 class="titulo_jumpbotron">¿Qué es el internet de las cosas o internet of things (IoT)?</h1>
                        <p class="parrafo_jumpbotron">
                            Seguramente estos últimos años haz escuchado mucho sobre el termino Internet of Things o IoT. En español lo llamamos el internet de las cosas. En esta seccion te explicaremos algunos conceptos sobre estos temas. El internet de las cosas aparece casi por una necesidad: la comunicación; pero no la comunicación que conocemos normalmente, sino la comunicación entre dispositivos o también conocida como M2M, machine 2 machine.
                        </p>
                    </div>
                    <div class="contenido_princiapl-normal col-md-6 mb-2">
                        <h1 class="titulo_jumpbotron">¿Qué es el internet de las cosas o internet of things (IoT)?</h1>
                        <p class="parrafo_jumpbotron">
                            Seguramente estos últimos años haz escuchado mucho sobre el termino Internet of Things o IoT. En español lo llamamos el internet de las cosas. En esta seccion te explicaremos algunos conceptos sobre estos temas. El internet de las cosas aparece casi por una necesidad: la comunicación; pero no la comunicación que conocemos normalmente, sino la comunicación entre dispositivos o también conocida como M2M, machine 2 machine.
                        </p>
                    </div>
                    <div class="imagen_normal-noticias col-md-5 mb-2">
                        <img class="img-noticias" src="https://www.corporateit.cl/wp-content/uploads/2020/04/iot.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="container mt-5 mb-5">
            <div class="row justify-content-around contenido_noticia">
                <div class="temario_responsivo col-12 fondo_lista-grupo">
                    <ul class="list-group">
                        <a href="#concepto" data-url="concepto" class="list-group-item list-group-item-action">Concepto</a>
                        <a href="#beneficios" data-url="beneficios" class="list-group-item list-group-item-action">Beneficios</a>
                        <a href="#donde_empezar" data-url="donde_empezar" class="list-group-item list-group-item-action">¿Dónde empezar?</a>
                        <a href="#aplicaciones" data-url="aplicaciones" class="list-group-item list-group-item-action">Aplicaciones</a>
                        <a href="#campos_aplicacion" data-url="campos_aplicacion" class="list-group-item list-group-item-action">Campos de aplicación</a>
                        <a href="#ejemplos" data-url="ejemplos" class="list-group-item list-group-item-action">Ejemplos</a>
                        <a href="#como_funciona" data-url="como_funciona" class="list-group-item list-group-item-action">Como funciona</a>
                    </ul>
                </div>
                <div class="col-12 col-md-12 col-lg-8 fondo_texto">
                    <div id="concepto" class="seccion">
                        <h2 class="titulo-noticias1 text-white">Concepto</h2>
                        <p class="p-noticias">
                            Combinar varios sensores, circuitos electrónicos, procesadores y cualquier dispositivo que se conozca podría entrar en menor o mayor forma al concepto del internet de las cosas. En otras palabras IoT es forma de conectar cualquier dispositivo con otro. 
                        </p>
                    </div>
                    <div id="beneficios" class="seccion mt-1">
                        <h2 class="titulo-noticias text-white mt-2">Beneficios de internet de las cosas</h2>
                        <p class="p-noticias">
                            <ul>
                                <li>Nuevos modelos de negocios e ingresos</li>
                                <li>Eficiencia operativa</li>
                                <li>Productividad de la fuerza laboral</li>
                                <li>Experiencias de cliente mejoradas</li>
                            </ul>
                        </p>
                    </div>
                    <div id="donde_empezar" class="seccion mt-1">
                        <h2 class="titulo-noticias text-white mt-2">¿Dónde empezar?</h2>
                        <p class="p-noticias">
                            Si se busca por donde empezar en el internet de las cosas normalmente encontraras 2 respuestas comunes: Arduino y Raspberry PI.
                        </p>
                        <p class="p-noticias">
                            Arduino es una placa que se programa, en otras palabras tiene un chip. Lo más interesante es que se ha realizado con SW y HW del tipo open source. Raspberry pi, en pocas palabras, es una computadora pequeña. A manera teórica se dice que es una computadora de placa reducida. Hay un debate sobre que tan open source es, por como se manejan los derechos de marca y los contratos de distribución. 
                        </p>
                    </div>
                    <div id="aplicaciones" class="seccion mt-1">
                        <h2 class="titulo-noticias text-white mt-2">Aplicaciones</h2>
                        <p class="p-noticias">
                            Las aplicaciones para dispositivos conectados a internet son amplias. Múltiples categorías han sido sugeridas, pero la mayoría está de acuerdo en separar las aplicaciones en tres principales ramas de uso: consumidores, empresarial, e infraestructura. George Osborne, exmiembro del gabinete encargado de finanzas, propone que la IoT es la próxima etapa en la revolución de la información, refiriéndose a la interconectividad de todo: desde el transporte urbano hasta dispositivos médicos, pasando por electrodomésticos.
                        </p>
                    </div>
                    <div id="campos_aplicacion" class="seccion mt-1">
                        <h2 class="titulo-noticias text-white mt-2">Algunos campos de aplicación serían</h2>
                        <p class="p-noticias">
                            <ul>
                                <li>Agricultura</li>
                                <li>Medicina y salud</li>
                                <li>Transporte</li>
                                <li>Industria</li>
                                <li>Educación</li>
                            </ul>
                        </p>
                    </div>                    
                    <div id="ejemplos" class="seccion mt-1">
                        <h2 class="titulo-noticias text-white mt-2">Ejemplos de las IoT</h2>
                        <p class="p-noticias">
                            <ul>
                                <li>Seguridad en el hogar</li>
                                <li>Reguladores de Luz</li>
                                <li>Sensores para el jardín</li>
                                <li>Puertas inteligentes</li>
                                <li>Transporte Inteligente</li>
                            </ul>
                        </p>
                    </div>
                    <div id="como_funciona" class="seccion mt-1">
                        <h2 class="titulo-noticias text-white mt-2 mb-4">Cómo funciona IoT con tecnologías clave</h2>
                            <ul class="p-noticias">
                                <li class="mb-4">
                                    <b class="text-primary">Gestión de datos y analítica de streaming.</b> Internet de las Cosas impone altas exigencias para la gestión del streaming de Big Data proveniente de sensores. La tecnología de procesamiento de series de eventos – que se conoce a menudo como analítica de streaming – lleva a cabo gestión y analítica de datos de la IoT en tiempo real para hacerlos más valiosos. Entre las capacidades clave se cuentan filtrado, normalización, estandarización, transformación, agregación, correlación y análisis temporal.                                    
                                </li>
                                <li class="mb-4">
                                    <b class="text-primary">Analítica de Big Data.</b> La IoT aporta muchos Big Data – el volumen masivo, la velocidad y la variedad de datos estructurados y no estructurados que las empresas reúnen cada día. Obtener valor del Big Data en IoT requiere analítica de Big Data. Técnicas relacionadas incluyen analítica predictiva, minería de texto, computación en la nube, minería de datos, lagos de datos y Hadoop. La mayoría de las organizaciones emplean una combinación de estas técnicas para obtener el mayor posible de la IoT.                                    
                                </li>
                                <li class="mb-4">
                                    <b class="text-primary">Inteligencia artificial.</b> La inteligencia artificial puede multiplicar el valor de IoT utilizando todos los datos de dispositivos inteligentes conectados para promover el aprendizaje y la inteligencia colectiva. Algunas de las técnicas centrales que emplea la inteligencia artificial son el machine learning, el aprendizaje a fondo, el procesamiento del lenguaje natural y la visión por computadora.
                                </li>
                            </ul>                  
                    </div>
                </div>
                <div class="temario_normal col-md-3 fondo_lista-grupo">
                    <ul class="list-group">
                        <a href="#concepto" data-url="concepto" class="menu_itemNoticia list-group-item list-group-item-action">Concepto</a>
                        <a href="#beneficios" data-url="beneficios" class="menu_itemNoticia list-group-item list-group-item-action">Beneficios</a>
                        <a href="#donde_empezar" data-url="donde_empezar" class="menu_itemNoticia list-group-item list-group-item-action">¿Dónde empezar?</a>
                        <a href="#aplicaciones" data-url="aplicaciones" class="menu_itemNoticia list-group-item list-group-item-action">Aplicaciones</a>
                        <a href="#campos_aplicacion" data-url="campos_aplicacion" class="menu_itemNoticia list-group-item list-group-item-action">Campos de aplicación</a>
                        <a href="#ejemplos" data-url="ejemplos" class="menu_itemNoticia list-group-item list-group-item-action">Ejemplos</a>
                        <a href="#como_funciona" data-url="como_funciona" class="menu_itemNoticia list-group-item list-group-item-action">Como funciona</a>
                    </ul>
                </div>
            </div>
        </div>

    </section>

    <!-- DarkMode -->
    <script src="js/darkmode.js"></script>
    <!-- Link indicador activado -->
    <script src="js/activeIndicador.js"></script>
    <!-- Fontawesome -->
    <script src="https://kit.fontawesome.com/56b0f801ce.js" crossorigin="anonymous"></script>
    <!-- Transiciones -->
    <script src="js/index.js"></script>
    <!-- Estilos script -->
    <?php include_once "views/script_bootstrap.php"?>
    <?php include_once "views/script_future.php"?>
    <!-- LINK ACTIVE -->
    <script>
        const currentLocation = location.href;
        const menuItem = document.querySelectorAll("a");
        const menuLength = menuItem.length;
        for (let i = 0; i < menuLength; i++) {
        if (menuItem[i].href === currentLocation) menuItem[i].className = "active";
        }
    </script>
    <!-- Link de noticia activado -->
    <script>
        $(document).on("click", ".list-group-item", function () {
            $(this).addClass("activeNoticias").siblings().removeClass("activeNoticias");
        });
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Transiciones -->
    <script src="js/scrollreveal.js"></script>
    <!-- Estilos -->
    <link rel="shortcut icon" href="img/favicon1.png">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@100&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilos_noticia.css">
    <link rel="stylesheet" href="css/estilos_responsivo.css">
    <link rel="stylesheet" href="assets/future/css/main.css" />
    <title>Noticias | OPSS</title>
</head>

<body class="body_noticias">
    
    <!-- Menu normal -->
    <header id="headerf">
        <h1 class="h1f"><a class="ancla-navf" href="index.php">Alarmas - OPSS</a></h1>
        <nav class="links">
            <ul class="ulf">
                <li class="lif"><a class="ancla-navf" href="index.php">INICIO</a></li>
                <li class="lif"><a class="ancla-navf" href="productos.php">PRODUCTOS</a></li>
                <li class="lif"><a class="ancla-navf" href="noticias.php">NOTICIAS</a></li>
                <li class="lif"><a class="ancla-navf" href="asistencia.php">ASISTENCIA</a></li>
                <li class="lif"><a class="ancla-navf" href="iniciar_sesion.php">INICIAR SESIÓN</a></li>
                <li class="lif"><a class="ancla-navf" href="registrarse.php">REGISTRARSE</a></li>
            </ul>
        </nav>
        <nav class="mainf">
            <ul class="ulf ul-switch_menu">
                <li class="li-switch">
                    <button class="switch align-items-center" id="switch">
				    	<span><i class="fas fa-sun"></i></span>
				    	<span><i class="fas fa-moon"></i></span>
				    </button>
                </li>      
                    
                <li class="lif menu">
                    <a class="desaparece ancla-navf fa-bars" href="#menu">MENÚ</a>
                </li>
            </ul>
        </nav>
    </header>

    <!-- Menu responsive -->
    <section class="sectionf" id="menu">

        <!-- logo width="300px"-->
        <section class="py-5 text-center bg-dark sectionf">
            <img src="img/Logo6.png" width="140px"  alt="">
        </section>

        <!-- Links -->
        <section class="sectionf text-center">
            <ul class="ulf links">
                <li class="lif">
                    <a class="ancla-navf" href="index.php">
                        <h3 class="h3f">INICIO</h3>
                    </a>
                </li>
                <li class="lif">
                    <a class="ancla-navf" href="noticias.php">
                        <h3 class="h3f">NOTICIAS</h3>
                    </a>
                </li>
                <li class="lif">
                    <a class="ancla-navf" href="asistencia.php">
                        <h3 class="h3f">ASISTENCIA</h3>
                    </a>
                </li>
                <li class="lif">
                    <a class="ancla-navf" href="productos.php">
                        <h3 class="h3f">PRODUCTOS</h3>
                    </a>
                </li>
                <li class="lif">
                    <a class="ancla-navf" href="registrar.php">
                        <h3 class="h3f">REGISTRARSE</h3>
                    </a>
                </li>
            </ul>
        </section>

        <!-- Actions -->
        <section>
            <ul class="ulf actions vertical">
                <li class="lif decoration-non"><a href="iniciar_sesion.php" class="ancla-navf button big fit">INICIAR SESIÓN</a></li>
            </ul>
        </section>

    </section>

    <section id="noticias" class="mt-5 pt-2">
        <div class="jumpbotron fondo_jump pt-5 pb-5">
            <div class="container">
                <div class="row justify-content-around">
                    <div class="imagen_responsiva-noticias col-12 mb-2">
                        <img class="img-noticias" src="https://www.corporateit.cl/wp-content/uploads/2020/04/iot.jpg" alt="">
                    </div>
                    <div class="contenido_princiapl-responsivo col-12 mb-2">
                        <h1 class="titulo_jumpbotron">¿Qué es el internet de las cosas o internet of things (IoT)?</h1>
                        <p class="parrafo_jumpbotron">
                            Seguramente estos últimos años haz escuchado mucho sobre el termino Internet of Things o IoT. En español lo llamamos el internet de las cosas. En esta seccion te explicaremos algunos conceptos sobre estos temas. El internet de las cosas aparece casi por una necesidad: la comunicación; pero no la comunicación que conocemos normalmente, sino la comunicación entre dispositivos o también conocida como M2M, machine 2 machine.
                        </p>
                    </div>
                    <div class="contenido_princiapl-normal col-md-6 mb-2">
                        <h1 class="titulo_jumpbotron">¿Qué es el internet de las cosas o internet of things (IoT)?</h1>
                        <p class="parrafo_jumpbotron">
                            Seguramente estos últimos años haz escuchado mucho sobre el termino Internet of Things o IoT. En español lo llamamos el internet de las cosas. En esta seccion te explicaremos algunos conceptos sobre estos temas. El internet de las cosas aparece casi por una necesidad: la comunicación; pero no la comunicación que conocemos normalmente, sino la comunicación entre dispositivos o también conocida como M2M, machine 2 machine.
                        </p>
                    </div>
                    <div class="imagen_normal-noticias col-md-5 mb-2">
                        <img class="img-noticias" src="https://www.corporateit.cl/wp-content/uploads/2020/04/iot.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="container mt-5 mb-5">
            <div class="row justify-content-around contenido_noticia">
                <div class="temario_responsivo col-12 fondo_lista-grupo">
                    <ul class="list-group">
                        <a href="#concepto" data-url="concepto" class="list-group-item list-group-item-action">Concepto</a>
                        <a href="#beneficios" data-url="beneficios" class="list-group-item list-group-item-action">Beneficios</a>
                        <a href="#donde_empezar" data-url="donde_empezar" class="list-group-item list-group-item-action">¿Dónde empezar?</a>
                        <a href="#aplicaciones" data-url="aplicaciones" class="list-group-item list-group-item-action">Aplicaciones</a>
                        <a href="#campos_aplicacion" data-url="campos_aplicacion" class="list-group-item list-group-item-action">Campos de aplicación</a>
                        <a href="#ejemplos" data-url="ejemplos" class="list-group-item list-group-item-action">Ejemplos</a>
                        <a href="#como_funciona" data-url="como_funciona" class="list-group-item list-group-item-action">Como funciona</a>
                    </ul>
                </div>
                <div class="col-12 col-md-12 col-lg-8 fondo_texto">
                    <div id="concepto" class="seccion">
                        <h2 class="titulo-noticias1 text-white">Concepto</h2>
                        <p class="p-noticias">
                            Combinar varios sensores, circuitos electrónicos, procesadores y cualquier dispositivo que se conozca podría entrar en menor o mayor forma al concepto del internet de las cosas. En otras palabras IoT es forma de conectar cualquier dispositivo con otro. 
                        </p>
                    </div>
                    <div id="beneficios" class="seccion mt-1">
                        <h2 class="titulo-noticias text-white mt-2">Beneficios de internet de las cosas</h2>
                        <p class="p-noticias">
                            <ul>
                                <li>Nuevos modelos de negocios e ingresos</li>
                                <li>Eficiencia operativa</li>
                                <li>Productividad de la fuerza laboral</li>
                                <li>Experiencias de cliente mejoradas</li>
                            </ul>
                        </p>
                    </div>
                    <div id="donde_empezar" class="seccion mt-1">
                        <h2 class="titulo-noticias text-white mt-2">¿Dónde empezar?</h2>
                        <p class="p-noticias">
                            Si se busca por donde empezar en el internet de las cosas normalmente encontraras 2 respuestas comunes: Arduino y Raspberry PI.
                        </p>
                        <p class="p-noticias">
                            Arduino es una placa que se programa, en otras palabras tiene un chip. Lo más interesante es que se ha realizado con SW y HW del tipo open source. Raspberry pi, en pocas palabras, es una computadora pequeña. A manera teórica se dice que es una computadora de placa reducida. Hay un debate sobre que tan open source es, por como se manejan los derechos de marca y los contratos de distribución. 
                        </p>
                    </div>
                    <div id="aplicaciones" class="seccion mt-1">
                        <h2 class="titulo-noticias text-white mt-2">Aplicaciones</h2>
                        <p class="p-noticias">
                            Las aplicaciones para dispositivos conectados a internet son amplias. Múltiples categorías han sido sugeridas, pero la mayoría está de acuerdo en separar las aplicaciones en tres principales ramas de uso: consumidores, empresarial, e infraestructura. George Osborne, exmiembro del gabinete encargado de finanzas, propone que la IoT es la próxima etapa en la revolución de la información, refiriéndose a la interconectividad de todo: desde el transporte urbano hasta dispositivos médicos, pasando por electrodomésticos.
                        </p>
                    </div>
                    <div id="campos_aplicacion" class="seccion mt-1">
                        <h2 class="titulo-noticias text-white mt-2">Algunos campos de aplicación serían</h2>
                        <p class="p-noticias">
                            <ul>
                                <li>Agricultura</li>
                                <li>Medicina y salud</li>
                                <li>Transporte</li>
                                <li>Industria</li>
                                <li>Educación</li>
                            </ul>
                        </p>
                    </div>                    
                    <div id="ejemplos" class="seccion mt-1">
                        <h2 class="titulo-noticias text-white mt-2">Ejemplos de las IoT</h2>
                        <p class="p-noticias">
                            <ul>
                                <li>Seguridad en el hogar</li>
                                <li>Reguladores de Luz</li>
                                <li>Sensores para el jardín</li>
                                <li>Puertas inteligentes</li>
                                <li>Transporte Inteligente</li>
                            </ul>
                        </p>
                    </div>
                    <div id="como_funciona" class="seccion mt-1">
                        <h2 class="titulo-noticias text-white mt-2 mb-4">Cómo funciona IoT con tecnologías clave</h2>
                            <ul class="p-noticias">
                                <li class="mb-4">
                                    <b class="text-primary">Gestión de datos y analítica de streaming.</b> Internet de las Cosas impone altas exigencias para la gestión del streaming de Big Data proveniente de sensores. La tecnología de procesamiento de series de eventos – que se conoce a menudo como analítica de streaming – lleva a cabo gestión y analítica de datos de la IoT en tiempo real para hacerlos más valiosos. Entre las capacidades clave se cuentan filtrado, normalización, estandarización, transformación, agregación, correlación y análisis temporal.                                    
                                </li>
                                <li class="mb-4">
                                    <b class="text-primary">Analítica de Big Data.</b> La IoT aporta muchos Big Data – el volumen masivo, la velocidad y la variedad de datos estructurados y no estructurados que las empresas reúnen cada día. Obtener valor del Big Data en IoT requiere analítica de Big Data. Técnicas relacionadas incluyen analítica predictiva, minería de texto, computación en la nube, minería de datos, lagos de datos y Hadoop. La mayoría de las organizaciones emplean una combinación de estas técnicas para obtener el mayor posible de la IoT.                                    
                                </li>
                                <li class="mb-4">
                                    <b class="text-primary">Inteligencia artificial.</b> La inteligencia artificial puede multiplicar el valor de IoT utilizando todos los datos de dispositivos inteligentes conectados para promover el aprendizaje y la inteligencia colectiva. Algunas de las técnicas centrales que emplea la inteligencia artificial son el machine learning, el aprendizaje a fondo, el procesamiento del lenguaje natural y la visión por computadora.
                                </li>
                            </ul>                  
                    </div>
                </div>
                <div class="temario_normal col-md-3 fondo_lista-grupo">
                    <ul class="list-group">
                        <a href="#concepto" data-url="concepto" class="menu_itemNoticia list-group-item list-group-item-action">Concepto</a>
                        <a href="#beneficios" data-url="beneficios" class="menu_itemNoticia list-group-item list-group-item-action">Beneficios</a>
                        <a href="#donde_empezar" data-url="donde_empezar" class="menu_itemNoticia list-group-item list-group-item-action">¿Dónde empezar?</a>
                        <a href="#aplicaciones" data-url="aplicaciones" class="menu_itemNoticia list-group-item list-group-item-action">Aplicaciones</a>
                        <a href="#campos_aplicacion" data-url="campos_aplicacion" class="menu_itemNoticia list-group-item list-group-item-action">Campos de aplicación</a>
                        <a href="#ejemplos" data-url="ejemplos" class="menu_itemNoticia list-group-item list-group-item-action">Ejemplos</a>
                        <a href="#como_funciona" data-url="como_funciona" class="menu_itemNoticia list-group-item list-group-item-action">Como funciona</a>
                    </ul>
                </div>
            </div>
        </div>

    </section>

    <!-- DarkMode -->
    <script src="js/darkmode.js"></script>
    <!-- Link indicador activado -->
    <script src="js/activeIndicador.js"></script>
    <!-- Fontawesome -->
    <script src="https://kit.fontawesome.com/56b0f801ce.js" crossorigin="anonymous"></script>
    <!-- Transiciones -->
    <script src="js/index.js"></script>
    <!-- Estilos script -->
    <?php include_once "views/script_bootstrap.php"?>
    <?php include_once "views/script_future.php"?>
    <!-- LINK ACTIVE -->
    <script>
        const currentLocation = location.href;
        const menuItem = document.querySelectorAll("a");
        const menuLength = menuItem.length;
        for (let i = 0; i < menuLength; i++) {
        if (menuItem[i].href === currentLocation) menuItem[i].className = "active";
        }
    </script>
    <!-- Link de noticia activado -->
    <script>
        $(document).on("click", ".list-group-item", function () {
            $(this).addClass("activeNoticias").siblings().removeClass("activeNoticias");
        });
    </script>    

</body>

</html>

<?php

    }

?>