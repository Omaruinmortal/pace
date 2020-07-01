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
        $this->load->model('curso');
        $this->load->model('admin');
        $this->load->model('avalador');
        $this->load->model('instructor');
        date_default_timezone_set('America/Mexico_City');
    }

    /*-------------------------------------------------------------------------------------
    ----------------------------------------Reportes ACLS---------------------------------*/

public function course_information_participants_acls() 
{     
    $this->load->library('Mpdf');
    $where = "";
    $datos = $this->curso->trae_curso($where);

    $lead_instructor='Omar Martinez';
    $id_lead_instructor='0085';
    $exp_card_date=new DateTime('2021-05-12');
    $tra_center="Escuela de Medicina de la UG";
    $id_tra_center='0010';
    $name_tra_center="Escuela de Medicina de la UG";
    $adress="C. Principal No.S/N";
    $city_sz="Guanajuato, 36000";
    $location_course="Escuela de Medicina de la UG";

    $data = array(); 
    $data['lead_instructor'] = $lead_instructor;
    $data['id_lead_instructor'] = $id_lead_instructor;
    $data['exp_card_date']=$exp_card_date->format('d/m/Y');
    $data['tra_center']=$tra_center;
    $data['name_tra_center']=$name_tra_center;
    $data['adress']=$adress;
    $data['city_sz']=$city_sz;
    $data['location_course']=$location_course;

    $this->mpdf->course_information_participants_acls('formatos_imprimir/acls/v1.course_information_participants_acls.php',$data); 
} 

public function Agenda_12_part_acls1() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->Agenda_12_part_acls1('formatos_imprimir/acls/v14.1Agenda_12_part_acls.php',$data); 
} 

public function Agenda_24_part_acls2() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->Agenda_24_part_acls2('formatos_imprimir/acls/v14.2Agenda_24_part_acls.php',$data); 
} 

public function monitorizacion_acls() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->monitorizacion_acls('formatos_imprimir/acls/v15.monitorizacion_acls.php',$data); 
} 

public function lista_comprobacion_via_aerea_acls() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->lista_comprobacion_via_aerea_acls('formatos_imprimir/acls/v22.lista_comprobacion_via_aerea_acls.php',$data); 
} 

public function Bls_alta_calidad_acls() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->Bls_alta_calidad_acls('formatos_imprimir/acls/v23.Bls_alta_calidad_acls.php',$data); 
} 

public function lista_comprobacion_aprendizaje_practica_acls() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->lista_comprobacion_aprendizaje_practica_acls('formatos_imprimir/acls/v24.lista_comprobacion_aprendizaje_practica_acls.php',$data); 
} 

public function lista_prueba_megacode_acls1() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->lista_prueba_megacode_acls1('formatos_imprimir/acls/v25.1lista_prueba_megacode_acls.php',$data); 
} 

public function lista_prueba_megacode_acls2() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->lista_prueba_megacode_acls2('formatos_imprimir/acls/v25.2lista_prueba_megacode_acls.php',$data); 
} 

public function lista_prueba_megacode_acls3() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->lista_prueba_megacode_acls3('formatos_imprimir/acls/v25.3lista_prueba_megacode_acls.php',$data); 
} 

public function lista_prueba_megacode_acls4() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->lista_prueba_megacode_acls4('formatos_imprimir/acls/v25.4lista_prueba_megacode_acls.php',$data); 
} 

public function lista_prueba_megacode_acls5() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->lista_prueba_megacode_acls5('formatos_imprimir/acls/v25.5lista_prueba_megacode_acls.php',$data); 
} 

public function lista_prueba_megacode_acls() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->lista_prueba_megacode_acls('formatos_imprimir/acls/v25.lista_prueba_megacode_acls.php',$data); 
} 

public function evaluacion_teorica_acls() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->evaluacion_teorica_acls('formatos_imprimir/acls/v38.evaluacion_teorica_acls.php',$data); 
} 

