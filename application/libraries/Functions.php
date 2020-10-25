<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Functions{
   protected $ci;
   
   function __construct(){
      $this->ci =& get_instance();
      $this->ci->load->model('main');
      	$this->ci->load->model('admin');
      	$this->ci->load->model('avalador');
      	$this->ci->load->model('curso');
      	$this->ci->load->model('instructor');
      	$this->ci->load->model('cartel');
      	$this->ci->load->model('curso_solicitado');
        $this->ci->load->model('participante'); 
   }   


/*--------Busquedas en de participantes---------------------------------------------------------------------------------------------------------------------------------------*/
 
    /*--------Retorna lista de participantes de un curso ---------------------------------------------------------------------------------------------------------------------------
    ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
    public function get_data_participantes($curso=0){
        $where = "id_curso=".$curso;
        $buscar_datos_pdf = $this->ci->participante->trae_participantes($where);
        return $buscar_datos_pdf;
    }  

    /*--------Retorna los datos generales de un participante ---------------------------------------------------------------------------------------------------------------------------
    ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
    public function get_data_participante($participante, $curso){
        $where = "id_participante=".$participante." and id_curso=".$curso;
        $buscar_datos_pdf = $this->ci->participante->trae_un_participantes($where);
    
        if(!empty($buscar_datos_pdf)) {
            $name = ucwords(strtolower($buscar_datos_pdf->nombre." ".$buscar_datos_pdf->primer_apellido." ".$buscar_datos_pdf->segundo_apellido));
            $correo = $buscar_datos_pdf->correo;
            $tel = $buscar_datos_pdf->telefono;            
    
        }else{
            $name = "Sin dato";
            $correo = "Sin dato";
            $tel = "Sin dato";
    
        }
    
        $datos = array(
            'name' => $name,
            'correo' => $correo,
            'tel' => $tel,           
        );        
    
        return $datos;
    }

/*--------Busquedas en de cursos---------------------------------------------------------------------------------------------------------------------------------------*/
    /*--------Retorna los datos de un curso en específico---------------------------------------------------------------------------------------------------------------------------
    ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
    public function get_data_curso($curso){
        $where = "id_curso_solicitado=".$curso;
        $buscar_datos_pdf = $this->ci->curso_solicitado->trae_curso_solicitado($where);
    
        return $buscar_datos_pdf;        
    }

/*--------Fechas generales---------------------------------------------------------------------------------------------------------------------------------------*/
    /*--------Retorna la fecha del servidor---------------------------------------------------------------------------------------------------------------------------
    ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
    public function getDate(){
        $fecha_actual = $this->ci->admin->trae_fecha_actual("Select curdate() as date_actual");
        $fecha_actual = new DateTime($fecha_actual[0]->date_actual);
        $fecha_actual = $fecha_actual->format('d/m/Y');
 
        return $fecha_actual;       
    }

    /*--------Retorna la fecha completa (dd de mm de yyyy)---------------------------------------------------------------------------------------------------------------------------
    ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
    public function date_format_complete($date){
        $fecha = (explode("-",$date));
        $fecha_completa = $fecha[0]." de ".$this->meses_letra($fecha[1])." de ".$fecha[2];
    
        return $fecha_completa;      
    
    }

    /*--------Retorna el mes en letra---------------------------------------------------------------------------------------------------------------------------
    ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
    public function meses_letra($mes){
        switch($mes){
            case '01': $mes = "Enero"; break;
            case '02': $mes = "Febrero"; break;
            case '03': $mes = "Marzo"; break;
            case '04': $mes = "Abril"; break;
            case '05': $mes = "Mayo"; break;
            case '06': $mes = "Junio"; break;
            case '07': $mes = "Julio"; break;
            case '08': $mes = "Agosto"; break;
            case '09': $mes = "Septiembre"; break;
            case '10': $mes = "Octubre"; break;
            case '11': $mes = "Noviembre"; break;
            case '12': $mes = "Diciembre"; break;
            default: $mes = $mes; break;
        }
        return $mes;
    
    }

/*--------Obtiene el nombre de los puntos cardinales---------------------------------------------------------------------------------------------------------------------------
  ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/ 
    public function cardinales($num=0){
        switch ($num) {
            case 1:$cardinal="Primer";break;
            case 2:$cardinal="Segundo";break;
            case 3:$cardinal="Tercer";break;
            case 4:$cardinal="Cuarto";break;
            case 5:$cardinal="Quinto";break;
            case 6:$cardinal="Sexto";break;
            case 7:$cardinal="Séptimo";break;
            case 8:$cardinal="Octavo";break;
            case 9:$cardinal="Noveno";break;
            case 10:$cardinal="Décimo";break;        
            default:$cardinal=$num;break;
        }
        return $cardinal;
    }

/*--------Positions views---------------------------------------------------------------------------------------------------------------------------
------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
    public function opcion($opc, $opc2){
        switch ($opc2) {
            case 0:
               switch ($opc) {
                   case 0:
                      $opcion="X";
                   break;
                   case 1:
                      $opcion="";
                   break;
                   case 2:
                      $opcion="";
                   break;   
               }
            break;

            case 1:
                switch ($opc) {
                   case 0:
                      $opcion="";
                   break;
                   case 1:
                      $opcion="X";
                   break;
                   case 2:
                      $opcion="";
                }
            break;   
            case 2:
                switch ($opc) {
                   case 0:
                      $opcion="";
                   break;
                   case 1:
                      $opcion="";
                   break;
                   case 2:
                      $opcion="X";
                   break;   
               }
            break;
        }
        return $opcion;
    }


/*--------Valida si un valor es aprobado o reprobado---------------------------------------------------------------------------------------------------------------------------
------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
    public function aprobado_noaprobado($num=3){
        switch ($num) {
            case 0:$estatus="No aprobado";break;
            case 1:$estatus="Aprobado";break;
            case 3:$estatus="";break;
            default:$estatus=$num;break;
        }
        return $estatus;
    } 

/*--------Retorna un valor SI o NO dependiendo de la participación---------------------------------------------------------------------------------------------------------------------------
------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
    public function participa_sino($num){
        switch ($num) {
            case 0:$estatus="Si";break;
            case 1:$estatus="No";break;
             
            default:$estatus=$num;break;
        }
        return $estatus;
    }
}
?>