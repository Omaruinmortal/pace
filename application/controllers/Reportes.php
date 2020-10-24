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
        $this->load->model('main');
		$this->load->model('admin');
		$this->load->model('avalador');
		$this->load->model('curso');
		$this->load->model('instructor');
		$this->load->model('cartel');
		$this->load->model('curso_solicitado');
        $this->load->model('participante');
        $this->load->library('Mpdf');
        
        date_default_timezone_set('America/Mexico_City');
    }

    public function getDate(){        
        $fecha_actual = $this->admin->trae_fecha_actual("Select curdate() as date_actual");
        $fecha_actual = new DateTime($fecha_actual[0]->date_actual);
        $fecha_actual = $fecha_actual->format('d/m/Y');

        return $fecha_actual;       
    }

    public function get_data_participante($participante, $curso){
        $where = "id_participante=".$participante." and id_curso=".$curso;
        $buscar_datos_pdf = $this->participante->trae_un_participantes($where);
    
        $name = ucwords(strtolower($buscar_datos_pdf->nombre." ".$buscar_datos_pdf->primer_apellido." ".$buscar_datos_pdf->segundo_apellido));
        $correo = $buscar_datos_pdf->correo;
        $tel = $buscar_datos_pdf->telefono;

        $datos = array(
            'name' => $name,
            'correo' => $correo,
            'tel' => $tel,           
        ); 

        return $datos;
    }

    public function get_data_curso($curso){
        $where = "id_curso_solicitado=".$curso;
        $buscar_datos_pdf = $this->curso_solicitado->trae_curso_solicitado($where);

        return $buscar_datos_pdf;        
    }

    /*-------------------------------------------------------------------------------------
    ----------------------------------------Reportes ACLS---------------------------------*/

public function course_information_participants_acls() 
{     
    $this->load->library('Mpdf');
    $fecha_actual = new DateTime('NOW');
    $exp_card_date=new DateTime('2021-05-12');
    $course_start=new DateTime('2021-05-30');
    $course_end=new DateTime('2021-05-30');
    $iss_date_card=new DateTime('2021-05-27');

        $data['lead_instructor']='Omar Martinez';
        $data['id_lead_instructor']='0085';
        $data['exp_card_date']=$exp_card_date->format('d/m/Y');
        $data['tra_center']='Escuela de Medicina de la UG';
        $data['id_tra_center']=943;
        $data['name_tra_center']="example de tra center";
        $data['adress']='C. Principal No.S/N';
        $data['city_sz']='Guanajuato; 36000';
        $data['location_course']='Escuela de Medicina de la UG';
        $data['type_course']=2;
        $data['course_start']=$course_start->format('d/m/Y').' 10 am';
        $data['course_end']=$course_end->format('d/m/Y').' 03 pm';
        $data['time_inst']="1 hora";
        $data['cards_iss']=5;
        $data['ratio']="3:1";
        $data['iss_date_card']=$iss_date_card->format('d/m/Y');
        $data['tam_reg_tabla_2']=10;
        $data['fecha_actual']=$fecha_actual->format('d/m/Y');


        $data['instructores']=array(
                            array('name' =>'Omar Martínez1','vencimiento'=>'12/10/2021'),
                            array('name' =>'Omar Martínez2','vencimiento'=>'12/10/2022'),
                            array('name' =>'Omar Martínez3','vencimiento'=>'12/10/2023'),
                            array('name' =>'Omar Martínez4','vencimiento'=>'12/10/2024'),
                            array('name' =>'Omar Martínez5','vencimiento'=>'12/10/2025'),
                            array('name' =>'Omar Martínez6','vencimiento'=>'12/10/2026'),
                            array('name' =>'Omar Martínez7','vencimiento'=>'12/10/2027'),
                            array('name' =>'Omar Martínez8','vencimiento'=>'12/10/2028'),
                            array('name' =>'Omar Martínez9','vencimiento'=>'12/10/2029'),
                            array('name' =>'Omar Martínez10','vencimiento'=>'12/10/2030'),
                            array('name' =>'Omar Martínez11','vencimiento'=>'12/10/2031'),
        );
        $data['participantes']=array(
                            array('name' =>'Omar Martínez1', 'email'=>'omar-martinez@hotmail.com','cp_tel'=>'Cp: 36000 Teléfono: 737658956','completed'=>'complete','remed_date'=>'12/10/2021'),
                            array('name' =>'Omar Martínez2', 'email'=>'omar-martinez@hotmail.com','cp_tel'=>'Cp: 36000 Teléfono: 737658956','completed'=>'complete','remed_date'=>'12/10/2022'),
                            array('name' =>'Omar Martínez3', 'email'=>'omar-martinez@hotmail.com','cp_tel'=>'Cp: 36000 Teléfono: 737658956','completed'=>'complete','remed_date'=>'12/10/2023'),
                            array('name' =>'Omar Martínez4', 'email'=>'omar-martinez@hotmail.com','cp_tel'=>'Cp: 36000 Teléfono: 737658956','completed'=>'complete','remed_date'=>'12/10/2024'),
                            array('name' =>'Omar Martínez5', 'email'=>'omar-martinez@hotmail.com','cp_tel'=>'Cp: 36000 Teléfono: 737658956','completed'=>'complete','remed_date'=>'12/10/2025'),
                            array('name' =>'Omar Martínez6', 'email'=>'omar-martinez@hotmail.com','cp_tel'=>'Cp: 36000 Teléfono: 737658956','completed'=>'complete','remed_date'=>'12/10/2026'),
                            array('name' =>'Omar Martínez7', 'email'=>'omar-martinez@hotmail.com','cp_tel'=>'Cp: 36000 Teléfono: 737658956','completed'=>'complete','remed_date'=>'12/10/2027'),
                            array('name' =>'Omar Martínez8', 'email'=>'omar-martinez@hotmail.com','cp_tel'=>'Cp: 36000 Teléfono: 737658956','completed'=>'complete','remed_date'=>'12/10/2028'),
                            array('name' =>'Omar Martínez9', 'email'=>'omar-martinez@hotmail.com','cp_tel'=>'Cp: 36000 Teléfono: 737658956','completed'=>'complete','remed_date'=>'12/10/2029'),
                            array('name' =>'Omar Martínez10','email'=>'omar-martinez@hotmail.com','cp_tel'=>'Cp: 36000 Teléfono: 737658956','completed'=>'complete','remed_date'=>'12/10/2030'),
                            array('name' =>'Omar Martínez11','email'=>'omar-martinez@hotmail.com','cp_tel'=>'Cp: 36000 Teléfono: 737658956','completed'=>'complete','remed_date'=>'12/10/2031'),
                            array('name' =>'Omar Martínez12','email'=>'omar-martinez@hotmail.com','cp_tel'=>'Cp: 36000 Teléfono: 737658956','completed'=>'complete','remed_date'=>'12/10/2031'),
                            array('name' =>'Omar Martínez13','email'=>'omar-martinez@hotmail.com','cp_tel'=>'Cp: 36000 Teléfono: 737658956','completed'=>'complete','remed_date'=>'12/10/2031'),
                            array('name' =>'Omar Martínez14','email'=>'omar-martinez@hotmail.com','cp_tel'=>'Cp: 36000 Teléfono: 737658956','completed'=>'complete','remed_date'=>'12/10/2031'),
                            array('name' =>'Omar Martínez15','email'=>'omar-martinez@hotmail.com','cp_tel'=>'Cp: 36000 Teléfono: 737658956','completed'=>'complete','remed_date'=>'12/10/2031'),
                            array('name' =>'Omar Martínez16','email'=>'omar-martinez@hotmail.com','cp_tel'=>'Cp: 36000 Teléfono: 737658956','completed'=>'complete','remed_date'=>'12/10/2031'),
                            array('name' =>'Omar Martínez17','email'=>'omar-martinez@hotmail.com','cp_tel'=>'Cp: 36000 Teléfono: 737658956','completed'=>'complete','remed_date'=>'12/10/2031'),
                            array('name' =>'Omar Martínez18','email'=>'omar-martinez@hotmail.com','cp_tel'=>'Cp: 36000 Teléfono: 737658956','completed'=>'complete','remed_date'=>'12/10/2031'),
                            array('name' =>'Omar Martínez19','email'=>'omar-martinez@hotmail.com','cp_tel'=>'Cp: 36000 Teléfono: 737658956','completed'=>'complete','remed_date'=>'12/10/2031'),
                            array('name' =>'Omar Martínez20','email'=>'omar-martinez@hotmail.com','cp_tel'=>'Cp: 36000 Teléfono: 737658956','completed'=>'complete','remed_date'=>'12/10/2031'),
                            array('name' =>'Omar Martínez21','email'=>'omar-martinez@hotmail.com','cp_tel'=>'Cp: 36000 Teléfono: 737658956','completed'=>'complete','remed_date'=>'12/10/2031'),
                    
                        );      

    $this->mpdf->course_information_participants_acls('formatos_imprimir/acls/v1.course_information_participants_acls.php',$data); 
} 

public function Agenda_12_part_acls1() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 

    $data['estudiantes']=12; 
    $data['instructores']=2;
    $data['duracion']="Aproximadamente 15 horas, 20 minutos con pausas"; 

    $this->mpdf->Agenda_12_part_acls1('formatos_imprimir/acls/v14.1Agenda_12_part_acls.php',$data); 
} 

public function Agenda_24_part_acls2() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf');

    $data['estudiantes']=24; 
    $data['instructores']=4;
    $data['duracion']="Aproximadamente 15 horas, 45 minutos con pausas"; 

    $this->mpdf->Agenda_24_part_acls2('formatos_imprimir/acls/v14.2Agenda_24_part_acls.php',$data); 
} 

public function monitorizacion_acls() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf');
    $fecha_actual = new DateTime('NOW');  
    $data = array(); 

    $data['instructor'] = 'Omar Martínez Martínez'; 
    $data['id_instructor'] = 8990; 
    $data['exp_card_date'] = '10/01/2023';
    $data['course_rev'] = 3;
    $data['course_purpo']=3;
    $data['name_rf']="Carolina Hurtado";
    $data['fecha_actual']=$fecha_actual->format('d/m/Y');
    $data['coordinator']="Blanca Estela Hurtado";
    
    $this->mpdf->monitorizacion_acls('formatos_imprimir/acls/v15.monitorizacion_acls.php',$data); 
} 

public function lista_comprobacion_via_aerea_acls() 
{ 
    $participante = $this->input->get('pte');
    $curso = $this->input->get('curso');
    $date = $this->getDate();
    $datos = $this->get_data_participante($participante, $curso);

    $data = array();

    //---Variables 
    $fecha_prueba = $date;
    $estudiante = $datos['name'];
    $instructor_ini = "";
    $instructor_num = "";
    $fecha_actual = $date;

    $data['fecha_prueba'] = $fecha_prueba;
    $data['nombre_estudiante'] = $estudiante; 
    $data['instructor_iniciales'] = $instructor_ini;
    $data['instructor_num'] = $instructor_num;
    $data['fecha_actual']=$fecha_actual;
    
    $this->mpdf->lista_comprobacion_via_aerea_acls('formatos_imprimir/acls/v22.lista_comprobacion_via_aerea_acls.php',$data); 
} 

public function Bls_alta_calidad_acls() 
{ 
    $participante = $this->input->get('pte');
    $curso = $this->input->get('curso');
    $date = $this->getDate();
    $datos = $this->get_data_participante($participante, $curso);

    $data = array();

    //---Variables 
    $fecha_prueba = $date;
    $estudiante = $datos['name'];
    $instructor_ini = "";
    $instructor_num = "";
    $fecha_actual = $date;

    $data['fecha_prueba'] = $fecha_prueba;
    $data['nombre_estudiante'] = $estudiante; 
    $data['instructor_iniciales'] = $instructor_ini;
    $data['instructor_num'] = $instructor_num;
    $data['fecha_actual']=$fecha_actual;

    $this->mpdf->Bls_alta_calidad_acls('formatos_imprimir/acls/v23.Bls_alta_calidad_acls.php',$data); 
} 

public function lista_comprobacion_aprendizaje_practica_acls() 
{     
    $participante = $this->input->get('pte');
    $curso = $this->input->get('curso');
    $date = $this->getDate();
    $datos = $this->get_data_participante($participante, $curso);

    $data = array();

    //---Variables 
    $fecha_prueba = $date;
    $estudiante = $datos['name'];
    $instructor_ini = "";
    $instructor_num = "";
    $fecha_actual = $date;

    $data['fecha_prueba'] = $fecha_prueba;
    $data['nombre_estudiante'] = $estudiante; 
    $data['instructor_iniciales'] = $instructor_ini;
    $data['instructor_num'] = $instructor_num;
    $data['fecha_actual']=$fecha_actual;

    $this->mpdf->lista_comprobacion_aprendizaje_practica_acls('formatos_imprimir/acls/v24.lista_comprobacion_aprendizaje_practica_acls.php',$data); 
} 

public function lista_prueba_megacode_acls1() 
{ 
    $participante = $this->input->get('pte');
    $curso = $this->input->get('curso');
    $date = $this->getDate();
    $datos = $this->get_data_participante($participante, $curso);

    $data = array();

    //---Variables 
    $fecha_prueba = $date;
    $estudiante = $datos['name'];
    $instructor_ini = "";
    $instructor_num = "";
    $fecha_actual = $date;

    $data['fecha_prueba'] = $fecha_prueba;
    $data['nombre_estudiante'] = $estudiante; 
    $data['instructor_iniciales'] = $instructor_ini;
    $data['instructor_num'] = $instructor_num;
    $data['fecha_actual']=$fecha_actual;

    $this->mpdf->lista_prueba_megacode_acls1('formatos_imprimir/acls/v25.1lista_prueba_megacode_acls.php',$data); 
} 

public function lista_prueba_megacode_acls2() 
{ 
    $participante = $this->input->get('pte');
    $curso = $this->input->get('curso');
    $date = $this->getDate();
    $datos = $this->get_data_participante($participante, $curso);

    $data = array();

    //---Variables 
    $fecha_prueba = $date;
    $estudiante = $datos['name'];
    $instructor_ini = "";
    $instructor_num = "";
    $fecha_actual = $date;

    $data['fecha_prueba'] = $fecha_prueba;
    $data['nombre_estudiante'] = $estudiante; 
    $data['instructor_iniciales'] = $instructor_ini;
    $data['instructor_num'] = $instructor_num;
    $data['fecha_actual']=$fecha_actual;

    $this->mpdf->lista_prueba_megacode_acls2('formatos_imprimir/acls/v25.2lista_prueba_megacode_acls.php',$data); 
} 

public function lista_prueba_megacode_acls3() 
{ 
    $participante = $this->input->get('pte');
    $curso = $this->input->get('curso');
    $date = $this->getDate();
    $datos = $this->get_data_participante($participante, $curso);

    $data = array();

    //---Variables 
    $fecha_prueba = $date;
    $estudiante = $datos['name'];
    $instructor_ini = "";
    $instructor_num = "";
    $fecha_actual = $date;

    $data['fecha_prueba'] = $fecha_prueba;
    $data['nombre_estudiante'] = $estudiante; 
    $data['instructor_iniciales'] = $instructor_ini;
    $data['instructor_num'] = $instructor_num;
    $data['fecha_actual']=$fecha_actual;

    $this->mpdf->lista_prueba_megacode_acls3('formatos_imprimir/acls/v25.3lista_prueba_megacode_acls.php',$data); 
} 

public function lista_prueba_megacode_acls4() 
{ 
    $participante = $this->input->get('pte');
    $curso = $this->input->get('curso');
    $date = $this->getDate();
    $datos = $this->get_data_participante($participante, $curso);

    $data = array();

    //---Variables 
    $fecha_prueba = $date;
    $estudiante = $datos['name'];
    $instructor_ini = "";
    $instructor_num = "";
    $fecha_actual = $date;

    $data['fecha_prueba'] = $fecha_prueba;
    $data['nombre_estudiante'] = $estudiante; 
    $data['instructor_iniciales'] = $instructor_ini;
    $data['instructor_num'] = $instructor_num;
    $data['fecha_actual']=$fecha_actual;

    $this->mpdf->lista_prueba_megacode_acls4('formatos_imprimir/acls/v25.4lista_prueba_megacode_acls.php',$data); 
} 

public function lista_prueba_megacode_acls5() 
{ 
    $participante = $this->input->get('pte');
    $curso = $this->input->get('curso');
    $date = $this->getDate();
    $datos = $this->get_data_participante($participante, $curso);

    $data = array();

    //---Variables 
    $fecha_prueba = $date;
    $estudiante = $datos['name'];
    $instructor_ini = "";
    $instructor_num = "";
    $fecha_actual = $date;

    $data['fecha_prueba'] = $fecha_prueba;
    $data['nombre_estudiante'] = $estudiante; 
    $data['instructor_iniciales'] = $instructor_ini;
    $data['instructor_num'] = $instructor_num;
    $data['fecha_actual']=$fecha_actual;

    $this->mpdf->lista_prueba_megacode_acls5('formatos_imprimir/acls/v25.5lista_prueba_megacode_acls.php',$data); 
} 

public function lista_prueba_megacode_acls() 
{ 
    $participante = $this->input->get('pte');
    $curso = $this->input->get('curso');
    $date = $this->getDate();
    $datos = $this->get_data_participante($participante, $curso);

    $data = array();

    //---Variables 
    $fecha_prueba = $date;
    $estudiante = $datos['name'];
    $instructor_ini = "";
    $instructor_num = "";
    $fecha_actual = $date;

    $data['fecha_prueba'] = $fecha_prueba;
    $data['nombre_estudiante'] = $estudiante; 
    $data['instructor_iniciales'] = $instructor_ini;
    $data['instructor_num'] = $instructor_num;
    $data['fecha_actual']=$fecha_actual;

    $this->mpdf->lista_prueba_megacode_acls('formatos_imprimir/acls/v25.lista_prueba_megacode_acls.php',$data); 
} 

public function evaluacion_teorica_acls() 
{ 
    $participante = $this->input->get('pte');
    $curso = $this->input->get('curso');
    $date = $this->getDate();
    $datos = $this->get_data_participante($participante, $curso);

    $data = array(); 
    
    $data['fecha'] = $date;
    $data['nombre'] =$datos['name'];
    $data['version'] = ""; 

    $this->mpdf->evaluacion_teorica_acls('formatos_imprimir/acls/v38.evaluacion_teorica_acls.php',$data); 
} 

public function evaluacion_teorica_remediar_acls() 
{ 

    $participante = $this->input->get('pte');
    $curso = $this->input->get('curso');
    $date = $this->getDate();
    $datos = $this->get_data_participante($participante, $curso);

    $data = array(); 
    
    $data['fecha'] = $date;
    $data['nombre'] =$datos['name'];
    $data['version'] = ""; 

    $this->mpdf->evaluacion_teorica_remediar_acls('formatos_imprimir/acls/v39.evaluacion_teorica_remediar_acls.php',$data); 
} 

public function constancia_participacion_acls() 
{ 
    $participante = $this->input->get('pte');
    $curso = $this->input->get('curso');
    $date = $this->getDate();
    $datos = $this->get_data_participante($participante, $curso);
    $datos_curso = $this->get_data_curso($curso );
    
    $data = array();

    //---Variables
    $fecha_actual = $date; 
    $estudiante = $datos['name'];
    $duracion_horas="5 horas";
    $fecha_curso="14 de Agosto de 2020";
    $ciudad_curso = $datos_curso->municipio.", ".$datos_curso->estado;
    $nac="0012";
    $folio="0089";
    $curso="RCP Familiares y Amigos Reanimación Cardiopulmonar <br> de la American Heart Association";

    $parrafo="Por su valiosa participación en el curso <br>".$curso." con una  duración de ".$duracion_horas.".<br>Efectuado el día ".$fecha_curso." <br> en la ciudad de ".$ciudad_curso.".";  
    
    $data['nombre_estudiante'] = $estudiante; 
    $data['duracion_horas'] = $duracion_horas;
    $data['fecha_curso'] = $fecha_curso;
    $data['ciudad_curso']=$ciudad_curso;
    $data['nac']=$nac;
    $data['folio']=$folio;

    $data['parrafo']=$parrafo;

    $this->mpdf->constancia_participacion_acls('formatos_imprimir/acls/v40.constancia_participacion_acls.php',$data); 
} 

public function carta_PI_acls() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf');
    $fecha_actual = new DateTime('NOW');
    $data = array();

    //---Variables
    $fecha_actual=$fecha_actual->format('d/m/Y');
    $sede_curso="Guanajuato, Gto.";
    $instructor="Omar Martínez Torres";
    $fecha="12/08/2020";       
    $ciudad_curso="Guanajuato, Gto.";
    $dia1_curso="12";
    $dia2_curso="21";
    $mes_curso="Agosto";
    $folio="0012";
    $director_curso="Omar Martínez Torres";
    
    $data['fecha_actual'] = $fecha_actual; 
    $data['fecha'] = $fecha;
    $data['sede_curso'] = $sede_curso;
    $data['instructor']=$instructor;
    $data['dia1_curso']=$dia1_curso;
    $data['dia2_curso']=$dia2_curso;
    $data['mes_curso']=$mes_curso;
    $data['folio']=$folio;
    $data['director_curso']=$director_curso;

    $this->mpdf->carta_PI_acls('formatos_imprimir/acls/v41.carta_PI_acls.php',$data); 
} 

public function Instructor_Candidate_Aplication_acls() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf');
    $fecha_actual = new DateTime('NOW');
    $data = array();
    
    $Renewal_date_provider='02/06/2020';
    $name_candidate='Omar Martínez Torres'; 
    $address='C. San Antonio #1, col. Villaseca';
    $city='Guanajuato';
    $state='Guanajuato';
    $cp='36000';
    $tel='4735608954';
    $email='ejemplo@hotmail.com'; 
    $id_instructor='0098'; 
    $date_renewal='12/04/2020';
    $tc_name='Ejemplo de TC'; 
    $tc_id='0032';
    $fecha_actual=$fecha_actual->format('d/m/Y');

    $data['Renewal_date_provider'] = $Renewal_date_provider;
    $data['name_candidate'] = $name_candidate;
    $data['address'] =  $address;
    $data['city'] =  $city;
    $data['state'] = $state;
    $data['cp'] =  $cp;
    $data['tel'] =  $tel;
    $data['email'] = $email;
    $data['id_instructor'] = $id_instructor;
    $data['date_renewal'] =  $date_renewal;
    $data['tc_name'] = $tc_name;
    $data['tc_id'] =  $tc_id;
    $data['date'] = $fecha_actual;


    $this->mpdf->Instructor_Candidate_Aplication_acls('formatos_imprimir/acls/v42.Instructor_Candidate_Aplication_acls.php',$data); 
} 

public function Reporte_Director_curso_acls() 
{ 
    $this->load->model('curso');
    $this->load->library('Functions');  
    $this->load->library('Mpdf');
    $fecha_actual = new DateTime('NOW');
    $data = array(); 

    $data['fecha_curso'] = '02/06/2020';
    $data['sede_curso'] = 'Guanajuato, Gto';
    $data['lugar_curso'] = 'C. Guanajuato, Gto';
    $data['instructores'] = array(
                                array('name' =>'Omar Martínez Martínez1dqdqw dfeqfwef fwefew', 
                                       'residencia'=>'Guanajuato, Gto',
                                       'especidalidad'=>'Cardiopulmonar ddewdewdew',
                                       'cargo'=>'Director de hospital'
                                ),
                                array('name' =>'Omar Martínez Martínez2', 
                                       'residencia'=>'Silao, Gto',
                                       'especidalidad'=>'Pediatria',
                                       'cargo'=>'Medico de hospital'
                                ),
                    
                            );
    $data['Proveedores_capacitar']=12;
    $data['Proveedores_capacitados']=10;
    $data['capa_gineco']=6;
    $data['capa_generales']=2;
    $data['capa_urgen']=3;
    $data['capa_enferm']=4;
    $data['capa_intern']=5;
    $data['capa_inten']=1;
    $data['capa_anes']=7;
    $data['capa_tum']=8;
    $data['capa_tem']=9;

    $data['provee_apro_tteorico']=86;
    $data['provee_aprob_pteorico']='95%';
    $data['provee_apro_tpractico']=79;
    $data['provee_aprob_ppractico']='80%';

    $data['provee_repro_tteorico']=3;
    $data['provee_reprob_pteorico']='4%';
    $data['provee_repro_tpractico']=10;
    $data['provee_reprob_ppractico']='15%';

    $data['candidatos_inst'] = array(
                                array('name' =>'Omar Martínez Martínez1', 
                                       'puntajet'=>'90%',
                                       'puntajep'=>'80%'                                     
                                ),
                                array('name' =>'Omar Martínez Martínez2', 
                                       'puntajet'=>'90%',
                                       'puntajep'=>'80%'                                     
                                ),
                               
                               
                            );    

    $data['aulas']=0;
    $data['aulas_obs']="Podrian mejorara";
    $data['proy']=0;
    $data['proy_obs']="Podrian mejorarp";
    $data['seña']=0;
    $data['seña_obs']="Podrian mejorars";
    $data['venti']=0;
    $data['venti_obs']="Podrian mejorarv";
    
    $data['compu_c']=1;
    $data['compu_f']=1;

    $data['pape']=1;    
    $data['manual_ent']=0;

    $data['nemo']=1;
    $data['nemo_falt']=25;

    $data['ponencias'] = array(
                                array('nombre' =>'ponencia numero1', 
                                       'apegado'=>1,
                                       'calidad'=>1                                     
                                ),
                                array('nombre' =>'ponencia numero2', 
                                       'apegado'=>0,
                                       'calidad'=>0                                     
                                ),
                                array('nombre' =>'ponencia numero3', 
                                       'apegado'=>1,
                                       'calidad'=>2                                     
                                ),
                                array('nombre' =>'ponencia numero1', 
                                       'apegado'=>1,
                                       'calidad'=>1                                     
                                ),
                                array('nombre' =>'ponencia numero2', 
                                       'apegado'=>0,
                                       'calidad'=>0                                     
                                ),
                                array('nombre' =>'ponencia numero3 fewfwefew fwefewf fwefwefewfe', 
                                       'apegado'=>1,
                                       'calidad'=>2                                     
                                ),
                                array('nombre' =>'ponencia numero1', 
                                       'apegado'=>1,
                                       'calidad'=>1                                     
                                ),
                                array('nombre' =>'ponencia numero2', 
                                       'apegado'=>0,
                                       'calidad'=>0                                     
                                ),
                                array('nombre' =>'ponencia numero3', 
                                       'apegado'=>1,
                                       'calidad'=>2                                     
                                ),
                          
                            );
    $data['obs_ponen']="Aqui van las observaciones de las ponencias, aqui van las observaciones de las ponencias";
    $data['mat_taller'] = array(
                                array('nombre' =>'taller numero1', 
                                       'completo'=>1,
                                       'faltante'=>'todo muy bien'                                     
                                ),
                                array('nombre' =>'taller numero2', 
                                       'completo'=>0,
                                       'faltante'=>'Falto material'                                  
                                ),
                                array('nombre' =>'taller numero3', 
                                       'completo'=>1,
                                       'faltante'=>'todo muy bien taller 3'                                    
                                ),
                          
                            );
    $data['coffee']=2;
    $data['comida']=2;
    $data['hotel']=2;
    $data['viaticos']=array(
                                array('nombre' =>'instructor numero1', 
                                       'viaticos'=>1,                                     
                                ),
                                array('nombre' =>'instructor numero2', 
                                       'viaticos'=>0,                                  
                                ),
                                array('nombre' =>'instructor numero3', 
                                       'viaticos'=>2,                                    
                                ),

                          
                            );
    $data['lugar_inst']='Guanajuato, Gto capital';
    $data['fecha_inst']='13/10/2020';
    $data['hora_inst']='09:00 am';
    $data['concepto']=array(1,0,1,1,1,0,0,1);
    $data['comentarios']='Aquí van los comentarios de la reunion de los instructores';
    $data['des_curso']='Aquí el desarrollo del curso';

    $data['dir_curso']='Blanca Estela Hurtado';
    $data['dir_esp']='Medico general con Especialidad en Cardiopulmonar';
    $data['fecha_actual']=$fecha_actual->format('d/m/Y'); 

    $data['controller'] = $this->functions; 

    $this->mpdf->Reporte_Director_curso_acls('formatos_imprimir/acls/v45.Reporte_Director_curso_acls.php',$data); 
}


public function ejemplo_reporte_logistica_acls() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->ejemplo_reporte_logistica_acls('formatos_imprimir/acls/v46.ejemplo_reporte_logistica_acls.php',$data); 
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

    $this->mpdf->carta_compromiso_acls('formatos_imprimir/pdf.php',$data); 
} 
    /*-------------------------------------------------------------------------------------
    ----------------------------------------Reportes ALSO---------------------------------*/


public function Course_information_also() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf');
    $fecha_actual = new DateTime('NOW');
    $data = array();

    $coordinator="Omar Martínez Torres";
    $dir_medico="Omar Martínez Torres";
    $center_enter="Centro de Salud de Guanajuato";
    $site_cap="Centro de Salud de Guanajuato";
    $nombre_sede="Also";
    $date_ini_curse="10/09/2020";
    $time_ini_curse="09:00 a. m.";
    $students="30";
    $date_fin_curse="10/09/2020";
    $time_fin_curse="05:00 p. m.";
    $time_inst="1";
    $cards="10";
    $instructores=array(
        array('name' =>'Omar Martínez1','vencimiento'=>'12/10/2021'),
        array('name' =>'Omar Martínez2','vencimiento'=>'12/10/2022'),
        array('name' =>'Omar Martínez3','vencimiento'=>'12/10/2023'),
        array('name' =>'Omar Martínez4','vencimiento'=>'12/10/2024'),
        array('name' =>'Omar Martínez5','vencimiento'=>'12/10/2025'),
        array('name' =>'Omar Martínez6','vencimiento'=>'12/10/2026'),
        array('name' =>'Omar Martínez7','vencimiento'=>'12/10/2027'),
        array('name' =>'Omar Martínez8','vencimiento'=>'12/10/2028'),
        array('name' =>'Omar Martínez9','vencimiento'=>'12/10/2029'),
        array('name' =>'Omar Martínez10','vencimiento'=>'12/10/2030'),
        array('name' =>'Omar Martínez11','vencimiento'=>'12/10/2031'),
    );
    $date=$fecha_actual->format('d/m/Y'); 
    $folio="329"; 

    $data['coordinator'] = $coordinator;
    $data['dir_medico'] = $dir_medico;
    $data['center_enter'] = $center_enter;
    $data['site_cap'] = $site_cap;
    $data['nombre_sede'] = $nombre_sede;
    $data['date_ini_curse'] =$date_ini_curse;
    $data['time_ini_curse'] =$time_ini_curse;
    $data['students'] = $students;
    $data['date_fin_curse'] =$date_fin_curse;
    $data['time_fin_curse'] =$time_fin_curse;
    $data['time_inst'] = $time_inst;
    $data['cards'] = $cards;
    $data['instructores'] =$instructores;
    $data['date'] = $date;
    $data['folio'] = $folio; 

    $this->mpdf->Course_information_also('formatos_imprimir/also/v1.Course_information_also.php',$data); 
} 

public function course_participants_also() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $this->load->library('Functions');
    $data = array();

    $data['folio']=32;
    $data['tam_reg_tabla']=10;

    $data['participantes'] = array(
                                    array(
                                        'nombre' => 'Omar Martínez Martínez',
                                        'correo' => 'omar@gmail.com',
                                        'escrito'=> 85,
                                        'practico'=> 90,
                                        'aprueba'=> $this->functions->aprobado_noaprobado(1),
                                        'pi'=> 90,
                                        ),
                                    array(
                                        'nombre' => 'Omar Martínez Martínez',
                                        'correo' => 'omar@gmail.com',
                                        'escrito'=> 85,
                                        'practico'=> 90,
                                        'aprueba'=> $this->functions->aprobado_noaprobado(1),
                                        'pi'=> 90,
                                        ),
                                    array(
                                        'nombre' => 'Omar Martínez Martínez',
                                        'correo' => 'omar@gmail.com',
                                        'escrito'=> 85,
                                        'practico'=> 90,
                                        'aprueba'=> $this->functions->aprobado_noaprobado(1),
                                        'pi'=> 90,
                                        ),
                                    array(
                                        'nombre' => 'Omar Martínez Martínez',
                                        'correo' => 'omar@gmail.com',
                                        'escrito'=> 85,
                                        'practico'=> 90,
                                        'aprueba'=> $this->functions->aprobado_noaprobado(1),
                                        'pi'=> 90,
                                        ),
                                    array(
                                        'nombre' => 'Omar Martínez Martínez',
                                        'correo' => 'omar@gmail.com',
                                        'escrito'=> 85,
                                        'practico'=> 90,
                                        'aprueba'=> $this->functions->aprobado_noaprobado(1),
                                        'pi'=> 90,
                                        ),
                                    array(
                                        'nombre' => 'Omar Martínez Martínez',
                                        'correo' => 'omar@gmail.com',
                                        'escrito'=> 85,
                                        'practico'=> 90,
                                        'aprueba'=> $this->functions->aprobado_noaprobado(1),
                                        'pi'=> 90,
                                        ),
                                    array(
                                        'nombre' => 'Omar Martínez Martínez',
                                        'correo' => 'omar@gmail.com',
                                        'escrito'=> 85,
                                        'practico'=> 90,
                                        'aprueba'=> $this->functions->aprobado_noaprobado(1),
                                        'pi'=> 90,
                                        ),
                                    array(
                                        'nombre' => 'Omar Martínez Martínez',
                                        'correo' => 'omar@gmail.com',
                                        'escrito'=> 85,
                                        'practico'=> 90,
                                        'aprueba'=> $this->functions->aprobado_noaprobado(1),
                                        'pi'=> 90,
                                        ),
                                    array(
                                        'nombre' => 'Omar Martínez Martínez',
                                        'correo' => 'omar@gmail.com',
                                        'escrito'=> 85,
                                        'practico'=> 90,
                                        'aprueba'=> $this->functions->aprobado_noaprobado(1),
                                        'pi'=> 90,
                                        ),
                                    array(
                                        'nombre' => 'Omar Martínez Martínez',
                                        'correo' => 'omar@gmail.com',
                                        'escrito'=> 85,
                                        'practico'=> 90,
                                        'aprueba'=> $this->functions->aprobado_noaprobado(1),
                                        'pi'=> 90,
                                        ),
                                    array(
                                        'nombre' => 'Omar Martínez Martínez',
                                        'correo' => 'omar@gmail.com',
                                        'escrito'=> 85,
                                        'practico'=> 90,
                                        'aprueba'=> $this->functions->aprobado_noaprobado(1),
                                        'pi'=> 90,
                                        ),
                                    array(
                                        'nombre' => 'Omar Martínez Martínez',
                                        'correo' => 'omar@gmail.com',
                                        'escrito'=> 85,
                                        'practico'=> 90,
                                        'aprueba'=> $this->functions->aprobado_noaprobado(1),
                                        'pi'=> 90,
                                        ),
                                    array(
                                        'nombre' => 'Omar Martínez Martínez',
                                        'correo' => 'omar@gmail.com',
                                        'escrito'=> 85,
                                        'practico'=> 90,
                                        'aprueba'=> $this->functions->aprobado_noaprobado(1),
                                        'pi'=> 90,
                                        ),
                                    array(
                                        'nombre' => 'Omar Martínez Martínez',
                                        'correo' => 'omar@gmail.com',
                                        'escrito'=> 85,
                                        'practico'=> 90,
                                        'aprueba'=> $this->functions->aprobado_noaprobado(1),
                                        'pi'=> 90,
                                        ),
                                    array(
                                        'nombre' => 'Omar Martínez Martínez',
                                        'correo' => 'omar@gmail.com',
                                        'escrito'=> 85,
                                        'practico'=> 90,
                                        'aprueba'=> $this->functions->aprobado_noaprobado(1),
                                        'pi'=> 90,
                                        ),
                                    array(
                                        'nombre' => 'Omar Martínez Martínez',
                                        'correo' => 'omar@gmail.com',
                                        'escrito'=> 85,
                                        'practico'=> 90,
                                        'aprueba'=> $this->functions->aprobado_noaprobado(1),
                                        'pi'=> 90,
                                        ),
                                    array(
                                        'nombre' => 'Omar Martínez Martínez',
                                        'correo' => 'omar@gmail.com',
                                        'escrito'=> 85,
                                        'practico'=> 90,
                                        'aprueba'=> $this->functions->aprobado_noaprobado(1),
                                        'pi'=> 90,
                                        ),
                                    array(
                                        'nombre' => 'Omar Martínez Martínez',
                                        'correo' => 'omar@gmail.com',
                                        'escrito'=> 85,
                                        'practico'=> 90,
                                        'aprueba'=> $this->functions->aprobado_noaprobado(1),
                                        'pi'=> 90,
                                        ),
                                    array(
                                        'nombre' => 'Omar Martínez Martínez',
                                        'correo' => 'omar@gmail.com',
                                        'escrito'=> 85,
                                        'practico'=> 90,
                                        'aprueba'=> $this->functions->aprobado_noaprobado(1),
                                        'pi'=> 90,
                                        ),
                                    array(
                                        'nombre' => 'Omar Martínez Martínez',
                                        'correo' => 'omar@gmail.com',
                                        'escrito'=> 85,
                                        'practico'=> 90,
                                        'aprueba'=> $this->functions->aprobado_noaprobado(1),
                                        'pi'=> 90,
                                        ),
                                    array(
                                        'nombre' => 'Omar Martínez Martínez',
                                        'correo' => 'omar@gmail.com',
                                        'escrito'=> 85,
                                        'practico'=> 90,
                                        'aprueba'=> $this->functions->aprobado_noaprobado(1),
                                        'pi'=> 90,
                                        ),
                                    array(
                                        'nombre' => 'Omar Martínez Martínez',
                                        'correo' => 'omar@gmail.com',
                                        'escrito'=> 85,
                                        'practico'=> 90,
                                        'aprueba'=> $this->functions->aprobado_noaprobado(1),
                                        'pi'=> 90,
                                        ),
                                    array(
                                        'nombre' => 'Omar Martínez Martínez',
                                        'correo' => 'omar@gmail.com',
                                        'escrito'=> 85,
                                        'practico'=> 90,
                                        'aprueba'=> $this->functions->aprobado_noaprobado(1),
                                        'pi'=> 90,
                                        ),
                                    array(
                                        'nombre' => 'Omar Martínez Martínez',
                                        'correo' => 'omar@gmail.com',
                                        'escrito'=> 85,
                                        'practico'=> 90,
                                        'aprueba'=> $this->functions->aprobado_noaprobado(1),
                                        'pi'=> 90,
                                        ),
                                    

                            );

    

    $this->mpdf->course_participants_also('formatos_imprimir/also/v2.course_participants_also.php',$data); 
}

