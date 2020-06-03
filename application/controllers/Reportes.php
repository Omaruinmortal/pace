<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Reportes extends CI_Controller
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

    public function carta_compromiso_acls()
    {
        $this->load->model('curso');
        $this->load->library('Mpdf');
        $data = array();
        $data['fecha_sede'] = '02/06/2020 Guanajuato REPM';
        $data['nombre'] = 'Omar Martínez Torres';
        $data['curso'] = 'ACLS';
        $data['nombre_participante'] = 'Omaru Martínez Torres';
        $this->mpdf->load('formatos_imprimir/pdf',$data);
    }
    
}