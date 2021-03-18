<?php

    session_start();
    require_once __DIR__ . '/vendor/autoload.php';
    error_reporting(0);

    if(isset($_SESSION['admin'])||isset($_SESSION['estandar'])){

        header("Location: control_panel/index.php");
    
    }elseif(isset($_SESSION['usuario'])){

        header("Location: index.php");
    
    }elseif(!isset($_SESSION['usuario'])){

        if ($_SERVER["REQUEST_METHOD"] == "POST"){

            if(!empty($_POST['nombre'])&&!empty($_POST['ape1'])&&!empty($_POST['correo'])&&!empty($_POST['calle'])&&!empty($_POST['numero'])&&!empty($_POST['col_fracc'])&&!empty($_POST['cp'])&&!empty($_POST['ciudad'])&&!empty($_POST['telefono'])&&!empty($_POST['password'])&&!empty($_POST['conf_password'])){

                $nombre = $_POST['nombre'];
                $ape1 = $_POST['ape1'];
                $ape2 = $_POST['ape2'];
                $calle = $_POST['calle'];
                $numero = $_POST['numero'];
                $col_fracc = $_POST['col_fracc'];
                $cp = $_POST['cp'];
                $ciudad = $_POST['ciudad'];
                $telefono = $_POST['telefono'];
                $correo = $_POST['correo'];
                $contrasena = MD5($_POST['password']);
                $concontrasena = MD5($_POST['conf_password']);

                $numero_n = intval($numero);
                $cp_n = intval($cp);
                $telefono_n = intval($telefono);

                if ($contrasena == $concontrasena) {

                    $C_clientes = (new MongoDB\Client('mongodb+srv://javier:javier12345@cluster0.w3wdi.mongodb.net/opss?retryWrites=true&w=majority'))->opss->clientes; 
                    $C_admins = (new MongoDB\Client('mongodb+srv://javier:javier12345@cluster0.w3wdi.mongodb.net/opss?retryWrites=true&w=majority'))->opss->administradores; 

                    $correo_busq_a = $C_admins->findOne(['correo' => $correo]);
                    $correo_busq_c = $C_clientes->findOne(['correo' => $correo]);
                    
                    if($correo_busq_a > 0 || $correo_busq_c >0){
        
                        echo "<script>alert('El correo ya existe')</script>";

                    }else{

                        $insert = $C_clientes->insertOne([
                            'nombres' => [
                            'nombre' => $nombre,
                            'ape1' => $ape1,
                            'ape2' => $ape2
                            ],
                            'direccion' => [
                            'calle' => $calle,
                            'numero' => $numero_n,
                            'col_fracc' => $col_fracc,
                            'cp' => $cp_n,
                            'cp' => $ciudad
                            ],
                            'telefono' => $telefono_n,
                            'correo' => $correo,
                            'contrasena' => $contrasena,
                        ]);

                        $_SESSION['usuario']=$correo;

                        echo "<script>alert('Usuario agregado')</script>";
                        echo "<script> location.href='index.php' </script>";

                    }

                }else{
                    echo "<script>alert('Las contraseñas no coinciden')</script>";
                }
            }else{
                echo "<script>alert('Ingrese todos los campo')</script>";
            }
        }


?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/estilos_responsivo.css">
    <script src="js/scrollreveal.js"></script>
    <link rel="shortcut icon" href="img/favicon1.png">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@100&display=swap" rel="stylesheet">
</head>

<body class="body-registrar">
    <section id="registrarse">
        <div class="div-registrarse">
            <a href="index.php" class="x-ancla">
                <span id="x-login">X</span>
            </a>
            <h1 class="h1-login h1-registrarse">Regístrate</h1>
            <h4 class="h4-p">¿Ya tienes una cuenta? 
                <a class="ancla-registrarse-login" href="iniciar_sesion.php">Iniciar sesión</a>
            </h4>
        </div>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">

            <div class="div-inputs-registrar-gnrl">
                <div class="div-inputs-registrar">
                    <div class="div-inputs-registrar2">
                        <label for="nombre" id="label-registrar">Nombre(s)</label>
                    </div>
                    <input class="input-registrar-form" pattern="[a-zA-Zá-úÁ-Ú ]+" type="text" name="nombre" required id="nombre" value="<?php if(isset($nombre)) echo $nombre?>">
                </div>
                
                <div class="div-inputs-registrar">
                    <div class="div-inputs-registrar2">
                        <label for="ape1" id="label-registrar">Primer apellido</label>
                    </div>
                    <input class="input-registrar-form" pattern="[a-zA-Zá-úÁ-Ú ]+" type="text" name="ape1" required id="ape1" value="<?php if(isset($ape1)) echo $ape1?>">                    
                </div>

                <div class="div-inputs-registrar">
                    <div class="div-inputs-registrar2">
                        <label for="ape2" id="label-registrar">Segundo apellido</label>
                    </div>
                    <input class="input-registrar-form" pattern="[a-zA-Zá-úÁ-Ú ]+" type="text" name="ape2" id="ape2" value="<?php if(isset($ape2)) echo $ape2?>">
                </div>

                <div class="div-inputs-registrar">
                    <div class="div-inputs-registrar2">
                        <label for="telefono" id="label-registrar">Teléfono</label>
                    </div>
                    <input class="input-registrar-form" title="Solo números" pattern="[0-9]+" type="tel" name="telefono" required id="telefono" minlength="10" maxlength="10" value="<?php if(isset($telefono)) echo $telefono?>">
                </div>

                <div class="div-inputs-registrar">
                    <div class="div-inputs-registrar2">
                        <label for="calle" id="label-registrar">Calle</label>
                    </div>
                    <input class="input-registrar-form" type="text" name="calle" required id="calle" value="<?php if(isset($calle)) echo $calle?>">
                </div>

                <div class="div-inputs-registrar">
                    <div class="div-inputs-registrar2">
                        <label for="numero" id="label-registrar">Número exterior</label>
                    </div>
                    <input class="input-registrar-form" type="text" name="numero" required id="numero" value="<?php if(isset($numero)) echo $numero?>">
                </div>

                <div class="div-inputs-registrar">
                    <div class="div-inputs-registrar2">
                        <label for="col-fracc" id="label-registrar">Col. o Fracc.</label>
                    </div>
                    <input class="input-registrar-form" type="text" name="col_fracc" required id="col-fracc" value="<?php if(isset($col_fracc)) echo $col_fracc?>">
                </div>

                <div class="div-inputs-registrar">
                    <div class="div-inputs-registrar2">
                        <label for="cp" id="label-registrar">Código Postal</label>
                    </div>                    
                    <input class="input-registrar-form" type="tel" title="Solo números" maxlength="5" pattern="[0-9]+" name="cp" required id="cp" value="<?php if(isset($cp)) echo $cp?>">
                </div>

                <div class="div-inputs-registrar">
                    <div class="div-inputs-registrar2">
                        <label for="ciudad" id="label-registrar">Ciudad</label>
                    </div>        
                    <input list="ciudades" class="input-registrar-form" type="text" name="ciudad" required id="ciudad" value="<?php if(isset($ciudad)) echo $ciudad?>">
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

                <div class="div-inputs-registrar">
                    <div class="div-inputs-registrar2"> 
                        <label for="email" id="label-registrar">Email</label>
                    </div>
                    <input class="input-registrar-form" type="email" name="correo" required id="email" value="<?php if(isset($correo)) echo $correo?>">
                </div>

                <div class="div-inputs-registrar">
                    <div class="div-inputs-registrar2">
                        <label for="password" id="label-registrar">Contraseña</label>
                    </div>
                    <input class="input-registrar-form" type="password" name="password" minlength="8" required id="password">
                </div>

                <div class="div-inputs-registrar">
                    <div class="div-inputs-registrar2">
                        <label for="conf-password" id="label-registrar">Confirmar contraseña</label>
                    </div>
                    <input class="input-registrar-form" type="password" name="conf_password" minlength="8" required id="conf-password">
                </div>

            </div>

                <input class="btn-input-registrar" type="submit" value="Regístrate">

        </form>
    </section>
    
    <script src="js/index.js"></script>
</body>

</html>

<?php

    }

?>