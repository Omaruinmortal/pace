<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**


* CodeIgniter PDF Library MPDF
 *
 * Generate PDF's in your CodeIgniter applications.
 *
 * @package         CodeIgniter
 * @subpackage      Libraries
 * @category        Libraries
 * @author          Chris Harvey
 * @license         MIT License
 * @link            https://github.com/chrisnharvey/CodeIgniter-  PDF-Generator-Library
*/

require_once FCPATH . 'vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ .'/tmp']);

//use Dompdf\Dompdf;
class Mpdf
{
/**
 * Get an instance of CodeIgniter
 *
 * @access  protected
 * @return  void
 */
	protected function ci()
	{
	    return get_instance();
	}

/**
 * Load a CodeIgniter view into domPDF
 *
 * @access  public
 * @param   string  $view The view to load
 * @param   array   $data The view data
 * @return  void
 */

	public function course_information_participants_acls($view, $data = array()) 
	{

    /*-------------------------------------------------------------------------------------
    ----------------------------------------MPDF ACLS---------------------------------*/
    
	    
	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'letter', 
	    'orientation' => 'L' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 	

	    $tam_reg_tabla=$data['tam_reg_tabla_2'];
	    $pages=ceil(count($data['participantes'])/$tam_reg_tabla);
	    
	    $pagecount = $mpdf->SetSourceFile('assets/media/acls/1.course_information_participants_acls.pdf');

	    $stylesheet = file_get_contents('assets/css/style_pdf/acls/s1.course_information_participants_acls.css');

	    for ($i=1; $i <= $pagecount; $i++) {
	        $data['opc']=$i; 

	    	if ($i==1) {
	    		$html = $this->ci()->load->view($view, $data, TRUE);
	    		$tplId = $mpdf->ImportPage($i);
	    		$mpdf->UseTemplate($tplId);
	    		$mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	            $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    	}else{
	    		for ($y=0; $y<$pages; $y++) {	    				    			
	    			$data['veces']=$y;
	    			$tplId = $mpdf->ImportPage(2);
	    			$mpdf->SetPageTemplate($tplId); 
	    			$html = $this->ci()->load->view($view, $data, TRUE);
	    		    $mpdf->AddPage();
                    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
                    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
                }
            }
        }

	    $mpdf->Output();
	    
	} 

	public function Agenda_12_part_acls1($view, $data = array()) 
	{

	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'A4', 
	    'orientation' => 'P' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();

	    $pagecount = $mpdf->SetSourceFile('assets/media/acls/14.1Agenda_12_part_acls.pdf');
	    $stylesheet = file_get_contents('assets/css/style_pdf/acls/s14.1Agenda_12_part_acls.css');

	    for ($i=1; $i <= $pagecount ; $i++) {
	        $data['opc']=$i; 

	    	if ($i==1) {
	    		$html = $this->ci()->load->view($view, $data, TRUE);
	    		$tplId = $mpdf->ImportPage($i);
	    		$mpdf->UseTemplate($tplId);
	    		$mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	            $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    	}else{ 
	    			$tplId = $mpdf->ImportPage($i);
	    			$mpdf->SetPageTemplate($tplId); 
	    			$html = $this->ci()->load->view($view, $data, TRUE);
	    		    $mpdf->AddPage();
                    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
                    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);                
            }
        }
	    
