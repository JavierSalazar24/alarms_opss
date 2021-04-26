<!-- Contenido -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Panel de Control</h1>
    </div>

    <!-- Content Row Tarjetas -->
    <div class="row">

        <!-- Tarjeta admins -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="administradores.php" id="links-dashboard">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Administradores</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $numA ?></div>
                            </div>
                            <div class="col-auto"><i class="fas fa-user-tie fa-3x text-gray-300"></i></div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Tarjeta clientes -->
        <div class="col-xl-3 col-md-6 mb-4">
                <a href="clientes.php" id="links-dashboard">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Clientes</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $numC ?></div>
                                </div>                
                                <div class="col-auto"><i class="fas fa-user fa-3x text-gray-300"></i></div>
                            </div>
                        </div>
                    </div>
                </a>
        </div>

        <!-- Tarjeta ventas -->
        <div class="col-xl-3 col-md-6 mb-4">
                <a href="ventas.php" id="links-dashboard">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Ventas</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $numV ?></div>
                                </div>
                                <div class="col-auto"><i class="fas fa-dollar-sign fa-3x text-gray-300"></i></div>
                            </div>
                        </div>
                    </div>
                </a>
        </div>

        <!-- Tarjeta mensaje -->
        <div class="col-xl-3 col-md-6 mb-4">
                <a href="mensajes.php" id="links-dashboard">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Mensajes</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $numM ?></div>
                                </div>
                                <div class="col-auto"><i class="fas fa-comments fa-3x text-gray-300"></i></div>
                            </div>
                        </div>
                    </div>
                </a>
        </div>

    </div>

    <!-- Segunda columna -->
    <div class="row">
        <!-- Estadisticas -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Balance</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="myAreaChart"></canvas>
                    </div>
                </div>
            </div> 
        </div>

        <!-- Pie Chart -->
        <div class="col-xl-4 col-lg-5"> 
            <div class="card shadow mb-4"> 
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Estadísticas</h6>                        
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-pie pt-4 pb-2">
                        <canvas id="myPieChart"></canvas>
                    </div>
                    <div class="mt-4 text-center small">
                        <span class="mr-2">
                            <i class="fas fa-circle text-primary"></i> Clientes
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-success"></i> Productos
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-warning"></i> Administradores
                        </span>
                    </div>
                </div> 
            </div>
        </div> 
    </div>

    <!-- Notas y tarjetas -->
    <div class="row">
        <div class="col-lg-6 mb-4">
            <!-- Notas -->
            <div class="box box-primary">
                <div class="box-header">
                    <i class="ion ion-clipboard"></i>
                    <h3 class="box-title">Notas rápidas</h3>
                </div>
                <div class="box-body">
                    <ul class="todo-list">

                        <?php 
                            foreach ($notas as $nota) {
                        ?>
                        <li class="text-black">
                            <span class="handle">
                                <i class="fa fa-ellipsis-v"></i>
                                <i class="fa fa-ellipsis-v"></i>
                            </span>
                            <?php
                            if ($nota['estatus'] == "pendiente") {
                            ?> 
                                <p class="d-none" id="p_idNota"><?php echo $nota['_id']?></p>
                                <input type="checkbox" onclick="editarEstatusNotaI('<?php echo $nota['_id'] ?>')">
                                <span id="s_Nota" class="text"><?php echo $nota['nota'] ?></span>
                                <small class="badge badge-primary"><i class="fa fa-clock-o"></i> <?php echo $nota['fecha'] ?></small>
                                <div class="tools d-flex pt-1 pb-0">
                                    <i class="fa fa-edit" data-toggle="modal" data-target="#EditarNotaModalI<?php echo $nota['_id'] ?>"></i>
                                    <i class="fa fa-trash-o" onclick="ConfirmarEliminacionNotaI('<?php echo $nota['_id'] ?>')"></i>
                                </div>
                            <?php
                            } else {
                            ?>
                                    <p class="d-none" id="p_idNota"><?php echo $nota['_id']?></p>
                                    <input type="checkbox" onclick="editarEstatusNotaI('<?php echo $nota['_id'] ?>')" checked>
                                    <span class="text text-secondary"><s id="s_Nota"> <?php echo $nota['nota'] ?></s></span>
                                    <small class="badge badge-secondary"><i class="fa fa-clock-o"></i> <?php echo $nota['fecha'] ?></small>
                                    <div class="tools d-flex pt-1 pb-0">
                                        <i class="fa fa-edit" data-toggle="modal" data-target="#EditarNotaModalI<?php echo $nota['_id'] ?>"></i>
                                        <i class="fa fa-trash-o" onclick="ConfirmarEliminacionNotaI('<?php echo $nota['_id'] ?>')"></i>
                                    </div>
                            <?php
                            }
                            ?>                                             
                        </li>

                        <!-- Modal editar nota -->
                        <form action="editar_notas.php" method="POST" class="needs-validation" novalidate>
                            <div class="modal fade" id="EditarNotaModalI<?php echo $nota['_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-success">
                                            <h5 class="modal-title text-black" id="exampleModalLabel">Editar Nota</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                        <div class="mb-3">
                                                <textarea  class="d-none form-control" name="id_notaI" id="id_editar" required><?php echo $nota['_id'] ?></textarea>
                                                <label for="editar_nota" class="form-label">Nota:</label>
                                                <textarea class="form-control" name="nota" id="nota_editar" required><?php echo $nota['nota'] ?></textarea>
                                                <div class="valid-feedback">Correcto.</div>
                                                <div class="invalid-feedback">Por favor ingresa un nota.</div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-success text-black" onclick="editarNota()">Guardar cambios</button>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        
                        <?php                    
                            }
                        ?>
                    </ul>
                </div>
                <div class="box-footer clearfix no-border">
                    <button type="button" class="btn btn-dark pull-right" data-toggle="modal" data-target="#NotaModal">
                        <i class="fa fa-plus"></i> Agregar nota
                    </button>
                </div>
            </div>                    

            <!-- Tarjetas -->
            <div class="row">
                <div class="col-lg-6 mb-4">
                    <a href="productos.php" id="links-dashboard">
                        <div class="card border-left-danger shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Productos</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $numPr ?></div>
                                    </div>
                                    <div class="col-auto"><i class="fas fa-boxes fa-3x text-gray-300"></i></div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-6 mb-4">
                    <a href="pedidos.php" id="links-dashboard">
                        <div class="card border-left-secondary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Pedidos</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $numPe ?></div>
                                    </div>
                                    <div class="col-auto"><i class="fas fa-pallet fa-3x text-gray-300"></i></div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-6 mb-4">
                    <a href="envios.php" id="links-dashboard">
                        <div class="card border-left-dark shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">EnvÍos</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $numE ?></div>
                                    </div>
                                    <div class="col-auto"><i class="fas fa-people-carry fa-3x text-gray-300"></i></div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-6 mb-4">
                    <a href="estadisticas.php" id="links-dashboard">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Estadísticas</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $numEs ?></div>
                                    </div>
                                    <div class="col-auto"><i class="fas fa-clipboard fa-3x text-gray-300"></i></div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-6 mb-4">
                    <a href="notas.php" id="links-dashboard">
                        <div class="card border-left-warning shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Notas</div>
                                    </div>
                                    <div class="col-auto"><i class="fas fa-sticky-note fa-3x text-gray-300"></i></div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-6 mb-4">
                    <a href="correo.php" id="links-dashboard">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Correo</div>
                                    </div>
                                    <div class="col-auto"><i class="fas fa-envelope fa-3x text-gray-300"></i></div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-lg-6 mb-5">
            <!-- Calendario -->
            <div class="mb-5 box text-white bg-gray-100 border-none">
                <div class="box-header bg-primary text-white">
                    <i class="fa fa-calendar"></i>
                    <h3 class="box-title">Calendario</h3>
                    <div class="pull-right box-tools">
                    <button type="button" class="btn btn-success btn-sm" data-widget="collapse">
                        <i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-danger btn-sm" data-widget="remove">
                        <i class="fa fa-times"></i>
                    </button>
                </div>
                <div class="box-body no-padding bg-primary">
                    <div id="calendar" style="width: 100%"></div>
                </div>
            </div>            

            <!-- Approach -->
            <div class="card shadow mb-4 mt-5 text-black">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Alarmas - OPSS</h6>
                </div>
                <div class="card-body text-justify">
                    <p>
                        Aquí podras eliminar, editar o consultar todos los datos importantes de los <b><a href="clientes.php">clientes</a></b>, <b><a href="administradores.php">administradores</a></b>, <b><a href="productos.php">productos</a></b>, <b><a href="pedidos.php">pedidos</a></b>, <b><a href="envios.php">envios</a></b> o <b><a href="ventas.php">ventas</a></b>, así como sus <b><a href="estadisticas.php">estadísticas</a></b> o contestar <b><a href="mensajes.php">mensajes</a></b> de los clientes.
                    </p>
                    <p>
                        Puedes crear <b><a href="notas.php">notas</a></b> para que otros administradores puedan saber los pendientes que hay o las cosas que se van haciendo día a día, así como mandar <b><a href="correos.php">correos</a></b> para contestar las dudas de los clientes.
                    </p>
                    <p>
                        <b>IMPORTANTE:</b> Los administradores root pueden consultar, editar o eliminar los datos anteriormente mencionados. Los administradores estandar pueden unicamente consultar dichos datos.
                    </p>
                    <p>
                        Para diferenciar, a los administradores root se les asignó el número 1 y a los administradores estandar el número 2.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