public function ejemplo_agenda_also() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf');
    $this->load->library('Functions');
    $data = array();

    $ciudad="Hermosillo"; 

    $agenda = array(
                    array(
                        'fecha'=>'28-nov-19',
                        'dia'=>$this->functions->cardinales(1),
                        'contenido'=>array(
                        array(
                            'duracion'=>'30 MIN',
                            'hora'=>'07:30',
                            'actividad'=>'Junta de instructores, recepción y registro',
                            'responsable'=>'TODOS Y LOGISTICA',
                            'mat_obs'=>'Registros y gafetes',
                            'color_hora'=>'#4eb9f4',
                            'color_actividad'=>'black',
                            'weight_hora'=>'normal',
                            'weight_actividad'=>'normal',
                            'weight_responsable'=>'normal',
                        ),

                        array(
                            'duracion'=>'40 MIN',
                            'hora'=>'08:00',
                            'actividad'=>'Seguridad en el cuidado materno',
                            'responsable'=>'Dr. Rafael Nieves',
                            'mat_obs'=>'Video proyector',
                            'color_hora'=>'#4eb9f4',
                            'color_actividad'=>'black',
                            'weight_hora'=>'normal',
                            'weight_actividad'=>'normal',
                            'weight_responsable'=>'normal',    
                        ),

                        array(
                            'duracion'=>'25 MIN',
                            'hora'=>'08:40',
                            'actividad'=>'Hemorragia vaginal al final del embarazo',
                            'responsable'=>'Dr. Iván Méndez',
                            'mat_obs'=>'Video proyector',
                            'color_hora'=>'black',
                            'color_actividad'=>'black',
                            'weight_hora'=>'normal',
                            'weight_actividad'=>'normal',
                            'weight_responsable'=>'normal',    
                        ),

                        array(
                            'duracion'=>'25 MIN',
                            'hora'=>'09:05',
                            'actividad'=>'Reanimación Materna y trauma en el embarazo',
                            'responsable'=>'Dra. Guadalupe Martinez',
                            'mat_obs'=>'Video proyector',
                            'color_hora'=>'black',
                            'color_actividad'=>'black',
                            'weight_hora'=>'normal',
                            'weight_actividad'=>'normal',
                            'weight_responsable'=>'normal'
                        ),
                        
                        array(
                            'duracion'=>'30 MIN',
                            'hora'=>'09:30',
                            'actividad'=>'Hemorragia Postparto',
                            'responsable'=>'Dr. Rafael Nieves',
                            'mat_obs'=>'Video proyector',
                            'color_hora'=>'#7634b0',
                            'color_actividad'=>'black',
                            'weight_hora'=>'normal',
                            'weight_actividad'=>'normal',
                            'weight_responsable'=>'normal'
                        ),

                        array(
                            'duracion'=>'30 MIN',
                            'hora'=>'10:00',
                            'actividad'=>'R E C E S O',
                            'responsable'=>'',
                            'mat_obs'=>'Logistica',
                            'color_hora'=>'#7634b0',
                            'color_actividad'=>'black',
                            'weight_hora'=>'normal',
                            'weight_actividad'=>'normal',
                            'weight_responsable'=>'normal'
                        ),

                        array(
                            'duracion'=>'70 MIN',
                            'hora'=>'10:30',
                            'actividad'=>'Taller de Parto Instrumentado',
                            'responsable'=>'Dr. Guadalupe Martínez',
                            'mat_obs'=>'2 pelvis con feto y vacum',
                            'color_hora'=>'#7634b0',
                            'color_actividad'=>'black',
                            'weight_hora'=>'normal',
                            'weight_actividad'=>'normal',
                            'weight_responsable'=>'bold'
                        ),

                        array(
                            'duracion'=>'70 MIN',
                            'hora'=>'11:40',
                            'actividad'=>'Taller de Distocia de Hombros',
                            'responsable'=>'Dr. Iván Méndez',
                            'mat_obs'=>'2 pelvis con feto',
                            'color_hora'=>'#7634b0',
                            'color_actividad'=>'#00b050',
                            'weight_hora'=>'normal',
                            'weight_actividad'=>'normal',
                            'weight_responsable'=>'bold'
                        ),

                        array(
                            'duracion'=>'70 MIN',
                            'hora'=>'12:50',
                            'actividad'=>'Taller de Reanimación materna y HPP 4¨S',
                            'responsable'=>'Dr.Rafael Nieves/Dra. Magali Rosas',
                            'mat_obs'=>'4 Pelvis, úteros, pinzas foester, bakri.',
                            'color_hora'=>'#7634b0',
                            'color_actividad'=>'red',
                            'weight_hora'=>'normal',
                            'weight_actividad'=>'normal',
                            'weight_responsable'=>'bold'
                        ),

                        array(
                            'duracion'=>'45 MIN',
                            'hora'=>'14:00',
                            'actividad'=>'COMIDA',
                            'responsable'=>'Logística',
                            'mat_obs'=>'',
                            'color_hora'=>'black',
                            'color_actividad'=>'black',
                            'weight_hora'=>'100     ',
                            'weight_actividad'=>'bold',
                            'weight_responsable'=>'bold'
                        ),
                        array(
                            'duracion'=>'25 MIN',
                            'hora'=>'14:45',
                            'actividad'=>'Complicaciones en el primer trimestre del embarazo',
                            'responsable'=>'Dr. Iván Méndez',
                            'mat_obs'=>'Video proyector',
                            'color_hora'=>'#4eb9f4',
                            'color_actividad'=>'black',
                            'weight_hora'=>'100     ',
                            'weight_actividad'=>'normal',
                            'weight_responsable'=>'normal'
                        ),
                        array(
                            'duracion'=>'25 MIN',
                            'hora'=>'15:10',
                            'actividad'=>'Trabajo de parto pretermino y RPM',
                            'responsable'=>'Dra. Guadalupe Martínez',
                            'mat_obs'=>'Video proyector',
                            'color_hora'=>'#4eb9f4',
                            'color_actividad'=>'black',
                            'weight_hora'=>'normal',
                            'weight_actividad'=>'normal',
                            'weight_responsable'=>'normal'
                        ),

                        array(
                            'duracion'=>'25 MIN',
                            'hora'=>'15:35',
                            'actividad'=>'Distocia del trabajo de parto',
                            'responsable'=>'Dra. Magali Rosas',
                            'mat_obs'=>'Video proyector',
                            'color_hora'=>'#4eb9f4',
                            'color_actividad'=>'black',
                            'weight_hora'=>'normal',
                            'weight_actividad'=>'normal',
                            'weight_responsable'=>'normal'
                        ),

                        array(
                            'duracion'=>'20 MIN',
                            'hora'=>'16:00',
                            'actividad'=>'Junta de instructores',
                            'responsable'=>'Dr. Rafael Nieves',
                            'mat_obs'=>'',
                            'color_hora'=>'#4eb9f4',
                            'color_actividad'=>'black',
                            'weight_hora'=>'normal',
                            'weight_actividad'=>'bold',
                            'weight_responsable'=>'normal'
                        ),
                    ),
                    ),
                    array(
                        'fecha'=>'29-nov-19',
                        'dia'=>$this->functions->cardinales(2),
                        'contenido'=>array( 

                        array(
                            'duracion'=>'40 MIN',
                            'hora'=>'08:00',
                            'actividad'=>'Complicaciones médicas del embarazo',
                            'responsable'=>'Dr. Rafael Nieves',
                            'mat_obs'=>'Video proyector',
                            'color_hora'=>'#7634b0',
                            'color_actividad'=>'black',
                            'weight_hora'=>'normal',
                            'weight_actividad'=>'normal',
                            'weight_responsable'=>'bold'
                        ),

                        array(
                            'duracion'=>'70 MIN',
                            'hora'=>'08:40',
                            'actividad'=>'Taller de Vigilancia Fetal Intraparto',
                            'responsable'=>'Dr. Rafael Nieves/Dra. Gpe Mtz',
                            'mat_obs'=>'Video proyector de alta definición',
                            'color_hora'=>'black',
                            'color_actividad'=>'#4eb9f4',
                            'weight_hora'=>'normal',
                            'weight_actividad'=>'bold',
                            'weight_responsable'=>'bold'
                        ),

                        array(
                            'duracion'=>'30 MIN',
                            'hora'=>'09:50',
                            'actividad'=>'R E C E S O',
                            'responsable'=>'Logística',
                            'mat_obs'=>'',
                            'color_hora'=>'black',
                            'color_actividad'=>'black',
                            'weight_hora'=>'normal',
                            'weight_actividad'=>'bold',
                            'weight_responsable'=>'bold'
                        ),

                        array(
                            'duracion'=>'70 MIN',
                            'hora'=>'10:20',
                            'actividad'=>'Taller de AMEU',
                            'responsable'=>'Dra. Magali Rosas/Dr. Iván Méndez',
                            'mat_obs'=>'4 Equipos de AMEUHotel City ExpressH',
                            'color_hora'=>'black',
                            'color_actividad'=>'#7634b0',
                            'weight_hora'=>'normal',
                            'weight_actividad'=>'bold',
                            'weight_responsable'=>'bold'
                        ),

                        array(
                            'duracion'=>'70 MIN',
                            'hora'=>'11:30',
                            'actividad'=>'Taller de Casos Obstétricos',
                            'responsable'=>'Dr.Rafael Nieves/Dra. Magali Rosas',
                            'mat_obs'=>'Noelia, Hidralacina, MgSO4, soluciones',
                            'color_hora'=>'#7634b0',
                            'color_actividad'=>'red',
                            'weight_hora'=>'normal',
                            'weight_actividad'=>'normal',
                            'weight_responsable'=>'bold'
                        ),

                        array(
                            'duracion'=>'70 MIN',
                            'hora'=>'12:40',
                            'actividad'=>'Taller de Malas Presentaciones',
                            'responsable'=>'Dra.Guadalupe Mtz/Dr Iván Méndez',
                            'mat_obs'=>'2 pelvis con fetos',
                            'color_hora'=>'#7634b0',
                            'color_actividad'=>'wine',
                            'weight_hora'=>'normal',
                            'weight_actividad'=>'normal',
                            'weight_responsable'=>'bold'
                        ),

                        array(
                            'duracion'=>'75 MIN',
                            'hora'=>'13:10',
                            'actividad'=>'EVALUACION FINAL ESCRITO Y MEGAPARTO',
                            'responsable'=>'Todos',
                            'mat_obs'=>'4 pelvis con feto y placenta',
                            'color_hora'=>'#4eb9f4',
                            'color_actividad'=>'#7634b0',
                            'weight_hora'=>'normal',
                            'weight_actividad'=>'bold',
                            'weight_responsable'=>'bold'
                        ),

                        array(
                            'duracion'=>'60 MIN',
                            'hora'=>'14:30',
                            'actividad'=>'COMIDA',
                            'responsable'=>'Logística',
                            'mat_obs'=>'',
                            'color_hora'=>'black',
                            'color_actividad'=>'black',
                            'weight_hora'=>'normal',
                            'weight_actividad'=>'bold',
                            'weight_responsable'=>'bold'
                        ),

                        array(
                            'duracion'=>'30 MIN',
                            'hora'=>'15:30',
                            'actividad'=>'ENTREGA DE RESULTADOS Y CLAUSURA',
                            'responsable'=>'Todos',
                            'mat_obs'=>'',
                            'color_hora'=>'black',
                            'color_actividad'=>'black',
                            'weight_hora'=>'normal',
                            'weight_actividad'=>'bold',
                            'weight_responsable'=>'bold'
                        ),

                        array(
                            'duracion'=>'30 MIN',
                            'hora'=>'16:00',
                            'actividad'=>'JUNTA DE INSTRUCTORES Y EVALUACION DEL CURSO',
                            'responsable'=>'Todos',
                            'mat_obs'=>'',
                            'color_hora'=>'black',
                            'color_actividad'=>'black',
                            'weight_hora'=>'normal',
                            'weight_actividad'=>'bold',
                            'weight_responsable'=>'bold'
                        ),
                        ),
                    ),
            );

    $sede ='PACE';
    $lugar ='HIES HOSPITAL INFANTIL DEL ESTADO SONORA';
    $date_course = '28 Y 29 NOVIEMBRE 2019';
    $provee = '24 GO, RGO Y URG.';
    $hospedaje = 'Hotel City Express Hermosillo';
    $recomendaciones = array(
        array('dia' =>'JUEVES','recom'=>'PANTALON NEGRO, POLO GRIS.' ),
        array('dia' =>'VIERNES','recom'=>' PANTALON AZUL, CAMISA AZUL.' ),
    );
    $instructores = array(
        array('abrev_prof' => 'Dr.', 'instructor' => 'Rafael Antonio Nieves Meneses', 'puesto' => 'Director del curso'),
        array('abrev_prof' => 'Dra.', 'instructor' => 'María Guadalupe Martínez León.', 'puesto' => 'Facultado'),
        array('abrev_prof' => 'Dra.', 'instructor' => 'Maria Magali Rosas Rosales', 'puesto' => 'Instructor'),
        array('abrev_prof' => 'Dr.', 'instructor' => 'Sergio Iván Méndez Mercado', 'puesto' => 'Instructor'),
    );

    $data['ciudad'] = $ciudad;
    $data['sede'] = $sede;
    $data['lugar'] = $lugar;
    $data['date_course'] = $date_course;
    $data['provee'] = $provee;
    $data['agenda'] = $agenda;
    $data['hospedaje'] = $hospedaje;
    $data['recomendaciones'] = $recomendaciones;
    $data['instructores'] = $instructores;

$this->mpdf->ejemplo_agenda_also('formatos_imprimir/also/v12.ejemplo_agenda_also.php',$data); 
} 

public function apendiceN_also() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array();

    $nombre="Blanca Estela Hurtado";
    $fecha_nac="10/12/1999";
    $edad="21";
    $perfil="Enfermera";
    $residencia="Guanajuato";
    $telefono_fij="473 &nbsp; 7323456";
    $telefono_cel="473 &nbsp; 1118934";
    $calle="San Antonio de Abad";
    $cp="36000";
    $ciudad="Guanajuato";
    $disp_viajar="Si";
    $Lugar_trab="Secretaria de Salud";
    $email="blanca@hotmil.com";
    $fecha_lugar_curso="18/03/2020,Guanajuato";
    $puntaje_teorico="100";
    $puntaje_megaparto="100";
    $instructor="Carolina Hurtado";
    $fecha_lugar_instr="11/08/2019,Guanajuato";
    $fecha_lugar_monit="28/06/2019,Guanajuato";
    $numero_monit="X";
    $tema_exp="Covid 19";
    $inst_sup="Juan Perez";
    $talleres="Taller covid 19";
    $inst_sup2="Edith Perez";
    $nombre_fir_fac="Blanca Estela Hurtado";   
    
    
    $data['nombre'] = $nombre;
    $data['fecha_nac'] = $fecha_nac;
    $data['edad'] = $edad;
    $data['perfil'] = $perfil;
    $data['residencia'] = $residencia;
    $data['telefono_fij'] = $telefono_fij;
    $data['telefono_cel'] = $telefono_cel;
    $data['calle'] = $calle;
    $data['cp'] = $cp;
    $data['ciudad'] = $ciudad;
    $data['disp_viajar'] = $disp_viajar;
    $data['Lugar_trab'] = $Lugar_trab;
    $data['email'] = $email;
    $data['fecha_lugar_curso'] = $fecha_lugar_curso;
    $data['puntaje_teorico'] = $puntaje_teorico;
    $data['puntaje_megaparto'] = $puntaje_megaparto;
    $data['instructor'] = $instructor;
    $data['fecha_lugar_instr'] = $fecha_lugar_instr;
    $data['fecha_lugar_monit'] = $fecha_lugar_monit;
    $data['numero_monit'] = $numero_monit;
    $data['tema_exp'] = $tema_exp;
    $data['inst_sup'] = $inst_sup;
    $data['talleres'] = $talleres;
    $data['inst_sup2'] = $inst_sup2;
    $data['nombre_fir_fac'] = $nombre_fir_fac;


    $this->mpdf->apendiceN_also('formatos_imprimir/also/v13.apendiceN_also.php',$data); 
} 

public function examen_destresas_also() 
{ 
    $participante = $this->input->get('pte');
    $curso = $this->input->get('curso');
    $datos = $this->get_data_participante($participante, $curso);
 
    $data = array(); 
    $data['nombre'] = $datos['name'];
    $data['folio'] = 0;

    $this->mpdf->examen_destresas_also('formatos_imprimir/also/v14.examen_destresas_also.php',$data);
} 

public function evaluacion_teorica_also() 
{ 
    $participante = $this->input->get('pte');
    $curso = $this->input->get('curso');
    $datos = $this->get_data_participante($participante, $curso);
 
    $data = array(); 
    $data['nombre_participante'] = array(
        array('nombre' => $datos['name'], 'folio'=>0)
    );

    $this->mpdf->evaluacion_teorica_also('formatos_imprimir/also/v15.evaluacion_teorica_also.php',$data); 
} 

public function Formato_Remediacion_also() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $datos = array(
        array('nombre' => 'Omar Martínez Torres', 'curso_or_fecha_sede' => '12/10/2020, Saltillo', 'curso_rem_fecha_sede' => '23/11/2020, Zacatecas', 'resultado'=>'Ninguno'),
        array('nombre' => 'Omar Martínez Torres', 'curso_or_fecha_sede' => '12/10/2020, Saltillo', 'curso_rem_fecha_sede' => '23/11/2020, Zacatecas', 'resultado'=>'Ninguno'),
        array('nombre' => 'Omar Martínez Torres', 'curso_or_fecha_sede' => '12/10/2020, Saltillo', 'curso_rem_fecha_sede' => '23/11/2020, Zacatecas', 'resultado'=>'Ninguno'),
        array('nombre' => 'Omar Martínez Torres', 'curso_or_fecha_sede' => '12/10/2020, Saltillo', 'curso_rem_fecha_sede' => '23/11/2020, Zacatecas', 'resultado'=>'Ninguno'),
        array('nombre' => 'Omar Martínez Torres', 'curso_or_fecha_sede' => '12/10/2020, Saltillo', 'curso_rem_fecha_sede' => '23/11/2020, Zacatecas', 'resultado'=>'Ninguno'),
        array('nombre' => 'Omar Martínez Torres', 'curso_or_fecha_sede' => '12/10/2020, Saltillo', 'curso_rem_fecha_sede' => '23/11/2020, Zacatecas', 'resultado'=>'Ninguno'),
        array('nombre' => 'Omar Martínez Torres', 'curso_or_fecha_sede' => '12/10/2020, Saltillo', 'curso_rem_fecha_sede' => '23/11/2020, Zacatecas', 'resultado'=>'Ninguno'),
        array('nombre' => 'Omar Martínez Torres', 'curso_or_fecha_sede' => '12/10/2020, Saltillo', 'curso_rem_fecha_sede' => '23/11/2020, Zacatecas', 'resultado'=>'Ninguno'),
        array('nombre' => 'Omar Martínez Torres', 'curso_or_fecha_sede' => '12/10/2020, Saltillo', 'curso_rem_fecha_sede' => '23/11/2020, Zacatecas', 'resultado'=>'Ninguno'),
        array('nombre' => 'Omar Martínez Torres', 'curso_or_fecha_sede' => '12/10/2020, Saltillo', 'curso_rem_fecha_sede' => '23/11/2020, Zacatecas', 'resultado'=>'Ninguno'),       

    );

    $data['datos'] = $datos;
    $data['folio'] = '4532';
    $data['tam_reg_tabla']=9; 

    $this->mpdf->Formato_Remediacion_also('formatos_imprimir/also/v17.Formato_Remediacion_also.php',$data); 
} 

public function evaluacion_teorica_remediar_also() 
{ 
    $participante = $this->input->get('pte');
    $curso = $this->input->get('curso');
    $datos = $this->get_data_participante($participante, $curso);
 
    $data = array(); 
    $data['nombre_participante'] = array(
        array('nombre' => $datos['name'], 'folio'=>0)
    );
    $this->mpdf->evaluacion_teorica_remediar_also('formatos_imprimir/also/v18.evaluacion_teorica_remediar_also.php',$data); 
} 

public function constancia_participacion_also() 
{ 

    $participante = $this->input->get('pte');
    $curso = $this->input->get('curso');
    $date = $this->getDate();
    $datos = $this->get_data_participante($participante, $curso);
    $datos_curso = $this->get_data_curso($curso );
    

    $data['participante'] = mb_strtoupper($datos['name']);
    $data['capacitacion']=mb_strtoupper("proveedor");
    $data['fecha_emision'] = $date;
    $data['fecha_renovacion'] = "19/01/2020";
    $data['centro']=mb_strtoupper("Centro PACE");
    $data['director_curso']=mb_strtoupper("DR. RODOLFO JESÚS MORALES GONZÁLEZ");
    $data['folio']="2108";
    $data['dia1']="18";
    $data['dia2']="19";
    $data['mes']=mb_strtoupper("Enero");
    $data['anio']="2020";
    $data['lugar'] = mb_strtoupper($datos_curso->municipio.", ".$datos_curso->estado);

    $this->mpdf->constancia_participacion_also('formatos_imprimir/also/v19.constancia_participacion_also.php',$data); 
} 

public function carta_PI_also() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $fecha_actual = new DateTime('NOW');
    $data = array();

    //---Variables
    $fecha_actual=$fecha_actual->format('d/m/Y');
    $sede_curso="Guanajuato, Gto.";
    $instructor="Omar Martínez Torres";
    $fecha="12/08/2020";       
    $ciudad_curso="Guanajuato, Gto.";
    $dia1_curso="12";
    $dia2_curso="21";
    $mes_curso="Agosto";
    $folio="0012";
    $director_curso="Omar Martínez Torres";
    
    $data['fecha_actual'] = $fecha_actual; 
    $data['fecha'] = $fecha;
    $data['sede_curso'] = $sede_curso;
    $data['instructor']=$instructor;
    $data['dia1_curso']=$dia1_curso;
    $data['dia2_curso']=$dia2_curso;
    $data['mes_curso']=$mes_curso;
    $data['folio']=$folio;
    $data['director_curso']=$director_curso; 

    $this->mpdf->carta_PI_also('formatos_imprimir/also/v20.carta_PI_also.php',$data); 
} 

public function Reporte_Director_curso_also() 
{ 
    $this->load->model('curso');
    $this->load->library('Functions');  
    $this->load->library('Mpdf');
    $fecha_actual = new DateTime('NOW');
    $data = array(); 

    $data['fecha_curso'] = '02/06/2020';
    $data['sede_curso'] = 'Guanajuato, Gto';
    $data['lugar_curso'] = 'C. Guanajuato, Gto';
    $data['instructores'] = array(
                                array('name' =>'Omar Martínez Martínez1dqdqw dfeqfwef fwefew', 
                                       'residencia'=>'Guanajuato, Gto',
                                       'especidalidad'=>'Cardiopulmonar ddewdewdew',
                                       'cargo'=>'Director de hospital'
                                ),
                                array('name' =>'Omar Martínez Martínez2', 
                                       'residencia'=>'Silao, Gto',
                                       'especidalidad'=>'Pediatria',
                                       'cargo'=>'Medico de hospital'
                                ),
                    
                            );
    $data['Proveedores_capacitar']=12;
    $data['Proveedores_capacitados']=10;
    $data['capa_gineco']=6;
    $data['capa_generales']=2;
    $data['capa_urgen']=3;
    $data['capa_enferm']=4;
    $data['capa_intern']=5;
    $data['capa_inten']=1;
    $data['capa_anes']=7;
    $data['capa_tum']=8;
    $data['capa_tem']=9;

    $data['provee_apro_tteorico']=86;
    $data['provee_aprob_pteorico']='95%';
    $data['provee_apro_tpractico']=79;
    $data['provee_aprob_ppractico']='80%';

    $data['provee_repro_tteorico']=3;
    $data['provee_reprob_pteorico']='4%';
    $data['provee_repro_tpractico']=10;
    $data['provee_reprob_ppractico']='15%';

    $data['candidatos_inst'] = array(
                                array('name' =>'Omar Martínez Martínez1', 
                                       'puntajet'=>'90%',
                                       'puntajep'=>'80%'                                     
                                ),
                                array('name' =>'Omar Martínez Martínez2', 
                                       'puntajet'=>'90%',
                                       'puntajep'=>'80%'                                     
                                ),
                               
                               
                            );    

    $data['aulas']=0;
    $data['aulas_obs']="Podrian mejorara";
    $data['proy']=0;
    $data['proy_obs']="Podrian mejorarp";
    $data['seña']=0;
    $data['seña_obs']="Podrian mejorars";
    $data['venti']=0;
    $data['venti_obs']="Podrian mejorarv";
    
    $data['compu_c']=1;
    $data['compu_f']=1;

    $data['pape']=1;    
    $data['manual_ent']=0;

    $data['nemo']=1;
    $data['nemo_falt']=25;

    $data['ponencias'] = array(
                                array('nombre' =>'ponencia numero1', 
                                       'apegado'=>1,
                                       'calidad'=>1                                     
                                ),
                                array('nombre' =>'ponencia numero2', 
                                       'apegado'=>0,
                                       'calidad'=>0                                     
                                ),
                                array('nombre' =>'ponencia numero3', 
                                       'apegado'=>1,
                                       'calidad'=>2                                     
                                ),
                                array('nombre' =>'ponencia numero1', 
                                       'apegado'=>1,
                                       'calidad'=>1                                     
                                ),
                                array('nombre' =>'ponencia numero2', 
                                       'apegado'=>0,
                                       'calidad'=>0                                     
                                ),
                                array('nombre' =>'ponencia numero3 fewfwefew fwefewf fwefwefewfe', 
                                       'apegado'=>1,
                                       'calidad'=>2                                     
                                ),
                                array('nombre' =>'ponencia numero1', 
                                       'apegado'=>1,
                                       'calidad'=>1                                     
                                ),
                                array('nombre' =>'ponencia numero2', 
                                       'apegado'=>0,
                                       'calidad'=>0                                     
                                ),
                                array('nombre' =>'ponencia numero3', 
                                       'apegado'=>1,
                                       'calidad'=>2                                     
                                ),
                          
                            );
    $data['obs_ponen']="Aqui van las observaciones de las ponencias, aqui van las observaciones de las ponencias";
    $data['mat_taller'] = array(
                                array('nombre' =>'taller numero1', 
                                       'completo'=>1,
                                       'faltante'=>'todo muy bien'                                     
                                ),
                                array('nombre' =>'taller numero2', 
                                       'completo'=>0,
                                       'faltante'=>'Falto material'                                  
                                ),
                                array('nombre' =>'taller numero3', 
                                       'completo'=>1,
                                       'faltante'=>'todo muy bien taller 3'                                    
                                ),
                          
                            );
    $data['coffee']=2;
    $data['comida']=2;
    $data['hotel']=2;
    $data['viaticos']=array(
                                array('nombre' =>'instructor numero1', 
                                       'viaticos'=>1,                                     
                                ),
                                array('nombre' =>'instructor numero2', 
                                       'viaticos'=>0,                                  
                                ),
                                array('nombre' =>'instructor numero3', 
                                       'viaticos'=>2,                                    
                                ),

                          
                            );
    $data['lugar_inst']='Guanajuato, Gto capital';
    $data['fecha_inst']='13/10/2020';
    $data['hora_inst']='09:00 am';
    $data['concepto']=array(1,0,1,1,1,0,0,1);
    $data['comentarios']='Aquí van los comentarios de la reunion de los instructores';
    $data['des_curso']='Aquí el desarrollo del curso';

    $data['dir_curso']='Blanca Estela Hurtado';
    $data['dir_esp']='Medico general con Especialidad en Cardiopulmonar';
    $data['fecha_actual']=$fecha_actual->format('d/m/Y'); 

    $data['controller'] = $this->functions; 

    $this->mpdf->Reporte_Director_curso_also('formatos_imprimir/also/v23.Reporte_Director_curso_also.php',$data); 
} 

public function ejemplo_reporte_logistica_also() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->ejemplo_reporte_logistica_also('formatos_imprimir/also/v24.ejemplo_reporte_logistica_also.php',$data); 
}

  

    /*-------------------------------------------------------------------------------------
    ----------------------------------------Reportes AMLS---------------------------------*/


public function course_information_amls() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['tam_reg_tabla']=13;
    $data['curso_nacional'] = "009";
    $data['fecha_curso'] = "15/09/2020";
    $data['coordinador_curso'] = "Omar Martínez Torres";
    $data['Localidad'] = "Guanajuato, Gto. Cp 36000, México";
    $data['facultad_afiliada'] = "Descripcion de la facultad";
    $data['curso1'] = "X";
    $data['curso2'] = "";
    $data['curso3'] = "";
    $data['curso4'] = "";
    $data['curso5'] = "";
    $data['instructores']=array(
                            array('nombre' => "Omar Martínez Torres", 
                                  'correo'=>'omar-martinez@hotmail.com',
                                  'direccion'=>'C.Principal, Villaseca, Guanajuato, Gto',
                                  'tel'=>'4737896546',
                                  'reconocidos'=>'X',
                                  'reconocidon'=>'',
                                  'monitoreado'=>'si',
                            ),                  

                        );    

    $this->mpdf->course_information_amls('formatos_imprimir/amls/v1.course_information_amls.php',$data); 
} 

public function course_participants_amls() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf');
    $this->load->library('Functions'); 
    $data = array(); 

    $data['tam_reg_tabla']=18;
    $data['curso_nacional'] = "009";
    $data['fecha_curso'] = "15/09/2020";
    $data['coordinador_curso'] = "Omar Martínez Torres";
    $data['Localidad'] = "Guanajuato, Gto. Cp 36000, México";
    $data['facultad_afiliada'] = "Descripcion de la facultad";
    $data['tipo_curso'] = 5;
   
    $data['participantes']=array(
                            array('nombre' => "Omar Martínez Torres", 
                                  'direccion'=>'C.Principal, Villaseca, Guanajuato, Gto, 36000',
                                  'tel'=>'4737896546',                             
                                  'miembro'=>'si',
                                  'nivel'=>2,
                                  'escrito'=>10,
                                  'estacion_final'=>3,
                                  'aprueba'=> $this->functions->aprobado_noaprobado(1),
                            ),
                            array('nombre' => "Omar Martínez Torres", 
                                  'direccion'=>'C.Principal, Villaseca, Guanajuato, Gto, 36000',
                                  'tel'=>'4737896546',                             
                                  'miembro'=>'si',
                                  'nivel'=>2,
                                  'escrito'=>10,
                                  'estacion_final'=>3,
                                  'aprueba'=> $this->functions->aprobado_noaprobado(1),
                            ),
                            array('nombre' => "Omar Martínez Torres", 
                                  'direccion'=>'C.Principal, Villaseca, Guanajuato, Gto, 36000',
                                  'tel'=>'4737896546',                             
                                  'miembro'=>'si',
                                  'nivel'=>2,
                                  'escrito'=>10,
                                  'estacion_final'=>3,
                                  'aprueba'=> $this->functions->aprobado_noaprobado(1),
                            ),                   
                            array('nombre' => "Omar Martínez Torres", 
                                  'direccion'=>'C.Principal, Villaseca, Guanajuato, Gto, 36000',
                                  'tel'=>'4737896546',                             
                                  'miembro'=>'si',
                                  'nivel'=>2,
                                  'escrito'=>10,
                                  'estacion_final'=>3,
                                  'aprueba'=> $this->functions->aprobado_noaprobado(1),
                            ),
                            array('nombre' => "Omar Martínez Torres", 
                                  'direccion'=>'C.Principal, Villaseca, Guanajuato, Gto, 36000',
                                  'tel'=>'4737896546',                             
                                  'miembro'=>'si',
                                  'nivel'=>2,
                                  'escrito'=>10,
                                  'estacion_final'=>3,
                                  'aprueba'=> $this->functions->aprobado_noaprobado(1),
                            ),
                            array('nombre' => "Omar Martínez Torres", 
                                  'direccion'=>'C.Principal, Villaseca, Guanajuato, Gto, 36000',
                                  'tel'=>'4737896546',                             
                                  'miembro'=>'si',
                                  'nivel'=>2,
                                  'escrito'=>10,
                                  'estacion_final'=>3,
                                  'aprueba'=> $this->functions->aprobado_noaprobado(1),
                            ),
                            array('nombre' => "Omar Martínez Torres", 
                                  'direccion'=>'C.Principal, Villaseca, Guanajuato, Gto, 36000',
                                  'tel'=>'4737896546',                             
                                  'miembro'=>'si',
                                  'nivel'=>2,
                                  'escrito'=>10,
                                  'estacion_final'=>3,
                                  'aprueba'=> $this->functions->aprobado_noaprobado(1),
                            ),
                            array('nombre' => "Omar Martínez Torres", 
                                  'direccion'=>'C.Principal, Villaseca, Guanajuato, Gto, 36000',
                                  'tel'=>'4737896546',                             
                                  'miembro'=>'si',
                                  'nivel'=>2,
                                  'escrito'=>10,
                                  'estacion_final'=>3,
                                  'aprueba'=> $this->functions->aprobado_noaprobado(1),
                            ),
                            array('nombre' => "Omar Martínez Torres", 
                                  'direccion'=>'C.Principal, Villaseca, Guanajuato, Gto, 36000',
                                  'tel'=>'4737896546',                             
                                  'miembro'=>'si',
                                  'nivel'=>2,
                                  'escrito'=>10,
                                  'estacion_final'=>3,
                                  'aprueba'=> $this->functions->aprobado_noaprobado(1),
                            ),
                            array('nombre' => "Omar Martínez Torres", 
                                  'direccion'=>'C.Principal, Villaseca, Guanajuato, Gto, 36000',
                                  'tel'=>'4737896546',                             
                                  'miembro'=>'si',
                                  'nivel'=>2,
                                  'escrito'=>10,
                                  'estacion_final'=>3,
                                  'aprueba'=> $this->functions->aprobado_noaprobado(1),
                            ),
                            array('nombre' => "Omar Martínez Torres", 
                                  'direccion'=>'C.Principal, Villaseca, Guanajuato, Gto, 36000',
                                  'tel'=>'4737896546',                             
                                  'miembro'=>'si',
                                  'nivel'=>2,
                                  'escrito'=>10,
                                  'estacion_final'=>3,
                                  'aprueba'=> $this->functions->aprobado_noaprobado(1),
                            ),
                            array('nombre' => "Omar Martínez Torres", 
                                  'direccion'=>'C.Principal, Villaseca, Guanajuato, Gto, 36000',
                                  'tel'=>'4737896546',                             
                                  'miembro'=>'si',
                                  'nivel'=>2,
                                  'escrito'=>10,
                                  'estacion_final'=>3,
                                  'aprueba'=> $this->functions->aprobado_noaprobado(1),
                            ),
                            array('nombre' => "Omar Martínez Torres", 
                                  'direccion'=>'C.Principal, Villaseca, Guanajuato, Gto, 36000',
                                  'tel'=>'4737896546',                             
                                  'miembro'=>'si',
                                  'nivel'=>2,
                                  'escrito'=>10,
                                  'estacion_final'=>3,
                                  'aprueba'=> $this->functions->aprobado_noaprobado(1),
                            ),
                            array('nombre' => "Omar Martínez Torres", 
                                  'direccion'=>'C.Principal, Villaseca, Guanajuato, Gto, 36000',
                                  'tel'=>'4737896546',                             
                                  'miembro'=>'si',
                                  'nivel'=>2,
                                  'escrito'=>10,
                                  'estacion_final'=>3,
                                  'aprueba'=> $this->functions->aprobado_noaprobado(1),
                            ),
                            array('nombre' => "Omar Martínez Torres", 
                                  'direccion'=>'C.Principal, Villaseca, Guanajuato, Gto, 36000',
                                  'tel'=>'4737896546',                             
                                  'miembro'=>'si',
                                  'nivel'=>2,
                                  'escrito'=>10,
                                  'estacion_final'=>3,
                                  'aprueba'=> $this->functions->aprobado_noaprobado(1),
                            ),
                            array('nombre' => "Omar Martínez Torres", 
                                  'direccion'=>'C.Principal, Villaseca, Guanajuato, Gto, 36000',
                                  'tel'=>'4737896546',                             
                                  'miembro'=>'si',
                                  'nivel'=>2,
                                  'escrito'=>10,
                                  'estacion_final'=>3,
                                  'aprueba'=> $this->functions->aprobado_noaprobado(1),
                            ),
                            array('nombre' => "Omar Martínez Torres", 
                                  'direccion'=>'C.Principal, Villaseca, Guanajuato, Gto, 36000',
                                  'tel'=>'4737896546',                             
                                  'miembro'=>'si',
                                  'nivel'=>2,
                                  'escrito'=>10,
                                  'estacion_final'=>3,
                                  'aprueba'=> $this->functions->aprobado_noaprobado(1),
                            ),
                            array('nombre' => "Omar Martínez Torres", 
                                  'direccion'=>'C.Principal, Villaseca, Guanajuato, Gto, 36000',
                                  'tel'=>'4737896546',                             
                                  'miembro'=>'si',
                                  'nivel'=>2,
                                  'escrito'=>10,
                                  'estacion_final'=>3,
                                  'aprueba'=> $this->functions->aprobado_noaprobado(1),
                            ),
                            array('nombre' => "Omar Martínez Torres", 
                                  'direccion'=>'C.Principal, Villaseca, Guanajuato, Gto, 36000',
                                  'tel'=>'4737896546',                             
                                  'miembro'=>'si',
                                  'nivel'=>2,
                                  'escrito'=>10,
                                  'estacion_final'=>3,
                                  'aprueba'=> $this->functions->aprobado_noaprobado(1),
                            ),
                            array('nombre' => "Omar Martínez Torres", 
                                  'direccion'=>'C.Principal, Villaseca, Guanajuato, Gto, 36000',
                                  'tel'=>'4737896546',                             
                                  'miembro'=>'si',
                                  'nivel'=>2,
                                  'escrito'=>10,
                                  'estacion_final'=>3,
                                  'aprueba'=> $this->functions->aprobado_noaprobado(1),
                            ),                            

                        );

    $this->mpdf->course_participants_amls('formatos_imprimir/amls/v2.course_participants_amls.php',$data); 
} 

