<?php

    session_start();

    require_once '../vendor/autoload.php';

    if(isset($_SESSION['admin'])){


        if ($_SERVER["REQUEST_METHOD"] == "POST"){

            if(!empty($_POST['nombre'])&&!empty($_POST['ape1'])&&!empty($_POST['ape2'])&&!empty($_POST['correo'])&&!empty($_POST['telefono'])&&!empty($_POST['contrasena'])&&!empty($_POST['tipo_admin'])){


                $nombre = $_POST['nombre'];
                $ape1 = $_POST['ape1'];
                $ape2 = $_POST['ape2'];
                $correo = $_POST['correo'];
                $telefono = $_POST['telefono'];
                $contrasena = MD5($_POST['contrasena']);
                $tipo_admin = $_POST['tipo_admin'];

                $C_administradores = (new MongoDB\Client('mongodb+srv://javier:javier12345@cluster0.w3wdi.mongodb.net/opss?retryWrites=true&w=majority'))->opss->administradores; 

                $insert = $C_administradores->insertOne([
                    'nombre' => $nombre,
                    'ape1' => $ape1,
                    'ape2' => $ape2,
                    'telefono' => $telefono,
                    'correo' => $correo,
                    'contrasena' => $contrasena,
                    'tipo_admin' => $tipo_admin
                ]);

                if ($insert) {
                    echo "<script>alert('Admin agregado')</script>";
                    echo "<script> location.href='administradores.php' </script>";
                }
            }else{
                echo "<script>alert('Rellene todos los campos')</script>";
            }
        }

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar administradores</title>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/estilos_responsivo.css">
    <link rel="shortcut icon" href="../img/favicon.jpg">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@100&display=swap" rel="stylesheet">
</head>

<body class="body-agregar">
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <section id="agregar">
            <a href="administradores.php" class="x-ancla">
                <h1 id="x-agregar">X</h1>
            </a>
            <h1 class="h1-agregar">Agregar admin</h1>
            <div class="div-inputs-agregar">
                <label for="nombre" id="label-agregar">Nombre</label>
                <br>
                <input class="input-agregar-form" pattern="[a-zA-Zá-úÁ-Ú ]+" type="text" name="nombre" required id="nombre" value="<?php if(isset($nombre)) echo $nombre?>">
            </div>
            <div class="div-inputs-agregar">
                <label for="ape1" id="label-agregar">Primer apellido</label>
                <br>
                <input class="input-agregar-form" pattern="[a-zA-Zá-úÁ-Ú ]+" type="text" name="ape1" required id="ape1" value="<?php if(isset($ape1)) echo $ape1?>">
            </div>
            <div class="div-inputs-agregar">
                <label for="ape2" id="label-agregar">Segundo apellido</label>
                <br>
                <input class="input-agregar-form" pattern="[a-zA-Zá-úÁ-Ú ]+" type="text" name="ape2" required id="ape2" value="<?php if(isset($ape2)) echo $ape2?>">
            </div>
            <div class="div-inputs-agregar">
                <label for="telefono" id="label-agregar">Teléfono</label>
                <br>
                <input class="input-agregar-form" title="Solo números" pattern="[0-9]+" type="tel" name="telefono" required id="telefono" value="<?php if(isset($telefono)) echo $telefono?>">
            </div>
            <div class="div-inputs-agregar">
                <label for="email" id="label-agregar">Email</label>
                <br>
                <input class="input-agregar-form" type="email" name="correo" required id="email" value="<?php if(isset($correo)) echo $correo?>">
            </div>
            <div class="div-inputs-agregar">
                <label for="password" id="label-agregar">Contraseña</label>
                <br>
                <input class="input-agregar-form" type="password" name="contrasena" required id="password" minlength="8">
            </div>
            <div class="div-inputs-agregar">
                <label for="tipo_admin" id="label-agregar">Tipo de admin</label>
                <br>
                <input class="input-agregar-form" type="number" name="tipo_admin" required id="tipo_admin" min="1" max="2" value="1">
            </div>
            <input class="btn-input-agregar" type="submit" value="Agregar admin">
        </section>
    </form>
</body>

</html>

<?php

    }elseif(isset($_SESSION['usuario'])||!isset($_SESSION['usuario'])) {

        header("Location: ../index.php");
        
    }elseif(isset($_SESSION['estandar'])) {

        header("Location: index.php");
        
    }

?>