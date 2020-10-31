<div class="page-content">
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="float-right">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item "><a href="<?php echo base_url() ?>index.php/dashboard/">Dashboard</a></li>
                            <li class="breadcrumb-item ">Curso</li>
                            <li class="breadcrumb-item active">Agrega Participantes</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Agrega Participantes</h4>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">Llenar datos de Participantes del curso:</h4>
                        <?php if($curso == 2){
                            echo '<p class="text-muted mb-3">Nombre de Institucion: '.$nombre_institucion.'</p>';
                        }?>
                        <p class="text-muted mb-3 ">
                            Nombre de Curso o Disciplina: <code><?php echo $nombre_curso_disciplina;?></code><br>
                            Fecha: <code><?php echo $fecha_solicitud_curso;?></code><br>
                            Sede: <code><?php echo $sede;?></code><br>
                            Estado: <code><?php echo $estado;?></code> Municipio: <code><?php echo $municipio;?></code>
                        </p>
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>
            <!--end col-->
            <div class="col-md-7">
                <div class="row">
                    <div id="demo" class="carousel slide col-xs-12 col-sm-12 col-md-12 col-lg-12" data-ride="carousel">
                        <!-- Indicators -->
                        <ul class="carousel-indicators">
                          <li data-target="#demo" data-slide-to="0" class="active"></li>
                          <li data-target="#demo" data-slide-to="1"></li>
                        </ul>
                
                        <!-- The slideshow -->
                        <div class="carousel-inner">
                            <?php
                            
                            $i=1;
                            $y=1;
                            
                            $divs="";
                            $doc_completo="";
                            
                            $tam_array=count($papeleria_curso);
                            
                            foreach ($papeleria_curso as $dato) {
                                if($y==3): $active = "active"; else: $active=""; endif;
                                
                                switch ($i){  
                                    case 1:
                                        if($y == $tam_array){
                                            $divs.= '
                                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                                                        <div class="card card_papeleria" id="papeleria'.$y.'">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-2 align-self-center">
                                                                        <div class="icon-info">
                                                                            <i class="mdi mdi-file-multiple text-blue"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-10 align-self-center text-right" style="height: 120px">
                                                                        <div class="ml-2">
                                                                            <p class="mb-1 text-muted">'.$dato->pap_nombre.'</p>
                                                                            <a href="'.base_url().'index.php/Reportes/'.$dato->pap_url.'?curso='.$id_curso.'" class="mt-0 mb-1" target="_blank">Descargar <i class="mdi mdi-file-multiple text-pink dripicons-download text-muted mr-2"></i></a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--end card-body-->
                                                        </div>
                                                        <!--end card-->
                                                    </div>
                                                    <!--end col-->
                                                    ';
                                                    
                                            $doc_completo.='
                                                    <div class="carousel-item '.$active.'">
                                                        <div class="row">'
                                                            .$divs.
                                                        '</div>
                                                    </div>
                                                    ';
                                                
                                            $divs="";
                                            $i=1;
                                        }else{
                                            $divs.= '
                                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                                                        <div class="card card_papeleria" id="papeleria'.$y.'">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-2 align-self-center">
                                                                        <div class="icon-info">
                                                                            <i class="mdi mdi-file-multiple text-blue"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-10 align-self-center text-right" style="height: 120px">
                                                                        <div class="ml-2">
                                                                            <p class="mb-1 text-muted">'.$dato->pap_nombre.'</p>
                                                                            <a href="'.base_url().'index.php/Reportes/'.$dato->pap_url.'?curso='.$id_curso.'" class="mt-0 mb-1" target="_blank">Descargar <i class="mdi mdi-file-multiple text-pink dripicons-download text-muted mr-2"></i></a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--end card-body-->
                                                        </div>
                                                        <!--end card-->
                                                    </div>
                                                    <!--end col-->
                                                    ';
                                            $i++;
                                        }
                                    break;
                                    
                                    case 2:
                                        if($y == $tam_array){
                                            $divs.= '
                                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                                                        <div class="card card_papeleria" id="papeleria'.$y.'">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-2 align-self-center">
                                                                        <div class="icon-info">
                                                                            <i class="mdi mdi-file-multiple text-blue"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-10 align-self-center text-right" style="height: 120px">
                                                                        <div class="ml-2">
                                                                            <p class="mb-1 text-muted">'.$dato->pap_nombre.'</p>
                                                                            <a href="'.base_url().'index.php/Reportes/'.$dato->pap_url.'?curso='.$id_curso.'" class="mt-0 mb-1" target="_blank">Descargar <i class="mdi mdi-file-multiple text-pink dripicons-download text-muted mr-2"></i></a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--end card-body-->
                                                        </div>
                                                        <!--end card-->
                                                    </div>
                                                    <!--end col-->
                                                    ';
                                                    
                                            $doc_completo.='
                                                    <div class="carousel-item '.$active.'">
                                                        <div class="row">'
                                                            .$divs.
                                                        '</div>
                                                    </div>
                                                    ';
                                                
                                            $divs="";
                                            $i=1;
                                        }else{
                                            $divs.= '
                                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                                                        <div class="card card_papeleria" id="papeleria'.$y.'">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-2 align-self-center">
                                                                        <div class="icon-info">
                                                                            <i class="mdi mdi-file-multiple text-blue"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-10 align-self-center text-right" style="height: 120px">
                                                                        <div class="ml-2">
                                                                            <p class="mb-1 text-muted">'.$dato->pap_nombre.'</p>
                                                                            <a href="'.base_url().'index.php/Reportes/'.$dato->pap_url.'?curso='.$id_curso.'" class="mt-0 mb-1" target="_blank">Descargar <i class="mdi mdi-file-multiple text-pink dripicons-download text-muted mr-2"></i></a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--end card-body-->
                                                        </div>
                                                        <!--end card-->
                                                    </div>
                                                    <!--end col-->
                                                    ';
                                            $i++;
                                        }
                                    break;
                                    
                                    case 3:
                                        $divs.= '
                                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                                                    <div class="card card_papeleria" id="papeleria'.$y.'">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-2 align-self-center">
                                                                    <div class="icon-info">
                                                                        <i class="mdi mdi-file-multiple text-blue"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="col-10 align-self-center text-right" style="height: 120px">
                                                                    <div class="ml-2">
                                                                        <p class="mb-1 text-muted">'.$dato->pap_nombre.'</p>
                                                                        <a href="'.base_url().'index.php/Reportes/'.$dato->pap_url.'?curso='.$id_curso.'" class="mt-0 mb-1" target="_blank">Descargar <i class="mdi mdi-file-multiple text-pink dripicons-download text-muted mr-2"></i></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--end card-body-->
                                                    </div>
                                                    <!--end card-->
                                                </div>
                                                <!--end col-->                                         
                                                ';
                                        $doc_completo.=
                                                '<div class="carousel-item '.$active.'">
                                                    <div class="row">'
                                                        .$divs.
                                                    '</div>
                                                </div>
                                                ';
                                        $divs="";
                                        $i=1;
                                    break;
                                }
                                $y++;
                            }
                            echo $doc_completo;
                            ?>                                                      
                        </div>

                        <!-- Left and right controls -->
                        <a class="carousel-control-prev" href="#demo" data-slide="prev">
                        <i class="fas fa-chevron-left" style="color:gray"></i>
                        </a>
                        <a class="carousel-control-next" href="#demo" data-slide="next">
                        <i class="fas fa-chevron-right" style="color:gray"></i>
                        </a>
                    </div>
                </div> 
                <!--end row-->                
            </div>
            <!--end col -->
        </div>
        <div class="row">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                    <form id="form_agrega_participante" method="post">
                    <div class="form-group row">  
                        <input type="hidden" id="num_participantes" name="numero_participantes" value="<?php echo $numero_participantes?>">
                        <input type="hidden" id="id_curso" name="id_curso" value="<?php echo $id_curso?>">
                        <label for="example-text-input" class="col-sm-4 col-form-label text-right">Nombre</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="text" id="nombre" name="nombre">
                            <small id="alert-nombre" class="form-text"></small>
                        </div>                           
                    </div>
                    <div class="form-group row">                         
                        <label for="example-text-input" class="col-sm-4 col-form-label text-right">Primer Apellido</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="text" id="primer_apellido" name="primer_apellido">
                            <small id="alert-primer_apellido" class="form-text"></small>
                        </div>                           
                    </div>
                    <div class="form-group row">                         
                        <label for="example-text-input" class="col-sm-4 col-form-label text-right">Segundo Apellido</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="text" id="segundo_apellido" name="segundo_apellido">
                            <small id="alert-segundo_apellido" class="form-text"></small>
                        </div>                           
                    </div>
                    <div class="form-group row">                         
                        <label for="example-text-input" class="col-sm-4 col-form-label text-right">Correo</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="email" id="correo" name="correo">
                            <small id="alert-correo" class="form-text"></small>
                        </div>                           
                    </div>
                    <div class="form-group row">                         
                        <label for="example-text-input" class="col-sm-4 col-form-label text-right">Telefono</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="text" id="telefono" name="telefono">
                            <small id="alert-telefono" class="form-text"></small>
                        </div>                           
                    </div>
                    <div class="form-group row">
                        <button type="submit" name="submit" id="submit" value="user_register" class="btn btn-gradient-primary waves-effect waves-light">Agregar</button>
                    </div>
                    </form>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">Tabla de participantes registradas</h4>
                        </p>
                        <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="datatable_participantes" class="table table-bordered dt-responsive nowrap dataTable no-footer dtr-inline" style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid" aria-describedby="datatable_info">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 149px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Nombre</th>
                                                <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 149px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Correo</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 10px;" aria-label="Start date: activate to sort column ascending"></th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           
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