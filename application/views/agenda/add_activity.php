<style type="text/css">
    .div_temas{
        text-align: left;
        padding-bottom: 1%;
        padding-top: 1%;
    }
    .div_temas>span:first-child{
        font-weight: bold;
    }

    .div_temas:nth-child(odd) {
        background-color: #ffcd9e;
    }

    .div_temas:nth-child(even) {
        background-color: #e1edc5;
    }
    #mat_obs{
        height: 100px
    }
    #id_tema{
        display: none;
    }
    #enviar_agenda{
        margin-top: 2%;
        float: right;
    }

    
</style>
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
                            <li class="breadcrumb-item ">Agrega Participantes</li>
                            <li class="breadcrumb-item active">Agenda del curso</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Agenda del curso</h4>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <center><h3>Agenda <?=$curso_name;?></h3></center>
                        <form>
                        <div class="row">
                                                             <?php 
                                 foreach ($datos_tipo_curso as $datos):
                                 ?>
                                 <div class="col-lg-12 div_temas row">
                                    <div class="col-lg-3">
                                     <span><?=$datos->desc_title." ".$datos->desc_tema;?></span>
                                     <input type="text" name="id_tema" id="id_tema" value="<?=$datos->id_tema;?>">

                                     <?php 
                                     $array_subtemas=json_decode($datos->subtemas, true);
                                     $subtemas_find = $array_subtemas['subtemas']['name_subtema'];

                                     if ($subtemas_find!=""):
                                         $array_subtemas = explode(',', $subtemas_find);

                                         foreach ($array_subtemas as $key => $index):?>
                                            <li>
                                                <ol>
                                                    <?=$index;?>                                                    
                                                </ol>
                                            </li>

                                         <?php endforeach; 
                                     endif;
                                     ?>
                                     </div>
                                     <div class="col-lg-3">
                                        <label for="ini" class="">Hora de inicio</label>
                                        <input class="form-control" type="time" name="ini" id="ini" required="">
                                        <label for="final" class="">Hora final</label>
                                        <input class="form-control" type="time" name="final" required="">
                                     </div>                                     
                                     <div class="col-lg-3">
                                        <label for="responsable" class="">Responsable</label>
                                        <input class="form-control" type="text" id="responsable" name="responsable" autocomplete="off" required="">
                                     </div>
                                     <div class="col-lg-3">
                                        <label for="mat_obs">Material y observaciones</label>
                                        <textarea class="form-control" name="mat_obs" id="mat_obs" required="">
                                            
                                        </textarea>                                        
                                     </div>                              
                                 </div>                             

                                 <?php                            
                                 endforeach;
                                 ?> 
                        </div>
                        <button type="submit" class="btn btn-md btn-primary" id="enviar_agenda">Guardar agenda</button>
                        </form>                           
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

</body>

</html>