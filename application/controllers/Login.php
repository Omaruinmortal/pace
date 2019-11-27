<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		//Carga libreria para validar
		$this->load->library('form_validation');
		//Carga mdoelo de Autentificacion de usuario
		$this->load->model('admin');
		$this->load->helper('url');
	}
	public function index()
	{
		if ($this->admin->logged_id()) {
			//jika memang session sudah terdaftar, maka redirect ke halaman dahsboard
			redirect("dashboard");
		} else {
			//set form validation
			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			//set message form validation
			$this->form_validation->set_message('required', '<div class="alert alert-danger" style="margin-top: 3px">
			<div class="header"><b><i class="fa fa-exclamation-circle"></i> {field}</b> incorrecto</div></div>');
			//cek validasi
			if ($this->form_validation->run() == TRUE) {
				//get data dari FORM

				$username = $this->input->post("username", TRUE);
				$password = MD5($this->input->post('password', TRUE));

				//checking data via model
				$checking = $this->admin->check_login('tbl_usuarios', array('usuario' => $username), array('contrasenia' => $password));

				//jika ditemukan, maka create session
				if ($checking != FALSE) {
					foreach ($checking as $apps) {

						$session_data = array(
							'user_id'   => $apps->id_usuario,
							'user_name' => $apps->usuario,
							'user_id_tipoUsuario' => $apps->id_tipoUsuario,

						);
						//set session userdata
						$this->session->set_userdata($session_data);

						redirect('dashboard/');
					}
				} else {
					$data['error'] = '<div class="alert icon-custom-alert alert-outline-pink b-round fade show" role="alert" id="alert_login">                                            
					<i class="mdi mdi-alert-outline alert-icon"></i>
					<div class="alert-text">
						<strong>Error!</strong>  Usuario y/o Contraseña incorrectos.
					</div>					
					<div class="alert-close">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true"><i class="mdi mdi-close text-danger"></i></span>
						</button>
					</div>
					</div>';
					$this->load->view('login', $data);
				}
			} else {
				$this->load->view('login');
			}
		}
	}
}
