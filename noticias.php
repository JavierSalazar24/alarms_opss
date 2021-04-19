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
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/estilos_responsivo.css">
    <link rel="stylesheet" href="assets/future/css/main.css" />
    <title>Noticias | OPSS</title>
</head>

<body class="body_noticias">
    
    <?php include "partes/_navs.php" ?>

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
                    <div id="concepto" class="seccion mt-1">
                        <div>
                            <div>
                                <h2 class="titulo-noticias text-white">Concepto</h2>
                                <p class="p-noticias">
                                    Combinar varios sensores, circuitos electrónicos, procesadores y cualquier dispositivo que se conozca podría entrar en menor o mayor forma al concepto del internet de las cosas. En otras palabras IoT es forma de conectar cualquier dispositivo con otro. 
                                </p>
                            </div>
                        </div>
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
                            Las aplicaciones para dispositivos conectados a internet son amplias. Múltiples categorías han sido sugeridas, pero la mayoría está de acuerdo en separar las aplicaciones en tres principales ramas de uso: consumidores, empresarial, e infraestructura.22​23​ George Osborne, exmiembro del gabinete encargado de finanzas, propone que la IoT es la próxima etapa en la revolución de la información, refiriéndose a la interconectividad de todo: desde el transporte urbano hasta dispositivos médicos, pasando por electrodomésticos.
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
                </div>
                <div class="temario_normal col-md-3 fondo_lista-grupo">
                    <ul class="list-group">
                        <a href="#concepto" data-url="concepto" class="list-group-item list-group-item-action">Concepto</a>
                        <a href="#beneficios" data-url="beneficios" class="list-group-item list-group-item-action">Beneficios</a>
                        <a href="#donde_empezar" data-url="donde_empezar" class="list-group-item list-group-item-action">¿Dónde empezar?</a>
                        <a href="#aplicaciones" data-url="aplicaciones" class="list-group-item list-group-item-action">Aplicaciones</a>
                        <a href="#campos_aplicacion" data-url="campos_aplicacion" class="list-group-item list-group-item-action">Campos de aplicación</a>
                        <a href="#ejemplos" data-url="ejemplos" class="list-group-item list-group-item-action">Ejemplos</a>
                        <a href="#como_funciona" data-url="como_funciona" class="menu_itemNoticia list-group-item list-group-item-action">Como funciona</a>
                    </ul>
                </div>
            </div>
        </div>

    </section>

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
    <!-- Link indicador activado -->
    <script src="js/activeIndicador.js"></script>

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
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/estilos_responsivo.css">
    <link rel="stylesheet" href="assets/future/css/main.css" />
    <title>Noticias | OPSS</title>
</head>

<body class="body_noticias">
    
    <?php include "partes/_nav.php" ?>

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
                        <h2 class="titulo-noticias text-white mt-2">Cómo funciona la IoT con tecnologías clave</h2>
                        <p class="p-noticias">
                            <ul>
                                <li>
                                    <b class="text-primary">Gestión de datos y analítica de streaming.</b> Internet de las Cosas impone altas exigencias para la gestión del streaming de Big Data proveniente de sensores. La tecnología de procesamiento de series de eventos – que se conoce a menudo como analítica de streaming – lleva a cabo gestión y analítica de datos de la IoT en tiempo real para hacerlos más valiosos. Entre las capacidades clave se cuentan filtrado, normalización, estandarización, transformación, agregación, correlación y análisis temporal.                                    
                                </li>
                                <br>
                                <li>
                                    <b class="text-primary">Analítica de Big Data.</b> La IoT aporta muchos Big Data – el volumen masivo, la velocidad y la variedad de datos estructurados y no estructurados que las empresas reúnen cada día. Obtener valor del Big Data en IoT requiere analítica de Big Data. Técnicas relacionadas incluyen analítica predictiva, minería de texto, computación en la nube, minería de datos, lagos de datos y Hadoop. La mayoría de las organizaciones emplean una combinación de estas técnicas para obtener el mayor posible de la IoT.                                    
                                </li>
                                <br>
                                <li>
                                    <b class="text-primary">Inteligencia artificial.</b> La inteligencia artificial puede multiplicar el valor de IoT utilizando todos los datos de dispositivos inteligentes conectados para promover el aprendizaje y la inteligencia colectiva. Algunas de las técnicas centrales que emplea la inteligencia artificial son el machine learning, el aprendizaje a fondo, el procesamiento del lenguaje natural y la visión por computadora.
                                </li>
                            </ul>
                        </p>
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
    <!-- Link indicador activado -->
    <script src="js/activeIndicador.js"></script>

</body>

</html>

<?php

    }

?>