<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Solicitud_cursos extends CI_Controller
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
        $this->load->model('avalador');
        date_default_timezone_set('America/Mexico_City');
    }

    public function fecha_actual() 
    {
        $fecha_curso = $this->input->post('fecha_curso', TRUE);
        $sql = 'SELECT TIMESTAMPDIFF(DAY,CURDATE(),"'.$fecha_curso.'") AS DIAS;';
        $inst = $this->admin->trae_fecha_actual($sql);
        echo $inst[0]->DIAS;
    }


}