public function evaluacion_teorica_remediar_acls() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->evaluacion_teorica_remediar_acls('formatos_imprimir/acls/v39.evaluacion_teorica_remediar_acls.php',$data); 
} 

public function constancia_participacion_acls() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->constancia_participacion_acls('formatos_imprimir/acls/v40.constancia_participacion_acls.php',$data); 
} 

public function carta_PI_acls() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->carta_PI_acls('formatos_imprimir/acls/v41.carta_PI_acls.php',$data); 
} 

public function Instructor_Candidate_Aplication_acls() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->Instructor_Candidate_Aplication_acls('formatos_imprimir/acls/v42.Instructor_Candidate_Aplication_acls.php',$data); 
} 

public function Reporte_Director_curso_acls() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

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

    $this->mpdf->carta_compromiso_acls('formatos_imprimir/acls/v0.carta_compromiso_acls.php',$data); 
} 
    /*-------------------------------------------------------------------------------------
    ----------------------------------------Reportes ALSO---------------------------------*/


public function Course_information_also() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->Course_information_also('formatos_imprimir/also/v1.Course_information_also.php',$data); 
} 

public function course_participants_also() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->course_participants_also('formatos_imprimir/also/v2.course_participants_also.php',$data); 
} 

public function ejemplo_agenda_also() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->ejemplo_agenda_also('formatos_imprimir/also/v12.ejemplo_agenda_also.php',$data); 
} 

public function apendiceN_also() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->apendiceN_also('formatos_imprimir/also/v13.apendiceN_also.php',$data); 
} 

public function examen_destresas_also() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->examen_destresas_also('formatos_imprimir/also/v14.examen_destresas_also.php',$data); 
} 

public function evaluacion_teorica_also() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->evaluacion_teorica_also('formatos_imprimir/also/v15.evaluacion_teorica_also.php',$data); 
} 

public function Formato_Remediacion_also() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->Formato_Remediacion_also('formatos_imprimir/also/v17.Formato_Remediacion_also.php',$data); 
} 

public function evaluacion_teorica_remediar_also() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->evaluacion_teorica_remediar_also('formatos_imprimir/also/v18.evaluacion_teorica_remediar_also.php',$data); 
} 

public function constancia_participacion_also() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->constancia_participacion_also('formatos_imprimir/also/v19.constancia_participacion_also.php',$data); 
} 

public function carta_PI_also() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->carta_PI_also('formatos_imprimir/also/v20.carta_PI_also.php',$data); 
} 

public function Reporte_Director_curso_also() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

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
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->course_information_amls('formatos_imprimir/amls/v1.course_information_amls.php',$data); 
} 

public function course_participants_amls() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->course_participants_amls('formatos_imprimir/amls/v2.course_participants_amls.php',$data); 
} 

public function agenda_amls() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->agenda_amls('formatos_imprimir/amls/v13.agenda_amls.php',$data); 
} 

public function hoja_monitorizacion_amls() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->hoja_monitorizacion_amls('formatos_imprimir/amls/v14.hoja_monitorizacion_amls.php',$data); 
} 

public function AMLS_3E_amls() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->AMLS_3E_amls('formatos_imprimir/amls/v15.AMLS_3E_amls.php',$data); 
} 

public function AMLS_BLS_Pretest_amls() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->AMLS_BLS_Pretest_amls('formatos_imprimir/amls/v16.AMLS_BLS_Pretest_amls.php',$data); 
} 

public function AMLS_ALS_Pretest_amls() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->AMLS_ALS_Pretest_amls('formatos_imprimir/amls/v17.AMLS_ALS_Pretest_amls.php',$data); 
} 

public function AMLS_BLS_Post_Test_UK_amls() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->AMLS_BLS_Post_Test_UK_amls('formatos_imprimir/amls/v18.AMLS_BLS_Post_Test_UK_amls.php',$data); 
} 

public function AMLS_ALS_Post_Test_UK_amls() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->AMLS_ALS_Post_Test_UK_amls('formatos_imprimir/amls/v19.AMLS_ALS_Post_Test_UK_amls.php',$data); 
} 