public function agenda_amls() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array();

    $this->mpdf->agenda_amls('formatos_imprimir/amls/v13.agenda_amls.php',$data); 
} 

public function hoja_monitorizacion_amls() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf');
    $fecha_actual = new DateTime('NOW');
    $data = array();

    $data['name_candidate'] = 'Omar Martínez Torres'; 
    $data['address'] =  'C. San Antonio #1, col. Villaseca';
    $data['city'] =  'Guanajuato';
    $data['state'] = 'Guanajuato';
    $data['cp'] =  '36000';
    $data['tel'] =  '4735608954';
    $data['email'] = 'ejemplo@hotmail.com';
    $data['facultad']="Aqui va la facultad";
    $data['date_moni']="10/02/2021";
    $data['program_moni']=5;
    $data['no_provider']=3212131;
    $data['date_provider']='12/10/2020';
    $data['no_monito']=68768;
    $data['date_monito']='12/10/2020';
    $data['comments_lecture']='xxxxxxxxxxxx xxxxxxxxxxxxxxx xxxxxxxxxxxxxxxxxxxxxx xxxxxxxx xxxxxxxx xxxxxxxxxx xxxxxxxxxx xxxxxxxxxxxx';
    $data['appro']="X";
    $data['remoni']="X";
    $data['date'] = $fecha_actual->format('d/m/Y'); 

    $this->mpdf->hoja_monitorizacion_amls('formatos_imprimir/amls/v14.hoja_monitorizacion_amls.php',$data); 
} 

public function AMLS_3E_amls() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf');
    $fecha_actual = new DateTime('NOW'); 

    $data = array(); 
    $data['date'] = $fecha_actual->format('d/m/Y');
    $data['name'] = 'Omar Martínez Torres'; 
    $data['number_course'] = '0093'; 
    $data['test_v'] = '4'; 

    $this->mpdf->AMLS_3E_amls('formatos_imprimir/amls/v15.AMLS_3E_amls.php',$data); 
} 

public function AMLS_BLS_Pretest_amls() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf');  
    $fecha_actual = new DateTime('NOW'); 

    $data = array(); 
    $data['date'] = $fecha_actual->format('d/m/Y');
    $data['name'] = 'Omar Martínez Torres'; 
    $data['ssn'] = '0093'; 
    $data['phone'] = '473 560-95-78';
    $data['course_site'] = 'Secretaria de Salud';

    $this->mpdf->AMLS_BLS_Pretest_amls('formatos_imprimir/amls/v16.AMLS_BLS_Pretest_amls.php',$data); 
} 

public function AMLS_ALS_Pretest_amls() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $fecha_actual = new DateTime('NOW'); 

    $data = array(); 
    $data['date'] = $fecha_actual->format('d/m/Y');
    $data['name'] = 'Omar Martínez Torres'; 
    $data['ssn'] = '0093'; 
    $data['phone'] = '473 560-95-78';
    $data['course_site'] = 'Secretaria de Salud'; 

    $this->mpdf->AMLS_ALS_Pretest_amls('formatos_imprimir/amls/v17.AMLS_ALS_Pretest_amls.php',$data); 
} 

public function AMLS_BLS_Post_Test_UK_amls() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $fecha_actual = new DateTime('NOW'); 

    $data = array(); 
    $data['date'] = $fecha_actual->format('d/m/Y');
    $data['name'] = 'Omar Martínez Torres'; 
    $data['ssn'] = '0093'; 
    $data['phone'] = '473 560-95-78';
    $data['course_site'] = 'Secretaria de Salud'; 

    $this->mpdf->AMLS_BLS_Post_Test_UK_amls('formatos_imprimir/amls/v18.AMLS_BLS_Post_Test_UK_amls.php',$data); 
} 

public function AMLS_ALS_Post_Test_UK_amls() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $fecha_actual = new DateTime('NOW'); 

    $data = array(); 
    $data['date'] = $fecha_actual->format('d/m/Y');
    $data['name'] = 'Omar Martínez Torres'; 
    $data['ssn'] = '0093'; 
    $data['phone'] = '473 560-95-78';
    $data['course_site'] = 'Secretaria de Salud'; 

    $this->mpdf->AMLS_ALS_Post_Test_UK_amls('formatos_imprimir/amls/v19.AMLS_ALS_Post_Test_UK_amls.php',$data); 
} 

public function evaluacion_practica_amls() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['n_grupo'] = 688; 
    $data['leader_equipo'] = 'Ej. leader'; 
    $data['esc'] = 897; 
    $data['evaluador'] = 'Omaru Martínez Torres'; 

    $this->mpdf->evaluacion_practica_amls('formatos_imprimir/amls/v28.evaluacion_practica_amls.php',$data); 
} 

public function constancia_participacion_amls() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array();  

    $data['nombre'] = 'Oscar Franco Marquez'; 
    $data['curso'] = 'Advanced Medical Life Support - 2nd Edition Provider course'; 
    $data['number_course'] = 'AM-20-03145-03';
    $data['coordinator']="Miriam del Carmen Cabrera Aguilar";
    $data['iss_date']="01-Mar-2020";
    $data['exp_date']="03/2024";
    $data['dir_course']="Ricardo Cruz Silva";

    $this->mpdf->constancia_participacion_amls('formatos_imprimir/amls/v31.constancia_participacion_amls.php',$data); 
} 

public function carta_PI_amls() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf');
    $fecha_actual = new DateTime('NOW'); 
    $data = array(); 
    //---Variables
    $fecha_actual=$fecha_actual->format('d/m/Y');
    $sede_curso="Guanajuato, Gto.";
    $instructor="Omar Martínez Torres";
    $fecha="12/08/2020";       
    $ciudad_curso="Guanajuato, Gto.";
    $dia1_curso="12";
    $dia2_curso="21";
    $mes_curso="Agosto";
    $folio="0012";
    $director_curso="Omar Martínez Torres";
    
    $data['fecha_actual'] = $fecha_actual; 
    $data['fecha'] = $fecha;
    $data['sede_curso'] = $sede_curso;
    $data['instructor']=$instructor;
    $data['dia1_curso']=$dia1_curso;
    $data['dia2_curso']=$dia2_curso;
    $data['mes_curso']=$mes_curso;
    $data['folio']=$folio;
    $data['director_curso']=$director_curso; 

    $this->mpdf->carta_PI_amls('formatos_imprimir/amls/v32.carta_PI_amls.php',$data); 
} 

public function Reporte_Director_curso_amls() 
{ 
    $this->load->model('curso');
    $this->load->library('Functions');  
    $this->load->library('Mpdf');
    $fecha_actual = new DateTime('NOW');
    $data = array(); 

    $data['fecha_curso'] = '02/06/2020';
    $data['sede_curso'] = 'Guanajuato, Gto';
    $data['lugar_curso'] = 'C. Guanajuato, Gto';
    $data['instructores'] = array(
                                array('name' =>'Omar Martínez Martínez1dqdqw dfeqfwef fwefew', 
                                       'residencia'=>'Guanajuato, Gto',
                                       'especidalidad'=>'Cardiopulmonar ddewdewdew',
                                       'cargo'=>'Director de hospital'
                                ),
                                array('name' =>'Omar Martínez Martínez2', 
                                       'residencia'=>'Silao, Gto',
                                       'especidalidad'=>'Pediatria',
                                       'cargo'=>'Medico de hospital'
                                ),
                    
                            );
    $data['Proveedores_capacitar']=12;
    $data['Proveedores_capacitados']=10;
    $data['capa_gineco']=6;
    $data['capa_generales']=2;
    $data['capa_urgen']=3;
    $data['capa_enferm']=4;
    $data['capa_intern']=5;
    $data['capa_inten']=1;
    $data['capa_anes']=7;
    $data['capa_tum']=8;
    $data['capa_tem']=9;

    $data['provee_apro_tteorico']=86;
    $data['provee_aprob_pteorico']='95%';
    $data['provee_apro_tpractico']=79;
    $data['provee_aprob_ppractico']='80%';

    $data['provee_repro_tteorico']=3;
    $data['provee_reprob_pteorico']='4%';
    $data['provee_repro_tpractico']=10;
    $data['provee_reprob_ppractico']='15%';

    $data['candidatos_inst'] = array(
                                array('name' =>'Omar Martínez Martínez1', 
                                       'puntajet'=>'90%',
                                       'puntajep'=>'80%'                                     
                                ),
                                array('name' =>'Omar Martínez Martínez2', 
                                       'puntajet'=>'90%',
                                       'puntajep'=>'80%'                                     
                                ),
                               
                               
                            );    

    $data['aulas']=0;
    $data['aulas_obs']="Podrian mejorara";
    $data['proy']=0;
    $data['proy_obs']="Podrian mejorarp";
    $data['seña']=0;
    $data['seña_obs']="Podrian mejorars";
    $data['venti']=0;
    $data['venti_obs']="Podrian mejorarv";
    
    $data['compu_c']=1;
    $data['compu_f']=1;

    $data['pape']=1;    
    $data['manual_ent']=0;

    $data['nemo']=1;
    $data['nemo_falt']=25;

    $data['ponencias'] = array(
                                array('nombre' =>'ponencia numero1', 
                                       'apegado'=>1,
                                       'calidad'=>1                                     
                                ),
                                array('nombre' =>'ponencia numero2', 
                                       'apegado'=>0,
                                       'calidad'=>0                                     
                                ),
                                array('nombre' =>'ponencia numero3', 
                                       'apegado'=>1,
                                       'calidad'=>2                                     
                                ),
                                array('nombre' =>'ponencia numero1', 
                                       'apegado'=>1,
                                       'calidad'=>1                                     
                                ),
                                array('nombre' =>'ponencia numero2', 
                                       'apegado'=>0,
                                       'calidad'=>0                                     
                                ),
                                array('nombre' =>'ponencia numero3 fewfwefew fwefewf fwefwefewfe', 
                                       'apegado'=>1,
                                       'calidad'=>2                                     
                                ),
                                array('nombre' =>'ponencia numero1', 
                                       'apegado'=>1,
                                       'calidad'=>1                                     
                                ),
                                array('nombre' =>'ponencia numero2', 
                                       'apegado'=>0,
                                       'calidad'=>0                                     
                                ),
                                array('nombre' =>'ponencia numero3', 
                                       'apegado'=>1,
                                       'calidad'=>2                                     
                                ),
                          
                            );
    $data['obs_ponen']="Aqui van las observaciones de las ponencias, aqui van las observaciones de las ponencias";
    $data['mat_taller'] = array(
                                array('nombre' =>'taller numero1', 
                                       'completo'=>1,
                                       'faltante'=>'todo muy bien'                                     
                                ),
                                array('nombre' =>'taller numero2', 
                                       'completo'=>0,
                                       'faltante'=>'Falto material'                                  
                                ),
                                array('nombre' =>'taller numero3', 
                                       'completo'=>1,
                                       'faltante'=>'todo muy bien taller 3'                                    
                                ),
                          
                            );
    $data['coffee']=2;
    $data['comida']=2;
    $data['hotel']=2;
    $data['viaticos']=array(
                                array('nombre' =>'instructor numero1', 
                                       'viaticos'=>1,                                     
                                ),
                                array('nombre' =>'instructor numero2', 
                                       'viaticos'=>0,                                  
                                ),
                                array('nombre' =>'instructor numero3', 
                                       'viaticos'=>2,                                    
                                ),

                          
                            );
    $data['lugar_inst']='Guanajuato, Gto capital';
    $data['fecha_inst']='13/10/2020';
    $data['hora_inst']='09:00 am';
    $data['concepto']=array(1,0,1,1,1,0,0,1);
    $data['comentarios']='Aquí van los comentarios de la reunion de los instructores';
    $data['des_curso']='Aquí el desarrollo del curso';

    $data['dir_curso']='Blanca Estela Hurtado';
    $data['dir_esp']='Medico general con Especialidad en Cardiopulmonar';
    $data['fecha_actual']=$fecha_actual->format('d/m/Y'); 

    $data['controller'] = $this->functions; 

    $this->mpdf->Reporte_Director_curso_amls('formatos_imprimir/amls/v35.Reporte_Director_curso_amls.php',$data); 
} 

public function ejemplo_reporte_logistica_amls() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->ejemplo_reporte_logistica_amls('formatos_imprimir/amls/v36.ejemplo_reporte_logistica_amls.php',$data); 
}


    /*-------------------------------------------------------------------------------------
    ----------------------------------------Reportes BLS---------------------------------*/


public function course_information_participants_bls() 
{ 
    $this->load->library('Mpdf');
    $fecha_actual = new DateTime('NOW');
    $exp_card_date=new DateTime('2021-05-12');
    $course_start=new DateTime('2021-05-30');
    $course_end=new DateTime('2021-05-30');
    $iss_date_card=new DateTime('2021-05-27');

        $data['lead_instructor']='Omar Martinez';
        $data['id_lead_instructor']='0085';
        $data['exp_card_date']=$exp_card_date->format('d/m/Y');
        $data['tra_center']='Escuela de Medicina de la UG';
        $data['id_tra_center']=943;
        $data['name_tra_center']="example de tra center";
        $data['adress']='C. Principal No.S/N';
        $data['city_sz']='Guanajuato; 36000';
        $data['location_course']='Escuela de Medicina de la UG';
        $data['type_course']=4;
        $data['course_start']=$course_start->format('d/m/Y').' 10 am';
        $data['course_end']=$course_end->format('d/m/Y').' 03 pm';
        $data['time_inst']="1 hora";
        $data['cards_iss']=5;
        $data['ratio']="3:1";
        $data['iss_date_card']=$iss_date_card->format('d/m/Y');
        $data['tam_reg_tabla_2']=10;
        $data['fecha_actual']=$fecha_actual->format('d/m/Y');


        $data['instructores']=array(
                            array('name' =>'Omar Martínez1','vencimiento'=>'12/10/2021'),
                            array('name' =>'Omar Martínez2','vencimiento'=>'12/10/2022'),
                            array('name' =>'Omar Martínez3','vencimiento'=>'12/10/2023'),
                            array('name' =>'Omar Martínez4','vencimiento'=>'12/10/2024'),
                            array('name' =>'Omar Martínez5','vencimiento'=>'12/10/2025'),
                            array('name' =>'Omar Martínez6','vencimiento'=>'12/10/2026'),
                            array('name' =>'Omar Martínez7','vencimiento'=>'12/10/2027'),
                            array('name' =>'Omar Martínez8','vencimiento'=>'12/10/2028'),
                            array('name' =>'Omar Martínez9','vencimiento'=>'12/10/2029'),
                            array('name' =>'Omar Martínez10','vencimiento'=>'12/10/2030'),
                            array('name' =>'Omar Martínez11','vencimiento'=>'12/10/2031'),
        );
        $data['participantes']=array(
                            array('name' =>'Omar Martínez1', 'email'=>'omar-martinez@hotmail.com','cp_tel'=>'Cp: 36000 Teléfono: 737658956','completed'=>'complete','remed_date'=>'12/10/2021'),
                            array('name' =>'Omar Martínez2', 'email'=>'omar-martinez@hotmail.com','cp_tel'=>'Cp: 36000 Teléfono: 737658956','completed'=>'complete','remed_date'=>'12/10/2022'),
                            array('name' =>'Omar Martínez3', 'email'=>'omar-martinez@hotmail.com','cp_tel'=>'Cp: 36000 Teléfono: 737658956','completed'=>'complete','remed_date'=>'12/10/2023'),
                            array('name' =>'Omar Martínez4', 'email'=>'omar-martinez@hotmail.com','cp_tel'=>'Cp: 36000 Teléfono: 737658956','completed'=>'complete','remed_date'=>'12/10/2024'),
                            array('name' =>'Omar Martínez5', 'email'=>'omar-martinez@hotmail.com','cp_tel'=>'Cp: 36000 Teléfono: 737658956','completed'=>'complete','remed_date'=>'12/10/2025'),
                            array('name' =>'Omar Martínez6', 'email'=>'omar-martinez@hotmail.com','cp_tel'=>'Cp: 36000 Teléfono: 737658956','completed'=>'complete','remed_date'=>'12/10/2026'),
                            array('name' =>'Omar Martínez7', 'email'=>'omar-martinez@hotmail.com','cp_tel'=>'Cp: 36000 Teléfono: 737658956','completed'=>'complete','remed_date'=>'12/10/2027'),
                            array('name' =>'Omar Martínez8', 'email'=>'omar-martinez@hotmail.com','cp_tel'=>'Cp: 36000 Teléfono: 737658956','completed'=>'complete','remed_date'=>'12/10/2028'),
                            array('name' =>'Omar Martínez9', 'email'=>'omar-martinez@hotmail.com','cp_tel'=>'Cp: 36000 Teléfono: 737658956','completed'=>'complete','remed_date'=>'12/10/2029'),
                            array('name' =>'Omar Martínez10','email'=>'omar-martinez@hotmail.com','cp_tel'=>'Cp: 36000 Teléfono: 737658956','completed'=>'complete','remed_date'=>'12/10/2030'),
                            array('name' =>'Omar Martínez11','email'=>'omar-martinez@hotmail.com','cp_tel'=>'Cp: 36000 Teléfono: 737658956','completed'=>'complete','remed_date'=>'12/10/2031'),
                            array('name' =>'Omar Martínez12','email'=>'omar-martinez@hotmail.com','cp_tel'=>'Cp: 36000 Teléfono: 737658956','completed'=>'complete','remed_date'=>'12/10/2031'),
                            array('name' =>'Omar Martínez13','email'=>'omar-martinez@hotmail.com','cp_tel'=>'Cp: 36000 Teléfono: 737658956','completed'=>'complete','remed_date'=>'12/10/2031'),
                            array('name' =>'Omar Martínez14','email'=>'omar-martinez@hotmail.com','cp_tel'=>'Cp: 36000 Teléfono: 737658956','completed'=>'complete','remed_date'=>'12/10/2031'),
                            array('name' =>'Omar Martínez15','email'=>'omar-martinez@hotmail.com','cp_tel'=>'Cp: 36000 Teléfono: 737658956','completed'=>'complete','remed_date'=>'12/10/2031'),
                            array('name' =>'Omar Martínez16','email'=>'omar-martinez@hotmail.com','cp_tel'=>'Cp: 36000 Teléfono: 737658956','completed'=>'complete','remed_date'=>'12/10/2031'),
                            array('name' =>'Omar Martínez17','email'=>'omar-martinez@hotmail.com','cp_tel'=>'Cp: 36000 Teléfono: 737658956','completed'=>'complete','remed_date'=>'12/10/2031'),
                            array('name' =>'Omar Martínez18','email'=>'omar-martinez@hotmail.com','cp_tel'=>'Cp: 36000 Teléfono: 737658956','completed'=>'complete','remed_date'=>'12/10/2031'),
                            array('name' =>'Omar Martínez19','email'=>'omar-martinez@hotmail.com','cp_tel'=>'Cp: 36000 Teléfono: 737658956','completed'=>'complete','remed_date'=>'12/10/2031'),
                            array('name' =>'Omar Martínez20','email'=>'omar-martinez@hotmail.com','cp_tel'=>'Cp: 36000 Teléfono: 737658956','completed'=>'complete','remed_date'=>'12/10/2031'),
                            array('name' =>'Omar Martínez21','email'=>'omar-martinez@hotmail.com','cp_tel'=>'Cp: 36000 Teléfono: 737658956','completed'=>'complete','remed_date'=>'12/10/2031'),
                    
                        );  

    $this->mpdf->course_information_participants_bls('formatos_imprimir/bls/v1.course_information_participants_bls.php',$data); 
} 

public function Plantilla_Respuesta_bls() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf');
    $fecha_actual = new DateTime('NOW');
    $data = array(); 

    $data['fecha_actual']=$fecha_actual->format('d/m/Y');
    $data['ciudad']="Guanajuato, Gto";
    $data['dia_curso']="10";
    $data['mes_curso']="Mayo";
    $data['docto1']="Omar Martínez Torres";
    $data['docto2']="Carolina Hurtado Villegas";
    $data['docto3']="Omar Martínez Torres2";
    $data['docto4']="Carolina Hurtado Villegas2";

    $this->mpdf->Plantilla_Respuesta_bls('formatos_imprimir/bls/v13.Plantilla_Respuesta_bls.php',$data); 
} 

public function agenda_bls() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['estudiantes'] = '12';
    $data['instructores'] = '2';
    $data['rel_est_instr'] = '6:1';
    $data['rel_est_mani'] = '3:1';
    $data['duracion'] = '2 horas 20 minutos';   

    $this->mpdf->agenda_bls('formatos_imprimir/bls/v14.agenda_bls.php',$data); 
} 

public function monitorizacion_bls() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf');
    $fecha_actual = new DateTime('NOW');  
    $data = array(); 

    $data['instructor'] = 'Omar Martínez Martínez'; 
    $data['id_instructor'] = 8990; 
    $data['exp_card_date'] = '10/01/2023';
    $data['course_rev'] = 3;
    $data['course_purpo']=3;
    $data['name_rf']="Carolina Hurtado";
    $data['fecha_actual']=$fecha_actual->format('d/m/Y');
    $data['coordinator']="Blanca Estela Hurtado"; 

    $this->mpdf->monitorizacion_bls('formatos_imprimir/bls/v15.monitorizacion_bls.php',$data); 
} 

public function RCP_DEA_adultos_bls() 
{ 
    $participante = $this->input->get('pte');
    $curso = $this->input->get('curso');
    $date = $this->getDate();
    $datos = $this->get_data_participante($participante, $curso);
   
    $data = array();

    //---Variables 
    $fecha_prueba = $date;
    $estudiante = $datos['name'];
    $instructor_ini = "";
    $instructor_num ="";
    $fecha_actual = $date;

    $data['fecha_prueba'] = $fecha_prueba;
    $data['nombre_estudiante'] = $estudiante; 
    $data['instructor_iniciales'] = $instructor_ini;
    $data['instructor_num'] = $instructor_num;
    $data['fecha_actual'] = $fecha_actual;

    $this->mpdf->RCP_DEA_adultos_bls('formatos_imprimir/bls/v20.RCP_DEA_adultos_bls.php',$data); 
} 

public function RCP_lactantes_bls() 
{    
    $participante = $this->input->get('pte');
    $curso = $this->input->get('curso');
    $date = $this->getDate();
    $datos = $this->get_data_participante($participante, $curso);
   
    $data = array();

    //---Variables 
    $fecha_prueba = $date;
    $estudiante = $datos['name'];
    $instructor_ini = "";
    $instructor_num ="";
    $fecha_actual = $date;

    $data['fecha_prueba'] = $fecha_prueba;
    $data['nombre_estudiante'] = $estudiante; 
    $data['instructor_iniciales'] = $instructor_ini;
    $data['instructor_num'] = $instructor_num;
    $data['fecha_actual'] = $fecha_actual;
   

    $this->mpdf->RCP_lactantes_bls('formatos_imprimir/bls/v21.RCP_lactantes_bls.php',$data); 
} 

public function evaluacion_teorica_bls() 
{     
    $participante = $this->input->get('pte');
    $curso = $this->input->get('curso');
    $date = $this->getDate();
    $datos = $this->get_data_participante($participante, $curso);
    
    $data = array(); 
    $data['fecha'] = $date;
    $data['nombre'] = $datos['name']; 
    $data['version'] = "";

    $this->mpdf->evaluacion_teorica_bls('formatos_imprimir/bls/v38.evaluacion_teorica_bls.php',$data);

} 

public function evaluacion_teorica_cremediar_bls() 
{     
    $participante = $this->input->get('pte');
    $curso = $this->input->get('curso');
    $date = $this->getDate();
    $datos = $this->get_data_participante($participante, $curso);
    
    $data = array(); 
    $data['fecha'] = $date;
    $data['nombre'] = $datos['name']; 
    $data['version'] = "";

    $this->mpdf->evaluacion_teorica_cremediar_bls('formatos_imprimir/bls/v39.evaluacion_teorica_cremediar_bls.php',$data); 
} 

public function constancia_participacion_bls() 
{ 
    $participante = $this->input->get('pte');
    $curso = $this->input->get('curso');
    $date = $this->getDate();
    $datos = $this->get_data_participante($participante, $curso);
    $datos_curso = $this->get_data_curso($curso );

    $data = array(); 

    //---Variables
    $fecha_actual = $date; 
    $estudiante = $datos['name'];
    $duracion_horas="5 horas";
    $fecha_curso="14 de Agosto de 2020";
    $ciudad_curso = $datos_curso->municipio.", ".$datos_curso->estado;
    $nac="";
    $folio="";
    $curso="RCP Familiares y Amigos Reanimación Cardiopulmonar <br> de la American Heart Association";
    $parrafo="Por su valiosa participación en el curso <br>".$curso." con una  duración de ".$duracion_horas.".<br>Efectuado el día ".$fecha_curso." <br> en la ciudad de ".$ciudad_curso.".";  
    
    $data['nombre_estudiante'] = $estudiante; 
    $data['duracion_horas'] = $duracion_horas;
    $data['fecha_curso'] = $fecha_curso;
    $data['ciudad_curso']=$ciudad_curso;
    $data['nac']=$nac;
    $data['folio']=$folio;

    $data['parrafo']=$parrafo; 

    $this->mpdf->constancia_participacion_bls('formatos_imprimir/bls/v40.constancia_participacion_bls.php',$data); 
} 

public function Carta_PI_bls() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $fecha_actual = new DateTime('NOW'); 
    $data = array(); 
    //---Variables
    $fecha_actual=$fecha_actual->format('d/m/Y');
    $sede_curso="Guanajuato, Gto.";
    $instructor="Omar Martínez Torres";
    $fecha="12/08/2020";       
    $ciudad_curso="Guanajuato, Gto.";
    $dia1_curso="12";
    $dia2_curso="21";
    $mes_curso="Agosto";
    $folio="0012";
    $director_curso="Omar Martínez Torres";
    
    $data['fecha_actual'] = $fecha_actual; 
    $data['fecha'] = $fecha;
    $data['sede_curso'] = $sede_curso;
    $data['instructor']=$instructor;
    $data['dia1_curso']=$dia1_curso;
    $data['dia2_curso']=$dia2_curso;
    $data['mes_curso']=$mes_curso;
    $data['folio']=$folio;
    $data['director_curso']=$director_curso; 

    $this->mpdf->Carta_PI_bls('formatos_imprimir/bls/v41.Carta_PI_bls.php',$data); 
} 

public function Instructor_Candidate_Aplication_bls() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $fecha_actual = new DateTime('NOW');
    $data = array(); 

    $Renewal_date_provider='02/06/2020';
    $name_candidate='Omar Martínez Torres'; 
    $address='C. San Antonio #1, col. Villaseca';
    $city='Guanajuato';
    $state='Guanajuato';
    $cp='36000';
    $tel='4735608954';
    $email='ejemplo@hotmail.com'; 
    $id_instructor='0098'; 
    $date_renewal='12/04/2020';
    $tc_name='Ejemplo de TC'; 
    $tc_id='0032';
    $fecha_actual=$fecha_actual->format('d/m/Y');

    $data['Renewal_date_provider'] = $Renewal_date_provider;
    $data['name_candidate'] = $name_candidate;
    $data['address'] =  $address;
    $data['city'] =  $city;
    $data['state'] = $state;
    $data['cp'] =  $cp;
    $data['tel'] =  $tel;
    $data['email'] = $email;
    $data['id_instructor'] = $id_instructor;
    $data['date_renewal'] =  $date_renewal;
    $data['tc_name'] = $tc_name;
    $data['tc_id'] =  $tc_id;
    $data['date'] = $fecha_actual;

    $this->mpdf->Instructor_Candidate_Aplication_bls('formatos_imprimir/bls/v42.Instructor_Candidate_Aplication_bls.php',$data); 
} 

public function Reporte_Director_curso_bls() 
{ 
    $this->load->model('curso');
    $this->load->library('Functions');  
    $this->load->library('Mpdf');
    $fecha_actual = new DateTime('NOW');
    $data = array(); 

    $data['fecha_curso'] = '02/06/2020';
    $data['sede_curso'] = 'Guanajuato, Gto';
    $data['lugar_curso'] = 'C. Guanajuato, Gto';
    $data['instructores'] = array(
                                array('name' =>'Omar Martínez Martínez1dqdqw dfeqfwef fwefew', 
                                       'residencia'=>'Guanajuato, Gto',
                                       'especidalidad'=>'Cardiopulmonar ddewdewdew',
                                       'cargo'=>'Director de hospital'
                                ),
                                array('name' =>'Omar Martínez Martínez2', 
                                       'residencia'=>'Silao, Gto',
                                       'especidalidad'=>'Pediatria',
                                       'cargo'=>'Medico de hospital'
                                ),
                    
                            );
    $data['Proveedores_capacitar']=12;
    $data['Proveedores_capacitados']=10;
    $data['capa_gineco']=6;
    $data['capa_generales']=2;
    $data['capa_urgen']=3;
    $data['capa_enferm']=4;
    $data['capa_intern']=5;
    $data['capa_inten']=1;
    $data['capa_anes']=7;
    $data['capa_tum']=8;
    $data['capa_tem']=9;

    $data['provee_apro_tteorico']=86;
    $data['provee_aprob_pteorico']='95%';
    $data['provee_apro_tpractico']=79;
    $data['provee_aprob_ppractico']='80%';

    $data['provee_repro_tteorico']=3;
    $data['provee_reprob_pteorico']='4%';
    $data['provee_repro_tpractico']=10;
    $data['provee_reprob_ppractico']='15%';

    $data['candidatos_inst'] = array(
                                array('name' =>'Omar Martínez Martínez1', 
                                       'puntajet'=>'90%',
                                       'puntajep'=>'80%'                                     
                                ),
                                array('name' =>'Omar Martínez Martínez2', 
                                       'puntajet'=>'90%',
                                       'puntajep'=>'80%'                                     
                                ),
                               
                               
                            );    

    $data['aulas']=0;
    $data['aulas_obs']="Podrian mejorara";
    $data['proy']=0;
    $data['proy_obs']="Podrian mejorarp";
    $data['seña']=0;
    $data['seña_obs']="Podrian mejorars";
    $data['venti']=0;
    $data['venti_obs']="Podrian mejorarv";
    
    $data['compu_c']=1;
    $data['compu_f']=1;

    $data['pape']=1;    
    $data['manual_ent']=0;

    $data['nemo']=1;
    $data['nemo_falt']=25;

    $data['ponencias'] = array(
                                array('nombre' =>'ponencia numero1', 
                                       'apegado'=>1,
                                       'calidad'=>1                                     
                                ),
                                array('nombre' =>'ponencia numero2', 
                                       'apegado'=>0,
                                       'calidad'=>0                                     
                                ),
                                array('nombre' =>'ponencia numero3', 
                                       'apegado'=>1,
                                       'calidad'=>2                                     
                                ),
                                array('nombre' =>'ponencia numero1', 
                                       'apegado'=>1,
                                       'calidad'=>1                                     
                                ),
                                array('nombre' =>'ponencia numero2', 
                                       'apegado'=>0,
                                       'calidad'=>0                                     
                                ),
                                array('nombre' =>'ponencia numero3 fewfwefew fwefewf fwefwefewfe', 
                                       'apegado'=>1,
                                       'calidad'=>2                                     
                                ),
                                array('nombre' =>'ponencia numero1', 
                                       'apegado'=>1,
                                       'calidad'=>1                                     
                                ),
                                array('nombre' =>'ponencia numero2', 
                                       'apegado'=>0,
                                       'calidad'=>0                                     
                                ),
                                array('nombre' =>'ponencia numero3', 
                                       'apegado'=>1,
                                       'calidad'=>2                                     
                                ),
                          
                            );
    $data['obs_ponen']="Aqui van las observaciones de las ponencias, aqui van las observaciones de las ponencias";
    $data['mat_taller'] = array(
                                array('nombre' =>'taller numero1', 
                                       'completo'=>1,
                                       'faltante'=>'todo muy bien'                                     
                                ),
                                array('nombre' =>'taller numero2', 
                                       'completo'=>0,
                                       'faltante'=>'Falto material'                                  
                                ),
                                array('nombre' =>'taller numero3', 
                                       'completo'=>1,
                                       'faltante'=>'todo muy bien taller 3'                                    
                                ),
                          
                            );
    $data['coffee']=2;
    $data['comida']=2;
    $data['hotel']=2;
    $data['viaticos']=array(
                                array('nombre' =>'instructor numero1', 
                                       'viaticos'=>1,                                     
                                ),
                                array('nombre' =>'instructor numero2', 
                                       'viaticos'=>0,                                  
                                ),
                                array('nombre' =>'instructor numero3', 
                                       'viaticos'=>2,                                    
                                ),

                          
                            );
    $data['lugar_inst']='Guanajuato, Gto capital';
    $data['fecha_inst']='13/10/2020';
    $data['hora_inst']='09:00 am';
    $data['concepto']=array(1,0,1,1,1,0,0,1);
    $data['comentarios']='Aquí van los comentarios de la reunion de los instructores';
    $data['des_curso']='Aquí el desarrollo del curso';

    $data['dir_curso']='Blanca Estela Hurtado';
    $data['dir_esp']='Medico general con Especialidad en Cardiopulmonar';
    $data['fecha_actual']=$fecha_actual->format('d/m/Y'); 

    $data['controller'] = $this->functions; 

    $this->mpdf->Reporte_Director_curso_bls('formatos_imprimir/bls/v45.Reporte_Director_curso_bls.php',$data); 
} 

public function ejemplo_reporte_logistica_bls() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->ejemplo_reporte_logistica_bls('formatos_imprimir/bls/v46.ejemplo_reporte_logistica_bls.php',$data); 
} 


    /*-------------------------------------------------------------------------------------
    ----------------------------------------Reportes BLSO---------------------------------*/

public function Course_information_blso() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $fecha_actual = new DateTime('NOW');
    $data = array();

    $coordinator="Omar Martínez Torres";
    $dir_medico="Omar Martínez Torres";
    $center_enter="Centro de Salud de Guanajuato";
    $site_cap="Centro de Salud de Guanajuato";
    $nombre_sede="BLSO";
    $date_ini_curse="10/09/2020";
    $time_ini_curse="09:00 a. m.";
    $students="30";
    $date_fin_curse="10/09/2020";
    $time_fin_curse="05:00 p. m.";
    $time_inst="1";
    $cards="10";
    $instructores=array(
        array('name' =>'Omar Martínez1','vencimiento'=>'12/10/2021'),
        array('name' =>'Omar Martínez2','vencimiento'=>'12/10/2022'),
        array('name' =>'Omar Martínez3','vencimiento'=>'12/10/2023'),
        array('name' =>'Omar Martínez4','vencimiento'=>'12/10/2024'),
        array('name' =>'Omar Martínez5','vencimiento'=>'12/10/2025'),
        array('name' =>'Omar Martínez6','vencimiento'=>'12/10/2026'),
        array('name' =>'Omar Martínez7','vencimiento'=>'12/10/2027'),
        array('name' =>'Omar Martínez8','vencimiento'=>'12/10/2028'),
        array('name' =>'Omar Martínez9','vencimiento'=>'12/10/2029'),
        array('name' =>'Omar Martínez10','vencimiento'=>'12/10/2030'),
        array('name' =>'Omar Martínez11','vencimiento'=>'12/10/2031'),
    );
    $date=$fecha_actual->format('d/m/Y'); 
    $folio="329"; 

    $data['coordinator'] = $coordinator;
    $data['dir_medico'] = $dir_medico;
    $data['center_enter'] = $center_enter;
    $data['site_cap'] = $site_cap;
    $data['nombre_sede'] = $nombre_sede;
    $data['date_ini_curse'] =$date_ini_curse;
    $data['time_ini_curse'] =$time_ini_curse;
    $data['students'] = $students;
    $data['date_fin_curse'] =$date_fin_curse;
    $data['time_fin_curse'] =$time_fin_curse;
    $data['time_inst'] = $time_inst;
    $data['cards'] = $cards;
    $data['instructores'] =$instructores;
    $data['date'] = $date;
    $data['folio'] = $folio; 

    $this->mpdf->Course_information_blso('formatos_imprimir/blso/v1.Course_information_blso.php',$data); 
} 

