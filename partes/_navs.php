<header id="headerf">
	<h1 class="h1f"><a class="ancla-navf" href="index.php">Alarmas - OPSS</a></h1>
	<nav class="links">
		<ul class="ulf">
			<li class="lif"><a class="ancla-navf" href="index.php">INICIO</a></li>
			<li class="lif"><a class="ancla-navf" href="noticias.php">NOTICIAS</a></li>
			<li class="lif"><a class="ancla-navf" href="asistencia.php">ASISTENCIA</a></li>
			<li class="lif"><a class="ancla-navf" href="productos.php">PRODUCTOS</a></li>
            <li class="lif">
                <div class="btn-group group-button-z">
                    <button class="dropdown-button ancla-navf dropdown-toggle" id="dp-categorias" data-toggle="dropdown">
                        <?php echo $nombre.' '.$ape1?>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dp-categorias">
                        <a href="mi_perfil.php" class="ancla-navf ancla-dropdown dropdown-item">Mi perfil</a>
                        <a href="alarmas.php" class="ancla-navf ancla-dropdown dropdown-item">Mis alarmas</a>         
                    </div>
                </div>
            </li>
		</ul>
	</nav>
	<nav class="mainf">
		<ul class="ulf">
			<li class="lif search">
                <!-- <i class="fas fa-sign-out-alt"></i> -->
				<a class="ancla-navf fa-sign-out-alt" href="cerrar_sesion.php">CERRAR SESIÓN</a>					
			</li>
			<li class="lif menu">
				<a class="desaparece ancla-navf fa-bars" href="#menu">MENÚ</a>
			</li>
		</ul>
	</nav>
</header>

<!-- Menu -->
<section class="sectionf" id="menu">

    <!-- logo -->
    <section class="sectionf">
        <img src="img/Logo6.png" width="100px"  alt="">
    </section>

    <!-- Links -->
    <section class="sectionf text-center">
        <ul class="ulf links">
            <li class="lif">
                <a class="ancla-navf" href="#">
                    <h3 class="h3f">INICIO</h3>
                </a>
            </li>
            <li class="lif">
                <a class="ancla-navf" href="#">
                    <h3 class="h3f">NOTICIAS</h3>
                </a>
            </li>
            <li class="lif">
                <a class="ancla-navf" href="#">
                    <h3 class="h3f">ASISTENCIA</h3>
                </a>
            </li>
            <li class="lif">
                <a class="ancla-navf" href="#">
                    <h3 class="h3f">PRODUCTOS</h3>
                </a>
            </li>
        </ul>
    </section>

    <!-- Actions -->
    <section>
        <ul class="ulf actions vertical">
            <li class="lif decoration-non"><a href="mi_perfil.php" class="ancla-navf button big fit"><?php echo $nombre.' '.$ape1?></a></li>
            <li class="lif decoration-non"><a href="cerrar_sesion.php" class="ancla-navf button big fit">CERRAR SESIÓN</a></li>
        </ul>
    </section>

</section>