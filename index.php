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
    <meta name="keywords" content="Alarmas, IoT, Seguridad, WIFI, Intenet of Things, Alarma, Ventas, Casa, Internet de las cosas">
    <meta name="description" content="OPSS Es una comparañia destinada a brindar seguridad con calidad y buen precio, contamos con alarmas hechas con ayuda de las IoT para brindar una mejor seguridad y fácil accesibilidad a estas.">
    <meta name="author" content="Empresa OPSS.">
    <meta name="copyright" content="Empresa OPSS.">
    <meta name="robots" content="index">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <!-- Favicon -->
    <link rel="shortcut icon" href="img/favicon1.png">
    <!-- Fuentes -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=PT+Serif:400,700,400italic,700italic%7CLato:300,300italic,400,400italic,700,900%7CMerriweather:700italic">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
    <!-- Estilos de plantillas -->
    <?php include_once "views/estilos_plantillas.php"?>
    <title>Alarmas - OPSS</title>
</head>

<body>

    <!-- Preloader -->
    <div id="loader-wrapper">
		<div class="logo"></div>
		<div id="loader"></div>
	</div>
    <!-- Fin preloader -->

    <!-- Wrapper -->
    <div id="div-principal">

        <!-- Barra de navegación -->
        <?php include_once "partes/_navs.php" ?>

        <!-- Inicio -->
        <section class="seccion-inicio">
            <div class="swiper-container swiper-slider swiper-variant-1 bg-black" data-loop="false" data-autoplay="5500" data-simulate-touch="true">
                <div class="swiper-wrapper text-center">
                    <div class="swiper-slide" data-slide-bg="https://www.nimbustelecom.cat/wp-content/uploads/2020/02/nimbus-alarmes.jpg">
                        <div class="swiper-slide-caption text-center">
                            <div class="container">
                                <div class="row justify-content-md-center">
                                    <div class="col-md-11 col-lg-10 col-xl-9">
                                        <div class="header-decorated" data-caption-animate="fadeInUp" data-caption-delay="0s">
                                            <h3 class="medium text-primary">Alarmas - OPSS</h3>
                                        </div>
                                        <h2 class="slider-header" data-caption-animate="fadeInUp" data-caption-delay="150">Sientete seguro en tu hogar</h2>
                                        <div class="button-block" data-caption-animate="fadeInUp" data-caption-delay="400"><a class="button button-lg button-primary-outline-v2" href="productos.php">Ir al catálogo</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Fin inicio -->

        <!-- Funcionamiento -->
        <section class="about page" id="ABOUT">
            <div class="inner_about_area">
                <div class="container about-p">
                    <div class="row">
                        <div class="col-md-6  wow fadeInRight" data-wow-duration="1s" data-wow-delay=".5s">
                            <div class="inner_about_title">
                                <h2 class="h2b">COMO TRABAJAN</h2>
                                <p class="parrafob">Al sincronizar la alarma de tu hogar, puedes administrarlos desde tu teléfono móvil.</p>
                            </div>
                            <div class="inner_about_desc">
                                <div class="single_about_area fadeInUp wow" data-wow-duration=".5s" data-wow-delay="1s">
                                    <div><i class="pe-7s-cloud-download"></i></div>
                                    <h3 class="h3b">Descargar APP</h3>
                                    <p class="parrafob">Descarga la app OPSS desde tu teléfono celular</p>
                                </div>
                                <div class="single_about_area fadeInUp wow" data-wow-duration=".5s" data-wow-delay="1.5s">
                                    <div><i class="pe-7s-target"></i></div>
                                    <h3 class="h3b">Conectar</h3>
                                    <p class="parrafob">Conecta OPSS a tu router de Internet</p>
                                </div>
                                <div class="single_about_area fadeInUp wow" data-wow-duration=".5s" data-wow-delay="2s">
                                    <div><i class="pe-7s-usb usb-padding"></i></div>
                                    <h3 class="h3b">Vincular APP</h3>
                                    <p class="parrafob">Víncula tu dispositivo a la alarma por medio de la la app y controla la seguridad de tu hogar, en cualquier momento y lugar.</p>
                                </div>
                            </div>
                        </div>
                        <div class="aboutp__div-celular col-md-6">
                            <div class="about_phone wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".5s">
                                <img src="assets/bent/images/about_iphone.png" alt="">
                            </div>
                        </div>                    
                    </div>
                </div>
            </div>
        </section>
        <!-- Fin funcionamiento -->

        <!-- características -->
        <section id="pr_sec">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs12 ">
                        <div class="section-title white-color">
                            <h2>características</h2>
                            <div class="back-text">
                                News
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 pt-3">
                        <div class="service">
                            <i class="is2 fas fa-wifi"></i>
                            <h2 class="h2s">INALÁMBRICO</h2>
                            <div class="service_hoverly">
                                <i class="is fas fa-wifi"></i>
                                <h2 class="h2s">INALÁMBRICO</h2>
                                <p class="parrafos">Cuenta con WIFI para que te conectes desde cualquier parte. Cuenta con WIFI para que te conectes desde cualquier parte.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 pt-3">
                        <div class="service">
                            <i class="is2 fas fa-gamepad"></i>
                            <h2 class="h2s">FÁCIL CONTROL</h2>
                            <div class="service_hoverly">
                                <i class="is fas fa-gamepad"></i>
                                <h2 class="h2s">FÁCIL CONTROL</h2>
                                <p class="parrafos">Desde la app puedes controlar tu alarma. Desde la app puedes controlar tu alarma.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 pt-3">
                        <div class="service">
                            <i class="is2 fas fa-cogs"></i>
                            <h2 class="h2s">SIMPLE CONFIGURACIÓN</h2>
                            <div class="service_hoverly">
                                <i class="is fas fa-cogs"></i>
                                <h2 class="h2s">SIMPLE CONFIGURACIÓN</h2>
                                <p class="parrafos">Fácil configuración entre tú alarma y tu dispositivo móvil. Fácil configuración entre tú alarma y tu dispositivo móvil.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 pt-3">
                        <div class="service">
                            <i class="is2 fas fa-mobile-alt"></i>
                            <h2 class="h2s">100% COMPATIBLE</h2>
                            <div class="service_hoverly">
                                <i class="is fas fa-mobile-alt"></i>
                                <h2 class="h2s">100% COMPATIBLE</h2>
                                <p class="parrafos">Es compatible con cualquier dispositivo móvil. Es compatible con cualquier dispositivo móvil.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End características -->

        <!-- Descaragar APP -->
        <section class="download page" id="DOWNLOAD">
            <div class="container ">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="section_title">
                            <h2 class="h2b">Descargar ahora</h2>
                            <p class="parrafob">Descarga nuestra aplicación móvil para que puedas tener un mejor control de tu alarma.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row row-descargar_principal">
                    <div class="col-md-6 download_screen__div-principal">
                        <div class="download_screen  wow fadeInUp" data-wow-duration="1s">
                            <img class="telefono-descargar" src="assets/bent/images/iPhone02.png" alt="">
                        </div>
                    </div>                    
                     <div class="col-md-6 available_title__div-principal">
                        <div class="available_title ">
                            <h2 class="h2b">Disponible para</h2>
                            <p class="parrafob">Puedes descargar nuestra aplicación en la plataforma que gustes.</p>
                        </div>
                        <div class="download__div-single_store ">
                            <div class="col-md-6">
                                <a href="">
                                    <div class="single_store">
                                        <i class="fa fa-apple"></i>
                                        <div class="store_inner">
                                            <h2 class="h2b">iOS</h2>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-6">
                                <a href="">
                                    <div class="single_store">
                                        <i class="fa fa-android"></i>
                                        <div class="store_inner">
                                            <h2 class="h2b">ANDROID</h2>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- fin Descargar app -->

        <!-- Testimonios -->
        <section id="slider_sec">
            <div class="container">
                <div class="row">
                    <div class="slider">
                        <div id="carousel-example-generic" class="carousel slide carousel-responsive" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li class="lis active" data-target="#carousel-example-generic" data-slide-to="0"></li>
                                <li class="lis" data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li class="lis" data-target="#carousel-example-generic" data-slide-to="2"></li>
                                <li class="lis" data-target="#carousel-example-generic" data-slide-to="3"></li>
                            </ol>
                            <div class="carousel-inner" role="listbox">
                                <div class="item active">
                                    <div class="wrap_caption">
                                        <div class="caption_carousel">
                                            <h1 class="h1s">Rocío Salazar</h1>
                                            <p class="parrafos">LOREM IPSUM DOLOR SIT AMET CONSECTE</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="wrap_caption">
                                        <div class="caption_carousel">
                                            <h1 class="h1s">Javier Salazar</h1>
                                            <p class="parrafos">LOREM IPSUM DOLOR SIT AMET CONSECTE</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="item ">
                                    <div class="wrap_caption">
                                        <div class="caption_carousel">
                                            <h1 class="h1s">Didier Ortíz</h1>
                                            <p class="parrafos">LOREM IPSUM DOLOR SIT AMET CONSECTE</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="item ">
                                    <div class="wrap_caption">
                                        <div class="caption_carousel">
                                            <h1 class="h1s">Littzy Pacheco</h1>
                                            <p class="parrafos">LOREM IPSUM DOLOR SIT AMET CONSECTE</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a class="as left left_crousel_btn" href="#carousel-example-generic" role="button"
                                data-slide="prev">
                                <i class="is fa fa-angle-left"></i>
                                <span class="spans sr-only">Previous</span>
                            </a>
                            <a class="as right right_crousel_btn" href="#carousel-example-generic" role="button"
                                data-slide="next">
                                <i class="is fa fa-angle-right"></i>
                                <span class="spans sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Testimonios -->

        <!-- marcas -->
        <section id="tm_sec">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs12 ">
                        <div class="section-title white-color">
                            <h2>Nuestras marcas</h2>
                            <div class="back-text">
                                Marcas
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs12">
                        <div class="all_team">
                            <div class="sngl_team">
                                <br><br>
                                <img class="imgs" width="200px" src="img/acer.png" alt="" />
                            </div>
                            <div class="sngl_team">
                                <br>
                                <img class="imgs" width="200px" src="img/cisco.png" alt="" />
                            </div>
                            <div class="sngl_team">
                                <img class="imgs" height="110px" src="img/hp.png" alt="" />
                            </div>
                            <div class="sngl_team">
                                <br>
                                <img class="imgs" width="120px" src="img/intel.png" alt="" />
                            </div>
                            <div class="sngl_team">
                                <br>
                                <img class="imgs" width="180px" src="img/microsoft.png" alt="" />
                            </div>
                            <div class="sngl_team">
                                <br><br>
                                <img class="imgs" width="50px" src="img/toshiba.png" alt="" />
                            </div>						                                   
                        </div>
                    </div>
                </div>        
            </div>
        </section>
        <!-- End marcas -->

        <!-- footer -->
        <footer>
            <div class="container">
                <div class="row">
                    <div class="social col-md-12 text-center   wow fadeInUp animated">
                        <h2>Siguenos en nuestras redes sociales</h2>
                        <ul class="icon_list">
                            <li><a href="#"target="_blank"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"target="_blank"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"target="_blank"><i class="fa fa-dribbble"></i></a></li>
                        </ul>                        
                        <br>
                        <div class="copyright_text">
                            <p>&copy; HECHO POR OPSS <?php echo date('Y');?>.</p>
                            <p>TODOS LOS DERECHOS RESERVADOS.</p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- End footer -->
     
    </div>

    <!-- Regresar a la primera sección -->
    <div class="go-top"><i class="fas fa-arrow-up"></i></div>
    
    <!-- Script Bootstrap -->
    <?php include_once "views/script_bootstrap.php"?>    
    <!-- Script Plantillas -->
    <?php include_once "views/script_plantillas.php"?>    
    <!-- Fontawesome -->
    <script src="https://kit.fontawesome.com/56b0f801ce.js" crossorigin="anonymous"></script>        
    <!-- LINK ACTIVADO -->
    <script>
        const currentLocation = location.href;
        const menuItem = document.querySelectorAll("a");
        const menuLength = menuItem.length;
        for (let i = 0; i < menuLength; i++) {
        if (menuItem[i].href === currentLocation) menuItem[i].className = "active";
        }
    </script>
    <!-- Ir arriba -->
    <script>
        $(document).ready(function(){
            $('.go-top').click(function(){
                $('body, html').animate({ scrollTop: '0px' },300);
            });
            $(window).scroll(function(){
                if($(this).scrollTop() > 400) $('.go-top').slideDown(300);
                else $('.go-top').slideUp(300);                
            });
        })
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
    <meta name="keywords" content="Alarmas, IoT, Seguridad, WIFI, Intenet of Things, Alarma, Ventas, Casa, Internet de las cosas">
    <meta name="description" content="OPSS Es una comparañia destinada a brindar seguridad con calidad y buen precio, contamos con alarmas hechas con ayuda de las IoT para brindar una mejor seguridad y fácil accesibilidad a estas.">
    <meta name="author" content="Empresa OPSS.">
    <meta name="copyright" content="Empresa OPSS.">
    <meta name="robots" content="index">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <!-- Favicon -->
    <link rel="shortcut icon" href="img/favicon1.png">
    <!-- Fuentes -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=PT+Serif:400,700,400italic,700italic%7CLato:300,300italic,400,400italic,700,900%7CMerriweather:700italic">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
    <!-- Estilos de plantillas -->
    <?php include_once "views/estilos_plantillas.php"?>
    <title>Alarmas - OPSS</title>
