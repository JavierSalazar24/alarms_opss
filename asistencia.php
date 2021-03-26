<?php

    session_start();
    require_once __DIR__ . '/vendor/autoload.php';

    // if ($_SERVER["REQUEST_METHOD"] == "POST"){

    //     if(!empty($_POST['nombre'])&&!empty($_POST['email'])&&!empty($_POST['mensaje'])){
            
    //         $nombre_mensaje = $_POST['nombre'];
    //         $email_mensaje = $_POST['email'];
    //         $mensaje = $_POST['mensaje'];

    //         $C_mensajes = (new MongoDB\Client('mongodb+srv://javier:javier12345@cluster0.w3wdi.mongodb.net/opss?retryWrites=true&w=majority'))->opss->mensajes; 


    //         $insert = $C_mensajes->insertOne([
    //             'nombre' => $nombre_mensaje,
    //             'email' => $email_mensaje,
    //             'mensaje' => $mensaje,
    //         ]);

    //         if ($insert) {
    //             echo "<script>
    //                         setTimeout(cargaAlertaMensajeEnviado, 500);
    //                         function cargaAlertaMensajeEnviado(){
    //                             AlertaMensajeEnviado();
    //                         }
    //                         setTimeout(ReedireccionAsistencia, 3500);
    //                         function ReedireccionAsistencia(){
    //                             location.href = 'asistencia.php';
    //                         }
    //                     </script>";
    //         }

    //     }else {
    //         echo "<script>
    //                     setTimeout(cargaAlertaErrorDatos, 500);
    //                     function cargaAlertaErrorDatos(){
    //                         AlertaErrorDatos();
    //                     }                    
    //                 </script>";
    //     }

    // }

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
    <title>Asistencia</title>
    <script src="js/scrollreveal.js"></script>
    <link rel="shortcut icon" href="img/favicon1.png">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@100&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/estilos_responsivo.css">
    <link rel="stylesheet" href="css/estilos.css">
    <?php include_once "views/estilos_future.php"?>
</head>

<body>

    <?php include "partes/_navs.php" ?>

    <section id="asistencia">
        <div class="div-asistencia-form">
            <div class="asistencia-preguntas">
                <p class="asistencia-p0">
                    Preguntas frecuentes
                </p>

                <h4 class="asistencia-p1">
                    ¿Cuáles son las formas de pago?
                    <i class="asistencia-flecha1 fas fa-chevron-down flech-down" onclick="accion1()"></i>
                    <h5 class="flech1 asistencia-p2 desaparece">Por el momento solo con Paypal.</h5>
                </h4>

                <hr class="asistencia-hr">

                <h4 class="asistencia-p1">
                    ¿Hacen envíos a domicilio?
                    <i class="asistencia-flecha2 fas fa-chevron-down" onclick="accion2()"></i>
                    <h5 class="flech2 asistencia-p2 desaparece">Sí! Y es por vía terrestre, pero solo los hacemos en la
                        ciudad de
                        Durango.</h5>
                </h4>
                <hr class="asistencia-hr">

                <h4 class="asistencia-p1">
                    ¿Qué hago si tengo problemas al realizar una compra?
                    <i class="asistencia-flecha3 fas fa-chevron-down" onclick="accion3()"></i>
                    <h5 class="flech3 asistencia-p2 desaparece">Tanto si usted tien problemas al efectuar la compra de algún
                        producto
                        y/o todo lo
                        relacionado al proceso
                        de compra, puede ponerse en contacto con nuestros administradores, tenga la ambilidad de hacerlo
                        mediante correo electrónico.</h5>
                </h4>
                <hr class="asistencia-hr">

                <h4 class="asistencia-p1">
                    ¿Puedo cancelar una compra después de haberla efectuado?
                    <i class="asistencia-flecha4 fas fa-chevron-down" onclick="accion4()"></i>
                    <h5 class="flech4 asistencia-p2 desaparece">Si usted no esta contento con su compra y/o le faltan
                        productos
                        por
                        comprar, usted
                        puede hacerlo dentro
                        de las 24 horas proximas, de lo contrario la compra no podrá ser cancelada.</h5>
                </h4>
                <hr class="asistencia-hr">

            </div>

            <form id="input_mensaje">
                <div class="asistencia-inputs">
                    <h4 class="asistencia-h4-input">PONTE EN CONTÁCTO</h4>
                    <input id="id_prueba2" class="input-nombre" type="text" pattern="[a-zA-Zá-úÁ-Ú ]+" name="nombre" placeholder="Nombre" value="" required>
                    <br>
                    <input class="input-email" type="email" name="email" placeholder="Email" value="" required>
                    <br>
                    <textarea required placeholder="Escribe tu mensaje aquí..." class="input-mensaje" name="mensaje" autocomplete="off"></textarea>
                    <br>                    
                    <input class="input-btn" type="submit" value="Enviar" onclick="enviarMensaje()">
                </div>
            </form>
        </div>
    </section>

    <script src="https://kit.fontawesome.com/56b0f801ce.js" crossorigin="anonymous"></script>
    <script src="js/faq.js"></script>
    <script src="js/index.js"></script>
    <?php include_once "views/script_future.php"?>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="js/sweetalert.js"></script>
    <script src="js/peticiones_php.js"></script>
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
    <title>Asistencia</title>
    <script src="js/scrollreveal.js"></script>
    <link rel="shortcut icon" href="img/favicon1.png">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@100&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="css/estilos_responsivo.css">
    <link rel="stylesheet" href="css/estilos.css">
    <?php include_once "views/estilos_future.php"?>
