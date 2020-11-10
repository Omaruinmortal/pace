<!DOCTYPE html>
<html lang="en">
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
    <link href="<?php echo base_url(); ?>assets/css/main.css" rel="stylesheet" type="text/css" />

    <?php if (isset($scripts)) : foreach ($scripts as $js) : ?>
    <script src="<?php echo base_url() . "js/{$js}.js" ?>?filever=<?php echo time() ?>" type="text/javascript"></script>
    <?php endforeach;
    endif; ?>
    <script>
        var base_url = "http://<?php echo $_SERVER['HTTP_HOST'] ?>/pace/index.php";
    </script>
</head>
    <body>

        <div class="">
            <!-- Page Content-->
            <div class="page-content-tab">
                <div class="container-fluid">
                    <!-- Page-Title -->                    
                    <!-- end page title end breadcrumb -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body  met-pro-bg">
                                    <div class="met-profile">
                                        <div class="row">
                                            <div class="col-lg-4 align-self-center mb-3 mb-lg-0">
                                                <div class="met-profile-main">
                                                    <div class="met-profile_user-detail">
                                                        <h5 class="met-user-name"><?php echo $curso;?></h5>                                                        
                                                        <p class="mb-0 met-user-name-post"><?php echo $sede;?></p>
                                                    </div>
                                                </div>                                                
                                            </div><!--end col-->
                                            <div class="col-lg-4 ml-auto">
                                                <ul class="list-unstyled personal-detail">
                                                    <li class=""><i class="dripicons-calendar mr-2 text-info font-18"></i> <b> Fecha </b> : <?php echo $fecha_curso;?></p></li>
                                                    <li class="mt-2"><i class="dripicons-web text-info font-18 mt-2 mr-2"></i> <b> Estado </b> : <?php echo $estado;?></p></li>
                                                    <li class="mt-2"><i class="dripicons-location text-info font-18 mt-2 mr-2"></i> <b> Municipio</b> : <?php echo $municipio;?></p></li>
                                                </ul>
                                                <div class="button-list btn-social-icon">                                                
                                                    <button type="button" class="btn btn-blue btn-circle">
                                                        
                                                        <i class="fab fa-facebook-f"><a href="https://www.facebook.com/pacemd.mexico"></a></i>
                                                    </button>
                                                </div>
                                            </div><!--end col-->
                                        </div><!--end row-->
                                    </div><!--end f_profile-->                                                                                
                                </div><!--end card-body-->
                            </div><!--end card-->
                        </div><!--end col-->
                    </div><!--end row-->
                    </div><!-- container -->


            <footer class="footer text-center text-sm-left">
                &copy; 2019 PACE <span class="text-muted d-none d-sm-inline-block float-right">Desarrollado <i class="mdi mdi-heart text-danger"></i> por ARO Soluciones</span>
            </footer>
            </div>
            <!-- end page content -->
        </div>
        <!-- end page-wrapper -->

        



<!-- jQuery  -->
<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/metisMenu.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/waves.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.slimscroll.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/sweetalert2.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/moment/moment.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/apexcharts/apexcharts.min.js"></script>

<script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>

<script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.responsive.min.js"></script>

<!-- App js -->
<script src="<?php echo base_url(); ?>assets/js/app.js"></script>
<script>
    pace.agrega_participantes.init();
    pace.agrega_papeleria.init();
</script>
</body>

</html>