<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Functions {

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

  public function cardinales($num){
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

  public function aprobado_noaprobado($num){
      switch ($num) {
          case 0:$estatus="No aprobado";break;
          case 1:$estatus="Aprobado";break;
           
          default:$estatus=$num;break;
      }
      return $estatus;
  } 

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