public function course_participants_blso() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf');
    $this->load->library('Functions'); 
    $data = array(); 
    $data['folio']=54367;
    $data['tam_reg_tabla']=10;
    $data['participantes'] = array(
                                    array(
                                        'nombre' => 'Omar Martínez Martínez',
                                        'correo' => 'omar@gmail.com',
                                        'escrito'=> 85,
                                        'aprueba'=> $this->functions->aprobado_noaprobado(1),
                                        'pi'=> 90,
                                        ),
                                    array(
                                        'nombre' => 'Omar Martínez Martínez',
                                        'correo' => 'omar@gmail.com',
                                        'escrito'=> 85,
                                        'aprueba'=> $this->functions->aprobado_noaprobado(1),
                                        'pi'=> 90,
                                        ),
                                    array(
                                        'nombre' => 'Omar Martínez Martínez',
                                        'correo' => 'omar@gmail.com',
                                        'escrito'=> 85,
                                        'aprueba'=> $this->functions->aprobado_noaprobado(1),
                                        'pi'=> 90,
                                        ),
                                    array(
                                        'nombre' => 'Omar Martínez Martínez',
                                        'correo' => 'omar@gmail.com',
                                        'escrito'=> 85,
                                        'aprueba'=> $this->functions->aprobado_noaprobado(1),
                                        'pi'=> 90,
                                        ),
                                    array(
                                        'nombre' => 'Omar Martínez Martínez',
                                        'correo' => 'omar@gmail.com',
                                        'escrito'=> 85,
                                        'aprueba'=> $this->functions->aprobado_noaprobado(1),
                                        'pi'=> 90,
                                        ),
                                    array(
                                        'nombre' => 'Omar Martínez Martínez',
                                        'correo' => 'omar@gmail.com',
                                        'escrito'=> 85,
                                        'aprueba'=> $this->functions->aprobado_noaprobado(1),
                                        'pi'=> 90,
                                        ),
                                    array(
                                        'nombre' => 'Omar Martínez Martínez',
                                        'correo' => 'omar@gmail.com',
                                        'escrito'=> 85,
                                        'aprueba'=> $this->functions->aprobado_noaprobado(1),
                                        'pi'=> 90,
                                        ),
                                    array(
                                        'nombre' => 'Omar Martínez Martínez',
                                        'correo' => 'omar@gmail.comww',
                                        'escrito'=> 85,
                                        'aprueba'=> $this->functions->aprobado_noaprobado(1),
                                        'pi'=> 90,
                                        ),
                                    array(
                                        'nombre' => 'Omar Martínez Martínez',
                                        'correo' => 'omar@gmail.com',
                                        'escrito'=> 85,
                                        'aprueba'=> $this->functions->aprobado_noaprobado(1),
                                        'pi'=> 90,
                                        ),
                                    array(
                                        'nombre' => 'Omar Martínez Martínez',
                                        'correo' => 'omar@gmail.com',
                                        'escrito'=> 85,
                                        'aprueba'=> $this->functions->aprobado_noaprobado(1),
                                        'pi'=> 90,
                                        ),
                                    array(
                                        'nombre' => 'Omar Martínez Martínez',
                                        'correo' => 'omar@gmail.com',
                                        'escrito'=> 85,
                                        'aprueba'=> $this->functions->aprobado_noaprobado(1),
                                        'pi'=> 90,
                                        ),
                                    array(
                                        'nombre' => 'Omar Martínez Martínez',
                                        'correo' => 'omar@gmail.com',
                                        'escrito'=> 85,
                                        'aprueba'=> $this->functions->aprobado_noaprobado(1),
                                        'pi'=> 90,
                                        ),
                                    array(
                                        'nombre' => 'Omar Martínez Martínez',
                                        'correo' => 'omar@gmail.com',
                                        'escrito'=> 85,
                                        'aprueba'=> $this->functions->aprobado_noaprobado(1),
                                        'pi'=> 90,
                                        ),
                                    array(
                                        'nombre' => 'Omar Martínez Martínez',
                                        'correo' => 'omar@gmail.comdd',
                                        'escrito'=> 85,
                                        'aprueba'=> $this->functions->aprobado_noaprobado(1),
                                        'pi'=> 90,
                                        ),
                                    array(
                                        'nombre' => 'Omar Martínez Martínez',
                                        'correo' => 'omar@gmail.com',
                                        'escrito'=> 85,
                                        'aprueba'=> $this->functions->aprobado_noaprobado(1),
                                        'pi'=> 90,
                                        ),
                                    array(
                                        'nombre' => 'Omar Martínez Martínez',
                                        'correo' => 'omar@gmail.com',
                                        'escrito'=> 85,
                                        'aprueba'=> $this->functions->aprobado_noaprobado(1),
                                        'pi'=> 90,
                                        ),
                                    array(
                                        'nombre' => 'Omar Martínez Martínez',
                                        'correo' => 'omar@gmail.com',
                                        'escrito'=> 85,
                                        'aprueba'=> $this->functions->aprobado_noaprobado(1),
                                        'pi'=> 90,
                                        ),
                                    array(
                                        'nombre' => 'Omar Martínez Martínez',
                                        'correo' => 'omar@gmail.com',
                                        'escrito'=> 85,
                                        'aprueba'=> $this->functions->aprobado_noaprobado(1),
                                        'pi'=> 90,
                                        ),
                                    array(
                                        'nombre' => 'Omar Martínez Martínez',
                                        'correo' => 'omar@gmail.com',
                                        'escrito'=> 85,
                                        'aprueba'=> $this->functions->aprobado_noaprobado(1),
                                        'pi'=> 90,
                                        ),
                                    array(
                                        'nombre' => 'Omar Martínez Martínez',
                                        'correo' => 'omar@gmail.com',
                                        'escrito'=> 85,
                                        'aprueba'=> $this->functions->aprobado_noaprobado(1),
                                        'pi'=> 90,
                                        ),
                                    array(
                                        'nombre' => 'Omar Martínez Martínez',
                                        'correo' => 'omar@gmail.com',
                                        'escrito'=> 85,
                                        'aprueba'=> $this->functions->aprobado_noaprobado(1),
                                        'pi'=> 90,
                                        ),
                                    array(
                                        'nombre' => 'Omar Martínez Martínez',
                                        'correo' => 'omar@gmail.com',
                                        'escrito'=> 85,
                                        'aprueba'=> $this->functions->aprobado_noaprobado(1),
                                        'pi'=> 90,
                                        ),
                                    array(
                                        'nombre' => 'Omar Martínez Martínez',
                                        'correo' => 'omar@gmail.com',
                                        'escrito'=> 85,
                                        'aprueba'=> $this->functions->aprobado_noaprobado(1),
                                        'pi'=> 90,
                                        ),
                                    array(
                                        'nombre' => 'Omar Martínez Martínez',
                                        'correo' => 'omar@gmail.com',
                                        'escrito'=> 85,
                                        'aprueba'=> $this->functions->aprobado_noaprobado(1),
                                        'pi'=> 90,
                                        ),
                                    

                            ); 
 

    $this->mpdf->course_participants_blso('formatos_imprimir/blso/v2.course_participants_blso.php',$data); 
} 

public function ejemplo_agenda_curso_blso() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 

    $agenda = array(
                    array(
                        'fecha'=>'19-Aug-18',
                        'contenido'=>array(
                        array(
                            'hora'=>'7:45-8:00',
                            'actividad'=>'Junta de instructores, recepción y registro',
                            'responsable'=>'TODOS Y LOGISTICA',
                            'mat_obs'=>'Registros y gafetes',
                            'color_hora'=>'#4eb9f4',
                            'color_actividad'=>'black',
                            'weight_hora'=>'normal',
                            'weight_actividad'=>'normal',
                            'weight_responsable'=>'normal',
                        ),

                        array(
                            'hora'=>'08:00-08:30',
                            'actividad'=>'Encuadre y BLSO',
                            'responsable'=>'Dr. Sergio Ivan Mendez',
                            'mat_obs'=>'Video proyector',
                            'color_hora'=>'#4eb9f4',
                            'color_actividad'=>'black',
                            'weight_hora'=>'normal',
                            'weight_actividad'=>'normal',
                            'weight_responsable'=>'bold',    
                        ),

                        array(
                            'hora'=>'08:30-09:20',
                            'actividad'=>'Parto normal',
                            'responsable'=>'Dr. Mendez/Dr. Castrejón ',
                            'mat_obs'=>'3 pelvis con feto y placenta, proyector',
                            'color_hora'=>'#4eb9f4',
                            'color_actividad'=>'#00b0f0;',
                            'weight_hora'=>'normal',
                            'weight_actividad'=>'normal',
                            'weight_responsable'=>'bold',    
                        ),

                        array(
                            'hora'=>'09:20-10:10',
                            'actividad'=>'Evaluacion prenatal de emergencia',
                            'responsable'=>'Dra. Zamora/Dra. Aviles',
                            'mat_obs'=>'Noelia, 1 neonato, cinta metrica, estetoscopio, disco calculador obstetrico',
                            'color_hora'=>'#4eb9f4',
                            'color_actividad'=>'#0070c0',
                            'weight_hora'=>'normal',
                            'weight_actividad'=>'normal',
                            'weight_responsable'=>'bold'
                        ),

                        
                        array(
                            'hora'=>'10:10-11:00',
                            'actividad'=>'Malas presentaciones',
                            'responsable'=>'Dr. Trinidad/Dra. Rosas',
                            'mat_obs'=>'3 pelvis con feto y placenta, proyector',
                            'color_hora'=>'#4eb9f4',
                            'color_actividad'=>'#7634b0',
                            'weight_hora'=>'normal',
                            'weight_actividad'=>'normal',
                            'weight_responsable'=>'bold'
                        ),

                        array(
                            'hora'=>'11:00-11:20',
                            'actividad'=>'RECESO',
                            'responsable'=>'',
                            'mat_obs'=>' ',
                            'color_hora'=>'#4eb9f4',
                            'color_actividad'=>'black',
                            'weight_hora'=>'normal',
                            'weight_actividad'=>'normal',
                            'weight_responsable'=>'bold'
                        ),

                        array(
                            'hora'=>'11:20-12:10',
                            'actividad'=>'Reanimación materna y Hemorragia postparto',
                            'responsable'=>'Dra. Aviles/ Dr. Castrejón',
                            'mat_obs'=>'Noelia, 4 pelvis c/útero, 8 foester (4 curvas y 4 rectas), Sonda foley, preservativo, backry, proyector',
                            'color_hora'=>'#4eb9f4',
                            'color_actividad'=>'red',
                            'weight_hora'=>'normal',
                            'weight_actividad'=>'normal',
                            'weight_responsable'=>'bold'
                        ),

                        array(
                            'hora'=>'12:10-13:00',
                            'actividad'=>'Reanimación neonatal',
                            'responsable'=>'Dra. Zamora/Dra. Rosas',
                            'mat_obs'=>'2  neonatos, bolsas para ventilar, equipo de reanimacion neonatal               ',
                            'color_hora'=>'#7634b0',
                            'color_actividad'=>'#00b050',
                            'weight_hora'=>'normal',
                            'weight_actividad'=>'normal',
                            'weight_responsable'=>'bold'
                        ),

                        array(
                            'hora'=>'13:00-13:50',
                            'actividad'=>'Emergencia hipertensiva',
                            'responsable'=>'Dr. Mendez/ Dr. Trinidad  ',
                            'mat_obs'=>'Noelia, soluciones, caja con medicamentos',
                            'color_hora'=>'#7634b0',
                            'color_actividad'=>'orange',
                            'weight_hora'=>'normal',
                            'weight_actividad'=>'normal',
                            'weight_responsable'=>'bold'
                        ),

                        array(
                            'hora'=>'13:50-14:40',
                            'actividad'=>'Distocia de hombros',
                            'responsable'=>'Dra. Rosas. Dra. Zamora/Dra Avi',
                            'mat_obs'=>'3  pelvis con feto y placenta, proyector',
                            'color_hora'=>'#7634b0',
                            'color_actividad'=>'red',
                            'weight_hora'=>'normal',
                            'weight_actividad'=>'normal',
                            'weight_responsable'=>'bold'
                        ),
                        array(
                            'hora'=>'14:40-15:30',
                            'actividad'=>'Trabajo de parto pretermino y RPM',
                            'responsable'=>'Dr. Trini/Dr. Castrejón/Dr.Ménde',
                            'mat_obs'=>'Noelia, espejo vaginal, hisopo, portaobjetos',
                            'color_hora'=>'#7634b0',
                            'color_actividad'=>'#00b050',
                            'weight_hora'=>'bold',
                            'weight_actividad'=>'bold',
                            'weight_responsable'=>'bold'
                        ),
                        array(
                            'hora'=>'15:30-16:10 ',
                            'actividad'=>'Evaluación práctica',
                            'responsable'=>'TODOS',
                            'mat_obs'=>'',
                            'color_hora'=>'#4eb9f4',
                            'color_actividad'=>'black',
                            'weight_hora'=>'normal',
                            'weight_actividad'=>'normal',
                            'weight_responsable'=>'normal'
                        ),

                        array(
                            'hora'=>'16:10-16:40',
                            'actividad'=>'Evaluación escrita',
                            'responsable'=>'TODOS Y LOGISTICA',
                            'mat_obs'=>'',
                            'color_hora'=>'#4eb9f4',
                            'color_actividad'=>'black',
                            'weight_hora'=>'normal',
                            'weight_actividad'=>'normal',
                            'weight_responsable'=>'normal'
                        ),

                        array(
                            'hora'=>'16:40-17:10  ',
                            'actividad'=>'COMIDA',
                            'responsable'=>'',
                            'mat_obs'=>'',
                            'color_hora'=>'#4eb9f4',
                            'color_actividad'=>'black',
                            'weight_hora'=>'normal',
                            'weight_actividad'=>'bold',
                            'weight_responsable'=>'normal'
                        ),
                        array(
                            'hora'=>'17:10-17:40  ',
                            'actividad'=>'Entrega de resultados',
                            'responsable'=>'TODOS',
                            'mat_obs'=>'',
                            'color_hora'=>'#4eb9f4',
                            'color_actividad'=>'black',
                            'weight_hora'=>'normal',
                            'weight_actividad'=>'bold',
                            'weight_responsable'=>'normal'
                        ),

                        array(
                            'hora'=>'17:40-18:00',
                            'actividad'=>'Junta de instructores y evaluación del curso',
                            'responsable'=>'Dr. Sergio Ivan Méndez',
                            'mat_obs'=>'',
                            'color_hora'=>'#4eb9f4',
                            'color_actividad'=>'black',
                            'weight_hora'=>'normal',
                            'weight_actividad'=>'bold',
                            'weight_responsable'=>'bold'
                        ),
                    ),
                    ),
                   
            );



    $sede ='HOTEL REAL DE MINAS';
    $lugar ='SAN MIGUEL DE ALLENDE, GTO.';
    $date_course = '11 DE AGOSTO DE 2019';
    $provee = '38 ENFERMERAS.';
    $recomendaciones = array(
        array('dia' =>'','recom'=>'UNIFORME: PANTALON CAQUI/ CAMISA POLO AZUL' ),
    );
    $instructores = array(
        array('abrev_prof' => 'Dr.', 'instructor' => 'SERGIO IVAN MENDEZ MERCADO ', 'puesto' => 'Director de logistica'),
        array('abrev_prof' => 'Dr.', 'instructor' => 'CONSUELO AVILES MORÁN', 'puesto' => 'Instructor'),
        array('abrev_prof' => 'Dr.', 'instructor' => 'ARTURO TRINIDAD', 'puesto' => 'Instructor'),
        array('abrev_prof' => 'Dra.', 'instructor' => 'MARTHA NELLY ZAMORA LÓPEZ', 'puesto' => 'Instructor'),
        array('abrev_prof' => 'Dra.', 'instructor' => 'MAGALI ROSAS ROSALES ', 'puesto' => 'Instructor'),
        array('abrev_prof' => 'Dr.', 'instructor' => 'ROBERTO CASTREJON LUGARDO', 'puesto' => 'Instructor'),
    );

    $data['sede'] = $sede;
    $data['lugar'] = $lugar;
    $data['date_course'] = $date_course;
    $data['provee'] = $provee;
    $data['agenda'] = $agenda;
    $data['recomendaciones'] = $recomendaciones;
    $data['instructores'] = $instructores;

    $this->mpdf->ejemplo_agenda_curso_blso('formatos_imprimir/blso/v12.ejemplo_agenda_curso_blso.php',$data); 
} 

public function apendiceN_blso() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array();

    $nombre="Blanca Estela Hurtado";
    $fecha_nac="10/12/1999";
    $edad="21";
    $perfil="Enfermera";
    $residencia="Guanajuato";
    $telefono_fij="473 &nbsp; 7323456";
    $telefono_cel="473 &nbsp; 1118934";
    $calle="San Antonio de Abad";
    $cp="36000";
    $ciudad="Guanajuato";
    $disp_viajar="Si";
    $Lugar_trab="Secretaria de Salud";
    $email="blanca@hotmil.com";
    $fecha_lugar_curso="18/03/2020,Guanajuato";
    $puntaje_teorico="100";
    $puntaje_megaparto="100";
    $instructor="Carolina Hurtado";
    $fecha_lugar_instr="11/08/2019,Guanajuato";
    $fecha_lugar_monit="28/06/2019,Guanajuato";
    $numero_monit="X";
    $tema_exp="Covid 19";
    $inst_sup="Juan Perez";
    $talleres="Taller covid 19";
    $inst_sup2="Edith Perez";
    $nombre_fir_fac="Blanca Estela Hurtado";   
    
    
    $data['nombre'] = $nombre;
    $data['fecha_nac'] = $fecha_nac;
    $data['edad'] = $edad;
    $data['perfil'] = $perfil;
    $data['residencia'] = $residencia;
    $data['telefono_fij'] = $telefono_fij;
    $data['telefono_cel'] = $telefono_cel;
    $data['calle'] = $calle;
    $data['cp'] = $cp;
    $data['ciudad'] = $ciudad;
    $data['disp_viajar'] = $disp_viajar;
    $data['Lugar_trab'] = $Lugar_trab;
    $data['email'] = $email;
    $data['fecha_lugar_curso'] = $fecha_lugar_curso;
    $data['puntaje_teorico'] = $puntaje_teorico;
    $data['puntaje_megaparto'] = $puntaje_megaparto;
    $data['instructor'] = $instructor;
    $data['fecha_lugar_instr'] = $fecha_lugar_instr;
    $data['fecha_lugar_monit'] = $fecha_lugar_monit;
    $data['numero_monit'] = $numero_monit;
    $data['tema_exp'] = $tema_exp;
    $data['inst_sup'] = $inst_sup;
    $data['talleres'] = $talleres;
    $data['inst_sup2'] = $inst_sup2;
    $data['nombre_fir_fac'] = $nombre_fir_fac; 

    $this->mpdf->apendiceN_blso('formatos_imprimir/blso/v13.apendiceN_blso.php',$data); 
} 

public function evaluacion_teorica_blso() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['nombre_participante'] = array(
                                        array('nombre' => 'Omar Martínez Torres1', 'folio'=>4345),
                                        array('nombre' => 'Omar Martínez Torres2', 'folio'=>4344),
                                        array('nombre' => 'Omar Martínez Torres3', 'folio'=>4341),
                                        array('nombre' => 'Omar Martínez Torres4', 'folio'=>44),
                                        array('nombre' => 'Omar Martínez Torres5', 'folio'=>55),
                                        array('nombre' => 'Omar Martínez Torres6', 'folio'=>66),
                                        array('nombre' => 'Omar Martínez Torres7', 'folio'=>77),
                                        array('nombre' => 'Omar Martínez Torres8', 'folio'=>8),
                                        array('nombre' => 'Omar Martínez Torres9', 'folio'=>99),
                                    );  

    $this->mpdf->evaluacion_teorica_blso('formatos_imprimir/blso/v15.evaluacion_teorica_blso.php',$data); 
} 

public function participan_evaluation_form_blso() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf');
    $fecha_actual = new DateTime('NOW');

    $data = array();
    $data['date']=$fecha_actual->format('d/m/Y');
    $data['sponsor']="Ejemplo de sponsor";
    $data['participant']="Carolina Hurtado Villegas";
    $data['folio']="9899";

    $this->mpdf->participan_evaluation_form_blso('formatos_imprimir/blso/v16.participan_evaluation_form_blso.php',$data); 
} 

public function formato_remediacion_blso() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array();
    $data['tam_reg_tabla']=9; 
    $datos = array(
        array('nombre' => 'Omar Martínez Torres', 'curso_or_fecha_sede' => '12/10/2020, Saltillo', 'curso_rem_fecha_sede' => '23/11/2020, Zacatecas', 'resultado'=>'Ninguno'),
        array('nombre' => 'Omar Martínez Torres', 'curso_or_fecha_sede' => '12/10/2020, Saltillo', 'curso_rem_fecha_sede' => '23/11/2020, Zacatecas', 'resultado'=>'Ninguno'),
        array('nombre' => 'Omar Martínez Torres', 'curso_or_fecha_sede' => '12/10/2020, Saltillo', 'curso_rem_fecha_sede' => '23/11/2020, Zacatecas', 'resultado'=>'Ninguno'),
        array('nombre' => 'Omar Martínez Torres', 'curso_or_fecha_sede' => '12/10/2020, Saltillo', 'curso_rem_fecha_sede' => '23/11/2020, Zacatecas', 'resultado'=>'Ninguno'),
        array('nombre' => 'Omar Martínez Torres', 'curso_or_fecha_sede' => '12/10/2020, Saltillo', 'curso_rem_fecha_sede' => '23/11/2020, Zacatecas', 'resultado'=>'Ninguno'),
        array('nombre' => 'Omar Martínez Torres', 'curso_or_fecha_sede' => '12/10/2020, Saltillo', 'curso_rem_fecha_sede' => '23/11/2020, Zacatecas', 'resultado'=>'Ninguno'),
        array('nombre' => 'Omar Martínez Torres', 'curso_or_fecha_sede' => '12/10/2020, Saltillo', 'curso_rem_fecha_sede' => '23/11/2020, Zacatecas', 'resultado'=>'Ninguno'),
        array('nombre' => 'Omar Martínez Torres', 'curso_or_fecha_sede' => '12/10/2020, Saltillo', 'curso_rem_fecha_sede' => '23/11/2020, Zacatecas', 'resultado'=>'Ninguno'),
        array('nombre' => 'Omar Martínez Torres', 'curso_or_fecha_sede' => '12/10/2020, Saltillo', 'curso_rem_fecha_sede' => '23/11/2020, Zacatecas', 'resultado'=>'Ninguno'),
        array('nombre' => 'Omar Martínez Torres', 'curso_or_fecha_sede' => '12/10/2020, Saltillo', 'curso_rem_fecha_sede' => '23/11/2020, Zacatecas', 'resultado'=>'Ninguno'),
        array('nombre' => 'Omar Martínez Torres', 'curso_or_fecha_sede' => '12/10/2020, Saltillo', 'curso_rem_fecha_sede' => '23/11/2020, Zacatecas', 'resultado'=>'Ninguno'),
        array('nombre' => 'Omar Martínez Torres', 'curso_or_fecha_sede' => '12/10/2020, Saltillo', 'curso_rem_fecha_sede' => '23/11/2020, Zacatecas', 'resultado'=>'Ninguno'),
    );

    $data['datos'] = $datos;
    $data['folio'] = '4532';

    $this->mpdf->formato_remediacion_blso('formatos_imprimir/blso/v17.formato_remediacion_blso.php',$data); 
} 

public function evaluacion_teorica_remediar_blso() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 

    $data['nombre_participante'] = array(
                                        array('nombre' => 'Omar Martínez Torres1', 'folio'=>4345),
                                        array('nombre' => 'Omar Martínez Torres2', 'folio'=>4344),
                                        array('nombre' => 'Omar Martínez Torres3', 'folio'=>4341),
                                    ); 

    $this->mpdf->evaluacion_teorica_remediar_blso('formatos_imprimir/blso/v18.evaluacion_teorica_remediar_blso.php',$data); 
} 

public function contancia_participacion_blso() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['participante']=mb_strtoupper("CARLA GARCÍA CASTANEDO");
    $data['capacitacion']=mb_strtoupper("proveedor");
    $data['fecha_emision']="19/01/2020";
    $data['fecha_renovacion']="19/01/2022";
    $data['centro']=mb_strtoupper("Centro PACE");
    $data['director_curso']=mb_strtoupper("DR. RODOLFO JESÚS MORALES GONZÁLEZ");
    $data['folio']="2108";
    $data['dia1']="18";
    $data['dia2']="19";
    $data['mes']=mb_strtoupper("Enero");
    $data['anio']="2020";
    $data['lugar']=mb_strtoupper("PLAYA DEL CARMEN, QUINTANA ROO");

    $this->mpdf->contancia_participacion_blso('formatos_imprimir/blso/v19.contancia_participacion_blso.php',$data); 
} 

public function evaluacion_curso_blso() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 

    $this->mpdf->evaluacion_curso_blso('formatos_imprimir/blso/v21.evaluacion_curso_blso.php',$data); 
} 

public function Reporte_Director_curso_blso() 
{ 
    $this->load->model('curso');
    $this->load->library('Functions');  
    $this->load->library('Mpdf');
    $fecha_actual = new DateTime('NOW');
    $data = array(); 

    $data['fecha_curso'] = '02/06/2020';
    $data['sede_curso'] = 'Guanajuato, Gto';
    $data['lugar_curso'] = 'C. Guanajuato, Gto';
    $data['instructores'] = array(
                                array('name' =>'Omar Martínez Martínez1dqdqw dfeqfwef fwefew', 
                                       'residencia'=>'Guanajuato, Gto',
                                       'especidalidad'=>'Cardiopulmonar ddewdewdew',
                                       'cargo'=>'Director de hospital'
                                ),
                                array('name' =>'Omar Martínez Martínez2', 
                                       'residencia'=>'Silao, Gto',
                                       'especidalidad'=>'Pediatria',
                                       'cargo'=>'Medico de hospital'
                                ),
                    
                            );
    $data['Proveedores_capacitar']=12;
    $data['Proveedores_capacitados']=10;
    $data['capa_gineco']=6;
    $data['capa_generales']=2;
    $data['capa_urgen']=3;
    $data['capa_enferm']=4;
    $data['capa_intern']=5;
    $data['capa_inten']=1;
    $data['capa_anes']=7;
    $data['capa_tum']=8;
    $data['capa_tem']=9;

    $data['provee_apro_tteorico']=86;
    $data['provee_aprob_pteorico']='95%';
    $data['provee_apro_tpractico']=79;
    $data['provee_aprob_ppractico']='80%';

    $data['provee_repro_tteorico']=3;
    $data['provee_reprob_pteorico']='4%';
    $data['provee_repro_tpractico']=10;
    $data['provee_reprob_ppractico']='15%';

    $data['candidatos_inst'] = array(
                                array('name' =>'Omar Martínez Martínez1', 
                                       'puntajet'=>'90%',
                                       'puntajep'=>'80%'                                     
                                ),
                                array('name' =>'Omar Martínez Martínez2', 
                                       'puntajet'=>'90%',
                                       'puntajep'=>'80%'                                     
                                ),
                               
                               
                            );    

    $data['aulas']=0;
    $data['aulas_obs']="Podrian mejorara";
    $data['proy']=0;
    $data['proy_obs']="Podrian mejorarp";
    $data['seña']=0;
    $data['seña_obs']="Podrian mejorars";
    $data['venti']=0;
    $data['venti_obs']="Podrian mejorarv";
    
    $data['compu_c']=1;
    $data['compu_f']=1;

    $data['pape']=1;    
    $data['manual_ent']=0;

    $data['nemo']=1;
    $data['nemo_falt']=25;

    $data['ponencias'] = array(
                                array('nombre' =>'ponencia numero1', 
                                       'apegado'=>1,
                                       'calidad'=>1                                     
                                ),
                                array('nombre' =>'ponencia numero2', 
                                       'apegado'=>0,
                                       'calidad'=>0                                     
                                ),
                                array('nombre' =>'ponencia numero3', 
                                       'apegado'=>1,
                                       'calidad'=>2                                     
                                ),
                                array('nombre' =>'ponencia numero1', 
                                       'apegado'=>1,
                                       'calidad'=>1                                     
                                ),
                                array('nombre' =>'ponencia numero2', 
                                       'apegado'=>0,
                                       'calidad'=>0                                     
                                ),
                                array('nombre' =>'ponencia numero3 fewfwefew fwefewf fwefwefewfe', 
                                       'apegado'=>1,
                                       'calidad'=>2                                     
                                ),
                                array('nombre' =>'ponencia numero1', 
                                       'apegado'=>1,
                                       'calidad'=>1                                     
                                ),
                                array('nombre' =>'ponencia numero2', 
                                       'apegado'=>0,
                                       'calidad'=>0                                     
                                ),
                                array('nombre' =>'ponencia numero3', 
                                       'apegado'=>1,
                                       'calidad'=>2                                     
                                ),
                          
                            );
    $data['obs_ponen']="Aqui van las observaciones de las ponencias, aqui van las observaciones de las ponencias";
    $data['mat_taller'] = array(
                                array('nombre' =>'taller numero1', 
                                       'completo'=>1,
                                       'faltante'=>'todo muy bien'                                     
                                ),
                                array('nombre' =>'taller numero2', 
                                       'completo'=>0,
                                       'faltante'=>'Falto material'                                  
                                ),
                                array('nombre' =>'taller numero3', 
                                       'completo'=>1,
                                       'faltante'=>'todo muy bien taller 3'                                    
                                ),
                          
                            );
    $data['coffee']=2;
    $data['comida']=2;
    $data['hotel']=2;
    $data['viaticos']=array(
                                array('nombre' =>'instructor numero1', 
                                       'viaticos'=>1,                                     
                                ),
                                array('nombre' =>'instructor numero2', 
                                       'viaticos'=>0,                                  
                                ),
                                array('nombre' =>'instructor numero3', 
                                       'viaticos'=>2,                                    
                                ),

                          
                            );
    $data['lugar_inst']='Guanajuato, Gto capital';
    $data['fecha_inst']='13/10/2020';
    $data['hora_inst']='09:00 am';
    $data['concepto']=array(1,0,1,1,1,0,0,1);
    $data['comentarios']='Aquí van los comentarios de la reunion de los instructores';
    $data['des_curso']='Aquí el desarrollo del curso';

    $data['dir_curso']='Blanca Estela Hurtado';
    $data['dir_esp']='Medico general con Especialidad en Cardiopulmonar';
    $data['fecha_actual']=$fecha_actual->format('d/m/Y'); 

    $data['controller'] = $this->functions; 

    $this->mpdf->Reporte_Director_curso_blso('formatos_imprimir/blso/v23.Reporte_Director_curso_blso.php',$data); 
} 

public function ejemplo_reporte_logistica_blso() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->ejemplo_reporte_logistica_blso('formatos_imprimir/blso/v24.ejemplo_reporte_logistica_blso.php',$data); 
} 

   /*-------------------------------------------------------------------------------------
    ----------------------------------------Reportes HEARTSAVER----------------------------*/


public function course_information_participants_heart() 
{ 
    $this->load->library('Mpdf');
    $fecha_actual = new DateTime('NOW');
    $exp_card_date=new DateTime('2021-05-12');
    $course_start=new DateTime('2021-05-30');
    $course_end=new DateTime('2021-05-30');
    $iss_date_card=new DateTime('2021-05-27');

        $data['lead_instructor']='Omar Martinez';
        $data['id_lead_instructor']='0085';
        $data['exp_card_date']=$exp_card_date->format('d/m/Y');
        $data['tra_center']='Escuela de Medicina de la UG';
        $data['id_tra_center']=943;
        $data['name_tra_center']="example de tra center";
        $data['adress']='C. Principal No.S/N';
        $data['city_sz']='Guanajuato; 36000';
        $data['location_course']='Escuela de Medicina de la UG';
        $data['type_course']=5;
        $data['course_start']=$course_start->format('d/m/Y').' 10 am';
        $data['course_end']=$course_end->format('d/m/Y').' 03 pm';
        $data['time_inst']="1 hora";
        $data['cards_iss']=5;
        $data['ratio']="3:1";
        $data['iss_date_card']=$iss_date_card->format('d/m/Y');
        $data['tam_reg_tabla_2']=10;
        $data['fecha_actual']=$fecha_actual->format('d/m/Y');


        $data['instructores']=array(
                            array('name' =>'Omar Martínez1','vencimiento'=>'12/10/2021'),
                            array('name' =>'Omar Martínez2','vencimiento'=>'12/10/2022'),
                            array('name' =>'Omar Martínez3','vencimiento'=>'12/10/2023'),
                            array('name' =>'Omar Martínez4','vencimiento'=>'12/10/2024'),
                            array('name' =>'Omar Martínez5','vencimiento'=>'12/10/2025'),
                            array('name' =>'Omar Martínez6','vencimiento'=>'12/10/2026'),
                            array('name' =>'Omar Martínez7','vencimiento'=>'12/10/2027'),
                            array('name' =>'Omar Martínez8','vencimiento'=>'12/10/2028'),
                            array('name' =>'Omar Martínez9','vencimiento'=>'12/10/2029'),
                            array('name' =>'Omar Martínez10','vencimiento'=>'12/10/2030'),
                            array('name' =>'Omar Martínez11','vencimiento'=>'12/10/2031'),
        );
        $data['participantes']=array(
                            array('name' =>'Omar Martínez1', 'email'=>'omar-martinez@hotmail.com','cp_tel'=>'Cp: 36000 Teléfono: 737658956','completed'=>'complete','remed_date'=>'12/10/2021'),
                            array('name' =>'Omar Martínez2', 'email'=>'omar-martinez@hotmail.com','cp_tel'=>'Cp: 36000 Teléfono: 737658956','completed'=>'complete','remed_date'=>'12/10/2022'),
                            array('name' =>'Omar Martínez3', 'email'=>'omar-martinez@hotmail.com','cp_tel'=>'Cp: 36000 Teléfono: 737658956','completed'=>'complete','remed_date'=>'12/10/2023'),
                            array('name' =>'Omar Martínez4', 'email'=>'omar-martinez@hotmail.com','cp_tel'=>'Cp: 36000 Teléfono: 737658956','completed'=>'complete','remed_date'=>'12/10/2024'),
                            array('name' =>'Omar Martínez5', 'email'=>'omar-martinez@hotmail.com','cp_tel'=>'Cp: 36000 Teléfono: 737658956','completed'=>'complete','remed_date'=>'12/10/2025'),
                            array('name' =>'Omar Martínez6', 'email'=>'omar-martinez@hotmail.com','cp_tel'=>'Cp: 36000 Teléfono: 737658956','completed'=>'complete','remed_date'=>'12/10/2026'),
                            array('name' =>'Omar Martínez7', 'email'=>'omar-martinez@hotmail.com','cp_tel'=>'Cp: 36000 Teléfono: 737658956','completed'=>'complete','remed_date'=>'12/10/2027'),
                            array('name' =>'Omar Martínez8', 'email'=>'omar-martinez@hotmail.com','cp_tel'=>'Cp: 36000 Teléfono: 737658956','completed'=>'complete','remed_date'=>'12/10/2028'),
                            array('name' =>'Omar Martínez9', 'email'=>'omar-martinez@hotmail.com','cp_tel'=>'Cp: 36000 Teléfono: 737658956','completed'=>'complete','remed_date'=>'12/10/2029'),
                            array('name' =>'Omar Martínez10','email'=>'omar-martinez@hotmail.com','cp_tel'=>'Cp: 36000 Teléfono: 737658956','completed'=>'complete','remed_date'=>'12/10/2030'),
                            array('name' =>'Omar Martínez11','email'=>'omar-martinez@hotmail.com','cp_tel'=>'Cp: 36000 Teléfono: 737658956','completed'=>'complete','remed_date'=>'12/10/2031'),
                            array('name' =>'Omar Martínez12','email'=>'omar-martinez@hotmail.com','cp_tel'=>'Cp: 36000 Teléfono: 737658956','completed'=>'complete','remed_date'=>'12/10/2031'),
                            array('name' =>'Omar Martínez13','email'=>'omar-martinez@hotmail.com','cp_tel'=>'Cp: 36000 Teléfono: 737658956','completed'=>'complete','remed_date'=>'12/10/2031'),
                            array('name' =>'Omar Martínez14','email'=>'omar-martinez@hotmail.com','cp_tel'=>'Cp: 36000 Teléfono: 737658956','completed'=>'complete','remed_date'=>'12/10/2031'),
                            array('name' =>'Omar Martínez15','email'=>'omar-martinez@hotmail.com','cp_tel'=>'Cp: 36000 Teléfono: 737658956','completed'=>'complete','remed_date'=>'12/10/2031'),
                            array('name' =>'Omar Martínez16','email'=>'omar-martinez@hotmail.com','cp_tel'=>'Cp: 36000 Teléfono: 737658956','completed'=>'complete','remed_date'=>'12/10/2031'),
                            array('name' =>'Omar Martínez17','email'=>'omar-martinez@hotmail.com','cp_tel'=>'Cp: 36000 Teléfono: 737658956','completed'=>'complete','remed_date'=>'12/10/2031'),
                            array('name' =>'Omar Martínez18','email'=>'omar-martinez@hotmail.com','cp_tel'=>'Cp: 36000 Teléfono: 737658956','completed'=>'complete','remed_date'=>'12/10/2031'),
                            array('name' =>'Omar Martínez19','email'=>'omar-martinez@hotmail.com','cp_tel'=>'Cp: 36000 Teléfono: 737658956','completed'=>'complete','remed_date'=>'12/10/2031'),
                            array('name' =>'Omar Martínez20','email'=>'omar-martinez@hotmail.com','cp_tel'=>'Cp: 36000 Teléfono: 737658956','completed'=>'complete','remed_date'=>'12/10/2031'),
                            array('name' =>'Omar Martínez21','email'=>'omar-martinez@hotmail.com','cp_tel'=>'Cp: 36000 Teléfono: 737658956','completed'=>'complete','remed_date'=>'12/10/2031'),
                    
                        );  

    $this->mpdf->course_information_participants_heart('formatos_imprimir/heartsaver/v1.course_information_participants_heart.php',$data); 
} 

public function agenda_curso_heart() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 

    $data['estudiantes'] = '12';
    $data['instructores'] = '2';
    $data['rel_est_instr'] = '6:1';
    $data['rel_est_mani'] = '3:1';
    $data['duracion'] = '2 horas 20 minutos';  

    $this->mpdf->agenda_curso_heart('formatos_imprimir/heartsaver/v14.agenda_curso_heart.php',$data); 
} 

public function monitorizacion_heart() 
{       
    $this->load->model('curso'); 
    $this->load->library('Mpdf');
    $fecha_actual = new DateTime('NOW');  
    $data = array(); 

    $data['instructor'] = 'Omar Martínez Martínez'; 
    $data['id_instructor'] = 8990; 
    $data['exp_card_date'] = '10/01/2023';
    $data['course_rev'] = 3;
    $data['course_purpo']=3;
    $data['name_rf']="Carolina Hurtado";
    $data['fecha_actual']=$fecha_actual->format('d/m/Y');
    $data['coordinator']="Blanca Estela Hurtado"; 

    $this->mpdf->monitorizacion_heart('formatos_imprimir/heartsaver/v15.monitorizacion_heart.php',$data); 
} 

