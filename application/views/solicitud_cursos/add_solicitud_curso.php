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
                            <li class="breadcrumb-item ">Pre NAC</li>
                            <li class="breadcrumb-item active">Pre Solicitud NAC</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Solicitud de Cursos</h4>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <center>
                            <h4 class="mt-0 header-title">Pre autorización de cruso (NAC)</h4>
                        </center>
                        <form id="form_usuario" method="post">
                        <div class="row">                        
                            <div class="col-lg-6">                          
                                <div class="form-group row">
                                        <label class="col-sm-4 col-form-label text-right">Tipo de Curso</label>
                                        <div class="col-sm-8">
                                            <select class="form-control" id="tipo_curso" name="tipo_curso">
                                                <option value="none" selected="selected">-- Seleccione una opción --</option>
                                                <?php foreach ($cursos as $key => $curso) { ?>
                                                    <option value="<?php echo $curso->id_curso; ?>"><?php echo $curso->nombre_curso_disciplina; ?></option>
                                                <?php } ?>
                                            </select>
                                            <small id="alert-tipousuarios" class="form-text"></small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-sm-4 col-form-label text-right">Fecha de Solicitud <font color="red">*</font></label>
                                        <div class="col-sm-8">
                                        <input class="form-control" namespace type="date" value="0" id="f_solicitud" name="f_solicitud">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-sm-4 col-form-label text-right">Ubicación del curso <font color="red">*</font></label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" rows="5" id="sede" name="sede" autocomplete="off"></textarea>
                                            <small id="alert-primerApellido" class="form-text"></small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label text-right">Estado</label>
                                        <div class="col-sm-8">
                                            <select class="form-control" id="id_tipousuarios" name="id_tipousuarios">
                                                <option value="none" selected="selected">-- Seleccione una opción --</option>
                                                <?php 
                                                foreach ($estados as $key => $estado) { ?>
                                                    <option value="<?php echo $estado->id; ?>"><?php echo $estado->nombre; ?></option>
                                                <?php } ?>
                                            </select>
                                            <small id="alert-tipousuarios" class="form-text"></small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label text-right">Ciudad</label>
                                        <div class="col-sm-8">
                                            <select class="form-control" id="id_tipousuarios" name="id_tipousuarios">
                                                <option value="none" selected="selected">-- Seleccione una opción --</option>
                                                <?php 
                                                foreach ($ciudades as $key => $ciudad) { ?>
                                                    <option value="<?php echo $ciudad->id; ?>"><?php echo $ciudad->nombre; ?></option>
                                                <?php } ?>
                                            </select>
                                            <small id="alert-tipousuarios" class="form-text"></small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-sm-4 col-form-label text-right">Numero de Participantes tentativo <font color="red">*</font></label>
                                        <div class="col-sm-4">
                                            <input class="form-control" type="number" id="n_participantes" name="n_participantes" onkeyup="javascript:this.value=this.value.toUpperCase();" autocomplete="off">
                                            <small id="alert-n_participantes" class="form-text"></small>
                                        </div>
                                        
                                    </div>
                                    <div class="form-group row" style="display: none;" id="f_factura">
                                        <label for="example-text-input" class="col-sm-4 col-form-label text-right">Subir Factura AHA <font color="red">*</font></label>
                                        <div class="col-sm-8">
                                            <input type="file" class="custom-file-input" id="customFileLang" lang="es">
                                            <label class="custom-file-label" for="customFileLang">Seleccionar Archivo</label>
                                        </div>
                                    </div> 
                                    <div>
                                    </div>                                   
                                    <div class="form-group row">
                                        <button type="submit" name="submit" id="submit" value="user_register" class="btn btn-gradient-primary waves-effect waves-light">Guardar</button>
                                    </div>
                                
                            </div> 
                            <div class="col-lg-6"></div>                       
                        </div>
                        </form>
                        <h2><?php if (isset($mensaje)) echo $mensaje; ?></h2>
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
    pace.solicitud_curso.init_solicitud_curso();
</script>
</body>

</html>