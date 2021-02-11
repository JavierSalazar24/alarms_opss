<?php

    session_start();

    require_once 'vendor/autoload.php';
    

    if(isset($_SESSION['admin'])||isset($_SESSION['estandar'])){

        header("Location: control_panel/index.php");
    
    }elseif(isset($_SESSION['usuario'])){

        header("Location: index.php");
    
    }elseif(!isset($_SESSION['usuario'])){

        if ($_SERVER["REQUEST_METHOD"] == "POST"){


            $C_clientes = (new MongoDB\Client('mongodb+srv://javier:javier12345@cluster0.w3wdi.mongodb.net/opss?retryWrites=true&w=majority'))->opss->clientes; 
            $C_admins = (new MongoDB\Client('mongodb+srv://javier:javier12345@cluster0.w3wdi.mongodb.net/opss?retryWrites=true&w=majority'))->opss->administradores; 

            if(!empty($_POST['correo'])&&!empty($_POST['contrasena'])){

                $correo = $_POST['correo'];
                $contrasena = MD5($_POST['contrasena']);

                $correo_busq = $C_clientes->findOne(['correo' => $correo]);
                $contrasena_busq = $C_clientes->findOne(['contrasena' => $contrasena]);


                $correo_busq_admin = $C_admins->findOne(['correo' => $correo]);
                $contrasena_busq_admin = $C_admins->findOne(['contrasena' => $contrasena]);

                
                if ($correo_busq==null && $contrasena_busq==null && $correo_busq_admin==null && $contrasena_busq_admin==null) {
                    echo "<script>alert('Usuario o contraseña incorrectos')</script>";
                }elseif ($correo_busq!=null && $contrasena_busq!=null) {
                    $datos = $C_clientes->find();
                    foreach ($datos as $dato){
                        $nombre = $dato['nombre'];
                        $ape1 = $dato['ape1'];
                    }
                    echo "<script>alert('Bienvenid@ cliente $nombre $ape1 ')</script>";
                    echo "<script> location.href='index.php' </script>";
                    $_SESSION['usuario']=$correo;
                }elseif($correo_busq_admin!=null && $contrasena_busq_admin!=null){
                    $datos = $C_admins->find();
                    foreach ($datos as $dato){
                        $nombre = $dato['nombre'];
                        $ape1 = $dato['ape1'];
                    }

                    if ($dato['tipo_admin']=='1' || $dato['tipo_admin']==1) {
                        $_SESSION['admin']=$correo;
                    }elseif($dato['tipo_admin']=='2' || $dato['tipo_admin']==2){
                        $_SESSION['estandar']=$correo;
                    }
                    echo "<script>alert('Bienvenid@ admin $nombre $ape1 ')</script>";
                    echo "<script> location.href='control_panel/index.php' </script>";
                }elseif ($correo_busq==null || $contrasena_busq==null || $correo_busq_admin==null || $contrasena_busq_admin==null) {
                    echo "<script>alert('Usuario o contraseña incorrectos')</script>";
                }
            
            }
        }

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/estilos_responsivo.css">
    <script src="js/scrollreveal.js"></script>
    <link rel="shortcut icon" href="img/favicon.jpg">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@100&display=swap" rel="stylesheet">
</head>

<body class="body-login">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <section id="iniciar-sesion">
            <a href="index.php" class="x-ancla">
                <h1 id="x-login">X</h1>
            </a>
            <h1 class="h1-login">Iniciar sesión</h1>
            <h4 class="h4-p">¿Eres nuevo en este sitio? <a class="ancla-registrarse-login"
                    href="registrarse.php">Regístrate</a></h4>

            <div class="div-inputs-login">
                <label for="email" id="label-login">Email</label>
                <br>
                <input class="input-login-form" type="email" name="correo" required id="email" value="<?php if(isset($correo)) echo $correo?>">
            </div>
            <br>
            <div class="div-inputs-login">
                <label for="password" id="label-login">Contraseña</label>
                <br>
                <input class="input-login-form" type="password" name="contrasena" required id="password" minlength="8">
            </div>
            <br>
            <input class="btn-input-login" type="submit" value="Iniciar Sesión">
        </section>
    </form>

    <script src="js/index.js"></script>
</body>

</html>

<?php

    }

?>