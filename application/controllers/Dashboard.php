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
		
        date_default_timezone_set('America/Mexico_City');
    }

	public function index()
	{
		if($this->admin->logged_id())
		{
			$data['id_tipousuario'] = $this->session->userdata('user_id_tipoUsuario');
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
	
	


	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}

}
