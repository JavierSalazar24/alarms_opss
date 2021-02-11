<?php

    session_start();

    require_once '../vendor/autoload.php';

    if(isset($_SESSION['admin'])){


        $C_administradores = (new MongoDB\Client('mongodb+srv://javier:javier12345@cluster0.w3wdi.mongodb.net/opss?retryWrites=true&w=majority'))->opss->administradores; 
        $datos = $C_administradores->find();


        foreach ($datos as $dato) { 
            $id = $dato["_id"];
            $nombre = $dato["nombre"];
            $ape1 = $dato["ape1"];
            $ape2 = $dato["ape2"];
            $correo = $dato["correo"];
            $telefono = $dato["telefono"];
            $tipo_admin = $dato["tipo_admin"];
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST"){

            if(!empty($_POST['id_admin'])&&!empty($_POST['nombre_edit'])&&!empty($_POST['ape1_edit'])&&!empty($_POST['ape2_edit'])&&!empty($_POST['correo_edit'])&&!empty($_POST['telefono_edit'])&&!empty($_POST['tipo_admin_edit'])){

                $id = $_POST['id_admin'];
                $nombre_edit = $_POST['nombre_edit'];
                $ape1_edit = $_POST['ape1_edit'];
                $ape2_edit = $_POST['ape2_edit'];
                $correo_edit = $_POST['correo_edit'];
                $telefono_edit = $_POST['telefono_edit'];
                $tipo_admin_edit = $_POST['tipo_admin_edit'];

                $edit_admin = $C_administradores -> updateOne(
                    ['_id' => new MongoDB\BSON\ObjectID($id)],
                    ['$set' => ['nombre' => $nombre_edit, 'ape1' => $ape1_edit, 'ape2' => $ape2_edit, 'correo' => $correo_edit, 'telefono' => $telefono_edit, 'tipo_admin' => $tipo_admin_edit]]
                );

                if ($edit_admin) {
                    echo "<script>alert('Admin actualizado con exito')</script>";
                    echo "<script> location.href='administradores.php' </script>";
                }



            }else{
                echo "<script>alert('Rellene todos los campos')</script>";
                echo "<script> location.href='administradores.php' </script>";
            }

        }

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar administrador</title>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/estilos_responsivo.css">
    <link rel="shortcut icon" href="../img/favicon.jpg">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@100&display=swap" rel="stylesheet">
</head>

<body class="body-agregar">
    <section id="agregar">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div id="div-ancla">
                <a href="administradores.php" class="x-ancla">
                    <h1 id="x-agregar">&times;</h1>
                </a>
            </div>
            <h1 class="h1-agregar">Editar admin</h1>

            <div class="div-inputs-agregar">
                <input type="hidden" name="id_admin" value="<?php echo $id;?>">
                <label for="nombre" id="label-agregar">Nombre</label>
                <br>
                <input class="input-agregar-form" type="text" name="nombre_edit" required id="nombre" value="<?php echo $nombre;?>">
            </div>

            <div class="div-inputs-agregar">
                <label for="ape1" id="label-agregar">Primer apellido</label>
                <br>
                <input class="input-agregar-form" type="text" name="ape1_edit" required id="ape1" value="<?php echo $ape1;?>">
            </div>

            <div class="div-inputs-agregar">
                <label for="ape2" id="label-agregar">Segundo apellido</label>
                <br>
                <input class="input-agregar-form" type="text" name="ape2_edit" required id="ape2" value="<?php echo $ape2;?>">
            </div>

            <div class="div-inputs-agregar">
                <label for="correo" id="label-agregar">Correo</label>
                <br>
                <input class="input-agregar-form" type="email" name="correo_edit" required id="correo" value="<?php echo $correo;?>">
            </div>

            <div class="div-inputs-agregar">
                <label for="telefono" id="label-agregar">Teléfono</label>
                <br>
                <input class="input-agregar-form" type="tel" name="telefono_edit" required id="telefono" value="<?php echo $telefono;?>">
            </div>

            <div class="div-inputs-agregar">
                <label for="tipo_admin" id="label-agregar">Tipo de admin</label>
                <br>
                <input class="input-agregar-form" type="number" name="tipo_admin_edit" required id="tipo_admin" min="1" max="2" value="<?php echo $tipo_admin;?>">
            </div>

            <input class="btn-input-agregar" type="submit" value="Editar admin">
        </form>
    </section>
</body>

</html>

<?php

    }elseif(isset($_SESSION['usuario'])||!isset($_SESSION['usuario'])) {

        header("Location: ../index.php");
        
    }elseif(isset($_SESSION['estandar'])) {

        header("Location: index.php");
        
    }

?>