</head>

<body>

    <!-- Preloader -->
    <div id="loader-wrapper">
		<div class="logo"></div>
		<div id="loader"></div>
	</div>
    <!-- Fin preloader -->

    <!-- Wrapper -->
    <div id="div-principal">

        <!-- Barra de navegación -->
        <?php include_once "partes/_nav.php" ?>

        <!-- Inicio -->
        <section class="seccion-inicio">
            <div class="swiper-container swiper-slider swiper-variant-1 bg-black" data-loop="false" data-autoplay="5500" data-simulate-touch="true">
                <div class="swiper-wrapper text-center">
                    <div class="swiper-slide" data-slide-bg="https://www.nimbustelecom.cat/wp-content/uploads/2020/02/nimbus-alarmes.jpg">
                        <div class="swiper-slide-caption text-center">
                            <div class="container">
                                <div class="row justify-content-md-center">
                                    <div class="col-md-11 col-lg-10 col-xl-9">
                                        <div class="header-decorated" data-caption-animate="fadeInUp" data-caption-delay="0s">
                                            <h3 class="medium text-primary">Alarmas - OPSS</h3>
                                        </div>
                                        <h2 class="slider-header" data-caption-animate="fadeInUp" data-caption-delay="150">Sientete seguro en tu hogar</h2>
                                        <div class="button-block" data-caption-animate="fadeInUp" data-caption-delay="400"><a class="button button-lg button-primary-outline-v2" href="productos.php">Ir al catálogo</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Fin inicio -->

        <!-- Funcionamiento -->
        <section class="about page" id="ABOUT">
            <div class="inner_about_area">
                <div class="container about-p">
                    <div class="row">
                        <div class="col-md-6  wow fadeInRight" data-wow-duration="1s" data-wow-delay=".5s">
                            <div class="inner_about_title">
                                <h2 class="h2b">COMO TRABAJAN</h2>
                                <p class="parrafob">Al sincronizar la alarma de tu hogar, puedes administrarlos desde tu teléfono móvil.</p>
                            </div>
                            <div class="inner_about_desc">
                                <div class="single_about_area fadeInUp wow" data-wow-duration=".5s" data-wow-delay="1s">
                                    <div><i class="pe-7s-cloud-download"></i></div>
                                    <h3 class="h3b">Descargar APP</h3>
                                    <p class="parrafob">Descarga la app OPSS desde tu teléfono celular</p>
                                </div>
                                <div class="single_about_area fadeInUp wow" data-wow-duration=".5s" data-wow-delay="1.5s">
                                    <div><i class="pe-7s-target"></i></div>
                                    <h3 class="h3b">Conectar</h3>
                                    <p class="parrafob">Conecta OPSS a tu router de Internet</p>
                                </div>
                                <div class="single_about_area fadeInUp wow" data-wow-duration=".5s" data-wow-delay="2s">
                                    <div><i class="pe-7s-usb usb-padding"></i></div>
                                    <h3 class="h3b">Vincular APP</h3>
                                    <p class="parrafob">Víncula tu dispositivo a la alarma por medio de la la app y controla la seguridad de tu hogar, en cualquier momento y lugar.</p>
                                </div>
                            </div>
                        </div>
                        <div class="aboutp__div-celular col-md-6">
                            <div class="about_phone wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".5s">
                                <img src="assets/bent/images/about_iphone.png" alt="">
                            </div>
                        </div>                    
                    </div>
                </div>
            </div>
        </section>
        <!-- Fin funcionamiento -->

        <!-- características -->
        <section id="pr_sec">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs12 ">
                        <div class="section-title white-color">
                            <h2>características</h2>
                            <div class="back-text">
                                News
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 pt-3">
                        <div class="service">
                            <i class="is2 fas fa-wifi"></i>
                            <h2 class="h2s">INALÁMBRICO</h2>
                            <div class="service_hoverly">
                                <i class="is fas fa-wifi"></i>
                                <h2 class="h2s">INALÁMBRICO</h2>
                                <p class="parrafos">Cuenta con WIFI para que te conectes desde cualquier parte. Cuenta con WIFI para que te conectes desde cualquier parte.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 pt-3">
                        <div class="service">
                            <i class="is2 fas fa-gamepad"></i>
                            <h2 class="h2s">FÁCIL CONTROL</h2>
                            <div class="service_hoverly">
                                <i class="is fas fa-gamepad"></i>
                                <h2 class="h2s">FÁCIL CONTROL</h2>
                                <p class="parrafos">Desde la app puedes controlar tu alarma. Desde la app puedes controlar tu alarma.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 pt-3">
                        <div class="service">
                            <i class="is2 fas fa-cogs"></i>
                            <h2 class="h2s">SIMPLE CONFIGURACIÓN</h2>
                            <div class="service_hoverly">
                                <i class="is fas fa-cogs"></i>
                                <h2 class="h2s">SIMPLE CONFIGURACIÓN</h2>
                                <p class="parrafos">Fácil configuración entre tú alarma y tu dispositivo móvil. Fácil configuración entre tú alarma y tu dispositivo móvil.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 pt-3">
                        <div class="service">
                            <i class="is2 fas fa-mobile-alt"></i>
                            <h2 class="h2s">100% COMPATIBLE</h2>
                            <div class="service_hoverly">
                                <i class="is fas fa-mobile-alt"></i>
                                <h2 class="h2s">100% COMPATIBLE</h2>
                                <p class="parrafos">Es compatible con cualquier dispositivo móvil. Es compatible con cualquier dispositivo móvil.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End características -->

        <!-- Descaragar APP -->
        <section class="download page" id="DOWNLOAD">
            <div class="container ">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="section_title">
                            <h2 class="h2b">Descargar ahora</h2>
                            <p class="parrafob">Descarga nuestra aplicación móvil para que puedas tener un mejor control de tu alarma.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row row-descargar_principal">
                    <div class="col-md-6 download_screen__div-principal">
                        <div class="download_screen  wow fadeInUp" data-wow-duration="1s">
                            <img class="telefono-descargar" src="assets/bent/images/iPhone02.png" alt="">
                        </div>
                    </div>                    
                     <div class="col-md-6 available_title__div-principal">
                        <div class="available_title ">
                            <h2 class="h2b">Disponible para</h2>
                            <p class="parrafob">Puedes descargar nuestra aplicación en la plataforma que gustes.</p>
                        </div>
                        <div class="download__div-single_store ">
                            <div class="col-md-6">
                                <a href="">
                                    <div class="single_store">
                                        <i class="fa fa-apple"></i>
                                        <div class="store_inner">
                                            <h2 class="h2b">iOS</h2>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-6">
                                <a href="">
                                    <div class="single_store">
                                        <i class="fa fa-android"></i>
                                        <div class="store_inner">
                                            <h2 class="h2b">ANDROID</h2>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- fin Descargar app -->

        <!-- Testimonios -->
        <section id="slider_sec">
            <div class="container">
                <div class="row">
                    <div class="slider">
                        <div id="carousel-example-generic" class="carousel slide carousel-responsive" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li class="lis active" data-target="#carousel-example-generic" data-slide-to="0"></li>
                                <li class="lis" data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li class="lis" data-target="#carousel-example-generic" data-slide-to="2"></li>
                                <li class="lis" data-target="#carousel-example-generic" data-slide-to="3"></li>
                            </ol>
                            <div class="carousel-inner" role="listbox">
                                <div class="item active">
                                    <div class="wrap_caption">
                                        <div class="caption_carousel">
                                            <h1 class="h1s">Rocío Salazar</h1>
                                            <p class="parrafos">LOREM IPSUM DOLOR SIT AMET CONSECTE</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="wrap_caption">
                                        <div class="caption_carousel">
                                            <h1 class="h1s">Javier Salazar</h1>
                                            <p class="parrafos">LOREM IPSUM DOLOR SIT AMET CONSECTE</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="item ">
                                    <div class="wrap_caption">
                                        <div class="caption_carousel">
                                            <h1 class="h1s">Didier Ortíz</h1>
                                            <p class="parrafos">LOREM IPSUM DOLOR SIT AMET CONSECTE</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="item ">
                                    <div class="wrap_caption">
                                        <div class="caption_carousel">
                                            <h1 class="h1s">Littzy Pacheco</h1>
                                            <p class="parrafos">LOREM IPSUM DOLOR SIT AMET CONSECTE</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a class="as left left_crousel_btn" href="#carousel-example-generic" role="button"
                                data-slide="prev">
                                <i class="is fa fa-angle-left"></i>
                                <span class="spans sr-only">Previous</span>
                            </a>
                            <a class="as right right_crousel_btn" href="#carousel-example-generic" role="button"
                                data-slide="next">
                                <i class="is fa fa-angle-right"></i>
                                <span class="spans sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Testimonios -->

        <!-- marcas -->
        <section id="tm_sec">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs12 ">
                        <div class="section-title white-color">
                            <h2>Nuestras marcas</h2>
                            <div class="back-text">
                                Marcas
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs12">
                        <div class="all_team">
                            <div class="sngl_team">
                                <br><br>
                                <img class="imgs" width="200px" src="img/acer.png" alt="" />
                            </div>
                            <div class="sngl_team">
                                <br>
                                <img class="imgs" width="200px" src="img/cisco.png" alt="" />
                            </div>
                            <div class="sngl_team">
                                <img class="imgs" height="110px" src="img/hp.png" alt="" />
                            </div>
                            <div class="sngl_team">
                                <br>
                                <img class="imgs" width="120px" src="img/intel.png" alt="" />
                            </div>
                            <div class="sngl_team">
                                <br>
                                <img class="imgs" width="180px" src="img/microsoft.png" alt="" />
                            </div>
                            <div class="sngl_team">
                                <br><br>
                                <img class="imgs" width="50px" src="img/toshiba.png" alt="" />
                            </div>						                                   
                        </div>
                    </div>
                </div>        
            </div>
        </section>
        <!-- End marcas -->

        <!-- footer -->
        <footer>
            <div class="container">
                <div class="row">
                    <div class="social col-md-12 text-center   wow fadeInUp animated">
                        <h2>Siguenos en nuestras redes sociales</h2>
                        <ul class="icon_list">
                            <li><a href="#"target="_blank"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"target="_blank"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"target="_blank"><i class="fa fa-dribbble"></i></a></li>
                        </ul>                        
                        <br>
                        <div class="copyright_text">
                            <p>&copy; HECHO POR OPSS <?php echo date('Y');?>.</p>
                            <p>TODOS LOS DERECHOS RESERVADOS.</p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- End footer -->
     
    </div>

    <!-- Regresar a la primera sección -->
    <div class="go-top"><i class="fas fa-arrow-up"></i></div>

    <!-- Script Bootstrap -->
    <?php include_once "views/script_bootstrap.php"?>    
    <!-- Script Plantillas -->
    <?php include_once "views/script_plantillas.php"?>    
    <!-- Fontawesome -->
    <script src="https://kit.fontawesome.com/56b0f801ce.js" crossorigin="anonymous"></script>        
    <!-- LINK ACTIVADO -->
    <script>
        const currentLocation = location.href;
        const menuItem = document.querySelectorAll("a");
        const menuLength = menuItem.length;
        for (let i = 0; i < menuLength; i++) {
        if (menuItem[i].href === currentLocation) menuItem[i].className = "active";
        }
    </script>
    <!-- Ir arriba -->
    <script>
        $(document).ready(function(){
            $('.go-top').click(function(){
                $('body, html').animate({ scrollTop: '0px' },300);
            });
            $(window).scroll(function(){
                if($(this).scrollTop() > 400) $('.go-top').slideDown(300);
                else $('.go-top').slideUp(300);                
            });
        })
    </script>   

</body>

</html>

<?php

    }

?>