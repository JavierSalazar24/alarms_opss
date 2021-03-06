<?php

session_start();
require_once 'vendor/autoload.php';

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
    <meta name="keywords" content="Alarmas, IoT, Seguridad, WIFI, Intenet of Things, Alarma, Ventas, Casa">
    <meta name="description" content="OPSS Es una comparañia destinada a brindar seguridad con calidad y buen precio, contamos con alarmas hechas con ayuda de las IoT para brindar una mejor seguridad y fácil accesibilidad a estas.">
    <meta name="author" content="Empresa OPSS.">
    <meta name="copyright" content="Empresa OPSS.">
    <meta name="robots" content="index">
    <title>OPSS</title>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/estilos_responsivo.css">
    <script src="js/scrollreveal.js"></script>
    <link rel="shortcut icon" href="img/favicon1.png">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@100&display=swap" rel="stylesheet">
</head>

<body>

   <?php include "partes/_navs.php"; ?>

   <section id="promocion">
        <div class="div-caja1-promocion">
            <h1 class="h1-promocion1">TU HOGAR</h1>
            <h1 class="h1-promocion2">MÁS INTELIGENTE</h1>
            <p class="p-promocion">Controla la seguridad de tu hogar con estilo.</p>
            <div class="div-btn-promocion">
                <p><a class="btn-promocion" href="#funcionamiento">Saber más</a></p>
            </div>
        </div>

    </section>

    <section id="funcionamiento">
        <div class="div-caja-funcionamiento">
            <h1 class="h1-funcionamiento1">COMO</h1>
            <h1 class="h1-funcionamiento2">TRABAJAN</h1>
            <p class="p-funcionamiento">Al sincronizar la alarma de tu hogar, puedes administrarlos desde tu teléfono
                móvil.</p>

            <ul class="ul-funcionamiento">
                <li class="li-funcionamiento"><span class="li-span-funcionamiento">Descarga la app OPSS desde tu
                        teléfono celular</span></li>
                <li class="li-funcionamiento"><span class="li-span-funcionamiento">Conecta OPSS a tu router de
                        Internet</span></li>
                <li class="li-funcionamiento"><span class="li-span-funcionamiento">Víncula tu dispositivo a la alarma
                        por medio de la la app y controla
                        la seguridad de tu hogar, en cualquier momento y lugar.</span></li>
            </ul>
        </div>
    </section>
    <section id="caracteristicas">
        <div class="div-caracteristicas">
            <div class="opc-caracteristica opc-1">
                <i class="fas fa-wifi iconos"></i>
                <h4>INALÁMBRICO</h4>
                <p>Cuenta con WIFI</p>
            </div>

            <div class="opc-caracteristica opc-2">
                <i class="fas fa-mobile iconos"></i>
                <h4>FÁCIL CONTROL</h4>
                <p>Desde la app puedes controlar la alarma</p>
            </div>

            <div class="opc-caracteristica opc-3">
                <i class="fas fa-cog iconos"></i>
                <h4>SIMPLE CONFIGURACIÓN</h4>
                <p>Fácil configuración entre la alarma y tu dispositivo móvil</p>
            </div>

            <div class="opc-caracteristica opc-4">
                <i class="fab fa-bluetooth-b iconos"></i>
                <h4>100% COMPATIBLE</h4>
                <p>Es compatible con cualquier dispositivo móvil</p>
            </div>
        </div>
    </section>

    <section id="comprar-producto">
        <div class="div-comprar-producto">
            <h1 class="h1-comprar-productos">LA VIDA OPSS</h1>
            <p class="p-comprar-productos">Descarga nuestra aplicación móvil para que puedas tener un mejor control de tu alarma.</p>
            <p><a class="btn-comprar-productos" href="#">DESCARGAR</a></p>
        </div>
    </section>

    <section id="testimonios-contenedor">
        <div class="testimonio-slider fade">
            <h4 class="titulo-testimonio">T e s t i m o n i o s</h4>
            <hr class="linea-testimonio">
            <h1 class="parrafo-testimonio">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi esse
                dignissimos nihil veniam vel,
                corporis
                dolore cupiditate laborum molestiae dolorum atque ratione distinctio blanditiis dicta, fuga id totam nam
                corrupti.</h1>
            <p class="autor-testimonio">- Javier Salazar</p>
        </div>
        <div class="testimonio-slider fade">
            <h4 class="titulo-testimonio">T e s t i m o n i o s</h4>
            <hr class="linea-testimonio">
            <h1 class="parrafo-testimonio">
                dolore cupiditate laborum molestiae dolorum atque ratione distinctio blanditiis dicta, fuga id totam nam
                corrupti Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi esse
                dignissimos nihil veniam vel,
                corporis.</h1>
            <p class="autor-testimonio">- Rocío Salazar</p>
        </div>
        <div class="testimonio-slider fade">
            <h4 class="titulo-testimonio">T e s t i m o n i o s</h4>
            <hr class="linea-testimonio">
            <h1 class="parrafo-testimonio">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi esse
                dignissimos nihil veniam vel,
                corporis
                dolore cupiditate laborum molestiae dolorum atque ratione distinctio blanditiis dicta, fuga id totam nam
                corrupti.</h1>
            <p class="autor-testimonio">- Litzzy Pacheco</p>
        </div>

        <div class="testimonio-slider fade">
            <h4 class="titulo-testimonio">T e s t i m o n i o s</h4>
            <hr class="linea-testimonio">
            <h1 class="parrafo-testimonio">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi esse
                dignissimos nihil veniam vel,
                corporis
                dolore cupiditate laborum molestiae dolorum atque ratione distinctio blanditiis dicta, fuga id totam nam
                corrupti.</h1>
            <p class="autor-testimonio">- Didier Ortíz</p>
        </div>

        <div class="testimonio-direcciones">
            <a href="#testimonios-contenedor" class="atras" onclick="avanzaSlide(-1)">&#10094;</a>
            <a href="#testimonios-contenedor" class="adelante" onclick="avanzaSlide(1)">&#10095;</a>
        </div>

        <div class="barras">
            <span class="barra active" onclick="posicionSlide(1)"></span>
            <span class="barra" onclick="posicionSlide(2)"></span>
            <span class="barra" onclick="posicionSlide(3)"></span>
            <span class="barra" onclick="posicionSlide(4)"></span>
        </div>

    </section>

    <section id="marcas">
        <div class="div-marcas">
            <div class="marca div-acer">
                <img class="marca1" src="img/acer.png" alt="Marca patrocinadora ACER">
            </div>

            <div class="marca">
                <img class="marca2" src="img/cisco.png" alt="Marca patrocinadora CISCO">
            </div>
            <div class="marca">
                <img class="marca3" src="img/hp.png" alt="Marca patrocinadora HP">
            </div>

            <div class="marca">
                <img class="marca4" src="img/intel.png" alt="Marca patrocinadora INTEL">
            </div>

            <div class="marca">
                <img class="marca5" src="img/microsoft.png" alt="Marca patrocinadora MICROSOFT">
            </div>

            <div class="marca">
                <img class="marca6" src="img/toshiba.png" alt="Marca patrocinadora TOSHIBA">
            </div>
        </div>
    </section>

    <footer id="footer">
        <div class="div-redes-nota">
            <i class="iconos-redes fab fa-facebook-f"></i>
            <i class="iconos-redes fab fa-twitter"></i>
            <i class="iconos-redes fab fa-youtube"></i>
            <p class="p-nota">HECHO POR OPSS © <?php echo date('Y');?>. TODOS LOS DERECHOS RESERVADOS.</p>
        </div>
    </footer>

    <script src="js/testimonios.js"></script>
    <script src="js/index.js"></script>
    <script src="https://kit.fontawesome.com/56b0f801ce.js" crossorigin="anonymous"></script>
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
    <title>OPSS</title>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/estilos_responsivo.css">
    <script src="js/scrollreveal.js"></script>
    <link rel="shortcut icon" href="img/favicon1.png">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@100&display=swap" rel="stylesheet">
