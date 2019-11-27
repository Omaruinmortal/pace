<div class="page-content">
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="float-right">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item "><a href="<?php echo base_url() ?>index.php/dashboard/">Dashboard</a></li>
                            <li class="breadcrumb-item ">Usuarios</li>
                            <li class="breadcrumb-item active">Consulta Usuarios</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Usuarios</h4>
                </div>
            </div>
        </div>

        <div class="row">
            <!--INICIO DE CONTENIDO-->
            <!--FIN DE CONTENIDO-->
        </div>

    </div>
    <footer class="footer text-center text-sm-left">
                    &copy; 2019 PACE <span class="text-muted d-none d-sm-inline-block float-right">Desarrollado <i class="mdi mdi-heart text-danger"></i> por ARO Soluciones</span>
                </footer><!--end footer-->
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

        <script src="<?php echo base_url(); ?>assets/plugins/moment/moment.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/apexcharts/apexcharts.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
        <script src="<?php echo base_url(); ?>assets/pages/jquery.crm_dashboard.init.js"></script>


        <!-- App js -->
        <script src="<?php echo base_url(); ?>assets/js/app.js"></script>
        <script>
        $(document).ready(function() {
            $("#li_usuarios").addClass("mm-active");
            $("#ul_agregar_usuarios").addClass("mm-show");
            $("#li_consulta_usuarios").addClass("active");
            $("#a_consulta_usuarios").addClass("active");
        });
    </script>
    </body>
</html>
    