public function RCP_DEA_adultos_heart() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $fecha_actual = new DateTime('NOW');
    $data = array();

    //---Variables 
    $fecha_prueba=$fecha_actual->format('d/m/Y');
    $estudiante="Omar Martínez Torres";
    $instructor_ini="OMT";
    $instructor_num="0015";
    $fecha_actual=$fecha_actual->format('d/m/Y');

    $data['fecha_prueba'] = $fecha_prueba;
    $data['nombre_estudiante'] = $estudiante; 
    $data['instructor_iniciales'] = $instructor_ini;
    $data['instructor_num'] = $instructor_num;
    $data['fecha_actual']=$fecha_actual; 

    $this->mpdf->RCP_DEA_adultos_heart('formatos_imprimir/heartsaver/v16.RCP_DEA_adultos_heart.php',$data); 
} 

public function RCP_ninos_heart() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $fecha_actual = new DateTime('NOW');
    $data = array();

    //---Variables 
    $fecha_prueba=$fecha_actual->format('d/m/Y');
    $estudiante="Omar Martínez Torres";
    $instructor_ini="OMT";
    $instructor_num="0015";
    $fecha_actual=$fecha_actual->format('d/m/Y');

    $data['fecha_prueba'] = $fecha_prueba;
    $data['nombre_estudiante'] = $estudiante; 
    $data['instructor_iniciales'] = $instructor_ini;
    $data['instructor_num'] = $instructor_num;
    $data['fecha_actual']=$fecha_actual; 

    $this->mpdf->RCP_ninos_heart('formatos_imprimir/heartsaver/v17.RCP_ninos_heart.php',$data); 
} 

public function RCP_lactantes_heart() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $fecha_actual = new DateTime('NOW');
    $data = array();

    //---Variables 
    $fecha_prueba=$fecha_actual->format('d/m/Y');
    $estudiante="Omar Martínez Torres";
    $instructor_ini="OMT";
    $instructor_num="0015";
    $fecha_actual=$fecha_actual->format('d/m/Y');

    $data['fecha_prueba'] = $fecha_prueba;
    $data['nombre_estudiante'] = $estudiante; 
    $data['instructor_iniciales'] = $instructor_ini;
    $data['instructor_num'] = $instructor_num;
    $data['fecha_actual']=$fecha_actual; 

    $this->mpdf->RCP_lactantes_heart('formatos_imprimir/heartsaver/v18.RCP_lactantes_heart.php',$data); 
} 

public function primeros_auxilios_heart() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $fecha_actual = new DateTime('NOW');

    $data = array(); 
    $data['iniciales_intr'] = 'OMT'; 
    $data['name_intr'] = 'Omar Martínez Torres'; 
    $data['fecha'] = $fecha_actual->format('d/m/Y');
    $data['estudiante'] = "Carolina Hurtado Villegas";

    $this->mpdf->primeros_auxilios_heart('formatos_imprimir/heartsaver/v19.primeros_auxilios_heart.php',$data); 
} 

public function evaluacion_teorica_heart() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf');
    $fecha_actual = new DateTime('NOW'); 
    $data = array();

    $data['fecha']=$fecha_actual->format('d/m/Y');
    $data['nombre'] ='Omar Martínez Torres';
    $data['version']="009";

    $this->mpdf->evaluacion_teorica_heart('formatos_imprimir/heartsaver/v38.evaluacion_teorica_heart.php',$data); 
} 

public function evaluacion_teorica_remediar_heart() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf');
    $fecha_actual = new DateTime('NOW'); 
    $data = array();
     
    $data['fecha']=$fecha_actual->format('d/m/Y');
    $data['nombre'] ='Omar Martínez Torres';
    $data['version']="009"; 

    $this->mpdf->evaluacion_teorica_remediar_heart('formatos_imprimir/heartsaver/v39.evaluacion_teorica_remediar_heart.php',$data); 
} 

public function constancia_participacion_heart() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $fecha_actual = new DateTime('NOW');
    $data = array();

    //---Variables
    $fecha_actual=$fecha_actual->format('d/m/Y'); 
    $estudiante="Omar Martínez Torres";
    $duracion_horas="5 horas";
    $fecha_curso="14 de Agosto de 2020";
    $ciudad_curso="Guanajuato, Gto";
    $nac="0012";
    $folio="0089";
    $curso="RCP Familiares y Amigos Reanimación Cardiopulmonar <br> de la American Heart Association";

    $parrafo="Por su valiosa participación en el curso <br>".$curso." con una  duración de ".$duracion_horas.".<br>Efectuado el día ".$fecha_curso." <br> en la ciudad de ".$ciudad_curso.".";  
    
    $data['nombre_estudiante'] = $estudiante; 
    $data['duracion_horas'] = $duracion_horas;
    $data['fecha_curso'] = $fecha_curso;
    $data['ciudad_curso']=$ciudad_curso;
    $data['nac']=$nac;
    $data['folio']=$folio;

    $data['parrafo']=$parrafo; 

    $this->mpdf->constancia_participacion_heart('formatos_imprimir/heartsaver/v40.constancia_participacion_heart.php',$data); 
} 

public function Carta_PI_heart() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $fecha_actual = new DateTime('NOW'); 
    $data = array(); 
    //---Variables
    $fecha_actual=$fecha_actual->format('d/m/Y');
    $sede_curso="Guanajuato, Gto.";
    $instructor="Omar Martínez Torres";
    $fecha="12/08/2020";       
    $ciudad_curso="Guanajuato, Gto.";
    $dia1_curso="12";
    $dia2_curso="21";
    $mes_curso="Agosto";
    $folio="0012";
    $director_curso="Omar Martínez Torres";
    
    $data['fecha_actual'] = $fecha_actual; 
    $data['fecha'] = $fecha;
    $data['sede_curso'] = $sede_curso;
    $data['instructor']=$instructor;
    $data['dia1_curso']=$dia1_curso;
    $data['dia2_curso']=$dia2_curso;
    $data['mes_curso']=$mes_curso;
    $data['folio']=$folio;
    $data['director_curso']=$director_curso; 

    $this->mpdf->Carta_PI_heart('formatos_imprimir/heartsaver/v41.Carta_PI_heart.php',$data); 
} 

public function Instructor_Candidate_Aplication_heart() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $fecha_actual = new DateTime('NOW');
    $data = array(); 

    $Renewal_date_provider='02/06/2020';
    $name_candidate='Omar Martínez Torres'; 
    $address='C. San Antonio #1, col. Villaseca';
    $city='Guanajuato';
    $state='Guanajuato';
    $cp='36000';
    $tel='4735608954';
    $email='ejemplo@hotmail.com'; 
    $id_instructor='0098'; 
    $date_renewal='12/04/2020';
    $tc_name='Ejemplo de TC'; 
    $tc_id='0032';
    $fecha_actual=$fecha_actual->format('d/m/Y');

    $data['Renewal_date_provider'] = $Renewal_date_provider;
    $data['name_candidate'] = $name_candidate;
    $data['address'] =  $address;
    $data['city'] =  $city;
    $data['state'] = $state;
    $data['cp'] =  $cp;
    $data['tel'] =  $tel;
    $data['email'] = $email;
    $data['id_instructor'] = $id_instructor;
    $data['date_renewal'] =  $date_renewal;
    $data['tc_name'] = $tc_name;
    $data['tc_id'] =  $tc_id;
    $data['date'] = $fecha_actual; 

    $this->mpdf->Instructor_Candidate_Aplication_heart('formatos_imprimir/heartsaver/v42.Instructor_Candidate_Aplication_heart.php',$data); 
} 

public function Reporte_Director_curso_heart() 
{ 
    $this->load->model('curso');
    $this->load->library('Functions');  
    $this->load->library('Mpdf');
    $fecha_actual = new DateTime('NOW');
    $data = array(); 

    $data['fecha_curso'] = '02/06/2020';
    $data['sede_curso'] = 'Guanajuato, Gto';
    $data['lugar_curso'] = 'C. Guanajuato, Gto';
    $data['instructores'] = array(
                                array('name' =>'Omar Martínez Martínez1dqdqw dfeqfwef fwefew', 
                                       'residencia'=>'Guanajuato, Gto',
                                       'especidalidad'=>'Cardiopulmonar ddewdewdew',
                                       'cargo'=>'Director de hospital'
                                ),
                                array('name' =>'Omar Martínez Martínez2', 
                                       'residencia'=>'Silao, Gto',
                                       'especidalidad'=>'Pediatria',
                                       'cargo'=>'Medico de hospital'
                                ),
                    
                            );
    $data['Proveedores_capacitar']=12;
    $data['Proveedores_capacitados']=10;
    $data['capa_gineco']=6;
    $data['capa_generales']=2;
    $data['capa_urgen']=3;
    $data['capa_enferm']=4;
    $data['capa_intern']=5;
    $data['capa_inten']=1;
    $data['capa_anes']=7;
    $data['capa_tum']=8;
    $data['capa_tem']=9;

    $data['provee_apro_tteorico']=86;
    $data['provee_aprob_pteorico']='95%';
    $data['provee_apro_tpractico']=79;
    $data['provee_aprob_ppractico']='80%';

    $data['provee_repro_tteorico']=3;
    $data['provee_reprob_pteorico']='4%';
    $data['provee_repro_tpractico']=10;
    $data['provee_reprob_ppractico']='15%';

    $data['candidatos_inst'] = array(
                                array('name' =>'Omar Martínez Martínez1', 
                                       'puntajet'=>'90%',
                                       'puntajep'=>'80%'                                     
                                ),
                                array('name' =>'Omar Martínez Martínez2', 
                                       'puntajet'=>'90%',
                                       'puntajep'=>'80%'                                     
                                ),
                               
                               
                            );    

    $data['aulas']=0;
    $data['aulas_obs']="Podrian mejorara";
    $data['proy']=0;
    $data['proy_obs']="Podrian mejorarp";
    $data['seña']=0;
    $data['seña_obs']="Podrian mejorars";
    $data['venti']=0;
    $data['venti_obs']="Podrian mejorarv";
    
    $data['compu_c']=1;
    $data['compu_f']=1;

    $data['pape']=1;    
    $data['manual_ent']=0;

    $data['nemo']=1;
    $data['nemo_falt']=25;

    $data['ponencias'] = array(
                                array('nombre' =>'ponencia numero1', 
                                       'apegado'=>1,
                                       'calidad'=>1                                     
                                ),
                                array('nombre' =>'ponencia numero2', 
                                       'apegado'=>0,
                                       'calidad'=>0                                     
                                ),
                                array('nombre' =>'ponencia numero3', 
                                       'apegado'=>1,
                                       'calidad'=>2                                     
                                ),
                                array('nombre' =>'ponencia numero1', 
                                       'apegado'=>1,
                                       'calidad'=>1                                     
                                ),
                                array('nombre' =>'ponencia numero2', 
                                       'apegado'=>0,
                                       'calidad'=>0                                     
                                ),
                                array('nombre' =>'ponencia numero3 fewfwefew fwefewf fwefwefewfe', 
                                       'apegado'=>1,
                                       'calidad'=>2                                     
                                ),
                                array('nombre' =>'ponencia numero1', 
                                       'apegado'=>1,
                                       'calidad'=>1                                     
                                ),
                                array('nombre' =>'ponencia numero2', 
                                       'apegado'=>0,
                                       'calidad'=>0                                     
                                ),
                                array('nombre' =>'ponencia numero3', 
                                       'apegado'=>1,
                                       'calidad'=>2                                     
                                ),
                          
                            );
    $data['obs_ponen']="Aqui van las observaciones de las ponencias, aqui van las observaciones de las ponencias";
    $data['mat_taller'] = array(
                                array('nombre' =>'taller numero1', 
                                       'completo'=>1,
                                       'faltante'=>'todo muy bien'                                     
                                ),
                                array('nombre' =>'taller numero2', 
                                       'completo'=>0,
                                       'faltante'=>'Falto material'                                  
                                ),
                                array('nombre' =>'taller numero3', 
                                       'completo'=>1,
                                       'faltante'=>'todo muy bien taller 3'                                    
                                ),
                          
                            );
    $data['coffee']=2;
    $data['comida']=2;
    $data['hotel']=2;
    $data['viaticos']=array(
                                array('nombre' =>'instructor numero1', 
                                       'viaticos'=>1,                                     
                                ),
                                array('nombre' =>'instructor numero2', 
                                       'viaticos'=>0,                                  
                                ),
                                array('nombre' =>'instructor numero3', 
                                       'viaticos'=>2,                                    
                                ),

                          
                            );
    $data['lugar_inst']='Guanajuato, Gto capital';
    $data['fecha_inst']='13/10/2020';
    $data['hora_inst']='09:00 am';
    $data['concepto']=array(1,0,1,1,1,0,0,1);
    $data['comentarios']='Aquí van los comentarios de la reunion de los instructores';
    $data['des_curso']='Aquí el desarrollo del curso';

    $data['dir_curso']='Blanca Estela Hurtado';
    $data['dir_esp']='Medico general con Especialidad en Cardiopulmonar';
    $data['fecha_actual']=$fecha_actual->format('d/m/Y'); 

    $data['controller'] = $this->functions; 

    $this->mpdf->Reporte_Director_curso_heart('formatos_imprimir/heartsaver/v45.Reporte_Director_curso_heart.php',$data); 
} 

public function ejemplo_reporte_logistica_heart() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->ejemplo_reporte_logistica_heart('formatos_imprimir/heartsaver/v46.ejemplo_reporte_logistica_heart.php',$data); 
} 


    /*-------------------------------------------------------------------------------------
    ----------------------------------------Reportes PALS---------------------------------*/

public function course_information_participants_pals() 
{ 
    $this->load->library('Mpdf');
    $fecha_actual = new DateTime('NOW');
    $exp_card_date=new DateTime('2021-05-12');
    $course_start=new DateTime('2021-05-30');
    $course_end=new DateTime('2021-05-30');
    $iss_date_card=new DateTime('2021-05-27');

        $data['lead_instructor']='Omar Martinez';
        $data['id_lead_instructor']='0085';
        $data['exp_card_date']=$exp_card_date->format('d/m/Y');
        $data['tra_center']='Escuela de Medicina de la UG';
        $data['id_tra_center']=943;
        $data['name_tra_center']="example de tra center";
        $data['adress']='C. Principal No.S/N';
        $data['city_sz']='Guanajuato; 36000';
        $data['location_course']='Escuela de Medicina de la UG';
        $data['type_course']=4;
        $data['course_start']=$course_start->format('d/m/Y').' 10 am';
        $data['course_end']=$course_end->format('d/m/Y').' 03 pm';
        $data['time_inst']="1 hora";
        $data['cards_iss']=5;
        $data['ratio']="3:1";
        $data['iss_date_card']=$iss_date_card->format('d/m/Y');
        $data['tam_reg_tabla_2']=10;
        $data['fecha_actual']=$fecha_actual->format('d/m/Y');


        $data['instructores']=array(
                            array('name' =>'Omar Martínez1','vencimiento'=>'12/10/2021'),
                            array('name' =>'Omar Martínez2','vencimiento'=>'12/10/2022'),
                            array('name' =>'Omar Martínez3','vencimiento'=>'12/10/2023'),
                            array('name' =>'Omar Martínez4','vencimiento'=>'12/10/2024'),
                            array('name' =>'Omar Martínez5','vencimiento'=>'12/10/2025'),
                            array('name' =>'Omar Martínez6','vencimiento'=>'12/10/2026'),
                            array('name' =>'Omar Martínez7','vencimiento'=>'12/10/2027'),
                            array('name' =>'Omar Martínez8','vencimiento'=>'12/10/2028'),
                            array('name' =>'Omar Martínez9','vencimiento'=>'12/10/2029'),
                            array('name' =>'Omar Martínez10','vencimiento'=>'12/10/2030'),
                            array('name' =>'Omar Martínez11','vencimiento'=>'12/10/2031'),
        );
        $data['participantes']=array(
                            array('name' =>'Omar Martínez1', 'email'=>'omar-martinez@hotmail.com','cp_tel'=>'Cp: 36000 Teléfono: 737658956','completed'=>'complete','remed_date'=>'12/10/2021'),
                            array('name' =>'Omar Martínez2', 'email'=>'omar-martinez@hotmail.com','cp_tel'=>'Cp: 36000 Teléfono: 737658956','completed'=>'complete','remed_date'=>'12/10/2022'),
                            array('name' =>'Omar Martínez3', 'email'=>'omar-martinez@hotmail.com','cp_tel'=>'Cp: 36000 Teléfono: 737658956','completed'=>'complete','remed_date'=>'12/10/2023'),
                            array('name' =>'Omar Martínez4', 'email'=>'omar-martinez@hotmail.com','cp_tel'=>'Cp: 36000 Teléfono: 737658956','completed'=>'complete','remed_date'=>'12/10/2024'),
                            array('name' =>'Omar Martínez5', 'email'=>'omar-martinez@hotmail.com','cp_tel'=>'Cp: 36000 Teléfono: 737658956','completed'=>'complete','remed_date'=>'12/10/2025'),
                            array('name' =>'Omar Martínez6', 'email'=>'omar-martinez@hotmail.com','cp_tel'=>'Cp: 36000 Teléfono: 737658956','completed'=>'complete','remed_date'=>'12/10/2026'),
                            array('name' =>'Omar Martínez7', 'email'=>'omar-martinez@hotmail.com','cp_tel'=>'Cp: 36000 Teléfono: 737658956','completed'=>'complete','remed_date'=>'12/10/2027'),
                            array('name' =>'Omar Martínez8', 'email'=>'omar-martinez@hotmail.com','cp_tel'=>'Cp: 36000 Teléfono: 737658956','completed'=>'complete','remed_date'=>'12/10/2028'),
                            array('name' =>'Omar Martínez9', 'email'=>'omar-martinez@hotmail.com','cp_tel'=>'Cp: 36000 Teléfono: 737658956','completed'=>'complete','remed_date'=>'12/10/2029'),
                            array('name' =>'Omar Martínez10','email'=>'omar-martinez@hotmail.com','cp_tel'=>'Cp: 36000 Teléfono: 737658956','completed'=>'complete','remed_date'=>'12/10/2030'),
                            array('name' =>'Omar Martínez11','email'=>'omar-martinez@hotmail.com','cp_tel'=>'Cp: 36000 Teléfono: 737658956','completed'=>'complete','remed_date'=>'12/10/2031'),
                            array('name' =>'Omar Martínez12','email'=>'omar-martinez@hotmail.com','cp_tel'=>'Cp: 36000 Teléfono: 737658956','completed'=>'complete','remed_date'=>'12/10/2031'),
                            array('name' =>'Omar Martínez13','email'=>'omar-martinez@hotmail.com','cp_tel'=>'Cp: 36000 Teléfono: 737658956','completed'=>'complete','remed_date'=>'12/10/2031'),
                            array('name' =>'Omar Martínez14','email'=>'omar-martinez@hotmail.com','cp_tel'=>'Cp: 36000 Teléfono: 737658956','completed'=>'complete','remed_date'=>'12/10/2031'),
                            array('name' =>'Omar Martínez15','email'=>'omar-martinez@hotmail.com','cp_tel'=>'Cp: 36000 Teléfono: 737658956','completed'=>'complete','remed_date'=>'12/10/2031'),
                            array('name' =>'Omar Martínez16','email'=>'omar-martinez@hotmail.com','cp_tel'=>'Cp: 36000 Teléfono: 737658956','completed'=>'complete','remed_date'=>'12/10/2031'),
                            array('name' =>'Omar Martínez17','email'=>'omar-martinez@hotmail.com','cp_tel'=>'Cp: 36000 Teléfono: 737658956','completed'=>'complete','remed_date'=>'12/10/2031'),
                            array('name' =>'Omar Martínez18','email'=>'omar-martinez@hotmail.com','cp_tel'=>'Cp: 36000 Teléfono: 737658956','completed'=>'complete','remed_date'=>'12/10/2031'),
                            array('name' =>'Omar Martínez19','email'=>'omar-martinez@hotmail.com','cp_tel'=>'Cp: 36000 Teléfono: 737658956','completed'=>'complete','remed_date'=>'12/10/2031'),
                            array('name' =>'Omar Martínez20','email'=>'omar-martinez@hotmail.com','cp_tel'=>'Cp: 36000 Teléfono: 737658956','completed'=>'complete','remed_date'=>'12/10/2031'),
                            array('name' =>'Omar Martínez21','email'=>'omar-martinez@hotmail.com','cp_tel'=>'Cp: 36000 Teléfono: 737658956','completed'=>'complete','remed_date'=>'12/10/2031'),
                    
                        );  

    $this->mpdf->course_information_participants_pals('formatos_imprimir/pals/v1.course_information_participants_pals.php',$data); 
} 

public function agenda_curso_pals() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['estudiantes'] = '18';
    $data['instructores'] = '3';
    $data['duracion'] = 'Aproximadamente 17 horas y 15 minutos con pausas';

    $this->mpdf->agenda_curso_pals('formatos_imprimir/pals/v14.agenda_curso_pals.php',$data); 
} 

public function monitorizacion_pals() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf');
    $fecha_actual = new DateTime('NOW');  
    $data = array(); 

    $data['instructor'] = 'Omar Martínez Martínez'; 
    $data['id_instructor'] = 8990; 
    $data['exp_card_date'] = '10/01/2023';
    $data['course_rev'] = 3;
    $data['course_purpo']=3;
    $data['name_rf']="Carolina Hurtado";
    $data['fecha_actual']=$fecha_actual->format('d/m/Y');
    $data['coordinator']="Blanca Estela Hurtado"; 

    $this->mpdf->monitorizacion_pals('formatos_imprimir/pals/v15.monitorizacion_pals.php',$data); 
} 

public function Manejo_via_aerea_pals() 
{ 
     $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $fecha_actual = new DateTime('NOW');

    $data = array(); 
    $data['iniciales_intr'] = 'OMT'; 
    $data['name_intr'] = 'Omar Martínez Torres'; 
    $data['fecha'] = $fecha_actual->format('d/m/Y');
    $data['estudiante'] = "Carolina Hurtado Villegas";

    $this->mpdf->Manejo_via_aerea_pals('formatos_imprimir/pals/v26.Manejo_via_aerea_pals.php',$data); 
} 

public function RCP_DEA_ninos_pals() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $fecha_actual = new DateTime('NOW');

    $data = array(); 
    $data['iniciales_intr'] = 'OMT'; 
    $data['name_intr'] = 'Omar Martínez Torres'; 
    $data['fecha'] = $fecha_actual->format('d/m/Y');
    $data['estudiante'] = "Carolina Hurtado Villegas"; 

    $this->mpdf->RCP_DEA_ninos_pals('formatos_imprimir/pals/v27.RCP_DEA_ninos_pals.php',$data); 
} 

public function RCP_lactantes_pals() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $fecha_actual = new DateTime('NOW');
    $data = array();

    //---Variables 
    $fecha_prueba=$fecha_actual->format('d/m/Y');
    $estudiante="Omar Martínez Torres";
    $instructor_ini="OMT";
    $instructor_num="0015";
    $fecha_actual=$fecha_actual->format('d/m/Y');

    $data['fecha_prueba'] = $fecha_prueba;
    $data['nombre_estudiante'] = $estudiante; 
    $data['instructor_iniciales'] = $instructor_ini;
    $data['instructor_num'] = $instructor_num;
    $data['fecha_actual']=$fecha_actual; 

    $this->mpdf->RCP_lactantes_pals('formatos_imprimir/pals/v28.RCP_lactantes_pals.php',$data); 
} 

public function megacode_pals() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $fecha_actual = new DateTime('NOW');
    $data = array();

    //---Variables 
    $fecha_prueba=$fecha_actual->format('d/m/Y');
    $estudiante="Omar Martínez Torres";
    $instructor_ini="OMT";
    $instructor_num="0015";
    $fecha_actual=$fecha_actual->format('d/m/Y');

    $data['fecha_prueba'] = $fecha_prueba;
    $data['nombre_estudiante'] = $estudiante; 
    $data['instructor_iniciales'] = $instructor_ini;
    $data['instructor_num'] = $instructor_num;
    $data['fecha_actual']=$fecha_actual;

    $this->mpdf->megacode_pals('formatos_imprimir/pals/v29.megacode_pals.php',$data); 
} 

public function ritmo_terapia_electrica_pals() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $fecha_actual = new DateTime('NOW');

    $data = array(); 
    $data['iniciales_intr'] = 'OMT'; 
    $data['name_intr'] = 'Omar Martínez Torres'; 
    $data['fecha'] = $fecha_actual->format('d/m/Y');
    $data['estudiante'] = "Carolina Hurtado Villegas"; 

    $this->mpdf->ritmo_terapia_electrica_pals('formatos_imprimir/pals/v30.ritmo_terapia_electrica_pals.php',$data); 
} 

public function acceso_vascular_pals() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $fecha_actual = new DateTime('NOW');

    $data = array(); 
    $data['iniciales_intr'] = 'OMT'; 
    $data['name_intr'] = 'Omar Martínez Torres'; 
    $data['fecha'] = $fecha_actual->format('d/m/Y');
    $data['estudiante'] = "Carolina Hurtado Villegas"; 

    $this->mpdf->acceso_vascular_pals('formatos_imprimir/pals/v31.acceso_vascular_pals.php',$data); 
} 

public function prueba_escenarios_pals() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array();


    $this->mpdf->prueba_escenarios_pals('formatos_imprimir/pals/v36.prueba_escenarios_pals.php',$data); 
} 

public function comprobacion_avance_curso_pals() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['grupo_a'] = array('Omar Martínez Martínez_a1','Omar Martínez Martínez_a2','Omar Martínez Martínez_a3','Omar Martínez Martínez_a4','Omar Martínez Martínez_a5','Omar Martínez Martínez_a6','Omar Martínez Martínez_a7');
                      
    $data['grupo_b'] = array('Omar Martínez Martínez_b1','Omar Martínez Martínez_b2','Omar Martínez Martínez_b3','Omar Martínez Martínez_b4','Omar Martínez Martínez_b5','Omar Martínez Martínez_b6','Omar Martínez Martínez_b7','Omar Martínez Martínez_b8','Omar Martínez Martínez_b9','Omar Martínez Martínez_b10','Omar Martínez Martínez_b11','Omar Martínez Martínez_b12','Omar Martínez Martínez_b13');


    $this->mpdf->comprobacion_avance_curso_pals('formatos_imprimir/pals/v37.comprobacion_avance_curso_pals.php',$data); 
} 

public function evaluacion_teorica_pals() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf');
    $fecha_actual = new DateTime('NOW');
    $data = array(); 
    
    $data['fecha']=$fecha_actual->format('d/m/Y');
    $data['nombre'] ='Omar Martínez Torres';
    $data['version']="009"; 

    $this->mpdf->evaluacion_teorica_pals('formatos_imprimir/pals/v38.evaluacion_teorica_pals.php',$data); 
} 

public function evaluacion_teorica_remediacion_pals() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf');
    $fecha_actual = new DateTime('NOW');
    $data = array(); 
    
    $data['fecha']=$fecha_actual->format('d/m/Y');
    $data['nombre'] ='Omar Martínez Torres';
    $data['version']="009";  

    $this->mpdf->evaluacion_teorica_remediacion_pals('formatos_imprimir/pals/v39.evaluacion_teorica_remediacion_pals.php',$data); 
} 

public function constancia_participacion_pals() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $fecha_actual = new DateTime('NOW');
    $data = array();

    //---Variables
    $fecha_actual=$fecha_actual->format('d/m/Y'); 
    $estudiante="Fernando A. Herrera A.";
    $duracion_horas="3 horas";
    $fecha_curso="10 Junio de 2018";
    $ciudad_curso="Guanajuato, Gto";
    $nac="0012";
    $folio="0089";
    $curso="RCP Familiares y Amigos Reanimación Cardiopulmonar de la American Heart Association";

    $parrafo="Por su valiosa participación en el curso <br>".$curso." con una  duración de ".$duracion_horas.".<br>Efectuado el día ".$fecha_curso." <br> en la ciudad de ".$ciudad_curso.".";  
    
    $data['nombre_estudiante'] = $estudiante; 
    $data['duracion_horas'] = $duracion_horas;
    $data['fecha_curso'] = $fecha_curso;
    $data['ciudad_curso']=$ciudad_curso;
    $data['nac']=$nac;
    $data['folio']=$folio;

    $data['parrafo']=$parrafo; 

    $this->mpdf->constancia_participacion_pals('formatos_imprimir/pals/v40.constancia_participacion_pals.php',$data); 
} 

public function Carta_PI_pals() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf');
    $fecha_actual = new DateTime('NOW');
    $data = array();

    //---Variables
    $fecha_actual=$fecha_actual->format('d/m/Y');
    $sede_curso="Guanajuato, Gto.";
    $instructor="Omar Martínez Torres";
    $fecha="12/08/2020";       
    $ciudad_curso="Guanajuato, Gto.";
    $dia1_curso="12";
    $dia2_curso="21";
    $mes_curso="Agosto";
    $folio="0012";
    $director_curso="Omar Martínez Torres";
    
    $data['fecha_actual'] = $fecha_actual; 
    $data['fecha'] = $fecha;
    $data['sede_curso'] = $sede_curso;
    $data['instructor']=$instructor;
    $data['dia1_curso']=$dia1_curso;
    $data['dia2_curso']=$dia2_curso;
    $data['mes_curso']=$mes_curso;
    $data['folio']=$folio;
    $data['director_curso']=$director_curso; 

    $this->mpdf->Carta_PI_pals('formatos_imprimir/pals/v41.Carta_PI_pals.php',$data); 
} 

public function Instructor_Candidate_Aplication_pals() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf');
    $fecha_actual = new DateTime('NOW');
    $data = array();
    
    $Renewal_date_provider='02/06/2020';
    $name_candidate='Omar Martínez Torres'; 
    $address='C. San Antonio #1, col. Villaseca';
    $city='Guanajuato';
    $state='Guanajuato';
    $cp='36000';
    $tel='4735608954';
    $email='ejemplo@hotmail.com'; 
    $id_instructor='0098'; 
    $date_renewal='12/04/2020';
    $tc_name='Ejemplo de TC'; 
    $tc_id='0032';
    $fecha_actual=$fecha_actual->format('d/m/Y');

    $data['Renewal_date_provider'] = $Renewal_date_provider;
    $data['name_candidate'] = $name_candidate;
    $data['address'] =  $address;
    $data['city'] =  $city;
    $data['state'] = $state;
    $data['cp'] =  $cp;
    $data['tel'] =  $tel;
    $data['email'] = $email;
    $data['id_instructor'] = $id_instructor;
    $data['date_renewal'] =  $date_renewal;
    $data['tc_name'] = $tc_name;
    $data['tc_id'] =  $tc_id;
    $data['date'] = $fecha_actual; 

    $this->mpdf->Instructor_Candidate_Aplication_pals('formatos_imprimir/pals/v42.Instructor_Candidate_Aplication_pals.php',$data); 
} 

public function Reporte_Director_curso_pals() 
{ 
    $this->load->model('curso');
    $this->load->library('Functions');  
    $this->load->library('Mpdf');
    $fecha_actual = new DateTime('NOW');
    $data = array(); 

    $data['fecha_curso'] = '02/06/2020';
    $data['sede_curso'] = 'Guanajuato, Gto';
    $data['lugar_curso'] = 'C. Guanajuato, Gto';
    $data['instructores'] = array(
                                array('name' =>'Omar Martínez Martínez1dqdqw dfeqfwef fwefew', 
                                       'residencia'=>'Guanajuato, Gto',
                                       'especidalidad'=>'Cardiopulmonar ddewdewdew',
                                       'cargo'=>'Director de hospital'
                                ),
                                array('name' =>'Omar Martínez Martínez2', 
                                       'residencia'=>'Silao, Gto',
                                       'especidalidad'=>'Pediatria',
                                       'cargo'=>'Medico de hospital'
                                ),
                    
                            );
    $data['Proveedores_capacitar']=12;
    $data['Proveedores_capacitados']=10;
    $data['capa_gineco']=6;
    $data['capa_generales']=2;
    $data['capa_urgen']=3;
    $data['capa_enferm']=4;
    $data['capa_intern']=5;
    $data['capa_inten']=1;
    $data['capa_anes']=7;
    $data['capa_tum']=8;
    $data['capa_tem']=9;

    $data['provee_apro_tteorico']=86;
    $data['provee_aprob_pteorico']='95%';
    $data['provee_apro_tpractico']=79;
    $data['provee_aprob_ppractico']='80%';

    $data['provee_repro_tteorico']=3;
    $data['provee_reprob_pteorico']='4%';
    $data['provee_repro_tpractico']=10;
    $data['provee_reprob_ppractico']='15%';

    $data['candidatos_inst'] = array(
                                array('name' =>'Omar Martínez Martínez1', 
                                       'puntajet'=>'90%',
                                       'puntajep'=>'80%'                                     
                                ),
                                array('name' =>'Omar Martínez Martínez2', 
                                       'puntajet'=>'90%',
                                       'puntajep'=>'80%'                                     
                                ),
                               
                               
                            );    

    $data['aulas']=0;
    $data['aulas_obs']="Podrian mejorara";
    $data['proy']=0;
    $data['proy_obs']="Podrian mejorarp";
    $data['seña']=0;
    $data['seña_obs']="Podrian mejorars";
    $data['venti']=0;
    $data['venti_obs']="Podrian mejorarv";
    
    $data['compu_c']=1;
    $data['compu_f']=1;

    $data['pape']=1;    
    $data['manual_ent']=0;

    $data['nemo']=1;
    $data['nemo_falt']=25;

    $data['ponencias'] = array(
                                array('nombre' =>'ponencia numero1', 
                                       'apegado'=>1,
                                       'calidad'=>1                                     
                                ),
                                array('nombre' =>'ponencia numero2', 
                                       'apegado'=>0,
                                       'calidad'=>0                                     
                                ),
                                array('nombre' =>'ponencia numero3', 
                                       'apegado'=>1,
                                       'calidad'=>2                                     
                                ),
                                array('nombre' =>'ponencia numero1', 
                                       'apegado'=>1,
                                       'calidad'=>1                                     
                                ),
                                array('nombre' =>'ponencia numero2', 
                                       'apegado'=>0,
                                       'calidad'=>0                                     
                                ),
                                array('nombre' =>'ponencia numero3 fewfwefew fwefewf fwefwefewfe', 
                                       'apegado'=>1,
                                       'calidad'=>2                                     
                                ),
                                array('nombre' =>'ponencia numero1', 
                                       'apegado'=>1,
                                       'calidad'=>1                                     
                                ),
                                array('nombre' =>'ponencia numero2', 
                                       'apegado'=>0,
                                       'calidad'=>0                                     
                                ),
                                array('nombre' =>'ponencia numero3', 
                                       'apegado'=>1,
                                       'calidad'=>2                                     
                                ),
                          
                            );
    $data['obs_ponen']="Aqui van las observaciones de las ponencias, aqui van las observaciones de las ponencias";
    $data['mat_taller'] = array(
                                array('nombre' =>'taller numero1', 
                                       'completo'=>1,
                                       'faltante'=>'todo muy bien'                                     
                                ),
                                array('nombre' =>'taller numero2', 
                                       'completo'=>0,
                                       'faltante'=>'Falto material'                                  
                                ),
                                array('nombre' =>'taller numero3', 
                                       'completo'=>1,
                                       'faltante'=>'todo muy bien taller 3'                                    
                                ),
                          
                            );
    $data['coffee']=2;
    $data['comida']=2;
    $data['hotel']=2;
    $data['viaticos']=array(
                                array('nombre' =>'instructor numero1', 
                                       'viaticos'=>1,                                     
                                ),
                                array('nombre' =>'instructor numero2', 
                                       'viaticos'=>0,                                  
                                ),
                                array('nombre' =>'instructor numero3', 
                                       'viaticos'=>2,                                    
                                ),

                          
                            );
    $data['lugar_inst']='Guanajuato, Gto capital';
    $data['fecha_inst']='13/10/2020';
    $data['hora_inst']='09:00 am';
    $data['concepto']=array(1,0,1,1,1,0,0,1);
    $data['comentarios']='Aquí van los comentarios de la reunion de los instructores';
    $data['des_curso']='Aquí el desarrollo del curso';

    $data['dir_curso']='Blanca Estela Hurtado';
    $data['dir_esp']='Medico general con Especialidad en Cardiopulmonar';
    $data['fecha_actual']=$fecha_actual->format('d/m/Y'); 

    $data['controller'] = $this->functions; 

    $this->mpdf->Reporte_Director_curso_pals('formatos_imprimir/pals/v45.Reporte_Director_curso_pals.php',$data); 
} 

public function ejemplo_reporte_logistica_pals() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->ejemplo_reporte_logistica_pals('formatos_imprimir/pals/v46.ejemplo_reporte_logistica_pals.php',$data); 
}


    /*-------------------------------------------------------------------------------------
    ----------------------------------------Reportes PEARS---------------------------------*/

