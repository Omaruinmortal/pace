<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Usuarios extends CI_Controller
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
        $this->load->model('main');
        $this->load->model('admin');
        date_default_timezone_set('America/Mexico_City');
    }

    public function guarda_usuario()
    {
        if ($this->input->is_ajax_request()) {
            $nombre = $this->input->post("nombre");
            $primerApellido = $this->input->post("primerApellido");
            $segundoApellido = $this->input->post("segundoApellido");
            $correo = $this->input->post("correo");
            $telefono = $this->input->post("telefono");
            $usuario = $this->input->post("usuario");
            $contrasenia = $this->input->post("contrasenia");
            $recontrasenia = $this->input->post("recontrasenia");
            $id_tipousuarios = $this->input->post("id_tipousuarios");

            $this->form_validation->set_rules('nombre', 'Nombre', 'required');
            $this->form_validation->set_rules('primerApellido', 'primerApellido', 'required');
            $this->form_validation->set_rules('correo', 'Correo', 'required|valid_email');
            $this->form_validation->set_rules('telefono', 'telefono', 'required');
            $this->form_validation->set_rules('usuario', 'usuario', 'required');
            $this->form_validation->set_rules('contrasenia', 'contrasenia', 'required');
            $this->form_validation->set_rules('recontrasenia', 'recontrasenia', 'required');
            $this->form_validation->set_rules('id_tipousuarios', 'id_tipousuarios', 'required|callback_select_validate');

            $this->form_validation->set_message("nombre", "El campo nombre es requerido");
            $this->form_validation->set_message("primerApellido", "El campo Primer Apellido es requerido");
            $this->form_validation->set_message("correo", "El campo Correo es requerido");
            $this->form_validation->set_message("telefono", "El campo Telefono es requerido");
            $this->form_validation->set_message("usuario", "El campo Usuario es requerido");
            $this->form_validation->set_message("contrasenia", "El campo Contraseña es requerido");
            $this->form_validation->set_message("recontrasenia", "El campo Re-contraseña es requerido");
            $this->form_validation->set_message("id_tipousuarios", "El campo Tipo de Usuario es requerido");

            if ($this->form_validation->run() == TRUE) {
                $sql = "INSERT INTO tbl_usuarios (nombre, primerApellido, segundoApellido, correo, telefono, usuario, contrasenia, id_tipoUsuario, id_usuario_creo)
                values ('" . $nombre . "','" . $primerApellido . "','" . $segundoApellido . "','" . $correo . "'," . $telefono . ",'" . $usuario . "','" . md5($contrasenia) . "','" . $id_tipousuarios . "','" . $this->session->userdata('user_id_tipoUsuario') . "')";
                $this->main->guardar_usuario($sql);
                $array = array(
                    'success' => '<div class="alert alert-success">Se guardo con exíto</div>'
                );
            } else {
                $array = array(
                    'error' => true,
                    'nombre_error' => form_error('nombre', null, null),
                    'primerApellido_error' => form_error('primerApellido', null, null),
                    'correo_error' => form_error('correo', null, null),
                    'telefono_error' => form_error('telefono', null, null),
                    'usuario_error' => form_error('usuario', null, null),
                    'contrasenia_error' => form_error('contrasenia', null, null),
                    'recontrasenia_error' => form_error('recontrasenia', null, null),
                    'id_tipousuarios_error' => form_error('id_tipousuarios', null, null),
                );
            }

            echo json_encode($array);
        }
    }

    public function trae_usuarios()
    {
        
    }

    public function valida_usuario_existente()
    {
        $usuario = $this->input->post('usuario', TRUE);
        $where = "usuario = '" . $usuario . "' and  visible = 1";
        $count = $this->main->trae_usuario_existente($where);
        echo $count;
    }

    public function select_validate($abcd)
    {
        // 'none' is the first option that is default "-------Choose City-------"
        if ($abcd == "none") {
            $this->form_validation->set_message('select_validate', 'Debe seleccionar un tipo de usuario');
            return false;
        } else {
            // User picked something.
            return true;
        }
    }
}
