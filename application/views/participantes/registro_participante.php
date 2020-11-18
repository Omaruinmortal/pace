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
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-body">        
                                    <h5 class="mt-0 header-title">BIENVENIDO - Registro Programa de Actualización Continua en Emergencias Médicas </h5>
                                    <p class="text-muted mb-3">Es un registro que nos permita conocer sus datos personales y sus necesidades académicas, así como sus inquietudes.
                                    </p>                                    
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group row">
                                                <label for="nombre" class="col-sm-3 col-form-label text-right">Nombre :</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="text" name="nombre" id="nombre">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="primer_apellido" class="col-sm-3 col-form-label text-right">Primer Apellido :</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="text" name="primer_apellido" id="primer_apellido">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="Segundo Apellido" class="col-sm-3 col-form-label text-right">Segundo Apellido :</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="text" name="segundo_apellido" id="segundo_apellido">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="fecha_nacimiento" class="col-sm-3 col-form-label text-right">Fecha de Nacimiento</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="date" name="fecha_nacimiento" id="fecha_nacimiento">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-3 my-2 control-label text-right">Especialidad :</label>
                                                <div class="col-md-9">
                                                    <div class="checkbox my-2">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" id="customCheck09" data-parsley-multiple="groups" data-parsley-mincheck="2">
                                                            <label class="custom-control-label" for="customCheck09">Ginecologo</label>
                                                        </div>
                                                    </div>
                                                    <div class="checkbox my-2">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" id="customCheck01" data-parsley-multiple="groups" data-parsley-mincheck="2">
                                                            <label class="custom-control-label" for="customCheck01">Urgenciólogo</label>
                                                        </div>
                                                    </div>
                                                    <div class="checkbox my-2">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" id="customCheck02" data-parsley-multiple="groups" data-parsley-mincheck="2">
                                                            <label class="custom-control-label" for="customCheck02">Médico General</label>
                                                        </div>
                                                    </div>
                                                    <div class="checkbox my-2">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" id="customCheck03" data-parsley-multiple="groups" data-parsley-mincheck="2">
                                                            <label class="custom-control-label" for="customCheck03">Enfermero</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="tipo_enfermero" class="col-sm-4 col-form-label text-right">¿Tipo de enfermero? :</label>
                                                        <div class="col-sm-8">
                                                            <input class="form-control" type="text" name=tipo_enfermero" id=tipo_enfermero">
                                                        </div>
                                                    </div>
                                                    <div class="checkbox my-2">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" id="customCheck04" data-parsley-multiple="groups" data-parsley-mincheck="2">
                                                            <label class="custom-control-label" for="customCheck04">Residente :</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="tipo_recidente" class="col-sm-4 col-form-label text-right">¿Tipo de residente? :</label>
                                                        <div class="col-sm-8">
                                                            <input class="form-control" type="text" name=tipo_recidente" id=tipo_recidente">
                                                        </div>
                                                    </div>
                                                    <div class="checkbox my-2">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" id="customCheck05" data-parsley-multiple="groups" data-parsley-mincheck="2">
                                                            <label class="custom-control-label" for="customCheck05">Pediatra.</label>
                                                        </div>
                                                    </div>
                                                    <div class="checkbox my-2">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" id="customCheck06" data-parsley-multiple="groups" data-parsley-mincheck="2">
                                                            <label class="custom-control-label" for="customCheck06">T.U.M.</label>
                                                        </div>
                                                    </div>
                                                    <div class="checkbox my-2">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" id="customCheck07" data-parsley-multiple="groups" data-parsley-mincheck="2">
                                                            <label class="custom-control-label" for="customCheck07">T.E.M.</label>
                                                        </div>
                                                    </div>
                                                    <div class="checkbox my-2">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" id="customCheck10" data-parsley-multiple="groups" data-parsley-mincheck="2">
                                                            <label class="custom-control-label" for="customCheck10">Medico Intensivista</label>
                                                        </div>
                                                    </div>
                                                    <div class="checkbox my-2">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" id="customCheck08" data-parsley-multiple="groups" data-parsley-mincheck="2">
                                                            <label class="custom-control-label" for="customCheck08">Otro.</label>
                                                        </div>
                                                    </div>                                                    
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="otro_cual" class="col-sm-4 col-form-label text-right">¿Cuál? :</label>
                                                <div class="col-sm-8">
                                                    <input class="form-control" type="text" name=otro_cual" id=otro_cual">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="institucion" class="col-sm-3 col-form-label text-right">Institución :</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="text" name=institucion" id=institucion">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="hospital" class="col-sm-3 col-form-label text-right">Hospital :</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="text" name=hospital" id=hospital">
                                                </div>
                                            </div>  
                                            <div class="form-group row">
                                                <label for="ciudad" class="col-sm-3 col-form-label text-right">Ciudad :</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="text" name=ciudad" id=ciudad">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="jurisdiccion" class="col-sm-3 col-form-label text-right">Jurisdicción :</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="text" name=jurisdiccion" id=jurisdiccion">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="turno" class="col-sm-3 col-form-label text-right">Turno :</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="text" name=turno" id=turno">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="area_desempenio" class="col-sm-3 col-form-label text-right">Área de desempeño :</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="text" name=area_desempenio" id=area_desempenio">
                                                </div>
                                            </div>                        
                                        </div>


                                        
                                    </div>                                                                      
                                </div><!--end card-body-->
                            </div><!--end card-->
                            <div class="card">
                                <div class="card-body">        
                                    <h4>Domicilio personal</h4>                                 
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group row">
                                                <label for="calle" class="col-sm-3 col-form-label text-right">Calle :</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="text" name="calle" id="calle">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="n_exterior" class="col-sm-3 col-form-label text-right">Numero Exterior :</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="text" name="n_exterior" id="n_exterior">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="colonia" class="col-sm-3 col-form-label text-right">Colonia :</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="text" name="colonia" id="colonia">
                                                </div>
                                            </div>  
                                            <div class="form-group row">
                                                <label for="cp" class="col-sm-3 col-form-label text-right">Codigo Postal :</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="text" name="cp" id="cp">
                                                </div>
                                            </div>  
                                            <div class="form-group row">
                                                <label for="estado" class="col-sm-3 col-form-label text-right">Estado :</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="text" name="estado" id="estado">
                                                </div>
                                            </div>   
                                            <div class="form-group row">
                                                <label for="ciudad" class="col-sm-3 col-form-label text-right">Ciudad :</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="text" name="ciudad" id="ciudad">
                                                </div>
                                            </div>       
                                            <div class="form-group row">
                                                <label for="telefono" class="col-sm-3 col-form-label text-right">Teléfono (con lada) :</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="text" name="telefono" id="telefono">
                                                </div>
                                            </div> 
                                            <div class="form-group row">
                                                <label for="celular" class="col-sm-3 col-form-label text-right">Numero de Celular :</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="text" name="celular" id="celular">
                                                </div>
                                            </div>  
                                            <div class="form-group row">
                                                <label for="email" class="col-sm-3 col-form-label text-right">Correo Electronico :</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="text" name="email" id="email">
                                                </div>
                                            </div>   
                                           
                                            <div class="form-group row">
                                                <label class="col-md-3 my-2 control-label text-right">¿Cuáles son los cursos relacionados a Urgencias que ha tomado?</label>
                                                <div class="col-md-9">
                                                    <div class="checkbox my-2">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" id="customCheck09" data-parsley-multiple="groups" data-parsley-mincheck="2">
                                                            <label class="custom-control-label" for="customCheck09">RCP DEA</label>
                                                        </div>
                                                    </div>
                                                    <div class="checkbox my-2">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" id="customCheck09" data-parsley-multiple="groups" data-parsley-mincheck="2">
                                                            <label class="custom-control-label" for="customCheck09">ACLS</label>
                                                        </div>
                                                    </div>
                                                    <div class="checkbox my-2">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" id="customCheck09" data-parsley-multiple="groups" data-parsley-mincheck="2">
                                                            <label class="custom-control-label" for="customCheck09">BLS</label>
                                                        </div>
                                                    </div>
                                                    <div class="checkbox my-2">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" id="customCheck09" data-parsley-multiple="groups" data-parsley-mincheck="2">
                                                            <label class="custom-control-label" for="customCheck09">PALS</label>
                                                        </div>
                                                    </div>                                           
                                                </div>
                                            </div>  
                                            <div class="form-group row">
                                                <label for="message" class="col-sm-3 col-form-label text-right">¿Cuáles son los cursos en los que le gustaría participar en un futuro?</label>
                                                <textarea class="form-control" rows="5" id="message"></textarea>
                                            </div>  
                                            <div class="form-group row">
                                                <label for="message" class="col-sm-3 col-form-label text-right">Desarrolle brevemente las expectativas que tiene de este curso.</label>
                                                <textarea class="form-control" rows="5" id="message"></textarea>
                                            </div>   
                                        </div>                                       
                                    </div>                                                                      
                                </div><!--end card-body-->
                                <div class="row">
                                    <div class="col-sm-12 text-right">
                                        <button type="submit" class="btn btn-gradient-primary px-5 py-2">Guardar Registro</button>
                                    </div>
                                </div>
                            </div><!--end card-->
                            
                        </div><!--end col-->
                    </div>
                </div><!-- container -->            
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