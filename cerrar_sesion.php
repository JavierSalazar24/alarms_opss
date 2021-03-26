<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/favicon1.png">
    <link rel='stylesheet' href='css/estilos.css'>
    <link rel='stylesheet' href='css/estilos_responsivo.css'>
    <title>OPSS | Cerrar Sesión</title>
</head>
<body>
    

    <script src='//cdn.jsdelivr.net/npm/sweetalert2@10'></script>
    <script src='js/sweetalert.js'></script>
</body>
</html>

<?php

    // Inicializar la sesión.
    // Si está usando session_name("algo"), ¡no lo olvide ahora!
    session_start();

    // Destruir todas las variables de sesión.
    $_SESSION = array();

    // Si se desea destruir la sesión completamente, borre también la cookie de sesión.
    // Nota: ¡Esto destruirá la sesión, y no la información de la sesión!
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }

    echo "<script>
                setTimeout(cargaAlertaCerrarSesion, 500);
                function cargaAlertaCerrarSesion(){
                    AlertaCerrarSesion();
                }
            </script>";

    // Finalmente, destruir la sesión.
    session_destroy();

    echo "<script>
                setTimeout(ReedireccionLogin, 3500);
                function ReedireccionLogin(){
                    location.href = 'iniciar_sesion.php';
                }
            </script>";

?>