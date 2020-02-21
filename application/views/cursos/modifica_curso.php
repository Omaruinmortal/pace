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
                            <li class="breadcrumb-item ">Cursos</li>
                            <li class="breadcrumb-item active">Actualiza Curso</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Cursos</h4>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <center>
                            <h4 class="mt-0 header-title">Actualizacion de Curso</h4>
                        </center>
                        <div class="row">
                            <div class="col-lg-12">
                                <form id="form_curso_mod" method="post">
                                <div class="form-group row">
                                        <label for="example-text-input" class="col-sm-4 col-form-label text-right">Nombre del curos y/o disciplina <font color="red">*</font></label>
                                        <div class="col-sm-8">
                                            <input type="hidden" name="id_curso" id="id_curso" value="<?php echo $id_curso?>">
                                            <input class="form-control" type="text" id="nombre_curso" value="<?php echo $nombre_curso_disciplina;?>" name="nombre_curso" onkeyup="javascript:this.value=this.value.toUpperCase();" autocomplete="off">
                                            <small id="alert-nombre_curso" class="form-text"></small>
                                        </div>
                                    </div> 
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label text-right">Institución</label>
                                        <div class="col-sm-8">
                                            <select class="form-control" id="id_institucion" name="id_institucion">
                                            <option value="none" selected="selected">-- Seleccione una opción --</option>
                                                <?php foreach ($avaladores as $key => $alavador) { ?>
                                                <option <?php if($alavador->id_institucion == $institu){ echo 'selected="selected"'; } ?> value="<?php echo $alavador->id_institucion ?>"><?php echo $alavador->acronimo?> </option>
                                                <?php } ?>
                                            </select>
                                            <small id="alert-id_institucion" class="form-text"></small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-sm-4 col-form-label text-right">Precio c/Iva <font color="red">*</font></label>
                                        <div class="col-sm-8">
                                            <input class="form-control" type="number" step="any" id="precio" value="<?php echo $precio_iva;?>" name="precio" onkeyup="javascript:this.value=this.value.toUpperCase();" autocomplete="off">
                                            <small id="alert-precio" class="form-text"></small>
                                        </div>
                                    </div>                                    
                                    <div class="form-group row">
                                        <button type="submit" name="submit" id="submit" value="user_register" class="btn btn-gradient-primary waves-effect waves-light">Actualizar</button>
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
    //pace.avaladores.init_consulta_avaladores();
    pace.cursos.valida_formulario_add_cursos();
</script>
</body>

</html>