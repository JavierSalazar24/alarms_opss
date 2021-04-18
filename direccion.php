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
    <!-- Transiciones -->
    <script src="js/scrollreveal.js"></script>
    <!-- Estilos -->
    <link rel="shortcut icon" href="img/favicon1.png">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@100&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/estilos_responsivo.css">
    <link rel="stylesheet" href="assets/future/css/main.css" />
    <title>Dirrección | OPSS</title>
</head>

<body class="body-direccion">

    <?php include "partes/_navs.php" ?>

    <div class="container container-registrarse">
        <section id="agregar2 mt-5">
                <h1 class="h1-direccion text-center pt-5 pb-5">Agrega tu dirección</h1>           
            <form id="enviar_direccion" class="formulario_normal row mt-2 justify-content-evenly needs-validation" novalidate>
                <div class="col-md-3">
                    <input type="hidden" name="id_producto" value="<?php echo $id_producto_post?>">
                    <input type="hidden" name="correo" value="<?php echo $correo?>">
                    <div class="form-floating mb-4 pr-5">
                        <input class="form-control form-control-negro" placeholder="Nombre"  pattern="[a-zA-Zá-úÁ-Ú ]+" type="text" name="nombre" required id="nombre" value="<?php if(isset($nombre)) echo $nombre?>">
                        <label class="label-pedidos" for="nombre">Nombre(s)</label>
                        <div class="valid-feedback">Correcto.</div>
                        <div class="invalid-feedback">Por favor ingresa tú nombre.</div>
                    </div>
                    <div class="form-floating mb-4">
                        <input class="form-control form-control-negro" placeholder="Segundo apellido" pattern="[a-zA-Zá-úÁ-Ú ]+" type="text" name="ape2" id="ape2" value="<?php if(isset($ape2)) echo $ape2?>">
                        <label class="label-pedidos" for="ape2">Segundo apellido</label>
                        <div class="valid-feedback">Este campo no es obligatorio.</div>
                        <div class="invalid-feedback">Por favor ingresa tú segundo apellido.</div>
                    </div>
                    <div class="form-floating mb-4">
                        <input class="form-control form-control-negro" placeholder="Calle" type="text" name="calle" required id="calle" value="<?php if(isset($calle)) echo $calle?>">
                        <label class="label-pedidos" for="calle">Calle</label>
                        <div class="valid-feedback">Correcto.</div>
                        <div class="invalid-feedback">Por favor ingresa tú calle.</div>
                    </div> 
                    <div class="form-floating mb-4">
                        <input class="form-control form-control-negro" placeholder="Col. o Fracc." type="text" name="col_fracc" required id="col-fracc" value="<?php if(isset($col_fracc)) echo $col_fracc?>">
                        <label class="label-pedidos" for="col-fracc">Col. o Fracc.</label>
                        <div class="valid-feedback">Correcto.</div>
                        <div class="invalid-feedback">Por favor ingresa tú colonia o fraccionamiento.</div>
                    </div> 
                    <div class="form-floating mb-4">
                        <input class="form-control form-control-negro" placeholder="Ciudad" list="ciudades" type="text" name="ciudad" required id="ciudad" value="<?php if(isset($ciudad)) echo $ciudad?>">
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
                                    <option value="Durango" selected>
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
                        <label class="label-pedidos" for="ciudad">Ciudad</label>
                        <div class="valid-feedback">Correcto.</div>
                        <div class="invalid-feedback">Por favor elige tu ciudad.</div>
                    </div> 
                </div>
                <div class="col-md-3">
                    <div class="form-floating mb-4">
                        <input class="form-control form-control-negro" placeholder="Primer apellido" pattern="[a-zA-Zá-úÁ-Ú ]+" type="text" name="ape1" required id="ape1" value="<?php if(isset($ape1)) echo $ape1?>">
                        <label class="label-pedidos" for="ape1">Primer apellido</label>
                        <div class="valid-feedback">Correcto.</div>
                        <div class="invalid-feedback">Por favor ingresa tú primer apellido.</div>
                    </div>
                    <div class="form-floating mb-4">
                        <input class="form-control form-control-negro" placeholder="Teléfono"  title="Solo números" pattern="[0-9]+" type="tel" name="telefono" required id="telefono" minlength="10" maxlength="10" value="<?php if(isset($telefono)) echo $telefono?>">
                        <label class="label-pedidos" for="telefono">Teléfono</label>
                        <div class="valid-feedback">Correcto.</div>
                        <div class="invalid-feedback">Por favor ingresa tú teléfono.</div>
                    </div>    
                    <div class="form-floating mb-4">
                        <input class="form-control form-control-negro" placeholder="Número exterior" type="text" name="numero" required id="numero" value="<?php if(isset($numero)) echo $numero?>">
                        <label class="label-pedidos" for="numero">Número exterior</label>
                        <div class="valid-feedback">Correcto.</div>
                        <div class="invalid-feedback">Por favor ingresa tú número exterior.</div>
                    </div>    
                    <div class="form-floating mb-4">
                        <input class="form-control form-control-negro" placeholder="Código Postal" type="tel" title="Solo números" maxlength="5" maxlength="5" pattern="[0-9]+" name="cp" required id="cp" value="<?php if(isset($cp)) echo $cp?>">
                        <label class="label-pedidos" for="cp">Código Postal</label>
                        <div class="valid-feedback">Correcto.</div>
                        <div class="invalid-feedback">Por favor ingresa tú código postal.</div>
                    </div>    
                    <div class="form-floating mb-4">
                        <input class="form-control form-control-negro" placeholder="Cantidad" type="number" name="cantidad_n" required id="cantidad" min="1" value="<?php if(isset($cantidad)) echo $cantidad?>">
                        <label class="label-pedidos" for="cantidad">Cantidad</label>
                        <div class="valid-feedback">Correcto.</div>
                        <div class="invalid-feedback">Por favor ingresa una cantidad.</div>
                    </div>                    
                </div>
                <div class="row justify-content-center">
                    <div class="col-8 col-md-4 mt-5 mb-5 d-grid gap-2 text-center">
                        <button type="submit" class="btn btn-dark btn-lg" onclick="enviarDireccion()">Pedir producto</button>
                    </div>                    
                </div>
            </form>
            <form id="enviar_direccion2" class="formulario_responsive row mt-0 pt-0 justify-content-center needs-validation" novalidate>
                <div class="col-12 mt-0 pt-0">
                    <div class="form-floating mb-4 pr-5">
                        <input type="hidden" name="id_producto" value="<?php echo $id_producto_post?>">
                        <input type="hidden" name="correo" value="<?php echo $correo?>">
                        <input class="form-control mt-5 form-control-negro" placeholder="Nombre(s)"  pattern="[a-zA-Zá-úÁ-Ú ]+" type="text" name="nombre" required id="nombre" value="<?php if(isset($nombre)) echo $nombre?>">
                        <label class="label-pedidos" for="nombre">Nombre(s)</label>
                        <div class="valid-feedback">Correcto.</div>
                        <div class="invalid-feedback">Por favor ingresa tú nombre.</div>
                    </div>
                    <div class="form-floating mb-4">
                        <input class="form-control form-control-negro" placeholder="Primer apellido" pattern="[a-zA-Zá-úÁ-Ú ]+" type="text" name="ape1" required id="ape1" value="<?php if(isset($ape1)) echo $ape1?>">
                        <label class="label-pedidos" for="ape1">Primer apellido</label>
                        <div class="valid-feedback">Correcto.</div>
                        <div class="invalid-feedback">Por favor ingresa tú primer nombre.</div>
                    </div>
                    <div class="form-floating mb-4">
                        <input class="form-control form-control-negro" placeholder="Segundo apellido" pattern="[a-zA-Zá-úÁ-Ú ]+" type="text" name="ape2" id="ape2" value="<?php if(isset($ape2)) echo $ape2?>">
                        <label class="label-pedidos" for="ape2">Segundo apellido</label>
                        <div class="valid-feedback">Este campo no es obligatorio.</div>
                        <div class="invalid-feedback">Por favor ingresa tú segundo apellido.</div>
                    </div>
                    <div class="form-floating mb-4">
                        <input class="form-control form-control-negro" placeholder="Teléfono"  title="Solo números" pattern="[0-9]+" type="tel" name="telefono" required id="telefono" minlength="10" maxlength="10" value="<?php if(isset($telefono)) echo $telefono?>">
                        <label class="label-pedidos" for="telefono">Teléfono</label>
                        <div class="valid-feedback">Correcto.</div>
                        <div class="invalid-feedback">Por favor ingresa tú teléfono.</div>
                    </div>
                    <div class="form-floating mb-4">
                        <input class="form-control form-control-negro" placeholder="Calle" type="text" name="calle" required id="calle" value="<?php if(isset($calle)) echo $calle?>">
                        <label class="label-pedidos" for="calle">Calle</label>
                        <div class="valid-feedback">Correcto.</div>
                        <div class="invalid-feedback">Por favor ingresa tú calle.</div>
                    </div>
                    <div class="form-floating mb-4">
                        <input class="form-control form-control-negro" placeholder="Número exterior" type="text" name="numero" required id="numero" value="<?php if(isset($numero)) echo $numero?>">
                        <label class="label-pedidos" for="numero">Número exterior</label>
                        <div class="valid-feedback">Correcto.</div>
                        <div class="invalid-feedback">Por favor ingresa tú número exterior.</div>
                    </div>
                    <div class="form-floating mb-4">
                        <input class="form-control form-control-negro" placeholder="Col. o Fracc." type="text" name="col_fracc" required id="col-fracc" value="<?php if(isset($col_fracc)) echo $col_fracc?>">
                        <label class="label-pedidos" for="col-fracc">Col. o Fracc.</label>
                        <div class="valid-feedback">Correcto.</div>
                        <div class="invalid-feedback">Por favor ingresa tú colonia o fraccionamiento.</div>
                    </div>
                    <div class="form-floating mb-4">
                        <input class="form-control form-control-negro" placeholder="Código Postal" type="tel" title="Solo números" maxlength="5" maxlength="5" pattern="[0-9]+" name="cp" required id="cp" value="<?php if(isset($cp)) echo $cp?>">
                        <label class="label-pedidos" for="cp">Código Postal</label>
                        <div class="valid-feedback">Correcto.</div>
                        <div class="invalid-feedback">Por favor ingresa tú código postal.</div>
                    </div>
                    <div class="form-floating mb-4">
                        <input class="form-control form-control-negro" placeholder="Ciudad" list="ciudades" type="text" name="ciudad" required id="ciudad" value="<?php if(isset($ciudad)) echo $ciudad?>">
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
                                    <option value="Durango" selected>
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
                        <label class="label-pedidos" for="ciudad">Ciudad</label>
                        <div class="valid-feedback">Correcto.</div>
                        <div class="invalid-feedback">Por favor elige tú ciudad.</div>
                    </div>
                    <div class="form-floating mb-4">
                        <input class="form-control form-control-negro" placeholder="Cantidad" type="number" name="cantidad_n" required id="cantidad" min="1" value="<?php if(isset($cantidad)) echo $cantidad?>">
                        <label class="label-pedidos" for="cantidad">Cantidad</label>
                        <div class="valid-feedback">Correcto.</div>
                        <div class="invalid-feedback">Por favor ingresa una cantidad.</div>
                    </div> 
                </div>
                <div class="row justify-content-center">
                    <div class="col-8 col-md-4 mt-5 mb-5 d-grid gap-2 text-center">
                        <button type="submit" class="btn btn-dark btn-lg" onclick="enviarDireccion2()">Pedir producto</button>
                    </div>                      
                </div>                     
            </form>                
        </section>
    </div>

    <!-- Fontsawesome -->
    <script src=" https://kit.fontawesome.com/56b0f801ce.js" crossorigin="anonymous"></script>
    <!-- Transiciones -->
    <script src="js/index.js"></script>
    <!-- Sweetalert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="js/sweetalert.js"></script>
    <!-- Validar formularios -->
    <script src="js/validacion_formulario.js"></script>
    <!-- Peticiones PHP con JS -->
    <script src="js/peticiones_php.js"></script>
    <!-- Estilos Script -->
    <?php include_once "views/script_bootstrap.php"?>
    <?php include_once "views/script_future.php"?>

</body>

</html>

<?php

     }elseif(!isset($_SESSION['usuario'])){
    
        header("Location: registrarse.php");        

     }

?>
