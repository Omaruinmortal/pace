<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cursos_solicitados extends CI_Controller
{

    private $defaultData = array(
        'title' => 'SISTEMA',
        'layout' => 'plantilla/lytDefault',
        'contentView' => 'vUndefined',
        'stylecss' => '',
    );

    private function _renderView($data = array())
    {
        $data = array_merge($this->defaultData, $data);
        $this->load->view($data['layout'], $data);
        //$this->removeCache();
        //ejemplo
    }

    public function __construct()
    {
        parent::__construct();
        //load model admin
        $this->load->library('form_validation');
        $this->load->model('curso');
        $this->load->model('admin');
        $this->load->model('main');
        $this->load->model('avalador');
        $this->load->model('curso_solicitado');
        date_default_timezone_set('America/Mexico_City');
    }

    public function guarda_curso_solicitado(){

        if ($this->input->is_ajax_request()) {

            $curso = $this->input->post("curso");
            $nombre_institucion = $this->input->post("nombre_institucion");
            $tipo_curso = $this->input->post("tipo_curso");
            $fecha_solicitud_curso = $this->input->post("fecha_solicitud_curso");
            $sede = $this->input->post("sede");
            $id_estado = $this->input->post("id_estado");
            $id_municipio = $this->input->post("id_municipio");
            $numero_participantes = $this->input->post("numero_participantes");
            $factura = $this->input->post("factura");
            $manuales_seg_factura = $this->input->post("manuales_seg_factura");
            $precio_tentativo = $this->input->post("precio_tentativo");

            $this->form_validation->set_rules('curso', 'Curso', 'required|callback_select_validate');
            $this->form_validation->set_rules('tipo_curso', 'Tipo de Curso', 'required|callback_select_validate');
            $this->form_validation->set_rules('fecha_solicitud_curso', 'Fecha de Solicitud de curso', 'required');
            $this->form_validation->set_rules('sede', 'Sede', 'required');
            $this->form_validation->set_rules('id_estado', 'Estado', 'required|callback_select_validate');
            $this->form_validation->set_rules('id_municipio', 'Municipio', 'required|callback_select_validate');
            $this->form_validation->set_rules('numero_participantes', 'Numero de Participantes', 'required');
            if (empty($_FILES['factura']['name']))
            {
                $this->form_validation->set_rules('factura', 'factura', 'required');
            }
            $this->form_validation->set_rules('manuales_seg_factura', 'Manuales Factura', 'required');




            if($curso == '2'){
                $this->form_validation->set_rules('nombre_institucion', 'Nombre Institución', 'required');
                $this->form_validation->set_message("nombre_institucion", "El Nombre completo de institución es requerido");
            }

            if ($this->form_validation->run() == TRUE) {
                if(isset($_FILES["factura"]['name'])){

                    $config['upload_path']      = './assets/facturas';
                    $config['allowed_types']    = 'pdf';
                    $config['max_size']         = '2048';
                    $config['encrypt_name']     = true;
                    $config['remove_spaces']    = true;

                    $this->load->library("upload",$config);
                    $this->upload->initialize($config);

                    if($this->upload->do_upload("factura")){
                        $data = $this->upload->data();

                        $sql = "INSERT INTO tbl_cursos_solicitados (curso, nombre_institucion, tipo_curso, fecha_solicitud_curso,sede,id_estado,id_municipio,numero_participantes,factura,manuales_seg_factura,precio_tentativo,id_usuario)
                        values (".$curso.",'".$nombre_institucion."',".$tipo_curso.",'".$fecha_solicitud_curso."','".$sede."',".$id_estado.",".$id_municipio.",".$numero_participantes.",'" . $data['file_name'] . "',".$manuales_seg_factura.",".$precio_tentativo.",".$this->session->userdata('user_id').")";

                        $res = $this->curso_solicitado->guarda_curso_solicitado($sql);

                        if($res == true){
                            $array = array(
                                'success' => 'OK'
                            );
                        }
                    }else{
                        $array = array(
                            'error' => true,
                            'archivo_error' => $this->upload->display_errors()
                        );
                    }

                }else{
                    $array = array(
                        'error' => true,
                        'archivo_error' => $this->upload->display_errors()
                    );
                }
            } else {
                $array = array(
                    'error' => true,
                    'curso' => form_error('curso', null, null),
                    'nombre_institucion' => form_error('nombre_institucion', null, null),
                    'tipo_curso' => form_error('tipo_curso', null, null),
                    'fecha_solicitud_curso' => form_error('fecha_solicitud_curso', null, null),
                    'sede' => form_error('sede', null, null),
                    'id_estado' => form_error('id_estado', null, null),
                    'id_municipio' => form_error('id_municipio', null, null),
                    'numero_participantes' => form_error('numero_participantes', null, null),
                    'factura' => form_error('factura', null, null),
                    'manuales_seg_factura' => form_error('manuales_seg_factura', null, null)
                );
            }

            echo json_encode($array);
        }
    }

    public function calendario_cursos() {
      $where = 'estado = 2 AND tipo_curso = tbl_cursos.`id_curso`';
      $respuesta_fechas_cursos = $this->curso_solicitado->trae_fechas_calendario($where);
      foreach($respuesta_fechas_cursos as $row) {
        $result[] = array(
          'id' => $row->id_curso_solicitado,
          'title' => $row->nombre_curso_disciplina.' '.$row->nombre_institucion,
          'start' => $row->fecha_solicitud_curso
        );
      }
      echo json_encode($result);
    }

    public function trae_cursos_solicitados() {

      $tipo_usuario = $this->session->userdata('user_id_tipoUsuario');
      $id_user = $this->session->userdata('user_id');


      $data = array();
      if($tipo_usuario == 1 || $tipo_usuario == 2 || $tipo_usuario == 3) {
        $where = " estado = 1";
        $datos = $this->curso_solicitado->trae_cursos_solicitados($where);

        foreach ($datos as $row) {
          $where_id_curso = 'id_curso = ' . $row->tipo_curso;
          $tipo_curso = $this->curso->trae_un_curso($where_id_curso);
            $data[] = array(
              $tipo_curso->nombre_curso_disciplina,
              $row->fecha_solicitud_curso,
              '<button type="button" id="btn_aprobar_curso" data-id="' . $row->id_curso_solicitado . '"  title="Aprobar Curso" class="tabledit-edit-button btn btn-sm btn-success" style="float: none; margin: 4px;"><span class="ti-check"></span></button>
              <button type="button" id="btn_denegar_curso" data-id="' . $row->id_curso_solicitado . '" title="Denegar Curso" class="tabledit-delete-button btn btn-sm btn-warning" style="float: none; margin: 4px;"><span class="ti-close"></span></button>'
            );
        }
      }elseif ($tipo_usuario == 4) {
        $where = " id_usuario = ".$id_user ;
        $datos = $this->curso_solicitado->trae_cursos_solicitados($where);

        foreach ($datos as $row) {
          $where_id_curso = 'id_curso = ' . $row->tipo_curso ;
          $tipo_curso = $this->curso->trae_un_curso($where_id_curso);
          $estado = $row->estado;
          // 1 = pendiente, 2 = Aceptado, 3 = Rechazado
          if($estado == 1){
            $status = '<span class="badge badge-soft-warning p-2">Pendiente</span>';
          }
          if($estado == 2){
            $status = '<button type="button" id="btn_agrega_participantes" data-id="' . $row->id_curso_solicitado . '"  title="Agregar Participantes" class="tabledit-edit-button btn btn-sm btn-success" style="float: none; margin: 4px;"><span class="typcn typcn-group-outline"></span></button> <button type="button" id="btn_pago_curso" data-id="' . $row->id_curso_solicitado . '"  title="Pagar Curso" class="tabledit-edit-button btn btn-sm btn-warning" style="float: none; margin: 4px;"><span class="ti-money"></span></button> <span class="badge badge-soft-success p-2">Aceptado</span>';
          }
          if($estado == 3){
            $status = '<button type="button" id="btn_mod_curso_solicitado" data-id="' . $row->id_curso_solicitado . '"  title="Modificar Curso" class="tabledit-edit-button btn btn-sm btn-success" style="float: none; margin: 4px;"><span class="ti-pencil"></span></button> <a type="button" id="btn_mensaje_rechazo" title="Da click para ver motivo de rechazo" data-id="' . $row->id_curso_solicitado . '"><span class="badge badge-soft-danger p-2">Rechazado</span></a>';
          }
            $data[] = array(
              $tipo_curso->nombre_curso_disciplina,
              $row->fecha_solicitud_curso,
              $status
            );
        }
      }

      $result = array(
          "data" => $data
      );
      echo json_encode($result);
    }

    public function denegar_curso() {
      $id_curso_solicitado = $this->input->post('id', TRUE);
      $mensaje = $this->input->post('mensaje', TRUE);

      $actualiza_estado = array(
	          'estado' => 3,
	      );
      $where_id_curso = 'id_curso_solicitado = '.$id_curso_solicitado;
      $tipo_curso = $this->curso_solicitado->modificar_curso_solicitado($actualiza_estado,$where_id_curso);
      if($tipo_curso){
        $agrega_rechazo = array(
  	          'id_curso_solicitado' => $id_curso_solicitado,
              'rechazo' => $mensaje[0],
              'status' => 3
  	      );
        $agrego_rechazo = $this->curso_solicitado->agrega_curso_rechazado($agrega_rechazo);
        if($agrego_rechazo){
          $array = array(
              'error' => false,
              'id_curso_solicitado' => $id_curso_solicitado,
              'mensaje' => $mensaje,
          );
        }else{
          $actualiza_estado = array(
    	          'estado' => 1,
    	      );
          $where_id_curso = 'id_curso_solicitado = '.$id_curso_solicitado;
          $tipo_curso = $this->curso_solicitado->modificar_curso_solicitado($actualiza_estado,$where_id_curso);

          $array = array(
              'error' => true,
              'mensaje' => 'No se agrego rechazo',
          );
        }


      }else{
        $array = array(
            'error' => true,
            'mensaje' => $mensaje,
        );
      }
      echo json_encode($array);
    }

    public function trae_mensaje_rechazo(){
        $id_curso_solicitado = $this->input->post('id', TRUE);

        $where_id_rechazo = 'id_curso_solicitado = ' . $id_curso_solicitado . ' and status = 3 ';
        $mensaje_rechazo = $this->curso_solicitado->trae_mensaje_rechazo($where_id_rechazo);

        if($mensaje_rechazo){
          $array = array(
              'error' => false,
              'mensaje' => $mensaje_rechazo->rechazo,
          );
        }else{
          $array = array(
              'error' => true,
              'mensaje' => 'Error al traer mensaje de rechazo',
          );
        }
        echo json_encode($array);

    }

    public function curso_aprobado() {
      $id_curso_solicitado = $this->input->post('id', TRUE);

      $where_id_curso_aprobado = 'id_curso_solicitado = ' . $id_curso_solicitado;
      $agregar_aprobacion = array(
            'estado' => 2
        );
      $mensaje_aprobacion= $this->curso_solicitado->aprobacion_curso($agregar_aprobacion,$where_id_curso_aprobado);

      if($mensaje_aprobacion){
        $array = array(
            'error' => false,
            'mensaje' => 'El curso se aceptó satisfactoriamente!',
        );
      }else{
        $array = array(
            'error' => true,
            'mensaje' => 'Error al traer mensaje de rechazo',
        );
      }
      echo json_encode($array);
    }

    public function select_validate($abcd)
    {
        // 'none' is the first option that is default "-------Choose City-------"
        if ($abcd == "none") {
            $this->form_validation->set_message('select_validate', 'Debe seleccionar una opción');
            return false;
        } else {
            // User picked something.
            return true;
        }
    }

}