public function course_information_participants_pears() 
{ 
    $this->load->library('Mpdf');
    $fecha_actual = new DateTime('NOW');
    $exp_card_date=new DateTime('2021-05-12');
    $course_start=new DateTime('2021-05-30');
    $course_end=new DateTime('2021-05-30');
    $iss_date_card=new DateTime('2021-05-27');

        $data['lead_instructor']='Omar Martinez';
        $data['id_lead_instructor']='0085';
        $data['exp_card_date']=$exp_card_date->format('d/m/Y');
        $data['tra_center']='Escuela de Medicina de la UG';
        $data['id_tra_center']=943;
        $data['name_tra_center']="example de tra center";
        $data['adress']='C. Principal No.S/N';
        $data['city_sz']='Guanajuato; 36000';
        $data['location_course']='Escuela de Medicina de la UG';
        $data['type_course']=1;
        $data['course_start']=$course_start->format('d/m/Y').' 10 am';
        $data['course_end']=$course_end->format('d/m/Y').' 03 pm';
        $data['time_inst']="1 hora";
        $data['cards_iss']=5;
        $data['ratio']="3:1";
        $data['iss_date_card']=$iss_date_card->format('d/m/Y');
        $data['tam_reg_tabla_2']=10;
        $data['fecha_actual']=$fecha_actual->format('d/m/Y');


        $data['instructores']=array(
                            array('name' =>'Omar Martínez1','vencimiento'=>'12/10/2021'),
                            array('name' =>'Omar Martínez2','vencimiento'=>'12/10/2022'),
                            array('name' =>'Omar Martínez3','vencimiento'=>'12/10/2023'),
                            array('name' =>'Omar Martínez4','vencimiento'=>'12/10/2024'),
                            array('name' =>'Omar Martínez5','vencimiento'=>'12/10/2025'),
                            array('name' =>'Omar Martínez6','vencimiento'=>'12/10/2026'),
                            array('name' =>'Omar Martínez7','vencimiento'=>'12/10/2027'),
                            array('name' =>'Omar Martínez8','vencimiento'=>'12/10/2028'),
                            array('name' =>'Omar Martínez9','vencimiento'=>'12/10/2029'),
                            array('name' =>'Omar Martínez10','vencimiento'=>'12/10/2030'),
                            array('name' =>'Omar Martínez11','vencimiento'=>'12/10/2031'),
        );
        $data['participantes']=array(
                            array('name' =>'Omar Martínez1', 'email'=>'omar-martinez@hotmail.com','cp_tel'=>'Cp: 36000 Teléfono: 737658956','completed'=>'complete','remed_date'=>'12/10/2021'),
                            array('name' =>'Omar Martínez2', 'email'=>'omar-martinez@hotmail.com','cp_tel'=>'Cp: 36000 Teléfono: 737658956','completed'=>'complete','remed_date'=>'12/10/2022'),
                            array('name' =>'Omar Martínez3', 'email'=>'omar-martinez@hotmail.com','cp_tel'=>'Cp: 36000 Teléfono: 737658956','completed'=>'complete','remed_date'=>'12/10/2023'),
                            array('name' =>'Omar Martínez4', 'email'=>'omar-martinez@hotmail.com','cp_tel'=>'Cp: 36000 Teléfono: 737658956','completed'=>'complete','remed_date'=>'12/10/2024'),
                            array('name' =>'Omar Martínez5', 'email'=>'omar-martinez@hotmail.com','cp_tel'=>'Cp: 36000 Teléfono: 737658956','completed'=>'complete','remed_date'=>'12/10/2025'),
                            array('name' =>'Omar Martínez6', 'email'=>'omar-martinez@hotmail.com','cp_tel'=>'Cp: 36000 Teléfono: 737658956','completed'=>'complete','remed_date'=>'12/10/2026'),
                            array('name' =>'Omar Martínez7', 'email'=>'omar-martinez@hotmail.com','cp_tel'=>'Cp: 36000 Teléfono: 737658956','completed'=>'complete','remed_date'=>'12/10/2027'),
                            array('name' =>'Omar Martínez8', 'email'=>'omar-martinez@hotmail.com','cp_tel'=>'Cp: 36000 Teléfono: 737658956','completed'=>'complete','remed_date'=>'12/10/2028'),
                            array('name' =>'Omar Martínez9', 'email'=>'omar-martinez@hotmail.com','cp_tel'=>'Cp: 36000 Teléfono: 737658956','completed'=>'complete','remed_date'=>'12/10/2029'),
                            array('name' =>'Omar Martínez10','email'=>'omar-martinez@hotmail.com','cp_tel'=>'Cp: 36000 Teléfono: 737658956','completed'=>'complete','remed_date'=>'12/10/2030'),
                            array('name' =>'Omar Martínez11','email'=>'omar-martinez@hotmail.com','cp_tel'=>'Cp: 36000 Teléfono: 737658956','completed'=>'complete','remed_date'=>'12/10/2031'),
                            array('name' =>'Omar Martínez12','email'=>'omar-martinez@hotmail.com','cp_tel'=>'Cp: 36000 Teléfono: 737658956','completed'=>'complete','remed_date'=>'12/10/2031'),
                            array('name' =>'Omar Martínez13','email'=>'omar-martinez@hotmail.com','cp_tel'=>'Cp: 36000 Teléfono: 737658956','completed'=>'complete','remed_date'=>'12/10/2031'),
                            array('name' =>'Omar Martínez14','email'=>'omar-martinez@hotmail.com','cp_tel'=>'Cp: 36000 Teléfono: 737658956','completed'=>'complete','remed_date'=>'12/10/2031'),
                            array('name' =>'Omar Martínez15','email'=>'omar-martinez@hotmail.com','cp_tel'=>'Cp: 36000 Teléfono: 737658956','completed'=>'complete','remed_date'=>'12/10/2031'),
                            array('name' =>'Omar Martínez16','email'=>'omar-martinez@hotmail.com','cp_tel'=>'Cp: 36000 Teléfono: 737658956','completed'=>'complete','remed_date'=>'12/10/2031'),
                            array('name' =>'Omar Martínez17','email'=>'omar-martinez@hotmail.com','cp_tel'=>'Cp: 36000 Teléfono: 737658956','completed'=>'complete','remed_date'=>'12/10/2031'),
                            array('name' =>'Omar Martínez18','email'=>'omar-martinez@hotmail.com','cp_tel'=>'Cp: 36000 Teléfono: 737658956','completed'=>'complete','remed_date'=>'12/10/2031'),
                            array('name' =>'Omar Martínez19','email'=>'omar-martinez@hotmail.com','cp_tel'=>'Cp: 36000 Teléfono: 737658956','completed'=>'complete','remed_date'=>'12/10/2031'),
                            array('name' =>'Omar Martínez20','email'=>'omar-martinez@hotmail.com','cp_tel'=>'Cp: 36000 Teléfono: 737658956','completed'=>'complete','remed_date'=>'12/10/2031'),
                            array('name' =>'Omar Martínez21','email'=>'omar-martinez@hotmail.com','cp_tel'=>'Cp: 36000 Teléfono: 737658956','completed'=>'complete','remed_date'=>'12/10/2031'),
                    
                        );  

    $this->mpdf->course_information_participants_pears('formatos_imprimir/pears/v1.course_information_participants_pears.php',$data); 
} 

public function agenda_curso_pears() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 

    $data['estudiantes'] = '18';
    $data['instructores'] = '3';
    $data['duracion'] = 'Aproximadamente 9 horas de duración con las pausas';  

    $this->mpdf->agenda_curso_pears('formatos_imprimir/pears/v14.agenda_curso_pears.php',$data); 
} 

public function monitorizacion_pears() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf');
    $fecha_actual = new DateTime('NOW');  
    $data = array(); 

    $data['instructor'] = 'Omar Martínez Martínez'; 
    $data['id_instructor'] = 8990; 
    $data['exp_card_date'] = '10/01/2023';
    $data['course_rev'] = 3;
    $data['course_purpo']=3;
    $data['name_rf']="Carolina Hurtado";
    $data['fecha_actual']=$fecha_actual->format('d/m/Y');
    $data['coordinator']="Blanca Estela Hurtado"; 

    $this->mpdf->monitorizacion_pears('formatos_imprimir/pears/v15.monitorizacion_pears.php',$data); 
} 

public function evaluacion_teorica_pears() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf');
    $fecha_actual = new DateTime('NOW');
    $data = array(); 
    
    $data['fecha']=$fecha_actual->format('d/m/Y');
    $data['nombre'] ='Omar Martínez Torres';
    $data['version']="009"; 

    $this->mpdf->evaluacion_teorica_pears('formatos_imprimir/pears/v38.evaluacion_teorica_pears.php',$data); 
} 

public function evaluacion_teorica_remediacion_pears() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf');
    $fecha_actual = new DateTime('NOW');
    $data = array(); 
    
    $data['fecha']=$fecha_actual->format('d/m/Y');
    $data['nombre'] ='Omar Martínez Torres';
    $data['version']="009";  

    $this->mpdf->evaluacion_teorica_remediacion_pears('formatos_imprimir/pears/v39.evaluacion_teorica_remediacion_pears.php',$data); 
} 

public function constancia_participacion_pears() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $fecha_actual = new DateTime('NOW');
    $data = array();

    //---Variables
    $fecha_actual=$fecha_actual->format('d/m/Y'); 
    $estudiante="Fernando A. Herrera A.";
    $duracion_horas="3 horas";
    $fecha_curso="10 Junio de 2018";
    $ciudad_curso="Guanajuato, Gto";
    $nac="0012";
    $folio="0089";
    $curso="RCP Familiares y Amigos Reanimación Cardiopulmonar de la American Heart Association";

    $parrafo="Por su valiosa participación en el curso <br>".$curso." con una  duración de ".$duracion_horas.".<br>Efectuado el día ".$fecha_curso." <br> en la ciudad de ".$ciudad_curso.".";  
    
    $data['nombre_estudiante'] = $estudiante; 
    $data['duracion_horas'] = $duracion_horas;
    $data['fecha_curso'] = $fecha_curso;
    $data['ciudad_curso']=$ciudad_curso;
    $data['nac']=$nac;
    $data['folio']=$folio;

    $data['parrafo']=$parrafo;  

    $this->mpdf->constancia_participacion_pears('formatos_imprimir/pears/v40.constancia_participacion_pears.php',$data); 
} 

public function Carta_PI_pears() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $fecha_actual = new DateTime('NOW'); 
    $data = array(); 
    //---Variables
    $fecha_actual=$fecha_actual->format('d/m/Y');
    $sede_curso="Guanajuato, Gto.";
    $instructor="Omar Martínez Torres";
    $fecha="12/08/2020";       
    $ciudad_curso="Guanajuato, Gto.";
    $dia1_curso="12";
    $dia2_curso="21";
    $mes_curso="Agosto";
    $folio="0012";
    $director_curso="Omar Martínez Torres";
    
    $data['fecha_actual'] = $fecha_actual; 
    $data['fecha'] = $fecha;
    $data['sede_curso'] = $sede_curso;
    $data['instructor']=$instructor;
    $data['dia1_curso']=$dia1_curso;
    $data['dia2_curso']=$dia2_curso;
    $data['mes_curso']=$mes_curso;
    $data['folio']=$folio;
    $data['director_curso']=$director_curso; 

    $this->mpdf->Carta_PI_pears('formatos_imprimir/pears/v41.Carta_PI_pears.php',$data); 
} 

public function Instructor_Candidate_Aplication_pears() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf');
    $fecha_actual = new DateTime('NOW');
    $data = array();
    
    $Renewal_date_provider='02/06/2020';
    $name_candidate='Omar Martínez Torres'; 
    $address='C. San Antonio #1, col. Villaseca';
    $city='Guanajuato';
    $state='Guanajuato';
    $cp='36000';
    $tel='4735608954';
    $email='ejemplo@hotmail.com'; 
    $id_instructor='0098'; 
    $date_renewal='12/04/2020';
    $tc_name='Ejemplo de TC'; 
    $tc_id='0032';
    $fecha_actual=$fecha_actual->format('d/m/Y');

    $data['Renewal_date_provider'] = $Renewal_date_provider;
    $data['name_candidate'] = $name_candidate;
    $data['address'] =  $address;
    $data['city'] =  $city;
    $data['state'] = $state;
    $data['cp'] =  $cp;
    $data['tel'] =  $tel;
    $data['email'] = $email;
    $data['id_instructor'] = $id_instructor;
    $data['date_renewal'] =  $date_renewal;
    $data['tc_name'] = $tc_name;
    $data['tc_id'] =  $tc_id;
    $data['date'] = $fecha_actual;

    $this->mpdf->Instructor_Candidate_Aplication_pears('formatos_imprimir/pears/v42.Instructor_Candidate_Aplication_pears.php',$data); 
} 

public function Reporte_Director_curso_pears() 
{ 
    $this->load->model('curso');
    $this->load->library('Functions');  
    $this->load->library('Mpdf');
    $fecha_actual = new DateTime('NOW');
    $data = array(); 

    $data['fecha_curso'] = '02/06/2020';
    $data['sede_curso'] = 'Guanajuato, Gto';
    $data['lugar_curso'] = 'C. Guanajuato, Gto';
    $data['instructores'] = array(
                                array('name' =>'Omar Martínez Martínez1dqdqw dfeqfwef fwefew', 
                                       'residencia'=>'Guanajuato, Gto',
                                       'especidalidad'=>'Cardiopulmonar ddewdewdew',
                                       'cargo'=>'Director de hospital'
                                ),
                                array('name' =>'Omar Martínez Martínez2', 
                                       'residencia'=>'Silao, Gto',
                                       'especidalidad'=>'Pediatria',
                                       'cargo'=>'Medico de hospital'
                                ),
                    
                            );
    $data['Proveedores_capacitar']=12;
    $data['Proveedores_capacitados']=10;
    $data['capa_gineco']=6;
    $data['capa_generales']=2;
    $data['capa_urgen']=3;
    $data['capa_enferm']=4;
    $data['capa_intern']=5;
    $data['capa_inten']=1;
    $data['capa_anes']=7;
    $data['capa_tum']=8;
    $data['capa_tem']=9;

    $data['provee_apro_tteorico']=86;
    $data['provee_aprob_pteorico']='95%';
    $data['provee_apro_tpractico']=79;
    $data['provee_aprob_ppractico']='80%';

    $data['provee_repro_tteorico']=3;
    $data['provee_reprob_pteorico']='4%';
    $data['provee_repro_tpractico']=10;
    $data['provee_reprob_ppractico']='15%';

    $data['candidatos_inst'] = array(
                                array('name' =>'Omar Martínez Martínez1', 
                                       'puntajet'=>'90%',
                                       'puntajep'=>'80%'                                     
                                ),
                                array('name' =>'Omar Martínez Martínez2', 
                                       'puntajet'=>'90%',
                                       'puntajep'=>'80%'                                     
                                ),
                               
                               
                            );    

    $data['aulas']=0;
    $data['aulas_obs']="Podrian mejorara";
    $data['proy']=0;
    $data['proy_obs']="Podrian mejorarp";
    $data['seña']=0;
    $data['seña_obs']="Podrian mejorars";
    $data['venti']=0;
    $data['venti_obs']="Podrian mejorarv";
    
    $data['compu_c']=1;
    $data['compu_f']=1;

    $data['pape']=1;    
    $data['manual_ent']=0;

    $data['nemo']=1;
    $data['nemo_falt']=25;

    $data['ponencias'] = array(
                                array('nombre' =>'ponencia numero1', 
                                       'apegado'=>1,
                                       'calidad'=>1                                     
                                ),
                                array('nombre' =>'ponencia numero2', 
                                       'apegado'=>0,
                                       'calidad'=>0                                     
                                ),
                                array('nombre' =>'ponencia numero3', 
                                       'apegado'=>1,
                                       'calidad'=>2                                     
                                ),
                                array('nombre' =>'ponencia numero1', 
                                       'apegado'=>1,
                                       'calidad'=>1                                     
                                ),
                                array('nombre' =>'ponencia numero2', 
                                       'apegado'=>0,
                                       'calidad'=>0                                     
                                ),
                                array('nombre' =>'ponencia numero3 fewfwefew fwefewf fwefwefewfe', 
                                       'apegado'=>1,
                                       'calidad'=>2                                     
                                ),
                                array('nombre' =>'ponencia numero1', 
                                       'apegado'=>1,
                                       'calidad'=>1                                     
                                ),
                                array('nombre' =>'ponencia numero2', 
                                       'apegado'=>0,
                                       'calidad'=>0                                     
                                ),
                                array('nombre' =>'ponencia numero3', 
                                       'apegado'=>1,
                                       'calidad'=>2                                     
                                ),
                          
                            );
    $data['obs_ponen']="Aqui van las observaciones de las ponencias, aqui van las observaciones de las ponencias";
    $data['mat_taller'] = array(
                                array('nombre' =>'taller numero1', 
                                       'completo'=>1,
                                       'faltante'=>'todo muy bien'                                     
                                ),
                                array('nombre' =>'taller numero2', 
                                       'completo'=>0,
                                       'faltante'=>'Falto material'                                  
                                ),
                                array('nombre' =>'taller numero3', 
                                       'completo'=>1,
                                       'faltante'=>'todo muy bien taller 3'                                    
                                ),
                          
                            );
    $data['coffee']=2;
    $data['comida']=2;
    $data['hotel']=2;
    $data['viaticos']=array(
                                array('nombre' =>'instructor numero1', 
                                       'viaticos'=>1,                                     
                                ),
                                array('nombre' =>'instructor numero2', 
                                       'viaticos'=>0,                                  
                                ),
                                array('nombre' =>'instructor numero3', 
                                       'viaticos'=>2,                                    
                                ),

                          
                            );
    $data['lugar_inst']='Guanajuato, Gto capital';
    $data['fecha_inst']='13/10/2020';
    $data['hora_inst']='09:00 am';
    $data['concepto']=array(1,0,1,1,1,0,0,1);
    $data['comentarios']='Aquí van los comentarios de la reunion de los instructores';
    $data['des_curso']='Aquí el desarrollo del curso';

    $data['dir_curso']='Blanca Estela Hurtado';
    $data['dir_esp']='Medico general con Especialidad en Cardiopulmonar';
    $data['fecha_actual']=$fecha_actual->format('d/m/Y'); 

    $data['controller'] = $this->functions; 

    $this->mpdf->Reporte_Director_curso_pears('formatos_imprimir/pears/v45.Reporte_Director_curso_pears.php',$data); 
} 

public function ejemplo_reporte_logistica_pears() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->ejemplo_reporte_logistica_pears('formatos_imprimir/pears/v46.ejemplo_reporte_logistica_pears.php',$data); 
} 


    /*-------------------------------------------------------------------------------------
    ----------------------------------------Reportes PHTLS---------------------------------*/


public function course_information_phtls() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 

    $data['tam_reg_tabla']=14;
    $data['curso_nacional'] = "009";
    $data['fecha_curso'] = "15/09/2020";
    $data['coordinador_curso'] = "Omar Martínez Torres";
    $data['Localidad'] = "Guanajuato, Gto. Cp 36000, México";
    $data['facultad_afiliada'] = "Descripcion de la facultad";
    $data['curso1'] = "X";
    $data['curso2'] = "";
    $data['curso3'] = "";
    $data['curso4'] = "";
    $data['curso5'] = "";
    $data['instructores']=array(
                            array('nombre' => "Omar Martínez Torres", 
                                  'correo'=>'omar-martinez@hotmail.com',
                                  'direccion'=>'C.Principal, Villaseca, Guanajuato, Gto',
                                  'tel'=>'4737896546',
                                  'reconocidos'=>'X',
                                  'reconocidon'=>'X',
                                  'monitoreado'=>'si',
                            ),
                        ); 

    $this->mpdf->course_information_phtls('formatos_imprimir/phtls/v1.course_information_phtls.php',$data); 
} 

public function course_participants_phtls() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf');
    $this->load->library('Functions');
    $data = array(); 

    $data['tam_reg_tabla']=18;
    $data['curso_nacional'] = "009";
    $data['fecha_curso'] = "15/09/2020";
    $data['coordinador_curso'] = "Omar Martínez Torres";
    $data['Localidad'] = "Guanajuato, Gto. Cp 36000, México";
    $data['facultad_afiliada'] = "Descripcion de la facultad";
    $data['tipo_curso'] = 3;
   
    $data['participantes']=array(
                            array('nombre' => "Omar Martínez Torres", 
                                  'direccion'=>'C.Principal, Villaseca, Guanajuato, Gto, 36000',
                                  'tel'=>'4737896546',                             
                                  'miembro'=>'si',
                                  'nivel'=>2,
                                  'escrito'=>10,
                                  'estacion_final'=>3,
                                  'aprueba'=> $this->functions->aprobado_noaprobado(1),
                            ),
                            array('nombre' => "Omar Martínez Torres", 
                                  'direccion'=>'C.Principal, Villaseca, Guanajuato, Gto, 36000',
                                  'tel'=>'4737896546',                             
                                  'miembro'=>'si',
                                  'nivel'=>2,
                                  'escrito'=>10,
                                  'estacion_final'=>3,
                                  'aprueba'=> $this->functions->aprobado_noaprobado(1),
                            ),
                            array('nombre' => "Omar Martínez Torres", 
                                  'direccion'=>'C.Principal, Villaseca, Guanajuato, Gto, 36000',
                                  'tel'=>'4737896546',                             
                                  'miembro'=>'si',
                                  'nivel'=>2,
                                  'escrito'=>10,
                                  'estacion_final'=>3,
                                  'aprueba'=> $this->functions->aprobado_noaprobado(1),
                            ),                   
                            array('nombre' => "Omar Martínez Torres", 
                                  'direccion'=>'C.Principal, Villaseca, Guanajuato, Gto, 36000',
                                  'tel'=>'4737896546',                             
                                  'miembro'=>'si',
                                  'nivel'=>2,
                                  'escrito'=>10,
                                  'estacion_final'=>3,
                                  'aprueba'=> $this->functions->aprobado_noaprobado(1),
                            ),
                            array('nombre' => "Omar Martínez Torres", 
                                  'direccion'=>'C.Principal, Villaseca, Guanajuato, Gto, 36000',
                                  'tel'=>'4737896546',                             
                                  'miembro'=>'si',
                                  'nivel'=>2,
                                  'escrito'=>10,
                                  'estacion_final'=>3,
                                  'aprueba'=> $this->functions->aprobado_noaprobado(1),
                            ),
                            array('nombre' => "Omar Martínez Torres", 
                                  'direccion'=>'C.Principal, Villaseca, Guanajuato, Gto, 36000',
                                  'tel'=>'4737896546',                             
                                  'miembro'=>'si',
                                  'nivel'=>2,
                                  'escrito'=>10,
                                  'estacion_final'=>3,
                                  'aprueba'=> $this->functions->aprobado_noaprobado(1),
                            ),
                            array('nombre' => "Omar Martínez Torres", 
                                  'direccion'=>'C.Principal, Villaseca, Guanajuato, Gto, 36000',
                                  'tel'=>'4737896546',                             
                                  'miembro'=>'si',
                                  'nivel'=>2,
                                  'escrito'=>10,
                                  'estacion_final'=>3,
                                  'aprueba'=> $this->functions->aprobado_noaprobado(1),
                            ),
                            array('nombre' => "Omar Martínez Torres", 
                                  'direccion'=>'C.Principal, Villaseca, Guanajuato, Gto, 36000',
                                  'tel'=>'4737896546',                             
                                  'miembro'=>'si',
                                  'nivel'=>2,
                                  'escrito'=>10,
                                  'estacion_final'=>3,
                                  'aprueba'=> $this->functions->aprobado_noaprobado(1),
                            ),
                            array('nombre' => "Omar Martínez Torres", 
                                  'direccion'=>'C.Principal, Villaseca, Guanajuato, Gto, 36000',
                                  'tel'=>'4737896546',                             
                                  'miembro'=>'si',
                                  'nivel'=>2,
                                  'escrito'=>10,
                                  'estacion_final'=>3,
                                  'aprueba'=> $this->functions->aprobado_noaprobado(1),
                            ),
                            array('nombre' => "Omar Martínez Torres", 
                                  'direccion'=>'C.Principal, Villaseca, Guanajuato, Gto, 36000',
                                  'tel'=>'4737896546',                             
                                  'miembro'=>'si',
                                  'nivel'=>2,
                                  'escrito'=>10,
                                  'estacion_final'=>3,
                                  'aprueba'=> $this->functions->aprobado_noaprobado(1),
                            ),
                            array('nombre' => "Omar Martínez Torres", 
                                  'direccion'=>'C.Principal, Villaseca, Guanajuato, Gto, 36000',
                                  'tel'=>'4737896546',                             
                                  'miembro'=>'si',
                                  'nivel'=>2,
                                  'escrito'=>10,
                                  'estacion_final'=>3,
                                  'aprueba'=> $this->functions->aprobado_noaprobado(1),
                            ),
                            array('nombre' => "Omar Martínez Torres", 
                                  'direccion'=>'C.Principal, Villaseca, Guanajuato, Gto, 36000',
                                  'tel'=>'4737896546',                             
                                  'miembro'=>'si',
                                  'nivel'=>2,
                                  'escrito'=>10,
                                  'estacion_final'=>3,
                                  'aprueba'=> $this->functions->aprobado_noaprobado(1),
                            ),
                            array('nombre' => "Omar Martínez Torres", 
                                  'direccion'=>'C.Principal, Villaseca, Guanajuato, Gto, 36000',
                                  'tel'=>'4737896546',                             
                                  'miembro'=>'si',
                                  'nivel'=>2,
                                  'escrito'=>10,
                                  'estacion_final'=>3,
                                  'aprueba'=> $this->functions->aprobado_noaprobado(1),
                            ),
                            array('nombre' => "Omar Martínez Torres", 
                                  'direccion'=>'C.Principal, Villaseca, Guanajuato, Gto, 36000',
                                  'tel'=>'4737896546',                             
                                  'miembro'=>'si',
                                  'nivel'=>2,
                                  'escrito'=>10,
                                  'estacion_final'=>3,
                                  'aprueba'=> $this->functions->aprobado_noaprobado(1),
                            ),
                            array('nombre' => "Omar Martínez Torres", 
                                  'direccion'=>'C.Principal, Villaseca, Guanajuato, Gto, 36000',
                                  'tel'=>'4737896546',                             
                                  'miembro'=>'si',
                                  'nivel'=>2,
                                  'escrito'=>10,
                                  'estacion_final'=>3,
                                  'aprueba'=> $this->functions->aprobado_noaprobado(1),
                            ),
                            array('nombre' => "Omar Martínez Torres", 
                                  'direccion'=>'C.Principal, Villaseca, Guanajuato, Gto, 36000',
                                  'tel'=>'4737896546',                             
                                  'miembro'=>'si',
                                  'nivel'=>2,
                                  'escrito'=>10,
                                  'estacion_final'=>3,
                                  'aprueba'=> $this->functions->aprobado_noaprobado(1),
                            ),
                            array('nombre' => "Omar Martínez Torres", 
                                  'direccion'=>'C.Principal, Villaseca, Guanajuato, Gto, 36000',
                                  'tel'=>'4737896546',                             
                                  'miembro'=>'si',
                                  'nivel'=>2,
                                  'escrito'=>10,
                                  'estacion_final'=>3,
                                  'aprueba'=> $this->functions->aprobado_noaprobado(1),
                            ),
                            array('nombre' => "Omar Martínez Torres", 
                                  'direccion'=>'C.Principal, Villaseca, Guanajuato, Gto, 36000',
                                  'tel'=>'4737896546',                             
                                  'miembro'=>'si',
                                  'nivel'=>2,
                                  'escrito'=>10,
                                  'estacion_final'=>3,
                                  'aprueba'=> $this->functions->aprobado_noaprobado(1),
                            ),
                            array('nombre' => "Omar Martínez Torres", 
                                  'direccion'=>'C.Principal, Villaseca, Guanajuato, Gto, 36000',
                                  'tel'=>'4737896546',                             
                                  'miembro'=>'si',
                                  'nivel'=>2,
                                  'escrito'=>10,
                                  'estacion_final'=>3,
                                  'aprueba'=> $this->functions->aprobado_noaprobado(1),
                            ),
                            array('nombre' => "Omar Martínez Torres", 
                                  'direccion'=>'C.Principal, Villaseca, Guanajuato, Gto, 36000',
                                  'tel'=>'4737896546',                             
                                  'miembro'=>'si',
                                  'nivel'=>2,
                                  'escrito'=>10,
                                  'estacion_final'=>3,
                                  'aprueba'=> $this->functions->aprobado_noaprobado(1),
                            ),                            

                        ); 

    $this->mpdf->course_participants_phtls('formatos_imprimir/phtls/v2.course_participants_phtls.php',$data); 
} 

public function agenda_phtls() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 

    $this->mpdf->agenda_phtls('formatos_imprimir/phtls/v13.agenda_phtls.php',$data); 
} 

public function hoja_monitorizacion_phtls() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf');
    $fecha_actual = new DateTime('NOW');
    $data = array();

    $data['name_candidate'] = 'Omar Martínez Torres'; 
    $data['address'] =  'C. San Antonio #1, col. Villaseca';
    $data['city'] =  'Guanajuato';
    $data['state'] = 'Guanajuato';
    $data['cp'] =  '36000';
    $data['tel'] =  '4735608954';
    $data['email'] = 'ejemplo@hotmail.com';
    $data['facultad']="Aqui va la facultad";
    $data['date_moni']="10/02/2021";
    $data['program_moni']=5;
    $data['no_provider']=3212131;
    $data['date_provider']='12/10/2020';
    $data['no_monito']=68768;
    $data['date_monito']='12/10/2020';
    $data['comments_lecture']='xxxxxxxxxxxx xxxxxxxxxxxxxxx xxxxxxxxxxxxxxxxxxxxxx xxxxxxxx xxxxxxxx xxxxxxxxxx xxxxxxxxxx xxxxxxxxxxxx';
    $data['appro']="X";
    $data['remoni']="X";
    $data['date'] = $fecha_actual->format('d/m/Y');  

    $this->mpdf->hoja_monitorizacion_phtls('formatos_imprimir/phtls/v14.hoja_monitorizacion_phtls.php',$data); 
} 

public function valores_iniciales_caso_1_phtls() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf');
    $fecha_actual = new DateTime('NOW');  
    $data = array();

    $data['lider']="Omaru Martínez";
    $data['instructor']="Omar Martínez";
    $data['date'] = $fecha_actual->format('d/m/Y');

    $this->mpdf->valores_iniciales_caso_1_phtls('formatos_imprimir/phtls/v20.valores_iniciales_caso_1_phtls.php',$data); 
} 

public function valores_iniciales_caso_2_phtls() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf');
    $fecha_actual = new DateTime('NOW');  
    $data = array();

    $data['lider']="Omaru Martínez";
    $data['instructor']="Omar Martínez";
    $data['date'] = $fecha_actual->format('d/m/Y'); 

    $this->mpdf->valores_iniciales_caso_2_phtls('formatos_imprimir/phtls/v21.valores_iniciales_caso_2_phtls.php',$data); 
} 

public function estacion_evaluacion_final_caso_1A_phtls() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf');
    $fecha_actual = new DateTime('NOW');  
    $data = array();

    $data['lider']="Omaru Martínez";
    $data['instructor']="Omar Martínez";
    $data['date'] = $fecha_actual->format('d/m/Y'); 

    $this->mpdf->estacion_evaluacion_final_caso_1A_phtls('formatos_imprimir/phtls/v22.estacion_evaluacion_final_caso_1A_phtls.php',$data); 
} 

public function estacion_evaluacion_final_caso_1B_phtls() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf');
    $fecha_actual = new DateTime('NOW');  
    $data = array();

    $data['lider']="Omaru Martínez";
    $data['instructor']="Omar Martínez";
    $data['date'] = $fecha_actual->format('d/m/Y'); 

    $this->mpdf->estacion_evaluacion_final_caso_1B_phtls('formatos_imprimir/phtls/v23.estacion_evaluacion_final_caso_1B_phtls.php',$data); 
} 

public function estacion_evaluacion_final_caso_2A_phtls() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf');
    $fecha_actual = new DateTime('NOW');  
    $data = array();

    $data['lider']="Omaru Martínez";
    $data['instructor']="Omar Martínez";
    $data['date'] = $fecha_actual->format('d/m/Y'); 

    $this->mpdf->estacion_evaluacion_final_caso_2A_phtls('formatos_imprimir/phtls/v24.estacion_evaluacion_final_caso_2A_phtls.php',$data); 
} 

public function estacion_evaluacion_final_caso_2B_phtls() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf');
    $fecha_actual = new DateTime('NOW');  
    $data = array();

    $data['lider']="Omaru Martínez";
    $data['instructor']="Omar Martínez";
    $data['date'] = $fecha_actual->format('d/m/Y'); 

    $this->mpdf->estacion_evaluacion_final_caso_2B_phtls('formatos_imprimir/phtls/v25.estacion_evaluacion_final_caso_2B_phtls.php',$data); 
} 

public function estacion_evaluacion_final_caso_3A_phtls() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf');
    $fecha_actual = new DateTime('NOW');  
    $data = array();

    $data['lider']="Omaru Martínez";
    $data['instructor']="Omar Martínez";
    $data['date'] = $fecha_actual->format('d/m/Y'); 

    $this->mpdf->estacion_evaluacion_final_caso_3A_phtls('formatos_imprimir/phtls/v26.estacion_evaluacion_final_caso_3A_phtls.php',$data); 
} 

public function estacion_evaluacion_final_caso_3B_phtls() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf');
    $fecha_actual = new DateTime('NOW');  
    $data = array();

    $data['lider']="Omaru Martínez";
    $data['instructor']="Omar Martínez";
    $data['date'] = $fecha_actual->format('d/m/Y'); 

    $this->mpdf->estacion_evaluacion_final_caso_3B_phtls('formatos_imprimir/phtls/v27.estacion_evaluacion_final_caso_3B_phtls.php',$data); 
} 

public function check_liste_evaluacion_practica_phtls() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 

    $this->mpdf->check_liste_evaluacion_practica_phtls('formatos_imprimir/phtls/v28.check_liste_evaluacion_practica_phtls.php',$data); 
} 

public function Pos_evaluacion_teorica_phtls() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf');
    $fecha_actual = new DateTime('NOW'); 

    $data = array(); 
    $data['date'] = $fecha_actual->format('d/m/Y');
    $data['name'] = 'Omar Martínez Torres'; 
    $data['number_course'] = '0093'; 
    $data['test_v'] = '4'; 

    $this->mpdf->Pos_evaluacion_teorica_phtls('formatos_imprimir/phtls/v29.Pos_evaluacion_teorica_phtls.php',$data); 
} 

public function hoja_respuestas_teorica_phtls() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $fecha_actual = new DateTime('NOW'); 
     
    $data = array(); 
    $data['date'] = $fecha_actual->format('d/m/Y');
    $data['name'] = 'Omar Martínez Torres'; 
    $data['number_course'] = '0093'; 

    $this->mpdf->hoja_respuestas_teorica_phtls('formatos_imprimir/phtls/v30.hoja_respuestas_teorica_phtls.php',$data); 
} 

public function constancia_participacion_phtls() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 

    $data['nombre'] = 'Edgar Escamilla Sanchez'; 
    $data['curso'] = 'Prehospital Trauma Life Support - 9th Edition Provider course'; 
    $data['number_course'] = 'PH-19-12330-04';
    $data['coordinator']="Orlando Bustamante";
    $data['iss_date']="24-Nov-2019";
    $data['exp_date']="11/2023";
    $data['dir_course']="Jesus Noguez Vega"; 

    $this->mpdf->constancia_participacion_phtls('formatos_imprimir/phtls/v31.constancia_participacion_phtls.php',$data); 
} 

public function carta_PI_phtls() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf');
    $fecha_actual = new DateTime('NOW'); 
    $data = array(); 
    //---Variables
    $fecha_actual=$fecha_actual->format('d/m/Y');
    $sede_curso="Guanajuato, Gto.";
    $instructor="Omar Martínez Torres";
    $fecha="12/08/2020";       
    $ciudad_curso="Guanajuato, Gto.";
    $dia1_curso="12";
    $dia2_curso="21";
    $mes_curso="Agosto";
    $folio="0012";
    $director_curso="Omar Martínez Torres";
    
    $data['fecha_actual'] = $fecha_actual; 
    $data['fecha'] = $fecha;
    $data['sede_curso'] = $sede_curso;
    $data['instructor']=$instructor;
    $data['dia1_curso']=$dia1_curso;
    $data['dia2_curso']=$dia2_curso;
    $data['mes_curso']=$mes_curso;
    $data['folio']=$folio;
    $data['director_curso']=$director_curso; 
     

    $this->mpdf->carta_PI_phtls('formatos_imprimir/phtls/v32.carta_PI_phtls.php',$data); 
} 