public function evaluacion_practica_amls() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->evaluacion_practica_amls('formatos_imprimir/amls/v28.evaluacion_practica_amls.php',$data); 
} 

public function constancia_participacion_amls() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->constancia_participacion_amls('formatos_imprimir/amls/v31.constancia_participacion_amls.php',$data); 
} 

public function carta_PI_amls() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->carta_PI_amls('formatos_imprimir/amls/v32.carta_PI_amls.php',$data); 
} 

public function Reporte_Director_curso_amls() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

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
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->course_information_participants_bls('formatos_imprimir/bls/v1.course_information_participants_bls.php',$data); 
} 

public function Plantilla_Respuesta_bls() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->Plantilla_Respuesta_bls('formatos_imprimir/bls/v13.Plantilla_Respuesta_bls.php',$data); 
} 

public function agenda_bls() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->agenda_bls('formatos_imprimir/bls/v14.agenda_bls.php',$data); 
} 

public function monitorizacion_bls() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->monitorizacion_bls('formatos_imprimir/bls/v15.monitorizacion_bls.php',$data); 
} 

public function RCP_DEA_adultos_bls() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->RCP_DEA_adultos_bls('formatos_imprimir/bls/v20.RCP_DEA_adultos_bls.php',$data); 
} 

public function RCP_lactantes_bls() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->RCP_lactantes_bls('formatos_imprimir/bls/v21.RCP_lactantes_bls.php',$data); 
} 

public function evaluacion_teorica_bls() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->evaluacion_teorica_bls('formatos_imprimir/bls/v38.evaluacion_teorica_bls.php',$data); 
} 

public function evaluacion_teorica_cremediar_bls() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->evaluacion_teorica_cremediar_bls('formatos_imprimir/bls/v39.evaluacion_teorica_cremediar_bls.php',$data); 
} 

public function constancia_participacion_bls() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->constancia_participacion_bls('formatos_imprimir/bls/v40.constancia_participacion_bls.php',$data); 
} 

public function Carta_PI_bls() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->Carta_PI_bls('formatos_imprimir/bls/v41.Carta_PI_bls.php',$data); 
} 

public function Instructor_Candidate_Aplication_bls() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->Instructor_Candidate_Aplication_bls('formatos_imprimir/bls/v42.Instructor_Candidate_Aplication_bls.php',$data); 
} 

public function Reporte_Director_curso_bls() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

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
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->Course_information_blso('formatos_imprimir/blso/v1.Course_information_blso.php',$data); 
} 

public function course_participants_blso() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->course_participants_blso('formatos_imprimir/blso/v2.course_participants_blso.php',$data); 
} 

public function ejemplo_agenda_curso_blso() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->ejemplo_agenda_curso_blso('formatos_imprimir/blso/v12.ejemplo_agenda_curso_blso.php',$data); 
} 

public function apendiceN_blso() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->apendiceN_blso('formatos_imprimir/blso/v13.apendiceN_blso.php',$data); 
} 

public function evaluacion_teorica_blso() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->evaluacion_teorica_blso('formatos_imprimir/blso/v15.evaluacion_teorica_blso.php',$data); 
} 

public function participan_evaluation_form_blso() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->participan_evaluation_form_blso('formatos_imprimir/blso/v16.participan_evaluation_form_blso.php',$data); 
} 

public function formato_remediacion_blso() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->formato_remediacion_blso('formatos_imprimir/blso/v17.formato_remediacion_blso.php',$data); 
} 

public function evaluacion_teorica_remediar_blso() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->evaluacion_teorica_remediar_blso('formatos_imprimir/blso/v18.evaluacion_teorica_remediar_blso.php',$data); 
} 

public function contancia_participacion_blso() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->contancia_participacion_blso('formatos_imprimir/blso/v19.contancia_participacion_blso.php',$data); 
} 

public function evaluacion_curso_blso() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->evaluacion_curso_blso('formatos_imprimir/blso/v21.evaluacion_curso_blso.php',$data); 
} 

