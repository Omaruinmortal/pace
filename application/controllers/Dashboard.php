<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	private $defaultData = array(
        'title' => 'Pace  | Dashboard',
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
		
		$this->load->library('form_validation');
        $this->load->model('main');
		$this->load->model('admin');
		$this->load->model('avalador');
		$this->load->model('curso');
		$this->load->model('instructor');
		
        date_default_timezone_set('America/Mexico_City');
    }

	public function index()
	{
		if($this->admin->logged_id())
		{
			$data['id_tipousuario'] = $this->session->userdata('user_id_tipoUsuario');
			$where = '';
			$data['todos_usuarios'] = $this->main->cantidad_todos_usuarios($where);
			$data['todos_avaladores'] = $this->avalador->cantidad_todos_avaladores($where);
			$data['todos_cursos'] = $this->curso->cantidad_todos_cursos($where);
			$data['todos_intructores'] = $this->instructor->cantidad_todos_intructores($where);	
			$data['scripts'] = array('script_usuarios');
			$data['layout'] = 'plantilla/lytDefault';
			$data['contentView'] = 'dashboard';
			$this->_renderView($data);		

		}else{
			redirect("login");

		}
	}
	
	public function agrega_usuario()	{
		if($this->admin->logged_id())
		{
			$data = array();
			$data['id_tipousuario'] = $this->session->userdata('user_id_tipoUsuario');
			$tipo_usuario = $this->session->userdata('user_id_tipoUsuario');
			switch ($tipo_usuario) {
				case 1:
					$where = "1=1 and id_tipoUsuario < 5";
					break;
				case 2:
					$where = "1=1 and id_tipoUsuario > 1 and id_tipoUsuario < 5";
					break;
			}			
			$data['tipo_Usuarios']=$this->main->trae_tipoUsuarios($where);
			$data['scripts'] = array('script_usuarios');
			$data['layout'] = 'plantilla/lytDefault';
			$data['contentView'] = 'usuarios/add_usuario';
			$this->_renderView($data);		

		}else{		
			redirect("login");

		}
	}
	
	public function consulta_usuarios()	{
		if($this->admin->logged_id())
		{
			$data['id_tipousuario'] = $this->session->userdata('user_id_tipoUsuario');
			$data['scripts'] = array('script_usuarios');
			$data['layout'] = 'plantilla/lytDefault';
			$data['contentView'] = 'usuarios/consulta_usuarios';
			$this->_renderView($data);		

		}else{
			redirect("login");

		}
	}

	public function modifica_usuario($id)	{
        if($this->admin->logged_id())
		{
            
            $where_id_usuario = 'id_usuario = '.$id;
            $usuario = $this->main->trae_usuario($where_id_usuario);
			$data['id_usuario'] = $usuario[0]->id_usuario;
            $data['nombre'] = $usuario[0]->nombre;
            $data['primerApellido'] = $usuario[0]->primerApellido;
            $data['segundoApellido'] = $usuario[0]->segundoApellido;
            $data['correo'] = $usuario[0]->correo;
            $data['telefono'] = $usuario[0]->telefono;
            $data['usuario'] = $usuario[0]->usuario;
            $data['tipoU'] = $usuario[0]->id_tipoUsuario;
            $data['contrasenia'] = $usuario[0]->contrasenia;            
            $data['id_tipousuario'] = $this->session->userdata('user_id_tipoUsuario');
            $where = '1=1';
            $data['tipo_Usuarios']=$this->main->trae_tipoUsuarios($where);
            $data['scripts'] = array('script_usuarios');
            $data['layout'] = 'plantilla/lytDefault';
            $data['contentView'] = 'usuarios/modifica_usuario';
            $this->_renderView($data);		

		}else{
			redirect("login");

		}
		
    }
	
	public function agrega_avaladores()	{
		if($this->admin->logged_id())
		{
			$data['id_tipousuario'] = $this->session->userdata('user_id_tipoUsuario');
			$data['scripts'] = array('script_avaladores');
			$data['layout'] = 'plantilla/lytDefault';
			$data['contentView'] = 'avaladores/add_avaladores';
			$this->_renderView($data);		

		}else{
			redirect("login");

		}
	}

	public function consulta_avaladores()	{
		if($this->admin->logged_id())
		{
			$data['id_tipousuario'] = $this->session->userdata('user_id_tipoUsuario');
			$data['scripts'] = array('script_avaladores');
			$data['layout'] = 'plantilla/lytDefault';
			$data['contentView'] = 'avaladores/consulta_avaladores';
			$this->_renderView($data);		

		}else{
			redirect("login");

		}
	}

	public function modifica_avalador($id)	{
        if($this->admin->logged_id())
		{
            
            $where_id_avalador = 'id_institucion = '.$id;
			$usuario = $this->avalador->trae_avalador($where_id_avalador);
			$data['id_tipousuario'] = $this->session->userdata('user_id_tipoUsuario');
			$data['id_institucion'] = $usuario[0]->id_institucion;
			$data['nombre_completo'] = $usuario[0]->nombre_completo;
			$data['acronimo'] = $usuario[0]->acronimo;
            $data['scripts'] = array('script_avaladores');
            $data['layout'] = 'plantilla/lytDefault';
            $data['contentView'] = 'avaladores/modifica_avalador';
            $this->_renderView($data);		

		}else{
			redirect("login");

		}
		
	}
	
	public function agrega_cursos()	{
		if($this->admin->logged_id())
		{
			$data['id_tipousuario'] = $this->session->userdata('user_id_tipoUsuario');
			$where = '1=1';
			$data['instituciones']=$this->avalador->trae_avaladores($where);
			$data['scripts'] = array('script_cursos');
			$data['layout'] = 'plantilla/lytDefault';
			$data['contentView'] = 'cursos/add_cursos';
			$this->_renderView($data);		

		}else{
			redirect("login");

		}
	}

	public function consulta_cursos()	{
		if($this->admin->logged_id())
		{
			$data['id_tipousuario'] = $this->session->userdata('user_id_tipoUsuario');
			$data['scripts'] = array('script_cursos');
			$data['layout'] = 'plantilla/lytDefault';
			$data['contentView'] = 'cursos/consulta_cursos';
			$this->_renderView($data);		

		}else{
			redirect("login");

		}
	}

	public function modifica_curso($id)	{
        if($this->admin->logged_id())
		{
            
            $where_id_curso = 'id_curso = '.$id;
			$usuario = $this->curso->trae_curso($where_id_curso);
			$data['id_tipousuario'] = $this->session->userdata('user_id_tipoUsuario');
			$data['id_curso'] = $usuario[0]->id_curso;
			$data['nombre_curso_disciplina'] = $usuario[0]->nombre_curso_disciplina;
			$data['institu'] = $usuario[0]->id_institucion;
			$data['precio_iva'] = $usuario[0]->precio_iva;
			$where = '1=1';
            $data['avaladores']=$this->avalador->trae_avaladores($where);
            $data['scripts'] = array('script_cursos');
            $data['layout'] = 'plantilla/lytDefault';
            $data['contentView'] = 'cursos/modifica_curso';
            $this->_renderView($data);		

		}else{
			redirect("login");

		}
		
	}

	public function agrega_instructores()	{
		if($this->admin->logged_id())
		{
			$data['id_tipousuario'] = $this->session->userdata('user_id_tipoUsuario');
			$where = '1=1';
			$data['instituciones']=$this->avalador->trae_avaladores($where);
			$data['scripts'] = array('script_instructores');
			$data['layout'] = 'plantilla/lytDefault';
			$data['contentView'] = 'instructores/add_instructor';
			$this->_renderView($data);		

		}else{
			redirect("login");

		}
	}

	public function consulta_instructores()	{
		if($this->admin->logged_id())
		{
			$data['id_tipousuario'] = $this->session->userdata('user_id_tipoUsuario');
			$data['scripts'] = array('script_instructores');
			$data['layout'] = 'plantilla/lytDefault';
			$data['contentView'] = 'instructores/consulta_instructores';
			$this->_renderView($data);		

		}else{
			redirect("login");

		}
	}


	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}

}
