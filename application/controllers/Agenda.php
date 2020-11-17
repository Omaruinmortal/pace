<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Agenda extends CI_Controller
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
        
        $this->load->library('form_validation');
        $this->load->model('main');
        $this->load->model('admin');
        $this->load->model('avalador');
        $this->load->model('curso');
        $this->load->model('instructor');
        $this->load->model('cartel');
        $this->load->model('curso_solicitado');
        $this->load->model('participante');
        $this->load->model('temas');

        $date_actual=$this->admin->trae_fecha_actual("select CURDATE()");       
        date_default_timezone_set('America/Mexico_City');
    }

    public function index()
    {
        if($this->admin->logged_id())
        {
            $id_curso = isset($_GET['id_curso']) ? $_GET['id_curso'] : 0;

            //solicito el tipo de curso que se solicito 
            $where_sol   = "id_curso_solicitado=".$id_curso;
            $datos_tipo_curso = $this->curso_solicitado->trae_cursos_solicitados($where_sol);            
                                  

            //Trae listado de tema del tipo de curso
            $tipo_curso  = $datos_tipo_curso[0]->tipo_curso;
            $where_listado_temas = "tipo_curso=".$tipo_curso;
            $datos_tipo_curso = $this->temas->trae_temas_curso($where_listado_temas);
            $data['datos_tipo_curso'] = $datos_tipo_curso;

            //Trae el nombre del curso
            $where_type   = "id_curso=".$tipo_curso;
            $curso_name = $this->curso->trae_un_curso($where_type); 
            $data['curso_name'] = $curso_name ->nombre_curso_disciplina;


            $data['id_tipousuario'] = $this->session->userdata('user_id_tipoUsuario');
            $where = '';


            $data['scripts'] = array('script_dashboard');
            $data['layout'] = 'plantilla/lytDefault';
            $data['contentView'] = 'agenda/add_activity';
            $this->_renderView($data);      

        }else{
            redirect("login");

        }
    }

}