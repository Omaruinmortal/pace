<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Participantes extends CI_Controller
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
        $this->load->model('participante');
        $this->load->model('admin');
        $this->load->model('curso_solicitado');
         // Load PHPMailer library
         $this->load->library('phpmailer_lib');
         
        date_default_timezone_set('America/Mexico_City');
    }
    public function index() {
        echo 'a';
    }

    public function agrega_participante()
    {
         // PHPMailer object
         $mail = $this->phpmailer_lib->load();
        if ($this->input->is_ajax_request()) {
            $nombre = $this->input->post("nombre");
            $primerApellido = $this->input->post("primer_apellido");
            $segundoApellido = $this->input->post("segundo_apellido");
            $correo = $this->input->post("correo");
            $telefono = $this->input->post("telefono");
            $id_curso = $this->input->post("id_curso");
           
            $this->form_validation->set_rules('nombre', 'Nombre', 'required');
            $this->form_validation->set_rules('primer_apellido', 'Primer Apellido', 'required');
            $this->form_validation->set_rules('correo', 'Correo', 'required|valid_email');
            $this->form_validation->set_rules('telefono', 'telefono', 'required');

           
            
            // SMTP configuration
            $mail->isSMTP();
            $mail->Host     = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'omarumtz@gmail.com';
            $mail->Password = 'Ar0.Omaru';
            $mail->SMTPSecure = 'tls';
            $mail->Port     = 587;
            
            $mail->setFrom('notificacion.curso@pacemd.com.mx'  , 'Inscripcion al curso de *CURSO*');
            $mail->addAddress($correo, $nombre.' '.$primerApellido.' '.$segundoApellido);     // Add a recipient
            /*$mail->addAddress('ellen@example.com');               // Name is optional
            $mail->addReplyTo('info@example.com', 'Information');
            $mail->addCC('cc@example.com');
            $mail->addBCC('bcc@example.com');*/
            
            // Email subject
            $mail->Subject = 'Notificacion de Curso';
            
            // Set email format to HTML
            $mail->isHTML(true);
            
            // Email body content
            $mailContent = "<h1>Bienvenido ".$nombre." ".$primerApellido." ".$segundoApellido." al curso de *CURSO*</h1>
                <p>Para poder continuar con la aceptacion al curso debe de ingresar en este link <a href='http://localhost/pace/index.php/Participantes/hoja_registro_participante?id_curso=".$id_curso."'>'click aqui'</a> para culminar su registro</p>";
            $mail->Body = $mailContent;
            
            // Send email
            

            if ($this->form_validation->run() == TRUE) {   
                /*
                if(!$mail->send()){
                    $array = array (
                        'success' => 'NO',
                        'correo' => 'Mailer Error: ' . $mail->ErrorInfo,
                    );
                }else{
                    $sql = "INSERT INTO tbl_participantes (nombre, primer_apellido, segundo_apellido, correo, telefono, id_curso, id_usuario_registro)
                    values ('" . $nombre . "','" . $primerApellido . "','" . $segundoApellido . "','" . $correo . "'," . $telefono . ",'" . $id_curso . "','" . $this->session->userdata('user_id_tipoUsuario') . "')";
                    $this->participante->guarda_participante($sql);
                    $array = array(
                        'success' => 'OK',
                        'correo' => 'Message has been sent',
                    );
                }      */
                $sql = "INSERT INTO tbl_participantes (nombre, primer_apellido, segundo_apellido, correo, telefono, id_curso, id_usuario_registro)
                values ('" . $nombre . "','" . $primerApellido . "','" . $segundoApellido . "','" . $correo . "'," . $telefono . ",'" . $id_curso . "','" . $this->session->userdata('user_id_tipoUsuario') . "')";
                $this->participante->guarda_participante($sql);
                $array = array(
                    'success' => 'OK',
                    'correo' => 'Message has been sent',
                );       
                
            } else {
                $array = array(
                    'error' => true,
                    'nombre_error' => form_error('nombre', null, null),
                    'primer_apellido_error' => form_error('primer_apellido', null, null),
                    'correo_error' => form_error('correo', null, null),
                    'telefono_error' => form_error('telefono', null, null)                    
                );
            }

            echo json_encode($array);
        }
    }

    public function elimina_participante()
    {
        $id_usuario = $this->input->post('id', TRUE);
        $this->main->elimina_usuario($id_usuario);
        echo 'true';
    }

   
    public function trae_participantes_curso()
    {
        $data = array();
        $curso=$this->input->get("curso");
        $where = "id_curso=".$curso;
        $datos = $this->participante->trae_participantes($where);
        foreach ($datos as $row) {
            $data[] = array(
                $row->nombre . ' ' . $row->primer_apellido . ' ' . $row->segundo_apellido,
                $row->correo,
                '<button type="button" id="btn_eliminar_usuario" data-id="' . $row->id_participante . '" title="Eliminar" class="tabledit-delete-button btn btn-sm btn-danger" style="float: none; margin: 4px;"><span class="ti-trash"></span></button>

                <button type="button" id="btn_papeleria_usuario" data-id="' . $row->id_participante . '" title="Papeleria" class="tabledit-papeleria-button btn btn-sm btn-success" style="float: none; margin: 4px;"><span class="ti-files"></span></button>
                '
            );           
        }
        $result = array(
            "data" => $data
        );
        echo json_encode($result);
    }

    public function hoja_registro_participante()
    {
        echo $this->input->get("id_curso");
        $id_curso = $this->input->get('id_curso', TRUE);
        $where_id_curso = 'id_curso_solicitado = '.$id_curso;
        $where_papeleria="id_curso_solicitado=".$id_curso." and pap_tipo_user=1";

        $curso_solicitado = $this->curso_solicitado->trae_curso_solicitado($where_id_curso);
        $papeleria_curso = $this->curso_solicitado->trae_curso_solicitado_papeleria($where_papeleria);
        

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
        

        $data['scripts'] = array('script_participantes', 'script_papeleria');
        $data['layout'] = 'plantilla/lytDefault';
        $data['contentView'] = 'participantes/agrega_participantes';
        $this->_renderView($data);		

    }
}