public function Reporte_Director_curso_blso() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

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
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->course_information_participants_heart('formatos_imprimir/heartsaver/v1.course_information_participants_heart.php',$data); 
} 

public function agenda_curso_heart() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->agenda_curso_heart('formatos_imprimir/heartsaver/v14.agenda_curso_heart.php',$data); 
} 

public function monitorizacion_heart() 
{       
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->monitorizacion_heart('formatos_imprimir/heartsaver/v15.monitorizacion_heart.php',$data); 
} 

public function RCP_DEA_adultos_heart() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->RCP_DEA_adultos_heart('formatos_imprimir/heartsaver/v16.RCP_DEA_adultos_heart.php',$data); 
} 

public function RCP_ninos_heart() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->RCP_ninos_heart('formatos_imprimir/heartsaver/v17.RCP_ninos_heart.php',$data); 
} 

public function RCP_lactantes_heart() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->RCP_lactantes_heart('formatos_imprimir/heartsaver/v18.RCP_lactantes_heart.php',$data); 
} 

public function primeros_auxilios_heart() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->primeros_auxilios_heart('formatos_imprimir/heartsaver/v19.primeros_auxilios_heart.php',$data); 
} 

public function evaluacion_teorica_heart() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->evaluacion_teorica_heart('formatos_imprimir/heartsaver/v38.evaluacion_teorica_heart.php',$data); 
} 

public function evaluacion_teorica_remediar_heart() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->evaluacion_teorica_remediar_heart('formatos_imprimir/heartsaver/v39.evaluacion_teorica_remediar_heart.php',$data); 
} 

public function constancia_participacion_heart() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->constancia_participacion_heart('formatos_imprimir/heartsaver/v40.constancia_participacion_heart.php',$data); 
} 

public function Carta_PI_heart() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->Carta_PI_heart('formatos_imprimir/heartsaver/v41.Carta_PI_heart.php',$data); 
} 

public function Instructor_Candidate_Aplication_heart() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->Instructor_Candidate_Aplication_heart('formatos_imprimir/heartsaver/v42.Instructor_Candidate_Aplication_heart.php',$data); 
} 

public function Reporte_Director_curso_heart() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

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
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->course_information_participants_pals('formatos_imprimir/pals/v1.course_information_participants_pals.php',$data); 
} 

public function agenda_curso_pals() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->agenda_curso_pals('formatos_imprimir/pals/v14.agenda_curso_pals.php',$data); 
} 

public function monitorizacion_pals() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->monitorizacion_pals('formatos_imprimir/pals/v15.monitorizacion_pals.php',$data); 
} 

public function Manejo_via_aerea_pals() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->Manejo_via_aerea_pals('formatos_imprimir/pals/v26.Manejo_via_aerea_pals.php',$data); 
} 

public function RCP_DEA_ninos_pals() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->RCP_DEA_ninos_pals('formatos_imprimir/pals/v27.RCP_DEA_ninos_pals.php',$data); 
} 

public function RCP_lactantes_pals() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->RCP_lactantes_pals('formatos_imprimir/pals/v28.RCP_lactantes_pals.php',$data); 
} 

public function megacode_pals() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->megacode_pals('formatos_imprimir/pals/v29.megacode_pals.php',$data); 
} 

public function ritmo_terapia_electrica_pals() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->ritmo_terapia_electrica_pals('formatos_imprimir/pals/v30.ritmo_terapia_electrica_pals.php',$data); 
} 

public function acceso_vascular_pals() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->acceso_vascular_pals('formatos_imprimir/pals/v31.acceso_vascular_pals.php',$data); 
} 

public function prueba_escenarios_pals() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->prueba_escenarios_pals('formatos_imprimir/pals/v36.prueba_escenarios_pals.php',$data); 
} 

public function comprobacion_avance_curso_pals() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->comprobacion_avance_curso_pals('formatos_imprimir/pals/v37.comprobacion_avance_curso_pals.php',$data); 
} 

