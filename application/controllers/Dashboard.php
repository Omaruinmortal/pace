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
			$data['id_tipousuario'] = $this->session->userdata('user_id_tipoUsuario');
			$where = '';
			$data['todos_usuarios'] = $this->main->cantidad_todos_usuarios($where);
			$data['todos_avaladores'] = $this->avalador->cantidad_todos_avaladores($where);
			$data['todos_cursos'] = $this->curso->cantidad_todos_cursos($where);
			$data['todos_intructores'] = $this->instructor->cantidad_todos_intructores($where);
			$data['scripts'] = array('script_dashboard');
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

	public function solicitar_curso()
	{
		if($this->admin->logged_id())
		{
			$where_curso='1=1';
			$data['cursos'] = $this->curso->trae_curso($where_curso);
			$where_estado='1=1';
			$data['estados'] = $this->main->trae_estados($where_estado);
			$where_ciudad='1=1';
			$data['ciudades'] = $this->main->trae_ciudad($where_ciudad);
			$where_cartel='1=1';
			$data['carteles'] = $this->cartel->trae_cartel($where_cartel);
			$data['id_tipousuario'] = $this->session->userdata('user_id_tipoUsuario');
			$data['scripts'] = array('script_solicitud_curso');
			$data['layout'] = 'plantilla/lytDefault';
			$data['contentView'] = 'solicitud_cursos/add_solicitud_curso';
			$this->_renderView($data);

		}else{
			redirect("login");

		}
	}

	public function agrega_carteles()	{
		if($this->admin->logged_id())
		{
			$data['id_tipousuario'] = $this->session->userdata('user_id_tipoUsuario');
			$data['scripts'] = array('script_carteles');
			$data['layout'] = 'plantilla/lytDefault';
			$data['contentView'] = 'carteles/add_carteles';
			$this->_renderView($data);

		}else{
			redirect("login");

		}
	}

	public function consulta_carteles()	{
		if($this->admin->logged_id())
		{
			$data['id_tipousuario'] = $this->session->userdata('user_id_tipoUsuario');
			$data['scripts'] = array('script_carteles');
			$data['layout'] = 'plantilla/lytDefault';
			$data['contentView'] = 'carteles/consulta_carteles';
			$this->_renderView($data);

		}else{
			redirect("login");

		}
	}

	public function vista_agrega_participantes()	{
        if($this->admin->logged_id())
		{
			$id_curso = $this->input->get('id_curso', TRUE);
			$where_id_curso = 'id_curso_solicitado = '.$id_curso;
			$where_papeleria="id_curso_solicitado=".$id_curso." and pap_tipo_user=1";
			$where_agenda = "agenda_id=".$id_curso;

			$curso_solicitado = $this->curso_solicitado->trae_curso_solicitado($where_id_curso);
			$papeleria_curso = $this->curso_solicitado->trae_curso_solicitado_papeleria($where_papeleria);
			$agenda = $this->temas->trae_agenda($where_agenda);


			$data['id_tipousuario'] = $this->session->userdata('user_id_tipoUsuario');
			$data['id_curso'] = $curso_solicitado->id_curso_solicitado;
			$data['curso'] = $curso_solicitado->curso;
			$data['nombre_institucion'] = $curso_solicitado->nombre_institucion;
			$data['nombre_curso_disciplina'] =  $curso_solicitado->nombre_curso_disciplina;
			$data['fecha_solicitud_curso'] =  $curso_solicitado->fecha_solicitud_curso;
			$data['sede'] =  $curso_solicitado->sede;
			$data['estado'] =  $curso_solicitado->estado;
			$data['municipio'] =  $curso_solicitado->municipio;
			$data['numero_participantes'] = $curso_solicitado->numero_participantes;
			$data['papeleria_curso'] = $papeleria_curso;
			$data['agenda'] = $agenda!="" ? 1:0;


            $data['scripts'] = array('script_participantes', 'script_papeleria');
            $data['layout'] = 'plantilla/lytDefault';
            $data['contentView'] = 'participantes/agrega_participantes';
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

	public function vista_papeleria_participante(){

		if($this->admin->logged_id())
		{
			$id_participante = $this->input->get('pte', TRUE);
			$where_participante = "id_participante=".$id_participante." and visible=1";
			$datos_participante = $this->participante->trae_participantes($where_participante);

			$data['id_participante'] = $datos_participante[0]->id_participante;
            $data['nombre'] = $datos_participante[0]->nombre;
            $data['primer_apellido'] = $datos_participante[0]->primer_apellido;
            $data['segundo_apellido'] = $datos_participante[0]->segundo_apellido;
            $data['correo'] = $datos_participante[0]->correo;
            $data['telefono'] = $datos_participante[0]->telefono;
            $data['id_curso'] = $datos_participante[0]->id_curso;

			$id_curso = $datos_participante[0]->id_curso;
			$where_curso = 'id_curso_solicitado = '.$id_curso;
			$curso_solicitado = $this->curso_solicitado->trae_curso_solicitado($where_curso);
			$data['curso'] = $curso_solicitado->curso;
			$data['nombre_institucion'] = $curso_solicitado->nombre_institucion;
			$data['nombre_curso_disciplina'] =  $curso_solicitado->nombre_curso_disciplina;
			$data['fecha_solicitud_curso'] =  $curso_solicitado->fecha_solicitud_curso;
			$data['sede'] =  $curso_solicitado->sede;
			$data['estado'] =  $curso_solicitado->estado;
			$data['municipio'] =  $curso_solicitado->municipio;
			$data['numero_participantes'] = $curso_solicitado->numero_participantes;

			$where_papeleria="id_curso_solicitado=".$id_curso." and pap_tipo_user=2";
			$papeleria_curso = $this->curso_solicitado->trae_curso_solicitado_papeleria($where_papeleria);
			$data['papeleria_curso'] = $papeleria_curso;

			$data['id_tipousuario'] = $this->session->userdata('user_id_tipoUsuario');
      $data['scripts'] = array('script_participantes', 'script_papeleria');
      $data['layout'] = 'plantilla/lytDefault';
      $data['contentView'] = 'participantes/vPapeleria';
      $this->_renderView($data);

		}else{
			redirect("login");

		}

	}

	public function trae_ciudades(){
		$id_estado = $this->input->post("id_estado");
		$where_estado=' 1=1 and id='.$id_estado;
		$estado = $this->main->trae_estado($where_estado);
		$where_ciudad='1=1 and estado_id ='.$estado->clave;
		$ciudades = $this->main->trae_ciudad($where_ciudad);
		echo json_encode($ciudades);
	}

	public function pago_curso() {
		
		$data = array();
		$id_curso = $this->input->get('id_curso', TRUE);
		$where_id_curso = 'id_curso_solicitado = '.$id_curso;
		$curso_solicitado = $this->curso_solicitado->trae_curso_solicitado($where_id_curso);
		$id_usuario = $this->session->userdata('user_id');
		$where_id_usuario = 'id_usuario = '.$id_usuario;
		$usuario = $this->main->trae_usuario($where_id_usuario);

		// POST data in array
		//$url = "https://via.banorte.com/bancybhosted/index.do";
		$variables = array(
		    'MERCHANT_ID' 		=> "8334414",
			"USER" 						=> "a8334414",
			"PASSWORD" 				=> "PaCe;:_290'",
			"MODE" 						=> "AUT",
			"ENTRY_MODE" 			=> "MANUAL",
			"CMD_TRANS" 			=> "AUTH",
			"RESPONSE_URL" 		=> "https://pacemd.com.mx/index.php/Dashboard/response",
			"CONTROL_NUMBER" 	=> "1",
			"TERMINAL_ID" 	=> "1",
			"AMOUNT" 	=> "0.01",
			"MerchantNumber" 	=> "8334414",
			"MerchantName" 	=> "PACE MD INTERNACIONAL S De RL.",
			"MerchantCity" 	=> "GUANAJUATO",
			"Review" 	=> "Secure3D",
			"BillTo_firstName" 	=> $usuario[0]->nombre,
			"BillTo_lastName" 	=> $usuario[0]->primerApellido.' '.$usuario[0]->segundoApellido,
			"BillTo_phoneNumber" => $usuario[0]->telefono,
			"BillTo_street" 	=> "Villas San Felipe",
			"BillTo_streetNumber" 	=> "98",
			"BillTo_street2Col" 	=> "Villas de Guanajuato",
			"BillTo_street2Del" => "Guanajuato",
			"BillTo_city" 	=> "Guanajuato",
			"BillTo_state" 	=> "GT",
			"BillTo_country" 	=> "MX",
			"BillTo_postalCode" 	=> "36258",
			"BillTo_email" => $usuario[0]->correo,
		);
		$variables_x = array(
		    'MERCHANT_ID' 		=> "8334414",
			"USER" 						=> "a8334414",
			"PASSWORD" 				=> "PaCe;:_290'",
			"MODE" 						=> "AUT",
			"ENTRY_MODE" 			=> "MANUAL",
			"CMD_TRANS" 			=> "AUTH",
			"RESPONSE_URL" 		=> "https://pacemd.com.mx/index.php/Dashboard/response",
			"CONTROL_NUMBER" 	=> "1",
			"TERMINAL_ID" 	=> "1",
			"AMOUNT" 	=> "1",
			"MerchantNumber" 	=> "8334414",
			"MerchantName" 	=> "PACE MD INTERNACIONAL S De RL.",
			"MerchantCity" 	=> "GUANAJUATO",
			"Review" 	=> "Secure3D",
			"BillTo_firstName" 	=> 'BANORTEIXE',
			"BillTo_lastName" 	=> 'PRUEBAS',
			"BillTo_phoneNumber" => $usuario[0]->telefono,
			"BillTo_street" 	=> "Villas San Felipe",
			"BillTo_streetNumber" 	=> "98",
			"BillTo_street2Col" 	=> "Villas de Guanajuato",
			"BillTo_street2Del" => "Guanajuato",
			"BillTo_city" 	=> "Guanajuato",
			"BillTo_state" 	=> "GT",
			"BillTo_country" 	=> "MX",
			"BillTo_postalCode" 	=> "36258",
			"BillTo_email" => 'banorteixe@aprobado.com',
		);
		$fields_string = http_build_query($variables_x);/*
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "https://via.banorte.com/bancybhosted/index.do");
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string );
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_VERBOSE, true);
		$data = curl_exec($ch);
		curl_close($ch);*/
		
		header ("Location: https://via.banorte.com/bancybhosted/index.do?".$fields_string);
		exit;
	}

	public function response(){
		echo $_REQUEST['TEXT'];
	}

	public function exaplecurl(){
		$data = array();
		$id_curso = $this->input->get('id_curso', TRUE);
		$where_id_curso = 'id_curso_solicitado = '.$id_curso;
		$curso_solicitado = $this->curso_solicitado->trae_curso_solicitado($where_id_curso);
		$id_usuario = $this->session->userdata('user_id');
		$where_id_usuario = 'id_usuario = '.$id_usuario;
		$usuario = $this->main->trae_usuario($where_id_usuario);
		
		$datos_post = http_build_query(
			array(
				'MERCHANT_ID' 		=> "8334414",
				"USER" 						=> "a8334414",
				"PASSWORD" 				=> "PaCe;:_290'",
				"MODE" 						=> "AUT",
				"ENTRY_MODE" 			=> "MANUAL",
				"CMD_TRANS" 			=> "AUTH",
				"RESPONSE_URL" 		=> "https://pacemd.com.mx/index.php/Dashboard/response",
				"CONTROL_NUMBER" 	=> "1",
				"TERMINAL_ID" 	=> "1",
				"AMOUNT" 	=> "1",
				"MerchantNumber" 	=> "8334414",
				"MerchantName" 	=> "PACE MD INTERNACIONAL S De RL.",
				"MerchantCity" 	=> "GUANAJUATO",
				"Review" 	=> "Secure3D",
				"BillTo_firstName" 	=> 'BANORTEIXE',
				"BillTo_lastName" 	=> 'PRUEBAS',
				"BillTo_phoneNumber" => $usuario[0]->telefono,
				"BillTo_street" 	=> "Villas San Felipe",
				"BillTo_streetNumber" 	=> "98",
				"BillTo_street2Col" 	=> "Villas de Guanajuato",
				"BillTo_street2Del" => "Guanajuato",
				"BillTo_city" 	=> "Guanajuato",
				"BillTo_state" 	=> "GT",
				"BillTo_country" 	=> "MX",
				"BillTo_postalCode" 	=> "36258",
				"BillTo_email" => 'banorteixe@aprobado.com',
			)
		);
		
		$opciones = array('http' =>
			array(
				'method'  => 'POST',
				'header'  => 'Content-type: application/x-www-form-urlencoded',
				'content' => $datos_post
			)
		);
		
		$contexto = stream_context_create($opciones);
		
		$resultado = file_get_contents('https://via.banorte.com/bancybhosted/index.do?', false, $contexto);
		echo json_decode($resultado);
	}

	public function pago() {
		$data = array();
		$id_curso = $this->input->get('id_curso', TRUE);
		$where_id_curso = 'id_curso_solicitado = '.$id_curso;
		$curso_solicitado = $this->curso_solicitado->trae_curso_solicitado($where_id_curso);
		$id_usuario = $this->session->userdata('user_id');
		$where_id_usuario = 'id_usuario = '.$id_usuario;
		$usuario = $this->main->trae_usuario($where_id_usuario);
		$data = array(
		    'MERCHANT_ID' 		=> "8334414",
			"USER" 						=> "a8334414",
			"PASSWORD" 				=> "PaCe;:_290'",
			"MODE" 						=> "AUT",
			"ENTRY_MODE" 			=> "MANUAL",
			"CMD_TRANS" 			=> "AUTH",
			"RESPONSE_URL" 		=> "https://pacemd.com.mx/index.php/Dashboard/response",
			"CONTROL_NUMBER" 	=> "1",
			"TERMINAL_ID" 	=> "1",
			"AMOUNT" 	=> "1",
			"MerchantNumber" 	=> "8334414",
			"MerchantName" 	=> "PACE MD INTERNACIONAL S De RL.",
			"MerchantCity" 	=> "GUANAJUATO",
			"Review" 	=> "Secure3D",
			"BillTo_firstName" 	=> 'BANORTEIXE',
			"BillTo_lastName" 	=> 'PRUEBAS',
			"BillTo_phoneNumber" => $usuario[0]->telefono,
			"BillTo_street" 	=> "Villas San Felipe",
			"BillTo_streetNumber" 	=> "98",
			"BillTo_street2Col" 	=> "Villas de Guanajuato",
			"BillTo_street2Del" => "Guanajuato",
			"BillTo_city" 	=> "Guanajuato",
			"BillTo_state" 	=> "GT",
			"BillTo_country" 	=> "MX",
			"BillTo_postalCode" 	=> "36258",
			"BillTo_email" => 'banorteixe@aprobado.com',
		);
		//$url = 'https://via.banorte.com/bancybhosted/index.do';
		$fields_string = http_build_query($data);
		$curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, "https://via.banorte.com/bancybhosted/index.do");
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);

        $result = curl_exec($curl);
		$redirectURL = curl_getinfo($curl,CURLINFO_EFFECTIVE_URL );

		echo $result;
		
	}
	

}
