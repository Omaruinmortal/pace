<div class="page-content">
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="float-right">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item "><a href="<?php echo base_url() ?>index.php/dashboard/">Dashboard</a></li>
                            <li class="breadcrumb-item ">Catalogos</li>
                            <li class="breadcrumb-item ">Carteles</li>
                            <li class="breadcrumb-item active">Agregar Cartel</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Cartel</h4>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <center>
                            <h4 class="mt-0 header-title">Registro de Carteles para cursos</h4>
                        </center>
                        <div class="row">
                            <div class="col-lg-12">
                                <form id="form_cartel" method="post" enctype="multipart/form-data">
                                <div class="form-group row">
                                        <label for="example-text-input" class="col-sm-4 col-form-label text-right">Nombre del cartel <font color="red">*</font></label>
                                        <div class="col-sm-8">
                                            <input class="form-control" type="text" id="nombre_cartel" name="nombre_cartel" onkeyup="javascript:this.value=this.value.toUpperCase();" autocomplete="off">
                                            <small id="alert-nombre_cartel" class="form-text"></small>
                                        </div>
                                </div>        
                                <div class="form-group row">
                                <label for="example-text-input" class="col-sm-4 col-form-label text-right">Selecciona cartel a subir <font color="red">*</font></label>
                                        <div class="col-sm-8">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="archivo_cartel" name="archivo_cartel" lang="es" data-max-size="2048">
                                        <label class="custom-file-label" id="nombre_archivo" for="customFileLang">Seleccionar Archivo (2MB)</label>
                                        <small id="alert-archivo_cartel" class="form-text"></small>
                                    </div>
                                    </div>
                                </div>                             
                                <div class="form-group row">
                                    <button type="submit" name="submit" id="submit" value="user_register" class="btn btn-gradient-primary waves-effect waves-light">Guardar</button>
                                </div>
                                </form>
                                <h2><?php if (isset($mensaje)) echo $mensaje; ?></h2>
                            </div>
                        </div>
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>
            <!--end col-->
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
<script src="<?php echo base_url(); ?>assets/js/sweetalert2.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/moment/moment.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/apexcharts/apexcharts.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="<?php echo base_url(); ?>assets/pages/jquery.crm_dashboard.init.js"></script>


<!-- App js -->
<script src="<?php echo base_url(); ?>assets/js/app.js"></script>
<script>
    pace.carteles.valida_formulario_add_carteles();   
</script>
</body>

</html>