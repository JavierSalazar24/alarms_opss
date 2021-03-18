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
    <link rel="shortcut icon" href="img/favicon1.png">
    
    <link rel="stylesheet" href="css/estilos_brandy.css">
    <?php include_once "views/estilos_alysa.php"?>
    <?php include_once "views/estilos_future.php"?>
    <?php include_once "views/estilos_bent.php"?>
    <?php include_once "views/estilos_sima.php"?>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

    <title>OPSS</title>
</head>

<body >

    <!-- Wrapper -->
    <div id="div-principal">
        <?php include_once "partes/_navs.php" ?>

        <!-- <section id="promocion">
            <div class="div-caja1-promocion">
                <h1 class="h1-promocion1">TU HOGAR</h1>
                <h1 class="h1-promocion2">MÁS INTELIGENTE</h1>
                <p class="p-promocion">Controla la seguridad de tu hogar con estilo.</p>
                <div class="div-btn-promocion">
                    <p><a class="btn-promocion" href="#funcionamiento">Saber más</a></p>
                </div>
            </div>
        </section> -->

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
                        <div class="title_sec">
                            <h1 class="h1s">Características</h1>
                            <h2 class="h2s">Características de nuestro sistema</h2>
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
            <div class="container">
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
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="download_screen text-center wow fadeInUp" data-wow-duration="1s">
                        <img class="telefono-descargar" src="assets/bent/images/iPhone02.png" alt="">
                        </div>
                    </div>
                </div>
            </div>

            <div class="available_store">
                <div class="available_store__div-padding container  wow bounceInRight" data-wow-duration="1s">
                    <div class="col-md-6">
                        <div class="available_title">
                            <h2 class="h2b">Disponible para</h2>
                            <p class="parrafob">Puedes descargar nuestra aplicación en la plataforma que gustes.</p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="row">
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
        <!-- <section class="download page mt-5" id="DOWNLOAD">
            <div class="container">
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
                <div class="row">
                    <div class="col-md-4 col-md-offset-2">
                        <div class="download_screen text-center wow fadeInUp" data-wow-duration="1s">
                        <img class="telefono-descargar" src="assets/bent/images/about_iphone.png" alt="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="available_title">
                                <h2 class="h2b">Disponible para</h2>
                                <p class="parrafob">Puedes descargar nuestra aplicación en la plataforma que gustes.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                        <div class="single_store">
                                            <i class="fa fa-apple"></i>
                                            <div class="store_inner">
                                                <h2 class="h2b">iOS</h2>
                                            </div>
                                        </div>
                                </div>
                                <div class="col-md-6">
                                        <div class="single_store">
                                            <i class="fa fa-android"></i>
                                            <div class="store_inner">
                                                <h2 class="h2b">ANDROID</h2>
                                            </div>
                                        </div>
                                </div>                                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->
        <!-- fin Descargar app -->

        <!-- Testimonios -->
        <section id="slider_sec">
            <div class="container">
                <div class="row">
                    <div class="slider">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
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
                        <div class="title_sec">
                            <h1 class="h1s">Marcas</h1>
                            <h2 class="h2s">Les mostramos algunas marcas que nos patrocinan.</h2>
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
                            <div class="sngl_team">
                                <br><br>
                                <img class="imgs" width="50px" src="img/toshiba.png" alt="" />
                            </div>	
                            <div class="sngl_team">
                                <br><br>
                                <img class="imgs" width="50px" src="img/toshiba.png" alt="" />
                            </div>	
                            <div class="sngl_team">
                                <br><br>
                                <img class="imgs" width="50px" src="img/toshiba.png" alt="" />
                            </div>	
                            <div class="sngl_team">
                                <br><br>
                                <img class="imgs" width="50px" src="img/toshiba.png" alt="" />
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
                    <div class="col-md-12 text-center   wow fadeInUp animated">
                        <h4>Siguenos en nuestras redes sociales</h4>
                        <ul class="icon_list">
                            <li><a href="http://www.facebook.com/abdullah.noman99"target="_blank"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="http://www.twitter.com/absconderm"target="_blank"><i class="fa fa-twitter"></i></a></li>
                            <li><a href=""><i class="fa fa-google-plus"></i></a></li>
                            <li><a href=""><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="http://www.dribbble.com/abdullahnoman"target="_blank"><i class="fa fa-dribbble"></i></a></li>
                        </ul>                        
                        <br>
                        <div>
                            <p>&copy; HECHO POR OPSS <?php echo date('Y');?>.</p>
                            <p>TODOS LOS DERECHOS RESERVADOS.</p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- End footer -->

        
        
    </div>
    
    <div class="go-top"><i class="fas fa-arrow-up"></i></div>

    <script src="https://kit.fontawesome.com/56b0f801ce.js" crossorigin="anonymous"></script>
    <?php include_once "views/script_alysa.php"?>
    <?php include_once "views/script_bent.php"?>
    <?php include_once "views/script_future.php"?>
    <?php include_once "views/script_sima.php"?>
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
    <meta name="keywords" content="Alarmas, IoT, Seguridad, WIFI, Intenet of Things, Alarma, Ventas, Casa">
    <meta name="description" content="OPSS Es una comparañia destinada a brindar seguridad con calidad y buen precio, contamos con alarmas hechas con ayuda de las IoT para brindar una mejor seguridad y fácil accesibilidad a estas.">
    <meta name="author" content="Empresa OPSS.">
    <meta name="copyright" content="Empresa OPSS.">
    <meta name="robots" content="index">
    <link rel="shortcut icon" href="img/favicon1.png">

    <link rel="stylesheet" href="css/estilos_brandy.css">
    <?php include_once "views/estilos_alysa.php"?>
    <?php include_once "views/estilos_future.php"?>
    <?php include_once "views/estilos_bent.php"?>
    <?php include_once "views/estilos_sima.php"?>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <title>OPSS</title>