public function Reporte_Director_curso_phtls() 
{ 
    $this->load->model('curso');
    $this->load->library('Functions');  
    $this->load->library('Mpdf');
    $fecha_actual = new DateTime('NOW');
    $data = array(); 

    $data['fecha_curso'] = '02/06/2020';
    $data['sede_curso'] = 'Guanajuato, Gto';
    $data['lugar_curso'] = 'C. Guanajuato, Gto';
    $data['instructores'] = array(
                                array('name' =>'Omar Martínez Martínez1dqdqw dfeqfwef fwefew', 
                                       'residencia'=>'Guanajuato, Gto',
                                       'especidalidad'=>'Cardiopulmonar ddewdewdew',
                                       'cargo'=>'Director de hospital'
                                ),
                                array('name' =>'Omar Martínez Martínez2', 
                                       'residencia'=>'Silao, Gto',
                                       'especidalidad'=>'Pediatria',
                                       'cargo'=>'Medico de hospital'
                                ),
                    
                            );
    $data['Proveedores_capacitar']=12;
    $data['Proveedores_capacitados']=10;
    $data['capa_gineco']=6;
    $data['capa_generales']=2;
    $data['capa_urgen']=3;
    $data['capa_enferm']=4;
    $data['capa_intern']=5;
    $data['capa_inten']=1;
    $data['capa_anes']=7;
    $data['capa_tum']=8;
    $data['capa_tem']=9;

    $data['provee_apro_tteorico']=86;
    $data['provee_aprob_pteorico']='95%';
    $data['provee_apro_tpractico']=79;
    $data['provee_aprob_ppractico']='80%';

    $data['provee_repro_tteorico']=3;
    $data['provee_reprob_pteorico']='4%';
    $data['provee_repro_tpractico']=10;
    $data['provee_reprob_ppractico']='15%';

    $data['candidatos_inst'] = array(
                                array('name' =>'Omar Martínez Martínez1', 
                                       'puntajet'=>'90%',
                                       'puntajep'=>'80%'                                     
                                ),
                                array('name' =>'Omar Martínez Martínez2', 
                                       'puntajet'=>'90%',
                                       'puntajep'=>'80%'                                     
                                ),
                               
                               
                            );    

    $data['aulas']=0;
    $data['aulas_obs']="Podrian mejorara";
    $data['proy']=0;
    $data['proy_obs']="Podrian mejorarp";
    $data['seña']=0;
    $data['seña_obs']="Podrian mejorars";
    $data['venti']=0;
    $data['venti_obs']="Podrian mejorarv";
    
    $data['compu_c']=1;
    $data['compu_f']=1;

    $data['pape']=1;    
    $data['manual_ent']=0;

    $data['nemo']=1;
    $data['nemo_falt']=25;

    $data['ponencias'] = array(
                                array('nombre' =>'ponencia numero1', 
                                       'apegado'=>1,
                                       'calidad'=>1                                     
                                ),
                                array('nombre' =>'ponencia numero2', 
                                       'apegado'=>0,
                                       'calidad'=>0                                     
                                ),
                                array('nombre' =>'ponencia numero3', 
                                       'apegado'=>1,
                                       'calidad'=>2                                     
                                ),
                                array('nombre' =>'ponencia numero1', 
                                       'apegado'=>1,
                                       'calidad'=>1                                     
                                ),
                                array('nombre' =>'ponencia numero2', 
                                       'apegado'=>0,
                                       'calidad'=>0                                     
                                ),
                                array('nombre' =>'ponencia numero3 fewfwefew fwefewf fwefwefewfe', 
                                       'apegado'=>1,
                                       'calidad'=>2                                     
                                ),
                                array('nombre' =>'ponencia numero1', 
                                       'apegado'=>1,
                                       'calidad'=>1                                     
                                ),
                                array('nombre' =>'ponencia numero2', 
                                       'apegado'=>0,
                                       'calidad'=>0                                     
                                ),
                                array('nombre' =>'ponencia numero3', 
                                       'apegado'=>1,
                                       'calidad'=>2                                     
                                ),
                          
                            );
    $data['obs_ponen']="Aqui van las observaciones de las ponencias, aqui van las observaciones de las ponencias";
    $data['mat_taller'] = array(
                                array('nombre' =>'taller numero1', 
                                       'completo'=>1,
                                       'faltante'=>'todo muy bien'                                     
                                ),
                                array('nombre' =>'taller numero2', 
                                       'completo'=>0,
                                       'faltante'=>'Falto material'                                  
                                ),
                                array('nombre' =>'taller numero3', 
                                       'completo'=>1,
                                       'faltante'=>'todo muy bien taller 3'                                    
                                ),
                          
                            );
    $data['coffee']=2;
    $data['comida']=2;
    $data['hotel']=2;
    $data['viaticos']=array(
                                array('nombre' =>'instructor numero1', 
                                       'viaticos'=>1,                                     
                                ),
                                array('nombre' =>'instructor numero2', 
                                       'viaticos'=>0,                                  
                                ),
                                array('nombre' =>'instructor numero3', 
                                       'viaticos'=>2,                                    
                                ),

                          
                            );
    $data['lugar_inst']='Guanajuato, Gto capital';
    $data['fecha_inst']='13/10/2020';
    $data['hora_inst']='09:00 am';
    $data['concepto']=array(1,0,1,1,1,0,0,1);
    $data['comentarios']='Aquí van los comentarios de la reunion de los instructores';
    $data['des_curso']='Aquí el desarrollo del curso';

    $data['dir_curso']='Blanca Estela Hurtado';
    $data['dir_esp']='Medico general con Especialidad en Cardiopulmonar';
    $data['fecha_actual']=$fecha_actual->format('d/m/Y'); 

    $data['controller'] = $this->functions; 

    $this->mpdf->Reporte_Director_curso_phtls('formatos_imprimir/phtls/v35.Reporte_Director_curso_phtls.php',$data); 
} 

public function ejemplo_reporte_logistica_phtls() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->ejemplo_reporte_logistica_phtls('formatos_imprimir/phtls/v36.ejemplo_reporte_logistica_phtls.php',$data); 
} 


    /*-------------------------------------------------------------------------------------
    ----------------------------------------Reportes SONO---------------------------------*/

public function registro_instructores_PACE_SONO_sono() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf');
    $fecha_actual = new DateTime('NOW');
    $data = array();

    $coordinator="Omar Martínez Torres";
    $dir_medico="Omar Martínez Torres";
    $center_enter="Centro de Salud de Guanajuato";
    $site_cap="Centro de Salud de Guanajuato";
    $nombre_sede="Also";
    $date_ini_curse="10/09/2020";
    $time_ini_curse="09:00 a. m.";
    $students="30";
    $date_fin_curse="10/09/2020";
    $time_fin_curse="05:00 p. m.";
    $time_inst="1";
    $cards="10";
    $instructores=array(
        array('name' =>'Omar Martínez1','vencimiento'=>'12/10/2021'),
        array('name' =>'Omar Martínez2','vencimiento'=>'12/10/2022'),
        array('name' =>'Omar Martínez3','vencimiento'=>'12/10/2023'),
        array('name' =>'Omar Martínez4','vencimiento'=>'12/10/2024'),
        array('name' =>'Omar Martínez5','vencimiento'=>'12/10/2025'),
        array('name' =>'Omar Martínez6','vencimiento'=>'12/10/2026'),
        array('name' =>'Omar Martínez7','vencimiento'=>'12/10/2027'),
        array('name' =>'Omar Martínez8','vencimiento'=>'12/10/2028'),
        array('name' =>'Omar Martínez9','vencimiento'=>'12/10/2029'),
        array('name' =>'Omar Martínez10','vencimiento'=>'12/10/2030'),
        array('name' =>'Omar Martínez11','vencimiento'=>'12/10/2031'),
    );
    $date=$fecha_actual->format('d/m/Y'); 
    $folio="329"; 

    $data['coordinator'] = $coordinator;
    $data['dir_medico'] = $dir_medico;
    $data['center_enter'] = $center_enter;
    $data['site_cap'] = $site_cap;
    $data['nombre_sede'] = $nombre_sede;
    $data['date_ini_curse'] =$date_ini_curse;
    $data['time_ini_curse'] =$time_ini_curse;
    $data['students'] = $students;
    $data['date_fin_curse'] =$date_fin_curse;
    $data['time_fin_curse'] =$time_fin_curse;
    $data['time_inst'] = $time_inst;
    $data['cards'] = $cards;
    $data['instructores'] =$instructores;
    $data['date'] = $date;

    $this->mpdf->registro_instructores_PACE_SONO_sono('formatos_imprimir/sono/v1.registro_instructores_PACE_SONO_sono.php',$data); 
} 

public function registro_participantes_PACE_SONO_sono() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf');
    $this->load->library('Functions'); 
    $data = array(); 

    $data['tam_reg_tabla']=10;
    $data['participantes'] = array(
                                    array(
                                        'nombre' => 'Omar Martínez Martínez',
                                        'correo' => 'omar@gmail.com',
                                        'escrito'=> 85,
                                        'practico'=> 90,
                                        'aprueba'=> $this->functions->aprobado_noaprobado(1),
                                        'pi'=> 90,
                                        ),
                                    array(
                                        'nombre' => 'Omar Martínez Martínez',
                                        'correo' => 'omar@gmail.com',
                                        'escrito'=> 85,
                                        'practico'=> 90,
                                        'aprueba'=> $this->functions->aprobado_noaprobado(1),
                                        'pi'=> 90,
                                        ),
                                    array(
                                        'nombre' => 'Omar Martínez Martínez',
                                        'correo' => 'omar@gmail.com',
                                        'escrito'=> 85,
                                        'practico'=> 90,
                                        'aprueba'=> $this->functions->aprobado_noaprobado(1),
                                        'pi'=> 90,
                                        ),
                                    array(
                                        'nombre' => 'Omar Martínez Martínez',
                                        'correo' => 'omar@gmail.com',
                                        'escrito'=> 85,
                                        'practico'=> 90,
                                        'aprueba'=> $this->functions->aprobado_noaprobado(1),
                                        'pi'=> 90,
                                        ),
                                    array(
                                        'nombre' => 'Omar Martínez Martínez',
                                        'correo' => 'omar@gmail.com',
                                        'escrito'=> 85,
                                        'practico'=> 90,
                                        'aprueba'=> $this->functions->aprobado_noaprobado(1),
                                        'pi'=> 90,
                                        ),
                                    array(
                                        'nombre' => 'Omar Martínez Martínez',
                                        'correo' => 'omar@gmail.com',
                                        'escrito'=> 85,
                                        'practico'=> 90,
                                        'aprueba'=> $this->functions->aprobado_noaprobado(1),
                                        'pi'=> 90,
                                        ),
                                    array(
                                        'nombre' => 'Omar Martínez Martínez',
                                        'correo' => 'omar@gmail.com',
                                        'escrito'=> 85,
                                        'practico'=> 90,
                                        'aprueba'=> $this->functions->aprobado_noaprobado(1),
                                        'pi'=> 90,
                                        ),
                                    array(
                                        'nombre' => 'Omar Martínez Martínez',
                                        'correo' => 'omar@gmail.com',
                                        'escrito'=> 85,
                                        'practico'=> 90,
                                        'aprueba'=> $this->functions->aprobado_noaprobado(1),
                                        'pi'=> 90,
                                        ),
                                    array(
                                        'nombre' => 'Omar Martínez Martínez',
                                        'correo' => 'omar@gmail.com',
                                        'escrito'=> 85,
                                        'practico'=> 90,
                                        'aprueba'=> $this->functions->aprobado_noaprobado(1),
                                        'pi'=> 90,
                                        ),
                                    array(
                                        'nombre' => 'Omar Martínez Martínez',
                                        'correo' => 'omar@gmail.com',
                                        'escrito'=> 85,
                                        'practico'=> 90,
                                        'aprueba'=> $this->functions->aprobado_noaprobado(1),
                                        'pi'=> 90,
                                        ),
                                    array(
                                        'nombre' => 'Omar Martínez Martínez',
                                        'correo' => 'omar@gmail.com',
                                        'escrito'=> 85,
                                        'practico'=> 90,
                                        'aprueba'=> $this->functions->aprobado_noaprobado(1),
                                        'pi'=> 90,
                                        ),
                                    array(
                                        'nombre' => 'Omar Martínez Martínez',
                                        'correo' => 'omar@gmail.com',
                                        'escrito'=> 85,
                                        'practico'=> 90,
                                        'aprueba'=> $this->functions->aprobado_noaprobado(1),
                                        'pi'=> 90,
                                        ),
                                    array(
                                        'nombre' => 'Omar Martínez Martínez',
                                        'correo' => 'omar@gmail.com',
                                        'escrito'=> 85,
                                        'practico'=> 90,
                                        'aprueba'=> $this->functions->aprobado_noaprobado(1),
                                        'pi'=> 90,
                                        ),
                                    array(
                                        'nombre' => 'Omar Martínez Martínez',
                                        'correo' => 'omar@gmail.com',
                                        'escrito'=> 85,
                                        'practico'=> 90,
                                        'aprueba'=> $this->functions->aprobado_noaprobado(1),
                                        'pi'=> 90,
                                        ),
                                    array(
                                        'nombre' => 'Omar Martínez Martínez',
                                        'correo' => 'omar@gmail.com',
                                        'escrito'=> 85,
                                        'practico'=> 90,
                                        'aprueba'=> $this->functions->aprobado_noaprobado(1),
                                        'pi'=> 90,
                                        ),
                                    array(
                                        'nombre' => 'Omar Martínez Martínez',
                                        'correo' => 'omar@gmail.com',
                                        'escrito'=> 85,
                                        'practico'=> 90,
                                        'aprueba'=> $this->functions->aprobado_noaprobado(1),
                                        'pi'=> 90,
                                        ),
                                    array(
                                        'nombre' => 'Omar Martínez Martínez',
                                        'correo' => 'omar@gmail.com',
                                        'escrito'=> 85,
                                        'practico'=> 90,
                                        'aprueba'=> $this->functions->aprobado_noaprobado(1),
                                        'pi'=> 90,
                                        ),
                                    array(
                                        'nombre' => 'Omar Martínez Martínez',
                                        'correo' => 'omar@gmail.com',
                                        'escrito'=> 85,
                                        'practico'=> 90,
                                        'aprueba'=> $this->functions->aprobado_noaprobado(1),
                                        'pi'=> 90,
                                        ),
                                    array(
                                        'nombre' => 'Omar Martínez Martínez',
                                        'correo' => 'omar@gmail.com',
                                        'escrito'=> 85,
                                        'practico'=> 90,
                                        'aprueba'=> $this->functions->aprobado_noaprobado(1),
                                        'pi'=> 90,
                                        ),
                                    array(
                                        'nombre' => 'Omar Martínez Martínez',
                                        'correo' => 'omar@gmail.com',
                                        'escrito'=> 85,
                                        'practico'=> 90,
                                        'aprueba'=> $this->functions->aprobado_noaprobado(1),
                                        'pi'=> 90,
                                        ),
                                    array(
                                        'nombre' => 'Omar Martínez Martínez',
                                        'correo' => 'omar@gmail.com',
                                        'escrito'=> 85,
                                        'practico'=> 90,
                                        'aprueba'=> $this->functions->aprobado_noaprobado(1),
                                        'pi'=> 90,
                                        ),
                                    array(
                                        'nombre' => 'Omar Martínez Martínez',
                                        'correo' => 'omar@gmail.com',
                                        'escrito'=> 85,
                                        'practico'=> 90,
                                        'aprueba'=> $this->functions->aprobado_noaprobado(1),
                                        'pi'=> 90,
                                        ),
                                    array(
                                        'nombre' => 'Omar Martínez Martínez',
                                        'correo' => 'omar@gmail.com',
                                        'escrito'=> 85,
                                        'practico'=> 90,
                                        'aprueba'=> $this->functions->aprobado_noaprobado(1),
                                        'pi'=> 90,
                                        ),
                                    array(
                                        'nombre' => 'Omar Martínez Martínez',
                                        'correo' => 'omar@gmail.com',
                                        'escrito'=> 85,
                                        'practico'=> 90,
                                        'aprueba'=> $this->functions->aprobado_noaprobado(1),
                                        'pi'=> 90,
                                        ),
                                    

                            );

    $this->mpdf->registro_participantes_PACE_SONO_sono('formatos_imprimir/sono/v2.registro_participantes_PACE_SONO_sono.php',$data); 
} 

public function Convocatoria_ALSO_sono() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array();

    $lugar_sede='Cuernavaca, Morelos.';
    $fecha="Sábado 22 y Domingo 23 de Junio del 2019.";
    $data['contenido']="Apreciable Instructor, por este medio se le invita a participar en el curso PACE SONO de <span id='lugar_fecha'>".$lugar_sede."</span> que se llevará a cabo los días <span id='lugar_fecha'>".$fecha."</span>";
    $data['lugar_sede']=$lugar_sede;

    $this->mpdf->Convocatoria_ALSO_sono('formatos_imprimir/sono/v9.Convocatoria_ALSO_sono.php',$data); 
} 

public function Plantilla_Respuesta_sono() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['lugar_sede'] = 'Ciudad de México.';
    $data['fecha']="30 y 31 de Mayo.";
    $data['doctores'] = array(
                                array('doctor' => "Omaru Martínez Torres",),
                                array('doctor' => "Blanca Estela Hurtado Villegas",),
                                array('doctor' => "Carolina Hurtado Villegas",),
                           );

    $this->mpdf->Plantilla_Respuesta_sono('formatos_imprimir/sono/v10.Plantilla_Respuesta_sono.php',$data); 
} 

public function AGENDA_sono() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf');
    $this->load->library('Functions'); 
    $data = array();
    $data['controller'] = $this->functions;
    $data['sede']="SAN MIGUEL DE ALLENDE, GTO";
    $data['fechas']="10 y 11 DE AGOSTO DEL 2019";
    $data['n_participantes']="NUMERO DE PARTICIPANTES";
    $data['observaciones']=array(
                            'voluntarios'=>array(
                                        '3 personas de complexión delgada ( hombres)',
                                        '2 embarazadas de ser posible de máximo 8 semanas de gestación',
                                        '1 persona con cirrosis hepática',
                                        '1 persona con litiasis vesicular'
                                    ),
                            'muebles'   =>array(
                                        '3 Mesas pequeñas para soporte de equipos de ultrasonido portátil',
                                        'Camillas para los pacientes, mesa de exploración o chaise lounge. '
                                    )
                                );
    $data['agenda'] = array(  
        
                            array(
                                'min'=>'15',
                                'horario'=>'07:30',
                                'actividad'=>'Recepción y Registro ',
                                'responsable'=>'Apoyo logístico',
                                'mat_obs'=>'Papelería logística',
                                'dia'=>'1'
                            ),
                            array(
                                'min'=>'15',
                                'horario'=>'07:45',
                                'actividad'=>'Junta de Instructores',
                                'responsable'=>'TODOS',
                                'mat_obs'=>'',
                                'dia'=>'1'
                            ),
                            array(
                                'min'=>'40',
                                'horario'=>'08:00',
                                'actividad'=>'INSTRUMENTACION Y TECNICA DE USG ',
                                'responsable'=>'DR. CESAR RDZ ',
                                'mat_obs'=>'proyector, apuntador, lap top ',
                                'dia'=>'1'
                            ),
                            array(
                                'min'=>'40',
                                'horario'=>'08:40',
                                'actividad'=>'E-FAST',
                                'responsable'=>'DR. ABEL GARCIA',
                                'mat_obs'=>'proyector, apuntador, lap top ',
                                'dia'=>'1'
                            ),
                            array(
                                'min'=>'40',
                                'horario'=>'09:20',
                                'actividad'=>'USG EN EMERGENCIA HEPATO BILIAR ',
                                'responsable'=>'DR. HORACIO RANGEL',
                                'mat_obs'=>'proyector, apuntador, lap top ',
                                'dia'=>'1'
                            ),
                            array(
                                'min'=>'40',
                                'horario'=>'10:00',
                                'actividad'=>'USG EN EMERGENCIA CARDIACA ',
                                'responsable'=>'DR. DAVID MARTIN ',
                                'mat_obs'=>'proyector, apuntador, lap top ',
                                'dia'=>'1'
                            ),
                            array(
                                'min'=>'20',
                                'horario'=>'10:40',
                                'actividad'=>'RECESO',
                                'responsable'=>'',
                                'mat_obs'=>'',
                                'dia'=>'1'
                            ),
                            array(
                                'min'=>'50',
                                'horario'=>'11:00',
                                'actividad'=>'TALLER DE TECNICA E INSTRUMENTACION ',
                                'responsable'=>'Todos ( tres estaciones )',
                                'mat_obs'=>'equipo portatil usg, banner, persona voluntaria ',
                                'dia'=>'1'
                            ),
                            array(
                                'min'=>'50',
                                'horario'=>'11:50',
                                'actividad'=>'TALLER DEL FAST AL E.FAST ',
                                'responsable'=>'DR. ABEL / DR. CARLOS HDZ. ',
                                'mat_obs'=>'equipo portatil usg, banner, persona voluntaria sana/ paciente cirrótico ',
                                'dia'=>'1'
                            ),
                            array(
                                'min'=>'50',
                                'horario'=>'12:40',
                                'actividad'=>'TALLER DE USG EN EMERGENCIA HEPATOBILIAR ',
                                'responsable'=>'DR. HORACIO / DR. CESAR RDZ. ',
                                'mat_obs'=>'equipo portatil usg, voluntario complexion delgado/pac con litiasis vesicular ',
                                'dia'=>'1'
                            ),
                            array(
                                'min'=>'50',
                                'horario'=>'13:30',
                                'actividad'=>'TALLER DE USG CARDIACO ',
                                'responsable'=>'DR. DAVID MARTIN/ ',
                                'mat_obs'=>'equipo portatil usg, voluntario complexion delgado ',
                                'dia'=>'1'
                            ),
                            array(
                                'min'=>'60',
                                'horario'=>'14:20',
                                'actividad'=>'COMIDA',
                                'responsable'=>'',
                                'mat_obs'=>'',
                                'dia'=>'1'
                            ),
                            array(
                                'min'=>'40',
                                'horario'=>'15:20',
                                'actividad'=>'USG EN EMERGENCIA PULMONAR ',
                                'responsable'=>'DRA. DAVID MARTIN ',
                                'mat_obs'=>' proyector, apuntador, lap top ',
                                'dia'=>'1'
                            ),
                            array(
                                'min'=>'40',
                                'horario'=>'16:00',
                                'actividad'=>'USG EN EMERGENCIA OBSTETRICA DEL 1ER T ',
                                'responsable'=>'DR. CARLOS HERNANDEZ ',
                                'mat_obs'=>' proyector, apuntador, lap top ',
                                'dia'=>'1'
                            ),
                            array(
                                'min'=>'40',
                                'horario'=>'16:40',
                                'actividad'=>'URG EN ACCESOS VASCULARES  ',
                                'responsable'=>'DR.  ABEL OLIVO/DR. FLAVIO ',
                                'mat_obs'=>' proyector, apuntador, lap top ',
                                'dia'=>'1'
                            ),
                            array(
                                'min'=>'30',
                                'horario'=>'17:20',
                                'actividad'=>'Junta de Instructores ',
                                'responsable'=>'TODOS ',
                                'mat_obs'=>' ',
                                'dia'=>'1'
                            ),
                        
       
                            array(
                                'min'=>'40',
                                'horario'=>'08:00',
                                'actividad'=>'USG EN EMERGENCIA URINARIA ',
                                'responsable'=>'DR. CESAR RDZ ',
                                'mat_obs'=>' proyector, apuntador, lap top ',
                                'dia'=>'2'
                            ),
                            array(
                                'min'=>'50',
                                'horario'=>'08:40',
                                'actividad'=>'TALLER DE  USG PULMONAR /  TVP ',
                                'responsable'=>'DRA, / DR. DAVID MARTIN ',
                                'mat_obs'=>'equipo portatil usg, persona voluntaria, proyector, lap top ',
                                'dia'=>'2'
                            ),
                            array(
                                'min'=>'50',
                                'horario'=>'09:30',
                                'actividad'=>'TALLER DE USG DE VIAS URINARIAS ',
                                'responsable'=>'DR.HORACIO RANGEL / DR. CESAR RDZ ',
                                'mat_obs'=>'equipo portatil usg persona voluntaria ',
                                'dia'=>'2'
                            ),
                            array(
                                'min'=>'20',
                                'horario'=>'10:20',
                                'actividad'=>'RECESO ',
                                'responsable'=>'',
                                'mat_obs'=>' ',
                                'dia'=>'2'
                            ),
                            array(
                                'min'=>'50',
                                'horario'=>'10:40',
                                'actividad'=>'TALLER DE USG EN OBSTETRICIA  ',
                                'responsable'=>'DR. CARLOS HDZ ',
                                'mat_obs'=>'equipo portatil usg, banner persona voluntaria embarazada del primer trimestre ',
                                'dia'=>'2'
                            ),
                            array(
                                'min'=>'50',
                                'horario'=>'11:30',
                                'actividad'=>'TALLER DE ACCESOS VASCULARES ',
                                'responsable'=>'DR. / DR . ABEL OLIVO / DR, FLAVIO ',
                                'mat_obs'=>'equipo portatil usg, banner maniquie, simulador de vias circulatoria ( bistek, globos                             largos, agua pintada de rojo)punzocat 14 ',
                                'dia'=>'2'
                            ),
                            array(
                                'min'=>'90',
                                'horario'=>'12:20',
                                'actividad'=>'Examen final escrito / Examen de imagenes ',
                                'responsable'=>'Todos los Alumnos ',
                                'mat_obs'=>'proyector, lap top ',
                                'dia'=>'2'
                            ),
                            array(
                                'min'=>'50',
                                'horario'=>'13:40',
                                'actividad'=>'COMIDA ',
                                'responsable'=>'',
                                'mat_obs'=>' ',
                                'dia'=>'2'
                            ),
                            array(
                                'min'=>'30',
                                'horario'=>'14:30 ',
                                'actividad'=>'Clausura y entrega de resultados ',
                                'responsable'=>'Todos ',
                                'mat_obs'=>' ',
                                'dia'=>'2'
                            ),
                            array(
                                'min'=>'30',
                                'horario'=>'15:00',
                                'actividad'=>'Junta de instructores y evaluación del curso ',
                                'responsable'=>'Todos los Instructores ',
                                'mat_obs'=>' ',
                                'dia'=>'2'
                            )
                        
                    );



    $this->mpdf->AGENDA_sono('formatos_imprimir/sono/v11.AGENDA_sono.php',$data); 
} 

public function Examen_imagenes_PACE_SONO_sono() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 

  
    $data['nombre_participante'] = array('Omaru Martínez Torres1','Omaru Martínez Torres2','Omaru Martínez Torres3','Omaru Martínez Torres4','Omaru Martínez Torres5'); 

    $this->mpdf->Examen_imagenes_PACE_SONO_sono('formatos_imprimir/sono/v13.Examen_imagenes_PACE_SONO_sono.php',$data); 
} 

public function Examen_teorico_PACE_SONO_sono() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 

    $data['nombre_participante'] = array('Omaru Martínez Torres','Omaru Martínez Torres2','Omaru Martínez Torres3','Omaru Martínez Torres4','Omaru Martínez Torres5','Omaru Martínez Torres6');

    $this->mpdf->Examen_teorico_PACE_SONO_sono('formatos_imprimir/sono/v14.Examen_teorico_PACE_SONO_sono.php',$data); 
} 

public function formato_remediaciones_PACE_SONO_sono() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $datos = array(
        array('nombre' => 'Omar Martínez Torres', 'curso_or_fecha_sede' => '12/10/2020, Saltillo', 'curso_rem_fecha_sede' => '23/11/2020, Zacatecas', 'resultado'=>'Ninguno'),
        array('nombre' => 'Omar Martínez Torres', 'curso_or_fecha_sede' => '12/10/2020, Saltillo', 'curso_rem_fecha_sede' => '23/11/2020, Zacatecas', 'resultado'=>'Ninguno'),
        array('nombre' => 'Omar Martínez Torres', 'curso_or_fecha_sede' => '12/10/2020, Saltillo', 'curso_rem_fecha_sede' => '23/11/2020, Zacatecas', 'resultado'=>'Ninguno'),
        array('nombre' => 'Omar Martínez Torres', 'curso_or_fecha_sede' => '12/10/2020, Saltillo', 'curso_rem_fecha_sede' => '23/11/2020, Zacatecas', 'resultado'=>'Ninguno'),
        array('nombre' => 'Omar Martínez Torres', 'curso_or_fecha_sede' => '12/10/2020, Saltillo', 'curso_rem_fecha_sede' => '23/11/2020, Zacatecas', 'resultado'=>'Ninguno'),
        array('nombre' => 'Omar Martínez Torres', 'curso_or_fecha_sede' => '12/10/2020, Saltillo', 'curso_rem_fecha_sede' => '23/11/2020, Zacatecas', 'resultado'=>'Ninguno'),
        array('nombre' => 'Omar Martínez Torres', 'curso_or_fecha_sede' => '12/10/2020, Saltillo', 'curso_rem_fecha_sede' => '23/11/2020, Zacatecas', 'resultado'=>'Ninguno'),
        array('nombre' => 'Omar Martínez Torres', 'curso_or_fecha_sede' => '12/10/2020, Saltillo', 'curso_rem_fecha_sede' => '23/11/2020, Zacatecas', 'resultado'=>'Ninguno'),
        array('nombre' => 'Omar Martínez Torres', 'curso_or_fecha_sede' => '12/10/2020, Saltillo', 'curso_rem_fecha_sede' => '23/11/2020, Zacatecas', 'resultado'=>'Ninguno'),
        array('nombre' => 'Omar Martínez Torres', 'curso_or_fecha_sede' => '12/10/2020, Saltillo', 'curso_rem_fecha_sede' => '23/11/2020, Zacatecas', 'resultado'=>'Ninguno'),
        array('nombre' => 'Omar Martínez Torres', 'curso_or_fecha_sede' => '12/10/2020, Saltillo', 'curso_rem_fecha_sede' => '23/11/2020, Zacatecas', 'resultado'=>'Ninguno'),
        array('nombre' => 'Omar Martínez Torres', 'curso_or_fecha_sede' => '12/10/2020, Saltillo', 'curso_rem_fecha_sede' => '23/11/2020, Zacatecas', 'resultado'=>'Ninguno'),
        array('nombre' => 'Omar Martínez Torres', 'curso_or_fecha_sede' => '12/10/2020, Saltillo', 'curso_rem_fecha_sede' => '23/11/2020, Zacatecas', 'resultado'=>'Ninguno'),
        array('nombre' => 'Omar Martínez Torres', 'curso_or_fecha_sede' => '12/10/2020, Saltillo', 'curso_rem_fecha_sede' => '23/11/2020, Zacatecas', 'resultado'=>'Ninguno'),
        array('nombre' => 'Omar Martínez Torres', 'curso_or_fecha_sede' => '12/10/2020, Saltillo', 'curso_rem_fecha_sede' => '23/11/2020, Zacatecas', 'resultado'=>'Ninguno'),
        array('nombre' => 'Omar Martínez Torres', 'curso_or_fecha_sede' => '12/10/2020, Saltillo', 'curso_rem_fecha_sede' => '23/11/2020, Zacatecas', 'resultado'=>'Ninguno'),
        
        

    );

    $data['datos'] = $datos;
    $data['folio'] = '4532';
    $data['tam_reg_tabla']=9;

    $this->mpdf->formato_remediaciones_PACE_SONO_sono('formatos_imprimir/sono/v15.formato_remediaciones_PACE_SONO_sono.php',$data); 
} 

public function Tarjeta_PACE_SONO_Basico_sono() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['participante']=mb_strtoupper("CARLA GARCÍA CASTANEDO");
    $data['capacitacion']=mb_strtoupper("proveedor");
    $data['fecha_emision']="19/01/2020";
    $data['fecha_renovacion']="19/01/2022";
    $data['centro']=mb_strtoupper("Centro PACE");
    $data['director_curso']=mb_strtoupper("DR. RODOLFO JESÚS MORALES GONZÁLEZ");
    $data['folio']="2108";
    $data['dia1']="18";
    $data['dia2']="19";
    $data['mes']=mb_strtoupper("Enero");
    $data['anio']="2020";
    $data['lugar']=mb_strtoupper("PLAYA DEL CARMEN, QUINTANA ROO"); 
   

    $this->mpdf->Tarjeta_PACE_SONO_Basico_sono('formatos_imprimir/sono/v16.Tarjeta_PACE_SONO_Basico_sono.php',$data); 
} 

public function Candidato_instructor_PACE_SONO_sono() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf');
    $fecha_actual = new DateTime('NOW');
    $data = array();

    //---Variables
    $fecha_actual=$fecha_actual->format('d/m/Y');
    $sede_curso="Guanajuato, Gto.";
    $instructor="Omar Martínez Torres";
    $fecha="12/08/2020";       
    $ciudad_curso="Guanajuato, Gto.";
    $dia1_curso="12";
    $dia2_curso="21";
    $mes_curso="Agosto";
    $folio="0012";
    $director_curso="Omar Martínez Torres";
    
    $data['fecha_actual'] = $fecha_actual; 
    $data['fecha'] = $fecha;
    $data['sede_curso'] = $sede_curso;
    $data['instructor']=$instructor;
    $data['dia1_curso']=$dia1_curso;
    $data['dia2_curso']=$dia2_curso;
    $data['mes_curso']=$mes_curso;
    $data['folio']=$folio;
    $data['director_curso']=$director_curso; 

    $this->mpdf->Candidato_instructor_PACE_SONO_sono('formatos_imprimir/sono/v17.Candidato_instructor_PACE_SONO_sono.php',$data); 
} 

public function Reporte_Director_curso_sono() 
{ 
    $this->load->model('curso');
    $this->load->library('Functions');  
    $this->load->library('Mpdf');
    $fecha_actual = new DateTime('NOW');
    $data = array(); 

    $data['fecha_curso'] = '02/06/2020';
    $data['sede_curso'] = 'Guanajuato, Gto';
    $data['lugar_curso'] = 'C. Guanajuato, Gto';
    $data['instructores'] = array(
                                array('name' =>'Omar Martínez Martínez1dqdqw dfeqfwef fwefew', 
                                       'residencia'=>'Guanajuato, Gto',
                                       'especidalidad'=>'Cardiopulmonar ddewdewdew',
                                       'cargo'=>'Director de hospital'
                                ),
                                array('name' =>'Omar Martínez Martínez2', 
                                       'residencia'=>'Silao, Gto',
                                       'especidalidad'=>'Pediatria',
                                       'cargo'=>'Medico de hospital'
                                ),
                    
                            );
    $data['Proveedores_capacitar']=12;
    $data['Proveedores_capacitados']=10;
    $data['capa_gineco']=6;
    $data['capa_generales']=2;
    $data['capa_urgen']=3;
    $data['capa_enferm']=4;
    $data['capa_intern']=5;
    $data['capa_inten']=1;
    $data['capa_anes']=7;
    $data['capa_tum']=8;
    $data['capa_tem']=9;

    $data['provee_apro_tteorico']=86;
    $data['provee_aprob_pteorico']='95%';
    $data['provee_apro_tpractico']=79;
    $data['provee_aprob_ppractico']='80%';

    $data['provee_repro_tteorico']=3;
    $data['provee_reprob_pteorico']='4%';
    $data['provee_repro_tpractico']=10;
    $data['provee_reprob_ppractico']='15%';

    $data['candidatos_inst'] = array(
                                array('name' =>'Omar Martínez Martínez1', 
                                       'puntajet'=>'90%',
                                       'puntajep'=>'80%'                                     
                                ),
                                array('name' =>'Omar Martínez Martínez2', 
                                       'puntajet'=>'90%',
                                       'puntajep'=>'80%'                                     
                                ),
                               
                               
                            );    

    $data['aulas']=0;
    $data['aulas_obs']="Podrian mejorara";
    $data['proy']=0;
    $data['proy_obs']="Podrian mejorarp";
    $data['seña']=0;
    $data['seña_obs']="Podrian mejorars";
    $data['venti']=0;
    $data['venti_obs']="Podrian mejorarv";
    
    $data['compu_c']=1;
    $data['compu_f']=1;

    $data['pape']=1;    
    $data['manual_ent']=0;

    $data['nemo']=1;
    $data['nemo_falt']=25;

    $data['ponencias'] = array(
                                array('nombre' =>'ponencia numero1', 
                                       'apegado'=>1,
                                       'calidad'=>1                                     
                                ),
                                array('nombre' =>'ponencia numero2', 
                                       'apegado'=>0,
                                       'calidad'=>0                                     
                                ),
                                array('nombre' =>'ponencia numero3', 
                                       'apegado'=>1,
                                       'calidad'=>2                                     
                                ),
                                array('nombre' =>'ponencia numero1', 
                                       'apegado'=>1,
                                       'calidad'=>1                                     
                                ),
                                array('nombre' =>'ponencia numero2', 
                                       'apegado'=>0,
                                       'calidad'=>0                                     
                                ),
                                array('nombre' =>'ponencia numero3 fewfwefew fwefewf fwefwefewfe', 
                                       'apegado'=>1,
                                       'calidad'=>2                                     
                                ),
                                array('nombre' =>'ponencia numero1', 
                                       'apegado'=>1,
                                       'calidad'=>1                                     
                                ),
                                array('nombre' =>'ponencia numero2', 
                                       'apegado'=>0,
                                       'calidad'=>0                                     
                                ),
                                array('nombre' =>'ponencia numero3', 
                                       'apegado'=>1,
                                       'calidad'=>2                                     
                                ),
                          
                            );
    $data['obs_ponen']="Aqui van las observaciones de las ponencias, aqui van las observaciones de las ponencias";
    $data['mat_taller'] = array(
                                array('nombre' =>'taller numero1', 
                                       'completo'=>1,
                                       'faltante'=>'todo muy bien'                                     
                                ),
                                array('nombre' =>'taller numero2', 
                                       'completo'=>0,
                                       'faltante'=>'Falto material'                                  
                                ),
                                array('nombre' =>'taller numero3', 
                                       'completo'=>1,
                                       'faltante'=>'todo muy bien taller 3'                                    
                                ),
                          
                            );
    $data['coffee']=2;
    $data['comida']=2;
    $data['hotel']=2;
    $data['viaticos']=array(
                                array('nombre' =>'instructor numero1', 
                                       'viaticos'=>1,                                     
                                ),
                                array('nombre' =>'instructor numero2', 
                                       'viaticos'=>0,                                  
                                ),
                                array('nombre' =>'instructor numero3', 
                                       'viaticos'=>2,                                    
                                ),

                          
                            );
    $data['lugar_inst']='Guanajuato, Gto capital';
    $data['fecha_inst']='13/10/2020';
    $data['hora_inst']='09:00 am';
    $data['concepto']=array(1,0,1,1,1,0,0,1);
    $data['comentarios']='Aquí van los comentarios de la reunion de los instructores';
    $data['des_curso']='Aquí el desarrollo del curso';

    $data['dir_curso']='Blanca Estela Hurtado';
    $data['dir_esp']='Medico general con Especialidad en Cardiopulmonar';
    $data['fecha_actual']=$fecha_actual->format('d/m/Y'); 

    $data['controller'] = $this->functions;

    $this->mpdf->Reporte_Director_curso_sono('formatos_imprimir/sono/v20.Reporte_Director_curso_sono.php',$data); 
} 

public function ejemplo_reporte_logistica_sono() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->ejemplo_reporte_logistica_sono('formatos_imprimir/sono/v21.ejemplo_reporte_logistica_sono.php',$data); 
} 


    /*-------------------------------------------------------------------------------------
    ----------------------------------------Reportes TNCC---------------------------------*/

public function Revision_posterior_curso_tncc1() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['no_curso'] = '0023'; 
    $data['director'] = 'Omar Martínez Torres';   

    $this->mpdf->Revision_posterior_curso_tncc1('formatos_imprimir/tncc/v1.1Revision_posterior_curso_tncc.php',$data); 
} 

