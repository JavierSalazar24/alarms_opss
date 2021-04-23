<?php

    session_start();

    require_once __DIR__ . '/vendor/autoload.php';

    if(isset($_SESSION['admin'])||isset($_SESSION['estandar'])){

        header("Location: control_panel/index.php");
      
    }elseif (!isset($_SESSION['usuario'])) {

        header("Location: index.php");
        
    }elseif (isset($_SESSION['usuario'])) {

        $correo = $_SESSION['usuario'];

        $C_clientes = (new MongoDB\Client('mongodb+srv://javier:javier12345@cluster0.w3wdi.mongodb.net/opss?retryWrites=true&w=majority'))->opss->clientes; 
        $datos = $C_clientes->findOne(['correo' => $correo]);

        $id = $datos['_id'];
        $nombre = $datos['nombres']['nombre'];
        $ape1 = $datos['nombres']['ape1'];
        $ape2 = $datos['nombres']['ape2'];
        $calle = $datos['direccion']['calle'];
        $numero = $datos['direccion']['numero'];
        $col_fracc = $datos['direccion']['col_fracc'];
        $cp = $datos['direccion']['cp'];
        $ciudad = $datos['direccion']['ciudad'];
        $telefono = $datos['telefono'];
        $correo = $datos['correo'];
        


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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/estilos_responsivo.css">
    <link rel="stylesheet" href="assets/future/css/main.css" />
    <title>Mi perfil | OPSS</title>
</head>

<body class="body-perfil">
    
    <?php include "partes/_navs.php" ?>

    <div id="perfil" class="container">
        <div class="row justify-content-center pt-4 mt-3 m-1 mb-3 pb-4">
            <div class="col-12">                
                <form id="form_editar_perfil" class="formulario_normal row mt-2 justify-content-evenly needs-validation" novalidate>
                    <div class="form-group text-center pt-4 pb-5">
                        <h1 class="titulo-pedidos">EDITAR PERFIL</h1>
                    </div>
                    <div class="col-md-3">
                        <div class="form-floating mb-4 pr-5">
                            <input type="hidden" name="id" value="<?php echo $id?>">
                            <input class="form-control form-control-negro" placeholder="Nombre" minlength="3" pattern="[a-zA-Zá-úÁ-Ú ]+" type="text" name="nombre" required id="nombre" value="<?php if(isset($nombre)) echo $nombre?>">
                            <label class="label-pedidos" for="nombre">Nombre(s)</label>
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback">Por favor ingresa tú nombre, mínimo 3 carácteres.</div>
                        </div>
                        <div class="form-floating mb-4">
                            <input class="form-control form-control-negro" placeholder="Segundo apellido" pattern="[a-zA-Zá-úÁ-Ú ]+" type="text" name="ape2" id="ape2" value="<?php if(isset($ape2)) echo $ape2?>">
                            <label class="label-pedidos" for="ape2">Segundo apellido</label>
                            <div class="valid-feedback">Este campo no es obligatorio.</div>                                                
                        </div>
                        <div class="form-floating mb-4">
                            <input class="form-control form-control-negro" placeholder="Calle" minlength="3" type="text" name="calle" required id="calle" value="<?php if(isset($calle)) echo $calle?>">
                            <label class="label-pedidos" for="calle">Calle</label>
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback">Por favor ingresa tú calle, mínimo 3 carácteres.</div>
                        </div> 
                        <div class="form-floating mb-4">
                            <input class="form-control form-control-negro" placeholder="Col. o Fracc." minlength="5" type="text" name="col_fracc" required id="col-fracc" value="<?php if(isset($col_fracc)) echo $col_fracc?>">
                            <label class="label-pedidos" for="col-fracc">Col. o Fracc.</label>
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback">Por favor ingresa tú colonia o fraccionamiento, mínimo 5 carácteres.</div>
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
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback">Por favor elige tu ciudad.</div>
                        </div>                         
                    </div>
                    <div class="col-md-3">
                        <div class="form-floating mb-4">
                            <input class="form-control form-control-negro" placeholder="Primer apellido" minlength="3" pattern="[a-zA-Zá-úÁ-Ú ]+" type="text" name="ape1" required id="ape1" value="<?php if(isset($ape1)) echo $ape1?>">
                            <label class="label-pedidos" for="ape1">Primer apellido</label>
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback">Por favor ingresa tú primer apellido, mínimo 3 carácteres.</div>
                        </div>
                        <div class="form-floating mb-4">
                            <input class="form-control form-control-negro" placeholder="Teléfono"  title="Solo números" pattern="[0-9]+" type="tel" name="telefono" required id="telefono" minlength="10" maxlength="10" value="<?php if(isset($telefono)) echo $telefono?>">
                            <label class="label-pedidos" for="telefono">Teléfono</label>
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback">Por favor ingresa tú teléfono de 10 números.</div>
                        </div>    
                        <div class="form-floating mb-4">
                            <input class="form-control form-control-negro" placeholder="Número exterior" type="text" name="numero" required id="numero" value="<?php if(isset($numero)) echo $numero?>">
                            <label class="label-pedidos" for="numero">Número exterior</label>
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback">Por favor ingresa tú número exterior.</div>
                        </div>    
                        <div class="form-floating mb-4">
                            <input class="form-control form-control-negro" placeholder="Código Postal" type="tel" title="Solo números" minlength="5" maxlength="5" pattern="[0-9]+" name="cp" required id="cp" value="<?php if(isset($cp)) echo $cp?>">
                            <label class="label-pedidos" for="cp">Código Postal</label>
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback">Por favor ingresa tú código postal, solo números.</div>
                        </div>    
                        <div class="form-floating mb-4">
                            <input class="form-control form-control-negro" placeholder="Email" type="email" name="correo" required id="email" value="<?php if(isset($correo)) echo $correo?>" readonly>
                            <label class="label-pedidos" for="email">Email</label>
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback">Por favor ingresa tú email.</div>
                        </div>                        
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-3 mt-5 mb-5 d-grid gap-2 text-center">
                            <button type="submit" onclick="editarPerfil()" class="btn btn-dark btn-lg">Guardar cambios</button>
                        </div>
                        <div class="col-md-3 mt-5 mb-5 d-grid gap-2 text-center">
                            <a href="mi_perfil.php" class="btn btn-dark btn-lg">Ir atrás</a>
                        </div>       
                    </div>            
                    </div>
                </form>
                <form id="form_editar_perfil2" class="formulario_responsive row mt-2 justify-content-center needs-validation mx-auto" novalidate>
                    <div class="form-group text-center pt-4 pb-3">
                        <h1 class="titulo-pedidos">EDITAR PERFIL</h1>
                    </div>
                    <div class="col-12">
                        <div class="form-floating mb-4 pr-5">
                            <input type="hidden" name="id" value="<?php echo $id?>">
                            <input class="form-control form-control-negro" placeholder="Nombre" minlength="3" pattern="[a-zA-Zá-úÁ-Ú ]+" type="text" name="nombre" required id="nombre" value="<?php if(isset($nombre)) echo $nombre?>">
                            <label class="label-pedidos" for="nombre">Nombre(s)</label>
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback">Por favor ingresa tú nombre, mínimo 3 carácteres.</div>
                        </div>
                        <div class="form-floating mb-4">
                            <input class="form-control form-control-negro" placeholder="Primer apellido" minlength="3" pattern="[a-zA-Zá-úÁ-Ú ]+" type="text" name="ape1" required id="ape1" value="<?php if(isset($ape1)) echo $ape1?>">
                            <label class="label-pedidos" for="ape1">Primer apellido</label>
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback">Por favor ingresa tú primer apellido, mínimo 3 carácteres.</div>
                        </div>
                        <div class="form-floating mb-4">
                            <input class="form-control form-control-negro" placeholder="Segundo apellido" pattern="[a-zA-Zá-úÁ-Ú ]+" type="text" name="ape2" id="ape2" value="<?php if(isset($ape2)) echo $ape2?>">
                            <label class="label-pedidos" for="ape2">Segundo apellido</label>
                            <div class="valid-feedback">Este campo no es obligatorio.</div>                                                
                        </div>
                        <div class="form-floating mb-4">
                            <input class="form-control form-control-negro" placeholder="Teléfono"  title="Solo números" pattern="[0-9]+" type="tel" name="telefono" required id="telefono" minlength="10" maxlength="10" value="<?php if(isset($telefono)) echo $telefono?>">
                            <label class="label-pedidos" for="telefono">Teléfono</label>
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback">Por favor ingresa tú teléfono de 10 números.</div>
                        </div> 
                        <div class="form-floating mb-4">
                            <input class="form-control form-control-negro" placeholder="Calle" minlength="3" type="text" name="calle" required id="calle" value="<?php if(isset($calle)) echo $calle?>">
                            <label class="label-pedidos" for="calle">Calle</label>
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback">Por favor ingresa tú calle, mínimo 3 carácteres.</div>
                        </div>
                        <div class="form-floating mb-4">
                            <input class="form-control form-control-negro" placeholder="Número exterior" type="text" name="numero" required id="numero" value="<?php if(isset($numero)) echo $numero?>">
                            <label class="label-pedidos" for="numero">Número exterior</label>
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback">Por favor ingresa tú número exterior.</div>
                        </div>
                        <div class="form-floating mb-4">
                            <input class="form-control form-control-negro" placeholder="Col. o Fracc." minlength="5" type="text" name="col_fracc" required id="col-fracc" value="<?php if(isset($col_fracc)) echo $col_fracc?>">
                            <label class="label-pedidos" for="col-fracc">Col. o Fracc.</label>
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback">Por favor ingresa tú colonia o fraccionamiento, mínimo 5 carácteres.</div>
                        </div> 
                        <div class="form-floating mb-4">
                            <input class="form-control form-control-negro" placeholder="Código Postal" type="tel" title="Solo números" minlength="5" maxlength="5" pattern="[0-9]+" name="cp" required id="cp" value="<?php if(isset($cp)) echo $cp?>">
                            <label class="label-pedidos" for="cp">Código Postal</label>
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback">Por favor ingresa tú código postal, solo números.</div>
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
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback">Por favor elige tu ciudad.</div>
                        </div>
                        <div class="form-floating mb-4">
                            <input class="form-control form-control-negro" placeholder="Email" type="email" name="correo" required id="email" value="<?php if(isset($correo)) echo $correo?>">
                            <label class="label-pedidos" for="email">Email</label>
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback">Por favor ingresa tú email.</div>
                        </div>  
                    </div>
                    <div class="row justify-content-center mx-auto">
                        <div class="form-group mt-5 mb-3 d-grid text-center">
                            <input type="submit" class="btn ingresar mb-3" onclick="editarPerfil2()" value="Guardar cambios">
                            <a href="mi_perfil.php" class="btn ingresar mb-3">Ir atrás</a>
                        </div>             
                    </div>                     
                </form> 
            </div>
        </div>
    </div>

    <script src="https://kit.fontawesome.com/56b0f801ce.js" crossorigin="anonymous"></script>
    <script src="js/index.js"></script>
    <?php include_once "views/script_bootstrap.php"?>
    <?php include_once "views/script_future.php"?>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="js/sweetalert.js"></script>
    <script src="js/validacion_formulario.js"></script>
    <script src="js/peticiones_php.js"></script>
</body>
</html>

<?php

    }

?>