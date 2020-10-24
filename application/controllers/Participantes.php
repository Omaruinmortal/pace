<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Participantes extends CI_Controller
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
        $this->load->model('participante');
        $this->load->model('admin');
        date_default_timezone_set('America/Mexico_City');
    }
    public function index() {
        echo 'a';
    }

    public function agrega_participante()
    {
        if ($this->input->is_ajax_request()) {
            $nombre = $this->input->post("nombre");
            $primerApellido = $this->input->post("primer_apellido");
            $segundoApellido = $this->input->post("segundo_apellido");
            $correo = $this->input->post("correo");
            $telefono = $this->input->post("telefono");
            $id_curso = $this->input->post("id_curso");
           
            $this->form_validation->set_rules('nombre', 'Nombre', 'required');
            $this->form_validation->set_rules('primer_apellido', 'Primer Apellido', 'required');
            $this->form_validation->set_rules('correo', 'Correo', 'required|valid_email');
            $this->form_validation->set_rules('telefono', 'telefono', 'required');

            if ($this->form_validation->run() == TRUE) {
                $sql = "INSERT INTO tbl_participantes (nombre, primer_apellido, segundo_apellido, correo, telefono, id_curso, id_usuario_registro)
                values ('" . $nombre . "','" . $primerApellido . "','" . $segundoApellido . "','" . $correo . "'," . $telefono . ",'" . $id_curso . "','" . $this->session->userdata('user_id_tipoUsuario') . "')";
                $this->participante->guarda_participante($sql);
                $array = array(
                    'success' => 'OK'
                );
            } else {
                $array = array(
                    'error' => true,
                    'nombre_error' => form_error('nombre', null, null),
                    'primer_apellido_error' => form_error('primer_apellido', null, null),
                    'correo_error' => form_error('correo', null, null),
                    'telefono_error' => form_error('telefono', null, null)                    
                );
            }

            echo json_encode($array);
        }
    }

    public function elimina_participante()
    {
        $id_usuario = $this->input->post('id', TRUE);
        $this->main->elimina_usuario($id_usuario);
        echo 'true';
    }

   
    public function trae_participantes_curso()
    {
        $data = array();
        $curso=$this->input->get("curso");
        $where = "id_curso=".$curso;
        $datos = $this->participante->trae_participantes($where);
        foreach ($datos as $row) {
            $data[] = array(
                $row->nombre . ' ' . $row->primer_apellido . ' ' . $row->segundo_apellido,
                $row->correo,
                '<button type="button" id="btn_eliminar_usuario" data-id="' . $row->id_participante . '" title="Eliminar" class="tabledit-delete-button btn btn-sm btn-danger" style="float: none; margin: 4px;"><span class="ti-trash"></span></button>

                <button type="button" id="btn_papeleria_usuario" data-id="' . $row->id_participante . '" title="Papeleria" class="tabledit-papeleria-button btn btn-sm btn-success" style="float: none; margin: 4px;"><span class="ti-files"></span></button>
                '
            );           
        }
        $result = array(
            "data" => $data
        );
        echo json_encode($result);
    }

}