</head>

<body>
    
    <?php include "partes/_nav.php" ?>

    <section id="promocion">
        <div class="div-caja1-promocion">
            <h1 class="h1-promocion1">TU HOGAR</h1>
            <h1 class="h1-promocion2">MÁS INTELIGENTE</h1>
            <p class="p-promocion">Controla la seguridad de tu hogar con estilo.</p>
            <div class="div-btn-promocion">
                <p><a class="btn-promocion" href="#funcionamiento">Saber más</a></p>
            </div>
        </div>

    </section>

    <section id="funcionamiento">
        <div class="div-caja-funcionamiento">
            <h1 class="h1-funcionamiento1">COMO</h1>
            <h1 class="h1-funcionamiento2">TRABAJAN</h1>
            <p class="p-funcionamiento">Al sincronizar la alarma de tu hogar, puedes administrarlos desde tu teléfono
                móvil.</p>

            <ul class="ul-funcionamiento">
                <li class="li-funcionamiento"><span class="li-span-funcionamiento">Descarga la app OPSS desde tu
                        teléfono celular</span></li>
                <li class="li-funcionamiento"><span class="li-span-funcionamiento">Conecta OPSS a tu router de
                        Internet</span></li>
                <li class="li-funcionamiento"><span class="li-span-funcionamiento">Víncula tu dispositivo a la alarma
                        por medio de la la app y controla
                        la seguridad de tu hogar, en cualquier momento y lugar.</span></li>
            </ul>
        </div>
    </section>
    <section id="caracteristicas">
        <div class="div-caracteristicas">
            <div class="opc-caracteristica opc-1">
                <i class="fas fa-wifi iconos"></i>
                <h4>INALÁMBRICO</h4>
                <p>Cuenta con WIFI</p>
            </div>

            <div class="opc-caracteristica opc-2">
                <i class="fas fa-mobile iconos"></i>
                <h4>FÁCIL CONTROL</h4>
                <p>Desde la app puedes controlar la alarma</p>
            </div>

            <div class="opc-caracteristica opc-3">
                <i class="fas fa-cog iconos"></i>
                <h4>SIMPLE CONFIGURACIÓN</h4>
                <p>Fácil configuración entre la alarma y tu dispositivo móvil</p>
            </div>

            <div class="opc-caracteristica opc-4">
                <i class="fab fa-bluetooth-b iconos"></i>
                <h4>100% COMPATIBLE</h4>
                <p>Es compatible con cualquier dispositivo móvil</p>
            </div>
        </div>
    </section>

    <section id="comprar-producto">
        <div class="div-comprar-producto">
            <h1 class="h1-comprar-productos">LA VIDA OPSS</h1>
            <p class="p-comprar-productos">Tu hogar está esperándote. Prepáralo acorde a tus necesidades de confort.</p>
            <p><a class="btn-comprar-productos" href="comprar.php">COMPRAR</a></p>
        </div>
    </section>

    <section id="testimonios-contenedor">
        <div class="testimonio-slider fade">
            <h4 class="titulo-testimonio">T e s t i m o n i o s</h4>
            <hr class="linea-testimonio">
            <h1 class="parrafo-testimonio">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi esse
                dignissimos nihil veniam vel,
                corporis
                dolore cupiditate laborum molestiae dolorum atque ratione distinctio blanditiis dicta, fuga id totam nam
                corrupti.</h1>
            <p class="autor-testimonio">- Javier Salazar</p>
        </div>
        <div class="testimonio-slider fade">
            <h4 class="titulo-testimonio">T e s t i m o n i o s</h4>
            <hr class="linea-testimonio">
            <h1 class="parrafo-testimonio">
                dolore cupiditate laborum molestiae dolorum atque ratione distinctio blanditiis dicta, fuga id totam nam
                corrupti Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi esse
                dignissimos nihil veniam vel,
                corporis.</h1>
            <p class="autor-testimonio">- Rocío Salazar</p>
        </div>
        <div class="testimonio-slider fade">
            <h4 class="titulo-testimonio">T e s t i m o n i o s</h4>
            <hr class="linea-testimonio">
            <h1 class="parrafo-testimonio">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi esse
                dignissimos nihil veniam vel,
                corporis
                dolore cupiditate laborum molestiae dolorum atque ratione distinctio blanditiis dicta, fuga id totam nam
                corrupti.</h1>
            <p class="autor-testimonio">- Litzzy Pacheco</p>
        </div>

        <div class="testimonio-slider fade">
            <h4 class="titulo-testimonio">T e s t i m o n i o s</h4>
            <hr class="linea-testimonio">
            <h1 class="parrafo-testimonio">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi esse
                dignissimos nihil veniam vel,
                corporis
                dolore cupiditate laborum molestiae dolorum atque ratione distinctio blanditiis dicta, fuga id totam nam
                corrupti.</h1>
            <p class="autor-testimonio">- Didier Ortíz</p>
        </div>

        <div class="testimonio-direcciones">
            <a href="#testimonios-contenedor" class="atras" onclick="avanzaSlide(-1)">&#10094;</a>
            <a href="#testimonios-contenedor" class="adelante" onclick="avanzaSlide(1)">&#10095;</a>
        </div>

        <div class="barras">
            <span class="barra active" onclick="posicionSlide(1)"></span>
            <span class="barra" onclick="posicionSlide(2)"></span>
            <span class="barra" onclick="posicionSlide(3)"></span>
            <span class="barra" onclick="posicionSlide(4)"></span>
        </div>

    </section>

    <section id="marcas">
        <div class="div-marcas">
            <div class="marca div-acer">
                <img class="marca1" src="img/acer.png" alt="Marca patrocinadora ACER">
            </div>

            <div class="marca">
                <img class="marca2" src="img/cisco.png" alt="Marca patrocinadora CISCO">
            </div>
            <div class="marca">
                <img class="marca3" src="img/hp.png" alt="Marca patrocinadora HP">
            </div>

            <div class="marca">
                <img class="marca4" src="img/intel.png" alt="Marca patrocinadora INTEL">
            </div>

            <div class="marca">
                <img class="marca5" src="img/microsoft.png" alt="Marca patrocinadora MICROSOFT">
            </div>

            <div class="marca">
                <img class="marca6" src="img/toshiba.png" alt="Marca patrocinadora TOSHIBA">
            </div>
        </div>
    </section>

    <footer id="footer">
        <div class="div-redes-nota">
            <i class="iconos-redes fab fa-facebook-f"></i>
            <i class="iconos-redes fab fa-twitter"></i>
            <i class="iconos-redes fab fa-youtube"></i>
            <p class="p-nota">HECHO POR OPSS © <?php echo date('Y');?>. TODOS LOS DERECHOS RESERVADOS.</p>
        </div>
    </footer>

    <script src="js/testimonios.js"></script>
    <script src="js/index.js"></script>
    <script src="https://kit.fontawesome.com/56b0f801ce.js" crossorigin="anonymous"></script>
</body>

</html>



<?php

    }

?>