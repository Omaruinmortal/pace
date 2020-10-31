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
                            <h4 class="mt-0 header-title">Pre autorización de curso (NAC)</h4>
                        </center>
                        <form id="form_curso_solicitado" method="post">
                        <div class="row">                        
                            <div class="col-lg-6">   
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label text-right">Curso <font color="red">*</font></label>
                                        <div class="col-sm-8">
                                            <select class="form-control" id="curso" name="curso">
                                                <option value="none" selected="selected">-- Seleccione una opción --</option>
                                                <option value="1" >Abierto</option>
                                                <option value="2" >Cerrado</option>
                                            </select>
                                            <small id="alert-nombre_curso" class="form-text"></small>
                                        </div>
                                    </div>   
                                    <div class="form-group row" style="display: none;" id="input_nombre_institucion">
                                        <label for="example-text-input" class="col-sm-4 col-form-label text-right">Nombre de la Institución <font color="red">*</font></label>
                                        <div class="col-sm-8">
                                            <input class="form-control" type="text" id="nombre_institucion" name="nombre_institucion" onkeyup="javascript:this.value=this.value.toUpperCase();" autocomplete="off">
                                            <small id="alert-nombre_institucion" class="form-text"></small>
                                        </div>                                        
                                    </div>                    
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label text-right">Tipo de Curso <font color="red">*</font></label>
                                        <div class="col-sm-8">
                                            <select class="form-control" id="tipo_curso" name="tipo_curso">
                                                <option value="none" selected="selected">-- Seleccione una opción --</option>
                                                <?php foreach ($cursos as $key => $curso) { ?>
                                                    <option value="<?php echo $curso->id_curso; ?>"><?php echo $curso->nombre_curso_disciplina; ?></option>
                                                <?php } ?>
                                            </select>
                                            <small id="alert-tipo_curso" class="form-text"></small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                    
                                    <div class="repeater-default">
                                                <div data-repeater-list="fecha_solicitud">
                                                    <div data-repeater-item="">
                                                        <div class="form-group row d-flex align-items-end">                                                            
                                                            <label for="example-text-input" class="col-sm-6 col-form-label text-right">Fecha de Solicitud <font color="red">*</font></label>
                                                            <div class="col-sm-6">
                                                            <input class="form-control " namespace type="date" value="0" name="fecha_solicitud_curso">
                                                            <small id="alert-fecha_solicitud_curso" class="form-text"></small>
                                                            <span data-repeater-delete="" class="btn btn-gradient-danger btn-sm">
                                                                <span class="far fa-trash-alt mr-1"></span>
                                                            </span>
                                                        </div>
                                                        <div class="col-sm-1">
                                                           
                                                        </div><!--end col-->
                                                        </div><!--end row-->
                                                    </div><!--end /div-->
                                                </div><!--end repet-list-->
                                                <div class="form-group mb-0 row">
                                                    <div class="col-sm-12">
                                                        <span data-repeater-create="" class="btn btn-gradient-secondary">
                                                            <span class="fas fa-plus"></span> 
                                                        </span>
                                                    </div><!--end col-->
                                                </div><!--end row-->                                         
                                            </div> <!--end repeter--> 
                                    </div>

                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-sm-4 col-form-label text-right">Fecha de Solicitud <font color="red">*</font></label>
                                        <div class="col-sm-8">
                                        <input class="form-control" namespace type="date" value="0" id="fecha_solicitud_curso" name="fecha_solicitud_curso">
                                        <small id="alert-fecha_solicitud_curso" class="form-text"></small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-sm-4 col-form-label text-right">Ubicación del curso <font color="red">*</font></label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" rows="5" id="sede" name="sede" autocomplete="off"></textarea>
                                            <small id="alert-sede" class="form-text"></small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label text-right">Estado <font color="red">*</font></label>
                                        <div class="col-sm-8">
                                            <select class="form-control" id="id_estado" name="id_estado">
                                                <option value="none" selected="selected">-- Seleccione una opción --</option>
                                                <?php 
                                                foreach ($estados as $key => $estado) { ?>
                                                    <option value="<?php echo $estado->id; ?>"><?php echo $estado->nombre; ?></option>
                                                <?php } ?>
                                            </select>
                                            <small id="alert-id_estado" class="form-text"></small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label text-right">Ciudad <font color="red">*</font></label>
                                        <div class="col-sm-8">
                                            <select class="form-control" id="id_municipio" name="id_municipio">
                                                <option value="none" selected="selected">-- Seleccione una opción --</option>
                                                <?php 
                                                foreach ($ciudades as $key => $ciudad) { ?>
                                                    <option value="<?php echo $ciudad->id; ?>"><?php echo $ciudad->nombre; ?></option>
                                                <?php } ?>
                                            </select>
                                            <small id="alert-id_municipio" class="form-text"></small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-sm-4 col-form-label text-right">Numero de Participantes tentativo <font color="red">*</font></label>
                                        <div class="col-sm-4">
                                            <input class="form-control" type="number" id="numero_participantes" name="numero_participantes" onkeyup="javascript:this.value=this.value.toUpperCase();" autocomplete="off">
                                            <small id="alert-numero_participantes" class="form-text"></small>
                                        </div>
                                        
                                    </div>

                                    <div class="form-group row" style="display: ;" id="f_factura">
                                        <label for="example-text-input" class="col-sm-4 col-form-label text-right">Subir Factura AHA <font color="red">*</font></label>
                                        <div class="col-sm-8">
                                            <input type="file" class="custom-file-input" id="factura" name="factura" lang="es" data-max-size="2048">
                                            <label class="custom-file-label" id="nombre_archivo" for="customFileLang">Seleccionar Archivo (2MB)</label>
                                            <small id="alert-factura" class="form-text"></small>
                                        </div>
                                    </div> 
                                    <div>
                                    </div> 
                                    <div class="form-group row" style="display: none;" id="n_manu_factura">
                                        <label for="example-text-input" class="col-sm-4 col-form-label text-right">Agregar cantidad de manuales según factura. <font color="red">*</font></label>
                                        <div class="col-sm-4">
                                            <input class="form-control" type="number" id="manuales_seg_factura" name="manuales_seg_factura" onkeyup="javascript:this.value=this.value.toUpperCase();" autocomplete="off">
                                            <small id="alert-manuales_seg_factura" class="form-text"></small>
                                        </div>
                                    </div> 

                                    <div class="form-group row" style="display: ;" id="div_precio_tentativo">
                                        <label for="example-text-input" class="col-sm-4 col-form-label text-right">Precio tentativo</label>
                                        <div class="col-sm-4">
                                            <input class="form-control" type="number" id="precio_tentativo" name="precio_tentativo"  autocomplete="off" readonly>
                                        </div>
                                    </div>
                                                                  
                            </div> 
                            <div class="col-lg-6">
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-4 col-form-label text-right">Diseños de Carteles Disponibles<font color="red">*</font></label>
                                <div class="col-sm-8">
                                <?php foreach ($carteles as $key => $cartel) { ?>
                                    <div class="container">
                                    <div >
                                    <input type="radio" id="control-div-1" name="controlar-divs">
                                    <label for="control-div-1" class="col-sm-4"><?php echo $cartel->nombre_cartel; ?></label>
                                    <button type="button" id="btn_ver_cartel" data-id="<?php echo $cartel->archivo_cartel ?>"  title="Ver" data-toggle="modal" data-target=".bd-example-modal-lg" class="tabledit-edit-button btn btn-sm btn-success" style="float: none; margin: 4px;"><span class="fas fa-eye"></span></button>
                                    
                                    </div>                                  
                                    </div>
                                <?php } ?>
                                <small id="alert-radio_cartel" class="form-text"></small>
                                </div>
                                </div>
                            </div>                       
                        </div>
                        
                        <h2><?php if (isset($mensaje)) echo $mensaje; ?></h2>
                        <div class="form-group row">
                            <button type="submit" name="submit" id="submit" value="user_register" class="btn btn-gradient-primary waves-effect waves-light">Guardar</button>
                        </div>
                        </form> 
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
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
    <div class="modal-content" id="modal">
    
    </div>
</div>
</div>
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
<script src="<?php echo base_url(); ?>assets/plugins/repeater/jquery.repeater.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/repeater/jquery.repeater.min.js"></script>

<!-- App js -->
<script src="<?php echo base_url(); ?>assets/js/app.js"></script>
<script>
    pace.solicitud_curso.init_solicitud_curso();
    pace.solicitud_curso.valida_formulario_solicitud_curso();
    pace.solicitud_curso.submit_curso_solicitado();

    $(document).ready(function (){
        $('.repeater-default').repeater();

        $('.repeater-custom-show-hide').repeater({
            show: function () {
            $(this).slideDown();
            },
            hide: function (remove) {
            if (confirm('Are you sure you want to remove this item?')) {
                $(this).slideUp(remove);
            }
            }
        });
    })
</script>
</body>

</html>