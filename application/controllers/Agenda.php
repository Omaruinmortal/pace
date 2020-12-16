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
        $this->load->model('agendam');

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


            $data['scripts'] = array('script_dashboard', 'script_agenda');
            $data['layout'] = 'plantilla/lytDefault';
            $data['contentView'] = 'agenda/add_activity';
            $this->_renderView($data);      

        }else{
            redirect("login");

        }
    }

    public function guardar_agenda(){
        if ($this->input->is_ajax_request()) {
            $tam_array = count($this->input->post("id_tema"));
            $curso     = $this->input->get("id");
            $array     = array();
            $exito=0;

            for ($i=0; $i < $tam_array; $i++) { 
                $id_tema = $this->input->post("id_tema")[$i];
                $ini = $this->input->post("ini")[$i];                
                $responsable = $this->input->post("responsable")[$i];
                $mat_obs = $this->input->post("mat_obs")[$i];
                $final = $this->input->post("ini")[$i+1];

                $this->form_validation->set_rules('id_tema[]', 'Tema', 'required');
                $this->form_validation->set_message("id_tema[]", "El campo tema es requerido");

                $this->form_validation->set_rules('ini[]', 'Fecha inicial', 'required');
                $this->form_validation->set_message("ini[]", "El campo de fecha inicial es requerido");

                //$this->form_validation->set_rules('final[]', 'Fecha final', 'required');
                //$this->form_validation->set_message("final[]", "El campo de fecha final es requerido");

                //$this->form_validation->set_rules('grupos[]', 'Grupo', 'required');
                //$this->form_validation->set_message("grupos[]", "El campo de grupo es requerido");


                if ($this->form_validation->run() == TRUE) {
                    $sql = "INSERT INTO tbl_agenda (agenda_id, hora_ini, hora_fin, tema_id, responsable, mat_obs)
                    values ('".$curso."','" . $ini . "','" . $final . "','" . $id_tema . "','" . $responsable . "','" . $mat_obs."')";

                    $res = $this->agendam->guardar_agenda($sql);                                  
                    $estado = array(
                        'success' => 'OK'
                    );
                    array_push($array, $estado); 
                    $exito+=1;

                } else {
                    $estado = array(
                        'error' => true,                    
                        'id_tema_error' => form_error('id_tema[]', null, null),
                        'id_fecha_inicial_error' => form_error('ini[]', null, null),
                        'id_fecha_final_error' => form_error('final[]', null, null),

                    );
                    array_push($array, $estado);
                    $exito-=1;
                }                          
   
            }
            if ($exito>0) {
                echo "exito";
            }else{
                echo "error";
            }
            //echo $exito;
            //echo json_encode($array); 

        }

    }

}