<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <title>PACE | Sistema de Registro y Administración de Cursos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A premium admin dashboard template by Mannatthemes" name="description" />
    <meta content="Mannatthemes" name="author" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/favicon-pace.ico">

    <link href="<?php echo base_url(); ?>assets/plugins/jvectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/plugins/fullcalendar/packages/core/main.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/plugins/fullcalendar/packages/daygrid/main.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/plugins/fullcalendar/packages/bootstrap/main.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/plugins/fullcalendar/packages/timegrid/main.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/plugins/fullcalendar/packages/list/main.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- App css -->

    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/css/metisMenu.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/css/sweetalert2.min.css" rel="stylesheet" type="text/css" />
    <?php if (isset($scripts)) : foreach ($scripts as $js) : ?>
    <script src="<?php echo base_url() . "js/{$js}.js" ?>?filever=<?php echo time() ?>" type="text/javascript"></script>
    <?php endforeach;
    endif; ?>
    <script>
        var base_url = "http://<?php echo $_SERVER['HTTP_HOST'] ?>/pace/index.php";
    </script>
</head>

<body>

    <!-- Top Bar Start -->
    <div class="topbar">

        <!-- LOGO -->
        <div class="topbar-left">
            <a href="<?php echo base_url(); ?>index.php/dashboard" class="logo">
                <span>
                    <img src="<?php echo base_url(); ?>assets/images/logo-sm.png" alt="logo-small" class="logo-sm">
                </span>
                <span>
                    <img src="<?php echo base_url(); ?>assets/images/logo.png" alt="logo-large" class="logo-lg logo-light">
                    <img src="<?php echo base_url(); ?>assets/images/logo.png" alt="logo-large" class="logo-lg ">
                </span>
            </a>
        </div>
        <!--end logo-->
        <!-- Navbar -->
        <nav class="navbar-custom">
            <ul class="list-unstyled topbar-nav float-right mb-0">
                <li class="dropdown">
                    <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <img src="<?php echo base_url(); ?>assets/images/users/user-4.jpg" alt="profile-user" class="rounded-circle" />
                        <span class="ml-1 nav-user-name hidden-sm"><?= $this->session->userdata('user_name'); ?> <i class="mdi mdi-chevron-down"></i> </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="#"><i class="dripicons-gear text-muted mr-2"></i> Herramientas</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?php echo base_url() ?>index.php/dashboard/logout"><i class="dripicons-exit text-muted mr-2"></i> Cerrar Sesión</a>
                    </div>
                </li>
            </ul>
            <!--end topbar-nav-->

            <ul class="list-unstyled topbar-nav mb-0">
                <li>
                    <button class="button-menu-mobile nav-link waves-effect waves-light">
                        <i class="dripicons-menu nav-icon"></i>
                    </button>
                </li>
            </ul>
        </nav>
        <!-- end navbar-->
    </div>
    <!-- Top Bar End -->

    <div class="page-wrapper">
        <div class="left-sidenav">
            <ul class="metismenu left-sidenav-menu">
                <li id="li_principal">
                    <a href="javascript: void(0);"><i class="mdi mdi-pandora"></i><span>Principal</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                    <ul id="ul_dashboard" class="nav-second-level" aria-expanded="false">
                        <li id="li_dashboard" class="nav-item"><a id="a_dashboard" class="nav-link" href="<?php echo base_url() ?>index.php/dashboard/"><i class="mdi mdi-view-dashboard"></i>Dashboard</a></li>
                    </ul>
                </li>
                <?php
                if ($id_tipousuario < 3) {
                ?>

                    <li class="">
                        <a href="javascript: void(0);"><i class="mdi mdi-view-column"></i><span>Catalogos</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li>                                
                                <a href="javascript: void(0);"><i class="dripicons-user-group "></i><span>Usuarios</span><span class="menu-arrow left-has-menu"><i class="mdi mdi-chevron-right"></i></span></a>
                                <ul id="ul_agregar_usuarios" class="nav-second-level" aria-expanded="false">
                                    <li id="li_agrega_usuarios" class="nav-item"><a id="a_agrega_usuarios" class="nav-link" href="<?php echo base_url() ?>index.php/dashboard/agrega_usuario"><i class="dripicons-plus"></i>Agrega</a></li>
                                    <li id="li_consulta_usuarios" class="nav-item"><a id="a_consulta_usuarios" class="nav-link" href="<?php echo base_url() ?>index.php/dashboard/consulta_usuarios"><i class="dripicons-search "></i>Consultar</a></li>
                                </ul>
                            </li>
                            <li>                                
                                <a href="javascript: void(0);"><i class="mdi mdi-alpha-a-circle"></i><span>Avaladores</span><span class="menu-arrow left-has-menu"><i class="mdi mdi-chevron-right"></i></span></a>
                                <ul id="ul_agregar_avaluadores" class="nav-second-level" aria-expanded="false">
                                    <li id="li_agrega_avaluadores" class="nav-item"><a id="a_agrega_avaluadores" class="nav-link" href="<?php echo base_url() ?>index.php/dashboard/agrega_avaladores"><i class="dripicons-plus"></i>Agrega</a></li>
                                    <li id="li_consulta_avaluadores" class="nav-item"><a id="a_consulta_avaluadores" class="nav-link" href="<?php echo base_url() ?>index.php/dashboard/consulta_avaladores"><i class="dripicons-search "></i>Consultar</a></li>
                                </ul>
                            </li>
                            <li>                                
                                <a href="javascript: void(0);"><i class="mdi mdi-alpha-a-circle"></i><span>Cursos</span><span class="menu-arrow left-has-menu"><i class="mdi mdi-chevron-right"></i></span></a>
                                <ul id="ul_agregar_cursos" class="nav-second-level" aria-expanded="false">
                                    <li id="li_agrega_cursos" class="nav-item"><a id="a_agrega_cursos" class="nav-link" href="<?php echo base_url() ?>index.php/dashboard/agrega_cursos"><i class="dripicons-plus"></i>Agrega</a></li>
                                    <li id="li_consulta_cursos" class="nav-item"><a id="a_consulta_cursos" class="nav-link" href="<?php echo base_url() ?>index.php/dashboard/consulta_cursos"><i class="dripicons-search "></i>Consultar</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>                  
                <?php
                }
                ?>

                <li>
                    <a href="<?php echo base_url() ?>index.php/dashboard/logout"><i class="dripicons-exit text-muted mr-2"></i> Cerrar Sesión</a>
                </li>
            </ul>
        </div>