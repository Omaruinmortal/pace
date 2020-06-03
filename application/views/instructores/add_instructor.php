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
                            <li class="breadcrumb-item ">Instructores</li>
                            <li class="breadcrumb-item active">Agregar Instructor</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Instructores</h4>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <center>
                            <h4 class="mt-0 header-title">Registro de instructores al sistema</h4>
                        </center>
                        <div class="row">
                            <div class="col-lg-12">
                                <form id="form_usuario" method="post">

                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-sm-4 col-form-label text-right">Titulo de Inscructor <font color="red">*</font></label>
                                        <div class="col-sm-8">
                                            <input class="form-control" type="text" id="titulo" name="titulo" onkeyup="javascript:this.value=this.value.toUpperCase();" autocomplete="off">
                                            <small id="alert-titulo" class="form-text"></small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-sm-4 col-form-label text-right">Nombre <font color="red">*</font></label>
                                        <div class="col-sm-8">
                                            <input class="form-control" type="text" id="nombre" name="nombre" onkeyup="javascript:this.value=this.value.toUpperCase();" autocomplete="off">
                                            <small id="alert-nombre" class="form-text"></small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-sm-4 col-form-label text-right">Primer Apellido <font color="red">*</font></label>
                                        <div class="col-sm-8">
                                            <input class="form-control" type="text" id="primerApellido" name="primerApellido" onkeyup="javascript:this.value=this.value.toUpperCase();" autocomplete="off">
                                            <small id="alert-primerApellido" class="form-text"></small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-sm-4 col-form-label text-right">Segundo Apellido </label>
                                        <div class="col-sm-8">
                                            <input class="form-control" type="text" id="segundoApellido" name="segundoApellido" onkeyup="javascript:this.value=this.value.toUpperCase();" autocomplete="off">
                                            <small id="alert-segundoApellido" class="form-text"></small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-email-input" class="col-sm-4 col-form-label text-right">Correo <font color="red">*</font></label>
                                        <div class="col-sm-8">
                                            <input class="form-control" type="email" id="correo" name="correo" autocomplete="off">
                                            <small id="alert-correo" class="form-text"></small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-tel-input" class="col-sm-4 col-form-label text-right">Telefono <font color="red">*</font></label>
                                        <div class="col-sm-8">
                                            <input class="form-control" type="tel" id="telefono" name="telefono" autocomplete="off">
                                            <small id="alert-telefono" class="form-text"></small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label text-right">Institución</label>
                                        <div class="col-sm-8">
                                            <select class="form-control" id="id_institucion" name="id_institucion">
                                                <option value="none" selected="selected">-- Seleccione una opción --</option>
                                                <?php foreach ($instituciones as $key => $var) { ?>
                                                    <option value="<?php echo $var->id_institucion; ?>"><?php echo $var->acronimo; ?></option>
                                                <?php } ?>
                                            </select>
                                            <small id="alert-id_institucion" class="form-text"></small>
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


<!-- App js -->
<script src="<?php echo base_url(); ?>assets/js/app.js"></script>
<script>
    pace.instructores.valida_formulario_add_intructores();
    $(document).ready(function() {
        $("#li_intructores").addClass("mm-active");
        $("#ul_agregar_intructores").addClass("mm-show");
        $("#li_agrega_intructores").addClass("active");
        $("#a_agregar_intructores").addClass("active");
    });
</script>
</body>

</html>