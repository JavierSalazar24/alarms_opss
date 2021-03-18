<input type="checkbox" name="" id="icon-nav-menu">
<div class="div-label">
    <label class="label-icon" for="icon-nav-menu"><i class="fas fa-bars"></i></label>
    <!-- <div class="div-img-letras"> -->
        <a class="ancla-logo" href="index.php"><img class="logo-responsive" src="img/Logo6.png" alt="Logo OPSS"></a>
        <!-- <h4 class="letras-logo">
            <a class="ancla-letras-logo" href="index.php">OPSS</a>
        </h4> -->
    <!-- </div> -->
</div>
<nav class="menu">
        <ul class="ul-menu">
            <a class="ancla-menu ancla-menu-logo" href="index.php">
                <li><img class="logo-menu" src="img/Logo6.png" alt="Logo OPSS"></li>
            </a>
            <a class="ancla-menu" href="index.php">
                <li class="li-menu">INICIO</li>
            </a>
            <a class="ancla-menu" href="noticias.php">
                <li class="li-menu">NOTICIAS</li>
            </a>
            <a class="ancla-menu" href="asistencia.php">
                <li class="li-menu">ASISTENCIA</li>
            </a>
        </ul>
        <ul class="ul-menu2">
            <a class="ancla-menu" href="mi_perfil.php">
                <li class=" li-menu"><?php echo $nombre.' '.$ape1?></li>
            </a>
            <a class="ancla-menu" href="cerrar_sesion.php">
                <li class=" li-menu">CERRAR SESIÓN</li>
            </a>
            <a class="ancla-menu" href="comprar.php">
                <li class="li-menu-comprar">COMPRAR</li>
            </a>
        </ul>
    </nav>