</head>

<body >

    <!-- Wrapper -->
    <div id="div-principal">
        <?php include_once "partes/_nav.php" ?>

        <!-- <section id="promocion">
            <div class="div-caja1-promocion">
                <h1 class="h1-promocion1">TU HOGAR</h1>
                <h1 class="h1-promocion2">MÁS INTELIGENTE</h1>
                <p class="p-promocion">Controla la seguridad de tu hogar con estilo.</p>
                <div class="div-btn-promocion">
                    <p><a class="btn-promocion" href="#funcionamiento">Saber más</a></p>
                </div>
            </div>
        </section> -->

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
                                Sistema
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
        <!-- <section class="download page" id="DOWNLOAD">
            <div class="container">
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
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="download_screen text-center wow fadeInUp" data-wow-duration="1s">
                        <img class="telefono-descargar" src="assets/bent/images/iPhone02.png" alt="">
                        </div>
                    </div>
                </div>
            </div>

            <div class="available_store">
                <div class="available_store__div-padding container  wow bounceInRight" data-wow-duration="1s">
                    <div class="col-md-6">
                        <div class="available_title">
                            <h2 class="h2b">Disponible para</h2>
                            <p class="parrafob">Puedes descargar nuestra aplicación en la plataforma que gustes.</p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="row">
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
        </section> -->
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
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
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
                            <div class="sngl_team">
                                <br><br>
                                <img class="imgs" width="50px" src="img/toshiba.png" alt="" />
                            </div>	
                            <div class="sngl_team">
                                <br><br>
                                <img class="imgs" width="50px" src="img/toshiba.png" alt="" />
                            </div>	
                            <div class="sngl_team">
                                <br><br>
                                <img class="imgs" width="50px" src="img/toshiba.png" alt="" />
                            </div>	
                            <div class="sngl_team">
                                <br><br>
                                <img class="imgs" width="50px" src="img/toshiba.png" alt="" />
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
                            <li><a href="http://www.facebook.com/abdullah.noman99"target="_blank"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="http://www.twitter.com/absconderm"target="_blank"><i class="fa fa-twitter"></i></a></li>
                            <li><a href=""><i class="fa fa-google-plus"></i></a></li>
                            <li><a href=""><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="http://www.dribbble.com/abdullahnoman"target="_blank"><i class="fa fa-dribbble"></i></a></li>
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

    <div class="go-top"><i class="fas fa-arrow-up"></i></div>

    <script src="https://kit.fontawesome.com/56b0f801ce.js" crossorigin="anonymous"></script>
    <?php include_once "views/script_future.php"?>
    <?php include_once "views/script_alysa.php"?>
    <?php include_once "views/script_bent.php"?>
    <?php include_once "views/script_sima.php"?>
</body>

</html>

<?php

    }

?>