	    $mpdf->Output();
	} 

	public function Agenda_24_part_acls2($view, $data = array()) 
	{

	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'A4', 
	    'orientation' => 'P' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	    
	    // Add First page 

	    $pagecount = $mpdf->SetSourceFile('assets/media/acls/14.2Agenda_24_part_acls.pdf');
	    $stylesheet = file_get_contents('assets/css/style_pdf/acls/s14.2Agenda_24_part_acls.css');

	    for ($i=1; $i <= $pagecount ; $i++) {
	        $data['opc']=$i;

	        if ($i==1) {
	    		$html = $this->ci()->load->view($view, $data, TRUE);
	    		$tplId = $mpdf->ImportPage($i);
	    		$mpdf->UseTemplate($tplId);
	    		$mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	            $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    	}else{ 
	    			$tplId = $mpdf->ImportPage($i);
	    			$mpdf->SetPageTemplate($tplId); 
	    			$html = $this->ci()->load->view($view, $data, TRUE);
	    		    $mpdf->AddPage();
                    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
                    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);                
            }

	    }	    
	    $mpdf->Output();
	} 

	public function monitorizacion_acls($view, $data = array()) 
	{

	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'A4', 
	    'orientation' => 'P' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();	    
	    
	    $pagecount = $mpdf->SetSourceFile('assets/media/acls/15.monitorizacion_acls.pdf');
	    $stylesheet = file_get_contents('assets/css/style_pdf/acls/s15.monitorizacion_acls.css');

	    for ($i=1; $i <= $pagecount ; $i++) {
	        $data['opc']=$i;

	        if ($i==1) {
	    		$html = $this->ci()->load->view($view, $data, TRUE);
	    		$tplId = $mpdf->ImportPage($i);
	    		$mpdf->UseTemplate($tplId);
	    		$mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	            $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    	}else{ 
	    			$tplId = $mpdf->ImportPage($i);
	    			$mpdf->SetPageTemplate($tplId); 
	    			$html = $this->ci()->load->view($view, $data, TRUE);
	    		    $mpdf->AddPage();
                    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
                    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);                
            }

	    }
	    
	    $mpdf->Output();
	} 

	public function lista_comprobacion_via_aerea_acls($view, $data = array()) 
	{

	    $html = $this->ci()->load->view($view, $data, TRUE);
	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'A4', 
	    'orientation' => 'P' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	    
	    // Add First page 

	    $pagecount = $mpdf->SetSourceFile('assets/media/acls/22.lista_comprobacion_via_aerea_acls.pdf');
	    $tplId = $mpdf->ImportPage(1);
	    $mpdf->SetPageTemplate($tplId);
	    //$mpdf->AddPage('L');
	    $stylesheet = file_get_contents('assets/css/style_pdf/acls/s22.lista_comprobacion_via_aerea_acls.css');
	    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    
	    $mpdf->Output();
	} 

	public function Bls_alta_calidad_acls($view, $data = array()) 
	{

	    $html = $this->ci()->load->view($view, $data, TRUE);
	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'A4', 
	    'orientation' => 'P' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	    
	    // Add First page 

	    $pagecount = $mpdf->SetSourceFile('assets/media/acls/23.Bls_alta_calidad_acls.pdf');
	    $tplId = $mpdf->ImportPage(1);
	    $mpdf->SetPageTemplate($tplId);
	    //$mpdf->AddPage('L');
	    $stylesheet = file_get_contents('assets/css/style_pdf/acls/s23.Bls_alta_calidad_acls.css');
	    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    
	    $mpdf->Output();
	} 

	public function lista_comprobacion_aprendizaje_practica_acls($view, $data = array()) 
	{

	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'letter', 
	    'orientation' => 'P' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();


	    $pagecount = $mpdf->SetSourceFile('assets/media/acls/24.lista_comprobacion_aprendizaje_practica_acls.pdf');
	    $stylesheet = file_get_contents('assets/css/style_pdf/acls/s24.lista_comprobacion_aprendizaje_practica_acls.css');

	    for ($i=1; $i <= $pagecount ; $i++) {
	        $data['opc']=$i;

	        if ($i==1) {
	    		$html = $this->ci()->load->view($view, $data, TRUE);
	    		$tplId = $mpdf->ImportPage($i);
	    		$mpdf->UseTemplate($tplId);
	    		$mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	            $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    	}else{ 
	    			$tplId = $mpdf->ImportPage($i);
	    			$mpdf->SetPageTemplate($tplId); 
	    			$html = $this->ci()->load->view($view, $data, TRUE);
	    		    $mpdf->AddPage();
                    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
                    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);                
            }

	    }
	    
	    $mpdf->Output();
	} 

	public function lista_prueba_megacode_acls1($view, $data = array()) 
	{

	    $html = $this->ci()->load->view($view, $data, TRUE);
	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'A4', 
	    'orientation' => 'P' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	    
	    // Add First page 

	    $pagecount = $mpdf->SetSourceFile('assets/media/acls/25.1lista_prueba_megacode_acls.pdf');
	    $tplId = $mpdf->ImportPage(1);
	    $mpdf->SetPageTemplate($tplId);
	    //$mpdf->AddPage('L');
	    $stylesheet = file_get_contents('assets/css/style_pdf/acls/s25.1lista_prueba_megacode_acls.css');
	    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    
	    $mpdf->Output();
	} 

	public function lista_prueba_megacode_acls2($view, $data = array()) 
	{

	    $html = $this->ci()->load->view($view, $data, TRUE);
	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'A4', 
	    'orientation' => 'P' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	    
	    // Add First page 

	    $pagecount = $mpdf->SetSourceFile('assets/media/acls/25.2lista_prueba_megacode_acls.pdf');
	    $tplId = $mpdf->ImportPage(1);
	    $mpdf->SetPageTemplate($tplId);
	    //$mpdf->AddPage('L');
	    $stylesheet = file_get_contents('assets/css/style_pdf/acls/s25.2lista_prueba_megacode_acls.css');
	    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    
	    $mpdf->Output();
	} 

	public function lista_prueba_megacode_acls3($view, $data = array()) 
	{

	    $html = $this->ci()->load->view($view, $data, TRUE);
	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'A4', 
	    'orientation' => 'P' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	    
	    // Add First page 

	    $pagecount = $mpdf->SetSourceFile('assets/media/acls/25.3lista_prueba_megacode_acls.pdf');
	    $tplId = $mpdf->ImportPage(1);
	    $mpdf->SetPageTemplate($tplId);
	    //$mpdf->AddPage('L');
	    $stylesheet = file_get_contents('assets/css/style_pdf/acls/s25.3lista_prueba_megacode_acls.css');
	    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    
	    $mpdf->Output();
	} 

	public function lista_prueba_megacode_acls4($view, $data = array()) 
	{

	    $html = $this->ci()->load->view($view, $data, TRUE);
	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'A4', 
	    'orientation' => 'P' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	    
	    // Add First page 

	    $pagecount = $mpdf->SetSourceFile('assets/media/acls/25.4lista_prueba_megacode_acls.pdf');
	    $tplId = $mpdf->ImportPage(1);
	    $mpdf->SetPageTemplate($tplId);
	    //$mpdf->AddPage('L');
	    $stylesheet = file_get_contents('assets/css/style_pdf/acls/s25.4lista_prueba_megacode_acls.css');
	    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    
	    $mpdf->Output();
	} 

	public function lista_prueba_megacode_acls5($view, $data = array()) 
	{

	    $html = $this->ci()->load->view($view, $data, TRUE);
	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'A4', 
	    'orientation' => 'P' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	    
	    // Add First page 

	    $pagecount = $mpdf->SetSourceFile('assets/media/acls/25.5lista_prueba_megacode_acls.pdf');
	    $tplId = $mpdf->ImportPage(1);
	    $mpdf->SetPageTemplate($tplId);
	    //$mpdf->AddPage('L');
	    $stylesheet = file_get_contents('assets/css/style_pdf/acls/s25.5lista_prueba_megacode_acls.css');
	    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    
	    $mpdf->Output();
	} 

	public function lista_prueba_megacode_acls($view, $data = array()) 
	{

	    $html = $this->ci()->load->view($view, $data, TRUE);
	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'A4', 
	    'orientation' => 'P' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	    
	    // Add First page 

	    $pagecount = $mpdf->SetSourceFile('assets/media/acls/25.lista_prueba_megacode_acls.pdf');
	    $tplId = $mpdf->ImportPage(1);
	    $mpdf->SetPageTemplate($tplId);
	    //$mpdf->AddPage('L');
	    $stylesheet = file_get_contents('assets/css/style_pdf/acls/s25.lista_prueba_megacode_acls.css');
	    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    
	    $mpdf->Output();
	} 

	public function evaluacion_teorica_acls($view, $data = array()) 
	{
	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'A4', 
	    'orientation' => 'P' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();

	    $pagecount = $mpdf->SetSourceFile('assets/media/acls/38.evaluacion_teorica_acls.pdf');
	    $stylesheet = file_get_contents('assets/css/style_pdf/acls/s38.evaluacion_teorica_acls.css');

	    for ($i=1; $i <= $pagecount ; $i++) {
	        $data['opc']=$i;

	        if ($i==1) {
	    		$html = $this->ci()->load->view($view, $data, TRUE);
	    		$tplId = $mpdf->ImportPage($i);
	    		$mpdf->UseTemplate($tplId);
	    		$mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	            $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    	}else{ 
	    			$tplId = $mpdf->ImportPage($i);
	    			$mpdf->SetPageTemplate($tplId); 
	    			$html = $this->ci()->load->view($view, $data, TRUE);
	    		    $mpdf->AddPage();
                    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
                    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);                
            }

	    }
	    
	    $mpdf->Output();
	} 

	public function evaluacion_teorica_remediar_acls($view, $data = array()) 
	{

	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'A4', 
	    'orientation' => 'P' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse(); 

	    $pagecount = $mpdf->SetSourceFile('assets/media/acls/39.evaluacion_teorica_remediar_acls.pdf');
	    $stylesheet = file_get_contents('assets/css/style_pdf/acls/s39.evaluacion_teorica_remediar_acls.css');

	    for ($i=1; $i <= $pagecount ; $i++) {
	        $data['opc']=$i;

	        if ($i==1) {
	    		$html = $this->ci()->load->view($view, $data, TRUE);
	    		$tplId = $mpdf->ImportPage($i);
	    		$mpdf->UseTemplate($tplId);
	    		$mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	            $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    	}else{ 
	    			$tplId = $mpdf->ImportPage($i);
	    			$mpdf->SetPageTemplate($tplId); 
	    			$html = $this->ci()->load->view($view, $data, TRUE);
	    		    $mpdf->AddPage();
                    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
                    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);                
            }

	    }
	    
	    $mpdf->Output();
	} 

	public function constancia_participacion_acls($view, $data = array()) 
	{

	    $html = $this->ci()->load->view($view, $data, TRUE);
	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'A4', 
	    'orientation' => 'L' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	    
	    // Add First page 

	    $pagecount = $mpdf->SetSourceFile('assets/media/acls/40.constancia_participacion_acls.pdf');
	    $tplId = $mpdf->ImportPage(1);
	    $mpdf->SetPageTemplate($tplId);
	    //$mpdf->AddPage('L');
	    $stylesheet = file_get_contents('assets/css/style_pdf/acls/s40.constancia_participacion_acls.css');
	    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    
	    $mpdf->Output();
	} 

	public function carta_PI_acls($view, $data = array()) 
	{

	    $html = $this->ci()->load->view($view, $data, TRUE);
	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'A4', 
	    'orientation' => 'P' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	    
	    // Add First page 

	    $pagecount = $mpdf->SetSourceFile('assets/media/acls/41.carta_PI_acls.pdf');
	    $tplId = $mpdf->ImportPage(1);
	    $mpdf->SetPageTemplate($tplId);
	    //$mpdf->AddPage('L');
	    $stylesheet = file_get_contents('assets/css/style_pdf/acls/s41.carta_PI_acls.css');
	    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    
	    $mpdf->Output();
	} 

	public function Instructor_Candidate_Aplication_acls($view, $data = array()) 
	{

	    $html = $this->ci()->load->view($view, $data, TRUE);
	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'A4', 
	    'orientation' => 'P' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	    
	    // Add First page 

	    $pagecount = $mpdf->SetSourceFile('assets/media/acls/42.Instructor_Candidate_Aplication_acls.pdf');
	    $tplId = $mpdf->ImportPage(1);
	    $mpdf->SetPageTemplate($tplId);
	    //$mpdf->AddPage('L');
	    $stylesheet = file_get_contents('assets/css/style_pdf/acls/s42.Instructor_Candidate_Aplication_acls.css');
	    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    
	    $mpdf->Output();
	} 

	public function Reporte_Director_curso_acls($view, $data = array()) 
	{

	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'letter', 
	    'orientation' => 'P' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();

	    $pagecount = $mpdf->SetSourceFile('assets/media/acls/45.Reporte_Director_curso_acls.pdf');
	    $stylesheet = file_get_contents('assets/css/style_pdf/acls/s45.Reporte_Director_curso_acls.css');

	    for ($i=1; $i <= $pagecount ; $i++) {
	        $data['opc']=$i;

	        if ($i==1) {
	    		$html = $this->ci()->load->view($view, $data, TRUE);
	    		$tplId = $mpdf->ImportPage($i);
	    		$mpdf->UseTemplate($tplId);
	    		$mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	            $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    	}else{ 
	    			$tplId = $mpdf->ImportPage($i);
	    			$mpdf->SetPageTemplate($tplId); 
	    			$html = $this->ci()->load->view($view, $data, TRUE);
	    		    $mpdf->AddPage();
                    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
                    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);                
            }

	    }
	    
	    $mpdf->Output();
	} 

	public function ejemplo_reporte_logistica_acls($view, $data = array()) 
	{

	    $html = $this->ci()->load->view($view, $data, TRUE);
	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'A4', 
	    'orientation' => 'P' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	    
	    // Add First page 

	    $pagecount = $mpdf->SetSourceFile('assets/media/acls/46.ejemplo_reporte_logistica_acls.pdf');
	    $tplId = $mpdf->ImportPage(1);
	    $mpdf->SetPageTemplate($tplId);
	    //$mpdf->AddPage('L');
	    $stylesheet = file_get_contents('assets/css/style_pdf/acls/sejemplo_reporte_logistica_acls.css');
	    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    
	    $mpdf->Output();
	} 

	public function carta_compromiso_acls($view, $data = array()) 
	{

	    $html = $this->ci()->load->view($view, $data, TRUE);
	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'A4', 
	    'orientation' => 'P' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	    
	    // Add First page 

	    $pagecount = $mpdf->SetSourceFile('assets/media/acls/carta_compromiso_acls.pdf');
	    $tplId = $mpdf->ImportPage(1);
	    $mpdf->SetPageTemplate($tplId);
	    //$mpdf->AddPage('L');
	    $stylesheet = file_get_contents('assets/css/style_pdf/acls/style_carta_compromiso.css');
	    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    
	    $mpdf->Output();
	}


    /*-------------------------------------------------------------------------------------
    ----------------------------------------MPDF ALSO---------------------------------*/


	public function Course_information_also($view, $data = array()) 
	{

	    $html = $this->ci()->load->view($view, $data, TRUE);
	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'letter', 
	    'orientation' => 'L' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	    
	    // Add First page 

	    $pagecount = $mpdf->SetSourceFile('assets/media/also/1.Course_information_also.pdf');
	    $tplId = $mpdf->ImportPage(1);
	    $mpdf->SetPageTemplate($tplId);
	    //$mpdf->AddPage('L');
	    $stylesheet = file_get_contents('assets/css/style_pdf/also/s1.Course_information_also.css');
	    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    
	    $mpdf->Output();
	} 

	public function course_participants_also($view, $data = array()) 
	{

	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'letter', 
	    'orientation' => 'L' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	    
	 
	    $tam_reg_tabla=$data['tam_reg_tabla'];	    
        $pages=ceil(count($data['participantes'])/$tam_reg_tabla);
	    
	    $pagecount = $mpdf->SetSourceFile('assets/media/also/2.course_participants_also.pdf');
	    $stylesheet = file_get_contents('assets/css/style_pdf/also/s2.course_participants_also.css');
	    for ($i=1; $i <= 1; $i++) {
	        $data['opc']=$i; 

	    	if ($i==1) {
	    		for ($y=0; $y<$pages; $y++) {
	    			$data['veces']=$y;    		

	                if ($y==0) {
	            		$html = $this->ci()->load->view($view, $data, TRUE);
	    		        $tplId = $mpdf->ImportPage(1);
	    		        $mpdf->UseTemplate($tplId);	    		  
	            	}else{
	            		$html = $this->ci()->load->view($view, $data, TRUE);
	    			    $tplId = $mpdf->ImportPage(1);
	    			    $mpdf->SetPageTemplate($tplId);    			    
	    		        $mpdf->AddPage();                              
	            	}
	            	
	            	$mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
                    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);

	            }
	    	}
	    }
	    
	    $mpdf->Output();
	} 

	public function ejemplo_agenda_also($view, $data = array()) 
	{

	    $html = $this->ci()->load->view($view, $data, TRUE);
	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'letter', 
	    'orientation' => 'L' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	    
	    // Add First page 

	    $pagecount = $mpdf->SetSourceFile('assets/media/also/12.ejemplo_agenda_also.pdf');
	    $tplId = $mpdf->ImportPage(1);
	    $mpdf->SetPageTemplate($tplId);
	    //$mpdf->AddPage('L');
	    $stylesheet = file_get_contents('assets/css/style_pdf/also/s12.ejemplo_agenda_also.css');
	    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    
	    $mpdf->Output();
	} 

	public function apendiceN_also($view, $data = array()) 
	{

	    $html = $this->ci()->load->view($view, $data, TRUE);
	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'A4', 
	    'orientation' => 'P' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	    
	    // Add First page 

	    $pagecount = $mpdf->SetSourceFile('assets/media/also/13.apendiceN_also.pdf');
	    $tplId = $mpdf->ImportPage(1);
	    $mpdf->SetPageTemplate($tplId);
	    //$mpdf->AddPage('L');
	    $stylesheet = file_get_contents('assets/css/style_pdf/also/s13.apendiceN_also.css');
	    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    
	    $mpdf->Output();
	} 

	public function examen_destresas_also($view, $data = array()) 
	{

	    $html = $this->ci()->load->view($view, $data, TRUE);
	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'A4', 
	    'orientation' => 'P' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	    
	    // Add First page 

	    $pagecount = $mpdf->SetSourceFile('assets/media/also/14.examen_destresas_also.pdf');
	    $tplId = $mpdf->ImportPage(1);
	    $mpdf->SetPageTemplate($tplId);
	    //$mpdf->AddPage('L');
	    $stylesheet = file_get_contents('assets/css/style_pdf/also/s14.examen_destresas_also.css');
	    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    
	    $mpdf->Output();
	} 

	public function evaluacion_teorica_also($view, $data = array()) 
	{

	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'A4', 
	    'orientation' => 'P' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	    

	    $tam_reg_tabla=2;
	    $pages=ceil(count($data['nombre_participante'])/$tam_reg_tabla); 

	    $pagecount = $mpdf->SetSourceFile('assets/media/also/15.evaluacion_teorica_also.pdf');
	    $stylesheet = file_get_contents('assets/css/style_pdf/also/s15.evaluacion_teorica_also.css');

	    for ($i=1; $i <= $pagecount; $i++) {
	        $data['opc']=$i; 

	    	if ($i==1) {	    		
	            for ($y=0; $y<$pages; $y++) {
	            	$data['veces']=$y;

	            	if ($y==0) {
	            		$html = $this->ci()->load->view($view, $data, TRUE);
	    		        $tplId = $mpdf->ImportPage(1);
	    		        $mpdf->UseTemplate($tplId);
	    		        $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	                    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	            	}else{
	    			    $tplId = $mpdf->ImportPage(1);
	    			    $mpdf->SetPageTemplate($tplId); 
	    			    $html = $this->ci()->load->view($view, $data, TRUE);
	    		        $mpdf->AddPage();
                        $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
                        $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);      
	            	}

	            }
	    	}else{	    			    				    			
	    			$data['veces']=$y;
	    			$tplId = $mpdf->ImportPage($i);
	    			$mpdf->SetPageTemplate($tplId); 
	    			$html = $this->ci()->load->view($view, $data, TRUE);
	    		    $mpdf->AddPage();
                    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
                    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);    
            }
        }
	    
	    $mpdf->Output();
	} 

	public function Formato_Remediacion_also($view, $data = array()) 
	{
	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'letter', 
	    'orientation' => 'L' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	    
	    $tam_reg_tabla=$data['tam_reg_tabla'];	    
        $pages=ceil(count($data['datos'])/$tam_reg_tabla);
	    
	    $pagecount = $mpdf->SetSourceFile('assets/media/also/17.Formato_Remediacion_also.pdf');
	    $stylesheet = file_get_contents('assets/css/style_pdf/also/s17.Formato_Remediacion_also.css');

	    for ($i=1; $i <= $pagecount; $i++) {
	        $data['opc']=$i; 

	    	if ($i==1) {
	    		for ($y=0; $y<$pages; $y++) {
	    			$data['veces']=$y;    		

	                if ($y==0) {
	            		$html = $this->ci()->load->view($view, $data, TRUE);
	    		        $tplId = $mpdf->ImportPage(1);
	    		        $mpdf->UseTemplate($tplId);	    		  
	            	}else{
	            		$html = $this->ci()->load->view($view, $data, TRUE);
	    			    $tplId = $mpdf->ImportPage(1);
	    			    $mpdf->SetPageTemplate($tplId);    			    
	    		        $mpdf->AddPage();                              
	            	}

	            	$mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
                    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);

	            }
	    	}
	    }
	    
	    $mpdf->Output();
	} 

	public function evaluacion_teorica_remediar_also($view, $data = array()) 
	{

	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'A4', 
	    'orientation' => 'P' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	    

	    $tam_reg_tabla=2;
	    $pages=ceil(count($data['nombre_participante'])/$tam_reg_tabla); 

	    $pagecount = $mpdf->SetSourceFile('assets/media/also/18.evaluacion_teorica_remediar_also.pdf');
	    $stylesheet = file_get_contents('assets/css/style_pdf/also/s18.evaluacion_teorica_remediar_also.css');

	    for ($i=1; $i <= $pagecount; $i++) {
	        $data['opc']=$i; 

	    	if ($i==1) {	    		
	            for ($y=0; $y<$pages; $y++) {
	            	$data['veces']=$y;

	            	if ($y==0) {
	            		$html = $this->ci()->load->view($view, $data, TRUE);
	    		        $tplId = $mpdf->ImportPage(1);
	    		        $mpdf->UseTemplate($tplId);
	    		        $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	                    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	            	}else{
	    			    $tplId = $mpdf->ImportPage(1);
	    			    $mpdf->SetPageTemplate($tplId); 
	    			    $html = $this->ci()->load->view($view, $data, TRUE);
	    		        $mpdf->AddPage();
                        $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
                        $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);      
	            	}

	            }
	    	}else{	    			    				    			
	    			$data['veces']=$y;
	    			$tplId = $mpdf->ImportPage($i);
	    			$mpdf->SetPageTemplate($tplId); 
	    			$html = $this->ci()->load->view($view, $data, TRUE);
	    		    $mpdf->AddPage();
                    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
                    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);    
            }
        }
	    
	    $mpdf->Output();
	} 

	public function constancia_participacion_also($view, $data = array()) 
	{

	    $html = $this->ci()->load->view($view, $data, TRUE);
	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'letter', 
	    'orientation' => 'P' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	    
	    // Add First page 

	    $pagecount = $mpdf->SetSourceFile('assets/media/also/19.constancia_participacion_also.pdf');
	    $tplId = $mpdf->ImportPage(1);
	    $mpdf->SetPageTemplate($tplId);
	    //$mpdf->AddPage('L');
	    $stylesheet = file_get_contents('assets/css/style_pdf/also/s19.constancia_participacion_also.css');
	    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    
	    $mpdf->Output();
	} 

	public function carta_PI_also($view, $data = array()) 
	{

	    $html = $this->ci()->load->view($view, $data, TRUE);
	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'A4', 
	    'orientation' => 'P' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	    
	    // Add First page 

	    $pagecount = $mpdf->SetSourceFile('assets/media/also/20.carta_PI_also.pdf');
	    $tplId = $mpdf->ImportPage(1);
	    $mpdf->SetPageTemplate($tplId);
	    //$mpdf->AddPage('L');
	    $stylesheet = file_get_contents('assets/css/style_pdf/also/s20.carta_PI_also.css');
	    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    
	    $mpdf->Output();
	} 

	public function Reporte_Director_curso_also($view, $data = array()) 
	{

	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'A4', 
	    'orientation' => 'P' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	    
	  
	    $pagecount = $mpdf->SetSourceFile('assets/media/also/23.Reporte_Director_curso_also.pdf');
	    $stylesheet = file_get_contents('assets/css/style_pdf/also/s23.Reporte_Director_curso_also.css');

	    for ($i=1; $i <= $pagecount ; $i++) {
	        $data['opc']=$i;

	        if ($i==1) {
	    		$html = $this->ci()->load->view($view, $data, TRUE);
	    		$tplId = $mpdf->ImportPage($i);
	    		$mpdf->UseTemplate($tplId);
	    		$mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	            $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    	}else{ 
	    			$tplId = $mpdf->ImportPage($i);
	    			$mpdf->SetPageTemplate($tplId); 
	    			$html = $this->ci()->load->view($view, $data, TRUE);
	    		    $mpdf->AddPage();
                    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
                    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);                
            }

	    }
	    
	    $mpdf->Output();
	} 

	public function ejemplo_reporte_logistica_also($view, $data = array()) 
	{

	    $html = $this->ci()->load->view($view, $data, TRUE);
	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'A4', 
	    'orientation' => 'P' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	    
	    // Add First page 

	    $pagecount = $mpdf->SetSourceFile('assets/media/also/24.ejemplo_reporte_logistica_also.pdf');
	    $tplId = $mpdf->ImportPage(1);
	    $mpdf->SetPageTemplate($tplId);
	    //$mpdf->AddPage('L');
	    $stylesheet = file_get_contents('assets/css/style_pdf/also/sejemplo_reporte_logistica_also.css');
	    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    
	    $mpdf->Output();
	} 



    /*-------------------------------------------------------------------------------------
    ----------------------------------------MPDF AMLS---------------------------------*/


	public function course_information_amls($view, $data = array()) 
	{

	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'letter', 
	    'orientation' => 'L' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	 
	    $tam_reg_tabla=$data['tam_reg_tabla'];	    
        $pages=ceil(count($data['instructores'])/$tam_reg_tabla);
	    
	    $pagecount = $mpdf->SetSourceFile('assets/media/amls/1.course_information_amls.pdf');
	    $stylesheet = file_get_contents('assets/css/style_pdf/amls/s1.course_information_amls.css');

	    for ($i=1; $i <= $pagecount; $i++) {
	        $data['opc']=$i; 

	    	if ($i==1) {
	    		for ($y=0; $y<$pages; $y++) {
	    			$data['veces']=$y;    		

	                if ($y==0) {
	            		$html = $this->ci()->load->view($view, $data, TRUE);
	    		        $tplId = $mpdf->ImportPage(1);
	    		        $mpdf->UseTemplate($tplId);	    		  
	            	}else{
	            		$html = $this->ci()->load->view($view, $data, TRUE);
	    			    $tplId = $mpdf->ImportPage(1);
	    			    $mpdf->SetPageTemplate($tplId);    			    
	    		        $mpdf->AddPage();                              
	            	}
	            	
	            	$mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
                    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);

	            }
	    	}
	    }
	    
	    $mpdf->Output();
	} 

	public function course_participants_amls($view, $data = array()) 
	{

	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'letter', 
	    'orientation' => 'L' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();

	    $tam_reg_tabla=$data['tam_reg_tabla'];	    
        $pages=ceil(count($data['participantes'])/$tam_reg_tabla);
	    
	    $pagecount = $mpdf->SetSourceFile('assets/media/amls/2.course_participants_amls.pdf');
	    $stylesheet = file_get_contents('assets/css/style_pdf/amls/s2.course_participants_amls.css');
	    for ($i=1; $i <= 1; $i++) {
	        $data['opc']=$i; 

	    	if ($i==1) {
	    		for ($y=0; $y<$pages; $y++) {
	    			$data['veces']=$y;    		

	                if ($y==0) {
	            		$html = $this->ci()->load->view($view, $data, TRUE);
	    		        $tplId = $mpdf->ImportPage(1);
	    		        $mpdf->UseTemplate($tplId);	    		  
	            	}else{
	            		$html = $this->ci()->load->view($view, $data, TRUE);
	    			    $tplId = $mpdf->ImportPage(1);
	    			    $mpdf->SetPageTemplate($tplId);    			    
	    		        $mpdf->AddPage();                              
	            	}
	            	
	            	$mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
                    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);

	            }
	    	}
	    }
	    
	    $mpdf->Output();
	} 

	public function agenda_amls($view, $data = array()) { 

        $html = $this->ci()->load->view($view, $data, TRUE);
        $mpdf = new \Mpdf\Mpdf( 
        ['margin_top' =>0, 
        'margin_left' =>1, 
        'mode' => 'utf-8', 
        'margin_right' =>1, 
        'format' => [237,300], 
        'orientation' => 'P' , 
        'mirrorMargins' =>false]);// false para que no imprima a doble cara
        
        // Add First page
        $pagecount = $mpdf->SetSourceFile('assets/media/amls/13.agenda_amls.pdf');
        $tplId = $mpdf->ImportPage(1);
        $mpdf->SetPageTemplate($tplId);
        //$mpdf->AddPage('L');
        $stylesheet = file_get_contents('assets/css/style_pdf/amls/s13.agenda_amls.css');
        $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
        $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
        $mpdf->Output();
    } 

	public function hoja_monitorizacion_amls($view, $data = array()) 
	{

	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'letter', 
	    'orientation' => 'P' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	 
	    $pagecount = $mpdf->SetSourceFile('assets/media/amls/14.hoja_monitorizacion_amls.pdf');
	    $stylesheet = file_get_contents('assets/css/style_pdf/amls/s14.hoja_monitorizacion_amls.css');

	    for ($i=1; $i <= $pagecount ; $i++) {
	        $data['opc']=$i;

	        if ($i==1) {
	    		$html = $this->ci()->load->view($view, $data, TRUE);
	    		$tplId = $mpdf->ImportPage($i);
	    		$mpdf->UseTemplate($tplId);
	    		$mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	            $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    	}else{ 
	    			$tplId = $mpdf->ImportPage($i);
	    			$mpdf->SetPageTemplate($tplId); 
	    			$html = $this->ci()->load->view($view, $data, TRUE);
	    		    $mpdf->AddPage();
                    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
                    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);                
            }

	    }
	    
	    $mpdf->Output();
	} 

	public function AMLS_3E_amls($view, $data = array()) 
	{

	    $html = $this->ci()->load->view($view, $data, TRUE);
	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'A4', 
	    'orientation' => 'P' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	    
	    // Add First page 

	    $pagecount = $mpdf->SetSourceFile('assets/media/amls/15.AMLS_3E_amls.pdf');
	    $tplId = $mpdf->ImportPage(1);
	    $mpdf->SetPageTemplate($tplId);
	    //$mpdf->AddPage('L');
	    $stylesheet = file_get_contents('assets/css/style_pdf/amls/s15.AMLS_3E_amls.css');
	    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    
	    $mpdf->Output();
	} 

	public function AMLS_BLS_Pretest_amls($view, $data = array()) 
	{

	    $html = $this->ci()->load->view($view, $data, TRUE);
	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'A4', 
	    'orientation' => 'P' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	    
	    // Add First page 

	    $pagecount = $mpdf->SetSourceFile('assets/media/amls/16.AMLS_BLS_Pretest_amls.pdf');
	    $tplId = $mpdf->ImportPage(1);
	    $mpdf->SetPageTemplate($tplId);
	    //$mpdf->AddPage('L');
	    $stylesheet = file_get_contents('assets/css/style_pdf/amls/s16.AMLS_BLS_Pretest_amls.css');
	    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    
	    $mpdf->Output();
	} 

	public function AMLS_ALS_Pretest_amls($view, $data = array()) 
	{

	    $html = $this->ci()->load->view($view, $data, TRUE);
	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'A4', 
	    'orientation' => 'P' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	    
	    // Add First page 

	    $pagecount = $mpdf->SetSourceFile('assets/media/amls/17.AMLS_ALS_Pretest_amls.pdf');
	    $tplId = $mpdf->ImportPage(1);
	    $mpdf->SetPageTemplate($tplId);
	    //$mpdf->AddPage('L');
	    $stylesheet = file_get_contents('assets/css/style_pdf/amls/s17.AMLS_ALS_Pretest_amls.css');
	    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    
	    $mpdf->Output();
	} 

	public function AMLS_BLS_Post_Test_UK_amls($view, $data = array()) 
	{

	    $html = $this->ci()->load->view($view, $data, TRUE);
	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'A4', 
	    'orientation' => 'P' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	    
	    // Add First page 

	    $pagecount = $mpdf->SetSourceFile('assets/media/amls/18.AMLS_BLS_Post_Test_UK_amls.pdf');
	    $tplId = $mpdf->ImportPage(1);
	    $mpdf->SetPageTemplate($tplId);
	    //$mpdf->AddPage('L');
	    $stylesheet = file_get_contents('assets/css/style_pdf/amls/s18.AMLS_BLS_Post_Test_UK_amls.css');
	    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    
	    $mpdf->Output();
	} 

	public function AMLS_ALS_Post_Test_UK_amls($view, $data = array()) 
	{

	    $html = $this->ci()->load->view($view, $data, TRUE);
	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'A4', 
	    'orientation' => 'P' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	    
	    // Add First page 

	    $pagecount = $mpdf->SetSourceFile('assets/media/amls/19.AMLS_ALS_Post_Test_UK_amls.pdf');
	    $tplId = $mpdf->ImportPage(1);
	    $mpdf->SetPageTemplate($tplId);
	    //$mpdf->AddPage('L');
	    $stylesheet = file_get_contents('assets/css/style_pdf/amls/s19.AMLS_ALS_Post_Test_UK_amls.css');
	    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    
	    $mpdf->Output();
	} 

	public function evaluacion_practica_amls($view, $data = array()) 
	{

	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'letter', 
	    'orientation' => 'P' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	    
	    $pagecount = $mpdf->SetSourceFile('assets/media/amls/28.evaluacion_practica_amls.pdf');
	    $stylesheet = file_get_contents('assets/css/style_pdf/amls/s28.evaluacion_practica_amls.css');

	    for ($i=1; $i <= $pagecount ; $i++) {
	        $data['opc']=$i; 

	    	if ($i==1) {
	    		$html = $this->ci()->load->view($view, $data, TRUE);
	    		$tplId = $mpdf->ImportPage($i);
	    		$mpdf->UseTemplate($tplId);
	    		$mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	            $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    	}else{ 
	    			$tplId = $mpdf->ImportPage($i);
	    			$mpdf->SetPageTemplate($tplId); 
	    			$html = $this->ci()->load->view($view, $data, TRUE);
	    		    $mpdf->AddPage();
                    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
                    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);                
            }
        }
	    
	    $mpdf->Output();
	} 

	public function constancia_participacion_amls($view, $data = array()) 
	{

	    $html = $this->ci()->load->view($view, $data, TRUE);
	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'A4', 
	    'orientation' => 'L' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	    
	    // Add First page 

	    $pagecount = $mpdf->SetSourceFile('assets/media/amls/31.constancia_participacion_amls.pdf');
	    $tplId = $mpdf->ImportPage(1);
	    $mpdf->SetPageTemplate($tplId);
	    //$mpdf->AddPage('L');
	    $stylesheet = file_get_contents('assets/css/style_pdf/amls/s31.constancia_participacion_amls.css');
	    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    
	    $mpdf->Output();
	} 

	public function carta_PI_amls($view, $data = array()) 
	{

	    $html = $this->ci()->load->view($view, $data, TRUE);
	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'A4', 
	    'orientation' => 'P' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	    
	    // Add First page 

	    $pagecount = $mpdf->SetSourceFile('assets/media/amls/32.carta_PI_amls.pdf');
	    $tplId = $mpdf->ImportPage(1);
	    $mpdf->SetPageTemplate($tplId);
	    //$mpdf->AddPage('L');
	    $stylesheet = file_get_contents('assets/css/style_pdf/amls/s32.carta_PI_amls.css');
	    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    
	    $mpdf->Output();
	} 

	public function Reporte_Director_curso_amls($view, $data = array()) 
	{

	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'A4', 
	    'orientation' => 'P' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	   
	    $pagecount = $mpdf->SetSourceFile('assets/media/amls/35.Reporte_Director_curso_amls.pdf');
	    $stylesheet = file_get_contents('assets/css/style_pdf/amls/s35.Reporte_Director_curso_amls.css');

	    for ($i=1; $i <= $pagecount ; $i++) {
	        $data['opc']=$i;

	        if ($i==1) {
	    		$html = $this->ci()->load->view($view, $data, TRUE);
	    		$tplId = $mpdf->ImportPage($i);
	    		$mpdf->UseTemplate($tplId);
	    		$mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	            $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    	}else{ 
	    			$tplId = $mpdf->ImportPage($i);
	    			$mpdf->SetPageTemplate($tplId); 
	    			$html = $this->ci()->load->view($view, $data, TRUE);
	    		    $mpdf->AddPage();
                    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
                    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);                
            }

	    }
	    
	    $mpdf->Output();
	} 

	public function ejemplo_reporte_logistica_amls($view, $data = array()) 
	{

	    $html = $this->ci()->load->view($view, $data, TRUE);
	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'A4', 
	    'orientation' => 'P' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	    
	    // Add First page 

	    $pagecount = $mpdf->SetSourceFile('assets/media/amls/36.ejemplo_reporte_logistica_amls.pdf');
	    $tplId = $mpdf->ImportPage(1);
	    $mpdf->SetPageTemplate($tplId);
	    //$mpdf->AddPage('L');
	    $stylesheet = file_get_contents('assets/css/style_pdf/amls/sejemplo_reporte_logistica_amls.css');
	    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    
	    $mpdf->Output();
	}

    /*-------------------------------------------------------------------------------------
    ----------------------------------------MPDF BLS---------------------------------*/
  

	public function course_information_participants_bls($view, $data = array()) 
	{

	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'letter', 
	    'orientation' => 'L' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	    
	    $tam_reg_tabla=$data['tam_reg_tabla_2'];
	    $pages=ceil(count($data['participantes'])/$tam_reg_tabla);
	    
	    $pagecount = $mpdf->SetSourceFile('assets/media/bls/1.course_information_participants_bls.pdf');
	    $stylesheet = file_get_contents('assets/css/style_pdf/bls/s1.course_information_participants_bls.css');

	    for ($i=1; $i <= $pagecount; $i++) {
	        $data['opc']=$i; 

	    	if ($i==1) {
	    		$html = $this->ci()->load->view($view, $data, TRUE);
	    		$tplId = $mpdf->ImportPage($i);
	    		$mpdf->UseTemplate($tplId);
	    		$mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	            $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    	}else{
	    		for ($y=0; $y<$pages; $y++) {	    				    			
	    			$data['veces']=$y;
	    			$tplId = $mpdf->ImportPage(2);
	    			$mpdf->SetPageTemplate($tplId); 
	    			$html = $this->ci()->load->view($view, $data, TRUE);
	    		    $mpdf->AddPage();
                    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
                    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
                }
            }
        }
	    
	    $mpdf->Output();
	} 

	public function Plantilla_Respuesta_bls($view, $data = array()) 
	{

	    $html = $this->ci()->load->view($view, $data, TRUE);
	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'A4', 
	    'orientation' => 'L' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	    
	    // Add First page 

	    $pagecount = $mpdf->SetSourceFile('assets/media/bls/13.Plantilla_Respuesta_bls.pdf');
	    $tplId = $mpdf->ImportPage(1);
	    $mpdf->SetPageTemplate($tplId);
	    //$mpdf->AddPage('L');
	    $stylesheet = file_get_contents('assets/css/style_pdf/bls/s13.Plantilla_Respuesta_bls.css');
	    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    
	    $mpdf->Output();
	} 

	public function agenda_bls($view, $data = array()) 
	{

	    $html = $this->ci()->load->view($view, $data, TRUE);
	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'letter', 
	    'orientation' => 'P' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	    
	    // Add First page 

	    $pagecount = $mpdf->SetSourceFile('assets/media/bls/14.agenda_bls.pdf');
	    $tplId = $mpdf->ImportPage(1);
	    $mpdf->SetPageTemplate($tplId);
	    //$mpdf->AddPage('L');
	    $stylesheet = file_get_contents('assets/css/style_pdf/bls/s14.agenda_bls.css');
	    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    
	    $mpdf->Output();
	} 

	public function monitorizacion_bls($view, $data = array()) 
	{

	    $html = $this->ci()->load->view($view, $data, TRUE);
	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'A4', 
	    'orientation' => 'P' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	    

	    $pagecount = $mpdf->SetSourceFile('assets/media/bls/15.monitorizacion_bls.pdf');
	    $stylesheet = file_get_contents('assets/css/style_pdf/bls/s15.monitorizacion_bls.css');

	    for ($i=1; $i <= $pagecount ; $i++) {
	        $data['opc']=$i;

	        if ($i==1) {
	    		$html = $this->ci()->load->view($view, $data, TRUE);
	    		$tplId = $mpdf->ImportPage($i);
	    		$mpdf->UseTemplate($tplId);
	    		$mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	            $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    	}else{ 
	    			$tplId = $mpdf->ImportPage($i);
	    			$mpdf->SetPageTemplate($tplId); 
	    			$html = $this->ci()->load->view($view, $data, TRUE);
	    		    $mpdf->AddPage();
                    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
                    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);                
            }

	    }
	    
	    $mpdf->Output();
	} 

	public function RCP_DEA_adultos_bls($view, $data = array()) 
	{

	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'A4', 
	    'orientation' => 'P' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	    
	  
	    $pagecount = $mpdf->SetSourceFile('assets/media/bls/20.RCP_DEA_adultos_bls.pdf');
	    $stylesheet = file_get_contents('assets/css/style_pdf/bls/s20.RCP_DEA_adultos_bls.css');

	    for ($i=1; $i <= $pagecount ; $i++) {
	        $data['opc']=$i; 

	    	if ($i==1) {
	    		$html = $this->ci()->load->view($view, $data, TRUE);
	    		$tplId = $mpdf->ImportPage($i);
	    		$mpdf->UseTemplate($tplId);
	    		$mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	            $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    	}else{ 
	    			$tplId = $mpdf->ImportPage($i);
	    			$mpdf->SetPageTemplate($tplId); 
	    			$html = $this->ci()->load->view($view, $data, TRUE);
	    		    $mpdf->AddPage();
                    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
                    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);                
            }
        }
	    
	    $mpdf->Output();
	} 

	public function RCP_lactantes_bls($view, $data = array()) 
	{

	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'A4', 
	    'orientation' => 'P' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	    
	
	    $pagecount = $mpdf->SetSourceFile('assets/media/bls/21.RCP_lactantes_bls.pdf');
	    $stylesheet = file_get_contents('assets/css/style_pdf/bls/s21.RCP_lactantes_bls.css');

	    for ($i=1; $i <= $pagecount ; $i++) {
	        $data['opc']=$i; 

	    	if ($i==1) {
	    		$html = $this->ci()->load->view($view, $data, TRUE);
	    		$tplId = $mpdf->ImportPage($i);
	    		$mpdf->UseTemplate($tplId);
	    		$mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	            $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    	}else{ 
	    			$tplId = $mpdf->ImportPage($i);
	    			$mpdf->SetPageTemplate($tplId); 
	    			$html = $this->ci()->load->view($view, $data, TRUE);
	    		    $mpdf->AddPage();
                    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
                    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);                
            }
        }
	    
	    $mpdf->Output();
	} 

	public function evaluacion_teorica_bls($view, $data = array()) 
	{

	    $html = $this->ci()->load->view($view, $data, TRUE);
	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'A4', 
	    'orientation' => 'P' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	    
	    // Add First page 

	    $pagecount = $mpdf->SetSourceFile('assets/media/bls/38.evaluacion_teorica_bls.pdf');
	    $tplId = $mpdf->ImportPage(1);
	    $mpdf->SetPageTemplate($tplId);
	    //$mpdf->AddPage('L');
	    $stylesheet = file_get_contents('assets/css/style_pdf/bls/s38.evaluacion_teorica_bls.css');
	    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    
	    $mpdf->Output();
	} 

	public function evaluacion_teorica_cremediar_bls($view, $data = array()) 
	{

	    $html = $this->ci()->load->view($view, $data, TRUE);
	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'A4', 
	    'orientation' => 'P' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	    
	    // Add First page 

	    $pagecount = $mpdf->SetSourceFile('assets/media/bls/39.evaluacion_teorica_cremediar_bls.pdf');
	    $tplId = $mpdf->ImportPage(1);
	    $mpdf->SetPageTemplate($tplId);
	    //$mpdf->AddPage('L');
	    $stylesheet = file_get_contents('assets/css/style_pdf/bls/s39.evaluacion_teorica_cremediar_bls.css');
	    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    
	    $mpdf->Output();
	} 

	public function constancia_participacion_bls($view, $data = array()) 
	{

	    $html = $this->ci()->load->view($view, $data, TRUE);
	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'A4', 
	    'orientation' => 'L' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	    
	    // Add First page 

	    $pagecount = $mpdf->SetSourceFile('assets/media/bls/40.constancia_participacion_bls.pdf');
	    $tplId = $mpdf->ImportPage(1);
	    $mpdf->SetPageTemplate($tplId);
	    //$mpdf->AddPage('L');
	    $stylesheet = file_get_contents('assets/css/style_pdf/bls/s40.constancia_participacion_bls.css');
	    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    
	    $mpdf->Output();
	} 

	public function Carta_PI_bls($view, $data = array()) 
	{

	    $html = $this->ci()->load->view($view, $data, TRUE);
	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'A4', 
	    'orientation' => 'P' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	    
	    // Add First page 

	    $pagecount = $mpdf->SetSourceFile('assets/media/bls/41.Carta_PI_bls.pdf');
	    $tplId = $mpdf->ImportPage(1);
	    $mpdf->SetPageTemplate($tplId);
	    //$mpdf->AddPage('L');
	    $stylesheet = file_get_contents('assets/css/style_pdf/bls/s41.Carta_PI_bls.css');
	    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    
	    $mpdf->Output();
	} 

	public function Instructor_Candidate_Aplication_bls($view, $data = array()) 
	{

	    $html = $this->ci()->load->view($view, $data, TRUE);
	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'A4', 
	    'orientation' => 'P' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	    
	    // Add First page 

	    $pagecount = $mpdf->SetSourceFile('assets/media/bls/42.Instructor_Candidate_Aplication_bls.pdf');
	    $tplId = $mpdf->ImportPage(1);
	    $mpdf->SetPageTemplate($tplId);
	    //$mpdf->AddPage('L');
	    $stylesheet = file_get_contents('assets/css/style_pdf/bls/s42.Instructor_Candidate_Aplication_bls.css');
	    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    
	    $mpdf->Output();
	} 

	public function Reporte_Director_curso_bls($view, $data = array()) 
	{

	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'A4', 
	    'orientation' => 'P' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	    
	  
	    $pagecount = $mpdf->SetSourceFile('assets/media/bls/45.Reporte_Director_curso_bls.pdf');
	    $stylesheet = file_get_contents('assets/css/style_pdf/bls/s45.Reporte_Director_curso_bls.css');

	    for ($i=1; $i <= $pagecount ; $i++) {
	        $data['opc']=$i;

	        if ($i==1) {
	    		$html = $this->ci()->load->view($view, $data, TRUE);
	    		$tplId = $mpdf->ImportPage($i);
	    		$mpdf->UseTemplate($tplId);
	    		$mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	            $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    	}else{ 
	    			$tplId = $mpdf->ImportPage($i);
	    			$mpdf->SetPageTemplate($tplId); 
	    			$html = $this->ci()->load->view($view, $data, TRUE);
	    		    $mpdf->AddPage();
                    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
                    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);                
            }

	    }
	    
	    $mpdf->Output();
	} 

	public function ejemplo_reporte_logistica_bls($view, $data = array()) 
	{

	    $html = $this->ci()->load->view($view, $data, TRUE);
	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'A4', 
	    'orientation' => 'P' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	    
	    // Add First page 

	    $pagecount = $mpdf->SetSourceFile('assets/media/bls/46.ejemplo_reporte_logistica_bls.pdf');
	    $tplId = $mpdf->ImportPage(1);
	    $mpdf->SetPageTemplate($tplId);
	    //$mpdf->AddPage('L');
	    $stylesheet = file_get_contents('assets/css/style_pdf/bls/sejemplo_reporte_logistica_bls.css');
	    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    
	    $mpdf->Output();
	}


    /*-------------------------------------------------------------------------------------
    ----------------------------------------MPDF BLSO---------------------------------*/


	public function Course_information_blso($view, $data = array()) 
	{

	    $html = $this->ci()->load->view($view, $data, TRUE);
	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'letter', 
	    'orientation' => 'L' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	    
	    // Add First page 

	    $pagecount = $mpdf->SetSourceFile('assets/media/blso/1.Course_information_blso.pdf');
	    $tplId = $mpdf->ImportPage(1);
	    $mpdf->SetPageTemplate($tplId);
	    //$mpdf->AddPage('L');
	    $stylesheet = file_get_contents('assets/css/style_pdf/blso/s1.Course_information_blso.css');
	    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    
	    $mpdf->Output();
	} 

	public function course_participants_blso($view, $data = array()) 
	{

	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'letter', 
	    'orientation' => 'L' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();

	    $tam_reg_tabla=$data['tam_reg_tabla'];	    
        $pages=ceil(count($data['participantes'])/$tam_reg_tabla);
	    
	    $pagecount = $mpdf->SetSourceFile('assets/media/blso/2.course_participants_blso.pdf');
	    $stylesheet = file_get_contents('assets/css/style_pdf/blso/s2.course_participants_blso.css');

	    for ($i=1; $i <= 1; $i++) {
	        $data['opc']=$i; 

	    	if ($i==1) {
	    		for ($y=0; $y<$pages; $y++) {
	    			$data['veces']=$y;    		

	                if ($y==0) {
	            		$html = $this->ci()->load->view($view, $data, TRUE);
	    		        $tplId = $mpdf->ImportPage(1);
	    		        $mpdf->UseTemplate($tplId);	    		  
	            	}else{
	            		$html = $this->ci()->load->view($view, $data, TRUE);
	    			    $tplId = $mpdf->ImportPage(1);
	    			    $mpdf->SetPageTemplate($tplId);    			    
	    		        $mpdf->AddPage();                              
	            	}
	            	
	            	$mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
                    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);

	            }
	    	}
	    }
	    
	    $mpdf->Output();
	} 

	public function ejemplo_agenda_curso_blso($view, $data = array()) 
	{

	    $html = $this->ci()->load->view($view, $data, TRUE);
	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'A4', 
	    'orientation' => 'L' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	    
	    // Add First page 

	    $pagecount = $mpdf->SetSourceFile('assets/media/blso/12.ejemplo_agenda_curso_blso.pdf');
	    $tplId = $mpdf->ImportPage(1);
	    $mpdf->SetPageTemplate($tplId);
	    //$mpdf->AddPage('L');
	    $stylesheet = file_get_contents('assets/css/style_pdf/blso/s12.ejemplo_agenda_curso_blso.css');
	    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    
	    $mpdf->Output();
	} 

	public function apendiceN_blso($view, $data = array()) 
	{

	    $html = $this->ci()->load->view($view, $data, TRUE);
	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'letter', 
	    'orientation' => 'P' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	    
	    // Add First page 

	    $pagecount = $mpdf->SetSourceFile('assets/media/blso/13.apendiceN_blso.pdf');
	    $tplId = $mpdf->ImportPage(1);
	    $mpdf->SetPageTemplate($tplId);
	    //$mpdf->AddPage('L');
	    $stylesheet = file_get_contents('assets/css/style_pdf/blso/s13.apendiceN_blso.css');
	    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    
	    $mpdf->Output();
	} 

	public function evaluacion_teorica_blso($view, $data = array()) 
	{

	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'A4', 
	    'orientation' => 'P' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();    


	    $tam_reg_tabla=2;
	    $pages=ceil(count($data['nombre_participante'])/$tam_reg_tabla); 

	    $pagecount = $mpdf->SetSourceFile('assets/media/blso/15.evaluacion_teorica_blso.pdf');
	    $stylesheet = file_get_contents('assets/css/style_pdf/blso/s15.evaluacion_teorica_blso.css');

	    for ($i=1; $i <= $pagecount; $i++) {
	        $data['opc']=$i; 

	    	if ($i==1) {	    		
	            for ($y=0; $y<$pages; $y++) {
	            	$data['veces']=$y;

	            	if ($y==0) {
	            		$html = $this->ci()->load->view($view, $data, TRUE);
	    		        $tplId = $mpdf->ImportPage(1);
	    		        $mpdf->UseTemplate($tplId);
	    		        $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	                    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	            	}else{
	    			    $tplId = $mpdf->ImportPage(1);
	    			    $mpdf->SetPageTemplate($tplId); 
	    			    $html = $this->ci()->load->view($view, $data, TRUE);
	    		        $mpdf->AddPage();
                        $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
                        $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);      
	            	}

	            }
	    	}
	    	/*else{	    			    				    			
	    			$data['veces']=$y;
	    			$tplId = $mpdf->ImportPage($i);
	    			$mpdf->SetPageTemplate($tplId); 
	    			$html = $this->ci()->load->view($view, $data, TRUE);
	    		    $mpdf->AddPage();
                    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
                    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);    
            }*/
        }
	    
	    $mpdf->Output();
	} 

	public function participan_evaluation_form_blso($view, $data = array()) 
	{

	    $html = $this->ci()->load->view($view, $data, TRUE);
	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'A4', 
	    'orientation' => 'P' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	    
	    // Add First page 

	    $pagecount = $mpdf->SetSourceFile('assets/media/blso/16.participan_evaluation_form_blso.pdf');
	    $tplId = $mpdf->ImportPage(1);
	    $mpdf->SetPageTemplate($tplId);
	    //$mpdf->AddPage('L');
	    $stylesheet = file_get_contents('assets/css/style_pdf/blso/s16.participan_evaluation_form_blso.css');
	    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    
	    $mpdf->Output();
	} 

	public function formato_remediacion_blso($view, $data = array()) 
	{

	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'A4', 
	    'orientation' => 'L' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	    
	
	    $tam_reg_tabla=$data['tam_reg_tabla'];	    
        $pages=ceil(count($data['datos'])/$tam_reg_tabla);
	    
	    $pagecount = $mpdf->SetSourceFile('assets/media/blso/17.formato_remediacion_blso.pdf');
	    $stylesheet = file_get_contents('assets/css/style_pdf/blso/s17.formato_remediacion_blso.css');

	    for ($i=1; $i <= $pagecount; $i++) {
	        $data['opc']=$i; 

	    	if ($i==1) {
	    		for ($y=0; $y<$pages; $y++) {
	    			$data['veces']=$y;    		

	                if ($y==0) {
	            		$html = $this->ci()->load->view($view, $data, TRUE);
	    		        $tplId = $mpdf->ImportPage(1);
	    		        $mpdf->UseTemplate($tplId);	    		  
	            	}else{
	            		$html = $this->ci()->load->view($view, $data, TRUE);
	    			    $tplId = $mpdf->ImportPage(1);
	    			    $mpdf->SetPageTemplate($tplId);    			    
	    		        $mpdf->AddPage();                              
	            	}
	            	
	            	$mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
                    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);

	            }
	    	}
	    }
	    
	    $mpdf->Output();
	} 

	public function evaluacion_teorica_remediar_blso($view, $data = array()) 
	{

	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'A4', 
	    'orientation' => 'P' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();

	    $tam_reg_tabla=2;
	    $pages=ceil(count($data['nombre_participante'])/$tam_reg_tabla); 

	    $pagecount = $mpdf->SetSourceFile('assets/media/blso/18.evaluacion_teorica_remediar_blso.pdf');
	    $stylesheet = file_get_contents('assets/css/style_pdf/blso/s18.evaluacion_teorica_remediar_blso.css');

	    for ($i=1; $i <= $pagecount; $i++) {
	        $data['opc']=$i; 

	    	if ($i==1) {	    		
	            for ($y=0; $y<$pages; $y++) {
	            	$data['veces']=$y;

	            	if ($y==0) {
	            		$html = $this->ci()->load->view($view, $data, TRUE);
	    		        $tplId = $mpdf->ImportPage(1);
	    		        $mpdf->UseTemplate($tplId);
	    		        $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	                    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	            	}else{
	    			    $tplId = $mpdf->ImportPage(1);
	    			    $mpdf->SetPageTemplate($tplId); 
	    			    $html = $this->ci()->load->view($view, $data, TRUE);
	    		        $mpdf->AddPage();
                        $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
                        $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);      
	            	}

	            }
	    	}
	    	/*else{	    			    				    			
	    			$data['veces']=$y;
	    			$tplId = $mpdf->ImportPage($i);
	    			$mpdf->SetPageTemplate($tplId); 
	    			$html = $this->ci()->load->view($view, $data, TRUE);
	    		    $mpdf->AddPage();
                    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
                    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);    
            }*/
        }
	    
	    $mpdf->Output();
	} 

	public function contancia_participacion_blso($view, $data = array()) 
	{

	    $html = $this->ci()->load->view($view, $data, TRUE);
	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'letter', 
	    'orientation' => 'P' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	    
	    // Add First page 

	    $pagecount = $mpdf->SetSourceFile('assets/media/blso/19.contancia_participacion_blso.pdf');
	    $tplId = $mpdf->ImportPage(1);
	    $mpdf->SetPageTemplate($tplId);
	    //$mpdf->AddPage('L');
	    $stylesheet = file_get_contents('assets/css/style_pdf/blso/s19.contancia_participacion_blso.css');
	    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    
	    $mpdf->Output();
	} 

	public function evaluacion_curso_blso($view, $data = array()) 
	{

	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'A4', 
	    'orientation' => 'P' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	    
	    $pagecount = $mpdf->SetSourceFile('assets/media/blso/21.evaluacion_curso_blso.pdf');
	    $stylesheet = file_get_contents('assets/css/style_pdf/blso/s21.evaluacion_curso_blso.css');

	    for ($i=1; $i <= $pagecount ; $i++) {
	        $data['opc']=$i; 

	    	if ($i==1) {
	    		$html = $this->ci()->load->view($view, $data, TRUE);
	    		$tplId = $mpdf->ImportPage($i);
	    		$mpdf->UseTemplate($tplId);
	    		$mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	            $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    	}else{ 
	    			$tplId = $mpdf->ImportPage($i);
	    			$mpdf->SetPageTemplate($tplId); 
	    			$html = $this->ci()->load->view($view, $data, TRUE);
	    		    $mpdf->AddPage();
                    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
                    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);                
            }
        }
	    
	    $mpdf->Output();
	} 

	public function Reporte_Director_curso_blso($view, $data = array()) 
	{

	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'A4', 
	    'orientation' => 'P' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	    
	
	    $pagecount = $mpdf->SetSourceFile('assets/media/blso/23.Reporte_Director_curso_blso.pdf');
	    $stylesheet = file_get_contents('assets/css/style_pdf/blso/s23.Reporte_Director_curso_blso.css');

	    for ($i=1; $i <= $pagecount ; $i++) {
	        $data['opc']=$i;

	        if ($i==1) {
	    		$html = $this->ci()->load->view($view, $data, TRUE);
	    		$tplId = $mpdf->ImportPage($i);
	    		$mpdf->UseTemplate($tplId);
	    		$mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	            $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    	}else{ 
	    			$tplId = $mpdf->ImportPage($i);
	    			$mpdf->SetPageTemplate($tplId); 
	    			$html = $this->ci()->load->view($view, $data, TRUE);
	    		    $mpdf->AddPage();
                    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
                    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);                
            }

	    }
	    
	    $mpdf->Output();
	} 

	public function ejemplo_reporte_logistica_blso($view, $data = array()) 
	{

	    $html = $this->ci()->load->view($view, $data, TRUE);
	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'A4', 
	    'orientation' => 'P' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	    
	    // Add First page 

	    $pagecount = $mpdf->SetSourceFile('assets/media/blso/24.ejemplo_reporte_logistica_blso.pdf');
	    $tplId = $mpdf->ImportPage(1);
	    $mpdf->SetPageTemplate($tplId);
	    //$mpdf->AddPage('L');
	    $stylesheet = file_get_contents('assets/css/style_pdf/blso/sejemplo_reporte_logistica_blso.css');
	    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    
	    $mpdf->Output();
	}

    /*-------------------------------------------------------------------------------------
    ----------------------------------------MPDF HEARTSAVER----------------------------*/
 

	public function course_information_participants_heart($view, $data = array()) 
	{

	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'letter', 
	    'orientation' => 'L' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	    
	
	    $tam_reg_tabla=$data['tam_reg_tabla_2'];
	    $pages=ceil(count($data['participantes'])/$tam_reg_tabla);
	    
	    $pagecount = $mpdf->SetSourceFile('assets/media/heartsaver/1.course_information_participants_heart.pdf');
	    $stylesheet = file_get_contents('assets/css/style_pdf/heartsaver/s1.course_information_participants_heart.css');

	    for ($i=1; $i <= $pagecount; $i++) {
	        $data['opc']=$i; 

	    	if ($i==1) {
	    		$html = $this->ci()->load->view($view, $data, TRUE);
	    		$tplId = $mpdf->ImportPage($i);
	    		$mpdf->UseTemplate($tplId);
	    		$mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	            $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    	}else{
	    		for ($y=0; $y<$pages; $y++) {	    				    			
	    			$data['veces']=$y;
	    			$tplId = $mpdf->ImportPage(2);
	    			$mpdf->SetPageTemplate($tplId); 
	    			$html = $this->ci()->load->view($view, $data, TRUE);
	    		    $mpdf->AddPage();
                    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
                    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
                }
            }
        }
	    
	    $mpdf->Output();
	} 

	public function agenda_curso_heart($view, $data = array()) 
	{

	    $html = $this->ci()->load->view($view, $data, TRUE);
	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'A4', 
	    'orientation' => 'P' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	    
	    // Add First page 

	    $pagecount = $mpdf->SetSourceFile('assets/media/heartsaver/14.agenda_curso_heart.pdf');
	    $tplId = $mpdf->ImportPage(1);
	    $mpdf->SetPageTemplate($tplId);
	    //$mpdf->AddPage('L');
	    $stylesheet = file_get_contents('assets/css/style_pdf/heartsaver/s14.agenda_curso_heart.css');
	    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    
	    $mpdf->Output();
	} 

	public function monitorizacion_heart($view, $data = array()) 
	{

	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'A4', 
	    'orientation' => 'P' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	    
	 
	    $pagecount = $mpdf->SetSourceFile('assets/media/heartsaver/15.monitorizacion_heart.pdf');
	    $stylesheet = file_get_contents('assets/css/style_pdf/heartsaver/s15.monitorizacion_heart.css');

	    for ($i=1; $i <= $pagecount ; $i++) {
	        $data['opc']=$i;

	        if ($i==1) {
	    		$html = $this->ci()->load->view($view, $data, TRUE);
	    		$tplId = $mpdf->ImportPage($i);
	    		$mpdf->UseTemplate($tplId);
	    		$mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	            $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    	}else{ 
	    			$tplId = $mpdf->ImportPage($i);
	    			$mpdf->SetPageTemplate($tplId); 
	    			$html = $this->ci()->load->view($view, $data, TRUE);
	    		    $mpdf->AddPage();
                    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
                    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);                
            }

	    }
	    
	    $mpdf->Output();
	} 

	public function RCP_DEA_adultos_heart($view, $data = array()) 
	{

	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'A4', 
	    'orientation' => 'P' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	
	    $pagecount = $mpdf->SetSourceFile('assets/media/heartsaver/16.RCP_DEA_adultos_heart.pdf');
	    $stylesheet = file_get_contents('assets/css/style_pdf/heartsaver/s16.RCP_DEA_adultos_heart.css');

	    for ($i=1; $i <= $pagecount ; $i++) {
	        $data['opc']=$i; 

	    	if ($i==1) {
	    		$html = $this->ci()->load->view($view, $data, TRUE);
	    		$tplId = $mpdf->ImportPage($i);
	    		$mpdf->UseTemplate($tplId);
	    		$mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	            $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    	}else{ 
	    			$tplId = $mpdf->ImportPage($i);
	    			$mpdf->SetPageTemplate($tplId); 
	    			$html = $this->ci()->load->view($view, $data, TRUE);
	    		    $mpdf->AddPage();
                    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
                    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);                
            }
        }
	    
	    $mpdf->Output();
	} 

	public function RCP_ninos_heart($view, $data = array()) 
	{

	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'A4', 
	    'orientation' => 'P' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	    
	 
	    $pagecount = $mpdf->SetSourceFile('assets/media/heartsaver/17.RCP_ninos_heart.pdf');
	    $stylesheet = file_get_contents('assets/css/style_pdf/heartsaver/s17.RCP_ninos_heart.css');

	    for ($i=1; $i <= $pagecount ; $i++) {
	        $data['opc']=$i; 

	    	if ($i==1) {
	    		$html = $this->ci()->load->view($view, $data, TRUE);
	    		$tplId = $mpdf->ImportPage($i);
	    		$mpdf->UseTemplate($tplId);
	    		$mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	            $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    	}else{ 
	    			$tplId = $mpdf->ImportPage($i);
	    			$mpdf->SetPageTemplate($tplId); 
	    			$html = $this->ci()->load->view($view, $data, TRUE);
	    		    $mpdf->AddPage();
                    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
                    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);                
            }
        }
	    
	    $mpdf->Output();
	} 

	public function RCP_lactantes_heart($view, $data = array()) 
	{

	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'A4', 
	    'orientation' => 'P' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	    
	    $pagecount = $mpdf->SetSourceFile('assets/media/heartsaver/18.RCP_lactantes_heart.pdf');
	    $stylesheet = file_get_contents('assets/css/style_pdf/heartsaver/s18.RCP_lactantes_heart.css');

	    for ($i=1; $i <= $pagecount ; $i++) {
	        $data['opc']=$i; 

	    	if ($i==1) {
	    		$html = $this->ci()->load->view($view, $data, TRUE);
	    		$tplId = $mpdf->ImportPage($i);
	    		$mpdf->UseTemplate($tplId);
	    		$mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	            $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    	}else{ 
	    			$tplId = $mpdf->ImportPage($i);
	    			$mpdf->SetPageTemplate($tplId); 
	    			$html = $this->ci()->load->view($view, $data, TRUE);
	    		    $mpdf->AddPage();
                    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
                    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);                
            }
        }
	    
	    $mpdf->Output();
	} 

	public function primeros_auxilios_heart($view, $data = array()) 
	{

	    $html = $this->ci()->load->view($view, $data, TRUE);
	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'A4', 
	    'orientation' => 'P' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	    
	    // Add First page 

	    $pagecount = $mpdf->SetSourceFile('assets/media/heartsaver/19.primeros_auxilios_heart.pdf');
	    $tplId = $mpdf->ImportPage(1);
	    $mpdf->SetPageTemplate($tplId);
	    //$mpdf->AddPage('L');
	    $stylesheet = file_get_contents('assets/css/style_pdf/heartsaver/s19.primeros_auxilios_heart.css');
	    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    
	    $mpdf->Output();
	} 

	public function evaluacion_teorica_heart($view, $data = array()) 
	{

	    $html = $this->ci()->load->view($view, $data, TRUE);
	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'A4', 
	    'orientation' => 'P' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	    
	    // Add First page 

	    $pagecount = $mpdf->SetSourceFile('assets/media/heartsaver/38.evaluacion_teorica_heart.pdf');
	    $tplId = $mpdf->ImportPage(1);
	    $mpdf->SetPageTemplate($tplId);
	    //$mpdf->AddPage('L');
	    $stylesheet = file_get_contents('assets/css/style_pdf/heartsaver/s38.evaluacion_teorica_heart.css');
	    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    
	    $mpdf->Output();
	} 

	public function evaluacion_teorica_remediar_heart($view, $data = array()) 
	{

	    $html = $this->ci()->load->view($view, $data, TRUE);
	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'A4', 
	    'orientation' => 'P' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	    
	    // Add First page 

	    $pagecount = $mpdf->SetSourceFile('assets/media/heartsaver/39.evaluacion_teorica_remediar_heart.pdf');
	    $tplId = $mpdf->ImportPage(1);
	    $mpdf->SetPageTemplate($tplId);
	    //$mpdf->AddPage('L');
	    $stylesheet = file_get_contents('assets/css/style_pdf/heartsaver/s39.evaluacion_teorica_remediar_heart.css');
	    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    
	    $mpdf->Output();
	} 

	public function constancia_participacion_heart($view, $data = array()) 
	{

	    $html = $this->ci()->load->view($view, $data, TRUE);
	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'A4', 
	    'orientation' => 'L' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	    
	    // Add First page 

	    $pagecount = $mpdf->SetSourceFile('assets/media/heartsaver/40.constancia_participacion_heart.pdf');
	    $tplId = $mpdf->ImportPage(1);
	    $mpdf->SetPageTemplate($tplId);
	    //$mpdf->AddPage('L');
	    $stylesheet = file_get_contents('assets/css/style_pdf/heartsaver/s40.constancia_participacion_heart.css');
	    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    
	    $mpdf->Output();
	} 

	public function Carta_PI_heart($view, $data = array()) 
	{

	    $html = $this->ci()->load->view($view, $data, TRUE);
	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'A4', 
	    'orientation' => 'P' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	    
	    // Add First page 

	    $pagecount = $mpdf->SetSourceFile('assets/media/heartsaver/41.Carta_PI_heart.pdf');
	    $tplId = $mpdf->ImportPage(1);
	    $mpdf->SetPageTemplate($tplId);
	    //$mpdf->AddPage('L');
	    $stylesheet = file_get_contents('assets/css/style_pdf/heartsaver/s41.Carta_PI_heart.css');
	    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    
	    $mpdf->Output();
	} 

	public function Instructor_Candidate_Aplication_heart($view, $data = array()) 
	{

	    $html = $this->ci()->load->view($view, $data, TRUE);
	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'A4', 
	    'orientation' => 'P' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	    
	    // Add First page 

	    $pagecount = $mpdf->SetSourceFile('assets/media/heartsaver/42.Instructor_Candidate_Aplication_heart.pdf');
	    $tplId = $mpdf->ImportPage(1);
	    $mpdf->SetPageTemplate($tplId);
	    //$mpdf->AddPage('L');
	    $stylesheet = file_get_contents('assets/css/style_pdf/heartsaver/s42.Instructor_Candidate_Aplication_heart.css');
	    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    
	    $mpdf->Output();
	} 

	public function Reporte_Director_curso_heart($view, $data = array()) 
	{

	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'A4', 
	    'orientation' => 'P' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	
	    $pagecount = $mpdf->SetSourceFile('assets/media/heartsaver/45.Reporte_Director_curso_heart.pdf');
	    $stylesheet = file_get_contents('assets/css/style_pdf/heartsaver/s45.Reporte_Director_curso_heart.css');

	    for ($i=1; $i <= $pagecount ; $i++) {
	        $data['opc']=$i;

	        if ($i==1) {
	    		$html = $this->ci()->load->view($view, $data, TRUE);
	    		$tplId = $mpdf->ImportPage($i);
	    		$mpdf->UseTemplate($tplId);
	    		$mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	            $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    	}else{ 
	    			$tplId = $mpdf->ImportPage($i);
	    			$mpdf->SetPageTemplate($tplId); 
	    			$html = $this->ci()->load->view($view, $data, TRUE);
	    		    $mpdf->AddPage();
                    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
                    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);                
            }

	    }
	    
	    $mpdf->Output();
	} 

	public function ejemplo_reporte_logistica_heart($view, $data = array()) 
	{

	    $html = $this->ci()->load->view($view, $data, TRUE);
	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'A4', 
	    'orientation' => 'P' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	    
	    // Add First page 

	    $pagecount = $mpdf->SetSourceFile('assets/media/heartsaver/46.ejemplo_reporte_logistica_heart.pdf');
	    $tplId = $mpdf->ImportPage(1);
	    $mpdf->SetPageTemplate($tplId);
	    //$mpdf->AddPage('L');
	    $stylesheet = file_get_contents('assets/css/style_pdf/heartsaver/sejemplo_reporte_logistica_heart.css');
	    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    
	    $mpdf->Output();
	} 


    /*-------------------------------------------------------------------------------------
    ----------------------------------------MPDF PALS---------------------------------*/


	public function course_information_participants_pals($view, $data = array()) 
	{

	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'letter', 
	    'orientation' => 'L' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();

	    $tam_reg_tabla=$data['tam_reg_tabla_2'];
	    $pages=ceil(count($data['participantes'])/$tam_reg_tabla);
	    
	    $pagecount = $mpdf->SetSourceFile('assets/media/pals/1.course_information_participants_pals.pdf');
	    $stylesheet = file_get_contents('assets/css/style_pdf/pals/s1.course_information_participants_pals.css');

	    for ($i=1; $i <= $pagecount; $i++) {
	        $data['opc']=$i; 

	    	if ($i==1) {
	    		$html = $this->ci()->load->view($view, $data, TRUE);
	    		$tplId = $mpdf->ImportPage($i);
	    		$mpdf->UseTemplate($tplId);
	    		$mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	            $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    	}else{
	    		for ($y=0; $y<$pages; $y++) {	    				    			
	    			$data['veces']=$y;
	    			$tplId = $mpdf->ImportPage(2);
	    			$mpdf->SetPageTemplate($tplId); 
	    			$html = $this->ci()->load->view($view, $data, TRUE);
	    		    $mpdf->AddPage();
                    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
                    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
                }
            }
        }
	    
	    $mpdf->Output();
	} 

	public function agenda_curso_pals($view, $data = array()) 
	{

	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'A4', 
	    'orientation' => 'P' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	    
	   
	    $pagecount = $mpdf->SetSourceFile('assets/media/pals/14.agenda_curso_pals.pdf');
	    $stylesheet = file_get_contents('assets/css/style_pdf/pals/s14.agenda_curso_pals.css');

	    for ($i=1; $i <= $pagecount ; $i++) {
	        $data['opc']=$i; 

	    	if ($i==1) {
	    		$html = $this->ci()->load->view($view, $data, TRUE);
	    		$tplId = $mpdf->ImportPage($i);
	    		$mpdf->UseTemplate($tplId);
	    		$mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	            $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    	}else{ 
	    			$tplId = $mpdf->ImportPage($i);
	    			$mpdf->SetPageTemplate($tplId); 
	    			$html = $this->ci()->load->view($view, $data, TRUE);
	    		    $mpdf->AddPage();
                    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
                    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);                
            }
        }
	    
	    
	    $mpdf->Output();
	} 

	public function monitorizacion_pals($view, $data = array()) 
	{

	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'A4', 
	    'orientation' => 'P' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	    

	    $pagecount = $mpdf->SetSourceFile('assets/media/pals/15.monitorizacion_pals.pdf');
	    $stylesheet = file_get_contents('assets/css/style_pdf/pals/s15.monitorizacion_pals.css');

	    for ($i=1; $i <= $pagecount ; $i++) {
	        $data['opc']=$i;

	        if ($i==1) {
	    		$html = $this->ci()->load->view($view, $data, TRUE);
	    		$tplId = $mpdf->ImportPage($i);
	    		$mpdf->UseTemplate($tplId);
	    		$mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	            $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    	}else{ 
	    			$tplId = $mpdf->ImportPage($i);
	    			$mpdf->SetPageTemplate($tplId); 
	    			$html = $this->ci()->load->view($view, $data, TRUE);
	    		    $mpdf->AddPage();
                    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
                    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);                
            }

	    }    

	    
	    $mpdf->Output();
	} 

	public function Manejo_via_aerea_pals($view, $data = array()) 
	{

	    $html = $this->ci()->load->view($view, $data, TRUE);
	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'A4', 
	    'orientation' => 'P' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	    
	    // Add First page 

	    $pagecount = $mpdf->SetSourceFile('assets/media/pals/26.Manejo_via_aerea_pals.pdf');
	    $tplId = $mpdf->ImportPage(1);
	    $mpdf->SetPageTemplate($tplId);
	    //$mpdf->AddPage('L');
	    $stylesheet = file_get_contents('assets/css/style_pdf/pals/s26.Manejo_via_aerea_pals.css');
	    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    
	    $mpdf->Output();
	} 

	public function RCP_DEA_ninos_pals($view, $data = array()) 
	{

	    $html = $this->ci()->load->view($view, $data, TRUE);
	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'A4', 
	    'orientation' => 'P' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	    
	    // Add First page 

	    $pagecount = $mpdf->SetSourceFile('assets/media/pals/27.RCP_DEA_ninos_pals.pdf');
	    $tplId = $mpdf->ImportPage(1);
	    $mpdf->SetPageTemplate($tplId);
	    //$mpdf->AddPage('L');
	    $stylesheet = file_get_contents('assets/css/style_pdf/pals/s27.RCP_DEA_ninos_pals.css');
	    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    
	    $mpdf->Output();
	} 

	public function RCP_lactantes_pals($view, $data = array()) 
	{

	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'A4', 
	    'orientation' => 'P' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	
	    $pagecount = $mpdf->SetSourceFile('assets/media/pals/28.RCP_lactantes_pals.pdf');
	    $stylesheet = file_get_contents('assets/css/style_pdf/pals/s28.RCP_lactantes_pals.css');

	    for ($i=1; $i <= $pagecount ; $i++) {
	        $data['opc']=$i; 

	    	if ($i==1) {
	    		$html = $this->ci()->load->view($view, $data, TRUE);
	    		$tplId = $mpdf->ImportPage($i);
	    		$mpdf->UseTemplate($tplId);
	    		$mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	            $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    	}else{ 
	    			$tplId = $mpdf->ImportPage($i);
	    			$mpdf->SetPageTemplate($tplId); 
	    			$html = $this->ci()->load->view($view, $data, TRUE);
	    		    $mpdf->AddPage();
                    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
                    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);                
            }
        }
	    
	    $mpdf->Output();
	} 

	public function megacode_pals($view, $data = array()) 
	{

	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'A4', 
	    'orientation' => 'P' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	
	    $pagecount = $mpdf->SetSourceFile('assets/media/pals/29.megacode_pals.pdf');
	    $stylesheet = file_get_contents('assets/css/style_pdf/pals/s29.megacode_pals.css');

	    for ($i=1; $i <= $pagecount ; $i++) {
	        $data['opc']=$i; 

	    	if ($i==1) {
	    		$html = $this->ci()->load->view($view, $data, TRUE);
	    		$tplId = $mpdf->ImportPage($i);
	    		$mpdf->UseTemplate($tplId);
	    		$mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	            $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    	}else{ 
	    			$tplId = $mpdf->ImportPage($i);
	    			$mpdf->SetPageTemplate($tplId); 
	    			$html = $this->ci()->load->view($view, $data, TRUE);
	    		    $mpdf->AddPage();
                    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
                    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);                
            }
        }
	    
	    $mpdf->Output();
	} 

	public function ritmo_terapia_electrica_pals($view, $data = array()) 
	{

	    $html = $this->ci()->load->view($view, $data, TRUE);
	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'A4', 
	    'orientation' => 'P' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	    
	    // Add First page 

	    $pagecount = $mpdf->SetSourceFile('assets/media/pals/30.ritmo_terapia_electrica_pals.pdf');
	    $tplId = $mpdf->ImportPage(1);
	    $mpdf->SetPageTemplate($tplId);
	    //$mpdf->AddPage('L');
	    $stylesheet = file_get_contents('assets/css/style_pdf/pals/s30.ritmo_terapia_electrica_pals.css');
	    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    
	    $mpdf->Output();
	} 

	public function acceso_vascular_pals($view, $data = array()) 
	{

	    $html = $this->ci()->load->view($view, $data, TRUE);
	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'A4', 
	    'orientation' => 'P' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	    
	    // Add First page 

	    $pagecount = $mpdf->SetSourceFile('assets/media/pals/31.acceso_vascular_pals.pdf');
	    $tplId = $mpdf->ImportPage(1);
	    $mpdf->SetPageTemplate($tplId);
	    //$mpdf->AddPage('L');
	    $stylesheet = file_get_contents('assets/css/style_pdf/pals/s31.acceso_vascular_pals.css');
	    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    
	    $mpdf->Output();
	} 

	public function prueba_escenarios_pals($view, $data = array()) 
	{

	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'letter', 
	    'orientation' => 'P' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	
	    $pagecount = $mpdf->SetSourceFile('assets/media/pals/36.prueba_escenarios_pals.pdf');
	    $stylesheet = file_get_contents('assets/css/style_pdf/pals/s36.prueba_escenarios_pals.css');

	    for ($i=1; $i <= $pagecount ; $i++) {
	        $data['opc']=$i; 

	    	if ($i==1) {
	    		$html = $this->ci()->load->view($view, $data, TRUE);
	    		$tplId = $mpdf->ImportPage($i);
	    		$mpdf->UseTemplate($tplId);
	    		$mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	            $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    	}else{ 
	    			$tplId = $mpdf->ImportPage($i);
	    			$mpdf->SetPageTemplate($tplId); 
	    			$html = $this->ci()->load->view($view, $data, TRUE);
	    		    $mpdf->AddPage();
                    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
                    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);                
            }
        }
	    
	    $mpdf->Output();
	} 

	public function comprobacion_avance_curso_pals($view, $data = array()) 
	{

	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'letter', 
	    'orientation' => 'L' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	  
        $tam_reg_tabla=6;
        $grupoa=count($data['grupo_a']);
        $grupob=count($data['grupo_b']);

	    $pages=ceil(max($grupoa,$grupob)/$tam_reg_tabla);
	    
	    $pagecount = $mpdf->SetSourceFile('assets/media/pals/37.comprobacion_avance_curso_pals.pdf');
	    $stylesheet = file_get_contents('assets/css/style_pdf/pals/s37.comprobacion_avance_curso_pals.css');

	    for ($i=1; $i <= $pagecount; $i++) {
	        $data['opc']=$i; 

	    	if ($i==1) {
	    		for ($y=0; $y<$pages; $y++) {
	    			$data['veces']=$y;

	    			if ($y==0) {
	    				$html = $this->ci()->load->view($view, $data, TRUE);
	    		        $tplId = $mpdf->ImportPage($i);
	    		        $mpdf->UseTemplate($tplId);
	    		        $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	                    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    			}else{	    				
	    			    $tplId = $mpdf->ImportPage($i);
	    			    $mpdf->SetPageTemplate($tplId); 
	    			    $html = $this->ci()->load->view($view, $data, TRUE);
	    		        $mpdf->AddPage();
                        $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
                        $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    			}
	    		    
	            }
	    	}else{	    			    				    			
	    			$data['veces']=$y;
	    			$tplId = $mpdf->ImportPage(2);
	    			$mpdf->SetPageTemplate($tplId); 
	    			$html = $this->ci()->load->view($view, $data, TRUE);
	    		    $mpdf->AddPage();
                    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
                    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
                
            }
        }
	    
	    $mpdf->Output();
	} 

	public function evaluacion_teorica_pals($view, $data = array()) 
	{

	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'A4', 
	    'orientation' => 'P' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	    

	    $pagecount = $mpdf->SetSourceFile('assets/media/pals/38.evaluacion_teorica_pals.pdf');
	    $stylesheet = file_get_contents('assets/css/style_pdf/pals/s38.evaluacion_teorica_pals.css');

	    for ($i=1; $i <= $pagecount ; $i++) {
	        $data['opc']=$i;

	        if ($i==1) {
	    		$html = $this->ci()->load->view($view, $data, TRUE);
	    		$tplId = $mpdf->ImportPage($i);
	    		$mpdf->UseTemplate($tplId);
	    		$mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	            $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    	}else{ 
	    			$tplId = $mpdf->ImportPage($i);
	    			$mpdf->SetPageTemplate($tplId); 
	    			$html = $this->ci()->load->view($view, $data, TRUE);
	    		    $mpdf->AddPage();
                    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
                    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);                
            }

	    }
	    
	    $mpdf->Output();
	} 

	public function evaluacion_teorica_remediacion_pals($view, $data = array()) 
	{

	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'A4', 
	    'orientation' => 'P' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	    
	
	    $pagecount = $mpdf->SetSourceFile('assets/media/pals/39.evaluacion_teorica_remediacion_pals.pdf');
	    $stylesheet = file_get_contents('assets/css/style_pdf/pals/s39.evaluacion_teorica_remediacion_pals.css');

	    for ($i=1; $i <= $pagecount ; $i++) {
	        $data['opc']=$i;

	        if ($i==1) {
	    		$html = $this->ci()->load->view($view, $data, TRUE);
	    		$tplId = $mpdf->ImportPage($i);
	    		$mpdf->UseTemplate($tplId);
	    		$mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	            $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    	}else{ 
	    			$tplId = $mpdf->ImportPage($i);
	    			$mpdf->SetPageTemplate($tplId); 
	    			$html = $this->ci()->load->view($view, $data, TRUE);
	    		    $mpdf->AddPage();
                    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
                    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);                
            }

	    }

	    
	    $mpdf->Output();
	} 

	public function constancia_participacion_pals($view, $data = array()) 
	{

	    $html = $this->ci()->load->view($view, $data, TRUE);
	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'A4', 
	    'orientation' => 'L' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	    
	    // Add First page 

	    $pagecount = $mpdf->SetSourceFile('assets/media/pals/40.constancia_participacion_pals.pdf');
	    $tplId = $mpdf->ImportPage(1);
	    $mpdf->SetPageTemplate($tplId);
	    //$mpdf->AddPage('L');
	    $stylesheet = file_get_contents('assets/css/style_pdf/pals/s40.constancia_participacion_pals.css');
	    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    
	    $mpdf->Output();
	} 

	public function Carta_PI_pals($view, $data = array()) 
	{

	    $html = $this->ci()->load->view($view, $data, TRUE);
	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'A4', 
	    'orientation' => 'P' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	    
	    // Add First page 

	    $pagecount = $mpdf->SetSourceFile('assets/media/pals/41.Carta_PI_pals.pdf');
	    $tplId = $mpdf->ImportPage(1);
	    $mpdf->SetPageTemplate($tplId);
	    //$mpdf->AddPage('L');
	    $stylesheet = file_get_contents('assets/css/style_pdf/pals/s41.Carta_PI_pals.css');
	    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    
	    $mpdf->Output();
	} 

	public function Instructor_Candidate_Aplication_pals($view, $data = array()) 
	{

	    $html = $this->ci()->load->view($view, $data, TRUE);
	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'A4', 
	    'orientation' => 'P' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	    
	    // Add First page 

	    $pagecount = $mpdf->SetSourceFile('assets/media/pals/42.Instructor_Candidate_Aplication_pals.pdf');
	    $tplId = $mpdf->ImportPage(1);
	    $mpdf->SetPageTemplate($tplId);
	    //$mpdf->AddPage('L');
	    $stylesheet = file_get_contents('assets/css/style_pdf/pals/s42.Instructor_Candidate_Aplication_pals.css');
	    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    
	    $mpdf->Output();
	} 

	public function Reporte_Director_curso_pals($view, $data = array()) 
	{

	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'A4', 
	    'orientation' => 'P' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	
	    $pagecount = $mpdf->SetSourceFile('assets/media/pals/45.Reporte_Director_curso_pals.pdf');
	    $stylesheet = file_get_contents('assets/css/style_pdf/pals/s45.Reporte_Director_curso_pals.css');

	    for ($i=1; $i <= $pagecount ; $i++) {
	        $data['opc']=$i;

	        if ($i==1) {
	    		$html = $this->ci()->load->view($view, $data, TRUE);
	    		$tplId = $mpdf->ImportPage($i);
	    		$mpdf->UseTemplate($tplId);
	    		$mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	            $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    	}else{ 
	    			$tplId = $mpdf->ImportPage($i);
	    			$mpdf->SetPageTemplate($tplId); 
	    			$html = $this->ci()->load->view($view, $data, TRUE);
	    		    $mpdf->AddPage();
                    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
                    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);                
            }

	    }
	    
	    $mpdf->Output();
	} 

	public function ejemplo_reporte_logistica_pals($view, $data = array()) 
	{

	    $html = $this->ci()->load->view($view, $data, TRUE);
	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'A4', 
	    'orientation' => 'P' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	    
	    // Add First page 

	    $pagecount = $mpdf->SetSourceFile('assets/media/pals/46.ejemplo_reporte_logistica_pals.pdf');
	    $tplId = $mpdf->ImportPage(1);
	    $mpdf->SetPageTemplate($tplId);
	    //$mpdf->AddPage('L');
	    $stylesheet = file_get_contents('assets/css/style_pdf/pals/sejemplo_reporte_logistica_pals.css');
	    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    
	    $mpdf->Output();
	}


    /*-------------------------------------------------------------------------------------
    ----------------------------------------MPDF PEARS---------------------------------*/
 

	public function course_information_participants_pears($view, $data = array()) 
	{

	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'letter', 
	    'orientation' => 'L' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();	    

	    $tam_reg_tabla=$data['tam_reg_tabla_2'];
	    $pages=ceil(count($data['participantes'])/$tam_reg_tabla);
	    
	    $pagecount = $mpdf->SetSourceFile('assets/media/pears/1.course_information_participants_pears.pdf');
	    $stylesheet = file_get_contents('assets/css/style_pdf/pears/s1.course_information_participants_pears.css');

	    for ($i=1; $i <= $pagecount; $i++) {
	        $data['opc']=$i; 

	    	if ($i==1) {
	    		$html = $this->ci()->load->view($view, $data, TRUE);
	    		$tplId = $mpdf->ImportPage($i);
	    		$mpdf->UseTemplate($tplId);
	    		$mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	            $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    	}else{
	    		for ($y=0; $y<$pages; $y++) {	    				    			
	    			$data['veces']=$y;
	    			$tplId = $mpdf->ImportPage(2);
	    			$mpdf->SetPageTemplate($tplId); 
	    			$html = $this->ci()->load->view($view, $data, TRUE);
	    		    $mpdf->AddPage();
                    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
                    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
                }
            }
        }
	    
	    $mpdf->Output();
	} 

	public function agenda_curso_pears($view, $data = array()) 
	{

	    $html = $this->ci()->load->view($view, $data, TRUE);
	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'A4', 
	    'orientation' => 'P' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	    
	    // Add First page 

	    $pagecount = $mpdf->SetSourceFile('assets/media/pears/14.agenda_curso_pears.pdf');
	    $tplId = $mpdf->ImportPage(1);
	    $mpdf->SetPageTemplate($tplId);
	    //$mpdf->AddPage('L');
	    $stylesheet = file_get_contents('assets/css/style_pdf/pears/s14.agenda_curso_pears.css');
	    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    
	    $mpdf->Output();
	} 

	public function monitorizacion_pears($view, $data = array()) 
	{

	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'A4', 
	    'orientation' => 'P' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	    
	
	    $pagecount = $mpdf->SetSourceFile('assets/media/pears/15.monitorizacion_pears.pdf');
	    $stylesheet = file_get_contents('assets/css/style_pdf/pears/s15.monitorizacion_pears.css');

	    for ($i=1; $i <= $pagecount ; $i++) {
	        $data['opc']=$i;

	        if ($i==1) {
	    		$html = $this->ci()->load->view($view, $data, TRUE);
	    		$tplId = $mpdf->ImportPage($i);
	    		$mpdf->UseTemplate($tplId);
	    		$mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	            $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    	}else{ 
	    			$tplId = $mpdf->ImportPage($i);
	    			$mpdf->SetPageTemplate($tplId); 
	    			$html = $this->ci()->load->view($view, $data, TRUE);
	    		    $mpdf->AddPage();
                    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
                    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);                
            }

	    }
	    
	    $mpdf->Output();
	} 

	public function evaluacion_teorica_pears($view, $data = array()) 
	{

	    $html = $this->ci()->load->view($view, $data, TRUE);
	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'A4', 
	    'orientation' => 'P' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	    
	    $pagecount = $mpdf->SetSourceFile('assets/media/pears/38.evaluacion_teorica_pears.pdf');
	    $stylesheet = file_get_contents('assets/css/style_pdf/pears/s38.evaluacion_teorica_pears.css');

	    for ($i=1; $i <= $pagecount ; $i++) {
	        $data['opc']=$i;

	        if ($i==1) {
	    		$html = $this->ci()->load->view($view, $data, TRUE);
	    		$tplId = $mpdf->ImportPage($i);
	    		$mpdf->UseTemplate($tplId);
	    		$mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	            $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    	}else{ 
	    			$tplId = $mpdf->ImportPage($i);
	    			$mpdf->SetPageTemplate($tplId); 
	    			$html = $this->ci()->load->view($view, $data, TRUE);
	    		    $mpdf->AddPage();
                    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
                    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);                
            }

	    }
	    
	    $mpdf->Output();
	} 

	public function evaluacion_teorica_remediacion_pears($view, $data = array()) 
	{

	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'A4', 
	    'orientation' => 'P' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	    
	 
	    $pagecount = $mpdf->SetSourceFile('assets/media/pears/39.evaluacion_teorica_remediacion_pears.pdf');
	    $stylesheet = file_get_contents('assets/css/style_pdf/pears/s39.evaluacion_teorica_remediacion_pears.css');

	    for ($i=1; $i <= $pagecount ; $i++) {
	        $data['opc']=$i;

	        if ($i==1) {
	    		$html = $this->ci()->load->view($view, $data, TRUE);
	    		$tplId = $mpdf->ImportPage($i);
	    		$mpdf->UseTemplate($tplId);
	    		$mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	            $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    	}else{ 
	    			$tplId = $mpdf->ImportPage($i);
	    			$mpdf->SetPageTemplate($tplId); 
	    			$html = $this->ci()->load->view($view, $data, TRUE);
	    		    $mpdf->AddPage();
                    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
                    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);                
            }

	    }
	    
	    $mpdf->Output();
	} 

	public function constancia_participacion_pears($view, $data = array()) 
	{

	    $html = $this->ci()->load->view($view, $data, TRUE);
	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'A4', 
	    'orientation' => 'L' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	    
	    // Add First page 

	    $pagecount = $mpdf->SetSourceFile('assets/media/pears/40.constancia_participacion_pears.pdf');
	    $tplId = $mpdf->ImportPage(1);
	    $mpdf->SetPageTemplate($tplId);
	    //$mpdf->AddPage('L');
	    $stylesheet = file_get_contents('assets/css/style_pdf/pears/s40.constancia_participacion_pears.css');
	    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    
	    $mpdf->Output();
	} 

	public function Carta_PI_pears($view, $data = array()) 
	{

	    $html = $this->ci()->load->view($view, $data, TRUE);
	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'A4', 
	    'orientation' => 'P' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	    
	    // Add First page 

	    $pagecount = $mpdf->SetSourceFile('assets/media/pears/41.Carta_PI_pears.pdf');
	    $tplId = $mpdf->ImportPage(1);
	    $mpdf->SetPageTemplate($tplId);
	    //$mpdf->AddPage('L');
	    $stylesheet = file_get_contents('assets/css/style_pdf/pears/s41.Carta_PI_pears.css');
	    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    
	    $mpdf->Output();
	} 

	public function Instructor_Candidate_Aplication_pears($view, $data = array()) 
	{

	    $html = $this->ci()->load->view($view, $data, TRUE);
	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'A4', 
	    'orientation' => 'P' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	    
	    // Add First page 

	    $pagecount = $mpdf->SetSourceFile('assets/media/pears/42.Instructor_Candidate_Aplication_pears.pdf');
	    $tplId = $mpdf->ImportPage(1);
	    $mpdf->SetPageTemplate($tplId);
	    //$mpdf->AddPage('L');
	    $stylesheet = file_get_contents('assets/css/style_pdf/pears/s42.Instructor_Candidate_Aplication_pears.css');
	    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    
	    $mpdf->Output();
	} 

	public function Reporte_Director_curso_pears($view, $data = array()) 
	{

	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'A4', 
	    'orientation' => 'P' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	    
	    $pagecount = $mpdf->SetSourceFile('assets/media/pears/45.Reporte_Director_curso_pears.pdf');
	    $stylesheet = file_get_contents('assets/css/style_pdf/pears/s45.Reporte_Director_curso_pears.css');

	    for ($i=1; $i <= $pagecount ; $i++) {
	        $data['opc']=$i;

	        if ($i==1) {
	    		$html = $this->ci()->load->view($view, $data, TRUE);
	    		$tplId = $mpdf->ImportPage($i);
	    		$mpdf->UseTemplate($tplId);
	    		$mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	            $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    	}else{ 
	    			$tplId = $mpdf->ImportPage($i);
	    			$mpdf->SetPageTemplate($tplId); 
	    			$html = $this->ci()->load->view($view, $data, TRUE);
	    		    $mpdf->AddPage();
                    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
                    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);                
            }

	    }
	    
	    $mpdf->Output();
	} 

	public function ejemplo_reporte_logistica_pears($view, $data = array()) 
	{

	    $html = $this->ci()->load->view($view, $data, TRUE);
	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'A4', 
	    'orientation' => 'P' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	    
	    // Add First page 

	    $pagecount = $mpdf->SetSourceFile('assets/media/pears/46.ejemplo_reporte_logistica_pears.pdf');
	    $tplId = $mpdf->ImportPage(1);
	    $mpdf->SetPageTemplate($tplId);
	    //$mpdf->AddPage('L');
	    $stylesheet = file_get_contents('assets/css/style_pdf/pears/sejemplo_reporte_logistica_pears.css');
	    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    
	    $mpdf->Output();
	} 

    /*-------------------------------------------------------------------------------------
    ----------------------------------------MPDF PHTLS---------------------------------*/


	public function course_information_phtls($view, $data = array()) 
	{

	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'A4', 
	    'orientation' => 'L' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();

	    $tam_reg_tabla=$data['tam_reg_tabla'];	    
        $pages=ceil(count($data['instructores'])/$tam_reg_tabla);
	    
	    $pagecount = $mpdf->SetSourceFile('assets/media/phtls/1.course_information_phtls.pdf');
	    $stylesheet = file_get_contents('assets/css/style_pdf/phtls/s1.course_information_phtls.css');

	    for ($i=1; $i <= $pagecount; $i++) {
	        $data['opc']=$i; 

	    	if ($i==1) {
	    		for ($y=0; $y<$pages; $y++) {
	    			$data['veces']=$y;    		

	                if ($y==0) {
	            		$html = $this->ci()->load->view($view, $data, TRUE);
	    		        $tplId = $mpdf->ImportPage(1);
	    		        $mpdf->UseTemplate($tplId);	    		  
	            	}else{
	            		$html = $this->ci()->load->view($view, $data, TRUE);
	    			    $tplId = $mpdf->ImportPage(1);
	    			    $mpdf->SetPageTemplate($tplId);    			    
	    		        $mpdf->AddPage();                              
	            	}
	            	
	            	$mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
                    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);

	            }
	    	}
	    }
	    
	    $mpdf->Output();
	} 

	public function course_participants_phtls($view, $data = array()) 
	{

	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'letter', 
	    'orientation' => 'L' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	    
	  
	    $tam_reg_tabla=$data['tam_reg_tabla'];	    
        $pages=ceil(count($data['participantes'])/$tam_reg_tabla);
	    
	    $pagecount = $mpdf->SetSourceFile('assets/media/phtls/2.course_participants_phtls.pdf');
	    $stylesheet = file_get_contents('assets/css/style_pdf/phtls/s2.course_participants_phtls.css');
	    for ($i=1; $i <= 1; $i++) {
	        $data['opc']=$i; 

	    	if ($i==1) {
	    		for ($y=0; $y<$pages; $y++) {
	    			$data['veces']=$y;    		

	                if ($y==0) {
	            		$html = $this->ci()->load->view($view, $data, TRUE);
	    		        $tplId = $mpdf->ImportPage(1);
	    		        $mpdf->UseTemplate($tplId);	    		  
	            	}else{
	            		$html = $this->ci()->load->view($view, $data, TRUE);
	    			    $tplId = $mpdf->ImportPage(1);
	    			    $mpdf->SetPageTemplate($tplId);    			    
	    		        $mpdf->AddPage();                              
	            	}
	            	
	            	$mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
                    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);

	            }
	    	}
	    }
	    
	    $mpdf->Output();
	} 

	public function agenda_phtls($view, $data = array()) 
	{

	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'A4', 
	    'orientation' => 'P' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();	    
	  

	    $pagecount = $mpdf->SetSourceFile('assets/media/phtls/13.agenda_phtls.pdf');
	    $stylesheet = file_get_contents('assets/css/style_pdf/phtls13./sagenda_phtls.css');

	    for ($i=1; $i <= $pagecount ; $i++) {
	        $data['opc']=$i; 

	    	if ($i==1) {
	    		$html = $this->ci()->load->view($view, $data, TRUE);
	    		$tplId = $mpdf->ImportPage($i);
	    		$mpdf->UseTemplate($tplId);
	    		$mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	            $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    	}else{ 
	    			$tplId = $mpdf->ImportPage($i);
	    			$mpdf->SetPageTemplate($tplId); 
	    			$html = $this->ci()->load->view($view, $data, TRUE);
	    		    $mpdf->AddPage();
                    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
                    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);                
            }
        }
	    
	    $mpdf->Output();
	} 

	public function hoja_monitorizacion_phtls($view, $data = array()) 
	{

	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'A4', 
	    'orientation' => 'P' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	    
	    $pagecount = $mpdf->SetSourceFile('assets/media/phtls/14.hoja_monitorizacion_phtls.pdf');
	    $stylesheet = file_get_contents('assets/css/style_pdf/phtls/s14.hoja_monitorizacion_phtls.css');

	    for ($i=1; $i <= $pagecount ; $i++) {
	        $data['opc']=$i;

	        if ($i==1) {
	    		$html = $this->ci()->load->view($view, $data, TRUE);
	    		$tplId = $mpdf->ImportPage($i);
	    		$mpdf->UseTemplate($tplId);
	    		$mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	            $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    	}else{ 
	    			$tplId = $mpdf->ImportPage($i);
	    			$mpdf->SetPageTemplate($tplId); 
	    			$html = $this->ci()->load->view($view, $data, TRUE);
	    		    $mpdf->AddPage();
                    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
                    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);                
            }

	    }
	    
	    $mpdf->Output();
	} 

	public function valores_iniciales_caso_1_phtls($view, $data = array()) 
	{

	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => [203, 280],
	    'orientation' => 'P' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	    
	    $pagecount = $mpdf->SetSourceFile('assets/media/phtls/20.valores_iniciales_caso_1_phtls.pdf');
	    $stylesheet = file_get_contents('assets/css/style_pdf/phtls/s20.valores_iniciales_caso_1_phtls.css');

	    for ($i=1; $i <= $pagecount ; $i++) {
	        $data['opc']=$i; 

	    	if ($i==1) {
	    		$html = $this->ci()->load->view($view, $data, TRUE);
	    		$tplId = $mpdf->ImportPage($i);
	    		$mpdf->UseTemplate($tplId);
	    		$mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	            $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    	}else{ 
	    			$tplId = $mpdf->ImportPage($i);
	    			$mpdf->SetPageTemplate($tplId); 
	    			$html = $this->ci()->load->view($view, $data, TRUE);
	    		    $mpdf->AddPage();
                    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
                    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);                
            }
        }
	    
	    $mpdf->Output();
	} 

	public function valores_iniciales_caso_2_phtls($view, $data = array()) 
	{

	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => [203, 280], 
	    'orientation' => 'P' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	    
	
	    $pagecount = $mpdf->SetSourceFile('assets/media/phtls/21.valores_iniciales_caso_2_phtls.pdf');
	    $stylesheet = file_get_contents('assets/css/style_pdf/phtls/s21.valores_iniciales_caso_2_phtls.css');

	    for ($i=1; $i <= $pagecount ; $i++) {
	        $data['opc']=$i; 

	    	if ($i==1) {
	    		$html = $this->ci()->load->view($view, $data, TRUE);
	    		$tplId = $mpdf->ImportPage($i);
	    		$mpdf->UseTemplate($tplId);
	    		$mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	            $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    	}else{ 
	    			$tplId = $mpdf->ImportPage($i);
	    			$mpdf->SetPageTemplate($tplId); 
	    			$html = $this->ci()->load->view($view, $data, TRUE);
	    		    $mpdf->AddPage();
                    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
                    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);                
            }
        }
	    
	    $mpdf->Output();
	} 

	public function estacion_evaluacion_final_caso_1A_phtls($view, $data = array()) 
	{

	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => [203, 280], 
	    'orientation' => 'P' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	    
	  
	    $pagecount = $mpdf->SetSourceFile('assets/media/phtls/22.estacion_evaluacion_final_caso_1A_phtls.pdf');
	    $stylesheet = file_get_contents('assets/css/style_pdf/phtls/s22.estacion_evaluacion_final_caso_1A_phtls.css');

	    for ($i=1; $i <= $pagecount ; $i++) {
	        $data['opc']=$i; 

	    	if ($i==1) {
	    		$html = $this->ci()->load->view($view, $data, TRUE);
	    		$tplId = $mpdf->ImportPage($i);
	    		$mpdf->UseTemplate($tplId);
	    		$mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	            $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    	}else{ 
	    			$tplId = $mpdf->ImportPage($i);
	    			$mpdf->SetPageTemplate($tplId); 
	    			$html = $this->ci()->load->view($view, $data, TRUE);
	    		    $mpdf->AddPage();
                    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
                    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);                
            }
        }
	    
	    $mpdf->Output();
	} 

	public function estacion_evaluacion_final_caso_1B_phtls($view, $data = array()) 
	{

	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => [213, 280],  
	    'orientation' => 'P' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	    
	
	    $pagecount = $mpdf->SetSourceFile('assets/media/phtls/23.estacion_evaluacion_final_caso_1B_phtls.pdf');
	    $stylesheet = file_get_contents('assets/css/style_pdf/phtls/s23.estacion_evaluacion_final_caso_1B_phtls.css');

	    for ($i=1; $i <= $pagecount ; $i++) {
	        $data['opc']=$i; 

	    	if ($i==1) {
	    		$html = $this->ci()->load->view($view, $data, TRUE);
	    		$tplId = $mpdf->ImportPage($i);
	    		$mpdf->UseTemplate($tplId);
	    		$mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	            $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    	}else{ 
	    			$tplId = $mpdf->ImportPage($i);
	    			$mpdf->SetPageTemplate($tplId); 
	    			$html = $this->ci()->load->view($view, $data, TRUE);
	    		    $mpdf->AddPage();
                    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
                    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);                
            }
        }
	    
	    $mpdf->Output();
	} 

	public function estacion_evaluacion_final_caso_2A_phtls($view, $data = array()) 
	{

	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => [203, 280], 
	    'orientation' => 'P' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	    
	  
	    $pagecount = $mpdf->SetSourceFile('assets/media/phtls/24.estacion_evaluacion_final_caso_2A_phtls.pdf');
	    $stylesheet = file_get_contents('assets/css/style_pdf/phtls/s24.estacion_evaluacion_final_caso_2A_phtls.css');

	    for ($i=1; $i <= $pagecount ; $i++) {
	        $data['opc']=$i; 

	    	if ($i==1) {
	    		$html = $this->ci()->load->view($view, $data, TRUE);
	    		$tplId = $mpdf->ImportPage($i);
	    		$mpdf->UseTemplate($tplId);
	    		$mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	            $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    	}else{ 
	    			$tplId = $mpdf->ImportPage($i);
	    			$mpdf->SetPageTemplate($tplId); 
	    			$html = $this->ci()->load->view($view, $data, TRUE);
	    		    $mpdf->AddPage();
                    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
                    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);                
            }
        }
	    
	    $mpdf->Output();
	} 

	public function estacion_evaluacion_final_caso_2B_phtls($view, $data = array()) 
	{

	    
	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => [213, 280], 
	    'orientation' => 'P' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	  
	    $pagecount = $mpdf->SetSourceFile('assets/media/phtls/25.estacion_evaluacion_final_caso_2B_phtls.pdf');
	    $stylesheet = file_get_contents('assets/css/style_pdf/phtls/s25.estacion_evaluacion_final_caso_2B_phtls.css');

	    for ($i=1; $i <= $pagecount ; $i++) {
	        $data['opc']=$i; 

	    	if ($i==1) {
	    		$html = $this->ci()->load->view($view, $data, TRUE);
	    		$tplId = $mpdf->ImportPage($i);
	    		$mpdf->UseTemplate($tplId);
	    		$mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	            $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    	}else{ 
	    			$tplId = $mpdf->ImportPage($i);
	    			$mpdf->SetPageTemplate($tplId); 
	    			$html = $this->ci()->load->view($view, $data, TRUE);
	    		    $mpdf->AddPage();
                    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
                    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);                
            }
        }
	    
	    $mpdf->Output();
	} 

	public function estacion_evaluacion_final_caso_3A_phtls($view, $data = array()) 
	{
	   
	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => [203, 280], 
	    'orientation' => 'P' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	
	    $pagecount = $mpdf->SetSourceFile('assets/media/phtls/26.estacion_evaluacion_final_caso_3A_phtls.pdf');
	    $stylesheet = file_get_contents('assets/css/style_pdf/phtls/s26.estacion_evaluacion_final_caso_3A_phtls.css');

	    for ($i=1; $i <= $pagecount ; $i++) {
	        $data['opc']=$i; 

	    	if ($i==1) {
	    		$html = $this->ci()->load->view($view, $data, TRUE);
	    		$tplId = $mpdf->ImportPage($i);
	    		$mpdf->UseTemplate($tplId);
	    		$mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	            $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    	}else{ 
	    			$tplId = $mpdf->ImportPage($i);
	    			$mpdf->SetPageTemplate($tplId); 
	    			$html = $this->ci()->load->view($view, $data, TRUE);
	    		    $mpdf->AddPage();
                    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
                    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);                
            }
        }
	    
	    $mpdf->Output();
	} 

	public function estacion_evaluacion_final_caso_3B_phtls($view, $data = array()) 
	{

	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => [203, 280], 
	    'orientation' => 'P' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	    
	  
	    $pagecount = $mpdf->SetSourceFile('assets/media/phtls/27.estacion_evaluacion_final_caso_3B_phtls.pdf');
	    $stylesheet = file_get_contents('assets/css/style_pdf/phtls/s27.estacion_evaluacion_final_caso_3B_phtls.css');

	    for ($i=1; $i <= $pagecount ; $i++) {
	        $data['opc']=$i; 

	    	if ($i==1) {
	    		$html = $this->ci()->load->view($view, $data, TRUE);
	    		$tplId = $mpdf->ImportPage($i);
	    		$mpdf->UseTemplate($tplId);
	    		$mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	            $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    	}else{ 
	    			$tplId = $mpdf->ImportPage($i);
	    			$mpdf->SetPageTemplate($tplId); 
	    			$html = $this->ci()->load->view($view, $data, TRUE);
	    		    $mpdf->AddPage();
                    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
                    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);                
            }
        }
	    
	    $mpdf->Output();
	} 

	public function check_liste_evaluacion_practica_phtls($view, $data = array()) 
	{

	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'letter', 
	    'orientation' => 'P' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	
	    $pagecount = $mpdf->SetSourceFile('assets/media/phtls/28.check_liste_evaluacion_practica_phtls.pdf');
	    $stylesheet = file_get_contents('assets/css/style_pdf/phtls/s28.check_liste_evaluacion_practica_phtls.css');

	    for ($i=1; $i <= $pagecount ; $i++) {
	        $data['opc']=$i; 

	    	if ($i==1) {
	    		$html = $this->ci()->load->view($view, $data, TRUE);
	    		$tplId = $mpdf->ImportPage($i);
	    		$mpdf->UseTemplate($tplId);
	    		$mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	            $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    	}else{ 
	    			$tplId = $mpdf->ImportPage($i);
	    			$mpdf->SetPageTemplate($tplId); 
	    			$html = $this->ci()->load->view($view, $data, TRUE);
	    		    $mpdf->AddPage();
                    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
                    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);                
            }
        }
	    
	    $mpdf->Output();
	} 

	public function Pos_evaluacion_teorica_phtls($view, $data = array()) 
	{

	    $html = $this->ci()->load->view($view, $data, TRUE);
	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'A4', 
	    'orientation' => 'P' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	    
	    // Add First page 

	    $pagecount = $mpdf->SetSourceFile('assets/media/phtls/29.Pos_evaluacion_teorica_phtls.pdf');
	    $tplId = $mpdf->ImportPage(1);
	    $mpdf->SetPageTemplate($tplId);
	    //$mpdf->AddPage('L');
	    $stylesheet = file_get_contents('assets/css/style_pdf/phtls/s29.Pos_evaluacion_teorica_phtls.css');
	    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    
	    $mpdf->Output();
	} 

	public function hoja_respuestas_teorica_phtls($view, $data = array()) 
	{

	    $html = $this->ci()->load->view($view, $data, TRUE);
	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'A4', 
	    'orientation' => 'P' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	    
	    // Add First page 

	    $pagecount = $mpdf->SetSourceFile('assets/media/phtls/30.hoja_respuestas_teorica_phtls.pdf');
	    $tplId = $mpdf->ImportPage(1);
	    $mpdf->SetPageTemplate($tplId);
	    //$mpdf->AddPage('L');
	    $stylesheet = file_get_contents('assets/css/style_pdf/phtls/s30.hoja_respuestas_teorica_phtls.css');
	    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    
	    $mpdf->Output();
	} 

	public function constancia_participacion_phtls($view, $data = array()) 
	{

	    $html = $this->ci()->load->view($view, $data, TRUE);
	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'A4', 
	    'orientation' => 'L' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	    
	    // Add First page 

	    $pagecount = $mpdf->SetSourceFile('assets/media/phtls/31.constancia_participacion_phtls.pdf');
	    $tplId = $mpdf->ImportPage(1);
	    $mpdf->SetPageTemplate($tplId);
	    //$mpdf->AddPage('L');
	    $stylesheet = file_get_contents('assets/css/style_pdf/phtls/s31.constancia_participacion_phtls.css');
	    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    
	    $mpdf->Output();
	} 

	public function carta_PI_phtls($view, $data = array()) 
	{

	    $html = $this->ci()->load->view($view, $data, TRUE);
	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'A4', 
	    'orientation' => 'P' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	    
	    // Add First page 

	    $pagecount = $mpdf->SetSourceFile('assets/media/phtls/32.carta_PI_phtls.pdf');
	    $tplId = $mpdf->ImportPage(1);
	    $mpdf->SetPageTemplate($tplId);
	    //$mpdf->AddPage('L');
	    $stylesheet = file_get_contents('assets/css/style_pdf/phtls/s32.carta_PI_phtls.css');
	    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    
	    $mpdf->Output();
	} 

	public function Reporte_Director_curso_phtls($view, $data = array()) 
	{

	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'A4', 
	    'orientation' => 'P' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	  
	    $pagecount = $mpdf->SetSourceFile('assets/media/phtls/35.Reporte_Director_curso_phtls.pdf');
	    $stylesheet = file_get_contents('assets/css/style_pdf/phtls/s35.Reporte_Director_curso_phtls.css');

	    for ($i=1; $i <= $pagecount ; $i++) {
	        $data['opc']=$i;

	        if ($i==1) {
	    		$html = $this->ci()->load->view($view, $data, TRUE);
	    		$tplId = $mpdf->ImportPage($i);
	    		$mpdf->UseTemplate($tplId);
	    		$mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	            $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    	}else{ 
	    			$tplId = $mpdf->ImportPage($i);
	    			$mpdf->SetPageTemplate($tplId); 
	    			$html = $this->ci()->load->view($view, $data, TRUE);
	    		    $mpdf->AddPage();
                    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
                    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);                
            }

	    }
	    
	    $mpdf->Output();
	} 

	public function ejemplo_reporte_logistica_phtls($view, $data = array()) 
	{

	    $html = $this->ci()->load->view($view, $data, TRUE);
	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'A4', 
	    'orientation' => 'P' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	    
	    // Add First page 

	    $pagecount = $mpdf->SetSourceFile('assets/media/phtls/36.ejemplo_reporte_logistica_phtls.pdf');
	    $tplId = $mpdf->ImportPage(1);
	    $mpdf->SetPageTemplate($tplId);
	    //$mpdf->AddPage('L');
	    $stylesheet = file_get_contents('assets/css/style_pdf/phtls/sejemplo_reporte_logistica_phtls.css');
	    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    
	    $mpdf->Output();
	} 

    /*-------------------------------------------------------------------------------------
    ----------------------------------------MPDF SONO---------------------------------*/


	public function registro_instructores_PACE_SONO_sono($view, $data = array()) 
	{

	    $html = $this->ci()->load->view($view, $data, TRUE);
	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'letter', 
	    'orientation' => 'L' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	    
	    // Add First page 

	    $pagecount = $mpdf->SetSourceFile('assets/media/sono/1.registro_instructores_PACE_SONO_sono.pdf');
	    $tplId = $mpdf->ImportPage(1);
	    $mpdf->SetPageTemplate($tplId);
	    //$mpdf->AddPage('L');
	    $stylesheet = file_get_contents('assets/css/style_pdf/sono/s1.registro_instructores_PACE_SONO_sono.css');
	    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    
	    $mpdf->Output();
	} 

	public function registro_participantes_PACE_SONO_sono($view, $data = array()) 
	{

	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'letter', 
	    'orientation' => 'L' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();

	    $tam_reg_tabla=$data['tam_reg_tabla'];	    
        $pages=ceil(count($data['participantes'])/$tam_reg_tabla);
	    
	    $pagecount = $mpdf->SetSourceFile('assets/media/sono/2.registro_participantes_PACE_SONO_sono.pdf');
	    $stylesheet = file_get_contents('assets/css/style_pdf/sono/s2.registro_participantes_PACE_SONO_sono.css');

	    for ($i=1; $i <= 1; $i++) {
	        $data['opc']=$i; 

	    	if ($i==1) {
	    		for ($y=0; $y<$pages; $y++) {
	    			$data['veces']=$y;    		

	                if ($y==0) {
	            		$html = $this->ci()->load->view($view, $data, TRUE);
	    		        $tplId = $mpdf->ImportPage(1);
	    		        $mpdf->UseTemplate($tplId);	    		  
	            	}else{
	            		$html = $this->ci()->load->view($view, $data, TRUE);
	    			    $tplId = $mpdf->ImportPage(1);
	    			    $mpdf->SetPageTemplate($tplId);    			    
	    		        $mpdf->AddPage();                              
	            	}
	            	
	            	$mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
                    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);

	            }
	    	}
	    }
	    
	    $mpdf->Output();
	} 

	public function Convocatoria_ALSO_sono($view, $data = array()) 
	{

	    $html = $this->ci()->load->view($view, $data, TRUE);
	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => [190, 254], 
	    'orientation' => 'L' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	    
	    // Add First page 

	    $pagecount = $mpdf->SetSourceFile('assets/media/sono/9.Convocatoria_ALSO_sono.pdf');
	    $tplId = $mpdf->ImportPage(1);
	    $mpdf->SetPageTemplate($tplId);
	    //$mpdf->AddPage('L');
	    $stylesheet = file_get_contents('assets/css/style_pdf/sono/s9.Convocatoria_ALSO_sono.css');
	    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    
	    $mpdf->Output();
	} 

	public function Plantilla_Respuesta_sono($view, $data = array()) 
	{

	    $html = $this->ci()->load->view($view, $data, TRUE);
	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => [190, 254],  
	    'orientation' => 'L' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	    
	    // Add First page 

	    $pagecount = $mpdf->SetSourceFile('assets/media/sono/10.Plantilla_Respuesta_sono.pdf');
	    $tplId = $mpdf->ImportPage(1);
	    $mpdf->SetPageTemplate($tplId);
	    //$mpdf->AddPage('L');
	    $stylesheet = file_get_contents('assets/css/style_pdf/sono/s10.Plantilla_Respuesta_sono.css');
	    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    
	    $mpdf->Output();
	} 

	public function AGENDA_sono($view, $data = array()) 
	{

	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'A4', 
	    'orientation' => 'L' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	    
	    $pagecount = $mpdf->SetSourceFile('assets/media/sono/11.AGENDA_sono.pdf');
	    $stylesheet = file_get_contents('assets/css/style_pdf/sono/s11.AGENDA_sono.css');

	    for ($i=1; $i <= $pagecount ; $i++) {
	        $data['opc']=$i;

	        if ($i==1) {
	    		$html = $this->ci()->load->view($view, $data, TRUE);
	    		$tplId = $mpdf->ImportPage($i);
	    		$mpdf->UseTemplate($tplId);
	    		$mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	            $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    	}else{ 
	    			$tplId = $mpdf->ImportPage($i);
	    			$mpdf->SetPageTemplate($tplId); 
	    			$html = $this->ci()->load->view($view, $data, TRUE);
	    		    $mpdf->AddPage();
                    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
                    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);                
            }

	    }
	    
	    $mpdf->Output();
	} 

	public function Examen_imagenes_PACE_SONO_sono($view, $data = array()) 
	{

	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'A4', 
	    'orientation' => 'P' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	    
	    // Add First page

	    $tam_reg_tabla=2;
	    $pages=ceil(count($data['nombre_participante'])/$tam_reg_tabla); 

	    $pagecount = $mpdf->SetSourceFile('assets/media/sono/13.Examen_imagenes_PACE_SONO_sono.pdf');
	    $stylesheet = file_get_contents('assets/css/style_pdf/sono/s13.Examen_imagenes_PACE_SONO_sono.css');

	    for ($i=1; $i <= $pagecount; $i++) {
	        $data['opc']=$i; 

	    	if ($i==1) {	    		
	            for ($y=0; $y<$pages; $y++) {
	            	$data['veces']=$y;

	            	if ($y==0) {
	            		$html = $this->ci()->load->view($view, $data, TRUE);
	    		        $tplId = $mpdf->ImportPage(1);
	    		        $mpdf->UseTemplate($tplId);
	    		        $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	                    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	            	}else{
	    			    $tplId = $mpdf->ImportPage(1);
	    			    $mpdf->SetPageTemplate($tplId); 
	    			    $html = $this->ci()->load->view($view, $data, TRUE);
	    		        $mpdf->AddPage();
                        $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
                        $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);      
	            	}

	            }
	    	}else{	    			    				    			
	    			$data['veces']=$y;
	    			$tplId = $mpdf->ImportPage($i);
	    			$mpdf->SetPageTemplate($tplId); 
	    			$html = $this->ci()->load->view($view, $data, TRUE);
	    		    $mpdf->AddPage();
                    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
                    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);    
            }
        }
	    
	    $mpdf->Output();
	} 

	public function Examen_teorico_PACE_SONO_sono($view, $data = array()) 
	{

	    $html = $this->ci()->load->view($view, $data, TRUE);
	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'A4', 
	    'orientation' => 'P' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();

	    $tam_reg_tabla=2;
	    $pages=ceil(count($data['nombre_participante'])/$tam_reg_tabla); 

	    $pagecount = $mpdf->SetSourceFile('assets/media/sono/14.Examen_teorico_PACE_SONO_sono.pdf');
	    $stylesheet = file_get_contents('assets/css/style_pdf/sono/s14.Examen_teorico_PACE_SONO_sono.css');

	    for ($i=1; $i <= $pagecount; $i++) {
	        $data['opc']=$i; 

	    	if ($i==1) {	    		
	            for ($y=0; $y<$pages; $y++) {
	            	$data['veces']=$y;

	            	if ($y==0) {
	            		$html = $this->ci()->load->view($view, $data, TRUE);
	    		        $tplId = $mpdf->ImportPage(1);
	    		        $mpdf->UseTemplate($tplId);
	    		        $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	                    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	            	}else{
	    			    $tplId = $mpdf->ImportPage(1);
	    			    $mpdf->SetPageTemplate($tplId); 
	    			    $html = $this->ci()->load->view($view, $data, TRUE);
	    		        $mpdf->AddPage();
                        $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
                        $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);      
	            	}

	            }
	    	}else{	    			    				    			
	    			$data['veces']=$y;
	    			$tplId = $mpdf->ImportPage($i);
	    			$mpdf->SetPageTemplate($tplId); 
	    			$html = $this->ci()->load->view($view, $data, TRUE);
	    		    $mpdf->AddPage();
                    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
                    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);    
            }
        }
	    
	    $mpdf->Output();
	} 

	public function formato_remediaciones_PACE_SONO_sono($view, $data = array()) 
	{

	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'A4', 
	    'orientation' => 'L' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();	    

	    $tam_reg_tabla=$data['tam_reg_tabla'];	    
        $pages=ceil(count($data['datos'])/$tam_reg_tabla);
	    
	    $pagecount = $mpdf->SetSourceFile('assets/media/sono/15.formato_remediaciones_PACE_SONO_sono.pdf');
	    $stylesheet = file_get_contents('assets/css/style_pdf/sono/s15.formato_remediaciones_PACE_SONO_sono.css');

	    for ($i=1; $i <= $pagecount; $i++) {
	        $data['opc']=$i; 

	    	if ($i==1) {
	    		for ($y=0; $y<$pages; $y++) {
	    			$data['veces']=$y;    		

	                if ($y==0) {
	            		$html = $this->ci()->load->view($view, $data, TRUE);
	    		        $tplId = $mpdf->ImportPage(1);
	    		        $mpdf->UseTemplate($tplId);	    		  
	            	}else{
	            		$html = $this->ci()->load->view($view, $data, TRUE);
	    			    $tplId = $mpdf->ImportPage(1);
	    			    $mpdf->SetPageTemplate($tplId);    			    
	    		        $mpdf->AddPage();                              
	            	}
	            	
	            	$mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
                    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);

	            }
	    	}
	    }
        
	    
	    $mpdf->Output();
	} 

	public function Tarjeta_PACE_SONO_Basico_sono($view, $data = array()) 
	{

	    $html = $this->ci()->load->view($view, $data, TRUE);
	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'letter', 
	    'orientation' => 'P' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	    
	    // Add First page 

	    $pagecount = $mpdf->SetSourceFile('assets/media/sono/16.Tarjeta_PACE_SONO_Basico_sono.pdf');
	    $tplId = $mpdf->ImportPage(1);
	    $mpdf->SetPageTemplate($tplId);
	    //$mpdf->AddPage('L');
	    $stylesheet = file_get_contents('assets/css/style_pdf/sono/s16.Tarjeta_PACE_SONO_Basico_sono.css');
	    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    
	    $mpdf->Output();
	} 

	public function Candidato_instructor_PACE_SONO_sono($view, $data = array()) 
	{

	    $html = $this->ci()->load->view($view, $data, TRUE);
	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'A4', 
	    'orientation' => 'P' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	    
	    // Add First page 

	    $pagecount = $mpdf->SetSourceFile('assets/media/sono/17.Candidato_instructor_PACE_SONO_sono.pdf');
	    $tplId = $mpdf->ImportPage(1);
	    $mpdf->SetPageTemplate($tplId);
	    //$mpdf->AddPage('L');
	    $stylesheet = file_get_contents('assets/css/style_pdf/sono/s17.Candidato_instructor_PACE_SONO_sono.css');
	    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    
	    $mpdf->Output();
	} 

	public function Reporte_Director_curso_sono($view, $data = array()) 
	{

	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'A4', 
	    'orientation' => 'P' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();

	    $pagecount = $mpdf->SetSourceFile('assets/media/sono/20.Reporte_Director_curso_sono.pdf');
	    $stylesheet = file_get_contents('assets/css/style_pdf/sono/s20.Reporte_Director_curso_sono.css');

	    for ($i=1; $i <= $pagecount ; $i++) {
	        $data['opc']=$i;

	        if ($i==1) {
	    		$html = $this->ci()->load->view($view, $data, TRUE);
	    		$tplId = $mpdf->ImportPage($i);
	    		$mpdf->UseTemplate($tplId);
	    		$mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	            $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    	}else{ 
	    			$tplId = $mpdf->ImportPage($i);
	    			$mpdf->SetPageTemplate($tplId); 
	    			$html = $this->ci()->load->view($view, $data, TRUE);
	    		    $mpdf->AddPage();
                    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
                    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);                
            }

	    }
	    
	    $mpdf->Output();
	} 

	public function ejemplo_reporte_logistica_sono($view, $data = array()) 
	{

	    $html = $this->ci()->load->view($view, $data, TRUE);
	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'A4', 
	    'orientation' => 'P' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	    
	    // Add First page 

	    $pagecount = $mpdf->SetSourceFile('assets/media/sono/21.ejemplo_reporte_logistica_sono.pdf');
	    $tplId = $mpdf->ImportPage(1);
	    $mpdf->SetPageTemplate($tplId);
	    //$mpdf->AddPage('L');
	    $stylesheet = file_get_contents('assets/css/style_pdf/sono/sejemplo_reporte_logistica_sono.css');
	    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    
	    $mpdf->Output();
	} 

    /*-------------------------------------------------------------------------------------
    ----------------------------------------MPDF TNCC---------------------------------*/ 

	public function Revision_posterior_curso_tncc1($view, $data = array()) 
	{

	    $html = $this->ci()->load->view($view, $data, TRUE);
	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'A4', 
	    'orientation' => 'P' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	    
	    // Add First page 

	    $pagecount = $mpdf->SetSourceFile('assets/media/tncc/1.1Revision_posterior_curso_tncc.pdf');
	    $tplId = $mpdf->ImportPage(1);
	    $mpdf->SetPageTemplate($tplId);
	    //$mpdf->AddPage('L');
	    $stylesheet = file_get_contents('assets/css/style_pdf/tncc/s1.1Revision_posterior_curso_tncc.css');
	    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    
	    $mpdf->Output();
	} 

	public function carta_bienvenida_curso_tncc($view, $data = array()) 
	{

	    $html = $this->ci()->load->view($view, $data, TRUE);
	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'A4', 
	    'orientation' => 'P' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	    
	    // Add First page 

	    $pagecount = $mpdf->SetSourceFile('assets/media/tncc/1.carta_bienvenida_curso_tncc.pdf');
	    $tplId = $mpdf->ImportPage(1);
	    $mpdf->SetPageTemplate($tplId);
	    //$mpdf->AddPage('L');
	    $stylesheet = file_get_contents('assets/css/style_pdf/tncc/s1.carta_bienvenida_curso_tncc.css');
	    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    
	    $mpdf->Output();
	} 

	public function Final_Faculty_Roster_tncc($view, $data = array()) 
	{

	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'letter', 
	    'orientation' => 'L' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	 
	    $tam_reg_tabla=$data['tam_reg_tabla'];	    
        $pages=ceil(count($data['instructor'])/$tam_reg_tabla);
	    
	    $pagecount = $mpdf->SetSourceFile('assets/media/tncc/2.Final_Faculty_Roster_tncc.pdf');
	    $stylesheet = file_get_contents('assets/css/style_pdf/tncc/s2.Final_Faculty_Roster_tncc.css');

	    for ($i=1; $i <= $pagecount; $i++) {
	        $data['opc']=$i; 

	    	if ($i==1) {
	    		for ($y=0; $y<$pages; $y++) {
	    			$data['veces']=$y;    		

	                if ($y==0) {
	            		$html = $this->ci()->load->view($view, $data, TRUE);
	    		        $tplId = $mpdf->ImportPage(1);
	    		        $mpdf->UseTemplate($tplId);	    		  
	            	}else{
	            		$html = $this->ci()->load->view($view, $data, TRUE);
	    			    $tplId = $mpdf->ImportPage(1);
	    			    $mpdf->SetPageTemplate($tplId);    			    
	    		        $mpdf->AddPage();                              
	            	}
	            	
	            	$mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
                    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);

	            }
	    	}
	    }
	    
	    $mpdf->Output();
	} 

	public function Lista_Instructores_tncc($view, $data = array()) 
	{

	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'letter', 
	    'orientation' => 'L' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();

	    $tam_reg_tabla=$data['tam_reg_tabla'];	    
        $pages=ceil(count($data['instructor'])/$tam_reg_tabla);
	    
	    $pagecount = $mpdf->SetSourceFile('assets/media/tncc/3.Lista_Instructores_tncc.pdf');
	    $stylesheet = file_get_contents('assets/css/style_pdf/tncc/s3.Lista_Instructores_tncc.css');

	    for ($i=1; $i <= $pagecount; $i++) {
	        $data['opc']=$i; 

	    	if ($i==1) {
	    		for ($y=0; $y<$pages; $y++) {
	    			$data['veces']=$y;    		

	                if ($y==0) {
	            		$html = $this->ci()->load->view($view, $data, TRUE);
	    		        $tplId = $mpdf->ImportPage(1);
	    		        $mpdf->UseTemplate($tplId);	    		  
	            	}else{
	            		$html = $this->ci()->load->view($view, $data, TRUE);
	    			    $tplId = $mpdf->ImportPage(1);
	    			    $mpdf->SetPageTemplate($tplId);    			    
	    		        $mpdf->AddPage();                              
	            	}
	            	
	            	$mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
                    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);

	            }
	    	}
	    }
	    
	    $mpdf->Output();
	} 

	public function Lista_Participantes_tncc($view, $data = array()) 
	{

	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'letter', 
	    'orientation' => 'P' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	  
	    $tam_reg_tabla=$data['tam_reg_tabla'];	    
        $pages=ceil(count($data['participantes'])/$tam_reg_tabla);
	    
	    $pagecount = $mpdf->SetSourceFile('assets/media/tncc/4.Lista_Participantes_tncc.pdf');
	    $stylesheet = file_get_contents('assets/css/style_pdf/tncc/s4.Lista_Participantes_tncc.css');

	    for ($i=1; $i <= $pagecount; $i++) {
	        $data['opc']=$i; 

	    	if ($i==1) {
	    		for ($y=0; $y<$pages; $y++) {
	    			$data['veces']=$y;    		

	                if ($y==0) {
	            		$html = $this->ci()->load->view($view, $data, TRUE);
	    		        $tplId = $mpdf->ImportPage(1);
	    		        $mpdf->UseTemplate($tplId);	    		  
	            	}else{
	            		$html = $this->ci()->load->view($view, $data, TRUE);
	    			    $tplId = $mpdf->ImportPage(1);
	    			    $mpdf->SetPageTemplate($tplId);    			    
	    		        $mpdf->AddPage();                              
	            	}
	            	
	            	$mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
                    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);

	            }
	    	}
	    }
	    
	    $mpdf->Output();
	} 

	public function Resumen_Calificaciones_tncc($view, $data = array()) 
	{

	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'letter', 
	    'orientation' => 'L' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	    
	    // Add First page 

	    $grupoa=count($data['tabla1']);
        $grupob=count($data['tabla2']);

	    $tam_reg_tabla=$data['tam_reg_tabla'];	    
        $pages=ceil(max($grupoa,$grupob)/$tam_reg_tabla);
	    
	    $pagecount = $mpdf->SetSourceFile('assets/media/tncc/5.Resumen_Calificaciones_tncc.pdf');
	    $stylesheet = file_get_contents('assets/css/style_pdf/tncc/s5.Resumen_Calificaciones_tncc.css');

	    for ($y=0; $y<$pages; $y++) {
	    	$data['veces']=$y;

	    	for ($i=1; $i <= $pagecount; $i++) {	        
	            $data['opc']=$i;

	            if ($i==1 && $y==0) {
	            	$html = $this->ci()->load->view($view, $data, TRUE);
    	            $tplId = $mpdf->ImportPage($i);
    	            $mpdf->UseTemplate($tplId);	    		  
	            }else{
	            	$html = $this->ci()->load->view($view, $data, TRUE);
    	    	    $tplId = $mpdf->ImportPage($i);
    	    	    $mpdf->SetPageTemplate($tplId);    			    
    	            $mpdf->AddPage();                              
	            }
	            	
	            $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
                $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);

	        }

	    }    	
	    
	    $mpdf->Output();
	} 

	public function Agenda_tncc($view, $data = array()) 
	{

	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'letter', 
	    'orientation' => 'P' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	    
	  
	    $pagecount = $mpdf->SetSourceFile('assets/media/tncc/6.Agenda_tncc.pdf');
	    $stylesheet = file_get_contents('assets/css/style_pdf/tncc/s6.Agenda_tncc.css');

	    for ($i=1; $i <= $pagecount ; $i++) {
	        $data['opc']=$i; 

	    	if ($i==1) {
	    		$html = $this->ci()->load->view($view, $data, TRUE);
	    		$tplId = $mpdf->ImportPage($i);
	    		$mpdf->UseTemplate($tplId);
	    		$mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	            $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    	}else{ 
	    			$tplId = $mpdf->ImportPage($i);
	    			$mpdf->SetPageTemplate($tplId); 
	    			$html = $this->ci()->load->view($view, $data, TRUE);
	    		    $mpdf->AddPage();
                    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
                    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);                
            }
        }
	    
	    $mpdf->Output();
	} 

	public function REGISTRO_UNICO_PARTICIPANTES_tncc($view, $data = array()) 
	{

	    $html = $this->ci()->load->view($view, $data, TRUE);
	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'A4', 
	    'orientation' => 'P' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	    
	    // Add First page 

	    $pagecount = $mpdf->SetSourceFile('assets/media/tncc/7.REGISTRO_UNICO_PARTICIPANTES_tncc.pdf');
	    $tplId = $mpdf->ImportPage(1);
	    $mpdf->SetPageTemplate($tplId);
	    //$mpdf->AddPage('L');
	    $stylesheet = file_get_contents('assets/css/style_pdf/tncc/s7.REGISTRO_UNICO_PARTICIPANTES_tncc.css');
	    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    
	    $mpdf->Output();
	} 

	public function CARTA_COMPROMISO_tncc($view, $data = array()) 
	{

	    $html = $this->ci()->load->view($view, $data, TRUE);
	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'A4', 
	    'orientation' => 'P' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	    
	    // Add First page 

	    $pagecount = $mpdf->SetSourceFile('assets/media/tncc/8.CARTA_COMPROMISO_tncc.pdf');
	    $tplId = $mpdf->ImportPage(1);
	    $mpdf->SetPageTemplate($tplId);
	    //$mpdf->AddPage('L');
	    $stylesheet = file_get_contents('assets/css/style_pdf/tncc/s8.CARTA_COMPROMISO_tncc.css');
	    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    
	    $mpdf->Output();
	} 

	public function Estacion_Examen_1_tncc($view, $data = array()) 
	{

	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'letter', 
	    'orientation' => 'P' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	
	    $pagecount = $mpdf->SetSourceFile('assets/media/tncc/9.Estacion_Examen_1_tncc.pdf');
	    $stylesheet = file_get_contents('assets/css/style_pdf/tncc/s9.Estacion_Examen_1_tncc.css');

	    for ($i=1; $i <= $pagecount ; $i++) {
	        $data['opc']=$i; 

	    	if ($i==1) {
	    		$html = $this->ci()->load->view($view, $data, TRUE);
	    		$tplId = $mpdf->ImportPage($i);
	    		$mpdf->UseTemplate($tplId);
	    		$mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	            $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    	}else{ 
	    			$tplId = $mpdf->ImportPage($i);
	    			$mpdf->SetPageTemplate($tplId); 
	    			$html = $this->ci()->load->view($view, $data, TRUE);
	    		    $mpdf->AddPage();
                    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
                    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);                
            }
        }
	    
	    $mpdf->Output();
	} 

	public function Estacion_Examen_2_tncc($view, $data = array()) 
	{

	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => [215,280], 
	    'orientation' => 'P' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	    
	 
	    $pagecount = $mpdf->SetSourceFile('assets/media/tncc/10.Estacion_Examen_2_tncc.pdf');
	    $stylesheet = file_get_contents('assets/css/style_pdf/tncc/s10.Estacion_Examen_2_tncc.css');

	    for ($i=1; $i <= $pagecount ; $i++) {
	        $data['opc']=$i; 

	    	if ($i==1) {
	    		$html = $this->ci()->load->view($view, $data, TRUE);
	    		$tplId = $mpdf->ImportPage($i);
	    		$mpdf->UseTemplate($tplId);
	    		$mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	            $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    	}else{ 
	    			$tplId = $mpdf->ImportPage($i);
	    			$mpdf->SetPageTemplate($tplId); 
	    			$html = $this->ci()->load->view($view, $data, TRUE);
	    		    $mpdf->AddPage();
                    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
                    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);                
            }
        }
	    
	    $mpdf->Output();
	} 

	public function CASOS_PET_ABCDEF_tncc($view, $data = array()) 
	{

	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'A4', 
	    'orientation' => 'P' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();	    
	 
	    $pagecount = $mpdf->SetSourceFile('assets/media/tncc/11.CASOS_PET_ABCDEF_tncc.pdf');
	    $stylesheet = file_get_contents('assets/css/style_pdf/tncc/s11.CASOS_PET_ABCDEF_tncc.css');

	    for ($i=1; $i <= $pagecount ; $i++) {
	        $data['opc']=$i; 

	    	if ($i==1) {
	    		$html = $this->ci()->load->view($view, $data, TRUE);
	    		$tplId = $mpdf->ImportPage($i);
	    		$mpdf->UseTemplate($tplId);
	    		$mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	            $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    	}else{ 
	    			$tplId = $mpdf->ImportPage($i);
	    			$mpdf->SetPageTemplate($tplId); 
	    			$html = $this->ci()->load->view($view, $data, TRUE);
	    		    $mpdf->AddPage();
                    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
                    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);                
            }
        }
	    
	    $mpdf->Output();
	} 

	public function CASOS_VIA_AEREA_ABCD_tncc($view, $data = array()) 
	{

	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'letter', 
	    'orientation' => 'P' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	 
	    $pagecount = $mpdf->SetSourceFile('assets/media/tncc/12.CASOS_VIA_AEREA_ABCD_tncc.pdf');
	    $stylesheet = file_get_contents('assets/css/style_pdf/tncc/s12.CASOS_VIA_AEREA_ABCD_tncc.css');

	    for ($i=1; $i <= $pagecount ; $i++) {
	        $data['opc']=$i; 

	    	if ($i==1) {
	    		$html = $this->ci()->load->view($view, $data, TRUE);
	    		$tplId = $mpdf->ImportPage($i);
	    		$mpdf->UseTemplate($tplId);
	    		$mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	            $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    	}else{ 
	    			$tplId = $mpdf->ImportPage($i);
	    			$mpdf->SetPageTemplate($tplId); 
	    			$html = $this->ci()->load->view($view, $data, TRUE);
	    		    $mpdf->AddPage();
                    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
                    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);                
            }
        }
	    
	    $mpdf->Output();
	} 

	public function Instructor_Potential_Application_tncc($view, $data = array()) 
	{
	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'letter', 
	    'orientation' => 'P' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	
	    $pagecount = $mpdf->SetSourceFile('assets/media/tncc/13.Instructor_Potential_Application_tncc.pdf');
	    $stylesheet = file_get_contents('assets/css/style_pdf/tncc/s13.Instructor_Potential_Application_tncc.css');

	    for ($i=1; $i <= $pagecount ; $i++) {
	        $data['opc']=$i; 

	    	if ($i==1) {
	    		$html = $this->ci()->load->view($view, $data, TRUE);
	    		$tplId = $mpdf->ImportPage($i);
	    		$mpdf->UseTemplate($tplId);
	    		$mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	            $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    	}else{ 
	    			$tplId = $mpdf->ImportPage($i);
	    			$mpdf->SetPageTemplate($tplId); 
	    			$html = $this->ci()->load->view($view, $data, TRUE);
	    		    $mpdf->AddPage();
                    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
                    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);                
            }
        }
	    
	    $mpdf->Output();
	} 

	public function CANDIDATO_INSTRUCTOR_PACE_tncc($view, $data = array()) 
	{

	    $html = $this->ci()->load->view($view, $data, TRUE);
	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'A4', 
	    'orientation' => 'P' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	    
	    // Add First page 

	    $pagecount = $mpdf->SetSourceFile('assets/media/tncc/14.CANDIDATO_INSTRUCTOR_PACE_tncc.pdf');
	    $tplId = $mpdf->ImportPage(1);
	    $mpdf->SetPageTemplate($tplId);
	    //$mpdf->AddPage('L');
	    $stylesheet = file_get_contents('assets/css/style_pdf/tncc/s14.CANDIDATO_INSTRUCTOR_PACE_tncc.css');
	    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    
	    $mpdf->Output();
	} 

	public function Formato_Remediales_tncc($view, $data = array()) 
	{

	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'letter', 
	    'orientation' => 'L' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	    
	 
	    $tam_reg_tabla=$data['tam_reg_tabla'];	    
        $pages=ceil(count($data['datos'])/$tam_reg_tabla);
	    
	    $pagecount = $mpdf->SetSourceFile('assets/media/tncc/15.Formato_Remediales_tncc.pdf');
	    $stylesheet = file_get_contents('assets/css/style_pdf/tncc/s15.Formato_Remediales_tncc.css');

	    for ($i=1; $i <= $pagecount; $i++) {
	        $data['opc']=$i; 

	    	if ($i==1) {
	    		for ($y=0; $y<$pages; $y++) {
	    			$data['veces']=$y;    		

	                if ($y==0) {
	            		$html = $this->ci()->load->view($view, $data, TRUE);
	    		        $tplId = $mpdf->ImportPage(1);
	    		        $mpdf->UseTemplate($tplId);	    		  
	            	}else{
	            		$html = $this->ci()->load->view($view, $data, TRUE);
	    			    $tplId = $mpdf->ImportPage(1);
	    			    $mpdf->SetPageTemplate($tplId);    			    
	    		        $mpdf->AddPage();                              
	            	}
	            	
	            	$mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
                    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);

	            }
	    	}
	    }
	    
	    $mpdf->Output();
	} 

	public function Instructor_Candidate_Instructor_Monitoring_Form_tncc($view, $data = array()) 
	{

	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'letter', 
	    'orientation' => 'L' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();	    
	
	    $pagecount = $mpdf->SetSourceFile('assets/media/tncc/16.Instructor_Candidate_Instructor_Monitoring_Form_tncc.pdf');
	    $stylesheet = file_get_contents('assets/css/style_pdf/tncc/s16.Instructor_Candidate_Instructor_Monitoring_Form_tncc.css');

	    for ($i=1; $i <= $pagecount ; $i++) {
	        $data['opc']=$i; 

	    	if ($i==1) {
	    		$html = $this->ci()->load->view($view, $data, TRUE);
	    		$tplId = $mpdf->ImportPage($i);
	    		$mpdf->UseTemplate($tplId);
	    		$mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	            $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    	}else{ 
	    			$tplId = $mpdf->ImportPage($i);
	    			$mpdf->SetPageTemplate($tplId); 
	    			$html = $this->ci()->load->view($view, $data, TRUE);
	    		    $mpdf->AddPage();
                    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
                    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);                
            }
        }
	    
	    $mpdf->Output();
	} 

	public function Reporte_Director_curso_tncc($view, $data = array()) 
	{

	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'A4', 
	    'orientation' => 'P' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	    
	
	    $pagecount = $mpdf->SetSourceFile('assets/media/tncc/19.Reporte_Director_curso_tncc.pdf');
	    $stylesheet = file_get_contents('assets/css/style_pdf/tncc/s19.Reporte_Director_curso_tncc.css');

	    for ($i=1; $i <= $pagecount ; $i++) {
	        $data['opc']=$i;

	        if ($i==1) {
	    		$html = $this->ci()->load->view($view, $data, TRUE);
	    		$tplId = $mpdf->ImportPage($i);
	    		$mpdf->UseTemplate($tplId);
	    		$mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	            $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    	}else{ 
	    			$tplId = $mpdf->ImportPage($i);
	    			$mpdf->SetPageTemplate($tplId); 
	    			$html = $this->ci()->load->view($view, $data, TRUE);
	    		    $mpdf->AddPage();
                    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
                    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);                
            }

	    }
	    
	    $mpdf->Output();
	} 

	public function ejemplo_reporte_logistica_tncc($view, $data = array()) 
	{

	    $html = $this->ci()->load->view($view, $data, TRUE);
	    $mpdf = new \Mpdf\Mpdf( 
	    ['margin_top' =>0, 
	    'margin_left' =>1, 
	    'mode' => 'utf-8', 
	    'margin_right' =>1, 
	    'format' => 'A4', 
	    'orientation' => 'P' , 
	    'mirrorMargins' =>false]);// false para que no imprima a doble cara 
	    //$mpdf->SetImportUse();
	    
	    // Add First page 

	    $pagecount = $mpdf->SetSourceFile('assets/media/tncc/20.ejemplo_reporte_logistica_tncc.pdf');
	    $tplId = $mpdf->ImportPage(1);
	    $mpdf->SetPageTemplate($tplId);
	    //$mpdf->AddPage('L');
	    $stylesheet = file_get_contents('assets/css/style_pdf/tncc/sejemplo_reporte_logistica_tncc.css');
	    $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
	    $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
	    
	    $mpdf->Output();
	}





}
