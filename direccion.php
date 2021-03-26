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
            $ape2 = $datos['nombres']['ape2'];
            $telefono = $datos['telefono'];
            $calle = $datos['direccion']['calle'];
            $numero = $datos['direccion']['numero'];
            $col_fracc = $datos['direccion']['col_fracc'];
            $cp = $datos['direccion']['cp'];
            $ciudad = $datos['direccion']['ciudad'];

            if(!empty($_POST['id_producto'])&&!empty($_POST['cantidad_producto'])){

                $id_producto_post = $_POST['id_producto'];
        
                $C_productos = (new MongoDB\Client('mongodb+srv://javier:javier12345@cluster0.w3wdi.mongodb.net/opss?retryWrites=true&w=majority'))->opss->productos;
                $datosP = $C_productos->findOne(['_id' => new MongoDB\BSON\ObjectID($id_producto_post)]);
        
                $cantidadP = $datosP['cantidad'];
        
        
                if ($cantidadP > 0) {
            
                    $cantidad = $_POST['cantidad_producto'];
            
                }else{
        
                    echo "<script>
                            setTimeout(cargaAlertaProductoAgotado, 500);
                            function cargaAlertaProductoAgotado(){
                                AlertaProductoAgotado();
                            }
                            setTimeout(ReedireccionProductos, 3500);
                            function ReedireccionProductos(){
                                location.href = 'productos.php';
                            }
                        </script>";
        
                }                
        
            }else{

                echo "<script>
                        setTimeout(cargaAlertaErrorDatos, 500);
                        function cargaAlertaErrorDatos(){
                            AlertaErrorDatos();
                        }                    
                    </script>";

            }

    
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="js/scrollreveal.js"></script>
    <link rel="shortcut icon" href="img/favicon1.png">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@100&display=swap" rel="stylesheet">
    <?php include_once "views/estilos_future.php"?>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/estilos_responsivo.css">
    <title>Dirrección</title>
</head>

<body class="body-login">

    <?php include "partes/_navs.php" ?>

    <section id="agregar2">
        <h1 class="h1-direccion">Agrega tu dirección</h1>
        
        <form id="enviar_direccion">
            <div class="div-inputs-agregar2-gnrl div-agregar-direccion">
                <input type="hidden" name="id_producto" value="<?php echo $id_producto_post ?>">                
                <div class="div-inputs-agregar2">
                    <label for="nombre" id="label-agregar2">Nombre(s)</label>
                    <br>
                    <input class="input-agregar2-form" pattern="[a-zA-Zá-úÁ-Ú ]+" type="text" name="nombre" required id="nombre" value="<?php if(isset($nombre)) echo $nombre?>">
                </div>
                        
                <div class="div-inputs-agregar2">
                    <label for="ape1" id="label-agregar2">Primer apellido</label>
                    <br>
                    <input class="input-agregar2-form" pattern="[a-zA-Zá-úÁ-Ú ]+" type="text" name="ape1" required id="ape1" value="<?php if(isset($ape1)) echo $ape1?>">                    
                </div>

                <div class="div-inputs-agregar2">
                    <label for="ape2" id="label-agregar2">Segundo apellido</label>
                    <br>
                    <input class="input-agregar2-form" pattern="[a-zA-Zá-úÁ-Ú ]+" type="text" name="ape2" id="ape2" value="<?php if(isset($ape2)) echo $ape2?>">
                </div>

                <div class="div-inputs-agregar2">
                    <label for="telefono" id="label-agregar2">Teléfono</label>
                    <br>
                    <input class="input-agregar2-form" title="Solo números" pattern="[0-9]+" type="tel" name="telefono" required id="telefono" minlength="10" maxlength="10" value="<?php if(isset($telefono)) echo $telefono?>">
                </div>

                <div class="div-inputs-agregar2">
                    <label for="calle" id="label-agregar2">Calle</label>
                    <br>
                    <input class="input-agregar2-form" type="text" name="calle" required id="calle" value="<?php if(isset($calle)) echo $calle?>">
                </div>

                <div class="div-inputs-agregar2">
                    <label for="numero" id="label-agregar2">Número exterior</label>
                    <br>
                    <input class="input-agregar2-form" type="text" name="numero" required id="numero" value="<?php if(isset($numero)) echo $numero?>">
                </div>

                <div class="div-inputs-agregar2">
                    <label for="col-fracc" id="label-agregar2">Col. o Fracc.</label>
                    <br>
                    <input class="input-agregar2-form" type="text" name="col_fracc" required id="col-fracc" value="<?php if(isset($col_fracc)) echo $col_fracc?>">
                </div>

                <div class="div-inputs-agregar2">
                    <label for="cp" id="label-agregar2">Código Postal</label>
                    <br>
                    <input class="input-agregar2-form" type="tel" title="Solo números" maxlength="5" pattern="[0-9]+" name="cp" required id="cp" value="<?php if(isset($cp)) echo $cp?>">
                </div>

                <div class="div-inputs-agregar2">
                    <label for="ciudad" id="label-agregar2">Ciudad</label>
                    <br>
                    <input list="ciudades" class="input-agregar2-form" type="text" name="ciudad" required id="ciudad" value="<?php if(isset($ciudad)) echo $ciudad?>">
                    <datalist id="ciudades">
                                <option value="Aguascalientes">
                                <option value="Baja California">
                                <option value="Baja California Sur">
                                <option value="Campeche">
                                <option value="CDMX">
                                <option value="Coahuila">
                                <option value="Colima">
                                <option value="Chiapas">
                                <option value="Chihuahua">
                                <option value="Durango">
                                <option value="Estado de México">
                                <option value="Guanajuato">
                                <option value="Guerrero">
                                <option value="Hidalgo">
                                <option value="Jalisco">
                                <option value="Michoacán">
                                <option value="Morelos">
                                <option value="Nayarit">
                                <option value="Nuevo León">
                                <option value="Oaxaca">
                                <option value="Puebla">
                                <option value="Querétaro">
                                <option value="Quintana Roo">
                                <option value="Sinaloa">
                                <option value="Sonora">
                                <option value="Tabasco">
                                <option value="Tamaulipas">
                                <option value="Tlaxcala">
                                <option value="Veracruz">
                                <option value="Yucatán">
                                <option value="Zacatecas">
                    </datalist>
                </div>

                <div class="div-inputs-agregar2">
                    <label for="cantidad" id="label-agregar2">Cantidad de producto</label>
                    <br>
                    <input class="input-agregar2-form" type="number" title="Solo números" pattern="[0-9]+" min="1" name="cantidad_n" required id="cantidad" value="<?php if(isset($cantidad)) echo $cantidad?>">
                </div>

            </div>

            <input class="btn-input-comprar-producto" type="submit" value="Pedir producto" onclick="enviarDireccion()">
            <a class="btn-editar-perfil2" href="comprar.php">Volver atrás</a>
        </form>
    </section>

    <script src=" https://kit.fontawesome.com/56b0f801ce.js" crossorigin="anonymous"></script>
    <script src="js/faq.js"></script>
    <script src="js/index.js"></script>
    <script type="text/javascript" src="js/agregar.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="js/sweetalert.js"></script>
    <script src="js/peticiones_php.js"></script>
