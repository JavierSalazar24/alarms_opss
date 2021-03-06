<?php

    session_start();
    error_reporting(0);

    require_once '../vendor/autoload.php';

    if(isset($_SESSION['admin'])){

        $id_req = $_REQUEST['id_admin'];

        $C_administradores = (new MongoDB\Client('mongodb+srv://javier:javier12345@cluster0.w3wdi.mongodb.net/opss?retryWrites=true&w=majority'))->opss->administradores; 
        $datos = $C_administradores->findOne(['_id' => new MongoDB\BSON\ObjectID($id_req)]);

            $id = $datos["_id"];
            $nombre = $datos["nombres"]["nombre"];
            $ape1 = $datos["nombres"]["ape1"];
            $ape2 = $datos["nombres"]["ape2"];
            $correo = $datos["correo"];
            $telefono = $datos["telefono"];
            $tipo_admin = $datos["tipo_admin"];

        if ($_SERVER["REQUEST_METHOD"] == "POST"){

            if(!empty($_POST['id_admin_edit'])&&!empty($_POST['nombre_edit'])&&!empty($_POST['ape1_edit'])&&!empty($_POST['correo_edit'])&&!empty($_POST['telefono_edit'])&&!empty($_POST['tipo_admin_edit'])){

                $id_edit = $_POST['id_admin_edit'];
                $nombre_edit = $_POST['nombre_edit'];
                $ape1_edit = $_POST['ape1_edit'];
                $ape2_edit = $_POST['ape2_edit'];
                $correo_edit = $_POST['correo_edit'];
                $telefono_edit = $_POST['telefono_edit'];
                $tipo_admin_edit = $_POST['tipo_admin_edit'];

                $telefono_edit_n = intval($telefono_edit);
                $tipo_admin_edit_n = intval($tipo_admin_edit);


                $edit_admin = $C_administradores -> updateOne(
                    ['_id' => new MongoDB\BSON\ObjectID($id_edit)],
                    ['$set' => ['nombres' => ['nombre' => $nombre_edit, 'ape1' => $ape1_edit, 'ape2' => $ape2_edit], 'correo' => $correo_edit, 'telefono' => $telefono_edit_n, 'tipo_admin' => $tipo_admin_edit_n]]
                );

                if ($edit_admin) {
                    echo "<script>alert('Admin actualizado con exito')</script>";
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
    <title>Editar administrador</title>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/estilos_responsivo.css">
    <link rel="shortcut icon" href="../img/favicon1.png">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@100&display=swap" rel="stylesheet">
</head>

<body class="body-agregar">
    <section id="agregar">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div id="div-ancla">
                <a href="administradores.php" class="x-ancla">
                    <h1 id="x-agregar">X</h1>
                </a>
            </div>
            <h1 class="h1-agregar">Editar admin</h1>

            <div class="div-inputs-agregar">
                <label for="nombre" id="label-agregar">Nombre</label>
                <br>
                <input class="input-agregar-form" type="hidden" name="id_admin_edit" value="<?php echo $id?>">
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
                <input class="input-agregar-form" title="Solo números" pattern="[0-9]+" type="tel" name="telefono_edit" required id="telefono" value="<?php echo $telefono;?>">
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