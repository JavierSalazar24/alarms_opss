<?php

    session_start();

    require_once 'vendor/autoload.php';
    

    if(isset($_SESSION['admin'])||isset($_SESSION['estandar'])){

        header("Location: control_panel/index.php");
    
    }elseif(isset($_SESSION['usuario'])){

        header("Location: index.php");
    
    }elseif(!isset($_SESSION['usuario'])){

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="img/favicon1.png">
    <!-- Transiciones -->
    <script src="js/scrollreveal.js"></script>
    <!-- Estilos -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/estilos_responsivo.css">
    <title>Registrarse | OPSS</title>
</head>

<body class="body-registrar">
    <div id="registrarse" class="container">
        <div class="row justify-content-center pt-4 mt-3 m-1 mb-3 pb-4">
            <div class="col-12 formulario_registrarse">                
                <form id="form_registrarse" class="formulario_normal row mt-2 justify-content-evenly needs-validation" novalidate>
                    <div class="form-group text-center pt-4 pb-5">
                        <h1 class="titulo-login">REGISTRATE</h1>
                        <p class="parrafo-login">¿Ya tienes una cuenta? <a href="iniciar_sesion.php" class="text-light btn-link">inicia sesión</a></p>
                    </div>
                    <div class="col-md-3">
                        <div class="form-floating mb-4 pr-5">
                            <input class="form-control form-control-registrarse" placeholder="Nombre"  pattern="[a-zA-Zá-úÁ-Ú ]+" type="text" name="nombre" required id="nombre" value="<?php if(isset($nombre)) echo $nombre?>">
                            <label class="label-registrarse" for="nombre">Nombre(s)</label>
                            <div class="valid-feedback text-light">Correcto.</div>
                            <div class="invalid-feedback text-light">Por favor ingresa tú nombre.</div>
                        </div>
                        <div class="form-floating mb-4">
                            <input class="form-control form-control-registrarse" placeholder="Segundo apellido" pattern="[a-zA-Zá-úÁ-Ú ]+" type="text" name="ape2" id="ape2" value="<?php if(isset($ape2)) echo $ape2?>">
                            <label class="label-registrarse" for="ape2">Segundo apellido</label>
                            <div class="valid-feedback text-light">Este campo no es obligatorio.</div>
                            <div class="invalid-feedback text-light">Por favor ingresa tú segundo apellido.</div>
                        </div>
                        <div class="form-floating mb-4">
                            <input class="form-control form-control-registrarse" placeholder="Calle" type="text" name="calle" required id="calle" value="<?php if(isset($calle)) echo $calle?>">
                            <label class="label-registrarse" for="calle">Calle</label>
                            <div class="valid-feedback text-light">Correcto.</div>
                            <div class="invalid-feedback text-light">Por favor ingresa tú calle.</div>
                        </div> 
                        <div class="form-floating mb-4">
                            <input class="form-control form-control-registrarse" placeholder="Col. o Fracc." type="text" name="col_fracc" required id="col-fracc" value="<?php if(isset($col_fracc)) echo $col_fracc?>">
                            <label class="label-registrarse" for="col-fracc">Col. o Fracc.</label>
                            <div class="valid-feedback text-light">Correcto.</div>
                            <div class="invalid-feedback text-light">Por favor ingresa tú colonia o fraccionamiento.</div>
                        </div> 
                        <div class="form-floating mb-4">
                            <input class="form-control form-control-registrarse" placeholder="Ciudad" list="ciudades" type="text" name="ciudad" required id="ciudad" value="<?php if(isset($ciudad)) echo $ciudad?>">
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
                            <label class="label-registrarse" for="ciudad">Ciudad</label>
                            <div class="valid-feedback text-light">Correcto.</div>
                            <div class="invalid-feedback text-light">Por favor elige tu ciudad.</div>
                        </div> 
                        <div class="form-floating mb-4">
                            <input class="form-control form-control-registrarse" placeholder="Contraseña" type="password" name="password" minlength="8" required id="password">
                            <label class="label-registrarse" for="password">Contraseña</label>
                            <div class="valid-feedback text-light">Correcto.</div>
                            <div class="invalid-feedback text-light">Por favor ingresa tú contrase{a}.</div>
                        </div>  
                    </div>
                    <div class="col-md-3">
                        <div class="form-floating mb-4">
                            <input class="form-control form-control-registrarse" placeholder="Primer apellido" pattern="[a-zA-Zá-úÁ-Ú ]+" type="text" name="ape1" required id="ape1" value="<?php if(isset($ape1)) echo $ape1?>">
                            <label class="label-registrarse" for="ape1">Primer apellido</label>
                            <div class="valid-feedback text-light">Correcto.</div>
                            <div class="invalid-feedback text-light">Por favor ingresa tú primer apellido.</div>
                        </div>
                        <div class="form-floating mb-4">
                            <input class="form-control form-control-registrarse" placeholder="Teléfono"  title="Solo números" pattern="[0-9]+" type="tel" name="telefono" required id="telefono" minlength="10" maxlength="10" value="<?php if(isset($telefono)) echo $telefono?>">
                            <label class="label-registrarse" for="telefono">Teléfono</label>
                            <div class="valid-feedback text-light">Correcto.</div>
                            <div class="invalid-feedback text-light">Por favor ingresa tú teléfono.</div>
                        </div>    
                        <div class="form-floating mb-4">
                            <input class="form-control form-control-registrarse" placeholder="Número exterior" type="text" name="numero" required id="numero" value="<?php if(isset($numero)) echo $numero?>">
                            <label class="label-registrarse" for="numero">Número exterior</label>
                            <div class="valid-feedback text-light">Correcto.</div>
                            <div class="invalid-feedback text-light">Por favor ingresa tú número exterior.</div>
                        </div>    
                        <div class="form-floating mb-4">
                            <input class="form-control form-control-registrarse" placeholder="Código Postal" type="tel" title="Solo números" maxlength="5" maxlength="5" pattern="[0-9]+" name="cp" required id="cp" value="<?php if(isset($cp)) echo $cp?>">
                            <label class="label-registrarse" for="cp">Código Postal</label>
                            <div class="valid-feedback text-light">Correcto.</div>
                            <div class="invalid-feedback text-light">Por favor ingresa tú código postal.</div>
                        </div>    
                        <div class="form-floating mb-4">
                            <input class="form-control form-control-registrarse" placeholder="Email" type="email" name="correo" required id="email" value="<?php if(isset($correo)) echo $correo?>">
                            <label class="label-registrarse" for="email">Email</label>
                            <div class="valid-feedback text-light">Correcto.</div>
                            <div class="invalid-feedback text-light">Por favor ingresa tú email.</div>
                        </div>    
                        <div class="form-floating mb-4">
                            <input class="form-control form-control-registrarse" placeholder="Confirmar contraseña" type="password" name="conf_password" minlength="8" required id="conf-password">
                            <label class="label-registrarse" for="conf-password">Confirmar contraseña</label>
                            <div class="valid-feedback text-light">Correcto.</div>
                            <div class="invalid-feedback text-light">Por favor confirma tu contraseña.</div>
                        </div>                        
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-4 mt-5 mb-5 d-grid gap-2 text-center">
                            <button type="submit" class="btn btn-dark btn-lg" onclick="registrarse()">Registrarse</button>
                        </div>
                        <div class="col-md-4 mt-5 mb-5 d-grid gap-2 text-center">
                            <a href="index.php" class="btn btn-dark btn-lg">Volver al inicio</a>
                        </div>                
                    </div>
                </form>
                <form id="form_registrarse2" class="formulario_responsive row mt-2 justify-content-center needs-validation" novalidate>
                    <div class="form-group text-center pt-4 pb-3">
                        <h1 class="titulo-login">REGISTRATE</h1>
                        <p class="parrafo-login">¿Ya tienes una cuenta? <a href="iniciar_sesion.php" class="text-light btn-link">inicia sesión</a></p>
                    </div>
                    <div class="col-12">
                        <div class="form-floating mb-4 pr-5">
                            <input class="form-control mt-5 form-control-registrarse" placeholder="Nombre(s)"  pattern="[a-zA-Zá-úÁ-Ú ]+" type="text" name="nombre" required id="nombre" value="<?php if(isset($nombre)) echo $nombre?>">
                            <label class="label-registrarse" for="nombre">Nombre(s)</label>
                            <div class="valid-feedback">Correcto.</div>
                            <div class="invalid-feedback">Por favor ingresa tú nombre.</div>
                        </div>
                        <div class="form-floating mb-4">
                            <input class="form-control form-control-registrarse" placeholder="Primer apellido" pattern="[a-zA-Zá-úÁ-Ú ]+" type="text" name="ape1" required id="ape1" value="<?php if(isset($ape1)) echo $ape1?>">
                            <label class="label-registrarse" for="ape1">Primer apellido</label>
                            <div class="valid-feedback">Correcto.</div>
                            <div class="invalid-feedback">Por favor ingresa tú primer nombre.</div>
                        </div>
                        <div class="form-floating mb-4">
                            <input class="form-control form-control-registrarse" placeholder="Segundo apellido" pattern="[a-zA-Zá-úÁ-Ú ]+" type="text" name="ape2" id="ape2" value="<?php if(isset($ape2)) echo $ape2?>">
                            <label class="label-registrarse" for="ape2">Segundo apellido</label>
                            <div class="valid-feedback">Este campo no es obligatorio.</div>
                            <div class="invalid-feedback">Por favor ingresa tú segundo apellido.</div>
                        </div>
                        <div class="form-floating mb-4">
                            <input class="form-control form-control-registrarse" placeholder="Teléfono"  title="Solo números" pattern="[0-9]+" type="tel" name="telefono" required id="telefono" minlength="10" maxlength="10" value="<?php if(isset($telefono)) echo $telefono?>">
                            <label class="label-registrarse" for="telefono">Teléfono</label>
                            <div class="valid-feedback">Correcto.</div>
                            <div class="invalid-feedback">Por favor ingresa tú teléfono.</div>
                        </div>
                        <div class="form-floating mb-4">
                            <input class="form-control form-control-registrarse" placeholder="Calle" type="text" name="calle" required id="calle" value="<?php if(isset($calle)) echo $calle?>">
                            <label class="label-registrarse" for="calle">Calle</label>
                            <div class="valid-feedback">Correcto.</div>
                            <div class="invalid-feedback">Por favor ingresa tú calle.</div>
                        </div>
                        <div class="form-floating mb-4">
                            <input class="form-control form-control-registrarse" placeholder="Número exterior" type="text" name="numero" required id="numero" value="<?php if(isset($numero)) echo $numero?>">
                            <label class="label-registrarse" for="numero">Número exterior</label>
                            <div class="valid-feedback">Correcto.</div>
                            <div class="invalid-feedback">Por favor ingresa tú número exterior.</div>
                        </div>
                        <div class="form-floating mb-4">
                            <input class="form-control form-control-registrarse" placeholder="Col. o Fracc." type="text" name="col_fracc" required id="col-fracc" value="<?php if(isset($col_fracc)) echo $col_fracc?>">
                            <label class="label-registrarse" for="col-fracc">Col. o Fracc.</label>
                            <div class="valid-feedback">Correcto.</div>
                            <div class="invalid-feedback">Por favor ingresa tú colonia o fraccionamiento.</div>
                        </div>
                        <div class="form-floating mb-4">
                            <input class="form-control form-control-registrarse" placeholder="Código Postal" type="tel" title="Solo números" maxlength="5" maxlength="5" pattern="[0-9]+" name="cp" required id="cp" value="<?php if(isset($cp)) echo $cp?>">
                            <label class="label-registrarse" for="cp">Código Postal</label>
                            <div class="valid-feedback">Correcto.</div>
                            <div class="invalid-feedback">Por favor ingresa tú código postal.</div>
                        </div>
                        <div class="form-floating mb-4">
                            <input class="form-control form-control-registrarse" placeholder="Ciudad" list="ciudades" type="text" name="ciudad" required id="ciudad" value="<?php if(isset($ciudad)) echo $ciudad?>">
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
                            <label class="label-registrarse" for="ciudad">Ciudad</label>
                            <div class="valid-feedback">Correcto.</div>
                            <div class="invalid-feedback">Por favor elige tú ciudad.</div>
                        </div>
                        <div class="form-floating mb-4">
                            <input class="form-control form-control-registrarse" placeholder="Email" type="email" name="correo" required id="email" value="<?php if(isset($correo)) echo $correo?>">
                            <label class="label-registrarse" for="email">Email</label>
                            <div class="valid-feedback">Correcto.</div>
                            <div class="invalid-feedback">Por favor ingresa tú email.</div>
                        </div> 
                        <div class="form-floating mb-4">
                            <input class="form-control form-control-registrarse" placeholder="Contraseña" type="password" name="password" minlength="8" required id="password">
                            <label class="label-registrarse" for="password">Contraseña</label>
                            <div class="valid-feedback">Correcto.</div>
                            <div class="invalid-feedback">Por favor ingresa tú contraseña.</div>
                        </div>
                        <div class="form-floating mb-4">
                            <input class="form-control form-control-registrarse" placeholder="Confirmar contraseña" type="password" name="conf_password" minlength="8" required id="conf-password">
                            <label class="label-registrarse" for="conf-password">Confirmar contraseña</label>
                            <div class="valid-feedback">Correcto.</div>
                            <div class="invalid-feedback">Por favor confirma tu contraseña.</div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="form-group mt-5 mb-3 d-grid text-center">
                            <input type="submit" class="btn ingresar mb-3" onclick="registrarse2()" value="Iniciar Sesión">
                            <a href="index.php" class="btn ingresar mb-3">Ir al inicio</a>
                        </div>             
                    </div>                     
                </form> 
            </div>
        </div>
    </div>

    <!-- Script bootstrap -->
    <?php include_once "views/script_bootstrap.php"?>
    <!-- Alertas Sweetalert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="js/sweetalert.js"></script>
    <!-- Peticiones php para registrarse -->
    <script src="js/peticiones_php.js"></script>
    <!-- Validar formulario -->
    <script src="js/validacion_formulario.js"></script>
    <!-- Transiciones -->
    <script src="js/index.js"></script>
</body>

</html>

<?php

    }

?>