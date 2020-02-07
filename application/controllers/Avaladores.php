<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Avaladores extends CI_Controller
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
        $this->load->model('avalador');
        $this->load->model('admin');
        date_default_timezone_set('America/Mexico_City');
    }

    public function guarda_avalador() 
    {
        if ($this->input->is_ajax_request()) {
            $nombre_avalador = $this->input->post("nombre_avalador");
            

            $this->form_validation->set_rules('nombre_avalador', 'Nombre', 'required');
            

            $this->form_validation->set_message("nombre_avalador", "El campo nombre es requerido");

            if ($this->form_validation->run() == TRUE) {
                $sql = "INSERT INTO tbl_inst_avaladores (nombre_inst_avaladores)
                values ('" . $nombre_avalador . "')";
                
                $res = $this->avalador->guardar_avalador($sql);
                
                $array = array(
                    'success' => 'OK'
                );
            } else {
                $array = array(
                    'error' => true,
                    'nombre_error' => form_error('nombre_avalador', null, null),
                   
                );
            }

            echo json_encode($array);
        }
    }

}