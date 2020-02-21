<div class="page-content">
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="float-right">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Dashboard</h4>
                </div>
            </div>
        </div>

        <div class="row">
            <!--INICIO DE CONTENIDO-->
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="row">

                    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-4 align-self-center">
                                        <div class="icon-info">
                                            <i class="mdi mdi-account-multiple text-purple"></i>
                                        </div>
                                    </div>
                                    <div class="col-8 align-self-center text-right">
                                        <div class="ml-2">
                                            <p class="mb-1 text-muted">Usuarios</p>
                                            <h4 class="mt-0 mb-1"><?php echo $todos_usuarios[0]->total; ?></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end card-body-->
                        </div>
                        <!--end card-->
                    </div>
                    <!--end col-->

                    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-4 align-self-center">
                                        <div class="icon-info">
                                            <i class="mdi mdi-material-ui text-success"></i>
                                        </div>
                                    </div>
                                    <div class="col-8 align-self-center text-right">
                                        <div class="ml-2">
                                            <p class="mb-1 text-muted">Instituciones</p>
                                            <h4 class="mt-0 mb-1 d-inline-block"><?php echo $todos_avaladores[0]->total; ?></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end card-body-->
                        </div>
                        <!--end card-->
                    </div>
                    <!--end col-->

                    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-4 col-4 align-self-center">
                                        <div class="icon-info">
                                            <i class="mdi mdi-file-multiple text-pink"></i>
                                        </div>
                                    </div>
                                    <div class="col-sm-8 col-8 align-self-center text-right">
                                        <div class="ml-2">
                                            <p class="mb-1 text-muted">Cursos</p>
                                            <h4 class="mt-0 mb-1 "><?php echo $todos_cursos[0]->total; ?></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end card-body-->
                        </div>
                        <!--end card-->
                    </div>
                    <!--end col-->

                    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-4 col-4 align-self-center">
                                        <div class="icon-info">
                                            <i class="mdi mdi-diamond-stone text-warning"></i>
                                        </div>
                                    </div>
                                    <div class="col-sm-8 col-8 align-self-center text-right">
                                        <div class="ml-2">
                                            <p class="mb-1 text-muted">Instructores</p>
                                            <h4 class="mt-0 mb-1 "><?php echo $todos_intructores[0]->total; ?></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end card-body-->
                        </div>
                        <!--end card-->
                    </div>
                    <!--end col-->
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="card">
                            <div class="card-body">
                                <div id="calendar" class="fc fc-ltr fc-unthemed" style="">
                                    
                                </div>
                                <div style="clear:both"></div>
                            </div>
                            <!--end card-body-->
                        </div>
                        <!--end card-->
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->
            </div>
            <!--FIN DE CONTENIDO-->
        </div>

    </div>
    <footer class="footer text-center text-sm-left">
        &copy; 2019 PACE <span class="text-muted d-none d-sm-inline-block float-right">Desarrollado <i class="mdi mdi-heart text-danger"></i> por ARO Soluciones</span>
    </footer>
    <!--end footer-->
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

<script src="<?php echo base_url(); ?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/moment/moment.js"></script>
<script src='<?php echo base_url(); ?>assets/plugins/fullcalendar/packages/core/main.js'></script>
<script src='<?php echo base_url(); ?>assets/plugins/fullcalendar/packages/daygrid/main.js'></script>
<script src='<?php echo base_url(); ?>assets/plugins/fullcalendar/packages/timegrid/main.js'></script>
<script src='<?php echo base_url(); ?>assets/plugins/fullcalendar/packages/interaction/main.js'></script>
<script src='<?php echo base_url(); ?>assets/plugins/fullcalendar/packages/list/main.js'></script>
<script src='<?php echo base_url(); ?>assets/pages/jquery.calendar.js'></script>

<!-- App js -->
<script src="<?php echo base_url(); ?>assets/js/app.js"></script>
<script>
    $(document).ready(function() {
        $("body").remove("enlarge-menu");
        $("#li_principal").addClass("mm-active");
        $("#ul_dashboard").addClass("mm-show");
        $("#li_dashboard").addClass("active");
        $("#a_dashboard").addClass("active");
    });
</script>
</body>

</html>