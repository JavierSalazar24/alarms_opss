<header id="headerf">
	<h1 class="h1f"><a class="ancla-navf" href="index.php">Alarmas - OPSS</a></h1>
	<nav class="links">
		<ul class="ulf">        
			<li class="lif"><a class="ancla-navf" href="index.php">INICIO</a></li>
			<li class="lif"><a class="ancla-navf" href="productos.php">PRODUCTOS</a></li>
			<li class="lif"><a class="ancla-navf" href="noticias.php">NOTICIAS</a></li>
			<li class="lif"><a class="ancla-navf" href="asistencia.php">ASISTENCIA</a></li>
            <li class="lif nombre-li">
                <div class="btn-group group-button-z">
                    <button class="button-nav-nombre nombre-btn dropdown-button ancla-navf dropdown-toggle" id="dp-categorias" data-toggle="dropdown">
                        <?php echo $nombre.' '.$ape1?>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dp-categorias">
                        <a href="mi_perfil.php" class="text-center ancla-navf ancla-dropdown dropdown-item">Mi perfil</a>
                        <a href="alarmas.php" class="text-center ancla-navf ancla-dropdown dropdown-item">Mis alarmas</a>         
                        <a href="cerrar_sesion.php" class="text-center ancla-navf ancla-dropdown dropdown-item">Cerrar sesión</a>         
                    </div>
                </div>
            </li>
		</ul>
	</nav>
	<nav class="mainf">
		<ul class="ulf">
			<li class="lif menu">
				<a class="desaparece ancla-navf fa-bars" href="#menu">MENÚ</a>
			</li>
		</ul>
	</nav>
</header>

<!-- Menu -->
<section class="sectionf" id="menu">

    <!-- logo -->
    <section class="py-5 text-center bg-dark sectionf">
        <img src="img/Logo6.png" width="140px"  alt="">
    </section>

    <!-- Links -->
    <section class="sectionf text-center">
        <ul class="ulf links">
            <li class="lif">
                <a class="ancla-navf" href="index.php">
                    <h3 class="h3f">INICIO</h3>
                </a>
            </li>
            <li class="lif">
                <a class="ancla-navf" href="noticias.php">
                    <h3 class="h3f">NOTICIAS</h3>
                </a>
            </li>
            <li class="lif">
                <a class="ancla-navf" href="asistencia.php">
                    <h3 class="h3f">ASISTENCIA</h3>
                </a>
            </li>
            <li class="lif">
                <a class="ancla-navf" href="productos.php">
                    <h3 class="h3f">PRODUCTOS</h3>
                </a>
            </li>
            <li class="lif">
                <a class="ancla-navf" href="mi_perfil.php">
                    <h3 class="h3f">MI PERFIL</h3>
                </a>
            </li>
            <li class="lif">
                <a class="ancla-navf" href="alarmas.php">
                    <h3 class="h3f">MIS ALARMAS</h3>
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