public function evaluacion_teorica_pals() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->evaluacion_teorica_pals('formatos_imprimir/pals/v38.evaluacion_teorica_pals.php',$data); 
} 

public function evaluacion_teorica_remediacion_pals() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->evaluacion_teorica_remediacion_pals('formatos_imprimir/pals/v39.evaluacion_teorica_remediacion_pals.php',$data); 
} 

public function constancia_participacion_pals() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->constancia_participacion_pals('formatos_imprimir/pals/v40.constancia_participacion_pals.php',$data); 
} 

public function Carta_PI_pals() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->Carta_PI_pals('formatos_imprimir/pals/v41.Carta_PI_pals.php',$data); 
} 

public function Instructor_Candidate_Aplication_pals() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->Instructor_Candidate_Aplication_pals('formatos_imprimir/pals/v42.Instructor_Candidate_Aplication_pals.php',$data); 
} 

public function Reportee_Director_curso_pals() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->Reportee_Director_curso_pals('formatos_imprimir/pals/v45.Reportee_Director_curso_pals.php',$data); 
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
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->course_information_participants_pears('formatos_imprimir/pears/v1.course_information_participants_pears.php',$data); 
} 

public function agenda_curso_pears() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->agenda_curso_pears('formatos_imprimir/pears/v14.agenda_curso_pears.php',$data); 
} 

public function monitorizacion_pears() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->monitorizacion_pears('formatos_imprimir/pears/v15.monitorizacion_pears.php',$data); 
} 

public function evaluacion_teorica_pears() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->evaluacion_teorica_pears('formatos_imprimir/pears/v38.evaluacion_teorica_pears.php',$data); 
} 

public function evaluacion_teorica_remediacion_pears() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->evaluacion_teorica_remediacion_pears('formatos_imprimir/pears/v39.evaluacion_teorica_remediacion_pears.php',$data); 
} 

public function constancia_participacion_pears() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->constancia_participacion_pears('formatos_imprimir/pears/v40.constancia_participacion_pears.php',$data); 
} 

public function Carta_PI_pears() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->Carta_PI_pears('formatos_imprimir/pears/v41.Carta_PI_pears.php',$data); 
} 

public function Instructor_Candidate_Aplication_pears() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->Instructor_Candidate_Aplication_pears('formatos_imprimir/pears/v42.Instructor_Candidate_Aplication_pears.php',$data); 
} 

public function Reporte_Director_curso_pears() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

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
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->course_information_phtls('formatos_imprimir/phtls/v1.course_information_phtls.php',$data); 
} 

public function course_participants_phtls() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->course_participants_phtls('formatos_imprimir/phtls/v2.course_participants_phtls.php',$data); 
} 

public function agenda_phtls() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->agenda_phtls('formatos_imprimir/phtls/v13.agenda_phtls.php',$data); 
} 

public function hoja_monitorizacion_phtls() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->hoja_monitorizacion_phtls('formatos_imprimir/phtls/v14.hoja_monitorizacion_phtls.php',$data); 
} 

public function valores_iniciales_caso_1_phtls() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->valores_iniciales_caso_1_phtls('formatos_imprimir/phtls/v20.valores_iniciales_caso_1_phtls.php',$data); 
} 

public function valores_iniciales_caso_2_phtls() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->valores_iniciales_caso_2_phtls('formatos_imprimir/phtls/v21.valores_iniciales_caso_2_phtls.php',$data); 
} 

public function estacion_evaluacion_final_caso_1A_phtls() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->estacion_evaluacion_final_caso_1A_phtls('formatos_imprimir/phtls/v22.estacion_evaluacion_final_caso_1A_phtls.php',$data); 
} 

public function estacion_evaluacion_final_caso_1B_phtls() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->estacion_evaluacion_final_caso_1B_phtls('formatos_imprimir/phtls/v23.estacion_evaluacion_final_caso_1B_phtls.php',$data); 
} 