</head>

<body>

    <?php include "partes/_nav.php" ?>

    <section id="asistencia">
        <div class="div-asistencia-form">
            <div class="asistencia-preguntas">
                <p class="asistencia-p0">
                    Preguntas frecuentes
                </p>

                <h4 class="asistencia-p1">
                    ¿Cuáles son las formas de pago?
                    <i class="asistencia-flecha1 fas fa-chevron-down flech-down" onclick="accion1()"></i>
                    <h5 class="flech1 asistencia-p2 desaparece">Por el momento solo con Paypal.</h5>
                </h4>

                <hr class="asistencia-hr">

                <h4 class="asistencia-p1">
                    ¿Hacen envíos a domicilio?
                    <i class="asistencia-flecha2 fas fa-chevron-down" onclick="accion2()"></i>
                    <h5 class="flech2 asistencia-p2 desaparece">Sí! Y es por vía terrestre, pero solo los hacemos en la
                        ciudad de
                        Durango.</h5>
                </h4>
                <hr class="asistencia-hr">

                <h4 class="asistencia-p1">
                    ¿Qué hago si tengo problemas al realizar una compra?
                    <i class="asistencia-flecha3 fas fa-chevron-down" onclick="accion3()"></i>
                    <h5 class="flech3 asistencia-p2 desaparece">Tanto si usted tien problemas al efectuar la compra de algún
                        producto
                        y/o todo lo
                        relacionado al proceso
                        de compra, puede ponerse en contacto con nuestros administradores, tenga la ambilidad de hacerlo
                        mediante correo electrónico.</h5>
                </h4>
                <hr class="asistencia-hr">

                <h4 class="asistencia-p1">
                    ¿Puedo cancelar una compra después de haberla efectuado?
                    <i class="asistencia-flecha4 fas fa-chevron-down" onclick="accion4()"></i>
                    <h5 class="flech4 asistencia-p2 desaparece">Si usted no esta contento con su compra y/o le faltan
                        productos
                        por
                        comprar, usted
                        puede hacerlo dentro
                        de las 24 horas proximas, de lo contrario la compra no podrá ser cancelada.</h5>
                </h4>
                <hr class="asistencia-hr">

            </div>

            <form id="input_mensaje">
                <div class="asistencia-inputs">
                    <h4 class="asistencia-h4-input">PONTE EN CONTÁCTO</h4>
                    <input class="input-nombre" autocomplete="off" type="text" pattern="[a-zA-Zá-úÁ-Ú ]+" name="nombre" placeholder="Nombre" value="" required>
                    <br>
                    <input id="id_prueba" class="input-email" type="email" name="email" placeholder="Email" value="" required>
                    <br>
                    <textarea required placeholder="Escribe tu mensaje aquí..." class="input-mensaje" name="mensaje" autocomplete="off" id="" cols="30" rows="10"></textarea>
                    <br>                    
                    <input class="input-btn" type="submit" value="Enviar" onclick="enviarMensaje()">
                </div>
            </form>
        </div>
    </section>

    <script src="https://kit.fontawesome.com/56b0f801ce.js" crossorigin="anonymous"></script>
    <script src="js/faq.js"></script>
    <script src="js/index.js"></script>
    <?php include_once "views/script_future.php"?>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="js/sweetalert.js"></script>
</body>

</html>

<?php

    }

?>