</body>

</html>

<?php

     }elseif(!isset($_SESSION['usuario'])){

        if(!empty($_POST['id_producto'])&&!empty($_POST['cantidad_producto'])){

            $id_producto_post = $_POST['id_producto'];

            $C_productos = (new MongoDB\Client('mongodb+srv://javier:javier12345@cluster0.w3wdi.mongodb.net/opss?retryWrites=true&w=majority'))->opss->productos;
            $datosP = $C_productos->findOne(['_id' => new MongoDB\BSON\ObjectID($id_producto_post)]);

            $cantidadP = $datosP['cantidad'];


            if ($cantidadP > 0) {
    
                $cantidad = $_POST['cantidad_producto'];
    
            }else{

                echo "<script>
                            setTimeout(cargaAlertaProductoAgotado, 500);
                            function cargaAlertaProductoAgotado(){
                                AlertaProductoAgotado();
                            }
                            setTimeout(ReedireccionProductos, 3500);
                            function ReedireccionProductos(){
                                location.href = 'productos.php';
                            }
                        </script>";

            }

        }else{

            echo "<script>
                        setTimeout(cargaAlertaErrorDatos, 500);
                        function cargaAlertaErrorDatos(){
                            AlertaErrorDatos();
                        }                    
                    </script>";
            
        }

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="js/scrollreveal.js"></script>
    <link rel="shortcut icon" href="img/favicon1.png">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@100&display=swap" rel="stylesheet">
    <?php include_once "views/estilos_future.php"?>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/estilos_responsivo.css">
    <title>Dirrección</title>
</head>

<body class="body-login">

    <?php include "partes/_nav.php" ?>

    <section id="agregar2">
        <h1 class="h1-direccion">Agrega tu dirección</h1>
        
        <form action="" method="POST">
            <div class="div-inputs-agregar2-gnrl div-agregar-direccion">
                <input type="hidden" name="id_producto" value="<?php echo $id_producto_post ?>">                
                <div class="div-inputs-agregar2">
                    <label for="nombre" id="label-agregar2">Nombre(s)</label>
                    <br>
                    <input class="input-agregar2-form" pattern="[a-zA-Zá-úÁ-Ú ]+" type="text" name="nombre" required id="nombre" value="<?php if(isset($nombre)) echo $nombre?>">
                </div>
                        
                <div class="div-inputs-agregar2">
                    <label for="ape1" id="label-agregar2">Primer apellido</label>
                    <br>
                    <input class="input-agregar2-form" pattern="[a-zA-Zá-úÁ-Ú ]+" type="text" name="ape1" required id="ape1" value="<?php if(isset($ape1)) echo $ape1?>">                    
                </div>

                <div class="div-inputs-agregar2">
                    <label for="ape2" id="label-agregar2">Segundo apellido</label>
                    <br>
                    <input class="input-agregar2-form" pattern="[a-zA-Zá-úÁ-Ú ]+" type="text" name="ape2" id="ape2" value="<?php if(isset($ape2)) echo $ape2?>">
                </div>

                <div class="div-inputs-agregar2">
                    <label for="telefono" id="label-agregar2">Teléfono</label>
                    <br>
                    <input class="input-agregar2-form" title="Solo números" pattern="[0-9]+" type="tel" name="telefono" required id="telefono" minlength="10" maxlength="10" value="<?php if(isset($telefono)) echo $telefono?>">
                </div>

                <div class="div-inputs-agregar2">
                    <label for="calle" id="label-agregar2">Calle</label>
                    <br>
                    <input class="input-agregar2-form" type="text" name="calle" required id="calle" value="<?php if(isset($calle)) echo $calle?>">
                </div>

                <div class="div-inputs-agregar2">
                    <label for="numero" id="label-agregar2">Número exterior</label>
                    <br>
                    <input class="input-agregar2-form" type="text" name="numero" required id="numero" value="<?php if(isset($numero)) echo $numero?>">
                </div>

                <div class="div-inputs-agregar2">
                    <label for="col-fracc" id="label-agregar2">Col. o Fracc.</label>
                    <br>
                    <input class="input-agregar2-form" type="text" name="col_fracc" required id="col-fracc" value="<?php if(isset($col_fracc)) echo $col_fracc?>">
                </div>

                <div class="div-inputs-agregar2">
                    <label for="cp" id="label-agregar2">Código Postal</label>
                    <br>
                    <input class="input-agregar2-form" type="tel" title="Solo números" maxlength="5" pattern="[0-9]+" name="cp" required id="cp" value="<?php if(isset($cp)) echo $cp?>">
                </div>

                <div class="div-inputs-agregar2">
                    <label for="ciudad" id="label-agregar2">Ciudad</label>
                    <br>
                    <input list="ciudades" class="input-agregar2-form" type="text" name="ciudad" required id="ciudad" value="<?php if(isset($ciudad)) echo $ciudad?>">
                    <datalist id="ciudades">
                                <option value="Aguascalientes">
                                <option value="Baja California">
                                <option value="Baja California Sur">
                                <option value="Campeche">
                                <option value="CDMX">
                                <option value="Coahuila">
                                <option value="Colima">
                                <option value="Chiapas">
                                <option value="Chihuahua">
                                <option value="Durango">
                                <option value="Estado de México">
                                <option value="Guanajuato">
                                <option value="Guerrero">
                                <option value="Hidalgo">
                                <option value="Jalisco">
                                <option value="Michoacán">
                                <option value="Morelos">
                                <option value="Nayarit">
                                <option value="Nuevo León">
                                <option value="Oaxaca">
                                <option value="Puebla">
                                <option value="Querétaro">
                                <option value="Quintana Roo">
                                <option value="Sinaloa">
                                <option value="Sonora">
                                <option value="Tabasco">
                                <option value="Tamaulipas">
                                <option value="Tlaxcala">
                                <option value="Veracruz">
                                <option value="Yucatán">
                                <option value="Zacatecas">
                    </datalist>
                </div>

                <div class="div-inputs-agregar2">
                    <label for="cantidad" id="label-agregar2">Cantidad de producto</label>
                    <br>
                    <input class="input-agregar2-form" type="number" title="Solo números" pattern="[0-9]+" min="1" name="cantidad_n" required id="cantidad" value="<?php if(isset($cantidad)) echo $cantidad?>">
                </div>

            </div>

            <input class="btn-input-comprar-producto" type="submit" value="Pedir producto" onclick="return ConfirmAdd()">
            <a class="btn-editar-perfil2" href="comprar.php">Volver atrás</a>
        </form>
    </section>

    <script src=" https://kit.fontawesome.com/56b0f801ce.js" crossorigin="anonymous"></script>
    <script src="js/faq.js"></script>
    <script src="js/index.js"></script>
    <script type="text/javascript" src="js/agregar.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="js/sweetalert.js"></script>
</body>

</html>

<?php
    }
?>