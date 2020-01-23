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
			$data['scripts'] = array('validaciones');
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


	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}

}