public function estacion_evaluacion_final_caso_2A_phtls() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->estacion_evaluacion_final_caso_2A_phtls('formatos_imprimir/phtls/v24.estacion_evaluacion_final_caso_2A_phtls.php',$data); 
} 

public function estacion_evaluacion_final_caso_2B_phtls() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->estacion_evaluacion_final_caso_2B_phtls('formatos_imprimir/phtls/v25.estacion_evaluacion_final_caso_2B_phtls.php',$data); 
} 

public function estacion_evaluacion_final_caso_3A_phtls() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->estacion_evaluacion_final_caso_3A_phtls('formatos_imprimir/phtls/v26.estacion_evaluacion_final_caso_3A_phtls.php',$data); 
} 

public function estacion_evaluacion_final_caso_3B_phtls() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->estacion_evaluacion_final_caso_3B_phtls('formatos_imprimir/phtls/v27.estacion_evaluacion_final_caso_3B_phtls.php',$data); 
} 

public function check_liste_evaluacion_practica_phtls() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->check_liste_evaluacion_practica_phtls('formatos_imprimir/phtls/v28.check_liste_evaluacion_practica_phtls.php',$data); 
} 

public function Pos_evaluacion_teorica_phtls() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->Pos_evaluacion_teorica_phtls('formatos_imprimir/phtls/v29.Pos_evaluacion_teorica_phtls.php',$data); 
} 

public function hoja_respuestas_teorica_phtls() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->hoja_respuestas_teorica_phtls('formatos_imprimir/phtls/v30.hoja_respuestas_teorica_phtls.php',$data); 
} 

public function constancia_participacion_phtls() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->constancia_participacion_phtls('formatos_imprimir/phtls/v31.constancia_participacion_phtls.php',$data); 
} 

public function carta_PI_phtls() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->carta_PI_phtls('formatos_imprimir/phtls/v32.carta_PI_phtls.php',$data); 
} 

public function Reporte_Director_curso_phtls() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

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
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->registro_instructores_PACE_SONO_sono('formatos_imprimir/sono/v1.registro_instructores_PACE_SONO_sono.php',$data); 
} 

public function registro_participantes_PACE_SONO_sono() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->registro_participantes_PACE_SONO_sono('formatos_imprimir/sono/v2.registro_participantes_PACE_SONO_sono.php',$data); 
} 

public function Convocatoria_ALSO_sono() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->Convocatoria_ALSO_sono('formatos_imprimir/sono/v9.Convocatoria_ALSO_sono.php',$data); 
} 

public function Plantilla_Respuesta_sono() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->Plantilla_Respuesta_sono('formatos_imprimir/sono/v10.Plantilla_Respuesta_sono.php',$data); 
} 

public function AGENDA_sono() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->AGENDA_sono('formatos_imprimir/sono/v11.AGENDA_sono.php',$data); 
} 

public function Examen_imagenes_PACE_SONO_sono() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->Examen_imagenes_PACE_SONO_sono('formatos_imprimir/sono/v13.Examen_imagenes_PACE_SONO_sono.php',$data); 
} 

public function Examen_teorico_PACE_SONO_sono() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->Examen_teorico_PACE_SONO_sono('formatos_imprimir/sono/v14.Examen_teorico_PACE_SONO_sono.php',$data); 
} 

public function formato_remediaciones_PACE_SONO_sono() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->formato_remediaciones_PACE_SONO_sono('formatos_imprimir/sono/v15.formato_remediaciones_PACE_SONO_sono.php',$data); 
} 

public function Tarjeta_PACE_SONO_Basico_sono() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->Tarjeta_PACE_SONO_Basico_sono('formatos_imprimir/sono/v16.Tarjeta_PACE_SONO_Basico_sono.php',$data); 
} 

public function Candidato_instructor_PACE_SONO_sono() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->Candidato_instructor_PACE_SONO_sono('formatos_imprimir/sono/v17.Candidato_instructor_PACE_SONO_sono.php',$data); 
} 

