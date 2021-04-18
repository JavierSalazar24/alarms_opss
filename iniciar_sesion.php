
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
    <title>Iniciar Sesión | OPSS</title>
</head>

<body class="body-login">
    <div id="iniciar-sesion" class="container">
        <div class="row justify-content-center pt-4 mt-3 pb-4 mb-3 m-1">
            <div class="col-12 col-md-6 formulario_login">
                <form id="form_login" class="needs-validation" novalidate>
                    <div class="form-group text-center pt-4 pb-5">                       
                        <h1 class="titulo-login">INICIAR SESIÓN</h1>
                        <p class="parrafo-login">¿Eres nuevo en este sitio? <a href="registrarse.php" class="text-light btn-link">registrate</a>.<span>&#160</span></p>
                    </div>
                    <div class="form-floating form-group mx-sm-4 mt-4 mb-5">
                        <input class="form-control form-control_login" placeholder="Email" type="email" name="correo" required id="email" value="<?php if(isset($correo)) echo $correo?>">
                        <label class="label_login" for="email">Email</label>
                        <div class="valid-feedback text-white">Correcto.</div>
						<div class="invalid-feedback text-white">Por favor ingresa tú email.</div>
                    </div>
                    <div class="form-floating form-group mx-sm-4 mt-3 pb-1">
                        <input class="form-control form-control_login" placeholder="Contraseña" type="password" name="contrasena" minlength="8" required id="password">
                        <label class="label_login" for="password">Contraseña</label>
                        <div class="valid-feedback text-white">Correcto.</div>
						<div class="invalid-feedback text-white">Por favor ingresa tú contraseña.</div>
                    </div>
                    <div class="form-group mt-5 mb-3 text-center">
                        <input type="submit" class="btn ingresar mb-3" onclick="iniciarSesion()" value="Iniciar Sesión">
                        <a href="index.php" class="btn ingresar mb-3">Volver al inicio</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Font Awesome  -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <!-- Script bootstrap -->
    <?php include_once "views/script_bootstrap.php"?>
    <!-- Alertas Sweetalert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="js/sweetalert.js"></script>
    <!-- Peticiones php para iniciar sesion -->
    <script src="js/peticiones_php.js"></script>
    <!-- Validar formulario -->
    <script src="js/validacion_formulario.js"></script>
    <!-- Transiciones -->
    <script src="js/index.js"></script>
</body>

</html>