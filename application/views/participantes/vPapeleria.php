<div class="page-content">
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="float-right">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item "><a href="<?php echo base_url() ?>index.php/dashboard/">Dashboard</a></li>
                            <li class="breadcrumb-item active">Curso</li>
                            <li class="breadcrumb-item ">Papelería</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Papelería del participante</h4>
                </div>
            </div>
        </div>

        <div class="row">            
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">Datos del curso:</h4>                        
                        <p class="text-muted mb-3 ">
                            <?php if($curso == 2){
                                echo 'Nombre de Institucion: <code>'.$nombre_institucion.'</code><br>';
                            }?>
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
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">Datos del participante:</h4>                        
                        <p class="text-muted mb-3 ">
                            Nombre del participante: <code><?php echo $nombre." ".$primer_apellido." ".$segundo_apellido;?></code><br>
                            Correo: <code><?php echo $correo;?></code><br>
                            Teléfono: <code><?php echo $telefono;?></code><br>
                        </p>
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>
            <!--end col-->
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <!--INICIO DE CONTENIDO-->

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="row">
                                <?php $i=0; foreach ($papeleria_curso as $dato):?>
                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">
                                        <div class="card card_papeleria" id="papeleria<?php echo $i; ?>">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-2 align-self-center">
                                                        <div class="icon-info">
                                                            <i class="mdi mdi-file-multiple text-blue"></i>
                                                        </div>
                                                    </div>
                                                    <div class="col-10 align-self-center text-right" style="height: 120px">
                                                        <div class="ml-2">
                                                            <p class="mb-1 text-muted"><?= $dato->pap_nombre; ?></p>
                                                            <a href="<?php echo base_url()."index.php/Reportes/".$dato->pap_url."?pte=".$id_participante."&curso=".$id_curso; ?>" class="mt-0 mb-1" target="_blank">Descargar <i class="mdi mdi-file-multiple text-pink dripicons-download text-muted mr-2"></i></a><br>
                                                            <a href="<?php echo base_url()."index.php/Reportes/".$dato->pap_url."?pte=".$id_participante."&curso=".$id_curso; ?>" class="mt-0 mb-1" target="_blank">Visualizar<i class="dripicons-preview text-muted mr-2 text-pink"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end card-body-->
                                        </div>
                                        <!--end card-->
                                    </div>
                                    <!--end col-->
                                <?php $i++; endforeach; ?>
                            </div>
                        </div>

                        <!--FIN DE CONTENIDO-->
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