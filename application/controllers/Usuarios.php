<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {
    
    private $defaultData = array(
        'title' => 'SISTEMA',
        'layout' => 'plantilla/lytDefault',
        'contentView' => 'vUndefined',
        'stylecss' => '',
    );

    private function _renderView($data = array()) {
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

    public function guarda_usuario() {

        die('1');      
        
    }

    public function valida_usuario_existente(){
        $usuario = $this->input->post('usuario', TRUE);
        $where = "usuario = '".$usuario."' and  visible = 1";
        $count = $this->main->trae_usuario_existente($where);
        echo $count;
    }
}