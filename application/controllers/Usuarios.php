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
                    'success' => 'OK'
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

    public function elimina_usuario()
    {
        $id_usuario = $this->input->post('id', TRUE);
        $this->main->elimina_usuario($id_usuario);
        echo 'true';
    }

    public function modifica_usuario()
    {
        if ($this->input->is_ajax_request()) {
            $id_usuario = $this->input->post("id_usuario");
            $nombre = $this->input->post("nombre");
            $primerApellido = $this->input->post("primerApellido");
            $segundoApellido = $this->input->post("segundoApellido");
            $correo = $this->input->post("correo");
            $telefono = $this->input->post("telefono");
            $usuario = $this->input->post("usuario");
            $contrasenia = $this->input->post("contrasenia");
            $recontrasenia = $this->input->post("recontrasenia");
            $id_tipousuarios = $this->input->post("id_tipousuarios");

            $where_trae_usuario = 'id_usuario='.$id_usuario;
            $usuario = $this->main->trae_usuario($where_trae_usuario);
            foreach ($usuario as $key) {
                $old_contrasenia = $key->contrasenia;
            }
            
            if ($contrasenia != $old_contrasenia){
                $contrasenia = md5($contrasenia);
            }

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
                //aqui pendiente agregar variables a array DATA de modelo

                $sql = "UPDATE tbl_usuarios SET 
                        nombre='".$nombre."',
                        primerApellido='".$primerApellido."',
                        segundoApellido='".$segundoApellido."',
                        correo='".$correo."',
                        telefono='".$telefono."',
                        contrasenia='".$contrasenia."',
                        id_tipoUsuario='".$id_tipousuarios."'
                        WHERE id_usuario='".$id_usuario."'";
                $this->main->modifica_usuario($sql);
                $array = array(
                    'success' => 'OK'
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
        $where = "";
        $datos = $this->main->trae_usuarios($where);
        foreach ($datos as $row) {
            $where_tipo_usuario = 'id_tipoUsuario = ' . $row->id_tipoUsuario;
            $tipo_usuario = $this->main->trae_tipoUsuarios($where_tipo_usuario);
            $data[] = array(
                $row->nombre . ' ' . $row->primerApellido . ' ' . $row->segundoApellido,
                $row->correo,
                $row->usuario,
                $tipo_usuario[0]->tipo_usuario,
                '<button type="button" id="btn_modifica_usuario" data-id="' . $row->id_usuario . '"  title="Modificar" class="tabledit-edit-button btn btn-sm btn-info" style="float: none; margin: 4px;"><span class="ti-pencil"></span></button>
                <button type="button" id="btn_eliminar_usuario" data-id="' . $row->id_usuario . '" title="Eliminar" class="tabledit-delete-button btn btn-sm btn-danger" style="float: none; margin: 4px;"><span class="ti-trash"></span></button>'
            );
        }
        $result = array(
            "data" => $data
        );
        echo json_encode($result);
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
