<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Instructores extends CI_Controller
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
    }

    public function __construct()
    {
        parent::__construct();
        //load model admin
        $this->load->library('form_validation');
        $this->load->model('curso');
        $this->load->model('admin');
        $this->load->model('avalador');
        $this->load->model('instructor');
        date_default_timezone_set('America/Mexico_City');
    }

    public function trae_instructor()
    {
        $where = "";
        $datos = $this->instructor->trae_instructores($where);
        foreach ($datos as $row) {
            $data[] = array(
                $row->titulo .' '. $row->nombre_instructor .' '. $row->primer_apellido_instructor .' '. $row->segundo_apellido_instructor,
                $row->correo,
                $row->telefono,
                $row->id_institucion,
                '<button type="button" id="btn_modifica_usuario" data-id="' . $row->id_instructor . '"  title="Modificar" class="tabledit-edit-button btn btn-sm btn-info" style="float: none; margin: 4px;"><span class="ti-pencil"></span></button>
                <button type="button" id="btn_eliminar_usuario" data-id="' . $row->id_instructor . '" title="Eliminar" class="tabledit-delete-button btn btn-sm btn-danger" style="float: none; margin: 4px;"><span class="ti-trash"></span></button>'
            );
        }
        $result = array(
            "data" => $data
        );
        echo json_encode($result);
    }
    
}