public function Reporte_Director_curso_sono() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

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
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->Revision_posterior_curso_tncc1('formatos_imprimir/tncc/v1.1Revision_posterior_curso_tncc.php',$data); 
} 

public function carta_bienvenida_curso_tncc() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->carta_bienvenida_curso_tncc('formatos_imprimir/tncc/v1.carta_bienvenida_curso_tncc.php',$data); 
} 

public function Final_Faculty_Roster_tncc() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->Final_Faculty_Roster_tncc('formatos_imprimir/tncc/v2.Final_Faculty_Roster_tncc.php',$data); 
} 

public function Lista_Instructores_tncc() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->Lista_Instructores_tncc('formatos_imprimir/tncc/v3.Lista_Instructores_tncc.php',$data); 
} 

public function Lista_Participantes_tncc() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->Lista_Participantes_tncc('formatos_imprimir/tncc/v4.Lista_Participantes_tncc.php',$data); 
} 

public function Resumen_Calificaciones_tncc() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->Resumen_Calificaciones_tncc('formatos_imprimir/tncc/v5.Resumen_Calificaciones_tncc.php',$data); 
} 

public function Agenda_tncc() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->Agenda_tncc('formatos_imprimir/tncc/v6.Agenda_tncc.php',$data); 
} 

public function REGISTRO_UNICO_PARTICIPANTES_tncc() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->REGISTRO_UNICO_PARTICIPANTES_tncc('formatos_imprimir/tncc/v7.REGISTRO_UNICO_PARTICIPANTES_tncc.php',$data); 
} 

public function CARTA_COMPROMISO_tncc() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->CARTA_COMPROMISO_tncc('formatos_imprimir/tncc/v8.CARTA_COMPROMISO_tncc.php',$data); 
} 

public function Estacion_Examen_1_tncc() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->Estacion_Examen_1_tncc('formatos_imprimir/tncc/v9.Estacion_Examen_1_tncc.php',$data); 
} 

public function Estacion_Examen_2_tncc() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->Estacion_Examen_2_tncc('formatos_imprimir/tncc/v10.Estacion_Examen_2_tncc.php',$data); 
} 

public function CASOS_PET_ABCDEF_tncc() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->CASOS_PET_ABCDEF_tncc('formatos_imprimir/tncc/v11.CASOS_PET_ABCDEF_tncc.php',$data); 
} 

public function CASOS_VIA_AEREA_ABCD_tncc() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->CASOS_VIA_AEREA_ABCD_tncc('formatos_imprimir/tncc/v12.CASOS_VIA_AEREA_ABCD_tncc.php',$data); 
} 

public function Instructor_Potential_Application_tncc() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->Instructor_Potential_Application_tncc('formatos_imprimir/tncc/v13.Instructor_Potential_Application_tncc.php',$data); 
} 

public function CANDIDATO_INSTRUCTOR_PACE_tncc() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->CANDIDATO_INSTRUCTOR_PACE_tncc('formatos_imprimir/tncc/v14.CANDIDATO_INSTRUCTOR_PACE_tncc.php',$data); 
} 

public function Formato_Remediales_tncc() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->Formato_Remediales_tncc('formatos_imprimir/tncc/v15.Formato_Remediales_tncc.php',$data); 
} 

public function Instructor_Candidate_Instructor_Monitoring_Form_tncc() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

    $this->mpdf->Instructor_Candidate_Instructor_Monitoring_Form_tncc('formatos_imprimir/tncc/v16.Instructor_Candidate_Instructor_Monitoring_Form_tncc.php',$data); 
} 

public function Reporte_Director_curso_tncc() 
{ 
    $this->load->model('curso'); 
    $this->load->library('Mpdf'); 
    $data = array(); 
    $data['fecha_sede'] = '02/06/2020 Guanajuato REPM'; 
    $data['nombre'] = 'Omar Martínez Torres'; 
    $data['curso'] = 'ACLS'; 
    $data['nombre_participante'] = 'Omaru Martínez Torres'; 

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