<?php

session_start();
require_once __DIR__ . '/vendor/autoload.php';

if(isset($_SESSION['admin'])||isset($_SESSION['estandar'])){

    header("Location: control_panel/index.php");
  
}elseif(isset($_SESSION['usuario'])){

    $correo = $_SESSION['usuario'];

    $C_clientes = (new MongoDB\Client('mongodb+srv://javier:javier12345@cluster0.w3wdi.mongodb.net/opss?retryWrites=true&w=majority'))->opss->clientes; 
    $datos = $C_clientes->findOne(['correo' => $correo]);

    $nombre = $datos['nombre'];
    $ape1 = $datos['ape1'];


?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Noticias</title>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/estilos_responsivo.css">
    <script src="js/scrollreveal.js"></script>
    <link rel="shortcut icon" href="img/favicon1.png">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@100&display=swap" rel="stylesheet">
</head>

<body>
    
    <?php include "partes/_navs.php" ?>

    <section id="noticias">
        <h1 class="h1-noticias">Noticias</h1>
        <div class="div-noticias">
            <p class="p-noticias">Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae enim quis dolores
                eum! Mollitia,
                error soluta esse officiis laboriosam eum repudiandae libero, deleniti autem velit similique,
                dignissimos aliquam iste tempore. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nemo quae
                libero, vel, sit earum dignissimos ipsam asperiores cumque perspiciatis ad nam consequuntur aspernatur
                neque est incidunt? Voluptates eius sint aliquam?</p>
            <p class="p-noticias">Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae enim quis dolores
                eum! Mollitia,
                error soluta esse officiis laboriosam eum repudiandae libero, deleniti autem velit similique,
                dignissimos aliquam iste tempore. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nemo quae
                libero, vel, sit earum dignissimos ipsam asperiores cumque perspiciatis ad nam consequuntur aspernatur
                neque est incidunt? Voluptates eius sint aliquam?</p>
            <p class="p-noticias">Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae enim quis dolores
                eum! Mollitia,
                error soluta esse officiis laboriosam eum repudiandae libero, deleniti autem velit similique,
                dignissimos aliquam iste tempore. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nemo quae
                libero, vel, sit earum dignissimos ipsam asperiores cumque perspiciatis ad nam consequuntur aspernatur
                neque est incidunt? Voluptates eius sint aliquam?</p>
        </div>
    </section>

    <script src="https://kit.fontawesome.com/56b0f801ce.js" crossorigin="anonymous"></script>
    <script src="js/index.js"></script>
</body>

</html>

<?php

}elseif(!isset($_SESSION['usuario'])){

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Noticias</title>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/estilos_responsivo.css">
    <script src="js/scrollreveal.js"></script>
    <link rel="shortcut icon" href="img/favicon1.png">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@100&display=swap" rel="stylesheet">
</head>

<body>

    <?php include "partes/_nav.php" ?>

    <section id="noticias">
        <h1 class="h1-noticias">Noticias</h1>
        <div class="div-noticias">
            <p class="p-noticias">Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae enim quis dolores
                eum! Mollitia,
                error soluta esse officiis laboriosam eum repudiandae libero, deleniti autem velit similique,
                dignissimos aliquam iste tempore. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nemo quae
                libero, vel, sit earum dignissimos ipsam asperiores cumque perspiciatis ad nam consequuntur aspernatur
                neque est incidunt? Voluptates eius sint aliquam?</p>
            <p class="p-noticias">Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae enim quis dolores
                eum! Mollitia,
                error soluta esse officiis laboriosam eum repudiandae libero, deleniti autem velit similique,
                dignissimos aliquam iste tempore. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nemo quae
                libero, vel, sit earum dignissimos ipsam asperiores cumque perspiciatis ad nam consequuntur aspernatur
                neque est incidunt? Voluptates eius sint aliquam?</p>
            <p class="p-noticias">Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae enim quis dolores
                eum! Mollitia,
                error soluta esse officiis laboriosam eum repudiandae libero, deleniti autem velit similique,
                dignissimos aliquam iste tempore. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nemo quae
                libero, vel, sit earum dignissimos ipsam asperiores cumque perspiciatis ad nam consequuntur aspernatur
                neque est incidunt? Voluptates eius sint aliquam?</p>
        </div>
    </section>

    <script src="https://kit.fontawesome.com/56b0f801ce.js" crossorigin="anonymous"></script>
    <script src="js/index.js"></script>
</body>

</html>

<?php

}

?>