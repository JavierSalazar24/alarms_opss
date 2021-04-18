<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
    <!-- Botón menú responsive -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>
    <!-- Topbar Info CP -->
    <div class="desaparecer">Alarmas - OPSS</div>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

        <!-- Nav Item - FECHA -->
        <li class="nav-item dropdown no-arrow mx-1">
            <span class="nav-link">
                <div class="desaparecer"><?php echo $fecha?></div>
            </span>
        </li>

        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" id="userDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Bienvenido: <?php echo $nombre.' '.$ape1?></span>
                <img class="img-profile rounded-circle" src="../img/img_usuario.png">
            </a>                
        </li>
    </ul>
</nav>