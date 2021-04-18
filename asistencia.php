<?php

    session_start();
    require_once __DIR__ . '/vendor/autoload.php';

    if(isset($_SESSION['admin'])||isset($_SESSION['estandar'])){

        header("Location: control_panel/index.php");
    
    }elseif(isset($_SESSION['usuario'])){

        $correo = $_SESSION['usuario'];

        $C_clientes = (new MongoDB\Client('mongodb+srv://javier:javier12345@cluster0.w3wdi.mongodb.net/opss?retryWrites=true&w=majority'))->opss->clientes; 
        $datos = $C_clientes->findOne(['correo' => $correo]);
        
        $nombre = $datos['nombres']['nombre'];
        $ape1 = $datos['nombres']['ape1'];


?>


<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/favicon1.png">
	<!-- Transiciones -->
    <script src="js/scrollreveal.js"></script>
	<!-- Estilos -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/estilos_responsivo.css">
    <link rel="stylesheet" href="css/estilos_asistencia.css">
	<link rel="stylesheet" href="assets/future/css/main.css" />
	<title>Asistencia | OPSS</title>
	<style>
		.enlace_asistencia{
			text-decoration: underline !important;
		}
	</style>	
</head>

<body>

	<?php include "partes/_navs.php" ?>
	
	<div class="container">
		<div class="row justify-content-center">
			<div id="asistencia-preguntas" class="col-12">
				<main class="pb-5">
					<h1 class="titulo">Preguntas Frecuentes</h1>
					<div class="categorias" id="categorias">
						<div class="categoria activa" data-categoria="metodos-pago">
							<svg viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd"><path d="M21.19 7h2.81v15h-21v-5h-2.81v-15h21v5zm1.81 1h-19v13h19v-13zm-9.5 1c3.036 0 5.5 2.464 5.5 5.5s-2.464 5.5-5.5 5.5-5.5-2.464-5.5-5.5 2.464-5.5 5.5-5.5zm0 1c2.484 0 4.5 2.016 4.5 4.5s-2.016 4.5-4.5 4.5-4.5-2.016-4.5-4.5 2.016-4.5 4.5-4.5zm.5 8h-1v-.804c-.767-.16-1.478-.689-1.478-1.704h1.022c0 .591.326.886.978.886.817 0 1.327-.915-.167-1.439-.768-.27-1.68-.676-1.68-1.693 0-.796.573-1.297 1.325-1.448v-.798h1v.806c.704.161 1.313.673 1.313 1.598h-1.018c0-.788-.727-.776-.815-.776-.55 0-.787.291-.787.622 0 .247.134.497.957.768 1.056.344 1.663.845 1.663 1.746 0 .651-.376 1.288-1.313 1.448v.788zm6.19-11v-4h-19v13h1.81v-9h17.19z"/></svg>
							<p>Métodos de pago</p>
						</div>
						<div class="categoria" data-categoria="entregas">
							<svg viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd"><path d="M7 24h-5v-9h5v1.735c.638-.198 1.322-.495 1.765-.689.642-.28 1.259-.417 1.887-.417 1.214 0 2.205.499 4.303 1.205.64.214 1.076.716 1.175 1.306 1.124-.863 2.92-2.257 2.937-2.27.357-.284.773-.434 1.2-.434.952 0 1.751.763 1.751 1.708 0 .49-.219.977-.627 1.356-1.378 1.28-2.445 2.233-3.387 3.074-.56.501-1.066.952-1.548 1.393-.749.687-1.518 1.006-2.421 1.006-.405 0-.832-.065-1.308-.2-2.773-.783-4.484-1.036-5.727-1.105v1.332zm-1-8h-3v7h3v-7zm1 5.664c2.092.118 4.405.696 5.999 1.147.817.231 1.761.354 2.782-.581 1.279-1.172 2.722-2.413 4.929-4.463.824-.765-.178-1.783-1.022-1.113 0 0-2.961 2.299-3.689 2.843-.379.285-.695.519-1.148.519-.107 0-.223-.013-.349-.042-.655-.151-1.883-.425-2.755-.701-.575-.183-.371-.993.268-.858.447.093 1.594.35 2.201.52 1.017.281 1.276-.867.422-1.152-.562-.19-.537-.198-1.889-.665-1.301-.451-2.214-.753-3.585-.156-.639.278-1.432.616-2.164.814v3.888zm3.79-19.913l3.21-1.751 7 3.86v7.677l-7 3.735-7-3.735v-7.719l3.784-2.064.002-.005.004.002zm2.71 6.015l-5.5-2.864v6.035l5.5 2.935v-6.106zm1 .001v6.105l5.5-2.935v-6l-5.5 2.83zm1.77-2.035l-5.47-2.848-2.202 1.202 5.404 2.813 2.268-1.167zm-4.412-3.425l5.501 2.864 2.042-1.051-5.404-2.979-2.139 1.166z"/></svg>
							<p>Entregas</p>
						</div>
						<div class="categoria" data-categoria="seguridad">
							<svg viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd"><path d="M12 0c-3.371 2.866-5.484 3-9 3v11.535c0 4.603 3.203 5.804 9 9.465 5.797-3.661 9-4.862 9-9.465v-11.535c-3.516 0-5.629-.134-9-3zm0 1.292c2.942 2.31 5.12 2.655 8 2.701v10.542c0 3.891-2.638 4.943-8 8.284-5.375-3.35-8-4.414-8-8.284v-10.542c2.88-.046 5.058-.391 8-2.701zm5 7.739l-5.992 6.623-3.672-3.931.701-.683 3.008 3.184 5.227-5.878.728.685z"/></svg>
							<p>Seguridad</p>
						</div>
						<div class="categoria" data-categoria="cuenta">
							<svg viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd"><path d="M9.484 15.696l-.711-.696-2.552 2.607-1.539-1.452-.698.709 2.25 2.136 3.25-3.304zm0-5l-.711-.696-2.552 2.607-1.539-1.452-.698.709 2.25 2.136 3.25-3.304zm0-5l-.711-.696-2.552 2.607-1.539-1.452-.698.709 2.25 2.136 3.25-3.304zm10.516 11.304h-8v1h8v-1zm0-5h-8v1h8v-1zm0-5h-8v1h8v-1zm4-5h-24v20h24v-20zm-1 19h-22v-18h22v18z"/></svg>
							<p>Cuenta</p>
						</div>
					</div>
					
					<!-- Preguntas -->
					<div class="preguntas">
						<!-- Preguntas Metodos de pago -->
						<div class="contenedor-preguntas activo" data-categoria="metodos-pago">
							<div class="contenedor-pregunta">
								<p class="pregunta">¿Que métodos de pago disponibles tienen? <img src="./img/suma.svg" alt="Abrir Respuesta" /></p>
								<p class="respuesta">Somos un negocio pequeño que acaba de comenzar, entoces por el momento contamos solo con pagos por medio de paypal. En un futuro agregaremos más métodos de pago y ustedes serán los primeros en saberlo.</p>
							</div>
							<div class="contenedor-pregunta">
								<p class="pregunta">¿Tienen plazo de pago? <img src="./img/suma.svg" alt="Abrir Respuesta" /></p>
								<p class="respuesta">Si, ya que los pagos son por medio de paypal, el usuario puede configurar su paypal para que los pagos sean según el tiempo que él desee.</p>
							</div>
						</div>
						<!-- Preguntas Entregas -->
						<div class="contenedor-preguntas" data-categoria="entregas">
							<div class="contenedor-pregunta">
								<p class="pregunta">¿Tienen entregas a domicilio? <img src="./img/suma.svg" alt="Abrir Respuesta" /></p>
								<p class="respuesta">Si, solo tenemos envÍos a domicilio porque no contamos con una tienda física. Usted nos compra el producto y nosotros nos encargamos en mandar el producto hasta la puerta de su casa sin ningun costo extra, ya que ya viene agregado en el precio de la mercancia comprada.</p>
							</div>
							<div class="contenedor-pregunta">
								<p class="pregunta">¿Tienen envíos a todo el mundo? <img src="./img/suma.svg" alt="Abrir Respuesta" /></p>
								<p class="respuesta">No, solo contamos con envíos a toda la Repúlica Mexicana. El costo de envío a tu ciudad es totalmente gratis, puedes comprar desde <a class="enlace_asistencia" href="productos.php">aquí</a>.</p>
							</div>
						</div>
						<!-- Preguntas Seguridad -->
						<div class="contenedor-preguntas" data-categoria="seguridad">
							<div class="contenedor-pregunta">
								<p class="pregunta">¿Como puedo saber si son confiables? <img src="./img/suma.svg" alt="Abrir Respuesta" /></p>
								<p class="respuesta">Contamos con certificado web SSL que Google nos certifica como sitio web confiable y seguro para realizar compras online.</p>
							</div>
							<div class="contenedor-pregunta">
								<p class="pregunta">¿Que pasa con mis datos personales? <img src="./img/suma.svg" alt="Abrir Respuesta" /></p>
								<p class="respuesta">Tus datos personales son guardados y almacenados en nuestra Base de Datos para porderte mandar los productos que compras, pero ese es solo su uso, sientete seguro de poner la dirección que tu quieras para mandarte el producto comprado ahí.</p>
							</div>
						</div>
						<!-- Preguntas Cuenta -->
						<div class="contenedor-preguntas" data-categoria="cuenta">
							<div class="contenedor-pregunta">
								<p class="pregunta">¿Como puedo acceder a mis pedidos? <img src="./img/suma.svg" alt="Abrir Respuesta" /></p>
								<p class="respuesta">Primeramente necesitas crear una cuenta para que puedas encontrar tus pedidos, ya con una cuenta creada puedes acceder desde <a class="enlace_asistencia" href="mis_pedidos.php">aquí</a>.</p>
							</div>
							<div class="contenedor-pregunta">
								<p class="pregunta">¿Como puedo revisar el estatus de mi alarma comprada? <img src="./img/suma.svg" alt="Abrir Respuesta" /></p>
								<p class="respuesta">Primeramente necesitas crear una cuenta para que puedas encontrar el estatus de tus alarmas, ya con una cuenta creada puedes acceder desde <a class="enlace_asistencia" href="alarmas.php">aquí</a>.</p>
							</div>
							<div class="contenedor-pregunta">
								<p class="pregunta">¿Como puedo manipular mi alarma comprada? <img src="./img/suma.svg" alt="Abrir Respuesta" /></p>
								<p class="respuesta">Para manipular tu alarma necesitas <a class="enlace_asistencia" href="#">descargar</a> nuestra aplicación, ya con la aplicación necesitas crear una cuenta de usuario en este <a class="enlace_asistencia" href="registrarse.php">sitio</a> y así podras usar tu alarma sin ningun problema.</p>
							</div>
							<div class="contenedor-pregunta">
								<p class="pregunta">¿Puedo comprar sin cuenta? <img src="./img/suma.svg" alt="Abrir Respuesta" /></p>
								<p class="respuesta">No, necesitas una cuenta obligatoriamente para poder comprar cualquier producto, ya que para programar tu alarma usamos tu correo electronico, con el fin de que haya más seguridad en el sistema de tu alarma.</p>
							</div>
						</div>
					</div>
				</main>
				<hr class="mt-5 bg-gray">
			</div>

			<!-- Formulario -->
			<div id="asistencia-inputs" class="col-12 col-md-6 mt-5">
				<h2 class="text-center">PONTE EN CONTÁCTO</h2>
				<form id="input_mensaje" class="row justify-content-center g-3 needs-validation mt-5" novalidate>
					<div class="col-12 mb-3">
						<label for="nombre" class="form-label">Tú nombre:</label>
						<input class="form-control" id="nombre" type="text" pattern="[a-zA-Zá-úÁ-Ú ]+" name="nombre" placeholder="Nombre" required>
						<div class="valid-feedback">Correcto.</div>
						<div class="invalid-feedback">Por favor ingresa tu nombre.</div>
					</div>
					<div class="col-12 mb-3">
						<label for="email" class="form-label">Tú email:</label>					
						<input class="form-control" type="email" id="email" name="email" placeholder="Email" required>
						<div class="valid-feedback">Correcto.</div>
						<div class="invalid-feedback">Por favor ingresa tu email.</div>
					</div>
					<div class="col-12 mb-4">
						<label for="mensaje" class="form-label">Tú mensaje o duda:</label>					
						<textarea class="form-control" id="mensaje" name="mensaje" placeholder="Escribe tu mensaje aquí..." autocomplete="off" required></textarea>
						<div class="valid-feedback">Correcto.</div>
						<div class="invalid-feedback">Por favor ingresa un mensaje.</div>
					</div>
					<div class="col-12 text-center mb-5">
						<button class="btn btn-dark btn-block btn-lg" type="submit" onclick="enviarMensaje()">Enviar mensaje</button>
					</div>
				</form>
			</div>
		</div>
	</div>	

	<!-- Transiciones -->
    <script src="js/index.js"></script>
	<!-- Estilos Script -->
	<script src="https://kit.fontawesome.com/56b0f801ce.js" crossorigin="anonymous"></script>
    <?php include_once "views/script_bootstrap.php"?>
    <?php include_once "views/script_future.php"?>
	<script src="js/asistencia.js"></script>
	<!-- SweetAlert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="js/sweetalert.js"></script>
	<!-- Programación para php y validar formulario -->
    <script src="js/peticiones_php.js"></script>
	<script src="js/validacion_formulario.js"></script>
	<!-- LINK ACTIVADO -->
    <script>
        const currentLocation = location.href;
        const menuItem = document.querySelectorAll("a");
        const menuLength = menuItem.length;
        for (let i = 0; i < menuLength; i++) {
        if (menuItem[i].href === currentLocation) menuItem[i].className = "active";
        }
    </script>
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
    <link rel="shortcut icon" href="img/favicon1.png">
	<!-- Transiciones -->
    <script src="js/scrollreveal.js"></script>
    <!-- Estilos -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/estilos_responsivo.css">
    <link rel="stylesheet" href="css/estilos_asistencia.css">
	<link rel="stylesheet" href="assets/future/css/main.css" />
	<title>Asistencia | OPSS</title>
	<style>
		.enlace_asistencia{
			text-decoration: underline !important;
		}
	</style>
</head>

<body>

	<?php include "partes/_nav.php" ?>
	
	<div class="container">
		<div class="row justify-content-center">
			<div id="asistencia-preguntas" class="col-12">
				<main class="pb-5">
					<h1 class="titulo">Preguntas Frecuentes</h1>
					<div class="categorias" id="categorias">
						<div class="categoria activa" data-categoria="metodos-pago">
							<svg viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd"><path d="M21.19 7h2.81v15h-21v-5h-2.81v-15h21v5zm1.81 1h-19v13h19v-13zm-9.5 1c3.036 0 5.5 2.464 5.5 5.5s-2.464 5.5-5.5 5.5-5.5-2.464-5.5-5.5 2.464-5.5 5.5-5.5zm0 1c2.484 0 4.5 2.016 4.5 4.5s-2.016 4.5-4.5 4.5-4.5-2.016-4.5-4.5 2.016-4.5 4.5-4.5zm.5 8h-1v-.804c-.767-.16-1.478-.689-1.478-1.704h1.022c0 .591.326.886.978.886.817 0 1.327-.915-.167-1.439-.768-.27-1.68-.676-1.68-1.693 0-.796.573-1.297 1.325-1.448v-.798h1v.806c.704.161 1.313.673 1.313 1.598h-1.018c0-.788-.727-.776-.815-.776-.55 0-.787.291-.787.622 0 .247.134.497.957.768 1.056.344 1.663.845 1.663 1.746 0 .651-.376 1.288-1.313 1.448v.788zm6.19-11v-4h-19v13h1.81v-9h17.19z"/></svg>
							<p>Métodos de pago</p>
						</div>
						<div class="categoria" data-categoria="entregas">
							<svg viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd"><path d="M7 24h-5v-9h5v1.735c.638-.198 1.322-.495 1.765-.689.642-.28 1.259-.417 1.887-.417 1.214 0 2.205.499 4.303 1.205.64.214 1.076.716 1.175 1.306 1.124-.863 2.92-2.257 2.937-2.27.357-.284.773-.434 1.2-.434.952 0 1.751.763 1.751 1.708 0 .49-.219.977-.627 1.356-1.378 1.28-2.445 2.233-3.387 3.074-.56.501-1.066.952-1.548 1.393-.749.687-1.518 1.006-2.421 1.006-.405 0-.832-.065-1.308-.2-2.773-.783-4.484-1.036-5.727-1.105v1.332zm-1-8h-3v7h3v-7zm1 5.664c2.092.118 4.405.696 5.999 1.147.817.231 1.761.354 2.782-.581 1.279-1.172 2.722-2.413 4.929-4.463.824-.765-.178-1.783-1.022-1.113 0 0-2.961 2.299-3.689 2.843-.379.285-.695.519-1.148.519-.107 0-.223-.013-.349-.042-.655-.151-1.883-.425-2.755-.701-.575-.183-.371-.993.268-.858.447.093 1.594.35 2.201.52 1.017.281 1.276-.867.422-1.152-.562-.19-.537-.198-1.889-.665-1.301-.451-2.214-.753-3.585-.156-.639.278-1.432.616-2.164.814v3.888zm3.79-19.913l3.21-1.751 7 3.86v7.677l-7 3.735-7-3.735v-7.719l3.784-2.064.002-.005.004.002zm2.71 6.015l-5.5-2.864v6.035l5.5 2.935v-6.106zm1 .001v6.105l5.5-2.935v-6l-5.5 2.83zm1.77-2.035l-5.47-2.848-2.202 1.202 5.404 2.813 2.268-1.167zm-4.412-3.425l5.501 2.864 2.042-1.051-5.404-2.979-2.139 1.166z"/></svg>
							<p>Entregas</p>
						</div>
						<div class="categoria" data-categoria="seguridad">
							<svg viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd"><path d="M12 0c-3.371 2.866-5.484 3-9 3v11.535c0 4.603 3.203 5.804 9 9.465 5.797-3.661 9-4.862 9-9.465v-11.535c-3.516 0-5.629-.134-9-3zm0 1.292c2.942 2.31 5.12 2.655 8 2.701v10.542c0 3.891-2.638 4.943-8 8.284-5.375-3.35-8-4.414-8-8.284v-10.542c2.88-.046 5.058-.391 8-2.701zm5 7.739l-5.992 6.623-3.672-3.931.701-.683 3.008 3.184 5.227-5.878.728.685z"/></svg>
							<p>Seguridad</p>
						</div>
						<div class="categoria" data-categoria="cuenta">
							<svg viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd"><path d="M9.484 15.696l-.711-.696-2.552 2.607-1.539-1.452-.698.709 2.25 2.136 3.25-3.304zm0-5l-.711-.696-2.552 2.607-1.539-1.452-.698.709 2.25 2.136 3.25-3.304zm0-5l-.711-.696-2.552 2.607-1.539-1.452-.698.709 2.25 2.136 3.25-3.304zm10.516 11.304h-8v1h8v-1zm0-5h-8v1h8v-1zm0-5h-8v1h8v-1zm4-5h-24v20h24v-20zm-1 19h-22v-18h22v18z"/></svg>
							<p>Cuenta</p>
						</div>
					</div>

					<!-- Preguntas -->
					<div class="preguntas">
						<!-- Preguntas Metodos de pago -->
						<div class="contenedor-preguntas activo" data-categoria="metodos-pago">
							<div class="contenedor-pregunta">
								<p class="pregunta">¿Que métodos de pago disponibles tienen? <img src="./img/suma.svg" alt="Abrir Respuesta" /></p>
								<p class="respuesta">Somos un negocio pequeño que acaba de comenzar, entoces por el momento contamos solo con pagos por medio de paypal. En un futuro agregaremos más métodos de pago y ustedes serán los primeros en saberlo.</p>
							</div>
							<div class="contenedor-pregunta">
								<p class="pregunta">¿Tienen plazo de pago? <img src="./img/suma.svg" alt="Abrir Respuesta" /></p>
								<p class="respuesta">Si, ya que los pagos son por medio de paypal, el usuario puede configurar su paypal para que los pagos sean según el tiempo que él desee.</p>
							</div>
						</div>
						<!-- Preguntas Entregas -->
						<div class="contenedor-preguntas" data-categoria="entregas">
							<div class="contenedor-pregunta">
								<p class="pregunta">¿Tienen entregas a domicilio? <img src="./img/suma.svg" alt="Abrir Respuesta" /></p>
								<p class="respuesta">Si, solo tenemos envÍos a domicilio porque no contamos con una tienda física. Usted nos compra el producto y nosotros nos encargamos en mandar el producto hasta la puerta de su casa sin ningun costo extra, ya que ya viene agregado en el precio de la mercancia comprada.</p>
							</div>
							<div class="contenedor-pregunta">
								<p class="pregunta">¿Tienen envíos a todo el mundo? <img src="./img/suma.svg" alt="Abrir Respuesta" /></p>
								<p class="respuesta">No, solo contamos con envíos a toda la Repúlica Mexicana. El costo de envío a tu ciudad es totalmente gratis, puedes comprar desde <a class="enlace_asistencia" href="productos.php">aquí</a>.</p>
							</div>
						</div>
						<!-- Preguntas Seguridad -->
						<div class="contenedor-preguntas" data-categoria="seguridad">
							<div class="contenedor-pregunta">
								<p class="pregunta">¿Como puedo saber si son confiables? <img src="./img/suma.svg" alt="Abrir Respuesta" /></p>
								<p class="respuesta">Contamos con certificado web SSL que Google nos certifica como sitio web confiable y seguro para realizar compras online.</p>
							</div>
							<div class="contenedor-pregunta">
								<p class="pregunta">¿Que pasa con mis datos personales? <img src="./img/suma.svg" alt="Abrir Respuesta" /></p>
								<p class="respuesta">Tus datos personales son guardados y almacenados en nuestra Base de Datos para porderte mandar los productos que compras, pero ese es solo su uso, sientete seguro de poner la dirección que tu quieras para mandarte el producto comprado ahí.</p>
							</div>
						</div>
						<!-- Preguntas Cuenta -->
						<div class="contenedor-preguntas" data-categoria="cuenta">
							<div class="contenedor-pregunta">
								<p class="pregunta">¿Como puedo acceder a mis pedidos? <img src="./img/suma.svg" alt="Abrir Respuesta" /></p>
								<p class="respuesta">Primeramente necesitas crear una cuenta para que puedas encontrar tus pedidos, ya con una cuenta creada puedes acceder desde <a class="enlace_asistencia" href="mis_pedidos.php">aquí</a>.</p>
							</div>
							<div class="contenedor-pregunta">
								<p class="pregunta">¿Como puedo revisar el estatus de mi alarma comprada? <img src="./img/suma.svg" alt="Abrir Respuesta" /></p>
								<p class="respuesta">Primeramente necesitas crear una cuenta para que puedas encontrar el estatus de tus alarmas, ya con una cuenta creada puedes acceder desde <a class="enlace_asistencia" href="alarmas.php">aquí</a>.</p>
							</div>
							<div class="contenedor-pregunta">
								<p class="pregunta">¿Como puedo manipular mi alarma comprada? <img src="./img/suma.svg" alt="Abrir Respuesta" /></p>
								<p class="respuesta">Para manipular tu alarma necesitas <a class="enlace_asistencia" href="#">descargar</a> nuestra aplicación, ya con la aplicación necesitas crear una cuenta de usuario en este <a class="enlace_asistencia" href="registrarse.php">sitio</a> y así podras usar tu alarma sin ningun problema.</p>
							</div>
							<div class="contenedor-pregunta">
								<p class="pregunta">¿Puedo comprar sin cuenta? <img src="./img/suma.svg" alt="Abrir Respuesta" /></p>
								<p class="respuesta">No, necesitas una cuenta obligatoriamente para poder comprar cualquier producto, ya que para programar tu alarma usamos tu correo electronico, con el fin de que haya más seguridad en el sistema de tu alarma.</p>
							</div>
						</div>
					</div>
				</main>
				<hr class="mt-5 bg-gray">
			</div>
			
			<!-- Formulario -->
			<div id="asistencia-inputs" class="col-12 col-md-6 mt-5">
				<h2 class="text-center">PONTE EN CONTÁCTO</h2>
				<form id="input_mensaje" class="row justify-content-center g-3 needs-validation mt-5" novalidate>
					<div class="col-12 mb-3">
						<label for="nombre" class="form-label">Tú nombre:</label>
						<input class="form-control" id="nombre" type="text" pattern="[a-zA-Zá-úÁ-Ú ]+" name="nombre" placeholder="Nombre" required>
						<div class="valid-feedback">Correcto.</div>
						<div class="invalid-feedback">Por favor ingresa tu nombre.</div>
					</div>
					<div class="col-12 mb-3">
						<label for="email" class="form-label">Tú email:</label>					
						<input class="form-control" type="email" id="email" name="email" placeholder="Email" required>
						<div class="valid-feedback">Correcto.</div>
						<div class="invalid-feedback">Por favor ingresa tu email.</div>
					</div>
					<div class="col-12 mb-4">
						<label for="mensaje" class="form-label">Tú mensaje o duda:</label>					
						<textarea class="form-control" id="mensaje" name="mensaje" placeholder="Escribe tu mensaje aquí..." autocomplete="off" required></textarea>
						<div class="valid-feedback">Correcto.</div>
						<div class="invalid-feedback">Por favor ingresa un mensaje.</div>
					</div>
					<div class="col-12 text-center mb-5">
						<button class="btn btn-dark btn-block btn-lg" type="submit" onclick="enviarMensaje()">Enviar mensaje</button>
					</div>
				</form>
			</div>
		</div>
	</div>

    
	<!-- Transiciones -->
    <script src="js/index.js"></script>
	<!-- Estilos Script -->
	<script src="https://kit.fontawesome.com/56b0f801ce.js" crossorigin="anonymous"></script>
    <?php include_once "views/script_bootstrap.php"?>
    <?php include_once "views/script_future.php"?>
	<script src="js/asistencia.js"></script>
	<!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="js/sweetalert.js"></script>
	<!-- Programación para php y validar formulario -->
    <script src="js/peticiones_php.js"></script>
	<script src="js/validacion_formulario.js"></script>
	<!-- LINK ACTIVADO -->
    <script>
        const currentLocation = location.href;
        const menuItem = document.querySelectorAll("a");
        const menuLength = menuItem.length;
        for (let i = 0; i < menuLength; i++) {
        if (menuItem[i].href === currentLocation) menuItem[i].className = "active";
        }
    </script>
</body>

</html>

<?php

    }

?>