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
        $this->load->model('avalador');
        date_default_timezone_set('America/Mexico_City');
    }

    public function guarda_curso_solicitado() 
    {
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
            $this->form_validation->set_rules('factura', 'Factura', 'required');            
            $this->form_validation->set_rules('manuales_seg_factura', 'Manuales Factura', 'required');            

            $this->form_validation->set_message("curso", "El curso es requerido");
            $this->form_validation->set_message("tipo_curso", "El tipo de curso es requerido");
            $this->form_validation->set_message("fecha_solicitud_curso", "La fecha de solicitud de curso es requerido");
            $this->form_validation->set_message("sede", "LA ubicación del curso es requerido");
            $this->form_validation->set_message("id_estado", "El Estado es requerido");
            $this->form_validation->set_message("id_municipio", "El Municipio es requerido");
            $this->form_validation->set_message("numero_participantes", "El numero de participantes es requerido");
            $this->form_validation->set_message("factura", "La factura es requerida");
            $this->form_validation->set_message("manuales_seg_factura", "La cantidad de manuales por factura es requerida");

            if($curso == '2'){
                $this->form_validation->set_rules('nombre_institucion', 'Nombre Institución', 'required'); 
                $this->form_validation->set_message("nombre_institucion", "El Nombre completo de institución es requerido");
            }

            if ($this->form_validation->run() == TRUE) { 
                               
                $array = array(
                    'success' => 'OK'
                );
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