public function carta_bienvenida_curso_tncc() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf');
    $fecha_actual = new DateTime('NOW'); 
    $data = array(); 

    $data['fecha_curso'] = '02/06/2020'; 
    $data['tiempo'] = '5 horas y 10 minutos'; 
    $data['Lugar'] = 'Secretaría de Salud'; 
    $data['fecha_actual'] = $fecha_actual->format('d/m/Y'); 
    $data['participante']="Carolina Hurtado Villegas";
    $data['instructor']="Omaru Martínez Torres";

    $this->mpdf->carta_bienvenida_curso_tncc('formatos_imprimir/tncc/v1.carta_bienvenida_curso_tncc.php',$data); 
} 

public function Final_Faculty_Roster_tncc() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array();

    $data['option_indica']=2;
    $data['tam_reg_tabla']=13;
    $data['num_curso'] = '00343'; 
    $data['director_curso'] = 'Omaru Martínez Torres';
    $data['instructor']=array(
                            array('instructor' => 'Omaru Martínez Torres',
                                  'inst_candida'=>'Y',
                                  'last_dig_social'=>'0023',
                                  'intr_num'=>'3',
                                  'email'=>'omaru@gmail.com'
                             ),

                        ); 

    $this->mpdf->Final_Faculty_Roster_tncc('formatos_imprimir/tncc/v2.Final_Faculty_Roster_tncc.php',$data); 
} 

public function Lista_Instructores_tncc() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array();

    $data['option_indica']=2;
    $data['tam_reg_tabla']=13;
    $data['num_curso'] = '00343'; 
    $data['director_curso'] = 'Omaru Martínez Torres';
    $data['instructor']=array(
                            array('instructor' => 'Omaru Martínez Torres',
                                  'inst_candida'=>'Y',
                                  'last_dig_social'=>'0023',
                                  'intr_num'=>'3',
                                  'email'=>'omaru@gmail.com'
                             ),
                        );

    $this->mpdf->Lista_Instructores_tncc('formatos_imprimir/tncc/v3.Lista_Instructores_tncc.php',$data); 
} 

public function Lista_Participantes_tncc() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $fecha_actual = new DateTime('NOW');
    $data = array();

    $data['option_indica']=2;
    $data['tam_reg_tabla']=18;
    $data['no_curso'] = '0023'; 
    $data['fecha'] = $fecha_actual->format('d/m/Y');
    $data['participantes']=array(
                            array('participante' => 'Omaru Martínez Torres',
                                  'email'=>'caro@gmail.com'
                             ),
                            array('participante' => 'Omaru Martínez Torres',
                                  'email'=>'caro@gmail.com'
                             ),
                            array('participante' => 'Omaru Martínez Torres',
                                  'email'=>'caro@gmail.com'
                             ),
                            array('participante' => 'Omaru Martínez Torres',
                                  'email'=>'caro@gmail.com'
                             ),
                            array('participante' => 'Omaru Martínez Torres',
                                  'email'=>'caro@gmail.com'
                             ),
                            array('participante' => 'Omaru Martínez Torres',
                                  'email'=>'caro@gmail.com'
                             ),
                        );

    $this->mpdf->Lista_Participantes_tncc('formatos_imprimir/tncc/v4.Lista_Participantes_tncc.php',$data); 
} 

public function Resumen_Calificaciones_tncc() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf');
    $this->load->library('Functions');

    $data = array(); 
    $data['tam_reg_tabla']=14;
    $data['option_indica']=2;
    $data['no_curso']=20;
    $data['director_curso']="Carolina Hurtado Villegas";

    $data['tabla1']=array(
                            array(
                                'nombre' =>'Omaru Martínez Martínez',
                                'multiple_resultado'=>80,
                                'multiple_remediacion'=>90,
                                'trauma_resultado'=>80,
                                'trauma_remediacion'=>90,
                                'participa_via_aerea'=>$this->functions->participa_sino(1),
                                'participa_intervencion'=>$this->functions->participa_sino(0),
                                'calificacion_final'=>'A',
                                'horas_curso'=>30,
                                'potencial'=> $this->functions->participa_sino(1),    
                            ),
                            array(
                                'nombre' =>'Omaru Martínez Martínez',
                                'multiple_resultado'=>80,
                                'multiple_remediacion'=>90,
                                'trauma_resultado'=>80,
                                'trauma_remediacion'=>90,
                                'participa_via_aerea'=>$this->functions->participa_sino(1),
                                'participa_intervencion'=>$this->functions->participa_sino(0),
                                'calificacion_final'=>'A',
                                'horas_curso'=>30,
                                'potencial'=> $this->functions->participa_sino(1),    
                            ),
                            array(
                                'nombre' =>'Omaru Martínez Martínez',
                                'multiple_resultado'=>80,
                                'multiple_remediacion'=>90,
                                'trauma_resultado'=>80,
                                'trauma_remediacion'=>90,
                                'participa_via_aerea'=>$this->functions->participa_sino(1),
                                'participa_intervencion'=>$this->functions->participa_sino(0),
                                'calificacion_final'=>'A',
                                'horas_curso'=>30,
                                'potencial'=> $this->functions->participa_sino(1),    
                            ),                         
                            array(
                                'nombre' =>'Omaru Martínez Martínez',
                                'multiple_resultado'=>80,
                                'multiple_remediacion'=>90,
                                'trauma_resultado'=>80,
                                'trauma_remediacion'=>90,
                                'participa_via_aerea'=>$this->functions->participa_sino(1),
                                'participa_intervencion'=>$this->functions->participa_sino(0),
                                'calificacion_final'=>'A',
                                'horas_curso'=>30,
                                'potencial'=> $this->functions->participa_sino(1),    
                            ),
                            array(
                                'nombre' =>'Omaru Martínez Martínez',
                                'multiple_resultado'=>80,
                                'multiple_remediacion'=>90,
                                'trauma_resultado'=>80,
                                'trauma_remediacion'=>90,
                                'participa_via_aerea'=>$this->functions->participa_sino(1),
                                'participa_intervencion'=>$this->functions->participa_sino(0),
                                'calificacion_final'=>'A',
                                'horas_curso'=>30,
                                'potencial'=> $this->functions->participa_sino(1),    
                            ),
                            array(
                                'nombre' =>'Omaru Martínez Martínez',
                                'multiple_resultado'=>80,
                                'multiple_remediacion'=>90,
                                'trauma_resultado'=>80,
                                'trauma_remediacion'=>90,
                                'participa_via_aerea'=>$this->functions->participa_sino(1),
                                'participa_intervencion'=>$this->functions->participa_sino(0),
                                'calificacion_final'=>'A',
                                'horas_curso'=>30,
                                'potencial'=> $this->functions->participa_sino(1),    
                            ),
                            array(
                                'nombre' =>'Omaru Martínez Martínez',
                                'multiple_resultado'=>80,
                                'multiple_remediacion'=>90,
                                'trauma_resultado'=>80,
                                'trauma_remediacion'=>90,
                                'participa_via_aerea'=>$this->functions->participa_sino(1),
                                'participa_intervencion'=>$this->functions->participa_sino(0),
                                'calificacion_final'=>'A',
                                'horas_curso'=>30,
                                'potencial'=> $this->functions->participa_sino(1),    
                            ),
                            array(
                                'nombre' =>'Omaru Martínez Martínez',
                                'multiple_resultado'=>80,
                                'multiple_remediacion'=>90,
                                'trauma_resultado'=>80,
                                'trauma_remediacion'=>90,
                                'participa_via_aerea'=>$this->functions->participa_sino(1),
                                'participa_intervencion'=>$this->functions->participa_sino(0),
                                'calificacion_final'=>'A',
                                'horas_curso'=>30,
                                'potencial'=> $this->functions->participa_sino(1),    
                            ),
                            array(
                                'nombre' =>'Omaru Martínez Martínez',
                                'multiple_resultado'=>80,
                                'multiple_remediacion'=>90,
                                'trauma_resultado'=>80,
                                'trauma_remediacion'=>90,
                                'participa_via_aerea'=>$this->functions->participa_sino(1),
                                'participa_intervencion'=>$this->functions->participa_sino(0),
                                'calificacion_final'=>'A',
                                'horas_curso'=>30,
                                'potencial'=> $this->functions->participa_sino(1),    
                            ),
                            array(
                                'nombre' =>'Omaru Martínez Martínez',
                                'multiple_resultado'=>80,
                                'multiple_remediacion'=>90,
                                'trauma_resultado'=>80,
                                'trauma_remediacion'=>90,
                                'participa_via_aerea'=>$this->functions->participa_sino(1),
                                'participa_intervencion'=>$this->functions->participa_sino(0),
                                'calificacion_final'=>'A',
                                'horas_curso'=>30,
                                'potencial'=> $this->functions->participa_sino(1),    
                            ),
                            array(
                                'nombre' =>'Omaru Martínez Martínez',
                                'multiple_resultado'=>80,
                                'multiple_remediacion'=>90,
                                'trauma_resultado'=>80,
                                'trauma_remediacion'=>90,
                                'participa_via_aerea'=>$this->functions->participa_sino(1),
                                'participa_intervencion'=>$this->functions->participa_sino(0),
                                'calificacion_final'=>'A',
                                'horas_curso'=>30,
                                'potencial'=> $this->functions->participa_sino(1),    
                            ),
                            array(
                                'nombre' =>'Omaru Martínez Martínez',
                                'multiple_resultado'=>80,
                                'multiple_remediacion'=>90,
                                'trauma_resultado'=>80,
                                'trauma_remediacion'=>90,
                                'participa_via_aerea'=>$this->functions->participa_sino(1),
                                'participa_intervencion'=>$this->functions->participa_sino(0),
                                'calificacion_final'=>'A',
                                'horas_curso'=>30,
                                'potencial'=> $this->functions->participa_sino(1),    
                            ),
                            array(
                                'nombre' =>'Omaru Martínez Martínez',
                                'multiple_resultado'=>80,
                                'multiple_remediacion'=>90,
                                'trauma_resultado'=>80,
                                'trauma_remediacion'=>90,
                                'participa_via_aerea'=>$this->functions->participa_sino(1),
                                'participa_intervencion'=>$this->functions->participa_sino(0),
                                'calificacion_final'=>'A',
                                'horas_curso'=>30,
                                'potencial'=> $this->functions->participa_sino(1),    
                            ),
                            array(
                                'nombre' =>'Omaru Martínez Martínez',
                                'multiple_resultado'=>80,
                                'multiple_remediacion'=>90,
                                'trauma_resultado'=>80,
                                'trauma_remediacion'=>90,
                                'participa_via_aerea'=>$this->functions->participa_sino(1),
                                'participa_intervencion'=>$this->functions->participa_sino(0),
                                'calificacion_final'=>'A',
                                'horas_curso'=>30,
                                'potencial'=> $this->functions->participa_sino(1),    
                            ),
                            array(
                                'nombre' =>'Omaru Martínez Martínez',
                                'multiple_resultado'=>80,
                                'multiple_remediacion'=>90,
                                'trauma_resultado'=>80,
                                'trauma_remediacion'=>90,
                                'participa_via_aerea'=>$this->functions->participa_sino(1),
                                'participa_intervencion'=>$this->functions->participa_sino(0),
                                'calificacion_final'=>'A',
                                'horas_curso'=>30,
                                'potencial'=> $this->functions->participa_sino(1),    
                            ),

                            array(
                                'nombre' =>'Omaru Martínez Martínez',
                                'multiple_resultado'=>80,
                                'multiple_remediacion'=>90,
                                'trauma_resultado'=>80,
                                'trauma_remediacion'=>90,
                                'participa_via_aerea'=>$this->functions->participa_sino(1),
                                'participa_intervencion'=>$this->functions->participa_sino(0),
                                'calificacion_final'=>'A',
                                'horas_curso'=>30,
                                'potencial'=> $this->functions->participa_sino(1),    
                            ),
                    );
    $data['tabla2']=array(
                            array(
                                'nombre' =>'Omaru Martínez Martínez',
                                'credenciales'=>4324,
                                'multiple_resultado'=>80,
                                'multiple_remediacion'=>90,
                                'trauma_resultado'=>80,
                                'trauma_remediacion'=>90,
                                'participa_via_aerea'=>$this->functions->participa_sino(1),
                                'participa_intervencion'=>$this->functions->participa_sino(0),
                                'calificacion_final'=>'NA',
                                'horas_curso'=>80,                                   
                            ),                          
                    );



    $this->mpdf->Resumen_Calificaciones_tncc('formatos_imprimir/tncc/v5.Resumen_Calificaciones_tncc.php',$data); 
} 

public function Agenda_tncc() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_curso'] = '02/06/2020';
    $data['dir_curso'] = 'Omar Martínez Martínez';
    $data['no_curso'] = 123; 

    $data['agenda']=array(
            array(
                'horario'=>'07:40-08:00 ',
                'actividad'=>'Bienvenida y Registro',
                'min'=>'20 min. ',
                'responsable'=>'Santiago',
                'dia'=>'1',
            ),
            array(
                'horario'=>'08:00-08:10 ',
                'actividad'=>'Introducción Curso Esencial de Enfermería de Trauma',
                'min'=>'10 min.',
                'responsable'=>'Santiago',
                'dia'=>'1',
            ),

            array(
                'horario'=>'08:15-08:30 ',
                'actividad'=>'Trabajo en Equipo y Cuidado del Trauma',
                'min'=>'15 min.',
                'responsable'=>'Santiago ',
                'dia'=>'1',
            ),
                
            array(
                'horario'=>'08:35-09:15 ',
                'actividad'=>'Evaluación Inicial ',
                'min'=>'40 min. ',
                'responsable'=>'Morales ',
                'dia'=>'1',
            ),
                
            array(
                'horario'=>'09:20-09:50 ',
                'actividad'=>'Vía Áerea y Ventilación ',
                'min'=>'30 min. ',
                'responsable'=>'Santiago ',
                'dia'=>'1',
            ),
                
            array(
                'horario'=>'09:50-10:00 ',
                'actividad'=>'Receso ',
                'min'=>'10 min.',
                'responsable'=>'',
                'dia'=>'1',
            ),
                
            array(
                'horario'=>'10:00-10:30',
                'actividad'=>'Shock',
                'min'=>'30 min.',
                'responsable'=>'Pedrami',
                'dia'=>'1',
            ),
                
            array(
                'horario'=>'10:35-11:10',
                'actividad'=>'Paciente Pediátrico con Trauma',
                'min'=>'35 min.',
                'responsable'=>'Santiago',
                'dia'=>'1',
            ),
                
            array(
                'horario'=>'11:15-11:30',
                'actividad'=>'Proceso de Enfermería de Trauma Demostración',
                'min'=>'15 min.',
                'responsable'=>'Faculty',
                'dia'=>'1',
            ),
                
            array(
                'horario'=>'',
                'actividad'=>'Rotación:',
                'min'=>'',
                'responsable'=>'',
                'dia'=>'1',
            ),

            array(
                array(
                    'horario'=>'12:30- 14:00',
                    'actividad'=>'TNP Escenarios A/B/C',
                    'rm'=>'_____',
                    'responsable'=>'MORALES',
                    'dia'=>'1', 
                ),
                array(
                    'horario'=>'12:30:00- 14:00',
                    'actividad'=>'Vía Áerea/Ventilación/ Intervenciones de Trama',
                    'rm'=>'_____',
                    'responsable'=>'SANTIAGO',
                    'dia'=>'1', 
                ),
                array(
                    'horario'=>'12:30:00- 14:00',
                    'actividad'=>'TNP Escenarios D/E/F',
                    'rm'=>'_____',
                    'responsable'=>'PEDRAMI',
                    'dia'=>'1', 
                ),
            ),

            array(
                array(
                    'horario'=>'14:00- 15:30',
                    'actividad'=>'Áerea/Ventilación/ Intervenciones de Trama',
                    'rm'=>'_____',
                    'responsable'=>'SANTIAGO',
                    'dia'=>'1', 
                ),
                array(
                    'horario'=>'14:00- 15:30',
                    'actividad'=>'TNP Escenarios D/E/F',
                    'rm'=>'_____',
                    'responsable'=>'PEDRAMI',
                    'dia'=>'1', 
                ),
                array(
                    'horario'=>'14:00- 15:30',
                    'actividad'=>'TNP Escenarios A/B/C',
                    'rm'=>'_____',
                    'responsable'=>'MORALES',
                    'dia'=>'1', 
                ),
            ),
            array(
                array(
                    'horario'=>'15:30- 17:00',
                    'actividad'=>'TNP Escenarios D/E/F',
                    'rm'=>'_____',
                    'responsable'=>'PEDRAMI',
                    'dia'=>'1', 
                ),
                array(
                    'horario'=>'15:30- 17:00',
                    'actividad'=>'TNP Escenarios A/B/C',
                    'rm'=>'_____',
                    'responsable'=>'MORALES',
                    'dia'=>'1', 
                ),
                array(
                    'horario'=>'15:30- 17:00',
                    'actividad'=>'Áerea/Ventilación/ Intervenciones de Trama',
                    'rm'=>'_____',
                    'responsable'=>'SANTIAGO',
                    'dia'=>'1', 
                ),
            ), 
                
            array(
                'horario'=>'07:45-08:00',
                'actividad'=>'Q&A',
                'min'=>'15 min.',
                'responsable'=>'Santiago ',
                'dia'=>'2',
            ),
                
            array(
                'horario'=>'08:00-08:35 ',
                'actividad'=>'Trauma cereblal, craneal y maxilofacial',
                'min'=>'35 min.',
                'responsable'=>'Santiago ',
                'dia'=>'2',
            ),
                
            array(
                'horario'=>'08:40-09:15 ',
                'actividad'=>'Trauma torácico y de cuello ',
                'min'=>'35 min. ',
                'responsable'=>'Santiago ',
                'dia'=>'2',
            ),
                
            array(
                'horario'=>'09:20-09:55 ',
                'actividad'=>'Trauma abdominal y pélvico ',
                'min'=>'30 min. ',
                'responsable'=>'Morales ',
                'dia'=>'2',
            ),
                
            array(
                'horario'=>'10:00-10:15 ',
                'actividad'=>'Truma Ocular ',
                'min'=>'15 min ',
                'responsable'=>'Morales ',
                'dia'=>'2',
            ),
                
            array(
                'horario'=>'10:20-10:30 ',
                'actividad'=>'Receso ',
                'min'=>'15 min ',
                'responsable'=>'-------------------- ',
                'dia'=>'2',
            ),
                
            array(
                'horario'=>'10:30-10:40 ',
                'actividad'=>'Special Populations Q & A',
                'min'=>'10 min. ',
                'responsable'=>'Santiago ',
                'dia'=>'2',
            ),
                
            array(
                'horario'=>'10:45-11:05 ',
                'actividad'=>'Dolor ',
                'min'=>'20 min. ',
                'responsable'=>'Pedrami ',
                'dia'=>'2',
            ),
                
            array(
                'horario'=>'11:10-11:40 ',
                'actividad'=>'Trauma de médula espinal y columna vertebral ',
                'min'=>'30 min. ',
                'responsable'=>'Pedrami ',
                'dia'=>'2',
            ),
                
            array(
                'horario'=>'11:45-12:15 ',
                'actividad'=>'Trauma muscoloesquelético ',
                'min'=>'30 min. ',
                'responsable'=>'Morales ',
                'dia'=>'2',
            ),
                
            array(
                'horario'=>'12:15-13:15 ',
                'actividad'=>'Receso ',
                'min'=>'60 min. ',
                'responsable'=>'-------------------- ',
                'dia'=>'2',
            ),
                
            array(
                'horario'=>'13:15-13:45 ',
                'actividad'=>'Trauma de superficie y quemaduras ',
                'min'=>'30 min. ',
                'responsable'=>'Pedrami ',
                'dia'=>'2',
            ),
                
            array(
                'horario'=>'13:50-14:20 ',
                'actividad'=>'Gestión de desastres ',
                'min'=>'30 min. ',
                'responsable'=>'Santiago ',
                'dia'=>'2',
            ),
                
            array(
                'horario'=>'14:25-14:45 ',
                'actividad'=>'Aspectos Psicosociales de la atención traumatológica ',
                'min'=>'20 min. ',
                'responsable'=>'Pedrami ',
                'dia'=>'2',
            ),
                
            array(
                'horario'=>'14:50-15:05 ',
                'actividad'=>'Transición de la atención al paciente de trauma y cuidados post reanimación ',
                'min'=>'15 min. ',
                'responsable'=>'Morales ',
                'dia'=>'2',
            ),
                
            array(
                'horario'=>'15:05-15:30 ',
                'actividad'=>'Receso ',
                'min'=>'25min. ',
                'responsable'=>'',
                'dia'=>'2',
            ),
                
            array(
                'horario'=>'15:30-17:30 ',
                'actividad'=>'Evaluación escrita ',
                'min'=>'',
                'responsable'=>'Santiago ',
                'dia'=>'2',
            ),
                
            array(
                'horario'=>'15:30-17:30 ',
                'actividad'=>'Pruebas psicomotas ',
                'min'=>'',
                'responsable'=>'',
                'dia'=>'2',
            ),
                
            array(
                'horario'=>'15:30-17:30 ',
                'actividad'=>'Rm: ',
                'min'=>'',
                'responsable'=>'Pedrami ',
                'dia'=>'2',
            ),
                
            array(
                'horario'=>'15:30-17:30 ',
                'actividad'=>'Rm:',
                'min'=>'',
                'responsable'=>'Morales ',
                'dia'=>'2',
            ),
                
            array(
                'horario'=>'17:30-18:00 ',
                'actividad'=>'Evaluación del Curso/Certificados  ',
                'min'=>'30 min. ',
                'responsable'=>'Faculty ',
                'dia'=>'2',
            ),
        );


    $this->mpdf->Agenda_tncc('formatos_imprimir/tncc/v6.Agenda_tncc.php',$data); 
} 

public function REGISTRO_UNICO_PARTICIPANTES_tncc() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf');
    $fecha_actual = new DateTime('NOW');
    $data = array();

    $data['ciudad'] ='Guanajuato, Gto';
    $data['dia']=$fecha_actual->format('d');
    $data['mes']='Diciembre';
    $data['anio']=$fecha_actual->format('Y');
    $data['nombre']="omaru";
    $data['paterno']="Martinez";
    $data['materno']="Torres";
    $data['nacimiento']="12/10/1991";
    $data['edad']="29 años";
    $data['sexo']="Masculino";
    $data['enfermeria']="X";
    $data['otro']="X";
    $data['cual']="Medico";
    $data['institucion']="Secretaría de Salud";
    $data['hospital']="Hospital General de Guanajuato";
    $data['ciudad_hospi']="Guanajuato";
    $data['juris']="I";
    $data['turno']="Mixto";
    $data['area']="Quirofano";
    $data['calle']="Principal";
    $data['no_ext']="S/N";
    $data['colonia']="Villaseca";
    $data['cp']="36000";
    $data['ciudad_vivienda']="Guanajuatociu";
    $data['estado']="Guanajuatoest";
    $data['tel']="473-786 56 23";
    $data['cel']="473 785 67 45";
    $data['email']="omaru@hotmail.com";

    $this->mpdf->REGISTRO_UNICO_PARTICIPANTES_tncc('formatos_imprimir/tncc/v7.REGISTRO_UNICO_PARTICIPANTES_tncc.php',$data); 
} 

public function CARTA_COMPROMISO_tncc() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato, Gto'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->CARTA_COMPROMISO_tncc('formatos_imprimir/tncc/v8.CARTA_COMPROMISO_tncc.php',$data); 
} 

public function Estacion_Examen_1_tncc() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['estudiante'] = 'Omaru Martínez Torres';
    $data['evaluador'] ='Carolina Hurtado';

    $this->mpdf->Estacion_Examen_1_tncc('formatos_imprimir/tncc/v9.Estacion_Examen_1_tncc.php',$data); 
} 

public function Estacion_Examen_2_tncc() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 

    $data['estudiante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->Estacion_Examen_2_tncc('formatos_imprimir/tncc/v10.Estacion_Examen_2_tncc.php',$data); 
} 

public function CASOS_PET_ABCDEF_tncc() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['estudiante'] = 'Omaru Martínez Torres';

    $this->mpdf->CASOS_PET_ABCDEF_tncc('formatos_imprimir/tncc/v11.CASOS_PET_ABCDEF_tncc.php',$data); 
} 

public function CASOS_VIA_AEREA_ABCD_tncc() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['estudiante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->CASOS_VIA_AEREA_ABCD_tncc('formatos_imprimir/tncc/v12.CASOS_VIA_AEREA_ABCD_tncc.php',$data); 
} 

public function Instructor_Potential_Application_tncc() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 

    $data['apli_dead']="10/08/2020";
    $data['send_to']="xxxxxxxxxxxxxxxxx xxxxxxxxxxxxxxxxxxx xxxxxxxxxxxxxx xxxxxxxxxxxxxx xxxxxxx xxxxxxxxxxxxxxx xxxxxxxxxxxxxxxxxxxxxxx xxxxxxxxxxxxxxxxxxxxxx xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx ";
    $data['apli_name']='Omar Martinez Martinez';
    $data['address']='C. principal #34 ciudad de Guanajuato fwoefhweoifhoweihfowiehf fweifhwefhewf fwehfoewhfowehfoiwehfoiehwfoihwef fuewhfohweofiewo';
    $data['phone1_opc']=3;
    $data['phone1_1']='1xxxxxxx';
    $data['phone1_2']='1yyyyyyy';
    $data['phone1_3']='1zzzzzzz';
    $data['phone2_opc']=1;
    $data['phone2_1']='2xxxxxxx';
    $data['phone2_2']='2yyyyyyy';
    $data['phone2_3']='2zzzzzzz';
    $data['email_opc1']=1;
    $data['email1']='1carohurtado2010@hotmail.com';
    $data['email_opc2']=2;
    $data['email2']='2carohurtado2010@hotmail.com';

    $data['rn_licence']="example RN";
    $data['prov_course']='10/09/2020';
    $data['course_director']='Omar Martínez';
    $data['location']='Universidad de Guanajuato';
    $data['application']=2;
    $data['p1']='xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx';
    $data['p2']='xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx';
    $data['p3']='xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx';
    $data['p4']='xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx';
    $data['p5']='xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx';
    $data['p6']='xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx';

    $this->mpdf->Instructor_Potential_Application_tncc('formatos_imprimir/tncc/v13.Instructor_Potential_Application_tncc.php',$data); 
} 

public function CANDIDATO_INSTRUCTOR_PACE_tncc() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf');
    $fecha_actual = new DateTime('NOW');
    $data = array();

    //---Variables
    $fecha_actual=$fecha_actual->format('d/m/Y');
    $sede_curso="Guanajuato, Gto.";           
    $ciudad_curso="Guanajuato";
    $estado_curso="Guanajuato";
    $dia1_curso="12";
    $dia2_curso="21";
    $mes_curso="Agosto";
    $director_curso="Omar Martínez Torres";
    $instructor="Omar Martínez Torres";   

    $data['fecha'] = $fecha_actual;
    $data['instructor'] = $instructor;
    $data['sede_curso'] = $sede_curso;
    $data['estado_curso']=$estado_curso;
    $data['ciudad_curso']=$ciudad_curso;
    $data['dia1_curso']=$dia1_curso;
    $data['dia2_curso']=$dia2_curso;
    $data['mes_curso']=$mes_curso;
    $data['director_curso']=$director_curso; 

    $this->mpdf->CANDIDATO_INSTRUCTOR_PACE_tncc('formatos_imprimir/tncc/v14.CANDIDATO_INSTRUCTOR_PACE_tncc.php',$data); 
} 

public function Formato_Remediales_tncc() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $datos = array(
        array('nombre' => 'Omar Martínez Torres', 'curso_or_fecha_sede' => '12/10/2020, Saltillo', 'curso_rem_fecha_sede' => '23/11/2020, Zacatecas', 'resultado'=>'Ninguno'),
        array('nombre' => 'Omar Martínez Torres', 'curso_or_fecha_sede' => '12/10/2020, Saltillo', 'curso_rem_fecha_sede' => '23/11/2020, Zacatecas', 'resultado'=>'Ninguno'),
        array('nombre' => 'Omar Martínez Torres', 'curso_or_fecha_sede' => '12/10/2020, Saltillo', 'curso_rem_fecha_sede' => '23/11/2020, Zacatecas', 'resultado'=>'Ninguno'),
        array('nombre' => 'Omar Martínez Torres', 'curso_or_fecha_sede' => '12/10/2020, Saltillo', 'curso_rem_fecha_sede' => '23/11/2020, Zacatecas', 'resultado'=>'Ninguno'),
        array('nombre' => 'Omar Martínez Torres', 'curso_or_fecha_sede' => '12/10/2020, Saltillo', 'curso_rem_fecha_sede' => '23/11/2020, Zacatecas', 'resultado'=>'Ninguno'),
        array('nombre' => 'Omar Martínez Torres', 'curso_or_fecha_sede' => '12/10/2020, Saltillo', 'curso_rem_fecha_sede' => '23/11/2020, Zacatecas', 'resultado'=>'Ninguno'),
        array('nombre' => 'Omar Martínez Torres', 'curso_or_fecha_sede' => '12/10/2020, Saltillo', 'curso_rem_fecha_sede' => '23/11/2020, Zacatecas', 'resultado'=>'Ninguno'),
        array('nombre' => 'Omar Martínez Torres', 'curso_or_fecha_sede' => '12/10/2020, Saltillo', 'curso_rem_fecha_sede' => '23/11/2020, Zacatecas', 'resultado'=>'Ninguno'),
        array('nombre' => 'Omar Martínez Torres', 'curso_or_fecha_sede' => '12/10/2020, Saltillo', 'curso_rem_fecha_sede' => '23/11/2020, Zacatecas', 'resultado'=>'Ninguno'),
        array('nombre' => 'Omar Martínez Torres', 'curso_or_fecha_sede' => '12/10/2020, Saltillo', 'curso_rem_fecha_sede' => '23/11/2020, Zacatecas', 'resultado'=>'Ninguno'),
        array('nombre' => 'Omar Martínez Torres', 'curso_or_fecha_sede' => '12/10/2020, Saltillo', 'curso_rem_fecha_sede' => '23/11/2020, Zacatecas', 'resultado'=>'Ninguno'),
        array('nombre' => 'Omar Martínez Torres', 'curso_or_fecha_sede' => '12/10/2020, Saltillo', 'curso_rem_fecha_sede' => '23/11/2020, Zacatecas', 'resultado'=>'Ninguno'),
        array('nombre' => 'Omar Martínez Torres', 'curso_or_fecha_sede' => '12/10/2020, Saltillo', 'curso_rem_fecha_sede' => '23/11/2020, Zacatecas', 'resultado'=>'Ninguno'),
        array('nombre' => 'Omar Martínez Torres', 'curso_or_fecha_sede' => '12/10/2020, Saltillo', 'curso_rem_fecha_sede' => '23/11/2020, Zacatecas', 'resultado'=>'Ninguno'),
        array('nombre' => 'Omar Martínez Torres', 'curso_or_fecha_sede' => '12/10/2020, Saltillo', 'curso_rem_fecha_sede' => '23/11/2020, Zacatecas', 'resultado'=>'Ninguno'),
    );

    $data['datos'] = $datos;
    $data['tam_reg_tabla']=13; 

    $this->mpdf->Formato_Remediales_tncc('formatos_imprimir/tncc/v15.Formato_Remediales_tncc.php',$data); 
} 

public function Instructor_Candidate_Instructor_Monitoring_Form_tncc() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf');
    $fecha_actual = new DateTime('NOW');
    $data = array(); 

    $data['no_curso'] = 89475; 
    $data['name']='Omar Martinez Martinez';
    $data['dig']=1234;
    $data['name_evaluador']='Carolina Hurtado Villegas';
    $data['date_ic']='12/10/2020';
    $data['date_course']='02/08/2020';
    $data['date_ic_original']='10/09/2020';
    $data['expe_moni']=2;
    $data['fecha_actual']=$fecha_actual->format('d/m/Y');   

    $this->mpdf->Instructor_Candidate_Instructor_Monitoring_Form_tncc('formatos_imprimir/tncc/v16.Instructor_Candidate_Instructor_Monitoring_Form_tncc.php',$data); 
} 

public function Reporte_Director_curso_tncc() 
{ 
    $this->load->model('curso');
    $this->load->library('Functions');  
    $this->load->library('Mpdf');
    $fecha_actual = new DateTime('NOW');
    $data = array(); 

    $data['fecha_curso'] = '02/06/2020';
    $data['sede_curso'] = 'Guanajuato, Gto';
    $data['lugar_curso'] = 'C. Guanajuato, Gto';
    $data['instructores'] = array(
                                array('name' =>'Omar Martínez Martínez1dqdqw dfeqfwef fwefew', 
                                       'residencia'=>'Guanajuato, Gto',
                                       'especidalidad'=>'Cardiopulmonar ddewdewdew',
                                       'cargo'=>'Director de hospital'
                                ),
                                array('name' =>'Omar Martínez Martínez2', 
                                       'residencia'=>'Silao, Gto',
                                       'especidalidad'=>'Pediatria',
                                       'cargo'=>'Medico de hospital'
                                ),
                    
                            );
    $data['Proveedores_capacitar']=12;
    $data['Proveedores_capacitados']=10;
    $data['capa_gineco']=6;
    $data['capa_generales']=2;
    $data['capa_urgen']=3;
    $data['capa_enferm']=4;
    $data['capa_intern']=5;
    $data['capa_inten']=1;
    $data['capa_anes']=7;
    $data['capa_tum']=8;
    $data['capa_tem']=9;

    $data['provee_apro_tteorico']=86;
    $data['provee_aprob_pteorico']='95%';
    $data['provee_apro_tpractico']=79;
    $data['provee_aprob_ppractico']='80%';

    $data['provee_repro_tteorico']=3;
    $data['provee_reprob_pteorico']='4%';
    $data['provee_repro_tpractico']=10;
    $data['provee_reprob_ppractico']='15%';

    $data['candidatos_inst'] = array(
                                array('name' =>'Omar Martínez Martínez1', 
                                       'puntajet'=>'90%',
                                       'puntajep'=>'80%'                                     
                                ),
                                array('name' =>'Omar Martínez Martínez2', 
                                       'puntajet'=>'90%',
                                       'puntajep'=>'80%'                                     
                                ),
                               
                               
                            );    

    $data['aulas']=0;
    $data['aulas_obs']="Podrian mejorara";
    $data['proy']=0;
    $data['proy_obs']="Podrian mejorarp";
    $data['seña']=0;
    $data['seña_obs']="Podrian mejorars";
    $data['venti']=0;
    $data['venti_obs']="Podrian mejorarv";
    
    $data['compu_c']=1;
    $data['compu_f']=1;

    $data['pape']=1;    
    $data['manual_ent']=0;

    $data['nemo']=1;
    $data['nemo_falt']=25;

    $data['ponencias'] = array(
                                array('nombre' =>'ponencia numero1', 
                                       'apegado'=>1,
                                       'calidad'=>1                                     
                                ),
                                array('nombre' =>'ponencia numero2', 
                                       'apegado'=>0,
                                       'calidad'=>0                                     
                                ),
                                array('nombre' =>'ponencia numero3', 
                                       'apegado'=>1,
                                       'calidad'=>2                                     
                                ),
                                array('nombre' =>'ponencia numero1', 
                                       'apegado'=>1,
                                       'calidad'=>1                                     
                                ),
                                array('nombre' =>'ponencia numero2', 
                                       'apegado'=>0,
                                       'calidad'=>0                                     
                                ),
                                array('nombre' =>'ponencia numero3 fewfwefew fwefewf fwefwefewfe', 
                                       'apegado'=>1,
                                       'calidad'=>2                                     
                                ),
                                array('nombre' =>'ponencia numero1', 
                                       'apegado'=>1,
                                       'calidad'=>1                                     
                                ),
                                array('nombre' =>'ponencia numero2', 
                                       'apegado'=>0,
                                       'calidad'=>0                                     
                                ),
                                array('nombre' =>'ponencia numero3', 
                                       'apegado'=>1,
                                       'calidad'=>2                                     
                                ),
                          
                            );
    $data['obs_ponen']="Aqui van las observaciones de las ponencias, aqui van las observaciones de las ponencias";
    $data['mat_taller'] = array(
                                array('nombre' =>'taller numero1', 
                                       'completo'=>1,
                                       'faltante'=>'todo muy bien'                                     
                                ),
                                array('nombre' =>'taller numero2', 
                                       'completo'=>0,
                                       'faltante'=>'Falto material'                                  
                                ),
                                array('nombre' =>'taller numero3', 
                                       'completo'=>1,
                                       'faltante'=>'todo muy bien taller 3'                                    
                                ),
                          
                            );
    $data['coffee']=2;
    $data['comida']=2;
    $data['hotel']=2;
    $data['viaticos']=array(
                                array('nombre' =>'instructor numero1', 
                                       'viaticos'=>1,                                     
                                ),
                                array('nombre' =>'instructor numero2', 
                                       'viaticos'=>0,                                  
                                ),
                                array('nombre' =>'instructor numero3', 
                                       'viaticos'=>2,                                    
                                ),

                          
                            );
    $data['lugar_inst']='Guanajuato, Gto capital';
    $data['fecha_inst']='13/10/2020';
    $data['hora_inst']='09:00 am';
    $data['concepto']=array(1,0,1,1,1,0,0,1);
    $data['comentarios']='Aquí van los comentarios de la reunion de los instructores';
    $data['des_curso']='Aquí el desarrollo del curso';

    $data['dir_curso']='Blanca Estela Hurtado';
    $data['dir_esp']='Medico general con Especialidad en Cardiopulmonar';
    $data['fecha_actual']=$fecha_actual->format('d/m/Y'); 

    $data['controller'] = $this->functions; 

    $this->mpdf->Reporte_Director_curso_tncc('formatos_imprimir/tncc/v19.Reporte_Director_curso_tncc.php',$data); 
} 

public function ejemplo_reporte_logistica_tncc() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->ejemplo_reporte_logistica_tncc('formatos_imprimir/tncc/v20.ejemplo_reporte_logistica_tncc.php',$data); 
}



    



    
}